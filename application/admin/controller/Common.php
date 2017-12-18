<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Common extends Controller
{
    public function _initialize()
    {
//        p(__PUBLIC__);exit;
        $this->checkIsAdmin();
    }

    //不要在构造函数中写太多逻辑，上面那个可以单独列一个方法出来,这样结构清晰一些，方便添加其他方法
    private function checkIsAdmin(){
        $admin = Session::get('admin');
        if (!$admin || $admin['is_admin']!=1) {
            $this->redirect('login/index');
        }
    }
}
