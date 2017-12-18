<?php

namespace app\admin\controller;

use app\common\model\Address;
use app\common\model\Orders;
use houdunwang\arr\Arr;
use think\Db;
use think\Loader;
use think\Request;
use \app\common\model\Category as CategoryData;

class Order extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $orders = Db::table('orders')->order('id','DESC')->paginate(5);
        $this->assign('orders', $orders);
        return $this->fetch('', compact('orders'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
    }

    /**
     * 保存新建的资源
     */
    public function save(Request $request)
    {
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        $goodsdata = Db::table('orders')
            ->join('orderslist', 'orders.id = orderslist.order_id')
            ->join('goodslist', 'orderslist.good_id = goodslist.id')
            ->join('goods', 'goodslist.goods_id = goods.id')
            ->where('orders.id', $id)
            ->field('*,orders.id oid')
            ->select();
        $addressid = $goodsdata[0]['address_id'];
        $userinfo = Address::get($addressid);
        return view('',compact('goodsdata','userinfo'));
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $oldData = Orders::get($id);
        return view('edit', compact('oldData'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
        $model = Orders::find($id);
        $model->status = 3;
        $model->save();
        $data = ['valid' => 1, 'message' => '发货成功'];
        return $data;
    }

    /**
     * 删除指定资源
     */
    public function delete($id)
    {
        $model = Orders::find($id);
        $model->status = 5;
        $model->save();
        $data = ['valid' => 1, 'message' => '取消成功'];
        return $data;
    }
}
