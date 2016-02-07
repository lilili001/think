<?php
    
    if(!defined('IN_TG')){
		echo "access denied";
		exit();
	}
    
	/*先检查   _alert_err 是否存在*/
	if( !function_exists(_alert_err) ){
		exit('该函数不存在');
	}
	
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
    	return mysql_real_escape_string($_string);
    }
?>