<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_supplier_location_dp_point_result`;");
E_C("CREATE TABLE `fanwe_supplier_location_dp_point_result` (
  `group_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `dp_id` int(11) NOT NULL,
  KEY `group_id` (`group_id`) USING BTREE,
  KEY `supplier_location_id` (`supplier_location_id`) USING BTREE,
  KEY `dp_id` (`dp_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_supplier_location_dp_point_result` values('1','3','15','1');");
E_D("replace into `fanwe_supplier_location_dp_point_result` values('2','4','15','1');");
E_D("replace into `fanwe_supplier_location_dp_point_result` values('1','3','15','2');");
E_D("replace into `fanwe_supplier_location_dp_point_result` values('2','5','15','2');");
E_D("replace into `fanwe_supplier_location_dp_point_result` values('1','4','15','3');");
E_D("replace into `fanwe_supplier_location_dp_point_result` values('2','2','15','3');");

require("../../inc/footer.php");
?>