<?php
	//加载已有的图像
	define('__DIR__',dirname(__FILE__).'\\');
	header('Content-Type: image/png'); 
	//imagecreatefrompng -- 从 PNG 文件或 URL 新建一图像
	//用image载入图像，是可以编辑图像
	//在载入的图像中，加入一个小水印
	//通过魔法常量__FILE__
	$im = imagecreatefromjpeg('Jellyfish.jpg');
	$white = imagecolorallocate($im,255,255,255);
	//imagestring($im,5,10,10,'http://www.yc60.com',$white);	
	
	//采用系统提供的字体
	
	imagepng($im);
	imagedestroy($im);
     
?>