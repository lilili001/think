<?php
//数据类型转换 获取变量类型

//隐式转换
//$sum=0;
//$total=1.22;
//$sum=$total;
//echo gettype($sum);

//显示转换
$sum=0;
$total=(float)$sum;
echo gettype($total);


