<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_supplier_location_dp_tag_result`;");
E_C("CREATE TABLE `fanwe_supplier_location_dp_tag_result` (
  `tags` varchar(255) NOT NULL,
  `dp_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_supplier_location_dp_tag_result` values('干净 明亮','1','1','15');");
E_D("replace into `fanwe_supplier_location_dp_tag_result` values('有直达公交','1','2','15');");

require("../../inc/footer.php");
?>