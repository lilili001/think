<?php
     $one = 10;
	 $two = $one;
	 
	 $one = 100;
	 
	 echo $one."</br>";
	 echo $two."</br>";
	 
	  
	 $three = 3;
	 $four =&$three;//相当于给$three起个别名 $four  这个时候 $three 和 $four是一个对象,指的是同一个值
	 
	 $three = 300;
	 echo $three."</br>";
	 echo $four."</br>";