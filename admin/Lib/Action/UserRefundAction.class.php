<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class UserRefundAction extends CommonAction{
	public function index()
	{
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		//追加默认参数
		if($this->get("default_map"))
		$map = array_merge($map,$this->get("default_map"));
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		$this->display ();
		return;
	}
	
	public function refund_confirm()
	{
		$id = intval($_REQUEST['id']);
		$refund_data = M("UserRefund")->getById($id);
		$this->assign("refund_data",$refund_data);
		$this->display();
	}
	
	public function confirm()
	{
		$id = intval($_REQUEST['id']);
		$refund_data = M("UserRefund")->getById($id);
		if($refund_data)
		{
			if($refund_data['is_pay']==1)
			{
				$this->error("已经提现过");
			}
			
			$refund_user = M("User")->where("id=".$refund_data['user_id']." and is_effect = 1")->find();
			if($refund_user['money']<$refund_data['money'])
			{
				$this->error("会员余额不足，不能提现");
			}
			
			$reply = strim($_REQUEST['reply']);
			require_once APP_ROOT_PATH."system/libs/user.php";
			modify_account(array("money"=>"-".$refund_data['money']),$refund_data['user_id'],"管理员确认提现：".$reply);
			
			$refund_data['reply'] = $reply;
			$refund_data['is_pay'] = 1;
			$refund_data['pay_time'] = get_gmtime();
			M("UserRefund")->save($refund_data);
			
			$this->success("提现确认成功");
		}
		else
		{
			$this->error("没有提现数据");
		}
	}
	
	public function delete() {
		//彻底删除指定记录
		$ajax = intval($_REQUEST['ajax']);
		$id = $_REQUEST ['id'];
		if (isset ( $id )) {
				$condition = array ('id' => array ('in', explode ( ',', $id ) ) );			
				$rel_data = M(MODULE_NAME)->where($condition)->findAll();				
				$list = M(MODULE_NAME)->where ( $condition )->delete();		
				
				foreach($rel_data as $data)
				{
					$info[] = "[id:".$data['id'].",money:".$data['money']."]";						
				}
				if($info) $info = implode(",",$info);
				
				if ($list!==false) {
					save_log($info."成功删除",1);
					$this->success ("成功删除",$ajax);
				} else {
					save_log($info."删除出错",0);					
					$this->error ("删除出错",$ajax);
				}
			} else {
				$this->error (l("INVALID_OPERATION"),$ajax);
		}
	}
	

}
?>