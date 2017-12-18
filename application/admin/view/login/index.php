<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>后盾网 - Voyager新闻学习网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <script src="/static/js/jquery.min.js"></script>
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/node_modules/layui-src/dist/css/layui.css">
    <script src="/node_modules/layui-src/dist/layui.all.js"></script>
    <link rel="stylesheet" href="/static/admin/css/hdcms.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body class="hdcms-login">
<div class="container logo">
    <div style="background: url('/static/admin/images/logo.png') no-repeat; background-size: contain;height: 60px;"></div>
</div>
<div class="container well">
    <div class="row ">
        <div class="col-md-6">
            <form onsubmit="post(event)" method="post" id="submitform">
                <div class="form-group ">
                    <label>帐号</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="layui-icon">&#xe613;</i></div>
                        <input type="text" name="username" class="form-control input-lg" placeholder="请输入帐号" value="">
                    </div>
                </div>
                <div class="form-group ">
                    <label>密码</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="layui-icon">&#xe60f;</i></div>
                        <input type="password" name="password" class="form-control input-lg" placeholder="请输入密码"
                               value="">
                    </div>
                </div>
                <button class="btn btn-primary btn-lg">登录</button>
            </form>
        </div>
        <div class="col-md-6">
            <div style="background: url('/static/admin/images/houdunwang.jpg');background-size:100% ;height:230px;"></div>
        </div>
    </div>
    <div class="copyright">
        Powered by vohome v1.0 © 2017-2017 shop.vohome.xin
    </div>
    <script>
        function post(event) {
            event.preventDefault();
            $.ajax({
                url: '/admin/login',
                method: 'POST',
                data: $('#submitform').serialize(),
                success: function (response) {
                    if(response.valid==1){
                        layer.alert(response.message, {
                            icon: 1,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                        setTimeout(function(){
                            location.href = '/admin/index';
                        },500)
                    }else{
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
</body>
</html>