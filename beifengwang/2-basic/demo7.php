<?php

/* 
 可以通过调用一个函数来实现转换变量数据类型的目的。
 intval()、floatval()、strval();
 注意：使用这些函数的时候变量本身是没有变的
 */

//$sum是浮点型
$sum=22.22;

//intval($sum) 整体变成了整型
echo intval($sum).'<br/>';
echo gettype(intval($sum)).'<br/>';

//$sum是浮点型
echo $sum.'<br/>';
echo gettype($sum).'<br/>';

//settype()会直接将变量类型转换掉
settype($sum, "integer");
echo gettype($sum);