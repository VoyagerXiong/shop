<?php
/**
 * Created by PhpStorm.
 * User: Aubrey.Xiong
 * Date: 2017/12/3
 * Time: 17:23
 */

namespace app\common\validate;


use think\Validate;

class Goods extends Validate
{
    protected $rule = [
        'name'  =>  'require',
        'price'  =>  'require',
        'list_image'  =>  'require',
        'content_image'  =>  'require',
        'content'  =>  'require',
        'goodslist'  =>  'require'

    ];

    protected $message = [
        'name.require'  =>  '商品名称必填',
        'price.require'  =>  '请填写商品价格',
        'list_image.require'  =>  '请上传商品列表页图片',
        'content_image.require'  =>  '请至少上传一张商品内容页图片',
        'content.require'  =>  '请填写商品详情',
        'goodslist.require'  =>  '请填写货品信息'
    ];
}