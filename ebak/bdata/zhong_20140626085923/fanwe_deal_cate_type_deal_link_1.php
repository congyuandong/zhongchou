<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate_type_deal_link`;");
E_C("CREATE TABLE `fanwe_deal_cate_type_deal_link` (
  `deal_id` int(11) NOT NULL,
  `deal_cate_type_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_id`,`deal_cate_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('37','2');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('37','3');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('38','2');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('39','2');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('39','4');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('49','1');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('50','4');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('51','4');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('53','4');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('55','28');");
E_D("replace into `fanwe_deal_cate_type_deal_link` values('55','29');");

require("../../inc/footer.php");
?>