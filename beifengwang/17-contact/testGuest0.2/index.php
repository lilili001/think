<?php
	
 header('Content-Type: text/html; charset=utf-8');

 define('IN_TG',true);//定义常量 IN_TG 用来授权 includes里的文件调用 防止恶意调用 外部网站无法调用
 
 //定义一个常量来代表本页的内容
 define('script','index');
 
 //引入公共文件 下面这种方法比较快
 require dirname(__FILE__).'/includes/common.php';
  

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>首页</title>
	<?php require root.'includes/title.php'?>
</head>
<body>
<?php require  root.'includes/header.php' ?>

<div id="list">
	<h2>帖子列表</h2>
</div>

<div id="user">
	<h2>新进会员</h2>
</div>

<div id="pics">
	<h2>最新图片</h2>
</div>
<?php require 'includes/footer.php';

 ?>

</body>
</html>
