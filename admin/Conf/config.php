<?php
if (!defined('THINK_PATH')) exit();
if(file_exists(APP_ROOT_PATH.'system/config.php'))
$sys_config	=	require APP_ROOT_PATH.'system/config.php';
$array = array(
	'TOKEN_ON'	=>	0,
    'DEFAULT_THEME'    => 'default', //后台模板
	'DEFAULT_LANG'	   =>	'zh-cn', //后台语言
	'URL_MODEL'		   =>	'0',     //后台URL模式为原始模式

	'TMPL_ACTION_ERROR'     => 'Public:error', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   => 'Public:success', // 默认成功跳转对应的模板文件
	//'TMPL_TRACE_FILE'       =>  BASE_PATH.'/global/PageTrace.tpl.php',     // 页面Trace的模板
	
	'PAGE_ROLLPAGE'         => 5,      // 分页显示页数
	'PAGE_LISTROWS'         => 30,     // 分页每页显示记录数
	//后台自动载入的类库
	'APP_AUTOLOAD_PATH'     => 'Think.Util.,@.COM.',// __autoLoad 机制额外检测路径设置,注意搜索顺序	
);
if(file_exists(APP_ROOT_PATH.'system/config.php'))
$config = array_merge($sys_config,$array);
else
$config = $array;
return $config;
?>