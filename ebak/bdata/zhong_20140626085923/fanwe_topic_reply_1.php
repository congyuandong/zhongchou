<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_topic_reply`;");
E_C("CREATE TABLE `fanwe_topic_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `reply_user_id` int(11) NOT NULL,
  `reply_user_name` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reply_id` (`reply_id`),
  KEY `topic_id` (`topic_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_topic_reply` values('38','137','[尴尬][尴尬]','44','fanwe','0','0','','1328312626','1','0');");
E_D("replace into `fanwe_topic_reply` values('39','137','回复@fanwe:[尴尬][尴尬][尴尬]','46','fzmatthew','38','44','fanwe','1328312707','1','0');");
E_D("replace into `fanwe_topic_reply` values('40','139','看起来很好吃[示爱][示爱]','45','fz云淡风轻','0','0','','1328312823','1','0');");
E_D("replace into `fanwe_topic_reply` values('41','154','相当美','46','fzmatthew','0','0','','1328315861','1','0');");

require("../../inc/footer.php");
?>