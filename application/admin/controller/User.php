<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-23
 * Time: 19:53
 */

namespace app\admin\controller;

use app\admin\model\UserModel;

class User extends Base {

    public function add() {
        if (!$this->request->isPost()) {
            $this->assign('zmenu','后台用户添加');
            return $this->fetch();
        }
        $data = $this->request->post();
        if (count($data) != 3) {
            $this->red_notice_page('有未填写的项目');
        }
        if ($data['password'] != $data['password1']) {
            $this->red_notice_page('两次密码输入不相等');
        }
        unset($data['password1']);
        $password = md5(md5($data['password']));
        $data['password'] = $password;
        $data['reg_time'] = time();
        if (!UserModel::user_add($data)) {
            $this->red_notice_page('添加管理员出错');
        }
        $this->red_notice_page('添加管理员成功', true, url('user/lists'));
    }

    public function lists() {
        $this->assign('zmenu','后台用户列表');
        $data = UserModel::user_lists([], 10);
        return view('lists', ['data' => $data]);
    }

    public function edit($id = null) {
        if (!$id) {
            $this->red_notice_page('缺少参数');
        }
        if (!$this->request->isPost()) {
            $data = UserModel::get_user(['id' => $id]);
            if (!$data) {
                $this->red_notice_page('数据不存在');
            }
            $this->assign('zmenu','后台用户编辑');
            return view('edit', ['data' => $data]);
        }
        $data = $this->request->post();
        if (count($data) != 4) {
            $this->red_notice_page('必填项不能为空');
        }
        if ($data['password'] != $data['password1']) {
            $this->red_notice_page('两次密码不相等');
        }
        unset($data['password1']);
        $data['password'] = md5(md5($data['password']));
        if (!UserModel::user_edit($data, ['id' => $id])) {
            $this->red_notice_page('修改出错');
        }
        $this->red_notice_page('修改成功', true, url('user/lists'));
    }

    public function delete($id) {
        if (!$id) {
            $this->red_notice_page('参数错误');
        }
        if (!UserModel::user_del(['id'=>$id])){
            $this->red_notice_page('删除出错');
        }
        $this->red_notice_page('删除成功', true, url('user/lists'));
    }

}