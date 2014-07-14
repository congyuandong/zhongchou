<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------


class userModule extends BaseModule
{
	public function login()
	{		
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
		if (!$GLOBALS['tmpl']->is_cached('user_login.html', $cache_id))
		{		
			$GLOBALS['tmpl']->assign("page_title","会员登录");
		}
		$GLOBALS['tmpl']->display("user_login.html",$cache_id);
	}
	
	public function do_login()
	{		
		if(!$_POST)
		{
			app_redirect(APP_ROOT."/");
		}
		foreach($_POST as $k=>$v)
		{
			$_POST[$k] = strim($v);
		}
		$ajax = intval($_REQUEST['ajax']);
		
		require_once APP_ROOT_PATH."system/libs/user.php";
		if(check_ipop_limit(get_client_ip(),"user_dologin",5))
		$result = do_login_user($_POST['email'],$_POST['user_pwd']);
		else
		showErr("提交太快",$ajax,url("user#login"));		
		if($result['status'])
		{	
			$s_user_info = es_session::get("user_info");
			if(intval($_POST['auto_login'])==1)
			{
				//自动登录，保存cookie
				$user_data = $s_user_info;
				es_cookie::set("email",$user_data['email'],3600*24*30);			
				es_cookie::set("user_pwd",md5($user_data['user_pwd']."_EASE_COOKIE"),3600*24*30);
				
			}
			if($ajax==0&&trim(app_conf("INTEGRATE_CODE"))=='')
			{
				$redirect = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:url("index");
				app_redirect($redirect);
			}
			else
			{			
				$jump_url = get_gopreview();				
				if($ajax==1)
				{
					$return['status'] = 1;
					$return['info'] = "登录成功";
					$return['data'] = $result['msg'];
					$return['jump'] = $jump_url;					
					ajax_return($return);
				}
				else
				{
					$GLOBALS['tmpl']->assign('integrate_result',$result['msg']);					
					showSuccess("登录成功",$ajax,$jump_url);
				}
			}
		}
		else
		{
			if($result['data'] == ACCOUNT_NO_EXIST_ERROR)
			{
				$err = "会员不存在";
			}
			if($result['data'] == ACCOUNT_PASSWORD_ERROR)
			{
				$err = "密码错误";
			}
			showErr($err,$ajax);
		}
	}
	
	public function loginout()
	{		
		$ajax = intval($_REQUEST['ajax']);
		require_once APP_ROOT_PATH."system/libs/user.php";
		$result = loginout_user();
		if($result['status'])
		{
			es_cookie::delete("email");
			es_cookie::delete("user_pwd");
			es_cookie::delete("hide_user_notify");
			if($ajax==1)
			{
				$return['status'] = 1;
				$return['info'] = "登出成功";
				$return['data'] = $result['msg'];
				$return['jump'] = get_gopreview();					
				ajax_return($return);
			}
			else
			{
				$GLOBALS['tmpl']->assign('integrate_result',$result['msg']);
				if(trim(app_conf("INTEGRATE_CODE"))=='')
				{
					app_redirect_preview();
				}
				else
				showSuccess("登出成功",0,get_gopreview());
			}
		}
		else
		{
			if($ajax==1)
			{
				$return['status'] = 1;
				$return['info'] = "登出成功";
				$return['jump'] = get_gopreview();					
				ajax_return($return);
			}
			else
			app_redirect(get_gopreview());		
		}
	}
	
	public function getpassword()
	{
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
		if (!$GLOBALS['tmpl']->is_cached('user_getpassword.html', $cache_id))	
		{			 
			$GLOBALS['tmpl']->assign("page_title","邮件取回密码");
		}
		$GLOBALS['tmpl']->display("user_getpassword.html",$cache_id);
	}
	
	public function do_getpassword()
	{
		
		$email = strim($_REQUEST['email']);
		$ajax = intval($_REQUEST['ajax']);
		if(!check_ipop_limit(get_client_ip(),"user_do_getpassword",5))
		showErr("提交太快",$ajax);	
		if(!check_email($email))
		{
			showErr("邮箱格式有误",$ajax);
		}
		elseif($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where email ='".$email."'") == 0)
		{
			showErr("邮箱不存在",$ajax);
		}
		else 
		{
			$user_info = $GLOBALS['db']->getRow('select * from '.DB_PREFIX."user where email='".$email."'");
			send_user_password_mail($user_info['id']);
			showSuccess("邮件已经寄出，请查看您的邮箱!",$ajax);
		}
	}
	
	
	public function register()
	{		
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
		if (!$GLOBALS['tmpl']->is_cached('user_register.html', $cache_id))
		{		
			$GLOBALS['tmpl']->assign("page_title","会员注册");
		}
		$GLOBALS['tmpl']->display("user_register.html",$cache_id);
	}
	
	public function register_check()
	{
		$field = strim($_REQUEST['field']);
		$value = strim($_REQUEST['value']);
		require_once APP_ROOT_PATH."system/libs/user.php";
		$result = check_user($field,$value);
		if($result['status']==0)
		{
			if($result['data']['field_name']=='user_name')
			{
				$field_name = "会员帐号";
			}
			if($result['data']['field_name']=='mobile')
			{
				$field_name = "会员手机";
			}
			if($result['data']['field_name']=='email')
			{
				$field_name = "电子邮箱";
			}
			if($result['data']['error']==EMPTY_ERROR)
			{
				$error = "不能为空";
			}
			if($result['data']['error']==FORMAT_ERROR)
			{
				$error = "格式有误";
			}
			if($result['data']['error']==EXIST_ERROR)
			{
				$error = "已存在";
			}
			$return = array('status'=>0,"info"=>$field_name.$error);
			ajax_return($return);
		}
		else
		{
			$return = array('status'=>1);
			ajax_return($return);
		}
		
		
	}
	
	
	private function register_check_all()
	{
		$user_name = strim($_REQUEST['user_name']);
		$email = strim($_REQUEST['email']);
		$user_pwd = strim($_REQUEST['user_pwd']);
		$confirm_user_pwd = strim($_REQUEST['confirm_user_pwd']);
		
		$data = array();
		require_once APP_ROOT_PATH."system/libs/user.php";
		
		$user_name_result = check_user("user_name",$user_name);		
		if($user_name_result['status']==0)
		{
			if($user_name_result['data']['error']==EMPTY_ERROR)
			{
				$error = "不能为空";
				$type = "form_tip";
			}
			if($user_name_result['data']['error']==FORMAT_ERROR)
			{
				$error = "格式有误";
				$type="form_error";
			}
			if($user_name_result['data']['error']==EXIST_ERROR)
			{
				$error = "已存在";
				$type="form_error";
			}
			$data[] = array("type"=>$type,"field"=>"user_name","info"=>"会员帐号".$error);	
		}
		else
		{
			$data[] = array("type"=>"form_success","field"=>"user_name","info"=>"");	
		}
		
		$email_result = check_user("email",$email);		
		if($email_result['status']==0)
		{
			if($email_result['data']['error']==EMPTY_ERROR)
			{
				$error = "不能为空";
				$type = "form_tip";
			}
			if($email_result['data']['error']==FORMAT_ERROR)
			{
				$error = "格式有误";
				$type="form_error";
			}
			if($email_result['data']['error']==EXIST_ERROR)
			{
				$error = "已存在";
				$type="form_error";
			}
			$data[] = array("type"=>$type,"field"=>"email","info"=>"电子邮箱".$error);	
		}
		else
		{
			$data[] = array("type"=>"form_success","field"=>"email","info"=>"");	
		}
		
		if($user_pwd=="")
		{
			$user_pwd_result['status'] = 0;
			$data[] = array("type"=>"form_tip","field"=>"user_pwd","info"=>"请输入会员密码");	
		}
		elseif(strlen($user_pwd)<4)
		{
			$user_pwd_result['status'] = 0;
			$data[] = array("type"=>"form_error","field"=>"user_pwd","info"=>"密码不得小于四位");	
		}
		else
		{
			$user_pwd_result['status'] = 1;
			$data[] = array("type"=>"form_success","field"=>"user_pwd","info"=>"");	
		}
		
		if($user_pwd==$confirm_user_pwd)
		{
			$confirm_user_pwd_result['status'] = 1;
			$data[] = array("type"=>"form_success","field"=>"confirm_user_pwd","info"=>"");	
		}
		else
		{
			$confirm_user_pwd_result['status'] = 0;
			$data[] = array("type"=>"form_error","field"=>"confirm_user_pwd","info"=>"确认密码失败");	
		}
		
		if($email_result['status']==1&&$user_name_result['status']==1&&$user_pwd_result['status']==1&&$confirm_user_pwd_result['status']==1)
		{
			$return = array("status"=>1);
		}
		else
		{
			$return = array("status"=>0,"data"=>$data,"info"=>"");
		}
		
		return $return;
		
	}
	
	
	public function do_register()
	{		
		require_once APP_ROOT_PATH."system/libs/user.php";
		$return = $this->register_check_all();
		if($return['status']==0)
		{
			ajax_return($return);
		}		
		$user_data = $_POST;
		foreach($_POST as $k=>$v)
		{
			$user_data[$k] = strim($v);
		}	
		$user_data['is_effect'] = 1;

		$res = save_user($user_data);
		
	
		if($res['status'] == 1)
		{
			if(!check_ipop_limit(get_client_ip(),"user_do_register",5))
			showErr("提交太快",1);	
			
			$user_id = intval($res['data']);
			$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$user_id);
			if($user_info['is_effect']==1)
			{
				//在此自动登录
				do_login_user($user_data['email'],$user_data['user_pwd']);
				ajax_return(array("status"=>1,"jump"=>get_gopreview()));
			}
			else
			{
				ajax_return(array("status"=>0,"info"=>"请等待管理员审核"));
			}
		}
		else
		{
			$error = $res['data'];	
			if($error['field_name']=="user_name")
			{
				$data[] = array("type"=>"form_success","field"=>"email","info"=>"");	
				$field_name = "会员帐号";
			}
			if($error['field_name']=="email")
			{
				$data[] = array("type"=>"form_success","field"=>"user_name","info"=>"");
				$field_name = "电子邮箱";
			}
		
			if($error['error']==EMPTY_ERROR)
			{
				$error_info = "不能为空";
				$type = "form_tip";
			}
			if($error['error']==FORMAT_ERROR)
			{
				$error_info = "格式有误";
				$type="form_error";
			}
			if($error['error']==EXIST_ERROR)
			{
				$error_info = "已存在";
				$type="form_error";
			}
			
			$data[] = array("type"=>$type,"field"=>$error['field_name'],"info"=>$field_name.$error_info);	
			ajax_return(array("status"=>0,"data"=>$data,"info"=>""));			
			
		}
	}
	
	public function api_register()
	{			
		$api_info = es_session::get("api_user_info");		
		if(!$api_info)
		{
			app_redirect_preview();
		}
		
		$GLOBALS['tmpl']->assign("api_info",$api_info);
		$GLOBALS['tmpl']->assign("page_title","帐号绑定");
		$GLOBALS['tmpl']->display("user_api_register.html");
	}
	
	public function do_api_register()
	{
		require_once APP_ROOT_PATH."system/libs/user.php";
		$api_info = es_session::get("api_user_info");		
		if(!$api_info)
		{
			app_redirect_preview();
		}
		$user_name = strim($_REQUEST['user_name']);
		$email = strim($_REQUEST['email']);
		
		$user_data['user_name'] = $user_name;
		$user_data['email'] = $email;
		$user_data['user_pwd'] = rand(100000,999999);
		$user_data['province'] = $api_info['province'];
		$user_data['city'] = $api_info['city'];
		$user_data['is_effect'] = 1;
		$user_data['sex'] = $api_info['sex'];
		
		$res = save_user($user_data);
		
	
		if($res['status'] == 1)
		{
			if(!check_ipop_limit(get_client_ip(),"user_do_api_register",5))
			showErr("提交太快",1);	
			$user_id = intval($res['data']);
			$GLOBALS['db']->query("update ".DB_PREFIX."user set ".$api_info['field']." = '".$api_info['name']."',".$api_info['token_field']." = '".$api_info['token']."',".$api_info['secret_field']." = '".$api_info['secret']."',".$api_info['url_field']." = '".$api_info['url']."' where id = ".$user_id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_weibo where user_id = ".$user_id." and weibo_url = '".$api_info['url']."'");
			
			update_user_weibo($user_id,$api_info['url']); 
			$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$user_id);
			if($user_info['is_effect']==1)
			{
				//在此自动登录
				do_login_user($user_data['email'],$user_data['user_pwd']);
				ajax_return(array("status"=>1,"jump"=>get_gopreview()));
			}
			else
			{
				ajax_return(array("status"=>0,"info"=>"请等待管理员审核","jump"=>get_gopreview()));
			}
		}
		else
		{
			$error = $res['data'];	
			if($error['field_name']=="user_name")
			{
				$data[] = array("type"=>"form_success","field"=>"email","info"=>"");	
				$field_name = "会员帐号";
			}
			if($error['field_name']=="email")
			{
				$data[] = array("type"=>"form_success","field"=>"user_name","info"=>"");
				$field_name = "电子邮箱";
			}
		
			if($error['error']==EMPTY_ERROR)
			{
				$error_info = "不能为空";
				$type = "form_tip";
			}
			if($error['error']==FORMAT_ERROR)
			{
				$error_info = "格式有误";
				$type="form_error";
			}
			if($error['error']==EXIST_ERROR)
			{
				$error_info = "已存在";
				$type="form_error";
			}
			ajax_return(array("status"=>0,"info"=>$field_name.$error_info,"field"=>$error['field_name'],"jump"=>get_gopreview()));			
			
		}
		
	}
	
	public function api_login()
	{			
		$api_info = es_session::get("api_user_info");		
		if(!$api_info)
		{
			app_redirect_preview();
		}
		$GLOBALS['tmpl']->assign("api_info",$api_info);
		$GLOBALS['tmpl']->assign("page_title","帐号绑定");
		$GLOBALS['tmpl']->display("user_api_login.html");
	}
	
	
	public function do_api_login()
	{		
		
		
		$api_info = es_session::get("api_user_info");		
		if(!$api_info)
		{
			app_redirect_preview();
		}
		
		if(!$_POST)
		{
			app_redirect(APP_ROOT."/");
		}
		foreach($_POST as $k=>$v)
		{
			$_POST[$k] = strim($v);
		}
		$ajax = intval($_REQUEST['ajax']);
		if(!check_ipop_limit(get_client_ip(),"user_do_api_login",5))
		showErr("提交太快",$ajax);	
		
		require_once APP_ROOT_PATH."system/libs/user.php";
		$result = do_login_user($_POST['email'],$_POST['user_pwd']);				
		if($result['status'])
		{	
			$s_user_info = es_session::get("user_info");
			$GLOBALS['db']->query("update ".DB_PREFIX."user set ".$api_info['field']." = '".$api_info['name']."',".$api_info['token_field']." = '".$api_info['token']."',".$api_info['secret_field']." = '".$api_info['secret']."',".$api_info['url_field']." = '".$api_info['url']."' where id = ".$s_user_info['id']);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_weibo where user_id = ".intval($s_user_info['id'])." and weibo_url = '".$api_info['url']."'");
			update_user_weibo(intval($s_user_info['id']),$api_info['url']);
			if($ajax==0&&trim(app_conf("INTEGRATE_CODE"))=='')
			{
				$redirect = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:url("index");
				app_redirect($redirect);
			}
			else
			{			
				$jump_url = get_gopreview();				
				if($ajax==1)
				{
					$return['status'] = 1;
					$return['info'] = "登录成功";
					$return['data'] = $result['msg'];
					$return['jump'] = $jump_url;					
					ajax_return($return);
				}
				else
				{
					$GLOBALS['tmpl']->assign('integrate_result',$result['msg']);					
					showSuccess("登录成功",$ajax,$jump_url);
				}
			}
		}
		else
		{
			if($result['data'] == ACCOUNT_NO_EXIST_ERROR)
			{
				$err = "会员不存在";
			}
			if($result['data'] == ACCOUNT_PASSWORD_ERROR)
			{
				$err = "密码错误";
			}
			showErr($err,$ajax);
		}
	}
	
	public function add_weibo()
	{
		$GLOBALS['tmpl']->display("inc/weibo_row.html");
	}
	
}
?>