<?php

namespace app\admin\controller;

use houdunwang\arr\Arr;
use think\Db;
use think\Loader;
use think\Request;
use app\common\model\Category;
use app\common\model\Goods as GoodsModel;
use app\common\model\Goodslist;

class Goods extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $goods = Db::table('goods')
            ->join('category', 'goods.category_id = category.id')
            ->field('*,goods.name gname,goods.id gid')
            ->paginate(5);
        $this->assign('good', $goods);
        // 渲染模板输出
        return $this->fetch('', compact('goods'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $categorydata = cache('categorydata');
        return view('create', compact('categorydata'));
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     */
    public function save(Request $request)
    {
//        数据验证
        $validate = Loader::validate('Goods');
        if (!$validate->check($request->post())) {
            $data = ['valid' => 0, 'message' => $validate->getError()];
            return $data;
        }
//        1.添加商品数据
        $goods = new GoodsModel();
        $goods->name = $request->post('name');
        $goods->unitprice = $request->post('price');
        $goods->uptime = $request->post('uptime');
        $goods->list_image = $request->post('list_image');
        $goods->content_images = json_encode($request->post()['content_image']);
        $goods->content = $request->post('content');
        $goods->click = $request->post('click');
        $goods->category_id = $request->post('category_id');
        $goods->save();
        $id = $goods->id;

//        2.添加货品数据
//        p($request->post('goodslist'));exit;
        $goodslist = json_decode($request->post('goodslist'), true);
//        p($goodslist);exit;
        foreach ($goodslist as $v) {
            $degoods = new Goodslist();
            $degoods->attr = $v['attr'];
            $degoods->inventory = $v['inventory'];
            $degoods->goods_id = $id;
            $degoods->save();
        }
        $data = ['valid' => 1, 'message' => '保存成功'];
        return $data;
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $categorydata = Arr::tree(Category::all(), 'name', 'id', 'pid');
        $oldData = GoodsModel::get($id);
        $oldData['uptime'] = date('Y-m-d', strtotime($oldData['uptime']));
        $oldData['content_images'] = json_decode($oldData['content_images'], true);
//        p($oldData);
        $degoods = Db::table('goodslist')->where('goods_id', $id)->select();
        $degoods = json_encode($degoods);
//        p($degoods);
        return view('', compact('oldData', 'categorydata', 'degoods'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
//        数据验证
        $validate = Loader::validate('Goods');
        if (!$validate->check($request->param())) {
            $data = ['valid' => 0, 'message' => $validate->getError()];
            return $data;
        }
//        1.商品表数据添加
        $goods = GoodsModel::get($id);
        $goods->name = $request->param('name');
        $goods->unitprice = $request->param('price');
        $goods->uptime = $request->param('uptime');
        $goods->list_image = $request->param('list_image');
        $goods->content_images = json_encode($request->param()['content_image']);
        $goods->content = $request->param('content');
        $goods->click = $request->param('click');
        $goods->category_id = $request->param('category_id');
        $goods->save();

//        2.货品数据添加
        Db::table('goodslist')->where('goods_id', $id)->delete();
        $goodslist = json_decode($request->param('goodslist'), true);
//        p($goodslist);exit;
        foreach ($goodslist as $v) {
            $degoods = new Goodslist();
            $degoods->attr = $v['attr'];
            $degoods->inventory = $v['inventory'];
            $degoods->goods_id = $id;
            $degoods->save();
        }
        $data = ['valid' => 1, 'message' => '修改成功'];
        return $data;
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     */
    public function delete($id)
    {
//        1.删除货品表数据
        Db::table('goodslist')->where('goods_id', $id)->delete();
//        2.删除商品表数据
        GoodsModel::destroy($id);
        $data = ['valid' => 1, 'message' => '删除成功'];
        return $data;
    }
}
