<?php
class showstockModule extends BaseModule{
	public function index(){
		$id = intval($_REQUEST['id']);
		$stock_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."stock where id = ".$id);
		if(!$stock_info)
		{
			app_redirect(url("index"));
		}
		$GLOBALS['tmpl']->assign("stock_info",$stock_info);	
		$GLOBALS['tmpl']->display("sdetail.html");
	}
}
?>