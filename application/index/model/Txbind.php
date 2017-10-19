<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/19 0019
 * Time: 下午 4:07
 */

namespace app\index\model;

use think\Db;
use think\Model;

class Txbind extends Model {

    public static function get_txbind($where) {
        return Db::name('txbind')->order('id DESC')->where($where)->find();
    }

    public static function txbind_add($data) {
        return Db::name('txbind')->insert($data);
    }

    public static function txbind_edit($data, $where) {
        return Db::name('txbind')->where($where)->update($data);
    }
    public static function txbind_count($field, $where) {
        return Db::name('txbind')->where($where)->count($field);
    }

    public static function txbind_del($where) {
        return Db::name('txbind')->where($where)->delete();
    }

    public static function txbind_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('txbind');
        $db->order('id DESC');
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