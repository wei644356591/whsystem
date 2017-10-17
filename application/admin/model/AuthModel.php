<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-09-28
 * Time: 21:27
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class AuthModel extends Model {

    public static function get_auth($where) {
        return Db::name('auth')->order('id DESC')->where($where)->find();
    }

    public static function auth_add($data) {
        return Db::name('auth')->insert($data);
    }

    public static function auth_edit($data, $where) {
        return Db::name('auth')->where($where)->update($data);
    }

    public static function auth_del($where) {
        return Db::name('auth')->where($where)->delete();
    }

    public static function auth_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('auth');
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