{extend name="base" /}
{block name="content"}
<link rel="stylesheet" href="/static/css/swiper.min.css">
<style>
    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        /*text-align: center;*/
        font-size: 18px;
        background: #fff;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
    }
</style>
<!-- start banner_x -->
<div class="banner_x center">
    <a href="/" target="_blank">
        <div class="logo fl"></div>
    </a>
    <!--			<a href=""><div class="ad_top fl"></div></a>-->
    <div class="nav fl">
        <ul>
            {foreach $columns as $c}
            <li><a href="/index/index/lists?id={$c.id}">{$c.name}</a></li>
            {/foreach}
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

<!-- start banner_y -->
<div class="banner_y center">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/static/home/image/swiper-1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-5.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/static/home/image/swiper-6.jpg" alt=""></div>
        </div>
        <!-- Add Arrows -->
    </div>

    <!-- Swiper JS -->
    <script src="/static/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            // autoplay:true,
            autoplay: {
                delay: 2000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            },
            loop: true,
        });
    </script>
</div>

<div class="sub_banner center">
    <div class="fl"><a href="/index/index/detail?id=12"><img src="/static/home/image/lyq.jpg" alt="" style="width: 236px;height: ;"></a></div>
    <div class="datu fl"><a href="/index/index/detail?id=7"><img src="/static/home/image/hongmi4x.png" alt=""></a></div>
    <div class="datu fl"><a href="/index/index/detail?id=17"><img src="/static/home/image/xiaomi5.jpg" alt=""></a></div>
    <div class="datu fr"><a href="/index/index/detail?id=31"><img src="/static/home/image/pinghengche.jpg" alt=""></a>
    </div>
    <div class="clear"></div>


</div>
<!-- end banner -->

<!-- start danpin -->
<div class="danpin center">

    <div class="biaoti center">小米明星单品</div>
    <div class="main center">
        {foreach $hotgoods as $hotgood}
        <div class="mingxing fl">
            <div class="sub_mingxing"><a href="/index/index/detail?id={$hotgood.id}"><img src="/{$hotgood.list_image}"
                                                                                          alt=""></a></div>
            <div class="pinpai"><a href="">{$hotgood.name}</a></div>
            <div class="youhui">5月9日-21日享花呗12期分期免息</div>
            <div class="jiage"><?php echo intval($hotgood['unitprice']) ?>元起</div>
        </div>
        {/foreach}
        <div class="clear"></div>
    </div>
</div>
<div class="peijian w">
    <div class="biaoti center">所有商品</div>
    <div class="main center" style="height: <?php echo ceil(count($allgoods) / 5) * 314 ?>px;">
        <div class="content">
            {foreach $allgoods as $k=>$allgood}
            <div class="remen fl" style="margin-bottom: 14px;{if $k%5==4}margin-right: 0px;{/if}">
                <div class="tu"><a href="/index/index/detail?id={$allgood.id}"><img src="/{$allgood.list_image}" style="width: 160px;height:160px"></a>
                </div>
                <div class="miaoshu"><a href="/index/index/detail?id={$allgood.id}">{$allgood.name}</a></div>
                <div class="jiage"><?php echo intval($allgood['unitprice']) ?>元</div>
                <div class="pingjia">372人评价</div>
            </div>
            {if $k%5==4}
            <div class="clear"></div>
            {/if}
            {/foreach}
        </div>
    </div>
</div>
{/block}