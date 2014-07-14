<?php 
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

@set_magic_quotes_runtime (0);
define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?True:False);
if(!defined('IS_CGI'))
define('IS_CGI',substr(PHP_SAPI, 0,3)=='cgi' ? 1 : 0 );
 if(!defined('_PHP_FILE_')) {
        if(IS_CGI) {
            //CGI/FASTCGI模式下
            $_temp  = explode('.php',$_SERVER["PHP_SELF"]);
            define('_PHP_FILE_',  rtrim(str_replace($_SERVER["HTTP_HOST"],'',$_temp[0].'.php'),'/'));
        }else {
            define('_PHP_FILE_',  rtrim($_SERVER["SCRIPT_NAME"],'/'));
        }
    }
if(!defined('APP_ROOT')) {
        // 网站URL根目录
        $_root = dirname(_PHP_FILE_);
        $_root = (($_root=='/' || $_root=='\\')?'':$_root);
        $_root = str_replace("/system","",$_root);
        define('APP_ROOT', $_root  );
}
if(!defined('APP_ROOT_PATH')) 
define('APP_ROOT_PATH', str_replace('system/system_init.php', '', str_replace('\\', '/', __FILE__)));
define("MAX_DYNAMIC_CACHE_SIZE",1000);  //动态缓存最数量

//定义$_SERVER['REQUEST_URI']兼容性
if (!isset($_SERVER['REQUEST_URI']))
{
		if (isset($_SERVER['argv']))
		{
			$uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
		}
		else
		{
			$uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
		}
		$_SERVER['REQUEST_URI'] = $uri;
}
filter_request($_GET);
filter_request($_POST);

//关于安装的检测
if(!file_exists(APP_ROOT_PATH."public/install.lock"))
{
	app_redirect(APP_ROOT."/install/index.php");
}

//引入数据库的系统配置及定义配置函数
update_sys_config();
$sys_config = require APP_ROOT_PATH.'system/config.php';
function app_conf($name)
{
	return stripslashes($GLOBALS['sys_config'][$name]);
}
if(app_conf("DEBUG"))
error_reporting(E_ALL^E_NOTICE^E_WARNING);
else
error_reporting(0);

//end 引入数据库的系统配置及定义配置函数

require APP_ROOT_PATH.'system/utils/es_cookie.php';
require APP_ROOT_PATH.'system/utils/es_session.php';
es_session::start();

function get_http()
{
	return (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) ? 'https://' : 'http://';
}
function get_domain()
{
	/* 协议 */
	$protocol = get_http();
	
	if(app_conf("SITE_DOMAIN")!="")
	{
		 return $protocol.app_conf("SITE_DOMAIN");
	}

	/* 域名或IP地址 */
	if (isset($_SERVER['HTTP_X_FORWARDED_HOST']))
	{
		$host = $_SERVER['HTTP_X_FORWARDED_HOST'];
	}
	elseif (isset($_SERVER['HTTP_HOST']))
	{
		$host = $_SERVER['HTTP_HOST'];
	}
	else
	{
		/* 端口 */
		if (isset($_SERVER['SERVER_PORT']))
		{
			$port = ':' . $_SERVER['SERVER_PORT'];

			if ((':80' == $port && 'http://' == $protocol) || (':443' == $port && 'https://' == $protocol))
			{
				$port = '';
			}
		}
		else
		{
			$port = '';
		}

		if (isset($_SERVER['SERVER_NAME']))
		{
			$host = $_SERVER['SERVER_NAME'] . $port;
		}
		elseif (isset($_SERVER['SERVER_ADDR']))
		{
			$host = $_SERVER['SERVER_ADDR'] . $port;
		}
	}

	return $protocol . $host;
}
function get_host()
{


	/* 域名或IP地址 */
	if (isset($_SERVER['HTTP_X_FORWARDED_HOST']))
	{
		$host = $_SERVER['HTTP_X_FORWARDED_HOST'];
	}
	elseif (isset($_SERVER['HTTP_HOST']))
	{
		$host = $_SERVER['HTTP_HOST'];
	}
	else
	{
		if (isset($_SERVER['SERVER_NAME']))
		{
			$host = $_SERVER['SERVER_NAME'];
		}
		elseif (isset($_SERVER['SERVER_ADDR']))
		{
			$host = $_SERVER['SERVER_ADDR'];
		}
	}
	return $host;
}

if(app_conf("URL_MODEL")==1)
{
	//重写模式
	$current_url = APP_ROOT;	
	if(isset($_REQUEST['rewrite_param']))
	$rewrite_param = $_REQUEST['rewrite_param'];
	else
	$rewrite_param = "";
	$rewrite_param = explode("/",$rewrite_param);
	$rewrite_param_array = array();
	foreach($rewrite_param as $k=>$param_item)
	{
		if($param_item!='')
		$rewrite_param_array[] = $param_item;
	}	
	foreach ($rewrite_param_array as $k=>$v)
	{
		if(substr($v,0,1)=='-')
		{
			//扩展参数
			$v = substr($v,1);
			$ext_param = explode("-",$v);
			foreach($ext_param as $kk=>$vv)
			{
				if($kk%2==0)
				{
					if(preg_match("/(\w+)\[(\w+)\]/",$vv,$matches))
					{
						$_GET[$matches[1]][$matches[2]] = $ext_param[$kk+1];
					}
					else
					$_GET[$ext_param[$kk]] = $ext_param[$kk+1];
					
					if($ext_param[$kk]!="p")
					{
						$current_url.=$ext_param[$kk];	
						$current_url.="-".$ext_param[$kk+1]."-";
					}
				}
			}			
		}
		elseif($k==0)
		{
			//解析ctl与act
			$ctl_act = explode("-",$v);
			if($ctl_act[0]!='id')
			{
				
				$_GET['ctl'] = !empty($ctl_act[0])?$ctl_act[0]:"";
				$_GET['act'] = !empty($ctl_act[1])?$ctl_act[1]:"";	
		
				$current_url.="/".$ctl_act[0];	
				if(!empty($ctl_act[1]))
				$current_url.="-".$ctl_act[1]."/";	
				else
				$current_url.="/";	
			}
			else
			{
				//扩展参数
				$ext_param = explode("-",$v);
				foreach($ext_param as $kk=>$vv)
				{
					if($kk%2==0)
					{
						if(preg_match("/(\w+)\[(\w+)\]/",$vv,$matches))
						{
							$_GET[$matches[1]][$matches[2]] = $ext_param[$kk+1];
						}
						else
						$_GET[$ext_param[$kk]] = $ext_param[$kk+1];
						
						if($ext_param[$kk]!="p")
						{
							if($kk==0)$current_url.="/";
							$current_url.=$ext_param[$kk];	
							$current_url.="-".$ext_param[$kk+1]."-";	
						}
					}
				}
			}
			
		}elseif($k==1)
		{
			//扩展参数
			$ext_param = explode("-",$v);
			foreach($ext_param as $kk=>$vv)
			{
				if($kk%2==0)
				{
					if(preg_match("/(\w+)\[(\w+)\]/",$vv,$matches))
					{
						$_GET[$matches[1]][$matches[2]] = $ext_param[$kk+1];
					}
					else
					$_GET[$ext_param[$kk]] = $ext_param[$kk+1];
					
					if($ext_param[$kk]!="p")
					{
						$current_url.=$ext_param[$kk];	
						$current_url.="-".$ext_param[$kk+1]."-";
					}
				}
			}			
		}
	}
	$current_url = substr($current_url,-1)=="-"?substr($current_url,0,-1):$current_url;	

	$domain = get_host();
	if(strpos($domain,".".app_conf("DOMAIN_ROOT")))
	{
		$sub_domain = str_replace(".".app_conf("DOMAIN_ROOT"),"",$domain);	
		if($sub_domain!='')
		$_GET['sub_domain'] = $sub_domain;
	}
}
unset($_REQUEST['rewrite_param']);
unset($_GET['rewrite_param']);



//引入时区配置及定义时间函数
if(function_exists('date_default_timezone_set'))
	date_default_timezone_set(app_conf('DEFAULT_TIMEZONE'));
//end 引入时区配置及定义时间函数

//定义缓存
require APP_ROOT_PATH.'system/cache/Cache.php';
$cache = CacheService::getInstance();
require_once APP_ROOT_PATH."system/cache/CacheFileService.php";
$fcache = new CacheFileService();  //专用于保存静态数据的缓存实例
$fcache->set_dir(APP_ROOT_PATH."public/runtime/data/");
//end 定义缓存

//定义DB
require APP_ROOT_PATH.'system/db/db.php';
define('DB_PREFIX', app_conf('DB_PREFIX')); 
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/db_caches/'))
	mkdir(APP_ROOT_PATH.'public/runtime/app/db_caches/',0777);
$pconnect = false;
$db = new mysql_db(app_conf('DB_HOST').":".app_conf('DB_PORT'), app_conf('DB_USER'),app_conf('DB_PWD'),app_conf('DB_NAME'),'utf8',$pconnect);
//end 定义DB


//定义模板引擎
require  APP_ROOT_PATH.'system/template/template.php';
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/tpl_caches/'))
	mkdir(APP_ROOT_PATH.'public/runtime/app/tpl_caches/',0777);	
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/tpl_compiled/'))
	mkdir(APP_ROOT_PATH.'public/runtime/app/tpl_compiled/',0777);
$tmpl = new AppTemplate;


?>