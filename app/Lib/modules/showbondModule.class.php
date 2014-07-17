<?php
class showbondModule extends BaseModule{
	public function index(){
		$id = intval($_REQUEST['id']);
		$bond_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."bond where id = ".$id);
		if(!$bond_info)
		{
			app_redirect(url("index"));
		}
		$bond_order = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."order where type = 1");
		
		$GLOBALS['tmpl']->assign("bond_info",$bond_info);	
		$GLOBALS['tmpl']->assign("bond_order",$bond_order);
		$GLOBALS['tmpl']->display("bdetail.html");
	}
}
?>