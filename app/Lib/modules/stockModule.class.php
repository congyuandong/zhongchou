<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class stockModule extends BaseModule{
	public function index(){
		$GLOBALS['tmpl']->display("stock_index.html");
	}
}
?>