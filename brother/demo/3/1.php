<?php
/* 数据类型之间相互转换
 * 	一种是强制转换：
 * 		setType(变量， 类型);  //类型int, integer, float, double,real, bool, boolena, string, array, object
 *		这个函数将原变量的类型改变，var_dump();
 *
 * 		$变量=intval(变量或值);
 *		$变量=floatval(变量或值);
 *		$变量=stringval(变量或值);
 * 
 * 		
 * 
 * 	一种自动转换 ： 最常用的方式，因为这种我们开发时不用去管理类型，变量会根据运行环境自动转换
 * 
 * 与变量和类型有关的一些常用函数
 *
 *
 * 常量的声明与使用
 *
 *
 */
//改变变量的类型 方法一：直接改变原变量的类型
	$str="10.13adfsdf";
	settype($str, 'float');
	var_dump($str);

//改变变量的类型 方法二：不会改变原变量的类型
	$str1 = "245.4646sss";
	$a = (int)$str1;  //先改变变量的类型 并把它付给$a
	var_dump($a);
   var_dump($str1);
   

 //方法三：使用对应的方法 intval()  floatval() stringval()  
   $str2 = "333.698sss";
   $b = intval($str2);
   var_dump($b);
