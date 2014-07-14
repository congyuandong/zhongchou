-- fanwe SQL Dump Program
-- Microsoft-IIS/6.0
-- 
-- DATE : 2014-06-26 16:58:35
-- MYSQL SERVER VERSION : 5.1.63-community
-- PHP VERSION : isapi
-- Vol : 6


DROP TABLE IF EXISTS `%DB_PREFIX%topic_title_cate_link`;
CREATE TABLE `%DB_PREFIX%topic_title_cate_link` (
  `title_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`title_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_title_cate_link` VALUES ('1','2');
INSERT INTO `%DB_PREFIX%topic_title_cate_link` VALUES ('2','2');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_vote_log`;
CREATE TABLE `%DB_PREFIX%topic_vote_log` (
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `vote_count` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%urls`;
CREATE TABLE `%DB_PREFIX%urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%user`;
CREATE TABLE `%DB_PREFIX%user` (
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user` VALUES ('17','fanwe','6714ccb93be0fda4e51f206b91b46358','1352227130','1352227130','1','97139915@qq.com','1200.0000','1352232219','127.0.0.1','福建','福州','','1','3','1','1','0','方维众筹 - http://zc.fanwe.cn','','','','','','','','','','','','');
INSERT INTO `%DB_PREFIX%user` VALUES ('18','fzmatthew','6714ccb93be0fda4e51f206b91b46358','1352229180','1352229180','1','fanwe@fanwe.com','980.0000','1352246617','127.0.0.1','北京','东城区','','1','1','3','1','0','爱旅行的猫，生活在路上','','','','','','','','','','','','');
INSERT INTO `%DB_PREFIX%user` VALUES ('19','test','098f6bcd4621d373cade4e832627b4f6','1352230142','1352230142','1','test@test.com','0.0000','1352232937','127.0.0.1','广东','江门','','0','0','10','0','0','','','','','','','','','','','','','');
INSERT INTO `%DB_PREFIX%user` VALUES ('20','maomao','c2fe59547322a4bb7db612af5dae1281','1380612008','1380612008','1','125501710@qq.com','0.0000','1380612008','127.0.0.1','','','','0','0','0','0','0','','','','','','','','','','','','','');
INSERT INTO `%DB_PREFIX%user` VALUES ('22','蜡笔源码','e10adc3949ba59abbe56e057f20f883e','1403635149','1403635149','1','as21231@qq.com','999997000.0000','1403638382','61.188.207.10','','','','-1','0','1','0','0','','','','','','','','','','','','','');
INSERT INTO `%DB_PREFIX%user` VALUES ('23','130558','02c75fb22c75b23dc963c7eb91a062cc','1403672100','1403672100','1','8979879@qq.com','0.0000','1403672100','112.5.237.172','','','','0','0','0','0','0','','','','','','','','','','','','','');
DROP TABLE IF EXISTS `%DB_PREFIX%user_active_log`;
CREATE TABLE `%DB_PREFIX%user_active_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `money` double(11,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('1','44','1331938079','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('2','46','1331938195','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('3','46','1331938209','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('4','44','1331938361','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('5','44','1331938417','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('6','44','1331938485','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('7','44','1331938803','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('8','44','1331938904','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('9','44','1331938957','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('10','44','1331939026','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('11','44','1331939071','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('12','44','1331939121','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('13','44','1333241498','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('14','44','1333241553','10','0','0.0000');
INSERT INTO `%DB_PREFIX%user_active_log` VALUES ('15','44','1333241576','10','0','0.0000');
DROP TABLE IF EXISTS `%DB_PREFIX%user_auth`;
CREATE TABLE `%DB_PREFIX%user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('1','44','group','del','1');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('2','44','group','replydel','1');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('3','44','group','settop','1');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('4','44','group','setbest','1');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('5','44','group','setmemo','1');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('6','44','group','del','2');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('7','44','group','replydel','2');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('8','44','group','settop','2');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('9','44','group','setbest','2');
INSERT INTO `%DB_PREFIX%user_auth` VALUES ('10','44','group','setmemo','2');
DROP TABLE IF EXISTS `%DB_PREFIX%user_cate_link`;
CREATE TABLE `%DB_PREFIX%user_cate_link` (
  `user_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','1');
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','2');
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','3');
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','4');
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','5');
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','6');
INSERT INTO `%DB_PREFIX%user_cate_link` VALUES ('44','7');
DROP TABLE IF EXISTS `%DB_PREFIX%user_consignee`;
CREATE TABLE `%DB_PREFIX%user_consignee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user_consignee` VALUES ('18','18','福建','福州','福建福州台江区工业路博美诗邦','13333333333','350000','方维');
INSERT INTO `%DB_PREFIX%user_consignee` VALUES ('19','17','福建','福州','方维方维方维方维方维','14444444444','22222','方维');
INSERT INTO `%DB_PREFIX%user_consignee` VALUES ('20','19','湖北','襄樊','test','13344455555','test','test');
INSERT INTO `%DB_PREFIX%user_consignee` VALUES ('21','22','甘肃','兰州','啊实打实大','13800138056','564121','年十大');
DROP TABLE IF EXISTS `%DB_PREFIX%user_deal_notify`;
CREATE TABLE `%DB_PREFIX%user_deal_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deal_id_user_id` (`user_id`,`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user_deal_notify` VALUES ('20','18','55','1352229388');
INSERT INTO `%DB_PREFIX%user_deal_notify` VALUES ('21','22','57','1403635246');
DROP TABLE IF EXISTS `%DB_PREFIX%user_extend`;
CREATE TABLE `%DB_PREFIX%user_extend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%user_field`;
CREATE TABLE `%DB_PREFIX%user_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) NOT NULL,
  `field_show_name` varchar(255) NOT NULL,
  `input_type` tinyint(1) NOT NULL,
  `value_scope` text NOT NULL,
  `is_must` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_field_name` (`field_name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%user_focus`;
CREATE TABLE `%DB_PREFIX%user_focus` (
  `focus_user_id` int(11) NOT NULL COMMENT '关注人ID',
  `focused_user_id` int(11) NOT NULL COMMENT '被关注人ID',
  `focus_user_name` varchar(255) NOT NULL,
  `focused_user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`focus_user_id`,`focused_user_id`),
  KEY `focus_user_id` (`focus_user_id`),
  KEY `focused_user_id` (`focused_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('42','41','fz云淡风轻','fanwe');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('45','44','fz云淡风轻','fanwe');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('46','44','fzmatthew','fanwe');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('46','45','fzmatthew','fz云淡风轻');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('47','44','方维o2o','fanwe');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('47','45','方维o2o','fz云淡风轻');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('47','46','方维o2o','fzmatthew');
INSERT INTO `%DB_PREFIX%user_focus` VALUES ('45','46','fz云淡风轻','fzmatthew');
DROP TABLE IF EXISTS `%DB_PREFIX%user_frequented`;
CREATE TABLE `%DB_PREFIX%user_frequented` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0' COMMENT '员会ID',
  `title` varchar(50) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `xpoint` float(12,6) DEFAULT '0.000000' COMMENT 'longitude',
  `ypoint` float(12,6) DEFAULT '0.000000' COMMENT 'latitude',
  `latitude_top` float(12,6) DEFAULT NULL,
  `latitude_bottom` float(12,6) DEFAULT NULL,
  `longitude_left` float(12,6) DEFAULT NULL,
  `longitude_right` float(12,6) DEFAULT NULL,
  `zoom_level` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%user_group`;
CREATE TABLE `%DB_PREFIX%user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `discount` double(20,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_group` VALUES ('1','普通会员','0','1.0000');
DROP TABLE IF EXISTS `%DB_PREFIX%user_level`;
CREATE TABLE `%DB_PREFIX%user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk` (`point`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_level` VALUES ('1','新手上路','0');
INSERT INTO `%DB_PREFIX%user_level` VALUES ('2','初入江湖','100');
DROP TABLE IF EXISTS `%DB_PREFIX%user_log`;
CREATE TABLE `%DB_PREFIX%user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user_log` VALUES ('114','管理员测试充值','1352229203','1','1000.0000','18');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('115','支持原创DIY桌面游戏《功夫》《黄金密码》期待您的支持项目支付','1352229388','1','-20.0000','18');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('116','管理员测试充值','1352229989','1','2000.0000','17');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('117','支持拥有自己的咖啡馆项目支付','1352230101','1','-500.0000','17');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('118','test','1352230213','1','5000.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('119','支持拥有自己的咖啡馆项目支付','1352230228','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('120','支持拥有自己的咖啡馆项目支付','1352230232','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('121','支持拥有自己的咖啡馆项目支付','1352230237','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('122','支持拥有自己的咖啡馆项目支付','1352230240','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('123','支持拥有自己的咖啡馆项目支付','1352230243','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('124','支持拥有自己的咖啡馆项目支付','1352230247','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('125','支持拥有自己的咖啡馆项目支付','1352230268','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('126','支持拥有自己的咖啡馆项目支付','1352230270','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('127','支持拥有自己的咖啡馆项目支付','1352230293','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('128','继续测试','1352231510','1','5000.0000','18');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('129','支持流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！项目支付','1352231539','1','-2000.0000','18');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('130','支持流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！项目支付','1352231631','1','-500.0000','19');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('131','支持拥有自己的咖啡馆项目支付','1352231671','1','-300.0000','17');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('132','支持流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！项目支付','1352231704','1','-3000.0000','18');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('133','管理员操作','1403635158','1','1000000000.0000','22');
INSERT INTO `%DB_PREFIX%user_log` VALUES ('134','支持拍微电影《转角 爱》项目支付','1403635246','1','-3000.0000','22');
DROP TABLE IF EXISTS `%DB_PREFIX%user_medal`;
CREATE TABLE `%DB_PREFIX%user_medal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `medal_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_medal` VALUES ('1','44','1','组长勋章','1331939602','0','./public/attachment/201203/17/15/4f6438e27aa65.png');
DROP TABLE IF EXISTS `%DB_PREFIX%user_message`;
CREATE TABLE `%DB_PREFIX%user_message` (
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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user_message` VALUES ('47','1352230383','感谢支持','18','19','18','19','fzmatthew','test','fzmatthew','test','outbox','1');
INSERT INTO `%DB_PREFIX%user_message` VALUES ('48','1352230383','感谢支持','19','18','18','19','test','fzmatthew','fzmatthew','test','inbox','0');
INSERT INTO `%DB_PREFIX%user_message` VALUES ('49','1352230403','感谢您的支持!!!','18','17','18','17','fzmatthew','fanwe','fzmatthew','fanwe','outbox','1');
INSERT INTO `%DB_PREFIX%user_message` VALUES ('50','1352230403','感谢您的支持!!!','17','18','18','17','fanwe','fzmatthew','fzmatthew','fanwe','inbox','0');
INSERT INTO `%DB_PREFIX%user_message` VALUES ('51','1352230499','谢谢!!!','17','18','17','18','fanwe','fzmatthew','fanwe','fzmatthew','outbox','1');
INSERT INTO `%DB_PREFIX%user_message` VALUES ('52','1352230499','谢谢!!!','18','17','17','18','fzmatthew','fanwe','fanwe','fzmatthew','inbox','0');
DROP TABLE IF EXISTS `%DB_PREFIX%user_notify`;
CREATE TABLE `%DB_PREFIX%user_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `url_route` varchar(255) NOT NULL,
  `url_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user_notify` VALUES ('69','17','拥有自己的咖啡馆 在 2012-11-07 11:31:10 成功筹到 ?5,000.00','1352230271','0','deal#show','id=56');
INSERT INTO `%DB_PREFIX%user_notify` VALUES ('70','19','拥有自己的咖啡馆 在 2012-11-07 11:31:10 成功筹到 ?5,000.00','1352230271','0','deal#show','id=56');
INSERT INTO `%DB_PREFIX%user_notify` VALUES ('71','17','您支持的项目拥有自己的咖啡馆回报已发放','1352230424','0','account#view_order','id=66');
INSERT INTO `%DB_PREFIX%user_notify` VALUES ('72','18','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！ 在 2012-11-07 11:55:04 成功筹到 ?3,000.00','1352231704','0','deal#show','id=58');
DROP TABLE IF EXISTS `%DB_PREFIX%user_refund`;
CREATE TABLE `%DB_PREFIX%user_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` double(20,4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '???????????',
  `reply` text NOT NULL COMMENT '??????????',
  `is_pay` tinyint(1) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `memo` text NOT NULL COMMENT '???????',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `%DB_PREFIX%user_sign_log`;
CREATE TABLE `%DB_PREFIX%user_sign_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sign_date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%user_topic_group`;
CREATE TABLE `%DB_PREFIX%user_topic_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0:普通组员 1:管理员',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk` (`group_id`,`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_topic_group` VALUES ('1','2','46','1331938112','0');
INSERT INTO `%DB_PREFIX%user_topic_group` VALUES ('2','1','46','1331938120','0');
DROP TABLE IF EXISTS `%DB_PREFIX%user_weibo`;
CREATE TABLE `%DB_PREFIX%user_weibo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `weibo_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%user_weibo` VALUES ('55','17','http://weibo.com/fzmatthew');
DROP TABLE IF EXISTS `%DB_PREFIX%user_x_y_point`;
CREATE TABLE `%DB_PREFIX%user_x_y_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `xpoint` float(14,6) NOT NULL DEFAULT '0.000000',
  `ypoint` float(14,6) NOT NULL DEFAULT '0.000000',
  `locate_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%user_x_y_point` VALUES ('1','44','119.306938','26.069746','1330712776');
DROP TABLE IF EXISTS `%DB_PREFIX%vote`;
CREATE TABLE `%DB_PREFIX%vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%vote` VALUES ('4','您从哪知道我们的系统','0','0','1','1','您从哪知道我们的系统');
DROP TABLE IF EXISTS `%DB_PREFIX%vote_ask`;
CREATE TABLE `%DB_PREFIX%vote_ask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `val_scope` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%vote_ask` VALUES ('13','报纸','1','0','4','报纸1,报纸2,报纸3');
INSERT INTO `%DB_PREFIX%vote_ask` VALUES ('12','网站','1','0','4','网站1,网站2,网站3');
DROP TABLE IF EXISTS `%DB_PREFIX%vote_result`;
CREATE TABLE `%DB_PREFIX%vote_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `vote_ask_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%weight_unit`;
CREATE TABLE `%DB_PREFIX%weight_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` decimal(20,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%weight_unit` VALUES ('1','克','1.0000');
DROP TABLE IF EXISTS `%DB_PREFIX%youhui`;
CREATE TABLE `%DB_PREFIX%youhui` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deal_cate_id` int(11) NOT NULL,
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `send_type` tinyint(1) NOT NULL COMMENT '0:普通券 1:验证券 2:需预订验证券',
  `total_num` int(11) NOT NULL COMMENT '总条数',
  `sms_count` int(11) NOT NULL,
  `print_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sms_content` varchar(255) NOT NULL,
  `is_sms` tinyint(1) NOT NULL,
  `is_print` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否打印:1不允许;0:允许',
  `brief` text NOT NULL COMMENT '简介',
  `youhui_type` tinyint(1) NOT NULL COMMENT '减免0/折扣1',
  `total_fee` int(11) NOT NULL,
  `deal_cate_match_row` text NOT NULL,
  `deal_cate_match` text NOT NULL,
  `locate_match_row` text NOT NULL,
  `locate_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `name_match` text NOT NULL,
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '用户发布的',
  `supplier_id` int(11) NOT NULL COMMENT '商户',
  `create_time` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `pub_by` tinyint(1) NOT NULL COMMENT '0:管理员 1:会员 2:商家',
  `is_recommend` tinyint(1) NOT NULL,
  `list_brief` text NOT NULL,
  `description` text NOT NULL,
  `index_img` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_3_w` int(11) NOT NULL,
  `image_3_h` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `publish_wait` tinyint(1) NOT NULL,
  `return_money` decimal(11,4) NOT NULL,
  `return_score` int(11) NOT NULL,
  `return_point` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `cate_id` (`deal_cate_id`) USING BTREE,
  FULLTEXT KEY `f_t` (`deal_cate_match`,`name_match`,`locate_match`),
  FULLTEXT KEY `cate_match` (`deal_cate_match`),
  FULLTEXT KEY `name_match` (`name_match`),
  FULLTEXT KEY `locate_match` (`locate_match`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%youhui_location_link`;
CREATE TABLE `%DB_PREFIX%youhui_location_link` (
  `youhui_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`youhui_id`,`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('12','19');
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('13','20');
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('14','18');
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('15','14');
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('16','18');
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('17','18');
INSERT INTO `%DB_PREFIX%youhui_location_link` VALUES ('18','18');
