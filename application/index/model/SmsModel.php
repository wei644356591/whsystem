<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 下午 4:12
 */

namespace app\index\model;

use think\Db;
use think\Model;

class SmsModel extends Model {

    public static function get_sms($where) {
        return Db::name('sms')->order('id DESC')->where($where)->find();
    }

    public static function sms_add($data) {
        return Db::name('sms')->insert($data);
    }

    public static function sms_edit($data, $where) {
        return Db::name('sms')->where($where)->update($data);
    }

    public static function sms_del($where) {
        return Db::name('sms')->where($where)->delete();
    }

    public static function sms_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('sms');
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