<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_filter_group`;");
E_C("CREATE TABLE `fanwe_filter_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL COMMENT '是否生效用于检索分组显示于分类页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_filter_group` values('7','面料','24','1','1');");
E_D("replace into `fanwe_filter_group` values('8','尺码','24','2','1');");
E_D("replace into `fanwe_filter_group` values('9','颜色','24','3','1');");

require("../../inc/footer.php");
?>