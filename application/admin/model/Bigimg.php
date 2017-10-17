<?php
/**
 * Created by PhpStorm.
 * bigimg: Administrator
 * Date: 2017-10-04
 * Time: 11:19
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class Bigimg extends Model {

    public static function get_bigimg($where) {
        return Db::name('bigimg')->where($where)->find();
    }

    public static function bigimg_add($data) {
        return Db::name('bigimg')->insert($data);
    }

    public static function bigimg_edit($data, $where) {
        return Db::name('bigimg')->where($where)->update($data);
    }

    public static function bigimg_del($where) {
        return Db::name('bigimg')->where($where)->delete();
    }

    public static function bigimg_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('bigimg');
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