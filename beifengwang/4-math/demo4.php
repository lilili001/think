<?php

/* 
 rand -- 产生一个随机整数
 int rand ( [int min, int max] )
 如果没有提供可选参数 min 和 max，rand() 返回 0 到 RAND_MAX 之间的伪随机整数。
 例如想要 5 到 15（包括 5 和 15）之间的随机数，用 rand(5, 15)。 
 * 
 mt_rand() -- 生成更好的随机数 比rand()速度更快 int mt_rand ( [int min, int max] )

getrandmax() mt_getrandmax() 最大随机值

 */
echo rand(0,10).'<br/>';
echo mt_rand(0,10).'<br/>';
echo getrandmax().'<br/>';
echo mt_getrandmax().'<br/>';