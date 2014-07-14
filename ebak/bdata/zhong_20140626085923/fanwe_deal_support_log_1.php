<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_support_log`;");
E_C("CREATE TABLE `fanwe_deal_support_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `price` double(20,4) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`),
  KEY `deal_item_id` (`deal_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_support_log` values('41','55','18','1352229388','15.0000','18');");
E_D("replace into `fanwe_deal_support_log` values('42','56','17','1352230101','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('43','56','19','1352230180','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('44','56','19','1352230228','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('45','56','19','1352230232','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('46','56','19','1352230237','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('47','56','19','1352230240','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('48','56','19','1352230243','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('49','56','19','1352230247','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('50','56','19','1352230268','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('51','56','19','1352230270','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('52','56','19','1352230293','500.0000','24');");
E_D("replace into `fanwe_deal_support_log` values('53','58','18','1352231539','2000.0000','31');");
E_D("replace into `fanwe_deal_support_log` values('54','58','18','1352231704','3000.0000','32');");
E_D("replace into `fanwe_deal_support_log` values('55','57','22','1403635246','3000.0000','29');");

require("../../inc/footer.php");
?>