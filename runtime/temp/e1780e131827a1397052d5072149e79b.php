<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/myaccount/myorder.php";i:1512975053;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>窝家商城</title>
    <link rel="stylesheet" type="text/css" href="/static/home/css/style.css">
</head>
<body>
<!-- start header -->
<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <li><a href="/" target="_blank">商城首页</a></li>
                <?php foreach($columns as $c): ?>
                <li>|</li>
                <li><a href="/index/index/lists?id=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
                <?php endforeach; ?>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr">
            <div class="gouwuche fr"><a href="/index/cartsave/index">购物车( <span name="total_rows"><?php echo \think\Session::get('cart.total_rows')?:0; ?></span>
                    )件</a></div>
            <div class="fr">
                <?php $user = \think\Session::get('user'); if (!$user||$user['is_admin']==1): ?>
                    <ul>
                        <li><a href="/index/user/login" target="_blank">登录</a></li>
                        <li>|</li>
                        <li><a href="/index/user/register" target="_blank">注册</a></li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li><a href="/index/myaccount/myorder"><?php echo $user['username']; ?></a></li>
                        <li>|</li>
                        <li><a href="/index/user/logout">退出</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</header>

<link href="/static/home/css/iconfont/iconfont.css" rel="stylesheet"/>
<link href="/static/home/css/common.css" rel="stylesheet"/>
<link href="/static/home/css/uc.css" rel="stylesheet"/>
<div class="wrapper">
    <div class="uc-main clearfix">
        <div class="uc-aside">
            <div class="uc-menu">
                <div class="tit">账户中心</div>
                <ul class="sublist">
                    <li><a class="active" href="myorder">我的订单</a></li>
                    <li><a href="/index/address/index">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-content">
            <div class="uc-panel">
                <div class="uc-bigtit">我的订单</div>
                <div class="uc-panel-bd">
                    <div class="uc-sort">
                        <div class="uc-tabs">
                            <a class="item <?php if($id==0): ?>active<?php endif; ?>" href="myorder">所有订单</a>
                            <a class="item <?php if($id==1): ?>active<?php endif; ?>" href="myorder?id=1">待付款</a>
                            <a class="item <?php if($id==2): ?>active<?php endif; ?>" href="myorder?id=2">待发货</a>
                            <a class="item <?php if($id==3): ?>active<?php endif; ?>" href="myorder?id=3">待收货</a>
                            <a class="item <?php if($id==4): ?>active<?php endif; ?>" href="myorder?id=4">已收货</a>
                            <a class="item <?php if($id==5): ?>active<?php endif; ?>" href="myorder?id=5">取消订单记录</a>
                        </div>
                    </div>
                    <table class="uc-table">
                        <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th width="150"></th>
                        </thead>
                        <?php foreach($goodsdata as $goods): if($goods): ?>
                        <tr class="hd order-meta">
                            <td colspan="4">
                                <div class="left"><?php echo $goods[0]['otime']; ?> 订单号: <?php echo $goods[0]['ordernum']; ?></div>
                                <div class="right">店铺：<a href="">窝家商城</a></div>
                                <!--                                    <span class="del iconfont icon-shanchu"></span>-->
                            </td>
                        </tr>
                        <?php foreach($goods as $good): ?>
                        <tr class="order-goods">
                            <td>
                                <div class="goods-info">
                                    <img class="figure" src="/<?php echo $good['list_image']; ?>" alt=""/>
                                    <div class="info">
                                        <div><?php echo $good['name']; ?> <?php echo $good['attr']; ?></div>
                                        <div>￥<?php echo $good['unitprice']; ?> × <?php echo $good['totalnum']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                小计：<span class="text-theme fwb"><?php echo $good['price']; ?> 元</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr class="order-goods">
                            <td>
                            </td>

                            <td>
                                总计：<span class="text-theme fwb"><?php echo $good['totalprice']; ?>元</span>
                            </td>
                            <td>
                                <span class="status">
                                    <?php if($goods[0]['status']==1): ?>待付款<?php endif; if($goods[0]['status']==2): ?>待发货<?php endif; if($goods[0]['status']==3): ?>待收货<?php endif; if($goods[0]['status']==4): ?>已收货<?php endif; if($goods[0]['status']==5): ?>订单已取消<?php endif; ?>
                                </span><br/>
                                <a class="text-info" href="orderdetail?id=<?php echo $goods[0]['oid']; ?>">订单详情</a><br/>
                            </td>
                            <td>
                                <?php if($goods[0]['status']==1): ?>
                                <a href="/index/order/gopay?id=<?php echo $goods[0]['oid']; ?>" class="ui-btn-theme uc-btn-md">去付款</a>
                                <a href="javascript:usercancel(<?php echo $goods[0]['oid']; ?>);" class="ui-btn-theme uc-btn-md"
                                   style="border-color: red;background: red;">取消订单</a>
                                <?php endif; if($goods[0]['status']==2): ?>
                                <!--                                <a href="javascript:;" class="ui-btn-theme uc-btn-md">去催单</a>-->
                                <a href="javascript:usercancel(<?php echo $goods[0]['oid']; ?>);" class="ui-btn-theme uc-btn-md"
                                   style="border-color: red;background: red;">取消订单</a>
                                <?php endif; if($goods[0]['status']==3): ?>
                                <a href="javascript:delivery(<?php echo $goods[0]['oid']; ?>);"
                                   class="ui-btn-theme uc-btn-md">确认收货</a>
                                <?php endif; if($goods[0]['status']==4): ?>
                                <a href="orderdetail?id=<?php echo $goods[0]['oid']; ?>" class="ui-btn-theme uc-btn-md">查看订单</a>
                                <?php endif; if($goods[0]['status']==5||$goods[0]['status']==6): ?>
                                <a href="javascript:;" class="ui-btn-theme uc-btn-md"
                                   style="border-color: #ccc;background:#ccc;">订单已取消</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/jquery.min.js"></script>
<link rel="stylesheet" href="/static/home/js/icheck/style.css"/>
<script src="/static/home/js/icheck/icheck.min.js"></script>
<script src="/static/home/js/layer/layer.js"></script>
<script src="/static/home/js/global.js"></script>
<script>
    //确认收获
    function delivery(id) {
        layer.confirm('您确定要收货吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url: 'delivery?id=' + id,
                success: function (res) {
                    layer.alert('已取消订单', function () {
                        location.reload();
                    })
                }
            });
        }, function(){
        });
    }

    //取消订单
    function usercancel(id) {
        $.ajax({
            url: 'usercancel?id=' + id,
            success: function (res) {
                layer.alert('已取消订单', function () {
                    location.reload();
                })
            }
        })
    }
</script>


<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>