<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class stockModule extends BaseModule{
	public function index(){
		$page_size = DEAL_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = ($page-1)*$page_size.",".$page_size;


		$condition = " is_delete = 0 "; 
		
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."stock where ".$condition);
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$pn  =  $page->shownum();
		$GLOBALS['tmpl']->assign('page',$p);
		$GLOBALS['tmpl']->assign('pagenum',$pn);	
		
		
		$stock_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."stock  where ".$condition." limit ".$limit);
		$GLOBALS['tmpl']->assign("stock_list",$stock_list);
		$GLOBALS['tmpl']->display("stock.html");
	}
}
?>