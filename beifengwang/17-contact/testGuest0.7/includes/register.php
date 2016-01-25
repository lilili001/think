<?php
    
    if(!defined('IN_TG')){
		echo "access denied";
		exit();
	}
    
	/*先检查   _alert_err 是否存在*/
	if( !function_exists(_alert_err) ){
		exit('该函数不存在');
	}
	if( !function_exists(_mysql_string) ){
		exit('该函数不存在');
	}
	/*验证用户名*/
    function _check_username($_string){
		
		 $_string = trim($_string);
		 
		 if( mb_strlen($_string) < 2 || mb_strlen($_string) > 20 ){
		 	_alert_err("验证码长度不得小于两位或大于20位!");
		 }
		 
		 //限制敏感字符------- <> 单引号 双引号   空格   多个空格
		 $_char_patten = '/[<>\'\"\ \  ]/';
		 
		 if( preg_match($_char_patten, $_string) ){
		 	_alert_err('用户名不得包含敏感字符');
		 }
		 
		 //限制敏感用户名注册
		 $_msg[0]='坏人1';
		 $_msg[1]='坏人2';
		 $_msg[2]='坏人3';
		
		foreach ($_msg as $value) {
			$_mg_string .=$value.'\n';
		}
		echo $_mg_string;
		//采用绝对匹配
		if( in_array($_string, $_msg) ){
			_alert_err($_mg_string.'以上敏感用户名不得注册');
		} 
		 
		//转义后返回字符串 可以防止sql注入
    	return @mysql_real_escape_string($_string);
    }
	
	/*验证密码*/
	function _check_password($_first_pass,$_last_pass,$_min_num){
		if(strlen($_first_pass) < $_min_num ){
			_alert_err('密码不得小于'.$_min_num.'位');
		}
		
		if( $_first_pass != $_last_pass ){
			_alert_err('两次输入的密码不一致');
		}
		
		return _mysql_string(sha1($_first_pass));//shal1 加密密码 
	}
	/*验证提示问题*/
	function _check_questions($_string,$_min_num,$_max_num){
		$_string=trim($_string);
		if( strlen($_string) < $_min_num || strlen($_string) > $_max_num ){
			_alert_err('密码提示问题不得小于'.$_min_num.'位或大于'.$_max_num.'位');
		}
		return mysql_real_escape_string($_string);
	}
	/*密码回答*/
	function _check_anwser($_ques,$_answ,$_min_num,$_max_num){
		if( strlen($_answ) < $_min_num || strlen($_answ) > $_max_num ){
			_alert_err('密码回答不得小于'.$_min_num.'位或大于'.$_max_num.'位');
		}
		
		if( $_ques == $_answ ){
			_alert_err('密码问题与密码回答不能相同');
		}
		
		return _mysql_string(sha1($_answ));
	}
	function _check_email($_string) {
	//参考bnbbs@163.com
	//[a-zA-Z0-9_] => \w
	//[\w\-\.] 16.3.
	//\.[\w+] .com.com.com.net.cn
	//正则挺起来比较麻烦，但是你理解了，就很简单了。
	//如果听起来比较麻烦，就直接套用
		 $pattern='/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/';
		 if( empty($_string) ){
		 	return null;
		 }else{
		 	if( !preg_match($pattern, $_string) ){
			 	 _alert_err('邮件格式不正确');
			 }
		 }
		 
		return _mysql_string($_string);
	}
	function _check_qq($_string){
		if( empty($_string) ){
			return null;
		}else{
			//[1-9]{1} 第一位 1-9之间的数字
			//[0-9]{4-9}  第二位开始也是0-9  位数4-9位
			if( !preg_match('/^[1-9]{1}[0-9]{4,9}$/',$_string)){
				_alert_err('qq号码格式不正确');
			}
		}
		
		return _mysql_string($_string);
	}
	function _check_url($_string){
		if( empty($_string) || ( $_string=='http://' ) ){
			return null;
		}else{
			//[1-9]{1} 第一位 1-9之间的数字
			//[0-9]{4-9}  第二位开始也是0-9  位数4-9位
			//?表示可有可没有  http(s)? 表示s可有可没有   (\w+\.)? --》www.
			if( !preg_match('/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/',$_string)){
				_alert_err('url码格式不正确');
			}
		}
		
		return _mysql_string($_string);
	}
 	
	function _check_uniqid($_first_uniqid,$_end_uniqid){
		if( (strlen($_first_uniqid)!=40) || $_first_uniqid!=$_end_uniqid ){
			_alert_err('唯一标识符异常!');
		}
		return _mysql_string($_first_uniqid);
	}
	
?>