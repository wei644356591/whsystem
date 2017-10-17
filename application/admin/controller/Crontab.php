<?php

namespace app\admin\controller;

use app\admin\model\AdjustModel;
use app\admin\model\ForexModel;
use app\admin\model\UseModel;
use think\Cache;
use think\Controller;

class Crontab extends Controller {
    private $cache = 'wh_name_cache';
    private $set = 'wh_set_cache';

    public function auto_get() {
        $cache_key = date('Y-m-d');
        $new_data = $this->get_wh_data();
        foreach ($new_data as $k => $item) {
            $cache_name = $k . '_' . $cache_key;
            $cache_data = Cache::get($cache_name);
            $num = rand(10, 99);
            if ($num < 50) {
                $js = true;
            } else {
                $js = false;
            }
            $num_x = rand(1, 9);
            $num_x = $num_x * 0.01;
            $data = [$item['get_time'] * 1000, $js ? $item['kp_price'] + $num_x : $item['kp_price'] - $num_x, $js ? $item['zg_price'] + $num_x : $item['zg_price'] - $num_x, $js ? $item['zd_price'] + $num_x : $item['zd_price'] - $num_x, $js ? $item['zs_price'] + $num_x : $item['zs_price'] - $num_x];
            if (!$cache_data) {
                Cache::set($cache_name, $data);
            } else {
                if (count($cache_data) == count($cache_data, true)) {
                    $new_data = [];
                    $new_data[] = $cache_data;
                    $new_data[] = $data;
                } else {
                    $new_data_two[] = $data;
                    $new_data = array_merge($cache_data, $new_data_two);
                }
                Cache::set($cache_name, $new_data);
            }
        }
    }


    public function get_cache_wh_data($currency = null) {
        if (!$currency) {
            ajax_error_tip('缺少参数');
        }
        $month = date('m');
        $year_month = date('Y-m');
        $month_31 = ['01', '03', '05', '07', '08', '10', '12'];
        if (in_array($month, $month_31)) {
            $days = 31;
        } else {
            $days = 30;
        }
        $data = array();
        for ($i = $days; $i > 0; $i--) {
            if ($i < 10) {
                $i = '0' . $i;
            }
            $cache_key = $currency . '_' . $year_month . '-' . $i;
            if (Cache::has($cache_key)) {
                $data = array_merge($data, Cache::get($cache_key));
            }
        }
        return json_encode($data);
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
                $price_color = ltrim($matches[1], '"');
                $price_color = rtrim($price_color, '"');
                $currency_data[$key]['price_color'] = $price_color;
            }
            if (preg_match("/开盘价<span class\=(\"red\"|\"green\")>(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['kp_price'] = $matches[2];
                $kp_price_color = ltrim($matches[1], '"');
                $kp_price_color = rtrim($kp_price_color, '"');
                $currency_data[$key]['kp_price_color'] = $kp_price_color;
            }
            if (preg_match("/昨收价<span style\=\"font-color:#000000\">(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['zs_price'] = $matches[1];
            }
            if (preg_match("/最低价<span class\=(\"red\"|\"green\")>(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['zd_price'] = $matches[2];
                $zd_price_color = ltrim($matches[1], '"');
                $zd_price_color = rtrim($zd_price_color, '"');
                $currency_data[$key]['zd_price_color'] = $zd_price_color;
            }
            if (preg_match("/最高价<span class\=(\"red\"|\"green\")>(.*?)<\/span>/s", $contents, $matches)) {
                $currency_data[$key]['zg_price'] = $matches[2];
                $zg_price_color = ltrim($matches[1], '"');
                $zg_price_color = rtrim($zg_price_color, '"');
                $currency_data[$key]['zg_price_color'] = $zg_price_color;
            }
            if (preg_match('/\(<span class\=(\"red\"|\"green\")>(.*?)<\/span>\)/s', $contents,$matches)){
                $currency_data[$key]['change'] = $matches[2];
                $change_color = ltrim($matches[1], '"');
                $change_color = rtrim($change_color, '"');
                $currency_data[$key]['change_color'] = $change_color;
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


}