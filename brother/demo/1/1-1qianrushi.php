<html>
<header>
	<title><?php echo "first php jiaoben"?></title> <!--php嵌入到title中-->
</header>
<?php 
	$a=100; //设置一个全局变量
?>
<body text="<?php echo "red"?>">  <!--php嵌入到标记中  设置字体红色-->
	
	<script>
		document.write(123);
	</script>
	<?php
	   for( $i=0; $i<10;$i++ ){
	   	echo "$i ### $a  ####</br>";//应用了上面的全局变量
	   }   
	?>
	
	<!--循环还可以应用大括号 {}-->
	<?php 
		for( $i=0; $i<10;$i++  ){
	?>
	
	aaaaaaaaaa $i $a aaaaaaaaaa </br>; <!--这里就不用echo了  看大括号位置-->
	
	<?php
		}
	?>
	<!--循环还可以应用大括号 {}  结束-->
</body>

</html>

