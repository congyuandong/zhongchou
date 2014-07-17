<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class bondModule extends BaseModule{
	public function index(){
		session_start();
		$com_type = strim($_REQUEST['com_type']);

		if($com_type == ""){
			$_SESSION['CACHE_B_COM_TYPE'] = "";
		}
		if($com_type != "")
			$_SESSION['CACHE_B_COM_TYPE'] = $com_type;

		$b_g_com_type = $_SESSION['CACHE_B_COM_TYPE'];
		$GLOBALS['tmpl']->assign("b_g_com_type",$b_g_com_type);

		$condition = " is_delete = 0 ";
		if($b_g_com_type!="" && $b_g_com_type!="all")
			$condition .= " and com_type = '".$b_g_com_type."'";


		$com_type_list = $GLOBALS['db']->getAll("select distinct com_type from ".DB_PREFIX."bond order by sort asc");
		$GLOBALS['tmpl']->assign("com_type_list",$com_type_list);


		$page_size = DEAL_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = ($page-1)*$page_size.",".$page_size;


		 
		
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."bond where ".$condition);
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$pn  =  $page->shownum();
		$GLOBALS['tmpl']->assign('page',$p);
		$GLOBALS['tmpl']->assign('pagenum',$pn);	
		
		
		$bond_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."bond  where ".$condition." limit ".$limit);
		$GLOBALS['tmpl']->assign("bond_list",$bond_list);
		$GLOBALS['tmpl']->display("bond.html");
	}
}
?>