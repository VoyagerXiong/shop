<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/address/edit.php";i:1512984527;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
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
<link href="/static/home/css/cart.css" rel="stylesheet"/>
<script src="/static/js/jquery.min.js"></script>
<link rel="stylesheet" href="/static/home/js/icheck/style.css"/>
<script src="/static/home/js/icheck/icheck.min.js"></script>
<script src="/static/home/js/layer/layer.js"></script>
<script src="/static/home/js/global.js"></script>
<script src="/static/js/third.js"></script>
<script src="/static/js/third2.js"></script>
<script src="/static/js/main.js"></script>
<div class="wrapper">
    <div class="uc-main clearfix">
        <div class="uc-aside">
            <div class="uc-menu">
                <div class="tit">账户中心</div>
                <ul class="sublist">
                    <li><a class="active" href="/index/myaccount/myorder">我的订单</a></li>
                    <li><a href="/index/address/index">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-content">
            <div class="uc-panel">
                <div class="uc-bigtit">收货地址</div>
                <div id="addressform" class="layer-address">
                <form method="post" action="" id="address">
                    <div class="control-group">
                        <div class="hd">
                            收货人姓名：
                        </div>
                        <div class="bd">
                            <input class="ui-txtin ui-txtin-thin" style="width: 200px;" type="text" name="username" value="<?php echo $address['username']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd">
                            联系电话：
                        </div>
                        <div class="bd">
                            <input class="ui-txtin ui-txtin-thin" style="width: 200px;" type="text" name="userphone" value="<?php echo $address['userphone']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd vat">
                            所在地区：
                        </div>
                        <div class="bd">
                            <div data-toggle="distpicker"><!-- container -->
                                <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="province" data-province="<?php echo $address['province']; ?>"></select><!-- 省 -->
                                <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="city" data-city="<?php echo $address['city']; ?>"></select><!-- 市 -->
                                <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="district" data-district="<?php echo $address['district']; ?>"></select><!-- 区 -->
                            </div>

                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd vat">
                            详细地址：
                        </div>
                        <div class="bd">
                            <div class="mt10">
                                <input class="ui-txtin ui-txtin-thin" style="width: 560px;" type="text" name="address" value="<?php echo $address['address']; ?>"
                                       placeholder="请填写具体地址，不需要重复填写省/市/区">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd">
                            设置为默认地址：
                        </div>
                        <div class="bd">
                            <input class="ui-txtin ui-txtin-thin" type="checkbox" name="is_default" value="1"> 是
                        </div>
                    </div>
                    <div class="control-bottom clearfix">
                        <button class="fl ui-btn-theme" style="margin-left: 80px;">保存</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>