<?php
namespace Common\Model;
use Think\Model;
class UserModel extends Model {
	// protected $tablePrefix = 'abc_';//换前缀
	// protected $tableName = 'abc'; //换表名
	// protected $trueTableName = 'tp_abc'; //重新定义完整的带前缀的表名
	// protected $dbName = 'tp'; //附加数据库名
	public function __construct(){
		parent::__construct();
		echo "<br/><br/>这是Common模块  UserModel里的构造函数<br/><br/>";
	}
}