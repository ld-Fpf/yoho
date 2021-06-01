<?php 
//设置属性url
function searchAttrUrl($avid,$index,$title){
	$index--;
	$s=explode('-', Q('s'));
	if($s[$index]==$avid){
		$class='class="act"';
	}
	$s[$index]=$avid;
	$s=implode($s,'-');
	$url = U('List/index',array('cid'=>Q('cid'),'s'=>$s));
	$url = "<a $class href='{$url}'>$title</a>";
	return $url;

}