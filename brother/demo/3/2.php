<?php
/*
    注意：整型在内存中占4个字节 
 * 浮点型占8个字节   当浮点型数值太大的时候，转整型时 可能会有问题,但是在整数最大范围2.174e9之内时可以用的
 * 浮点型 转 整型的时候 浮点型数值不能超过 2.17e9
 * 
 */
 
 $str =2000000000000000000000000000000005656;
 $a = intval($str);
 echo $a;  //0  整数值超过最大范围
 
 $str1 = "asdfsdf";
 $a1 = intval( $str1 );
 echo $a1;  //0  字符串如果不是以数字开头 都会转成0
