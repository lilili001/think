<?php

/* 
  多维数组
 */
$products=array(
    array("产品名"=>"苹果","数量"=>6,"价格"=>28.8),
    array("产品名"=>"猪肉","数量"=>2,"价格"=>32.1),
    array("产品名"=>"饼干","数量"=>3,"价格"=>45.3)
);



//使用each 和 list 将多维数组输出
for(  $i=0;$i<count($products);$i++ ){
    echo $i;
    while(  !!list($v1,$v2) = each($products[$i])  ){
        echo $v1.'----'.$v2 ;
    }
    echo '<br/>';
} 

