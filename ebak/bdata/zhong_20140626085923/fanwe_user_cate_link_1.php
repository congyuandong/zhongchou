<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_cate_link`;");
E_C("CREATE TABLE `fanwe_user_cate_link` (
  `user_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_cate_link` values('44','1');");
E_D("replace into `fanwe_user_cate_link` values('44','2');");
E_D("replace into `fanwe_user_cate_link` values('44','3');");
E_D("replace into `fanwe_user_cate_link` values('44','4');");
E_D("replace into `fanwe_user_cate_link` values('44','5');");
E_D("replace into `fanwe_user_cate_link` values('44','6');");
E_D("replace into `fanwe_user_cate_link` values('44','7');");

require("../../inc/footer.php");
?>