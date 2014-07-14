<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_youhui_location_link`;");
E_C("CREATE TABLE `fanwe_youhui_location_link` (
  `youhui_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`youhui_id`,`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_youhui_location_link` values('12','19');");
E_D("replace into `fanwe_youhui_location_link` values('13','20');");
E_D("replace into `fanwe_youhui_location_link` values('14','18');");
E_D("replace into `fanwe_youhui_location_link` values('15','14');");
E_D("replace into `fanwe_youhui_location_link` values('16','18');");
E_D("replace into `fanwe_youhui_location_link` values('17','18');");
E_D("replace into `fanwe_youhui_location_link` values('18','18');");

require("../../inc/footer.php");
?>