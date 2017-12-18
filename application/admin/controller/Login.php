<?php

namespace app\admin\controller;

use app\common\model\Users;
use think\Controller;
use think\Request;
use think\Session;
use think\Validate;

class Login extends Controller
{
    //方法名应该有具体的含义，少用index，test，demo
    public function index(Request $request)
    {
        if (IS_POST) {
            $post     = $request->post();
            $rule     = [
                ['username', 'require', '用户名必填'],
                ['password', 'require', '密码必填'],
            ];
            $validate = new Validate($rule);
            $result   = $validate->check($post);
            if (!$result) {
                return ['valid' => 0, 'message' => $validate->getError()];
            }
            //这些交给model来搞
            $data = Users::Where('username', '=', $post['username'])->where('is_admin', '=', 1)->find()->toArray();
            if (is_null($data) || $data['password'] != md5($post['password'])) {
                return ['valid' => 0, 'message' => '用户名或密码错误'];
            }
            Session::set('admin', $data);
            return ['valid' => 1, 'message' => '登录成功'];
        }
        return view();
    }

    public function logout()
    {
        Session::clear();
        //Session::delete('admin');
    }
}
