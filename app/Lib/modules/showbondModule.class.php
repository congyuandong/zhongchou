<?php
class showbondModule extends BaseModule{
	public function index(){
		$id = intval($_REQUEST['id']);
		$bond_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."bond where id = ".$id);
		if(!$bond_info)
		{
			app_redirect(url("index"));
		}
		$GLOBALS['tmpl']->assign("bond_info",$bond_info);	
		$GLOBALS['tmpl']->display("bdetail.html");
	}
}
?>