<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Yoho</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Application/Index/View/Public/css/yoho.css">
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
	<link href="http://localhost/yoho/Application/Index/View/Public/css/banner.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="http://localhost/yoho/Application/Index/View/Public/js/banner.js"></script>
	<script type="text/javascript">
	$(function(){
		$('li a img').mouseenter(function(){
			// 让当前移入的li里面的图片移动
			$(this).stop().animate({'opacity':'0.7'}, 200,function(){
				$(this).animate({'opacity':'1'}, 200);
			})
		})
	})
	</script>
<!-- 主体区域开始 -->
<div class="wrapper screen wrapper-index2">

	<div class="indexCon fl">
	    <div class="flashBanner">
	        <a href=""><img class="bigImg" width="1150" height="450" /></a>
	        <div class="mask">
	        
	                <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($banner)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($banner as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=8)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($banner)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			<!-- <a href=""><img src="http://localhost/yoho/<?php echo $d['indexpic'];?>" class="lazy"></a> -->
			<img src="http://localhost/yoho/<?php echo $d['pic'];?>" uri="http://localhost/yoho/<?php echo $d['pic'];?>" link="http://localhost/yoho/<?php echo $d['url'];?>"  width="138" height="54"/>
		<?php }}?>
	        
	        </div>
	    </div>
	</div>


	<!-- 优选品牌开始 -->
	<dl class="dl-index">
		<dt class="clear">
			<div class="left title">优选品牌</div>
			<div class="right keys">
				<a href="">CLOTTEE </a><span>|</span>
				<a href="">Life·After Life</a><span>|</span>
				<a href="">F.L.Y.D</a><span>|</span>
				<a href="">人气品牌</a>
			</div>
		</dt>
		<dd class="clear hot-brand-new">
			<div class=" left recommendBox-new" id="recommendBox">
			<ul class="new-hot-brand clear">
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pinp1.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pinp2.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp1.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp2.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp3.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp4.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp5.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp6.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp7.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pinp3.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pinp4.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp8.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp9.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp10.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp11.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp12.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp13.jpg"></a>
				</li>
				<li><a href="" title="">
					<img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp14.jpg"></a>
				</li>
			</ul>
		</div>

		<div class="index-unit-1 right">
				<ul class="new-hot-brand clear">
					<li>
						<div class="btn-page">
						  <div class="relative" id="btnBox">
						  	<a href="javascript:void(0);" class="page-before"></a>
                     	  	<a href="javascript:void(0);" class="page-next"></a>
                     	  </div>
                     	</div>
					</li>
					<li>
						<a href=""><img class="lazy" src="http://localhost/yoho/Application/Index/View/Public/images/pp15.jpg" style=""></a>
					</li>
				</ul>
			</div>
		</dd>
	</dl>
	<!-- 优选品牌结束 -->

	<!-- 人气单品开始 -->
	<div class="clear">
		<dl class="dl-index index-unit-5 left">
			<dt class="clear">
				<div class="left title">人气单品</div>
				<div class="right keys">
					<a href=""> 冬の优选</a><span>|</span>
					<a href="">裤类精品</a><span>|</span>
					<a href="">潮鞋来袭</a>
				</div>
			</dt>
			<dd>
				<ul class="index-ul clear">
					        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($pop)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($pop as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=8)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($pop)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
						<li>
							<a href=""><img src="http://localhost/yoho/<?php echo $d['indexpic'];?>" class="lazy"></a>
						</li>
					<?php }}?>
				</ul>				
			</dd>
		</dl>

		<div class="index-unit-1 index-ads right">
			<div class="ads-1">
				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/ads1.jpg" class="lazy"></a>
			</div>
			<div class="ads-2">
				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/ads2.gif" class="lazy"></a>
			</div>
		</div>
	</div>
	<!-- 人气单品结束 -->

	<!-- 潮流上装开始 -->
	<dl class="dl-index clear">
		<dt class="clear">
			<div class="left title">潮流上装</div>
			<div class="right keys">
				<a href="">冬装新品</a><span>|</span>
				<a href="">新品夹克</a><span>|</span>
				<a href="">暖冬棉服</a><span>|</span>	
				<a href="">MORE&gt;</a>
			</div>
		</dt>
		<dd class="left">
			<div class="relative category-top">
				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1.jpg" class="lazy"></a>
			</div>
			<ul class="category-list left">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($floor1)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($floor1 as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($floor1)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					    <?php if($hd['list']['d']['index']==1){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else if($hd['list']['d']['index']==4){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else{ ?>
						<li><a href=""><?php echo $d['name'];?></a></li>
					<?php } ?>
				<?php }}?>
			</ul>
			<ul class="brands-list">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($f1b)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($f1b as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($f1b)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<li><a href=""><?php echo $d['name'];?></a></li>
				<?php }}?>
				<li><a href="">MORE...</a></li>
			</ul>
		</dd>
		<dd class="index-unit-5 right">
			<ul class="index-ul clear">
				<li class="li-h-2"><a href="<?php echo U('List/index', array('cid' => 15));?>"><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_1.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_2.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_3.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_4.jpg" class="lazy"></a></li>
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_5.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_6.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_7.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor1_8.jpg" class="lazy"></a></li>
			</ul>			
		</dd>
	</dl>
	<!-- 潮流上装结束 -->

	<!-- 经典裤装开始 -->
	<dl class="dl-index clear">
		<dt class="clear">
			<div class="left title">经典裤装</div>
			<div class="right keys">
				<a href="">休闲裤</a><span>|</span>
				<a href="">牛仔裤</a><span>|</span>
				<a href="">工装裤</a><span>|</span>	
				<a href="">MORE&gt;</a>
			</div>
		</dt>
		<dd class="left">
			<div class="relative category-top">
				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2.jpg" class="lazy"></a>
			</div>
			<ul class="category-list left">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($floor2)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($floor2 as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($floor2)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					    <?php if($hd['list']['d']['index']==1){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else if($hd['list']['d']['index']==3){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else{ ?>
						<li><a href=""><?php echo $d['name'];?></a></li>
					<?php } ?>
				<?php }}?>
			</ul>
			<ul class="brands-list">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($f2b)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($f2b as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($f2b)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<li><a href=""><?php echo $d['name'];?></a></li>
				<?php }}?>
				<li><a href="">MORE...</a></li>
			</ul>
		</dd>
		<dd class="index-unit-5 right">
			<ul class="index-ul clear">
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_1.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_2.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_3.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_4.jpg" class="lazy"></a></li>
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_5.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_6.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_7.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor2_8.jpg" class="lazy"></a></li>
			</ul>				
		</dd>
	</dl>
	<!-- 经典裤装结束 -->

	<!-- 时尚鞋履开始 -->
	<dl class="dl-index clear">
		<dt class="clear">
			<div class="left title">时尚鞋履</div>
			<div class="right keys">
				<a href="">靴子</a><span>|</span>
				<a href="">休闲/运动鞋</a><span>|</span>
				<a href="">复古跑鞋</a><span>|</span>	
				<a href="">MORE&gt;</a>
			</div>
		</dt>
		<dd class="left">
			<div class="relative category-top">
				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3.jpg" class="lazy"></a>
			</div>
			<ul class="category-list left">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($floor3)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($floor3 as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($floor3)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					    <?php if($hd['list']['d']['index']==1){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else if($hd['list']['d']['index']==3){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else{ ?>
						<li><a href=""><?php echo $d['name'];?></a></li>
					<?php } ?>
				<?php }}?>
			</ul>
			<ul class="brands-list">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($f3b)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($f3b as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($f3b)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<li><a href=""><?php echo $d['name'];?></a></li>
				<?php }}?>
				<li><a href="">MORE...</a></li>
			</ul>
		</dd>
		<dd class="index-unit-5 right">
			<ul class="index-ul clear">
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_1.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_2.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_3.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_4.jpg" class="lazy"></a></li>
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_5.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_6.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_7.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor3_8.jpg" class="lazy"></a></li>
			</ul>				
		</dd>
	</dl>
	<!-- 时尚鞋履结束 -->

	<!-- 潮人配饰开始 -->
	<dl class="dl-index clear">
		<dt class="clear">
			<div class="left title">潮人配饰</div>
			<div class="right keys">
				<a href="">包品</a><span>|</span>
				<a href="">耳机</a><span>|</span>
				<a href="">帽子</a><span>|</span>	
				<a href="">MORE&gt;</a>
			</div>
		</dt>
		<dd class="left">
			<div class="relative category-top">
				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4.jpg" class="lazy"></a>
			</div>
			<ul class="category-list left">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($floor4)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($floor4 as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($floor4)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					    <?php if($hd['list']['d']['index']==1){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else if($hd['list']['d']['index']==3){ ?>
						<li><a href=""><?php echo $d['name'];?><span class="hot">HOT</span></a></li>
					<?php }else{ ?>
						<li><a href=""><?php echo $d['name'];?></a></li>
					<?php } ?>
				<?php }}?>
			</ul>
			<ul class="brands-list">
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($f4b)) {
            echo ' 没有数据 ';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($f4b as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=6)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($f4b)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<li><a href=""><?php echo $d['name'];?></a></li>
				<?php }}?>
				<li><a href="">MORE...</a></li>
			</ul>
		</dd>
		<dd class="index-unit-5 right">
			<ul class="index-ul clear">
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_1.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_2.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_3.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_4.jpg" class="lazy"></a></li>
				<li class="li-h-2"><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_5.gif" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_6.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_7.jpg" class="lazy"></a></li>
				<li><a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/floor4_8.jpg" class="lazy"></a></li>
			</ul>				
		</dd>
	</dl>
	<!-- 潮人配饰结束 -->

	<!-- 底部banner开始 -->
	<div class="index-banner left">
		<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/s_banner.gif"></a>
	</div>

	<div class="index-banner left">
		<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/index-banner2.jpg"></a>
	</div>
	<!-- 底部banner结束 -->

</div>
	
</div>
<!-- 主体区域结束 -->

<!-- 底部开始 -->
<div class="index-foot clear">
	<dl class="clear screen">
		<dd>
		<div class="foot-panel">
			<div class="title relative">
				<div class="title-line"></div>
				<div class="text">
					<span>有货SERVICES</span>
				</div>
			</div>
			<div id="foot-services">
				<ul class="clear two-dim">
					<li class="left">
						<div>
							<a href="javascript:void(0);"><img src="http://localhost/yoho/Application/Index/View/Public/images/yoho1.png" class="dim-img lazy"></a>
							<p>YOHO!有货</p>
						</div>
					</li>
					<li class="left">
						<div>
							<a href="javascript:void(0);"><img src="http://localhost/yoho/Application/Index/View/Public/images/weibo.png" class="dim-img lazy"></a>
							<p>微信</p>
						</div>
					</li>
					<li class="left">
						<div>
							<a href="javascript:void(0);"><img src="http://localhost/yoho/Application/Index/View/Public/images/weibo.png" class="dim-img lazy"></a><p>微博</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- <p class="item-nav center" id="button-services"><a href="javascript:void(0);" key="0"><span class="iconfont cur">&#x3444;</span></a></p> -->
		</dd>

		<dd>
			<img src="http://localhost/yoho/Application/Index/View/Public/images/button_services.jpg" alt="" />
		</dd>
		
		<dd class="last">
			<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/more.jpg" alt="" /></a>
		</dd>

</div>
<!-- 底部结束 -->

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