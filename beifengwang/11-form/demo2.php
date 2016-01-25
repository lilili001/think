<?php
      //header()字符页面编码
      
      ob_start();//开启缓冲区 是为防止header()报错
      
      echo "我是中文111";
      
	  header('Content-Type:text/html;charset=utf8');
	  echo '嘿嘿，我是中文！页面编码是UTF8，文件也是UTF8';  
?>