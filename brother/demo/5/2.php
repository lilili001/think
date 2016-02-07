<?php
    $a = 10;
	$b=5;
	
	if( $a > $b ){
		$t = $a;
		$a = $b;
		$b = $t;
	}
    var_dump( $a > $b );