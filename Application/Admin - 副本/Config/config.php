<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
return array(
	/********************************文件上传********************************/
    'UPLOAD_ALLOW_TYPE'             => array('jpg','jpeg','gif','png'),//允许上传类型
    'UPLOAD_ALLOW_SIZE'             => 2097152,     //允许上传文件大小 单位B
    'UPLOAD_PATH'                   => 'Upload/' . date('ymd') . '/',   //上传路径
    /********************************图片缩略图********************************/
    'THUMB_PREFIX'                  => '',          //缩略图前缀
    'THUMB_ENDFIX'                  => '_thumb',    //缩略图后缀
    'THUMB_TYPE'                    => 6,   //生成方式,
                                            //1:固定宽度,高度自增 2:固定高度,宽度自增 3:固定宽度,高度裁切
                                            //4:固定高度,宽度裁切 5:缩放最大边       6:自动裁切图片
    'THUMB_WIDTH'                   => 300,         //缩略图宽度
    'THUMB_HEIGHT'                  => 300,         //缩略图高度
);
?>