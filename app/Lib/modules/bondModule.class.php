<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class bondModule extends BaseModule{
	public function index(){
		session_start();
		$com_type = strim($_REQUEST['com_type']);
		$last_day = strim($_REQUEST['last_day']);
		$scale = strim($_REQUEST['scale']);
		$deal_status = strim($_REQUEST['deal_status']);

		if($com_type == "" && $last_day == "" && $scale == "" && $deal_status == ""){
			$_SESSION['CACHE_B_COM_TYPE'] = "";$_SESSION['CACHE_B_LAST_DAY'] = "1";
			$_SESSION['CACHE_B_SCALE'] = "1";$_SESSION['CACHE_B_DEAL_STATUS'] = "";
		}
		if($com_type != "")
			$_SESSION['CACHE_B_COM_TYPE'] = $com_type;
		if($last_day != "")
			$_SESSION['CACHE_B_LAST_DAY'] = $last_day;
		if($scale != "")
			$_SESSION['CACHE_B_SCALE'] = $scale;
		if($deal_status != "")
			$_SESSION['CACHE_B_DEAL_STATUS'] = $deal_status;

		$b_g_com_type = $_SESSION['CACHE_B_COM_TYPE'];
		$GLOBALS['tmpl']->assign("b_g_com_type",$b_g_com_type);
		$b_g_last_day = $_SESSION['CACHE_B_LAST_DAY'];
		$GLOBALS['tmpl']->assign("b_g_last_day",$b_g_last_day);
		$b_g_scale = $_SESSION['CACHE_B_SCALE'];
		$GLOBALS['tmpl']->assign("b_g_scale",$b_g_scale);
		$b_g_deal_status = $_SESSION['CACHE_B_DEAL_STATUS'];
		$GLOBALS['tmpl']->assign("b_g_deal_status",$b_g_deal_status);

		$condition = " is_delete = 0 ";
		if($b_g_com_type!="" && $b_g_com_type!="all")
			$condition .= " and com_type = '".$b_g_com_type."'";
		if($b_g_deal_status!="" && $b_g_deal_status!="all")
			$condition .= " and deal_status = '".$b_g_deal_status."'";


		$com_type_list = $GLOBALS['db']->getAll("select distinct com_type from ".DB_PREFIX."bond order by sort asc");
		$GLOBALS['tmpl']->assign("com_type_list",$com_type_list);
		$deal_status_list = $GLOBALS['db']->getAll("select distinct deal_status from ".DB_PREFIX."bond order by sort asc");
		$GLOBALS['tmpl']->assign("deal_status_list",$deal_status_list);

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