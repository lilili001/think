<?php
	
	echo "主机地址". $_SERVER['HTTP_HOST']."<br/>";
	echo "地址". $_SERVER['DOCUMENT_ROOT']."<br/>";
	echo "端口号". $_SERVER['SERVER_PORT'];
    phpinfo();
?>