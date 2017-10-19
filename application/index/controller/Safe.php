<?php

namespace app\index\controller;


use app\admin\model\AuthModel;
use app\admin\model\BankModel;
use app\admin\model\ConsumeModel;
use app\admin\model\CztxModel;
use app\admin\model\MemberModel;
use app\admin\model\QrcodeModel;
use app\index\model\AssetModel;
use app\index\model\SmsModel;
use app\index\model\Txbind;

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
        $account_type_list = account_type_list();
        $ct_status_list = ct_status_list();
        $cztx_list = CztxModel::cztx_lists(['member_id' => $online_user['id']], 5);
        $pay_code = uniqid();
        $qrcode = QrcodeModel::get_qrcode(['id' => 1]);
        $bank_list = BankModel::bank_lists();
        $data = [];
        $data['pay_code'] = substr($pay_code, -4, 4);
        $data['auth'] = $auth;
        $data['qrcode'] = $qrcode;
        $data['account_type_list'] = $account_type_list;
        $data['bank_list'] = $bank_list;
        $data['cztx_list'] = $cztx_list;
        $data['ct_status_list'] = $ct_status_list;
        $this->assign($data);
        return view();
    }

    public function do_pay() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            ajax_error_tip('nologin');
        }
        $over_money = $this->request->post('over_money');
        $card = $this->request->post('card');
        $pay_flag = $this->request->post('pay_flag');
        if (!$over_money) {
            ajax_error_tip('请填写转账的金额');
        }
        if (!$pay_flag) {
            ajax_error_tip('转账标识获取失败');
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
        if (!CztxModel::cztx_add($data)) {
            ajax_error_tip('系统出错，请重试或直接联系客服');
        }
        ajax_succ_tip();
    }

    public function update_pass($active = null) {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        if (!$active) {
            $active = 1;
        }
        $this->assign('active', $active);
        return view();
    }

    public function do_update_pass() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $oldpwd = $this->request->post('oldpwd');
        $pwd = $this->request->post('pwd');
        $repwd = $this->request->post('repwd');
        if (!$oldpwd) {
            $this->red_notice_page('请输入历史密码');
        }
        if (!$pwd) {
            $this->red_notice_page('请输入新的密码');
        }
        if (!$repwd) {
            $this->red_notice_page('请输入新的确认密码');
        }
        if ($pwd != $repwd) {
            $this->red_notice_page('两次密码输入不一致');
        }
        $oldpwd = md5(md5($oldpwd));
        if ($online_user['pass'] != $oldpwd) {
            $this->red_notice_page('历史密码输入错误');
        }
        $new_pwd = md5(md5($pwd));
        if (!MemberModel::member_edit(['pass' => $new_pwd], ['id' => $online_user['id']])) {
            $this->red_notice_page('修改密码出错');
        }
        $this->red_notice_page('成功修改登录密码', true, url('safe/index'));
    }

    public function do_update_paypass() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $oldpwd_b = $this->request->post('oldpwd_b');
        $oldpwdtrade_b = $this->request->post('oldpwdtrade_b');
        $pwdtrade = $this->request->post('pwdtrade');
        $repwdtrade = $this->request->post('repwdtrade');

        if (!$oldpwd_b) {
            $this->red_notice_page('登录密码不能为空');
        }
        if (!$oldpwdtrade_b) {
            $this->red_notice_page('历史交易密码不能为空');
        }
        if (!$pwdtrade) {
            $this->red_notice_page('新的交易密码不能为空');
        }
        if (!$repwdtrade) {
            $this->red_notice_page('新的确认交易密码不能为空');
        }
        if ($pwdtrade != $repwdtrade) {
            $this->red_notice_page('两次交易密码输入不相符');
        }
        if (md5(md5($oldpwd_b)) != $online_user['pass']) {
            $this->red_notice_page('登录密码输入错误');
        }
        if (md5(md5($oldpwdtrade_b)) != $online_user['pay_pass']) {
            $this->red_notice_page('历史交易密码输入错误');
        }
        $new_pay_pass = md5(md5($pwdtrade));
        if (!MemberModel::member_edit(['pay_pass' => $new_pay_pass], ['id' => $online_user['id']])) {
            $this->red_notice_page('修改交易密码出错');
        }
        $this->red_notice_page('成功修改交易密码', true, url('safe/index'));
    }

    public function draw() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $auth = AuthModel::get_auth(['member_id' => $online_user['id']]);
        if ($auth['status'] != 2) {
            $this->red_notice_page('请先实名认证后，再操作', false, url('safe/index'));
        }
        $txbind_list = Txbind::txbind_lists(['member_id' => $online_user['id']]);
        $cztx_list = CztxModel::cztx_lists(['member_id' => $online_user['id'], 'status' => 2]);
        $consume = ConsumeModel::get_consume(['id'=>1]);
        $ct_status_list = ct_status_list();
        $real_name = $auth['real_name'];
        if (!empty($txbind_list)){
            foreach ($txbind_list as $k=>$item){
                if (is_numeric($txbind_list[$k]['account'])){
                    $txbind_list[$k]['account'] = substr($item['account'], -4);
                }
            }
        }
        $data = [];
        $data['txbind_list'] = $txbind_list;
        $data['cztx_list'] = $cztx_list;
        $data['real_name'] = $real_name;
        $data['ct_status_list'] = $ct_status_list;
        $data['consume'] = $consume;
        $this->assign($data);
        return view();
    }

    public function tx_bind_account() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $tx_bind_count = Txbind::txbind_count('*', ['id' => $online_user['id']]);
        if ($tx_bind_count == 3) {
            $this->red_notice_page('已经绑定3个提现帐号了', false, url('safe/draw'));
        }
        $data = $this->request->post();
        if (count($data) != 3) {
            $this->red_notice_page('请填写必填项', false, url('safe/draw'));
        }
        $data['member_id'] = $online_user['id'];
        if (!Txbind::txbind_add($data)) {
            $this->red_notice_page('绑定银行卡失败', false, url('safe/draw'));
        }
        $this->red_notice_page('绑定成功', true, url('safe/draw'));
    }

    public function tx_bind_del($id = null) {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        if (!$id) {
            $this->red_notice_page('缺少参数', false, url('safe/draw'));
        }
        $txbind = Txbind::get_txbind(['id' => $id, 'member_id' => $online_user['id']]);
        if (!$txbind) {
            $this->red_notice_page('不存在该绑定帐号', false, url('safe/draw'));
        }
        if (!Txbind::txbind_del(['id' => $id, 'member_id' => $online_user['id']])) {
            $this->red_notice_page('清除绑定帐号出错', false, url('safe/draw'));
        }
        $this->red_notice_page('成功删除', true, url('safe/draw'));
    }

    public function withdraw() {
    }

}