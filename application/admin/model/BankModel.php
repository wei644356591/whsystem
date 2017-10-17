<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class BankModel extends Model {
    public static function get_bank($where) {
        return Db::name('bank')->order('id DESC')->where($where)->find();
    }

    public static function bank_add($data) {
        $db = Db::name('bank');
        return count($data) == count($data, 1) ? $db->insert($data) : $db->insertAll($data);
    }

    public static function bank_edit($data, $where) {
        return Db::name('bank')->where($where)->update($data);
    }

    public static function bank_del($where) {
        return Db::name('bank')->where($where)->delete();
    }

    public static function bank_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('bank');
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