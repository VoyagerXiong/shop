<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/user/login.php";i:1512562230;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>窝家商城-会员登录</title>
		<link rel="stylesheet" type="text/css" href="/static/home/css/login.css">
	</head>
	<body>
		<!-- login -->
<!--		<div class="top center">-->
<!--			<div class="logo center">-->
<!--				<a href="/" target="_blank"><img style="width: 234px;height: 100px;" src="/static/home/image/default2.png" alt=""></a>-->
<!--			</div>-->
<!--		</div>-->
		<form  method="post" action="" class="form center">
		<div class="login">
			<div class="login_center">
				<div class="login_top">
					<div class="left fl">会员登录</div>
					<div class="right fr">您还不是我们的会员？<a href="/index/user/register" target="_self">立即注册</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="login_main center">
					<div class="username">用户名:&nbsp;<input class="shurukuang" type="text" name="username" placeholder="请输入你的用户名"/></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/></div>
					<div class="username">
						<div class="left fl">验证码:&nbsp;<input class="yanzhengma" type="text" name="capchar" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="/static/home/image/yanzhengma.jpg"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="login_submit">
					<input class="submit" type="submit" name="submit" value="立即登录" >
				</div>
				
			</div>
		</div>
		</form>
<!--		<footer>-->
<!--			<div class="copyright">简体 | 繁体 | English | 常见问题</div>-->
<!--			<div class="copyright">窝家商城版权所有-京ICP备17058645号</div>-->
<!---->
<!--		</footer>-->
	</body>
</html>