<?php
class GIFReader {
//时间: 2009-03-21
//author: lael
//http://www.gzyd.net
//http://hi.baidu.com/lael80

var $BUF = "";
var $IMGS = array();

function GIFReader(){
   //
}

/*
$mod = url / bin
*/
function load($src, $mod = "url"){
   if($mod == "url"){
    $this->BUF = file_get_contents($src);
   }else{
    $this->BUF = $src;
   }

   $this->IMGS = array("info" => array(), "frames" => array());

   $this->IMGS["info"]["Loops"] = -1;
   $this->IMGS["info"]["UsesBkBuffer"] = false;
   $this->IMGS["info"]["Version"] = substr($this->BUF, 0, 6);
   $this->IMGS["info"]["HdrOffset"] = 0;
   $this->IMGS["info"]["Width"] = ord(substr($this->BUF, 6, 2));
   $this->IMGS["info"]["Height"] = ord(substr($this->BUF, 8, 2));

   $gByte = ord($this->BUF{10});
   $this->IMGS["info"]["gTableUsed"] = $this->DoBitwise($gByte, 0x80);
   $this->IMGS["info"]["gTableCount"] = $this->DoBitwise($gByte, 0x07);

   if($this->IMGS["info"]["gTableUsed"]){
    $this->IMGS["info"]["BkgColor"] = ord($this->BUF{11});

    $this->ColorFromTable(0xE, $this->IMGS["info"]["BkgColor"], $this->IMGS["info"]["gTableCount"]);

    if($this->IMGS["info"]["BkgColor"] < 0)$this->IMGS["info"]["BkgColor"] = 0;
    $seek = 0xE + 3 * (2 << $this->IMGS["info"]["gTableCount"]) - 1;
   }else{
    $seek = 13;
    $this->IMGS["info"]["BkgColor"] = 0;
    $this->IMGS["info"]["gTableCount"] = 0;
   }

   $fColor = - 1;
   $tmp = array();
   while(true){
    switch (ord($this->BUF{$seek})){
     case 0:
      $seek ++;
      break;
     case 33:
      $seek ++;
      switch (ord($this->BUF{$seek})){
       case 255:
        $seek ++;
        if(count($this->IMGS["frames"]) == 0){
         $gByte = ord($this->BUF{$seek});
         $seek ++;
         $gifString = strtoupper(substr($this->BUF, $seek, 8));
         $seek += 8;
         if($gifString == "NETSCAPE"){
          $seek += 3;

          $gByte = ord($this->BUF{$seek});
          $seek ++;
          if($gByte == 3){
           $seek ++;
           $this->IMGS["info"]["Loops"] = ord(substr($this->BUF, $seek, 2));
           $seek += 2;
           if($this->IMGS["info"]["Loops"] < 1)$this->IMGS["info"]["Loops"] = 0;
          }else{
           //
          }
         }else{
          $seek += 3;
         }
        }
        $gByte = ord($this->BUF{$seek});
        $seek ++;
        while($gByte > 0){
         $seek += $gByte;
         $gByte = ord($this->BUF{$seek});
         $seek ++;
        }
        break;
       case 254:
        $seek ++;
        $gByte = ord($this->BUF{$seek});
        $seek ++;
        while($gByte > 0){
         $seek += $gByte;
         $gByte = ord($this->BUF{$seek});
         $seek ++;
        }
        break;
       case 249:
        $seek ++;
        if($this->IMGS["info"]["HdrOffset"] == 0)$this->IMGS["info"]["HdrOffset"] = $seek - 1;
        $tmp["byteOffset(Begin)"] = $seek;
        $seek += 1;
        $gByte = ord($this->BUF{$seek});
        $seek ++;

        $tmp["FrameDisposal"] = $this->DoBitwise($gByte, 0x1C);
        if($tmp["FrameDisposal"] == 3)$this->IMGS["info"]["UsesBkBuffer"] = True;

        $tmp["isTransparent"] = $this->DoBitwise($gByte, 0x01);

        $tmp["frameDelay"] = ord(substr($this->BUF, $seek, 2));
        $seek += 2;

        if($tmp["isTransparent"]){
         $fColor = ord($this->BUF{$seek});
         $seek ++;
        }
        $seek += $tmp["isTransparent"];
        break;
       case 1:
        $seek ++;
        $gByte = ord($this->BUF{$seek});
        $seek ++;
        while($gByte > 0){
         $seek += $gByte;
         $gByte = ord($this->BUF{$seek});
         $seek ++;
        }
        break;
       default:
        $seek ++;
        $gByte = ord($this->BUF{$seek});
        $seek ++;
        while($gByte > 0){
         $seek += $gByte;
         $gByte = ord($this->BUF{$seek});
         $seek ++;
        }
        break;
      }
      break;
     case 44:
      $seek ++;
      if($this->IMGS["info"]["HdrOffset"] == 0){
       $tmp["byteOffset(Begin)"] = $seek;
       $this->IMGS["info"]["HdrOffset"] = $seek - 1;
      }

      $tmp["FrameLeft"] = ord(substr($this->BUF, $seek, 2));
      $seek += 2;
      $tmp["FrameTop"] = ord(substr($this->BUF, $seek, 2));
      $seek += 2;
      $tmp["FrameWidth"] = ord(substr($this->BUF, $seek, 2));
      $seek += 2;
      $tmp["FrameHeight"] = ord(substr($this->BUF, $seek, 2));
      $seek += 2;

      $gByte = ord($this->BUF{$seek});
      $seek ++;
     
      $tmp["lTableUsed"] = $this->DoBitwise($gByte, 0x80);
      if($tmp["lTableUsed"]){
       $tmp["lTableCount"] = $this->DoBitwise($gByte, 0x07);
       $lTableLoc = $seek;
       $seek += 3 * (2 << $tmp["lTableCount"]);
      }else{
       $tmp["lTableCount"] = 0;
       $seek ++;
      }

      if($tmp["isTransparent"]){
       if($this->IMGS["info"]["gTableCount"]){
         $this->ColorFromTable(0xE, $fColor, $this->IMGS["info"]["gTableCount"]);
       } elseif($tmp["lTableCount"]){
         $this->ColorFromTable($lTableLoc, $fColor, $tmp["lTableCount"]);
       }
       $tmp["FrameTransparentColor"] = $fColor;
      }else{
       $tmp["FrameTransparentColor"] = -1;
      }

      $gByte = ord($this->BUF{$seek});
      $seek ++;
      while($gByte > 0){
       $seek += $gByte;
       $gByte = ord($this->BUF{$seek});
       $seek ++;
      }
      $tmp["byteOffset(End)"] = $seek;

      array_push($this->IMGS["frames"], $tmp);
      $tmp = array();
      $fColor = -1;

      break;
     case 59:
      break(2);
     default:
      $seek ++;
      $gByte = ord($this->BUF{$seek});
      $seek ++;
      while($gByte > 0){
       $seek += $gByte;
       $gByte = ord($this->BUF{$seek});
       $seek ++;
      }
      break;
    }
   }
}

function getgif($i){
   if(!isset($this->IMGS["frames"][$i]["byteOffset(Begin)"]))return "";
  
   $pos1 = $this->IMGS["frames"][$i]["byteOffset(Begin)"];
   $pos2 = $this->IMGS["frames"][$i]["byteOffset(End)"];
   return $this->getheader().substr($this->BUF, $pos1, $pos2 - $pos1).";";
  
}

//$mode 0直接用数据生成图，1按原图高宽及当前帧位置生成图
//返回 $im 图片对象
function fixgif($i, $mode = 1){
   if(!isset($this->IMGS["frames"][$i]["byteOffset(Begin)"]))return false;

   $src = $this->getgif($i);
   $sim = imagecreatefromstring($src);
   if($mode === 0)return $sim;
  
   if($sim){
    $dim = imagecreate($this->IMGS["info"]["Width"], $this->IMGS["info"]["Height"]);
    if($this->IMGS["info"]["BkgColor"] > -1){
     imagefilledrectangle($dim, 0, 0, $this->IMGS["info"]["Width"], $this->IMGS["info"]["Height"], $this->getcolor($dim, dechex($this->IMGS["info"]["BkgColor"])));
    }else{
     imagecolortransparent($dim, $this->getcolor($dim));//透明
    }
    imagecopyresampled($dim, $sim, $this->IMGS["frames"][$i]["FrameLeft"], $this->IMGS["frames"][$i]["FrameTop"], 0, 0, $this->IMGS["frames"][$i]["FrameWidth"], $this->IMGS["frames"][$i]["FrameHeight"], $this->IMGS["frames"][$i]["FrameWidth"], $this->IMGS["frames"][$i]["FrameHeight"]);
    imagedestroy($sim);
    if($this->IMGS["info"]["BkgColor"] == -1)imagesavealpha($dim, true);   
    return $dim;
   }
   return false;
}

//$im转成字符串流
function getsrc($im, $mode = 0){
   if($mode === 0){
    $tmp = explode(" ", microtime());
    $tmp[0] = $tmp[0] * 10000000;
    $tmp = $tmp[0] + $tmp[1];
    imagegif($im, $tmp);
    $src = file_get_contents($tmp);
    @unlink($tmp);
   }else{
    ob_start();
    imagegif($im);
    $src = ob_get_clean();
    ob_end_clean();
   }
   return $src;
}

function getcolor(&$im, $color = "#000000"){
   if($color[0] == '#')$color = substr($color, 1);
   if(strlen($color) == 6)list($r, $g, $b) = array($color[0].$color[1], $color[2].$color[3], $color[4].$color[5]);
   elseif(strlen($color) == 3)list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
   else return false;
   return imagecolorallocate($im, hexdec($r), hexdec($g), hexdec($b));
}

function getheader(){
   if(!isset($this->IMGS["frames"][0]["byteOffset(Begin)"]))return "";
  
   $pos = $this->IMGS["frames"][0]["byteOffset(Begin)"];
   return substr($this->BUF, 0, $pos);
}

function savegif($src, $path = "", $mode = "w+"){
   if(empty($src))return false;
  
   $fso = @fopen($path, $mode);
   @fwrite($fso, $src);
   @fclose($fso);
  
   return true;
}

function DoBitwise($lFlags, $lMask){
   if($lMask > 0){
    $result = ($lFlags & $lMask);
    while(($lMask & 1) == 0){
     $lMask = floor($lMask / 2);
     $result = floor($result / 2);
    }
   }
   return $result;
}


function ColorFromTable($seekIdx, &$tIndex, $nrColors) {
   if($tIndex < 0)return ;
  
   if($tIndex * 3 > (2 << ($nrColors * 3)) - 2){
    $tIndex = 0;
    return ;
   }

   $tIndex = ord(substr($this->BUF, $seekIdx + $tIndex * 3, 3));
$tIndex = $tIndex | ( $tIndex << 8 ) | ( $tIndex << 16 );
   //$tIndex = dechex($tIndex);
}
}
?>