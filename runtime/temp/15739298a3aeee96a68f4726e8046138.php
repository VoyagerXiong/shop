<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/shop.vohome.xin/public/../application/index/view/user/register.php";i:1512698615;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="/static/home/css/login.css">
        <script src="/static/js/jquery.min.js"></script>

	</head>
	<body>
		<form onsubmit="post(event)" method="post" action="" id="submitform">
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="/" target="_self">窝家商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="username" placeholder="请输入你的用户名"/><span style="color: red;"></span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/><span style="color: red;"></span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="repassword" placeholder="请确认你的密码"/><span style="color: red;"></span></div>
					<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" name="tel" placeholder="请填写正确的手机号"/><span style="color: red;"></span></div>
					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="capchar" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="/static/home/image/yanzhengma.jpg"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="submit" value="立即注册">
				</div>
			</div>
<!--            <script>-->
<!--                $('input[name=username]').blur(function(){-->
<!--                    -->
<!--                })-->
<!--            </script>-->
		</div>
		</form>
        <script>
            function post(event){
                event.preventDefault();
                $.ajax({
                    url:'/index/user/register',
                    method:'post',
                    data:$('#submitform').serialize(),
                    success:function(res){
                        if(res.valid==5){
                            alert(res.message);
                            location.href='/index/user/login';
                        }
                        $('.shurukuang').siblings('span').empty();
                        $('.shurukuang').eq(res.valid).siblings('span').html(res.message);
                    }
                })
            }
        </script>
	</body>
</html>