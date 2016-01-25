<?php

/* 
  empty($var) 判断是否为空 空就返回1 否则为false
  ""、0、"0"、NULL、FALSE、array()、var $var; 以及没有任何属性的对象都将被认为是空的
 */

$a=5;
echo empty($a);

$b='';
echo empty($b);

