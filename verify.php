<?php 
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------\
error_reporting(0);
if(!defined('APP_ROOT_PATH')) 
define('APP_ROOT_PATH', str_replace('verify.php', '', str_replace('\\', '/', __FILE__)));
require APP_ROOT_PATH."system/utils/es_session.php";
es_session::start();
require APP_ROOT_PATH."system/utils/es_image.php";
es_image::buildImageVerify(4,1);
?>