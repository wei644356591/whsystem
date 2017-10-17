<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-26
 * Time: 23:56
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class ConsumeModel extends Model {
    public static function get_consume($where) {
        return Db::name('consume')->order('id DESC')->where($where)->find();
    }

    public static function consume_add($data) {
        return Db::name('consume')->insert($data);
    }

    public static function consume_edit($data, $where) {
        return Db::name('consume')->where($where)->update($data);
    }

    public static function consume_del($where) {
        return Db::name('consume')->where($where)->delete();
    }

    public static function consume_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('consume');
        if ($where) {
            $db->where($where);
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