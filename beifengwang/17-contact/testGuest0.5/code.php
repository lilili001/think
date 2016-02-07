<?php
     
   session_start();
    
   define('IN_TG',true);//定义常量 IN_TG 用来授权 includes里的文件调用 防止恶意调用 外部网站无法调用
 
   //引入公共文件 下面这种方法比较快
   require dirname(__FILE__).'/includes/common.php';

   //调用验证码函数
   validateCode();
   
?>