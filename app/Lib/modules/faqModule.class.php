<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------


class faqModule extends BaseModule
{
	public function index()
	{		
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
		if (!$GLOBALS['tmpl']->is_cached('faq_index.html', $cache_id))
		{
			$faq_list = array();
			$faq_group_list = $GLOBALS['db']->getAll("select distinct(`group`) from ".DB_PREFIX."faq order by sort asc");
			foreach ($faq_group_list as $k=>$v)
			{
				$faq_list[$v['group']]=$GLOBALS['db']->getAll("select * from ".DB_PREFIX."faq where `group`='".$v['group']."' order by sort asc");
			}
			$GLOBALS['tmpl']->assign("faq_list",$faq_list);
			$GLOBALS['tmpl']->assign("page_title","常见问题");
		}
		$GLOBALS['tmpl']->display("faq_index.html",$cache_id);
	}	
	
}
?>