<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_event_cate`;");
E_C("CREATE TABLE `fanwe_event_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_event_cate` values('1','电影','1','1','0');");
E_D("replace into `fanwe_event_cate` values('2','讲座','1','2','0');");
E_D("replace into `fanwe_event_cate` values('3','试吃','1','3','1');");
E_D("replace into `fanwe_event_cate` values('4','交友','1','4','0');");
E_D("replace into `fanwe_event_cate` values('5','旅游','1','5','0');");

require("../../inc/footer.php");
?>