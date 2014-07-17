<?php
require APP_ROOT_PATH.'app/Lib/page.php';
class transferModule extends BaseModule{
	public function index(){
		session_start();
		$com_type = strim($_REQUEST['com_type']);
		$last_day = intval($_REQUEST['last_day']);
		$scale = intval($_REQUEST['scale']);
		$deal_status = strim($_REQUEST['deal_status']);

		if($com_type == "" && $last_day == "" && $scale == "" && $deal_status == ""){
			$_SESSION['CACHE_T_COM_TYPE'] = "";$_SESSION['CACHE_T_LAST_DAY'] = 1;
			$_SESSION['CACHE_T_SCALE'] = 1;$_SESSION['CACHE_T_DEAL_STATUS'] = "";
		}
		if($com_type != "")
			$_SESSION['CACHE_T_COM_TYPE'] = $com_type;
		if($last_day != "")
			$_SESSION['CACHE_T_LAST_DAY'] = $last_day;
		if($scale != "")
			$_SESSION['CACHE_T_SCALE'] = $scale;
		if($deal_status != "")
			$_SESSION['CACHE_T_DEAL_STATUS'] = $deal_status;

		$t_g_com_type = $_SESSION['CACHE_T_COM_TYPE'];
		$GLOBALS['tmpl']->assign("t_g_com_type",$t_g_com_type);
		$t_g_last_day = $_SESSION['CACHE_T_LAST_DAY'];
		$GLOBALS['tmpl']->assign("t_g_last_day",$t_g_last_day);
		$t_g_scale = $_SESSION['CACHE_T_SCALE'];
		$GLOBALS['tmpl']->assign("t_g_scale",$t_g_scale);
		$t_g_deal_status = $_SESSION['CACHE_T_DEAL_STATUS'];
		$GLOBALS['tmpl']->assign("t_g_deal_status",$t_g_deal_status);

		$condition = " is_delete = 0 ";
		if($t_g_com_type!="" && $t_g_com_type!="all")
			$condition .= " and com_type = '".$t_g_com_type."'";
		if($t_g_deal_status!="" && $t_g_deal_status!="all")
			$condition .= " and deal_status = '".$t_g_deal_status."'";
		if($t_g_last_day!="" && $t_g_last_day!=1){
			switch ($t_g_last_day) {
				case 2:
					$condition .= " and last_day > 0 and last_day <= 90";
					break;
				case 3:
					$condition .= " and last_day > 90 and last_day <= 180";
					break;
				case 4:
					$condition .= " and last_day > 180 and last_day <= 270";
					break;
				case 5:
					$condition .= " and last_day > 270 and last_day <= 360";
					break;
				case 6:
					$condition .= " and last_day > 360";
					break;
			}
		}
		if($t_g_scale!="" && $t_g_scale!=1){
			switch ($t_g_scale) {
				case 2:
					$condition .= " and tran_scale_real > 0 and tran_scale_real < 5";
					break;
				case 3:
					$condition .= " and tran_scale_real >= 5 and tran_scale_real < 6";
					break;
				case 4:
					$condition .= " and tran_scale_real >= 6 and tran_scale_real < 7";
					break;
				case 5:
					$condition .= " and tran_scale_real >= 7 and tran_scale_real < 8";
					break;
				case 6:
					$condition .= " and tran_scale_real >= 8";
					break;
			}
		}

		$com_type_list = $GLOBALS['db']->getAll("select distinct com_type from ".DB_PREFIX."transfer order by sort asc");
		$GLOBALS['tmpl']->assign("com_type_list",$com_type_list);
		$deal_status_list = $GLOBALS['db']->getAll("select distinct deal_status from ".DB_PREFIX."transfer order by sort asc");
		$GLOBALS['tmpl']->assign("deal_status_list",$deal_status_list);


		$page_size = DEAL_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = ($page-1)*$page_size.",".$page_size;


		 
		
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."transfer where ".$condition);
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$pn  =  $page->shownum();
		$GLOBALS['tmpl']->assign('page',$p);
		$GLOBALS['tmpl']->assign('pagenum',$pn);	
		
		
		$transfer_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."transfer  where ".$condition." limit ".$limit);
		$GLOBALS['tmpl']->assign("transfer_list",$transfer_list);
		$GLOBALS['tmpl']->display("transfer.html");
	}
}
?>