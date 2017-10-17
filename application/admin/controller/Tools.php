<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-03
 * Time: 16:19
 */

namespace app\admin\controller;

use app\admin\model\Bigimg;
use app\admin\model\MenucontentModel;
use app\admin\model\MenuModel;

class Tools extends Base {

    public function set_menu() {
        if (!$this->request->isPost()) {
            $data = MenuModel::menu_lists();
            return view('menu', [
                'data' => $data
            ]);
        }
        $data = $this->request->post();
        if (count($data) != 2) {
            $this->red_notice_page('缺少数据');
        }
        if (!MenuModel::menu_add($data)) {
            $this->red_notice_page('操作出错');
        }
        $this->red_notice_page('设置成功', true);
    }

    public function menu_del($id = null) {
        if (!$id) {
            $this->red_notice_page('参数错误');
        }
        if (!MenuModel::menu_del(['id' => $id])) {
            $this->red_notice_page('操作出错');
        }
        $this->red_notice_page('已删除该菜单', true, url('tools/set_menu'));
    }

    public function set_content() {
        if (!$this->request->isPost()) {
            $menu = MenuModel::menu_lists();
            $data = MenucontentModel::menucontent_lists();
            return view('menucontent', [
                'menu' => $menu,
                'data' => $data
            ]);
        }
        $data = $this->request->post();
        $menu = MenuModel::get_menu(['id' => $data['menu_id']]);
        if (!$menu) {
            $this->red_notice_page('菜单出错');
        }
        $menu_name = $menu['name'];
        $data['menu_name'] = $menu_name;
        if (!MenucontentModel::menucontent_add($data)) {
            $this->red_notice_page('操作出错');
        }
        $this->red_notice_page('操作成功', true);
    }

    public function look_content($id = null) {
        if (!$id) {
            $this->red_notice_page('参数错误');
        }
        $menucontent = MenucontentModel::get_menucontent(['id' => $id]);
        if (!$menucontent) {
            $this->red_notice_page('信息不存在');
        }
        return view('detail', [
            'menucontent' => $menucontent
        ]);
    }

    public function set_bigimg() {
        if (!$this->request->isPost()) {
            $data = Bigimg::get_bigimg(['id' => 1]);
            return view('bigimg', [
                'data' => $data
            ]);
        }
        $logo = $this->request->file('logo');
        $big_img1 = $this->request->file('big_img1');
        $big_img2 = $this->request->file('big_img2');
        $big_img3 = $this->request->file('big_img3');
        $base_path = '/uploads/';
        $move_path = ROOT_PATH . 'public' . DS . 'uploads';
        $data = [];
        if ($logo){
            $logo_info = $logo->move($move_path);
            if ($logo_info){
                $logo_url = $base_path.$logo_info->getSaveName();
                $data['logo'] = $logo_url;
            }else{
                $this->red_notice_page($logo_info->getError());
            }
        }
        if ($big_img1){
            $img1_info = $big_img1->move($move_path);
            if ($img1_info) {
                $img_url1 = $base_path . $img1_info->getSaveName();
                $data['big_img1'] = $img_url1;
            } else {
                $this->red_notice_page($img1_info->getError());
            }
        }

        if ($big_img2){
            $img2_info = $big_img2->move($move_path);
            if ($img1_info) {
                $img_url2 = $base_path . $img2_info->getSaveName();
                $data['big_img2'] = $img_url2;
            } else {
                $this->red_notice_page($img2_info->getError());
            }
        }

        if ($big_img3){
            $img3_info = $big_img3->move($move_path);
            if ($img1_info) {
                $img_url3 = $base_path . $img3_info->getSaveName();
                $data['big_img3'] = $img_url3;
            } else {
                $this->red_notice_page($img3_info->getError());
            }
        }
        if (empty($data)){
            $this->red_notice_page('没有上传任何图片');
        }
        $data_img_list = Bigimg::get_bigimg(['id' => 1]);
        if (!$data_img_list){
            if (!Bigimg::bigimg_add($data)) {
                $this->red_notice_page('上传出错');
            }
        }else{
            if (!Bigimg::bigimg_edit($data, ['id'=>1])) {
                $this->red_notice_page('上传出错');
            }
        }
        $this->red_notice_page('上传成功',true);
    }
}