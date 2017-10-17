<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-08
 * Time: 15:48
 */

namespace app\index\controller;


use app\admin\model\MemberModel;
use app\index\model\SmsModel;

class Member extends Base {

    public function register() {
        if (!$this->request->isPost()) {
            return view();
        }
        $data = $this->request->post();
        if (!$data['captcha_code']) {
            $this->red_notice_page('请输入手机验证码');
        }
        $sms = SmsModel::get_sms(['phone' => $data['name'], 'method' => 'reg']);
        if (!$sms) {
            $this->red_notice_page('手机验证码输入错误');
        }
        if ($data['captcha_code'] != $sms['code']) {
            $this->red_notice_page('手机验证码输入错误');
        }
        if ($data['pass'] != $data['repass']) {
            $this->red_notice_page('两次密码输入不一致');
        }
        if ($data['pass'] == $data['pay_pass']) {
            $this->red_notice_page('交易密码不能与登陆密码相等');
        }
        $member = MemberModel::get_member(['name' => $data['name']]);
        if ($member) {
            $this->red_notice_page('你已经注册请直接登录');
        }
        $member_reg_data = [];
        if (!empty($data['uid'])) {
            $member_lader = MemberModel::get_member(['uid' => $data['uid']]);
            if (!$member_lader) {
                $this->red_notice_page('推荐人不存在');
            }
            $member_reg_data['larder'] = $data['uid'];
        }
        $curr_time = time();
        $member_reg_data['uid'] = time() . rand(1000, 9999);
        $member_reg_data['name'] = $data['name'];
        $member_reg_data['pass'] = md5(md5($data['pass']));
        $member_reg_data['pay_pass'] = md5(md5($data['pay_pass']));
        $member_reg_data['reg_time'] = $curr_time;
        $member_reg_data['status'] = 1;
        if (!MemberModel::member_add($member_reg_data)) {
            $this->red_notice_page('注册出错');
        }
        $cookie_name = $member_reg_data['uid'] . '##' . $member_reg_data['name'];
        $this->set_online_user($cookie_name);
        $this->red_notice_page('注册成功', true, url('/'));
    }

    public function check_phone() {
        $phone = $this->request->get('phone');
        $member = MemberModel::get_member(['name' => $phone]);
        if ($member) {
            ajax_error_tip('电话号码已经被注册');
        }
        ajax_succ_tip();
    }

    public function login() {
        if (!$this->request->isPost()) {
            return view();
        }
        $name = $this->request->post('name');
        $pass = $this->request->post('pass');
        $captch = $this->request->post('captcha');
        if (!$name || !$pass || !$captch) {
            $this->red_notice_page('请填写必填项');
        }
        if (!captcha_check($captch)) {
            $this->red_notice_page('验证码填写错误');
        }
        $member = MemberModel::get_member(['name' => $name]);
        if (!$member) {
            $this->red_notice_page('账户或密码错误');
        }
        $check_pass = md5(md5($pass));
        if ($check_pass != $member['pass']) {
            $this->red_notice_page('账户或密码错误');
        }
        $cookie_name = $member['uid'] . '##' . $member['name'];
        $this->set_online_user($cookie_name);
        $this->red_notice_page('登陆成功', true, url('/'));
    }

    public function change_logo() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登录后，再操作', false, url('member/login'));
        }
        $logo = $this->request->file('logo');
        if (!$logo) {
            $this->red_notice_page('请先上传图片', false, url('safe/index'));
        }
        $upload_result = $this->upload($logo);
        if (!$upload_result->status){
            $this->red_notice_page($upload_result->error_desc, false, url('safe/index'));
        }
        if (!MemberModel::member_edit(['logo'=>$upload_result->url], ['id'=>$online_user['id']])) {
            $this->red_notice_page('更改头像出错', false, url('safe/index'));
        }
        $this->red_notice_page('成功更改头像',true,url('safe/index'));
    }

    public function find_pass() {
        $online_user = $this->check_online_user();
        if ($online_user) {
            $this->redirect(url('member/center'));
        }
        if (!$this->request->isPost()) {
            return view();
        }
        $phone = $this->request->post('phone');
        $pass = $this->request->post('pass');
        $captcha = $this->request->post('captcha');
        if (!$phone) {
            $this->red_notice_page('请填写电话号码');
        }
        if (!$pass) {
            $this->red_notice_page('请填写密码');
        }
        if (!$captcha) {
            $this->red_notice_page('请填写手机验证码');
        }
        $sms = SmsModel::get_sms(['phone' => $phone]);
        if (!$sms) {
            $this->red_notice_page('手机验证码效验未通过');
        }
        if ($captcha != $sms['code']) {
            $this->red_notice_page('手机验证码效验未通过');
        }
        $member = MemberModel::get_member(['name' => $phone]);
        if (!$member) {
            $this->red_notice_page('帐号不存在，请先注册');
        }
        if ($member['status'] == 2) {
            $this->red_notice_page('该账户已被禁用');
        }
        $new_pass = md5(md5($pass));
        if (!MemberModel::member_edit(['pass' => $new_pass], ['name' => $phone])) {
            $this->red_notice_page('找回密码出错,请稍后再试');
        }
        $this->red_notice_page('成功设置新的密码', true, url('member/login'));
    }

    public function logout() {
        $this->clear_online_user();
    }

    public function send_code() {
        $phone = $this->request->post('phone');
        $type = $this->request->post('type');
        if (!$type) {
            ajax_error_tip('参数错误');
        }
        if (!$phone) {
            ajax_error_tip('缺少手机号码');
        }
        if (!preg_match("/^1\d{10}$/", $phone)) {
            ajax_error_tip('请输入正确的手机号');
        }
        switch ($type) {
            case 'reg':
                $notice_str = '注册';
                break;
            case 'find':
                $notice_str = '找回密码';
                $member = MemberModel::get_member(['name' => $phone]);
                if (!$member) {
                    $notice_str_error = '不存在该账户';
                    break;
                }
                if ($member['status'] == 2) {
                    $notice_str_error = '帐号已被禁用';
                    break;
                }
                break;
            case 'withdraw':
                $notice_str = '提现';
                break;
            case 'auth':
                $notice_str = '实名认证';
                break;
            default:
                $notice_str_error = '请传输正确的匹配';
                break;
        }
        if (isset($notice_str_error)) {
            ajax_error_tip($notice_str_error);
        }
        $code = rand(100000, 999999);
        $content = "您正在进行{$notice_str}操作，验证码是{$code}，打死不能告诉别人";
        $result = $this->send_phone_code($phone, $content, $code, $type);
        if (!$result->status) {
            ajax_error_tip($result->error_desc);
        }
        ajax_succ_tip();
    }

}