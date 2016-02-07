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

===================================== 1.5 自动验证 ==========================================
	一． 验证规则
		数据验证可以对表单中的字段进行非法的验证操作。 一般提供了两种验证方式： 静态定
		义（$_validate 属性）和动态验证（validate()方法） 。
		//验证规则
		array(
		array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
		array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
		......
		);
		PS：验证字段、验证规则和错误提示这三项是必选的，大多数也是用这三项；而验证
		条件、附加规则和验证时间是可选的。
		验证字段：一般来说是表单的字段名，不一定必须和数据表匹配的，因为有一些比如密
		码确认等辅助字段的存在。
		验证规则： 系统内置了常用的规则， require(字段必填)、 email(邮箱格式)、 url(url
		格式)、currency(货币)、number(正整数)、integer(整数)、double(浮点数)、zip(邮
		政编码)、english(英文)。这些规则默认采用的附加规则是 regex，正则表达式验证，只
		不过是设定好的。
		错误信息：验证失败后的提示。

		验证条件：共三种：
			1.self::EXISTS_VALIDATE 或 0，表示存在字段就验证（默认） ；
			2.self::MUST_VALIDATE 或 1，表示必须验证；
			3.self::VALUE_VALIDATE 或 2，表示值不为空的时候验证。
		附加规则：配合验证规则使用，包括一下规则：

		规则 说明
		regex    正则验证，定义的验证规则是一个正则表达式（默认）
		function 函数验证，定义的验证规则是一个函数名
		callback 方法验证，定义的验证规则是当前模型类的一个方法
		confirm	 验证表单中的两个字段是否相同，定义的验证规则是一个字段名
		equal    验证是否等于某个值，该值由前面的验证规则定义
		notequal 验证是否不等于某个值，该值由前面的验证规则定义（3.1.2版本新增）
		in       验证是否在某个范围内，定义的验证规则可以是一个数组或者逗号分割的字符串
		notin 	验证是否不在某个范围内，定义的验证规则可以是一个数组或者逗号分割的字符串（3.1.2版本新增）
		length  验证长度，定义的验证规则可以是一个数字（表示固定长度）或者数字范围（例如3,12 表示长度从3到12的范围）
		between	 验证范围，定义的验证规则表示范围，可以使用字符串或者数组，例如1,31或者 array(1,31)
		notbetween	验证不在某个范围，定义的验证规则表示范围，可以使用字符串或者数组（3.1.2版本新增）
		expire		验证是否在有效期，定义的验证规则表示时间范围，可以到时间， 
		例如可以使用2012-1-15,2013-1-15 表示当前提交有效期在2012-1-15到2013-1-15之间，也可		以使用时间戳定义
		ip_allow   验证 IP 是否允许，定义的验证规则表示允许的 IP 地址
		列表，用逗号分隔，例如201.12.2.5,201.12.2.6
		ip_deny    验证 IP 是否禁止，定义的验证规则表示禁止的 ip 地址
		列表，用逗号分隔，例如201.12.2.5,201.12.2.6
		unique		验证是否唯一，系统会根据字段目前的值查询数据库来判断是否存在相同的值，当表单数据中包含主键字段时
		unique 不可用于判断主键字段本身

		验证时间：主要新增修改等验证。
			1.self::MODEL_INSERT 或 1 新增数据时验证；
			2.self::MODEL_UPDATE 或 2 编辑数据时验证；
			3.self::MODEL_BOTH 或 3 全部情况下验证(默认)。

		ThinkPHP 提供了九种自动验证内置方案，具体如下：
		//内置验证require，不得为空的用法
		array('user', 'require', '用户不得为空！'),
		//内置验证email，合法的邮箱格式
		array('user', 'email', '邮箱格式不合法！'),
		//内置验证url，验证网址是否合法
		array('user', 'url', 'URL 路径不合法！'),
		//内置验证currency，验证是否为货币
		array('user', 'currency', '货币格式不正确！'),
		//内置验证zip，验证是否为六位整数邮政编码
		array('user', 'zip', '邮政编码格式不正确！'),
		//内置验证number，验证是否为正整数
		array('user', number, '正整数格式不正确！'),
		//内置验证integer，验证是否为整数，正负均可
		array('user', 'integer', '整数格式不正确！'),
		//内置验证double，验证是否为浮点数，正负均可
		array('user', 'double', '整数格式不正确！'),
		//内置验证english，验证是纯英文
		array('user', 'english', '不是纯英文！'),
		ThinkPHP 还提供了附加规则，来提升自动验证的扩展性：
		//附加规则regex，验证3-6位纯数字
		array('user', '/^\d{3,6}$/', '不是 3-6 位纯正数字', 0, 'regex'),
		//附加规则equal，验证是否和指定值相等
		array('user', '李炎恢', '值不对等', 0, 'equal'),
		//附加规则notequal，验证是否与指定值不等
		array('user', '李炎恢', '值不能相等', 0, 'notequal'),
		//附加规则confirm，验证两条字段是否相同
		array('user', 'name', '两个用户名对比不同！',0,'confirm'),
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
		array('user', 'checkLength', '用户名必须在 3-5 位', 0, 'callback', 3,
		array(3,5)),
		//回调方法
		protected function checkLength($str,$min,$max) {
			preg_match_all("/./", $str, $matches);
			$len = count($matches[0]);
			if ($len < $min || $len > $max) {
				return false;
			} else {
				return true;
			}
		}
		//附加规则function，函数验证
		array('user', 'checkLength', '用户名必须在 3-5 位', 0, 'function', 3,
		array(3,5)),
		//在 Common 文件夹下的 Common 文件夹建立 function.php 文件，会自动加载
		function checkLength($str,$min,$max) {
		preg_match_all("/./", $str, $matches);
		$len = count($matches[0]);
		if ($len < $min || $len > $max) {
		return false;
		} e else {
		return true;
		}
		}
		如果有多个字段都包含错误，默认只显示一个错误。如果想显示全部错误，可以设置属
		性：
		//批量验证
		d protected $patchValidate =  true;
		如果是直接 POST 过来的，直接使用 create()方法即可。
		//控制器create()方法自动调用验证
		$user = D('User');
		f if ($user->create()) {
		o echo '所有数据验证成功！';
		} e else {
		//输出错误信息
		var_dump($user->getError());
		}
		PS：由于使用的 UserModel 模型类，所以必须是 D()方法实例化。
		如果想把错误信息返回给ajax处理，可以是同ajaxReturn()方法返回JSON数据。
		//返回JSON格式
		$this->ajaxReturn($user->getError());
		//1指定新增数据验证，2表示修改，
		f if ($user->create($_POST,1)) {} //一般会自动判断
		三． 动态验证
		动态验证就是把验证的规则放在控制器端，这样，在操作的时候比较灵活，缺点就是比
		较混乱。
		//动态验证
		$rule =  array(
		array('user', 'require', '用户名不得为空'),
		);
		$user = M('User');
		$data['user'] = '';
		f if ($user->validate($rule)->create($data)) {
		o echo '验证所有字段成功！';
		} e else {
		var_dump($user->geterror());
		}

===================================== 1.6 自动完成 ==========================================
	一：完成规则
		自动完成一般通过默认字段写入、 安全字段过滤以及业务逻辑的自动处理等。 有两种方
		式实现自动完成的规则：1.静态方式：在模型类里通过$_auto 属性定义处理规则；2 动态
		方式：使用模型类的 auto 方法动态创建自动处理规则。
		//完成规则
		array(
			array(完成字段1,完成规则,[完成条件,附加规则]),
			array(完成字段2,完成规则,[完成条件,附加规则]),
			......
		);
		
		完成字段：必填，需要的字段名；
		完成规则：必填，配合附加规则完成；
		完成条件：可选，具体如下：
		1.self::MODEL_INSERT 或 1，新增数据的时候处理（默认） ；
		2.self::MODEL_UPDATE 或 2，更新数据的时候处理；
		3.self::MODEL_BOTH 或 3，所有情况均处理。
		附加规则：可选，配合完成规则使用，包括一下规则：
		规则 说明
		function 函数完成，定义的验证规则是一个函数名
		callback 方法完成，定义的验证规则是当前模型类的一个方法
		field 用其他字段填充，表示填充的内容是一个其他字段的值
		string 字符串（默认）
		ignore 为空则忽略（3.1.2新增）

	二． 静态定义
		在模型类里预先定义好该模型的自动完成规则，就是静态定义。
		class UserModel s extends Model {
		//自动完成
		protected $_auto =  array(
			//自动设置count字段为1
			array('count', '1'),
			//给密码加密，加密类型为sha1，sha1函数PHP内置
			array('user', 'sha1', 3, 'function'),
		);
		}
		为了测试方便，我们可以直接通过模拟提交 POST：
		//控制器create()方法自动调用验证
		$user = D('User');
		$data['user'] = '蜡笔小新';
		if ($user->create($data)) {
			$user->add();
		}
		//string,自动设置count字段为1
		array('count', '1'),
		//function，给密码加密，加密类型为sha1，sha1函数PHP内置
		array('user', 'sha1', 3, 'function'),
		//把email字段的值填充到user字段冲去
		array('user', 'email', 3, 'field'),
		//callback，给用户名加前缀
		array('user', 'updateUser', 3, 'callback', '_'),
		//回调函数
		protected function updateUser($str, $prefix) {
			return $prefix.$str;
		}
		//ignore，用于修改时密码留空时，忽略修改
		array('pass', '', 2, 'ignore'),
		三． 动态完成
		动态完成就是把完成的规则放在控制器端，这样，在操作的时候比较灵活，缺点就是比
		较混乱。
		//动态完成
		$rules =  array(
			array('user', 'sha1', 3, 'function'),
		);
		$user = M('User');
		$data['user'] = '蜡笔小新';
		if ($user->auto($rules)->create($data)) {
			$user->add();
		}

===================================== 1.7 视图 ===============================================
	一． 模版定义
		模版在使用之前需要一定的设置， 才能方便开发者使用。 每个模块的模版文件是独立的，
		为了对模版文件更加有效的管理，ThinkPHP 对模版文件机型目录划分，默认的模版文件定
		义规则是：
		视图目录/[模版主题/]控制器名/操作名+模版后缀
		第一步：在 User 控制器模块执行一条语句：
		//渲染模版输出
		$this->display();
		什么都没有定义的情况下，会自动报错，错误信息提示如下：
		模板不存在 :./Weibo/Home/View/User/index.html
		通过这个错误提示，我们只要在 View 目录下创建 User 目录，并在 User 目录下创建
		index.html 文件，这时模版渲染模版输出成功。
		默认情况下视图目录是 View，如果你想改变成别的目录名可以设置：
		//修改模版的视图目录
		'DEFAULT_V_LAYER' =>'Template',
		默认情况下的模版文件后缀是.html，如果你想改变成别的后缀可以设置：
		//修改模版中的文件的后缀
		'TMPL_TEMPLATE_SUFFIX'=>'.tpl'
		如果感觉每一个模块，都要创建相应的目录太过于麻烦，可以设置：
		//用下划线代替目录层次
		'TMPL_FILE_DEPR'=>'_', //User_index.tpl
		如果不想将模版存在在当前 Weibo 目录下，而设置在外部：
		//设置外部的模版目录
		'VIEW_PATH'=>'./Public/',
		如果一个系统要考虑多套界面皮肤的话，要考虑到默认皮肤以及可选皮肤：
		//设置默认主题目录
		'DEFAULT_THEME'=>'default',
		//切换主题
		$this->theme('blue')->display();

		二． 赋值和渲染
		如果要在模版中输出变量，必须在控制器中把变量传递给模版。ThinkPHP 提供了
		assign 方法对模版变量赋值，无论何种变量类型都统一使用 assign 赋值。
		//给模版传递一个变量
		$this->assign('user', '蜡笔小新');
		//模版中调用变量
		{$user}
		PS：这个方法必须在 display()方法之前使用，保存变量正确传递。
		渲染模版输出使用的是 display 方法，有三个可选参数：
		display([模版文件][,字符编码][,输出类型]);
		如果不传递任何参数，它会按照默认的目录定位模版的位置：
		当前模块/默认视图目录/当前控制器/当前操作.html
		//不传参数
		$this->display();
		./Weibo/Home/View/default/User/index.tpl
		//修改默认模版
		$this->display('add');
		./Weibo/Home/View/default/User/add.tpl
		//修改默认模版，目录加模版
		$this->display('Bbb/add');
		./Weibo/Home/View/default/Bbb/add.tpl
		//修改默认模版，模块加目录加模版
		$this->display('Admin@Bbb/add');
		./Weibo/Admin/View/default/Bbb/add.tpl
		//修改默认模版，主题加目录加模版
		$this->theme('blue')->display('Bbb/add');
		./Weibo/Home/View/blue/Bbb/add.tpl
		//修改默认模版，自定义模版
		$this->display('./Template/Public/add.tpl');
		./Template/Public/add.tpl //Template 和 Weibo 同级
		//修改默认模版，指定编码和文件类型，一般不用填写，默认即可
		$this->display('add', 'utf-8', 'text/xml');
		三． 模版地址
		ThinkPHP 封装了一个 T 函数，专门用于生成模版文件。格式如下：
		T([资源://][模块@][主题/][控制器/]操作,[视图分层]);
		//输出当前模版地址
		echo T();
		当然可以结合上面讲的所有定义方法来自定义模版：
		echo T('Public/add')
		echo T('Admin@index');
		echo T('Admin@Public/add', 'Template');
		//直接使用T函数输出
		$this->display(T());
		四． 获取内容
		如果需要获取模版的内容，可以使用 fetch()方法，这个方法的使用和 display()方
		法一致。
		//获取模版里的内容
		$content = $this->fetch();
		var_dump($content);
		//通过内容再渲染输出
		$this->show($content);
		PS：使用 fetch()方法获取内容，主要是为了可以处理和过滤更加复杂的内容。然后
		处理后再由 show()方法输出。

===================================== 1.8 模板基础 ===========================================
	一． 变量输出
		在模版中输出变量是非常容易的， 使用 assign()方法， 以键值对的方式传递变量和值。
		//给模版传递一个变量
		$user = '蜡笔小新';
		$this->assign('user', $user);
		在模版中可以这么调用：
		{$user}
		模版编译后的结果是：
		<?php o echo ($user); ?> //可以在 Runtime 可以查看
		模版标签{和$之间不能用任何空格，否则无法解析。如果你想更换两个{}可以设置：
		//修改默认标签
		'TMPL_L_DELIM'=>'<{',
		'TMPL_R_DELIM'=>'}>',
		调用方式就必须改变：
		<{$user}>
		如果传递一个数组，我们直接传递过去后，通过两种方式调用：
		//给模版传递一个数组
		$data['user'] = '蜡笔小新';
		$data['email'] = 'bnbbs@163.com';
		$this->assign('data', $data);
		调用方式为：
		User:{$data.user} Email:{$data.email}
		User:{$data['user']} Email:{$data['email']}
		如果传递一个对象，我们直接传递过去后，通过两种方式调用：
		//给模版传递一个对象
		$data = w new \stdClass();
		$data->user = '蜡笔小新';
		$data->email = 'bnbbs@163.com';
		$this->assign('data', $data);
		调用方式为：
		User:{$data->user} Email:{$data->email}
		User:{$data:user} Email:{$data:email}
		二． 系统变量
		在模版中，不但可以输出 PHP 的系统变量，还可以输出 ThinkPHP 的系统变量。
		//输出PHP系统变量
		{$Think.server.script_name} //$_SERVER['SCRIPT_NAME']
		{$Think.session.admin} //$_SESSION['admin']
		{$Think.get.user} //$_GET['user']
		{$Think.post.user} //$_POST['user']
		{$Think.request.user} //$_REQUEST['user']
		{$Think.cookie.name} //$_COOKIE['name']
		//ThinkPHP的系统变量
		{$Think.const.APP_PATH} //目录
		{$Think.config.url_model} //URL模式
		{$Think.lang.var_error} //语言变量
		三． 使用函数
		如果有时，我们需要在模版中使用 PHP 函数的话，可以按照下面的格式使用：
		{$user|md5}
		如果有多个参数要传递，可以参考如下设置：
		{$date|date="Y-m-d H:i:s",###}
		PS：表示 date 函数传入两个参数，每个参数用逗号分割，这里第一个参数是 Y-m-d
		H:i:s，第二个参数是前面要输出的 date 变量，因为该变量是第二个参数，因此需要用###
		标识变量位置，编译后的结果是：
		<?php o echo (date($date,"Y-m-d H:i:s")); ?>
		前面输出变量，在后面定义，则不需要###
		{$user|mb_substr=0,3,'UTF-8'}
		多个函数用"|"隔开即可
		{$user|mb_substr=0,3,'UTF-8'|md5|sha1}
		PS：如果你觉得以上写法需要在脑海里二次翻译，太过于麻烦，那么可以用以下的格
		式写法：
		{:md5(mb_substr($user,0,3,'UTF-8'))}
		PS：我个人认为把这些数据处理，都尽可能不要模版端，除非是必须在模版端才能处
		理的。因为模版就是为了 HTML 和 JS，然后就是提供数据，不要包含各种过滤和业务逻辑。
		当传递过来的变量如果没有值的时候，模版提供了默认值输出功能。
		{$user|default='什么都没有！'}
		四．使用运算符
		我们可以在模版中使用运算符，包括对“+” 、 “-” 、 “*” 、 “/” 、 “%” 、 “--”和“++” 的
		支持。
		{$data['num']+10} //中括号
		{$data['num']+getNum()} //函数
		PS：在使用运算符的时候，不再支持语法和常规的函数用法：
		{$data.num+10} //错误的
		{$data['num']+getNum} //错误
		模版还支持三元运算符：
		{$user ? '有值' : '无值'}
		五．包含文件
		在一个系统中，可以包含通用的头文件和脚文件：header 和 footer。由于每个页面
		的头脚都是相同的，所以需要独立分离出来，再用包含文件引入他们。
		我们可以在 View 目录下 default 主题目录下创建一个 public 目录， 这个目录专门存
		放公共调用模版文件。
		<include file='Public/header' />
		<include file='Public/footer' />
		也可以调用绝对路径模式：
		<include file='./Weibo/Home/View/default/Public/header.tpl' />
		同时调用多个模版文件：
		<include file='Public/header,Public/footer' />
		六．模版注释
		模版支持注释功能，提供个模版制作人员参考。
		{//这是注释}
		{/*这也是注释*/}
		{/*这是
		多行注释*/}
		七．模版继承
		模版继承是一项灵活的模版布局方式， 它类似于子类继承父类， 然后子类还可以进行适
		当的修改以满足当前页面的需要。
		//基础模版需要子模版修改的部分可以用<block>包含，并且设置name值
		<block name="main">主要内容</block>
		//子模版只要按同样的方法，修改<block>内部的值即可完成修改
		<block name="main">修改了</block>
		//创建Public下base.tpl模版基页
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<block name="title"><title>{$user}</title></block>
		</head>
		<body>
		<include file="Public/header" />
		<block name="main">主要内容</block>
		<include file="Public/footer" />
		</body>
		</html>
		//使用<extend>导入模版基页，name为路径，和include导入方法一致
		<extend name="Public/base" />
		<block name="main">修改了</block>
		八．模版布局
		ThinkPHP 的模版引擎内置了布局模版功能支持，可以方便实现模版布局以及布局嵌套
		功能。有三种布局方式：
		1.全局配置方式
		//开启模版布局功能，并指定基础页
		'LAYOUT_ON'=> true,
		'LAYOUT_NAME'=>'Public/layout', //layout.tpl 文件
		//基础页，{__CONTENT__}将被子页面的内容替换
		<include file="Public/header" />
		{__CONTENT__}
		<include file="Public/footer" />
		//替换变量可以变更为{__REPLACE__}
		'TMPL_LAYOUT_ITEM' =>'{__REPLACE__}',
		//子模版不需要载入模版基页，可以在开头加上{__NOLAYOUT__}
		{__NOLAYOUT__}
		2.模版标签方式
		标签方式，并不需要在系统做任何配置，和模版继承类似，直接引入即可。
		//子模版引入模版基页
		<layout name="Public/layout" />
		//替换变量的方法
		<layout name="Public/layout" replace="{__REPLACE__}" />
		3.layout 控制布局
		这个方法是在控制器里操作的。
		//开启布局，并引入默认地址基页
		n public function index() {
		layout( true);
		}
		//引入指定基页
		n public function index() {
		layout('Public/layout');
		//layout( false); //关闭
		}
		九．模版替换
		在模版渲染之前， 系统还会对读取的模版内容进行一些特殊字符串替换操作， 也就实现
		了模版输出的替换和过滤。
		__ROOT__： 会替换成当前网站的地址（不含域名）
		__APP__： 会替换成当前应用的 URL 地址 （不含域名）
		__MODULE__：会替换成当前模块的 URL 地址 （不含域名）
		__CONTROLLER__（或者__URL__ 兼容考虑） ： 会替换成当前控制器的 URL 地址（不
		含域名）
		__ACTION__：会替换成当前操作的 URL 地址 （不含域名）
		__SELF__： 会替换成当前的页面 URL
		__PUBLIC__：会被替换成当前网站的公共目录 通常是 /Public/
		'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
		'__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
		)
		PS：__PUBLIC__可以改成--PUBLIC--同样的也可以。

===================================== 1.9 内置标签 ============================================

