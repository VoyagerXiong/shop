{extend name="base" /}
{block name="content"}
<link href="/static/home/css/iconfont/iconfont.css" rel="stylesheet"/>
<link href="/static/home/css/common.css" rel="stylesheet"/>
<link href="/static/home/css/cart.css" rel="stylesheet"/>
<div class="cart-header wrapper">
    <div class="logo">
    </div>
    <div class="banner_x center" style="width: 440px;margin-top: 13px;float: left;">
        <a href="./index.html" target="_blank"><div class="logo fl"></div></a>
<!--        <div class="wdgwc fl ml40">我的购物车</div>-->
        <div class="clear"></div>
    </div>
    <div class="step-box">
        <div class="row">
            <div class="step first active col-3">
                <span class="num">1</span><span class="line"></span><span class="label">我的购物车</span>
            </div>
            <div class="step col-3">
                <span class="num">2</span><span class="line"></span><span class="label">确认订单信息</span>
            </div>
            <div class="step col-3">
                <span class="num">3</span><span class="line"></span><span class="label">选择支付方式</span>
            </div>
            <div class="step last col-3">
                <span class="num">4</span><span class="line"></span><span class="label">完成付款</span>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <table class="cart-table">
        <thead>
        <tr class="hd">
            <th width="70px" class="first"><label class="check"><input id="checkall" type="checkbox" name="all" /><span>全选</span></label></th>
            <th width="430px">商品名称</th>
            <th width="180px">单价</th>
            <th width="190px">数量</th>
            <th width="180px">小计</th>
            <th width="190px">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr class="blank">
            <td colspan="6"></td>
        </tr>
        <tr class="shop">
            <td colspan="6" class="first">
                <div class="check"><input type="checkbox" name="shop"/><span>店铺：窝家商城</span></div>
            </td>
        </tr>
        </tbody>
        <tbody>
        {foreach $cart['goods'] as $k=>$v}
        <tr class="goods">
            <td class="first"><div class="check"><input type="checkbox" name=""/></div></td>
            <td>
                <div class="info-box">
                    <img src="/{$v.options.list_image}" alt="">
                    <div class="info">
                        <div class="name">{$v.name}</div>
                        <div class="meta"><span>{$v.options.attr}</span></div>
                    </div>
                </div>
            </td>
            <td>￥<span class="unitprice">{$v.price}</span></td>
            <td>
                <div class="mod-numbox cart-numbox" data-max="">
                    <span class="count-minus"></span>
                    <input class="count-input" value="{$v.num}"  type="text" name="num[]" sid="{$k}"/>
                    <span class="count-plus"></span>
                </div>
            </td>
            <td class="txt-error">￥<span class="price">{$v.total}</span></td>
            <td><a href="javascript:;" class="del iconfont icon-shanchu" sid="{$k}"></a></td>
        </tr>
        {/foreach}
        </tbody>
    </table>
    <div class="cart-total-box">
        <div class="cart-total">
            <div class="fl">
                <div class="back"><a href="/">继续购物</a></div><div class="count">共 <span class="num" id="totalNum">1</span> 件商品， 已选择 <span class="num" id="selectedNum">1</span> 件</div>
            </div>
            <div class="fr">
                <div class="price">
                    合计（不含运费）：<span id="totalMoney">{$Think.cart.total}</span>元
                </div>
                <a class="go-account ui-btn-theme" href="javascript:confirm();">确认订单</a>
            </div>
        </div>
    </div>
</div>
<script src="/static/home/js/jquery.js"></script>
<link rel="stylesheet" href="/static/home/js/icheck/style.css"/>
<script src="/static/home/js/icheck/icheck.min.js"></script>
<script src="/static/home/js/global.js"></script>
<script>
    /*去提交订单页*/
    function confirm(){
        $.ajax({
            url:'/index/order/confirm',
            // data:$('input[name=num]').serialize(),
            success:function(res){
                if(res.valid==0){
                    alert(res.message);
                    location.href='/index/user/login'
                }else{
                    location.href='/index/order/confirm'
                }
            }

        })
    }

    /*商品数量操作*/
    function goodsCount(o){
        if(!(o instanceof Object)) var o={};
        var inputCell = o.inputCell || ".count-input",
            minusCell = o.minusCell || ".count-minus",
            plusCell = o.plusCell || ".count-plus",
            disClass = o.disClass || "disabled";
        return this.each(function(){
            var $wrap = $(this),
                $input = $(inputCell,$wrap),
                $minus = $(minusCell,$wrap),
                $plus = $(plusCell,$wrap),
                maxnum=parseInt($wrap.attr('data-max')) || false,
                minnum=$wrap.attr('data-min') || 1,
                initnum=$input.val() || minnum;
            /*初始*/
            $input.val(initnum);
            checkIlegal();
            function checkIlegal(){
                var value =parseInt($input.val());

                //
                if (maxnum&&value>maxnum) {
                    $input.val(maxnum);
                }
                else if (value<minnum) {
                    $input.val(minnum);
                }
                if(value<=minnum){
                    $minus.addClass(disClass);
                }else{
                    $minus.removeClass(disClass);
                }
                if (value>=maxnum) {
                    $plus.addClass(disClass);
                }else {
                    $plus.removeClass(disClass);
                }

            }
            function checknull() {
                var value =$input.val();
                if(value === "" || value === "0"){
                    $input.val(minnum);
                }
            }
            $input.keyup(function(evt){
                var value = $(this).val();
                var newvalue = value.replace(/[^\d]/g,"");
                $(this).val(newvalue);
                checknull();
            });
            $input.blur(function(){
                checknull();
                checkIlegal();
            })

            $minus.click(function(){
                minus();
                checkIlegal();
            });

            $plus.click(function(){
                add();
                checkIlegal();
            });

            function add () {
                var value = $input.val();
                var plus = parseInt(value)+1;
                var sid = $input.attr('sid');
                $input.val(plus);
                butchange(sid);
            }
            function minus () {
                var value = parseInt($input.val());
                var minus = value-1;
                var sid = $input.attr('sid');
                $input.val(minus);
                butchange(sid);
            }
            function butchange(sid){
                var num = $input.val();
                if(num<1){
                    num = 1;
                }
                $.ajax({
                    url:'/index/cartsave/update?sid='+sid+'&num='+num
                })
            }
        });
    }
    $.fn.goodsCount = goodsCount;
</script>
<script >
    $(function () {
        $('.mod-numbox').goodsCount(); //数量加减
        $('.check input').iCheck({
            checkboxClass: 'sty1-checkbox'
        });
        +function () {
            var box=$('.cart-table');
            function caculate () {
                var selectNum=0,
                    totalNum=0,
                    totalPrice=0;
                checkNum=0,
                    itemlen=box.find('.goods:not(.goods-useless)').length;
                $('.goods:not(.goods-useless)').each(function () {
                    var $check=$(this).find('.check input'),
                        $price=$(this).find('.price'),
                        $count=$(this).find('.count-input'),
                        unitp=parseFloat($(this).find('.unitprice').text()),
                        num=parseInt($count.val());
                    var price=unitp*num;
                    $price.text(price.toFixed(2)); //设置单个商品总价
                    totalNum+=num;
                    if ($check.is(':checked')) {
                        selectNum+=num;
                        totalPrice+=price;
                        checkNum+=1;
                    }

                });
                $('#selectedNum').text(selectNum);
                $('#totalNum').text(totalNum);
                $('#totalMoney').text(totalPrice.toFixed(2));
                if (itemlen==0) {return false;}
                if (checkNum<itemlen) {
                    $('#checkall').iCheck('uncheck');
                }
                else {
                    $('#checkall').iCheck('check');
                }
            }
            function shopaccess () {
                $('.shop').each(function(index, el) {
                    var next=$(this).parents('tbody').next('tbody');
                    if (next.find('.goods:not(.goods-useless)').length<=0) {
                        $(this).find('.check input').iCheck('disable');
                        return;
                    }
                });
            }
            function shopcheck (obj) {
                var shop=obj.prev('tbody').find('.shop'),
                    goods=obj.find('.goods:not(.goods-useless)'),
                    len=goods.length,
                    cur=0;
                goods.each(function(index, el) {
                    if ($(this).find('.check input').is(':checked')) {
                        cur++;
                    }
                });
                if (cur==len) {
                    shop.find('.check input').iCheck('check')
                }
                else {
                    shop.find('.check input').iCheck('uncheck')
                }
            }

            $('.count-input').on('change blur',function () {
                caculate();
            });
            $('.mod-numbox span').on('click',function () {
                caculate();
            });
            box.find('.goods .check input').on('ifToggled',function () {
                caculate();
                var gbox=$(this).parents('tbody');
                shopcheck(gbox);
            });
            $('#checkall').on('ifClicked',function () {
                //全选
                if ($(this).is(':checked')) {
                    $('.check input').iCheck('uncheck');
                }
                else {
                    $('.check input').iCheck('check');
                }
                caculate();
            });

            box.find('.shop .check input').on('ifClicked',function () {
                //店铺全选

                var curItem=$(this).parents('tbody').next('tbody').find('.goods');

                if ($(this).is(':checked')) {
                    curItem.find('.check input').iCheck('uncheck');
                }
                else {
                    curItem.find('.check input').iCheck('check');
                }
                caculate();
            });
            //删除
            $('.goods .del').on('click',function () {
                var self=$(this),
                    shop=self.parents('tbody').prev('tbody'),
                    gbox=self.parents('tbody');
                self.parents('.goods').remove();
                var len=gbox.find('.goods').length;
                if (len<=0) {
                    shop.remove();
                }
                caculate();
                shopaccess();
                shopcheck(gbox);
                let sid = $(this).attr('sid');
                    $.ajax({
                        url:'/index/cartsave/del?sid='+sid,
                        success:function(e){
                            location.href = '/index/cartsave/index'
                        }
                    })
            });
            box.find('.check input').iCheck('check',true);//初始化全选测试
            caculate();
            shopaccess();
        }();
        //结算固定显示
        $(window).on('load resize scroll',function () {
            var bar=$('.cart-total'),
                barH=bar.outerHeight(),
                barWrap=bar.parent(),
                otop=barWrap.offset().top,
                oleft=barWrap.offset().left,
                sTop=$(this).scrollTop(),
                wh=$(this).height();
            if (sTop+wh-barH<otop) {
                bar.addClass('fixed');
                var left2=oleft-$(this).scrollLeft()
                bar.css('left',left2);
            }
            else {
                bar.removeClass('fixed');
            }
        });
    });
</script>
{/block}
