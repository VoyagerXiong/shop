<?php
namespace app\index\controller;

use app\common\model\Category;
use app\common\model\Goods;
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        $columns = Category::where('pid=0')->select();
        $hotgoods = Goods::randgood(5);
        $allgoods = cache('allgoods');
        if(!$allgoods){
            $allgoods = Goods::all();
            cache('allgoods',$allgoods);
        }
        return view('',compact('columns','allgoods','hotgoods'));
    }

    public function lists(Request $request){
        $columns = Category::where('pid=0')->select();
        $id = $request->get('id');
        $precolumn = Category::get($id);
        $sonCids = $this->getSon($id,Category::all());
        $sonCids[] = $id;
        $goods = Db::table('goods')->whereIn('category_id',$sonCids)->field('id,name,list_image,uptime,unitprice')->select();
        return view('',compact('precolumn','goods','columns'));
    }

    private function getSon($cid,$data){
        $temp = [];
        foreach ( $data as $v ) {
            //找到子集，然后记录主键到数组中
            if($v['pid'] == $cid){
                $temp[] = $v['id'];
                $temp = array_merge($this->getSon($v['id'],$data),$temp);
            }
        }
        return $temp;
    }

    public function detail(Request $request){
        $columns = Category::where('pid=0')->select();
        $id = $request->get('id');
        $good = Goods::get($id);
        $good->content_images = json_decode($good['content_images'],true);
        $goodslist = Db::table('goodslist')->where('goods_id','=',$good->id)->select();
        $commendgoods = Goods::randgood(3);
        return view('',compact('columns','good','goodslist','commendgoods'));
    }

    public function cart(){
        $columns = Category::where('pid=0')->select();
        return view('',compact('columns'));
    }

    public function search(Request $request){
        $columns = Category::where('pid=0')->select();
        $search = $request->post('input');
        $goods = Db::table('goods')->where('name','LIKE','%'.$search.'%')->select();
//        p($goods);exit;
        return view('',compact('search','goods','columns'));
    }
}