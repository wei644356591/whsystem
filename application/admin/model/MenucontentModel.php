<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-03
 * Time: 17:29
 */

namespace app\admin\model;
use think\Db;

class MenucontentModel {
    public static function get_menucontent($where) {
        return Db::name('menucontent')->where($where)->find();
    }

    public static function menucontent_add($data) {
        return Db::name('menucontent')->insert($data);
    }

    public static function menucontent_edit($data, $where) {
        return Db::name('menucontent')->where($where)->update($data);
    }

    public static function menucontent_del($where) {
        return Db::name('menucontent')->where($where)->delete();
    }

    public static function menucontent_lists($where = null, $limit = null, $field= null,$search = array()) {
        $db = Db::name('menucontent');
        if ($where) {
            $db->where($where);
        }
        if ($field){
            $db->field($field);
        }
        if (!empty($search)){
            foreach ($search as $k => $item) {
                $db->whereLike($k, "%{$item}%", 'OR');
            }
        }
        if ($limit) {
            $data = $db->paginate($limit);
        }else{
            $data = $db->select();
        }
        return $data;
    }
}