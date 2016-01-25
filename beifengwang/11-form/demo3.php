
<?php 
require('mysql.php');
function pre($v) {
    echo '<pre>'.print_r($v,1).'</pre>';
}  


pre($_POST);


$name = $_POST['username'];
$email = $_POST['email'];

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<form method="post" action="Demo3.php">
	姓名：<input type="text" name="username" value="" /><br />
	姓名：<input type="text" name="email" value="" /><br />
	
	
	<input type="submit" value="提交" />
</form>

<?php 
$ss = "select * from friends";
$rowall = getall($ss);
pre($rowall);
foreach($rowall as $v){
	
	echo 'username:'.$v['username'];
	echo 'sex:'.$v['sex'];
	echo '<br>';
	
	
}
?>
