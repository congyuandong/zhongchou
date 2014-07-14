<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_msg_box`;");
E_C("CREATE TABLE `fanwe_msg_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `system_msg_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `group_key` varchar(200) NOT NULL,
  `is_notice` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_msg_box` values('1','图片很美分享被置顶+10经验','图片很美分享被置顶+10经验','44','44','1331937858','1','0','0','0','44_44_0_1','1');");
E_D("replace into `fanwe_msg_box` values('2','您已经成为初入江湖','恭喜您，您已经成为初入江湖。','0','44','1331939170','1','0','0','0','0_44_0_2','1');");

require("../../inc/footer.php");
?>