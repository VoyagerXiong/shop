<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/index/index.php";i:1512982589;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
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

<link rel="stylesheet" href="/static/css/swiper.min.css">
<style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        /*text-align: center;*/
        font-size: 18px;
        background: #fff;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
    }
</style>
<!-- start banner_x -->
<div class="banner_x center">
    <a href="/" target="_blank">
        <div class="logo fl"></div>
    </a>
    <!--			<a href=""><div class="ad_top fl"></div></a>-->
    <div class="nav fl">
        <ul>
            <?php foreach($columns as $c): ?>
            <li><a href="/index/index/lists?id=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="search fr">
        <form action="/index/index/search" method="post">
            <div class="text fl">
                <input type="text" name="input" class="shuru" placeholder="小米6&nbsp;小米MIX现货">
            </div>
            <div class="submit fl">
                <input type="submit" class="sousuo" value="搜索"/>
            </div>
            <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>
<!-- end banner_x -->

<!-- start banner_y -->
<div class="banner_y center">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/static/home/image/swiper-1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-5.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-6.jpg" alt=""></div>
        </div>
        <!-- Add Arrows -->
    </div>

    <!-- Swiper JS -->
    <script src="/static/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            // autoplay:true,
            autoplay: {
                delay: 2000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            },
            loop: true,
        });
    </script>
</div>

<div class="sub_banner center">
    <div class="sidebar fl">
        <div class="fl"><a href=""><img src="/static/home/image/hjh_01.gif"></a></div>
        <div class="fl"><a href=""><img src="/static/home/image/hjh_02.gif"></a></div>
        <div class="fl"><a href=""><img src="/static/home/image/hjh_03.gif"></a></div>
        <div class="fl"><a href=""><img src="/static/home/image/hjh_04.gif"></a></div>
        <div class="fl"><a href=""><img src="/static/home/image/hjh_05.gif"></a></div>
        <div class="fl"><a href=""><img src="/static/home/image/hjh_06.gif"></a></div>
        <div class="clear"></div>
    </div>
    <div class="datu fl"><a href="/index/index/detail?id=7"><img src="/static/home/image/hongmi4x.png" alt=""></a></div>
    <div class="datu fl"><a href="/index/index/detail?id=17"><img src="/static/home/image/xiaomi5.jpg" alt=""></a></div>
    <div class="datu fr"><a href="/index/index/detail?id=17"><img src="/static/home/image/pinghengche.jpg" alt=""></a>
    </div>
    <div class="clear"></div>


</div>
<!-- end banner -->

<!-- start danpin -->
<div class="danpin center">

    <div class="biaoti center">小米明星单品</div>
    <div class="main center">
        <?php foreach($hotgoods as $hotgood): ?>
        <div class="mingxing fl">
            <div class="sub_mingxing"><a href="/index/index/detail?id=<?php echo $hotgood['id']; ?>"><img src="/<?php echo $hotgood['list_image']; ?>"
                                                                                          alt=""></a></div>
            <div class="pinpai"><a href=""><?php echo $hotgood['name']; ?></a></div>
            <div class="youhui">5月9日-21日享花呗12期分期免息</div>
            <div class="jiage"><?php echo intval($hotgood['unitprice']) ?>元起</div>
        </div>
        <?php endforeach; ?>
        <div class="clear"></div>
    </div>
</div>
<div class="peijian w">
    <div class="biaoti center">所有商品</div>
    <div class="main center" style="height: <?php echo ceil(count($allgoods) / 5) * 314 ?>px;">
        <div class="content">
            <?php foreach($allgoods as $k=>$allgood): ?>
            <div class="remen fl" style="margin-bottom: 14px;<?php if($k%5==4): ?>margin-right: 0px;<?php endif; ?>">
                <div class="tu"><a href="/index/index/detail?id=<?php echo $allgood['id']; ?>"><img src="/<?php echo $allgood['list_image']; ?>"
                                                                                    style="width: 160px;height:160px"></a>
                </div>
                <div class="miaoshu"><a href="/index/index/detail?id=<?php echo $allgood['id']; ?>"><?php echo $allgood['name']; ?></a></div>
                <div class="jiage"><?php echo intval($allgood['unitprice']) ?>元</div>
                <div class="pingjia">372人评价</div>
            </div>
            <?php if($k%5==4): ?>
            <div class="clear"></div>
            <?php endif; endforeach; ?>
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