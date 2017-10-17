<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-03
 * Time: 11:25
 */

namespace app\admin\controller;
use app\admin\model\CztxModel;
use app\admin\model\MemberModel;

class Jymanage extends Base {

    public function cztx_action($status = null) {
        $keywords = $this->request->post('member_username');
        $search = [];
        $where = [];
        $where['ct_status'] = 1;
        if ($status) {
            $where['status'] = $status;
        }
        if ($keywords) {
            $search['member_username'] = $keywords;
            $search['tx_account'] = $keywords;
        }
        $limit = 20;
        $data = CztxModel::cztx_lists($where, $limit, $search);
        $sk_type = account_type_list();
        return view('cztx', [
            'data' => $data,
            'sk_type' => $sk_type
        ]);
    }

    public function cz_action() {
        $cztx_id = $this->request->post('cztx_id');
        if (!$cztx_id) {
            ajax_error_tip('缺少参数');
        }
        $catx = CztxModel::get_cztx(['id' => $cztx_id]);
        if (!$catx) {
            ajax_succ_tip('该笔订单不存在');
        }
        $money = $catx['money'];
        $status = $catx['status'];
        $member_id = $catx['member_id'];
        $member = MemberModel::get_member(['id' => $member_id]);
        if (!$member) {
            ajax_error_tip('该用户不存在');
        }
        $exp_money = 0;
        if ($status == 1) {
            $exp_money = $member['money'] + $money;
        } else {
            if ($member['money'] < $money) {
                ajax_error_tip('提现金额大于用户余额');
            }
            $exp_money = $member['money'] - $money;
        }
        if (!MemberModel::member_edit(['money' => $exp_money], ['id' => $member_id])) {
            ajax_error_tip('操作出错');
        }
        $curr_time = time();
        if (!CztxModel::cztx_edit(['ct_status' => 2,'tx_time'=>$curr_time], ['id' => $cztx_id])) {
            ajax_error_tip('操作出错');
        }
        ajax_succ_tip(['succ_msg' => '操作成功']);
    }

    public function jy_action($status = null) {
        $keywords = $this->request->post('member_username');
        $search = [];
        $where = [];
        $where['ct_status'] = 2;
        if ($status) {
            $where['status'] = $status;
        }
        if ($keywords) {
            $search['member_username'] = $keywords;
            $search['tx_account'] = $keywords;
        }
        $limit = 20;
        $data = CztxModel::cztx_lists($where, $limit, $search);
        $sk_type = account_type_list();
        return view('jyjl', [
            'data' => $data,
            'sk_type' => $sk_type
        ]);
    }
}