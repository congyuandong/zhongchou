<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class IntegrateAction extends CommonAction{
	private function read_modules()
	{
		$directory = APP_ROOT_PATH."system/integrate/";
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
		$integrate_installed = app_conf("INTEGRATE_CODE");
		foreach($modules as $k=>$v)
		{
			if($v['class_name']==$integrate_installed)
			{
				//已安装
				$modules[$k]['installed'] = 1;
				break;
			}
		}
		$this->assign("integrate_list",$modules);
		$this->display();
	}
	
	public function install()
	{
		$class_name = $_REQUEST['class_name'];
		$directory = APP_ROOT_PATH."system/integrate/";
		$read_modules = true;
		
		$file = $directory.$class_name."_integrate.php";
		if(file_exists($file))
		{
			$module = require_once($file);			
			if($module['class_name']==app_conf("INTEGRATE_CODE"))
			{
				$this->error(l("INTEGRATE_INSTALLED"));
			}
		}
		else
		{
			$this->error(l("INVALID_OPERATION"));
		}
		
		//开始插入数据
		$data['name'] = $module['name'];
		$data['class_name'] = $module['class_name'];
		$data['config'] = $module['config'];
		$data['lang'] = $module['lang'];

		$this->assign("data",$data);

		$this->display();
		
	}
	
	public function save()
	{	
		$data['INTEGRATE_CODE'] = trim($_REQUEST['class_name']);
		$data['INTEGRATE_CFG'] = serialize($_REQUEST['config']);

		$class_name = $data['INTEGRATE_CODE'];
		
		M("Conf")->where("name='INTEGRATE_CODE'")->setField("value",$data['INTEGRATE_CODE']);
		M("Conf")->where("name='INTEGRATE_CFG'")->setField("value",$data['INTEGRATE_CFG']);
		
		$directory = APP_ROOT_PATH."system/integrate/";
		
		$file = $directory.$class_name."_integrate.php";
		if(file_exists($file))
		{
			require_once($file);	
			$integrate_class = $class_name."_integrate";
			$integrate_item = new $integrate_class;
			$rs = $integrate_item->install($data['INTEGRATE_CFG']);
			if(intval($rs['status'])==0)
			{
				$this->error($rs['msg']);
			}
		}
		else
		{
			$this->error(L("INTEGRATE_FILE_NOT_EXIST"));
		}
		
		
		// 更新数据
		$log_info = $_REQUEST['name'];



		
		//开始写入配置文件
		$sys_configs = M("Conf")->findAll();
		$config_str = "<?php\n";
		$config_str .= "return array(\n";
		foreach($sys_configs as $k=>$v)
		{
				$config_str.="'".$v['name']."'=>'".addslashes($v['value'])."',\n";
		}
		$config_str.=");\n ?>";

		$filename = get_real_path()."public/sys_config.php";
			
		    if (!$handle = fopen($filename, 'w')) {
			     $this->error(l("OPEN_FILE_ERROR").$filename);
			}
			
			    
			if (fwrite($handle, $config_str) === FALSE) {
			     $this->error(l("WRITE_FILE_ERROR").$filename);
			}
			
	    fclose($handle);
	
		clear_cache();
		write_timezone();
		
		$this->assign("jumpUrl",u(MODULE_NAME."/index"));
		if (false !== $list) {
			//成功提示
			save_log($log_info.L("SAVE_SUCCESS"),1);

			$this->success(L("SAVE_SUCCESS"));
		} else {
			//错误提示
			save_log($log_info.L("SAVE_FAILED"),0);
			$this->error(L("SAVE_FAILED"));
		}
	}
	
	
	public function uninstall()
	{
		$class_name = $_REQUEST['class_name'];
		$directory = APP_ROOT_PATH."system/integrate/";

		
		$file = $directory.$class_name."_integrate.php";
		if(file_exists($file))
		{
			require_once($file);	
			$integrate_class = $class_name."_integrate";
			$integrate_item = new $integrate_class;
			$integrate_item->uninstall();
		}

		
		M("Conf")->where("name='INTEGRATE_CODE'")->setField("value",'');
		M("Conf")->where("name='INTEGRATE_CFG'")->setField("value",'');

		
		//开始写入配置文件
		$sys_configs = M("Conf")->findAll();
		$config_str = "<?php\n";
		$config_str .= "return array(\n";
		foreach($sys_configs as $k=>$v)
		{
				$config_str.="'".$v['name']."'=>'".addslashes($v['value'])."',\n";
		}
		$config_str.=");\n ?>";
		$filename = get_real_path()."public/sys_config.php";
			
		    if (!$handle = fopen($filename, 'w')) {
			     $this->error(l("OPEN_FILE_ERROR").$filename);
			}
			
			    
			if (fwrite($handle, $config_str) === FALSE) {
			     $this->error(l("WRITE_FILE_ERROR").$filename);
			}
			
	    fclose($handle);
	
		clear_cache();
		write_timezone();
		
		$this->assign("jumpUrl",u(MODULE_NAME."/index"));
		
		save_log(l("UNINSTALL_SUCCESS"),1);
		$this->success (l("UNINSTALL_SUCCESS"),0);
	}
	
}
?>