<?php

namespace app\index\controller;

use app\admin\model\Bigimg;
use app\admin\model\ForexModel;
use app\admin\model\MenucontentModel;
use app\admin\model\MenuModel;
use app\admin\model\MemberModel;
use app\index\model\SmsModel;
use think\Controller;
use think\Cookie;
use think\Session;

class Base extends Controller {

    public function _initialize() {
        static $data;
        if ($data) {
            $this->assign($data);
            return true;
        }
        $online_user = $this->check_online_user();
        $data = [];
        if ($online_user) {
            $data['online_user'] = $online_user;
        }
        $images = Bigimg::get_bigimg(['id' => 1]);
        $config = config_set_list();
        if (!empty($images)) {
            $data['images'] = $images;
        }
        if (!empty($config)) {
            $config['sum_money_list'] = str_split($config['sum_money']);
            $data['config'] = $config;
        }
        if (!empty($images['big_img1'])) {
            $data['carousel'][] = $images['big_img1'];
        }
        if (!empty($images['big_img2'])) {
            $data['carousel'][] = $images['big_img2'];
        }
        if (!empty($images['big_img3'])) {
            $data['carousel'][] = $images['big_img3'];
        }
        $forex = ForexModel::forex_lists([], 3, 'id DESC');
        if ($forex) {
            $data['forex'] = $forex;
        }
        $menu = MenuModel::menu_lists([], 3);
        foreach ($menu as $k => $item) {
            $menu[$k]['title'] = MenucontentModel::menucontent_lists(['menu_id' => $item['id']], 3, 'title');
        }
        $data['menu'] = $menu;
        $this->assign($data);
    }

    public function check_online_user($key = 'home_login_user') {
        static $user;
        if ($user) {
            return $user;
        }
        $user_str = cookie($key);
        if (!$user_str) {
            return false;
        }
        $user_str = passport_decrypt($user_str, $key);
        $user_list = explode('##', $user_str);
        if (count($user_list) != 2) {
            return false;
        }
        $uid = $user_list[0];
        if (!$uid) {
            return false;
        }
        $user = MemberModel::get_member(array('uid' => $uid));
        if (!$user) {
            return false;
        }
        if ($user['status'] == 2) {
            return false;
        }
        return $user;
    }

    public function set_online_user($value, $key = 'home_login_user') {
        if (Cookie::has($key)) {
            return false;
        }
        $value_encrypt = passport_encrypt($value, $key);
        Cookie::set($key, $value_encrypt);
        return true;
    }

    public function clear_online_user($key = 'home_login_user') {
        Cookie::delete($key);
        $this->red_notice_page('已退出', true, url('/'));
    }

    public function red_notice_page($notice, $flag = false, $url = null) {
        if (!$url) {
            $url = url();
        }
        if ($flag) {
            Session::flash('succ_notice', $notice);
        } else {
            Session::flash('error_notice', $notice);
        }
        $this->redirect($url);
    }

    public function check_user_logo($online_user = null) {
        $default_path = '/static/index/home/images/ulogodefault.png';
        if (!$online_user) {
            return $default_path;
        }
        if (empty($online_user['logo'])) {
            return $default_path;
        }
        return $online_user['logo'];
    }

    public function upload($img) {
        $result = new \stdClass();
        $result->status = false;
        $base_path = '/uploads/';
        $move_path = ROOT_PATH . 'public' . DS . 'uploads';
        if ($img) {
            $img_info = $img->move($move_path);
            if ($img_info) {
                $result->status = true;
                $url = $base_path . $img_info->getSaveName();
                $result->url = str_replace("\\", "/", $url);
                return $result;
            }
            $result->error_desc = $img_info->getError();
            return $result;
        }
        $result->error_desc = '请正确上传';
        return $result;
    }

    public function send_phone_code($phone, $content, $code, $method = null, $send_limit = 60) {
        $result = new \stdClass();
        $result->status = false;
        if (!$phone || !$content) {
            return $result;
        }
        if (!preg_match("/^1\d{10}$/", $phone)) {
            $result->error_desc = '请输入正确的手机号';
            return $result;
        }
        $curr_time = time();
        if ($send_limit != 0) {
            $sms = SmsModel::get_sms(['phone' => $phone, 'method' => $method]);
            if ($sms && $curr_time < $sms['stime']) {
                $result->error_desc = '短信发送太频繁，请稍后再试';
                return $result;
            }
        }
        $send_url = 'https://sdk2.028lk.com/sdk2/BatchSend2.aspx?';
        $send_content = [
            'CorpID' => 'CSJS003986',
            'Pwd' => 'zm0513@',
            'Mobile' => $phone,
            'Content' => iconv('UTF-8', 'GB2312//IGNORE', $content)
        ];
        $send_content_str = http_build_query($send_content);
        $send_url = $send_url . $send_content_str;
        $send_result = curl_get($send_url);
        if (!is_numeric($send_result)) {
            $result->error_desc = $send_result;
        }
        if ($send_result < 0) {
            switch ($send_result) {
                case '-1':
                    $result->error_desc = '账号未注册';
                    break;
                case '-2':
                    $result->error_desc = '其他错误';
                    break;
                case '–3':
                    $result->error_desc = '其他错误';
                    break;
                case '–5':
                    $result->error_desc = '余额不足，请充值';
                    break;
                case '–6':
                    $result->error_desc = '定时发送时间不是有效的时间格式';
                    break;
                case '–7':
                    $result->error_desc = '提交信息末尾未签名，请添加中文的企业签名';
                    break;
                case '–8':
                    $result->error_desc = '发送内容需在1到300字之间';
                    break;
                case '–9':
                    $result->error_desc = '发送号码为空';
                    break;
                case '–10':
                    $result->error_desc = '定时时间不能小于系统当前时间';
                    break;
                case '–100':
                    $result->error_desc = 'IP黑名单';
                    break;
                case '–102':
                    $result->error_desc = '账号黑名单';
                    break;
                case '–103':
                    $result->error_desc = 'IP未导白';
                    break;
            }
            return $result;
        }
        $ip = $this->request->ip();
        if (!$method) {
            $method = '未知';
        }
        $sms_data = [
            'phone' => $phone,
            'code' => $code,
            'content' => $content,
            'result' => $send_result,
            'ip' => $ip,
            'method' => $method,
            'stime' => $curr_time + $send_limit
        ];
        if (!SmsModel::sms_add($sms_data)) {
            $result->error_desc = '记录发送数据失败';
            return $result;
        }
        $result->status = true;
        return $result;
    }

}