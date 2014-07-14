<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate_type_link`;");
E_C("CREATE TABLE `fanwe_deal_cate_type_link` (
  `cate_id` int(11) NOT NULL,
  `deal_cate_type_id` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`,`deal_cate_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_cate_type_link` values('8','1');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','2');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','3');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','4');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','26');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','27');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','28');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','29');");
E_D("replace into `fanwe_deal_cate_type_link` values('8','30');");
E_D("replace into `fanwe_deal_cate_type_link` values('9','1');");
E_D("replace into `fanwe_deal_cate_type_link` values('9','5');");
E_D("replace into `fanwe_deal_cate_type_link` values('9','6');");
E_D("replace into `fanwe_deal_cate_type_link` values('10','5');");
E_D("replace into `fanwe_deal_cate_type_link` values('11','6');");
E_D("replace into `fanwe_deal_cate_type_link` values('11','7');");
E_D("replace into `fanwe_deal_cate_type_link` values('11','8');");
E_D("replace into `fanwe_deal_cate_type_link` values('11','9');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','10');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','11');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','12');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','13');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','14');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','15');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','16');");
E_D("replace into `fanwe_deal_cate_type_link` values('13','17');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','18');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','19');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','20');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','21');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','22');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','23');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','24');");
E_D("replace into `fanwe_deal_cate_type_link` values('16','25');");

require("../../inc/footer.php");
?>