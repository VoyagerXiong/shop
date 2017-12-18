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
                    <li><a class="active" href="/index/myaccount/myorder">我的订单</a></li>
                    <li><a href="/index/address/index">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-content">
            <div class="uc-panel">
                <div class="uc-bigtit">收货地址</div>
                <div id="addressform" class="layer-address">
                <form method="post" action="" id="address">
                    <div class="control-group">
                        <div class="hd">
                            收货人姓名：
                        </div>
                        <div class="bd">
                            <input class="ui-txtin ui-txtin-thin" required style="width: 200px;" type="text" name="username" value="{$address['username']}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd">
                            联系电话：
                        </div>
                        <div class="bd">
                            <input class="ui-txtin ui-txtin-thin" required style="width: 200px;" type="text" name="userphone" value="{$address['userphone']}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd vat">
                            所在地区：
                        </div>
                        <div class="bd">
                            <div data-toggle="distpicker"><!-- container -->
                                <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="province" data-province="{$address.province}"></select><!-- 省 -->
                                <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="city" data-city="{$address.city}"></select><!-- 市 -->
                                <select class="ui-txtin ui-txtin-thin" style="width: 180px;" name="district" data-district="{$address.district}"></select><!-- 区 -->
                            </div>

                        </div>
                    </div>
                    <div class="control-group">
                        <div class="hd vat">
                            详细地址：
                        </div>
                        <div class="bd">
                            <div class="mt10">
                                <input class="ui-txtin ui-txtin-thin" required style="width: 560px;" type="text" name="address" value="{$address.address}"
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
                        <button class="fl ui-btn-theme" style="margin-left: 80px;">保存</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

{/block}