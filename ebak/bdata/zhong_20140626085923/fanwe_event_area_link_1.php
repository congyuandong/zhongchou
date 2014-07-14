<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_event_area_link`;");
E_C("CREATE TABLE `fanwe_event_area_link` (
  `event_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_event_area_link` values('1','8');");
E_D("replace into `fanwe_event_area_link` values('1','12');");
E_D("replace into `fanwe_event_area_link` values('1','22');");
E_D("replace into `fanwe_event_area_link` values('1','27');");
E_D("replace into `fanwe_event_area_link` values('1','29');");
E_D("replace into `fanwe_event_area_link` values('1','37');");
E_D("replace into `fanwe_event_area_link` values('1','38');");
E_D("replace into `fanwe_event_area_link` values('1','39');");
E_D("replace into `fanwe_event_area_link` values('1','42');");
E_D("replace into `fanwe_event_area_link` values('1','43');");

require("../../inc/footer.php");
?>