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
		$stock_list1 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."stock where deal_type='筹资中' and is_delete = 0 order by id asc limit 3");
		$GLOBALS['tmpl']->assign("stock_list1",$stock_list1);
		$stock_list2 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."stock where deal_type='即将开始' and is_delete = 0 order by id asc limit 3");
		$GLOBALS['tmpl']->assign("stock_list2",$stock_list2);
		$stock_list3 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."stock where deal_type='成功项目' and is_delete = 0 order by id asc limit 3");
		$GLOBALS['tmpl']->assign("stock_list3",$stock_list3);
		
		$bond_list1 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."bond where deal_status='投标中' and is_delete = 0 order by id asc limit 3");
		$GLOBALS['tmpl']->assign("bond_list1",$bond_list1);
		$bond_list2 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."bond where deal_status='还款中' and is_delete = 0 order by id asc limit 3");
		$GLOBALS['tmpl']->assign("bond_list2",$bond_list2);
		$bond_list3 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."bond where deal_status='还款完成' and is_delete = 0 order by id asc limit 3");
		$GLOBALS['tmpl']->assign("bond_list3",$bond_list3);
		
		$transfer_list1 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."transfer where deal_status='进行中' and is_delete = 0 order by id asc limit 4");
		$GLOBALS['tmpl']->assign("transfer_list1",$transfer_list1);
		$transfer_list2 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."transfer where deal_status='已完成' and is_delete = 0 order by id asc limit 4");
		$GLOBALS['tmpl']->assign("transfer_list2",$transfer_list2);
		
		
		$GLOBALS['tmpl']->display("index.html");
	}
	

	
	
}
?>