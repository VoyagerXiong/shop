{extend name="base" /}
{block name="content"}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">用户管理</h3>
    </div>
    <div class="panel-body">
        <form onsubmit="post(event)" id="submitform" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">原始密码:</label>
                <div class="col-sm-10">
                    <input type="password" name="old_password" id="inputID" class="form-control" value="" title="">
                </div>
            </div>

            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">新密码:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="inputID" class="form-control" value="" title="">
                </div>
            </div>

            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">确认密码:</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" id="inputID" class="form-control" value=""
                           title="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">修改密码</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function post(event) {
            event.preventDefault();
            $.ajax({
                url: '/admin/user/changepassword',
                method: 'POST',
                data: $('#submitform').serialize(),
                success: function (response) {
                    if (response.valid == 1) {
                        layer.alert(response.message, {
                            icon: 1,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                        setTimeout(function () {
                            location.href = '/admin/login';
                        }, 500)
                    } else {
                        layer.alert(response.message, {
                            icon: 2,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        })
                    }
                }
            })
        }
    </script>
</div>
{/block}