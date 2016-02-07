<?php
     
     //带& 传进来的是变量
    function total($dirname,&$dirnum,&$filenum){
    	 $dir = opendir($dirname);
		 readdir($dir)."<br/>";//. 代表当前目录
		 readdir($dir)."<br/>";// ..代表上级目录 我们不把. 和..输出 只读
	 
		 while($filenameaa=readdir($dir)) {
			 $newfile = $dirname."/".$filenameaa;  //如果是 "E:/xampp/phpMyAdmin"这个目录下的
			 
			 if( is_dir($newfile) ){
			 	$dirnum++;   //如果读取的是目录 目录数++
			 }else{
			 	$filenum++; //如果读取的是文件 文件数++
			 } 
		 }
		 closedir($dirname);
		  
		//我们在demo4中用循环的方式来输出所有的文件名
    }
	$dirnum=0;
	$filenum=0;
	total("E:/xampp/phpMyAdmin",$dirnum,$filenum);
	echo "目录总数：".$dirnum ."<br/>";
	echo "文件总数：".$filenum ;