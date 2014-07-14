<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_nav`;");
E_C("CREATE TABLE `fanwe_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `u_module` varchar(255) NOT NULL,
  `u_action` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_nav` values('42','首页','','0','1','1','index','','0','');");
E_D("replace into `fanwe_nav` values('47','经典项目','','0','3','1','deals','index','0','r=classic');");
E_D("replace into `fanwe_nav` values('46','所有项目','','0','2','1','deals','index','0','');");
E_D("replace into `fanwe_nav` values('48','最新动态','','0','4','1','news','index','0','');");

require("../../inc/footer.php");
?>