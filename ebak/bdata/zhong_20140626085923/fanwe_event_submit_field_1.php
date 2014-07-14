<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_event_submit_field`;");
E_C("CREATE TABLE `fanwe_event_submit_field` (
  `submit_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `result` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`submit_id`,`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_event_submit_field` values('1','5','张三','1');");
E_D("replace into `fanwe_event_submit_field` values('1','6','13333333333','1');");
E_D("replace into `fanwe_event_submit_field` values('1','7','男','1');");
E_D("replace into `fanwe_event_submit_field` values('1','8','18-30岁','1');");

require("../../inc/footer.php");
?>