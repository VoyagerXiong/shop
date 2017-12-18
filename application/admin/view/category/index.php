{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">栏目管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="/category">栏目列表</a></li>
            <li><a href="/category/create">栏目添加/编辑</a></li>
        </ul>
        <table class="layui-table" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
                <col width="300">
                <col width="150">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th style="font-weight: bolder">ID</th>
                <th style="font-weight: bolder">栏目标题</th>
                <th style="font-weight: bolder">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($categorydata)): ?>
                <?php foreach ($categorydata as $column): ?>
                    <tr>
                        <td>{$column['id']}</td>
                        <td>{$column['_name']}</td>
                        <td>
                            <div class="layui-btn-group">
                                <a target="_blank" href="/index/index/lists?id={$column['id']}" title="预览" class="layui-btn layui-btn-sm">
                                    <i class="layui-icon">&#xe6b2;</i>
                                </a>
                                <a href="/category/{$column['id']}/edit" title="编辑" class="layui-btn layui-btn-normal layui-btn-sm">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" class="layui-btn layui-btn-danger layui-btn-sm" onclick="del({$column['id']})">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script>
        function del(id) {
            layer.confirm('您确定要删除该栏目吗？', {
                btn: ['确定', '再想想'] //按钮
            }, function () {
                $.ajax({
                    url: '/category/' + id,
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