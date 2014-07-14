<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_comment`;");
E_C("CREATE TABLE `fanwe_deal_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL COMMENT '?????????ID',
  `deal_user_id` int(11) NOT NULL COMMENT '??????????ID',
  `reply_user_id` int(11) NOT NULL COMMENT '????????????????ID',
  `deal_user_name` varchar(255) NOT NULL,
  `reply_user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`),
  KEY `log_id` (`log_id`),
  KEY `pid` (`pid`),
  KEY `deal_user_id` (`deal_user_id`),
  KEY `reply_user_id` (`reply_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_comment` values('170','55','加油哦！','18','1352229601','26','fzmatthew','0','17','0','fanwe','');");
E_D("replace into `fanwe_deal_comment` values('171','56','感谢支持！！','18','1352230363','27','fzmatthew','0','18','0','fzmatthew','');");
E_D("replace into `fanwe_deal_comment` values('172','57','好好加油！','18','1352230882','28','fzmatthew','0','17','0','fanwe','');");
E_D("replace into `fanwe_deal_comment` values('173','57','回复 fzmatthew:一定会的。','17','1352230924','28','fanwe','172','17','18','fanwe','fzmatthew');");
E_D("replace into `fanwe_deal_comment` values('174','58','感谢','17','1352231585','29','fanwe','0','17','0','fanwe','');");
E_D("replace into `fanwe_deal_comment` values('175','58','感谢大家的支持','17','1352231787','0','fanwe','0','17','0','fanwe','');");

require("../../inc/footer.php");
?>