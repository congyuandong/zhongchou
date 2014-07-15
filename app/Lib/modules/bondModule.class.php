<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class bondModule extends BaseModule{
	public function index(){
		$GLOBALS['tmpl']->display("bond_index.html");
	}
}
?>