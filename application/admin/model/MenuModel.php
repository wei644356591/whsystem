<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-03
 * Time: 16:20
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class MenuModel extends Model {

    public static function get_menu($where) {
        return Db::name('menu')->where($where)->find();
    }

    public static function menu_add($data) {
        return Db::name('menu')->insert($data);
    }

    public static function menu_edit($data, $where) {
        return Db::name('menu')->where($where)->update($data);
    }

    public static function menu_del($where) {
        return Db::name('menu')->where($where)->delete();
    }

    public static function menu_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('menu');
        $db->order('order');
        if ($where) {
            $db->where($where);
        }
        if (!empty($search)) {
            foreach ($search as $k => $item) {
                $db->whereLike($k, "%{$item}%", 'OR');
            }
        }
        if ($limit) {
            $db->limit($limit);
        }
        $data = $db->select();
        return $data;
    }
}