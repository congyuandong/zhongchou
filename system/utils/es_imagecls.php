<?php
/**
	图片处理类
 */
class es_imagecls
{
	/**
	 * 文件信息
	 */
	var $file = array();
	/**
	 * 保存目录
	 */
	var $dir = '';
	/**
	 * 错误代码
	 */
	var $error_code = 0;
	/**
	 * 文件上传最大KB
	 */
	var $max_size = -1;

	function es_imagecls()
	{

	}
	
    private function checkSize($size)
    {
        return !($size > $this->max_size) || (-1 == $this->max_size);
    }
    
	/**
	 * 处理上传文件
	 * @param array $file 上传的文件
	 * @param string $dir 保存的目录
	 * @return bool
	 */
	function init($file, $dir = 'temp')
	{
		if(!is_array($file) || empty($file) || !$this->isUploadFile($file['tmp_name']) || trim($file['name']) == '' || $file['size'] == 0)
		{
			$this->file = array();
			$this->error_code = -1;
			return false;
		}
		else
		{
			$file['size'] = intval($file['size']);
			$file['name'] =  trim($file['name']);
			$file['thumb'] = '';
			$file['ext'] = $this->fileExt($file['name']);
			$file['name'] =  htmlspecialchars($file['name'], ENT_QUOTES);
			$file['is_image'] = $this->isImageExt($file['ext']);
			$file['file_dir'] = $this->getTargetDir($dir);
			$file['prefix'] = md5(microtime(true)).rand(10,99);
			$file['target'] = "./public/".$file['file_dir'].'/'.$file['prefix'].'.jpg';  //相对
			$file['local_target'] = APP_ROOT_PATH."public/".$file['file_dir'].'/'.$file['prefix'].'.jpg';  //物理
			$this->file = &$file;

			$this->error_code = 0;
			return true;
		}

	}

	/**
	 * 保存文件
	 * @return bool
	 */
	function save()
	{
		if(empty($this->file) || empty($this->file['tmp_name']))
			$this->error_code = -101;
		elseif(!$this->checkSize($this->file['size']))
			$this->error_code = -105;
		elseif(!$this->file['is_image'])
			$this->error_code = -102;
		elseif(!$this->saveFile($this->file['tmp_name'], $this->file['local_target']))
			$this->error_code = -103;
		elseif($this->file['is_image'] && (!$this->file['image_info'] = $this->getImageInfo($this->file['local_target'], true)))
		{
			$this->error_code = -104;
			@unlink($this->file['local_target']);
		}
		else
		{
			$this->error_code = 0;
			return true;
		}
		return false;
	}

	/**
	 * 获取错误代码
	 * @return number
	 */
	function error()
	{
		return $this->error_code;
	}

	/**
	 * 获取文件扩展名
	 * @return string
	 */
	function fileExt($file_name)
	{
		return addslashes(strtolower(substr(strrchr($file_name, '.'), 1, 10)));
	}

	/**
	 * 根据扩展名判断文件是否为图像
	 * @param string $ext 扩展名
	 * @return bool
	 */
	function isImageExt($ext)
	{
		static $img_ext  = array('jpg', 'jpeg', 'png', 'bmp','gif','giff');
		return in_array($ext, $img_ext) ? 1 : 0;
	}

	/**
	 * 获取图像信息
	 * @param string $target 文件路径
	 * @return mixed
	 */
	function getImageInfo($target)
	{
		$ext = es_imagecls::fileExt($target);
		$is_image = es_imagecls::isImageExt($ext);

		if(!$is_image)
			return false;
		elseif(!is_readable($target))
			return false;
		elseif($image_info = @getimagesize($target))
		{
			list($width, $height, $type) = !empty($image_info) ? $image_info : array('', '', '');
			$size = $width * $height;
			if($is_image && !in_array($type, array(1,2,3,6,13)))
				return false;

			$image_info['type'] = strtolower(substr(image_type_to_extension($image_info[2]),1));
			return $image_info;
		}
		else
			return false;
	}

	/**
	 * 获取是否充许上传文件
	 * @param string $source 文件路径
	 * @return bool
	 */
	function isUploadFile($source)
	{
		return $source && ($source != 'none') && (is_uploaded_file($source) || is_uploaded_file(str_replace('\\\\', '\\', $source)));
	}

	/**
	 * 获取保存的路径
	 * @param string $dir 指定的保存目录
	 * @return string
	 */
	function getTargetDir($dir)
	{	      
        if (!is_dir(APP_ROOT_PATH."public/".$dir)) { 
             @mkdir(APP_ROOT_PATH."public/".$dir);
             @chmod(APP_ROOT_PATH."public/".$dir, 0777);
        }
        return $dir;
	}

	/**
	 * 保存文件
	 * @param string $source 源文件路径
	 * @param string $target 目录文件路径
	 * @return bool
	 */
	private function saveFile($source, $target)
	{
		if(!es_imagecls::isUploadFile($source))
			$succeed = false;
		elseif(@copy($source, $target))
			$succeed = true;
		elseif(function_exists('move_uploaded_file') && @move_uploaded_file($source, $target))
			$succeed = true;
		elseif (@is_readable($source) && (@$fp_s = fopen($source, 'rb')) && (@$fp_t = fopen($target, 'wb')))
		{
			while (!feof($fp_s))
			{
				$s = @fread($fp_s, 1024 * 512);
				@fwrite($fp_t, $s);
			}
			fclose($fp_s);
			fclose($fp_t);
			$succeed = true;
		}

		if($succeed)
		{
			$this->error_code = 0;
			@chmod($target, 0644);
			@unlink($source);
		}
		else
		{
			$this->error_code = 0;
		}

		return $succeed;
	}

	public function thumb($image,$maxWidth=200,$maxHeight=50,$gen = 0,$interlace=true,$filepath = '',$is_preview = true,$is_deleteable = true)
    {
        $info  = es_imagecls::getImageInfo($image);

        if($info !== false)
		{
            $srcWidth  = $info[0];
            $srcHeight = $info[1];
			$type = $info['type'];

            $interlace  =  $interlace? 1:0;
            unset($info);

			if($maxWidth > 0 && $maxHeight > 0)
				$scale = min($maxWidth/$srcWidth, $maxHeight/$srcHeight); // 计算缩放比例
			elseif($maxWidth == 0)
				$scale = $maxHeight/$srcHeight;
			elseif($maxHeight == 0)
				$scale = $maxWidth/$srcWidth;

				
			$paths = pathinfo($image);
			$paths['filename'] = trim(strtolower($paths['basename']),".".strtolower($paths['extension']));
			$basefilename = explode("_",$paths['filename']);
			$basefilename = $basefilename[0];
			if(empty($filepath))
			{
				if($is_deleteable)
				{
					if($is_preview)
					$thumbname = $paths['dirname'].'/'.$basefilename.'_'.$maxWidth.'x'.$maxHeight.'.jpg';
					else
					$thumbname = $paths['dirname'].'/'.$basefilename.'o_'.$maxWidth.'x'.$maxHeight.'.jpg';
				}
				else
				{
					if($is_preview)
					$thumbname = $paths['dirname'].'/'.$basefilename.''.$maxWidth.''.$maxHeight.'.jpg';
					else
					$thumbname = $paths['dirname'].'/'.$basefilename.'o'.$maxWidth.''.$maxHeight.'.jpg';
				}
				
			}
			else
				$thumbname = $filepath;

			$thumburl = str_replace(APP_ROOT_PATH,'./',$thumbname);
				
            if($scale >= 1)
			{
                // 超过原图大小不再缩略
                $width   =  $srcWidth;
                $height  =  $srcHeight;         
                if(!$is_preview)
                {       
                	//非预览模式写入原图
                	file_put_contents($thumbname,file_get_contents($image));    //用原图写入            
                	return array('url'=>$thumburl,'path'=>$thumbname);
                }
            }
			else
			{
                // 缩略图尺寸
                $width  = (int)($srcWidth*$scale);
                $height = (int)($srcHeight*$scale);
            }		
			
			if($gen == 1)
			{
				$width = $maxWidth;
				$height = $maxHeight;
			}

            // 载入原图
            $createFun = 'imagecreatefrom'.($type=='jpg'?'jpeg':$type);
			if(!function_exists($createFun))
				$createFun = 'imagecreatefromjpeg';

            $srcImg = $createFun($image);

            //创建缩略图
            if($type!='gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height);
            else
                $thumbImg = imagecreate($width, $height);

			$x = 0;
			$y = 0;

			if($gen == 1 && $maxWidth > 0 && $maxHeight > 0)
			{
				$resize_ratio = $maxWidth/$maxHeight;
				$src_ratio = $srcWidth/$srcHeight;
				if($src_ratio >= $resize_ratio)
				{
					$x = ($srcWidth - ($resize_ratio * $srcHeight)) / 2;
					$width = ($height * $srcWidth) / $srcHeight;
				}
				else
				{
					$y = ($srcHeight - ( (1 / $resize_ratio) * $srcWidth)) / 2;
					$height = ($width * $srcHeight) / $srcWidth;
				}
			}

            // 复制图片
            if(function_exists("imagecopyresampled"))
                imagecopyresampled($thumbImg, $srcImg, 0, 0, $x, $y, $width, $height, $srcWidth,$srcHeight);
            else
                imagecopyresized($thumbImg, $srcImg, 0, 0, $x, $y, $width, $height,  $srcWidth,$srcHeight);
            if('gif'==$type || 'png'==$type) {
                $background_color  =  imagecolorallocate($thumbImg,  0,255,0);  //  指派一个绿色
				imagecolortransparent($thumbImg,$background_color);  //  设置为透明色，若注释掉该行则输出绿色的图
            }

            // 对jpeg图形设置隔行扫描
            if('jpg'==$type || 'jpeg'==$type)
				imageinterlace($thumbImg,$interlace);

            // 生成图片
            imagejpeg($thumbImg,$thumbname,100);
            imagedestroy($thumbImg);
            imagedestroy($srcImg);

			return array('url'=>$thumburl,'path'=>$thumbname);
         }
         return false;
    }

	public function make_thumb($srcImg,$srcWidth,$srcHeight,$type,$maxWidth=200,$maxHeight=50,$gen = 0)
    {

            $interlace  =  $interlace? 1:0;

			if($maxWidth > 0 && $maxHeight > 0)
				$scale = min($maxWidth/$srcWidth, $maxHeight/$srcHeight); // 计算缩放比例
			elseif($maxWidth == 0)
				$scale = $maxHeight/$srcHeight;
			elseif($maxHeight == 0)
				$scale = $maxWidth/$srcWidth;

            if($scale >= 1)
			{
                // 超过原图大小不再缩略
                $width   =  $srcWidth;
                $height  =  $srcHeight;
            }
			else
			{
                // 缩略图尺寸
                $width  = (int)($srcWidth*$scale);
                $height = (int)($srcHeight*$scale);
            }

			if($gen == 1)
			{
				$width = $maxWidth;
				$height = $maxHeight;
			}


            //创建缩略图
            if($type!='gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height);
            else
                $thumbImg = imagecreatetruecolor($width, $height);

			$x = 0;
			$y = 0;

			if($gen == 1 && $maxWidth > 0 && $maxHeight > 0)
			{
				$resize_ratio = $maxWidth/$maxHeight;
				$src_ratio = $srcWidth/$srcHeight;
				if($src_ratio >= $resize_ratio)
				{
					$x = ($srcWidth - ($resize_ratio * $srcHeight)) / 2;
					$width = ($height * $srcWidth) / $srcHeight;
				}
				else
				{
					$y = ($srcHeight - ( (1 / $resize_ratio) * $srcWidth)) / 2;
					$height = ($width * $srcHeight) / $srcWidth;
				}
			}

            // 复制图片
            if(function_exists("imagecopyresampled"))
                imagecopyresampled($thumbImg, $srcImg, 0, 0, $x, $y, $width, $height, $srcWidth,$srcHeight);
            else
                imagecopyresized($thumbImg, $srcImg, 0, 0, $x, $y, $width, $height,  $srcWidth,$srcHeight);
            if('gif'==$type || 'png'==$type) {
                $background_color  =  imagecolorallocate($thumbImg,  255,255,255);  //  指派一个绿色
				imagecolortransparent($thumbImg,$background_color);  //  设置为透明色，若注释掉该行则输出绿色的图
            }

            // 对jpeg图形设置隔行扫描
            if('jpg'==$type || 'jpeg'==$type)
				imageinterlace($thumbImg,$interlace);

           return $thumbImg;
        

    }
    
	public function water($source,$water,$alpha=80,$position="0")
    {
        //检查文件是否存在
        if(!file_exists($source)||!file_exists($water))
            return false;

        //图片信息
        $sInfo = es_imagecls::getImageInfo($source);
        $wInfo = es_imagecls::getImageInfo($water);

        //如果图片小于水印图片，不生成图片
        if($sInfo["0"] < $wInfo["0"] || $sInfo['1'] < $wInfo['1'])
            return false;


            
        if(is_animated_gif($source))
        {
        	require_once APP_ROOT_PATH."system/utils/gif_encoder.php";
			require_once APP_ROOT_PATH."system/utils/gif_reader.php";

			$gif = new GIFReader();
			$gif->load($source);
			foreach($gif->IMGS['frames'] as $k=>$img)
			{
				$im = imagecreatefromstring($gif->getgif($k));		
				//为im加水印
				$sImage=$im;		
		        $wCreateFun="imagecreatefrom".$wInfo['type'];
				if(!function_exists($wCreateFun))
					$wCreateFun = 'imagecreatefromjpeg';
		        $wImage=$wCreateFun($water);
		        		
		        //设定图像的混色模式
		        imagealphablending($wImage, true);		
		        switch (intval($position))
		        {
		        	case 0: break;
		        	//左上
		        	case 1:
		        		$posY=0;
				        $posX=0;
				        //生成混合图像
				        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
		        		break;
		        	//右上
		        	case 2:
		        		$posY=0;
				        $posX=$sInfo[0]-$wInfo[0];
				        //生成混合图像
				        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
		        		break;
		        	//左下
		        	case 3:
		        		$posY=$sInfo[1]-$wInfo[1];
				        $posX=0;
				        //生成混合图像
				        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
		        		break;
		        	//右下
		        	case 4:
				        $posY=$sInfo[1]-$wInfo[1];
				        $posX=$sInfo[0]-$wInfo[0];
				        //生成混合图像
				        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
		        		break;
		        	//居中
		        	case 5:
				        $posY=$sInfo[1]/2-$wInfo[1]/2;
				        $posX=$sInfo[0]/2-$wInfo[0]/2;
				        //生成混合图像
				        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
		        		break;
		        }
				//end im加水印
				
				
				ob_start();
				imagegif($sImage);
				$content = ob_get_contents();
		        ob_end_clean();
				$frames [ ] = $content;
		   		$framed [ ] = $img['frameDelay'];
			}
		
				
			$gif_maker = new GIFEncoder (
			       $frames,
			       $framed,
			       0,
			       2,
			       0, 0, 0,
			       "bin"   //bin为二进制   url为地址
			  );
			$image_rs = $gif_maker->GetAnimation ( );
			
			//如果没有给出保存文件名，默认为原图像名
	        @unlink($source);
	        //保存图像
	        file_put_contents($source,$image_rs);
	        return true;
        }   
            
        //建立图像
		$sCreateFun="imagecreatefrom".$sInfo['type'];
		if(!function_exists($sCreateFun))
			$sCreateFun = 'imagecreatefromjpeg';
		$sImage=$sCreateFun($source);

        $wCreateFun="imagecreatefrom".$wInfo['type'];
		if(!function_exists($wCreateFun))
			$wCreateFun = 'imagecreatefromjpeg';
        $wImage=$wCreateFun($water);

        //设定图像的混色模式
        imagealphablending($wImage, true);

        switch (intval($position))
        {
        	case 0: break;
        	//左上
        	case 1:
        		$posY=0;
		        $posX=0;
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;
        	//右上
        	case 2:
        		$posY=0;
		        $posX=$sInfo[0]-$wInfo[0];
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;
        	//左下
        	case 3:
        		$posY=$sInfo[1]-$wInfo[1];
		        $posX=0;
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;
        	//右下
        	case 4:
		        $posY=$sInfo[1]-$wInfo[1];
		        $posX=$sInfo[0]-$wInfo[0];
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;
        	//居中
        	case 5:
		        $posY=$sInfo[1]/2-$wInfo[1]/2;
		        $posX=$sInfo[0]/2-$wInfo[0]/2;
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo[0],$wInfo[1],$alpha);
        		break;
        }

        //如果没有给出保存文件名，默认为原图像名
        @unlink($source);
        //保存图像
        imagejpeg($sImage,$source,100);
        imagedestroy($sImage);
    }
}

if(!function_exists('image_type_to_extension'))
{
	function image_type_to_extension($imagetype)
	{
		if(empty($imagetype))
			return false;

		switch($imagetype)
		{
			case IMAGETYPE_GIF    : return '.gif';
			case IMAGETYPE_JPEG   : return '.jpeg';
			case IMAGETYPE_PNG    : return '.png';
			case IMAGETYPE_SWF    : return '.swf';
			case IMAGETYPE_PSD    : return '.psd';
			case IMAGETYPE_BMP    : return '.bmp';
			case IMAGETYPE_TIFF_II : return '.tiff';
			case IMAGETYPE_TIFF_MM : return '.tiff';
			case IMAGETYPE_JPC    : return '.jpc';
			case IMAGETYPE_JP2    : return '.jp2';
			case IMAGETYPE_JPX    : return '.jpf';
			case IMAGETYPE_JB2    : return '.jb2';
			case IMAGETYPE_SWC    : return '.swc';
			case IMAGETYPE_IFF    : return '.aiff';
			case IMAGETYPE_WBMP   : return '.wbmp';
			case IMAGETYPE_XBM    : return '.xbm';
			default               : return false;
		}
	}
}
?>