<?php
namespace Home\Controller;
use Think\Controller;
//use Think\Model;
use Home\Model\UserModel;
class UserController extends Controller {
    public function index(){
        $this->show('前台 User控制器 index方法');
    }
    public function test($user,$pass){
        $this->show('前台 User控制器 test方法<br/>user:'.$user.'<br/>pass:'.$pass);
    }
    public function model(){
    	echo '前台 User控制器 model';

    	//1-使用Model基类方法 实例化Model类，传一个数据表名  
    	//如果传了第三个参数(数据库信息) 这里可以连接数据库 就不需要用config.php中的数据库配置了
    	//Model(['模型名'],['数据表前缀'],['数据库连接信息']);
    	//$user = new Model('User','think_','mysql://root@localhost/thinkphp');

    	//2-使用M() 可以不用导入命名空间 use Think\Model; 调用的是Model
    	 //$user = M('User');

    	//3.模型类UserModel
    	//$user = new UserModel();

    	//4.D() 调用的是UserModel
    	//$user = D('User');

    	//5.前台Home模块调用后台Admin模块的Model
    	//$user = D('Admin/User');

    	//打印出所有数据
		//var_dump($user->select());

    	//6.用原生sql语句
        //$user = M(); //或者new Model();空基类
		// var_dump($user->query("SELECT * FROM think_user WHERE user='蜡笔小新'"));

    	//7.查看缓存字段 用M('User')
  		//$user = M('User');
		// var_dump($user->getDbFields());

    	//8.手动缓存字段
    	$user = D('User');
    	var_dump($user->getDbFields());
    	 

    	//显示变量结构
    	//var_dump($user);

    	

    }
}