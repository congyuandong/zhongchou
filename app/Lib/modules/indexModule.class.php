<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/page.php';
class indexModule extends BaseModule
{
	public function index()
	{	
		$image_list = load_dynamic_cache("INDEX_IMAGE_LIST");
		if($image_list===false)
		{
			$image_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."index_image order by sort asc");
			set_dynamic_cache("INDEX_IMAGE_LIST",$image_list);
		}
		$GLOBALS['tmpl']->assign("image_list",$image_list);
		
		
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
		
		$page_size = DEAL_PAGE_SIZE;
		$step_size = DEAL_STEP_SIZE;
		
		$step = intval($_REQUEST['step']);
		if($step==0)$step = 1;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size+($step-1)*$step_size).",".$step_size	;
		
		$GLOBALS['tmpl']->assign("current_page",$page);
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where is_effect = 1 and is_recommend = 1 and is_delete = 0 order by sort asc limit ".$limit);
		//$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where is_effect = 1 and is_recommend = 1 and is_delete = 0");
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		
		//$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		//$p  =  $page->show();
		//$GLOBALS['tmpl']->assign('pages',$p);		
		
		$GLOBALS['tmpl']->display("index.html");
	}
	

	
	
}
?>