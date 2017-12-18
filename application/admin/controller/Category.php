<?php

namespace app\admin\controller;

use houdunwang\arr\Arr;
use think\Db;
use think\Loader;
use think\Request;
use \app\common\model\Category as CategoryData;

class Category extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $categorydata = cache('categorydata');
        if(!$categorydata){
            $categorydata = CategoryData::all();
            $categorydata = Arr::tree($categorydata, 'name', 'id', 'pid');
            cache('categorydata',$categorydata);
        }
        return view('index', compact('categorydata'));
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
     */
    public function save(Request $request)
    {
        $post = $request->post();
        $validate = Loader::validate('Category');
        if (!$validate->check($post)) {
            $data = ['valid' => 0, 'message' => $validate->getError()];
            return $data;
        }
        $model = new CategoryData();
        $model->save($post);
        $data = ['valid' => 1, 'message' => '保存成功'];
        cache('categorydata',NULL);
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
        $oldData = CategoryData::get($id);
        $categorydata = CategoryData::excludeMine($id);
        return view('edit', compact('categorydata', 'oldData'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
        $model = CategoryData::get($id);
        $model->update($request->param());
        $data = ['valid' => 1, 'message' => '保存成功'];
        cache('categorydata',NULL);
        return $data;
    }

    /**
     * 删除指定资源
     */
    public function delete($id)
    {
//        1.删除栏目需确认是否有文章
        $goodsData = Db::table('goods')->where('category_id','=',$id)->find();
//        p($goodsData);exit;
        if($goodsData){
            return ['valid' => 0, 'message' => '请先删除栏目中的商品'];
        }
//        2.删除栏目需确认是否有子栏目
        $sonCategory = Db::table('category')->where('pid', '=', $id)->find();
//        p($sonCategory);exit;
        if ($sonCategory) {
            return ['valid' => 0, 'message' => '请先删除栏目中的子栏目'];
        }
        CategoryData::destroy($id);
        $data = ['valid' => 1, 'message' => '删除成功'];
        cache('categorydata',NULL);
        return $data;
    }
}
