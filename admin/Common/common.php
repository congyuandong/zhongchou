<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------

if (!defined('THINK_PATH')) exit();

//过滤请求
filter_request($_REQUEST);
filter_request($_GET);
filter_request($_POST);
define("AUTH_NOT_LOGIN", 1); //未登录的常量
define("AUTH_NOT_AUTH", 2);  //未授权常量

// 全站公共函数库
// 更改系统配置, 当更改数据库配置时为永久性修改， 修改配置文档中配置为临时修改
function conf($name,$value = false)
{
	if($value === false)
	{
		return C($name);
	}
	else
	{
		if(M("Conf")->where("is_effect=1 and name='".$name."'")->count()>0)
		{
			if(in_array($name,array('EXPIRED_TIME','SUBMIT_DELAY','SEND_SPAN','WATER_ALPHA','MAX_IMAGE_SIZE','INDEX_LEFT_STORE','INDEX_LEFT_TUAN','INDEX_LEFT_YOUHUI','INDEX_LEFT_DAIJIN','INDEX_LEFT_EVENT','INDEX_RIGHT_STORE','INDEX_RIGHT_TUAN','INDEX_RIGHT_YOUHUI','INDEX_RIGHT_DAIJIN','INDEX_RIGHT_EVENT','SIDE_DEAL_COUNT','DEAL_PAGE_SIZE','PAGE_SIZE','BATCH_PAGE_SIZE','HELP_CATE_LIMIT','HELP_ITEM_LIMIT','REC_HOT_LIMIT','REC_NEW_LIMIT','REC_BEST_LIMIT','REC_CATE_GOODS_LIMIT','SALE_LIST','INDEX_NOTICE_COUNT','RELATE_GOODS_LIMIT')))
			{
				$value = intval($value);
			}
			M("Conf")->where("is_effect=1 and name='".$name."'")->setField("value",$value);
		}
		C($name,$value);
	}
}



function write_timezone($zone='')
{
	if($zone=='')
	$zone = conf('TIME_ZONE');
		$var = array(
			'0'	=>	'UTC',
			'8'	=>	'PRC',
		);
		
		//开始将$db_config写入配置
	    $timezone_config_str 	 = 	"<?php\r\n";
	    $timezone_config_str	.=	"return array(\r\n";
	    $timezone_config_str.="'DEFAULT_TIMEZONE'=>'".$var[$zone]."',\r\n";
	    
	    $timezone_config_str.=");\r\n";
	    $timezone_config_str.="?>";
	   
	    @file_put_contents(get_real_path()."public/timezone_config.php",$timezone_config_str);
}

function format_sacle($v)
{
	return $v."%";
}

//后台日志记录
function save_log($msg,$status)
{
	if(conf("ADMIN_LOG")==1)
	{
		$adm_session = es_session::get(md5(conf("AUTH_KEY")));
		$log_data['log_info'] = $msg;
		$log_data['log_time'] = get_gmtime();
		$log_data['log_admin'] = intval($adm_session['adm_id']);
		$log_data['log_ip']	= get_client_ip();
		$log_data['log_status'] = $status;	
		$log_data['module']	=	MODULE_NAME;
		$log_data['action'] = 	ACTION_NAME;
		M("Log")->add($log_data);
	}
}


//状态的显示
function get_toogle_status($tag,$id,$field)
{
	if($tag)
	{
		return "<span class='is_effect' onclick=\"toogle_status(".$id.",this,'".$field."');\">".l("YES")."</span>";
	}
	else
	{
		return "<span class='is_effect' onclick=\"toogle_status(".$id.",this,'".$field."');\">".l("NO")."</span>";
	}
}

//状态的显示
function get_is_effect($tag,$id)
{
	if($tag)
	{
		return "<span class='is_effect' onclick='set_effect(".$id.",this);'>".l("IS_EFFECT_1")."</span>";
	}
	else
	{
		return "<span class='is_effect' onclick='set_effect(".$id.",this);'>".l("IS_EFFECT_0")."</span>";
	}
}


//排序显示
function get_sort($sort,$id)
{
	if($tag)
	{
		return "<span class='sort_span' onclick='set_sort(".$id.",".$sort.",this);'>".$sort."</span>";
	}
	else
	{
		return "<span class='sort_span' onclick='set_sort(".$id.",".$sort.",this);'>".$sort."</span>";
	}
}
function get_nav($nav_id)
{
	return M("RoleNav")->where("id=".$nav_id)->getField("name");	
}
function get_module($module_id)
{
	return M("RoleModule")->where("id=".$module_id)->getField("module");
}
function get_group($group_id)
{
	if($group_data = M("RoleGroup")->where("id=".$group_id)->find())
	$group_name = $group_data['name'];
	else
	$group_name = L("SYSTEM_NODE");
	return $group_name;
}
function get_role_name($role_id)
{
	return M("Role")->where("id=".$role_id)->getField("name");
}
function get_admin_name($admin_id)
{
	$adm_name = M("Admin")->where("id=".$admin_id)->getField("adm_name");
	if($adm_name)
	return $adm_name;
	else
	return l("NONE_ADMIN_NAME");
}
function get_log_status($status)
{
	return l("LOG_STATUS_".$status);
}
//验证相关的函数
//验证排序字段
function check_sort($sort)
{
	if(!is_numeric($sort))
	{
		return false;
	}
	return true;
}
function check_empty($data)
{
	if(trim($data)=='')
	{
		return false;
	}
	return true;
}

function set_default($null,$adm_id)
{

	$admin_name = M("Admin")->where("id=".$adm_id)->getField("adm_name");
	if($admin_name == conf("DEFAULT_ADMIN"))
	{
		return "<span style='color:#f30;'>".l("DEFAULT_ADMIN")."</span>";
	}
	else
	{
		return "<a href='".u("Admin/set_default",array("id"=>$adm_id))."'>".l("SET_DEFAULT_ADMIN")."</a>";
	}
}
function get_all_files( $path )
{
		$list = array();
		$dir = @opendir($path);
	    while (false !== ($file = @readdir($dir)))
	    {
	    	if($file!='.'&&$file!='..')
	    	if( is_dir( $path.$file."/" ) ){
	         	$list = array_merge( $list , get_all_files( $path.$file."/" ) );
	        }
	        else 
	        {
	        	$list[] = $path.$file;
	        }
	    }
	    @closedir($dir);
	    return $list;
}
function get_send_type_msg($status)
{
	if($status==0)
	{
		return l("SMS_SEND");
	}
	else
	{
		return l("MAIL_SEND");
	}
}


function get_is_send($is_send)
{
	if($is_send==0)
	return L("NO");
	else
	return L("YES");
}
function get_send_result($result)
{
	if($result==0)
	{
		return L("FAILED");
	}
	else
	{
		return L("SUCCESS");
	}
}

function get_status($status)
{
	if($status)
	{
		return l("YES");
	}
	else
	return l("NO");
}
function show_content($content,$id)
{
	return "<a title='".l("VIEW")."' href='javascript:void(0);' onclick='show_content(".$id.")'>".l("VIEW")."</a>";
}

function get_deal_user($uid)
{
	$uinfo = M("User")->getById($uid);
	if($uinfo)
	{
		return $uinfo['user_name'];
	}
	else
	{
		if($uid==0)
		return "管理员发起";
		else
		return "发起人被删除";
	}
}
function get_to_date($time)
{
	if($time==0)return "长期";
	return  "<span>".to_date($time,"Y/m/d H:i")."</span>";
	// if($time<get_gmtime())
	// {
	// 	return "<span style='color:#f30;'>过期</span>";
	// }
	// else 
	// {
	// 	return  "<span>".to_date($time,"Y/m/d H:i")."</span>";
	// }
}

function get_title($title)
{
	return "<span title='".$title."'>".msubstr($title)."</span>";
	
}

function get_deal_name($id)
{
	$name = M("Deal")->where("id=".$id)->getField("name");
	return get_title($name);
}
?>