<?php
class showtransferModule extends BaseModule{
	public function index(){
		$id = intval($_REQUEST['id']);
		$transfer_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."transfer where id = ".$id);
		if(!$transfer_info)
		{
			app_redirect(url("index"));
		}
		$GLOBALS['tmpl']->assign("transfer_info",$transfer_info);	
		$GLOBALS['tmpl']->display("tdetail.html");
	}
}
?>