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
                            <a class="item {if $id==0}active{/if}" href="myorder">所有订单</a>
                            <a class="item {if $id==1}active{/if}" href="myorder?id=1">待付款</a>
                            <a class="item {if $id==2}active{/if}" href="myorder?id=2">待发货</a>
                            <a class="item {if $id==3}active{/if}" href="myorder?id=3">待收货</a>
                            <a class="item {if $id==4}active{/if}" href="myorder?id=4">已收货</a>
                            <a class="item {if $id==5}active{/if}" href="myorder?id=5">取消订单记录</a>
                        </div>
                    </div>
                    <table class="uc-table">
                        <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th width="150"></th>
                        </thead>
                        {foreach $goodsdata as $goods}
                        {if $goods}
                        <tr class="hd order-meta">
                            <td colspan="4">
                                <div class="left">{$goods[0]['otime']} 订单号: {$goods[0]['ordernum']}</div>
                                <div class="right">店铺：<a href="">窝家商城</a></div>
                                <!--                                    <span class="del iconfont icon-shanchu"></span>-->
                            </td>
                        </tr>
                        {foreach $goods as $good}
                        <tr class="order-goods">
                            <td>
                                <div class="goods-info">
                                    <img class="figure" src="/{$good.list_image}" alt=""/>
                                    <div class="info">
                                        <div>{$good.name} {$good.attr}</div>
                                        <div>￥{$good.unitprice} × {$good.totalnum}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                小计：<span class="text-theme fwb">{$good.price} 元</span>
                            </td>
                        </tr>
                        {/foreach}
                        <tr class="order-goods">
                            <td>
                            </td>

                            <td>
                                总计：<span class="text-theme fwb">{$good.totalprice}元</span>
                            </td>
                            <td>
                                <span class="status">
                                    {if $goods[0]['status']==1}待付款{/if}
                                    {if $goods[0]['status']==2}待发货{/if}
                                    {if $goods[0]['status']==3}待收货{/if}
                                    {if $goods[0]['status']==4}已收货{/if}
                                    {if $goods[0]['status']==5}订单已取消{/if}
                                </span><br/>
                                <a class="text-info" href="orderdetail?id={$goods[0]['oid']}">订单详情</a><br/>
                            </td>
                            <td>
                                {if $goods[0]['status']==1}
                                <a href="/index/order/gopay?id={$goods[0]['oid']}" class="ui-btn-theme uc-btn-md">去付款</a>
                                <a href="javascript:usercancel({$goods[0]['oid']});" class="ui-btn-theme uc-btn-md"
                                   style="border-color: red;background: red;">取消订单</a>
                                {/if}
                                {if $goods[0]['status']==2}
                                <!--                                <a href="javascript:;" class="ui-btn-theme uc-btn-md">去催单</a>-->
                                <a href="javascript:usercancel({$goods[0]['oid']});" class="ui-btn-theme uc-btn-md"
                                   style="border-color: red;background: red;">取消订单</a>
                                {/if}
                                {if $goods[0]['status']==3}
                                <a href="javascript:delivery({$goods[0]['oid']});"
                                   class="ui-btn-theme uc-btn-md">确认收货</a>
                                {/if}
                                {if $goods[0]['status']==4}
                                <a href="orderdetail?id={$goods[0]['oid']}" class="ui-btn-theme uc-btn-md">查看订单</a>
                                {/if}
                                {if $goods[0]['status']==5||$goods[0]['status']==6}
                                <a href="javascript:;" class="ui-btn-theme uc-btn-md"
                                   style="border-color: #ccc;background:#ccc;">订单已取消</a>
                                {/if}
                            </td>
                        </tr>
                        {/if}
                        {/foreach}
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
{/block}