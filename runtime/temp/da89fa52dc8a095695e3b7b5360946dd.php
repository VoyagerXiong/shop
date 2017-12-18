<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/order/gopay.php";i:1512826827;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512897167;}*/ ?>
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
                        <li>|</li>
                        <li><a href="">消息通知</a></li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li><a href="/index/myaccount/myorder"><?php echo $user['username']; ?></a></li>
                        <li>|</li>
                        <li><a href="/index/user/logout">退出</a></li>
                        <li>|</li>
                        <li><a href="">消息通知</a></li>
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
<link href="/static/home/css/cart.css" rel="stylesheet"/>
<div class="cart-header wrapper">
    <div class="logo">
        <a href="index.html"><img src="/static/home/img/logo.png" alt="logo"/></a>
    </div>
    <div class="banner_x center" style="width: 440px;margin-top: 13px;float: left;">
        <a href="./index.html" target="_blank">
            <div class="logo fl"></div>
        </a>
        <!--        <div class="wdgwc fl ml40">我的购物车</div>-->
        <div class="clear"></div>
    </div>
    <div class="step-box">
        <div class="row">
            <div class="step first active col-3">
                <span class="num">1</span><span class="line"></span><span class="label">我的购物车</span>
            </div>
            <div class="step active col-3">
                <span class="num">2</span><span class="line"></span><span class="label">确认订单信息</span>
            </div>
            <div class="step active col-3">
                <span class="num">3</span><span class="line"></span><span class="label">选择支付方式</span>
            </div>
            <div class="step last col-3">
                <span class="num">4</span><span class="line"></span><span class="label">完成付款</span>
            </div>
        </div>
    </div>
</div>
<!--头部-->

<div class="wrapper">
    <div class="pay-wrap">
        <div class="order-result">
            <div class="section clearfix">
                <img src="/static/home/img/ico/order-success.jpg" class="ico"/>
                <div class="titbox">
                    <div class="tit">订单提交成功，应付金额 <?php echo $orderdata['totalprice']; ?> 元</div>
                    <div class="stit">订单号：<?php echo $orderdata['ordernum']; ?> 请您在 1 日 内完成支付，否则订单会被自动取消</div>
                </div>
                <div class="mt20">
                    <div class="meta">
                        <div class="hd">商品</div>
                        <?php foreach($goodsdata as $good): ?>
                        <div class="bd"><?php echo $good['name']; ?> <?php echo $good['attr']; ?> * <?php echo $good['totalnum']; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="meta">
                        <div class="hd">收货地址</div>
                        <div class="bd"><?php echo $orderdata['province']; ?> <?php echo $orderdata['city']; ?> <?php echo $orderdata['district']; ?>
                            <?php echo $orderdata['address']; ?> (<?php echo $orderdata['username']; ?> 收) <?php echo $orderdata['userphone']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pay-wrap-tit">
        支付方式
    </div>
    <div class="pay-wrap">
        <div class="pay-way">
            <div class="row">
                <div class="col col-3">
                    <label><input class="check" type="radio" name="a" value="Y"/>货到付款
                        <!--                        <img src="/static/home/img/pay/zfb.jpg" />-->
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-panel">
        <a href="javascript:;" class="go-next ui-btn-theme">下一步</a>
    </div>
</div>
<script src="/static/js/jquery.min.js"></script>
<link rel="stylesheet" href="/static/home/js/icheck/style.css"/>
<script src="/static/home/js/icheck/icheck.min.js"></script>
<script src="/static/home/js/layer/layer.js"></script>
<script src="/static/home/js/global.js"></script>
<script>
    let id = <?php echo $orderdata['oid']; ?>;
    $('.check').iCheck({
        radioClass: 'sty1-radio'
    });
    hascl = false;
    $('label').on('click', function () {
        hascl = true;
    });
    // console.log(hascl);
    $('.go-next').on('click', function () {
        if (hascl) {
            $.ajax({
                url:'/index/order/payfinished?id='+id,
            });
            alert('支付成功');
            location.href='/index/myaccount/myorder'
        } else {
            alert('请选择一种支付方式');
        }
    })
</script>


<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>