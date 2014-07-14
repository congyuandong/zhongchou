-- fanwe SQL Dump Program
-- Microsoft-IIS/6.0
-- 
-- DATE : 2014-06-26 16:58:30
-- MYSQL SERVER VERSION : 5.1.63-community
-- PHP VERSION : isapi
-- Vol : 5


DROP TABLE IF EXISTS `%DB_PREFIX%supplier_account_location_link`;
CREATE TABLE `%DB_PREFIX%supplier_account_location_link` (
  `account_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`account_id`,`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_account_location_link` VALUES ('7','20');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_dy`;
CREATE TABLE `%DB_PREFIX%supplier_dy` (
  `uid` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location`;
CREATE TABLE `%DB_PREFIX%supplier_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `route` text NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `is_main` tinyint(1) NOT NULL,
  `api_address` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `deal_cate_match` text NOT NULL,
  `deal_cate_match_row` text NOT NULL,
  `locate_match` text NOT NULL,
  `locate_match_row` text NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `deal_cate_id` int(11) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '推荐的门店',
  `is_verify` tinyint(1) NOT NULL COMMENT '认证门店',
  `tags` varchar(255) NOT NULL,
  `tags_match` text NOT NULL,
  `tags_match_row` text NOT NULL,
  `avg_point` float(14,4) NOT NULL,
  `good_dp_count` int(11) NOT NULL,
  `bad_dp_count` int(11) NOT NULL,
  `common_dp_count` int(11) NOT NULL,
  `total_point` int(11) NOT NULL,
  `dp_count` int(11) NOT NULL,
  `image_count` int(11) NOT NULL,
  `ref_avg_price` float(14,4) NOT NULL,
  `good_rate` float(14,4) NOT NULL,
  `common_rate` float(14,4) NOT NULL,
  `sms_content` varchar(255) NOT NULL DEFAULT '',
  `index_img` varchar(255) NOT NULL DEFAULT '',
  `tuan_count` int(11) NOT NULL,
  `event_count` int(11) NOT NULL,
  `youhui_count` int(11) NOT NULL,
  `daijin_count` int(11) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `biz_license` varchar(255) NOT NULL,
  `biz_other_license` varchar(255) NOT NULL,
  `new_dp_count` int(11) NOT NULL,
  `new_dp_count_time` int(11) NOT NULL,
  `shop_count` int(11) NOT NULL,
  `mobile_brief` text NOT NULL,
  `sort` int(11) NOT NULL,
  `dp_group_point` text NOT NULL,
  `tuan_youhui_cache` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `city_id` (`city_id`),
  KEY `is_verify` (`is_verify`),
  KEY `is_effect` (`is_effect`),
  KEY `is_recommend` (`is_recommend`),
  KEY `avg_point` (`avg_point`),
  KEY `good_dp_count` (`good_dp_count`),
  KEY `bad_dp_count` (`bad_dp_count`),
  KEY `common_dp_count` (`common_dp_count`),
  KEY `total_point` (`total_point`),
  KEY `dp_count` (`dp_count`),
  KEY `good_rate` (`good_rate`),
  KEY `common_rate` (`common_rate`),
  KEY `tuan_count` (`tuan_count`),
  KEY `event_count` (`event_count`),
  KEY `youhui_count` (`youhui_count`),
  KEY `daijin_count` (`daijin_count`),
  KEY `new_dp_count` (`new_dp_count`),
  KEY `is_main` (`is_main`),
  KEY `supplier_id` (`supplier_id`) USING BTREE,
  KEY `search_idx1` (`city_id`,`is_recommend`,`is_effect`,`is_verify`) USING BTREE,
  KEY `search_idx2` (`city_id`,`avg_point`,`is_effect`) USING BTREE,
  KEY `search_idx3` (`supplier_id`,`is_main`) USING BTREE,
  KEY `search_idx4` (`city_id`,`deal_cate_id`,`is_verify`,`is_effect`,`is_recommend`) USING BTREE,
  KEY `search_idx5` (`city_id`,`deal_cate_id`,`dp_count`,`avg_point`,`ref_avg_price`,`is_effect`,`is_recommend`,`is_verify`) USING BTREE,
  KEY `search_idx6` (`good_rate`,`is_verify`,`is_effect`) USING BTREE,
  KEY `sort_default` (`is_recommend`,`is_verify`,`dp_count`) USING BTREE,
  KEY `ref_avg_price` (`ref_avg_price`),
  KEY `shop_count` (`shop_count`),
  FULLTEXT KEY `name_match` (`name_match`),
  FULLTEXT KEY `locate_match` (`locate_match`),
  FULLTEXT KEY `deal_cate_match` (`deal_cate_match`),
  FULLTEXT KEY `tags_match` (`tags_match`),
  FULLTEXT KEY `all_match` (`deal_cate_match`,`locate_match`,`name_match`,`tags_match`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('17','享客来牛排世家','','安泰店：鼓楼区吉庇路39号（安泰楼后面，码头一号旁）南街店 ：福州市鼓楼区八一七路南街车站旁（大洋百货正对面）','0591-88592283','','119.306144','26.086743','18','','','1','安泰店：鼓楼区吉庇路39号（安泰楼后面，码头一号旁）南街店 ：福州市鼓楼区八一七路南街车站旁（大洋百货正对面）','15','ux39184ux39278ux32654ux39135','餐饮美食','ux40723ux27004ux21306,ux21335ux34903,ux31119ux24030ux24066,ux19971ux36335,ux22823ux27915,ux30721ux22836,ux36710ux31449,ux30334ux36135,ux23545ux38754,ux21518ux38754,ux23433ux27888ux24215ux65306ux40723ux27004ux21306ux21513ux24199ux36335ux51ux57ux21495ux65288ux23433ux27888ux27004ux21518ux38754ux65292ux30721ux22836ux19968ux21495ux26049ux65289ux21335ux34903ux24215ux65306ux31119ux24030ux24066ux40723ux27004ux21306ux20843ux19968ux19971ux36335ux21335ux34903ux36710ux31449ux26049ux65288ux22823ux27915ux30334ux36135ux27491ux23545ux38754ux65289,ux19996ux34903ux21475','鼓楼区,南街,福州市,七路,大洋,码头,车站,百货,对面,后面,安泰店：鼓楼区吉庇路39号（安泰楼后面，码头一号旁）南街店 ：福州市鼓楼区八一七路南街车站旁（大洋百货正对面）,东街口','ux29275ux25490,ux19990ux23478,ux20139ux23458ux26469ux29275ux25490ux19990ux23478','牛排,世家,享客来牛排世家','8','./public/attachment/201201/4f013ee3d7cb9.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','0','0','0','0','','','','1','','','0','0','0','','0','','');
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('15','爱琴海餐厅','社会主义学院站下: 61路、70路、78路、100路、129路','福州市鼓楼区鼓屏路47号','0591-88522779','','119.304522','26.098978','16','18:00-24:00','','1','福州市鼓楼区鼓屏路47号','15','ux39184ux39278ux32654ux39135','餐饮美食','ux40723ux27004ux21306,ux31119ux24030ux24066,ux31119ux24030ux24066ux40723ux27004ux21306ux40723ux23631ux36335ux52ux55ux21495,ux23631ux23665','鼓楼区,福州市,福州市鼓楼区鼓屏路47号,屏山','ux29233ux29748ux28023,ux39184ux21381,ux29233ux29748ux28023ux39184ux21381','爱琴海,餐厅,爱琴海餐厅','8','./public/attachment/201201/4f0113ce66cd4.jpg','1','1','','ux24178ux20928,ux26126ux20142,ux26377ux30452ux36798ux20844ux20132','干净,明亮,有直达公交','3.3333','2','1','0','10','3','0','43.3333','0.6667','0.0000','','','1','0','0','0','','','','1','','','0','0','0','','0','','');
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('16','老刘野生大鱼坊','7、16、36、40、62、69、71、73、74、79、80、88、92、97、103、125、202、306路，到五一路站下车即可','福州市鼓楼区古田路88号华丰大厦3层A室(闽都大酒店对面)','0591-83339688','','119.320796','26.082646','17','10:30-14:30,16:30-21:30','','1','福州市鼓楼区古田路88号华丰大厦3层A室(闽都大酒店对面)','15','ux39184ux39278ux32654ux39135','餐饮美食','ux21476ux30000,ux40723ux27004ux21306,ux21326ux20016,ux31119ux24030ux24066,ux22823ux37202ux24215,ux23545ux38754,ux22823ux21414,ux31119ux24030ux24066ux40723ux27004ux21306ux21476ux30000ux36335ux56ux56ux21495ux21326ux20016ux22823ux21414ux51ux23618ux65ux23460ux40ux38397ux37117ux22823ux37202ux24215ux23545ux38754ux41,ux21488ux27743ux21306','古田,鼓楼区,华丰,福州市,大酒店,对面,大厦,福州市鼓楼区古田路88号华丰大厦3层A室(闽都大酒店对面),台江区','ux32769ux21016,ux22823ux40060,ux37326ux29983,ux32769ux21016ux37326ux29983ux22823ux40060ux22346','老刘,大鱼,野生,老刘野生大鱼坊','8','./public/attachment/201201/4f0116296dc27.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','1','0','0','4','','','','1','','','0','0','0','','0','','');
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('14','闽粤汇','K3、19、51、52、69、74、102、106、129、130、133、301路，至蒙古营站下车','五一北路110号原海关大院内（现光大银行后）','0591-83326788,0591-88319968','','119.315682','26.087528','15','11:30-14:00，17:30-21:00','','1','五一北路110号原海关大院内（现光大银行后）','15','ux39184ux39278ux32654ux39135','餐饮美食','ux20809ux22823ux38134ux34892,ux21271ux36335,ux22823ux38498,ux28023ux20851,ux49ux49ux48,ux20116ux19968,ux20116ux19968ux21271ux36335ux49ux49ux48ux21495ux21407ux28023ux20851ux22823ux38498ux20869ux65288ux29616ux20809ux22823ux38134ux34892ux21518ux65289,ux40723ux27004ux21306,ux20116ux19968ux24191ux22330,ux26187ux23433ux21306,ux20116ux19968ux26032ux26449','光大银行,北路,大院,海关,110,五一,五一北路110号原海关大院内（现光大银行后）,鼓楼区,五一广场,晋安区,五一新村','ux38397ux31908,ux38397ux31908ux27719','闽粤,闽粤汇','8','./public/attachment/201201/4f0110c586c48.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','2','1','0','0','','','','1','','','0','0','0','','0','','');
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('18','格瑞雅美容院','','福州市五一北路67号（蒙古营站牌后）延福宾馆后院','0591-88813330‎','','119.31585','26.089641','19','','','1','福州市五一北路67号（蒙古营站牌后）延福宾馆后院','15','ux29983ux27963ux26381ux21153','生活服务','ux33945ux21476ux33829,ux31119ux24030ux24066,ux21271ux36335,ux31449ux29260,ux21518ux38498,ux23486ux39302,ux24310ux31119,ux20116ux19968,ux31119ux24030ux24066ux20116ux19968ux21271ux36335ux54ux55ux21495ux65288ux33945ux21476ux33829ux31449ux29260ux21518ux65289ux24310ux31119ux23486ux39302ux21518ux38498,ux40723ux27004ux21306,ux20116ux19968ux24191ux22330','蒙古营,福州市,北路,站牌,后院,宾馆,延福,五一,福州市五一北路67号（蒙古营站牌后）延福宾馆后院,鼓楼区,五一广场','ux38597ux32654,ux26684ux29790,ux23481ux38498,ux26684ux29790ux38597ux32654ux23481ux38498','雅美,格瑞,容院,格瑞雅美容院','10','./public/attachment/201201/4f013fc452347.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','2','0','0','0','','','','1','','','0','0','0','','0','','');
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('19','馨语河畔','','鼓楼区南后街5号2楼','18659138700‎','','119.302286','26.091546','20','','','1','鼓楼区南后街5号2楼','15','ux39184ux39278ux32654ux39135','餐饮美食','ux40723ux27004ux21306,ux21335ux21518ux34903,ux40723ux27004ux21306ux21335ux21518ux34903ux53ux21495ux50ux27004','鼓楼区,南后街,鼓楼区南后街5号2楼','ux27827ux30036,ux39336ux35821ux27827ux30036','河畔,馨语河畔','8','./public/attachment/201201/4f01422c0c096.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','0','0','0','0','','','','1','','','0','0','0','','0','','');
INSERT INTO `%DB_PREFIX%supplier_location` VALUES ('20','泡泡糖宝贝游泳馆','','福州市晋安区连洋路123号好来屋星光大道5#楼13#店面','0591-85162880','','119.357576','26.077701','21','','','1','福州市晋安区连洋路123号好来屋星光大道5#楼13#店面','15','','','ux26187ux23433ux21306,ux22909ux26469,ux31119ux24030ux24066,ux24215ux38754,ux26143ux20809,ux22823ux36947,ux36830ux27915ux36335,ux49ux50ux51,ux49ux51,ux31119ux24030ux24066ux26187ux23433ux21306ux36830ux27915ux36335ux49ux50ux51ux21495ux22909ux26469ux23627ux26143ux20809ux22823ux36947ux53ux35ux27004ux49ux51ux35ux24215ux38754,ux34701ux20392ux19996ux21306','晋安区,好来,福州市,店面,星光,大道,连洋路,123,13,福州市晋安区连洋路123号好来屋星光大道5#楼13#店面,融侨东区','ux27873ux27873ux31958,ux28216ux27891ux39302,ux23453ux36125,ux27873ux27873ux31958ux23453ux36125ux28216ux27891ux39302','泡泡糖,游泳馆,宝贝,泡泡糖宝贝游泳馆','0','./public/attachment/201201/4f0142c918abd.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','0','0','0','1','','','','1','','','0','0','0','','0','','');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_area_link`;
CREATE TABLE `%DB_PREFIX%supplier_location_area_link` (
  `location_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`location_id`,`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('14','13');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('14','47');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('15','8');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('15','20');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('16','10');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('17','8');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('17','14');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('18','8');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('18','13');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('19','8');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('20','9');
INSERT INTO `%DB_PREFIX%supplier_location_area_link` VALUES ('20','45');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_brand_link`;
CREATE TABLE `%DB_PREFIX%supplier_location_brand_link` (
  `brand_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_dp`;
CREATE TABLE `%DB_PREFIX%supplier_location_dp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `create_time` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_img` tinyint(1) NOT NULL,
  `is_best` tinyint(1) NOT NULL,
  `is_top` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `good_count` int(11) NOT NULL,
  `bad_count` int(11) NOT NULL,
  `reply_count` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `avg_price` float(14,4) NOT NULL,
  `kb_user_id` varchar(50) NOT NULL,
  `kb_create_time` varchar(20) DEFAULT '',
  `kb_tags` varchar(255) DEFAULT '',
  `is_index` tinyint(1) NOT NULL,
  `is_buy` tinyint(1) NOT NULL,
  `from_data` varchar(255) NOT NULL,
  `rel_app_index` varchar(255) NOT NULL,
  `rel_route` varchar(255) NOT NULL,
  `rel_param` varchar(255) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `supplier_location_id` (`supplier_location_id`) USING BTREE,
  KEY `is_img` (`is_img`) USING BTREE,
  KEY `is_best` (`is_best`) USING BTREE,
  KEY `is_top` (`is_top`) USING BTREE,
  KEY `good_count` (`good_count`) USING BTREE,
  KEY `bad_count` (`bad_count`) USING BTREE,
  KEY `reply_count` (`reply_count`) USING BTREE,
  KEY `avg_price` (`avg_price`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_location_dp` VALUES ('1','上周去吃过，感觉不错','上周去吃过，感觉不错。推荐这家餐厅[坏笑]','1333241498','4','44','0','0','0','1','0','0','0','15','130.0000','','','','0','0','','','','','0');
INSERT INTO `%DB_PREFIX%supplier_location_dp` VALUES ('2','非常好','非常好非常好非常好非常好非常好非常好非常好','1333241553','5','44','0','0','0','1','0','0','0','15','0.0000','','','','0','0','','','','','0');
INSERT INTO `%DB_PREFIX%supplier_location_dp` VALUES ('3','一般般一般般','一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般','1333241576','1','44','0','0','0','1','0','0','0','15','0.0000','','','','0','0','','','','','0');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_dp_point_result`;
CREATE TABLE `%DB_PREFIX%supplier_location_dp_point_result` (
  `group_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `dp_id` int(11) NOT NULL,
  KEY `group_id` (`group_id`) USING BTREE,
  KEY `supplier_location_id` (`supplier_location_id`) USING BTREE,
  KEY `dp_id` (`dp_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_location_dp_point_result` VALUES ('1','3','15','1');
INSERT INTO `%DB_PREFIX%supplier_location_dp_point_result` VALUES ('2','4','15','1');
INSERT INTO `%DB_PREFIX%supplier_location_dp_point_result` VALUES ('1','3','15','2');
INSERT INTO `%DB_PREFIX%supplier_location_dp_point_result` VALUES ('2','5','15','2');
INSERT INTO `%DB_PREFIX%supplier_location_dp_point_result` VALUES ('1','4','15','3');
INSERT INTO `%DB_PREFIX%supplier_location_dp_point_result` VALUES ('2','2','15','3');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_dp_reply`;
CREATE TABLE `%DB_PREFIX%supplier_location_dp_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dp_id` int(11) NOT NULL,
  `content` text NOT NULL COMMENT '回应内容',
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_dp_tag_result`;
CREATE TABLE `%DB_PREFIX%supplier_location_dp_tag_result` (
  `tags` varchar(255) NOT NULL,
  `dp_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_location_dp_tag_result` VALUES ('干净 明亮','1','1','15');
INSERT INTO `%DB_PREFIX%supplier_location_dp_tag_result` VALUES ('有直达公交','1','2','15');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_images`;
CREATE TABLE `%DB_PREFIX%supplier_location_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `dp_id` int(11) NOT NULL,
  `good_count` int(11) NOT NULL,
  `bad_count` int(11) NOT NULL,
  `brief` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `click_count` int(11) NOT NULL,
  `images_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`user_id`) USING BTREE,
  KEY `supplier_location_id` (`supplier_location_id`) USING BTREE,
  KEY `dp_id` (`dp_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_point_result`;
CREATE TABLE `%DB_PREFIX%supplier_location_point_result` (
  `group_id` int(11) NOT NULL,
  `avg_point` float(14,4) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `total_point` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`supplier_location_id`),
  KEY `group_id` (`group_id`) USING BTREE,
  KEY `dp_id` (`total_point`) USING BTREE,
  KEY `avg_point` (`avg_point`) USING BTREE,
  KEY `total_point` (`total_point`) USING BTREE,
  KEY `supplier_location_id` (`supplier_location_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_location_point_result` VALUES ('1','3.0000','15','3');
INSERT INTO `%DB_PREFIX%supplier_location_point_result` VALUES ('2','4.0000','15','4');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_location_sign_log`;
CREATE TABLE `%DB_PREFIX%supplier_location_sign_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `sign_time` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `location_id` (`location_id`),
  KEY `sign_time` (`sign_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_money_log`;
CREATE TABLE `%DB_PREFIX%supplier_money_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `money` decimal(20,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_money_submit`;
CREATE TABLE `%DB_PREFIX%supplier_money_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(20,4) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_submit`;
CREATE TABLE `%DB_PREFIX%supplier_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cate_config` text NOT NULL,
  `location_config` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL COMMENT '企业名称',
  `h_faren` varchar(255) NOT NULL COMMENT '法人',
  `h_license` varchar(255) NOT NULL COMMENT '营业执照',
  `h_other_license` varchar(255) NOT NULL COMMENT '其他资质上传',
  `h_user_name` varchar(255) NOT NULL COMMENT '店铺管理员姓名',
  `h_tel` varchar(255) NOT NULL,
  `h_supplier_logo` varchar(255) NOT NULL,
  `h_supplier_image` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `h_bank_info` text NOT NULL,
  `h_bank_user` varchar(255) NOT NULL,
  `h_bank_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_tag`;
CREATE TABLE `%DB_PREFIX%supplier_tag` (
  `tag_name` varchar(255) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT '关联商户子类标签分组的ID(可为前台会员点评的分组标签，也可为后台管理员编辑的分组标签), 为0时为主显标签',
  `total_count` int(11) NOT NULL COMMENT '同商户，同类分组提交的次数。 用于表示该标签的热门度',
  KEY `merchant_id` (`supplier_location_id`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_tag` VALUES ('干净','15','1','1');
INSERT INTO `%DB_PREFIX%supplier_tag` VALUES ('明亮','15','1','1');
INSERT INTO `%DB_PREFIX%supplier_tag` VALUES ('有直达公交','15','2','1');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_tag_group_preset`;
CREATE TABLE `%DB_PREFIX%supplier_tag_group_preset` (
  `group_id` int(11) NOT NULL,
  `supplier_location_id` int(11) NOT NULL,
  `preset` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%tag_group`;
CREATE TABLE `%DB_PREFIX%tag_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `preset` text NOT NULL,
  `sort` int(11) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `allow_dp` tinyint(1) NOT NULL,
  `allow_search` tinyint(1) NOT NULL,
  `allow_vote` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
INSERT INTO `%DB_PREFIX%tag_group` VALUES ('1','环境','','100','','','1','1','0');
INSERT INTO `%DB_PREFIX%tag_group` VALUES ('2','交通','','100','','','1','1','0');
INSERT INTO `%DB_PREFIX%tag_group` VALUES ('3','口味','','100','','','1','1','0');
INSERT INTO `%DB_PREFIX%tag_group` VALUES ('4','服务','很好 一般 很周到','100','','','1','1','0');
INSERT INTO `%DB_PREFIX%tag_group` VALUES ('5','停车','','100','','','1','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%tag_group_link`;
CREATE TABLE `%DB_PREFIX%tag_group_link` (
  `tag_group_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `tag_id` (`tag_group_id`) USING BTREE,
  KEY `type_id` (`category_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','12');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('5','11');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','11');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('2','11');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','10');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('5','10');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('5','9');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','9');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('2','9');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('1','8');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('2','8');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('3','8');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','13');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','14');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('5','14');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('2','15');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','15');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('1','16');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','16');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('1','17');
INSERT INTO `%DB_PREFIX%tag_group_link` VALUES ('4','17');
DROP TABLE IF EXISTS `%DB_PREFIX%tag_user_vote`;
CREATE TABLE `%DB_PREFIX%tag_user_vote` (
  `user_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`tag_name`,`group_id`,`location_id`),
  KEY `user_id` (`user_id`),
  KEY `tag_name` (`tag_name`),
  KEY `location_id` (`location_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%topic`;
CREATE TABLE `%DB_PREFIX%topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `forum_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT '0:普通日志 1:购物分享',
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `relay_id` int(11) NOT NULL COMMENT '0:原创 1:转发来源的贴子ID',
  `origin_id` int(11) NOT NULL COMMENT '原创贴子ID',
  `reply_count` int(11) NOT NULL,
  `relay_count` int(11) NOT NULL,
  `good_count` int(11) NOT NULL,
  `bad_count` int(11) NOT NULL,
  `click_count` int(11) NOT NULL,
  `rel_app_index` varchar(255) NOT NULL,
  `rel_route` varchar(255) NOT NULL,
  `rel_param` varchar(255) NOT NULL,
  `message_id` int(11) NOT NULL,
  `topic_group` varchar(255) NOT NULL DEFAULT 'share',
  `fav_id` int(11) NOT NULL COMMENT '喜欢XX分享的分享ID',
  `fav_count` int(11) NOT NULL,
  `user_name_match` text NOT NULL,
  `user_name_match_row` text NOT NULL,
  `keyword_match` text NOT NULL,
  `keyword_match_row` text NOT NULL,
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `is_recommend` tinyint(1) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `source_type` tinyint(1) NOT NULL COMMENT '0:本站 1:外站',
  `source_name` varchar(255) NOT NULL,
  `source_url` varchar(255) NOT NULL,
  `group_data` text NOT NULL COMMENT 'group插件采集同步的序列化数据',
  `daren_page` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `is_top` tinyint(1) NOT NULL,
  `is_best` tinyint(1) NOT NULL,
  `op_memo` text NOT NULL,
  `last_time` int(11) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `cate_match` text NOT NULL,
  `cate_match_row` text NOT NULL,
  `origin_topic_data` text NOT NULL,
  `images_count` int(11) NOT NULL,
  `image_list` text NOT NULL,
  `is_cached` tinyint(1) NOT NULL,
  `topic_group_data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `user_id` (`user_id`),
  KEY `is_recommend` (`is_recommend`),
  KEY `group_id` (`group_id`),
  KEY `is_top` (`is_top`),
  KEY `is_best` (`is_best`),
  KEY `has_image` (`has_image`),
  KEY `fav_id` (`fav_id`),
  KEY `relay_id` (`relay_id`),
  KEY `origin_id` (`origin_id`),
  KEY `type` (`type`),
  KEY `is_effect` (`is_effect`),
  KEY `is_delete` (`is_delete`),
  KEY `click_count` (`click_count`),
  KEY `last_time` (`last_time`),
  KEY `ordery_sort` (`create_time`,`is_top`),
  KEY `last_time_sort` (`last_time`,`is_top`),
  KEY `multi_key` (`is_effect`,`is_delete`,`last_time`,`is_recommend`,`group_id`,`is_top`,`is_best`,`create_time`),
  FULLTEXT KEY `user_name_match` (`user_name_match`),
  FULLTEXT KEY `keyword_match` (`keyword_match`),
  FULLTEXT KEY `cate_match` (`cate_match`),
  FULLTEXT KEY `all_match` (`keyword_match`,`cate_match`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic` VALUES ('133','荒草日出','','很美[害羞][哈哈]','1328312164','share','44','fanwe','1','0','0','133','0','0','0','0','0','','','','0','share','0','0','','','ux26085ux20986,ux25668ux24433,ux23475ux32670,ux21704ux21704,ux33618ux33609,ux33618ux33609ux26085ux20986','日出,摄影,害羞,哈哈,荒草,荒草日出','','','日出 摄影','1','1','0','网站','','','./public/attachment/201202/16/12/4f3c86f3e1c90.jpg','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('134','巧克力','','情人节要到了，准备巧克力了吗？','1328312272','share','44','fanwe','1','0','0','134','0','0','0','0','0','','','','0','share','0','2','','','ux24039ux20811ux21147,ux24773ux20154ux33410,ux33410ux35201,ux20934ux22791,ux24773ux20154','巧克力,情人节,节要,准备,情人','','','巧克力 情人节','1','1','0','网站','','','./public/attachment/201202/16/12/4f3c871c3009b.jpg','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('135','','','卡哇伊~[害羞]','1328312355','share','44','fanwe','1','0','0','135','0','1','0','0','0','','','','0','share','0','0','','','ux23456ux29289,ux21334ux33804,ux21487ux29233,ux23475ux32670','宠物,卖萌,可爱,害羞','','','宠物 卖萌 可爱','1','1','0','网站','','','./public/attachment/201202/16/12/4f3c873962c4f.jpg','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('136','','','电影《猎物》剧照[发呆]','1328312503','share','44','fanwe','1','0','0','136','0','1','0','0','1','','','','0','share','0','0','','','ux30005ux24433,ux29454ux29289,ux21095ux29031,ux21457ux21574','电影,猎物,剧照,发呆','','','电影  猎物','1','1','0','网站','','','./public/attachment/201202/16/12/4f3c875493361.jpg','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('137','','','口味又有些重了。[呲牙][呲牙]','1328312605','share','44','fanwe','1','0','0','137','2','2','0','0','6','','','','0','','0','0','','','ux28216ux25103,ux25163ux32472,ux21618ux29273,ux21475ux21619,ux26377ux20123','游戏,手绘,呲牙,口味,有些','','','游戏 手绘','1','1','0','网站','','','./public/attachment/201202/16/12/4f3c871c3009b.jpg','0','0','0','','0','0','','','','5','a:5:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201202/04/15/be2c85548ad5fca063bd9d1d6add1faa13_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201202/04/15/be2c85548ad5fca063bd9d1d6add1faa13.jpg\";s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"500\";s:2:\"id\";s:2:\"98\";}i:1;a:5:{s:4:\"path\";s:76:\"./public/comment/201202/04/15/05891ca45a216fc5aed6280bcaad084b93_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201202/04/15/05891ca45a216fc5aed6280bcaad084b93.jpg\";s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"500\";s:2:\"id\";s:2:\"99\";}i:2;a:5:{s:4:\"path\";s:76:\"./public/comment/201202/04/15/822c1f3758e4b32e4327fbdb987a5b2d74_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201202/04/15/822c1f3758e4b32e4327fbdb987a5b2d74.jpg\";s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"500\";s:2:\"id\";s:3:\"100\";}i:3;a:5:{s:4:\"path\";s:76:\"./public/comment/201202/04/15/13ba7fa8f7da90cd70f28d0296eed81073_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201202/04/15/13ba7fa8f7da90cd70f28d0296eed81073.jpg\";s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"500\";s:2:\"id\";s:3:\"101\";}i:4;a:5:{s:4:\"path\";s:76:\"./public/comment/201202/04/15/8b44310b7de3c540d24aabcfff97465f84_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201202/04/15/8b44310b7de3c540d24aabcfff97465f84.jpg\";s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"500\";s:2:\"id\";s:3:\"102\";}}','0','b:0;');
INSERT INTO `%DB_PREFIX%topic` VALUES ('138','','','口味又有些重了。[呲牙][呲牙] @fzmatthew:太可怕了','1328312652','share','46','fzmatthew','1','0','137','137','0','1','0','0','0','','','','0','share','0','0','ux102ux122ux109ux97ux116ux116ux104ux101ux119','fzmatthew','ux21618ux29273,ux21475ux21619,ux102ux122ux109ux97ux116ux116ux104ux101ux119,ux21487ux24597,ux26377ux20123','呲牙,口味,fzmatthew,可怕,有些','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('139','','','','1328312658','share','46','fzmatthew','1','0','0','134','1','0','0','0','2','','','','0','share','134','1','','','','','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('140','','','卡哇伊~[害羞] @fzmatthew:很可爱啊[哈哈][哈哈]','1328312676','share','46','fzmatthew','1','0','135','135','0','0','0','0','0','','','','0','share','0','0','ux102ux122ux109ux97ux116ux116ux104ux101ux119','fzmatthew','ux21704ux21704,ux23475ux32670,ux102ux122ux109ux97ux116ux116ux104ux101ux119,ux21487ux29233','哈哈,害羞,fzmatthew,可爱','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('141','','','口味又有些重了。[呲牙][呲牙] @fzmatthew:太可怕了 @fz云淡风轻:悲惨[得意]','1328312778','share','45','fz云淡风轻','1','0','138','137','0','0','0','0','0','','','','0','share','0','0','ux102ux122ux109ux97ux116ux116ux104ux101ux119,ux102ux122ux20113ux28129ux39118ux36731','fzmatthew,fz云淡风轻','ux21618ux29273,ux20113ux28129ux39118ux36731,ux24754ux24808,ux21475ux21619,ux102ux122ux109ux97ux116ux116ux104ux101ux119,ux24471ux24847,ux21487ux24597,ux26377ux20123,ux102ux122','呲牙,云淡风轻,悲惨,口味,fzmatthew,得意,可怕,有些,fz','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('142','','','','1328312833','share','45','fz云淡风轻','1','0','0','134','0','0','0','0','0','','','','0','share','139','0','','','','','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('143','','','电影《猎物》剧照[发呆] @fz云淡风轻:好看吗？','1328312880','share','45','fz云淡风轻','1','0','136','136','0','0','0','0','0','','','','0','share','0','0','ux102ux122ux20113ux28129ux39118ux36731','fz云淡风轻','ux20113ux28129ux39118ux36731,ux29454ux29289,ux21095ux29031,ux21457ux21574,ux22909ux30475,ux30005ux24433,ux102ux122','云淡风轻,猎物,剧照,发呆,好看,电影,fz','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('144','','','时尚','1328315204','share','45','fz云淡风轻','1','0','0','144','0','0','0','0','0','','','','0','share','0','1','','','ux26102ux23578','时尚','','',' 时尚','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('145','','','精美壁纸','1328315232','share','45','fz云淡风轻','1','0','0','145','0','0','0','0','0','','','','0','share','0','0','','','ux22721ux32440,ux31934ux32654ux22721ux32440','壁纸,精美壁纸','','',' 壁纸','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('146','','','【经典回顾】：星尘','1328315281','share','45','fz云淡风轻','1','0','0','146','0','0','0','0','0','','','','0','share','0','0','','','ux30005ux24433,ux26143ux23576,ux32463ux20856ux22238ux39038','电影,星尘,经典回顾','','','电影  星尘','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('147','','','【经典回顾】：奇幻精灵历险记','1328315335','share','45','fz云淡风轻','1','0','0','147','0','1','0','0','0','','','','0','share','0','0','','','ux30005ux24433,ux32463ux20856ux22238ux39038,ux21382ux38505ux35760,ux22855ux24187,ux31934ux28789','电影,经典回顾,历险记,奇幻,精灵','','','电影 ','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('148','','','[哈哈][哈哈]奇幻精灵历险记','1328315357','share','45','fz云淡风轻','1','0','0','148','0','0','0','0','0','','','','0','share','0','0','','','ux30005ux24433,ux21704ux21704,ux21382ux38505ux35760,ux22855ux24187,ux31934ux28789','电影,哈哈,历险记,奇幻,精灵','','','电影 ','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('149','','','街拍','1328315545','share','45','fz云淡风轻','1','0','0','149','0','0','0','0','0','','','','0','share','0','0','','','ux34903ux25293','街拍','','',' 街拍','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('150','','','看什么看，咬死你们！[呲牙][呲牙]','1328315616','share','45','fz云淡风轻','1','0','0','150','0','0','0','0','0','','','','0','share','0','1','','','ux23456ux29289,ux21334ux33804,ux21487ux29233,ux21618ux29273,ux20320ux20204,ux20160ux20040','宠物,卖萌,可爱,呲牙,你们,什么','','',' 宠物 卖萌 可爱','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('151','','','手绘可爱猫咪画集欣赏','1328315658','share','45','fz云淡风轻','1','0','0','151','0','0','0','0','0','','','','0','share','0','0','','','ux29483ux21674,ux23456ux29289,ux30011ux38598,ux25163ux32472,ux21487ux29233,ux27427ux36175','猫咪,宠物,画集,手绘,可爱,欣赏','','',' 猫咪 宠物','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('152','','','绝美湿地--拉市海。。[酷]','1328315738','share','45','fz云淡风轻','1','0','0','152','0','1','0','0','0','','','','0','share','0','1','','','ux33258ux21161ux28216,ux26053ux28216,ux26053ux34892,ux25289ux24066ux28023,ux28287ux22320','自助游,旅游,旅行,拉市海,湿地','','',' 自助游 旅游 旅行 拉市海','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('153','','','','1328315825','share','46','fzmatthew','1','0','0','150','0','0','0','0','0','','','','0','share','150','0','','','','','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('154','','','绝美湿地--拉市海。。[酷] @fzmatthew:真想去，很美','1328315833','share','46','fzmatthew','1','0','152','152','1','0','0','0','0','','','','0','share','0','0','ux102ux122ux109ux97ux116ux116ux104ux101ux119','fzmatthew','ux30495ux24819,ux28287ux22320,ux102ux122ux109ux97ux116ux116ux104ux101ux119','真想,湿地,fzmatthew','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('155','','','【经典回顾】：奇幻精灵历险记 @fzmatthew:好看吗？[得意]','1328315853','share','46','fzmatthew','1','0','147','147','0','0','0','0','0','','','','0','share','0','0','ux102ux122ux109ux97ux116ux116ux104ux101ux119','fzmatthew','ux32463ux20856ux22238ux39038,ux21382ux38505ux35760,ux102ux122ux109ux97ux116ux116ux104ux101ux119,ux22855ux24187,ux24471ux24847,ux22909ux30475,ux31934ux28789','经典回顾,历险记,fzmatthew,奇幻,得意,好看,精灵','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('156','','','','1328315865','share','46','fzmatthew','1','0','0','152','0','0','0','0','0','','','','0','share','152','0','','','','','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('157','','','','1328315898','share','44','fanwe','1','0','0','144','0','0','0','0','0','','','','0','share','144','0','','','','','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('158','免费试吃','','巧克力[得意][得意]','1328316502','share','44','fanwe','1','0','0','158','0','0','0','0','0','','','','0','share','0','0','','','ux35797ux21507,ux24039ux20811ux21147,ux24471ux24847,ux20813ux36153,ux20813ux36153ux35797ux21507','试吃,巧克力,得意,免费,免费试吃','','',' 试吃 巧克力','0','1','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('159','对免费品偿巧克力发表了点评','','看起来很不错。 我报名了[呲牙][呲牙]','1329336228','eventcomment','44','fanwe','1','0','0','159','0','0','0','0','0','youhui','edetail','id=1','0','share','0','0','','','ux21618ux29273,ux30475ux36215ux26469,ux19981ux38169,ux25253ux21517,ux24039ux20811ux21147,ux28857ux35780,ux21457ux34920,ux20813ux36153,ux23545ux20813ux36153ux21697ux20607ux24039ux20811ux21147ux21457ux34920ux20102ux28857ux35780','呲牙,看起来,不错,报名,巧克力,点评,发表,免费,对免费品偿巧克力发表了点评','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('160','报名参加了免费品偿巧克力','','报名参加了免费品偿巧克力 - 甜蜜情人节，DIY巧克力表爱意！仅39元，即享原价106元【小丫烘焙坊】DIY巧克力18粒礼盒装。爱有时候可以不用说出来，但可以写出来，要表达什么就看你的手艺咯！','1329336241','eventsubmit','44','fanwe','1','0','0','160','0','0','0','0','0','youhui','edetail','id=1','0','share','0','0','','','ux24039ux20811ux21147,ux21487ux20197,ux28888ux28953,ux31036ux30418,ux25163ux33402,ux23567ux20011,ux29233ux24847,ux19981ux29992ux35828,ux20889ux20986,ux21407ux20215,ux21442ux21152,ux25253ux21517,ux20813ux36153,ux25253ux21517ux21442ux21152ux20102ux20813ux36153ux21697ux20607ux24039ux20811ux21147','巧克力,可以,烘焙,礼盒,手艺,小丫,爱意,不用说,写出,原价,参加,报名,免费,报名参加了免费品偿巧克力','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('161','','','活动推荐:免费品偿巧克力','1329336269','shareevent','44','fanwe','1','0','0','161','0','0','0','0','0','','','','0','Fanwe','0','0','','','ux24039ux20811ux21147,ux20813ux36153,ux27963ux21160,ux25512ux33616','巧克力,免费,活动,推荐','','',' 巧克力 免费','0','1','0','网站','','YToyOntzOjM6InVybCI7YTozOntzOjk6ImFwcF9pbmRleCI7czo2OiJ5b3VodWkiO3M6NToicm91dGUiO3M6NzoiZWRldGFpbCI7czo1OiJwYXJhbSI7czo0OiJpZD0xIjt9czo0OiJkYXRhIjthOjI4OntzOjI6ImlkIjtzOjE6IjEiO3M6NDoibmFtZSI7czoyMToi5YWN6LS55ZOB5YG/5ben5YWL5YqbIjtzOjQ6Imljb24iO3M6NTA6Ii4vcHVibGljL2F0dGFjaG1lbnQvMjAxMjAyLzE2LzExLzRmM2M3ZWEzOTRhOTAuanBnIjtzOjE2OiJldmVudF9iZWdpbl90aW1lIjtzOjEwOiIxMzI4MDQwMDgwIjtzOjE0OiJldmVudF9lbmRfdGltZSI7czoxMDoiMTM2MDk1ODQ4MyI7czoxNzoic3VibWl0X2JlZ2luX3RpbWUiO3M6MTA6IjEzMjgxMjY0ODUiO3M6MTU6InN1Ym1pdF9lbmRfdGltZSI7czoxMDoiMTM2MzM3NzY4NyI7czo3OiJ1c2VyX2lkIjtzOjE6IjAiO3M6NzoiY29udGVudCI7czoxODYzOiI8cD48c3Ryb25nPuOAkOeJueWIq+aPkOekuuOAkTwvc3Ryb25nPjwvcD4NCjxwPjxzcGFuIHN0eWxlPSJjb2xvcjojZmYwMDAwOyI+PHN0cm9uZz7mnIkg5pWIIOacn++8muaIquatouiHszIwMTLlubQz5pyIMTjml6XvvIjov4fmnJ/ml6DmlYjvvIk8L3N0cm9uZz48L3NwYW4+PC9wPg0KPHA+PHN0cm9uZz7kvb/nlKjpmZDliLY8L3N0cm9uZz7vvJrmr4/kuKpJROmZkOi0rTEw5Lu977ybPC9wPg0KPHA+PHN0cm9uZz7okKXkuJrml7bpl7Q8L3N0cm9uZz7vvJoxMO+8mjAw4oCUMTk6MDDvvJs8L3A+DQo8cD48c3Ryb25nPuWVhuWutuWcsOWdgDwvc3Ryb25nPu+8muemj+W3nuW4guWPsOaxn+WMuuS6lOS4gOS4rei3r+S4h+mDvemYv+azoue9lzEw5bGCMTAwN++8iOmYv+azoue9l+Wkp+mFkuW6l+WQjuS+p++8ie+8mzwvcD4NCjxwPjxzdHJvbmc+6aKE57qm55S16K+dPC9zdHJvbmc+77yaMDU5MS0yODMxMTE4M++8m++8iOS4uuS/neacjeWKoei0qOmHj++8jOivt+aPkOWJjTHlpKnpooTnuqbvvIk8L3A+DQo8cD48c3Ryb25nPuS9v+eUqOaPkOekuu+8mjwvc3Ryb25nPjwvcD4NCjxwPjEu5Yet5omL5py65LqM57u056CB6Iez5ZWG5a625bqX5YaF6aqM6K+B5raI6LS577yM6IqC5YGH5pel6YCa55So77yM5LiA57uP6aqM6K+B77yM5LiN5LqI6YCA5qy+77yM6K+36KeB6LCF77ybPC9wPg0KPHAgYWxpZ249ImxlZnQiPjIu6K+35Zyo5pyJ5pWI5pyf5YaF6aqM6K+B77yM6YC+5pyf5peg5pWI77ybPC9wPg0KPHAgYWxpZ249ImxlZnQiPjMu5Zui6LSt5LiN5om+6Zu277yM5LiN5LqI5bqX5YaF5YW25LuW5LyY5oOg5ZCM5Lqr77yM5ZWG5a625om/6K+65peg6ZqQ5oCn5raI6LS577ybPC9wPg0KPHAgYWxpZ249ImxlZnQiPjQu6YCA5qy+6K+05piO77ya5pyJ5pWI5pyf5YaF6YCA5qy+6aKdPe+8iOWboui0reS7ty3mr4/ku70y5YWD5LqM57u056CB5L+h5oGv6LS577yJ77yM5pyJ5pWI5pyf5aSW6YCA5qy+6aKdPe+8iOWboui0reS7ty3mr4/ku70y5YWD5LqM57u056CB5L+h5oGv6LS577yJKjk1Je+8jOivt+WcqOaPkOS6pOmAgOasvueUs+ivt+aXtuiHquWKqOaJo+mZpO+8jOS7peS+v+aIkeS7rOWwveW/q+eahOS4uuaCqOWKnueQhumAgOasvuOAgjwvcD4NCjxwPjxzdHJvbmc+6LSt5Lmw5rWB56iL77yaPC9zdHJvbmc+PC9wPg0KPHA+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZjAwMDA7Ij7otK3kubDlm6LotK3liLgmbmJzcDsmZ3Q7Jm5ic3A75o+Q5YmNMeWkqeiHtOeUtemihOe6pu+8jOWIsOW6l+mqjOivgea2iOi0uSAmZ3Q7Jm5ic3A75byA5b+D5Lqr5Y+X5pyN5YqhPC9zcGFuPjwvcD4NCjxwPuWuouacjeeUteivne+8mjQwMC02MDAtNTUxNSA8L3A+DQo8cD48c3Ryb25nPuOAkOa0u+WKqOivpuaDheOAkTwvc3Ryb25nPjwvcD4NCjxwPiZuYnNwOyZuYnNwOyZuYnNwOyZuYnNwO+OAkOaDheS6uuiKgueJueS+m+OAkeeUnOicnOaDheS6uuiKgu+8jERJWeW3p+WFi+WKm+ihqOeIseaEj++8geS7hTM55YWD77yM5Y2z5Lqr5Y6f5Lu3MTA25YWD44CQ5bCP5Lir54OY54SZ5Z2K44CRRElZ5ben5YWL5YqbMTjnspLnpLznm5Loo4XjgILniLHmnInml7blgJnlj6/ku6XkuI3nlKjor7Tlh7rmnaXvvIzkvYblj6/ku6Xlhpnlh7rmnaXvvIzopoHooajovr7ku4DkuYjlsLHnnIvkvaDnmoTmiYvoibrlkq/vvIE8L3A+DQo8cD4mbmJzcDsmbmJzcDsmbmJzcDsmbmJzcDvpu5Hnmb3lt6flhYvlipvnmoTnu4/lhbjono3lkIjvvIznlJzonJzniLHmg4XnmoTnvo7kuL3ku6PooajjgII8L3A+DQo8cD48YnIgLz4NCjwvcD4NCjxwPjxpbWcgc3JjPSIuL3B1YmxpYy9hdHRhY2htZW50LzIwMTIwMi8xNi8xMi80ZjNjN2ZkODk2ODIyLmpwZyIgYWx0PSIiIGJvcmRlcj0iMCIgLz48YnIgLz4NCjwvcD4iO3M6NzoiY2F0ZV9pZCI7czoxOiIzIjtzOjc6ImNpdHlfaWQiO3M6MjoiMTUiO3M6NzoiYWRkcmVzcyI7czoyNDoi56aP5bee5a6d6b6Z5Z+O5biC5bm/5Zy6IjtzOjY6Inhwb2ludCI7czoxMDoiMTE5LjI5ODEyOSI7czo2OiJ5cG9pbnQiO3M6OToiMjYuMDY4NzY5IjtzOjEyOiJsb2NhdGVfbWF0Y2giO3M6NDI0OiJ1eDIwODQwdXgyMjI2OSx1eDMxMTE5dXgyNDAzMCx1eDIzNDUzdXg0MDg1Nyx1eDI0MTkxdXgyMjMzMCx1eDIyNDc4dXgyNDA2Nix1eDMxMTE5dXgyNDAzMHV4MjM0NTN1eDQwODU3dXgyMjQ3OHV4MjQwNjZ1eDI0MTkxdXgyMjMzMCx1eDQwNzIzdXgyNzAwNHV4MjEzMDYsdXgzOTUzMnV4MjM2MTR1eDIxMzA2LHV4MjE0ODh1eDI3NzQzdXgyMTMwNix1eDIwODQ1dXgxOTk2OHV4MjAwMTN1eDM2MzM1LHV4MTk5NzV1eDM1OTM3dXgyMjQ3OCx1eDIzNTY3dXgyNjcyNXV4MjI4MzYsdXgyMDE3OXV4MjM2NjV1eDIxMzA2LHV4MjAxNzl1eDIzNjY1dXgzODIxNSx1eDM0NzQ2dXgyNzk1NCx1eDE5OTc3dXgzOTY0MHV4MzYzMzUsdXgzOTMxOHV4MjM2NjV1eDM2MzM1LHV4MjYxODd1eDIzNDMzdXgyMTMwNix1eDI5NTc5dXgyNDE5NnV4MjYwMzJ1eDI2NDQ5IjtzOjE2OiJsb2NhdGVfbWF0Y2hfcm93IjtzOjE5Mjoi5YWo5Zu9LOemj+W3nizlrp3pvpks5bm/5Zy6LOWfjuW4giznpo/lt57lrp3pvpnln47luILlub/lnLos6byT5qW85Yy6LOmprOWwvuWMuizlj7DmsZ/ljLos5YWt5LiA5Lit6LevLOS4h+ixoeWfjizlsI/moaXlpLQs5LuT5bGx5Yy6LOS7k+WxsemVhyzonrrmtLIs5LiJ6auY6LevLOmmluWxsei3ryzmmYvlronljLos546L5bqE5paw5p2RIjtzOjEwOiJjYXRlX21hdGNoIjtzOjE0OiJ1eDMwMDA1dXgyNDQzMyI7czoxNDoiY2F0ZV9tYXRjaF9yb3ciO3M6Njoi55S15b2xIjtzOjEwOiJuYW1lX21hdGNoIjtzOjc1NzoidXgyNDAzOXV4MjA4MTF1eDIxMTQ3LHV4MjA4MTN1eDM2MTUzLHV4MjA4MTN1eDM2MTUzdXgyMTY5N3V4MjA2MDd1eDI0MDM5dXgyMDgxMXV4MjExNDcsdXgyMTQ4N3V4MjAxOTcsdXgyODg4OHV4Mjg5NTMsdXgzMTAzNnV4MzA0MTgsdXgyNTE2M3V4MzM0MDIsdXgyMzU2N3V4MjAwMTEsdXgyOTIzM3V4MjQ4NDcsdXgxOTk4MXV4Mjk5OTJ1eDM1ODI4LHV4MjA4ODl1eDIwOTg2LHV4MjE0MDd1eDIwMjE1LHV4Mjk5ODB1eDM0NTg4dXgyNDc3M3V4MjAxNTR1eDMzNDEwdXg2NTI5MnV4Njh1eDczdXg4OXV4MjQwMzl1eDIwODExdXgyMTE0N3V4MzQ5MjB1eDI5MjMzdXgyNDg0N3V4NjUyODF1eDIwMTY1dXg1MXV4NTd1eDIwODAzdXg2NTI5MnV4MjEzNjN1eDIwMTM5dXgyMTQwN3V4MjAyMTV1eDQ5dXg0OHV4NTR1eDIwODAzdXgxMjMwNHV4MjM1Njd1eDIwMDExdXgyODg4OHV4Mjg5NTN1eDIyMzQ2dXgxMjMwNXV4Njh1eDczdXg4OXV4MjQwMzl1eDIwODExdXgyMTE0N3V4NDl1eDU2dXgzMTg5MHV4MzEwMzZ1eDMwNDE4dXgzNTAxM3V4MTIyOTB1eDI5MjMzdXgyNjM3N3V4MjYxMDJ1eDIwNTA1dXgyMTQ4N3V4MjAxOTd1eDE5OTgxdXgyOTk5MnV4MzU4Mjh1eDIwOTg2dXgyNjQ2OXV4NjUyOTJ1eDIwMjk0dXgyMTQ4N3V4MjAxOTd1eDIwODg5dXgyMDk4NnV4MjY0Njl1eDY1MjkydXgzNTIwMXV4MzQ5MjB1eDM2Nzk4dXgyMDE2MHV4MjAwNDB1eDIzNjAxdXgzMDQ3NXV4MjAzMjB1eDMwMzQwdXgyNTE2M3V4MzM0MDJ1eDIxNjc5dXg2NTI4MSI7czoxNDoibmFtZV9tYXRjaF9yb3ciO3M6MzIyOiLlt6flhYvlipss5YWN6LS5LOWFjei0ueWTgeWBv+W3p+WFi+WKmyzlj6/ku6Us54OY54SZLOekvOebkizmiYvoibos5bCP5LirLOeIseaEjyzkuI3nlKjor7Qs5YaZ5Ye6LOWOn+S7tyznlJzonJzmg4XkurroioLvvIxESVnlt6flhYvlipvooajniLHmhI/vvIHku4UzOeWFg++8jOWNs+S6q+WOn+S7tzEwNuWFg+OAkOWwj+S4q+eDmOeEmeWdiuOAkURJWeW3p+WFi+WKmzE457KS56S855uS6KOF44CC54ix5pyJ5pe25YCZ5Y+v5Lul5LiN55So6K+05Ye65p2l77yM5L2G5Y+v5Lul5YaZ5Ye65p2l77yM6KaB6KGo6L6+5LuA5LmI5bCx55yL5L2g55qE5omL6Im65ZKv77yBIjtzOjEyOiJzdWJtaXRfY291bnQiO3M6MToiMSI7czoxMToicmVwbHlfY291bnQiO3M6MToiMSI7czo1OiJicmllZiI7czoyMTc6IueUnOicnOaDheS6uuiKgu+8jERJWeW3p+WFi+WKm+ihqOeIseaEj++8geS7hTM55YWD77yM5Y2z5Lqr5Y6f5Lu3MTA25YWD44CQ5bCP5Lir54OY54SZ5Z2K44CRRElZ5ben5YWL5YqbMTjnspLnpLznm5Loo4XjgILniLHmnInml7blgJnlj6/ku6XkuI3nlKjor7Tlh7rmnaXvvIzkvYblj6/ku6Xlhpnlh7rmnaXvvIzopoHooajovr7ku4DkuYjlsLHnnIvkvaDnmoTmiYvoibrlkq/vvIEiO3M6NDoic29ydCI7czoxOiIxIjtzOjk6ImlzX2VmZmVjdCI7czoxOiIxIjtzOjExOiJjbGlja19jb3VudCI7czoxOiIwIjtzOjEyOiJpc19yZWNvbW1lbmQiO3M6MToiMCI7czoxMToic3VwcGxpZXJfaWQiO3M6MjoiMTUiO319','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('162','','','团购推荐:创意茶杯','1329336284','sharetuan','44','fanwe','1','0','0','162','0','0','0','0','0','','','','0','Fanwe','0','0','','','ux21319ux28201,ux24773ux20154ux33410,ux37027ux20040,ux32654ux20029,ux39532ux20811ux26479,ux31119ux24030,ux21019ux24847,ux21464ux33394,ux26174ux29616,ux24515ux24847,ux33590ux26479,ux22242ux36141,ux25512ux33616','升温,情人节,那么,美丽,马克杯,福州,创意,变色,显现,心意,茶杯,团购,推荐','','',' 升温 情人节 那么 美丽 马克杯 福州 创意 变色 显现 心意','0','1','0','网站','','YToyOntzOjM6InVybCI7YTozOntzOjk6ImFwcF9pbmRleCI7czo0OiJ0dWFuIjtzOjU6InJvdXRlIjtzOjQ6ImRlYWwiO3M6NToicGFyYW0iO3M6NToiaWQ9NTYiO31zOjQ6ImRhdGEiO2E6NzU6e3M6MjoiaWQiO3M6MjoiNTYiO3M6NDoibmFtZSI7czoyNjY6IuacgOacieWIm+aEj++8jOacgOWvjOW/g+aEj+eahOaDheS6uuiKguekvOeJqe+8geS7hTIz5YWD77yM5Y2z5Lqr5Y6f5Lu3NTDlhYPmg4XkurroioJESVnlj5joibLmna8v6ams5YWL5p2v77yM5LqM6YCJ5LiA44CC576O5Li955qE5Zu+5qGI5Zyo5Y2H5rip5ZCO5oWi5oWi5pi+546w77yM6YKj5LmI56We5aWH77yM6YKj5LmI5rWq5ryr77yM5q2j5aaC5L2g5Lus5riQ5riQ5Y2H5rip55qE54ix5oOF77yM5rC46L+c576O5Li977yB56aP5bee5biC5Yy65YyF6YKu77yBIjtzOjg6InN1Yl9uYW1lIjtzOjEyOiLliJvmhI/ojLbmna8iO3M6NzoiY2F0ZV9pZCI7czoyOiIxMCI7czoxMToic3VwcGxpZXJfaWQiO3M6MjoiMTkiO3M6MzoiaW1nIjtzOjUwOiIuL3B1YmxpYy9hdHRhY2htZW50LzIwMTIwMi8xNi8xMS80ZjNjN2YxZDM3ZGVhLmpwZyI7czoxMToiZGVzY3JpcHRpb24iO3M6MjE4NToiPHAgYWxpZ249ImNlbnRlciI+PHN0cm9uZz7jgJDnpo/lt57jgJFESVnlj5joibLmna8vPC9zdHJvbmc+PHN0cm9uZz7pqazlhYvmna88L3N0cm9uZz48L3A+DQo8cD48c3Ryb25nPuOAkOeJueWIq+aPkOekuuOAkTwvc3Ryb25nPjwvcD4NCjxwPjxzcGFuIHN0eWxlPSJjb2xvcjojZmYwMDAwOyI+PHN0cm9uZz7mnIkg5pWIIOacn++8mjIwMTLlubQy5pyIN+aXpeiHszIwMTLlubQz5pyIN+aXpe+8iOS4i+WNleWQjjfkuKrlt6XkvZzml6XlhoXpgIHovr7vvIk8L3N0cm9uZz48L3NwYW4+PC9wPg0KPHA+PHN0cm9uZz7kvb/nlKjpmZDliLY8L3N0cm9uZz7vvJrlj6/otK3kubDlpJrlvKDkvJjmg6DliLjvvJs8L3A+DQo8cD48c3Ryb25nPuWSqOivoueUteivne+8mjwvc3Ryb25nPjEzNTk5Mzk3Nzk377ybPC9wPg0KPHA+PHN0cm9uZz7ms6jmhI/kuovpobnvvJo8L3N0cm9uZz48L3A+DQo8cD4xLuacrOWNleemj+W3nuW4guWMuuWGheWFjei0uemFjemAge+8jOS4i+WNleWQjjfkuKrlt6XkvZzml6XlhoXpgIHovr7vvJs8L3A+DQo8cCBhbGlnbj0ibGVmdCI+Mi7or7flnKjkuIvljZXml7bloavlhpnmuIXmpZrmlLbotKfkurrlp5PlkI3jgIHogZTns7vnlLXor53lj4rmnInmlYjlnLDlnYDvvIjor7fliqHlv4XloavlhpnvvIzku6XlhY3lu7bor6/mlLbotKfvvInvvJs8L3A+DQo8cCBhbGlnbj0ibGVmdCI+My7or7fmgqjmnKzkurrnrb7mlLbvvIzllYblk4HpgIHovr7or7flvZPlnLrku5Tnu4bmo4Dmn6XpqozmlLbvvIzlpoLllYblk4HphY3pgIHmnInor6/jgIHmlbDph4/nvLrlpLHjgIHkuqflk4HnoLTmjZ/nrYnpl67popjvvIzor7flvZPpnaLlj4rml7blkJHphY3pgIHkurrlkZjmj5Dlh7rlubbmi5LmlLbvvIzllYblrrbkvJrlsL3lv6vkuLrmgqjlronmjpLosIPmjaLvvIzoi6Xlt7Lnrb7mlLblj5HnjrDkuIrov7Dpl67popjvvIzmpoLkuI3mj5DkvpvpgIDmjaLvvJs8L3A+DQo8cCBhbGlnbj0ibGVmdCI+NC7lm6DlsZ7phY3pgIHnsbvllYblk4HvvIzkuIvljZXlkI7phY3pgIHlh7rljrvliJnmpoLkuI3pgIDmrL7jgII8L3A+DQo8cCBhbGlnbj0ibGVmdCI+NS7or7flnKjkuIvljZXlkI7ogZTns7vlrqLmnI3vvIzlsIbmgqjpnIDopoHljbDliLDmna/lrZDkuIrnmoTlm77moYjlj5Hoh7PlrqLmnI3vvIzmiJHku6zlsIblsL3lv6vogZTns7vllYblrrbkuLrmgqjlpITnkIbjgII8L3A+DQo8cD48c3Ryb25nPui0reS5sOa1geeoi++8mjwvc3Ryb25nPjwvcD4NCjxwPjxzcGFuIHN0eWxlPSJjb2xvcjojZmYwMDAwOyI+6LSt5Lmw5Zui6LSt5Yi4Jm5ic3A7Jmd0OyZuYnNwO+Whq+WGmeWnk+WQjeOAgeiBlOezu+eUteivneOAgeWcsOWdgOWPiuWVhuWTgeS/oeaBryAmZ3Q7IOWwhuWbvueJh+WPkeiHs+WuouacjSZuYnNwOyZndDsmbmJzcDvnrYnlvoXpgIHotKfkuIrpl6g8L3NwYW4+PC9wPg0KPHA+5a6i5pyN55S16K+d77yaNDAwLTYwMC01NTE1IDwvcD4NCjxwPjxzdHJvbmc+44CQ5rS75Yqo6K+m5oOF44CRPC9zdHJvbmc+PC9wPg0KPHA+Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A744CQ5oOF5Lq66IqC54m55L6b44CR5pyA5pyJ5Yib5oSP77yM5pyA5a+M5b+D5oSP55qE5oOF5Lq66IqC56S854mp77yB5LuFMjPlhYPvvIzljbPkuqvljp/ku7c1MOWFg+aDheS6uuiKgkRJWeWPmOiJsuadry/pqazlhYvmna/vvIzkuozpgInkuIDjgILnvo7kuL3nmoTlm77moYjlnKjljYfmuKnlkI7mhaLmhaLmmL7njrDvvIzpgqPkuYjnpZ7lpYfvvIzpgqPkuYjmtarmvKvvvIzmraPlpoLkvaDku6zmuJDmuJDljYfmuKnnmoTniLHmg4XvvIzmsLjov5znvo7kuL3vvIHnpo/lt57luILljLrljIXpgq7vvIE8L3A+DQo8cD7jgJDlt6XoibrmnZDotKjjgJHlm73lrrbkuIDnuqfnmb3nk7cgPC9wPg0KPHA+44CQ5Yay5Y2w44CR5Zu95a625YWI6L+b54Ot6L2s5Y2w5oqA5pyvIDwvcD4NCjxwPuOAkOinhOagvOOAkemrmDkuNWNtO+ebtOW+hDguMmNtO+WuuemHjzMyNW1sIDwvcD4NCjxwPuOAkOWPr+WNsOWMuuWfn+OAkThjbSoxOWNtIDwvcD4NCjxwPuOAkOWItuS9nOWRqOacn+OAke+8iOS4jeWQq+mFjemAgeaXtumXtO+8iTUtN+WkqSA8YnIgLz4NCjwvcD4NCjxwPjxiciAvPg0KPC9wPg0KPHA+PGltZyBzcmM9Ii4vcHVibGljL2F0dGFjaG1lbnQvMjAxMjAyLzE2LzExLzRmM2M3ZjM3NGIxMmQuanBnIiBhbHQ9IiIgYm9yZGVyPSIwIiAvPjxiciAvPg0KPC9wPiI7czoxMDoiYmVnaW5fdGltZSI7czoxMDoiMTMyODAzOTk5NCI7czo4OiJlbmRfdGltZSI7czoxMDoiMTM2MDk1ODM5NiI7czoxMDoibWluX2JvdWdodCI7czoxOiIwIjtzOjEwOiJtYXhfYm91Z2h0IjtzOjE6IjAiO3M6MTU6InVzZXJfbWluX2JvdWdodCI7czoxOiIwIjtzOjE1OiJ1c2VyX21heF9ib3VnaHQiO3M6MToiMCI7czoxMjoib3JpZ2luX3ByaWNlIjtzOjg6IjEyMC4wMDAwIjtzOjEzOiJjdXJyZW50X3ByaWNlIjtzOjc6IjIwLjAwMDAiO3M6NzoiY2l0eV9pZCI7czoyOiIxNSI7czo5OiJpc19jb3Vwb24iO3M6MToiMSI7czoxMToiaXNfZGVsaXZlcnkiO3M6MToiMCI7czo5OiJpc19lZmZlY3QiO3M6MToiMSI7czo5OiJpc19kZWxldGUiO3M6MToiMCI7czoxMDoidXNlcl9jb3VudCI7czoxOiIwIjtzOjk6ImJ1eV9jb3VudCI7czoxOiIwIjtzOjExOiJ0aW1lX3N0YXR1cyI7czoxOiIxIjtzOjEwOiJidXlfc3RhdHVzIjtzOjE6IjEiO3M6OToiZGVhbF90eXBlIjtzOjE6IjAiO3M6MTM6ImFsbG93X3Byb21vdGUiO3M6MToiMCI7czoxMjoicmV0dXJuX21vbmV5IjtzOjY6IjAuMDAwMCI7czoxMjoicmV0dXJuX3Njb3JlIjtzOjE6IjAiO3M6NToiYnJpZWYiO3M6MDoiIjtzOjQ6InNvcnQiO3M6MjoiMjAiO3M6MTU6ImRlYWxfZ29vZHNfdHlwZSI7czoxOiIwIjtzOjEyOiJzdWNjZXNzX3RpbWUiO3M6MTA6IjEzMjkzMzYwMDgiO3M6MTc6ImNvdXBvbl9iZWdpbl90aW1lIjtzOjE6IjAiO3M6MTU6ImNvdXBvbl9lbmRfdGltZSI7czoxOiIwIjtzOjQ6ImNvZGUiO3M6MDoiIjtzOjY6IndlaWdodCI7czo2OiIwLjAwMDAiO3M6OToid2VpZ2h0X2lkIjtzOjE6IjEiO3M6MTE6ImlzX3JlZmVycmFsIjtzOjE6IjAiO3M6ODoiYnV5X3R5cGUiO3M6MToiMCI7czo4OiJkaXNjb3VudCI7czo2OiIwLjAwMDAiO3M6NDoiaWNvbiI7czo1MDoiLi9wdWJsaWMvYXR0YWNobWVudC8yMDEyMDIvMTYvMTEvNGYzYzdmMWQzN2RlYS5qcGciO3M6Njoibm90aWNlIjtzOjE6IjAiO3M6MTM6ImZyZWVfZGVsaXZlcnkiO3M6MToiMCI7czoxNDoiZGVmaW5lX3BheW1lbnQiO3M6MToiMCI7czo5OiJzZW9fdGl0bGUiO3M6MDoiIjtzOjExOiJzZW9fa2V5d29yZCI7czowOiIiO3M6MTU6InNlb19kZXNjcmlwdGlvbiI7czowOiIiO3M6NjoiaXNfaG90IjtzOjE6IjAiO3M6NjoiaXNfbmV3IjtzOjE6IjAiO3M6NzoiaXNfYmVzdCI7czoxOiIwIjtzOjEwOiJpc19sb3R0ZXJ5IjtzOjE6IjAiO3M6NjoicmVvcGVuIjtzOjE6IjAiO3M6NToidW5hbWUiO3M6MDoiIjtzOjEwOiJmb3JiaWRfc21zIjtzOjE6IjAiO3M6OToiY2FydF90eXBlIjtzOjE6IjAiO3M6MTI6InNob3BfY2F0ZV9pZCI7czoxOiIwIjtzOjc6ImlzX3Nob3AiO3M6MToiMCI7czoxMToidG90YWxfcG9pbnQiO3M6MToiMCI7czo5OiJhdmdfcG9pbnQiO3M6MToiMCI7czoxMToiY3JlYXRlX3RpbWUiO3M6MTA6IjEzMjkzMzYwMDgiO3M6MTE6InVwZGF0ZV90aW1lIjtzOjEwOiIxMzI5MzM2MDA4IjtzOjEwOiJuYW1lX21hdGNoIjtzOjc5ODoidXgyMTMxOXV4MjgyMDEsdXgyNDc3M3V4MjAxNTR1eDMzNDEwLHV4MzcwMjd1eDIwMDQwLHV4MzI2NTR1eDIwMDI5LHV4Mzk1MzJ1eDIwODExdXgyNjQ3OSx1eDMxMTE5dXgyNDAzMCx1eDIxMDE5dXgyNDg0Nyx1eDIxNDY0dXgzMzM5NCx1eDI2MTc0dXgyOTYxNix1eDI0NTE1dXgyNDg0Nyx1eDI2MzY4dXgyNjM3N3V4MjEwMTl1eDI0ODQ3dXg2NTI5MnV4MjYzNjh1eDIzNTAwdXgyNDUxNXV4MjQ4NDd1eDMwMzQwdXgyNDc3M3V4MjAxNTR1eDMzNDEwdXgzMTAzNnV4MjkyODl1eDY1MjgxdXgyMDE2NXV4NTB1eDUxdXgyMDgwM3V4NjUyOTJ1eDIxMzYzdXgyMDEzOXV4MjE0MDd1eDIwMjE1dXg1M3V4NDh1eDIwODAzdXgyNDc3M3V4MjAxNTR1eDMzNDEwdXg2OHV4NzN1eDg5dXgyMTQ2NHV4MzMzOTR1eDI2NDc5dXg0N3V4Mzk1MzJ1eDIwODExdXgyNjQ3OXV4NjUyOTJ1eDIwMTA4dXgzNjg3M3V4MTk5Njh1eDEyMjkwdXgzMjY1NHV4MjAwMjl1eDMwMzQwdXgyMjI3MHV4MjY2OTZ1eDIyMzEydXgyMTMxOXV4MjgyMDF1eDIxNTE4dXgyNDkzMHV4MjQ5MzB1eDI2MTc0dXgyOTYxNnV4NjUyOTJ1eDM3MDI3dXgyMDA0MHV4MzEwNzB1eDIyODU1dXg2NTI5MnV4MzcwMjd1eDIwMDQwdXgyODAxMHV4Mjg0NTl1eDY1MjkydXgyNzQ5MXV4MjI5MTR1eDIwMzIwdXgyMDIwNHV4MjgxNzZ1eDI4MTc2dXgyMTMxOXV4MjgyMDF1eDMwMzQwdXgyOTIzM3V4MjQ3NzN1eDY1MjkydXgyNzcwNHV4MzY4Mjh1eDMyNjU0dXgyMDAyOXV4NjUyODF1eDMxMTE5dXgyNDAzMHV4MjQwNjZ1eDIxMzA2dXgyMTI1M3V4MzcwMzh1eDY1MjgxIjtzOjE0OiJuYW1lX21hdGNoX3JvdyI7czozNDI6IuWNh+a4qSzmg4XkurroioIs6YKj5LmILOe+juS4vSzpqazlhYvmna8s56aP5beeLOWIm+aEjyzlj5joibIs5pi+546wLOW/g+aEjyzmnIDmnInliJvmhI/vvIzmnIDlr4zlv4PmhI/nmoTmg4XkurroioLnpLznianvvIHku4UyM+WFg++8jOWNs+S6q+WOn+S7tzUw5YWD5oOF5Lq66IqCRElZ5Y+Y6Imy5p2vL+mprOWFi+adr++8jOS6jOmAieS4gOOAgue+juS4veeahOWbvuahiOWcqOWNh+a4qeWQjuaFouaFouaYvueOsO+8jOmCo+S5iOelnuWlh++8jOmCo+S5iOa1qua8q++8jOato+WmguS9oOS7rOa4kOa4kOWNh+a4qeeahOeIseaDhe+8jOawuOi/nOe+juS4ve+8geemj+W3nuW4guWMuuWMhemCru+8gSI7czoxNToiZGVhbF9jYXRlX21hdGNoIjtzOjI4OiJ1eDI5OTgzdXgyNzk2M3V4MjYzODF1eDIxMTUzIjtzOjE5OiJkZWFsX2NhdGVfbWF0Y2hfcm93IjtzOjEyOiLnlJ/mtLvmnI3liqEiO3M6MTU6InNob3BfY2F0ZV9tYXRjaCI7czowOiIiO3M6MTk6InNob3BfY2F0ZV9tYXRjaF9yb3ciO3M6MDoiIjtzOjEyOiJsb2NhdGVfbWF0Y2giO3M6Mzc3OiJ1eDIwODQwdXgyMjI2OSx1eDMxMTE5dXgyNDAzMCx1eDMzOTQ1dXgyMTQ3NnV4MzM4MjksdXgzMTExOXV4MjQwMzB1eDI0MDY2LHV4MjEyNzF1eDM2MzM1LHV4MzE0NDl1eDI5MjYwLHV4MjE1MTh1eDM4NDk4LHV4MjM0ODZ1eDM5MzAyLHV4MjQzMTB1eDMxMTE5LHV4MjAxMTZ1eDE5OTY4LHV4MzExMTl1eDI0MDMwdXgyNDA2NnV4MjAxMTZ1eDE5OTY4dXgyMTI3MXV4MzYzMzV1eDU0dXg1NXV4MjE0OTV1eDY1Mjg4dXgzMzk0NXV4MjE0NzZ1eDMzODI5dXgzMTQ0OXV4MjkyNjB1eDIxNTE4dXg2NTI4OXV4MjQzMTB1eDMxMTE5dXgyMzQ4NnV4MzkzMDJ1eDIxNTE4dXgzODQ5OCx1eDQwNzIzdXgyNzAwNHV4MjEzMDYsdXgyMDExNnV4MTk5Njh1eDI0MTkxdXgyMjMzMCI7czoxNjoibG9jYXRlX21hdGNoX3JvdyI7czoxNjc6IuWFqOWbvSznpo/lt54s6JKZ5Y+k6JClLOemj+W3nuW4gizljJfot68s56uZ54mMLOWQjumZoizlrr7ppoYs5bu256aPLOS6lOS4gCznpo/lt57luILkupTkuIDljJfot682N+WPt++8iOiSmeWPpOiQpeermeeJjOWQju+8ieW7tuemj+WuvummhuWQjumZoizpvJPmpbzljLos5LqU5LiA5bm/5Zy6IjtzOjk6InRhZ19tYXRjaCI7czowOiIiO3M6MTM6InRhZ19tYXRjaF9yb3ciO3M6MDoiIjtzOjY6Inhwb2ludCI7czo5OiIxMTkuMzE1ODUiO3M6NjoieXBvaW50IjtzOjk6IjI2LjA4OTY0MSI7czo4OiJicmFuZF9pZCI7czoxOiIwIjtzOjEzOiJicmFuZF9wcm9tb3RlIjtzOjE6IjAiO319','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('163','','','商品推荐:七匹狼男装','1329337052','sharegoods','44','fanwe','1','0','0','163','0','0','0','0','1','','','','0','Fanwe','0','0','','','ux19971ux21305ux29436,ux32701ux32466ux26381,ux21452ux38754,ux27491ux21697,ux30007ux35013,ux21407ux20215,ux22806ux22871,ux55ux48ux49ux48ux56ux54,ux49ux49ux57ux57,ux52ux46ux51,ux21830ux21697,ux25512ux33616','七匹狼,羽绒服,双面,正品,男装,原价,外套,701086,1199,4.3,商品,推荐','','',' 七匹狼 羽绒服 双面 正品 男装 原价 外套 701086 1199 4.3','0','1','0','网站','','YToyOntzOjM6InVybCI7YTozOntzOjk6ImFwcF9pbmRleCI7czo0OiJzaG9wIjtzOjU6InJvdXRlIjtzOjU6Imdvb2RzIjtzOjU6InBhcmFtIjtzOjU6ImlkPTQ3Ijt9czo0OiJkYXRhIjthOjc1OntzOjI6ImlkIjtzOjI6IjQ3IjtzOjQ6Im5hbWUiO3M6NzQ6IjQuM+aKmOWOn+S7tzExOTnmraPlk4HkuIPljLnni7znlLfoo4Ug5Yas5qy+5aSW5aWX5Y+M6Z2i5Yas576957uS5pyNNzAxMDg2IjtzOjg6InN1Yl9uYW1lIjtzOjE1OiLkuIPljLnni7znlLfoo4UiO3M6NzoiY2F0ZV9pZCI7czoxOiIwIjtzOjExOiJzdXBwbGllcl9pZCI7czoxOiIwIjtzOjM6ImltZyI7czo0NDoiLi9wdWJsaWMvYXR0YWNobWVudC8yMDEyMDEvNGYwMTMyOWQ2MGZhMi5qcGciO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjc2OiI8aW1nIHNyYz0iLi9wdWJsaWMvYXR0YWNobWVudC8yMDEyMDEvNGYwMTMyYjg1ZmJiNC5qcGciIGFsdD0iIiBib3JkZXI9IjAiIC8+IjtzOjEwOiJiZWdpbl90aW1lIjtzOjE6IjAiO3M6ODoiZW5kX3RpbWUiO3M6MToiMCI7czoxMDoibWluX2JvdWdodCI7czoxOiIwIjtzOjEwOiJtYXhfYm91Z2h0IjtzOjE6IjAiO3M6MTU6InVzZXJfbWluX2JvdWdodCI7czoxOiIwIjtzOjE1OiJ1c2VyX21heF9ib3VnaHQiO3M6MToiMCI7czoxMjoib3JpZ2luX3ByaWNlIjtzOjk6IjExOTkuMDAwMCI7czoxMzoiY3VycmVudF9wcmljZSI7czo4OiI1MjUuMDAwMCI7czo3OiJjaXR5X2lkIjtzOjE6IjEiO3M6OToiaXNfY291cG9uIjtzOjE6IjAiO3M6MTE6ImlzX2RlbGl2ZXJ5IjtzOjE6IjEiO3M6OToiaXNfZWZmZWN0IjtzOjE6IjEiO3M6OToiaXNfZGVsZXRlIjtzOjE6IjAiO3M6MTA6InVzZXJfY291bnQiO3M6MToiMSI7czo5OiJidXlfY291bnQiO3M6MToiMSI7czoxMToidGltZV9zdGF0dXMiO3M6MToiMSI7czoxMDoiYnV5X3N0YXR1cyI7czoxOiIxIjtzOjk6ImRlYWxfdHlwZSI7czoxOiIwIjtzOjEzOiJhbGxvd19wcm9tb3RlIjtzOjE6IjAiO3M6MTI6InJldHVybl9tb25leSI7czo2OiIwLjAwMDAiO3M6MTI6InJldHVybl9zY29yZSI7czozOiIzMDAiO3M6NToiYnJpZWYiO3M6MDoiIjtzOjQ6InNvcnQiO3M6MjoiMTEiO3M6MTU6ImRlYWxfZ29vZHNfdHlwZSI7czoxOiI4IjtzOjEyOiJzdWNjZXNzX3RpbWUiO3M6MTA6IjEzMjU0NDk4NTkiO3M6MTc6ImNvdXBvbl9iZWdpbl90aW1lIjtzOjE6IjAiO3M6MTU6ImNvdXBvbl9lbmRfdGltZSI7czoxOiIwIjtzOjQ6ImNvZGUiO3M6MDoiIjtzOjY6IndlaWdodCI7czo2OiIwLjAwMDAiO3M6OToid2VpZ2h0X2lkIjtzOjE6IjEiO3M6MTE6ImlzX3JlZmVycmFsIjtzOjE6IjAiO3M6ODoiYnV5X3R5cGUiO3M6MToiMCI7czo4OiJkaXNjb3VudCI7czo2OiIwLjAwMDAiO3M6NDoiaWNvbiI7czo0NDoiLi9wdWJsaWMvYXR0YWNobWVudC8yMDEyMDEvNGYwMTMyOTgyMjdlYy5qcGciO3M6Njoibm90aWNlIjtzOjE6IjAiO3M6MTM6ImZyZWVfZGVsaXZlcnkiO3M6MToiMCI7czoxNDoiZGVmaW5lX3BheW1lbnQiO3M6MToiMCI7czo5OiJzZW9fdGl0bGUiO3M6MDoiIjtzOjExOiJzZW9fa2V5d29yZCI7czowOiIiO3M6MTU6InNlb19kZXNjcmlwdGlvbiI7czowOiIiO3M6NjoiaXNfaG90IjtzOjE6IjEiO3M6NjoiaXNfbmV3IjtzOjE6IjEiO3M6NzoiaXNfYmVzdCI7czoxOiIxIjtzOjEwOiJpc19sb3R0ZXJ5IjtzOjE6IjAiO3M6NjoicmVvcGVuIjtzOjE6IjAiO3M6NToidW5hbWUiO3M6MDoiIjtzOjEwOiJmb3JiaWRfc21zIjtzOjE6IjAiO3M6OToiY2FydF90eXBlIjtzOjE6IjAiO3M6MTI6InNob3BfY2F0ZV9pZCI7czoyOiIzMSI7czo3OiJpc19zaG9wIjtzOjE6IjEiO3M6MTE6InRvdGFsX3BvaW50IjtzOjE6IjUiO3M6OToiYXZnX3BvaW50IjtzOjE6IjUiO3M6MTE6ImNyZWF0ZV90aW1lIjtzOjEwOiIxMzI1NDQ5ODU4IjtzOjExOiJ1cGRhdGVfdGltZSI7czoxMDoiMTMyNTQ1NjQzMiI7czoxMDoibmFtZV9tYXRjaCI7czozNjY6InV4MTk5NzF1eDIxMzA1dXgyOTQzNix1eDMyNzAxdXgzMjQ2NnV4MjYzODEsdXgyMTQ1MnV4Mzg3NTQsdXgyNzQ5MXV4MjE2OTcsdXgzMDAwN3V4MzUwMTMsdXgyMTQwN3V4MjAyMTUsdXgyMjgwNnV4MjI4NzEsdXg1NXV4NDh1eDQ5dXg0OHV4NTZ1eDU0LHV4NDl1eDQ5dXg1N3V4NTcsdXg1MnV4NDZ1eDUxLHV4NTJ1eDQ2dXg1MXV4MjUyNDB1eDIxNDA3dXgyMDIxNXV4NDl1eDQ5dXg1N3V4NTd1eDI3NDkxdXgyMTY5N3V4MTk5NzF1eDIxMzA1dXgyOTQzNnV4MzAwMDd1eDM1MDEzdXgyMDkwOHV4Mjc0NTR1eDIyODA2dXgyMjg3MXV4MjE0NTJ1eDM4NzU0dXgyMDkwOHV4MzI3MDF1eDMyNDY2dXgyNjM4MXV4NTV1eDQ4dXg0OXV4NDh1eDU2dXg1NCI7czoxNDoibmFtZV9tYXRjaF9yb3ciO3M6MTQ1OiLkuIPljLnni7ws576957uS5pyNLOWPjOmdoizmraPlk4Es55S36KOFLOWOn+S7tyzlpJblpZcsNzAxMDg2LDExOTksNC4zLDQuM+aKmOWOn+S7tzExOTnmraPlk4HkuIPljLnni7znlLfoo4Ug5Yas5qy+5aSW5aWX5Y+M6Z2i5Yas576957uS5pyNNzAxMDg2IjtzOjE1OiJkZWFsX2NhdGVfbWF0Y2giO3M6MDoiIjtzOjE5OiJkZWFsX2NhdGVfbWF0Y2hfcm93IjtzOjA6IiI7czoxNToic2hvcF9jYXRlX21hdGNoIjtzOjY1OiJ1eDI2MzgxdXgzNTAxM3V4NDR1eDIwODY5dXgzNDkxNXV4NDR1eDM3MTk3dXgyMDIxNCx1eDMwMDA3dXgzNTAxMyI7czoxOToic2hvcF9jYXRlX21hdGNoX3JvdyI7czoyNzoi5pyN6KOFLOWGheihoyzphY3ku7Ys55S36KOFIjtzOjEyOiJsb2NhdGVfbWF0Y2giO3M6MTQ6InV4MjA4NDB1eDIyMjY5IjtzOjE2OiJsb2NhdGVfbWF0Y2hfcm93IjtzOjY6IuWFqOWbvSI7czo5OiJ0YWdfbWF0Y2giO3M6NjY6InV4NDA2NTd1eDMzMzk0LHV4MzYyMjl1eDIyODIzdXgzMDcyMSx1eDIyODIzdXgzMDcyMSx1eDIwMDEzdXgzMDcyMSI7czoxMzoidGFnX21hdGNoX3JvdyI7czozMDoi6buR6ImyLOi2heWkp+eggSzlpKfnoIEs5Lit56CBIjtzOjY6Inhwb2ludCI7czowOiIiO3M6NjoieXBvaW50IjtzOjA6IiI7czo4OiJicmFuZF9pZCI7czoyOiIxMiI7czoxMzoiYnJhbmRfcHJvbW90ZSI7czoxOiIwIjt9fQ==','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('164','','很美的地方，有机会一定要去看看','很美的地方，有机会一定要去看看[强][强]','1331937682','share','44','fanwe','1','0','0','164','0','0','0','0','6','','','','0','Array','0','1','','','ux33258ux21161ux28216,ux26053ux34892,ux32654ux30340,ux19968ux23450,ux26426ux20250,ux30475ux30475,ux22320ux26041','自助游,旅行,美的,一定,机会,看看,地方','','',' 自助游 旅行','1','1','0','网站','','','','1','1','1','','0','0','ux20241ux38386ux23089ux20048,ux20048ux20139ux32654ux39135,ux26053ux28216ux37202ux24215,ux37117ux24066ux36141ux29289,ux24184ux31119ux23621ux23478,ux28010ux28459ux23130ux24651,ux29609ux20048ux24110ux27966','休闲娱乐,乐享美食,旅游酒店,都市购物,幸福居家,浪漫婚恋,玩乐帮派','','2','a:2:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/14/94856efdccc3994d42c406b2d519e03480_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/14/94856efdccc3994d42c406b2d519e03480.jpg\";s:5:\"width\";s:3:\"750\";s:6:\"height\";s:3:\"497\";s:2:\"id\";s:3:\"128\";}i:1;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/14/07109f2cb2018941eab28ab7093d87ac36_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/14/07109f2cb2018941eab28ab7093d87ac36.jpg\";s:5:\"width\";s:3:\"750\";s:6:\"height\";s:3:\"499\";s:2:\"id\";s:3:\"129\";}}','0','a:12:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:22:\"那个地方很美~❤\";s:4:\"memo\";s:626:\"✿趁我们还年轻，多出去走动走动。发现某个地方 某个角落很美✿\r\n\r\n✿ 那便是一种买再多再贵的东西都得不到的感觉✿\r\n\r\n1、姐妹们可以将自己喜欢任何的城市、任何小店...介绍给大家~\r\n\r\n2、要有理由和感想哦~\r\n\r\n3、附有自己拍的照片~	\r\n	\r\n    ✿喜欢旅游，喜欢美丽的景色，喜欢一切美好事物的朋友们一定要来哟~✿\r\n\r\n    ✿本小组是在情人节创建的 嘿嘿~✿\r\n\r\n    ✿希望本小组可以慢慢的壮大~	✿\r\n\r\n✿喜欢把那一幅幅美丽的画面制成明信片，喜欢收集各色各样的明信片✿\";s:4:\"sort\";s:1:\"1\";s:11:\"create_time\";s:10:\"1331937520\";s:7:\"cate_id\";s:1:\"3\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"7\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f643167c6a86.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f64316f2da12.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('165','','不是寺庙的寺庙——西藏宗山古堡','似乎，我从西藏回来，已经好久了。\r\n\r\n迟迟没有动笔，我不承认是因为懒。\r\n\r\n我是怕写不出动人之处，让大家失望，也让自己失望。\r\n\r\n终于，非要等到该忘记的几乎全忘了，才想着该下笔了。\r\n\r\n关于照片，我们一路都在后悔没把相机说明书带出来，再加上照片几乎都是在车上拍的，我也不会什么ps，所以也就不强求什么质量。','1331938077','share','44','fanwe','1','0','0','165','0','0','0','0','0','','','','0','share','0','0','','','ux26053ux34892,ux35199ux34255,ux23546ux24217,ux22833ux26395,ux20960ux20046,ux29031ux29255,ux20160ux20040,ux19979ux31508,ux21160ux31508,ux20986ux21160,ux24378ux27714,ux36831ux36831','旅行,西藏,寺庙,失望,几乎,照片,什么,下笔,动笔,出动,强求,迟迟','','',' 旅行 西藏 寺庙','1','1','0','网站','','','','1','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('166','','海是倒过来的天空','这是在船上拍的。\r\n当时正是日落时分。可是船却是逆着日落的方向前行着。\r\n这场日落持续了很久很久很久[爱心][爱心]','1331938194','share','46','fzmatthew','1','0','0','166','0','0','0','0','0','','','','0','share','0','0','','','ux26085ux33853,ux22823ux28023,ux22825ux31354,ux29233ux24515,ux33337ux19978,ux26102ux20998,ux21069ux34892,ux36825ux22330,ux21364ux26159,ux27491ux26159,ux24403ux26102,ux21487ux26159','日落,大海,天空,爱心,船上,时分,前行,这场,却是,正是,当时,可是','','',' 日落 大海 天空','1','1','0','网站','','','','1','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('167','','','','1331938209','share','46','fzmatthew','1','0','0','164','0','0','0','0','0','','','','0','share','164','0','','','','','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('168','','我们❤家要像这样-客厅篇','心爱的客厅~有咪咪小盆友，是从日本来的哦，我把他领养回来，但…','1331938359','share','44','fanwe','1','0','0','168','0','0','0','0','0','','','','0','Array','0','0','','','ux26085ux31995,ux29483ux21674,ux23478ux23621,ux37329ux40060,ux24515ux29233,ux36824ux26377,ux30406,ux33537ux22766ux25104ux38271,ux26085ux26412,ux26080ux31351ux26080ux23613,ux39046ux20859,ux21674ux21674,ux31383ux21488','日系,猫咪,家居,金鱼,心爱,还有,盆,茁壮成长,日本,无穷无尽,领养,咪咪,窗台','','',' 日系 猫咪 家居','1','1','0','网站','','','','2','0','0','','0','0','ux20241ux38386ux23089ux20048,ux20048ux20139ux32654ux39135,ux26053ux28216ux37202ux24215,ux37117ux24066ux36141ux29289,ux24184ux31119ux23621ux23478,ux28010ux28459ux23130ux24651,ux29609ux20048ux24110ux27966','休闲娱乐,乐享美食,旅游酒店,都市购物,幸福居家,浪漫婚恋,玩乐帮派','','2','a:2:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/14/3d90ef28d42571b28151e30b47af58da56_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/14/3d90ef28d42571b28151e30b47af58da56.jpg\";s:5:\"width\";s:3:\"468\";s:6:\"height\";s:3:\"467\";s:2:\"id\";s:3:\"133\";}i:1;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/14/a4b94ac22fec6b6cc76d8c0bf5283cb316_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/14/a4b94ac22fec6b6cc76d8c0bf5283cb316.jpg\";s:5:\"width\";s:3:\"468\";s:6:\"height\";s:3:\"467\";s:2:\"id\";s:3:\"134\";}}','0','a:12:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:24:\"我们❤家要像这样\";s:4:\"memo\";s:630:\"你是恋物控吗？\r\n你喜欢搜集温馨的家居小物吗？\r\n你喜欢装扮自己的小家吗？\r\n欢迎姑娘们加入这个小组～为这里添砖加瓦 \r\n一起讨论自己的小家， 自己的小店，自己的房间要长成什么样：）	\r\n~~~~~~~~~~~~~~~~~~~	\r\n❤温馨提醒❤：\r\n为了方便大家查找自己喜欢的类别信息，请大家按照以下形式写主题哦~\r\n{我们❤家要像这样-色彩篇}\r\n{我们❤家要像这样-原木篇}\r\n{我们❤家要像这样-地中海篇}\r\n{我们❤家要像这样-饰物篇}\r\n待补充。。。\r\n小组还在起步阶段 期待大家的加入与分享！\";s:4:\"sort\";s:1:\"2\";s:11:\"create_time\";s:10:\"1331937599\";s:7:\"cate_id\";s:1:\"1\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"5\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f6431b8f2030.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f6431bded69f.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('169','','节省空间篇','别看房子小 装修有妙招','1331938416','share','44','fanwe','1','0','0','169','0','0','0','0','0','','','','0','share','0','0','','','ux31616ux32422,ux33410ux30465ux31354ux38388,ux23478ux23621,ux22937ux25307,ux25151ux23376,ux35013ux20462','简约,节省空间,家居,妙招,房子,装修','','',' 简约 节省空间 家居','1','1','0','网站','','','','2','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('170','','很美的清江河。','很美的清江河。','1331938485','share','44','fanwe','1','0','0','170','0','0','0','0','0','','','','0','share','0','0','','','ux32654ux30340,ux27743ux27827','美的,江河','','','','1','1','0','网站','','','','1','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('171','','很美丽的日落','很美丽的日落[得意][得意]','1331938803','share','44','fanwe','1','0','0','171','0','0','0','0','0','','','','0','Array','0','0','','','ux40644ux26127,ux25668ux24433,ux24471ux24847,ux26085ux33853,ux32654ux20029','黄昏,摄影,得意,日落,美丽','','',' 黄昏 摄影','1','1','0','网站','','','','1','0','0','','0','0','','','','2','a:2:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/14/94ea06c2948de50688a0828c6eeb626a79_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/14/94ea06c2948de50688a0828c6eeb626a79.jpg\";s:5:\"width\";s:4:\"1280\";s:6:\"height\";s:3:\"853\";s:2:\"id\";s:3:\"137\";}i:1;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/14/2d7e5b9d69685d315df2cfec70aa7bbe58_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/14/2d7e5b9d69685d315df2cfec70aa7bbe58.jpg\";s:5:\"width\";s:4:\"1280\";s:6:\"height\";s:3:\"853\";s:2:\"id\";s:3:\"138\";}}','0','a:12:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:22:\"那个地方很美~❤\";s:4:\"memo\";s:626:\"✿趁我们还年轻，多出去走动走动。发现某个地方 某个角落很美✿\r\n\r\n✿ 那便是一种买再多再贵的东西都得不到的感觉✿\r\n\r\n1、姐妹们可以将自己喜欢任何的城市、任何小店...介绍给大家~\r\n\r\n2、要有理由和感想哦~\r\n\r\n3、附有自己拍的照片~	\r\n	\r\n    ✿喜欢旅游，喜欢美丽的景色，喜欢一切美好事物的朋友们一定要来哟~✿\r\n\r\n    ✿本小组是在情人节创建的 嘿嘿~✿\r\n\r\n    ✿希望本小组可以慢慢的壮大~	✿\r\n\r\n✿喜欢把那一幅幅美丽的画面制成明信片，喜欢收集各色各样的明信片✿\";s:4:\"sort\";s:1:\"1\";s:11:\"create_time\";s:10:\"1331937520\";s:7:\"cate_id\";s:1:\"3\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"7\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f643167c6a86.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f64316f2da12.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('172','','在小岛旅行！','蜈支洲码头：乘坐10分钟游轮抵岛，很漂亮的地方，只是有点晕船…','1331938903','share','44','fanwe','1','0','0','172','0','0','0','0','0','','','','0','Array','0','0','','','ux33258ux21161ux28216,ux26053ux34892,ux23567ux23707,ux22823ux28023,ux26197ux33337,ux28216ux36718,ux23707ux19978,ux20056ux22352,ux30721ux22836,ux21628ux21628,ux26377ux28857,ux21482ux26159,ux20998ux38047,ux28418ux20142','自助游,旅行,小岛,大海,晕船,游轮,岛上,乘坐,码头,呼呼,有点,只是,分钟,漂亮','','',' 自助游 旅行 小岛 大海','1','1','0','网站','','','','1','0','0','','0','0','ux20241ux38386ux23089ux20048,ux20048ux20139ux32654ux39135,ux26053ux28216ux37202ux24215,ux37117ux24066ux36141ux29289,ux24184ux31119ux23621ux23478,ux28010ux28459ux23130ux24651,ux29609ux20048ux24110ux27966','休闲娱乐,乐享美食,旅游酒店,都市购物,幸福居家,浪漫婚恋,玩乐帮派','','1','a:1:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/15/46a5beee2cd270c475466c10a121db9219_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/15/46a5beee2cd270c475466c10a121db9219.jpg\";s:5:\"width\";s:3:\"468\";s:6:\"height\";s:3:\"350\";s:2:\"id\";s:3:\"139\";}}','0','a:12:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:22:\"那个地方很美~❤\";s:4:\"memo\";s:626:\"✿趁我们还年轻，多出去走动走动。发现某个地方 某个角落很美✿\r\n\r\n✿ 那便是一种买再多再贵的东西都得不到的感觉✿\r\n\r\n1、姐妹们可以将自己喜欢任何的城市、任何小店...介绍给大家~\r\n\r\n2、要有理由和感想哦~\r\n\r\n3、附有自己拍的照片~	\r\n	\r\n    ✿喜欢旅游，喜欢美丽的景色，喜欢一切美好事物的朋友们一定要来哟~✿\r\n\r\n    ✿本小组是在情人节创建的 嘿嘿~✿\r\n\r\n    ✿希望本小组可以慢慢的壮大~	✿\r\n\r\n✿喜欢把那一幅幅美丽的画面制成明信片，喜欢收集各色各样的明信片✿\";s:4:\"sort\";s:1:\"1\";s:11:\"create_time\";s:10:\"1331937520\";s:7:\"cate_id\";s:1:\"3\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"7\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f643167c6a86.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f64316f2da12.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('173','','在云端','在云端','1331938956','share','44','fanwe','1','0','0','173','0','0','0','0','0','','','','0','Array','0','0','','','ux20113ux31471,ux39134ux26426,ux26053ux34892','云端,飞机,旅行','','',' 云端 飞机 旅行','1','1','0','网站','','','','1','0','0','','0','0','','','','1','a:1:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/15/66521bf2db57360ac27fd9fddfdffd1969_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/15/66521bf2db57360ac27fd9fddfdffd1969.jpg\";s:5:\"width\";s:3:\"468\";s:6:\"height\";s:3:\"625\";s:2:\"id\";s:3:\"140\";}}','0','a:12:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:22:\"那个地方很美~❤\";s:4:\"memo\";s:626:\"✿趁我们还年轻，多出去走动走动。发现某个地方 某个角落很美✿\r\n\r\n✿ 那便是一种买再多再贵的东西都得不到的感觉✿\r\n\r\n1、姐妹们可以将自己喜欢任何的城市、任何小店...介绍给大家~\r\n\r\n2、要有理由和感想哦~\r\n\r\n3、附有自己拍的照片~	\r\n	\r\n    ✿喜欢旅游，喜欢美丽的景色，喜欢一切美好事物的朋友们一定要来哟~✿\r\n\r\n    ✿本小组是在情人节创建的 嘿嘿~✿\r\n\r\n    ✿希望本小组可以慢慢的壮大~	✿\r\n\r\n✿喜欢把那一幅幅美丽的画面制成明信片，喜欢收集各色各样的明信片✿\";s:4:\"sort\";s:1:\"1\";s:11:\"create_time\";s:10:\"1331937520\";s:7:\"cate_id\";s:1:\"3\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"7\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f643167c6a86.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f64316f2da12.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('174','','愤怒的小鸟','[得意][得意]','1331939026','share','44','fanwe','1','0','0','174','0','0','0','0','0','','','','0','Array','0','0','','','ux24471ux24847','得意','','','','1','1','0','网站','','','','2','0','0','','0','0','','','','1','a:1:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/15/10a8df3b7f89e9d770e7f15f1db5cd3120_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/15/10a8df3b7f89e9d770e7f15f1db5cd3120.jpg\";s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"500\";s:2:\"id\";s:3:\"141\";}}','0','a:12:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:24:\"我们❤家要像这样\";s:4:\"memo\";s:630:\"你是恋物控吗？\r\n你喜欢搜集温馨的家居小物吗？\r\n你喜欢装扮自己的小家吗？\r\n欢迎姑娘们加入这个小组～为这里添砖加瓦 \r\n一起讨论自己的小家， 自己的小店，自己的房间要长成什么样：）	\r\n~~~~~~~~~~~~~~~~~~~	\r\n❤温馨提醒❤：\r\n为了方便大家查找自己喜欢的类别信息，请大家按照以下形式写主题哦~\r\n{我们❤家要像这样-色彩篇}\r\n{我们❤家要像这样-原木篇}\r\n{我们❤家要像这样-地中海篇}\r\n{我们❤家要像这样-饰物篇}\r\n待补充。。。\r\n小组还在起步阶段 期待大家的加入与分享！\";s:4:\"sort\";s:1:\"2\";s:11:\"create_time\";s:10:\"1331937599\";s:7:\"cate_id\";s:1:\"1\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"5\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f6431b8f2030.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f6431bded69f.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('175','','它在干什么？','它在干什么？[白眼][白眼]','1331939071','share','44','fanwe','1','0','0','175','0','0','0','0','0','','','','0','Array','0','0','','','ux23456ux29289,ux29483ux21674,ux30333ux30524,ux24178ux20160ux20040','宠物,猫咪,白眼,干什么','','',' 宠物 猫咪','1','1','0','网站','','','','2','0','0','','0','0','','','','1','a:1:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/15/3036d0a4d5c61784b4fff657cacbc36396_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/15/3036d0a4d5c61784b4fff657cacbc36396.jpg\";s:5:\"width\";s:4:\"1024\";s:6:\"height\";s:3:\"768\";s:2:\"id\";s:3:\"142\";}}','0','a:12:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:24:\"我们❤家要像这样\";s:4:\"memo\";s:630:\"你是恋物控吗？\r\n你喜欢搜集温馨的家居小物吗？\r\n你喜欢装扮自己的小家吗？\r\n欢迎姑娘们加入这个小组～为这里添砖加瓦 \r\n一起讨论自己的小家， 自己的小店，自己的房间要长成什么样：）	\r\n~~~~~~~~~~~~~~~~~~~	\r\n❤温馨提醒❤：\r\n为了方便大家查找自己喜欢的类别信息，请大家按照以下形式写主题哦~\r\n{我们❤家要像这样-色彩篇}\r\n{我们❤家要像这样-原木篇}\r\n{我们❤家要像这样-地中海篇}\r\n{我们❤家要像这样-饰物篇}\r\n待补充。。。\r\n小组还在起步阶段 期待大家的加入与分享！\";s:4:\"sort\";s:1:\"2\";s:11:\"create_time\";s:10:\"1331937599\";s:7:\"cate_id\";s:1:\"1\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"5\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f6431b8f2030.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f6431bded69f.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('176','','这部电影叫什么？','这部电影叫什么？[奋斗][奋斗]','1331939121','share','44','fanwe','1','0','0','176','0','0','0','0','0','','','','0','Array','0','0','','','ux22859ux26007,ux36825ux37096,ux20160ux20040,ux30005ux24433','奋斗,这部,什么,电影','','','','1','1','0','网站','','','','2','0','0','','0','0','','','','1','a:1:{i:0;a:5:{s:4:\"path\";s:76:\"./public/comment/201203/17/15/c3cd163b781bba9c27f6599b33d2b3b815_100x100.jpg\";s:6:\"o_path\";s:68:\"./public/comment/201203/17/15/c3cd163b781bba9c27f6599b33d2b3b815.jpg\";s:5:\"width\";s:3:\"600\";s:6:\"height\";s:3:\"891\";s:2:\"id\";s:3:\"143\";}}','0','a:12:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:24:\"我们❤家要像这样\";s:4:\"memo\";s:630:\"你是恋物控吗？\r\n你喜欢搜集温馨的家居小物吗？\r\n你喜欢装扮自己的小家吗？\r\n欢迎姑娘们加入这个小组～为这里添砖加瓦 \r\n一起讨论自己的小家， 自己的小店，自己的房间要长成什么样：）	\r\n~~~~~~~~~~~~~~~~~~~	\r\n❤温馨提醒❤：\r\n为了方便大家查找自己喜欢的类别信息，请大家按照以下形式写主题哦~\r\n{我们❤家要像这样-色彩篇}\r\n{我们❤家要像这样-原木篇}\r\n{我们❤家要像这样-地中海篇}\r\n{我们❤家要像这样-饰物篇}\r\n待补充。。。\r\n小组还在起步阶段 期待大家的加入与分享！\";s:4:\"sort\";s:1:\"2\";s:11:\"create_time\";s:10:\"1331937599\";s:7:\"cate_id\";s:1:\"1\";s:10:\"user_count\";s:1:\"1\";s:11:\"topic_count\";s:1:\"5\";s:4:\"icon\";s:50:\"./public/attachment/201203/17/14/4f6431b8f2030.jpg\";s:5:\"image\";s:50:\"./public/attachment/201203/17/14/4f6431bded69f.jpg\";s:9:\"is_effect\";s:1:\"1\";s:7:\"user_id\";s:2:\"44\";}');
INSERT INTO `%DB_PREFIX%topic` VALUES ('177','对爱琴海餐厅发表了点评','','上周去吃过，感觉不错。推荐这家餐厅[坏笑]','1333241498','slocationcomment','44','fanwe','1','0','0','177','0','0','0','0','0','youhui','store#view','id=15','0','share','0','0','','','ux36825ux23478,ux19978ux21608,ux39184ux21381,ux19981ux38169,ux24863ux35273,ux25512ux33616,ux29233ux29748ux28023,ux28857ux35780,ux21457ux34920,ux23545ux29233ux29748ux28023ux39184ux21381ux21457ux34920ux20102ux28857ux35780','这家,上周,餐厅,不错,感觉,推荐,爱琴海,点评,发表,对爱琴海餐厅发表了点评','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('178','对爱琴海餐厅发表了点评','','非常好非常好非常好非常好非常好非常好非常好','1333241553','slocationcomment','44','fanwe','1','0','0','178','0','0','0','0','0','youhui','store#view','id=15','0','share','0','0','','','ux38750ux24120,ux29233ux29748ux28023,ux39184ux21381,ux28857ux35780,ux21457ux34920,ux23545ux29233ux29748ux28023ux39184ux21381ux21457ux34920ux20102ux28857ux35780','非常,爱琴海,餐厅,点评,发表,对爱琴海餐厅发表了点评','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
INSERT INTO `%DB_PREFIX%topic` VALUES ('179','对爱琴海餐厅发表了点评','','一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般一般般','1333241576','slocationcomment','44','fanwe','1','0','0','179','0','0','0','0','0','youhui','store#view','id=15','0','share','0','0','','','ux19968ux33324ux33324,ux29233ux29748ux28023,ux39184ux21381,ux28857ux35780,ux21457ux34920,ux23545ux29233ux29748ux28023ux39184ux21381ux21457ux34920ux20102ux28857ux35780','一般般,爱琴海,餐厅,点评,发表,对爱琴海餐厅发表了点评','','','','0','0','0','网站','','','','0','0','0','','0','0','','','','0','','0','');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_cate_link`;
CREATE TABLE `%DB_PREFIX%topic_cate_link` (
  `topic_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('133','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('134','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('135','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('136','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('137','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('146','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('147','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('148','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('152','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('164','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('168','7');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','1');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','2');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','3');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','4');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','5');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','6');
INSERT INTO `%DB_PREFIX%topic_cate_link` VALUES ('172','7');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_group`;
CREATE TABLE `%DB_PREFIX%topic_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `memo` text NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `user_count` int(11) NOT NULL,
  `topic_count` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_group` VALUES ('1','那个地方很美~❤','✿趁我们还年轻，多出去走动走动。发现某个地方 某个角落很美✿\r\n\r\n✿ 那便是一种买再多再贵的东西都得不到的感觉✿\r\n\r\n1、姐妹们可以将自己喜欢任何的城市、任何小店...介绍给大家~\r\n\r\n2、要有理由和感想哦~\r\n\r\n3、附有自己拍的照片~	\r\n	\r\n    ✿喜欢旅游，喜欢美丽的景色，喜欢一切美好事物的朋友们一定要来哟~✿\r\n\r\n    ✿本小组是在情人节创建的 嘿嘿~✿\r\n\r\n    ✿希望本小组可以慢慢的壮大~	✿\r\n\r\n✿喜欢把那一幅幅美丽的画面制成明信片，喜欢收集各色各样的明信片✿','1','1331937520','3','1','7','./public/attachment/201203/17/14/4f643167c6a86.jpg','./public/attachment/201203/17/14/4f64316f2da12.jpg','1','44');
INSERT INTO `%DB_PREFIX%topic_group` VALUES ('2','我们❤家要像这样','你是恋物控吗？\r\n你喜欢搜集温馨的家居小物吗？\r\n你喜欢装扮自己的小家吗？\r\n欢迎姑娘们加入这个小组～为这里添砖加瓦 \r\n一起讨论自己的小家， 自己的小店，自己的房间要长成什么样：）	\r\n~~~~~~~~~~~~~~~~~~~	\r\n❤温馨提醒❤：\r\n为了方便大家查找自己喜欢的类别信息，请大家按照以下形式写主题哦~\r\n{我们❤家要像这样-色彩篇}\r\n{我们❤家要像这样-原木篇}\r\n{我们❤家要像这样-地中海篇}\r\n{我们❤家要像这样-饰物篇}\r\n待补充。。。\r\n小组还在起步阶段 期待大家的加入与分享！','2','1331937599','1','1','5','./public/attachment/201203/17/14/4f6431b8f2030.jpg','./public/attachment/201203/17/14/4f6431bded69f.jpg','1','44');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_group_cate`;
CREATE TABLE `%DB_PREFIX%topic_group_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `group_count` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_group_cate` VALUES ('1','时尚','1','','1','1');
INSERT INTO `%DB_PREFIX%topic_group_cate` VALUES ('2','美食','2','','0','1');
INSERT INTO `%DB_PREFIX%topic_group_cate` VALUES ('3','旅行','3','','1','1');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_image`;
CREATE TABLE `%DB_PREFIX%topic_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `topic_table` varchar(255) NOT NULL,
  `o_path` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('78','131','ch1.jpg','25250','1328311856','44','fanwe','./public/comment/201202/04/15/5d1b7f7e0a1ea52700cd53df79a7e32524_100x100.jpg','topic','./public/comment/201202/04/15/5d1b7f7e0a1ea52700cd53df79a7e32524.jpg','510','415');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('79','131','ch2.jpg','15125','1328311863','44','fanwe','./public/comment/201202/04/15/5d7e4407af01370b957421ddace76cf379_100x100.jpg','topic','./public/comment/201202/04/15/5d7e4407af01370b957421ddace76cf379.jpg','450','450');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('80','131','ch3.jpg','29240','1328311866','44','fanwe','./public/comment/201202/04/15/0af5bbe43efe7b6dea9ee468248c560e68_100x100.jpg','topic','./public/comment/201202/04/15/0af5bbe43efe7b6dea9ee468248c560e68.jpg','510','361');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('81','131','ch4.jpg','53319','1328311869','44','fanwe','./public/comment/201202/04/15/ad3223eb6ae4b63cf16e62b39f3db04897_100x100.jpg','topic','./public/comment/201202/04/15/ad3223eb6ae4b63cf16e62b39f3db04897.jpg','510','468');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('82','131','ch5.jpg','29240','1328311872','44','fanwe','./public/comment/201202/04/15/7d349340f511f2999a8344c335b14d4274_100x100.jpg','topic','./public/comment/201202/04/15/7d349340f511f2999a8344c335b14d4274.jpg','510','361');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('83','132','sy.jpg','207495','1328312045','44','fanwe','./public/comment/201202/04/15/ea03ad310dcbe85c691ac13bf836361778_100x100.jpg','topic','./public/comment/201202/04/15/ea03ad310dcbe85c691ac13bf836361778.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('84','132','sy2.jpg','213082','1328312049','44','fanwe','./public/comment/201202/04/15/a03b1900ae539db09b9d3e90463b0c5160_100x100.jpg','topic','./public/comment/201202/04/15/a03b1900ae539db09b9d3e90463b0c5160.jpg','1280','738');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('85','133','hc2.jpg','106345','1328312146','44','fanwe','./public/comment/201202/04/15/7c00633a7f05b0445cd86bf1624dcb2558_100x100.jpg','topic','./public/comment/201202/04/15/7c00633a7f05b0445cd86bf1624dcb2558.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('86','133','hc3.jpg','104056','1328312149','44','fanwe','./public/comment/201202/04/15/01df8dd4bda5c2eac50b99ee9570d97978_100x100.jpg','topic','./public/comment/201202/04/15/01df8dd4bda5c2eac50b99ee9570d97978.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('87','133','hc4.jpg','99763','1328312153','44','fanwe','./public/comment/201202/04/15/0c51bb5f59f5b09a653d09080337871727_100x100.jpg','topic','./public/comment/201202/04/15/0c51bb5f59f5b09a653d09080337871727.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('88','133','hc.jpg','98412','1328312157','44','fanwe','./public/comment/201202/04/15/0ef50d2c26dab3da41a5a871aa82abbf95_100x100.jpg','topic','./public/comment/201202/04/15/0ef50d2c26dab3da41a5a871aa82abbf95.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('89','134','qkl3.jpg','268598','1328312239','44','fanwe','./public/comment/201202/04/15/d0ae28178ea3867e7722580634aa565767_100x100.jpg','topic','./public/comment/201202/04/15/d0ae28178ea3867e7722580634aa565767.jpg','1280','960');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('90','134','qkl.jpg','11083','1328312245','44','fanwe','./public/comment/201202/04/15/625f35e65814061ddef9a251276c8dd691_100x100.jpg','topic','./public/comment/201202/04/15/625f35e65814061ddef9a251276c8dd691.jpg','200','150');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('91','135','cw2.jpg','127358','1328312346','44','fanwe','./public/comment/201202/04/15/b9463eeb39987ca7e4d7726e9dccd72661_100x100.jpg','topic','./public/comment/201202/04/15/b9463eeb39987ca7e4d7726e9dccd72661.jpg','1024','768');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('92','135','cw3.jpg','146724','1328312350','44','fanwe','./public/comment/201202/04/15/5ca45df4a76eb9d1ee02fbe1a76b1b8c88_100x100.jpg','topic','./public/comment/201202/04/15/5ca45df4a76eb9d1ee02fbe1a76b1b8c88.jpg','1024','768');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('93','135','cw.jpg','91359','1328312353','44','fanwe','./public/comment/201202/04/15/fcfa3bc75df97377b5d22f663cfbdaae20_100x100.jpg','topic','./public/comment/201202/04/15/fcfa3bc75df97377b5d22f663cfbdaae20.jpg','500','639');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('94','136','dy2.jpg','219162','1328312478','44','fanwe','./public/comment/201202/04/15/3ed4cb6547a6a2a20237b55adf94d15594_100x100.jpg','topic','./public/comment/201202/04/15/3ed4cb6547a6a2a20237b55adf94d15594.jpg','1280','852');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('95','136','dy3.jpg','268797','1328312482','44','fanwe','./public/comment/201202/04/15/b517bda8ae56a6d36582a190fea06d2185_100x100.jpg','topic','./public/comment/201202/04/15/b517bda8ae56a6d36582a190fea06d2185.jpg','1280','852');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('96','136','dy4.jpg','10924','1328312484','44','fanwe','./public/comment/201202/04/15/19fdde7cba47936c9e998a85df85ce8686_100x100.jpg','topic','./public/comment/201202/04/15/19fdde7cba47936c9e998a85df85ce8686.jpg','200','133');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('97','136','dy.jpg','174286','1328312488','44','fanwe','./public/comment/201202/04/15/3664834a17d5d7d890bfcabb3e764e0f75_100x100.jpg','topic','./public/comment/201202/04/15/3664834a17d5d7d890bfcabb3e764e0f75.jpg','1280','855');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('98','137','fn2.jpg','50526','1328312574','44','fanwe','./public/comment/201202/04/15/be2c85548ad5fca063bd9d1d6add1faa13_100x100.jpg','topic','./public/comment/201202/04/15/be2c85548ad5fca063bd9d1d6add1faa13.jpg','500','500');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('99','137','fn3.jpg','52533','1328312579','44','fanwe','./public/comment/201202/04/15/05891ca45a216fc5aed6280bcaad084b93_100x100.jpg','topic','./public/comment/201202/04/15/05891ca45a216fc5aed6280bcaad084b93.jpg','500','500');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('100','137','fn4.jpg','48558','1328312581','44','fanwe','./public/comment/201202/04/15/822c1f3758e4b32e4327fbdb987a5b2d74_100x100.jpg','topic','./public/comment/201202/04/15/822c1f3758e4b32e4327fbdb987a5b2d74.jpg','500','500');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('101','137','fn5.jpg','59060','1328312584','44','fanwe','./public/comment/201202/04/15/13ba7fa8f7da90cd70f28d0296eed81073_100x100.jpg','topic','./public/comment/201202/04/15/13ba7fa8f7da90cd70f28d0296eed81073.jpg','500','500');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('102','137','fn.jpg','52061','1328312587','44','fanwe','./public/comment/201202/04/15/8b44310b7de3c540d24aabcfff97465f84_100x100.jpg','topic','./public/comment/201202/04/15/8b44310b7de3c540d24aabcfff97465f84.jpg','500','500');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('103','144','1546566505-1862554.jpg','164816','1328315193','45','fz云淡风轻','./public/comment/201202/04/16/381b79ce992fb34191c9b9559b0fb9ea53_100x100.jpg','topic','./public/comment/201202/04/16/381b79ce992fb34191c9b9559b0fb9ea53.jpg','800','1066');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('104','145','1611441045-1877915.jpg','280015','1328315222','45','fz云淡风轻','./public/comment/201202/04/16/f20cce9abe05d5def08330b5103a832580_100x100.jpg','topic','./public/comment/201202/04/16/f20cce9abe05d5def08330b5103a832580.jpg','1280','800');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('105','146','xc.jpg','140492','1328315276','45','fz云淡风轻','./public/comment/201202/04/16/a69a84427dd071df105eeb4bdf3f537a69_100x100.jpg','topic','./public/comment/201202/04/16/a69a84427dd071df105eeb4bdf3f537a69.jpg','600','885');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('106','147','ddy1.jpg','90877','1328315326','45','fz云淡风轻','./public/comment/201202/04/16/2bb1fba7bd9e10b01fea8a248d15129213_100x100.jpg','topic','./public/comment/201202/04/16/2bb1fba7bd9e10b01fea8a248d15129213.jpg','600','891');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('107','147','ddy2.jpg','67815','1328315329','45','fz云淡风轻','./public/comment/201202/04/16/52ffbe9fa4d1d960db5ed6fb4dd41ec676_100x100.jpg','topic','./public/comment/201202/04/16/52ffbe9fa4d1d960db5ed6fb4dd41ec676.jpg','600','251');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('108','147','dy3.jpg','268797','1328315333','45','fz云淡风轻','./public/comment/201202/04/16/4c5971b0370e739c71ea9d0f5e2e35e257_100x100.jpg','topic','./public/comment/201202/04/16/4c5971b0370e739c71ea9d0f5e2e35e257.jpg','1280','852');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('109','148','ddy3.jpg','99657','1328315341','45','fz云淡风轻','./public/comment/201202/04/16/347ba3d76c8cd114c26edd0097f657f168_100x100.jpg','topic','./public/comment/201202/04/16/347ba3d76c8cd114c26edd0097f657f168.jpg','600','400');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('110','149','jp2.jpg','116380','1328315535','45','fz云淡风轻','./public/comment/201202/04/16/a6808a103a19a445758c19031101371027_100x100.jpg','topic','./public/comment/201202/04/16/a6808a103a19a445758c19031101371027.jpg','560','493');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('111','149','jp3.jpg','142457','1328315539','45','fz云淡风轻','./public/comment/201202/04/16/47b1e49026ba7978bfa66545d0b25b7375_100x100.jpg','topic','./public/comment/201202/04/16/47b1e49026ba7978bfa66545d0b25b7375.jpg','560','465');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('112','149','jp4.jpg','69293','1328315542','45','fz云淡风轻','./public/comment/201202/04/16/2bb76d2bce44ef4405afcf26ed4d8c3511_100x100.jpg','topic','./public/comment/201202/04/16/2bb76d2bce44ef4405afcf26ed4d8c3511.jpg','562','456');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('113','150','cww.jpg','82015','1328315598','45','fz云淡风轻','./public/comment/201202/04/16/9aa15c792e0050e557ae6204329ff2ef98_100x100.jpg','topic','./public/comment/201202/04/16/9aa15c792e0050e557ae6204329ff2ef98.jpg','480','360');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('114','150','cwww.jpg','68014','1328315601','45','fz云淡风轻','./public/comment/201202/04/16/8a91e74d3723d560b792bdbb65a1211d78_100x100.jpg','topic','./public/comment/201202/04/16/8a91e74d3723d560b792bdbb65a1211d78.jpg','510','385');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('115','151','sh.jpg','91364','1328315647','45','fz云淡风轻','./public/comment/201202/04/16/e7e31636c26893863eb22f204351c0e535_100x100.jpg','topic','./public/comment/201202/04/16/e7e31636c26893863eb22f204351c0e535.jpg','510','515');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('116','151','sh2.jpg','101034','1328315651','45','fz云淡风轻','./public/comment/201202/04/16/c227a7c72c7780733ddccff8d987a0ef45_100x100.jpg','topic','./public/comment/201202/04/16/c227a7c72c7780733ddccff8d987a0ef45.jpg','510','517');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('117','152','lx1.jpg','167536','1328315717','45','fz云淡风轻','./public/comment/201202/04/16/59da51816b4eb48e835a9c7dffcf5fa880_100x100.jpg','topic','./public/comment/201202/04/16/59da51816b4eb48e835a9c7dffcf5fa880.jpg','750','497');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('118','152','lx2.jpg','168350','1328315723','45','fz云淡风轻','./public/comment/201202/04/16/8315ee9fd08bce1b8aca7ff9037d564328_100x100.jpg','topic','./public/comment/201202/04/16/8315ee9fd08bce1b8aca7ff9037d564328.jpg','750','499');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('119','152','lx3.jpg','148536','1328315730','45','fz云淡风轻','./public/comment/201202/04/16/fe9d5b48eb465991c1bac5380167e1bf22_100x100.jpg','topic','./public/comment/201202/04/16/fe9d5b48eb465991c1bac5380167e1bf22.jpg','750','499');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('120','158','qkl3.jpg','268598','1328316487','44','fanwe','./public/comment/201202/04/16/89b9f115dc9ee936440ce4294a19308c21_100x100.jpg','topic','./public/comment/201202/04/16/89b9f115dc9ee936440ce4294a19308c21.jpg','1280','960');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('121','161','60abe1073dee6f61192cd99bd575508443.jpg','102222','1329336267','44','fanwe','./public/comment/201202/16/12/60abe1073dee6f61192cd99bd575508443_100x100.jpg','topic','./public/comment/201202/16/12/60abe1073dee6f61192cd99bd575508443.jpg','420','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('122','162','06ba7dca277558844809da860de26fec36.jpg','151800','1329336282','44','fanwe','./public/comment/201202/16/12/06ba7dca277558844809da860de26fec36_100x100.jpg','topic','./public/comment/201202/16/12/06ba7dca277558844809da860de26fec36.jpg','450','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('123','163','dff04d8009b248f1c5325fd9c15cc63d54.jpg','22460','1329337049','44','fanwe','./public/comment/201202/16/12/dff04d8009b248f1c5325fd9c15cc63d54_100x100.jpg','topic','./public/comment/201202/16/12/dff04d8009b248f1c5325fd9c15cc63d54.jpg','310','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('124','163','31a7340dfa1e9ef6d7e92778518fb6d743.jpg','23863','1329337049','44','fanwe','./public/comment/201202/16/12/31a7340dfa1e9ef6d7e92778518fb6d743_100x100.jpg','topic','./public/comment/201202/16/12/31a7340dfa1e9ef6d7e92778518fb6d743.jpg','310','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('125','163','d432a21eab274e9f69dab11625ec500048.jpg','27056','1329337049','44','fanwe','./public/comment/201202/16/12/d432a21eab274e9f69dab11625ec500048_100x100.jpg','topic','./public/comment/201202/16/12/d432a21eab274e9f69dab11625ec500048.jpg','310','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('126','163','592e71388f6524562f6ca79e1f3354d449.jpg','27937','1329337049','44','fanwe','./public/comment/201202/16/12/592e71388f6524562f6ca79e1f3354d449_100x100.jpg','topic','./public/comment/201202/16/12/592e71388f6524562f6ca79e1f3354d449.jpg','310','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('127','163','f41d7224291caaa87707c6f9a791ae3c37.jpg','16947','1329337049','44','fanwe','./public/comment/201202/16/12/f41d7224291caaa87707c6f9a791ae3c37_100x100.jpg','topic','./public/comment/201202/16/12/f41d7224291caaa87707c6f9a791ae3c37.jpg','310','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('128','164','lx1.jpg','287406','1331937648','44','fanwe','./public/comment/201203/17/14/94856efdccc3994d42c406b2d519e03480_100x100.jpg','topic','./public/comment/201203/17/14/94856efdccc3994d42c406b2d519e03480.jpg','750','497');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('129','164','lx3.jpg','262608','1331937657','44','fanwe','./public/comment/201203/17/14/07109f2cb2018941eab28ab7093d87ac36_100x100.jpg','topic','./public/comment/201203/17/14/07109f2cb2018941eab28ab7093d87ac36.jpg','750','499');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('130','165','111.jpg','129671','1331938059','44','fanwe','./public/comment/201203/17/14/d5270c5f1c1bc26f351ddfe09e0df65b57_100x100.jpg','topic','./public/comment/201203/17/14/d5270c5f1c1bc26f351ddfe09e0df65b57.jpg','468','310');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('131','166','123.jpg','128770','1331938179','46','fzmatthew','./public/comment/201203/17/14/01bfbcd6b90e47bc6e0594dcf9714e1635_100x100.jpg','topic','./public/comment/201203/17/14/01bfbcd6b90e47bc6e0594dcf9714e1635.jpg','468','624');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('132','166','223.jpg','102208','1331938182','46','fzmatthew','./public/comment/201203/17/14/c21e8c61792ff72f227a7808713cc68830_100x100.jpg','topic','./public/comment/201203/17/14/c21e8c61792ff72f227a7808713cc68830.jpg','468','624');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('133','168','123.jpg','130698','1331938329','44','fanwe','./public/comment/201203/17/14/3d90ef28d42571b28151e30b47af58da56_100x100.jpg','topic','./public/comment/201203/17/14/3d90ef28d42571b28151e30b47af58da56.jpg','468','467');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('134','168','223.jpg','118813','1331938332','44','fanwe','./public/comment/201203/17/14/a4b94ac22fec6b6cc76d8c0bf5283cb316_100x100.jpg','topic','./public/comment/201203/17/14/a4b94ac22fec6b6cc76d8c0bf5283cb316.jpg','468','467');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('135','169','123.jpg','90294','1331938404','44','fanwe','./public/comment/201203/17/14/87e7e8b8bfb05f2b519b49812cd7aa2124_100x100.jpg','topic','./public/comment/201203/17/14/87e7e8b8bfb05f2b519b49812cd7aa2124.jpg','468','334');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('136','170','123.jpg','181346','1331938484','44','fanwe','./public/comment/201203/17/14/44fac473deeb49e37c574342fcc5706333_100x100.jpg','topic','./public/comment/201203/17/14/44fac473deeb49e37c574342fcc5706333.jpg','468','624');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('137','171','hc2.jpg','264603','1331938770','44','fanwe','./public/comment/201203/17/14/94ea06c2948de50688a0828c6eeb626a79_100x100.jpg','topic','./public/comment/201203/17/14/94ea06c2948de50688a0828c6eeb626a79.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('138','171','hc3.jpg','238190','1331938775','44','fanwe','./public/comment/201203/17/14/2d7e5b9d69685d315df2cfec70aa7bbe58_100x100.jpg','topic','./public/comment/201203/17/14/2d7e5b9d69685d315df2cfec70aa7bbe58.jpg','1280','853');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('139','172','xd.jpg','74631','1331938891','44','fanwe','./public/comment/201203/17/15/46a5beee2cd270c475466c10a121db9219_100x100.jpg','topic','./public/comment/201203/17/15/46a5beee2cd270c475466c10a121db9219.jpg','468','350');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('140','173','td.jpg','109140','1331938945','44','fanwe','./public/comment/201203/17/15/66521bf2db57360ac27fd9fddfdffd1969_100x100.jpg','topic','./public/comment/201203/17/15/66521bf2db57360ac27fd9fddfdffd1969.jpg','468','625');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('141','174','fn2.jpg','125272','1331939025','44','fanwe','./public/comment/201203/17/15/10a8df3b7f89e9d770e7f15f1db5cd3120_100x100.jpg','topic','./public/comment/201203/17/15/10a8df3b7f89e9d770e7f15f1db5cd3120.jpg','500','500');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('142','175','cw2.jpg','406222','1331939046','44','fanwe','./public/comment/201203/17/15/3036d0a4d5c61784b4fff657cacbc36396_100x100.jpg','topic','./public/comment/201203/17/15/3036d0a4d5c61784b4fff657cacbc36396.jpg','1024','768');
INSERT INTO `%DB_PREFIX%topic_image` VALUES ('143','176','ddy1.jpg','246083','1331939104','44','fanwe','./public/comment/201203/17/15/c3cd163b781bba9c27f6599b33d2b3b815_100x100.jpg','topic','./public/comment/201203/17/15/c3cd163b781bba9c27f6599b33d2b3b815.jpg','600','891');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_reply`;
CREATE TABLE `%DB_PREFIX%topic_reply` (
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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_reply` VALUES ('38','137','[尴尬][尴尬]','44','fanwe','0','0','','1328312626','1','0');
INSERT INTO `%DB_PREFIX%topic_reply` VALUES ('39','137','回复@fanwe:[尴尬][尴尬][尴尬]','46','fzmatthew','38','44','fanwe','1328312707','1','0');
INSERT INTO `%DB_PREFIX%topic_reply` VALUES ('40','139','看起来很好吃[示爱][示爱]','45','fz云淡风轻','0','0','','1328312823','1','0');
INSERT INTO `%DB_PREFIX%topic_reply` VALUES ('41','154','相当美','46','fzmatthew','0','0','','1328315861','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_tag`;
CREATE TABLE `%DB_PREFIX%topic_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '是否推荐',
  `count` int(11) NOT NULL COMMENT '是否为预设标签',
  `is_preset` tinyint(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('1','电影','1','2','1','','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('2','自助游','1','0','1','','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('3','闽菜','1','0','1','','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('4','川菜','1','0','1','','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('5','咖啡','1','0','1','#fff100','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('6','牛排','1','0','1','#a1410d','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('7','包包','1','0','0','#ed008c','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('8','复古','1','0','0','#a36209','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('9','甜美','1','0','0','','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('10','日系','1','0','0','#a4d49d','0');
INSERT INTO `%DB_PREFIX%topic_tag` VALUES ('11','欧美','1','0','0','#ee1d24','0');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_tag_cate`;
CREATE TABLE `%DB_PREFIX%topic_tag_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL COMMENT '附标题',
  `mobile_title_bg` varchar(255) NOT NULL COMMENT '手机分类背景图',
  `sort` int(11) NOT NULL,
  `showin_mobile` tinyint(1) NOT NULL,
  `showin_web` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('1','休闲娱乐','','./public/attachment/201202/04/16/4f2cef7b454fc.png','0','1','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('2','乐享美食','','./public/attachment/201202/04/16/4f2cef6c8a9d1.png','0','1','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('3','旅游酒店','','./public/attachment/201202/04/16/4f2cef7b454fc.png','0','1','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('4','都市购物','','./public/attachment/201202/04/16/4f2cef7b454fc.png','0','1','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('5','幸福居家','','','1','0','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('6','浪漫婚恋','','','2','0','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate` VALUES ('7','玩乐帮派','','','3','0','1');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_tag_cate_link`;
CREATE TABLE `%DB_PREFIX%topic_tag_cate_link` (
  `cate_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('1','11');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('2','11');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('3','11');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('4','11');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('5','11');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('6','11');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','1');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','2');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','3');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','4');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','5');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','6');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','7');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','8');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','9');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','10');
INSERT INTO `%DB_PREFIX%topic_tag_cate_link` VALUES ('7','11');
DROP TABLE IF EXISTS `%DB_PREFIX%topic_title`;
CREATE TABLE `%DB_PREFIX%topic_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0:主题1:活动',
  `is_recommend` tinyint(1) NOT NULL,
  `count` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%topic_title` VALUES ('1','免费试吃','1','1','0','','0');
INSERT INTO `%DB_PREFIX%topic_title` VALUES ('2','试吃分享','1','1','0','','0');
INSERT INTO `%DB_PREFIX%topic_title` VALUES ('3','对爱琴海餐厅发表了点评','0','0','3','','0');
