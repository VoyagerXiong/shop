<?php

namespace app\common\model;

use houdunwang\arr\Arr;
use think\Model;

class Category extends Model
{
    public static function excludeMine($id)
    {
        $data = self::all();
        $data = $data ? $data:[];
        $data = Arr::tree($data, 'name', 'id', 'pid');
        foreach ($data as $k => $v){
            if(Arr::isChild($data, $v['id'], $id, $fieldPri = 'id', $fieldPid = 'pid')||$v['id']==$id){
                $data[$k]['_disabled']='disabled';
            }else{
                $data[$k]['_disabled']='';
            }
        }
        return $data;

    }
}
