<?php
//list将数组的值分别赋给一些变量 list只认识下标为数自的数组 自定义的字符串的key是无法使用List来识别的
 $num=array('大笨钟','英国','自由女神像','美国','黑手党','意大利','柏林','德国');
 list( $v1,$v2 ) = $num;
 echo $v2;//英国
 
$users=array('baidu'=>'李彦宏','alibaba'=>'马云','360'=>'周鸿祎','3602'=>'周鸿祎');
list($name,$value)=each($users);
echo $name;//baidu
echo '<br/>----------------------------------<br/>';

//array_unique()它会删除掉里面相同值的元素 返回新数组
print_r(array_unique($users));
echo '<br/>----------------------------------<br/>';
$numbers=array(1,2,3,6,5,9,8,7,8,3,5);
print_r(array_unique($numbers));

echo '<br/>----------------------------------<br/>';
//array_flip();对调数组中的 key 和 value; 返回一个新数组
print_r(array_flip($users));
  