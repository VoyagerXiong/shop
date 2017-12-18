<?php
/**
 * Created by PhpStorm.
 * User: Aubrey.Xiong
 * Date: 2017/12/5
 * Time: 18:55
 */

namespace app\index\controller;

use app\common\model\Address;
use app\common\model\Users;
use Gregwar\Captcha\CaptchaBuilder;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class User extends Controller
{
    public function login(Request $request)
    {
        if (IS_POST) {
            $post = $request->post();
            if(!captcha_check($post['captcha'])){
                return $this->error('验证码错误');
            };
            $userdata = Users::Where('username', '=', $post['username'])->where('is_admin', '=', 0)->find();
            if (!$userdata || $userdata['password'] != md5($post['password'])) {
                return $this->error('用户名或者密码错误');
            }
            Session::set('user', $userdata);
            return $this->success('登录成功', '/');
        }
        return view('');
    }

    public function register(Request $request)
    {
        if (IS_POST) {
            $post = $request->post();
            $username = trim($post['username']);
            $password = trim($post['password']);
            if(!captcha_check($post['captcha'])){
                return $this->error('验证码错误');
            };
            if (strlen($username) == 0) {
                return ['valid' => 0, 'message' => '用户名必填'];
            }
            $olduser = Db::table('users')->where('username', $post['username'])->find();
            if ($olduser) {
                return ['valid' => 0, 'message' => '此用户已存在'];
            }
            if (strlen($password) < 6) {
                return ['valid' => 1, 'message' => '密码不得少于6个字符'];
            }
            if ($post['password'] != $post['repassword']) {
                return ['valid' => 2, 'message' => '两次密码输入不一致'];
            }
            $preg = '/^1[34578]\d{9}$/';
            if (!preg_match($preg, $post['tel'])) {
                return ['valid' => 3, 'message' => '请输入正确的手机号'];
            }
            $user = new Users();
            $user->username = $username;
            $user->password = md5($password);
            $user->save();
            return ['valid' => 5, 'message' => '注册成功'];
        }
        return view();
    }

    public function logout()
    {
        Session::delete('user');
        return $this->redirect('/');
    }

}