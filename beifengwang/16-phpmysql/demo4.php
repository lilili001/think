<?php
     require 'config.php';
	
	//echo mysql_close($conn); //1
	
	//1.新增数据 2 条
	
	/*
	 $query = "INSERT INTO grade (id,name,email,point,regtime) VALUES
		 	(8,'lucina','lucina@163.com',88,NOW()),
		 	(9,'bonny','bonny@163.com',90,NOW())	";
	
	  echo $query;
	  @mysql_query($query) or die('新增错误'.mysql_error());
	
	*/
	 //2.更新数据 注意 要自己敲
	 /*
	$query = "UPDATE grade SET name='尼古拉' WHERE id=6 ";
	@mysql_query($query) or die('数据库更新错误'.mysql_error());
	 */
	 
	 //3.删除数据
	  
	  /*
	 $query = "DELETE FROM grade WHERE id=6";
	 @mysql_query($query) or die('删除错误'.mysql_error()); 
	 */
	 
	 //4.输出数据
	 $query = "SELECT id,name,email,point,regtime FROM grade";
	 $result= @mysql_query($query) or die('SQL语句有误'.mysql_error());
	 //把结果集转换成的数组赋给$row 如果有数据 就为真 !!是把$row资源型转为boolen
	 while(!!$row = mysql_fetch_array($result)){
	 	echo $row['id'].'---'.$row['name'].'---'.$row['email'];
		echo '<br/>';
	 }
	 
	 /*结果：
	  * 0---李晨---alice3344@126.com
		1---邓超---denchao@126.com
		2---baby---baby@126.com
		3---baobaier---baobei@163.com
		4---zulan---zulan@sina.com
		5---郑凯---zhengkai@souhu.com
		7---妮娜---nina@163.com
		8---lucina---lucina@163.com
		9---bonny---bonny@163.com
	  * */
	 
	 
	 //print_r($row) ;
	 //echo $row[1];
	 
	 
	 mysql_close();//参数也可以不写
	
	
	
	
	
	
	
	
	
	
	
?>