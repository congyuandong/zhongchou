<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

$api_lang = array(
	'name'	=>	'腾讯微博登录插件',
	'app_key'	=>	'腾讯API应用APP_KEY',
	'app_secret'	=>	'腾讯API应用APP_SECRET',
	'app_url'	=>	'回调地址',
);

$config = array(
	'app_key'	=>	array(
		'INPUT_TYPE'	=>	'0',
	), //腾讯API应用的KEY值
	'app_secret'	=>	array(
		'INPUT_TYPE'	=>	'0'
	), //腾讯API应用的密码值
	'app_url'	=>	array(
		'INPUT_TYPE'	=>	'0'
	),
);

/* 模块的基本信息 */
if (isset($read_modules) && $read_modules == true)
{
	if(ACTION_NAME=='install')
	{
		//更新字段
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `tencent_id`  varchar(255) NOT NULL",'SILENT');
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `tencent_token`  varchar(255) NOT NULL",'SILENT');
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `tencent_secret`  varchar(255) NOT NULL",'SILENT');
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `tencent_url`  varchar(255) NOT NULL",'SILENT');
	}
    $module['class_name']    = 'Tencent';

    /* 名称 */
    $module['name']    = $api_lang['name'];
    $module['dispname']    = "腾讯微博";

	$module['config'] = $config;
	$module['is_weibo'] = 1;  //可以同步发送微博
	
	$module['lang'] = $api_lang;
    
    return $module;
}

// 腾讯的api登录接口
require_once(APP_ROOT_PATH.'system/libs/api_login.php');
class Tencent_api implements api_login {
	
	private $api;
	
	public function __construct($api)
	{		
		$api['config'] = unserialize($api['config']);
		$this->api = $api;		
	}
	
	public function get_api_url()
	{
		es_session::start();
		require_once APP_ROOT_PATH.'system/api_login/Tencent/Tencent.php';

		OAuth::init($this->api['config']['app_key'], $this->api['config']['app_secret']);
		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Tencent";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		$aurl = OAuth::getAuthorizeURL($app_url);

		$str = "<a href='".$aurl."' title='".$this->api['name']."'><img src='".$this->api['icon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}
	
	public function get_big_api_url()
	{
		es_session::start();
		require_once APP_ROOT_PATH.'system/api_login/Tencent/Tencent.php';

		OAuth::init($this->api['config']['app_key'], $this->api['config']['app_secret']);
		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Tencent";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		$aurl = OAuth::getAuthorizeURL($app_url);

		$str = "<a href='".$aurl."' title='".$this->api['name']."'><img src='".$this->api['bicon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}	
	
	public function get_bind_api_url()
	{
		es_session::start();
		require_once APP_ROOT_PATH.'system/api_login/Tencent/Tencent.php';

		OAuth::init($this->api['config']['app_key'], $this->api['config']['app_secret']);
		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Tencent";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		$aurl = OAuth::getAuthorizeURL($app_url);
		
		return $aurl;
	}		
	public function callback()
	{
		es_session::start();		
		require_once APP_ROOT_PATH.'system/api_login/Tencent/Tencent.php';
		OAuth::init($this->api['config']['app_key'], $this->api['config']['app_secret']);
		
		$code = strim($_REQUEST['code']);
		$openid = strim($_REQUEST['openid']);
		$openkey = strim($_REQUEST['openkey']);
		
		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Tencent";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		
		$token_url = OAuth::getAccessToken($code,$app_url);
		$result = Http::request($token_url);
		$result = preg_replace('/[^\x20-\xff]*/', "", $result); //清除不可见字符
        $result = iconv("utf-8", "utf-8//ignore", $result); //UTF-8转码
        
        parse_str($result,$result_arr);
        
        $access_token = $result_arr['access_token'];
        $refresh_token = $result_arr['refresh_token'];
        $name = $result_arr['name'];
        $nick = $result_arr['nick'];
		
		es_session::set("t_access_token",$access_token);
		es_session::set("t_openid",$openid);
		es_session::set("t_openkey",$openkey);
		
		if (es_session::get("t_access_token")|| (es_session::get("t_openid")&&es_session::get("t_openkey"))) 
		{
			
			$r = Tencent::api('user/info');
			$r = json_decode($r,true);
			if($r['errcode']!=0)
			{
				showErr("腾讯微博返回出错");
			}
			//name,url,province,city,avatar,token,field,token_field(授权的字段),sex,secret_field(授权密码的字段),scret,url_field(微博地址的字段)
			
			$api_data['name'] = $r['data']['name'];
			$api_data['url'] = "http://t.qq.com/".$r['data']['name'];
			$location = $r['data']['location'];
			$location = explode(" ",$location);
			$api_data['province'] = $location[1];
			$api_data['city'] = $location[2];
			$api_data['avatar'] = $r['data']['head'];
			$api_data['field'] = 'tencent_id';
			$api_data['token'] = $access_token;
			$api_data['token_field'] = "tencent_token";
			$api_data['secret'] = $openkey;
			$api_data['secret_field'] = "tencent_secret";
			$api_data['url_field'] = "tencent_url";
			if($r['data']['sex']=='1')
			$api_data['sex'] = 1;
			else if($r['data']['sex']=='2')
			$api_data['sex'] = 0;
			else 
			$api_data['sex'] = -1;
			
			if($api_data['name']!="")
			es_session::set("api_user_info",$api_data);
			$user_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where tencent_id = '".$openid."' and tencent_id <> ''");	
			
			if($user_data)
			{
					es_session::delete("api_user_info");		
					$GLOBALS['db']->query("update ".DB_PREFIX."user set tencent_token = '".$api_data['token']."',tencent_secret = '".$api_data['secret']."',login_ip = '".get_client_ip()."',login_time= ".get_gmtime().",tencent_url = '".$api_data['url']."' where id =".$user_data['id']);								
					update_user_weibo($user_data['id'],$api_data['url']); //更新微博
					es_session::set("user_info",$user_data);
					app_redirect_preview();
					
			}
			else
			{			
				if($GLOBALS['user_info'])
				{
					update_user_weibo($GLOBALS['user_info']['id'],$api_data['url']); //更新微博
					$GLOBALS['db']->query("update ".DB_PREFIX."user set tencent_id = '".$openid."',tencent_token = '".$api_data['token']."',tencent_secret = '".$api_data['secret']."',tencent_url = '".$api_data['url']."' where id =".intval($GLOBALS['user_info']['id']));								
					app_redirect(url("settings#bind"));
				}
				else
				app_redirect(url("user#api_register"));
			}
		}	
	}
	
	public function get_title()
	{
		return '腾讯api登录接口，需要php_curl扩展的支持';
	}
	
	
	public function send_message($data)
	{
		
			require_once APP_ROOT_PATH.'system/api_login/Tencent/Tencent.php';
			OAuth::init($this->api['config']['app_key'], $this->api['config']['app_secret']);		
			
			$uid = intval($GLOBALS['user_info']['id']);
			$udata = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$uid);
			
			es_session::set("t_access_token",$udata['tencent_token']);
			es_session::set("t_openid",$udata['tencent_id']);
			es_session::set("t_openkey",$udata['tencent_secret']);
			if (es_session::get("t_access_token")|| (es_session::get("t_openid")&&es_session::get("t_openkey"))) 
			{		
				if(!empty($data['img']))
				{
					 $params = array(
			        	'content' => $data['content'],
					 	'clientip'	=>	get_client_ip(),
					 	'format'	=>	'json'
				    );
				    $multi = array('pic' => $data['img']);
				    $r = Tencent::api('t/add_pic', $params, 'POST', $multi);
				}
				else
				{
					 $params = array(
			        	'content' => $data['content'],
					 	'clientip'	=>	get_client_ip(),
					 	'format'	=>	'json'
				    );
				    $r = Tencent::api('t/add', $params, 'POST');
				}
				
				
				$msg = json_decode($r,true);
				
	
				
				if(intval($msg['errcode'])==0)
				{
					$result['status'] = true;
					$result['msg'] = "success";
					return $result;
				}
				else
				{
					$result['status'] = false;
					$result['msg'] = "腾讯微博".$msg['msg'];
					return $result;
				}
								
			}

	
	}
	
   
}
?>