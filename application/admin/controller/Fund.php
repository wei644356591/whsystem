<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-26
 * Time: 21:55
 */

namespace app\admin\controller;

use app\admin\model\BankModel;
use app\admin\model\ConsumeModel;
use app\admin\model\QrcodeModel;

class Fund extends Base {

    public function charge() {
        if (!$this->request->isPost()) {
            $data = QrcodeModel::get_qrcode(['id' => 1]);
            $this->assign('data', $data);
            return $this->fetch();
        }
        $wx_img_file = $this->request->file('wx');
        $al_img_file = $this->request->file('al');
        if (!$wx_img_file || !$al_img_file) {
            $this->red_notice_page('缺少图片信息');
        }
        $wx_result = $this->upload($wx_img_file);
        $al_result = $this->upload($al_img_file);
        if (!$wx_result->status) {
            $this->red_notice_page($wx_result->error_desc);
        }
        if (!$al_result->status) {
            $this->red_notice_page($al_result->error_desc);
        }
        $data = array(
            'wx_url' => $wx_result->url,
            'al_url' => $al_result->url
        );
        if (!QrcodeModel::qrcode_edit($data, ['id' => 1])) {
            $this->red_notice_page('上传二维码出错');
        }
        $this->red_notice_page('成功设置收款二维码', true);
    }

    public function consume() {
        if (!$this->request->isPost()) {
            $data = ConsumeModel::get_consume(['id' => 1]);
            $this->assign('data', $data);
            return $this->fetch();
        }
        $zd_money = $this->request->post('zd_money');
        $zg_money = $this->request->post('zg_money');
        $sx_money = $this->request->post('sx_money');
        $data = array();
        if ($zd_money || $zg_money == 0) {
            $data['zd_money'] = $zd_money;
        }
        if ($zg_money || $zg_money == 0) {
            $data['zg_money'] = $zg_money;
        }
        if ($sx_money || $sx_money == 0) {
            $data['sx_money'] = $sx_money;
        }
        if (!$data) {
            $this->red_notice_page('未设置任何数据');
        }
        if (!ConsumeModel::consume_edit($data, ['id' => 1])) {
            $this->red_notice_page('设置失败');
        }
        $this->red_notice_page('设置成功', true);
    }

    public function bank() {
        if (!$this->request->isPost()) {
            $bank_list = BankModel::bank_lists();
            $data = [];
            $data['bank_list'] = $bank_list;
            $this->assign($data);
            return view();
        }

        $data = $this->request->post();
        if (count($data) != 3) {
            $this->red_notice_page('添加的数据不齐全');
        }
        if (!BankModel::bank_add($data)) {
            $this->red_notice_page('添加银行信息出错');
        }
        $this->red_notice_page('成功增加银行信息', true);
    }

    public function bank_del($id) {
        if (!$id) {
            $this->red_notice_page('缺少参数', false, url('fund/bank'));
        }
        $bank = BankModel::get_bank(['id' => $id]);
        if (!$bank) {
            $this->red_notice_page('不存在该银行信息', false, url('fund/bank'));
        }
        if (!BankModel::bank_del(['id' => $id])) {
            $this->red_notice_page('成功删除该银行信息', true, url('fund/bank'));
        }
    }
}