<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>商品列表</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Application/Index/View/Public/css/yoho.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Application/Index/View/Public/css/list.css">
	<script type="text/javascript" src="http://localhost/yoho/Static/jquery/jquery-1.7.2.min.js"></script>
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<script type="text/javascript">
	$(function(){
		// 鼠标移入到menu中，让ul显示，移出之后让ul隐藏
		$('.chil').hover(function() {
			$(this).children('.nav-panel').eq(0).show();
		}, function() {
			$(this).children('.nav-panel').eq(0).hide();
		});

	})
</script>
</head>
<body>
<!-- 头部区域开始 -->
<div class="head2014">
	<!-- 顶部导航开始 -->
	<div class="head-top">
		<div class="screen clear">
			<!-- 左边开始 -->
			<div class="left">
				<ul class="site-list">
					<li class="cur"><a href="">YOHO!有货</a> </li>
					<li><a href="">YOHO.CN</a> </li>
					<li><a href="">YOHO!SHOW</a> </li>
				</ul>
			</div>
			<!-- 左边结束 -->

			<!-- 右边开始 -->
			<div class="right">
				<ul class="top-list">
					<li class="list" id="loginBox">
						<span>Hi~</span>
						<?php if (empty($hd['session']['uid'])){ ?>
						[<a href="<?php echo U('User/login');?>" class="list-a login-out">请登录</a>]&nbsp;[<a href="<?php echo U('User/register');?>" class="list-a login-out">免费注册</a>]
						<?php }else{ ?>
						<?php echo hd_substr($hd['session']['username'],9,'...');?>&nbsp;[<a href="<?php echo U('User/logout');?>" class="list-a login-out">退出</a>]
						<?php } ?>
					</li>
					<li class="list " id="myYohoBox">
						<a href="" class="list-a">MY有货&nbsp;
							<span class="iconfont">&#xe603;</span>
						</a>
					</li>
					<li class="list relative" id="miniCartBox">
						<a href="" class="list-a"><b><span class="iconfont">&#xe602;</span>&nbsp;购物车&nbsp;<span class="red icart-num">0</span>&nbsp;<span class="iconfont">&#xe603;</span></b></a>
					</li>
					<li class="list"><a href="" class="list-a">我的订单</a></li>
					<li class="list"><a href="" class="list-a">我的收藏</a></li>
					<li class="list " id="messageBox">
						<a href="" class="list-a"><span class="iconfont" style="font-size:15px;">&#xe605;</span>&nbsp;消息&nbsp;<b><span class="red imessage-num">0</span></b>&nbsp;<span class="ifont10" id="upDown" style="display:none;">.</span></a>
					</li>
					<li class="list line-v"><span>|</span></li>
					<li class="list"><a href="javascript:void(0);" class="list-a" id="favoriteYoho">收藏有货</a></li>
				</ul>
			</div>
			<!-- 右边结束 -->

		</div>
	</div>
	<!-- 顶部导航结束 -->

	<!-- 头部中间区域开始 -->
	<div class="head-mid">
		<div class="screen clear">
			<!-- 左侧区域开始 -->
			<div class="left boys-girls">
				<a href="" class="cur">BOYS<b>男装</b></a><span>|</span><a href="" class="girls ">GIRLS<b>女装</b></a>
			</div>
			<!-- 左侧区域结束 -->
			<!-- 右侧app开始 -->
			<div class="right">
                        <div class="head-two-dim">
                            <a target="_blank" href="">
                            	<img class="dim-img" src="http://localhost/yoho/Application/Index/View/Public/images/app.gif">
                            </a>
                        </div>
			</div>
			<!-- 右侧app结束 -->

			<!-- 右侧搜索开始 -->
			<div class="right">
				<div class="nav-input relative">
					<form action="" method="post" id="searchForm">
						<input name="keyword" id="query_key" value="" type="text">
						<a class="iconfont input-button" href="javascript:void(0);">&#xe609;</a>
					</form>
				</div>
			</div>
			<!-- 右侧搜索结束 -->
			<div class="center">
				<a href=""><img style="" alt="YOHO!有货" src="http://localhost/yoho/Application/Index/View/Public/images/logo-boys.png"></a>
			</div>
		</div>
	</div>
	<!-- 头部中间区域结束 -->

	<!-- 头部导航开始 -->
	<div class="head-nav">
		<div class="screen">
			<ul class="clear nav-bar">
				<li class="left first">
					<a href="" class="a-list"><span>新品到着</span></a>
				</li>
				<li class="left">
					<a href="" class="a-list"><span>品牌一览</span></a>
				</li>
				<li class="left chil">
					<a href="" class="a-list"><span>服饰</span></a>
					<div class="nav-panel" style="display: none;">
						<div class="screen clear">
							<ol>
							</ol>
							<ol>
								<li class=""><a href="">上装</a></li>
								        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($upperClo)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($upperClo as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=5)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($upperClo)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									    <?php if($hd['list']['d']['index']==2){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else if($hd['list']['d']['index']==4){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else{ ?>
										<li><a href=""><?php echo $d['name'];?></a></li>
									<?php } ?>
								<?php }}?>
							</ol>
							<ol>
								<li class=""><a href="">下装</a></li>
								        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($lowerClo)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($lowerClo as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=4)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($lowerClo)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									    <?php if($hd['list']['d']['index']==2){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else{ ?>
										<li><a href=""><?php echo $d['name'];?></a></li>
									<?php } ?>
								<?php }}?>
							</ol>
							<ol>
								<li class=""><a href="">经典款型</a></li>
								<li class="red"><a href="">渔夫大衣</a></li>
								<li class=""><a href="">直筒裤</a></li>
								<li class=""><a href="">军事夹克</a></li>
								<li class=""><a href="">工装裤</a></li>
								<li class=""><a href="">街头风棉服</a></li>
							</ol>
							<ol>
								<li class=""><a href="">热门品牌</a></li>
								        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($hbrand)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($hbrand as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=5)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($hbrand)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									    <?php if($hd['list']['d']['index']==2){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else if($hd['list']['d']['index']==4){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else{ ?>
										<li><a href=""><?php echo $d['name'];?></a></li>
									<?php } ?>
								<?php }}?>
							</ol>
							<div class="cate-ads">
							<a href=""><img alt="" src="http://localhost/yoho/Application/Index/View/Public/images/clothing.jpg"></a>
							</div>
						</div>
					</div>
				</li>
				<li class="left chil">
					<a href="" class="a-list"><span>鞋履</span></a>
					<div class="nav-panel" style="display: none;">
						<div class="screen clear">
							<ol>
							</ol>

							<ol>
								<li class=""><a href="">鞋履</a></li>
								        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($shoes)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($shoes as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=5)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($shoes)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									    <?php if($hd['list']['d']['index']==2){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else if($hd['list']['d']['index']==4){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else{ ?>
										<li><a href=""><?php echo $d['name'];?></a></li>
									<?php } ?>
								<?php }}?>
							</ol>

							<ol>
								<li class=""><a href="">经典款型</a></li>
								<li class="red"><a href="">帆布鞋</a></li>
								<li class=""><a href="">复古跑鞋</a></li>
								<li class=""><a href="">板鞋</a></li>
								<li class=""><a href="">雕花鞋</a></li>
							</ol>
							<ol>
								<li class=""><a href="">热门品牌</a></li>
								        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($sbrand)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($sbrand as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=5)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($sbrand)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									    <?php if($hd['list']['d']['index']==2){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else if($hd['list']['d']['index']==4){ ?>
										<li class="red"><a href=""><?php echo $d['name'];?></a></li>
									<?php }else{ ?>
										<li><a href=""><?php echo $d['name'];?></a></li>
									<?php } ?>
								<?php }}?>
							</ol>
							<div class="cate-ads">
							<a href=""><img alt="" src="http://localhost/yoho/Application/Index/View/Public/images/shose.jpg"></a>
							</div>
						</div>
					</div>
				</li>
				<li class="left chil">
					<a href="" class="a-list"><span>包</span></a>
				</li>
				<li class="left chil">
					<a href="" class="a-list"><span>配饰 · 其他</span></a>
				</li>
				<li class="left">
					<a href="" class="a-list"><span>LOOKBOOK</span></a>
				</li>
				<li class="left">
					<a href="" class="a-list"><span>潮流资讯</span></a>
				</li>
				<li class="left last">
					<a href="" class="a-list"><span>SALE</span></a></li>
			</ul>
		</div>
	</div>
	<!-- 头部导航结束 -->
</div>
<!-- 头部区域结束 -->
	<script type="text/javascript">
	$(function(){
		$('.goods-category li').toggle(
			function(){
				$(this).children('ul').css('display','block');
				$(this).children('a').children(' .iconfont').html("&#xe612;");
			},
			function(){
				$(this).children('ul').css('display','none');
				$(this).children('a').children(' .iconfont').html("&#xe60d;");
			}
		)
	})
	</script>
<!-- 主体区域开始 -->

<div class="wrapper screen wrapper-goods">
	<!-- 面包屑导航开始 -->
	<div class="mini-site-nav">
	        <a href="http://localhost/yoho" title="YOHO!有货">BOYS首页</a>&nbsp;&nbsp;>&nbsp;&nbsp;<?php echo $cname;?>
	</div>
	<!-- 面包屑导航结束 -->

	<!-- 商品列表开始 -->
	<div class="clear goods-main">
		<!-- 左侧分类开始 -->
		<div class="left goods-left">
			<ul class="goods-category clear">
			    <li>
			    	<a href="">全部品类<span class="num">25089</span></a>
			    </li>
			    <?php foreach ($lcate as $k=>$v){?>
				<li>
					<a href="javascript:void(0);">
						<span class="iconfont">&#xe60d;</span><?php echo $v['name'];?><span class="num">11468</span>
					</a>
					<ul class="hidden">
						<li class=""><a href="">全部裤装<span class="num">2148</span></a></li>
						<li class=""><a href="">休闲裤<span class="num">1288</span></a></li>
						<li class=""><a href="">牛仔裤<span class="num">568</span></a></li>
						<li class=""><a href="">短裤<span class="num">271</span></a></li>
						<li class=""><a href="">打底裤<span class="num">18</span></a></li>
						<li class=""><a href="">连体裤<span class="num">3</span></a></li>
					</ul>
				</li>
			    <?php }?>
			</ul>

			<div class="goods-serial">
			      <div id="list-left-ads"></div>
			</div>
		</div>
		<!-- 左侧分类结束 -->

		<!-- 右侧开始 -->
		<div class="right goods-right">
		      <div id="searchbanner"></div>
		      <a name="selected"></a>

		      <!-- 搜索条件开始 -->
		      <div class="search-condition expand-selected">

				<!-- 价格筛选开始 -->
				        <?php
        //初始化
        $hd['list']['ac'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($attrClass)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($attrClass as $ac) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][ac]['index']++;
                //第1个值
                $hd['list'][ac]['first']=($listId == 0);
                //最后一个值
                $hd['list'][ac]['last']= (count($attrClass)-1 <= $listId);
                //总数
                $hd['list'][ac]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		      	<dl class="clear">
		      	        <dt><span><?php echo $ac['title'];?>：</span></dt>
		      	        <dd class="outer-100">
		      	            <div class="inner-left">
						<!-- <a href="" class="">￥0-300</a> -->
						<?php echo searchAttrUrl(0,$hd['list']['ac']['index'],全部);?>
						        <?php
        //初始化
        $hd['list']['av'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($ac['attrValue'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($ac['attrValue'] as $av) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][av]['index']++;
                //第1个值
                $hd['list'][av]['first']=($listId == 0);
                //最后一个值
                $hd['list'][av]['last']= (count($ac['attrValue'])-1 <= $listId);
                //总数
                $hd['list'][av]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
							<?php echo searchAttrUrl($av['avid'],$hd['list']['ac']['index'],$av['attr_value']);?>
						<?php }}?>
		      	            </div>
		      	        </dd>
		      	    </dl>
		      	    <?php }}?>
		      	    <!-- 价格筛选结束 -->

					<!-- 更多选项开始 -->
		      	    <div class="control-bar">
		      	        <a class="button-less" style="display:none;" href="javascript:void(0);">收起<span class="iconfont">&#xe60b;</span></a>
		      	        <a class="button-more" href="javascript:void(0);">更多选项(颜色...)<span class="iconfont">&#xe603;</span></a>
		      	    </div>
		      	    <!-- 更多选项结束 -->



		      	    <!-- 商品排序选项开始 -->
		      	    <div class="clear sort-condition">
    	                        <div class="left sort-left">
    	                            <a href="/?order=s_t_desc" class="">最新<span class="iconfont">&#xe612;</span></a>
    	                            <!-- a href="">人气<span class="iconfont">]</span></a-->
    	                            <a href="/?order=s_p_asc" class="">价格<span class="iconfont">&#xe614;</span></a>
    	                            <a href="/?order=p_d_asc" class="">折扣<span class="iconfont">&#xe614;</span></a>
    	                            <a href="/?specialoffer=1" class=""><span class="select-input"><span class="iconfont">&#xe613;</span></span><span>特价</span></a>
    	                            <a href="/?limit=1" class=""><span class="select-input"><span class="iconfont">&#xe613;</span></span><span>限量</span></a>
    	                            <a href="/?new=1" class=""><span class="select-input"><span class="iconfont">&#xe613;</span></span><span>新品</span></a>
    	                        </div>
		      	    </div>
		      	    <!-- 商品排序选项结束 -->


				<!-- 商品循环开始 -->
	      	    	<div class="goods-list">
	      	    		        <?php
        //初始化
        $hd['list']['g'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($goods)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($goods as $g) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][g]['index']++;
                //第1个值
                $hd['list'][g]['first']=($listId == 0);
                //最后一个值
                $hd['list'][g]['last']= (count($goods)-1 <= $listId);
                //总数
                $hd['list'][g]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
	      	    		<div class="goods-info">
			      		<div class="lazy">
			      			<a href="<?php echo U('Detail/index', array('cid' => $g['category_id'], 'gid' => $g['good_id']));?>">
			      				<img src="http://localhost/yoho/<?php echo $g['listpic'];?>" width="235" height="314" />
			      			</a>
			      		</div>
			      		<div class="product-info">
			      			<div class="name">
			      				<a href="<?php echo U('Detail/index', array('cid' => $g['category_id'], 'gid' => $g['good_id']));?>"><?php echo $g['name'];?></a>
			      			</div>
			      			<div class="brand"><a href="<?php echo U('Detail/index', array('cid' => $g['category_id'], 'gid' => $g['good_id']));?>"><?php echo $g['bname'];?></a></div>
			      			<div class="price"><span class="rgb9 delete">￥<?php echo $g['marketprice'];?></span><span><b>￥<?php echo $g['shopprice'];?></b></span></div>
			      		</div>
			      	</div>
			      	<?php }}?>
			      </div>
					<!-- 商品循环结束 -->
				<div class="clear"></div>
				
				<!-- 分页开始 -->
				<div class="goods-bottom clear">
				      <div class="left">
				      	<span class="rgb9">1 - 59 / 共25066件商品</span>
				      </div>
				      <div class="goods-page right">
				      	<?php echo $page;?>
				      </div>
				</div>
				<!-- 分页结束 -->

			      </div>
		      </div>
		      <!-- 搜索条件结束 -->

			<!-- 商品列表展示开始 -->
		      
			<!-- 商品列表展示结束 -->
		</div>
		<!-- 右侧结束 -->


	</div>
	<!-- 商品列表结束 -->

</div>

<!-- 主体区域结束 -->

<!-- 黑色底部开始 -->
<div class="footer2013 clear">
	<div class="promise">
		<div class="screen clear">
			<div class="left"><span class="iconfont rgbf">&#xe608;</span><span class="red">100%</span><span class="rgbf">品牌授权正品</span></div>
			<div class="left"><span class="iconfont rgbf">&#xe607;</span><span class="red">7天</span><span class="rgbf">无理由退换货</span></div>
			<div class="left"><span class="iconfont rgbf">&#xe604;</span><span class="rgbf">客服电话：</span><span class="red">400-889-9646</span>&nbsp;&nbsp;<span class="rgb9">09:00-22:30(周一至周日)</span></div>
			<div class="right subscribe footer-right"><input style="" class="rgb6 top" name="subscriberBox" id="subscriberBox" value="订阅我们的邮件"><a href="javascript:void(0);" id="subscriberBtn" class="iconfont rgbf">&#xe606;</a></div>
			</div>
		</div>

		<div class="footer-help clear">
			<div class="screen clear">
				<div class="left">
					<ul class="clear">
						<li class="left">
							<p><span>新手指南</span></p>
							<p><a href="">新用户注册</a></p>
							<p><a href="">会员登录</a></p>
							<p><a href="">订购流程</a></p>
							<p><a href="">交易须知</a></p>
						</li>
						<li class="left">
							<p><span>付款方式</span></p>
							<p><a href="">支付方式</a></p>
							<p><a href="">常见支付问题</a></p>
							<p><a href="">如何办理退款</a></p>
							<p><a href="">发票制度说明</a></p>
						</li>
						<li class="left">
							<p><span>配送方式</span></p>
							<p><a href="">配送时间及范围</a></p>
							<p><a href="">订单的拆分</a></p>
							<p><a href="">商品验收与签收</a></p>
						</li>
						<li class="left">
							<p><span>售后服务</span></p>
							<p><a href="">如何办理退换货</a></p>
							<p><a href="">退换货政策</a></p>
						</li>
						<li class="left">
							<p><span>帮助中心</span></p>
							<p><a href="">找回密码</a></p>
							<p><a href="">常见问题</a></p>
							<p><a href="">谨防诈骗</a></p>
						</li>
						<li class="left">
							<p><span>优惠政策</span></p>
							<p><a href="">VIP会员制度说明</a></p>
							<p><a href="">YOHO币</a></p>
							<p><a href="">优惠券</a></p>
							<p><a href="">兑换礼品卡</a></p>
						</li>
					</ul>
				</div>
			  </div>
		</div>


		<div class="footer-link clear">
			<div class="screen clear">
				<div class="left right-flag">
					<a href=""><img src="http://static.yohobuy.com/images/v3/icon/credit-flag3.png"></a>
					<a href=""><img src="http://static.yohobuy.com/images/v3/icon/isc2.png"></a>
				</div>
				<div class="left about-us">
					<p>
						<a href="">返回首页</a><span>|</span><a href="">YOHO!有货</a><span>|</span><a href="">新力传媒</a><span>|</span><a href="">联系我们</a><span>|</span><a href="">隐私条款</a><span>|</span><a href="">友情链接</a>
					</p>
					<p>CopyRight © 2007-2016 南京新与力文化传播有限公司 苏ICP备09011225号 NewPower Co. 版权所有 经营许可证编号：苏B2-20120395</p>
				</div>
				
			</div>
		</div>
</div>
<!-- 黑色底部结束 -->
</body>
</html>