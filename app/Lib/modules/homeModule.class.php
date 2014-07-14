<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/page.php';
class homeModule extends BaseModule
{
	public function index()
	{		

		$id = intval($_REQUEST['id']);
		
		$home_user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$id." and is_effect = 1");
		if(!$home_user_info)
		{
			app_redirect(url("index"));	
		}
		
		$home_user_info['weibo_list'] = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_weibo where user_id = ".$home_user_info['id']);
		$GLOBALS['tmpl']->assign("home_user_info",$home_user_info);
		
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
		$GLOBALS['tmpl']->assign("current_page",$page);
		
		$condition = " is_delete = 0 and is_effect = 1 and user_id = ".intval($home_user_info['id'])." "; 
		
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where ".$condition." order by sort asc limit ".$limit);
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where ".$condition);
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - get_gmtime())/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);		
		
		$GLOBALS['tmpl']->display("home_index.html");
	}
	
	
	public function support()
	{		

		$id = intval($_REQUEST['id']);
		
		$home_user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$id." and is_effect = 1");
		if(!$home_user_info)
		{
			app_redirect(url("index"));	
		}
		
		$home_user_info['weibo_list'] = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_weibo where user_id = ".$home_user_info['id']);
		$GLOBALS['tmpl']->assign("home_user_info",$home_user_info);
		
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
		$GLOBALS['tmpl']->assign("current_page",$page);
		
		$sql = "select distinct(d.id) as id,d.* from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_support_log as dsl on d.id = dsl.deal_id ".
			   " where dsl.user_id = ".$home_user_info['id']." order by d.sort asc limit ".$limit;
	
		$sql_count = "select count(distinct(d.id)) from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_support_log as dsl on d.id = dsl.deal_id ".
			   " where dsl.user_id = ".$home_user_info['id'];
		
		$deal_list = $GLOBALS['db']->getAll($sql);
		$deal_count = $GLOBALS['db']->getOne($sql_count);

		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);		
		
		$GLOBALS['tmpl']->display("home_support.html");
	}
	

	
	
}
?>