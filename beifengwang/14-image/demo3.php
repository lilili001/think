<?php
     header('Content-Type:text/html;charset=utf-8');
	 
	 //随机数  为什么要0-15？ 因为要实现最简单的字母和数字混搭
	 //16进制0-9 a-f
	 
	 //echo mt_rand(0, 15);
	 
	 //dechex 10进制转为16进制
	 //10进制0-9转为16进制还是0-9  11以后就会转为字母
	 
	 //创建一个思维的验证码
	 $nmsg='';
	 for ($i=0; $i < 4 ; $i++) { 
		 $nmsg = $nmsg.dechex(mt_rand(0, 15));
	 } 
	 header('Content-Type:image/png');
	 //echo $nmsg;
	 $im=imagecreatetruecolor(75,25);
	 $blue=imagecolorallocate($im,0, 102,255);
	 $white=imagecolorallocate($im, 255, 255, 255);
	 imagefill($im, 0, 0, $blue);
	 imagestring($im,5,20,5,$nmsg,$white);
	 
	 imagepng($im);
	 imagedestroy($im);
	 
?>