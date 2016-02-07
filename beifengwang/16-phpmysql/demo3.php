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
	  
	  //第三步，从school数据库中 获取记录集 把grade表的内容提出来
	  $query = "SELECT*FROM grade1";
	  $result = @mysql_query($query,$conn) or die('sql错误:'.mysql_error()) ;//第二个参数可以放也可以部分，不放就是最近的一个  返回的也是资源
	  //echo $result;//返回资源类型 $result就是记录集
	  echo !!$result; //1
	  
	  //第四步，将记录集中的数据显示出来
	   print_r(mysql_fetch_array($result,MYSQL_ASSOC)); //下标按字段名输出
	 
	 /*输出
	  * 1Array
		(
		    [id] => 1
		    [name] => Lee
		    [email] => yc60.com@gmail.com
		    [point] => 88
		    [regdate] => 2015-07-05 12:02:22
		)
	  * 
	  * 
	  * */
	 
	  //print_r(mysql_fetch_array($result,MYSQL_NUM)); //下标按数字输出
	  
	  /*输出
	   * 1Array
		(
		    [0] => 1
		    [1] => Lee
		    [2] => yc60.com@gmail.com
		    [3] => 88
		    [4] => 2015-07-05 12:02:22
		)
	   * 
	   * 
	   * 
	   * */
	  //第五步，释放记录集资源
	  mysql_free_result($result);//也可以不写
	  
	  //最后，关闭数据库
	  mysql_close($conn);
	  
	  
?>