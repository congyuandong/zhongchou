<?php
require './system/common.php';
require './app/Lib/app_init.php';

	    if($GLOBALS['user_info']['id']==0)
		{
			$data['status'] = 0;  //未登录
			$data['msg'] = "请先登录";
			ajax_return($data);
		}
		//上传处理
		//创建comment目录
		if (!is_dir(APP_ROOT_PATH."public/attachment")) { 
	             @mkdir(APP_ROOT_PATH."public/attachment");
	             @chmod(APP_ROOT_PATH."public/attachment", 0777);
	        }
		
	    $dir = to_date(get_gmtime(),"Ym");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir, 0777);
	        }
	        
	    $dir = $dir."/".to_date(get_gmtime(),"d");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir, 0777);
	        }
	     
	    $dir = $dir."/".to_date(get_gmtime(),"H");
	    
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir, 0777);
	        }
	        
	  
	    if(app_conf("IS_WATER_MARK")==1)
	    $img_result = save_image_upload($_FILES,"image_file","attachment/".$dir,$whs=array('thumb'=>array(205,160,1,0)),1,1);
	    else
		$img_result = save_image_upload($_FILES,"image_file","attachment/".$dir,$whs=array('thumb'=>array(205,160,1,0)),0,1);	
		
		if(intval($img_result['error'])!=0)	
		{
			$data['status'] = 0;  //未登录
			$data['msg'] = $img_result['message'];
			ajax_return($data);
		}
		else 
		{
			if(app_conf("PUBLIC_DOMAIN_ROOT")!='')
        	{
        		$paths = pathinfo($img_result['imgFile']['url']);
        		$path = str_replace("./","",$paths['dirname']);
        		$filename = $paths['basename'];
        		$pathwithoupublic = str_replace("public/","",$path);
	        	$syn_url = app_conf("PUBLIC_DOMAIN_ROOT")."/es_file.php?username=".app_conf("IMAGE_USERNAME")."&password=".app_conf("IMAGE_PASSWORD")."&file=".get_domain().APP_ROOT."/".$path."/".$filename."&path=".$pathwithoupublic."/&name=".$filename."&act=0";
	        	@file_get_contents($syn_url);
        	}
			
		}
		
		$file_url = $img_result['image_file']['url'];
		$thumb_url = $img_result['image_file']['thumb']['thumb']['url'];
		
		$domain = get_domain().APP_ROOT;	
	     
		
		$data['status'] = 1; 
		$data['thumb_url'] = str_replace("./public/",$domain."/public/",$thumb_url);
		$data['url'] = str_replace("./public/",$domain."/public/",$file_url);
		es_session::set("deal_image",$data);
		
		ajax_return($data);
?>