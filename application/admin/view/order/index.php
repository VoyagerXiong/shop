{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">订单管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="/order">订单列表</a></li>
        </ul>
        <table class="layui-table" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
                <col width="300">
                <col width="150">
                <col width="150">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th style="font-weight: bolder">ID</th>
                <th style="font-weight: bolder">订单号(点击查看详情)</th>
                <th style="font-weight: bolder">订单状态</th>
                <th style="font-weight: bolder">操作</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>{$order['id']}</td>
                        <td>
                            <a href="/order/{$order['id']}">{$order['ordernum']}</a>
                        </td>
                        <td>
                            {if $order['status']==1 }<span style="color: orange;">待付款</span>{/if}
                            {if $order['status']==2 }<span style="color: orange;">待发货</span>{/if}
                            {if $order['status']==3 }<span style="color: #b2dba1;">待收货</span>{/if}
                            {if $order['status']==4 }<span style="color: green;">已收货</span>{/if}
                            {if $order['status']==5 }<span style="color: orangered;">已取消</span>{/if}
                        </td>
                        <td>
                            <div class="layui-btn-group">
                                {if $order['status']==2}
                                <a  onclick="update({$order['id']})" title="可发货" class="layui-btn layui-btn-normal layui-btn-sm">
                                    待发货
                                </a>
                                {else /}
                                <a title="已发货" class="layui-btn layui-btn-success layui-btn-sm">
                                    已发货
                                </a>
                                {/if}
                                {if $order['status']<4}
                                <a title="取消订单" class="layui-btn layui-btn-danger layui-btn-sm" onclick="del({$order['id']})">
                                    取消订单
                                </a>
                                {else /}
                                <a title="取消订单" class="layui-btn layui-btn-primary layui-btn-sm">
                                    订单关闭
                                </a>
                                {/if}
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <center>{$orders->render()}</center>
    </div>
    <script>

        function update(id) {
            layer.confirm('您确定已经发货？', {
                btn: ['确定', '再想想'] //按钮
            }, function () {
                $.ajax({
                    url: '/order/' + id,
                    method: 'PUT',
                    success: function (response) {
                        if (response.valid == 1) {
                            layer.alert(response.message, {
                                icon: 1,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            });
                            setTimeout(function(){
                                location.reload();
                            },500)
                        }else{
                            layer.alert(response.message, {
                                icon: 2,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            });
                        }
                    }
                });
            }, function () {
            });
        }

        //取消订单
        function del(id) {
            layer.confirm('您确定要取消该订单吗？', {
                btn: ['确定', '再想想'] //按钮
            }, function () {
                $.ajax({
                    url: '/order/' + id,
                    method: 'DELETE',
                    success: function (response) {
                        if (response.valid == 1) {
                            layer.alert(response.message, {
                                icon: 1,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            });
                            setTimeout(function(){
                                location.reload();
                            },500)
                        }else{
                            layer.alert(response.message, {
                                icon: 2,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            });
                        }
                    }
                });
            }, function () {
            });
        }
    </script>
</div>
{/block}