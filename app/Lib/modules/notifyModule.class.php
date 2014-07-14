<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class notifyModule extends BaseModule
{
	
	
	public function index()
	{
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}		
		
		$all = intval($_REQUEST['all']);		
		$page_size = 20;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size).",".$page_size	;

		if($all==0)
		{
			$cond = " and is_read = 0 ";
		}
		else 
		{
			$cond = " and 1=1 ";
		}
		$GLOBALS['tmpl']->assign("all",$all);
		$sql = "select * from ".DB_PREFIX."user_notify  where user_id = ".intval($GLOBALS['user_info']['id'])." $cond  order by log_time desc limit ".$limit;
		$sql_count = "select count(*) from ".DB_PREFIX."user_notify  where user_id = ".intval($GLOBALS['user_info']['id'])." $cond  ";		
		
		$notify_list = $GLOBALS['db']->getAll($sql);
		$notify_count = $GLOBALS['db']->getOne($sql_count);	
		
		foreach($notify_list as $k=>$v)
		{
			$notify_list[$k]['url'] = parse_url_tag("u:".$v['url_route']."|".$v['url_param']);
		}

		$GLOBALS['tmpl']->assign("notify_list",$notify_list);
		
		require APP_ROOT_PATH.'app/Lib/page.php';
		$page = new Page($notify_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);	
		
		$GLOBALS['tmpl']->display("notify.html");
	}
	
	public function ignore()
	{
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		$id = intval($_REQUEST['id']);
		$GLOBALS['db']->query("update ".DB_PREFIX."user_notify set is_read = 1 where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
		app_redirect_preview();
	}
	public function ignoreall()
	{
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		$GLOBALS['db']->query("update ".DB_PREFIX."user_notify set is_read = 1 where user_id = ".intval($GLOBALS['user_info']['id']));
		app_redirect_preview();
	}
	
	public function delnotify()
	{
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		$id = intval($_REQUEST['id']);
		$user_id = intval($GLOBALS['user_info']['id']);
		$GLOBALS['db']->query("delete from ".DB_PREFIX."user_notify where user_id = ".$user_id." and id = ".$id);
		
		showSuccess("",$ajax,get_gopreview());
	}
}
?>