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