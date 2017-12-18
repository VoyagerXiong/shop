<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/index/detail.php";i:1512982500;s:70:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/base.php";i:1512978954;}*/ ?>
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
<link href="/static/home/css/goods-detail.css" rel="stylesheet"/>
<script src="/static/js/jquery.min.js"></script>
<!-- start banner_x -->
<div class="banner_x center">
    <a href="/" target="_blank">
        <div class="logo fl"></div>
    </a>
    <!--			<a href=""><div class="ad_top fl"></div></a>-->
    <div class="nav fl">
        <ul>
            <?php foreach($columns as $c): ?>
            <li><a href="/index/index/lists?id=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="search fr">
        <form action="/index/index/search" method="post">
            <div class="text fl">
                <input type="text" name="input" class="shuru" placeholder="小米6&nbsp;小米MIX现货">
            </div>
            <div class="submit fl">
                <input type="submit" class="sousuo" value="搜索"/>
            </div>
            <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>
<!-- end banner_x -->
<div class="wrapper">
    <div class="detail-top clearfix">
        <div class="detail-goods">
            <div class="detail-show">
                <div class="origin-show">
                    <div class="zoomup"></div>
                    <img class="big-pic" src="<?php echo $good['list_image']; ?>" alt="<?php echo $good['name']; ?>"/>
                </div>
                <div class="thumb-show">
                    <?php foreach($good['content_images'] as $pic): ?>
                    <span class="item"><img class="s-pic" src="/<?php echo $pic; ?>" bsrc="/<?php echo $pic; ?>"/></span>
                    <?php endforeach; ?>
                </div>
                <div class="zoom-show">
                    <img src="" alt=""/>
                </div>
            </div>
            <div class="detail-info">
                <div class="item-title"><?php echo $good['name']; ?></div>
                <div class="item-price">
                    <span class="now">￥<span name="price"><?php echo $good['unitprice']; ?></span></span><span
                            class="dft">￥<?php echo sprintf('%.2f',$good['unitprice'] + rand(0,300)) ?></span>
                </div>
                <ul class="item-data clearfix">
                    <li class="col-4">销量<span class="txt-theme ml10">27件</span></li>
                    <li class="col-4">好评率<span class="txt-theme ml10">99%</span></li>
                    <li class="col-4">收藏<span class="txt-theme ml10">228人</span></li>
                </ul>
                <div class="sku-info">
                    <div class="prop">
                        <div class="dt">分类：</div>
                        <div class="dd">
                            <ul class="chose-img">
                                <style>
                                    div.attribute {
                                        width: 160px;
                                        height: 40px;
                                        border: 1px solid #EEE;
                                        float: left;
                                        margin: 10px 10px 10px 0px;
                                        text-align: center;
                                        line-height: 40px;
                                        position: relative;
                                    }

                                    div.attribute_active {
                                        border: 1px solid #6ab02f;
                                    }
                                </style>
                                <?php foreach($goodslist as $gl): ?>
                                <div class="attribute" name="attribute" number="<?php echo $gl['inventory']; ?>" price="<?php echo $good['unitprice']; ?>"
                                     gtid="<?php echo $gl['id']; ?>" style="display: inline;">
                                    <?php echo $gl['attr']; ?>
                                </div>
                                <?php endforeach; ?>
                                <script>
                                    let gtid = '';
                                    $('div[name=attribute]').click(function () {
                                        $('div[name=attribute]').removeClass('attribute_active');
                                        // $('div[name=attribute]').children('img').hide();
                                        $(this).addClass('attribute_active');
                                        // $(this).children('img').show();
                                        $('span[name=price]').html($(this).attr('price'));
                                        $('span[name=num]').html($(this).attr('number'));
                                        // $('div[name=stock]').show();
                                        $('p[name=num]').show();
                                        //给gtid赋值
                                        gtid = $(this).attr('gtid');
                                    })
                                </script>

                            </ul>
                        </div>
                    </div>
                    <div class="prop">
                        <div class="dt">数量：</div>
                        <div class="dd">
                            <div class="mod-numbox chose-num" data-max="3">
                                <span class="count-minus"></span>
                                <input class="count-input" value="1" type="text" name="num"/>
                                <span class="count-plus"></span>
                            </div>
                            <span>（限购3件）</span>
                            <div class="stock">库存<span name="num" style="font-size: 20px;color: #6ab02f;">0</span>件</div>
                        </div>
                    </div>
                </div>
                <div class="item-action">
<!--                    <a href="javascript:;" class="buy-now">立即购买</a>-->
                    <a href="javascript:addCart(gtid);" class="add-cart">加入购物车</a>
                    <script>
                        function addCart(id){
                            let gnum = $('input[name=num]').val();
                            $.ajax({
                                url:'/index/cartsave/addCart?id='+id+'&num='+gnum,
                                method:'get',
                                success:function(response){
                                    if(response.valid==1){
                                        alert(response.message);
                                        $('span[name=total_rows]').html(response.num);
                                        // location.reload();
                                        // location.href = response.url;
                                    }else{
                                        alert(response.message);
                                    }
                                }
                            })
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="detail-shop">
            <div class="clearfix">
                <a class="shop-brand" href="">
                    <img src="/static/home/uploads/1.png" alt=""/>
                </a>
                <div class="shop-intro">
                    <br>
                    <div class="shop-name" style="position: relative;top: -10px;">窝家商城</div>
                </div>
            </div>
            <ul class="shop-info">
                <li>所在地区：<br>深圳市宝安区松岗街道</li>
                <li>联系方式：<br>13168024953</li>
                <li>投诉建议：<br>1396990761@qq.com</li>
                <li>扫码关注：<br><img class="ico" src="/static/home/image/code.png" alt="" style="width: 200px;height: 200px;"/></li>
            </ul>
        </div>
    </div>
    <div class="detail-bottom clearfix">
        <div class="detail-main">
            <div class="detail-tabs">
                <a class="item" href="javascript:;">详情描述</a>
                <a class="item" href="javascript:;">商品评价</a>
            </div>
            <div class="tab-con">
                <div class="mod-type-cont">
                    <?php echo $good['content']; ?>
                </div>
            </div>
            <div class="tab-con">
                <div id="SOHUCS"></div>
                <script charset="utf-8" type="text/javascript" src="/static/js/changyan.js" ></script>
                <script type="text/javascript">
                    window.changyan.api.config({
                        appid: 'cytjsH4wi',
                        conf: 'prod_5532bb9d32a29ef8b37d7b48bc51c881'
                    });
                </script>
            </div>
        </div>
        <div class="detail-aside">
            <div class="detail-aside-box">
                <div class="big-tit">店铺热销</div>
                <ul class="detail-hot">
                    <?php foreach($commendgoods as $cg): ?>
                    <li>
                        <a href="/index/index/detail?id=<?php echo $cg['id']; ?>" class="figure"><img src="/<?php echo $cg['list_image']; ?>" alt=""/></a>
                        <div class="name"><a href="/index/index/detail?id=<?php echo $cg['id']; ?>"><?php echo $cg['name']; ?></a></div>
                        <div class="price">
                            <span class="now">¥<?php echo $cg['unitprice']; ?></span><span class="origin" style="text-decoration: line-through;">¥<?php echo sprintf('%.2f',$cg['unitprice'] + rand(0,300)) ?></span>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="/static/home/js/slick/slick.css"/>
<script src="/static/home/js/slick/slick.min.js"></script>
<script src="/static/home/js/global.js"></script>
<script>
    /*商品数量操作*/
    function goodsCount(o) {
        if (!(o instanceof Object)) var o = {};
        var inputCell = o.inputCell || ".count-input",
            minusCell = o.minusCell || ".count-minus",
            plusCell = o.plusCell || ".count-plus",
            disClass = o.disClass || "disabled";
        return this.each(function () {
            var $wrap = $(this),
                $input = $(inputCell, $wrap),
                $minus = $(minusCell, $wrap),
                $plus = $(plusCell, $wrap),
                maxnum = parseInt($wrap.attr('data-max')) || false,
                minnum = $wrap.attr('data-min') || 1,
                initnum = $input.val() || minnum;
            /*初始*/
            $input.val(initnum);
            checkIlegal();

            function checkIlegal() {
                var value = parseInt($input.val());

                //
                if (maxnum && value > maxnum) {
                    $input.val(maxnum);
                }
                else if (value < minnum) {
                    $input.val(minnum);
                }
                if (value <= minnum) {
                    $minus.addClass(disClass);
                } else {
                    $minus.removeClass(disClass);
                }
                if (value >= maxnum) {
                    $plus.addClass(disClass);
                } else {
                    $plus.removeClass(disClass);
                }

            }

            function checknull() {
                var value = $input.val();
                if (value === "" || value === "0") {
                    $input.val(minnum);
                }
            }

            $input.keyup(function (evt) {
                var value = $(this).val();
                var newvalue = value.replace(/[^\d]/g, "");
                $(this).val(newvalue);
                checknull();
            });
            $input.blur(function () {
                checknull();
                checkIlegal();
            })

            $minus.click(function () {
                minus();
                checkIlegal();
            });

            $plus.click(function () {
                add();
                checkIlegal();
            });

            function add() {
                var value = $input.val();
                var plus = parseInt(value) + 1;
                $input.val(plus);
            }

            function minus() {
                var value = parseInt($input.val());
                var minus = value - 1;
                $input.val(minus);
            }
        });
    }

    $.fn.goodsCount = goodsCount;
</script>

<script>
    $(function () {

        +function () {
            var index = 0,
                bsrc = '',
                timer = null,
                box = $('.detail-show'),
                origin = $('.origin-show'),
                bigimg = box.find('.big-pic'),
                tumb = box.find('.thumb-show'),
                tumbItem = tumb.find('.item'),
                zoomup = box.find('.zoomup'),
                zoomshow = box.find('.zoom-show');

            /*图片切换*/
            tumbItem.on('mouseenter', function () {
                index = $(this).index();
                clearTimeout(timer);
                timer = setTimeout(function () {
                    update(index);
                }, 300)

            });

            function update(index) {
                bsrc = tumbItem.eq(index).find('.s-pic').attr('bsrc');
                bigimg.attr('src', bsrc);
                tumbItem.find('.s-pic').removeClass('active').end().eq(index).find('.s-pic').addClass('active');
            }

            update(index);

            if ($('.detail-show .thumb-show .item').length > 5) {
                $('.detail-show .thumb-show').slick({
                    slidesToShow: 5,
                    infinite: false
                });
            }

            /*放大镜*/
            origin.on('mouseover mouseout', function (e) {
                if (e.type == "mouseover") {
                    var oX = $(this).offset().left,
                        oY = $(this).offset().top,
                        zX = e.pageX,
                        zY = e.pageY,
                        pW = $(this).outerWidth(),
                        pH = $(this).outerHeight(),
                        zW = zoomup.outerWidth(),
                        zH = zoomup.outerHeight(),
                        scale = pW / zW,
                        zsW = zoomshow.width() * scale,//放大后的宽度
                        factor = zsW / pW

                    zoomshow.find('img').attr('src', bigimg.attr('src')).width(zsW);

                    $(document).on('mousemove.zoom', function (e) {
                        zX = e.pageX - oX - zW / 2;
                        zY = e.pageY - oY - zH / 2;
                        move();
                    });

                    function move() {
                        zX = zX <= 0 ? 0 : zX;
                        zX = zX >= pW - zW ? pW - zW : zX;
                        zY = zY <= 0 ? 0 : zY;
                        zY = zY >= pH - zH ? pH - zH : zY;
                        zoomup.show().css({top: zY, left: zX});
                        zoomshow.show().find('img').css({top: -zY * factor, left: -zX * factor});
                    }
                }
                else {
                    $(document).off('mousemove.zoom');
                    zoomup.hide()
                    zoomshow.hide();
                }
            });
        }();

        $('.mod-numbox').goodsCount(); //数量加减

        $('.detail-main').zTab({
            tabnav: '.detail-tabs',
            trigger: 'click'
        });
    });
</script>


<footer class="mt20 center">
    <div class="mt20">商城首页 | 小米手机 | 红米 | 笔记本 | 电视 | 盒子 | 路由器 | 智能硬件</div>
    <div>©vohome.xin 京ICP证110507号 京ICP备17058645号</div>
    <div>违法和不良信息举报电话：131-6802-4953，本网站所列数据，除特殊说明，所有数据均出自测试</div>

</footer>
</body>
</html>