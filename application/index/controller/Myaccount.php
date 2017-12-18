<?php
/**
 * Created by PhpStorm.
 * User: voyager
 * Date: 12/9/17
 * Time: 7:39 PM
 */

namespace app\index\controller;


use app\common\model\Category;
use app\common\model\Orders;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use app\common\model\Address;

class Myaccount extends Controller
{
    public function myorder($id=0){
        $columns = Category::all();
        if(!$id){
            $orders = Db::table('orders')->where('user_id',Session::get('user.id'))->order('id','DESC')->select();
        }else{
            $orders = Db::table('orders')->where('user_id',Session::get('user.id'))->where('status',$id)->order('ordernum','DESC')->select();
        }
        $goodsdata=[];
        foreach($orders as $order){
            $goodsdata[] = Db::table('orders')
                ->join('orderslist','orders.id = orderslist.order_id')
                ->join('goodslist','orderslist.good_id = goodslist.id')
                ->join('goods','goodslist.goods_id = goods.id')
                ->where('orders.id',$order['id'])
                ->field('*,orders.id oid,orders.create_time otime')
                ->select();
        }
//        p($goodsdata);exit;
        return view('',compact('columns','goodsdata','obligation','id'));
    }

    public function orderdetail(Request $request){
        $columns = Category::all();
        $id = $request->param('id');
        $goodsdata = Db::table('orders')
            ->join('orderslist','orders.id = orderslist.order_id')
            ->join('goodslist','orderslist.good_id = goodslist.id')
            ->join('goods','goodslist.goods_id = goods.id')
            ->where('orders.id',$id)
            ->field('*,orders.create_time otime')
            ->order('orders.id','DESC')
            ->select();
//        p($goodsdata);
        $addressid = $goodsdata[0]['address_id'];
        $userinfo = Address::get($addressid);
        return view('',compact('columns','goodsdata','userinfo'));
    }


    public function delivery($id){
        $model = Orders::get($id);
        $model->status = 4;
        $model->save();
    }

    public function usercancel($id){
        $model = Orders::get($id);
        $model->status = 5;
        $model->save();
    }
}