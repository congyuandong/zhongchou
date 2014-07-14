<?php
//模板页的png显示缓存
class page_image_auto_cache extends auto_cache{
	public function load($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$image_str = $GLOBALS['fcache']->get($key);
		if($image_str === false)
		{
			$img = $param['img'];
			$img_path = str_replace("./",get_domain().APP_ROOT."/",$img);
			require_once APP_ROOT_PATH."system/utils/es_image.php";
			$imagec = new es_image();
			$info = $imagec->getImageInfo($img);
			
			if($info['mime']=='image/png')
			{
				$image_str = "<span style='display:inline-block; width:".intval($info['width'])."px; height:".intval($info['height'])."px; background:url(".$img_path.") no-repeat; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=".$img_path.", sizingMethod=scale);_background-image:none;'></span>";
			}
			else
			{
				$image_str = "<img src='".$img_path."' width='".intval($info['width'])."' height='".intval($info['height'])."' />";
			}
			$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
			$GLOBALS['fcache']->set("PAGE_IMAGE_".$img,$image_str);
		}	
		return $image_str;
	}
	public function rm($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$GLOBALS['fcache']->rm($key);
	}
	public function clear_all()
	{
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$GLOBALS['fcache']->clear();
	}
}
?>