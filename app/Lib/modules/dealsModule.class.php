<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/page.php';
class dealsModule extends BaseModule
{
	public function index()
	{		

		$r = strim($_REQUEST['r']);   //推荐类型
		$GLOBALS['tmpl']->assign("p_r",$r);
		$id = intval($_REQUEST['id']);  //分类id
		$GLOBALS['tmpl']->assign("p_id",$id);
		$loc = strim($_REQUEST['loc']);  //地区
		$GLOBALS['tmpl']->assign("p_loc",$loc);
		$tag = strim($_REQUEST['tag']);  //标签
		$GLOBALS['tmpl']->assign("p_tag",$tag);
		$kw = strim($_REQUEST['k']);    //关键词
		$GLOBALS['tmpl']->assign("p_k",$kw);
		
		if(intval($_REQUEST['redirect'])==1)
		{
			$param = array();
			if($r!="")
			{
				$param = array_merge($param,array("r"=>$r));
			}
			if($id>0)
			{
				$param = array_merge($param,array("id"=>$id));
			}
			if($loc!="")
			{
				$param = array_merge($param,array("loc"=>$loc));
			}
			if($tag!="")
			{
				$param = array_merge($param,array("tag"=>$tag));
			}
			if($kw!="")
			{
				$param = array_merge($param,array("k"=>$kw));
			}
			app_redirect(url("deals",$param));
		}
		
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
		
		$condition = " is_delete = 0 and is_effect = 1 "; 
		if($r!="")
		{
			if($r=="new")
			{
				$condition.=" and ".NOW_TIME." - begin_time < ".(24*3600)." and ".NOW_TIME." - begin_time > 0 ";  //上线不超过一天
				$GLOBALS['tmpl']->assign("page_title","最新上线");
			}
			if($r=="nend")
			{
				$condition.=" and end_time - ".NOW_TIME." < ".(24*3600)." and end_time - ".NOW_TIME." > 0 ";  //当天就要结束
				$GLOBALS['tmpl']->assign("page_title","即将结束");
			}
			if($r=="classic")
			{
				$condition.=" and is_classic = 1 ";
				$GLOBALS['tmpl']->assign("page_title","经典项目");
			}
		}
		if($id>0)
		{
			$condition.= " and cate_id = ".$id;
			$GLOBALS['tmpl']->assign("page_title",$cate_result[$id]['name']);			
		}
		
		if($loc!="")
		{
			$condition.=" and (province = '".$loc."' or city = '".$loc."') ";
			$GLOBALS['tmpl']->assign("page_title",$loc);
		}
		
		if($tag!="")
		{
			$unicode_tag = str_to_unicode_string($tag);
			$condition.=" and match(tags_match) against('".$unicode_tag."'  IN BOOLEAN MODE) ";
			$GLOBALS['tmpl']->assign("page_title",$tag);
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

			$GLOBALS['tmpl']->assign("page_title",$kw);
		}
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where ".$condition." order by sort asc limit ".$limit);
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where ".$condition);
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_list);
		
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);		
		
		$GLOBALS['tmpl']->display("deals_index.html");
	}
	

	
	
}
?>