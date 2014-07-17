<?php
class showstockModule extends BaseModule{
	public function index(){
		$id = intval($_REQUEST['id']);
		$stock_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."stock where id = ".$id);
		if(!$stock_info)
		{
			app_redirect(url("index"));
		}
		$stock_order = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."order where type = 0");

		$GLOBALS['tmpl']->assign("stock_info",$stock_info);	
		$GLOBALS['tmpl']->assign("stock_order",$stock_order);	
		$GLOBALS['tmpl']->display("sdetail.html");
	}
}
?>