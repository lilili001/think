<?php
return array(
	//'配置项'=>'配置值'

	//禁止访问模块
	//'MODULE_DENY_LIST' => array('Admin','Runtime','Common'),

	//允许访问的模块
	//'MODULE_ALLOW_LIST' => array('Home','Admin'),

	//设置默认起始模块
	//'DEFAULT_MODULE' => 'Admin',

	//单模块设置
	//'MULTI_MODULE' => false,

	//设置键值对分隔符
	//'URL_PATHINFO_DEPR'=>'_',

	//修改键名称
	// 'VAR_MODULE' => 'mm',
	// 'VAR_CONTROLLER' => 'cc',
	// 'VAR_ACTION' => 'aa',

	//全局配置定义
	// 'DB_TYPE'=>'mysql', //数据库类型
	// 'DB_HOST'=>'localhost', //服务器地址
	// 'DB_NAME'=>'thinkphp', //数据库名
	// 'DB_USER'=>'root', //用户名
	// 'DB_PWD'=>'', //密码
	// 'DB_PORT'=>3306, //端口
	// 'DB_PREFIX'=>'think_', 

	//PDO专用定义
	'DB_TYPE'=>'mysql', //数据库类型
	'DB_USER'=>'root', //用户名
	'DB_PWD'=>'', //密码
	'DB_PREFIX'=>'think_', //数据库表前缀
	'DB_DSN'=>'mysql:host=localhost;dbname=thinkphp;charset=UTF8',

	//页面Trace，调试辅助工具
	'SHOW_PAGE_TRACE' =>true,

	// 关闭字段缓存
	//'DB_FIELDS_CACHE'=>false,
	
);