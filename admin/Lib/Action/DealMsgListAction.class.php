<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class DealMsgListAction extends CommonAction{
	public function index()
	{
		if(trim($_REQUEST['dest'])!='')
		$condition['dest'] = array('like','%'.trim($_REQUEST['dest']).'%');
		if(trim($_REQUEST['content'])!='')
		$condition['content'] = array('like','%'.trim($_REQUEST['content']).'%');
		$this->assign("default_map",$condition);
		parent::index();
	}
	public function show_content()
	{
		$id = intval($_REQUEST['id']);
		header("Content-Type:text/html; charset=utf-8");
		echo htmlspecialchars(M("DealMsgList")->where("id=".$id)->getField("content"));
	}
	
	public function send()
	{
		$id = intval($_REQUEST['id']);
		$msg_item = M("DealMsgList")->getById($id);
		if($msg_item)
		{
			if($msg_item['send_type']==0)
			{
				//短信
				require_once APP_ROOT_PATH."system/utils/es_sms.php";
				$sms = new sms_sender();
		
				$result = $sms->sendSms($msg_item['dest'],$msg_item['content']);
				$msg_item['result'] = $result['msg'];
				$msg_item['is_success'] = intval($result['status']);
				$msg_item['send_time'] = get_gmtime();
				M("DealMsgList")->save($msg_item);
				if($result['status'])
				{					
					header("Content-Type:text/html; charset=utf-8");
					echo l("SEND_NOW").l("SUCCESS");
				}
				else
				{
					
					header("Content-Type:text/html; charset=utf-8");
					echo l("SEND_NOW").l("FAILED").$result['msg'];
				}
			}
			else
			{			
				//邮件
				require_once APP_ROOT_PATH."system/utils/es_mail.php";
				$mail = new mail_sender();
		
				$mail->AddAddress($msg_item['dest']);
				$mail->IsHTML($msg_item['is_html']); 				  // 设置邮件格式为 HTML
				$mail->Subject = $msg_item['title'];   // 标题
				$mail->Body = $msg_item['content'];  // 内容	
				$result = $mail->Send();
				
				$msg_item['result'] = $mail->ErrorInfo;
				$msg_item['is_success'] = intval($result);
				$msg_item['send_time'] = get_gmtime();
				M("DealMsgList")->save($msg_item);
				if($result)
				{					
					header("Content-Type:text/html; charset=utf-8");
					echo l("SEND_NOW").l("SUCCESS");
				}
				else
				{
					
					header("Content-Type:text/html; charset=utf-8");
					echo l("SEND_NOW").l("FAILED").$mail->ErrorInfo;
				}
				
			}
		}
		else
		{
			header("Content-Type:text/html; charset=utf-8");
			echo l("SEND_NOW").l("FAILED");
		}
	}
	
	public function foreverdelete() {
		//彻底删除指定记录
		$ajax = intval($_REQUEST['ajax']);
		$id = $_REQUEST ['id'];
		if (isset ( $id )) {
				$condition = array ('id' => array ('in', explode ( ',', $id ) ) );
				$rel_data = M(MODULE_NAME)->where($condition)->findAll();				
				foreach($rel_data as $data)
				{
					$info[] = $data['id'];	
				}
				if($info) $info = implode(",",$info);
				$list = M(MODULE_NAME)->where ( $condition )->delete();	
			
				if ($list!==false) {
					save_log($info.l("FOREVER_DELETE_SUCCESS"),1);
					$this->success (l("FOREVER_DELETE_SUCCESS"),$ajax);
				} else {
					save_log($info.l("FOREVER_DELETE_FAILED"),0);
					$this->error (l("FOREVER_DELETE_FAILED"),$ajax);
				}
			} else {
				$this->error (l("INVALID_OPERATION"),$ajax);
		}
	}
		
}
?>