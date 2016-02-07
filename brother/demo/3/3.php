<?php
/*
    自动转换 php是弱类型 会根据表达式 或运行环境自动转换
 * 
 */
 
 $a =100;
 $b="123ssss";
 $c=true;
 $d=2.365;
 
 $sum = $a +$b +$c +$d;
 
 echo $sum.'<br/>'; //226.365  php是弱类型 会根据表达式自动转换
 var_dump($sum);

