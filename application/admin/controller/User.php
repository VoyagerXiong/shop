<?php

namespace app\admin\controller;

use think\Db;
use think\Loader;
use think\Request;
use think\Session;
use think\Validate;

class User extends Common
{
    public function changePassword(Request $request)
    {
//        p(md5(123456));
        if (IS_POST) {
            $post     = $request->post();
            $validate = Loader::validate('User');
            if (!$validate->check($post)) {
                $data = ['valid' => 0, 'message' => $validate->getError()];
                return $data;
            }
            if ($post['password'] != $post['password_confirmation']) {
                return ['valid' => 0, 'message' => '两次密码输入不一致'];
            }
            if (md5($post['old_password']) != Session::get('user')['password']) {
                return ['valid' => 0, 'message' => '原始密码不正确'];
            }
            Db::table('users')->where('id', Session::get('user')['id'])->update(['password' => md5($post['password'])]);
            return ['valid' => 1, 'message' => '修改成功'];
        }
        return view();
    }
}