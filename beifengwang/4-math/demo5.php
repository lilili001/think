<?php

/* 
 numer_format( $var,int ) int表示保留几位小数
 */
$i=12345677.896;
$si=  number_format($i,2);
echo $si;//12,345,677.90
