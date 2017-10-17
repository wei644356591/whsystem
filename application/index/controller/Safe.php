<?php

namespace app\index\controller;


use app\admin\model\AuthModel;
use app\admin\model\BankModel;
use app\admin\model\CztxModel;
use app\admin\model\MemberModel;
use app\admin\model\QrcodeModel;
use app\index\model\AssetModel;
use app\index\model\SmsModel;

class Safe extends Base {

    public function index() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $auth = AuthModel::get_auth(['member_id' => $online_user['id']]);
        if (!$auth) {
            $auth_status_str = '未认证';
        } else {
            switch ($auth['status']) {
                case 1:
                    $auth_status_str = '认证中';
                    break;
                case 2:
                    $auth_status_str = '已认证';
                    break;
                case 3:
                    $auth_status_str = '未通过';
                    break;
                default:
                    $auth_status_str = '未认证';
                    break;
            }
        }
        $safe_data = [];
        $safe_data['logo'] = $this->check_user_logo($online_user);
        $safe_data['auth_status_str'] = $auth_status_str;
        $safe_data['auth'] = $auth;
        $safe_data['online_user'] = $online_user;
        $this->assign($safe_data);
        return view();
    }

    public function auth() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        if (!$this->request->isPost()) {
            $auth = AuthModel::get_auth(['member_id' => $online_user['id']]);
            if (isset($auth) && $auth['status'] == 2) {
                $this->red_notice_page('无须重复认证');
            }
            $data = [];
            $data['online_user'] = $online_user;
            $data['auth'] = $auth;
            $this->assign($data);
            return view();
        }
        $real_name = $this->request->post('real_name');
        $identity = $this->request->post('identity');
        $phone = $this->request->post('phone');
        $code = $this->request->post('code');
        $sms = SmsModel::get_sms(['phone' => $phone]);
        $member = MemberModel::get_member(['name' => $phone]);
        if (!$sms) {
            $this->red_notice_page('手机验证码不存在');
        }
        if (!$member) {
            $this->red_notice_page('手机号与注册时填写的不对应');
        }
        if ($sms['code'] != $code) {
            $this->red_notice_page('手机验证码输入错误');
        }
        if (!$real_name) {
            $this->red_notice_page('请填写真实姓名');
        }
        if (!$identity) {
            $this->red_notice_page('请填写身份证信息');
        }
        $identity_zm = $this->request->file('identity_zm');
        $identity_fm = $this->request->file('identity_fm');
        $identity_sc = $this->request->file('identity_sc');
        if (!$identity_zm) {
            $this->red_notice_page('请上传身份证正面');
        }
        if (!$identity_fm) {
            $this->red_notice_page('请上传身份证反面');
        }
        if (!$identity_sc) {
            $this->red_notice_page('请上传手持身份证');
        }
        $zm_result = $this->upload($identity_zm);
        $fm_result = $this->upload($identity_fm);
        $sc_result = $this->upload($identity_sc);
        if (!$zm_result->status) {
            $this->red_notice_page($zm_result->error_desc);
        }
        if (!$fm_result->status) {
            $this->red_notice_page($fm_result->error_desc);
        }
        if (!$sc_result->status) {
            $this->red_notice_page($sc_result->error_desc);
        }
        $member_auth = [];
        $member_auth['member_id'] = $online_user['id'];
        $member_auth['member_user'] = $phone;
        $member_auth['real_name'] = $real_name;
        $member_auth['auth_time'] = time();
        $member_auth['identity'] = $identity;
        $member_auth['identity_zm'] = $zm_result->url;
        $member_auth['identity_fm'] = $fm_result->url;
        $member_auth['identity_sc'] = $sc_result->url;
        $member_auth['status'] = 1;
        if (!AuthModel::auth_add($member_auth)) {
            $this->red_notice_page('认证出错');
        }
        $this->red_notice_page('已提交认证，等待审核', true, url('safe/index'));
    }

    public function center() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $asset = AssetModel::asset_lists(['member_id' => $online_user['id']]);
        $data = [];
        $data['asset'] = $asset;
        $data['online_user'] = $online_user;
        return view();
    }

    public function pay() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $auth = AuthModel::get_auth(['member_id' => $online_user['id']]);
        if (!$auth || $auth['status'] != 2) {
            $this->red_notice_page('请先进行实名认证', false, url('safe/auth'));
        }
        $pay_code = uniqid();
        $qrcode = QrcodeModel::get_qrcode(['id' => 1]);
        $bank_list = BankModel::bank_lists();
        $data = [];
        $data['pay_code'] = substr($pay_code, -4, 4);
        $data['auth'] = $auth;
        $data['qrcode'] = $qrcode;
        $data['bank_list'] = $bank_list;
        $this->assign($data);
        return view();
    }

    public function do_pay() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $over_money = $this->request->post('over_money');
        $card = $this->request->post('card');
        $pay_flag = $this->request->post('pay_flag');
        if (!$over_money) {
            $this->red_notice_page('请填写转账的金额', false, url('safe/pay'));
        }
        if (!$pay_flag) {
            $this->red_notice_page('转账标识获取失败', false, url('safe/pay'));
        }
        $account_type = 0;
        if (!$card) {
            $card = '-';
        } else {
            if (is_numeric($card)) {
                $account_type = 3;
            } else {
                $account_type = $card == 'alipay' ? 1 : 2;
            }
        }
        $data = [];
        $data['member_id'] = $online_user['id'];
        $data['member_username'] = $online_user['name'];
        $data['money'] = $over_money;
        $data['pay_time'] = time();
        $data['status'] = 1;
        $data['ct_status'] = 1;
        $data['tx_account'] = $card;
        $data['account_type'] = $account_type;
        $data['pay_flag'] = $pay_flag;
       if (!CztxModel::cztx_add($data)){
           $this->red_notice_page('系统出错，请重试或直接联系客服', false, url('safe/pay'));
       }
        $this->red_notice_page('提交充值信息成功', true, url('safe/pay'));
    }

}