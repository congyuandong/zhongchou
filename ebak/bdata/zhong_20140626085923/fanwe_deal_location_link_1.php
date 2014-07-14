<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_location_link`;");
E_C("CREATE TABLE `fanwe_deal_location_link` (
  `deal_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_id`,`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_location_link` values('37','14');");
E_D("replace into `fanwe_deal_location_link` values('38','15');");
E_D("replace into `fanwe_deal_location_link` values('39','16');");
E_D("replace into `fanwe_deal_location_link` values('49','16');");
E_D("replace into `fanwe_deal_location_link` values('50','16');");
E_D("replace into `fanwe_deal_location_link` values('51','16');");
E_D("replace into `fanwe_deal_location_link` values('52','20');");
E_D("replace into `fanwe_deal_location_link` values('53','16');");
E_D("replace into `fanwe_deal_location_link` values('54','18');");
E_D("replace into `fanwe_deal_location_link` values('55','14');");
E_D("replace into `fanwe_deal_location_link` values('56','18');");

require("../../inc/footer.php");
?>