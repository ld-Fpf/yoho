<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>商品详情</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Application/Index/View/Public/css/yoho.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Application/Index/View/Public/css/detail.css">
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

<!-- 主体区域开始 -->

<!-- 品牌导航开始 -->
<div class="brands-nav">
    <div style="background:#333;">
        <div class="clear screen">
            <div class="left">
                <img src="http://localhost/yoho/Application/Index/View/Public/images/brand.png" alt="HARDLYEVER'S" height="45">
              </div>
            
            <div class="right favor">
                    <a href="" title="HARDLYEVER'S">
                        <span class="iconfont">&#xe600;</span>
                    </a>
                    <a href="javascript:void(0);" id="brandFavor" brand="250" class="">
                        <span class="iconfont">&#xe601;</span>
                    </a>
            </div>
        </div>
    </div>
</div>
<!-- 品牌导航结束 -->

<!-- 商品详情开始 -->
<div class="wrapper screen wrapper-goods-detail">
	<!-- 面包屑开始 -->
	<div class="mini-site-nav">
	    <a href="">BOYS首页</a><span class="ifont10">&gt;</span>
	    <a href=""><?php echo $cname;?></a><span class="ifont10">&gt;</span>
	    <!-- <a href="">牛仔裤</a><span class="ifont10">&gt;</span> -->
	    <span>
	        <h1><?php echo $goods['name'];?></h1>
	    </span>
	</div>
	<!-- 面包屑结束 -->

	<!-- 购买选项开始 -->
	<div class="clear detail-info" style="width: 990px;margin-left: 100px;">
	    <div class="left clear info-left">

	        <div class="left goods-img-big relative">
	            <div class="absolute goods-tag-small" id="goods_tag_small"></div>
	            <img id="bigImage" src="http://img11.static.yhbimg.com/goodsimg/2014/11/13/06/0184ace5aff9115b1404451570a8889421.jpg?imageMogr2/thumbnail/420x560/extent/420x560/background/d2hpdGU=/position/center">
	        </div>

	        <div class="right goods-img-small">
	        	<?php foreach ($pic as $k=>$v){?>
		        	<a href="javascript:void(0);">
		        		<img src="http://localhost/yoho/<?php echo $v['small_pic'];?>" width="75" height="100">
		        	</a>
	        	<?php }?>
	        </div>
	    </div>

	    <div class="right info-right">
	        <div class="title">
	            <h2><?php echo $goods['name'];?></h2>
	            <p>
	                <a href="" title="<?php echo $bname;?>"><?php echo $bname;?></a>
	            </p>
	        </div>
	        <div class="info-price">
	        	<div class="price-del">
	        		<span>市场价：</span><b>￥<?php echo $goods['marketprice'];?></b>
	        	</div>
	        	<div class="price">
	        		<span>促销价：</span><span class="price-sale">￥<?php echo $goods['shopprice'];?></span>
	        	</div>
	        </div>
	        <div class="info-activity"></div>
	        <div class="info-buy">
	            <div class="move-panel">
			        <?php
        //初始化
        $hd['list']['ac'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($attrClass)) {
            echo '';
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
	                <dl class="size clear">
	                    <dt class="left rgb9" id="select_size_title">选<?php echo $ac['title'];?>：</dt>
	                    <dd class="left">
	                        <div class="clear" id="sizeList">
	                        	        <?php
        //初始化
        $hd['list']['av'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($ac['_val'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($ac['_val'] as $av) {
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
                $hd['list'][av]['last']= (count($ac['_val'])-1 <= $listId);
                //总数
                $hd['list'][av]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
	                        		    <?php if(in_array($av['taid'],$stVal)){ ?>
	                        			<a href="javascript:void(0);" title="" class="left act" onclick="return selectSpec(this);"><?php echo $av['avalue'];?></a>
	                        		<?php }else{ ?>
	                        			<a href="javascript:void(0);" title="" class="left" onclick="return selectSpec(this);"><?php echo $av['avalue'];?></a>
	                        		<?php } ?>
	                        	<?php }}?>
	                        </div>
	                    </dd>
	                </dl>
			  <?php }}?>
	                <dl class="amount clear">
	                        <dt class="left rgb9">选数量：</dt>
	                        <dd class="left" id="amount-unit">
	                            <div class="clear amount-unit">
	                                <input class="amount-input left" name="num" id="num" value="1" disabled="" type="text">
	                                <div class="left">
	                                    <a href="javascript:void(0);" class="amount-add"><span class="iconfont">&#xe60b;</span></a>
	                                    <a href="javascript:void(0);" class="amount-sub amount-subtract">
	                                    	<span class="iconfont">&#xe603;</span>
	                                    </a>
	                                </div>
	                            </div>
	                        </dd>
	                        <dd class="left amount-tips"><span class="rgb9"></span></dd>
	                    </dl>
	                    <div class="info-submit clear">
	                        <div class="">
	                        	<a href="javascript:void(0);" class="left button-goods button-cart" id="buyclick"><span class="iconfont font16">&#xe60a;</span>添加到购物车</a>
	                        </div>
	                        <div class="" id="fav_item">
	                        	<a href="javascript:void(0);" onclick="productdetails.favitem();" class="left button-favor">             <span class="iconfont">&#xe601;</span>收藏商品</a>
	                        </div>
	                    </div>
	                  </div>
	            <div id="resultBox" class="move-panel"></div>
	        </div>
	        <div class="info-other">
	            <div class="info-share clear">
	                <span class="share-to"><span class="rgb9">分享商品：</span>
	                    <a title="分享到新浪微博" href="javascript:void(0);" class="share-a share-sina"></a>
	                    <a title="分享到腾讯微博" href="javascript:void(0);" class="share-a share-tencent"></a>
	                    <a title="分享到人人网" href="javascript:void(0);" class="share-a share-renren"></a>
	                    <a title="分享到QQ空间" href="javascript:void(0);" class="share-a share-qzone"></a>
	                    <a title="分享到QQ好友" href="javascript:void(0);" class="share-a share-qq"></a>
	                    <a title="分享到豆瓣" href="javascript:void(0);" class="share-a share-douban"></a>
	                </span>
	            </div>
	        </div>
	    </div><!--end info-right-->
	</div>
	<!-- 购买选项结束 -->
	<div class="clear"></div>
	<!-- 商品信息开始 -->
	<dl class="goods-attr" id="like"></dl>
	<dl class="goods-attr">
	        <dt class="center">
	            <span class="cur" id="description">商品信息 DESCRIPTION</span>
	            <span class="sep">|</span>
	            <span class="" id="materials">材质洗涤 MATERIALS</span>
	        </dt>
	        <dd class="goods-desciption">
	            <ul class="clear">
	    <li class="left"><span>编号：</span>51078039</li>
	    <li class="left" id="goodsColor"><span>颜色：</span>蓝色</li>
	            <li class="left">
	            <span>性别：</span>
	            男款        </li>
	        </ul>
	        </dd>
	        <dd class="goods-material hidden" id="material">
	        </dd>
	    </dl>
	<div class="clear"></div>
	<dl class="goods-attr">
	        <dt class="center">
	            <span class="cur" id="sizeInfo"><a name="size-info"></a>尺码信息 SIZE INFO</span>
	            <span class="sep">|</span>
	            <span id="sizeImg">测量方式 MEASURE</span>
	        </dt>
	        <dd class="goods-size-info">
	            <table>
	    <thead>
	    <tr>
	        <th width="110">尺码</th><th width="110">大腿围</th><th width="110">臀围</th><th width="110">裤脚围</th><th width="110">裤长</th><th width="110">裆长</th><th width="110">腰围</th>    </tr>
	    </thead>
	    <tbody>
	    <tr><td>30英寸</td><td>56</td><td>98</td><td>38</td><td>103</td><td>23</td><td>80</td></tr>    <tr><td>29英寸</td><td>54</td><td>94</td><td>36</td><td>101</td><td>23</td><td>76</td></tr>    <tr><td>32英寸</td><td>58</td><td>102</td><td>38</td><td>103</td><td>24</td><td>82</td></tr>    <tr><td>34英寸</td><td>60</td><td>108</td><td>40</td><td>108</td><td>25</td><td>88</td></tr>        </tbody>
	</table>
	<p class="center measure-tips">※ 以上尺寸为实物人工测量，因测量方式不同会有1-2CM误差，相关数据仅作参考，以收到实物为准。&nbsp;&nbsp;单位：厘米</p>        </dd>
	        <dd class="hidden measure">
	            <p class="center">
	                <img id="cateimage" src="http://static.yohobuy.com/images/v3/icon/img-white.png">
	            </p>
	        </dd>
	    </dl>


		<div class="clear"></div>
	    <dl class="goods-attr">
	        <dt class="center">
	            <span class="cur">商品详情 DETAILS</span>
	        </dt>
	        <dd>
	            <div class="goodsdetail-mod">
	                        </div>
	        </dd>
	        <dd class="goods-detail-richtext">
	            <?php echo htmlspecialchars_decode($pic['0']['intro']);?>
	        </dd>
	    </dl>




	    <dl class="goods-attr">
	        <dt class="center">
	            <span class=""><a href="javascript:void(0);" id="userConsult">顾客咨询 (<span id="consultNums">3</span>)</a></span>
	            <span class="sep">|</span>
	            <span class="cur"><a href="javascript:void(0);" id="userComments">购买评价 (<span id="commentsNums">0</span>)</a></span>
	        </dt>
	    </dl>


	    <div class="comments">
	        <dl style="display: block;" id="commentsItem" class="">
	            <dt>购买评价(<span id="commentsNum">0</span>)</dt>
	                  <dd style="display: none;" id="commentsBtnBox" class="hidden" page="1">
	                <p class="center load-more"><a href="javascript:void(0);" id="commentsBtn" onclick="comcoulist.commentlist();">加载更多&nbsp;<span class="ifont">.</span></a></p>
	            </dd>
	            <dd>
	                <p class="center"><a href="http://www.yohobuy.com/home/comment" target="_blank" class="do-comment"><span class="iconfont">&#xe60c;</span>我要评论</a></p>
	            </dd>
	        </dl>
	        <dl style="display: none;" id="consultItem" class="hidden">
	            <dt>购买咨询(<span id="consultNum">3</span>)</dt>
	                          <dd>             <div class="clear">                 <div class="left photo">                     <img src="http://static.yohobuy.com/images/v3/boy.jpg">                 </div>                 <div class="left user-info">                     <p>                         <span class="user-question">身高165体重118.我腿有点粗。买29英寸怕穿起紧。会不会啊</span>                     </p>                     <p>                         <span class="time">2014-12-29 15:27:34</span>                     </p>                 </div>             </div>             <div class="user-reply">                 <p>您好，根据您提供的信息建议您参30英寸哦，购买裤子是参考具体腰围裤长厘米数的，不同品牌款式的尺码是不一样的，您也可以测量下自己的腰围裤长然后参考网页尺码选择哦，如果有任何问题都可以致电我们电话客服4008899646，我们会竭诚为您服务，感谢您对yoho!有货的关注。</p>             </div>         </dd>              <dd>             <div class="clear">                 <div class="left photo">                     <img src="http://static.yohobuy.com/images/v3/boy.jpg">                 </div>                 <div class="left user-info">                     <p>                         <span class="user-question">腰围二尺六，身高170体重67，可以估计一下大概穿多大的嘛？</span>                     </p>                     <p>                         <span class="time">2014-11-18 01:33:17</span>                     </p>                 </div>             </div>             <div class="user-reply">                 <p>您好，根据您提供的信息建议您参考32英寸哦，购买裤子是参考具体腰围裤长厘米数的，不同品牌款式的尺码是不一样的，您也可以测量下自己的腰围臀围裤长然后参考网页尺码选择哦，如果有任何问题都可以致电我们电话客服4008899646，我们会竭诚为您服务，感谢您对yoho!有货的关注。</p>             </div>         </dd>              <dd>             <div class="clear">                 <div class="left photo">                     <img src="http://static.yohobuy.com/images/v3/boy.jpg">                 </div>                 <div class="left user-info">                     <p>                         <span class="user-question">您好，腰围二尺六穿几寸的裤子？</span>                     </p>                     <p>                         <span class="time">2014-11-16 16:24:01</span>                     </p>                 </div>             </div>             <div class="user-reply">                 <p>您好，购买裤子是参考具体腰围裤长厘米数的，不同品牌款式的尺码是不一样的，您也可以测量下自己的腰围臀围裤长然后参考网页尺码选择哦，如果有任何问题都可以致电我们电话客服4008899646，我们会竭诚为您服务，感谢您对yoho!有货的关注。</p>             </div>         </dd>      <dd style="display: none;" id="consultBtnBox" class="hidden" page="1">
	                <p class="center load-more"><a href="javascript:void(0);" id="commentsBtn" onclick="comcoulist.consultlist();">加载更多&nbsp;<span class="ifont">.</span></a></p>
	            </dd>
	            <dd>
	                <p class="center"><a href="javascript:void(0);" class="do-comment" id="consultFormBtn">我要咨询</a></p>
	            </dd>
	            <dd style="display:none;"></dd>
	        </dl>

	        <div class="after-sale-close">
	            <p><a href="javascript:void(0);" class="rgb2"><span class="iconfont">&#xe60e;</span><span>售后服务</span></a></p>
	        </div>

	        <div class="goods-sure">
	            <p class="center"><img src="http://localhost/yoho/Application/Index/View/Public/images/goods-sure.png"></p>
	        </div>
	    </div>

	    <dl class="goods-attr" id="recentReview">
	    	<dt class="center">
	    		<span class="cur">最近浏览 RECENT REVIEW</span>
	    	</dt>
	    	<dd class="goods-suggest">
	    		<ul class="clear" style="margin: 0 auto;width: 1010px;">
	    			<li class="left ">
	    				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/recent.jpg"></a>
	    				<a href="" class="name">HARDLYEVER'S  荧光泼墨直筒牛仔裤</a>
	    				<span class="price-del">￥475</span>
	    				<span class="price">￥399</span>
	    			</li>
	    			<li class="left ">
	    				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/recent.jpg"></a>
	    				<a href="" class="name">HARDLYEVER'S  荧光泼墨直筒牛仔裤</a>
	    				<span class="price-del">￥475</span>
	    				<span class="price">￥399</span>
	    			</li>
	    			<li class="left ">
	    				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/recent.jpg"></a>
	    				<a href="" class="name">HARDLYEVER'S  荧光泼墨直筒牛仔裤</a>
	    				<span class="price-del">￥475</span>
	    				<span class="price">￥399</span>
	    			</li>
	    			<li class="left ">
	    				<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/recent.jpg"></a>
	    				<a href="" class="name">HARDLYEVER'S  荧光泼墨直筒牛仔裤</a>
	    				<span class="price-del">￥475</span>
	    				<span class="price">￥399</span>
	    			</li>
	    		</ul>
	    	</dd>
	    </dl>
	    <!-- 商品信息结束 -->
</div>
<!-- 商品详情结束 -->



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
<script type="text/javascript">
			var avalue='';
			$("a[taid][class='act']").each(function(){
				avalue += '-'+$(this).attr('avalue');
			})
			//将隐藏表单加上选中属性
			avalue=avalue.slice(1);
			$('input[name="avalue"]').val(avalue);
			$('#yixuanze').text($('#yxzv').val()); //已选择span

			//选择默认规格属性
				function selectSpec(id){
					//点击之后变为选中样式
					// 记录点击之前的样式
					var pre = $(id).siblings('a').parent().find("a[class='act']");
					$(id).siblings().removeClass('xuan').end().addClass('xuan');
					var avid=''; //组合avid为 0_0_0 样式
					$("a[avid][class='xuan']").each(function(){
						avid+='_'+$(this).attr('avid');
					})
					avid=avid.slice(1);
					var gid = <?php echo $hd['get']['gid'];?>;
					$.post("<?php echo (U('havingst'));?>",{gid:gid,avid:avid},function(s){
						if(s==1){
							var url = '__METH__/gid/<?php echo $hd['get']['gid'];?>/avid/'+avid;
							location.href=url;
						}else{
							// var url = '__METH__/gid/<?php echo $hd['get']['gid'];?>/avid/<?php echo $hd['get']['avid'];?>';
							// location.href=url;
							a=0;
							$.msg({str:'没有库存！',shade:1,close:function(){
								// $(id).removeClass('xuan');pre.addClass('xuan');
							}});
							return false;
						}
					})
					return false;
				}
</script>

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