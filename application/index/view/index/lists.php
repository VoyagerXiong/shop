{extend name="base" /}
{block name="content"}
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
<div class="danpin center">
    <div class="biaoti center">{$precolumn.name}</div>
    <div class="main center" style="height: <?php echo ceil(count($goods)/5)*363 ?>px;">
        {foreach $goods as $g}
        <div class="mingxing fl mb20" style="border:2px solid #fff;width:230px;cursor:pointer;" onmouseout="this.style.border='2px solid #fff'" onmousemove="this.style.border='2px solid #6ab02f'">
            <div class="sub_mingxing"><a href="/index/index/detail?id={$g.id}" target="_blank"><img src="/{$g.list_image}" alt=""></a></div>
            <div class="pinpai"><a href="/index/index/detail?id={$g.id}" target="_blank">{$g.name}</a></div>
            <div class="youhui">{$g.uptime}开售</div>
            <div class="jiage">{$g.unitprice}</div>
        </div>
        {/foreach}
    </div>
</div>
{/block}