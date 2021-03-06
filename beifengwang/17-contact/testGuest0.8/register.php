<?php
 header('Content-Type: text/html; charset=utf-8');
 session_start();
 define('IN_TG',true);//定义常量 IN_TG 用来授权 includes里的文件调用 防止恶意调用 外部网站无法调用
  //定义一个常量来代表本页的内容
 define('script','register');
 //引入公共文件 下面这种方法比较快
 require dirname(__FILE__).'/includes/common.php';
 
 if( $_GET['action'] == 'register' ){ //get可以获取url的参数
 	/*验证验证码是否正确  post获取表单提交的内容 因为表单是以post形式提交的*/
	_check_code($_POST['yzm'],  $_SESSION['code'] );
	//可以通过唯一标识符 来防止表单恶意注册 跨站攻击
	include root.'includes/register.php';
	/*定义一个变量存放 各字段的值*/
	$_clear = array();
	
	/*字段在验证成功后 将字符串 返回出来 并赋值给 $_clear 相应的字段 -->验证并赋值*/
	 $_clear['uniqid'] = _check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
	 $_clear['active'] = _sha1_uniqid();
	 $_clear['username'] = _check_username($_POST['username']);
	 $_clear['password'] = _check_password( $_POST['password'],$_POST['notpassword'],6 );
	 $_clear['question'] = _check_questions( $_POST['passt'] , 4 , 20 );
	 $_clear['anwser'] = _check_anwser( $_POST['passt'], $_POST['passd'] , 4 , 20 );
	 $_clean['sex'] = _check_sex($_POST['sex']);
	 $_clean['face'] = _check_face($_POST['face']);
	 $_clear['email'] = _check_email($_POST['email']);
	 $_clear['qq'] = _check_qq($_POST['qq']);
	 $_clear['url'] = _check_url($_POST['url']); 
	 print_r($_clear);  
 }else{
 	//提交前
 	//这个存入数据库的唯一标识符还有第二个用处 就是cookie登陆验证  验证cookie的标识符和数据库的标识符是否相等 
 	$_SESSION['uniqid'] = $_uniqid = _sha1_uniqid();
 	echo $_SESSION['uniqid'];
 }
 
 
 //唯一标识符  有两个参数  参数一rand() ：每次产生的长度是随机的  参数二：是否带小数 true/false
 //最后用md5加密32位  或者shal() 40位
 //echo md5(uniqid(rand(),true )); 
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
	<form method="post" action="register.php?action=register">
		<input type="hidden" name="action" value="register"/>
		<input type="hidden" name="uniqid" value="<?php echo $_uniqid ?>" />
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
