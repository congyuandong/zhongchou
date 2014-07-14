<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_supplier_location`;");
E_C("CREATE TABLE `fanwe_supplier_location` (
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_supplier_location` values('17','享客来牛排世家','','安泰店：鼓楼区吉庇路39号（安泰楼后面，码头一号旁）南街店 ：福州市鼓楼区八一七路南街车站旁（大洋百货正对面）','0591-88592283','','119.306144','26.086743','18','','','1','安泰店：鼓楼区吉庇路39号（安泰楼后面，码头一号旁）南街店 ：福州市鼓楼区八一七路南街车站旁（大洋百货正对面）','15','ux39184ux39278ux32654ux39135','餐饮美食','ux40723ux27004ux21306,ux21335ux34903,ux31119ux24030ux24066,ux19971ux36335,ux22823ux27915,ux30721ux22836,ux36710ux31449,ux30334ux36135,ux23545ux38754,ux21518ux38754,ux23433ux27888ux24215ux65306ux40723ux27004ux21306ux21513ux24199ux36335ux51ux57ux21495ux65288ux23433ux27888ux27004ux21518ux38754ux65292ux30721ux22836ux19968ux21495ux26049ux65289ux21335ux34903ux24215ux65306ux31119ux24030ux24066ux40723ux27004ux21306ux20843ux19968ux19971ux36335ux21335ux34903ux36710ux31449ux26049ux65288ux22823ux27915ux30334ux36135ux27491ux23545ux38754ux65289,ux19996ux34903ux21475','鼓楼区,南街,福州市,七路,大洋,码头,车站,百货,对面,后面,安泰店：鼓楼区吉庇路39号（安泰楼后面，码头一号旁）南街店 ：福州市鼓楼区八一七路南街车站旁（大洋百货正对面）,东街口','ux29275ux25490,ux19990ux23478,ux20139ux23458ux26469ux29275ux25490ux19990ux23478','牛排,世家,享客来牛排世家','8','./public/attachment/201201/4f013ee3d7cb9.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','0','0','0','0','','','','1','','','0','0','0','','0','','');");
E_D("replace into `fanwe_supplier_location` values('15','爱琴海餐厅','社会主义学院站下: 61路、70路、78路、100路、129路','福州市鼓楼区鼓屏路47号','0591-88522779','','119.304522','26.098978','16','18:00-24:00','','1','福州市鼓楼区鼓屏路47号','15','ux39184ux39278ux32654ux39135','餐饮美食','ux40723ux27004ux21306,ux31119ux24030ux24066,ux31119ux24030ux24066ux40723ux27004ux21306ux40723ux23631ux36335ux52ux55ux21495,ux23631ux23665','鼓楼区,福州市,福州市鼓楼区鼓屏路47号,屏山','ux29233ux29748ux28023,ux39184ux21381,ux29233ux29748ux28023ux39184ux21381','爱琴海,餐厅,爱琴海餐厅','8','./public/attachment/201201/4f0113ce66cd4.jpg','1','1','','ux24178ux20928,ux26126ux20142,ux26377ux30452ux36798ux20844ux20132','干净,明亮,有直达公交','3.3333','2','1','0','10','3','0','43.3333','0.6667','0.0000','','','1','0','0','0','','','','1','','','0','0','0','','0','','');");
E_D("replace into `fanwe_supplier_location` values('16','老刘野生大鱼坊','7、16、36、40、62、69、71、73、74、79、80、88、92、97、103、125、202、306路，到五一路站下车即可','福州市鼓楼区古田路88号华丰大厦3层A室(闽都大酒店对面)','0591-83339688','','119.320796','26.082646','17','10:30-14:30,16:30-21:30','','1','福州市鼓楼区古田路88号华丰大厦3层A室(闽都大酒店对面)','15','ux39184ux39278ux32654ux39135','餐饮美食','ux21476ux30000,ux40723ux27004ux21306,ux21326ux20016,ux31119ux24030ux24066,ux22823ux37202ux24215,ux23545ux38754,ux22823ux21414,ux31119ux24030ux24066ux40723ux27004ux21306ux21476ux30000ux36335ux56ux56ux21495ux21326ux20016ux22823ux21414ux51ux23618ux65ux23460ux40ux38397ux37117ux22823ux37202ux24215ux23545ux38754ux41,ux21488ux27743ux21306','古田,鼓楼区,华丰,福州市,大酒店,对面,大厦,福州市鼓楼区古田路88号华丰大厦3层A室(闽都大酒店对面),台江区','ux32769ux21016,ux22823ux40060,ux37326ux29983,ux32769ux21016ux37326ux29983ux22823ux40060ux22346','老刘,大鱼,野生,老刘野生大鱼坊','8','./public/attachment/201201/4f0116296dc27.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','1','0','0','4','','','','1','','','0','0','0','','0','','');");
E_D("replace into `fanwe_supplier_location` values('14','闽粤汇','K3、19、51、52、69、74、102、106、129、130、133、301路，至蒙古营站下车','五一北路110号原海关大院内（现光大银行后）','0591-83326788,0591-88319968','','119.315682','26.087528','15','11:30-14:00，17:30-21:00','','1','五一北路110号原海关大院内（现光大银行后）','15','ux39184ux39278ux32654ux39135','餐饮美食','ux20809ux22823ux38134ux34892,ux21271ux36335,ux22823ux38498,ux28023ux20851,ux49ux49ux48,ux20116ux19968,ux20116ux19968ux21271ux36335ux49ux49ux48ux21495ux21407ux28023ux20851ux22823ux38498ux20869ux65288ux29616ux20809ux22823ux38134ux34892ux21518ux65289,ux40723ux27004ux21306,ux20116ux19968ux24191ux22330,ux26187ux23433ux21306,ux20116ux19968ux26032ux26449','光大银行,北路,大院,海关,110,五一,五一北路110号原海关大院内（现光大银行后）,鼓楼区,五一广场,晋安区,五一新村','ux38397ux31908,ux38397ux31908ux27719','闽粤,闽粤汇','8','./public/attachment/201201/4f0110c586c48.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','2','1','0','0','','','','1','','','0','0','0','','0','','');");
E_D("replace into `fanwe_supplier_location` values('18','格瑞雅美容院','','福州市五一北路67号（蒙古营站牌后）延福宾馆后院','0591-88813330‎','','119.31585','26.089641','19','','','1','福州市五一北路67号（蒙古营站牌后）延福宾馆后院','15','ux29983ux27963ux26381ux21153','生活服务','ux33945ux21476ux33829,ux31119ux24030ux24066,ux21271ux36335,ux31449ux29260,ux21518ux38498,ux23486ux39302,ux24310ux31119,ux20116ux19968,ux31119ux24030ux24066ux20116ux19968ux21271ux36335ux54ux55ux21495ux65288ux33945ux21476ux33829ux31449ux29260ux21518ux65289ux24310ux31119ux23486ux39302ux21518ux38498,ux40723ux27004ux21306,ux20116ux19968ux24191ux22330','蒙古营,福州市,北路,站牌,后院,宾馆,延福,五一,福州市五一北路67号（蒙古营站牌后）延福宾馆后院,鼓楼区,五一广场','ux38597ux32654,ux26684ux29790,ux23481ux38498,ux26684ux29790ux38597ux32654ux23481ux38498','雅美,格瑞,容院,格瑞雅美容院','10','./public/attachment/201201/4f013fc452347.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','2','0','0','0','','','','1','','','0','0','0','','0','','');");
E_D("replace into `fanwe_supplier_location` values('19','馨语河畔','','鼓楼区南后街5号2楼','18659138700‎','','119.302286','26.091546','20','','','1','鼓楼区南后街5号2楼','15','ux39184ux39278ux32654ux39135','餐饮美食','ux40723ux27004ux21306,ux21335ux21518ux34903,ux40723ux27004ux21306ux21335ux21518ux34903ux53ux21495ux50ux27004','鼓楼区,南后街,鼓楼区南后街5号2楼','ux27827ux30036,ux39336ux35821ux27827ux30036','河畔,馨语河畔','8','./public/attachment/201201/4f01422c0c096.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','0','0','0','0','','','','1','','','0','0','0','','0','','');");
E_D("replace into `fanwe_supplier_location` values('20','泡泡糖宝贝游泳馆','','福州市晋安区连洋路123号好来屋星光大道5#楼13#店面','0591-85162880','','119.357576','26.077701','21','','','1','福州市晋安区连洋路123号好来屋星光大道5#楼13#店面','15','','','ux26187ux23433ux21306,ux22909ux26469,ux31119ux24030ux24066,ux24215ux38754,ux26143ux20809,ux22823ux36947,ux36830ux27915ux36335,ux49ux50ux51,ux49ux51,ux31119ux24030ux24066ux26187ux23433ux21306ux36830ux27915ux36335ux49ux50ux51ux21495ux22909ux26469ux23627ux26143ux20809ux22823ux36947ux53ux35ux27004ux49ux51ux35ux24215ux38754,ux34701ux20392ux19996ux21306','晋安区,好来,福州市,店面,星光,大道,连洋路,123,13,福州市晋安区连洋路123号好来屋星光大道5#楼13#店面,融侨东区','ux27873ux27873ux31958,ux28216ux27891ux39302,ux23453ux36125,ux27873ux27873ux31958ux23453ux36125ux28216ux27891ux39302','泡泡糖,游泳馆,宝贝,泡泡糖宝贝游泳馆','0','./public/attachment/201201/4f0142c918abd.jpg','1','1','','','','0.0000','0','0','0','0','0','0','0.0000','0.0000','0.0000','','','0','0','0','1','','','','1','','','0','0','0','','0','','');");

require("../../inc/footer.php");
?>