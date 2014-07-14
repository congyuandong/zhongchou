<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_topic_tag`;");
E_C("CREATE TABLE `fanwe_topic_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '是否推荐',
  `count` int(11) NOT NULL COMMENT '是否为预设标签',
  `is_preset` tinyint(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_topic_tag` values('1','电影','1','2','1','','0');");
E_D("replace into `fanwe_topic_tag` values('2','自助游','1','0','1','','0');");
E_D("replace into `fanwe_topic_tag` values('3','闽菜','1','0','1','','0');");
E_D("replace into `fanwe_topic_tag` values('4','川菜','1','0','1','','0');");
E_D("replace into `fanwe_topic_tag` values('5','咖啡','1','0','1','#fff100','0');");
E_D("replace into `fanwe_topic_tag` values('6','牛排','1','0','1','#a1410d','0');");
E_D("replace into `fanwe_topic_tag` values('7','包包','1','0','0','#ed008c','0');");
E_D("replace into `fanwe_topic_tag` values('8','复古','1','0','0','#a36209','0');");
E_D("replace into `fanwe_topic_tag` values('9','甜美','1','0','0','','0');");
E_D("replace into `fanwe_topic_tag` values('10','日系','1','0','0','#a4d49d','0');");
E_D("replace into `fanwe_topic_tag` values('11','欧美','1','0','0','#ee1d24','0');");

require("../../inc/footer.php");
?>