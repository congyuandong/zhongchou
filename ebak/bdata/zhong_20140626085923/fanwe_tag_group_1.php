<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_tag_group`;");
E_C("CREATE TABLE `fanwe_tag_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `preset` text NOT NULL,
  `sort` int(11) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `allow_dp` tinyint(1) NOT NULL,
  `allow_search` tinyint(1) NOT NULL,
  `allow_vote` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
E_D("replace into `fanwe_tag_group` values('1','环境','','100','','','1','1','0');");
E_D("replace into `fanwe_tag_group` values('2','交通','','100','','','1','1','0');");
E_D("replace into `fanwe_tag_group` values('3','口味','','100','','','1','1','0');");
E_D("replace into `fanwe_tag_group` values('4','服务','很好 一般 很周到','100','','','1','1','0');");
E_D("replace into `fanwe_tag_group` values('5','停车','','100','','','1','1','0');");

require("../../inc/footer.php");
?>