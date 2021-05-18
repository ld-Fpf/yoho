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

<script type="text/javascript">
    	var CONTROLLER = "http://localhost/yoho/index.php/Admin/Category";
    </script>
    <script type="text/javascript" src="http://localhost/yoho/Application/Admin/View/Category/js/js.js"></script>
    <style type="text/css">
        .plus_minus{
            width: 20px;
        }
        a:hover{
        	text-decoration: none;
        }
    </style>
<div class="right">
	<div class="now">
		<div class="now_l"></div>
		<div class="now_m">
			<span class="fl">商品分类</span>
			<span class="fr fabu"><a href="<?php echo U('Category/add');?>">增加分类</a></span>
		</div>
		<div class="now_r"></div>
		<div class="clear"></div>
	</div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list mat5">
	<tr pid=0>
		<td class="bgtt" width="5"></td>
		<td class="bgtt" width="100">ID号</td>
		<td class="bgtt aleft">分类名称</td>
		<td class="bgtt" width="70">排序</td>
		<td class="bgtt" width="150">操作</td>
	</tr>
	<?php foreach ($data as $k=>$v){?>
	<tr pid="<?php echo $v['pid'];?>" cid="<?php echo $v['category_id'];?>">
		<td>
			<a href="javascript:;" class="glyphicon glyphicon-plus a-plus" cid="<?php echo $v['category_id'];?>">+</a>
		</td>
		<td><?php echo $v['category_id'];?></td>
		<td class="aleft"><?php echo $v['_name'];?></td>
		<td><?php echo $v['sort'];?></td>
		<td>
			<a href="<?php echo U('Category/add_son', array('cid'=>$v['category_id']));?>" class="admin_add mar3">添加分类</a>
			<a href="<?php echo U('Category/edit', array('cid'=>$v['category_id']));?>" class="admin_edit mar3">修改</a>
			<a href="javascript:;" class="admin_del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Category/del', array('cid'=>$v['category_id']));?>'">删除</a>
		</td>
	</tr>
	<?php }?>
		<tr>
		<td class="bgtt aleft" colspan="5"></td>
	</tr>
	</table>
</div>

		<div class="clear"></div>
	</div>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<div class="foot">Copyright <span class="num">&copy;</span> 2014-2017 <a target="_blank" href="#"></a> 版权所有</div>
</div>

</body>
</html>