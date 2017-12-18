<?php
/**
 * Created by PhpStorm.
 * User: voyager
 * Date: 12/9/17
 * Time: 8:36 PM
 */

namespace app\index\controller;


use app\common\model\Category;
use think\Controller;
use app\common\model\Address as AddressModel;
use think\Db;
use think\Request;
use think\Session;

class Address extends Controller
{

    public function index()
    {
        $columns = Category::all();
        $address = Db::table('address')->where('user_id', Session::get('user.id'))->where('is_default','NEQ',2)->select();
        return view('', compact('columns', 'address'));
    }

    public function addAddress(Request $request)
    {
        Db::table('address')->where('user_id', Session::get('user.id'))->where('is_default',1)->update(['is_default' => 0]);
        $post = $request->post();
//        p($post);exit;
        $address = new AddressModel();
        $address->user_id = Session::get('user.id');
        $address->username = $post['username'];
        $address->userphone = $post['userphone'];
        $address->province = $post['province'];
        $address->city = $post['city'];
        $address->district = $post['district'];
        $address->address = $post['address'];
        $address->is_default = 1;
        $address->save();
    }


    public function changeAddress(Request $request)
    {
        $id = $request->param('id');
        Db::table('address')->where('user_id', Session::get('user.id'))->where('is_default',1)->update(['is_default' => 0]);
        Db::table('address')->where('id', $id)->update(['is_default' => 1]);
    }

    public function delAddress($id)
    {
//        AddressModel::destroy($id);
        Db::table('address')->where('id', $id)->update(['is_default' => 2]);
    }

    public function edit(Request $request,$id)
    {
        $columns = Category::all();
        $address = AddressModel::get($id);
        if (IS_POST) {
            $post = $request->post();
            $address->username = $post['username'];
            $address->userphone = $post['userphone'];
            $address->province = $post['province'];
            $address->city = $post['city'];
            $address->district = $post['district'];
            $address->address = $post['address'];
            $address->save();
            return $this->success('修改成功','index');
        }
        return view('', compact('columns', 'address'));
    }

}