<?php

namespace app\component\controller;

use think\Controller;
use think\Request;

class Upload extends Controller
{
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                $path = 'uploads/'.date('Ymd').DS.$info->getFilename();
//                p($path);exit;
                return ['valid'=>1,'message'=>'上传成功','path'=>$path];
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}
