<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_topic_group_cate`;");
E_C("CREATE TABLE `fanwe_topic_group_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `group_count` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_topic_group_cate` values('1','时尚','1','','1','1');");
E_D("replace into `fanwe_topic_group_cate` values('2','美食','2','','0','1');");
E_D("replace into `fanwe_topic_group_cate` values('3','旅行','3','','1','1');");

require("../../inc/footer.php");
?>