<?php

/* 
  多维数组
 */
 
//使用each 和 list 将多维数组输出
for(  $i=0;$i<count($products);$i++ ){
    echo $i;
    while(  !!list($v1,$v2) = each($products[$i])  ){
        echo $v1.'----'.$v2 ;
    }
    echo '<br/>';
} 

