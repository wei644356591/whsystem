<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-23
 * Time: 18:06
 */

namespace app\admin\controller;


use app\admin\model\UserModel;
use think\Controller;
use think\Cookie;
use think\Session;

class Admin extends Controller  {
    private $cookie_key = 'login_user';

    public function login() {
        if (!$this->request->isPost()) {
            return view();
        }
        $data = $this->request->post();
        if (count($data) != 3) {
            Session::flash('error_notice', '请输入必填项');
            $this->redirect(url('admin/login'));
        }
        if (!captcha_check($data['captcha'])) {
            Session::flash('error_notice', '验证码出错');
            $this->redirect(url('admin/login'));
        }
        $user = UserModel::get_user(['name' => $data['name']]);
        if (!$user) {
            Session::flash('error_notice', '账户或密码错误');
            $this->redirect(url('admin/login'));
        }
        $input_pass = md5(md5($data['password']));
        if ($input_pass != $user['password']) {
            Session::flash('error_notice', '账户或密码错误');
            $this->redirect(url('admin/login'));
        }
        $set = $this->set_online_user($user['name']);
        if (!$set) {
            Session::flash('error_notice', '请无重复登陆');
            $this->redirect(url('admin/login'));
        }
        $this->redirect(url('base/index'));
    }

    public function set_online_user($value) {
        if (Cookie::has($this->cookie_key)) {
            return false;
        }
        $value_encrypt = passport_encrypt($value, $this->cookie_key);
        Cookie::set($this->cookie_key, $value_encrypt);
        return true;
    }

    public function logout() {
        Cookie::delete($this->cookie_key);
        $this->redirect(url('admin/login'));
    }

}