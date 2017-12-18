{extend name="base" /}
{block name="content"}
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
                    <div class="tit">订单提交成功，应付金额 {$orderdata['totalprice']} 元</div>
                    <div class="stit">订单号：{$orderdata['ordernum']} 请您在 1 日 内完成支付，否则订单会被自动取消</div>
                </div>
                <div class="mt20">
                    <div class="meta">
                        <div class="hd">商品</div>
                        {foreach $goodsdata as $good}
                        <div class="bd">{$good['name']} {$good['attr']} * {$good['totalnum']}</div>
                        {/foreach}
                    </div>
                    <div class="meta">
                        <div class="hd">收货地址</div>
                        <div class="bd">{$orderdata['province']} {$orderdata['city']} {$orderdata['district']}
                            {$orderdata['address']} ({$orderdata['username']} 收) {$orderdata['userphone']}
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
    let id = {$orderdata.oid};
    let hascl = false;
    $('.check').iCheck({
        radioClass: 'sty1-radio'
    });
    $('label,ins').on('click', function () {
        hascl = true;
    });
    console.log(hascl);
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
{/block}