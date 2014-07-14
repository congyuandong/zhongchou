<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/page.php';
class accountModule extends BaseModule
{
	public function index()
	{		
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));		
		
		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
		
		$order_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_order where user_id = ".intval($GLOBALS['user_info']['id'])." and (order_status > 0 or credit_pay > 0) order by create_time desc limit ".$limit);
		$order_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_order where user_id = ".intval($GLOBALS['user_info']['id'])." and (order_status > 0 or credit_pay > 0)");
		
		$page = new Page($order_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		foreach($order_list as $k=>$v)
		{
			$order_list[$k]['deal_info'] = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$v['deal_id']." and is_effect = 1 and is_delete = 0");
		}
		$GLOBALS['tmpl']->assign('order_list',$order_list);
		
		$GLOBALS['tmpl']->display("account_index.html");
	}
	
	public function focus()
	{		
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));		
		
		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
		
		$s = intval($_REQUEST['s']);
		if($s==3)
		$sort_field = " d.support_amount desc ";
		if($s==1)
		$sort_field = " d.support_count desc ";
		if($s==2)
		$sort_field = " d.support_amount - d.limit_price desc ";
		if($s==0)
		$sort_field = " d.end_time asc ";
		
		$GLOBALS['tmpl']->assign("s",$s);
		
		$f = intval($_REQUEST['f']);
		if($f==0)
		$cond = " 1=1 ";
		if($f==1)
		$cond = " d.begin_time < ".NOW_TIME." and (d.end_time = 0 or d.end_time > ".NOW_TIME.") ";
		if($f==2)
		$cond = " d.end_time <> 0 and d.end_time < ".NOW_TIME." and d.is_success = 1 "; //过期成功
		if($f==3)
		$cond = " d.end_time <> 0 and d.end_time < ".NOW_TIME." and d.is_success = 0 "; //过期失败
		$GLOBALS['tmpl']->assign("f",$f);
		
		
		
		$app_sql = " ".DB_PREFIX."deal_focus_log as dfl left join ".DB_PREFIX."deal as d on d.id = dfl.deal_id where dfl.user_id = ".intval($GLOBALS['user_info']['id']).
				   " and d.is_effect = 1 and d.is_delete = 0 and ".$cond." ";

		$deal_list = $GLOBALS['db']->getAll("select d.*,dfl.id as fid from ".$app_sql." order by ".$sort_field." limit ".$limit);
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".$app_sql);
		
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
		}
		
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);

		$GLOBALS['tmpl']->assign('deal_list',$deal_list);
		
		$GLOBALS['tmpl']->display("account_focus.html");
	}
	
	public function del_focus()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		$id = intval($_REQUEST['id']);
		$deal_id = $GLOBALS['db']->getOne("select deal_id from ".DB_PREFIX."deal_focus_log where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
		$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_focus_log where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
		$GLOBALS['db']->query("update ".DB_PREFIX."deal set focus_count = focus_count - 1 where id = ".intval($deal_id));
		$GLOBALS['db']->query("delete from ".DB_PREFIX."user_deal_notify where user_id = ".intval($GLOBALS['user_info']['id'])." and deal_id = ".$deal_id);
							
		app_redirect_preview();
	}
	
	public function incharge()
	{		
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));		
		$GLOBALS['tmpl']->display("account_incharge.html");
	}
	
	public function do_incharge()
	{		
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		$money = doubleval($_REQUEST['money']);
		if($money<=0)
		{
			showErr("充值的金额不正确",$ajax,"");
		}
		
		showSuccess("",$ajax,url("account#pay",array("money"=>round($money*100))));
	}
	
	public function pay()
	{		
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		$money = doubleval(intval($_REQUEST['money'])/100);
		if($money<=0)
		{
			app_redirect(url("account#incharge"));
		}
		
		$GLOBALS['tmpl']->assign("money",$money);
		$payment_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."payment where is_effect = 1 order by sort asc ");
		$payment_html = "";
		foreach($payment_list as $k=>$v)
		{
			$class_name = $v['class_name']."_payment";
			require_once APP_ROOT_PATH."system/payment/".$class_name.".php";
			$o = new $class_name;
			$payment_html .= "<div>".$o->get_display_code()."<div class='blank'></div></div>";
		}
		$GLOBALS['tmpl']->assign("payment_html",$payment_html);
		$GLOBALS['tmpl']->display("account_pay.html");
	}
	
	public function go_pay()
	{
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		
		$payment_id = intval($_REQUEST['payment']);
		if($payment_id==0)
		{
			app_redirect(url("account#pay"));
		}
		
		$money = doubleval($_REQUEST['money']);
		if($money<=0)
		{
			app_redirect(url("account#pay"));
		}
		
		$payment_notice['create_time'] = NOW_TIME;
		$payment_notice['user_id'] = intval($GLOBALS['user_info']['id']);
		$payment_notice['payment_id'] = $payment_id;
		$payment_notice['money'] = $money;
		$payment_notice['bank_id'] = strim($_REQUEST['bank_id']);
		
		do{
			$payment_notice['notice_sn'] = to_date(NOW_TIME,"Ymd").rand(100,999);
			$GLOBALS['db']->autoExecute(DB_PREFIX."payment_notice",$payment_notice,"INSERT","","SILENT");
			$notice_id = $GLOBALS['db']->insert_id();
		}while($notice_id==0);
		

		app_redirect(url("account#jump",array("id"=>$notice_id)));
		
	}
	
	public function jump()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		$notice_id = intval($_REQUEST['id']);
		$notice_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where id = ".$notice_id." and is_paid = 0 and user_id = ".intval($GLOBALS['user_info']['id']));
		if(!$notice_info)
		{
			app_redirect(url("index"));
		}
		$payment_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where id = ".$notice_info['payment_id']);
		$class_name = $payment_info['class_name']."_payment";
		require_once APP_ROOT_PATH."system/payment/".$class_name.".php";
		$o = new $class_name;
		
		header("Content-Type:text/html; charset=utf-8");
		echo $o->get_payment_code($notice_id);
	}
	
	public function project()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));	

		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where user_id = ".intval($GLOBALS['user_info']['id'])." and is_delete = 0 order by create_time desc limit ".$limit);
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where user_id = ".intval($GLOBALS['user_info']['id'])." and is_delete = 0");
		
		$page = new Page($deal_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		$GLOBALS['tmpl']->assign('deal_list',$deal_list);
		
		$GLOBALS['tmpl']->display("account_project.html");
	}
	
	public function credit()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
		
		$log_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_log where user_id = ".intval($GLOBALS['user_info']['id'])." order by log_time desc limit ".$limit);
		$log_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_log where user_id = ".intval($GLOBALS['user_info']['id']));
	
		$page = new Page($log_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		$GLOBALS['tmpl']->assign('log_list',$log_list);
		
		$GLOBALS['tmpl']->display("account_credit.html");
	}
	
	public function del_order()
	{
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		$order_id = intval($_REQUEST['id']);
		$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where order_status = 0 and user_id = ".intval($GLOBALS['user_info']['id'])." and id = ".$order_id);
		if(!$order_info)
		{
			showErr("无效的订单",$ajax,"");
		}
		else
		{
			$money = $order_info['credit_pay'];
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_order where id = ".$order_id." and user_id = ".intval($GLOBALS['user_info']['id'])." and order_status = 0");
			if($GLOBALS['db']->affected_rows()>0)
			{
				if($money>0)
				{
					require_once APP_ROOT_PATH."system/libs/user.php";
					modify_account(array("money"=>$money),intval($GLOBALS['user_info']['id']),"删除".$order_info['deal_name']."项目支付，退回支付款。");						
				}
			}
			showSuccess("",$ajax,get_gopreview());
		}
	}
	
	public function view_order()
	{
		if(!$GLOBALS['user_info'])
		app_redirect(url("user#login"));
		
		$id = intval($_REQUEST['id']);
		$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id'])." and (order_status > 0 or credit_pay > 0)");
		if(!$order_info)
		{
			showErr("无效的项目支持",0,get_gopreview());
		}
		$GLOBALS['tmpl']->assign("order_info",$order_info);
		$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$order_info['deal_id']." and is_delete = 0 and is_effect = 1");
		$GLOBALS['tmpl']->assign("deal_info",$deal_info);
		
		if($order_info['order_status'] == 0)
		{
			$payment_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."payment where is_effect = 1 order by sort asc ");
			$payment_html = "";
			foreach($payment_list as $k=>$v)
			{
				$class_name = $v['class_name']."_payment";
				require_once APP_ROOT_PATH."system/payment/".$class_name.".php";
				$o = new $class_name;
				$payment_html .= "<div>".$o->get_display_code()."<div class='blank'></div></div>";
			}
			$GLOBALS['tmpl']->assign("payment_html",$payment_html);
			
			$max_pay = $order_info['total_price'] - $order_info['credit_pay'];
			$GLOBALS['tmpl']->assign("max_pay",$max_pay);
		}
		
		
		$GLOBALS['tmpl']->display("account_view_order.html");
	}
	
	public function go_order_pay()
	{

		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		
		$id = intval($_REQUEST['order_id']);
		$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id'])." and order_status = 0");
		
		if(!$order_info)
		{
			showErr("项目支持已支付",0,get_gopreview());
		}
		else
		{
			$credit = doubleval($_REQUEST['credit']);
			$payment_id = intval($_REQUEST['payment']);
			
			if($credit>0)
			{				
				$max_pay = $order_info['total_price'] - $order_info['credit_pay'];
				$max_credit= $max_pay<$GLOBALS['user_info']['money']?$max_pay:$GLOBALS['user_info']['money'];
				$credit = $credit>$max_credit?$max_credit:$credit;		
				if($credit>0)
				{	
				$GLOBALS['db']->query("update ".DB_PREFIX."deal_order set credit_pay = credit_pay + ".$credit." where id = ".$order_info['id']);//追加使用余额支付
				
				require_once APP_ROOT_PATH."system/libs/user.php";
				modify_account(array("money"=>"-".$credit),intval($GLOBALS['user_info']['id']),"支持".$order_info['deal_name']."项目支付");		
				}		
			}
			$result = pay_order($order_info['id']);

			if($result['status']==0)
			{
				$money = $result['money'];
				$payment_notice['create_time'] = NOW_TIME;
				$payment_notice['user_id'] = intval($GLOBALS['user_info']['id']);
				$payment_notice['payment_id'] = $payment_id;
				$payment_notice['money'] = $money;
				$payment_notice['bank_id'] = strim($_REQUEST['bank_id']);
				$payment_notice['order_id'] = $order_info['id'];
				$payment_notice['memo'] = $order_info['support_memo'];
				$payment_notice['deal_id'] = $order_info['deal_id'];
				$payment_notice['deal_item_id'] = $order_info['deal_item_id'];
				$payment_notice['deal_name'] = $order_info['deal_name'];
				
				do{
					$payment_notice['notice_sn'] = to_date(NOW_TIME,"Ymd").rand(100,999);
					$GLOBALS['db']->autoExecute(DB_PREFIX."payment_notice",$payment_notice,"INSERT","","SILENT");
					$notice_id = $GLOBALS['db']->insert_id();
				}while($notice_id==0);
				
		
				app_redirect(url("cart#jump",array("id"=>$notice_id)));
			}
			else
			{
				app_redirect(url("account#view_order",array("id"=>$order_info['id'])));  
			}
		}	
		
	}
	
	public function support()
	{
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		
		$deal_id = intval($_REQUEST['id']);
		$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$deal_id." and is_delete = 0 and is_effect = 1 and is_success = 1 and user_id = ".intval($GLOBALS['user_info']['id']));
		
		if(!$deal_info)
		{
			app_redirect_preview();
		}
		$GLOBALS['tmpl']->assign("deal_info",$deal_info);
		
		
		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size).",".$page_size	;

		$support_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_order where deal_id = ".$deal_id." and order_status = 3 and is_refund = 0 order by create_time desc limit ".$limit);
		$support_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_order where deal_id = ".$deal_id." and order_status = 3 and is_refund = 0");
		
		
		$GLOBALS['tmpl']->assign("support_list",$support_list);

		$page = new Page($support_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);	
		
		$GLOBALS['tmpl']->display("account_support.html");
	}
	
	public function save_repay()
	{
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		$order_id = intval($_REQUEST['id']);
		$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$order_id." and order_status = 3 and is_refund = 0");
		if(!$order_info)
		{
			showErr("无权为该订单设置回报",$ajax);
		}
		
		$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$order_info['deal_id']." and is_delete = 0 and is_effect = 1 and is_success = 1 and user_id = ".intval($GLOBALS['user_info']['id']));
		if(!$deal_info)
		{
			showErr("无权为该订单设置回报",$ajax);
		}
		
		$order_info['repay_time'] = NOW_TIME;
		$order_info['repay_memo'] = strim($_REQUEST['repay_memo']);
		
		if($order_info['repay_memo']=="")
		{
			showErr("请输入回报内容",$ajax);
		}
		
		$GLOBALS['db']->autoExecute(DB_PREFIX."deal_order",$order_info,"UPDATE","id=".$order_info['id']);
		
		send_notify($order_info['user_id'],"您支持的项目".$order_info['deal_name']."回报已发放","account#view_order","id=".$order_info['id']);
		showSuccess("回报设置成功",$ajax);		
		
	}
	
	public function paid()
	{
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		
		$deal_id = intval($_REQUEST['id']);
		$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$deal_id." and is_delete = 0 and is_effect = 1 and is_success = 1 and user_id = ".intval($GLOBALS['user_info']['id']));
		
		if(!$deal_info)
		{
			app_redirect_preview();
		}
		$GLOBALS['tmpl']->assign("deal_info",$deal_info);
		
		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size).",".$page_size	;

		$paid_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_pay_log where deal_id = ".$deal_id." order by create_time desc limit ".$limit);
		$paid_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_pay_log where deal_id = ".$deal_id);
		
		
		$GLOBALS['tmpl']->assign("paid_list",$paid_list);

		$page = new Page($paid_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		$GLOBALS['tmpl']->display("account_paid.html");
	}
	
	public function refund()
	{
		if(!$GLOBALS['user_info'])
		{
			app_redirect(url("user#login"));
		}
		
		$page_size = ACCOUNT_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)$page = 1;		
		$limit = (($page-1)*$page_size).",".$page_size	;

		$refund_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_refund where user_id = ".intval($GLOBALS['user_info']['id'])." order by create_time desc limit ".$limit);
		$refund_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_refund where user_id = ".intval($GLOBALS['user_info']['id']));
	
		
		$GLOBALS['tmpl']->assign("refund_list",$refund_list);

		$page = new Page($refund_count,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		$GLOBALS['tmpl']->display("account_refund.html");
	}
	
	public function submitrefund()
	{
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		$money = doubleval($_REQUEST['money']);
		$memo = strim($_REQUEST['memo']);
		
		if($money<=0)
		{
			showErr("提现金额出错",$ajax);
		}
		
		$ready_refund_money =doubleval($GLOBALS['db']->getOne("select sum(money) from ".DB_PREFIX."user_refund where user_id = ".intval($GLOBALS['user_info']['id'])." and is_pay = 0"));
		if($ready_refund_money + $money > $GLOBALS['user_info']['money'])
		{
			showErr("提现超出限制",$ajax);
		}
		
		$refund_data['money'] = $money;
		$refund_data['user_id'] = $GLOBALS['user_info']['id'];
		$refund_data['create_time'] = NOW_TIME;
		$refund_data['memo'] = $memo;
		$GLOBALS['db']->autoExecute(DB_PREFIX."user_refund",$refund_data);
		
		showSuccess("",$ajax,get_gopreview());
	}
	
	public function delrefund()
	{
		$ajax = intval($_REQUEST['ajax']);
		if(!$GLOBALS['user_info'])
		{
			showErr("",$ajax,url("user#login"));
		}
		
		$id = intval($_REQUEST['id']);
		$GLOBALS['db']->query("delete from ".DB_PREFIX."user_refund where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
		if($GLOBALS['db']->affected_rows()>0)
		{
			showSuccess("删除成功",$ajax);
		}
		else
		{
			showErr("删除失败",$ajax);
		}
		
	}
}
?>