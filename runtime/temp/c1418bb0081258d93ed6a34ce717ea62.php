<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/wwwroot/shop.vohome.xin/public/../application/admin/view/order/edit.php";i:1512816382;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/admin/view/base.php";i:1512722593;}*/ ?>
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
                            <?php echo \think\Session::get('admin.username'); ?><span class="caret"></span>
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

            
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">订单管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/order">订单列表</a></li>
            <li class="active"><a href="javascript:;">订单修改</a></li>
        </ul>
        <form onsubmit="post(event)" class="layui-form layui-form-pane"  id="submitform">
            <div class="layui-form-item pane">
                <label class="layui-form-label" style="font-weight: bolder">订单号</label>
                <div class="layui-input-block">
                    <input type="text" name="ordernum" readonly class="layui-input"  value="<?php echo $oldData['ordernum']; ?>">
                </div>
            </div>
            <div class="layui-form-item pane">
                <label class="layui-form-label" style="font-weight: bolder">订单总价</label>
                <div class="layui-input-block">
                    <input type="text" name="totalprice" class="layui-input"  value="<?php echo $oldData['totalprice']; ?>">
                </div>
            </div>

            <?php if($oldData['status']<5): ?>
            <div class="layui-form-item pane">
                <label class="layui-form-label" style="font-weight: bolder">订单状态</label>
                <div class="layui-input-block">
                    <select name="status" id="">
                        <?php if($oldData['status']==2): ?>
                        <option value="3">发货</option>
                        <?php endif; ?>
                        <option value="5">取消订单</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" >保存订单</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        layui.use('form', function(){
            let form = layui.form;
            form.render();
            console.log(form);
        });
        function post(event){
            let id = <?php echo $oldData['id']; ?>;
            event.preventDefault();
            $.ajax({
                url:'/order/'+id,
                method:'PUT',
                data:$('#submitform').serialize(),
                success:function(response){
//                    console.log(response);
                    if (response.valid == 1) {
                        layer.alert(response.message, {
                            icon: 6,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                    }
                    setTimeout(function(){
                        location.href='/order';
                    },1000)
                }
            })
        }
    </script>
</div>


        </div>
    </div>
</div>
</body>
</html>
