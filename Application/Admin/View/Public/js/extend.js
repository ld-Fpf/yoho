/* 
* @Author: LDF QQ 47121862
* @Date:   2014-05-16 19:34:05
* @Last Modified by:   LDF QQ 47121862
* @Last Modified time: 2014-05-24 19:30:21
*/
// 扩展js
$(function(){
	//tab切换
	$('div.tabMenu a').click(function(){
		var i = $(this).index();
		$(this).addClass('act').siblings('a').removeClass('act');
		$('ul.tabSub li').eq(i).show().siblings('li').hide();
		return false;
	})
	//自动显示大图
	$('.showPic').hover(function(e){
		var pic = $(this).children('img').attr('src'),
			 h = '<img class="showPicCont" src='+pic+' />',
			 p = $(this).children('img'),
			 _this=$(this);
		if($('.showPicCont').length==0)
			$('body').append(h);
		// $(document).mousemove(function(e){
		var sp = $('.showPicCont'),
		 	 l = e.pageX+25,
		 	 t = e.pageY+25,
		 	 lmax = $(window).outerWidth()-sp.outerWidth(),
		 	 tmax = $(window).outerHeight()-sp.outerHeight();
		 	 sp.fadeIn().css({'left':l,'top':t});
		 	 if(l>lmax) sp.css('left',lmax);
		 	 if(l<=0) sp.css('left',l);
		 	 if(t<=0) sp.css('top',t);
		 	 if(t>tmax) sp.css('top',tmax);
		// })
	},function(){
		$('.showPicCont').remove();
	})
	//全选等
	$('#checkAll').click(function(){
		($(this).attr('checked'))?$('.table :checkbox').attr('checked','checked'):$('.table :checkbox').removeAttr('checked');
	})
	//显示大图标ico
	$('.changeico').click(function(){
		if($(this).text()=='放大图标'){
			$(this).text('缩小图标');
			$('.ico').css('zoom','5');
// 	 -moz-transform，-moz-transform-origin
// 　　-moz-transform:scale(0.5);
// 　　-moz-transform-origin:top left
		}else{
			$(this).text('放大图标');
			$('.ico').css('zoom','1');
		}
		return false;
	})
})
//================================================================================
//扩展开始
$.fn.extend({
	pos:function(){ //居中
		var t = ($(window).height() - $(this).height())/2 + $(window).scrollTop();
			 l = ($(window).width() - $(this).width())/2;
		$(this).css({'top':t,'left':l});
		return this;
	},
	drag:function(limit){ //拖拽,默认不限制范围
		var id = $(this);
		id.css('cursor','move');
		id.mousedown(function(e){
			var ls = e.pageX - $(this).position().left,
			 	 ts = e.pageY - $(this).position().top,
			 	 w = $(window).width() - $(this).width(),
			 	 h = $(window).height() - $(this).height() + $(window).scrollTop(),
			 	 _this=$(this);	
			$(document).on('mousemove',function(e){
				var l = e.pageX -ls,
			 	 	 t = e.pageY - ts;	
				_this.css({'left':l,'top':t});
				if(limit){
					if(_this.position().left<=0)
						_this.css('left',0);
					if(_this.position().top<=0)
						_this.css('top',0);
					if(_this.position().left>=w)
						_this.css('left',w);
					if(_this.position().top>=h)
						_this.css('top',h);
				}
			})
			return false;
		})
		$(document).on('mouseup',function(){
			$(document).off('mousemove');
		})
		return this;
	}
})
$.extend({
	//弹窗消息
	msg:function(options){
		var _this=this,
			 _def={
			 	str:'欢迎使用：LDF简单弹出消息窗口！', //默认内容
			 	timeout:2, //关闭时间
			 	shade:0, //是否有遮罩
			 	closebtn:0, //是否显示关闭按钮
			 	close:function(){} //回调函数
			 },
			 opt = $.extend(_def,options),
			 timer=null;
			 _this.ind = 0; //id标记
		this.close=function(){
			if(m.length<=1) _this.ind=0;
			m[_this.ind].remove();
			bg[_this.ind].remove();
			_this.ind++;
			return this;
		}
		var d = $.getSize($(document)),div='',bg='';
		bg+='<div class="msgContentClassBg"></div>'
		div += '<div class="msgContentClass">\
			<b class="closeMsgB">×</b>\
			'+opt.str+'</div>';
		if($('div.msgContentClass').length<=2)
			$('html').append(bg).append(div);
		var bg = $('.msgContentClassBg'),m=$('.msgContentClass'),c=$('.closeMsgB');
		if(opt.shade) bg.width((d.w)).height((d.h)).css({'opacity':.3,'top':0,'left':0}).fadeIn();
		if(!opt.closebtn) c.remove();
		m.fadeIn().pos();
		timer=setTimeout(function(){
					_this.close();
					opt.close();
				},opt.timeout*500)
		$(document).on({'keydown':function(e){
			if(e.keyCode==27) 
				clearTimeout(timer);
				_this.close();
				opt.close();
		}})
		c.click(function(){
			clearTimeout(timer);
			_this.close();
			opt.close();
		})
		return this;
	},
	getSize:function(id){ //获得尺寸
		var s = {};
		s.w = id.width();
		s.h = id.height();
		s.l = id.scrollLeft();
		s.t = id.scrollTop();
		return s;
	},
	confirmd:function(options){ //确认框
		var _def={ yes:null, no:null, msg:'您确定要继续吗?' },
			 opt = $.extend(_def, options);
		$.addConfirmd(opt.msg);
		var c = $('.LDFconfirm'),
			 bg = $('.msgContentClassBg'),
			 d = $.getSize($(document)),
			 yes = c.find('.yes'),
			 no = c.find('.no'),
			 re = null;
		bg.width((d.w)).height((d.h)).css({'opacity':.3,'top':0,'left':0}).fadeIn();
		c.pos();
		$(document).on({'keydown':function(e){
			if(e.keyCode==13) {
				if(opt.yes)
					opt.yes()
				$.delConfirmd();
				return true;
			}else{
				if(opt.no)
					opt.no()
				$.delConfirmd();
				return false;
			}	
		}})
		yes.live('click',function(){
			if(opt.yes)
				opt.yes()
			$.delConfirmd();
			return true;
		})
		no.bind('click',function(){
			if(opt.no)
				opt.no()
			$.delConfirmd();
			return false;
		})
	},
	addConfirmd:function(str){
		var confirmHmtl = '\
		<div class="msgContentClassBg"></div>\
		<div class="LDFconfirm">\
			<p class="cont">'+str+'</p>\
			<p class="bottom">\
				<a href="javascript:;" class="yes">确定</a>\
			 	<a href="javascript:;" class="no">取消</a>\
			</p>\
		</div>\
		';
		$('body').append(confirmHmtl);
	},
	delConfirmd:function(){
		$('.msgContentClassBg').remove();
		$('.LDFconfirm').remove();
	}
});