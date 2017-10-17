<?php
/**
 * Created by PhpStorm.
 * member: Administrator
 * Date: 2017-09-23
 * Time: 22:15
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class MemberModel extends Model {

    public static function get_member($where) {
        return Db::name('member')->where($where)->find();
    }

    public static function member_add($data) {
        return Db::name('member')->insert($data);
    }

    public static function member_edit($data, $where) {
        return Db::name('member')->where($where)->update($data);
    }

    public static function member_del($where) {
        return Db::name('member')->where($where)->delete();
    }

    public static function member_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('member');
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