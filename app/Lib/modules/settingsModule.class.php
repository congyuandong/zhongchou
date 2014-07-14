<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class settingsModule extends BaseModule
{
	public function index()
	{		
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		$region_pid = 0;
		$region_lv2 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."region_conf where region_level = 2 order by py asc");  //二级地址
		foreach($region_lv2 as $k=>$v)
		{
			if($v['name'] == $GLOBALS['user_info']['province'])
			{
				$region_lv2[$k]['selected'] = 1;
				$region_pid = $region_lv2[$k]['id'];
				break;
			}
		}
		$GLOBALS['tmpl']->assign("region_lv2",$region_lv2);
		
		
		if($region_pid>0)
		{
			$region_lv3 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."region_conf where pid = ".$region_pid." order by py asc");  //三级地址
			foreach($region_lv3 as $k=>$v)
			{
				if($v['name'] == $GLOBALS['user_info']['city'])
				{
					$region_lv3[$k]['selected'] = 1;
					break;
				}
			}
			$GLOBALS['tmpl']->assign("region_lv3",$region_lv3);
		}
		
		$weibo_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_weibo where user_id = ".intval($GLOBALS['user_info']['id']));
		$GLOBALS['tmpl']->assign("weibo_list",$weibo_list);
		
		$GLOBALS['tmpl']->display("settings_index.html");
	}
	
	public function save_index()
	{		
		$ajax = intval($_REQUEST['ajax']);		
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		if(!check_ipop_limit(get_client_ip(),"setting_save_index",5))
		showErr("提交太频繁",$ajax,"");	
		
		require_once APP_ROOT_PATH."system/libs/user.php";


		$user_data = array();
		$user_data['province'] = strim($_REQUEST['province']);
		$user_data['city'] = strim($_REQUEST['city']);
		$user_data['sex'] = intval($_REQUEST['sex']);
		$user_data['intro'] = strim($_REQUEST['intro']);
		$user_data['intro'] = strim($_REQUEST['intro']);
		$GLOBALS['db']->autoExecute(DB_PREFIX."user",$user_data,"UPDATE","id=".intval($GLOBALS['user_info']['id']));
		
		$GLOBALS['db']->query("delete from ".DB_PREFIX."user_weibo where user_id = ".intval($GLOBALS['user_info']['id']));
		foreach($_REQUEST['weibo_url'] as $k=>$v)
		{
			if($v!="")
			{
				$weibo_data = array();
				$weibo_data['user_id'] = intval($GLOBALS['user_info']['id']);
				$weibo_data['weibo_url'] = strim($v);
				$GLOBALS['db']->autoExecute(DB_PREFIX."user_weibo",$weibo_data);
			}
		}
		
		showSuccess("资料保存成功",$ajax,"");
		//$res = save_user($user_data);
	}
	
	public function password()
	{		
		if(intval($_REQUEST['code'])!=0)
		{
			$uid = intval($_REQUEST['id']);
			$code = intval($_REQUEST['code']); 
			$GLOBALS['user_info'] = $user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$uid." and password_verify = '".$code."' and is_effect = 1");
			if($user_info)
			{
				es_session::set("user_info",$user_info);
				$GLOBALS['tmpl']->assign("user_info",$user_info);
				$GLOBALS['db']->query("update ".DB_PREFIX."user set password_verify = '' where id = ".$uid);
			}
			else
			{
				app_redirect(url("index"));
			}
		}
		else if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));		
		$GLOBALS['tmpl']->display("settings_password.html");
	}
	
	
	public function save_password()
	{		
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		if(!check_ipop_limit(get_client_ip(),"setting_save_password",5))
		showErr("提交太频繁",$ajax,"");	
		
		$user_pwd = strim($_REQUEST['user_pwd']);
		$confirm_user_pwd = strim($_REQUEST['confirm_user_pwd']);
		if(strlen($user_pwd)<4)
		{
			showErr("密码不能低于四位",$ajax,"");
		}
		if($user_pwd!=$confirm_user_pwd)
		{
			showErr("密码确认失败",$ajax,"");
		}
		
		require_once APP_ROOT_PATH."system/libs/user.php";
		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));
		$user_info['user_pwd'] = $user_pwd;
		save_user($user_info,"UPDATE");
		
		showSuccess("保存成功",$ajax,"");
		//$res = save_user($user_data);
	}

	public function bind()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		
		$api_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."api_login");
		foreach($api_list as $k=>$v)
		{
			if($GLOBALS['user_info'][strtolower($v['class_name'])."_id"]!='')
			{
				$api_list[$k]['is_bind'] = true;
				$api_list[$k]['weibo_url'] = $GLOBALS['user_info'][strtolower($v['class_name'])."_url"];
			}
			else
			{
				$api_list[$k]['is_bind'] = false;
				require_once APP_ROOT_PATH."system/api_login/".$v['class_name']."_api.php";
				$class_name = $v['class_name']."_api";
				$o = new $class_name($v);
				$api_list[$k]['url'] = $o->get_bind_api_url();
			}
			
		}
		
		
		$GLOBALS['tmpl']->assign("api_list",$api_list);
		$GLOBALS['tmpl']->display("settings_bind.html");
	}
	
	public function unbind()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		$class_name = strtolower(strim($_REQUEST['c']));
		
		update_user_weibo($GLOBALS['user_info']['id'],$GLOBALS['user_info'][$class_name.'_url'],2); //删除微博		
		$GLOBALS['db']->query("update ".DB_PREFIX."user set ".$class_name."_id = '',".$class_name."_url = '' where id = ".intval($GLOBALS['user_info']['id']),"SILENT");
		
		app_redirect(url("settings#bind"));
	}
	
	public function consignee()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));

		$consignee_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_consignee where user_id = ".intval($GLOBALS['user_info']['id']));
		$GLOBALS['tmpl']->assign("consignee_list",$consignee_list);
		$GLOBALS['tmpl']->display("settings_consignee.html");
	}
	
	public function add_consignee()
	{

		if(!$GLOBALS['user_info'])
		{
			$data['html'] = $GLOBALS['tmpl']->display("inc/user_login_box.html","",true);			
			$data['status'] = 0;
		}
		else
		{
			$GLOBALS['tmpl']->caching = true;
			$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
			if (!$GLOBALS['tmpl']->is_cached('inc/add_consignee.html', $cache_id))
			{		
				$region_lv2 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."region_conf where region_level = 2 order by py asc");  //二级地址
				$GLOBALS['tmpl']->assign("region_lv2",$region_lv2);
			}			
			$data['html'] = $GLOBALS['tmpl']->display("inc/add_consignee.html",$cache_id,true);			
			$data['status'] = 1;
		}
		ajax_return($data);
	}
	
	public function save_consignee()
	{		
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		if($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_consignee where user_id = ".intval($GLOBALS['user_info']['id']))>10)
		{
			showErr("每个会员只能预设10个配送地址",$ajax,"");
		}
		
		$id = intval($_REQUEST['id']);
		$consignee = strim($_REQUEST['consignee']);
		$province = strim($_REQUEST['province']);
		$city = strim($_REQUEST['city']);
		$address = strim($_REQUEST['address']);
		$zip = strim($_REQUEST['zip']);
		$mobile = strim($_REQUEST['mobile']);
		if($consignee=="")
		{
			showErr("请填写收货人姓名",$ajax,"");	
		}
		if($province=="")
		{
			showErr("请选择省份",$ajax,"");	
		}
		if($city=="")
		{
			showErr("请选择城市",$ajax,"");	
		}
		if($address=="")
		{
			showErr("请填写详细地址",$ajax,"");	
		}
		if($mobile=="")
		{
			showErr("请填写收货人手机号码",$ajax,"");	
		}
		if(!check_mobile($mobile))
		{
			showErr("请填写正确的手机号码",$ajax,"");	
		}
		
		$data = array();
		$data['consignee'] = $consignee;
		$data['province'] = $province;
		$data['city'] = $city;
		$data['address'] = $address;
		$data['zip'] = $zip;
		$data['mobile'] = $mobile;
		$data['user_id'] = intval($GLOBALS['user_info']['id']);
		
		
		
		if(!check_ipop_limit(get_client_ip(),"setting_save_consignee",5))
		showErr("提交太频繁",$ajax,"");	
		
		if($id>0)
		$GLOBALS['db']->autoExecute(DB_PREFIX."user_consignee",$data,"UPDATE","id=".$id);
		else
		$GLOBALS['db']->autoExecute(DB_PREFIX."user_consignee",$data);
		
		showSuccess("保存成功",$ajax,get_gopreview());
		//$res = save_user($user_data);
	}
	
	public function edit_consignee()
	{

		if(!$GLOBALS['user_info'])
		{
			$data['html'] = $GLOBALS['tmpl']->display("inc/user_login_box.html","",true);			
			$data['status'] = 0;
		}
		else
		{
			$id = intval($_REQUEST['id']);
			$consignee_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_consignee where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
			
			$region_pid = 0;
			$region_lv2 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."region_conf where region_level = 2 order by py asc");  //二级地址
			foreach($region_lv2 as $k=>$v)
			{
				if($v['name'] == $consignee_info['province'])
				{
					$region_lv2[$k]['selected'] = 1;
					$region_pid = $region_lv2[$k]['id'];
					break;
				}
			}
			$GLOBALS['tmpl']->assign("region_lv2",$region_lv2);
			
			
			if($region_pid>0)
			{
				$region_lv3 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."region_conf where pid = ".$region_pid." order by py asc");  //三级地址
				foreach($region_lv3 as $k=>$v)
				{
					if($v['name'] == $consignee_info['city'])
					{
						$region_lv3[$k]['selected'] = 1;
						break;
					}
				}
				$GLOBALS['tmpl']->assign("region_lv3",$region_lv3);
			}
						
			$GLOBALS['tmpl']->assign("consignee_info",$consignee_info);
			$data['html'] = $GLOBALS['tmpl']->display("inc/add_consignee.html","",true);			
			$data['status'] = 1;
		}
		ajax_return($data);
	}
	
	public function del_consignee()
	{
		if(!$GLOBALS['user_info'])
		{
			$data['html'] = $GLOBALS['tmpl']->display("inc/user_login_box.html","",true);			
			$data['status'] = 1;
			ajax_return($data);
		}
		else
		{
			$id = intval($_REQUEST['id']);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_consignee where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
			
			showSuccess("",1,get_gopreview());
		}
	}
	
	
	public function bank()
	{		
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		if($GLOBALS['user_info']['ex_real_name']!=""||$GLOBALS['user_info']['ex_account_info']!=""||$GLOBALS['user_info']['ex_contact']!="")
		{
			app_redirect_preview();
		}
		
		$GLOBALS['tmpl']->display("settings_bank.html");
	}
	
	
	public function save_bank()
	{		
		$ajax = intval($_REQUEST['ajax']);		
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		if($GLOBALS['user_info']['ex_real_name']!=""||$GLOBALS['user_info']['ex_account_info']!=""||$GLOBALS['user_info']['ex_contact']!="")
		{
			showErr("银行帐户信息已经设置过",$ajax,"");	
		}
		
		if(!check_ipop_limit(get_client_ip(),"setting_save_bank",5))
		showErr("提交太频繁",$ajax,"");	
		
		$ex_real_name = strim($_REQUEST['ex_real_name']);
		$ex_account_info = strim($_REQUEST['ex_account_info']);
		$ex_contact = strim($_REQUEST['ex_contact']);
		
		if($ex_real_name==""||$ex_account_info==""||$ex_contact=="")
		{
			showErr("请填写完整的信息",$ajax,"");	
		}
		
		$GLOBALS['db']->query("update ".DB_PREFIX."user set ex_real_name = '".$ex_real_name."',ex_account_info = '".$ex_account_info."',ex_contact = '".$ex_contact."' where id = ".intval($GLOBALS['user_info']['id']));
		
		showSuccess("资料保存成功",$ajax,url("settings"));
		//$res = save_user($user_data);
	}
}
?>