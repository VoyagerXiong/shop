<?php

namespace app\common\model;

use think\Db;
use think\Model;

class Goods extends Model
{
    public static function randgood($len=0){
        if($len){
            $goods = Db::table('goods')->limit(rand(0,15),$len)->field('id,name,unitprice,list_image')->select();
        }else{
            $goods = Db::table('goods')->field('id,name,unitprice,list_image')->select();
        }
        return $goods;
    }
}
