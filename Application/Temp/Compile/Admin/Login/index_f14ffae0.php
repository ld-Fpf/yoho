<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>管理员登录--欢迎使用商城管理系统</title>
		<link type="text/css" rel="stylesheet" href="http://localhost/yoho/Application/Admin/View/Public/css/style.css" />
		<script type="text/javascript" src="http://localhost/yoho/Application/Admin/View/Public/js/jquery-1.7.2.min.js"></script>
		<style type="text/css">
			body{background:#CCCCFF; font-family:'Microsoft Yahei','Simsun',"宋体"}
			.login_tt{font-size:24px; line-height:30px; color:#fff; width:462px; margin:0 auto; margin-top:150px; text-align:center}
			.login{background:url(http://localhost/yoho/Application/Admin/View/Public/images/login_bg.png) no-repeat; width:462px; height:244px; margin:0 auto; margin-top:15px; padding-top:40px;}
			.input1{margin:0px 0 0 65px; font-size:14px; color:#888;}
			.input1 input{width:140px; height:28px; border:0; line-height:28px; margin-left:5px;}
			.input2{margin:23px 0 0 60px; font-size:14px; color:#888;}
			.input2 input{width:140px; height:28px; border:0; line-height:28px; margin-left:5px;}
			.input3_box{background:#fff url(http://localhost/yoho/Application/Admin/View/Public/images/login_bg.png) no-repeat -36px -87px; border:1px #bbb solid; border-radius:5px; height:35px; line-height:32px;width:182px; padding-left:30px; color:#666; float:left;}
			.input3{margin:20px 0 0 33px;}
			.input3_box input{width:53px; height:28px; border:0; line-height:28px; margin-left:5px; margin-top:2px;}
			.input3 img{margin-left:3px; width:80px; height:32px; border:0; float:left; display:inline; margin-top:2px;}
			.login_btn{margin:25px 0 0 33px;}
			.login_btn input{background:url(http://localhost/yoho/Application/Admin/View/Public/images/login_btn.gif) no-repeat; width:216px; height:43px; border:0; cursor:pointer;}
			.copyright{text-align:center; color:#888;}
			.copyright a,.copyright a:hover{color:#777;}
			.login .input_name{float:left; margin-top:3px; display:block;}
		</style>
	</head>
	<body>
		<div class="login_tt">商城管理系统</div>
		<form method="post" action="">
			<div class="login">	
				<div class="input1">
					<span class="input_name">账 号:</span>
					<input type="text" name="username" value="" />
					<div class="clear"></div>
				</div>
				<div class="input2">
					<span class="input_name">密 码:</span>
					<input type="password" name="password" value="" />
					<div class="clear"></div>
				</div>
				<div class="input3">
					<div class="input3_box" style="position:relative;">
						<span class="fl">验证码:</span>
						<input class="fl" type="text" name="code" />
						<div class="clear"></div>
						<img src="<?php echo U('Login/code');?>" class="code" style="cursor:pointer; position:absolute; left:128px; top:0" />
					</div>
					<div class="clear"></div>
				</div>
			
				<div class="login_btn">
					<input name="ide" value="a" type="hidden" />
					<input type="submit" name="pesubmit" value=" " />
				</div>
			</div>
		</form>
		
<!-- 		<div class="copyright">Copyright <span class="num">?</span> 2014-2017 <a href="#" target="_blank"></a> 版权所有</div> -->


		<script type="text/javascript">
			$(function(){
				$(".code").click(function(){
					$(this).attr("src", $(this).attr("src") + '?time=' + new Date().getTime());
				});
				
				$(":submit").click(function(){
					if ($(":input[name='username']").val() == '') {
						alert('帐号不能为空！')
						return false;
					}
				
					if ($(":input[name='password']").val() == '') {
						alert('密码不能为空！')
						return false;
					}
				
					return true;
				});
			});
		</script>
	</body>
</html>

