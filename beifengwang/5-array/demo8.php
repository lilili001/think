<?php

$transport = array('foot', 'bike', 'car', 'plane');
$mode = current($transport); // $mode = 'foot';
$mode = next($transport);    // $mode = 'bike';//移动了指针
$mode = current($transport); // $mode = 'bike';
$mode = prev($transport);    // $mode = 'foot';
$mode = end($transport);     // $mode = 'plane';//移动了指针
$mode = current($transport); // $mode = 'plane';
//reset($transport) 将 array 的内部指针倒回到第一个单元并返回第一个数组单元的值

