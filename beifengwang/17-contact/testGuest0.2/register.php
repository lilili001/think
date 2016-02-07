<?php
	
 //header('Content-Type: text/html; charset=utf-8');

 define('IN_TG',true);//定义常量 IN_TG 用来授权 includes里的文件调用 防止恶意调用 外部网站无法调用
  //定义一个常量来代表本页的内容
 define('script','register');
 //引入公共文件 下面这种方法比较快
 require dirname(__FILE__).'/includes/common.php';
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>注册</title>
	<?php require root.'includes/title.php'?>
	<script src="js/face.js"></script>
</head>
<body>
	
<?php require  root.'includes/header.php' ?>

<div id="register">
	<h2>会员注册</h2>
	<form method="post" action="post.php">
		<dl>
			<dt>请认真填写一下内容</dt>
			<dd>用  户  名   ：<input type="text" name="username" class="text" />(*必填，至少两位)</dd>
			<dd>密　　码：<input type="password" name="password" class="text" />(*必填，至少六位)</dd>
			<dd>确认密码：<input type="password" name="notpassword" class="text" />(*必填，同上)</dd>
			<dd>密码提示：<input type="text" name="passt" class="text" />(*必填，至少两位)</dd>
			<dd>密码回答：<input type="text" name="passd" class="text" />(*必填，至少两位)</dd>
			<dd>性　　别：<input type="radio" name="sex" value="男" checked="checked" />男 <input type="radio" name="sex" value="女" />女</dd>
			<dd class="face"><img id="faceimg" src="face/m01.gif" alt="头像选择" _onclick="" /></dd>
			<dd>电子邮件：<input type="text" name="email" class="text" /></dd>
			<dd>　Q Q 　：<input type="text" name="qq" class="text" /></dd>
			<dd>主页地址：<input type="text" name="url" class="text" value="http://" /></dd>
			<dd>验 证 码：<input type="text" name="yzm" class="text yzm"  /><img id="code" src="code.php"/> </dd>
			<dd><input type="submit" class="submit" value="注册" /></dd>
		</dl>
	</form>
</div>

<?php require 'includes/footer.php';?>

</body>
</html>
