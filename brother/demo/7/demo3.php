<?php
     
     //带& 传进来的是变量
    function total($dirname,&$dirnum,&$filenum){
    	$dir = opendir($dirname);
		 readdir($dir)."<br/>";//. 代表当前目录
		 readdir($dir)."<br/>";// ..代表上级目录 我们不把. 和..输出 只读
		echo readdir($dir)."<br/>";
		echo readdir($dir)."<br/>";
		echo readdir($dir)."<br/>";
		//我们在demo4中用循环的方式来输出所有的文件名
    }
	$dirnum=0;
	$filennum=0;
	total("E:/xampp/phpMyAdmin",$dirnum,$filenum);
	echo "目录总数：".$dirnum ;
	echo "目录总数：".$filennum ;