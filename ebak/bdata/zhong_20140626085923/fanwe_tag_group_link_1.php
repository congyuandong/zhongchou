<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_tag_group_link`;");
E_C("CREATE TABLE `fanwe_tag_group_link` (
  `tag_group_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `tag_id` (`tag_group_id`) USING BTREE,
  KEY `type_id` (`category_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_tag_group_link` values('4','12');");
E_D("replace into `fanwe_tag_group_link` values('5','11');");
E_D("replace into `fanwe_tag_group_link` values('4','11');");
E_D("replace into `fanwe_tag_group_link` values('2','11');");
E_D("replace into `fanwe_tag_group_link` values('4','10');");
E_D("replace into `fanwe_tag_group_link` values('5','10');");
E_D("replace into `fanwe_tag_group_link` values('5','9');");
E_D("replace into `fanwe_tag_group_link` values('4','9');");
E_D("replace into `fanwe_tag_group_link` values('2','9');");
E_D("replace into `fanwe_tag_group_link` values('1','8');");
E_D("replace into `fanwe_tag_group_link` values('2','8');");
E_D("replace into `fanwe_tag_group_link` values('3','8');");
E_D("replace into `fanwe_tag_group_link` values('4','13');");
E_D("replace into `fanwe_tag_group_link` values('4','14');");
E_D("replace into `fanwe_tag_group_link` values('5','14');");
E_D("replace into `fanwe_tag_group_link` values('2','15');");
E_D("replace into `fanwe_tag_group_link` values('4','15');");
E_D("replace into `fanwe_tag_group_link` values('1','16');");
E_D("replace into `fanwe_tag_group_link` values('4','16');");
E_D("replace into `fanwe_tag_group_link` values('1','17');");
E_D("replace into `fanwe_tag_group_link` values('4','17');");

require("../../inc/footer.php");
?>