<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class ApiLoginAction extends CommonAction{
	private function read_modules()
	{
		$directory = APP_ROOT_PATH."system/api_login/";
		$read_modules = true;
		$dir = @opendir($directory);
	    $modules     = array();
	
	    while (false !== ($file = @readdir($dir)))
	    {
	        if (preg_match("/^.*?\.php$/", $file))
	        {
	            $modules[] = require_once($directory.$file);
	        }
	    }
	    @closedir($dir);
	    unset($read_modules);
	
	    foreach ($modules AS $key => $value)
	    {
	        ksort($modules[$key]);
	    }
	    ksort($modules);
	
	    return $modules;
	}
	public function index()
	{
		$modules = $this->read_modules();
		$db_modules = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."api_login");
		foreach($modules as $k=>$v)
		{
			$api_info = array();
			foreach($db_modules as $kk=>$vv)
			{
				if($v['class_name']==$vv['class_name'])
				{
					//已安装
					$modules[$k]['id'] = $vv['id'];
					$modules[$k]['installed'] = 1;
					$vv['config'] = unserialize($vv['config']);
					$api_info = $vv;
					break;
				}
			}
			if($modules[$k]['installed'] != 1)
			$modules[$k]['installed'] = 0;	
			
			include APP_ROOT_PATH."system/api_login/".$modules[$k]['class_name']."_api.php";
			$api_class = $modules[$k]['class_name']."_api";
			$api_module = new $api_class($api_info);
			$modules[$k]['name'] = $api_module->get_title();			
		}
		$this->assign("api_list",$modules);
		$this->display();
	}
	
	
	public function install()
	{
		$class_name = $_REQUEST['class_name'];
		$directory = APP_ROOT_PATH."system/api_login/";
		$read_modules = true;
		
		$file = $directory.$class_name."_api.php";
		if(file_exists($file))
		{
			$module = require_once($file);
			$rs = M("ApiLogin")->where("class_name = '".$class_name."'")->count();
			if($rs > 0)
			{
				$this->error(l("API_INSTALLED"));
			}
		}
		else
		{
			$this->error(l("INVALID_OPERATION"));
		}
		
		//开始插入数据
		$data['name'] = $module['name'];
		$data['dispname'] = $module['dispname'];
		$data['is_weibo'] = $module['is_weibo'];
		$data['class_name'] = $module['class_name'];
		$data['lang'] = $module['lang'];
		$data['config'] = $module['config'];

		$this->assign("data",$data);

		$this->display();
		
	}
	
	public function uninstall()
	{
		$ajax = intval($_REQUEST['ajax']);
		$id = intval($_REQUEST ['id']);
		$data = M(MODULE_NAME)->getById($id);
		if($data)
		{
			$info = $data['class_name'];
			$list = M(MODULE_NAME)->where ( array('id'=>$data['id']) )->delete();	
			if ($list!==false) {
					save_log($info.l("UNINSTALL_SUCCESS"),1);
					$this->success (l("UNINSTALL_SUCCESS"),$ajax);
				} else {
					save_log($info.l("UNINSTALL_FAILED"),0);
					$this->error (l("UNINSTALL_FAILED"),$ajax);
				}
		}
		else
		{
			$this->error (l("INVALID_OPERATION"),$ajax);
		}
	}
	
	public function insert()
	{
		$data = M(MODULE_NAME)->create ();
		$data['config'] = serialize($_REQUEST['config']);
		// 更新数据
		$log_info = $data['name'];
		$list=M(MODULE_NAME)->add($data);
		$this->assign("jumpUrl",u(MODULE_NAME."/index"));
		if (false !== $list) {
			//成功提示
			save_log($log_info.L("INSTALL_SUCCESS"),1);
			$this->success(L("INSTALL_SUCCESS"));
		} else {
			//错误提示
			save_log($log_info.L("INSTALL_FAILED"),0);
			$this->error(L("INSTALL_FAILED"));
		}
	}
	
	public function edit() {		
		$id = intval($_REQUEST ['id']);
		$condition['id'] = $id;		
		$vo = M(MODULE_NAME)->where($condition)->find();
		
		$directory = APP_ROOT_PATH."system/api_login/";
		$read_modules = true;
		
		$file = $directory.$vo['class_name']."_api.php";
		if(file_exists($file))
		{
			$module = require_once($file);
		}
		else
		{
			$this->error(l("INVALID_OPERATION"));
		}
		$data = $vo;
		$vo['config'] = unserialize($vo['config']);
		
		$data['lang'] = $module['lang'];
		$data['config'] = $module['config'];
		
		$this->assign ( 'vo', $vo );
		$this->assign ( 'data', $data );
		$this->display ();
	}
	
	
	public function update()
	{
		$data = M(MODULE_NAME)->create ();
		$data['config'] = serialize($_REQUEST['config']);
		$log_info = M(MODULE_NAME)->where("id=".intval($data['id']))->getField("name");

		$this->assign("jumpUrl",u(MODULE_NAME."/edit",array("id"=>$data['id'])));
		
		// 更新数据
		$list=M(MODULE_NAME)->save ($data);
		if (false !== $list) {
			//成功提示
			save_log($log_info.L("UPDATE_SUCCESS"),1);
			$this->success(L("UPDATE_SUCCESS"));
		} else {
			//错误提示
			save_log($log_info.L("UPDATE_FAILED"),0);
			$this->error(L("UPDATE_FAILED"),0,$log_info.L("UPDATE_FAILED"));
		}
	}	
	
}
?>