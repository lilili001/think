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
        //protected $insertFields = 'user';
        //protected $updateFields = 'user';
        
        //字段映射
        //用于表单的字段名 修改为 数据表字段
        protected $_map =  array(
            'xingming'=>'user',
            'youxiang'=>'email',
        );
        //字段验证
        //验证规则
        //array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        //array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        //......
        //)
        
        protected $_validate=array(
            /*
            //ThinkPHP 提供了九种自动验证内置方案，具体如下：
            //内置验证require，不得为空的用法
            array('user', 'require', '用户不得为空！'),
            //内置验证email，合法的邮箱格式
            array('email', 'email', '邮箱格式不合法！'),
            //内置验证url，验证网址是否合法
            array('url', 'url', 'URL 路径不合法！'),
            //内置验证currency，验证是否为货币
            array('currency', 'currency', '货币格式不正确！'),
            //内置验证zip，验证是否为六位整数邮政编码
            array('zip', 'zip', '邮政编码格式不正确！'),
            //内置验证number，验证是否为正整数
            array('user', number, '正整数格式不正确！'),
            //内置验证integer，验证是否为整数，正负均可
            array('user', 'integer', '整数格式不正确！'),
            //内置验证double，验证是否为浮点数，正负均可
            array('user', 'double', '整数格式不正确！'),
            //内置验证english，验证是纯英文
            array('user', 'english', '不是纯英文！')
            
            //附加规则regex，验证3-6位纯数字 
            array('user', '/^\d{3,6}$/', '不是 3-6 位纯正数字', 0, 'regex'),
            //附加规则equal，验证是否和指定值('李炎恢')相等 
            array('user', '李炎恢', '值不对等', 0, 'equal'),
            //附加规则notequal，验证是否与指定值不等
            array('user', '李炎恢', '值不能相等', 0, 'notequal'),
            //附加规则confirm，验证两条字段是否相同 用于密码和密码确认 验证两个字段 user 和 name
            array('user', 'name', '两个用户名对比不同！',0,'confirm'),
            //附加规则in，某个范围，可以是数组或逗号分割的字符串
            array('user',  array(1,2,3), '不在指定范围', 0, 'in'),
            array('user', '张三,李四,王五', '不在指定范围', 0, 'in'),
            //附加规则in，某个范围，可以是数组或逗号分割的字符串
            array('user',  array(1,2,3), '不在指定范围', 0, 'in'),
            array('user', '张三,李四,王五', '不在指定范围', 0, 'in'),
            //附加规则notin，某个范围，可以是数组或逗号分割的字符串
            array('user',  array(1,2,3), '不得在指定范围', 0, 'notin'),
            array('user', '张三,李四,王五', '不得在指定范围', 0, 'notin'),
            //附加规则length，验证长度或数字范围
            array('user', '3', '不得小于 3 位', 0, 'length'),
            array('user', '3,5', '不得小于 3 位，不得大于 5 位', 0, 'length'),
            //附加规则between，验证某个范围，数字或逗号字符串
            array('user',  array(3,5), '必须是 3-5 之间的数字', 0, 'between'),
            array('user', '3,5', '必须是 3-5 之间的数字', 0, 'between'),
            //附加规则notbetween，验证某个范围，数字或逗号字符串
            array('user',  array(3,5), '必须不是 3-5 之间的数字', 0, 'notbetween'),
            array('user', '3,5', '必须不是 3-5 之间的数字', 0, 'notbetween'),
            //附加规则expire，设置有效期范围，必须是表单提交有效，可以是时间戳
            array('user', '2014-1-10,2015-10-10', '时间已过期', 0, 'expire'),
            //附加规则ip_deny，IP禁止列表
            array('user', '127.0.0.1', '当钱 IP 被禁止', 0, 'ip_deny'),
            //附加规则ip_allow，IP允许列表
            array('user', '127.0.0.1', '当前 IP 没有被允许', 0, 'ip_allow'),
            
            //附加规则callback，回调验证
            array('user', 'checkLength', '用户名必须在 3-5 位', 0, 'callback', 3,array(3,5)),
            
            //附加规则function，函数验证
            array('user', 'checkLength', '用户名必须在 3-5 位', 0, 'function', 3,array(3,5)),
            //在 Common 文件夹下的 Common 文件夹建立 function.php 文件，会自动加载
            //
            //function checkLength($str,$min,$max) {
            //    preg_match_all("/./", $str, $matches);
            //    $len = count($matches[0]);
            //     if ($len < $min || $len > $max) {
            //         return false;
            //    }else {
            //         return true;
            //    }
            //}
             * 
             */
            array('email', 'email', '邮箱格式不合法！'),
            array('user', 'checkLength', '用户名必须在 3-5 位', 0, 'callback', 3,array(3,5)),
            
        );
        //如果有多个字段都包含错误，默认只显示一个错误。如果想显示全部错误，可以设置属性：
        //批量验证
         protected $patchValidate = true;
         
        //回调方法 $str 是传递过来的数据    $min:3 $max:5
        protected function checkLength($str,$min,$max) {
            preg_match_all("/./", $str, $matches);
            $len = count($matches[0]);
            if ($len < $min || $len > $max) {
                 return false;
            } else {
                 return true;
            }
        }
        
         
}