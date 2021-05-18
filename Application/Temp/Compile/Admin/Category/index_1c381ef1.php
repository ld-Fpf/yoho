<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>后台首页 - 欢迎使用商城系统</title>
	<link type="text/css" rel="stylesheet" href="http://localhost/yoho/Application/Admin/View/Public/css/style.css" />
	<link rel="stylesheet" href="http://localhost/yoho/Application/Admin/View/Public/css/inc.css" />
	<script type="text/javascript" src="http://localhost/yoho/Static/jquery/jquery-1.7.2.min.js"></script>
</head>
<div class="bgimg"></div>
<div class="pagetop">
	<div class="head">
		<div class="logo fl"></div>

		<div class="admin_t fr">
			<ul>
				<li><a href="http://localhost/yoho"><img border=0 src="http://localhost/yoho/Application/Admin/View/Public/images/exit4.gif"></a></li>
				<li><a href="<?php echo U('Login/logout');?>" onclick="return confirm('你确定要退出系统吗？')" ><img border=0 src="http://localhost/yoho/Application/Admin/View/Public/images/exit3.gif"></a></li>
			</ul>
		</div>

		<div class="admin_u fr">
				<b>欢迎您-</b><a title="" target="_top" href=""><?php echo $hd['session']['adminname'];?></a>&nbsp;【超级管理员】 &nbsp;&nbsp;
		</div>
		<div class="clear"></div>
	</div>
</div>