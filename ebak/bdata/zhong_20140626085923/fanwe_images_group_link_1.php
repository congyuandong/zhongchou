<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_images_group_link`;");
E_C("CREATE TABLE `fanwe_images_group_link` (
  `images_group_id` int(11) NOT NULL COMMENT '商户子类点评评分分组ID fanwe_merchant_type_point_group',
  `category_id` int(11) NOT NULL,
  KEY `images_group_id` (`images_group_id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_images_group_link` values('2','11');");
E_D("replace into `fanwe_images_group_link` values('1','10');");
E_D("replace into `fanwe_images_group_link` values('2','10');");
E_D("replace into `fanwe_images_group_link` values('1','9');");
E_D("replace into `fanwe_images_group_link` values('1','8');");
E_D("replace into `fanwe_images_group_link` values('2','8');");
E_D("replace into `fanwe_images_group_link` values('3','8');");
E_D("replace into `fanwe_images_group_link` values('2','14');");
E_D("replace into `fanwe_images_group_link` values('1','15');");
E_D("replace into `fanwe_images_group_link` values('2','16');");
E_D("replace into `fanwe_images_group_link` values('1','17');");
E_D("replace into `fanwe_images_group_link` values('2','17');");

require("../../inc/footer.php");
?>