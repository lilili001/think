<?php
     
     function demo(){
     	$sum=0;
     	 for( $i=0;$i<func_num_args();$i++ ){
     	 	   $sum+=func_num_args($i);
     	 }
		 return $sum;
     }
	 
	 echo demo(1,2,3);
