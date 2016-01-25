<?php
     //url重定向 当前页面自动跳到了百度
     //执行header()注意 之前不能有任何浏览器输出 echo 之类的  
     //解决方法：
     //		1.   header('location:http://www.baidu.com') 写在最开头
     //     2.   开启缓冲 ob_start();
     //echo ...  no  如果这里有echo输出  又没有开启缓冲的话  则会报错
     ob_start();
     echo "111";
     header('location:http://www.baidu.com');  
?>