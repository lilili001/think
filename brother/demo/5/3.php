<?php
 
 $sex = $_GET['sex']; //通过地址栏获取http://localhost/studym/code/tast/php/5/3.php?sex=man&age=75
 $age = $_GET['age'];
 
 if($sex=="nan"){
	if($age >= 60){
		echo "这个男士已经退休".($age-60)."年了";
	}else{
		echo "这个男士还在工作，还有".(60-$age)."年才退休<br>";
	}
}else{
	if($age >= 66){
		echo "这个女士已经退休".($age-55)."年了";
	}else{
		echo "这个女士还在工作，还有".(55-$age)."年才退休<br>";
	}
}
