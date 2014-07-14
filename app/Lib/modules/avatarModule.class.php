<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class avatarModule extends BaseModule
{
	public function index(){
		$this->middle();
	}
	public function big()
	{				
		$id = intval($_REQUEST['id']);
		$s = 'big';
		
		$uid = sprintf("%09d", $id);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$path = $dir1.'/'.$dir2.'/'.$dir3;
		
		$id = str_pad($id, 2, "0", STR_PAD_LEFT); 
		$id = substr($id,-2);
		$avatar_file = APP_ROOT_PATH."public/avatar/".$path."/".$id."virtual_avatar_".$s.".jpg";
		
		if(file_exists($avatar_file))
		{
			$im = imagecreatefromstring(file_get_contents($avatar_file));
		}
		else
		{
			$im = imagecreatefromstring(file_get_contents(APP_ROOT_PATH."public/avatar/noavatar_".$s.".gif"));
		}
		header("Content-type: image/jpeg");
		imagejpeg($im);
	}
	
	public function middle()
	{				
		$id = intval($_REQUEST['id']);
		$s = 'middle';
		
		$uid = sprintf("%09d", $id);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$path = $dir1.'/'.$dir2.'/'.$dir3;
		
		$id = str_pad($id, 2, "0", STR_PAD_LEFT); 
		$id = substr($id,-2);
		$avatar_file = APP_ROOT_PATH."public/avatar/".$path."/".$id."virtual_avatar_".$s.".jpg";
		
		if(file_exists($avatar_file))
		{
			$im = imagecreatefromstring(file_get_contents($avatar_file));
		}
		else
		{
			$im = imagecreatefromstring(file_get_contents(APP_ROOT_PATH."public/avatar/noavatar_".$s.".gif"));
		}
		header("Content-type: image/jpeg");
		imagejpeg($im);
	}
	
	public function small()
	{				
		$id = intval($_REQUEST['id']);
		$s = 'small';
		
		$uid = sprintf("%09d", $id);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$path = $dir1.'/'.$dir2.'/'.$dir3;
		
		$id = str_pad($id, 2, "0", STR_PAD_LEFT); 
		$id = substr($id,-2);
		$avatar_file = APP_ROOT_PATH."public/avatar/".$path."/".$id."virtual_avatar_".$s.".jpg";
		
		if(file_exists($avatar_file))
		{
			$im = imagecreatefromstring(file_get_contents($avatar_file));
		}
		else
		{
			$im = imagecreatefromstring(file_get_contents(APP_ROOT_PATH."public/avatar/noavatar_".$s.".gif"));
		}
		header("Content-type: image/jpeg");
		imagejpeg($im);
	}
	
	public function upload()
	{
		if($GLOBALS['user_info']['id']==0)
		{
			$data['status'] = 0;  //未登录
			$data['msg'] = "请先登录";
			ajax_return($data);
		}
		//上传处理
		//创建avatar临时目录
		if (!is_dir(APP_ROOT_PATH."public/avatar")) { 
	             @mkdir(APP_ROOT_PATH."public/avatar");
	             @chmod(APP_ROOT_PATH."public/avatar", 0777);
	        }
		if (!is_dir(APP_ROOT_PATH."public/avatar/temp")) { 
	             @mkdir(APP_ROOT_PATH."public/avatar/temp");
	             @chmod(APP_ROOT_PATH."public/avatar/temp", 0777);
	        }
		$upd_id = $id = intval($_REQUEST['uid']);
		

	    if (is_animated_gif($_FILES['avatar_file']['tmp_name']))
	    {
	    	$rs = save_image_upload($_FILES,"avatar_file","avatar/temp",$whs=array());	   

	    	$im = get_spec_gif_anmation($rs['avatar_file']['path'],48,48);
	    	$file_name = APP_ROOT_PATH."public/avatar/temp/".md5(NOW_TIME.$upd_id)."_small.jpg";
	    	file_put_contents($file_name,$im);
	    	$img_result['avatar_file']['thumb']['small']['path'] = $file_name;
	    	
	    	$im = get_spec_gif_anmation($rs['avatar_file']['path'],120,120);
	    	$file_name = APP_ROOT_PATH."public/avatar/temp/".md5(NOW_TIME.$upd_id)."_middle.jpg";
	    	file_put_contents($file_name,$im);
	    	$img_result['avatar_file']['thumb']['middle']['path'] = $file_name;
	    	
	    	$im = get_spec_gif_anmation($rs['avatar_file']['path'],200,200);
	    	$file_name = APP_ROOT_PATH."public/avatar/temp/".md5(NOW_TIME.$upd_id)."_big.jpg";
	    	file_put_contents($file_name,$im);
	    	$img_result['avatar_file']['thumb']['big']['path'] = $file_name;		
	    }
	    else
		$img_result = save_image_upload($_FILES,"avatar_file","avatar/temp",$whs=array('small'=>array(48,48,1,0),'middle'=>array(120,120,1,0),'big'=>array(200,200,1,0)));
		//开始移动图片到相应位置
		
		$uid = sprintf("%09d", $id);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$path = $dir1.'/'.$dir2.'/'.$dir3;
		
		//创建相应的目录
		if (!is_dir(APP_ROOT_PATH."public/avatar/".$dir1)) { 
	             @mkdir(APP_ROOT_PATH."public/avatar/".$dir1);
	             @chmod(APP_ROOT_PATH."public/avatar/".$dir1, 0777);
	        }
		if (!is_dir(APP_ROOT_PATH."public/avatar/".$dir1.'/'.$dir2)) { 
	             @mkdir(APP_ROOT_PATH."public/avatar/".$dir1.'/'.$dir2);
	             @chmod(APP_ROOT_PATH."public/avatar/".$dir1.'/'.$dir2, 0777);
	        }
		if (!is_dir(APP_ROOT_PATH."public/avatar/".$dir1.'/'.$dir2.'/'.$dir3)) { 
	             @mkdir(APP_ROOT_PATH."public/avatar/".$dir1.'/'.$dir2.'/'.$dir3);
	             @chmod(APP_ROOT_PATH."public/avatar/".$dir1.'/'.$dir2.'/'.$dir3, 0777);
	        }
		
		$id = str_pad($id, 2, "0", STR_PAD_LEFT); 
		$id = substr($id,-2);
		$avatar_file_big = APP_ROOT_PATH."public/avatar/".$path."/".$id."virtual_avatar_big.jpg";
		$avatar_file_middle = APP_ROOT_PATH."public/avatar/".$path."/".$id."virtual_avatar_middle.jpg";
		$avatar_file_small = APP_ROOT_PATH."public/avatar/".$path."/".$id."virtual_avatar_small.jpg";
		
		
		@file_put_contents($avatar_file_big, file_get_contents($img_result['avatar_file']['thumb']['big']['path']));
		@file_put_contents($avatar_file_middle, file_get_contents($img_result['avatar_file']['thumb']['middle']['path']));
		@file_put_contents($avatar_file_small, file_get_contents($img_result['avatar_file']['thumb']['small']['path']));
		@unlink($img_result['avatar_file']['thumb']['big']['path']);
		@unlink($img_result['avatar_file']['thumb']['middle']['path']);
		@unlink($img_result['avatar_file']['thumb']['small']['path']);
		@unlink($img_result['avatar_file']['path']);
	
		//上传成功更新用户头像的动态缓存
		update_avatar($upd_id);
		$data['status'] = 1;
		$data['small_url'] = get_user_avatar($upd_id,"small");
		$data['middle_url'] = get_user_avatar($upd_id,"middle");
		$data['big_url'] = get_user_avatar($upd_id,"big");
		ajax_return($data);
	}
}
?>