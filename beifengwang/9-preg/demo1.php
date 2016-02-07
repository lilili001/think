<?php
//普通匹配必须逐个匹配
//$m = '/abc/';
//$s = 'abc';或者 'abcd',必须要包含abc


/***************** 1- h+ 匹配前导字符,至少一个   1-n *****************************/

$model = '/ph+p/';//+ 代表+前面至少有一个h
$string = 'thinkphhhhhp';
echo '1:'. preg_match( $model,$string ).'<br/>';
//结果 匹配

/***************** 2- h* 匹配前导字符,至少0个   0-n *****************************/
//* 代表 /p 这里可以有0-多个h  p/,但是必须在/p p/中间 前后还是要匹配的
//*虽然可以匹配 0-n个，但是 前导字符不能更改 改了就不匹配了 /pop/ 就不匹配
$model1 = '/ph*p/';
$string1 = 'thinkpp';
echo  '2:'.preg_match( $model1,$string1 ).'<br/>';//1
//匹配项 thinkphp thinkpp thinkphhhhhp

/***************** 3- h?  匹配前导字符,0-1 *****************************/
$model2 = '/ph?p/';
$string2 = 'thinkphp';
echo  '3:'.preg_match( $model2,$string2 ).'<br/>';//1
//匹配项 thinkphp thinkpp

/***************** .  匹配任意字符串 .匹配任意一个字符 所以两个点 就是人也两个字符 *****************************/
$model3 = '/p.p/';
$string3 = 'thinkphp';
echo  '4:'.preg_match( $model3,$string3 ).'<br/>';//1
//匹配项 thinkpop thinkp1p ...

//.* 表示前导任意字符并且0-n  0或多个任意字符
$model4 = '/p.*p/';
$string4 = 'thinkpooisip';
echo  '5:'.preg_match( $model4,$string4 ).'<br/>';//1
//匹配项 thinkp任意多个字符p

/***************** p{3} 前导字符 必须是3个 *****************************/
$model5 = '/ph{3}p/';
$string5 = 'thinkphhhp';
echo  '6:'.preg_match( $model5,$string5 ).'<br/>';//1

/***************** p{3,5} 前导字符 3-5个 *****************************/
$model6 = '/ph{3,5}p/';
$string6 = 'thinkphhhp';
echo  '7:'.preg_match( $model6,$string6 ).'<br/>';//1
//匹配项 thinkphhhp thinkphhhhp  thinkphhhhhhp

/***************** p{3,} 前导字符 3-n 至少3个 *****************************/
$model7 = '/ph{3,}p/';
$string7 = 'thinkphhhp';
echo  '8:'.preg_match( $model7,$string7 ).'<br/>';//1
//匹配项 thinkphhhp thinkphhhhp  thinkphhhhhhp

/***************** $ 尾巴开始匹配  以php结尾的匹配*****************************/
$model8 = '/php$/';
$string8 = 'thinkphhhpsdfphp';
echo  '9:'.preg_match( $model8,$string8 ).'<br/>';//1
//匹配项 thinkphhhp thinkphhhhp  thinkphhhhhhp

/*****************^ 开头开始匹配  以php开头的匹配*****************************/
$model9 = '/^php$/';//必须以php开头 和 php结尾的
$string9 = 'php';
echo  '10:'.preg_match( $model9,$string9 ).'<br/>';//1

/***************** | 或者 条件选择符，满足其中一个即匹配 *****************************/
$model10 = '/php|asp|jsp/';
$string10 = 'asp';
echo  '11:'.preg_match( $model10,$string10 ).'<br/>';//1
