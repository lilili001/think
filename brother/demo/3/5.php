<?php
/*
  常量：
 * 1.简单值得标识符，
 * 2.常量定以后不能再改变它的值，也不能使用unset()取消,也不能使用其他的函数取消 例如:PI.
 * 3.常量可以不用理会变量范围的规则,而在任何地方都可以定义和访问。
 * 4.常量使用define(常量名,常量值)
 * 5.常量声明不适用$  而变量需要$
 * 6.常量名称习惯大写
 * 7.常量只能用常量的值  只能用标量类型:整型 布尔 浮点型
 * 8.常量一定要在声明时给值 因为后期不能再赋值,它的值声明了就不能改变
 * 9.判断常量存不存在 defined("常量名") if(defined('HOME')){...}
 * 
 * 
 * 常量还分预定义常量 和魔术常量
 * 预定义常量：CASE_LOWER
 * 魔术常量：__FILE__  读取当前文件路径
 *        __LINE__ 读取当前是哪一行
 *    	  __FUNCTION__ 
 * PHP_VERSION
 * 
 * 
 * 
 */
 
 define('HOME','www.miya.com'); //定义常量
 $home='25635'; //定义变量
 
 function show(){
 	echo home.'</br>'; //常量可以不用理会变量范围的规则,而在任何地方都可以定义和访问 
	echo $home;
 }
show();  //www.miya.com

if(defined('HOME')){
	echo "exist";
}

echo __FILE__.'</BR>';//existE:\www\studym\code\tast\php\3\5.php
echo __LINE__.'</BR>'; //40
echo PHP_VERSION.'</BR>'; //5.5.1
