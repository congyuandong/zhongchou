<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_user_message`;");
E_C("CREATE TABLE `fanwe_user_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '???????????ID',
  `dest_user_id` int(11) NOT NULL COMMENT '????????ID??????user_id??????????ID????????????????ID??',
  `send_user_id` int(11) NOT NULL COMMENT '??????ID',
  `receive_user_id` int(11) NOT NULL COMMENT '?????ID',
  `user_name` varchar(255) NOT NULL,
  `dest_user_name` varchar(255) NOT NULL,
  `send_user_name` varchar(255) NOT NULL,
  `receive_user_name` varchar(255) NOT NULL,
  `message_type` enum('inbox','outbox') NOT NULL COMMENT '?????inbox(???) outbox(????)',
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_user_message` values('47','1352230383','感谢支持','18','19','18','19','fzmatthew','test','fzmatthew','test','outbox','1');");
E_D("replace into `fanwe_user_message` values('48','1352230383','感谢支持','19','18','18','19','test','fzmatthew','fzmatthew','test','inbox','0');");
E_D("replace into `fanwe_user_message` values('49','1352230403','感谢您的支持!!!','18','17','18','17','fzmatthew','fanwe','fzmatthew','fanwe','outbox','1');");
E_D("replace into `fanwe_user_message` values('50','1352230403','感谢您的支持!!!','17','18','18','17','fanwe','fzmatthew','fzmatthew','fanwe','inbox','0');");
E_D("replace into `fanwe_user_message` values('51','1352230499','谢谢!!!','17','18','17','18','fanwe','fzmatthew','fanwe','fzmatthew','outbox','1');");
E_D("replace into `fanwe_user_message` values('52','1352230499','谢谢!!!','18','17','17','18','fzmatthew','fanwe','fanwe','fzmatthew','inbox','0');");

require("../../inc/footer.php");
?>