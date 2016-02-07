<?php
	
 header('Content-Type: text/html; charset=utf-8');

 define('IN_TG',true);//定义常量 IN_TG 用来授权 includes里的文件调用 防止恶意调用 外部网站无法调用
  //定义一个常量来代表本页的内容
 define('script','face');
 //引入公共文件 下面这种方法比较快
 require dirname(__FILE__).'/includes/common.php';
 
 $range = range(1,9);
 //print_r(range(1,9));
 foreach ( $range as $number ) {
     echo $number;
 }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>头像选择</title>
	<?php require root.'includes/title.php'?>
	<script src="js/opener.js"></script>
</head>
<body>
	<div id="face">
	  <h3>选择头像</h3>
	  <dl>
	  	<!--循环输出方法1
	  	<?php for($i=1;$i<10;$i++) { ?>
	  		<dd><img src="face/m0<?php echo $i ?>.gif"/></dd>
	  	<?php } ?>
	  	-->
	  	<!--循环输出方法2-->
	  	<?php foreach(range(1,9) as $number) { ?>
	  		<dd><img src="face/m0<?php echo $number ?>.gif" alt="图片<?php echo $number ?>"/></dd>
	  	<?php } ?>
	  	<?php foreach(range(10,64) as $number) { ?>
	  		<dd><img src="face/m<?php echo $number ?>.gif" alt="图片<?php echo $number ?>"/></dd>
	  	<?php } ?>
	  </dl>
	</div>
</body>
</html>
