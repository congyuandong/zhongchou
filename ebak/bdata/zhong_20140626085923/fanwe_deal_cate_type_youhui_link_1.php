<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate_type_youhui_link`;");
E_C("CREATE TABLE `fanwe_deal_cate_type_youhui_link` (
  `deal_cate_type_id` int(11) NOT NULL,
  `youhui_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_cate_type_id`,`youhui_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('2','10');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('2','11');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('2','14');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('2','15');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('3','10');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('3','11');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('3','14');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('3','15');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('4','11');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('4','14');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('28','18');");
E_D("replace into `fanwe_deal_cate_type_youhui_link` values('29','18');");

require("../../inc/footer.php");
?>