<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_auth`;");
E_C("CREATE TABLE `fanwe_user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_auth` values('1','44','group','del','1');");
E_D("replace into `fanwe_user_auth` values('2','44','group','replydel','1');");
E_D("replace into `fanwe_user_auth` values('3','44','group','settop','1');");
E_D("replace into `fanwe_user_auth` values('4','44','group','setbest','1');");
E_D("replace into `fanwe_user_auth` values('5','44','group','setmemo','1');");
E_D("replace into `fanwe_user_auth` values('6','44','group','del','2');");
E_D("replace into `fanwe_user_auth` values('7','44','group','replydel','2');");
E_D("replace into `fanwe_user_auth` values('8','44','group','settop','2');");
E_D("replace into `fanwe_user_auth` values('9','44','group','setbest','2');");
E_D("replace into `fanwe_user_auth` values('10','44','group','setmemo','2');");

require("../../inc/footer.php");
?>