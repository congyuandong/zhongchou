<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_user_active_log`;");
E_C("CREATE TABLE `fanwe_user_active_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `money` double(11,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_user_active_log` values('1','44','1331938079','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('2','46','1331938195','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('3','46','1331938209','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('4','44','1331938361','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('5','44','1331938417','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('6','44','1331938485','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('7','44','1331938803','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('8','44','1331938904','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('9','44','1331938957','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('10','44','1331939026','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('11','44','1331939071','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('12','44','1331939121','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('13','44','1333241498','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('14','44','1333241553','10','0','0.0000');");
E_D("replace into `fanwe_user_active_log` values('15','44','1333241576','10','0','0.0000');");

require("../../inc/footer.php");
?>