$(function(){
	//让所有子集隐藏
	$('tr[pid!=0]').hide();
	
	//toggle 轮流点击事件
	$('.goods-category li').toggle(function(){
		var cid = $(this).attr('cid');
		//子分类显示
		$('ul[pid='+cid+']').show();
		$(this).children('ul').css('display','block');
		$(this).children('a').children(' .iconfont').html("&#xe612;");
	},function(){
		var cid = $(this).attr('cid');
		//异步获取点击到的分类的所有子集
		$.ajax({
			type:"post",
			url: CONTROLLER + "&a=ajax_get_son",
			data : {cid : cid},
			dataType:'json',
			success:function(data){
				//所有的子集分类隐藏
				$.each(data, function(k,v) {    
					 $('ul[cid='+v+']').hide();                                                        
				});
			}
		});
		//变为加号
		$(this).children('ul').css('display','none');
		$(this).children('a').children(' .iconfont').html("&#xe60d;");
	})
	
})










