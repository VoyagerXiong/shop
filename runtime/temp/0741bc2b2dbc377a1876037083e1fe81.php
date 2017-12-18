<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/order/confirm.php";i:1512911255;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
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
<link href="/static/home/css/cart.css" rel="stylesheet"/>
<script src="/static/js/jquery.min.js"></script>
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
            <div class="step col-3">
                <span class="num">3</span><span class="line"></span><span class="label">选择支付方式</span>
            </div>
            <div class="step last col-3">
                <span class="num">4</span><span class="line"></span><span class="label">完成付款</span>
            </div>
        </div>
    </div>
</div>
<!--头部-->
<div class="wrapper confirm-wrap">
    <div class="confirm-tit">
        <span class="tit">选择收货地址 :</span>
    </div>
    <div class="confirm-address clearfix">
        <?php foreach($address as $a): ?>
        <div class="col col-4" aid="<?php echo $a['id']; ?>">
            <div class="item <?php if ($a['is_default'] == 1): ?>active<?php endif; ?>">
                <div class="info">
                    <div class="ellipsis"><img src="/static/home/img/ico/user.jpg" alt=""/><?php echo $a['province']; ?><?php echo $a['city']; ?>（<?php echo $a['username']; ?>
                        收）
                    </div>
                    <div class="ellipsis"><img src="/static/home/img/ico/dizhi.jpg" alt=""/><?php echo $a['district']; ?><?php echo $a['address']; ?>
                    </div>
                    <div class="ellipsis"><img src="/static/home/img/ico/tel.jpg" alt=""/><?php echo $a['userphone']; ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <script>
            let aid = '';
            $(document.body).on('click', '.confirm-address .col-4', function () {
                $(this).siblings('.col-4').children('div').removeClass('active');
                $(this).children('div').addClass('active');
                aid = $(this).attr('aid');
                $.ajax({
                    url: '/index/address/changeAddress?id=' + aid,
                    method: 'post',
                    success: function (res) {
                    }
                })
            });
        </script>
        <div class="col col-4">
            <a class="item va-m-box ta-c add">
                <div class="add-new">
                    <span class="ico"><i class="iconfont icon-tianjia"></i></span>
                    <div class="label">添加收货地址</div>
                </div>
            </a>
        </div>
    </div>
    <div class="confirm-address-bar" style="display: none;">
        <a href="javascript:;" class="drop" data-action="drop">显示全部地址</a>
    </div>
    <div class="confirm-tit">
        <span class="tit">确认商品信息:</span>
        <div class="right"><a class="back" href="">返回购物车></a></div>
    </div>
    <form method="post" action="/index/order/addOrder" id="remark">
        <div class="confirm-goods">
            <div class="confirm-goods-hd clearfix">
                <div class="col col1">商品名称</div>
                <div class="col col2">单价（元）</div>
                <div class="col col3">数量</div>
                <div class="col col4">小计（元）</div>
            </div>
            <?php foreach($cart['goods'] as $k=>$v): ?>
            <div class="confirm-goods-bd">
                <div class="goods clearfix">
                    <div class="col col1">
                        <img src="/<?php echo $v['options']['list_image']; ?>" alt="">
                        <div class="info">
                            <div class="name"><?php echo $v['name']; ?></div>
                            <div class="meta"><span><?php echo $v['options']['attr']; ?></span></div>
                        </div>
                    </div>
                    <div class="col col2">￥<?php echo $v['price']; ?></div>
                    <div class="col col3"><?php echo $v['num']; ?></div>
                    <div class="col col4">￥<?php echo $v['total']; ?></div>
                </div>
            </div>
            <div class="confirm-goods-ft clearfix">
                <div class="fl"><span class="vm-ib">备注信息： </span>
                    <textarea class="ui-txtin" style="width: 410px;" name="remark[]"
                              placeholder="在此输入给商家的留言"></textarea></div>
                <div class="fr">商品合计(含运费): ¥<?php echo $v['total']; ?></div>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="confirm-total">
            <div class="box">
                <div class="item">应付总额：<strong> ¥<?php echo $cart['total']; ?></strong></div>
                <button class="ui-btn-theme go-charge">去结算</button>
            </div>
        </div>
    </form>
</div>

<div id="addressform" style="display:none" class="layer-address">
    <form onsubmit="post(event)" id="address">
        <div class="control-group">
            <div class="hd">
                收货人姓名：
            </div>
            <div class="bd">
                <input class="ui-txtin ui-txtin-thin" style="width: 200px;" type="text" name="username" id="">
            </div>
        </div>
        <div class="control-group">
            <div class="hd">
                联系电话：
            </div>
            <div class="bd">
                <input class="ui-txtin ui-txtin-thin" style="width: 200px;" type="text" name="userphone" id="">
            </div>
        </div>
        <div class="control-group">
            <div class="hd vat">
                所在地区：
            </div>
            <div class="bd">
                <div data-toggle="distpicker"><!-- container -->
                    <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="province"></select><!-- 省 -->
                    <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="city"></select><!-- 市 -->
                    <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="district"></select><!-- 区 -->
                </div>
                <div class="mt10">
                    <input class="ui-txtin ui-txtin-thin" style="width: 560px;" type="text" name="address" id=""
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
            <button class="fl btn ui-btn-theme">保存</button>
            <a href="" class="fr btn ui-btn cancle">取消</a>
        </div>
    </form>
</div>
<link rel="stylesheet" href="/static/home/js/icheck/style.css"/>
<script src="/static/home/js/icheck/icheck.min.js"></script>
<script src="/static/home/js/layer/layer.js"></script>
<script src="/static/home/js/global.js"></script>
<script src="/static/js/third.js"></script>
<script src="/static/js/third2.js"></script>
<script src="/static/js/main.js"></script>
<script>
    //这里不使用自带按钮，因为设计按钮较特殊，不准备作为通用样式
    $('.confirm-address .edit,.confirm-address .add').on('click', function () {
        layer.open({
            type: 1,
            skin: 'layui-layer-seaing',
            title: '标题',
            area: ['720px', 'auto'],
            content: $('#addressform')
            //btn: ['按钮一', '按钮二']
        });
    });
    $(document.body).on('click', '.layer-address .cancle', function () {
        layer.closeAll();
        return false;
    });

    //
    function juggeAddressNum() {
        var col = $('.confirm-address .col'),
            cH = col.height();
        $('.confirm-address').height(cH)
        if (col.length > 3) {
            $('.confirm-address-bar').show();
        }
        else {
            $('.confirm-address-bar').hide();
        }
    }

    juggeAddressNum();
    zAction.add({
        'drop': function () {
            $('.confirm-address').height('auto')
            var h = $('.confirm-address').height()
            juggeAddressNum();
            $('.confirm-address').animate({height: h}, 300);
            $(this).parent().remove();
        }
    });

    //编辑地址
    function post(event) {
        event.preventDefault();
        $.ajax({
            url: '/index/address/addAddress',
            method: 'post',
            data: $('#address').serialize(),
            success: function (res) {
                layer.alert('保存成功', {
                    icon: 1,
                    skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                });
                // setTimeout(function () {
                //     location.reload();
                // }, 500)
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