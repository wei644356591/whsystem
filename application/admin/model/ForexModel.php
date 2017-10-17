<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-07
 * Time: 21:03
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class ForexModel extends Model {
    public static function get_forex($where, $order = null) {
        $db = Db::name('forex');
        $db->where($where);
        if ($order) {
            $db->order($order);
        }
        return $db->find();
    }

    public static function forex_add($data) {
        $db = Db::name('forex');
        return count($data) == count($data, 1) ? $db->insert($data) : $db->insertAll($data);
    }

    public static function forex_edit($data, $where) {
        return Db::name('forex')->where($where)->update($data);
    }

    public static function forex_del($where) {
        return Db::name('forex')->where($where)->delete();
    }

    public static function forex_lists($where = null, $limit = null, $order = null, $search = array()) {
        $db = Db::name('forex');
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
        if ($order){
            $db->order($order);
        }
        return $data;
    }
}