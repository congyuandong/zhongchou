<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class CacheAction extends CommonAction{

	public function clear_admin()
	{
		set_time_limit(0);
		es_session::close();
		clear_dir_file(get_real_path()."public/runtime/admin/Cache/");	
		clear_dir_file(get_real_path()."public/runtime/admin/Data/_fields/");		
		clear_dir_file(get_real_path()."public/runtime/admin/Temp/");	
		clear_dir_file(get_real_path()."public/runtime/admin/Logs/");	
		@unlink(get_real_path()."public/runtime/admin/~app.php");
		@unlink(get_real_path()."public/runtime/admin/~runtime.php");
		@unlink(get_real_path()."public/runtime/admin/lang.js");
		@unlink(get_real_path()."public/runtime/app/config_cache.php");	
		
		header("Content-Type:text/html; charset=utf-8");
       	exit("<div style='line-height:50px; text-align:center; color:#f30;'>".L('CLEAR_SUCCESS')."</div><div style='text-align:center;'><input type='button' onclick='$.weeboxs.close();' class='button' value='关闭' /></div>");
	}
	
	public function clear_parse_file()
	{
		set_time_limit(0);
		es_session::close();
		clear_dir_file(get_real_path()."public/runtime/statics/");	
		
		clear_dir_file(get_real_path()."public/runtime/app/tpl_caches/");		
		clear_dir_file(get_real_path()."public/runtime/app/tpl_compiled/");
		
		header("Content-Type:text/html; charset=utf-8");
       	exit("<div style='line-height:50px; text-align:center; color:#f30;'>".L('CLEAR_SUCCESS')."</div><div style='text-align:center;'><input type='button' onclick='$.weeboxs.close();' class='button' value='关闭' /></div>");
	}
	
	public function clear_data()
	{
		set_time_limit(0);
		es_session::close();
		@unlink(get_real_path()."public/runtime/app/deal_cate_conf.js");	
		clear_dir_file(get_real_path()."public/runtime/app/deal_region_conf/");
		if(intval($_REQUEST['is_all'])==0)
		{
			//数据缓存
			clear_dir_file(get_real_path()."public/runtime/app/data_caches/");				
			clear_dir_file(get_real_path()."public/runtime/app/db_caches/");
			$GLOBALS['cache']->clear();
			clear_dir_file(get_real_path()."public/runtime/app/tpl_caches/");		
			clear_dir_file(get_real_path()."public/runtime/app/tpl_compiled/");
			@unlink(get_real_path()."public/runtime/app/lang.js");				
			
			//删除相关未自动清空的数据缓存
			clear_auto_cache("page_image");
		}
		else
		{

			clear_dir_file(get_real_path()."public/runtime/data/");	
			clear_dir_file(get_real_path()."public/runtime/app/data_caches/");				
			clear_dir_file(get_real_path()."public/runtime/app/db_caches/");
			$GLOBALS['cache']->clear();
			clear_dir_file(get_real_path()."public/runtime/app/tpl_caches/");		
			clear_dir_file(get_real_path()."public/runtime/app/tpl_compiled/");
			@unlink(get_real_path()."public/runtime/app/lang.js");	
			
			//后台
			clear_dir_file(get_real_path()."public/runtime/admin/Cache/");	
			clear_dir_file(get_real_path()."public/runtime/admin/Data/_fields/");		
			clear_dir_file(get_real_path()."public/runtime/admin/Temp/");	
			clear_dir_file(get_real_path()."public/runtime/admin/Logs/");	
			@unlink(get_real_path()."public/runtime/admin/~app.php");
			@unlink(get_real_path()."public/runtime/admin/~runtime.php");
			@unlink(get_real_path()."public/runtime/admin/lang.js");
			@unlink(get_real_path()."public/runtime/app/config_cache.php");	

		}
		header("Content-Type:text/html; charset=utf-8");
       	exit("<div style='line-height:50px; text-align:center; color:#f30;'>".L('CLEAR_SUCCESS')."</div><div style='text-align:center;'><input type='button' onclick='$.weeboxs.close();' class='button' value='关闭' /></div>");
	}


	
	public function clear_image()
	{
		set_time_limit(0);
		es_session::close();
		$path  = APP_ROOT_PATH."public/attachment/";
		$this->clear_image_file($path);
		$path  = APP_ROOT_PATH."public/images/";
		$this->clear_image_file($path);
		
		$qrcode_path = APP_ROOT_PATH."public/images/qrcode/";
		$this->clear_qrcode($qrcode_path);
	
		clear_dir_file(get_real_path()."public/runtime/app/tpl_caches/");		
		clear_dir_file(get_real_path()."public/runtime/app/tpl_compiled/");
		
		header("Content-Type:text/html; charset=utf-8");
       	exit("<div style='line-height:50px; text-align:center; color:#f30;'>".L('CLEAR_SUCCESS')."</div><div style='text-align:center;'><input type='button' onclick='$.weeboxs.close();' class='button' value='关闭' /></div>");
	}
	
	private function clear_qrcode($path)
	{
	
	   if ( $dir = opendir( $path ) )
	   {
	            while ( $file = readdir( $dir ) )
	            {
	                $check = is_dir( $path. $file );
	                if ( !$check )
	                {
	                    @unlink ( $path . $file);                       
	                }
	                else 
	                {
	                 	if($file!='.'&&$file!='..')
	                 	{
	                 		$this->clear_qrcode($path.$file."/");              			       		
	                 	} 
	                 }           
	            }
	            closedir( $dir );
	            return true;
	   }
	}
	
	private function clear_image_file($path)
	{
	   if ( $dir = opendir( $path ) )
	   {
	            while ( $file = readdir( $dir ) )
	            {
	                $check = is_dir( $path. $file );
	                if ( !$check )
	                {
	                	if(preg_match("/_(\d+)x(\d+)/i",$file,$matches))
	                    @unlink ( $path . $file);                       
	                }
	                else 
	                {
	                 	if($file!='.'&&$file!='..')
	                 	{
	                 		$this->clear_image_file($path.$file."/");              			       		
	                 	} 
	                 }           
	            }
	            closedir( $dir );
	            return true;
	   }
	}
}
?>