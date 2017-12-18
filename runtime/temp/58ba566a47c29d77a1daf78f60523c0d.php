<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/wwwroot/shop.vohome.xin/public/../application/admin/view/order/read.php";i:1512818025;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/admin/view/base.php";i:1512722593;}*/ ?>
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
                <td colspan="5"><span>订单号：</span><span><?php echo $goodsdata[0]['ordernum']; ?></span></td>
            </tr>
            <?php foreach($goodsdata as $good): ?>
            <tr>
                <td>
                    <div class="pname"><img src="/<?php echo $good['list_image']; ?>" alt="" style="width: 50px;height: 50px;"><?php echo $good['name']; ?>
                    </div>
                </td>
                <td><?php echo $good['attr']; ?></td>
                <td>￥<?php echo $good['unitprice']; ?></td>
                <td>×<?php echo $good['totalnum']; ?></td>
                <td>￥<?php echo $good['price']; ?></td>
            </tr>
            <?php endforeach; ?>
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
                    <div><?php echo $userinfo['username']; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">
                        <div>联系电话：</div>
                    </div>
                </td>
                <td colspan="4">
                    <div><?php echo $userinfo['userphone']; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">收货地址：</div>
                </td>
                <td colspan="4">
                    <div><?php echo $userinfo['province']; ?><?php echo $userinfo['city']; ?><?php echo $userinfo['district']; ?><?php echo $userinfo['address']; ?></div>
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
                    <div><?php if($goodsdata['0']['status']<=2): ?>(未发货)<?php else: ?>(已发货)<?php endif; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="item">收货状态：</div>
                </td>
                <td colspan="4">
                    <div><?php if($goodsdata['0']['status']!=4): ?>(未收货)<?php else: ?>(已收货)<?php endif; ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>
                    <div class="tit">商品总价：</div>
                </td>
                <td>
                    <div class="val"><?php echo $goodsdata['0']['totalprice']; ?>元</div>
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
                    <div><?php echo $goodsdata['0']['totalprice']; ?>元</div>
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


        </div>
    </div>
</div>
</body>
</html>
