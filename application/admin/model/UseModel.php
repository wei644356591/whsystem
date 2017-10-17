<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-04
 * Time: 17:19
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class UseModel extends Model {

    public static function get_use($where, $order = null) {
        $db = Db::name('use');
        $db->where($where);
        if ($order) {
            $db->order($order);
        }
        return $db->find();
    }

    public static function use_add($data) {
        return Db::name('use')->insert($data);
    }

    public static function use_edit($data, $where) {
        return Db::name('use')->where($where)->update($data);
    }

    public static function use_del($where) {
        return Db::name('use')->where($where)->delete();
    }

    public static function use_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('use');
        if ($where) {
            $db->where($where);
        }
        if (!empty($search)) {
            foreach ($search as $k => $item) {
                $db->whereLike($k, "%{$item}%", 'OR');
            }
        }
        if ($limit) {
            $data = $db->paginate($limit);
        } else {
            $data = $db->select();
        }
        return $data;
    }
}