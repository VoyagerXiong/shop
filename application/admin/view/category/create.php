{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">栏目管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/category">栏目列表</a></li>
            <li class="active"><a href="/category/create">栏目添加/编辑</a></li>
        </ul>
        <form onsubmit="post(event)" class="layui-form layui-form-pane"  id="submitform">
            <div class="layui-form-item pane">
                <label class="layui-form-label" style="font-weight: bolder">栏目标题</label>
                <div class="layui-input-block">
                    <input type="text" name="name" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="font-weight: bolder">父级栏目</label>
                <div class="layui-input-block">
                    <select name="pid">
                        <option value="0">--顶级目录--</option>
                        <?php if (is_array($categorydata)): ?>
                            <?php foreach ($categorydata as $column): ?>
                                <option value="{$column['id']}">{$column['_name']}</option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" >保存栏目</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        layui.use('form', function(){
            let form = layui.form;
            form.render();
        });
        function post(event) {
            event.preventDefault();
            $.ajax({
                url: '/category',
                method: 'post',
                data: $('#submitform').serialize(),
                success: function (response) {
//                    console.log(response);
                    if (response.valid == 1) {
                        layer.alert(response.message, {
                            icon: 6,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                        setTimeout(function () {
                            location.href = '/admin/category';
                        }, 500)
                    } else {
                        layer.alert(response.message, {
                            icon: 5,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                    }
                }
            })
        }
    </script>
</div>
{/block}