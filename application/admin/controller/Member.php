<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-24
 * Time: 22:10
 */

namespace app\admin\controller;

use app\admin\model\AuthModel;
use app\admin\model\MemberModel;

class Member extends Base {

    public function lists() {
        $data = MemberModel::member_lists(array(), 20);
        return view('lists', ['data' => $data]);
    }

    public function edit($id = null) {
        if (!$id) {
            $this->red_notice_page('缺少参数');
        }
        $menber = MemberModel::get_member(['id' => $id]);
        if (!$menber) {
            $this->red_notice_page('非法数据提交');
        }
        $status = $menber['status'] == 1 ? 2 : 1;
        if (!MemberModel::member_edit(['status' => $status], ['id' => $id])) {
            $this->red_notice_page('操作失败');
        }
        $this->red_notice_page('操作成功', true, url('member/lists'));
    }

    public function auth($status = null) {
        $where = [];
        $search = [];
        $keywords = $this->request->post('member_user');
        if ($status) {
            $where['status'] = $status;
        }
        if ($keywords) {
            $search['member_user'] = $keywords;
        }
        $data = AuthModel::auth_lists($where, 20, $search);
        $status_list = array();
        foreach ($data as $item) {
            if ($item['status'] == 1) {
                $status_list[$item['id']] = 'question-sign drz';
            }
            if ($item['status'] == 2) {
                $status_list[$item['id']] = 'ok-sign ytg';
            }
            if ($item['status'] == 3) {
                $status_list[$item['id']] = 'remove-sign wtg';
            }
        }
        return view('auth', ['data' => $data, 'status_list' => $status_list]);
    }

    public function do_auth() {
        $status = $this->request->get('status');
        $id = $this->request->get('id');
        if (!$status || !$id) {
            ajax_error_tip('缺少参数');
        }
        if ($status != 2 && $status != 3) {
            ajax_error_tip('参数错误');
        }
        if (!AuthModel::auth_edit(['status' => $status], ['id' => $id])) {
            ajax_error_tip('审核失败');
        }
        $msg = $status == 2 ? '通过' : '未通过';
        ajax_succ_tip(['succ_desc' => "成功设置为{$msg}"]);
    }
}