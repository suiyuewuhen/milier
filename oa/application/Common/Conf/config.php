<?php
return array(
	//'配置项'=>'配置值'
	// 如果要引入多个函数文件，中间使用 ， 进行分割
	'LOAD_EXT_FILE' => 'File,myfunc',
    
    
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'test',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    
    
	'URL_MODEL' => 2,
    
	'MODULE_DENY_LIST' => array('Common', 'Runtime'),
    'MODULE_ALLOW_LIST' => array('Admin', 'Home'),
    'DEFAULT_MODULE' => 'Admin',
    //'DEFAULT_CONTROLLER' => 'Index',
    //'DEFAULT_ACTION' => 'login',    
    
    'TMPL_PARSE_STRING' => array(
	   //路径常量 => 绝对路径
	   '__ADMIN__' => '/Public/Admin',
	   '__ADMINCSS__' => '/Public/Admin/css',
	   '__ADMINIMG__' => '/Public/Admin/images',
	   '__ADMINJS__' => '/Public/Admin/js',
       '__COMMON__'  => '/Public/Common',
	),
);













