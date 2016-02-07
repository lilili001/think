<?php

/* 
  双引号用法
 */

//1.变量可以直接在双引号中输出 中文字符会有问题
$name="alice";
echo "Her name is $name";

//2.可以使用字符串连接方式 用 .的方式 单引号双引号都可以
echo 'Her name is'.$name;

//3.转义字符可以得到解析
echo "虽然他的QQ号有很多女生，\n但一个都不属于他";
