<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	// protected $tablePrefix = 'abc_';//换前缀
	// protected $tableName = 'abc'; //换表名
	// protected $trueTableName = 'tp_abc'; //重新定义完整的带前缀的表名
	// protected $dbName = 'tp'; //附加数据库名

	protected $fields =  array(
			'id', 
			'user', 
			'_pk'=>'id',
			'type'=> array('id'=>'smallint','user'=>'varchar')
		);

	public function __construct(){
		parent::__construct();
		echo "<br/><br/>这是UserModel里的构造函数<br/><br/>";
	}

	protected $_scope =  array( //属性名必须是_scope
		'sql1'=> array(
			'where'=> array('id'=>1),
		),
		'sql2'=> array(
			'order'=>'date DESC',
			'limit'=>2,
		),
		'default'=> array(
			'where'=> array('id'=>2),
		),
	);
        //过滤字段
        protected $insertFields = 'user';
        protected $updateFields = 'user';
        
        //字段映射
        //用于表单的字段名 修改为 数据表字段
        protected $_map =  array(
            'xingming'=>'user',
            'youxiang'=>'email',
        );
}