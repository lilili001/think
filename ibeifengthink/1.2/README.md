=====================================  1.0.thinkphp 的安装和配置  ==================================

	目录结构：

	1.Application:应用程序的目录, 当程序开发时自动生成，默认为空；
	  相当于一个网站。可以做多个网站 Application1 Application2 Application3 Admin等等
	  里面的index.html 是为了防止 别人访问目录结构

	2.Public:    公共资源存放目录

	3.ThinkPhp:  框架核心包

	4..htaccess: 配置文件，一般用于伪静态

	5.index.php: 单一程序入口

	-----------------------------------------------------------------------------------
	注意事项：入口文件 index.php

	//定义应用目录
	define('APP_PATH','./Application/');

	如果想按照自己的意愿设置应用目录名称，可以修改成这样：
	//删掉Application目录  修改应用目录 前台刷新 
	define('APP_PATH','./Weibo/');

	------------------------------------
	// 引入ThinkPHP入口文件
	require './ThinkPHP/ThinkPHP.php';

	//ThinkPHP 目录名称也可以更改
	require './Think/ThinkPHP.php';

	------------------------------------
	自动生成：
	common: 公共模块
	Home:主程序模块
	Runtime:运行时模块

	------------------------------------
	一般的网站开发两个站就可以了 前台Weibo  后台Admin
	两个入口：index.php Admin.php
	复制index.php 重命名为 Admin.php 修改应用目录 前台访问 Admin默认会自动生成文件
	define('APP_PATH','./Admin/');

	在自动生成的目录中，为了防止访问到应用程序的目录结构，会创建个index.html文
	件。当然，你也可以自行设置。
	//设定目录生成的文件
	define('DIR_SECURE_FILENAME', 'default.html');

	//设置目录页面内容
	define('DIR_SECURE_CONTENT', '目录禁止');

	一般来说，第一次生成应用程序，应该加上静态主页防止目录结构暴露。但如果你的环
	境非常安全，可以关闭生成静态主页。
	//禁止目录主页生成
	define('BUILD_DIR_SECURE',  false);

	注意：设置入口文件例如 admin.php 后 需删掉对应的应用目录,例如Admin 然后前台刷新 会自动生产

	---------------------------------------------------------------------------------------------
	控制器访问: Home 主模块/控制器/方法名 
	Home/Controller/IndexController.class.php

	控制器路径在： Weibo/Home/Controller 下， 有一个默认的控制器 IndexController.class.php文件。
	控制器类的命名方式：控制器名（驼峰式，首字母大写）+Controller
	控制器文件的命名方式：类名+class.php
	创建一个控制器需要三个部分：1.设置命名空间；2.导入命名空间；3.控制器类

	//设置命名空间
	 namespace Home\Controller; //设置命名空间，就是当前目录
	//导入命名空间
	 use Think\Controller; //继承父类用到Controller类
	//控制器类
	 class IndexController extends Controller {
		 public function index() {
		//...
		}
	}

	除了首页直接访问：http://www1.webphp-lc.com/mvc-imook/weibo_v/1.0，如果想用完整形式则是：
	http://www1.webphp-lc.com/mvc-imook/weibo_v/1.0/Home/Index/index

	在这里的完整URL中，index.php是单一入口文件，Home是主模块，Index是控制器名，
	index是控制器里的一个方法。注意：这里大小写区分，因为在Linux是区分大小写的。
	如果创建一个test()方法，那么URL就是：
	http://www1.webphp-lc.com/mvc-imook/weibo_v/1.0/index.php/Home/Index/test

	如果想创建一个User模块，那么可以创建一个User控制器。
	 namespace Home\Controller;
	 use Think\Controller;
	 class UserController s extends Controller {
		 public function index() {
		 echo 'user';
		}
	}
	URL访问路径为：http://www1.webphp-lc.com/mvc-imook/weibo_v/1.0/Home/User/index

=====================================  1.1.模块化和url模式  ========================================
 1). 模块化
 	 将Admin 放入Weibo中 因为 Weibo是一个站
 	 -删掉Weibo 和Admin 这两个文件夹 并且删掉admin.php入口文件  
	 -复制Home文件夹 重命名为Admin
	 -修改Admin/Controller/IndexController.class.php中的命名空间为  Admin\Controlle
	 -前台访问Admin   http://www1.webphp-lc.com/mvc-imook/weibo_v/1.1/Admin

 2).配置文件设置
	 	Weibo/Common/Conf/config.php

	 	Admin  Home Common Runtime 都是模块

	 	----
	 	有一些模块我们希望是被用户禁止访问的，比如 Common 和 Runtime 模块。当然，框架已经在默认就禁止访问了。
		当强行访问 Common 模块的时候，会提示： “无法加载模块:Common”的错误信息。

		//禁止访问模块
		'MODULE_DENY_LIST' => array('Admin','Runtime','Common'),

		//允许访问的模块，设置了，就必须写全，漏写的将无法访问
		'MODULE_ALLOW_LIST' => array('Home','Admin'),

		如果有多个访问模块， 那么在默认 URL 访问的时候， 应该有一个首选访问。 
		默认是 Home，想设置 Admin 为默认，可以这么设置：

		//设置默认起始模块
		'DEFAULT_MODULE' => 'Admin',

		应用项目如果只允许单个模块的话， 可以设置拒绝多个模块， 这样创建更多的模块将失效。
		//单模块设置
		'MULTI_MODULE' => false,

		----
		有时，你会觉得 index.php/Admin 这样很麻烦。你可能想直接 admin.php 就代表后
		台就方便很多，那么可以使用多入口设置。
		这里的多入口和上一节多个应用项目不同，而是通过 admin.php 访问 Weibo 目录下的
		Admin 模块。将 index.php 复制出来改成 admin.php，然后添加如下代码：

		//默认指向Admin模块
		$_GET['m'] = 'Admin';
		
		访问前台：http://www1.webphp-lc.com/mvc-imook/weibo_v/1.1/index.php
		访问后台：http://www1.webphp-lc.com/mvc-imook/weibo_v/1.1/admin.php

		//默认指向Index控制器
		$_GET['c'] = 'Index';

 3).url模式
	 	ThinkPHP的URL模式有四种，默认是PATHINFO模式，其他三种分别为：普通模式、REWRITE和兼容模式

		域名+模块+控制器+操作

	 	//PATHINFO模式 http://www1.webphp-lc.com/mvc-imook/weibo_v/1.1/Home/User/test/user/lee/pass/123

	 	//用户密码传参 UserController.class.php
		class UserController s extends Controller {
		   public function test($user, $pass) {
			 echo 'user:'.$user.'<br />pass:'.$pass;
		   }
		}

		PATHINFO 模式下默认的分隔符是/，我们可以设置为你想要的，比如：_
		//设置键值对分隔符
		'URL_PATHINFO_DEPR'=>'_',
		设置了分隔符的 URL：
		http://localhost/demo39/index.php/Home_User_test_user_Lee_pass_123

		//普通模式
		http://localhost/demo39/index.php?m=Home&c=User&a=test&user=Lee&pass=123
		在这条 URL 上，我们发现采用的就是传统的 GET 模式，m 表示模块，c 表示控制器，a表示方法，后面的表示键值对。

		普通模式的 m、c、a 可以自行设置为你习惯的键名称：
		//修改键名称
		'VAR_MODULE' => 'mm',
		'VAR_CONTROLLER' => 'cc',
		'VAR_ACTION' => 'aa',
		http://localhost/demo39/index.php?mm=Home&cc=User&aa=test&user=Lee&pass=123

		//REWRITE模式（重写模式）
		httpd.conf 配置文件中加载了 mod_rewrite.so 模块
		AllowOverride None 将 None 改为 All
		把下面的内容保存为.htaccess 文件放到应用入口文件的同级目录下
		这样，ThinkPHP 自带的.htaccess 文件就起作用了，可以过滤掉 index.php 这个字
		符串。
		<IfModule mod_rewrite.c>
			Options +FollowSymlinks
			RewriteEngine On
			RewriteCond %{REQUEST_FILENAME} !-d
			RewriteCond %{REQUEST_FILENAME} !-f
			RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
		</IfModule>

===================================== 1.2.thinkphp 模型初步 ========================================
 1).连接数据库配置：
 	//全局配置定义
	'DB_TYPE'=>'mysql', //数据库类型
	'DB_HOST'=>'localhost', //服务器地址
	'DB_NAME'=>'thinkphp', //数据库名
	'DB_USER'=>'root', //用户名
	'DB_PWD'=>'123456', //密码
	'DB_PORT'=>3306, //端口
	'DB_PREFIX'=>'think_', //数据库表前缀
 2).实例化模型
	实验文件：UserController.class.php

	连接上数据库后，我们需要从数据库里操作数据，那么就需要实例化模型类。
	在ThinkPHP 中，提供了 Model 基类处理，也可以使用 M()方法。
    
    ## 方法一：Model基类
		//控制器UserController.class.php中 实例化Model类，传一个数据表名
		$user = new Model('User');
		//显示变量结构
		var_dump($user);
		
		
		Model 基类可以传递三个参数：
		Model(['模型名'],['数据表前缀'],['数据库连接信息']);
		$user = new Model('User','think_','mysql://root:123456@localhost/thinkphp');
		这里可以连接数据库 就不需要用config.php中的数据库配置了 用于某些小地方需要用到其他数据库的情况
	
	## 方法二：M()
		使用 Model 基类还需要导入命名空间，而使用 M()方法，则不需要。调用的是Model
		//实例化Model类
		$user = M('User');
	
	## 方法三：UserModel
		除了使用 Model 基类和 M()方法， 还有一种对应数据表的模型定义， 比如： UserModel。
		这种模型类并非必须定义的，只有当存在独立的业务逻辑或者属性的时候才需要。

		为什么 UserModel 模型类没有指定任何表即可直接访问呢？因为这种模型类基本是直
		接操作数据表的，所以在命名规范上和数据表名是对应的。

		模型和数据表名对应 UserModel.class.php 对应User数据表
		UserModel 	   ---->  think_user
		UserTypeModel  ---->  think_user_type

		虽然使用模型类和数据表对应较为方便，但当有时我们需要更换表名、前缀、附加数据
		库名等，就需要一些字段定义的操作

		-在Home/Model下建立 UserModel.class.php 
		-在User控制器中调用 $user = new UserModel(); 
		 需要引入UserModel的命名空间use Home\Model\UserModel; 
		 
		 可以在UserModel.class.php中更改表 数据库
		 protected $tablePrefix = 'abc_';//换前缀
		 protected $tableName = 'abc'; //换表名
		 protected $trueTableName = 'tp_abc'; //重新定义完整的带前缀的表名
		 protected $dbName = 'tp'; //附加数据库名

	----
	如果数据库只是增删改查 使用基于Model基类的M(),因为M()不需要加载具体的模型类(例如UserModel)类，所以性能会更高
	 
	## 方法四: D()
		当然，如果有必要使用具体的模型类时，ThinkPHP 还提供了 D()方法来直接是实例化
		模型类，并且还可以免去引入命名空间等操作。
		
		D()调用的是UserModel

		//实例化UserModel类
		$user = D('User');

		----
		如何判断D()调用的是UserModel?
		A:可在UserModel中使用一个构造函数

		PS：使用 D()方法比直接使用模型类更加的智能，如果在\Home\Model\UserModel 找
			不到该模型类， 那么就会去公共模块下找\Common\Model\UserModel 去找。 如果还找不到，
			就会直接实例化基类 Model()类， 也就是等同于使用 M()方法。

		----
		如果前台想调用后台模块--跨模块调用
		$user = D('Admin/User');

	## 方法五 M() 原生sql
		有时，你可能想使用原生的 SQL 语句进行操作数据库。那么可以采用实例化空模型基类或者空 M()方法。
		//空 M()方法
		$user = M(); //或者new Model();空基类
		var_dump($user->query("SELECT * FROM think_user WHERE user='蜡笔小新'"));

	----
	字段缓存：使用M('User')方法
		在关闭调试模式的情况下，会自动缓存所有字段 Runtime/Data里会生成文件夹 _fields
		下次刷新的时候不从数据库获取，直接从缓存中获取,提高响应

		//查看字段结构 User控制器中
		var_dump($user->getDbFields());

		在关闭调试模式下，如果字段有新增或删除操作，刷新页面后 通过var_dump($user->getDbFields())查看的字段是没有变化的，删掉 Runtime/Data/_fields/.think_user.php文件 ，修改结果就会显示出来
		
		---手动设置缓存字段 在UserModel中,调用方法需使用D(),通过这种方法不会生成缓存文件,

