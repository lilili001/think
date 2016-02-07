<?php
   /*
    * 链接符 .  
    * 双引号中 可以直接用{}
    */  
  
  $name ="alice";
  $age = 28;
  $height = 1.75;
  
  echo "我的名字是：$name 我的年龄是：$age 我的身高是：$height</br>";
  echo "我的名字是：{$name} 我的年龄是：{$age} 我的身高是：{$height}</br>";
  echo '我的名字是：'.$name.' 我的年龄是：'.$age.' 我的身高是：'.$height.'</br>';
  echo '$name='.$name;