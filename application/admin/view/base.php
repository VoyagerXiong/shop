<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>商城系统</title>
    <meta http-equiv="Cache-Control" content="Public"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/node_modules/layui-src/dist/css/layui.css">
    <link href="/static/admin/css/hdcms.css" rel="stylesheet">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/vue.js"></script>
    <script src="/node_modules/layui-src/dist/layui.all.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/static/ueditor/ueditor.config.js"></script>
    <script src="/static/ueditor/ueditor.all.min.js"></script>
</head>
<body class="site">
<!--后台站点父级模板-->
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">

                    <li>
                        <a target="_blank" href="/admin">
                            <i class="layui-icon">&#xe65c;</i> 返回首页
                        </a>
                    </li>


                    <li class="top_menu active">
                        <a href="/category" class="quickMenuLink">
                            <i class="layui-icon" style="font-size: 24px;">&#xe857;</i> 应用管理</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="layui-icon">&#xe613;</i>
                            {$Think.session.admin.username}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/User/changePassword">修改密码</a></li>

                            <li><a onclick="logout()">退出登录</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        function logout(){
            $.ajax({
                url:'/admin/login/logout',
                success:function(response){
                    layer.alert('退出成功', {
                        icon: 1,
                        skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                    });
                    setTimeout(function(){
                        location.href = '/admin/login';
                    },500)
                }
            })
        }
    </script>
    <!--导航end-->
</div>
<div class="container" style="width: 100%;margin-bottom: 10px"></div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="search-menu">
                <input class="form-control input-lg" id="searchMenu" type="text" placeholder="输入菜单名称可快速查找">
            </div>
            <!--扩展模块动作 start-->
            <div class="panel panel-default">
                <!--系统菜单-->
                <div class="panel-heading">
                    <h4 class="panel-title">栏目管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="layui-icon">&#xe61a;</i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item">
                        <a href="/category" class="quickMenuLink">栏目列表 </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/category/create" class="quickMenuLink">栏目添加 </a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">商品管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="layui-icon">&#xe61a;</i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item">
                        <a href="/goods" class="quickMenuLink">商品列表 </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/goods/create" class="quickMenuLink">商品添加 </a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">订单管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="layui-icon">&#xe61a;</i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item">
                        <a href="/order" class="quickMenuLink">订单列表 </a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">用户管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="layui-icon">&#xe61a;</i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item">
                        <a href="/admin/User/changePassword" class="quickMenuLink">修改密码 </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">

            {block name="content"}{/block}

        </div>
    </div>
</div>
</body>
</html>
