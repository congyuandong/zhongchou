<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------


class ajaxModule extends BaseModule
{
	public function index()
	{
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;		
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where is_effect = 1  and is_recommend = 1 and is_delete = 0 order by sort asc limit ".$limit);
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where is_effect = 1  and is_recommend = 1 and is_delete = 0 ");
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/deal_list.html");
		
		if($step*$step_size<$page_size)
		{			
			if($deal_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
		
	}
	
	
	public function deals()
	{		

		$r = strim($_REQUEST['r']);   //推荐类型
		$id = intval($_REQUEST['id']);  //分类id
		$loc = strim($_REQUEST['loc']);  //地区
		$tag = strim($_REQUEST['tag']);  //标签
		$kw = strim($_REQUEST['k']);    //关键词

		
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;	

		$condition = " is_delete = 0 and is_effect = 1 "; 
		if($r!="")
		{
			if($r=="new")
			{
				$condition.=" and ".NOW_TIME." - begin_time < ".(24*3600)." and ".NOW_TIME." - begin_time > 0 ";  //上线不超过一天
			}
			if($r=="nend")
			{
				$condition.=" and end_time - ".NOW_TIME." < ".(24*3600)." and end_time - ".NOW_TIME." > 0 ";  //当天就要结束
			}
			if($r=="classic")
			{
				$condition.=" and is_classic = 1 ";
			}
		}
		if($id>0)
		{
			$condition.= " and cate_id = ".$id;
		}
		
		if($loc!="")
		{
			$condition.=" and (province = '".$loc."' or city = '".$loc."') ";
		}
		
		if($tag!="")
		{
			$unicode_tag = str_to_unicode_string($tag);
			$condition.=" and match(tags_match) against('".$unicode_tag."'  IN BOOLEAN MODE) ";
		}
		
		if($kw!="")
		{		
			$kws_div = div_str($kw);
			foreach($kws_div as $k=>$item)
			{
				$kws[$k] = str_to_unicode_string($item);
			}
			$ukeyword = implode(" ",$kws);
			$condition.=" and (match(name_match) against('".$ukeyword."'  IN BOOLEAN MODE) or match(tags_match) against('".$ukeyword."'  IN BOOLEAN MODE)  or name like '%".$kw."%') ";
		}
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where ".$condition." order by sort asc limit ".$limit);
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where ".$condition);
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/deal_list.html");
		
		if($step*$step_size<$page_size)
		{			
			if($deal_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
	}
	
	public function dealupdate()
	{

		$id = intval($_REQUEST['id']);
		$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$id." and is_delete = 0 and (is_effect = 1 or (is_effect = 0 and user_id = ".intval($GLOBALS['user_info']['id'])."))");
		if(!$deal_info)
		{
			ajax_return(array("step"=>0));
		}		
		else 
		{
			$GLOBALS['tmpl']->assign("deal_info",$deal_info);
		}

		$page_size = DEALUPDATE_PAGE_SIZE;
		$step_size = DEALUPDATE_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
		$log_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_log where deal_id = ".$deal_info['id']." order by create_time desc limit ".$limit);				
		$log_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_log where deal_id = ".$deal_info['id']);
		
		if(!$log_list)
		{
			ajax_return(array("step"=>0));
		}
		if((($page-1)*$page_size+($step-1)*$step_size)+count($log_list)>=$log_count)
		{
			//最后一页
			$log_list[] = array("deal_id"=>$deal_info['id'],
								"create_time"=>$deal_info['begin_time']+1,
								"id"=>0);
		}
		
		$last_time_key = "";
		foreach($log_list as $k=>$v)
		{
			$log_list[$k]['pass_time'] = pass_date($v['create_time']);
			$online_time = online_date($v['create_time'],$deal_info['begin_time']);
			$log_list[$k]['online_time'] = $online_time['info'];
			if($online_time['key']!=$last_time_key)
			{
				$last_time_key = $log_list[$k]['online_time_key'] = $online_time['key'];				
			}
			$log_list[$k]['comment_count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_comment where log_id = ".$v['id']." and deal_id = ".$deal_info['id']);
			$log_list[$k]['comment_list'] = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_comment where log_id = ".$v['id']." and deal_id = ".$deal_info['id']." order by create_time desc limit 3");
			if($log_list[$k]['comment_count']<=count($log_list[$k]['comment_list']))
			{
				$log_list[$k]['more_comment'] = false;
			}
			else
			{
				$log_list[$k]['more_comment'] = true;
			}
		}
		
		
		$GLOBALS['tmpl']->assign("log_list",$log_list);		
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/time_line_item.html");
		//$data['html'] = "select * from ".DB_PREFIX."deal_log where deal_id = ".$deal_info['id']." order by create_time desc limit ".$limit;
		
		if($step*$step_size<$page_size)
		{			
			if($log_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
	}
	
	public function login()
	{
		$GLOBALS['tmpl']->display("inc/user_login_box.html");
	}
	
	
	public function homeindex()
	{
		$id = intval($_REQUEST['id']);
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;		
		
		$condition = " is_delete = 0 and is_effect = 1 and user_id = ".$id." "; 
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where ".$condition." order by sort asc limit ".$limit);

		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where ".$condition);
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/deal_list.html");
		
		if($step*$step_size<$page_size)
		{			
			if($deal_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
	}
	
	public function homesupport()
	{
		$id = intval($_REQUEST['id']);
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;		
		
		$sql = "select distinct(d.id) as id,d.* from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_support_log as dsl on d.id = dsl.deal_id ".
			   " where dsl.user_id = ".$id." order by d.sort asc limit ".$limit;
	
		$sql_count = "select count(distinct(d.id)) from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_support_log as dsl on d.id = dsl.deal_id ".
			   " where dsl.user_id = ".$id;
		
		$deal_list = $GLOBALS['db']->getAll($sql);
		$deal_count = $GLOBALS['db']->getOne($sql_count);
		
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/deal_list.html");
		
		if($step*$step_size<$page_size)
		{			
			if($deal_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
	}
	
	public function news()
	{	

		$page_size = DEALUPDATE_PAGE_SIZE;
		$step_size = DEALUPDATE_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
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
		
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/news_item.html");
		
		if($step*$step_size<$page_size)
		{			
			if($log_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
	}
	
	public function newsfav()
	{	

		$page_size = DEALUPDATE_PAGE_SIZE;
		$step_size = DEALUPDATE_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
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
		
		$data['html'] = $GLOBALS['tmpl']->fetch("inc/news_item.html");
		
		if($step*$step_size<$page_size)
		{			
			if($log_count<=(($page-1)*$page_size+($step-1)*$step_size)+$step_size)
			{
				$data['step'] = 0;
				ajax_return($data);
			}
			else
			{
				$data['step'] = $step+1;
				ajax_return($data);
			}
		}
		else
		{
			$data['step'] = 0;
			ajax_return($data);
		}
	}
	
	
	public function randdeal()
	{
		$rand_deals = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where is_delete = 0 and is_effect = 1 and begin_time < ".NOW_TIME." and (end_time >".NOW_TIME." or end_time = 0) order by rand() limit 3");
		$GLOBALS['tmpl']->assign("rand_deals",$rand_deals);
		$GLOBALS['tmpl']->display("inc/rand_deals.html");
	}
	
	public function usermessage()
	{
		if(!$GLOBALS['user_info'])
		{
			$data['status'] = 2;
			ajax_return($data);
		}
		$id = intval($_REQUEST['id']);
		if($id==$GLOBALS['user_info']['id'])
		{
			$data['status'] = 0;
			$data['info'] = "不能给自己发私信";
			ajax_return($data);
		}
		$send_user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".$id." and is_effect = 1");
		if(!$send_user_info)
		{
			$data['status'] = 0;
			$data['info'] = "收信人不存在";
			ajax_return($data);
		}
		else
		{
			$GLOBALS['tmpl']->assign("send_user_info",$send_user_info);
			$data['status'] = 1;
			$data['html'] = $GLOBALS['tmpl']->fetch("inc/usermessage.html");
			ajax_return($data);
		}
		
	}
	
	public function close_notify()
	{
		es_cookie::set("hide_user_notify",1);	
	}
	
	public function add_deal_faq()
	{
		$GLOBALS['tmpl']->display("inc/deal_faq_item.html");
	}
}
?>