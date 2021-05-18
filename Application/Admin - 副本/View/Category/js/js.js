$(function(){
	//让所有子集隐藏
	$('tr[pid!=0]').hide();
	
	//toggle 轮流点击事件
	$('.a-plus').toggle(function(){
		var cid = $(this).attr('cid');
		//子分类显示
		$('tr[pid='+cid+']').show();
		//变为减号
		$(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');
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
					 $('tr[cid='+v+']').hide();                                                        
				});
			}
		});
		//变为加号
		$(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');
	})
	
})










