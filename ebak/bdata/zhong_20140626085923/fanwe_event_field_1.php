<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_event_field`;");
E_C("CREATE TABLE `fanwe_event_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `field_show_name` varchar(255) NOT NULL,
  `field_type` tinyint(1) NOT NULL COMMENT '0:手动输入 1:预选下拉',
  `value_scope` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_event_field` values('5','1','姓名','0','','0');");
E_D("replace into `fanwe_event_field` values('6','1','电话','0','','1');");
E_D("replace into `fanwe_event_field` values('7','1','性别','1','男 女','2');");
E_D("replace into `fanwe_event_field` values('8','1','年龄','1','0-18岁 18-30岁 30-50岁 50岁以上','3');");

require("../../inc/footer.php");
?>