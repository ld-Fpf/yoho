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
URL = 'http://localhost/yoho/index.php/Admin/Goods/index';
APP = 'http://localhost/yoho/Application';
COMMON = 'http://localhost/yoho/Application/Common';
HDPHP = 'http://localhost/yoho/hdphp';
HDPHP_DATA = 'http://localhost/yoho/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/yoho/hdphp/Extend';
MODULE = 'http://localhost/yoho/index.php/Admin';
CONTROLLER = 'http://localhost/yoho/index.php/Admin/Goods';
ACTION = 'http://localhost/yoho/index.php/Admin/Goods/index';
STATIC = 'http://localhost/yoho/Static';
HDPHP_TPL = 'http://localhost/yoho/hdphp/Lib/Tpl';
VIEW = 'http://localhost/yoho/Application/Admin/View';
PUBLIC = 'http://localhost/yoho/Application/Admin/View/Public';
CONTROLLER_VIEW = 'http://localhost/yoho/Application/Admin/View/Goods';
HISTORY = 'http://localhost/yoho/index.php/Admin/Goods/add?cid=15';
</script>
<script type="text/javascript">
		var postUrl = 'http://localhost/yoho/index.php/Admin/Goods/selectCate';
	</script>
	<script type="text/javascript" src='http://localhost/yoho/Application/Admin/View/Public/js/extend.js'></script>
	<script type="text/javascript" src='http://localhost/yoho/Application/Admin/View/Goods/js/js.js'></script>
<div class="right">
	<div class="now">
		<div class="now_l"></div>
		<div class="now_m">
			<span class="fl">商品列表</span>
			<span class="fr fabu"><a href="<?php echo U('Goods/add');?>" onclick='return selectCate(this);'>发布商品</a></span>
		</div>
		<div class="now_r"></div>
		<div class="clear"></div>
	</div>
	<div class="search">
		<div class="fl qiehuan">
			<a href="admin.php?mod=product&state=1" class="sel">出售中商品</a>
			| <a href="admin.php?mod=product&state=2" >下架的商品</a>
		</div>
		<div class="fr searbox">
			<form method="get">
				<input type="hidden" name="mod" value="product" />
				<input type="hidden" name="state" value="1" />
				商品名称：<input type="text" name="name" value="" class="inputtext" />
				<select name="category_id" class="inputselect">
				<option value="" href="?mod=product&state=1&page=1">全部分类</option>
								<option value="2" href="?mod=product&state=1&page=1&category_id=2" >时尚女装</option>
								<option value="9" href="?mod=product&state=1&page=1&category_id=9" >　 ┝ 上装</option>
								<option value="13" href="?mod=product&state=1&page=1&category_id=13" >　 　　┝ T恤</option>
								<option value="14" href="?mod=product&state=1&page=1&category_id=14" >　 　　┝ 衬衫</option>
								<option value="10" href="?mod=product&state=1&page=1&category_id=10" >　 ┝ 裙装</option>
								<option value="11" href="?mod=product&state=1&page=1&category_id=11" >　 ┝ 下装</option>
								<option value="12" href="?mod=product&state=1&page=1&category_id=12" >　 ┝ 外套</option>
								<option value="3" href="?mod=product&state=1&page=1&category_id=3" >时尚女鞋</option>
								<option value="5" href="?mod=product&state=1&page=1&category_id=5" >　 ┝ 魅力女靴</option>
								<option value="6" href="?mod=product&state=1&page=1&category_id=6" >　 ┝ 时尚单鞋</option>
								<option value="7" href="?mod=product&state=1&page=1&category_id=7" >　 ┝ 休闲帆布</option>
								<option value="8" href="?mod=product&state=1&page=1&category_id=8" >　 ┝ 坡跟鞋</option>
								<option value="4" href="?mod=product&state=1&page=1&category_id=4" >潮流女包</option>
								</select>
				<select name="filter" class="inputselect">
				<option value="" href="?mod=product&state=1&page=1">全部商品</option>
								<option value="istuijian|1" href="?mod=product&state=1&page=1&filter=istuijian|1" >推荐商品</option>
								<option value="wlmoney|0" href="?mod=product&state=1&page=1&filter=wlmoney|0" >包邮商品</option>
								<option value="num|0" href="?mod=product&state=1&page=1&filter=num|0" >售空商品</option>
								</select>
				<select name="orderby" class="inputselect">
				<option value="" href="?mod=product&state=1&page=1">默认排序</option>
								<option value="clicknum|desc" href="?mod=product&state=1&page=1&orderby=clicknum|desc" >浏览量(多到少)</option>
								<option value="clicknum|asc" href="?mod=product&state=1&page=1&orderby=clicknum|asc" >浏览量(少到多)</option>
								<option value="sellnum|desc" href="?mod=product&state=1&page=1&orderby=sellnum|desc" >销售量(多到少)</option>
								<option value="sellnum|asc" href="?mod=product&state=1&page=1&orderby=sellnum|asc" >销售量(少到多)</option>
								<option value="num|desc" href="?mod=product&state=1&page=1&orderby=num|desc" >库存量(多到少)</option>
								<option value="num|asc" href="?mod=product&state=1&page=1&orderby=num|asc" >库存量(少到多)</option>
								<option value="collectnum|desc" href="?mod=product&state=1&page=1&orderby=collectnum|desc" >收藏数(多到少)</option>
								<option value="collectnum|asc" href="?mod=product&state=1&page=1&orderby=collectnum|asc" >收藏数(少到多)</option>
								<option value="asknum|desc" href="?mod=product&state=1&page=1&orderby=asknum|desc" >咨询数(多到少)</option>
								<option value="asknum|asc" href="?mod=product&state=1&page=1&orderby=asknum|asc" >咨询数(少到多)</option>
								<option value="commentnum|desc" href="?mod=product&state=1&page=1&orderby=commentnum|desc" >评价数(多到少)</option>
								<option value="commentnum|asc" href="?mod=product&state=1&page=1&orderby=commentnum|asc" >评价数(少到多)</option>
								</select>
				<input type="submit" value="搜索" class="input2" />
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<form method="post" id="form">
	<table border="0" cellspacing="0" cellpadding="0" class="list">
	<tr>
		<td class="bgtt" width="10"><input type="checkbox" name="checkall" onclick="pe_checkall(this, 'product_id')" /></td>
		<td class="bgtt" width="50">ID号</td>
		<td class="bgtt" width="">商品名称</td>
		<td class="bgtt" width="80">商品分类</td>
		<td class="bgtt" width="80">单价(元)</td>
		<td class="bgtt" width="80">售出/库存</td>
		<td class="bgtt" width="50">浏览</td>
		<td class="bgtt" width="88">操作</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="25" /></td>
		<td>25</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720210131u.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/25" target="_blank">古奇天伦2014新款夏季女凉鞋防水台高跟鞋粗跟罗马厚底鞋舒适女鞋 增高凉</a><span class="cred">[荐]</span>		</td>
		<td class="font13">时尚女鞋</td>
		<td><span class="num font16 cred strong">400.0</span></td>
		<td><span class="font14 corg num strong">0</span>/34</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=25&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=25" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="24" /></td>
		<td>24</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720205919e.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/24" target="_blank">M.S 高跟凉鞋女2014欧美夏季新款防水台女鞋浅口鱼嘴鞋粗跟水钻鱼嘴鞋</a>		</td>
		<td class="font13">坡跟鞋</td>
		<td><span class="num font16 cred strong">300.0</span></td>
		<td><span class="font14 corg num strong">0</span>/100</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=24&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=24" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="23" /></td>
		<td>23</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720205747e.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/23" target="_blank">枫故2014新款N字鞋女运动鞋韩版N仔鞋情侣休闲鞋透气鞋百搭跑步鞋女鞋球</a>		</td>
		<td class="font13">休闲帆布</td>
		<td><span class="num font16 cred strong">456.0</span></td>
		<td><span class="font14 corg num strong">0</span>/120</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=23&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=23" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="22" /></td>
		<td>22</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720205555n.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/22" target="_blank">莱卡金顿2014夏季新款女鞋中跟坡跟凉鞋 女低帮露趾软面皮女单鞋时尚防水</a>		</td>
		<td class="font13">魅力女靴</td>
		<td><span class="num font16 cred strong">130.0</span></td>
		<td><span class="font14 corg num strong">0</span>/55</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=22&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=22" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="21" /></td>
		<td>21</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720205331v.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/21" target="_blank">每朵凉鞋女高跟漆皮水钻凉拖鞋鱼嘴粗跟货到付款女鞋Y688 红色 36</a>		</td>
		<td class="font13">魅力女靴</td>
		<td><span class="num font16 cred strong">120.0</span></td>
		<td><span class="font14 corg num strong">0</span>/44</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=21&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=21" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="20" /></td>
		<td>20</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720205145n.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/20" target="_blank">莫蕾蔻蕾2014春夏厚底增高大嘴猴女单鞋平跟松糕鞋休闲鞋3088 308</a>		</td>
		<td class="font13">时尚女鞋</td>
		<td><span class="num font16 cred strong">345.0</span></td>
		<td><span class="font14 corg num strong">0</span>/33</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=20&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=20" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="19" /></td>
		<td>19</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720204837z.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/19" target="_blank">莎维妮 夏季牛漆皮低跟女鞋编织带粗跟女凉鞋SVX012 白色 36</a>		</td>
		<td class="font13">时尚单鞋</td>
		<td><span class="num font16 cred strong">125.0</span></td>
		<td><span class="font14 corg num strong">0</span>/12</td>
		<td>1</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=19&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=19" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="18" /></td>
		<td>18</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720204621u.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/18" target="_blank">歌莉娅 2014最新夏季女式真皮低跟凉鞋 OL时尚中跟牛皮女鞋粗跟休闲女</a>		</td>
		<td class="font13">时尚女鞋</td>
		<td><span class="num font16 cred strong">120.0</span></td>
		<td><span class="font14 corg num strong">0</span>/100</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=18&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=18" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="17" /></td>
		<td>17</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720204303j.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/17" target="_blank">含蕴 2014夏装新款 休闲套装女韩版时尚短袖T恤 七分裤运动服套装女Y</a>		</td>
		<td class="font13">T恤</td>
		<td><span class="num font16 cred strong">100.0</span></td>
		<td><span class="font14 corg num strong">0</span>/66</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=17&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=17" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="16" /></td>
		<td>16</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720204109f.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/16" target="_blank">GREMLIN妖小精2014夏装新款女装宽松大码亮片蕾丝袖女T恤短袖上衣</a>		</td>
		<td class="font13">时尚女装</td>
		<td><span class="num font16 cred strong">34.0</span></td>
		<td><span class="font14 corg num strong">0</span>/45</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=16&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=16" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="15" /></td>
		<td>15</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720203935m.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/15" target="_blank">霓裳曲 2014夏装新款韩版大码条纹短袖打底衫上衣服T恤女 DX18 黑</a><span class="cred">[荐]</span>		</td>
		<td class="font13">T恤</td>
		<td><span class="num font16 cred strong">125.0</span></td>
		<td><span class="font14 corg num strong">0</span>/66</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=15&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=15" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="14" /></td>
		<td>14</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720203740b.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/14" target="_blank">优衣品2014夏装新款短袖衣服文艺棉麻大码女装修身女士t恤#G505 浅</a>		</td>
		<td class="font13">T恤</td>
		<td><span class="num font16 cred strong">34.0</span></td>
		<td><span class="font14 corg num strong">0</span>/55</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=14&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=14" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="13" /></td>
		<td>13</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720203302u.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/13" target="_blank">花开二度2014新款夏装韩版波西米亚风女装中长款无袖宽松沙滩裙连衣裙雪纺</a><span class="cred">[荐]</span>		</td>
		<td class="font13">裙装</td>
		<td><span class="num font16 cred strong">456.0</span></td>
		<td><span class="font14 corg num strong">0</span>/55</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=13&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=13" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="12" /></td>
		<td>12</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720202937l.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/12" target="_blank">奈戴尔2014夏装新款韩版时尚潮款连体裤女装收腰显瘦欧美配腰带 HOP1</a>		</td>
		<td class="font13">时尚女装</td>
		<td><span class="num font16 cred strong">199.0</span></td>
		<td><span class="font14 corg num strong">0</span>/44</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=12&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=12" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="11" /></td>
		<td>11</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720202706m.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/11" target="_blank">Jack Viney 2014夏装新款韩版女裙子气质修身无袖背心连衣裙6</a>		</td>
		<td class="font13">裙装</td>
		<td><span class="num font16 cred strong">55.0</span></td>
		<td><span class="font14 corg num strong">0</span>/45</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=11&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=11" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="10" /></td>
		<td>10</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720202433j.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/10" target="_blank">欧柏籁2014夏装新款韩版女装长裙修身雪纺连衣裙 粉红 色N1 M</a>		</td>
		<td class="font13">时尚女装</td>
		<td><span class="num font16 cred strong">67.0</span></td>
		<td><span class="font14 corg num strong">0</span>/120</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=10&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=10" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="9" /></td>
		<td>9</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720201727m.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/9" target="_blank">Banaroo 女包 单肩包11521 彩条</a>		</td>
		<td class="font13">潮流女包</td>
		<td><span class="num font16 cred strong">77.0</span></td>
		<td><span class="font14 corg num strong">0</span>/99</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=9&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=9" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="8" /></td>
		<td>8</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720201424i.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/8" target="_blank">纽芝兰 女包 牛皮单肩包斜挎包 真皮女包 链条小包 504 米白色</a><span class="cred">[荐]</span>		</td>
		<td class="font13">潮流女包</td>
		<td><span class="num font16 cred strong">245.0</span></td>
		<td><span class="font14 corg num strong">0</span>/45</td>
		<td>1</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=8&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=8" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="7" /></td>
		<td>7</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720201241x.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/7" target="_blank">简佰格JONBAG女包2014新款潮女士包包单肩包斜挎包休闲手提女包J1</a><span class="cred">[荐]</span>		</td>
		<td class="font13">潮流女包</td>
		<td><span class="num font16 cred strong">412.0</span></td>
		<td><span class="font14 corg num strong">0</span>/87</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=7&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=7" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td><input type="checkbox" name="product_id[]" value="6" /></td>
		<td>6</td>
		<td class="aleft">
			<span class="fl mar5" style="border:1px solid #ddd"><img src="http://localhost/l/data/cache/thumb/2014-07/thumb_60x60_20140720201024j.jpg" width="45" height="45"></span>
			<a class="cblue" href="http://localhost/l/product/6" target="_blank">女士包包 单肩斜挎单肩包 女包 夏 斜挎包手提包 322 水蓝</a>		</td>
		<td class="font13">潮流女包</td>
		<td><span class="num font16 cred strong">123.0</span></td>
		<td><span class="font14 corg num strong">0</span>/77</td>
		<td>0</td>
		<td>
			<a href="admin.php?mod=product&act=edit&id=6&fromto=http%3A%2F%2Flocalhost%2Fl%2Fadmin.php%3Fmod%3Dproduct%26state%3D1%26page%3D1" class="admin_edit mar3">修改</a>
			<a href="admin.php?mod=product&act=del&id=6" class="admin_del" onclick="return pe_cfone(this, '删除')">删除</a>
		</td>
	</tr>
		<tr>
		<td class="bgtt"><input type="checkbox" name="checkall" onclick="pe_checkall(this, 'product_id')" /></td>
		<td class="bgtt" colspan="8">
			<span class="fl">
				<button href="admin.php?mod=product&act=del" onclick="return pe_cfall(this, 'product_id', 'form', '批量删除')">批量删除</button>
				<button href="admin.php?mod=product&act=state&state=1" onclick="return pe_cfall(this, 'product_id', 'form', '批量上架')">批量上架</button>
				<button href="admin.php?mod=product&act=state&state=2" onclick="return pe_cfall(this, 'product_id', 'form', '批量下架')">批量下架</button>
				<button href="admin.php?mod=product&act=tuijian&tuijian=1" onclick="return pe_cfall(this, 'product_id', 'form', '批量推荐')">批量推荐</button>
				<button href="admin.php?mod=product&act=tuijian&tuijian=0" onclick="return pe_cfall(this, 'product_id', 'form', '取消推荐')">取消推荐</button>
			</span>
			<span class="fenye"><ul class='fr'><li><a href='?mod=product&state=1&page=1'>首页</a></li><li><a href='?mod=product&state=1&page=1' class='sel'>1</a></li><li><a href='?mod=product&state=1&page=2'>2</a></li><li><a href='?mod=product&state=1&page=2'>末页</a></li></ul><style type="text/css"> 
.fenye li{float:left; font-family:Arial, Helvetica, sans-serif; margin-left:6px; display:inline; line-height:24px;}
.fenye a{border:1px #C2D5E3 solid; padding:0 8px; color:#0066CC; background:#fff; float:left;  height:24px;}
.fenye a:hover{background:#fff5f5; border:1px #76a5c8 solid;}
.fenye .sel{background:#E5EDF2; color:#333; font-weight:bold; border:1px #C2D5E3 solid;  padding:0 8px;}
</style></span>
		</td>
	</tr>
	</table>
	</form>
</div>
<script type="text/javascript"> 
$(function(){
	$("select").change(function(){
		window.location.href = 'admin.php' + $(this).find("option:selected").attr("href");
	})
})
</script>
		<div class="clear"></div>
	</div>
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<div class="foot">Copyright <span class="num">&copy;</span> 2014-2017 <a target="_blank" href="#"></a> 版权所有</div>
</div>

</body>
</html>