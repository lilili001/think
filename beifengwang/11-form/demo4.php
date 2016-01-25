<?php
    //接收前面表单中的值 username
    
    if( isset($_POST['username']) ){
    	echo "正常提交";
		$username = $_POST['username'];
		$username=trim($username);
		$username=htmlspecialchars($username);
		
		if(strlen($username ) < 2){
			echo "用户名不能小于两位";
			exit;
		}
		
		if( !is_numeric($username) ){
			echo "用户名必须是数字";
			exit;
		}
		
		echo '  '.$username;
    }else{
    	echo "非法提交";
    }
     