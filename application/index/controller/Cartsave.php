<?php

namespace app\index\controller;

use app\common\model\Category;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Cartsave extends Controller
{
    public function addcart(Request $request)
    {
        $id = $request->param('id');
        if (!$id) {
            return ['valid' => 0, 'message' => '请选择商品分类'];
        }
        $data = Db::table('goods')
            ->join('goodslist', 'goods.id = goodslist.goods_id')
            ->where('goodslist.id', $id)
            ->find();
        $cartdata = [
            'id'        => $data['id'],
            'name'      => $data['name'],
            'price'     => $data['unitprice'],
            'num'       => $request->param('num'),
            'inventory' => $data['inventory'],
            'options'   => [
                'attr'       => $data['attr'],
                'list_image' => $data['list_image']
            ]
        ];
        $cart = new Cart();
        $cart->add($cartdata);
        return ['valid' => 1, 'message' => '已成功添加至购物车', 'num' => Session::get('cart')['total_rows']];
    }

    public function index()
    {
        $columns = Category::all();
        $cart = Session::get('cart');
        if (isset($cart)&&count($cart['goods'])!=0) {
            return view('', compact('columns', 'cart'));
        }
        return view('cartsave/cartempty', compact('columns'));
    }

    public function update(Request $request)
    {
        $data = $request->param();
        (new Cart())->update($data);
    }

    public function del(Request $request)
    {
        $id = $request->param('sid');
        (new Cart())->del($id);
    }
}
