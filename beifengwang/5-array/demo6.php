<?php
//sort($var,[type])数组排序 返回布尔值 调用完 数组的顺序就改变了 type:SORT_NUMERIC / SORT_STRING

$a=array('bananer','apple','orange');
sort($a);
asort($a);//保留索引关系
print_r($a);

//按key排序
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
ksort($fruits);
print_r($fruits);

//实现反向：rsort()、arsort()和 krsort()。



