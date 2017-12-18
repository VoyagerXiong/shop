<?php
/**
 * Created by PhpStorm.
 * User: Aubrey.Xiong
 * Date: 2017/12/3
 * Time: 17:23
 */

namespace app\common\validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [
        'password'  =>  'require|min:6',
    ];

    protected $message = [
        'password.min'  =>  '新密码不得少于6个字符',
        'password.require'  =>  '新密码不得少于6个字符',
    ];
}