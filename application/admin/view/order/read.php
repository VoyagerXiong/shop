{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">订单管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/order">订单列表</a></li>
            <li class="active"><a href="javascript:;">订单详情</a></li>
        </ul>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>商品名称</th>
                <th>商品属性</th>
                <th>商品单价</th>
                <th>商品数量</th>
                <th>商品小计</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="5"><span>订单号：</span><span>{$goodsdata[0]['ordernum']}</span></td>
            </tr>
            {foreach $goodsdata as $good}
            <tr>
                <td>
                    <div class="pname"><img src="/{$good.list_image}" alt="" style="width: 50px;height: 50px;">{$good.name}
                    </div>
                </td>
                <td>{$good.attr}</td>
                <td>￥{$good.unitprice}</td>
                <td>×{$good.totalnum}</td>
                <td>￥{$good.price}</td>
            </tr>
            {/foreach}
            <tr>
                <td colspan="5">
                    <div class="tit" style="font-size: 20px">
                        收货信息
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">
                        <div>姓&emsp;&emsp;名：</div>
                    </div>
                </td>
                <td colspan="4">
                    <div>{$userinfo.username}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">
                        <div>联系电话：</div>
                    </div>
                </td>
                <td colspan="4">
                    <div>{$userinfo.userphone}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">收货地址：</div>
                </td>
                <td colspan="4">
                    <div>{$userinfo.province}{$userinfo.city}{$userinfo.district}{$userinfo.address}</div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <div class="tit" style="font-size: 20px">
                        支付方式及送货时间
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">
                        <div>支付方式</div>
                    </div>
                </td>
                <td colspan="4">
                    <div>货到付款</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">
                        <div>发货状态：</div>
                    </div>
                </td>
                <td colspan="4">
                    <div>{if $goodsdata['0']['status']<=2 }(未发货){else /}(已发货){/if}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">收货状态：</div>
                </td>
                <td colspan="4">
                    <div>{if $goodsdata['0']['status']!=4}(未收货){else /}(已收货){/if}</div>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>
                    <div class="tit">商品总价：</div>
                </td>
                <td>
                    <div class="val">{$goodsdata['0']['totalprice']}元</div>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>
                    <div>运&emsp;&emsp;费：</div>
                </td>
                <td>
                    <div>包邮</div>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>
                    <div>订单详情：</div>
                </td>
                <td>
                    <div>{$goodsdata['0']['totalprice']}元</div>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>
                    <div>实付金额：</div>
                </td>
                <td>
                    <div><span style="font-weight: bolder; color: red;">货到付款</span></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
{/block}