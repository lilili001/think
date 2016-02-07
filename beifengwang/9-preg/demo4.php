<?php
//perl风格函数

//搜索数组中匹配规则的字符串 preg_grep()
$l = array( 'php','asp','jsp','python','ruby' );
$a = preg_grep( '/p$/',$l );
print_r($a);