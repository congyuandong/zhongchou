<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class transferModule extends BaseModule{
	public function index(){
		$GLOBALS['tmpl']->display("transfer_index.html");
	}
}
?>