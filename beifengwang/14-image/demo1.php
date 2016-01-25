<?php
    //第一步，设置文件mime类型，输出类型，默认是text/html是网页类型，默认可以不写
    //将输出改为图像流  设置标头
    header('Content-Type:image/png');
	
	//第二步，创建图形区域  两种创建方式 imagecreate() 新建一个调色板图像 相当于画布 默认黑色
	$im=imagecreatetruecolor(200,200);
	
	//第三步，在画布绘制  
	//换填充色 imagecolorallocate()
	$blue=imagecolorallocate($im, 0, 102, 255);
	
	//imagefill 区域填充
	imagefill($im,0,0,$blue);
	
	//第四步，在蓝色的背景上输入一些线条
	$white = imagecolorallocate($im, 255, 255, 255);
	imageline($im,0,0,200,200,$white);
	imageline($im,200,0,0,200,$white);
	
	//imagestring 绘制文本
	imagestring($im, 5, 80, 20, 'Mr.Lee', $white);
	
	//第五步，输出最终图像
	imagepng($im);
	
	//第六步 清空所有资源
	imagedestroy($im);
	
	//这样 demo1.php就是一张png图片 可以被外部文件引用了 见demo2
	
	
	
?>