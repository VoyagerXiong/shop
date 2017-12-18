<?php

namespace app\index\controller;

use app\common\model\Address;
use app\common\model\Category;
use app\common\model\Orders;
use app\common\model\Orderslist;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Order extends Controller
{
    public function confirm(){
        $user = Session::get('user');
        if(!isset($user)||$user['is_admin']==1){
            return ['valid'=>0,'message'=>'请先去登录吧'];
        }
//        p(Session::get());
        $columns = Category::all();
        $cart = Session::get('cart');
        $address = Db::table('address')->where('user_id',Session::get('user.id'))->where('is_default','NEQ',2)->order('id','DESC')->select();
//        p(sprintf('%.2f',2));
        return view('',compact('columns','cart','address'));
    }

    public function gopay(Request $request){
        $columns = Category::all();
//        $id = Session::get('orderid');
        $id = $request->get('id');
//        p($id);
        $orderdata = Db::table('orders')
            ->join('address','orders.address_id = address.id')
            ->where('orders.id',$id)
            ->field('*,orders.id oid')
            ->find();
        $goodsdata = Db::table('orders')
            ->join('orderslist','orders.id = orderslist.order_id')
            ->join('goodslist','orderslist.good_id = goodslist.id')
            ->join('goods','goodslist.goods_id = goods.id')
            ->where('orders.id',$id)
            ->select();
        return view('',compact('columns','orderdata','goodsdata'));
    }

    public function addOrder(Request $request){
        $post = $request->post();
        $address =Db::table('address')->where('user_id',Session::get('user.id'))->find();
//        p($address);exit;
        if(!$address){
            return $this->error('请选择配送地址');
        }
//        1.添加订单表
        $orders = new Orders();
        $orders->ordernum = (new Cart())->getOrderId();
        $orders->totalprice = Session::get('cart.total');
        $orders->user_id = Session::get('user.id');
        $orders->address_id = $address['id'];
        $orders->status = 1;
        $orders->remark = json_encode($post['remark']);
        $orders->create_time = date('Y-m-d H:i:s');
        $orders->save();
        $id = $orders->id;
//        2.添加订单列表
        $goods = Session::get('cart.goods');
        foreach($goods as $good){
            static $k = 0;
            $orderslist = new Orderslist();
            $orderslist->order_id = $id;
            $orderslist->totalnum = $good['num'];
            $orderslist->price = $good['total'];
            $orderslist->good_id = $good['id'];
            $orderslist->remark = $post['remark'][$k];
            $orderslist->save();
            $k++;
        }
//        Session::set('orderid',$id);
        Session::delete('cart');
        return $this->redirect('/index/order/gopay?id='.$id);
    }

    public function payfinished(Request $request){
        $id = $request->param('id');
        $model = Orders::get($id);
        $model->status = 2;
        $model->save();
    }

}
