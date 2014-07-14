-- fanwe SQL Dump Program
-- Microsoft-IIS/6.0
-- 
-- DATE : 2014-06-26 16:58:18
-- MYSQL SERVER VERSION : 5.1.63-community
-- PHP VERSION : isapi
-- Vol : 1


DROP TABLE IF EXISTS `%DB_PREFIX%admin`;
CREATE TABLE `%DB_PREFIX%admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_adm_name` (`adm_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','1','0','4','1403744203','58.251.146.202');
DROP TABLE IF EXISTS `%DB_PREFIX%adv`;
CREATE TABLE `%DB_PREFIX%adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tmpl` varchar(255) NOT NULL,
  `adv_id` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_table` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tmpl` (`tmpl`),
  KEY `adv_id` (`adv_id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_table` (`rel_table`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `%DB_PREFIX%api_log`;
CREATE TABLE `%DB_PREFIX%api_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act` varchar(30) NOT NULL,
  `api` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%api_login`;
CREATE TABLE `%DB_PREFIX%api_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bicon` varchar(255) NOT NULL,
  `is_weibo` tinyint(1) NOT NULL,
  `dispname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%api_login` VALUES ('13','新浪api登录接口','a:3:{s:7:\"app_key\";s:0:\"\";s:10:\"app_secret\";s:0:\"\";s:7:\"app_url\";s:0:\"\";}','Sina','./public/attachment/201210/13/17/50792e5bbc901.gif','./public/attachment/201210/13/16/5079277a72c9d.gif','1','新浪微博');
INSERT INTO `%DB_PREFIX%api_login` VALUES ('14','腾讯微博登录插件','a:3:{s:7:\"app_key\";s:0:\"\";s:10:\"app_secret\";s:0:\"\";s:7:\"app_url\";s:0:\"\";}','Tencent','./public/attachment/201211/06/11/509882825c183.png','./public/attachment/201211/06/11/50988287b1890.png','1','腾讯微博');
DROP TABLE IF EXISTS `%DB_PREFIX%apns_device_history`;
CREATE TABLE `%DB_PREFIX%apns_device_history` (
  `pid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `appversion` varchar(25) DEFAULT NULL,
  `deviceuid` char(40) NOT NULL,
  `devicetoken` char(64) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `devicemodel` varchar(100) NOT NULL,
  `deviceversion` varchar(25) NOT NULL,
  `pushbadge` enum('disabled','enabled') DEFAULT 'disabled',
  `pushalert` enum('disabled','enabled') DEFAULT 'disabled',
  `pushsound` enum('disabled','enabled') DEFAULT 'disabled',
  `development` enum('production','sandbox') CHARACTER SET latin1 NOT NULL DEFAULT 'production',
  `status` enum('active','uninstalled') NOT NULL DEFAULT 'active',
  `archived` datetime NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `clientid` (`clientid`),
  KEY `devicetoken` (`devicetoken`),
  KEY `devicename` (`devicename`),
  KEY `devicemodel` (`devicemodel`),
  KEY `deviceversion` (`deviceversion`),
  KEY `pushbadge` (`pushbadge`),
  KEY `pushalert` (`pushalert`),
  KEY `pushsound` (`pushsound`),
  KEY `development` (`development`),
  KEY `status` (`status`),
  KEY `appname` (`appname`),
  KEY `appversion` (`appversion`),
  KEY `deviceuid` (`deviceuid`),
  KEY `archived` (`archived`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Store unique device history';
DROP TABLE IF EXISTS `%DB_PREFIX%apns_devices`;
CREATE TABLE `%DB_PREFIX%apns_devices` (
  `pid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `appversion` varchar(25) DEFAULT NULL,
  `deviceuid` char(40) NOT NULL,
  `devicetoken` char(64) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `devicemodel` varchar(100) NOT NULL,
  `deviceversion` varchar(25) NOT NULL,
  `pushbadge` enum('disabled','enabled') DEFAULT 'disabled',
  `pushalert` enum('disabled','enabled') DEFAULT 'disabled',
  `pushsound` enum('disabled','enabled') DEFAULT 'disabled',
  `development` enum('production','sandbox') CHARACTER SET latin1 NOT NULL DEFAULT 'production',
  `status` enum('active','uninstalled') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `appname` (`appname`,`appversion`,`deviceuid`),
  KEY `clientid` (`clientid`),
  KEY `devicetoken` (`devicetoken`),
  KEY `devicename` (`devicename`),
  KEY `devicemodel` (`devicemodel`),
  KEY `deviceversion` (`deviceversion`),
  KEY `pushbadge` (`pushbadge`),
  KEY `pushalert` (`pushalert`),
  KEY `pushsound` (`pushsound`),
  KEY `development` (`development`),
  KEY `status` (`status`),
  KEY `created` (`created`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Store unique devices';
INSERT INTO `%DB_PREFIX%apns_devices` VALUES ('1','0','方维o2o','1.0','c1e34ff19505c5b11d876bdffb451aa8','6b2e73be2ec113452bc020ec7d05b6e1e0f09ed6ae95c6c7ec20bedd6ae3b21b','酷酷菜','iPhone','5.0.1','enabled','enabled','enabled','production','active','0000-00-00 00:00:00','0000-00-00 00:00:00');
DROP TABLE IF EXISTS `%DB_PREFIX%apns_logs`;
CREATE TABLE `%DB_PREFIX%apns_logs` (
  `pid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` varchar(64) NOT NULL,
  `fk_device` int(9) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `delivery` datetime NOT NULL,
  `status` enum('queued','delivered','failed') CHARACTER SET latin1 NOT NULL DEFAULT 'queued',
  `created` int(11) NOT NULL DEFAULT '0',
  `modified` int(11) NOT NULL DEFAULT '0',
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `clientid` (`clientid`),
  KEY `fk_device` (`fk_device`),
  KEY `status` (`status`),
  KEY `created` (`created`),
  KEY `modified` (`modified`),
  KEY `message` (`message`),
  KEY `delivery` (`delivery`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COMMENT='Messages to push to APNS';
DROP TABLE IF EXISTS `%DB_PREFIX%apns_messages`;
CREATE TABLE `%DB_PREFIX%apns_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  `user_names` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0:未发送 1:发送中 2:已发送',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%area`;
CREATE TABLE `%DB_PREFIX%area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%area` VALUES ('8','鼓楼区','15','1','0');
INSERT INTO `%DB_PREFIX%area` VALUES ('9','晋安区','15','2','0');
INSERT INTO `%DB_PREFIX%area` VALUES ('10','台江区','15','3','0');
INSERT INTO `%DB_PREFIX%area` VALUES ('11','仓山区','15','4','0');
INSERT INTO `%DB_PREFIX%area` VALUES ('12','马尾区','15','5','0');
INSERT INTO `%DB_PREFIX%area` VALUES ('13','五一广场','15','6','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('14','东街口','15','7','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('15','福州广场','15','8','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('16','省体育中心','15','9','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('17','西禅寺','15','10','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('18','社会主义学院','15','11','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('19','西洪路','15','12','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('20','屏山','15','13','8');
INSERT INTO `%DB_PREFIX%area` VALUES ('21','中亭街','15','14','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('22','六一中路','15','15','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('23','龙华大厦','15','16','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('24','时代名城','15','17','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('25','台江路','15','18','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('26','宝龙城市广场','15','19','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('27','万象城','15','20','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('28','桥亭','15','21','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('29','小桥头','15','22','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('30','交通路','15','23','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('31','中亭街','15','24','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('32','白马河','15','25','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('33','博美诗邦','15','26','10');
INSERT INTO `%DB_PREFIX%area` VALUES ('34','观海路','15','27','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('35','三叉街新村','15','28','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('36','北京金山','15','29','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('37','仓山镇','15','30','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('38','螺洲','15','31','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('39','三高路','15','32','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('40','下渡','15','33','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('41','工农路','15','34','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('42','首山路','15','35','11');
INSERT INTO `%DB_PREFIX%area` VALUES ('43','王庄新村','15','36','9');
INSERT INTO `%DB_PREFIX%area` VALUES ('44','岳峰路','15','37','9');
INSERT INTO `%DB_PREFIX%area` VALUES ('45','融侨东区','15','38','9');
INSERT INTO `%DB_PREFIX%area` VALUES ('46','五里亭','15','39','9');
INSERT INTO `%DB_PREFIX%area` VALUES ('47','五一新村','15','40','9');
INSERT INTO `%DB_PREFIX%area` VALUES ('48','福光路','15','41','9');
INSERT INTO `%DB_PREFIX%area` VALUES ('49','五里亭','15','42','9');
DROP TABLE IF EXISTS `%DB_PREFIX%article`;
CREATE TABLE `%DB_PREFIX%article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `add_admin_id` int(11) NOT NULL COMMENT '发布人',
  `is_effect` tinyint(4) NOT NULL,
  `rel_url` varchar(255) NOT NULL COMMENT '自动跳转的外链',
  `update_admin_id` int(11) NOT NULL COMMENT '更新人',
  `is_delete` tinyint(4) NOT NULL,
  `click_count` int(11) NOT NULL COMMENT '点击数',
  `sort` int(11) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `uname` varchar(255) NOT NULL,
  `notice_page` tinyint(1) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `create_time` (`create_time`),
  KEY `update_time` (`update_time`),
  KEY `click_count` (`click_count`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%article` VALUES ('20','关于我们','关于我们','11','0','1305160934','0','1','','0','0','18','11','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('37','岁末回馈5折原价1299正品七匹狼男装外套时尚中长装羽绒服701604','','18','1325451781','1325451781','0','1','u:shop|goods|id=48','0','0','1','27','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('38','老刘野生大鱼坊超值套餐','','18','1325451857','1325451857','0','1','u:tuan|deal|id=39','0','0','0','28','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('39','全场新品上市','','18','1325451918','1325451918','0','1','u:shop|rec#rnew','0','0','0','29','','','','new','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('40','优惠券频道 更多优惠精彩','','18','1325452086','1325452086','0','1','u:youhui|index','0','0','1','30','','','','youhui','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('27','免责条款','免责条款','19','1305160898','1305160898','0','1','','0','0','3','18','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('28','隐私保护','隐私保护','19','1305160911','1305160911','0','1','','0','0','4','19','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('29','咨询热点','咨询热点','19','1305160923','1305160923','0','1','','0','0','2','20','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('30','联系我们','联系我们','19','1305160934','1305160934','0','1','','0','0','30','21','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('31','公司简介','公司简介','19','1305160946','1305160946','0','1','','0','0','92','22','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('5','如何抽奖','如何抽奖','19','0','1305489528','0','1','','0','0','3','0','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('33','女装新品热卖中!','','18','1325451464','1325451573','0','1','u:shop|cate|id=30','0','0','2','23','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('6','加入我们','加入我们','11','0','1324319464','0','1','u:shop|user#register','0','0','22','2','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('7','开放API','','9','0','1324238746','0','1','u:tuan|dhapi','0','0','4','1','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('8','RSS订阅','','9','0','1324083243','0','1','u:tuan|rss','0','0','0','4','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('9','商家登录','','10','0','1324069250','0','1','u:tuan|coupon#supplier_login','0','0','0','5','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('10','友情链接','','10','0','1324083193','0','1','u:shop|link','0','0','0','6','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('34','品牌馆开张','','18','1325451633','1325451633','0','1','u:shop|brand','0','0','0','24','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('35','各种特价，抢到手软！','各种特价，抢到手软！','18','1325451669','1325451669','0','1','','0','0','0','25','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('36','# 5元奖励包装评论 5000万礼卡免费领','5元奖励包装评论 5000万礼卡免费领','18','1325451735','1325451735','0','1','','0','0','0','26','','','','','0','','');
INSERT INTO `%DB_PREFIX%article` VALUES ('41','2月情人密语之约“惠”生活指南！','','22','1329333829','1329333855','0','1','u:youhui|fcate','0','0','1','31','','','','','3','每周播报','情人节约会哪里走？丁丁优惠带您吃喝玩乐应有尽有，网罗沪上甜点热饮，休闲娱乐，“惠”生活的亲密爱人们，赶快点击进入挑选你的情人节行程吧！');
INSERT INTO `%DB_PREFIX%article` VALUES ('42','美罗城“因微爱情”主题活动开始啦！','','22','1329334475','1329334475','0','1','u:youhui|event','0','0','0','32','','','','','3','独家活动','2012年2月11日至3月14日，微博“微爱情@美罗城”情人节晒出爱的礼物或宣言，即有机会赢取价值20000元大奖“马尔代夫”双人游、奔驰情人节礼品。');
INSERT INTO `%DB_PREFIX%article` VALUES ('43','“爱”月情人节 找情侣送约会基金','','22','1329334503','1329334503','0','1','u:youhui|event','0','0','0','33','','','','','3','全城热恋','圣诞节一个人过，情人节还想一个人过？在世界末日前的最后一个情人节，丁丁网为你找到最match的TA！更有200元约会基金为你们随时待命……');
DROP TABLE IF EXISTS `%DB_PREFIX%article_cate`;
CREATE TABLE `%DB_PREFIX%article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `brief` varchar(255) NOT NULL COMMENT '描述',
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `type_id` (`type_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('11','公司信息','','0','1','0','1','4');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('10','商务合作','','0','1','0','1','2');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('9','获取更新','','0','1','0','1','3');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('7','用户帮助','','0','1','0','1','1');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('18','商城公告','','0','1','0','2','5');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('19','系统文章','','0','1','0','3','6');
INSERT INTO `%DB_PREFIX%article_cate` VALUES ('22','热门推荐','','0','1','0','2','7');
DROP TABLE IF EXISTS `%DB_PREFIX%attr_stock`;
CREATE TABLE `%DB_PREFIX%attr_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `attr_cfg` text NOT NULL,
  `stock_cfg` int(11) NOT NULL,
  `attr_str` text NOT NULL,
  `buy_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%attr_stock` VALUES ('89','40','a:2:{i:12;s:6:\"红色\";i:13;s:6:\"大码\";}','10','红色大码','0');
INSERT INTO `%DB_PREFIX%attr_stock` VALUES ('90','40','a:2:{i:12;s:6:\"红色\";i:13;s:6:\"中码\";}','5','红色中码','0');
INSERT INTO `%DB_PREFIX%attr_stock` VALUES ('91','40','a:2:{i:12;s:6:\"红色\";i:13;s:6:\"均码\";}','1000','红色均码','0');
DROP TABLE IF EXISTS `%DB_PREFIX%auto_cache`;
CREATE TABLE `%DB_PREFIX%auto_cache` (
  `cache_key` varchar(100) NOT NULL,
  `cache_type` varchar(100) NOT NULL,
  `cache_data` text NOT NULL,
  `cache_time` int(11) NOT NULL,
  PRIMARY KEY (`cache_key`,`cache_type`),
  KEY `cache_type` (`cache_type`),
  KEY `cache_key` (`cache_key`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `%DB_PREFIX%brand`;
CREATE TABLE `%DB_PREFIX%brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `brand_promote_logo` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `sort` int(11) NOT NULL,
  `shop_cate_id` int(11) NOT NULL,
  `brand_promote` tinyint(1) NOT NULL,
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `time_status` tinyint(1) NOT NULL COMMENT '0:已上线 1:未上线 2:已过期',
  `dy_count` int(11) DEFAULT '0' COMMENT '品牌订阅数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%brand` VALUES ('8','耐克','./public/attachment/201201/4f0125515a461.gif','','耐克商标，图案是个小钩子，造型简洁有力，急如闪电，一看就让人想到使用耐克体育用品后所产生的速度和爆发力。','2','25','0','0','0','0','0');
INSERT INTO `%DB_PREFIX%brand` VALUES ('7','达芙妮','./public/attachment/201201/4f0124a1e1447.gif','','达芙妮的名字来源于希腊女神Daphne与太阳神阿波罗的爱情神话，空间主题的设计象征着对爱亘古不变的追逐。','1','24','0','0','0','0','0');
INSERT INTO `%DB_PREFIX%brand` VALUES ('9','南极人','./public/attachment/201201/4f012585146cb.gif','','南极人成立于1998年，累计销售额近90亿，拥有30000多个销售网点，品牌覆盖率高达89%，14年中国针织行业家喻户晓的领先品牌，屡次创造行业奇迹，是中国纺织行业的领导品牌.','3','24','0','0','0','0','0');
INSERT INTO `%DB_PREFIX%brand` VALUES ('10','茵佳妮','./public/attachment/201201/4f0125db13be8.gif','','“茵佳妮”不仅仅为消费者提供服装，更注重为顾客提供全新的品牌体验与内心共鸣，契合顾客群文化内涵注入品牌力量。“incolour茵佳妮”需要的是顾客发自内心的认可与热爱，而并非单一的着装感受。','4','24','0','0','0','0','0');
INSERT INTO `%DB_PREFIX%brand` VALUES ('11','歌莉娅','./public/attachment/201201/4f0126234229b.gif','','歌莉娅, 诞生于1995年以来, 不断地周游列国探索采撷, 将潮流与各地文化融合, 创作时尚又具有气质的女性服饰。我们相信「旅行就是生活」--世界著名童话故事大师安徒生的经典名言.','5','24','0','0','0','0','0');
INSERT INTO `%DB_PREFIX%brand` VALUES ('12','七匹狼','./public/attachment/201201/4f01322901e23.gif','','七匹狼狼文化的理念是勇敢，忠诚，沟通，力量，团队，不屈，自信。追逐人生，男人不止一面。','6','31','0','0','0','0','0');
DROP TABLE IF EXISTS `%DB_PREFIX%brand_dy`;
CREATE TABLE `%DB_PREFIX%brand_dy` (
  `uid` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%conf`;
CREATE TABLE `%DB_PREFIX%conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `input_type` tinyint(1) NOT NULL COMMENT '?????????????? 0:??????? 1:?????????? 2:????? 3:????',
  `value_scope` text NOT NULL COMMENT '??????',
  `is_effect` tinyint(1) NOT NULL,
  `is_conf` tinyint(1) NOT NULL COMMENT '????????? 0: ??????  1:????????',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%conf` VALUES ('1','DEFAULT_ADMIN','admin','1','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('2','URL_MODEL','0','1','1','0,1','1','1','3');
INSERT INTO `%DB_PREFIX%conf` VALUES ('3','AUTH_KEY','fanwe','1','0','','1','1','4');
INSERT INTO `%DB_PREFIX%conf` VALUES ('4','TIME_ZONE','8','1','1','0,8','1','1','1');
INSERT INTO `%DB_PREFIX%conf` VALUES ('5','ADMIN_LOG','1','1','1','0,1','0','1','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('6','DB_VERSION','1.0','0','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('7','DB_VOL_MAXSIZE','8000000','1','0','','1','1','11');
INSERT INTO `%DB_PREFIX%conf` VALUES ('8','WATER_MARK','','2','2','','1','1','48');
INSERT INTO `%DB_PREFIX%conf` VALUES ('10','BIG_WIDTH','500','2','0','','0','0','49');
INSERT INTO `%DB_PREFIX%conf` VALUES ('11','BIG_HEIGHT','500','2','0','','0','0','50');
INSERT INTO `%DB_PREFIX%conf` VALUES ('12','SMALL_WIDTH','200','2','0','','0','0','51');
INSERT INTO `%DB_PREFIX%conf` VALUES ('13','SMALL_HEIGHT','200','2','0','','0','0','52');
INSERT INTO `%DB_PREFIX%conf` VALUES ('14','WATER_ALPHA','75','2','0','','1','1','53');
INSERT INTO `%DB_PREFIX%conf` VALUES ('15','WATER_POSITION','5','2','1','1,2,3,4,5','1','1','54');
INSERT INTO `%DB_PREFIX%conf` VALUES ('16','MAX_IMAGE_SIZE','3000000','2','0','','1','1','55');
INSERT INTO `%DB_PREFIX%conf` VALUES ('17','ALLOW_IMAGE_EXT','jpg,gif,png','2','0','','1','1','56');
INSERT INTO `%DB_PREFIX%conf` VALUES ('18','BG_COLOR','#ffffff','2','0','','0','0','57');
INSERT INTO `%DB_PREFIX%conf` VALUES ('19','IS_WATER_MARK','1','2','1','0,1','1','1','58');
INSERT INTO `%DB_PREFIX%conf` VALUES ('20','TEMPLATE','fanwe','1','0','','1','1','17');
INSERT INTO `%DB_PREFIX%conf` VALUES ('21','SITE_LOGO','http://t1.fanwe.net:93/zc/public/attachment/201210/12/11/5077943312beb.jpg','1','2','','1','1','19');
INSERT INTO `%DB_PREFIX%conf` VALUES ('173','SEO_TITLE','蜡笔源码','1','0','','1','1','20');
INSERT INTO `%DB_PREFIX%conf` VALUES ('25','REPLY_ADDRESS','info@fanwe.com','3','0','','1','1','77');
INSERT INTO `%DB_PREFIX%conf` VALUES ('23','MAIL_ON','1','3','1','0,1','1','1','72');
INSERT INTO `%DB_PREFIX%conf` VALUES ('24','SMS_ON','0','3','1','0,1','1','1','78');
INSERT INTO `%DB_PREFIX%conf` VALUES ('26','PUBLIC_DOMAIN_ROOT','','2','0','','1','1','59');
INSERT INTO `%DB_PREFIX%conf` VALUES ('27','APP_MSG_SENDER_OPEN','0','1','1','0,1','1','1','9');
INSERT INTO `%DB_PREFIX%conf` VALUES ('28','ADMIN_MSG_SENDER_OPEN','0','1','1','0,1','1','1','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('29','GZIP_ON','0','1','1','0,1','1','1','2');
INSERT INTO `%DB_PREFIX%conf` VALUES ('42','SITE_NAME','方维众筹','1','0','','1','1','1');
INSERT INTO `%DB_PREFIX%conf` VALUES ('30','CACHE_ON','1','1','1','0,1','1','1','7');
INSERT INTO `%DB_PREFIX%conf` VALUES ('31','EXPIRED_TIME','0','1','0','','1','1','5');
INSERT INTO `%DB_PREFIX%conf` VALUES ('32','TMPL_DOMAIN_ROOT','','2','0','0','0','0','62');
INSERT INTO `%DB_PREFIX%conf` VALUES ('33','CACHE_TYPE','File','1','1','File,Xcache,Memcached','1','1','7');
INSERT INTO `%DB_PREFIX%conf` VALUES ('34','MEMCACHE_HOST','127.0.0.1:11211','1','0','','1','1','8');
INSERT INTO `%DB_PREFIX%conf` VALUES ('35','IMAGE_USERNAME','admin','2','0','','1','1','60');
INSERT INTO `%DB_PREFIX%conf` VALUES ('36','IMAGE_PASSWORD','admin','2','4','','1','1','61');
INSERT INTO `%DB_PREFIX%conf` VALUES ('37','DEAL_MSG_LOCK','0','0','0','','0','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('38','SEND_SPAN','2','1','0','','1','1','85');
INSERT INTO `%DB_PREFIX%conf` VALUES ('39','TMPL_CACHE_ON','1','1','1','0,1','1','1','6');
INSERT INTO `%DB_PREFIX%conf` VALUES ('40','DOMAIN_ROOT','','1','0','','1','0','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('41','COOKIE_PATH','/','1','0','','1','1','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('43','INTEGRATE_CFG','','0','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('44','INTEGRATE_CODE','','0','0','','1','0','0');
INSERT INTO `%DB_PREFIX%conf` VALUES ('172','PAY_RADIO','0.1','3','0','','1','1','10');
INSERT INTO `%DB_PREFIX%conf` VALUES ('176','SITE_LICENSE','蜡笔源码','1','0','','1','1','22');
INSERT INTO `%DB_PREFIX%conf` VALUES ('174','SEO_KEYWORD','蜡笔源码','1','0','','1','1','21');
INSERT INTO `%DB_PREFIX%conf` VALUES ('175','SEO_DESCRIPTION','蜡笔源码','1','0','','1','1','22');
DROP TABLE IF EXISTS `%DB_PREFIX%coupon_log`;
CREATE TABLE `%DB_PREFIX%coupon_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `msg` text NOT NULL,
  `query_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%daren_submit`;
CREATE TABLE `%DB_PREFIX%daren_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `reason` text NOT NULL,
  `daren_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal`;
CREATE TABLE `%DB_PREFIX%deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `deal_days` int(11) NOT NULL COMMENT '??????????????????????????',
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `limit_price` double(20,4) NOT NULL,
  `brief` text NOT NULL,
  `description` text NOT NULL,
  `comment_count` int(11) NOT NULL,
  `support_count` int(11) NOT NULL COMMENT '???????',
  `focus_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `log_count` int(11) NOT NULL,
  `support_amount` double(20,4) NOT NULL COMMENT '????????????????limit_price(???????)',
  `pay_amount` double(20,4) NOT NULL COMMENT '?????????????????????????????????????????\r\n??support_amount*???????+delivery_fee_amount',
  `delivery_fee_amount` double(20,4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `tags` text NOT NULL,
  `tags_match` text NOT NULL,
  `tags_match_row` text NOT NULL,
  `success_time` int(11) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '??????',
  `is_classic` tinyint(1) NOT NULL COMMENT '???????',
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `begin_time` (`begin_time`),
  KEY `end_time` (`end_time`),
  KEY `is_effect` (`is_effect`),
  KEY `limit_price` (`limit_price`),
  KEY `comment_count` (`comment_count`),
  KEY `support_count` (`support_count`),
  KEY `focus_count` (`focus_count`),
  KEY `view_count` (`view_count`),
  KEY `log_count` (`log_count`),
  KEY `support_amount` (`support_amount`),
  KEY `create_time` (`create_time`),
  KEY `is_success` (`is_success`),
  KEY `cate_id` (`cate_id`),
  KEY `sort` (`sort`),
  KEY `is_recommend` (`is_recommend`),
  KEY `is_classic` (`is_classic`),
  KEY `is_delete` (`is_delete`),
  FULLTEXT KEY `tags_match` (`tags_match`),
  FULLTEXT KEY `name_match` (`name_match`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%deal` VALUES ('55','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','ux21151ux22827,ux26700ux38754,ux26399ux24453,ux23494ux30721,ux40644ux37329,ux25903ux25345,ux21407ux21019,ux28216ux25103,ux68ux73ux89,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345','功夫,桌面,期待,密码,黄金,支持,原创,游戏,DIY,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','./public/attachment/201211/07/10/021e2f6812298468cfab78cbd07b90ee85.jpg','','','15','1351710606','1448824200','1','3000.0000','这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，希望大家能够喜欢并支持我们！','这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，所以在游戏的美术、包装、宣传等方面都会存在一些不足。但本次带来的两个作品都是我们利用几乎所有的业余时间尽心尽力制作出来的，希望大家能够喜欢并支持我们！<p><br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>&nbsp; 桌面游戏是一种健康的休闲方式，你不用整天面对电脑的辐射，同时也让你可以不再过度沉迷于虚拟的网络世界中。因为桌面游戏方式的特殊性，能使你更加注重加强与人面对面的交流，提高自己的语言和沟通能力，还可以在现实生活中用这种轻松愉快的休闲方式结交更多的朋友。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;我们就是这样一群喜爱桌游，同时喜欢设计桌游的年轻人，我们并非专业的桌游制作团队，我们只是凭着对桌游的爱好开始了对桌游设计的探索。我们希望通过努力，将桌游的快乐带给更多喜欢轻松休闲、热爱生活的朋友。但是，我们的资金及能力有限，需要得到大家的帮助与支持，才能实现这样的梦想。也希望您在支持我们的同时收获一份快乐和惊喜！</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;我们这次将原创的桌面游戏《功夫》和《黄金密码》一起放到这里，希望得到大家的支持！&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><br />\r\n<img src=\"./public/attachment/201211/07/16/da4f6f7e11b249dcf71bf5e9c6a86d8a83o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n</p>\r\n<p>游戏人数：2-4人</p>\r\n<p>适合年龄：8+</p>\r\n<p>游戏时间：10-30分钟</p>\r\n<p>游戏类型：手牌管理</p>\r\n<p>游戏背景：你在游戏中扮演一名武者，灵活运用你掌握的功夫（手牌）和装备（装备牌）对抗其他的武者并最终打败他们。</p>\r\n<p>游戏目标：扣除敌方所有人物的体力为胜。</p>\r\n游戏配件：69张动作牌（手牌）、6张道具牌、2张血量牌（需自行制作）<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/7a404c90f81ca1368ff0f5b24e26a5d781o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n</p>\r\n<p>游戏过程：游戏的每个回合分两个阶段，第一阶段为热身阶段，获得热身阶段胜利的玩家成为第二阶段（攻击阶段）的主导者，由他决定第二阶段如何进行。</p>\r\n<p>&nbsp;&nbsp;&nbsp;《功夫》用卡牌较好的模拟再现了格斗中的一些乐趣，比如热身阶段的猜招、攻击阶段一招一式的过招，同时结合手牌管理的一些特点，打出组合招式及连招，配合你获得的道具，最终战胜对手。在游戏过程中，当你取得一定的优势时，也不能掉以轻心，形式可能会因为你的任何一个破绽而发生逆转，这与格斗、搏击的情况十分相似。所以如何保持良好的心态，灵活的运用手牌才是这个游戏制胜的关键所在。（具体规则见最下方及本项目动态）</p>\r\n<p><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p>游戏人数：3-4人</p>\r\n<p>适合年龄：8+</p>\r\n<p>游戏时间：20-40分钟</p>\r\n<p>游戏类型：逻辑推理、谜题设计</p>\r\n<p>游戏背景：二战时期，德军将一批黄金铸成金条，分别保存在3个金库里，并派重兵把守。为了得到这批黄金，美军重金收买了一个德军守卫为内奸，内奸成功获取了金库的密码破解方法，并将密码破解方法以暗号的形式告知了美军特工。但是，与此同时德军也发现了暗号，并且金库的守卫非常森严，解开金库密码的时间只有1分钟……玩家在这个游戏中分别扮演德军、德军内奸、美军特工。如何设计出德军看不懂，美军特工又能在1分钟内解出的暗号密码。就看你的表现啦！</p>\r\n<p>游戏目标：根据身份的不同，任务也不同。德军需解开密码保住金库，特工需设置密码阻止德军解密，美军需解开密码同时选择金库获得黄金。</p>\r\n<p>游戏配件：10张密码牌、12张空箱牌、24张黄金牌、沙漏1个、草稿纸和笔（自备）</p>\r\n<p>游戏过程：每人分别扮演一次特工、德军、美军，完成后计算每人所获得的黄金数量，黄金最多的玩家获胜。</p>\r\n<p><br />\r\n<br />\r\n</p>\r\n<p></p>\r\n','0','1','0','10','1','15.0000','18.5000','5.0000','1403635327','','','','','','','0','0','8','福建','福州','17','0','fanwe','1','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('56','拥有自己的咖啡馆','ux21654ux21857ux39302,ux25317ux26377,ux33258ux24049,ux25317ux26377ux33258ux24049ux30340ux21654ux21857ux39302','咖啡馆,拥有,自己,拥有自己的咖啡馆','./public/attachment/201211/07/11/40e44eb97b0ca5aed5148e59c2cc8dcb95.jpg','','','30','1351711495','1448825040','1','5000.0000','每个人心目中都有一个属于自己的咖啡馆,我们也是.但我们想要的咖啡馆，又不仅仅是咖啡馆','<h3>关于我</h3>\r\n<p>每个人心目中都有一个属于自己的咖啡馆<br />\r\n我们也是<br />\r\n但我们想要的咖啡馆，又不仅仅是咖啡馆<br />\r\n这里除了售卖咖啡和甜点，还有旅行的梦想<br />\r\n我们想要一个“窝”，一个无论在出发前还是归来后随时开放的地方<br />\r\n梦想着有一天<br />\r\n我们可以带着咖啡的香气出发<br />\r\n又满载着旅行的收获回到充满咖啡香气的小“窝”</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/0482ef5836f6745af0f59ff40d40805765o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/2ae4c7149cfd31f12d91453713322f9076o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n','0','11','1','13','1','5500.0000','4950.0000','0.0000','1403635293','','','','','','','1352230293','1','1','北京','东城区','18','0','fzmatthew','1','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('57','拍微电影《转角 爱》','ux30701ux29255,ux30005ux24433,ux66ux108ux105ux110ux100,ux76ux111ux118ux101,ux30701ux29255ux30005ux24433ux12298ux66ux108ux105ux110ux100ux76ux111ux118ux101ux12299,ux36716ux35282,ux25293ux24494ux30005ux24433ux12298ux36716ux35282ux29233ux12299','短片,电影,Blind,Love,短片电影《Blind Love》,转角,拍微电影《转角 爱》','./public/attachment/201211/07/11/0c067c4522bba51595c324028be7070d11.jpg','http://player.youku.com/player.php/sid/XNzIxMDI3NTQ0/v.swf','http://v.youku.com/v_show/id_XNzIxMDI3NTQ0.html','7895','1349034009','1479843600','1','50000.0000','我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。','<p>我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。</p>\r\n <p>这是一个需要爱与被爱的世界，然而在我们面对这纷繁复杂多变的世界时，我们如何过滤掉那迷乱双眼的尘沙找到真爱？我们在爱中得救，在爱中迷失。我们过度相信我们用双眼所见的，却忘记听从内心最真的感受！<br />\r\n<br />\r\n</p>\r\n<p>我们一路奔跑、一路追逐，生活的洪流把我们涌向未来不确定的方向，我们有着一双能望穿苍穹的眼睛，却不断的迷失在路途中。如果有一天我们的双眼失去光明……<br />\r\n<br />\r\n</p>\r\n<p>真爱是否还遥远？<br />\r\n<br />\r\n</p>\r\n<p>导演武秋辰将用电影语言为我们讲述一位盲人画家的爱情故事，如同她所写道的：“我们视觉正常的人很容易被表象所迷惑，而我们的触觉，听觉和嗅觉却非常的精准，给我们带来更丰富的感知。”当我们不仅凭双眼去认识这个世界的时候，也许答案就在那里！<br />\r\n<br />\r\n</p>\r\n<p>为了使影片更富深入性、更具专业性，导演请来了好莱坞的职业演员，就连剧中的盲人画像也由美国著名画家OlyaLusina特为此片创作。<br />\r\n<br />\r\n</p>\r\n<p>该片不仅是一个远赴美国实现梦想的中国女孩的心血之作，同时也深刻展现了一个盲人心中的世界，从“他”的角度为因爱迷失的人们找到了一个诗意的出口。<br />\r\n<br />\r\n</p>\r\n<p>在这里，真诚地感谢您的关注！关注武秋辰和她的《BlindLove》！<br />\r\n<br />\r\n</p>\r\n<h3>自我介绍<br />\r\n</h3>\r\n<p>我是一个在美国学电影做电影的中国女孩。在美国圣地亚哥大学电影系求学的过程中，我学会了编剧，导演，拍摄和剪辑，参与了几十部电影的创作。“盲爱”是我在硕士毕业后自编自导的第一部独立电影作品。</p>\r\n<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/148cb883cbb170735c331125a96c11e162o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/875016977d65ee2cc679ab0cfd7a7f6620o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n</p>\r\n','0','1','0','11','1','3000.0000','2700.0000','0.0000','1403635198','','','','','','','0','0','3','福建','福州','17','0','fanwe','1','1','0');
INSERT INTO `%DB_PREFIX%deal` VALUES ('58','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','ux21654ux21857ux39302,ux37325ux24314,ux20844ux30410,ux27969ux28010,ux21147ux37327,ux38656ux35201,ux22825ux20351,ux22823ux23478,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281','咖啡馆,重建,公益,流浪,力量,需要,天使,大家,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','./public/attachment/201211/07/11/438813e6d75cb84c6b0df8ffbad7aa8c31.jpg','http://www.tudou.com/v/r/v.swf','http://www.tudou.com/listplay/i67lCgQt5nQ/i9toRdup3ok.html','50','1352145022','1480362600','1','3000.0000','爱天使成立的猫天使驿站三年多收养救助了两百余只的流浪猫并为它们找到了一个个温暖的家。','<p>爱天使成立的猫天使驿站三年多收养救助了两百余只的流浪猫并为它们找到了一个个温暖的家。爱天使是一种爱，更是一种生活！坚持个人信念的我一直努力活出这个世上不一般的价值人生。那就是不追求自己能拥有什么而在能为自己以外的生命带去什么。。。爱天使在今年因合同到期而到了转折点，重建是艰辛的却也坚信必将更加强大。</p>\r\n <h3>【关于我】——将救助流浪猫视为自己的事业！</h3>\r\n<p>首先做个自我介绍：</p>\r\n<p>我叫李文婷，英文名ANGELLI。</p>\r\n<p>是一名爱猫如命的“狂热分子”，</p>\r\n<p>作为流浪猫的代理麻麻已收养救助过两百余只猫咪；</p>\r\n<p>00年在大学校园宿舍开始拨号上网的网络生活，</p>\r\n<p>担任系学生会副主席及宣传部长等，</p>\r\n<p>参与系女篮队、校诗朗诵比赛、主持系选举活动，<br />\r\n</p>\r\n<p>组织带领系队作为一辩参加校辩论赛获得季军，</p>\r\n<p>毕业后于厦门海尔及三五互联等公司工作近六年。</p>\r\n<p>工作中一直表现突出主持公司千人晚会并荣获过部门最高荣誉奖。</p>\r\n<p>08年辞去部门经理一职后成为SOHO一族，</p>\r\n<p>经营LA爱天使韩国饰品成为淘宝卖家。</p>\r\n<p>于短短半年间毫无虚假的升为二钻一年后升至三钻，</p>\r\n<p>于09年6月20日在老爸大力的支持下经营爱天使咖啡馆，</p>\r\n<p>于2010年10月创办猫天使驿站正式收养救助流浪猫，</p>\r\n<p>先后接受了海峡导报厦门卫视等媒体及大学生的多次采访报道。<br />\r\n</p>\r\n<p>三年间收养救助了两百余只流浪猫并为它们找到了一个个温暖的家。</p>\r\n<p>与仔仔、全全、QQ、EE四只咪咪一起相伴爱天使救命流浪猫的生活。</p>\r\n<p>爱天使就是流浪猫们的家，是我将用余生为之奋斗的事业！</p>\r\n将“关爱弱小弱势生命，传递爱分享快乐”救助流浪猫视为毕生为之努力的事业。<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/dda29128a6310c273da111f1f30296c172o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/c7650c3dd93e5585dbfad780ba3bbced31o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n','1','2','1','6','1','5000.0000','4500.0000','0.0000','1403635337','','','','','','','1352231704','1','7','福建','福州','17','0','fanwe','1','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_attr`;
CREATE TABLE `%DB_PREFIX%deal_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `goods_type_attr_id` int(11) NOT NULL,
  `price` decimal(20,4) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `is_checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_type_attr_id` (`goods_type_attr_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('222','均码','13','0.0000','40','1');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('221','中码','13','0.0000','40','1');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('220','大码','13','0.0000','40','1');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('219','红色','12','0.0000','40','1');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('218','均码','13','10.0000','41','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('217','大码','13','0.0000','41','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('216','中码','13','0.0000','41','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('215','小码','13','0.0000','41','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('214','黑色','12','0.0000','41','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('213','红色','12','0.0000','41','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('211','中码','13','0.0000','42','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('210','小码','13','0.0000','42','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('209','均码','13','0.0000','42','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('208','北极蓝','12','0.0000','42','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('207','玫红','12','0.0000','42','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('206','洋紫','12','0.0000','42','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('205','中码','13','0.0000','43','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('204','均码','13','0.0000','43','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('203','红色','12','0.0000','43','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('202','驼色','12','0.0000','43','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('201','黑色','12','0.0000','43','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('199','中码','13','0.0000','44','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('198','翡翠绿','12','0.0000','44','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('196','均码','13','0.0000','45','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('195','红黑格','12','0.0000','45','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('194','黑白格','12','0.0000','45','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('193','均码','13','0.0000','46','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('192','紫色','12','0.0000','46','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('191','黑色','12','0.0000','46','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('189','大码','13','0.0000','47','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('188','超大码','13','0.0000','47','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('187','黑色','12','0.0000','47','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('190','中码','13','0.0000','47','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('197','中码','13','0.0000','45','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('200','均码','13','0.0000','44','0');
INSERT INTO `%DB_PREFIX%deal_attr` VALUES ('212','大码','13','0.0000','42','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cart`;
CREATE TABLE `%DB_PREFIX%deal_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `attr` varchar(255) NOT NULL,
  `unit_price` decimal(20,4) NOT NULL,
  `number` int(11) NOT NULL,
  `total_price` decimal(20,4) NOT NULL,
  `verify_code` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `return_money` decimal(20,4) NOT NULL,
  `return_total_money` decimal(20,4) NOT NULL,
  `return_score` int(11) NOT NULL,
  `return_total_score` int(11) NOT NULL,
  `buy_type` tinyint(1) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `attr_str` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`),
  KEY `update_time` (`update_time`)
) ENGINE=MyISAM AUTO_INCREMENT=333 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate`;
CREATE TABLE `%DB_PREFIX%deal_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('1','设计','1');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('2','科技','2');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('3','影视','3');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('4','摄影','4');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('5','音乐','5');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('6','出版','6');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('7','活动','7');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('8','游戏','8');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('9','旅行','9');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('10','其他','10');
INSERT INTO `%DB_PREFIX%deal_cate` VALUES ('11','预热','11');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate_type`;
CREATE TABLE `%DB_PREFIX%deal_cate_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('1','咖啡','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('2','闽菜','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('3','东北菜','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('4','川菜','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('5','KTV','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('6','自助游','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('7','周边游','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('8','国内游','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('9','海外游','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('10','洗车','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('11','汽车保养','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('12','驾校','0','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('13','4S店','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('14','音响','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('15','车载导航','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('16','真皮座椅','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('17','打蜡','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('18','男科','0','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('19','妇科','0','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('20','儿科','0','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('21','口腔科','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('22','眼科','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('23','体检中心','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('24','心理诊所','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('25','疗养院','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('26','日本料理','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('27','本帮菜','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('28','甜点','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('29','面包','1','0');
INSERT INTO `%DB_PREFIX%deal_cate_type` VALUES ('30','烧烤','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate_type_deal_link`;
CREATE TABLE `%DB_PREFIX%deal_cate_type_deal_link` (
  `deal_id` int(11) NOT NULL,
  `deal_cate_type_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_id`,`deal_cate_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('37','2');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('37','3');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('38','2');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('39','2');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('39','4');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('49','1');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('50','4');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('51','4');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('53','4');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('55','28');
INSERT INTO `%DB_PREFIX%deal_cate_type_deal_link` VALUES ('55','29');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate_type_link`;
CREATE TABLE `%DB_PREFIX%deal_cate_type_link` (
  `cate_id` int(11) NOT NULL,
  `deal_cate_type_id` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`,`deal_cate_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','1');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','2');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','3');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','4');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','26');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','27');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','28');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','29');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('8','30');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('9','1');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('9','5');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('9','6');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('10','5');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('11','6');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('11','7');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('11','8');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('11','9');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','10');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','11');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','12');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','13');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','14');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','15');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','16');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('13','17');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','18');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','19');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','20');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','21');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','22');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','23');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','24');
INSERT INTO `%DB_PREFIX%deal_cate_type_link` VALUES ('16','25');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate_type_location_link`;
CREATE TABLE `%DB_PREFIX%deal_cate_type_location_link` (
  `location_id` int(11) NOT NULL,
  `deal_cate_type_id` int(11) NOT NULL,
  PRIMARY KEY (`location_id`,`deal_cate_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_cate_type_youhui_link`;
CREATE TABLE `%DB_PREFIX%deal_cate_type_youhui_link` (
  `deal_cate_type_id` int(11) NOT NULL,
  `youhui_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_cate_type_id`,`youhui_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('2','10');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('2','11');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('2','14');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('2','15');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('3','10');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('3','11');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('3','14');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('3','15');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('4','11');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('4','14');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('28','18');
INSERT INTO `%DB_PREFIX%deal_cate_type_youhui_link` VALUES ('29','18');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_city`;
CREATE TABLE `%DB_PREFIX%deal_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `notice` text NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%deal_city` VALUES ('1','全国','','1','0','0','1','0','每天提供一单精品消费，为您精选餐厅、酒吧、KTV、SPA、美发店、瑜伽馆等特色商家，只要凑够最低团购人数就能享受无敌折扣。','这是一则公告信息','','','','0');
INSERT INTO `%DB_PREFIX%deal_city` VALUES ('15','福州','fuzhou','1','0','1','1','1','','','','','','1');
INSERT INTO `%DB_PREFIX%deal_city` VALUES ('16','北京','beijing','1','0','1','1','0','','','','','','2');
INSERT INTO `%DB_PREFIX%deal_city` VALUES ('17','上海','shanghai','1','0','1','1','0','','','','','','3');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_collect`;
CREATE TABLE `%DB_PREFIX%deal_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_comment`;
CREATE TABLE `%DB_PREFIX%deal_comment` (
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
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('170','55','加油哦！','18','1352229601','26','fzmatthew','0','17','0','fanwe','');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('171','56','感谢支持！！','18','1352230363','27','fzmatthew','0','18','0','fzmatthew','');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('172','57','好好加油！','18','1352230882','28','fzmatthew','0','17','0','fanwe','');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('173','57','回复 fzmatthew:一定会的。','17','1352230924','28','fanwe','172','17','18','fanwe','fzmatthew');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('174','58','感谢','17','1352231585','29','fanwe','0','17','0','fanwe','');
INSERT INTO `%DB_PREFIX%deal_comment` VALUES ('175','58','感谢大家的支持','17','1352231787','0','fanwe','0','17','0','fanwe','');
DROP TABLE IF EXISTS `%DB_PREFIX%deal_coupon`;
CREATE TABLE `%DB_PREFIX%deal_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_deal_id` int(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `confirm_account` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `confirm_time` int(11) NOT NULL,
  `mail_count` int(11) NOT NULL,
  `sms_count` int(11) NOT NULL,
  `is_balance` tinyint(1) NOT NULL COMMENT '0:未结算 1:待结算 2:已结算',
  `balance_memo` text NOT NULL,
  `balance_price` decimal(20,4) NOT NULL COMMENT '结算单价',
  `balance_time` int(11) NOT NULL,
  `refund_status` tinyint(1) NOT NULL,
  `expire_refund` tinyint(1) NOT NULL,
  `any_refund` tinyint(1) NOT NULL,
  `coupon_price` decimal(20,4) NOT NULL,
  `coupon_score` int(11) NOT NULL,
  `deal_type` tinyint(1) NOT NULL,
  `coupon_money` decimal(20,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_sn` (`sn`) USING BTREE,
  UNIQUE KEY `unk_pw` (`password`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%deal_delivery`;
CREATE TABLE `%DB_PREFIX%deal_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
