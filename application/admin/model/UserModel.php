<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-23
 * Time: 22:15
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class UserModel extends Model {

    public static function get_user($where) {
        return Db::name('user')->where($where)->find();
    }

    public static function user_add($data) {
        return Db::name('user')->insert($data);
    }

    public static function user_edit($data, $where) {
        return Db::name('user')->where($where)->update($data);
    }

    public static function user_del($where) {
        return Db::name('user')->where($where)->delete();
    }

    public static function user_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('user');
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