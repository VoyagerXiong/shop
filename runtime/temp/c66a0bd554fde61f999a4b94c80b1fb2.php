<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/shop.vohome.xin/public/../application/admin/view/goods/create.php";i:1512460518;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/admin/view/base.php";i:1512722593;}*/ ?>
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
        <h3 class="panel-title">商品管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/goods">商品列表</a></li>
            <li class="active"><a href="/goods/create">商品添加/编辑</a></li>
        </ul>
        <form onsubmit="post(event)" class="layui-form layui-form-pane" id="submitform">
            <div class="layui-colla-item">
                <h2 class="layui-colla-title" style="margin-bottom: 10px;font-weight: bolder">商品区域</h2>
                <div class="layui-colla-content layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">商品名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">所属栏目</label>
                        <div class="layui-input-block">
                            <select name="category_id">
                                <option value="0">--顶级目录--</option>
                                <?php if (is_array($categorydata)): foreach ($categorydata as $column): ?>
                                        <option value="<?php echo $column['id']; ?>"><?php echo $column['_name']; ?></option>
                                    <?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">商品价格</label>
                        <div class="layui-input-block">
                            <input type="text" name="price" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">上架时间</label>
                        <div class="layui-input-block">
                            <input type="date" name="uptime" value="<?php echo date('Y-m-d') ?>" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">列表页图片</label>
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <input type="text" name="list_image" id="listImage" readonly
                                       style="background:#dddddd;border: 1px solid #e6e6e6;width: 700px;height: 38px;">
                                <button type="button" class="layui-btn" id="list">上传图片</button>
                                <div class="layui-upload-list">
                                    <img class="layui-upload-img" id="showimage"
                                         style="width:100px;height: 100px;display:none;">
                                    <p id="demoText"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">内容页图册</label>
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <button type="button" class="layui-btn" id="content">多图片上传</button>
                                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                    预览图：
                                    <div class="layui-upload-list" id="showimages"></div>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">点击次数</label>
                        <div class="layui-input-block">
                            <input type="number" name="click" value="0" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">商品详情</label>
                        <div class="layui-input-block">
                            <div class="layui-upload">
                                <script id="container" name="content" type="text/plain"></script>
                                <script type="text/javascript">
                                    let ue = UE.getEditor('container');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-colla-item" style="margin: 20px 0;" id="app">
                <h2 class="layui-colla-title" style="margin-bottom: 10px;font-weight: bolder">货品区域</h2>
                <div class="layui-colla-content layui-show" v-for="(v,k) in goodslist">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">组合属性</label>
                        <div class="layui-input-block">
                            <input type="text" v-model="v.attr" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="font-weight: bolder">货品库存</label>
                        <div class="layui-input-block">
                            <input type="number" v-model="v.inventory" class="layui-input">
                        </div>
                    </div>

                    <a class="layui-btn layui-btn-danger layui-btn-xs" @click.prevent="del(k)">删除</a>
                </div>
                <textarea hidden name="goodslist" id="" cols="30" rows="10">{{goodslist}}</textarea>
                <a class="layui-btn layui-btn-normal layui-btn-xs" @click.prevent="add()">增加一项</a>
            </div>

            <div class="layui-form-item">
                <button class="layui-btn">保存商品信息</button>
            </div>
        </form>
    </div>

    <script>
        layui.use('upload', function () {
            let $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            let uploadInst = upload.render({
                elem: '#list'
                , url: '/upload'
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#showimage').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    if (res.valid == 0) {
                        return layer.msg('上传失败');
                    }
                    $('#listImage').val(res.path);
                    $('#showimage').show();
                    return layer.msg('上传成功')
                }
            });

            //多图片上传
            upload.render({
                elem: '#content'
                , url: '/upload'
                , multiple: true
                , done: function (res) {
                    //上传完毕
                    $('#showimages').append('<img src="/'+res.path+'" alt="" class="layui-upload-img" style="width: 100px;height: 100px;">' +
                        '<a onclick="del(this)" style="position: relative;top: -42px;"><i class="layui-icon" style="font-weight: bolder;color: red;">&#x1006;</i></a>' +
                        '<input type="hidden" name="content_image[]" value=' + res.path + '>')
                    // $('#showimages').append('<input type="hidden" name="content_image[]" value=' + res.path + '>')
                }
            });
        });

        //图片删除
        function del(that) {
            $(that).next().remove();
            $(that).prev().remove().end().remove();
        }

        //表单渲染
        layui.use('form', function () {
            let form = layui.form;
            form.render();
        });

        function post(event) {
            event.preventDefault();
            $.ajax({
                url: '/goods',
                method:'post',
                data: $('#submitform').serialize(),
                success: function (response) {
                    if (response.valid == 1) {
                        layer.alert(response.message, {
                            icon: 6,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                        setTimeout(function () {
                            location.href = '/goods';
                        }, 1000)
                    }else{
                        layer.alert(response.message, {
                            icon: 5,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                    }

                }
            })
        }

        new Vue({
            el: '#app',
            data: {
                goodslist: [{attr: '', inventory: ''}]
            },
            methods: {
                add() {
                    this.goodslist.push({attr: '', inventory: ''});
                },
                del(k) {
                    this.goodslist.splice(k, 1)
                }
            }
        })
    </script>
</div>


        </div>
    </div>
</div>
</body>
</html>
