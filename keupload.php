<?php
require './system/common.php';
require './app/Lib/app_init.php';

	    if(intval($GLOBALS['user_info']['id'])==0)
		{
			$data['error'] = 1;  //未登录
			$data['message'] = "请先登录";
			echo "<script>alert('".$data['message']."');</script>";	exit;
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
	    $img_result = save_image_upload($_FILES,"imgFile","attachment/".$dir,$whs=array('thumb'=>array(100,100,1,0)),1,1);
	    else
		$img_result = save_image_upload($_FILES,"imgFile","attachment/".$dir,$whs=array('thumb'=>array(100,100,1,0)),0,1);	
		
		if(intval($img_result['error'])!=0)	
		{
			echo "<script>alert('".$img_result['message']."');</script>";	exit;
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
		
		$data['error'] = 0; 
		$data['message'] = $img_result['imgFile']['thumb']['thumb']['url'];

		

		
		$data['id'] = 0;
		if($data['error']==1)
		{
			echo "<script>alert('".$data['message']."');</script>";	
		}
		else
		{
			$list = $result['data'];
			$file_url = ".".get_spec_image($img_result['imgFile']['url'],570,0,0,false,false);
			$html = '<html>';
			$html.= '<head>';
			$html.= '<title>Insert Image</title>';
			$html.= '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
			$html.= '</head>';
			$html.= '<body>';
			$html.= '<script type="text/javascript">';
			$html.= 'parent.parent.KE.plugin["fimage"].insert("' .strim( $_POST['id']) . '", "' . $file_url . '","' .strim( $data['id']) . '","' . strim($_POST['imgTitle'] ). '","' .strim( $_POST['imgWidth']) . '","' .strim( $_POST['imgHeight'] ). '","' . strim($_POST['imgBorder']) . '","' . strim($_POST['align']) . '");';
			$html.= '</script>';
			$html.= '</body>';
			$html.= '</html>';
			echo $html;
		}
?>