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
<link type="text/css" rel="stylesheet" href="http://localhost/yoho/Static/hdjs/hdui.css" />
<link type="text/css" rel="stylesheet" href="http://localhost/yoho/Static/hdjs/hdjs.css"/>
<script type='text/javascript' src="http://localhost/yoho/Static/hdjs/hdjs.min.js"></script>
    <hdui/>
    <hdcss/>
    <jquery/>
    <hdjs/>
<link rel="stylesheet" href="http://localhost/yoho/Application/Admin/View/Public/css/inc.css" />
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/yoho';
WEB = 'http://localhost/yoho/index.php';
URL = 'http://localhost/yoho/index.php/Admin/Goods/add?cid=15';
APP = 'http://localhost/yoho/Application';
COMMON = 'http://localhost/yoho/Application/Common';
HDPHP = 'http://localhost/yoho/hdphp';
HDPHP_DATA = 'http://localhost/yoho/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/yoho/hdphp/Extend';
MODULE = 'http://localhost/yoho/index.php/Admin';
CONTROLLER = 'http://localhost/yoho/index.php/Admin/Goods';
ACTION = 'http://localhost/yoho/index.php/Admin/Goods/add';
STATIC = 'http://localhost/yoho/Static';
HDPHP_TPL = 'http://localhost/yoho/hdphp/Lib/Tpl';
VIEW = 'http://localhost/yoho/Application/Admin/View';
PUBLIC = 'http://localhost/yoho/Application/Admin/View/Public';
CONTROLLER_VIEW = 'http://localhost/yoho/Application/Admin/View/Goods';
HISTORY = 'http://localhost/yoho/index.php/Admin/Goods/index';
</script>
<script type="text/javascript">
		var postUrl = 'http://localhost/yoho/index.php/Admin/Goods';
	</script>
	<script type="text/javascript" src='http://localhost/yoho/Application/Admin/View/Public/js/extend.js'></script>
	<script type="text/javascript" src='http://localhost/yoho/Application/Admin/View/Goods/js/js.js'></script>
	<script type="text/javascript" src='http://localhost/yoho/Application/Admin/View/Public/js/cal/lhgcalendar.min.js'></script>
	<script type="text/javascript" charset="utf-8" src="http://localhost/yoho/Static/ueditor1_4_3/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="http://localhost/yoho/Static/ueditor1_4_3/ueditor.all.min.js"> </script>
	<script type="text/javascript" charset="utf-8" src="http://localhost/yoho/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
	<script>
		var ue = UE.getEditor('editor');
	</script>
<div class="right">
	<div class="now">
		<div class="now_l"></div>
		<div class="now_m">
			<span class="fl">发布商品</span>

		</div>
		<div class="now_r"></div>
		<div class="clear"></div>
	</div>
	<form method="post" action="" enctype="multipart/form-data">

	<div class="tabMenu">
			<a href="" class="act">商品基本属性</a>
			<a href="">商品其他属性</a>
			<a href="">商品详细内容</a>
			<a href="">商品图片</a>
		</div>
		<ul class="tabSub">
			<li class="act">
				<table class="form table">
					<tr>
						<th colspan='2'>商品基本属性</th>
						<input type="hidden" name='pid' value='' />
					</tr>
					<tr>
						<td class="tr f14 fm pct15"><span class="pr10">商品名称</span></td>
						<td><input name='name' type="text" class='ml10 pct60' /></td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">所属栏目</span></td>
						<td>
							<!-- <select name="category_id" class='ml10'>
								<option value="0">==请选择分类==</option>
								<?php foreach ($cate as $k=>$v){?>
									<option value="<?php echo $v['category_id'];?>" tid="<?php echo $v['type_id'];?>" pid="<?php echo $v['pid'];?>"><?php echo $v['_name'];?></option>
								<?php }?>
							</select> -->
							<input name="category_id" value="<?php echo $cate['category_id'];?>" type="hidden">
							<span class="ml10"><?php echo $cate['name'];?></span>
							<!-- <input name="category_id" value="" type="hidden"> -->
							<span class="ml10"></span>
						</td>
					</tr>
					<tr>
						<td class="tr f14 fm pct15"><span class="pr10">是否精品</span></td>
						<td><input type="radio" name="is_best" value="0" checked="checked" />&nbsp;否&nbsp;&nbsp;<input type="radio" name="is_best" />&nbsp;是</td>
					</tr>
					<tr>
						<td class="tr f14 fm pct15"><span class="pr10">是否新品</span></td>
						<td><input type="radio" name="is_new" value="0" checked="checked" />&nbsp;否&nbsp;&nbsp;<input type="radio" name="is_new" value="1" />&nbsp;是</td>
					</tr>
					<tr>
						<td class="tr f14 fm pct15"><span class="pr10">是否热销</span></td>
						<td><input type="radio" name="is_hot" value="0" checked="checked" />&nbsp;否&nbsp;&nbsp;<input type="radio" name="is_hot" value="1" />&nbsp;是</td>
					</tr>
					<tr>
						<td class="tr f14 fm pct15"><span class="pr10">首页展示</span></td>
						<td><input type="radio" name="is_show" value="0" checked="checked" />&nbsp;否&nbsp;&nbsp;<input type="radio" name="is_show" value="1" />&nbsp;是</td>
					</tr>
					    <?php if(!$spec){ ?>
						<tr>
							<td class="tr f14 fm pct15"><span class="pr10">库存</span></td>
							<td><input name='stock' type="text" class='ml10 pct20' /></td>
						</tr>
						<tr>
							<td class="tr f14 fm pct15"><span class="pr10">价格</span></td>
							<td><input name='price' type="text" class='ml10 pct20' /></td>
						</tr>
						<tr>
							<td class="tr f14 fm pct15"><span class="pr10">商品货号</span></td>
							<td><input name='goods_sn' type="text" class='ml10 pct30' /></td>
						</tr>
					<?php } ?>
					<tr>
						<td class="tr f14 fm "><span class="pr10">商品属性</span></td>
						<td>
							<table class='table ml10 pct90 bgwhite bdd'>
								<?php foreach ($attr as $k=>$v){?>
									<tr>
										<td class="tr f14 fm pct15"><span class="pr10"><?php echo $v['title'];?></span></td>
										<td><p class='ml10' /><?php echo $v['html'];?></td>
									</tr>
								<?php }?>
							</table>	
						</td>

					</tr>
					    <?php if($spec){ ?>
					<tr>
						<td class="tr f14 fm "><span class="pr10">商品规格</span></td>
						<td>
							<table class='table ml10 pct90 bgwhite bdd' id="spec">
								<tr>
									<?php foreach ($spec as $k=>$v){?>
										<th class="tl f14 fm pct15"><span class="pr10"><?php echo $v['title'];?></span></th>
									<?php }?>
									<th>库存</th>
									<th>价格</th>
									<th>商品货号</th>
									<th class='tc fv b pct10'><a href="" class="addSpec gray"><i class="ico icoadd"><c></i>增</a></th>
								</tr>
								<tr>
									<?php foreach ($spec as $k=>$v){?>
										<td class="tl f14 fm pct15">
											<span class="pr10"><?php echo $v['html'];?></span>
										</td>
									<?php }?>
									<td><input class="pct50" type="text" value="100" name="spec[stock][]" /></td>
									<td><input class="pct50" type="text" value="" name="spec[price][]" /></td>
									<td>
										<input class="pct80" type="text" value="<?php echo time() ;?>" name="spec[goods_sn][]" />
									</td>
									<td class="fv b tc"><a href="" class="delSpec red"><i class="ico icodec"><c></i>删</a></td>
								</tr>
							</table>	
						</td>
					</tr>
					<?php } ?>

				</table>
			</li>
			<li>
				<table class="table form">
					<tr>
						<td class="tr f14 fm "><span class="pr10">上架时间</span></td>
						<td>
							<input name='addtime' type="text" class='ml10 pct20' id='updatetime' value="<?php echo date('Y/m/d h:i:s');?>" readonly="readonly" />
							<script type="text/javascript">
								$('#updatetime').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
							</script>
						</td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">商品属性</span></td>
						<td>
							<label for="flag1" class='ml10 pct60'>
								<input type="checkbox" name='attrvalue[]' id='flag1' value='推荐' /> 推荐
							</label>
							<label for="flag2" class='ml10 pct60'>
								<input type="checkbox" name='attrvalue[]' id='flag2' value='置顶' /> 置顶
							</label>
						</td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">品牌</span></td>
						<td>
							<select name="brand_id" id="brand" class='ml10'>
								<option value="0">==请选择品牌==</option>
									<?php foreach ($brand as $k=>$v){?>
									<option value="<?php echo $v['brand_id'];?>" pic="<?php echo $v['logo'];?>"><?php echo $v['name'];?></option>
									<?php }?>
							</select>
							<span class="p5" id="brandLogo"></span>
						</td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">单位</span></td>
						<td><input name='unit' type="text" value="个" class='ml10 pct20' /></td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">市场价</span></td>
						<td><input name='marketprice' type="text" class='ml10 pct20' /></td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">商城价</span></td>
						<td><input name='shopprice' type="text" class='ml10 pct20' /></td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">总库存</span></td>
						<td><input name='ginventory' type="text" class='ml10 pct20' /></td>
					</tr>
					<tr>
						<td class="tr f14 fm "><span class="pr10">点击</span></td>
						<td><input name='click' type="text" class='ml10 pct20' /></td>
					</tr>
					<tr>
						<td class="tr f14 fm"><span class="pr10">关键字</span></td>
						<td><textarea class='ml10 pct70' name="keywords" id="" cols="30" rows="2"></textarea></td>
					</tr>
					<tr>
						<td class="tr f14 fm"><span class="pr10">栏目描述</span></td>
						<td><textarea class='ml10 pct70' name="description" id="" cols="30" rows="3"></textarea></td>
					</tr>
					<tr>
						<td class="tr f14 fm"><span class="pr10">售后服务</span></td>
						<td><textarea class='ml10 pct70' name="service" id="" cols="30" rows="3"></textarea></td>
					</tr>
				</table>
			</li>
			<li>
				<table class="table form">
					<tr>
						<td class="tr f14 fm pct10">详细内容</td>
						<td><p class="ml10">
							<script id="editor" name="intro" type="text/plain" style="width:100%;height:500px;"></script>
						</p></td>
					</tr>
				</table>
			</li>
			<li>
				<div class="form">
					<fieldset>
						<legend>首页图片</legend>
						<input type="file" name='indexpic' />
					</fieldset>
					<fieldset>
						<legend>列表图片</legend>
						<input type="file" name='listpic' />
					</fieldset>
				</div>
				<div class="bdc mt20 f18 bgwhite-2 p10 rad5">
					<div class="form white bgwhite p10 f14 rad5">
						<fieldset id='pic'>
							<legend>内容页图片</legend>
							<div class="p5">
								<input type="file" name='pic[]' />
								<button type="button" class='btn bggreen2 f14' id='addPic'>增加图片</button>
							</div>
						</fieldset>
						<script type="text/javascript">
							$('#addPic').click(function(){
								var h = "<div class='p5'><input type='file' name='pic[]' />\
											<button type='button' class='btn bgred3 f14' onclick='delPic(this);'>\
											删除图片</button></div>";
								$('#pic').append(h);
							})
							function delPic(id){
								$(id).parent().remove();
							}
						</script>
					</div>
				</div>
			</li>
		</ul>


	<div class="mat10 center">
		<input type="hidden" name="type_id" value="<?php echo $cate['type_id'];?>" />
		<input type="hidden" name="type_id" value="<?php echo $cate['type_id'];?>" />
		<input type="hidden" name="admin_user_id" value="<?php echo $hd['session']['aid'];?>" />
		<button class="tjbtn">提交</button>
	</div>
	</form>
</div>
<style type="text/css"> 
a.js_add{display:block; float:left; width:120px; height:30px; line-height:30px; text-align:center;background:#76A500; color:#f5f5f5; border-radius:2px; font-family:'宋体'; font-size:14px; font-weight:bold}
a:hover.js_add,a:hover.js_del{background-color:#cccc00;}
a.js_del{width:42px; padding:5px 10px; text-align:center;background:#FF9900; color:#f5f5f5; border-radius:2px; font-family:'宋体'; font-size:12px;}
</style>

		<div class="clear"></div>
	</div>
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<div class="foot">Copyright <span class="num">&copy;</span> 2014-2017 <a target="_blank" href="#"></a> 版权所有</div>
</div>

</body>
</html>