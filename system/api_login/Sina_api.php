<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

$api_lang = array(
	'name'	=>	'新浪api登录接口',
	'app_key'	=>	'新浪API应用APP_KEY',
	'app_secret'	=>	'新浪API应用APP_SECRET',
	'app_url'	=>	'回调地址',
);

$config = array(
	'app_key'	=>	array(
		'INPUT_TYPE'	=>	'0',
	), //新浪API应用的KEY值
	'app_secret'	=>	array(
		'INPUT_TYPE'	=>	'0'
	), //新浪API应用的密码值
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
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `sina_id`  varchar(255) NOT NULL",'SILENT');
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `sina_token`  varchar(255) NOT NULL",'SILENT');
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `sina_secret`  varchar(255) NOT NULL",'SILENT');
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `sina_url`  varchar(255) NOT NULL",'SILENT');
	}
    $module['class_name']    = 'Sina';

    /* 名称 */
    $module['name']    = $api_lang['name'];
    $module['dispname']    = "新浪微博";

	$module['config'] = $config;
	$module['is_weibo'] = 1;  //可以同步发送微博
	
	$module['lang'] = $api_lang;
    
    return $module;
}

// 新浪的api登录接口
require_once(APP_ROOT_PATH.'system/libs/api_login.php');
class Sina_api implements api_login {
	
	private $api;
	
	public function __construct($api)
	{
		$api['config'] = unserialize($api['config']);
		$this->api = $api;
	}
	
	public function get_api_url()
	{
		require_once APP_ROOT_PATH.'system/api_login/sina/saetv2.ex.class.php';
		$o = new SaeTOAuthV2($this->api['config']['app_key'],$this->api['config']['app_secret']);
		es_session::start();
		//$keys = $o->getRequestToken();
		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Sina";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		$aurl = $o->getAuthorizeURL($app_url);		
		
		$str = "<a href='".$aurl."' title='".$this->api['name']."'><img src='".$this->api['icon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}
	
	public function get_big_api_url()
	{
		require_once APP_ROOT_PATH.'system/api_login/sina/saetv2.ex.class.php';
		$o = new SaeTOAuthV2($this->api['config']['app_key'],$this->api['config']['app_secret']);
		es_session::start();
		//$keys = $o->getRequestToken();
		//$aurl = $o->getAuthorizeURL($keys['oauth_token'] ,false , get_domain().APP_ROOT."/api_callback.php?c=Sina");

		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Sina";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		$aurl = $o->getAuthorizeURL($app_url);
		
		$str = "<a href='".$aurl."' title='".$this->api['name']."'><img src='".$this->api['bicon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}	
	
	public function get_bind_api_url()
	{
		require_once APP_ROOT_PATH.'system/api_login/sina/saetv2.ex.class.php';
		$o = new SaeTOAuthV2($this->api['config']['app_key'],$this->api['config']['app_secret']);
		es_session::start();
		//$keys = $o->getRequestToken();
		if($this->api['config']['app_url']=="")
		{
			$app_url = get_domain().APP_ROOT."/api_callback.php?c=Sina";
		}
		else
		{
			$app_url = $this->api['config']['app_url'];
		}
		$aurl = $o->getAuthorizeURL($app_url);	
		return $aurl;
	}	
	
	public function callback()
	{
		require_once APP_ROOT_PATH.'system/api_login/sina/saetv2.ex.class.php';
		es_session::start();
		//$sina_keys = es_session::get("sina_keys");
		$o = new SaeTOAuthV2($this->api['config']['app_key'],$this->api['config']['app_secret']);
		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			if($this->api['config']['app_url']=="")
			{
				$app_url = get_domain().APP_ROOT."/api_callback.php?c=Sina";
			}
			else
			{
				$app_url = $this->api['config']['app_url'];
			}
			$keys['redirect_uri'] = $app_url;
			try {
				$token = $o->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
				print_r($e);exit;
			}
		}
		
		
		$c = new SaeTClientV2($this->api['config']['app_key'],$this->api['config']['app_secret'] ,$token['access_token'] );
		$ms  = $c->home_timeline(); // done
		$uid_get = $c->get_uid();
		$uid = $uid_get['uid'];
		
		$msg = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
		//name,url,province,city,avatar,token,field,token_field(授权的字段),sex,secret_field(授权密码的字段),scret,url_field(微博地址的字段)
		
		$api_data['name'] = $msg['name'];
		$api_data['url'] = "http://weibo.com/".$msg['profile_url'];
		$location = $msg['location'];
		$location = explode(" ",$location);
		$api_data['province'] = $location[0];
		$api_data['city'] = $location[1];
		$api_data['avatar'] = $msg['http://tp2.sinaimg.cn/3048107865/180/0/1'];
		$api_data['field'] = 'sina_id';
		$api_data['token'] = $token['access_token'];
		$api_data['token_field'] = "sina_token";
		$api_data['secret'] = "";
		$api_data['secret_field'] = "sina_secret";
		$api_data['url_field'] = "sina_url";
		if($msg['gender']=='m')
		$api_data['sex'] = 1;
		else if($msg['gender']=='f')
		$api_data['sex'] = 0;
		else 
		$api_data['sex'] = -1;
		
		if($msg['name']!="")
		es_session::set("api_user_info",$api_data);
		$user_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where sina_id = '".$api_data['name']."' and sina_id <> ''");	
		
		if($user_data)
		{
				es_session::delete("api_user_info");		
				$GLOBALS['db']->query("update ".DB_PREFIX."user set sina_token = '".$api_data['token']."',login_ip = '".get_client_ip()."',login_time= ".get_gmtime().",sina_url = '".$api_data['url']."' where id =".$user_data['id']);								
				update_user_weibo($user_data['id'],$api_data['url']); //更新微博
				es_session::set("user_info",$user_data);
				app_redirect_preview();
				
		}
		else
		{			
			if($GLOBALS['user_info'])
			{
				update_user_weibo($GLOBALS['user_info']['id'],$api_data['url']); //更新微博
				$GLOBALS['db']->query("update ".DB_PREFIX."user set sina_id = '".$api_data['name']."',sina_token = '".$api_data['token']."',sina_url = '".$api_data['url']."' where id =".intval($GLOBALS['user_info']['id']));								
				app_redirect(url("settings#bind"));
			}
			else
			app_redirect(url("user#api_register"));
		}
		
	}
	
	public function get_title()
	{
		return '新浪api登录接口，需要php_curl扩展的支持(V2)';
	}
	
	
	
	
	//同步发表到新浪微博
	public function send_message($data)
	{
		static $client = NULL;
		if($client === NULL)
		{
			require_once APP_ROOT_PATH.'system/api_login/sina/saetv2.ex.class.php';
			$uid = intval($GLOBALS['user_info']['id']);
			$udata = $GLOBALS['db']->getRow("select sina_token from ".DB_PREFIX."user where id = ".$uid);
			$client = new SaeTClientV2($this->api['config']['app_key'],$this->api['config']['app_secret'],$udata['sina_token']);
		}
		try
		{
			if(empty($data['img']))
				$msg = $client->update($data['content']);
			else
				$msg = $client->upload($data['content'],$data['img']);

			if($msg['error'])
			{
				$result['status'] = false;
				$result['msg'] = "新浪微博同步失败，请偿试重新通过腾讯微博登录或得新授权。";
				return $result;
			}
			else
			{
				$result['status'] = true;
				$result['msg'] = "success";
				return $result;
			}

		}
		catch(Exception $e)
		{

		}
	}
	
}
?>