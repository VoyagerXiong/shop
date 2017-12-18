{extend name="base" /}
{block name="content"}
<link href="/static/home/css/iconfont/iconfont.css" rel="stylesheet"/>
<link href="/static/home/css/common.css" rel="stylesheet"/>
<link href="/static/home/css/cart.css" rel="stylesheet"/>
<!--头部-->
<div class="bd-t"></div>
<div class="wrapper">
    <div class="ui-page-notice cartempty">
        <div class="section">
            <i class="ico iconfont icon-cartempty"></i>
            <div class="cont">
                <div class="tit">购物车空空的哦~，去看看心仪的商品吧~</div>
                <div>
                    <a href="/" class="ui-btn-theme">去逛逛</a>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}