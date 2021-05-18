<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户登录</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Application/Index/View/Public/css/signin.css">
	<script type="text/javascript" src="http://localhost/yoho/Static/jquery/jquery-1.7.2.min.js"></script>
<!--hdjs载入-->
<link rel="stylesheet" type="text/css" href="http://localhost/yoho/Static/hdjs/hdjs.css"/>
<script src="http://localhost/yoho/Static/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/yoho';
WEB = 'http://localhost/yoho/index.php';
URL = 'http://localhost/yoho/index.php/Index/User/login';
APP = 'http://localhost/yoho/Application';
COMMON = 'http://localhost/yoho/Application/Common';
HDPHP = 'http://localhost/yoho/hdphp';
HDPHP_DATA = 'http://localhost/yoho/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/yoho/hdphp/Extend';
MODULE = 'http://localhost/yoho/index.php/Index';
CONTROLLER = 'http://localhost/yoho/index.php/Index/User';
ACTION = 'http://localhost/yoho/index.php/Index/User/login';
STATIC = 'http://localhost/yoho/Static';
HDPHP_TPL = 'http://localhost/yoho/hdphp/Lib/Tpl';
VIEW = 'http://localhost/yoho/Application/Index/View';
PUBLIC = 'http://localhost/yoho/Application/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost/yoho/Application/Index/View/User';
HISTORY = 'http://localhost/yoho/';
</script>
<script type="text/javascript">
	$(function(){
		$('#signinForm').validate({
			//表单Name值
			email: {
					//规则
	                rule: {
	                	//必填
	                    required: true,
	                    regexp: /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/
	                },
	                //错误信息
	                error: {
	                    required: '邮箱不能为空',
	                    regexp : '邮箱不合法'
	                },
                	success: '验证通过',
	                message: '请输入邮箱'
	           },
	       	password: {
	                rule: {
	                    required: true,
	                    regexp : /^\w{6,10}$/,
	                },
	                error: {
	                    required: '密码不能为空',
	                    regexp : '请输入长度为6-10位的密码',
	                },
	                success: '验证通过',
	                // message: '请输入密码'
	            }
		})
	})
</script>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
</head>
<body>
<!-- 头部开始 -->
<div class="header-simple">
  <div class="screen990">
	<div class="clear">
		<div class="left logo">
			<a href=""><img src="http://localhost/yoho/Application/Index/View/Public/images/logo-boys-8.png"></a>
		</div>
		<div class="right">
			<ul class="simple-items clear">
				<li class="left"><span class="item"><a href="" class="rgb2">帮助中心</a></span></li>
				<li class="left"><span class="rgb2 item"><span class="iconfont">&#xe604;</span>&nbsp;<strong>400-889-9646</strong></span></li>
			</ul>
		</div>
	</div>
  </div>
</div>
<!-- 头部结束 -->


<div class="container">
<!--登录开始-->
        <div class="loginnew-box">
          <div class="login-form">
            <h2 class="z_hydl">会员登录 LOGIN</h2>
            <div class="main">
            <form method="post" action="" id="signinForm" name="signinForm">
              <dl>
                <dt>邮箱：</dt>
                <dd>
	                <span class="input-box">
	                 	<input name="email" maxlength="100" size="50" id="loginemail" class="input_b input_error" style="width:210px;" type="text">
	                 </span>
                  <!-- <span class="f_onError" id="loginemailTips">请输入登录邮箱！</span> -->
                  </dd>
              </dl>
              <dl>
                <dt>密码：</dt>
                <dd>
	                <span class="input-box">
	                 	<input name="password" maxlength="100" size="50" id="loginemail" class="input_b input_error" style="width:210px;" type="password">
	                 </span>
                  <!-- <span class="f_onError" id="loginemailTips">请输入登录邮箱/手机号码！</span> -->
                  </dd>
              </dl>
              <div class="stat">
              <input type="checkbox" checked='checked' name='auto'> 记住登录状态　|　<a href="javascript:void(0);" class="a_g">忘记密码?</a>
              </div>
              <div class="submit">
	              <input name="" class="btn_b_login" value="登录" type="submit">
              </div>
              </form>
            </div>
          </div>
          <div class="login-info">
            <h3>还不是YOHO!有货会员？</h3>
            <div class="submit"> <a href="<?php echo U('User/register');?>" class="btn_b_h">10秒快速注册</a> </div>
          </div>
        </div>
<!--登录结束--> 
</div>




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