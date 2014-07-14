<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/page.php';
class newsModule extends BaseModule
{
	public function index()
	{	
		$GLOBALS['tmpl']->assign("page_title","最新动态");
		$cate_result = load_dynamic_cache("INDEX_CATE_LIST");
		if($cate_result===false)
		{
			$cate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate order by sort asc");
			$cate_result= array();
			foreach($cate_list as $k=>$v)
			{
				$cate_result[$v['id']] = $v;
			}
			set_dynamic_cache("INDEX_CATE_LIST",$cate_result);
		}
		$GLOBALS['tmpl']->assign("cate_list",$cate_result);
		
		$rand_deals = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where is_delete = 0 and is_effect = 1 and begin_time < ".NOW_TIME." and (end_time >".NOW_TIME." or end_time = 0) order by rand() limit 3");
		$GLOBALS['tmpl']->assign("rand_deals",$rand_deals);
		
		$page_size = DEALUPDATE_PAGE_SIZE;
		$step_size = DEALUPDATE_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
		$GLOBALS['tmpl']->assign("current_page",$page);
		
		$log_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_log order by create_time desc limit ".$limit);
		$log_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_log");
		
		foreach($log_list as $k=>$v)
		{
			$log_list[$k]['pass_time'] = pass_date($v['create_time']);
			$online_time = online_date($v['create_time'],$deal_info['begin_time']);
			$log_list[$k]['online_time'] = $online_time['info'];
			$log_list[$k]['comment_count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_comment where log_id = ".$v['id']);
			$log_list[$k]['comment_list'] = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_comment where log_id = ".$v['id']." order by create_time desc limit 3");
			if($log_list[$k]['comment_count']<=count($log_list[$k]['comment_list']))
			{
				$log_list[$k]['more_comment'] = false;
			}
			else
			{
				$log_list[$k]['more_comment'] = true;
			}
			$log_list[$k]['deal_info'] = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$v['deal_id']);
			if($log_list[$k]['deal_info'])
			{
				$log_list[$k]['deal_info']['remain_days'] = floor(($log_list[$k]['deal_info']['end_time'] - NOW_TIME)/(24*3600));
				$log_list[$k]['deal_info']['percent'] = round($log_list[$k]['deal_info']['support_amount']/$log_list[$k]['deal_info']['limit_price']*100);
				
			}
		}
		$GLOBALS['tmpl']->assign('log_list',$log_list);
		
		$pager = new Page($log_count,$page_size);   //初始化分页对象 		
		$p  =  $pager->show();
		$GLOBALS['tmpl']->assign('pages',$p);		
		
		$GLOBALS['tmpl']->assign("ajaxurl",url("ajax#news",array("p"=>$page)));		
		$GLOBALS['tmpl']->display("news.html");
	}
	

	public function fav()
	{	
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		$GLOBALS['tmpl']->assign("page_title","我关注的项目动态");
		$cate_result = load_dynamic_cache("INDEX_CATE_LIST");
		if($cate_result===false)
		{
			$cate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate order by sort asc");
			$cate_result= array();
			foreach($cate_list as $k=>$v)
			{
				$cate_result[$v['id']] = $v;
			}
			set_dynamic_cache("INDEX_CATE_LIST",$cate_result);
		}
		$GLOBALS['tmpl']->assign("cate_list",$cate_result);
		
		$rand_deals = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where is_delete = 0 and is_effect = 1 and begin_time < ".NOW_TIME." and (end_time >".NOW_TIME." or end_time = 0) order by rand() limit 3");
		$GLOBALS['tmpl']->assign("rand_deals",$rand_deals);
		
		$page_size = DEALUPDATE_PAGE_SIZE;
		$step_size = DEALUPDATE_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
		$GLOBALS['tmpl']->assign("current_page",$page);
		
		$sql = "select dl.* from ".DB_PREFIX."deal_log as dl left join ".DB_PREFIX."deal_focus_log as dfl on dl.deal_id = dfl.deal_id where dfl.user_id = ".intval($GLOBALS['user_info']['id'])." order by dl.create_time desc limit ".$limit;
		$sql_count = "select count(*) from ".DB_PREFIX."deal_log as dl left join ".DB_PREFIX."deal_focus_log as dfl on dl.deal_id = dfl.deal_id where dfl.user_id = ".intval($GLOBALS['user_info']['id']);
		
		$log_list = $GLOBALS['db']->getAll($sql);
		$log_count = $GLOBALS['db']->getOne($sql_count);
		
		foreach($log_list as $k=>$v)
		{
			$log_list[$k]['pass_time'] = pass_date($v['create_time']);
			$online_time = online_date($v['create_time'],$deal_info['begin_time']);
			$log_list[$k]['online_time'] = $online_time['info'];
			$log_list[$k]['comment_count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_comment where log_id = ".$v['id']);
			$log_list[$k]['comment_list'] = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_comment where log_id = ".$v['id']." order by create_time desc limit 3");
			if($log_list[$k]['comment_count']<=count($log_list[$k]['comment_list']))
			{
				$log_list[$k]['more_comment'] = false;
			}
			else
			{
				$log_list[$k]['more_comment'] = true;
			}
			$log_list[$k]['deal_info'] = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$v['deal_id']);
			if($log_list[$k]['deal_info'])
			{
				$log_list[$k]['deal_info']['remain_days'] = floor(($log_list[$k]['deal_info']['end_time'] - NOW_TIME)/(24*3600));
				$log_list[$k]['deal_info']['percent'] = round($log_list[$k]['deal_info']['support_amount']/$log_list[$k]['deal_info']['limit_price']*100);
				
			}
		}
		$GLOBALS['tmpl']->assign('log_list',$log_list);
		
		$pager = new Page($log_count,$page_size);   //初始化分页对象 		
		$p  =  $pager->show();
		$GLOBALS['tmpl']->assign('pages',$p);		
		
		$GLOBALS['tmpl']->assign("ajaxurl",url("ajax#newsfav",array("p"=>$page)));		
		$GLOBALS['tmpl']->display("news.html");
	}
	
}
?>