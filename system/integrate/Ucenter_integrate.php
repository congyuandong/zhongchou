<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

$lang = array(
	'name'	=>	'UCenter',
	'UCENTER_URL'	=>	'ucenter的Url',
	'UCENTER_ADMIN'	=>	'初始管理员密码',
	'UCENTER_IP'	=>	'ucenter的IP',
	'INTEGERATE_TYPE'	=>	'整合类型',
	'INTEGERATE_TYPE_1'	=>	'数据库方式整合[需要数据库连接权限]',
	'INTEGERATE_TYPE_2'	=>	'api_post整合[无需数据库连接，但不能同步已有数据]',
	'DB_CHARSET'	=>	'UC数据库编码',
	'DB_CHARSET_gbk'	=>	'GBK',
	'DB_CHARSET_utf-8'	=>	'UTF-8',
);

$config = array(
	'UCENTER_URL'	=>	'',
	'UCENTER_IP'	=>	'',
	'UCENTER_ADMIN'	=>	array(
		'INPUT_TYPE'	=>	'2'
	),
	'INTEGERATE_TYPE'	=>	array(
		'INPUT_TYPE'	=>	'1',
		'VALUES'	=> 	array(1,2)
	),
	'DB_CHARSET'	=>	array(
		'INPUT_TYPE'	=>	'1',
		'VALUES'	=> 	array('utf-8','gbk')
	),
);

/* 模块的基本信息 */
if (isset($read_modules) && $read_modules == true)
{
    $module['class_name']    = 'Ucenter';

    /* 名称 */
    $module['name']    = $lang['name'];

    $module['lang'] = $lang;
    $module['config'] = $config;
    
    return $module;
}

// Ucenter会员整合
require_once(APP_ROOT_PATH.'system/libs/integrate.php');
class Ucenter_integrate implements integrate {
	public function __construct()
	{
		if(file_exists(APP_ROOT_PATH . 'public/uc_config.php'))
    	require_once(APP_ROOT_PATH . 'public/uc_config.php');
	}
	
	//用户登录
	public function login($user_name,$user_pwd)
	{		
		if(UC_CHARSET!='utf-8')
		{
			$user_name = iconv("utf-8",UC_CHARSET,$user_name);
			$user_pwd = iconv("utf-8",UC_CHARSET,$user_pwd);
		}

		//有用户数据时
		list($uid, $uname, $pwd, $email, $repeat) = uc_call("uc_user_login", array($user_name,$user_pwd));	
		if($uid<=0)
		{
			list($uid, $uname, $pwd, $email, $repeat) = uc_call("uc_user_login", array($user_name,$user_pwd,2));	
		}
		if($uid>0)
		{
				if(UC_CHARSET!='utf-8')
				{				
					$uname = iconv(UC_CHARSET,"utf-8",$uname);
					$email = iconv(UC_CHARSET,"utf-8",$email);
					$pwd = iconv(UC_CHARSET,"utf-8",$pwd);
					$user_pwd = iconv(UC_CHARSET,"utf-8",$user_pwd);
				}
				$uname = addslashes($uname);
				$email = addslashes($email);
				$result = uc_call("uc_user_synlogin", array($uid));
				$ease_user = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where integrate_id = ".$uid." and user_name = '".$uname."'");
				if($ease_user&&$ease_user['user_pwd']=='')
				{
					//被同步过的存在于ucenter中的用户
					$GLOBALS['db']->query("update ".DB_PREFIX."user set user_pwd = '".md5($user_pwd)."',code='' where id = ".$ease_user['id']);
				}	
				elseif(!$ease_user)
				{
					if(!$GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where user_name = '".$uname."'")>0) 
					{
						$ease_user = array();
						$ease_user['is_effect'] = intval(app_conf("USER_VERIFY"));
						if($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where email = '".$email."'")>0)  //会员邮箱已存在时邮箱留空
						{
							$email = ''; 
							$ease_user['is_effect'] = 1;
						}
						//本系统没有该会员，在本站创建会员
						
						$ease_user['email'] = $email;
						$ease_user['user_name'] = $uname;
						$ease_user['user_pwd'] = md5($user_pwd);
						$ease_user['integrate_id'] = $uid;
			
						$GLOBALS['db']->autoExecute(DB_PREFIX."user",$ease_user);
					}
				}				
				return array('status'=>1,'data'=>'','msg'=>$result);
		}
		return array('status'=>0,'data'=>ACCOUNT_NO_EXIST_ERROR); //无会员返回0
	}
	
	//用户登出
	public function logout()
	{
		$result = uc_call("uc_user_synlogout");   //同步退出
		return array('status'=>1,'data'=>'','msg'=>$result);
	}
	
	//用户注册
	public function add_user($user_name,$user_pwd,$email)
	{
		if(UC_CHARSET!='utf-8')
		{				
			$user_name = iconv("utf-8",UC_CHARSET,$user_name);
			$user_pwd = iconv("utf-8",UC_CHARSET,$user_pwd);
			$email = iconv("utf-8",UC_CHARSET,$email);
		}
		 /* 检测用户名 */
		if ($this->check_user($user_name)) //如存在
        {
			$field_item['field_name'] = 'user_name';
			$field_item['error']	=	EXIST_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
        }
		if ($this->check_email($email)) //如存在
        {
			$field_item['field_name'] = 'email';
			$field_item['error']	=	EXIST_ERROR;
			$res['status'] = 0;
			$res['data'] = $field_item;
			return $res;
        }

        $uid = uc_call("uc_user_register", array($user_name, $user_pwd, $email));
        if ($uid <= 0)
        {
            if($uid == -1||$uid == -2) //名称不合法
            {
                $field_item['field_name'] = 'user_name';
				$field_item['error']	=	FORMAT_ERROR;
				$res['status'] = 0;
				$res['data'] = $field_item;
				return $res;
            }
            elseif($uid == -3)//存在会员名
            {
				$field_item['field_name'] = 'user_name';
				$field_item['error']	=	EXIST_ERROR;
				$res['status'] = 0;
				$res['data'] = $field_item;
				return $res;
            }
            elseif($uid == -4)
            {
				$field_item['field_name'] = 'email';
				$field_item['error']	=	FORMAT_ERROR;
				$res['status'] = 0;
				$res['data'] = $field_item;
				return $res;
            }
            elseif($uid == -5||$uid== -6)
            {
				$field_item['field_name'] = 'email';
				$field_item['error']	=	EXIST_ERROR;
				$res['status'] = 0;
				$res['data'] = $field_item;
				return $res;
            }
            else
            {
				$res['status'] = 0;
				return $res;
            }
        }
        else
        {
        	return array("status"=>1,'data'=>$uid);
        }
	}
	
	//用户修改,仅用于密码的修改 
	public function edit_user($user_data,$user_new_pwd)
	{
		if(UC_CHARSET!='utf-8')
		{				
			$user_data['user_name'] = iconv("utf-8",UC_CHARSET,$user_data['user_name']);
		}
        $result = uc_call("uc_user_edit", array($user_data['user_name'], '',$user_new_pwd, '', '1'));
        return $result;
	}
	
	//删除用户
	public function delete_user($user_data)
	{
		$result = uc_call("uc_user_delete", array($user_data['integrate_id']));
        return $result;
	}
	
	public function install($config_seralized)
	{
		//uc数据的安装
		 $post_config = unserialize($config_seralized);		
		 include_once(APP_ROOT_PATH .'system/utils/transport.php');
    	 $result = array('status' => 1, 'msg' => '');
    	 if(!file_exists(APP_ROOT_PATH."uc_client/client.php")||!file_exists(APP_ROOT_PATH."api/uc.php"))
    	 {
    	 		$result['status'] = 0;
		        $result['msg'] = '缺少 /uc_client/目录与/api/uc.php, 无法正常安装Ucenter整合';
		        $GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CODE'");
		        $GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CFG'");
				return $result;
    	 }

    	 $app_type   = 'OTHER';
    	 $app_name   = app_conf("SITE_NAME");
    	 $app_url    = get_domain().APP_ROOT;
    	 $app_charset = 'utf-8';
    	 $app_dbcharset = strtolower((str_replace('-', '', $app_charset)));
    	 $ucapi = !empty($post_config['UCENTER_URL']) ? trim($post_config['UCENTER_URL']) : '';
    	 $ucip = !empty($post_config['UCENTER_IP']) ? trim($post_config['UCENTER_IP']) : '';
    	 $dns_error = false;
		    if(!$ucip)
		    {
		        $temp = @parse_url($ucapi);
		        $ucip = gethostbyname($temp['host']);
		        if(ip2long($ucip) == -1 || ip2long($ucip) === FALSE)
		        {
		            $ucip = '';
		            $dns_error = true;
		        }
		    }
		    if($dns_error){
		        $result['status'] = 0;
		        $result['msg'] = 'DNS解析出错';
		        $GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CODE'");
		        $GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CFG'");
				return $result;
		    }
	
	        $ucfounderpw = trim($post_config['UCENTER_ADMIN']);
	   		$app_tagtemplates = '';
	   		if($post_config['DB_CHARSET']!='utf-8')
	   		$app_name = iconv('utf-8',$post_config['DB_CHARSET'],$app_name);
	    	$postdata ="m=app&a=add&ucfounder=&ucfounderpw=".urlencode($ucfounderpw)."&apptype=".urlencode($app_type).
	        "&appname=".urlencode($app_name)."&appurl=".urlencode($app_url)."&appip=&appcharset=".$app_charset.
	        '&appdbcharset='.$app_dbcharset.'&apptagtemplates='.$app_tagtemplates;
	    	$t = new transport;
	    	$ucconfig = $t->request($ucapi.'/index.php', $postdata);
	    	$ucconfig = $ucconfig['body'];
	    	if(empty($ucconfig))
	    	{
		        //ucenter 验证失败
		        $result['status'] = 0;
		        $result['msg'] = "Ucenter验证失败";
	    	}
		    elseif($ucconfig == '-1')
		    {
		        //管理员密码无效
		        $result['status'] = 0;
		        $result['msg'] = "管理员密码无效";
		    }
		    else
		    {
		        list($appauthkey, $appid) = explode('|', $ucconfig);
		        if(empty($appauthkey) || empty($appid))
		        {
		            //ucenter 安装数据错误
		            $result['status'] = 0;
		            $result['msg'] = '安装数据错误';
		        }
		        else
		        {
		            
		            //开始写入public下的uc_config.php
		            $ucconfig = explode("|",$ucconfig);
		            //开始写入配置文件
					$key_name = array(
					'UC_KEY','UC_APPID','UC_DBHOST','UC_DBNAME','UC_DBUSER','UC_DBPW','UC_DBCHARSET','UC_DBTABLEPRE','UC_CHARSET'
					);
					$config_str = "<?php\n";
					foreach($ucconfig as $k=>$v)
					{
						if($k==7)
						{
							$v = "`".$ucconfig[3]."`.".$v;
						}
						$config_str.="define('".$key_name[$k]."','".$v."');\n";
					}
					$uc_connect = $post_config['INTEGERATE_TYPE']==1?'mysql':'';
					$config_str.="define('UC_CONNECT','".$uc_connect."');\n";
					$config_str.="define('UC_DBCONNECT','0');\n";
					$config_str.="define('UC_API','".$ucapi."');\n";
					$config_str.="define('UC_IP','".$ucip."');\n";

					$config_str.="\n ?>"; 
					@file_put_contents(APP_ROOT_PATH."/public/uc_config.php",$config_str);	 

					//开始同步会员数据
					if($uc_connect=='mysql')
					$this->import_user();
					
					if(file_exists(APP_ROOT_PATH."/public/uc_config.php"))
					{
						require_once APP_ROOT_PATH."/public/uc_config.php";
						$apps = uc_call("uc_app_ls");					
						$cachefile = APP_ROOT_PATH.'public/uc_data/apps.php';
				        $fp = fopen($cachefile, 'w');
				        $s = "<?php\r\n";
				        $s .= '$_CACHE[\'apps\'] = '.var_export($apps, TRUE).";\r\n";
				        fwrite($fp, $s);
				        fclose($fp);
					}
					
					$result['status'] = 1;
		            
		        }
		    }
			if($result['status']==0)
			{
				$GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CODE'");
		        $GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CFG'");
			}
			else
			{
				$GLOBALS['db']->query("update ".DB_PREFIX."conf set value = '' where name = 'INTEGRATE_CFG'");
			}
	    	return $result;

	}
	
	public function uninstall()
	{
		@unlink(APP_ROOT_PATH."public/uc_config.php");
		$GLOBALS['db']->query("update ".DB_PREFIX."user set integrate_id = 0");
	}
	
	/**
	 * 将当前系统的会员同步给UCenter
	 * 规则
	 * 1. 保证 easethink 中有的会员 ucenter 中必需存在，并同步密码
	 * 2. 重名会员以 easethink 中的会员资料为准，并将原ucenter中的会员资料记录到log中
	 * 3. ucenter中存在的会员。easethink中如不存在暂不处理。
	 */
	private function import_user()
	{
		if(file_exists(APP_ROOT_PATH."public/uc_config.php"))
		{
			require_once APP_ROOT_PATH."public/uc_config.php";
			$ucdb = new mysql_db(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME,UC_DBCHARSET);
		    $result = array('status' => 1, 'msg' => '');	    
		    /*$uc_user = $ucdb->getAll("select * from ".UC_DBTABLEPRE."members");
		    $et_user = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user");
		    print_r($uc_user);
		    print_r($et_user);
		    exit;*/
		    
		    require_once APP_ROOT_PATH."system/utils/logger.php";
    	
		    $query = $GLOBALS['db']->query("SELECT * FROM " .DB_PREFIX."user ORDER BY `id` ASC");
		    while($data = $GLOBALS['db']->fetch_array($query))
		    {
			    if(UC_CHARSET!='utf-8')
				{				
					$data['user_name'] = iconv("utf-8",UC_CHARSET,$data['user_name']);
					$data['user_pwd'] = iconv("utf-8",UC_CHARSET,$data['user_pwd']);
					$data['email'] = iconv("utf-8",UC_CHARSET,$data['email']);
				}
			    $salt = rand(100000,999999);
		        $password = md5($data['user_pwd'].$salt);
		        $data['user_name'] = addslashes($data['user_name']);
		        $uc_userinfo = $ucdb->getRow("SELECT * FROM ".UC_DBTABLEPRE."members WHERE `username`='".$data['user_name']."'");
		        if(!$uc_userinfo)
		        {
		            $ucdb->query("INSERT INTO ".UC_DBTABLEPRE."members SET username='".$data['user_name']."', password='$password', email='".$data['email']."', regdate='".$data['create_time']."', salt='$salt'", 'SILENT');
					$integrate_id = intval($ucdb->insert_id());
					$GLOBALS['db']->query("update ".DB_PREFIX."user set integrate_id = ".$integrate_id." where id = ".$data['id']);
		        }
		        else
		        {
		        	//存在同名会员		        		        	
		        	//开始记录原系统同的同名数据
		        	$data_str = implode("|",$data);
		        	logger::record($data_str); 
			    	logger::save();		        	
					$GLOBALS['db']->query("update ".DB_PREFIX."user set integrate_id = ".$uc_userinfo['uid'].",user_pwd = '' where id = ".$data['id']);
					//清空原密码，等待同步登录时与ucenter同步
		        }
		    }
		    unset($query);
		}	    
	    return $result;	   	
	}
	
	private function check_user($username, $password = null)
    {
        $userdata = uc_call("uc_user_checkname", array($username));
        if ($userdata == 1)
        {
            return false;
        }
        else
        {
            return  true;
        }
    }
    
    private function check_email($email)
    {
        if (!empty($email))
        {
            $email_exist = uc_call('uc_user_checkemail', array($email));
            if ($email_exist == 1)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        return true;
    }
    
}

if(!function_exists("uc_call"))
{
	/**
	 * 调用UCenter的函数
	 *
	 * @param   string  $func
	 * @param   array   $params
	 *
	 * @return  mixed
	 */
	function uc_call($func, $params=array())
	{
	
	    restore_error_handler();
	    if (!function_exists($func))
	    {
	        include_once(APP_ROOT_PATH . 'uc_client/client.php');
	    }
	
	    $res = call_user_func_array($func, $params);
	
	    set_error_handler('exception_handler');
	
	    return $res;
	}
}
?>