<?php
    header('Content-Type:text/html;charset=utf8');
	//只要是按钮提交过来的 就说明其他超级全局变量都存在
	
	//如果send存在 说明是 表单提交过来的
	if( !isset( $_POST['send'] ) ){
		header('location:demo5.php');
		exit;//跳回去了下面的都不需要执行
	}
	
	//第二步，接收所有数据
	$username = trim($_POST['username']);
	$password = $_POST['password'];
	$code = trim($_POST['code']);
	$email = trim($_POST['email']);
	$content = htmlspecialchars(trim($_POST['content']));//html解析成特殊字符 不要让他解析成html
	
	//用户名不能小于两位 且 不能大于10位  中文算两个 英文算1个
	if(strlen($username)<2 || strlen($username)>10){
		//header('location:demo5.php'); 这种没有提示直接跳回来
		echo "<script>alert('用户名不能小于2位，且不得大于10位');history.back();</script>";
		exit;//跳回去了下面的都不需要执行
	}
	
	if(strlen($password)<6){ 
		echo "<script>alert('密码不得小于6位');history.back();</script>";
		exit;//跳回去了下面的都不需要执行
	}
	
	if(strlen($code)!=4 || !is_numeric($code) ){
		echo "<script>alert('验证码必须是4位数字');history.back();</script>"; 
		exit;//跳回去了下面的都不需要执行
	}
	if (!preg_match('/([\w\.]{2,255})@([\w\-]{1,255}).([a-z]{2,4})/',$email)) { 
		echo "<script>alert('电子邮件不合法');history.back();</script>"; 
		}
	echo "用户名:".$username.'<br/>';
	echo "邮箱:".$username.'<br/>';
	echo "个人简介：".$content;