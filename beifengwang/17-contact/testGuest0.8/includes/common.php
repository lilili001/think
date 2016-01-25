<?php
	if(!defined('IN_TG')){
		echo "access denied";
		exit();
	}
	
	//转换硬路径常量
	define('root',substr(dirname(__FILE__),0,-8));
	
	define('GPC',get_magic_quotes_gpc());
	
	//拒绝php低版本
	if(PHP_VERSION < '4.1.0'){
		exit('php版本过低');
	}
	
	//引入核心函数库
	require root.'includes/global.func.php';
	
	//执行时间	写在footer里
	$_startTime = _runtime();
	
		
?>