<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class es_image 
{//类定义开始

    /**
     +----------------------------------------------------------
     * 取得图像信息
     *
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $es_image 图像文件名
     +----------------------------------------------------------
     * @return mixed
     +----------------------------------------------------------
     */
    static function getImageInfo($img) {
        $imageInfo = @getimagesize($img);
        if( $imageInfo!== false) {
            $imageType = strtolower(substr(image_type_to_extension($imageInfo[2]),1));
            $imageSize = filesize($img);
            $info = array(
                "width"=>$imageInfo[0],
                "height"=>$imageInfo[1],
                "type"=>$imageType,
                "size"=>$imageSize,
                "mime"=>$imageInfo['mime']
            );
            return $info;
        }else {
            return false;
        }
    }

    /**
     +----------------------------------------------------------
     * 显示服务器图像文件
     * 支持URL方式
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $imgFile 图像文件名
     * @param string $text 文字字符串
     * @param string $width 图像宽度
     * @param string $height 图像高度
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    static function showImg($imgFile,$text='',$width=80,$height=30) {
        //获取图像文件信息
        $info = es_image::getImageInfo($imgFile);
        if($info !== false) {
            $createFun  =   str_replace('/','createfrom',$info['mime']);
            $im = $createFun($imgFile);
            if($im) {
                $ImageFun= str_replace('/','',$info['mime']);
                if(!empty($text)) {
                    $tc  = imagecolorallocate($im, 0, 0, 0);
                    imagestring($im, 3, 5, 5, $text, $tc);
                }
                if($info['type']=='png' || $info['type']=='gif') {
                imagealphablending($im, false);//取消默认的混色模式
                imagesavealpha($im,true);//设定保存完整的 alpha 通道信息
                }
                header("Content-type: ".$info['mime']);
                $ImageFun($im);
                imagedestroy($im);
                return ;
            }
        }
        //获取或者创建图像文件失败则生成空白PNG图片
        $im  = imagecreatetruecolor($width, $height);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
        imagestring($im, 4, 5, 5, "NO PIC", $tc);
        es_image::output($im);
        return ;
    }

    /**
     +----------------------------------------------------------
     * 生成缩略图
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $es_image  原图
     * @param string $type 图像格式
     * @param string $thumbname 缩略图文件名
     * @param string $maxWidth  宽度
     * @param string $maxHeight  高度
     * @param string $position 缩略图保存目录
     * @param boolean $interlace 启用隔行扫描
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    static function thumb($image,$thumbname,$type='',$width=200,$height=50,$interlace=true)
    {
        // 获取原图信息
        $info  = es_image::getImageInfo($image);
         if($info !== false) {
            $srcWidth  = $info['width'];
            $srcHeight = $info['height'];
            $type = empty($type)?$info['type']:$type;
			$type = strtolower($type);
            $interlace  =  $interlace? 1:0;
            unset($info);
            

            // 载入原图
            $createFun = 'ImageCreateFrom'.($type=='jpg'?'jpeg':$type);
            $srcImg     = $createFun($image);

            //创建缩略图
            if($type!='gif' && function_exists('imagecreatetruecolor'))
                $thumbImg = imagecreatetruecolor($width, $height);
            else
                $thumbImg = imagecreate($width, $height);

            // 复制图片
            $bgcolor = trim(conf("BG_COLOR"),"#");
        	sscanf($bgcolor, "%2x%2x%2x", $red, $green, $blue);
        	$clr = imagecolorallocate($thumbImg, $red, $green, $blue);
        	imagefilledrectangle($thumbImg, 0, 0, $width, $height, $clr);
        	$scale_org = $srcWidth/$srcHeight;
	        if ($srcWidth / $thumb_width > $srcHeight / $thumb_height)
	        {
	            $lessen_width  = $width;
	            $lessen_height  = $width / $scale_org;
	        }
	        else
	        {
	            /* 原始图片比较高，则以高度为准 */
	            $lessen_width  = $height * $scale_org;
	            $lessen_height = $height;
	        }
                
	        $dst_x = ($width  - $lessen_width)  / 2;
        	$dst_y = ($height - $lessen_height) / 2;
        
            if(function_exists("ImageCopyResampled"))
                imagecopyresampled($thumbImg, $srcImg, $dst_x, $dst_y, 0, 0, $lessen_width, $lessen_height, $srcWidth,$srcHeight);
            else
                imagecopyresized($thumbImg, $srcImg, $dst_x, $dst_y, 0, 0, $lessen_width, $lessen_height,  $srcWidth,$srcHeight);
            if('gif'==$type || 'png'==$type) {
                //imagealphablending($thumbImg, false);//取消默认的混色模式
                //imagesavealpha($thumbImg,true);//设定保存完整的 alpha 通道信息
                $background_color  =  imagecolorallocate($thumbImg,  0,255,0);  //  指派一个绿色
				imagecolortransparent($thumbImg,$background_color);  //  设置为透明色，若注释掉该行则输出绿色的图
            }

            // 对jpeg图形设置隔行扫描
            if('jpg'==$type || 'jpeg'==$type) 	imageinterlace($thumbImg,$interlace);

            //$gray=ImageColorAllocate($thumbImg,255,0,0);
            //ImageString($thumbImg,2,5,5,"ThinkPHP",$gray);
            // 生成图片
            $imageFun = 'image'.($type=='jpg'?'jpeg':$type);
            $imageFun($thumbImg,$thumbname);
            imagedestroy($thumbImg);
            imagedestroy($srcImg);
            return $thumbname;
         }
         return false;
    }

    /**
     +----------------------------------------------------------
     * 根据给定的字符串生成图像
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $string  字符串
     * @param string $size  图像大小 width,height 或者 array(width,height)
     * @param string $font  字体信息 fontface,fontsize 或者 array(fontface,fontsize)
     * @param string $type 图像格式 默认PNG
     * @param integer $disturb 是否干扰 1 点干扰 2 线干扰 3 复合干扰 0 无干扰
	 * @param bool $border  是否加边框 array(color)
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
	static function buildString($string,$rgb=array(),$filename='',$type='png',$disturb=1,$border=true) {
		if(is_string($size))		$size	=	explode(',',$size);
		$width	=	$size[0];
		$height	=	$size[1];
		if(is_string($font))		$font	=	explode(',',$font);
		$fontface	=	$font[0];
		$fontsize	 	=	$font[1];
		$length		=	strlen($string);
        $width = ($length*9+10)>$width?$length*9+10:$width;
		$height	=	22;
        if ( $type!='gif' && function_exists('imagecreatetruecolor')) {
            $im = @imagecreatetruecolor($width,$height);
        }else {
            $im = @imagecreate($width,$height);
        }
		if(empty($rgb)) {
			$color = imagecolorallocate($im, 102, 104, 104);
		}else{
			$color = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
		}
        $backColor = imagecolorallocate($im, 255,255,255);    //背景色（随机）
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
        $pointColor = imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));                 //点颜色

        @imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        @imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
        @imagestring($im, 5, 5, 3, $string, $color);
		if(!empty($disturb)) {
			// 添加干扰
			if($disturb=1 || $disturb=3) {
				for($i=0;$i<25;$i++){
					imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$pointColor);
				}
			}elseif($disturb=2 || $disturb=3){
				for($i=0;$i<10;$i++){
					imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$pointColor);
				}
			}
		}
        es_image::output($im,$type,$filename);
	}

    /**
     +----------------------------------------------------------
     * 生成图像验证码
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $length  位数
     * @param string $mode  类型
     * @param string $type 图像格式
     * @param string $width  宽度
     * @param string $height  高度
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    static function buildImageVerify($length=4,$mode=1,$type='gif',$width=48,$height=22,$verifyName='verify')
    {
		require_once APP_ROOT_PATH."system/utils/es_string.php";
        $randval = es_string::rand_string($length,$mode);
        es_session::set($verifyName,md5($randval));
        $width = ($length*10+10)>$width?$length*10+10:$width;
        if ( $type!='gif' && function_exists('imagecreatetruecolor')) {
            $im = @imagecreatetruecolor($width,$height);
        }else {
            $im = @imagecreate($width,$height);
        }
        $r = Array(225,255,255,223);
        $g = Array(225,236,237,255);
        $b = Array(225,236,166,125);
        $key = mt_rand(0,3);

        $backColor = imagecolorallocate($im, $r[$key],$g[$key],$b[$key]);    //背景色（随机）
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
        $pointColor = imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));                 //点颜色

        @imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        @imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
        $stringColor = imagecolorallocate($im,mt_rand(0,200),mt_rand(0,120),mt_rand(0,120));
		// 干扰
		for($i=0;$i<10;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
		}
		for($i=0;$i<25;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$pointColor);
		}
		for($i=0;$i<$length;$i++) {
			imagestring($im,5,$i*10+5,mt_rand(1,8),$randval{$i}, $stringColor);
		}
//        @imagestring($im, 5, 5, 3, $randval, $stringColor);
        es_image::output($im,$type);
    }

	// 中文验证码
	static function GBVerify($length=4,$type='png',$width=180,$height=50,$fontface='simhei.ttf',$verifyName='verify') {
		require_once APP_ROOT_PATH."system/utils/es_string.php";
        $code = es_string::rand_string($length,4);
        $width = ($length*45)>$width?$length*45:$width;
        es_session::set($verifyName,md5($code));
		$im=imagecreatetruecolor($width,$height);
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
		$bkcolor=imagecolorallocate($im,250,250,250);
		imagefill($im,0,0,$bkcolor);
        @imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
		// 干扰
		for($i=0;$i<15;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
		}
		for($i=0;$i<255;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$fontcolor);
		}
		if(!is_file($fontface)) {
			$fontface = dirname(__FILE__)."/".$fontface;
		}
		for($i=0;$i<$length;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120)); //这样保证随机出来的颜色较深。
			$codex= msubstr($code,$i,1);
			imagettftext($im,mt_rand(16,20),mt_rand(-60,60),40*$i+20,mt_rand(30,35),$fontcolor,$fontface,$codex);
		}
		es_image::output($im,$type);
	}

    /**
     +----------------------------------------------------------
     * 把图像转换成字符显示
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $es_image  要显示的图像
     * @param string $type  图像类型，默认自动获取
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    static function showASCIIImg($image,$string='',$type='')
    {
        $info  = es_image::getImageInfo($image);
        if($info !== false) {
            $type = empty($type)?$info['type']:$type;
            unset($info);
            // 载入原图
            $createFun = 'ImageCreateFrom'.($type=='jpg'?'jpeg':$type);
            $im     = $createFun($image);
            $dx = imagesx($im);
            $dy = imagesy($im);
			$i	=	0;
            $out   =  '<span style="padding:0px;margin:0;line-height:100%;font-size:1px;">';
			set_time_limit(0);
            for($y = 0; $y < $dy; $y++) {
              for($x=0; $x < $dx; $x++) {
                  $col = imagecolorat($im, $x, $y);
                  $rgb = imagecolorsforindex($im,$col);
				  $str	 =	 empty($string)?'*':$string[$i++];
                  $out .= sprintf('<span style="margin:0px;color:#%02x%02x%02x">'.$str.'</span>',$rgb['red'],$rgb['green'],$rgb['blue']);
             }
             $out .= "<br>\n";
            }
            $out .=  '</span>';
            imagedestroy($im);
            return $out;
        }
        return false;
    }

    /**
     +----------------------------------------------------------
     * 生成高级图像验证码
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @param string $type 图像格式
     * @param string $width  宽度
     * @param string $height  高度
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    static function showAdvVerify($type='png',$width=180,$height=40,$verifyName='verifyCode')
    {
		$rand	=	range('a','z');
		shuffle($rand);
		$verifyCode	=	array_slice($rand,0,10);
        $letter = implode(" ",$verifyCode);
        es_session::set($verifyName,$verifyCode);
        $im = imagecreate($width,$height);
        $r = array(225,255,255,223);
        $g = array(225,236,237,255);
        $b = array(225,236,166,125);
        $key = mt_rand(0,3);
        $backColor = imagecolorallocate($im, $r[$key],$g[$key],$b[$key]);
		$borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
        imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
        $numberColor = imagecolorallocate($im, 255,rand(0,100), rand(0,100));
        $stringColor = imagecolorallocate($im, rand(0,100), rand(0,100), 255);
		// 添加干扰
		/*
		for($i=0;$i<10;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagearc($im,mt_rand(-10,$width),mt_rand(-10,$height),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
		}
		for($i=0;$i<255;$i++){
			$fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$fontcolor);
		}*/
        imagestring($im, 5, 5, 1, "0 1 2 3 4 5 6 7 8 9", $numberColor);
        imagestring($im, 5, 5, 20, $letter, $stringColor);
        es_image::output($im,$type);
    }

    /**
     +----------------------------------------------------------
     * 生成UPC-A条形码
     +----------------------------------------------------------
     * @static
     +----------------------------------------------------------
     * @param string $type 图像格式
     * @param string $type 图像格式
     * @param string $lw  单元宽度
     * @param string $hi   条码高度
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    static function UPCA($code,$type='png',$lw=2,$hi=100) {
        static $Lencode = array('0001101','0011001','0010011','0111101','0100011',
                         '0110001','0101111','0111011','0110111','0001011');
        static $Rencode = array('1110010','1100110','1101100','1000010','1011100',
                         '1001110','1010000','1000100','1001000','1110100');
        $ends = '101';
        $center = '01010';
        /* UPC-A Must be 11 digits, we compute the checksum. */
        if ( strlen($code) != 11 ) { die("UPC-A Must be 11 digits."); }
        /* Compute the EAN-13 Checksum digit */
        $ncode = '0'.$code;
        $even = 0; $odd = 0;
        for ($x=0;$x<12;$x++) {
          if ($x % 2) { $odd += $ncode[$x]; } else { $even += $ncode[$x]; }
        }
        $code.=(10 - (($odd * 3 + $even) % 10)) % 10;
        /* Create the bar encoding using a binary string */
        $bars=$ends;
        $bars.=$Lencode[$code[0]];
        for($x=1;$x<6;$x++) {
          $bars.=$Lencode[$code[$x]];
        }
        $bars.=$center;
        for($x=6;$x<12;$x++) {
          $bars.=$Rencode[$code[$x]];
        }
        $bars.=$ends;
        /* Generate the Barcode Image */
        if ( $type!='gif' && function_exists('imagecreatetruecolor')) {
            $im = imagecreatetruecolor($lw*95+30,$hi+30);
        }else {
            $im = imagecreate($lw*95+30,$hi+30);
        }
        $fg = ImageColorAllocate($im, 0, 0, 0);
        $bg = ImageColorAllocate($im, 255, 255, 255);
        ImageFilledRectangle($im, 0, 0, $lw*95+30, $hi+30, $bg);
        $shift=10;
        for ($x=0;$x<strlen($bars);$x++) {
          if (($x<10) || ($x>=45 && $x<50) || ($x >=85)) { $sh=10; } else { $sh=0; }
          if ($bars[$x] == '1') { $color = $fg; } else { $color = $bg; }
          ImageFilledRectangle($im, ($x*$lw)+15,5,($x+1)*$lw+14,$hi+5+$sh,$color);
        }
        /* Add the Human Readable Label */
        ImageString($im,4,5,$hi-5,$code[0],$fg);
        for ($x=0;$x<5;$x++) {
          ImageString($im,5,$lw*(13+$x*6)+15,$hi+5,$code[$x+1],$fg);
          ImageString($im,5,$lw*(53+$x*6)+15,$hi+5,$code[$x+6],$fg);
        }
        ImageString($im,4,$lw*95+17,$hi-5,$code[11],$fg);
        /* Output the Header and Content. */
        es_image::output($im,$type);
    }

    static function output($im,$type='gif',$filename='')
    {
    	ob_clean();
        header("Content-type: image/".$type);
        $ImageFun='image'.$type;
		if(empty($filename)) {
			if(!$ImageFun($im))
			{
				ob_clean();
				header("Content-type: image/jpeg");
				if(!imagejpeg($im))
				{
					ob_clean();
					header("Content-type: image/png");
					if(!imagepng($im))
					{
						es_session::delete("verify");
					}
				}
			}
		}else{
	        $ImageFun($im,$filename);
		}
        imagedestroy($im);
    }
    
    
	/**
     +----------------------------------------------------------
     * 为图片添加水印
     +----------------------------------------------------------
     * @static public
     +----------------------------------------------------------
     * @param string $source 原文件名
     * @param string $water  水印图片
     * @param string $$savename  添加水印后的图片名
     * @param string $alpha  水印的透明度
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     * @throws ThinkExecption
     +----------------------------------------------------------
     */
	//修改 by matthew 增加水印位置
    static public function water($source,$water,$savename=null,$alpha=80,$position="0")
    {
        //检查文件是否存在
        if(!file_exists($source)||!file_exists($water))
            return false;

        //图片信息
        $sInfo=self::getImageInfo($source);
        $wInfo=self::getImageInfo($water);

        //如果图片小于水印图片，不生成图片
        if($sInfo["width"]<$wInfo["width"] || $sInfo['height']<$wInfo['height'])
            return false;

        //建立图像
        $sCreateFun="imagecreatefrom".$sInfo['type'];
        $sImage=$sCreateFun($source);
        $wCreateFun="imagecreatefrom".$wInfo['type'];
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
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo['width'],$wInfo['height'],$alpha);
        		break;
        	//右上
        	case 2:
        		$posY=0;
		        $posX=$sInfo["width"]-$wInfo["width"];		
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo['width'],$wInfo['height'],$alpha);
        		break;
        	//左下
        	case 3:
        		$posY=$sInfo["height"]-$wInfo["height"];
		        $posX=0;		
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo['width'],$wInfo['height'],$alpha);
        		break;
        	//右下
        	case 4:        				        
		        $posY=$sInfo["height"]-$wInfo["height"];
		        $posX=$sInfo["width"]-$wInfo["width"];		
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo['width'],$wInfo['height'],$alpha);
        		break;
        	//居中
        	case 5:          		      				        
		        $posY=$sInfo["height"]/2-$wInfo["height"]/2;
		        $posX=$sInfo["width"]/2-$wInfo["width"]/2;		
		        //生成混合图像
		        imagecopymerge($sImage, $wImage, $posX, $posY, 0, 0, $wInfo['width'],$wInfo['height'],$alpha);
        		break;
        }

        //输出图像
        $ImageFun='Image'.$sInfo['type'];
        //如果没有给出保存文件名，默认为原图像名
        if(!$savename){
            $savename=$source;
            @unlink($source);
        }
        //保存图像
        $ImageFun($sImage,$savename);
        imagedestroy($sImage);

    }

}//类定义结束


if(!function_exists('image_type_to_extension'))
{
   function image_type_to_extension($imagetype)
   {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case IMAGETYPE_GIF    : return '.gif';
           case IMAGETYPE_JPEG    : return '.jpeg';
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
           case IMAGETYPE_WBMP    : return '.wbmp';
           case IMAGETYPE_XBM    : return '.xbm';
           default                : return false;
       }
   }

}
?>