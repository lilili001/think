<?php

$users=array('alice','joe','马云','李彦宏');
echo $users[0];

//print_r 里面放任何变量都可以 打印关于变量的易于理解的信息
print_r($users);

//range()包含指定数组
//包含两种东西：一种叫key 一种叫value
//key是自动生成的,默认从0开始,每次+1
//value是自己赋值的
$users1=  range(1, 10);
print_r($users1);
//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 7 [7] => 8 [8] => 9 [9] => 10 )

$letters=  range('a', 'z');
print_r($letters);

