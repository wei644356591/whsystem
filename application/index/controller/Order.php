<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-14
 * Time: 16:01
 */

namespace app\index\controller;


use app\admin\model\ForexModel;
use app\admin\model\MemberModel;
use app\admin\model\UseModel;
use app\index\model\AssetModel;

class Order extends Base {

    public function _initialize() {
        parent::_initialize();
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->red_notice_page('请先登陆后操作', false, url('member/login'));
        }
    }

    public function currency_trade() {
        $currency_select = UseModel::use_lists(['status' => 2]);
        $currency_count = count($currency_select);
        $currency_list = ForexModel::forex_lists([], $currency_count, 'id DESC');
        $this->assign('currency_list', $currency_list);
        return view();
    }

    public function index($currency) {
        if (!$currency) {
            $this->red_notice_page('请正确操作', false, url('order/currency_trade'));
        }
        $use = UseModel::get_use(['currency' => $currency, 'status' => 2], 'id DESC');
        if (!$use) {
            $this->red_notice_page('不存在该外汇信息', false, url('order/currency_trade'));
        }
        $forex = ForexModel::get_forex(['currency' => $currency], 'id DESC');
        if (!$forex) {
            $this->red_notice_page('不存在该外汇信息', false, url('order/currency_trade'));
        }
        $online_user = $this->check_online_user();
        if (!$online_user) {
            $this->redirect(url('member/login'));
        }
        $asset = AssetModel::get_asset(['member_id' => $online_user['id']]);
        $data = [];
        $data['online_user'] = $online_user;
        $data['asset'] = $asset;
        $data['use'] = $use;
        $data['forex'] = $forex;
        $this->assign($data);
        return view();
    }

    public function buy() {
        $online_user = $this->check_online_user();
        if (!$online_user) {
            ajax_error_tip('nologin');
        }
        $currency = $this->request->post('currency');
        $numberin = $this->request->post('numberin');
        $pwdtradein = $this->request->post('pwdtradein');
        if (!$currency) {
            ajax_error_tip('缺少参数');
        }
        if (!$numberin) {
            ajax_error_tip('请填写购买数量');
        }
        if (!is_numeric($numberin)) {
            ajax_error_tip('交易数量请填写数字');
        }
        if (!$pwdtradein) {
            ajax_error_tip('请输入交易密码');
        }
        $pwdtradein = md5(md5($pwdtradein));
        if ($pwdtradein != $online_user['pay_pass']) {
            ajax_error_tip('支付密码错误');
        }
        $use = UseModel::get_use(['currency' => $currency, 'status' => 2]);
        if (!$use) {
            ajax_error_tip('错误的交易,请重试');
        }
        $forex = ForexModel::get_forex(['currency' => $currency]);
        if (!$forex) {
            ajax_error_tip('错误的交易,请重试');
        }
        $price = $forex['price'];
        $pay_money = $numberin * $price;
        if ($online_user['can'] < $pay_money){
            ajax_error_tip('可用金额不足');
        }
        $sy_money = $online_user['can'] - $pay_money;
        if (!MemberModel::member_edit(['can'=>$sy_money], ['id'=>$online_user['id']])) {
            ajax_error_tip('交易出错');
        }
        ajax_succ_tip();
    }
}