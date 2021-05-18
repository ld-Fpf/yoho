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
					<li ><a href="http://localhost/yoho/Application/Admin/View/Public/set/ad.html">广告列表</a></li>
				</ul>
			</div>

		</div>