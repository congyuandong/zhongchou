<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_images_group`;");
E_C("CREATE TABLE `fanwe_images_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_images_group` values('1','店面','100');");
E_D("replace into `fanwe_images_group` values('2','内部环境','100');");
E_D("replace into `fanwe_images_group` values('3','菜式','100');");

require("../../inc/footer.php");
?>