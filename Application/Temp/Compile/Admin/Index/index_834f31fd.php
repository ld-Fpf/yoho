<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
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

<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div class="content">
	<div class="main">
		<div class="left">
			<div class="fenlei">
				<h3>商品管理</h3>
				<ul>
					<li ><a href="<?php echo U('Goods/index');?>">商品列表</a></li>
					<li ><a href="<?php echo U('Category/index');?>">商品分类</a></li>
					<li ><a href="">商品咨询</a></li>
					<li ><a href="">商品评价</a></li>
				</ul>
			</div>
			<div class="fenlei">
				<h3>品牌管理</h3>
				<ul>
					<li ><a href="<?php echo U('Brand/index');?>">品牌列表</a></li>
					<!-- <li ><a href="<?php echo U('Brand/add');?>">新增品牌</a></li> -->
				</ul>
			</div>
			<div class="fenlei">
				<h3>类型管理</h3>
				<ul>
					<li ><a href="<?php echo U('Type/index');?>">类型列表</a></li>
					<!-- <li ><a href="<?php echo U('Brand/add');?>">新增品牌</a></li> -->
				</ul>
			</div>
			<div class="fenlei">
				<h3>交易管理</h3>
				<ul>
					<li ><a href="">订单管理</a></li>
					<li ><a href="">支付方式</a></li>
				</ul>
			</div>
			<div class="fenlei">
				<h3>信息管理</h3>
				<ul>
					<li ><a href="">文章分类</a></li>
					<li ><a href="">文章列表</a></li>
					<li ><a href="">单页列表</a></li>
				</ul>
			</div>
			<div class="fenlei">
				<h3>用户管理</h3>
				<ul>
					<li ><a href="http://localhost/yoho/Application/Admin/View/Public/user/list.html">会员列表</a></li>
					<li ><a href="http://localhost/yoho/Application/Admin/View/Public/user/admin.html">管理列表</a></li>
				</ul>
			</div>
			<div class="fenlei">
				<h3>控制面板</h3>
				<ul>
					<li ><a href="http://localhost/yoho/Application/Admin/View/Public/set/base.html">基本信息</a></li>
					<li ><a href="http://localhost/yoho/Application/Admin/View/Public/set/cache.html">缓存管理</a></li>
					<li ><a href="http://localhost/yoho/Application/Admin/View/Public/set/link.html">友情链接</a></li>
					<li ><a href="<?php echo U('Banner/index');?>">banner列表</a></li>
				</ul>
			</div>

		</div>
<div class="right">
	<div class="admin_l">
		<div class="admin_t_info">
			<h3>系统信息</h3>
			<div class="banben">
				<div class="fl font14 mat6">
					<p>软件版本：<a href="" target="_blank" class="cgreen">Shop1.0</a><span class="font13 mal5 corg">(证书编号：<span id="license_num">无</span>)</span> </p>
					<p>开发团队：<u><a target="_blank" href="" class="c666">echo</a></u></p>
					<p>邮箱：<u style="font-family:'宋体'" class="c666">735696675@qq.com</u></p>
					<p>Q Q：<u><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=735696675&amp;site=http://localhost/l/&amp;menu=yes" target="_blank" class="c666">735696675</a></u>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="admin_t_info admin_t_info1 mat10">
			<h3>商品统计</h3>
			<ul>
			<li><a href="admin.php?mod=product&state=1" target="_blank">上架商品</a><span class="strong cgreen num">1</span>件</li>
			<li><a href="admin.php?mod=product&state=2" target="_blank">下架商品</a><span class="strong cgreen num">0</span>件</li>
			<li><a href="admin.php?mod=product&state=1&filter=num|0" target="_blank">缺货商品</a><span class="strong cgreen num">0</span>件</li>
			<li style="border-bottom:0"><a href="admin.php?mod=product&state=1&filter=istuijian|1" target="_blank">推荐商品</a><span class="strong cgreen num">0</span>件</li>
			</ul>
		</div>
		<div class="admin_t_info admin_t_info1 mat10 mal10">
			<h3>访客统计</h3>
			<ul>
			<li><a href="admin.php?mod=iplog" target="_blank">今日访客</a><span class="strong cgreen num">1</span>人</li>
			<li><a href="admin.php?mod=iplog" target="_blank">昨日访客</a><span class="strong cgreen num">1</span>人</li>
			<li><a href="admin.php?mod=iplog" target="_blank">累计访客</a><span class="strong cgreen num">3</span>人</li>
			<li style="border-bottom:0"><a href="admin.php?mod=user" target="_blank">累计注册</a><span class="strong cgreen num">0</span>人</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="admin_t_info mat10">
			<h3>交易数据</h3>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="bg01" width="120"></td>
				<td class="bg01" width="350">订单总数</td>
				<td class="bg01">订单总额</td>
			</tr>
			<tr>
				<td style="text-align:right">今日订单</td>
				<td class="strong num cgreen font14">0</td>
				<td class="strong num cred font14">0.0</td>
			</tr>
			<tr>
				<td style="text-align:right">昨日订单</td>
				<td class="strong num cgreen font14">0</td>
				<td class="strong num cred font14">0.0</td>
			</tr>
			<tr>
				<td style="text-align:right">全部订单</td>
				<td class="strong num cgreen font14">0</td>
				<td class="strong num cred font14">0.0</td>
			</tr>
			</table>
		</div>
	</div>

</div>

		<div class="clear"></div>
	</div>

	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<div class="foot">Copyright <span class="num">&copy;</span> 2014-2017 <a target="_blank" href="#"></a> 版权所有</div>
</div>

</body>
</html>