<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_user`;");
E_C("CREATE TABLE `fanwe_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `money` double(20,4) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(50) NOT NULL,
  `province` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `password_verify` varchar(255) NOT NULL COMMENT '??????????????',
  `sex` tinyint(1) NOT NULL COMMENT '???',
  `build_count` int(11) NOT NULL COMMENT '???????????',
  `support_count` int(11) NOT NULL COMMENT '?????????',
  `focus_count` int(11) NOT NULL COMMENT '??????????',
  `integrate_id` int(11) NOT NULL,
  `intro` text NOT NULL COMMENT '???????',
  `ex_real_name` varchar(255) NOT NULL COMMENT '?????????????',
  `ex_account_info` text NOT NULL COMMENT '???????????',
  `ex_contact` text NOT NULL COMMENT '??????',
  `code` varchar(255) NOT NULL,
  `sina_id` varchar(255) NOT NULL,
  `sina_token` varchar(255) NOT NULL,
  `sina_secret` varchar(255) NOT NULL,
  `sina_url` varchar(255) NOT NULL,
  `tencent_id` varchar(255) NOT NULL,
  `tencent_token` varchar(255) NOT NULL,
  `tencent_secret` varchar(255) NOT NULL,
  `tencent_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `is_effect` (`is_effect`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_user` values('17','fanwe','6714ccb93be0fda4e51f206b91b46358','1352227130','1352227130','1','97139915@qq.com','1200.0000','1352232219','127.0.0.1','福建','福州','','1','3','1','1','0','方维众筹 - http://zc.fanwe.cn','','','','','','','','','','','','');");
E_D("replace into `fanwe_user` values('18','fzmatthew','6714ccb93be0fda4e51f206b91b46358','1352229180','1352229180','1','fanwe@fanwe.com','980.0000','1352246617','127.0.0.1','北京','东城区','','1','1','3','1','0','爱旅行的猫，生活在路上','','','','','','','','','','','','');");
E_D("replace into `fanwe_user` values('19','test','098f6bcd4621d373cade4e832627b4f6','1352230142','1352230142','1','test@test.com','0.0000','1352232937','127.0.0.1','广东','江门','','0','0','10','0','0','','','','','','','','','','','','','');");
E_D("replace into `fanwe_user` values('20','maomao','c2fe59547322a4bb7db612af5dae1281','1380612008','1380612008','1','125501710@qq.com','0.0000','1380612008','127.0.0.1','','','','0','0','0','0','0','','','','','','','','','','','','','');");
E_D("replace into `fanwe_user` values('22','蜡笔源码','e10adc3949ba59abbe56e057f20f883e','1403635149','1403635149','1','as21231@qq.com','999997000.0000','1403638382','61.188.207.10','','','','-1','0','1','0','0','','','','','','','','','','','','','');");
E_D("replace into `fanwe_user` values('23','130558','02c75fb22c75b23dc963c7eb91a062cc','1403672100','1403672100','1','8979879@qq.com','0.0000','1403672100','112.5.237.172','','','','0','0','0','0','0','','','','','','','','','','','','','');");

require("../../inc/footer.php");
?>