{extend name="base" /}
{block name="content"}
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
                <div class="uc-bigtit">订单详情<a class="extra">请谨防钓鱼链接或诈骗后台</a></div>
                <div class="uc-panel-bd">
                    <div class="order-detail">
                        <div class="od-hd">
                            <div class="fl">
                                <span class="tit">订单号：</span><span>{$goodsdata[0]['ordernum']}</span>
                            </div>
                            {if $goodsdata[0]['status']<3 }
                            <div class="fr">
                                <a href="" class="ui-btn-low ui-btn-hollow uc-btn-md">取消订单</a>
                                <a href="" class="ui-btn-theme uc-btn-md">立即支付</a>
                            </div>
                            {/if}
                        </div>
<!--                        <div class="od-status">-->
<!--                            <div class="tit">等待付款</div>1小时35后订单将被关闭-->
<!--                        </div>-->
                        <div class="od-percent" style="margin-top: 20px;">
                            <div class="col {if $goodsdata['0']['status']==1 }active{/if}"><div class="inner">下单<span class="time">{$goodsdata[0]['otime']}</span></div></div>
                            <div class="col col2 {if $goodsdata['0']['status']==2 }active{/if}"><div class="inner">付款</div></div>
                            <div class="col col3 {if $goodsdata['0']['status']==3 }active{/if}"><div class="inner">发货</div></div>
                            <div class="col col4 {if $goodsdata['0']['status']==4 }active{/if}"><div class="inner">交易成功</div></div>
                        </div>
                        <div class="od-pdt">
                            {foreach $goodsdata as $good}
                            <div class="item">
                                <img src="/{$good.list_image}" class="figure" />
                                <div class="pname">{$good.name} {$good.attr}</div>
                                <div class="price">{$good.unitprice}元×{$good.totalnum}</div>
                            </div>
                            {/foreach}
                        </div>
                        <div class="od-info">
                            <div class="item">
                                <div class="tit">
                                    收货信息
                                </div>
                                <div class="meta">
                                    <div>姓&emsp;&emsp;名：{$userinfo.username}</div>
                                    <div>联系电话：{$userinfo.userphone}</div>
                                    <div>收货地址：{$userinfo.province}{$userinfo.city}{$userinfo.district}{$userinfo.address}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tit">
                                    支付方式及送货时间
                                </div>
                                <div class="meta">
                                    <div>支付方式：货到付款</div>
                                    <div>送货时间：{if $goodsdata['0']['status']<=2 }(未发货){else /}(已发货){/if}</div>
                                    <div>送达时间：{if $goodsdata['0']['status']!=4}(未收货){else /}(已收货){/if}</div>
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
                                    <div class="val">{$goodsdata['0']['totalprice']}元</div>
                                </div>
                                <div class="item">
                                    <div class="tit">运&emsp;&emsp;费：</div>
                                    <div class="val">包邮</div>
                                </div>
                                <div class="item">
                                    <div class="tit">订单详情：</div>
                                    <div class="val">{$goodsdata['0']['totalprice']}元</div>
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
{/block}