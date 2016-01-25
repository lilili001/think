<?php
    $a = "hello world";
	
	
	 if(isset($a)){  //isset() 判断变量是否存在
	 	echo $a;
	 }else{
	 	echo "not exist!";
	 }
	 
	unset( $a );  //删除变量$a
	
	
	 if(isset($a)){
	 	echo $a;
	 }else{
	 	echo "not exist!";
	 }