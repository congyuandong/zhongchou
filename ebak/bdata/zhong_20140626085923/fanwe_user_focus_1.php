<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_focus`;");
E_C("CREATE TABLE `fanwe_user_focus` (
  `focus_user_id` int(11) NOT NULL COMMENT '关注人ID',
  `focused_user_id` int(11) NOT NULL COMMENT '被关注人ID',
  `focus_user_name` varchar(255) NOT NULL,
  `focused_user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`focus_user_id`,`focused_user_id`),
  KEY `focus_user_id` (`focus_user_id`),
  KEY `focused_user_id` (`focused_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_focus` values('42','41','fz云淡风轻','fanwe');");
E_D("replace into `fanwe_user_focus` values('45','44','fz云淡风轻','fanwe');");
E_D("replace into `fanwe_user_focus` values('46','44','fzmatthew','fanwe');");
E_D("replace into `fanwe_user_focus` values('46','45','fzmatthew','fz云淡风轻');");
E_D("replace into `fanwe_user_focus` values('47','44','方维o2o','fanwe');");
E_D("replace into `fanwe_user_focus` values('47','45','方维o2o','fz云淡风轻');");
E_D("replace into `fanwe_user_focus` values('47','46','方维o2o','fzmatthew');");
E_D("replace into `fanwe_user_focus` values('45','46','fz云淡风轻','fzmatthew');");

require("../../inc/footer.php");
?>