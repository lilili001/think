<?php
	  header('Content-Type:text/html;charset=utf-8');

	  //常量参数
      define('DB_HOST','localhost');
	  define('DB_USER','root');
	  define('DB_NAME','school');
	  
	  //第一步，连接数据库
	  $conn= @mysql_connect(DB_HOST,DB_USER) or die('数据库连接错误'.mysql_error());
	  //echo $conn;//返回资源
	  
	  //第二步，选择指定的数据库 设置字符集
	  @mysql_select_db(DB_NAME,$conn) or die('指定的数据库不存在，数据库错误'.mysql_error());
	  mysql_query('SET NAMES UTF8') or die('字符集错误') ;  //如果数据中有中文需设置自字符集 
?>