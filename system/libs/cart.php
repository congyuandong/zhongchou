<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

//用户可删除已用余额支付的订单，并将余额退回帐户
define("PAYMENT_NOT_EXIST",0); //支付单被删除(提示联系管理员)
define("PAY_SUCCESS",1);  //充值成功(充值到相应的会员帐户中，并生成日志)或者订单支付成功
define("ORDER_REPAY",2);    //订单重复支付(即付款单所属的订单已支付，将支付的金额转存到会员帐户，并生成日志)
define("ORDER_EXPIRED",3);   //订单支付失败(限时已到，无法完成订单支付，退款到会员帐户，并生成日志)
define("ORDER_SOLDOUT",4);   //订单支付失败(即库存已满，无法完成订单支付，退款到会员帐户，并生成日志)

//付款记录支付
//返回
function payment_paid($notice_sn,$outer_sn)
{
	$payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where notice_sn = '".$notice_sn."'");
	if($payment_notice)
	{
		if($payment_notice['order_id']==0)
		{
			//充值单
			$GLOBALS['db']->query("update ".DB_PREFIX."payment_notice set pay_time = '".get_gmtime()."',is_paid = 1,outer_notice_sn = '".$outer_sn."' where id = ".$payment_notice['id']." and is_paid = 0");
			if($GLOBALS['db']->affected_rows()>0)
			{
				$GLOBALS['db']->query("update ".DB_PREFIX."payment set total_amount = total_amount + ".$payment_notice['money']." where id = ".$payment_notice['payment_id']);
				$payment_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where id = ".$payment_notice['payment_id']);
				require_once APP_ROOT_PATH."system/libs/user.php";
				require_once APP_ROOT_PATH."system/payment/".$payment_info['class_name']."_payment.php";			
				$log_info = "通过".$payment_info['name'].$payment_lang[$payment_notice['bank_id']]."充值，单号".$outer_sn;				
				modify_account(array("money"=>$payment_notice['money']),$payment_notice['user_id'],$log_info);
			}			
			return array("info"=>"恭喜您,成功".$log_info,"jump"=>url("account"));  //已充值
			
		}	
		else
		{
			$GLOBALS['db']->query("update ".DB_PREFIX."payment_notice set pay_time = '".get_gmtime()."',is_paid = 1,outer_notice_sn = '".$outer_sn."' where id = ".$payment_notice['id']." and is_paid = 0");
			if($GLOBALS['db']->affected_rows()>0)
			{
				$GLOBALS['db']->query("update ".DB_PREFIX."payment set total_amount = total_amount + ".$payment_notice['money']." where id = ".$payment_notice['payment_id']);
				
				$order_id = $payment_notice['order_id'];
				$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$order_id);
				if($order_info)
				{
					if($order_info['order_status']>0)
					{
						//已支付
						$payment_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where id = ".$payment_notice['payment_id']);
						require_once APP_ROOT_PATH."system/libs/user.php";
						require_once APP_ROOT_PATH."system/payment/".$payment_info['class_name']."_payment.php";				
						$log_info = "通过".$payment_info['name'].$payment_lang[$payment_notice['bank_id']]."支付，单号".$outer_sn."，订单已支付过，转存入会员帐户";				
						modify_account(array("money"=>$payment_notice['money']),$payment_notice['user_id'],$log_info);
						return array("info"=>$log_info,"jump"=>url("account#credit")); 
					}
					else
					{
						//开始支付订单
						$GLOBALS['db']->query("update ".DB_PREFIX."deal_order set online_pay = ".$payment_notice['money']." where id = ".$order_info['id']);
						$result = pay_order($order_info['id']);
						if($result['status']==1)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>已过期，金额已退回帐户","jump"=>url("account#credit")); 
						}
						if($result['status']==2)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>限额已满，金额已退回帐户","jump"=>url("account#credit")); 
						}
						if($result['status']==3)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>支付成功","jump"=>url("account")); 
						}
						if($result['status']==0)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>订单被篡改，支付失败","jump"=>url("account")); 
						}
					}
				}
				else
				{
					$payment_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where id = ".$payment_notice['payment_id']);
					require_once APP_ROOT_PATH."system/libs/user.php";
					require_once APP_ROOT_PATH."system/payment/".$payment_info['class_name']."_payment.php";				
					$log_info = "通过".$payment_info['name'].$payment_lang[$payment_notice['bank_id']]."支付，单号".$outer_sn."，支付的订单已失效，转存入会员帐户";				
					modify_account(array("money"=>$payment_notice['money']),$payment_notice['user_id'],$log_info);
					return array("info"=>$log_info,"jump"=>url("account#credit")); 
				}
				
			}
			else //付款单已支付
			{
				$order_id = $payment_notice['order_id'];
				$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$order_id);
				if($order_info)
				{
					if($order_info['order_status']>0)
					{
						//已支付
						if($order_info['order_status']==1)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>已过期，金额已退回帐户","jump"=>url("account#credit")); 
						}
						if($order_info['order_status']==2)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>限额已满，金额已退回帐户","jump"=>url("account#credit")); 
						}
						if($order_info['order_status']==3)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>支付成功","jump"=>url("account")); 
						}
						if($order_info['order_status']==0)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>订单被篡改，支付失败","jump"=>url("account")); 
						}
					}
					else
					{
						//开始支付订单
						$GLOBALS['db']->query("update ".DB_PREFIX."deal_order set online_pay = ".$payment_notice['money']." where id = ".$order_info['id']);
						$result = pay_order($order_info['id']);
						if($result['status']==1)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>已过期，金额已退回帐户","jump"=>url("account#credit")); 
						}
						if($result['status']==2)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>限额已满，金额已退回帐户","jump"=>url("account#credit")); 
						}
						if($result['status']==3)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>支付成功","jump"=>url("account")); 
						}
						if($result['status']==0)
						{
							return array("info"=>"<a href='".url("deal#show",array("id"=>$order_info['deal_id']))."'>".$order_info['deal_name']."</a>订单被篡改，支付失败","jump"=>url("account")); 
						}
					}
				}
				else
				{
					$payment_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where id = ".$payment_notice['payment_id']);
					require_once APP_ROOT_PATH."system/payment/".$payment_info['class_name']."_payment.php";				
					$log_info = "通过".$payment_info['name'].$payment_lang[$payment_notice['bank_id']]."支付，单号".$outer_sn."，支付的订单已失效，转存入会员帐户";				
					return array("info"=>$log_info,"jump"=>url("account#credit")); 
				}
			}			

			
		}
	}
	else
	{
		return array("info"=>"无效的支付单号，请联系管理员","jump"=>url("index")); 
	}
}



?>