<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/address/index.php";i:1512983321;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>窝家商城</title>
    <link rel="stylesheet" type="text/css" href="/static/home/css/style.css">
</head>
<body>
<!-- start header -->
<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <li><a href="/" target="_blank">商城首页</a></li>
                <?php foreach($columns as $c): ?>
                <li>|</li>
                <li><a href="/index/index/lists?id=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
                <?php endforeach; ?>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr">
            <div class="gouwuche fr"><a href="/index/cartsave/index">购物车( <span name="total_rows"><?php echo \think\Session::get('cart.total_rows')?:0; ?></span>
                    )件</a></div>
            <div class="fr">
                <?php $user = \think\Session::get('user'); if (!$user||$user['is_admin']==1): ?>
                    <ul>
                        <li><a href="/index/user/login" target="_blank">登录</a></li>
                        <li>|</li>
                        <li><a href="/index/user/register" target="_blank">注册</a></li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li><a href="/index/myaccount/myorder"><?php echo $user['username']; ?></a></li>
                        <li>|</li>
                        <li><a href="/index/user/logout">退出</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</header>

<link href="/static/home/css/iconfont/iconfont.css" rel="stylesheet"/>
<link href="/static/home/css/common.css" rel="stylesheet"/>
<link href="/static/home/css/uc.css" rel="stylesheet"/>
<link href="/static/home/css/cart.css" rel="stylesheet"/>
<script src="/static/js/jquery.min.js"></script>
<link rel="stylesheet" href="/static/home/js/icheck/style.css"/>
<script src="/static/home/js/icheck/icheck.min.js"></script>
<script src="/static/home/js/layer/layer.js"></script>
<script src="/static/home/js/global.js"></script>
<script src="/static/js/third.js"></script>
<script src="/static/js/third2.js"></script>
<script src="/static/js/main.js"></script>
<div class="wrapper">
    <div class="uc-main clearfix">
        <div class="uc-aside">
            <div class="uc-menu">
                <div class="tit">账户中心</div>
                <ul class="sublist">
                    <li><a class="active" href="/index/myaccount/myorder">我的订单</a></li>
                    <li><a href="/index/address/index">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-content">
            <div class="uc-panel">
                <div class="uc-bigtit">收货地址</div>
                <div class="uc-panel-bd">

<!--                    <div class="ui-msg-info ui-msg-block">您已创建 2 个收货地址，最多可创建 5 个</div>-->
                    <div class="address-list">
                        <div class="col col-4 new-address">
                            <a class="item va-m-box ta-c add">
                                <div class="add-new">
                                    <span class="ico"><i class="iconfont icon-tianjia"></i></span>
                                    <div class="label">添加收货地址</div>
                                </div>
                            </a>
                        </div>
                        <?php foreach($address as $a): ?>
                        <div class="col col-4 oldaddress">
                            <div class="item <?php if ($a['is_default'] == 1): ?>active<?php endif; ?>">
                                <div class="action">
                                    <div class="fl">
                                        <a class="edit" href="edit?id=<?php echo $a['id']; ?>">修改</a>
                                        <a class="del" href="javascript:deladdress(<?php echo $a['id']; ?>);">删除</a>
                                    </div>
                                    <div class="fr"><a class="setdft" aid="<?php echo $a['id']; ?>" href="javascript:;">设为默认</a></div>
                                </div>
                                <div class="info">
                                    <div class="ellipsis"><img src="/static/home/img/ico/user.jpg" alt=""/><?php echo $a['province']; ?><?php echo $a['city']; ?>（<?php echo $a['username']; ?>
                                        收）
                                    </div>
                                    <div class="ellipsis"><img src="/static/home/img/ico/dizhi.jpg" alt=""/><?php echo $a['district']; ?><?php echo $a['address']; ?>
                                    </div>
                                    <div class="ellipsis"><img src="/static/home/img/ico/tel.jpg" alt=""/><?php echo $a['userphone']; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <script>
                            let aid = '';
                            $(document.body).on('click', '.address-list .setdft', function () {
                                $(this).parents('div.oldaddress').siblings().children('.item').removeClass('active');
                                $(this).parents('div.item').addClass('active');
                                aid = $(this).attr('aid');
                                $.ajax({
                                    url: '/index/address/changeAddress?id=' + aid,
                                    method: 'post',
                                    success: function (res) {
                                    }
                                })
                            });
                            function deladdress(id){
                                layer.confirm('您确定要删除该地址吗？', {
                                    btn: ['确认','取消'] //按钮
                                }, function(){
                                    $.ajax({
                                        url: 'delAddress?id=' + id,
                                        success: function (res) {
                                            layer.alert('地址已删除', function () {
                                                location.reload();
                                            })
                                            location.reload();
                                        }
                                    });
                                }, function(){
                                });
                            }

                        </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="addressform" style="display:none" class="layer-address">
    <form onsubmit="post(event)" id="address">
        <div class="control-group">
            <div class="hd">
                收货人姓名：
            </div>
            <div class="bd">
                <input class="ui-txtin ui-txtin-thin" style="width: 200px;" type="text" name="username" id="">
            </div>
        </div>
        <div class="control-group">
            <div class="hd">
                联系电话：
            </div>
            <div class="bd">
                <input class="ui-txtin ui-txtin-thin" style="width: 200px;" type="text" name="userphone" id="">
            </div>
        </div>
        <div class="control-group">
            <div class="hd vat">
                所在地区：
            </div>
            <div class="bd">
                <div data-toggle="distpicker"><!-- container -->
                    <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="province"></select><!-- 省 -->
                    <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="city"></select><!-- 市 -->
                    <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="district"></select><!-- 区 -->
                </div>
                <div class="mt10">
                    <input class="ui-txtin ui-txtin-thin" style="width: 560px;" type="text" name="address" id=""
                           placeholder="请填写具体地址，不需要重复填写省/市/区">
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="hd">
                设置为默认地址：
            </div>
            <div class="bd">
                <input class="ui-txtin ui-txtin-thin" type="checkbox" name="is_default" value="1"> 是
            </div>
        </div>
        <div class="control-bottom clearfix">
            <button class="fl btn ui-btn-theme">保存</button>
            <a href="" class="fr btn ui-btn cancle">取消</a>
        </div>
    </form>
</div>
<script>
    //这里不使用自带按钮，因为设计按钮较特殊，不准备作为通用样式
    $('.address-list .new-address').on('click', function () {
        layer.open({
            type: 1,
            skin: 'layui-layer-seaing',
            title: '标题',
            area: ['720px', 'auto'],
            content: $('#addressform')
            //btn: ['按钮一', '按钮二']
        });
    });
    $(document.body).on('click', '.layer-address .cancle', function () {
        layer.closeAll();
        return false;
    });

    //编辑地址
    function post(event) {
        event.preventDefault();
        $.ajax({
            url: 'addAddress',
            method: 'post',
            data: $('#address').serialize(),
            success: function (res) {
                layer.alert('保存成功', {
                    icon: 1,
                    skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                });
                setTimeout(function () {
                    location.reload();
                }, 500)
            }
        })
    }


</script>


<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>