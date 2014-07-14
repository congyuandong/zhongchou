<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

//用于队列的发送
require './system/common.php';
require './app/Lib/common.php';
es_session::close();
set_time_limit(0);
if($_REQUEST['act']=='notify_msg_list')
{
	$deal_id = intval($GLOBALS['db']->getOne("select deal_id from ".DB_PREFIX."deal_notify order by create_time asc limit 1"));	
	if($deal_id>0)
	{
		$deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id = ".$deal_id);
		//一次性生成50条
		$deal_notify_items = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user_deal_notify where deal_id = ".$deal_id." order by create_time asc limit 50");
		$ids = array(0);
		foreach($deal_notify_items as $k=>$v)
		{
			$ids[] = $v['id'];
		}
		$GLOBALS['db']->query("delete from ".DB_PREFIX."user_deal_notify where id in (".implode(",",$ids).")");
		if($GLOBALS['db']->affected_rows()==count($deal_notify_items))
		{
			$deal_count = intval($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_deal_notify where deal_id = ".$deal_id));
			if($deal_count==0)
			$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_notify where deal_id = ".$deal_id);
			//开始发送通知
			foreach ($deal_notify_items as $k=>$v)
			{
				send_notify($v['user_id'],$deal_info['name']." 在 ".to_date($deal_info['success_time'])." 成功筹到 ".format_price($deal_info['limit_price']),"deal#show","id=".$deal_info['id']);
			}			
		}
		header("Content-Type:text/html; charset=utf-8");
		echo 1;
	}
	else
	{
		header("Content-Type:text/html; charset=utf-8");
		echo 0;
	}
}

if($_REQUEST['act']=='deal_msg_list')
{		
	//业务队列的群发
	$GLOBALS['db']->query("update ".DB_PREFIX."conf set `value` = 1 where name = 'DEAL_MSG_LOCK' and `value` = 0");
	$rs = $GLOBALS['db']->affected_rows();
	if($rs)
	{				
		$msg_item = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_msg_list where is_send = 0 order by id asc limit 1");
		
		if($msg_item)
		{
			//优先改变发送状态,不论有没有发送成功
			$GLOBALS['db']->query("update ".DB_PREFIX."deal_msg_list set is_send = 1,send_time='".get_gmtime()."' where id =".intval($msg_item['id']));
			if($msg_item['send_type']==0)
			{
				//短信
				require_once APP_ROOT_PATH."system/utils/es_sms.php";
				$sms = new sms_sender();
				$result = $sms->sendSms($msg_item['dest'],$msg_item['content']);
				//发送结束，更新当前消息状态
				$GLOBALS['db']->query("update ".DB_PREFIX."deal_msg_list set is_success = ".intval($result['status']).",result='".$result['msg']."' where id =".intval($msg_item['id']));
			}	
	
			if($msg_item['send_type']==1)
			{
				//邮件
				require_once APP_ROOT_PATH."system/utils/es_mail.php";
				$mail = new mail_sender();
		
				$mail->AddAddress($msg_item['dest']);
				$mail->IsHTML($msg_item['is_html']); 				  // 设置邮件格式为 HTML
				$mail->Subject = $msg_item['title'];   // 标题
				$mail->Body = $msg_item['content'];  // 内容	
		
				$is_success = $mail->Send();
				$result = $mail->ErrorInfo;
	
				//发送结束，更新当前消息状态
				$GLOBALS['db']->query("update ".DB_PREFIX."deal_msg_list set is_success = ".intval($is_success).",result='".$result."' where id =".intval($msg_item['id']));
			}	
		}
		header("Content-Type:text/html; charset=utf-8");
		echo intval($GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal_msg_list where is_send = 0"));
		$GLOBALS['db']->query("update ".DB_PREFIX."conf set `value` = 0 where name = 'DEAL_MSG_LOCK'");	
	}
	else
	{
		header("Content-Type:text/html; charset=utf-8");
		echo 0;
	}	
}

?>