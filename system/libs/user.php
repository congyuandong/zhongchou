<?php 
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

define("EMPTY_ERROR",1);  //未填写的错误
define("FORMAT_ERROR",2); //格式错误
define("EXIST_ERROR",3); //已存在的错误

define("ACCOUNT_NO_EXIST_ERROR",1); //帐户不存在
define("ACCOUNT_PASSWORD_ERROR",2); //帐户密码错误
define("ACCOUNT_NO_VERIFY_ERROR",3); //帐户未激活


	/**
	 * 生成会员数据
	 * @param $user_data  提交[post或get]的会员数据
	 * @param $mode  处理的方式，注册或保存
	 * 返回：data中返回出错的字段信息，包括field_name, 可能存在的field_show_name 以及 error 错误常量
	 * 不会更新保存的字段为：score,money,verify,pid
	 */
	function save_user($user_data,$mode='INSERT')
	{		
		//开始数据验证
		$res = array('status'=>1,'info'=>'','data'=>''); //用于返回的数据
		if(trim($user_data['user_name'])=='')
		{
			$field_item['field_name'] = 'user_name';
			$field_item['error']	=	EMPTY_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where user_name = '".trim($user_data['user_name'])."' and id <> ".intval($user_data['id']))>0)
		{
			$field_item['field_name'] = 'user_name';
			$field_item['error']	=	EXIST_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where email = '".trim($user_data['email'])."' and id <> ".intval($user_data['id']))>0)
		{
			$field_item['field_name'] = 'email';
			$field_item['error']	=	EXIST_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if(trim($user_data['email'])=='')
		{
			$field_item['field_name'] = 'email';
			$field_item['error']	=	EMPTY_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if(!check_email(trim($user_data['email'])))
		{
			$field_item['field_name'] = 'email';
			$field_item['error']	=	FORMAT_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		
		if(!check_mobile(trim($user_data['mobile'])))
		{
			$field_item['field_name'] = 'mobile';
			$field_item['error']	=	FORMAT_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
//		if($user_data['mobile']!=''&&$GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where mobile = '".trim($user_data['mobile'])."' and id <> ".intval($user_data['id']))>0)
//		{
//			$field_item['field_name'] = 'mobile';
//			$field_item['error']	=	EXIST_ERROR;
//			$res['status'] = 0;
//			$res['data'] = $field_item;
//			return $res;
//		}
		
		
		//验证结束开始插入数据
		$user['user_name'] = $user_data['user_name'];
		$user['create_time'] = get_gmtime();
		$user['update_time'] = get_gmtime();
		$user['pid'] = $user_data['pid'];
		$user['province'] = $user_data['province'];
		$user['city'] = $user_data['city'];
		if(isset($user_data['sex']))
		$user['sex'] = intval($user_data['sex']);
		$user['intro'] = strim($user_data['intro']);
		$user['ex_real_name'] = strim($user_data['ex_real_name']);
		$user['ex_account_info'] = strim($user_data['ex_account_info']);
		$user['ex_contact'] = strim($user_data['ex_contact']);
		
		$user['get_user_msg'] = intval($user_data['get_user_msg']);		
		$user['get_deal_msg'] = intval($user_data['get_deal_msg']);
		
		//会员状态
		if(intval($user_data['is_effect'])!=0)
		{
			$user['is_effect'] = $user_data['is_effect'];
		}
		
		$user['email'] = $user_data['email'];
		$user['mobile'] = $user_data['mobile'];
		if($mode == 'INSERT')
		{
			$user['code'] = ''; //默认不使用code, 该值用于其他系统导入时的初次认证
		}
		else
		{
			$user['code'] = $GLOBALS['db']->getOne("select code from ".DB_PREFIX."user where id =".$user_data['id']);
		}
		if(isset($user_data['user_pwd'])&&$user_data['user_pwd']!='')
		$user['user_pwd'] = md5($user_data['user_pwd'].$user['code']);
		
		//载入会员整合
		$integrate_code = trim(app_conf("INTEGRATE_CODE"));
		if($integrate_code!='')
		{
			$integrate_file = APP_ROOT_PATH."system/integrate/".$integrate_code."_integrate.php";
			if(file_exists($integrate_file))
			{
				require_once $integrate_file;
				$integrate_class = $integrate_code."_integrate";
				$integrate_obj = new $integrate_class;
			}	
		}
		//同步整合
		if($integrate_obj)
		{
			if($mode == 'INSERT')
			{
				$res = $integrate_obj->add_user($user_data['user_name'],$user_data['user_pwd'],$user_data['email']);
				$user['integrate_id'] = intval($res['data']);
			}
			else
			{
				$add_res = $integrate_obj->add_user($user_data['user_name'],$user_data['user_pwd'],$user_data['email']);
				if(intval($add_res['status']))
				{
					$GLOBALS['db']->query("update ".DB_PREFIX."user set integrate_id = ".intval($add_res['data'])." where id = ".intval($user_data['id']));
				}
				else
				{
					if(isset($user_data['user_pwd'])&&$user_data['user_pwd']!='') //有新密码
					{
						$status = $integrate_obj->edit_user($user,$user_data['user_pwd']);
						if($status<=0)
						{
							//修改密码失败
							$res['status'] = 0;						
						}
					}
				}
			}			
			if(intval($res['status'])==0) //整合注册失败
			{
				return $res;
			}
		}
		
		
		
		if($mode == 'INSERT')
		{
			$s_api_user_info = es_session::get("api_user_info");
			$user[$s_api_user_info['field']] = $s_api_user_info['id'];
			es_session::delete("api_user_info");
			$where = '';
		}
		else
		{			
			unset($user['pid']);
			$where = "id=".intval($user_data['id']);
		}
		if($GLOBALS['db']->autoExecute(DB_PREFIX."user",$user,$mode,$where))
		{
			if($mode == 'INSERT')
			{
				$user_id = $GLOBALS['db']->insert_id();	
				$register_money = doubleval(0);
				if($register_money>0)
				{
					$user_get['money'] = $register_money;
					modify_account($user_get,intval($user_id),"在".to_date(get_gmtime())."注册成功");
				}
			}
			else
			{
				$user_id = $user_data['id'];
			}
		}
		$res['data'] = $user_id;
		
		return $res;
	}

	/**
	 * 删除会员以及相关数据
	 * @param integer $id
	 */
	function delete_user($id)
	{
		
		$result = 1;
		//载入会员整合
		$integrate_code = trim(app_conf("INTEGRATE_CODE"));
		if($integrate_code!='')
		{
			$integrate_file = APP_ROOT_PATH."system/integrate/".$integrate_code."_integrate.php";
			if(file_exists($integrate_file))
			{
				require_once $integrate_file;
				$integrate_class = $integrate_code."_integrate";
				$integrate_obj = new $integrate_class;
			}	
		}
		if($integrate_obj)
		{
			$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$id);			
			$result = $integrate_obj->delete_user($user_info);				
		}
		
		if($result>0)
		{

			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_consignee where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_log where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_refund where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_weibo where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user_consignee where user_id = ".$id);
			
			//$GLOBLAS['db']->query("delete from ".DB_PREFIX."deal where user_id = ".$id); //不删除相关的项目记录
			
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_comment where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_focus_log where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_log where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_msg_list where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_order where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_log where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_support_log where user_id = ".$id);
			$GLOBALS['db']->query("delete from ".DB_PREFIX."payment_notice where user_id = ".$id);
			
			$GLOBALS['db']->query("delete from ".DB_PREFIX."user where id =".$id); //删除会员			
		}
	}

	/**
	 * 会员资金积分变化操作函数
	 * @param array $data 包括 money
	 * @param integer $user_id
	 * @param string $log_msg 日志内容
	 */
	function modify_account($data,$user_id,$log_msg='')
	{
		if(floatval($data['money'])!=0)
		{
			$sql = "update ".DB_PREFIX."user set money = money + ".doubleval($data['money'])." where id =".$user_id;
			$GLOBALS['db']->query($sql);
		}
		
		if(doubleval($data['money'])!=0)
		{		
			$log_info['log_info'] = $log_msg;
			$log_info['log_time'] = get_gmtime();
			$adm_session = es_session::get(md5(app_conf("AUTH_KEY")));
			$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where is_effect = 1 and id = ".$user_id);
			$adm_id = intval($adm_session['adm_id']);
			if($adm_id!=0)
			{
				$log_info['log_admin_id'] = $adm_id;
			}
			$log_info['money'] = doubleval($data['money']);
			$log_info['user_id'] = $user_id;
			$GLOBALS['db']->autoExecute(DB_PREFIX."user_log",$log_info);
			
		}
	}

	/**
	 * 处理cookie的自动登录
	 * @param $user_name_or_email  用户名或邮箱
	 * @param $user_md5_pwd  md5加密过的密码
	 */
	function auto_do_login_user($user_name_or_email,$user_md5_pwd)
	{
		$user_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where (user_name='".$user_name_or_email."' or email = '".$user_name_or_email."') and is_effect = 1");
	
		if($user_data)
		{
			if(md5($user_data['user_pwd']."_EASE_COOKIE")==$user_md5_pwd)
			{
				//成功				
				$build_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where is_delete = 0 and is_effect = 1 and user_id = ".$user_data['id']);
				$focus_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_focus_log where user_id = ".$user_data['id']);
				$support_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_support_log where user_id = ".$user_data['id']);
				es_session::set("user_info",$user_data);
				$GLOBALS['user_info'] = $user_data;
				$GLOBALS['db']->query("update ".DB_PREFIX."user set login_ip = '".get_client_ip()."',login_time= ".get_gmtime().",build_count = $build_count,support_count = $support_count,focus_count = $focus_count where id =".$user_data['id']);				
			}
		}
	}
	/**
	 * 处理会员登录
	 * @param $user_name_or_email 用户名或邮箱地址
	 * @param $user_pwd 密码
	 * 
	 */
	function do_login_user($user_name_or_email,$user_pwd)
	{
		$user_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where (user_name='".$user_name_or_email."' or email = '".$user_name_or_email."')");
	
		//载入会员整合
		$integrate_code = trim(app_conf("INTEGRATE_CODE"));
		if($integrate_code!='')
		{
			$integrate_file = APP_ROOT_PATH."system/integrate/".$integrate_code."_integrate.php";
			if(file_exists($integrate_file))
			{
				require_once $integrate_file;
				$integrate_class = $integrate_code."_integrate";
				$integrate_obj = new $integrate_class;
			}	
		}
		if($integrate_obj)
		{			
			$result = $integrate_obj->login($user_name_or_email,$user_pwd);	
							
		}
		
		$user_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where (user_name='".$user_name_or_email."' or email = '".$user_name_or_email."')");	
		if(!$user_data)
		{			
			$result['status'] = 0;
			$result['data'] = ACCOUNT_NO_EXIST_ERROR;
			return $result;
		}
		else
		{
			$result['user'] = $user_data;
			if($user_data['user_pwd'] != md5($user_pwd.$user_data['code'])&&$user_data['user_pwd']!=$user_pwd)
			{
				$result['status'] = 0;
				$result['data'] = ACCOUNT_PASSWORD_ERROR;
				return $result;
			}
			elseif($user_data['is_effect'] != 1)
			{
				$result['status'] = 0;
				$result['data'] = ACCOUNT_NO_VERIFY_ERROR;
				return $result;
			}
			else
			{

				if(intval($result['status'])==0) //未整合，则直接成功
				{
					$result['status'] = 1;
				}
				
				$build_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where is_delete = 0 and is_effect = 1 and user_id = ".$user_data['id']);
				$focus_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_focus_log where user_id = ".$user_data['id']);
				$support_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_support_log where user_id = ".$user_data['id']);
				
				
				es_session::set("user_info",$user_data);
				$GLOBALS['user_info'] = $user_data;
				
				$GLOBALS['db']->query("update ".DB_PREFIX."user set login_ip = '".get_client_ip()."',login_time= ".get_gmtime().",build_count = $build_count,support_count = $support_count,focus_count = $focus_count where id =".$user_data['id']);				
				$s_api_user_info = es_session::get("api_user_info");
				
				if($s_api_user_info)
				{
					$GLOBALS['db']->query("update ".DB_PREFIX."user set ".$s_api_user_info['field']." = '".$s_api_user_info['id']."' where id = ".$user_data['id']." and (".$s_api_user_info['field']." = 0 or ".$s_api_user_info['field']."='')");
					es_session::delete("api_user_info");
				}				
				return $result;
			}
		}
	}
	
	/**
	 * 登出,返回 array('status'=>'',data=>'',msg=>'') msg存放整合接口返回的字符串
	 */
	function loginout_user()
	{
		$user_info = es_session::get("user_info");
		if(!$user_info)
		{
			return false;
		}
		else
		{
			//载入会员整合
			$integrate_code = trim(app_conf("INTEGRATE_CODE"));
			if($integrate_code!='')
			{
				$integrate_file = APP_ROOT_PATH."system/integrate/".$integrate_code."_integrate.php";
				if(file_exists($integrate_file))
				{
					require_once $integrate_file;
					$integrate_class = $integrate_code."_integrate";
					$integrate_obj = new $integrate_class;
				}	
			}
			if($integrate_obj)
			{
				$result = $integrate_obj->logout();					
			}
			if(intval($result['status'])==0)	
			{
				$result['status'] = 1;
			}			
			es_session::delete("user_info");
			return $result;
		}
	}
	
	
	
	
	
	/**
	 * 验证会员数据
	 */
	function check_user($field_name,$field_data)
	{		
		//开始数据验证
		$user_data[$field_name] = $field_data;
		$res = array('status'=>1,'info'=>'','data'=>''); //用于返回的数据
		if(trim($user_data['user_name'])==''&&$field_name=='user_name')
		{
			$field_item['field_name'] = 'user_name';
			$field_item['error']	=	EMPTY_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if(mb_strlen(trim($user_data['user_name']))<4&&$field_name=='user_name')
		{
			$field_item['field_name'] = 'user_name';
			$field_item['error']	=	FORMAT_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if($field_name=='user_name'&&$GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where user_name = '".trim($user_data['user_name'])."' and id <> ".intval($user_data['id']))>0)
		{
			$field_item['field_name'] = 'user_name';
			$field_item['error']	=	EXIST_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if($field_name=='email'&&$GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where email = '".trim($user_data['email'])."' and id <> ".intval($user_data['id']))>0)
		{
			$field_item['field_name'] = 'email';
			$field_item['error']	=	EXIST_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if($field_name=='email'&&trim($user_data['email'])=='')
		{
			$field_item['field_name'] = 'email';
			$field_item['error']	=	EMPTY_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		if($field_name=='email'&&!check_email(trim($user_data['email'])))
		{
			$field_item['field_name'] = 'email';
			$field_item['error']	=	FORMAT_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
		
		if($field_name=='mobile'&&!check_mobile(trim($user_data['mobile'])))
		{
			$field_item['field_name'] = 'mobile';
			$field_item['error']	=	FORMAT_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
		}
//		if($field_name=='mobile'&&$user_data['mobile']!=''&&$GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where mobile = '".trim($user_data['mobile'])."' and id <> ".intval($user_data['id']))>0)
//		{
//			$field_item['field_name'] = 'mobile';
//			$field_item['error']	=	EXIST_ERROR;
//			$res['status'] = 0;
//			$res['data'] = $field_item;
//			return $res;
//		}		
		
		return $res;
	}


?>