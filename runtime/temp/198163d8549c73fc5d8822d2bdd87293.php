<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/index/lists.php";i:1512982720;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
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
<div class="danpin center">
    <div class="biaoti center"><?php echo $precolumn['name']; ?></div>
    <div class="main center" style="height: <?php echo ceil(count($goods)/5)*363 ?>px;">
        <?php foreach($goods as $g): ?>
        <div class="mingxing fl mb20" style="border:2px solid #fff;width:230px;cursor:pointer;" onmouseout="this.style.border='2px solid #fff'" onmousemove="this.style.border='2px solid #6ab02f'">
            <div class="sub_mingxing"><a href="/index/index/detail?id=<?php echo $g['id']; ?>" target="_blank"><img src="/<?php echo $g['list_image']; ?>" alt=""></a></div>
            <div class="pinpai"><a href="/index/index/detail?id=<?php echo $g['id']; ?>" target="_blank"><?php echo $g['name']; ?></a></div>
            <div class="youhui"><?php echo $g['uptime']; ?>开售</div>
            <div class="jiage"><?php echo $g['unitprice']; ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>