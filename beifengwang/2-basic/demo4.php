<?php
//isset()和 unset()用来判断一个变量是否存在，返回的是布尔值 true或 false。
//isset() 返回 1 或 空
//unset() 销毁变量

$a=5;
//echo isset($a);
unset($a);//销毁后就没有这个变量了
echo isset($a);

