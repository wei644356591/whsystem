<?php
/**
 * Created by PhpStorm.
 * qrcode: Administrator
 * Date: 2017-09-26
 * Time: 22:49
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class QrcodeModel extends Model {
    public static function get_qrcode($where) {
        return Db::name('qrcode')->order('id DESC')->where($where)->find();
    }

    public static function qrcode_add($data) {
        return Db::name('qrcode')->insert($data);
    }

    public static function qrcode_edit($data, $where) {
        return Db::name('qrcode')->where($where)->update($data);
    }

    public static function qrcode_del($where) {
        return Db::name('qrcode')->where($where)->delete();
    }

    public static function qrcode_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('qrcode');
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