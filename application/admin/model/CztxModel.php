<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-10-03
 * Time: 11:30
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class CztxModel extends Model {
    public static function get_cztx($where) {
        return Db::name('cztx')->where($where)->find();
    }

    public static function cztx_add($data) {
        return Db::name('cztx')->insert($data);
    }

    public static function cztx_edit($data, $where) {
        return Db::name('cztx')->where($where)->update($data);
    }

    public static function cztx_del($where) {
        return Db::name('cztx')->where($where)->delete();
    }

    public static function cztx_lists($where = null, $limit = null, $search = array()) {
        $db = Db::name('cztx');
        if ($where) {
            $db->where($where);
        }
        if (!empty($search)){
            $n = 0;
            foreach ($search as $k => $item) {
                $n++;
                if ($n==1){
                    $connect = !$where ? 'OR' : 'AND';
                    $db->whereLike($k, "%{$item}%", $connect);
                }else{
                    $db->whereLike($k, "%{$item}%", 'OR');
                }
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