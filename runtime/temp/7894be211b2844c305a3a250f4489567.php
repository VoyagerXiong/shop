<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/myaccount/orderdetail.php";i:1512828056;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
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
                    <li><a class="active" href="/index/myaccount/myorder">我的订单</a></li>
                    <li><a href="/index/address/index">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-content">
            <div class="uc-panel">
                <div class="uc-bigtit">订单详情<a class="extra" href="">请谨防钓鱼链接或诈骗后台，了解更多></a></div>
                <div class="uc-panel-bd">
                    <div class="order-detail">
                        <div class="od-hd">
                            <div class="fl">
                                <span class="tit">订单号：</span><span><?php echo $goodsdata[0]['ordernum']; ?></span>
                            </div>
                            <?php if($goodsdata[0]['status']<3): ?>
                            <div class="fr">
                                <a href="" class="ui-btn-low ui-btn-hollow uc-btn-md">取消订单</a>
                                <a href="" class="ui-btn-theme uc-btn-md">立即支付</a>
                            </div>
                            <?php endif; ?>
                        </div>
<!--                        <div class="od-status">-->
<!--                            <div class="tit">等待付款</div>1小时35后订单将被关闭-->
<!--                        </div>-->
                        <div class="od-percent" style="margin-top: 20px;">
                            <div class="col <?php if($goodsdata['0']['status']==1): ?>active<?php endif; ?>"><div class="inner">下单<span class="time"><?php echo $goodsdata[0]['otime']; ?></span></div></div>
                            <div class="col col2 <?php if($goodsdata['0']['status']==2): ?>active<?php endif; ?>"><div class="inner">付款</div></div>
                            <div class="col col3 <?php if($goodsdata['0']['status']==3): ?>active<?php endif; ?>"><div class="inner">发货</div></div>
                            <div class="col col4 <?php if($goodsdata['0']['status']==4): ?>active<?php endif; ?>"><div class="inner">交易成功</div></div>
                        </div>
                        <div class="od-pdt">
                            <?php foreach($goodsdata as $good): ?>
                            <div class="item">
                                <img src="/<?php echo $good['list_image']; ?>" class="figure" />
                                <div class="pname"><?php echo $good['name']; ?> <?php echo $good['attr']; ?></div>
                                <div class="price"><?php echo $good['unitprice']; ?>元×<?php echo $good['totalnum']; ?></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="od-info">
                            <div class="item">
                                <div class="tit">
                                    收货信息
                                </div>
                                <div class="meta">
                                    <div>姓&emsp;&emsp;名：<?php echo $userinfo['username']; ?></div>
                                    <div>联系电话：<?php echo $userinfo['userphone']; ?></div>
                                    <div>收货地址：<?php echo $userinfo['province']; ?><?php echo $userinfo['city']; ?><?php echo $userinfo['district']; ?><?php echo $userinfo['address']; ?></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tit">
                                    支付方式及送货时间
                                </div>
                                <div class="meta">
                                    <div>支付方式：货到付款</div>
                                    <div>送货时间：<?php if($goodsdata['0']['status']<=2): ?>(未发货)<?php else: ?>(已发货)<?php endif; ?></div>
                                    <div>送达时间：<?php if($goodsdata['0']['status']!=4): ?>(未收货)<?php else: ?>(已收货)<?php endif; ?></div>
                                </div>
                            </div>
<!--                            <div class="item">-->
<!--                                <div class="tit">-->
<!--                                    发票信息-->
<!--                                </div>-->
<!--                                <div class="meta">-->
<!--                                    <div>发票类型：</div>-->
<!--                                    <div>发票内容：</div>-->
<!--                                    <div>发票抬头：</div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <div class="od-count">
                            <div class="inner">
                                <div class="item">
                                    <div class="tit">商品总价：</div>
                                    <div class="val"><?php echo $goodsdata['0']['totalprice']; ?>元</div>
                                </div>
                                <div class="item">
                                    <div class="tit">运&emsp;&emsp;费：</div>
                                    <div class="val">包邮</div>
                                </div>
                                <div class="item">
                                    <div class="tit">订单详情：</div>
                                    <div class="val"><?php echo $goodsdata['0']['totalprice']; ?>元</div>
                                </div>
                                <div class="item last">
                                    <div class="tit">实付金额：</div>
<!--                                    <span class="strong">0</span>元-->
                                    <div class="val"><span style="font-weight: bolder; color: red;">货到付款</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
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


<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>