<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_focus_log`;");
E_C("CREATE TABLE `fanwe_deal_focus_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_focus_log` values('32','58','18','1352231518');");
E_D("replace into `fanwe_deal_focus_log` values('33','56','17','1352232247');");

require("../../inc/footer.php");
?>