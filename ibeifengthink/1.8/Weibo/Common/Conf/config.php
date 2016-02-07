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
	//'SHOW_PAGE_TRACE' =>true,
        
        //修改模版的视图目录
        //'DEFAULT_V_LAYER' =>'Template',
        
        //修改模版中的文件的后缀
        //'TMPL_TEMPLATE_SUFFIX'=>'.tpl'
    
        //用下划线代替目录层次
        // 'TMPL_FILE_DEPR'=>'_', //User_index.tpl
        
        //设置外部的模版目录
        //'VIEW_PATH'=>'./Public/',
        
	// 关闭字段缓存
	//'DB_FIELDS_CACHE'=>false,
        
        //设置默认主题
	'DEFAULT_THEME'=>'default',
    
        //修改模板默认标签
        'TMPL_L_DELIM'=>'<{',
        'TMPL_R_DELIM'=>'}>',
    
        //开启模版布局功能，并指定基础页
        //'LAYOUT_ON'=> true,
        //'LAYOUT_NAME'=>'Public/layout', 
);