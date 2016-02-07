<?php

 $users=array('alice','joe','马云','李彦宏','周宏伟');
 
//可以用for循环 也可以使用foreach
 for( $i=0;$i<count($users);$i++ ){
     echo $i.'----'.$users[$i].'<br/>';
 }
 
echo '------------foreach( $item_list as $item )------------------------<br/>';
 //如果key不是从0开始，或不是数字 那么就不能用for循环了 。用foreach遍历
 //as 后面的变量随便 一般用$value |  as前面的是数组
 //foreach 只用于数组遍历

if(is_array($users) ){
    foreach ($users as $value) {
        echo $value.'<br/>';
    } 
}


echo '--------------foreach( $item_list as $key=>$item )----------------------<br/>';
//foreach 还可以打印出key
if(is_array($users) ){
    foreach ($users as $key => $value) {
        echo $key.'----'.$value.'<br/>';
    }
}
