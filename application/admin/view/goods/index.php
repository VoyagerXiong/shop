{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">商品管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="/goods">商品列表</a></li>
            <li><a href="/goods/create">商品添加</a></li>
        </ul>

        <table class="layui-table" lay-even="" lay-skin="row">
            <colgroup>
                <col width="20">
                <col width="250">
                <col width="150">
                <col width="60">
                <col width="100">
                <col width="120">
            </colgroup>
            <thead>
            <tr>
                <th style="font-weight: bolder">编号</th>
                <th style="font-weight: bolder">名称</th>
                <th style="font-weight: bolder">列表图</th>
                <th style="font-weight: bolder">价格</th>
                <th style="font-weight: bolder">栏目</th>
                <th style="font-weight: bolder">操作</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($goods as $good): ?>
                    <tr>
                        <td>{$good['gid']}</td>
                        <td>{$good['gname']}</td>
                        <td>
                            <img src="{$good['list_image']}" alt="" style="height: 54px;">
                        </td>
                        <td>{$good['unitprice']}</td>
                        <td>{$good['name']}</td>
                        <td>
                            <div class="layui-btn-group">
                                <a target="_blank" href="/index/index/detail?id={$good['gid']}" title="预览" class="layui-btn layui-btn-sm">
                                    <i class="layui-icon">&#xe6b2;</i>
                                </a>
                                <a href="/goods/{$good['gid']}/edit" title="编辑" class="layui-btn layui-btn-normal layui-btn-sm">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" class="layui-btn layui-btn-danger layui-btn-sm" onclick="del({$good['gid']})">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <center>{$goods->render()}</center>
    </div>
    <script>
        function del(id) {
            layer.confirm('您确定要删除该栏目吗？', {
                btn: ['确定', '再想想'] //按钮
            }, function () {
                $.ajax({
                    url: '/goods/' + id,
                    method: 'DELETE',
                    success: function (response) {
                        if (response.valid == 1) {
                            layer.alert(response.message, {
                                icon: 1,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 500)
                        } else {
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