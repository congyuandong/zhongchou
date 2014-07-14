<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------


class helpModule extends BaseModule
{
	public function index()
	{		
		$act = strim($_REQUEST['act']);
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME.$act);		
		if (!$GLOBALS['tmpl']->is_cached('help_index.html', $cache_id))
		{
			$help_item = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."help where type = '".$act."' or id = ".intval($act));
			if($help_item)
			{			
				$GLOBALS['tmpl']->assign("help_item",$help_item);
				$GLOBALS['tmpl']->assign("page_title",$help_item['title']);
			}
			else
			{
				app_redirect(url("index"));
			}
		}
		$GLOBALS['tmpl']->display("help_index.html",$cache_id);
	}

	
	
}
?>