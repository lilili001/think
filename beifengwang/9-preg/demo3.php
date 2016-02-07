<?php
//修饰符

//i:不区分大小写
$m_1 = '/php/i';
$s_1 = 'PHP';
echo  '1:'.preg_match( $m_1,$s_1 ).'<br/>';//1

//m:匹配首尾的时候  多行识别 $s_2 换行了,m可以匹配每一行的末位，只要有一行末位匹配了 就成功
$m_2 = '/php$/m';
$s_2 = "this is php\n,chao shuai";
echo  '2:'.preg_match( $m_2,$s_2 ).'<br/>';//1

//x:忽略规则模式中的空白字符
$m_3 = '/ph p/x';
$s_3 = "php";
echo  '3:'.preg_match( $m_3,$s_3 ).'<br/>';//1

//A：强制从头开始匹配 相当于 ^php
$m_4 = '/php/A';
$s_4 = "phpsdfsdf";
echo  '4:'.preg_match( $m_4,$s_4 ).'<br/>';//1