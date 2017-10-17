<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-14
 * Time: 23:08
 */

namespace app\index\model;

use think\Db;
use think\Model;
//冻结情况表
class AssetModel extends Model {

    public static function get_asset($where) {
        return Db::name('asset')->order('id DESC')->where($where)->find();
    }

    public static function asset_add($data) {
        return Db::name('asset')->insert($data);
    }

    public static function asset_edit($data, $where) {
        return Db::name('asset')->where($where)->update($data);
    }

    public static function asset_del($where) {
        return Db::name('asset')->where($where)->delete();
    }

    public static function asset_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('asset');
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