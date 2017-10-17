<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-04
 * Time: 14:09
 */

namespace app\admin\controller;


use app\admin\model\AdjustModel;
use app\admin\model\UseModel;
use think\Cache;

class Information extends Base {
    private $cache = 'wh_name_cache';
    private $set = 'wh_set_cache';

    public function get_info() {
        if (!$this->request->isPost()) {
            $wh_data = $this->get_wh_data();
            return view('info', [
                'wh_data' => $wh_data
            ]);
        }
    }

    public function set_trend() {
        if (!$this->request->isPost()) {
            $data = UseModel::use_lists();
            $set_data = UseModel::use_lists(['status' => 2]);
            $adjust_data = AdjustModel::adjust_lists();
            $new_data = [];
            $new_set_data = [];
            $num1 = 0;
            $num2 = 0;
            foreach ($data as $item) {
                if ($num1 % 3 == 0) {
                    $key1 = $num1 / 3;
                }
                if ($item['status'] == 2) {
                    $check = 'checked';
                } else {
                    $check = '';
                }
                $new_data[$key1][$item['currency']] = [$item['currency'] . '/' . $item['name'], $check];
                $num1++;
            }
            if (!empty($set_data)) {
                foreach ($set_data as $item) {
                    if ($num2 % 3 == 0) {
                        $key2 = $num2 / 3;
                    }
                    $new_set_data[$key2][$item['currency']] = $item['currency'] . '/' . $item['name'];
                    $num2++;
                }
            }
            return view('set', [
                'data' => $new_data,
                'set_data' => $new_set_data,
                'adjust_data' => $adjust_data
            ]);
        }

        $data = $this->request->post();
        $data_list = $data['currency'];
        $data_all_list = UseModel::use_lists();
        $adjust_data = AdjustModel::adjust_lists();
        if (!$data_list) {
            $this->red_notice_page('请至少选择一个外汇种类');
        }
        foreach ($data_list as $item) {
            if (!UseModel::use_edit(['status' => 2], ['currency' => $item])) {
                continue;
            }
        }
        $data_source = [];
        $adjust_new_data = [];
        foreach ($adjust_data as $item){
            $adjust_new_data[$item['currency']] = $item;
        }
        foreach ($data_all_list as $item){
            $data_source[$item['currency']] = $item;
        }
        foreach ($data_list as $item){
            if ($data_source[$item]){
                unset($data_source[$item]);
            }
            if (isset($adjust_new_data[$item])){
               unset($adjust_new_data[$item]);
            }
        }
        foreach ($adjust_new_data as $k=>$item){
            if (!AdjustModel::adjust_del(['currency'=>$k])) {
                continue;
            }
        }
        foreach ($data_source as $k=>$item){
            $data_source[$k]['status'] = 1;
            if (!UseModel::use_edit($data_source[$k], ['currency'=>$k])) {
                continue;
            }
        }
        $cache_data = [];
        foreach ($data_list as $item) {
            $use_data = UseModel::get_use(['currency' => $item]);
            if (!$use_data) {
                continue;
            }
            $cache_data[$item] = $use_data['name'];
        }
        Cache::set($this->cache, $cache_data);
        $this->red_notice_page('设置成功', true);
    }

    public function adjust() {
        $data = $this->request->post();
        $currency = $data['currency'];
        if (!$currency) {
            $this->red_notice_page('在采集的外汇种类当中至少选择一个');
        }
        if (!$data['compute']) {
            $this->red_notice_page('请设置波动的计算方式');
        }
        if (!$data['money']) {
            $this->red_notice_page('请设置波动的金额');
        }
        $data_all = [];
        $data_edit = [];
        foreach ($currency as $item) {
            $data_edit[$item] = [
                'currency' => $item,
                'compute' => $data['compute'],
                'money' => $data['money']
            ];
            $currency_isset = AdjustModel::get_adjust(['currency' => $item]);
            if ($currency_isset) {
                $data_isset = [
                    'compute' => $data['compute'],
                    'money' => $data['money']
                ];
                if (!AdjustModel::adjust_edit($data_isset, ['currency' => $item])) {
                    continue;
                }
            } else {
                $data_all[] = [
                    'currency' => $item,
                    'compute' => $data['compute'],
                    'money' => $data['money']
                ];
            }
        }
        if (!empty($data_all)) {
            if (!AdjustModel::adjust_add($data_all)) {
                $this->red_notice_page('设置失败', false, url('information/set_trend'));
            }
        }
        Cache::set($this->set, $data_edit);
        $this->red_notice_page('设置成功', true, url('information/set_trend'));
    }


}