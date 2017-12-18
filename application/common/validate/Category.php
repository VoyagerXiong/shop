<?php
/**
 * Created by PhpStorm.
 * User: Aubrey.Xiong
 * Date: 2017/12/3
 * Time: 17:23
 */

namespace app\common\validate;


use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:5',
    ];

    protected $message = [
        'name.require'  =>  '栏目名称必填',
        'name.max'  =>  '栏目名称不得超过5个字符',
    ];
    //验证场景
    protected $scene = [
        'save'   =>  ['name'],
        'update'  =>  ['name'],
    ];
}