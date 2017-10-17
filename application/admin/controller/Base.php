<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-23
 * Time: 17:57
 */

namespace app\admin\controller;

use app\admin\model\AdjustModel;
use app\admin\model\UseModel;
use app\admin\model\UserModel;
use think\Cache;
use think\Controller;
use think\Cookie;
use think\Session;

class Base extends Controller {

    private $cache = 'wh_name_cache';
    private $set = 'wh_set_cache';

    public function _initialize() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登陆后再操作', false, url('admin/login'));
        }
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

    public function get_wh_data() {
        $currency_list = Cache::get($this->cache);
        if (!$currency_list) {
            $currency_list = [];
            $use_list = UseModel::use_lists(['status' => 2]);
            if (!$use_list) {
                return false;
            }
            foreach ($use_list as $item) {
                $currency_list[$item['currency']] = $item['name'];
            }
        }
        $currency_data = [];
        foreach ($currency_list as $key => $item) {
            $url = "http://quote.forex.hexun.com/{$key}.shtml";
            $data = curl_get($url);
            $contents = iconv("gb2312", "utf-8//IGNORE", $data);
            $currency_data[$key]['currency'] = $key;
            $currency_data[$key]['name'] = $item;
            if (preg_match("/<span class\=(\"current_green\"|\"current_red\")\sid\=\"newprice\">(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['price'] = $matches[2];
                $price_color = ltrim($matches[1],'"');
                $price_color = rtrim($price_color,'"');
                $currency_data[$key]['price_color'] = $price_color;
            }
            if (preg_match("/开盘价<span class\=(\"red\"|\"green\")>(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['kp_price'] = $matches[2];
                $kp_price_color = ltrim($matches[1],'"');
                $kp_price_color = rtrim($kp_price_color,'"');
                $currency_data[$key]['kp_price_color'] = $kp_price_color;
            }
            if (preg_match("/昨收价<span style\=\"font-color:#000000\">(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['zs_price'] = $matches[1];
            }
            if (preg_match("/最低价<span class\=(\"red\"|\"green\")>(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['zd_price'] = $matches[2];
                $zd_price_color = ltrim($matches[1],'"');
                $zd_price_color = rtrim($zd_price_color,'"');
                $currency_data[$key]['zd_price_color'] = $zd_price_color;
            }
            if (preg_match("/最高价<span class\=(\"red\"|\"green\")>(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['zg_price'] = $matches[2];
                $zg_price_color = ltrim($matches[1],'"');
                $zg_price_color = rtrim($zg_price_color,'"');
                $currency_data[$key]['zg_price_color'] = $zg_price_color;
            }
            $get_time = time();
            $currency_data[$key]['get_time'] = $get_time;
        }
        $adjust_new_data = Cache::get($this->set);
        if (!$adjust_new_data) {
            $adjust_data = AdjustModel::adjust_lists();
            if (!empty($adjust_data)) {
                $adjust_new_data = [];
                foreach ($adjust_data as $item) {
                    $adjust_new_data[$item['currency']] = $item;
                }
            }
        }
        if (!empty($adjust_new_data)) {
            foreach ($currency_data as $k1 => $item1) {
                if (isset($adjust_new_data[$k1])) {
                    $compute = $adjust_new_data[$k1]['compute'] == 1 ? true : false;
                    if ($compute) {
                        $result = $currency_data[$k1]['price'] + $adjust_new_data[$k1]['money'];
                    } else {
                        $result = $currency_data[$k1]['price'] - $adjust_new_data[$k1]['money'];
                    }
                    $currency_data[$k1]['price'] = $result;
                }
            }
        }
        return $currency_data;
    }

    public function check_online_user($key = 'login_user') {
        static $user;
        if ($user) {
            return $user;
        }
        $user_str = Cookie::get($key);
        if (!$user_str) {
            return false;
        }
        $name = passport_decrypt($user_str, $key);
        $user = UserModel::get_user(['name' => $name]);
        if (!$user) {
            return false;
        }
        return $user;
    }

    public function index() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->redirect(url('admin/login'));
        }
        return view('admin/index', [
            'online_user' => $online_user
        ]);
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
}