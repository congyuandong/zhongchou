<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_supplier_location_area_link`;");
E_C("CREATE TABLE `fanwe_supplier_location_area_link` (
  `location_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`location_id`,`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_supplier_location_area_link` values('14','13');");
E_D("replace into `fanwe_supplier_location_area_link` values('14','47');");
E_D("replace into `fanwe_supplier_location_area_link` values('15','8');");
E_D("replace into `fanwe_supplier_location_area_link` values('15','20');");
E_D("replace into `fanwe_supplier_location_area_link` values('16','10');");
E_D("replace into `fanwe_supplier_location_area_link` values('17','8');");
E_D("replace into `fanwe_supplier_location_area_link` values('17','14');");
E_D("replace into `fanwe_supplier_location_area_link` values('18','8');");
E_D("replace into `fanwe_supplier_location_area_link` values('18','13');");
E_D("replace into `fanwe_supplier_location_area_link` values('19','8');");
E_D("replace into `fanwe_supplier_location_area_link` values('20','9');");
E_D("replace into `fanwe_supplier_location_area_link` values('20','45');");

require("../../inc/footer.php");
?>