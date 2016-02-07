===================================== 1.0.thinkphp 的安装和配置  ==================================

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

===================================== 1.1.thinkphp模块化和url模式  ================================
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

===================================== 1.2.thinkphp 模型初步 =======================================
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

===================================== 1.3.thinkphp数据库查询 ===================================
	本节课，我们将学习 ThinkPHP 中对于 SQL 查询语句，包含了基本的查询方式、表达
	式查询、快捷查询、区间查询、组合查询、统计查询、SQL 查询、动态查询和子查询。

	ThinkPHP 提供了三种基本的查询方式：字符串条件查询、索引数组条件查询和对象条
	件查询。在大多数情况下，推荐使用索引数组和对象方式作为查询条件，因为会更加安全

	/**查询方式**/
       1.字符串作为条件查询
        $user = M('User');
        var_dump($user->where('id=1 AND user="蜡笔小新"')->select());
        最终生成的 SQL 语句
        SELECT * FROM 'think_user' WHERE ( id=1 AND user="蜡笔小新" )

       2.使用索引数组作为查询条件
         索引数组作为条件查询
         $user = M('User');
         $condition['id'] = 1;
         $condition['user'] = '蜡笔小新';
         $condition['_logic'] = 'AND';
         var_dump($user->where($condition)->select());
         最终生成的 SQL 语句
         SELECT * FROM 'think_user' WHERE ( 'id' = 1 ) AND ( 'user' = '蜡笔小新' )
         PS：索引数组查询的默认逻辑关系是 AND，如果想改变为 OR，可以使用_logic 定义查询逻辑。

       3.使用对象方式来查询
        对象作为条件查询
        $user = M('User');




        $condition = new \stdClass();
        $condition->id = 1;
        $condition->user = '蜡笔小新';
        $condition->_logic='AND';
        var_dump($user->where($condition)->select());
        最终生成的 SQL 语句
        SELECT * FROM 'think_user' WHERE ( 'id' = 1 ) AND ( 'user' = '蜡笔小新' )
        
      PS：stdClass 类是 PHP 内置的类，可以理解为一个空类，在这里可以理解为把条件的
          字段作为成员保存到 stdClass 类里。而这里的'\'是将命名空间设置为根目录，否则会导
          致当前目录找不到此类。 使用对象和数组查询， 效果是一样的， 可以互换。在大多数情况下，
          ThinkPHP 推荐使用数组形式更加高效。
            
        $user = M('User');
        $map['id'] =  array('eq', 1);
        echo '<pre>'.print_r($user->where($map)->select(),1).'</pre>';
        //var_dump( $user->where($map)->select()  );
        生成sql:SELECT * FROM 'think_user' WHERE 'id' = 1

        /NEQ：不等于(<>)
		$map['id'] =  array('neq', 1);
		//NEQ：不等于(<>)
		$map['id'] =  array('neq', 1); //where 为 id<>1
		//GT：大于(>)
		$map['id'] =  array('gt', 1); //where 为 id>1
		//EGT：大于等于(>=)
		$map['id'] =  array('egt', 1); //where 为 id>=1
		//LT：小于(<)
		$map['id'] =  array('lt', 1); //where 为 id<1
		//ELT：小于等于(<=)
		$map['id'] =  array('elt', 1); //where 为 id<=1
		//[NOT]LIKE：模糊查询
		$map['user'] =  array('like', '%小%'); //where 为 like %小%
		//[NOT]LIKE：模糊查询
		$map['user'] =  array('notlike', '%小%'); //where 为 not like %小%
		//[NOT]LIKE：模糊查询的数组方式
		$map['user'] =  array('like',  array('%小%', '%蜡%'), 'AND');
		//生成的 SQL
		SELECT * FROM `think_user` WHERE ( (`user` LIKE '%小%' AND `user`
		LIKE '%蜡%') )
		//[NOT] BETWEEN：区间查询
		$map['id'] =  array('between','1,3');
		//where 为`id` BETWEEN '1' AND '2'
		//同上等效
		$map['id'] =  array('between',array('1','3'));
		//[NOT] BETWEEN：区间查询
		$map['id'] =  array('not between','1,3');
		//where 为`id` NOT BETWEEN '1' AND '2'
		//[NOT] IN：区间查询
		$map['id'] =  array('in','1,2,4');
		//where 为`id` IN ('1','2','4')
		//[NOT] IN：区间查询
		$map['id'] =  array('not in','1,2,4');
		//where 为`id` NOT IN ('1','2','4')
		//EXP：自定义
		$map['id'] =  array('exp','in (1,2,4)');
		//where 为`id` NOT IN ('1','2','4')
		PS：使用 exp 自定义在第二个参数直接写 where 语句即可
		//EXP：自定义增加 OR 语句
		$map['id'] =  array('exp', '=1');
		$map['user'] =  array('exp', '="蜡笔小新"');
		$map['_logic'] = 'OR';
		//WHERE 为( (`id` =1) ) OR ( (`user` ="蜡笔小新") )
		三． 快捷查询
		快捷查询方式是一种多字段查询的简化写法， 在多个字段之间用'|'隔开表示OR， 用'&'
		隔开表示 AND。
		1.不同字段相同查询条件
		//使用相同查询条件
		$user = M('User');
		$map['user|eemail'] = 'a'; //'|'换成'&'变成AND
		var_dump($user->where($map)->select());
		2.不同字段不同查询条件
		//使用不同查询条件
		$user = M('User');
		$map['id&user'] =  array(1,'蜡笔小新','_multi'=> true);
		var_dump($user->where($map)->select());
		PS：设置'_multi'为 true，是为了让 id 对应 1，让 user 对应'蜡笔小新'，否则就
		会出现 id 对应了 1 还要对应'蜡笔小新'的情况。而且，这设置要在放在数组最后。
		//支持使用表达式结合快捷查询
		$user = M('User');
		$map['id&user'] =  array( array('gt', 0),'蜡笔小新','_multi'=> true);
		var_dump($user->where($map)->select());
		四． 区间查询
		ThinkPHP 支持对某个字段的区间查询。
		//区间查询
		$user = M('User');
		$map['id'] =  array( array('gt', 1),  array('lt', 4));
		var_dump($user->where($map)->select());
		//第三个参数设置逻辑OR
		$user = M('User');
		$map['id'] =  array( array('gt', 1),  array('lt', 4), 'OR');
		var_dump($user->where($map)->select());
		五． 组合查询
		组合查询是基于索引数组查询方式的一个扩展性查询，添加了字符串查询(_string)、复
		合查询(_complex)、请求字符串查询(_query)，由于采用的是索引数组，重复的会被覆盖。
		//字符串查询(_string)
		$user = M('User');
		$map['id'] =  array('eq', 1);
		$map['_string'] ='user="蜡笔小新" AND email="xiaoxin@163.com"';
		var_dump($user->where($map)->select());
		//请求字符串查询(_query)
		$user = M('User');
		$map['id'] =  array('eq', 1);
		$map['_query'] ='user=蜡笔小新&email=xiaoxin@163.com&_logic=OR';
		var_dump($user->where($map)->select());
		PS：这种方式是 URL 方式，不需要加引号。
		//复合查询(_complex)
		$user = M('User');
		$where['user'] =  array('like', '%小%');
		$where['id'] = 1;
		$where['_logic'] = 'OR';
		$map['_complex'] = $where;
		$map['id'] = 3;
		$map['_logic'] = 'OR';
		var_dump($user->where($map)->select());
		PS：复合查询可以构建更加复杂的查询，这里 id=1 或者 id=3 可以构建实现。
		六． 统计查询
		ThinkPHP 提供了一些数据统计查询的方法。
		//数据总条数
		$user = M('User');
		var_dump($user->count());
		//字段总条数，遇到NULL不统计
		$user = M('User');
		var_dump($user->count('email'));
		//最大值
		$user = M('User');
		var_dump($user->max('id'));
		//最小值
		$user = M('User');
		var_dump($user->min('id'));
		//平均值
		$user = M('User');
		var_dump($user->avg('id'));
		//求总和
		$user = M('User');
		var_dump($user->sum('id'));
		七． 动态查询
		借助 PHP5 语言的特性，ThinkPHP 实现了动态查询。
		1.getBy 动态查询
		//查找email=xiaoin@163.com的数据
		$user = M('User');
		var_dump($user->getByemail('xiaoxin@163.com'));
		2.getFieldBy 动态查询
		//通过user得到相对应id值
		$user = M('User');
		var_dump($user->getFieldByUser('路飞', 'id'));
		八．L SQL  查询
		ThinkPHP 支持原生 SQL 查询。
		1.query 读取
		//查询结果集，如果采用分布式读写分离，则始终在读服务器执行
		$user = M('User');
		var_dump($user->query('SELECT * FROM think_user')); 
		2.execute写入
		//更新和写入，如果采用分布式读写分离，则始终在写服务器执行
		$user = M('User');
		var_dump($user->execute('UPDATE think_user set user="蜡笔大新" WHERE
		id=1'));
		PS：由于子查询用了不少连贯操作，我们会在连贯操作讲解。

		一． 连贯入门
		连贯操作使用起来非常简单， 比如查找到 id 为 1,2,3,4 中按照创建时间的倒序的前两
		位。
		//连贯操作入门
		$user = M('User');
		var_dump($user->where('id in (1,2,3,4)')->order('date
		DESC')->limit(2)->select());
		PS：这里的 where、order 和 limit 方法都是连贯操作方法，所以它们都能返回$user
		本身，可以互换位置。而 select 方法不是连贯方法，需要放在最后，用以显示数据集。
		//数组操作
		$user = M('User');
		var_dump($user->select( array('where'=>'id in (1,2,3,4)', 'limit'=>'2',
		'order'=>'date DESC')));
		//CURD处理，CURD会在专门章节讲解
		$user = M('User');
		var_dump($user->where('id=1')->find());
		var_dump($user->where('id=7')->delete());
		
		二． 连贯方法
		1.where
		where 方法支持字符串条件、数组条件（推荐用法）和多次调用。
		//字符串方式
		$user = M('User');
		var_dump($user->where('id=1')->select());
		//索引数组方式
		$user = M('User');
		$map['id'] = 1; //使用表达式array('eq', 1);
		var_dump($user->where($map)->select());

		$user = M('User');
		$map['id'] =  array('eq', 1);
		var_dump($user->where($map)->where('user="蜡笔小新"')->select());
		2.order
		order 用于对结果集排序。
		//倒序
		$user = M('User');
		$map['id'] =  array('eq', 1);
		var_dump($user->order('id desc')->select()); //正序默认或 ASC
		//第二排序
		var_dump($user->order('id desc,email desc')->select());
		PS：先按 id 倒序，再按 email 倒序
		//数组形式防止字段和mysql关键字冲突
		$user = M('User');
		$map['id'] =  array('eq', 1);
		var_dump($user->order( array('id'=>'DESC'))->select());
		3.feild
		feild 方法可以返回或操作字段，可以用于查询和写入操作。
		//只显示id和user两个字段
		$user = M('User');
		var_dump($user->field('id, user')->select());
		//使用SQL函数和别名
		$user = M('User');
		var_dump($user->field('SUM(id) as count, user')->select());
		//使用数组参数结合SQL函数
		$user = M('User');
		var_dump($user->field( array('id','LEFT(user,3)'=>'left_user'))->sele
		ct());
		//获取所有字段
		$user = M('User');
		var_dump($user->field()->select()); //可以传入*号，或者省略方法
		//用于写入
		$user = M('User');
		$user->field('user,email')->create(); //CURD 将在专门的章节学习
		3.limit
		limit 方法主要用于指定查询和操作的数量。
		//限制结果集数量
		$user = M('User');
		var_dump($user->limit(2)->select());
		//分页查询
		$user = M('User');
		var_dump($user->limit(0,2)->select()); //2,2、,4,2
		4.page
		page 方法完全用于分页查询。
		//page分页
		$user = M('User');
		var_dump($user->page(1,2)->select()); //2,2、3,2
		5.table
		table 方法用于数据表操作，主要是切换数据表或多表操作。
		//切换数据表
		$user = M('User');
		var_dump($user->table('think_info')->select());
		//获取简化表名
		$user = M('User');
		var_dump($user->table('__USER__')->select()); //__INFO__尚可
		//多表查询
		$user = M('User');
		var_dump($user->field('a.id,b.id')->table('__USER__ a,__INFO__
		b')->select());
		//多表查询，使用数组形式避免关键字冲突
		$user = M('User');
		var_dump($user->field('a.id,b.id')->table( array('think_user'=>'a',
		'think_info'=>'b'))->select());
		6.alias
		alias 用于设置数据表别名
		//设置别名
		$user = M('User');
		var_dump($user->alias('a')->select());
		7.group
		group 方法通常用于对结合函数统计的结果集分组。
		//分组统计
		$user = M('User');
		var_dump($user->field('user,max(id)')->group('id')->select());
		PS：group 会在 mysql 部分单独探讨。
		8.having
		having 方法一般用于配合 group 方法完成从分组的结果中再筛选数据。
		//分组统计结合having
		$user = M('User');
		var_dump($user->field('user,max(id)')->group('id')->having('id>2')->
		select());
		PS：having 会在 mysql 部分单独探讨。
		9.comment
		comment 方法用于对 SQL 语句进行注释
		//SQL注释
		$user = M('User');
		var_dump($user->comment('所有用户')->select());
		10.join
		join 方法用于多表的连接查询。
		//JOIN多表关联，默认是INNER JOIN
		$user = M('User');
		var_dump($user->join('think_user ON think_info.id =
		think_user.id')->select()); //__USER__和__INFO__代替
		//RIGHT、LEFT、FULL
		var_dump($user->join('think_user ON think_info.id =
		think_user.id','RIGHT')->select());
		PS：join 会在 mysql 部分单独探讨。
		11.union
		union 方法用于合并多个 SELECT 的结果集
		//合并多个SELECT结果集
		$user = M('User');
		var_dump($user->union("SELECT * FROM think_info")->select());
		PS：union 会在 mysql 部分单独探讨。
		12.distinct
		distinct 方法用于返回唯一不同的值
		//返回不重复的列
		$user = M('User');
		var_dump($user->distinct( true)->field('user')->select());
		13.cache
		cache 用于查询缓存操作
		//查询缓存，第二次读取缓存内容
		$user = M('User');
		var_dump($user->cache( true)->select());
		PS：第一次查询数据库，第二次查询相同的内容直接调用缓存，不用再查询数据库。
		更多关于 cache 和缓存的使用方法，我们将在缓存那节详细探讨。
		
		class UserModel s extends Model {
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
		}
		命名范围支持的属性有：where、field、order、table、limit、page、having、
		group、lock、distinct、cache。
		//调用命名范围
		$user = D('User');
		var_dump($user->scope('sql2')->select());
		//支持调用多个scope方法
		$user = D('User');
		var_dump($user->scope('sql1')->scope('sql2')->select());
		//default默认
		$user = D('User');
		var_dump($user->scope()->select()); //传递 default 也行
		PS：如果传递不存在的命名范围，则忽略。
		//对命名范围的SQL进行调整
		$user = D('User');
		var_dump($user->scope('sql2',  array('limit'=>4))->select());
		//直接覆盖命名范围
		$user = D('User');
		var_dump($user->scope( array('where'=>1,'order'=>'date
		DESC','limit'=>2))->select());
		//直接用命名范围名调用
		$user = D('User');
		var_dump($user->sql2()->select());


===================================== 1.4 CURD  ========================================
 
   一．连贯入门
	 连贯操作使用起来非常简单， 比如查找到 id 为 1,2,3,4 中按照创建时间的倒序的前两位。
	 //连贯操作入门
	 $user = M('User');
	 var_dump($user->where('id in (1,2,3,4)')->order('date DESC')->limit(2)->select());
	 PS：这里的 where、order 和 limit 方法都是连贯操作方法，所以它们都能返回$user
	 本身，可以互换位置。而 select 方法不是连贯方法，需要放在最后，用以显示数据集。
         
         在根目录建立index.html
            内容：
            <meta charset="UTF-8">
            <form method="post" action="">
                <p>用户：<input type="text" name="user"/></p>
                <p>邮箱：<input type="text" name="email"/></p>
                <p>生日：<input type="text" name="birthday"/></p>
                <p>用户：<input type="submit" value="提交"/></p>
            </form>
            
            在User控制器中建立新方法 create
            /根据表单提交的POST数据，创建数据对象
            //PS：这里 create()方法就是数据创建，数据的结果就是提交的 POST 数据的键值对。
            //特别注意的是：提交过来的字段和数据表字段是对应的，否则无法解析。
            var_dump($user->create());

            //create()方法可创建数据
            //方法一：
            //创建或者叫接收从表单提交过来的数据,类似Post方法。前提是 表单的域需要和数据库表自丢按对应。
            //查看数据结果就是 action的地址http://www1.webphp-lc.com/mvc-imook/weibo_v/1.4/Home/User/create
            //echo '<pre>'.print_r($user->create(),1).'</pre>';

            //方法二：手工创建数据
            //该方法不需要表单提交 直接刷新页面即可见创建的数据结果
            $data['user']='樱桃小丸子';
            $data['email']='yingtao@qq.com';
            echo '<pre>'.print_r($user->create($data),1).'</pre>';
            
            //方法三：$_POST接收数据
            $data['user']= $_POST['user'];
            $data['email']=$_POST['email'];
            $data['date']=date('Y-m-d H:i:s');//时间不用提交过来 
            echo '<pre>'.print_r($user->create($data),1).'</pre>';
            
            //方法四：对象形式获取数据
            $data = new \stdClass();
            $data->user = $_POST['user'];
            $data->email =$_POST['email'];
            $data->date =date('Y-m-d H:i:s');//时间不用提交过来 
            echo '<pre>'.print_r($user->create($data),1).'</pre>';

            //方法五：GET获取数据
            表单提交默认是POST方式的 下面改成GET方式提交 当然html中的表单提交方法也需要改成GET
            echo '<pre>'.print_r($user->create($_GET),1).'</pre>';
            
            //------限制输出字段-------------------------------
        
            //create()结合field 只显示所需要的字段 起对提交过来的数据进行过滤作用
            //echo '<pre>'.print_r($user->field('user')->create(),1).'</pre>';

            //模型内进行过滤字段 
            /*UserModel.class.php 
            protected $insertFields = 'user';
            protected $updateFields = 'user';
            ----
            create()方法可以配合连贯操作配合数据创建，支持的连贯操作有：
            1.field，用于定义合法的字段；
            2.validate，用于数据自动验证；
            3.auto，用于数据自动完成；
            4.token，用于令牌验证。
            
            //新增一条手动添加的数据 $user->add()
            $user = M('User');
            $data['user']='annays';
            $data['email']='anays@126.com';
            $data['date']=date('Y-m-s H:i:s');
            $user->add($data);

            //新增表单提交的数据
            $user = M('User');
            $data = $user->create();//将表单提交过来的数据对象赋给$data 这样操作的原因是 时间不能提交 但是可以设置 所以先创建对象$data
            $data['date']=date('Y-m-s H:i:s');
            $user->add($data);
            
            add()方法支持的连贯操作有：
            1.table，定义数据表名称；
            2.data，指定要写入的数据对象；
            3.field，定义要写入的字段；
            4.relation，关联查询；
            5.validate，数据自动验证；
            6.auto，数据自动完成；
            7.filter，数据过滤；
            8.scope*，命名范围；
            9.bind，数据绑定操作；
            10.token，令牌验证；
            11.comment，SQL 注释；
            
            //add也支持连贯操作 例如data
            //$user = M('User');
            //$data = $user->create();//将表单提交过来的数据对象赋给$data 这样操作的原因是 时间不能提交 但是可以设置 所以先创建对象$data
            //$data['date']=date('Y-m-s H:i:s');
            //$user->data($data)->add();

            //连贯方法date可以支持字符串形式的键值对 只有data()方法可以 直接刷新页面 然后查看数据库
            $user = M('User');
            $data='user=星矢&email=xingshi@163.com&date='.date('Y-m-s H:i:s');
            $user->data($data)->add();
            
            三． 数据读取
            在之前的课程中，我们已经大量使用了数据读取的功能，比如 select()方法。结合各
            种连贯方法可以实现数据读取的不同要求，支持连贯的方法有:
            1.where，查询或更新条件；
            2.table，要操作的数据表名称；
            3.alias，数据表别名；
            4.field，查询字段；
            5.order，结果排序；
            6.group，查询分组；
            7.having，分组再查询；
            8.join，多表链接查询；
            9.union，合并 SELECT；
            10.distinct，取唯一值；
            11.lock，锁；
            12.cache，缓存；
            13.relation，关联查询；
            14.result，数据转换；
            15.scope，命名范围；
            16.bind，数据绑定操作；
            17.comment，SQL 注释。
            
            //数据读取
                public function select(){
                    $user =M('User');
                    //echo '<pre>'.print_r($user->select(),1).'</pre>';
                    //读取第一条
                    //echo '<pre>'.print_r($user->find(),1).'</pre>';

                    //获取第一条user字段的值
                    //echo '<pre>'.print_r($user->getField('user'),1).'</pre>';

                    //获取所有user字段的值
                    //echo '<pre>'.print_r($user->getField('user',true),1).'</pre>';
                    //SELECT `user` FROM `think_user`

                    //传递多个字段，获取所有 重复的被屏蔽了
                    //echo '<pre>'.print_r($user->getField('user,email'),1).'</pre>';

                    //id冒号分隔
                    //echo '<pre>'.print_r($user->getField('id,user,email',':'),1).'</pre>';//id是主键

                    //限制2条数据
                    //echo '<pre>'.print_r($user->getField('id,user,email',2),1).'</pre>';
                    //SELECT `id`,`user`,`email` FROM `think_user` LIMIT 2   
                }
                
                四． 数据更新
                数据更新使用的方法是 save()方法，主要是对数据的修改操作。
                //修改第一条数据
                $user = M('User');
                $data['user'] = '蜡笔大新';
                $data['email'] = 'daxin@qq.com';
                $map['id'] = 1;
                $user->where($map)->save($data); //成功后返回 1，否则 0
                //默认主键为条件
                $user = M('User');
                $data['id'] = 1;
                $data['user'] = '蜡笔小新';
                $data['email'] = 'xiaoxin@163.com';
                $user->save($data);
                数据更新的 save()方法支持的连贯方法有：
                1.where，查询或更新条件；
                2.table，要操作的数据表名称；
                3.alias，数据表别名；
                4.field，查询字段；
                5.order，结果排序；
                6.lock，锁；
                7.relation，关联查询；
                8.scope，命名范围；
                9.bind，数据绑定操作；
                10.comment，SQL 注释。

                $user=M('User');
        
                /*修改第一条数据
                $data['user']='蜡笔大新';
                $data['email']='labidaxin@qq.com';
                $map['id']=1;//用于where
                $user->where($map)->save($data);

                //默认主键为条件

                $data['id'] = 1;//这种就不需要$map 会自动判断主键
                $data['user'] = '蜡笔老新';
                $data['email'] = 'xiaoxinold@163.com';
                $user->save($data); 

                //通过表单提交修改数据 需要在表单里设置一个隐藏域<input type="hidden" name="id" value="1"> 用来设置where
                //UPDATE `think_user` SET `user`='rose',`email`='rose@163.com' WHERE `id` = 1

                $user->create();
                $user->save();//返回值1 、 0


                //修改某一个值
                $map['id'] = 1;
                $user->where($map)->setField('user', '蜡笔大新');

                //统计累计，累加 
                $map['id'] = 1;
                $user->where($map)->setInc('count',1); //累加，setDec 累减 
                //每次刷新 http://www1.webphp-lc.com/mvc-imook/weibo_v/1.4/Home/User/save id为1的count都会自增
                //UPDATE `think_user` SET `count`=count+1 WHERE `id` = 1

                //累减
                $user->where($map)->setDec('count',1);
                //UPDATE `think_user` SET `count`=count-1 WHERE `id` = 1
                
                //数据删除
                public function delete(){
                    //直接删除主键(id=17)
                    $user = M('User');
                    /*
                    $user->delete(23);

                    //根据ID来删除
                    $map['id'] = 26;
                    $user->where($map)->delete();
                    //DELETE FROM `think_user` WHERE `id` = 26

                    //批量删除多个
                    $user->delete('1,3,5');

                    //删除count为0且按时间倒序的前五个
                    $map['count'] = 0;
                    $user->where($map)->order(array('date'=>'DESC'))->limit(2)->delete();
                    //DELETE FROM `think_user` WHERE `count` = 0 ORDER BY `date` DESC LIMIT 2

                    //删除所有数据
                     echo $user->where('1')->delete(); //1代表true 删除成功之后会返回1
                     * 
                     * delete()方法支持的连贯操作有：
                        1.where，查询或更新条件；
                        2.table，要操作的数据表名称；
                        3.alias，数据表别名；
                        4.order，结果排序；
                        5.lock，锁；
                        6.relation，关联查询；
                        7.scope，命名范围；
                        8.bind，数据绑定操作；
                        9.comment，SQL 注释。

                     * 
                     */
                }
        //activeRecord
            //ActiveReocrd  模式
            //这种模式最大的特别就是简化了 CURD 的操作，并且采用对象化的操作方式，便于使用和理解。
            public function ar(){
                $user = M('User');
                /*
                 * 添加一条数据
                $user->user = '火影忍者';
                $user->email = 'huoyin@qq.com';
                $user->date = date('Y-m-d H:i:s');
                $user->add();
                INSERT INTO `think_user` (`user`,`email`,`date`) VALUES ('火影忍者','huoyin@qq.com','2015-10-05 14:24:43');

                 //结合create 这个不需要设置html的主键
                $user->create();
                $user->date = date('Y-m-d H:i:s');
                $user->add();

                //找到主键为4的值
                echo '<pre>'.print_r($user->find(4),1).'</pre>';

                //查找user=蜡笔小新的记录
                echo '<pre>'.print_r($user->getByUser('蜡笔大新'),1).'</pre>';
                echo $user->email; //输出对应"蜡笔大新" 的 email

                //通过主键查询多个
                echo '<pre>'.print_r($user->select('1,2,3'),1).'</pre>';
                //SELECT * FROM `think_user` WHERE `id` IN ('1','2','3')

                //修改一条数据
                $user->find(1);
                $user->user='蜡笔老新';
                $user->email='labilaoxin@qq.com';
                $user->save();
                //SELECT * FROM `think_user` WHERE `id` = 1 LIMIT 1 
                //UPDATE `think_user` SET `user`='蜡笔老新',`email`='labilaoxin@qq.com',`date`='2015-09-05 15:42:00',`count`='2' WHERE `id` = 1

                //删除当前找到的数据
                $user->find(11);
                $user->delete();

                //删除主键为10的数据
                $user->delete(10);

                //删除主键为10,11的数据
                $user->delete('10,11');
                 * * 
                 */   
            }
            字段映射可以将表单里的 name 名称对应到数据表里的字段，这样防止系统自动屏蔽掉
            不对应的 POST 值。
            //字段映射
             protected $_map =  array(
                'xingming'=>'user',
                'youxiang'=>'email',
             );
            //字段映射获取
            $user = D('User');
            var_dump($user->create());