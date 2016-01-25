<?php
	header('Content-Type:text/html;charset=utf-8');
    //echo "我是utf8的编码";
	
	//第一步 连接到 mysql服务器mysql_connect(n1,n2,n3);返回resource  加上!!返回的就是布尔型
	//参数一：mysql服务器地址，参数二：mysql服务器用户名，第三个参数：服务器密码
	//mysql_connect('localhost','root');
	
	//@如果出错了 不要出现警告 直接忽略掉  用die()退出
	
	if(!@mysql_connect('localhost','root')){
		echo "数据库连接失败,错误信息".mysql_error();
		exit;
	}else{
		echo "数据库连接成功";
	}
	
