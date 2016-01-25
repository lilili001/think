<?php
	//执行耗时 @return 浮点型
    function _runtime(){
    	$_mtime = explode(' ', microtime());
		return $_mtime[0]+$_mtime[1];
    }
	 
    function aa()
    {
        echo "111";
    }
	
	function validateCode(){
   	  	session_start();
		for ($i=0; $i < 4 ; $i++) {
			$randomNum = dechex(mt_rand(0, 15)); 
			$_nmsg .= $randomNum;
		}
		$_SESSION['code'] = $_nmsg;
		//echo $_SESSION['code'];
		//echo $_nmsg; //变量不可以跨页面 但是session可以  利用超级全局变量
		
		$_width=75;
		$_height=25;
		$_img = imagecreatetruecolor($_width, $_height);
		
		//白色
		$_white = imagecolorallocate($_img, 255, 255, 255);
		//填充
		imagefill($_img, 0, 0, $_white);
		
		//黑色
		$_black = imagecolorallocate($_img, 0, 0, 0);
		
		//画一个黑色的边框
		imagerectangle($_img, 0, 0, $_width-1, $_height-1, $_black);
		
		//随机线条
		for ($i=0; $i < 6; $i++) { 
			$_randomColor = imagecolorallocate($_img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
			imageline($_img, mt_rand(0, $_width), mt_rand(0, $_height), mt_rand(0, $_width), mt_rand(0, $_height), $_randomColor);
		}
		//随机雪花  imagestring
		for ($i=0; $i < 100 ; $i++) { 
			$_randomColor = imagecolorallocate($_img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
			imagestring($_img, 1, mt_rand(0, $_width), mt_rand(0, $_height), '*', $_randomColor);
		}
		//输出验证码
		for ($i=0; $i <4 ; $i++) {
			$_rnd_color = imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200)); 
			imagestring($_img, 5 , $i*$_width/4 + mt_rand(1, 10) , mt_rand(1,$_height/2), $_SESSION['code'][$i], $_rnd_color);
		}
		
		//输出图像
		header('Content-Type:image/png'); 
		imagepng($_img);
		imagedestroy($_img);
   }
	
?>