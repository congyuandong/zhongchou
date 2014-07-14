<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_filter`;");
E_C("CREATE TABLE `fanwe_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filter_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `filter_name_idx` (`name`),
  KEY `filter_group_id` (`filter_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_filter` values('19','纯绵','7');");
E_D("replace into `fanwe_filter` values('20','大码','8');");
E_D("replace into `fanwe_filter` values('21','中码','8');");
E_D("replace into `fanwe_filter` values('22','均码','8');");
E_D("replace into `fanwe_filter` values('23','红色','9');");
E_D("replace into `fanwe_filter` values('24','常规毛线','7');");
E_D("replace into `fanwe_filter` values('25','小码','8');");
E_D("replace into `fanwe_filter` values('26','黑色','9');");
E_D("replace into `fanwe_filter` values('27','羽绒','7');");
E_D("replace into `fanwe_filter` values('28','洋紫','9');");
E_D("replace into `fanwe_filter` values('29','玫红','9');");
E_D("replace into `fanwe_filter` values('30','北极蓝','9');");
E_D("replace into `fanwe_filter` values('31','尼绒','7');");
E_D("replace into `fanwe_filter` values('32','驼色','9');");
E_D("replace into `fanwe_filter` values('33','翡翠绿','9');");
E_D("replace into `fanwe_filter` values('34','黑白格','9');");
E_D("replace into `fanwe_filter` values('35','红黑格','9');");
E_D("replace into `fanwe_filter` values('36','紫色','9');");
E_D("replace into `fanwe_filter` values('37','超大码','8');");

require("../../inc/footer.php");
?>