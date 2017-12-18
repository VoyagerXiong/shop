{extend name="base" /}
{block name="content"}
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
                    <li><a href="/index/myaccount/myorder">我的订单</a></li>
                    <li><a class="active"  href="/index/address/index">收货地址</a></li>
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
                        {foreach $address as $a}
                        <div class="col col-4 oldaddress">
                            <div class="item <?php if ($a['is_default'] == 1): ?>active<?php endif; ?>">
                                <div class="action">
                                    <div class="fl">
                                        <a class="edit" href="edit?id={$a.id}">修改</a>
                                        <a class="del" href="javascript:deladdress({$a.id});">删除</a>
                                    </div>
                                    <div class="fr"><a class="setdft" aid="{$a.id}" href="javascript:;">设为默认</a></div>
                                </div>
                                <div class="info">
                                    <div class="ellipsis"><img src="/static/home/img/ico/user.jpg" alt=""/>{$a.province}{$a.city}（{$a.username}
                                        收）
                                    </div>
                                    <div class="ellipsis"><img src="/static/home/img/ico/dizhi.jpg" alt=""/>{$a.district}{$a.address}
                                    </div>
                                    <div class="ellipsis"><img src="/static/home/img/ico/tel.jpg" alt=""/>{$a.userphone}</div>
                                </div>
                            </div>
                        </div>
                        {/foreach}
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
{/block}