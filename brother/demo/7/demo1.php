<?php
    function one($a,$b){return $a+$b;}
	function two($a,$b){return $a*$a+$b*$b;} 
	function three($a,$b){return $a*$a*$a+$b*$b*$b ;}
	
	$var=one;
	echo  "结果：" .$var(3,4)."<br/>";
