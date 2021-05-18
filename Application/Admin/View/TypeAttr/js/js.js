/* 
* @Author: LDF QQ 47121862
* @Date:   2014-05-14 18:21:29
* @Last Modified by:   LDF QQ 47121862
* @Last Modified time: 2014-05-26 09:28:42
*/
$(function(){
	$('#show_type').change(function(){
		//禁用默认选择
		$("#show_type option[value='']").attr('disabled','disabled');
		var v = $(this).val();
		$.post(url,{'type':v},function(data){
			$('#addGoodsAttr').html(data);
		})
	})
	//选择规格禁用下拉
	$('#s2').click(function(){
		var v = 'selected';
		$.post(url,{'type':v},function(data){
			$('#addGoodsAttr').html(data);
		})
		$("#show_type option[value='selected']").attr("selected","true").siblings().attr('disabled','disabled');
	})
	//恢复
	$('#s1').click(function(){
		$('#show_type option').removeAttr('disabled');
		$("#show_type option[value='']").attr('disabled','disabled');
		// $('#attradd').remove();
	})
})