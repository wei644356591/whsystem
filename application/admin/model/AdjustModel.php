<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-04
 * Time: 21:37
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class AdjustModel extends Model {
    public static function get_adjust($where) {
        return Db::name('adjust')->order('id DESC')->where($where)->find();
    }

    public static function adjust_add($data) {
        $db = Db::name('adjust');
        return count($data) == count($data, 1) ? $db->insert($data) : $db->insertAll($data);
    }

    public static function adjust_edit($data, $where) {
        return Db::name('adjust')->where($where)->update($data);
    }

    public static function adjust_del($where) {
        return Db::name('adjust')->where($where)->delete();
    }

    public static function adjust_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('adjust');
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