<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class stockModule extends BaseModule{
	public function index(){
		session_start();
		$cate = strim($_REQUEST['cate']);
		$com_type = strim($_REQUEST['com_type']);
		$deal_type = strim($_REQUEST['deal_type']);
		$province = strim($_REQUEST['province']);
		
		if($cate == "" && $com_type== "" && $deal_type == "" && $province ==""){
			$_SESSION['CACHE_S_CATE'] = "all";$_SESSION['CACHE_S_COM_TYPE'] = "all";
			$_SESSION['CACHE_S_DEAL_TYPE'] = "all";$_SESSION['CACHE_S_PROVINCE'] = "all";
		}
		if($cate != "")
			$_SESSION['CACHE_S_CATE'] = $cate; 
		if($com_type != "")
			$_SESSION['CACHE_S_COM_TYPE'] = $com_type;
		if($deal_type != "")
			$_SESSION['CACHE_S_DEAL_TYPE'] = $deal_type;
		if($province != "")
			$_SESSION['CACHE_S_PROVINCE'] = $province;

		$s_g_cate = $_SESSION['CACHE_S_CATE'];
		$GLOBALS['tmpl']->assign("s_g_cate",$s_g_cate);
		$s_g_com_type = $_SESSION['CACHE_S_COM_TYPE'];
		$GLOBALS['tmpl']->assign("s_g_com_type",$s_g_com_type);
		$s_g_deal_type = $_SESSION['CACHE_S_DEAL_TYPE'];
		$GLOBALS['tmpl']->assign("s_g_deal_type",$s_g_deal_type);
		$s_g_province = $_SESSION['CACHE_S_PROVINCE'];
		$GLOBALS['tmpl']->assign("s_g_province",$s_g_province);

		$condition = " is_delete = 0 ";
		if($s_g_cate!="" && $s_g_cate!="all")
			$condition .= " and cate = '".$s_g_cate."'";
		if($s_g_com_type!="" && $s_g_com_type!="all")
			$condition .= " and com_type = '".$s_g_com_type."'";
		if($s_g_deal_type!="" && $s_g_deal_type!="all")
			$condition .= " and deal_type = '".$s_g_deal_type."'"; 
		if($s_g_province!="" && $s_g_province!="all")
			$condition .= " and province = '".$s_g_province."'";


		$page_size = DEAL_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = ($page-1)*$page_size.",".$page_size;	

		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."stock where ".$condition);
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$pn  =  $page->shownum();
		$GLOBALS['tmpl']->assign('page',$p);
		$GLOBALS['tmpl']->assign('pagenum',$pn);	

		$cate_list = $GLOBALS['db']->getAll("select distinct cate from ".DB_PREFIX."stock order by sort asc");
		$GLOBALS['tmpl']->assign("cate_list",$cate_list);

		$com_type_list = $GLOBALS['db']->getAll("select distinct com_type from ".DB_PREFIX."stock order by sort asc");
		$GLOBALS['tmpl']->assign("com_type_list",$com_type_list);

		$deal_type_list = $GLOBALS['db']->getAll("select distinct deal_type from ".DB_PREFIX."stock order by sort asc");
		$GLOBALS['tmpl']->assign("deal_type_list",$deal_type_list);

		$province_list = $GLOBALS['db']->getAll("select distinct province from ".DB_PREFIX."stock order by sort asc");
		$GLOBALS['tmpl']->assign("province_list",$province_list);
		
		$stock_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."stock  where ".$condition." limit ".$limit);
		$GLOBALS['tmpl']->assign("stock_list",$stock_list);
		$GLOBALS['tmpl']->display("stock.html");
	}
}
?>