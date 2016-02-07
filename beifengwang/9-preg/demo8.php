<?php

	//贪婪和分组获取的案例,ubb

	//我要将这个[b][/b]换成<strong>php5</strong>
	
	//注意一个问题，这个时候的[]中括号，是字符中的括号，而不是语法[a-z]
	
	//.表示匹配任意字符一个，加上一个*号表示匹配零个或者多个
	
	//用括号分为三组那么第一组就是\1,第二组就是\2，第三租就是\3
	
	//目前只有1租，\1
	
	//为什么后面没有了呢，
	
	//第一问题：第一个[b]和最后一个[\b]匹配了
	
	//解决贪婪问题。U

	$mode = '/(\[b\])(.*)(\[\/b\])/U';
	
	$replace = '<strong>\2</strong>';

	$string = 'This is a [b]php5[/b],This is a [b]php4[/b]';
	
	echo preg_replace($mode,$replace,$string);
	

?>