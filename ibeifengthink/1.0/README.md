##  thinkphp 的安装和配置

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