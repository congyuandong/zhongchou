-- fanwe SQL Dump Program
-- Microsoft-IIS/6.0
-- 
-- DATE : 2014-06-26 16:58:28
-- MYSQL SERVER VERSION : 5.1.63-community
-- PHP VERSION : isapi
-- Vol : 4


DROP TABLE IF EXISTS `%DB_PREFIX%mail_server`;
CREATE TABLE `%DB_PREFIX%mail_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_server` varchar(255) NOT NULL,
  `smtp_name` varchar(255) NOT NULL,
  `smtp_pwd` varchar(255) NOT NULL,
  `is_ssl` tinyint(1) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `use_limit` int(11) NOT NULL,
  `is_reset` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `total_use` int(11) NOT NULL,
  `is_verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `%DB_PREFIX%medal`;
CREATE TABLE `%DB_PREFIX%medal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `config` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `route` text NOT NULL,
  `allow_check` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%medal` VALUES ('1','Groupuser','组长勋章','点亮表示您为组长','1','N;','./public/attachment/201203/17/15/4f6438e27aa65.png','','申请成为小组组长即可点亮该勋章','1');
INSERT INTO `%DB_PREFIX%medal` VALUES ('2','Keepsign','忠实网友勋章','点亮为忠实的网友会员','1','a:1:{s:9:\"day_count\";s:2:\"10\";}','./public/attachment/201203/17/15/4f6438f0af2c6.png','','连续签到10天以上将获得该勋章','1');
INSERT INTO `%DB_PREFIX%medal` VALUES ('3','Newuser','新手勋章','点亮您为新手，让更多的朋友找到你','1','N;','./public/attachment/201203/17/15/4f643902cd067.png','','完善用户的所有资料，即可获取该勋章','1');
INSERT INTO `%DB_PREFIX%medal` VALUES ('4','Sinabind','新浪微博勋章','新浪微博认证勋章，点亮为新浪微博用户','1','N;','./public/attachment/201203/17/15/4f64391478be2.png','','绑定新浪微博即可获得该勋章','0');
INSERT INTO `%DB_PREFIX%medal` VALUES ('5','Tencentbind','腾讯微博勋章','腾讯微博认证勋章，点亮为腾讯微博用户','1','N;','./public/attachment/201203/17/15/4f6439210f17b.png','','绑定腾讯微博即可获得该勋章','0');
DROP TABLE IF EXISTS `%DB_PREFIX%message`;
CREATE TABLE `%DB_PREFIX%message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `admin_reply` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `rel_table` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  `is_buy` tinyint(1) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%message` VALUES ('97','看起来很不错。 我报名了[呲牙][呲牙]','看起来很不错。 我报名了[呲牙][呲牙]','1329336228','0','','0','event','1','44','0','1','0','0','','','0');
DROP TABLE IF EXISTS `%DB_PREFIX%message_type`;
CREATE TABLE `%DB_PREFIX%message_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  `is_fix` tinyint(1) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%message_type` VALUES ('1','deal','1','商品评论','1','0');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('2','deal_order','1','订单留言','0','0');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('3','feedback','1','意见反馈','0','0');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('4','seller','1','商务合作','0','0');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('6','tx','1','提现申请','0','0');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('5','after_sale','0','售后服务','0','2');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('8','before_sale','0','售前咨询','1','3');
INSERT INTO `%DB_PREFIX%message_type` VALUES ('10','faq','1','问题答疑','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%mobile_list`;
CREATE TABLE `%DB_PREFIX%mobile_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `verify_code` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mobile_idx` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%msg_box`;
CREATE TABLE `%DB_PREFIX%msg_box` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%msg_box` VALUES ('1','图片很美分享被置顶+10经验','图片很美分享被置顶+10经验','44','44','1331937858','1','0','0','0','44_44_0_1','1');
INSERT INTO `%DB_PREFIX%msg_box` VALUES ('2','您已经成为初入江湖','恭喜您，您已经成为初入江湖。','0','44','1331939170','1','0','0','0','0_44_0_2','1');
DROP TABLE IF EXISTS `%DB_PREFIX%msg_system`;
CREATE TABLE `%DB_PREFIX%msg_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_names` text NOT NULL,
  `user_ids` text NOT NULL,
  `end_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%msg_template`;
CREATE TABLE `%DB_PREFIX%msg_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%msg_template` VALUES ('1','TPL_MAIL_USER_PASSWORD','{$user.user_name}你好，请点击以下链接修改您的密码\r\n</p>\r\n<a href=\'{$user.password_url}\'>{$user.password_url}</a>','1','1');
DROP TABLE IF EXISTS `%DB_PREFIX%nav`;
CREATE TABLE `%DB_PREFIX%nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `u_module` varchar(255) NOT NULL,
  `u_action` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%nav` VALUES ('42','首页','','0','1','1','index','','0','');
INSERT INTO `%DB_PREFIX%nav` VALUES ('47','经典项目','','0','3','1','deals','index','0','r=classic');
INSERT INTO `%DB_PREFIX%nav` VALUES ('46','所有项目','','0','2','1','deals','index','0','');
INSERT INTO `%DB_PREFIX%nav` VALUES ('48','最新动态','','0','4','1','news','index','0','');
DROP TABLE IF EXISTS `%DB_PREFIX%payment`;
CREATE TABLE `%DB_PREFIX%payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `online_pay` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `total_amount` double(20,4) NOT NULL,
  `config` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%payment` VALUES ('24','AlipayBank','1','1','支付宝银行直连支付','','0.0000','a:4:{s:14:\"alipay_partner\";s:0:\"\";s:14:\"alipay_account\";s:0:\"\";s:10:\"alipay_key\";s:0:\"\";s:14:\"alipay_gateway\";a:17:{s:7:\"ICBCB2C\";s:1:\"1\";s:3:\"CMB\";s:1:\"1\";s:3:\"CCB\";s:1:\"1\";s:3:\"ABC\";s:1:\"1\";s:4:\"SPDB\";s:1:\"1\";s:3:\"SDB\";s:1:\"1\";s:3:\"CIB\";s:1:\"1\";s:6:\"BJBANK\";s:1:\"1\";s:7:\"CEBBANK\";s:1:\"1\";s:4:\"CMBC\";s:1:\"1\";s:5:\"CITIC\";s:1:\"1\";s:3:\"GDB\";s:1:\"1\";s:7:\"SPABANK\";s:1:\"1\";s:6:\"BOCB2C\";s:1:\"1\";s:4:\"COMM\";s:1:\"1\";s:7:\"ICBCBTB\";s:1:\"1\";s:10:\"PSBC-DEBIT\";s:1:\"1\";}}','','1');
DROP TABLE IF EXISTS `%DB_PREFIX%payment_notice`;
CREATE TABLE `%DB_PREFIX%payment_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'order_id?0?????',
  `is_paid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `memo` text NOT NULL,
  `money` double(20,4) NOT NULL,
  `outer_notice_sn` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL COMMENT '0????',
  `deal_item_id` int(11) NOT NULL COMMENT '0????',
  `deal_name` varchar(255) NOT NULL COMMENT '??????',
  PRIMARY KEY (`id`),
  UNIQUE KEY `notice_sn_unk` (`notice_sn`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%payment_notice` VALUES ('200','20121107399','1352230157','0','67','0','19','24','ICBCB2C','','500.0000','','56','24','拥有自己的咖啡馆');
INSERT INTO `%DB_PREFIX%payment_notice` VALUES ('201','20121107985','1352230180','1352230180','67','1','19','0','','管理员收款','500.0000','','56','24','拥有自己的咖啡馆');
INSERT INTO `%DB_PREFIX%payment_notice` VALUES ('202','20121107931','1352231631','0','78','0','19','24','CCB','ttt','500.0000','','58','30','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！');
INSERT INTO `%DB_PREFIX%payment_notice` VALUES ('203','20121107124','1352231671','0','79','0','17','24','ICBCB2C','部份支付','200.0000','','56','24','拥有自己的咖啡馆');
DROP TABLE IF EXISTS `%DB_PREFIX%point_group`;
CREATE TABLE `%DB_PREFIX%point_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%point_group` VALUES ('1','卫生','100');
INSERT INTO `%DB_PREFIX%point_group` VALUES ('2','服务','100');
DROP TABLE IF EXISTS `%DB_PREFIX%point_group_link`;
CREATE TABLE `%DB_PREFIX%point_group_link` (
  `point_group_id` int(11) NOT NULL COMMENT '商户子类点评评分分组ID %DB_PREFIX%merchant_type_point_group',
  `category_id` int(11) NOT NULL,
  KEY `group_id` (`point_group_id`) USING BTREE,
  KEY `type_id` (`category_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','12');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','11');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('1','10');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','10');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','9');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('1','8');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','8');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('1','14');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','14');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('1','15');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('1','16');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','16');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('1','17');
INSERT INTO `%DB_PREFIX%point_group_link` VALUES ('2','17');
DROP TABLE IF EXISTS `%DB_PREFIX%promote`;
CREATE TABLE `%DB_PREFIX%promote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `config` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%promote_msg`;
CREATE TABLE `%DB_PREFIX%promote_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `send_status` tinyint(1) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `send_type_id` int(11) NOT NULL,
  `send_define_data` text NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%promote_msg_list`;
CREATE TABLE `%DB_PREFIX%promote_msg_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `msg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dest_idx` (`dest`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%referrals`;
CREATE TABLE `%DB_PREFIX%referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `rel_user_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `%DB_PREFIX%region_conf`;
CREATE TABLE `%DB_PREFIX%region_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '????????',
  `region_level` tinyint(4) NOT NULL COMMENT '1:?? 2:? 3:??(??) 4:??(??)',
  `py` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3401 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3','1','安徽','2','anhui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('4','1','福建','2','fujian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('5','1','甘肃','2','gansu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('6','1','广东','2','guangdong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('7','1','广西','2','guangxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('8','1','贵州','2','guizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('9','1','海南','2','hainan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('10','1','河北','2','hebei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('11','1','河南','2','henan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('12','1','黑龙江','2','heilongjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('13','1','湖北','2','hubei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('14','1','湖南','2','hunan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('15','1','吉林','2','jilin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('16','1','江苏','2','jiangsu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('17','1','江西','2','jiangxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('18','1','辽宁','2','liaoning');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('19','1','内蒙古','2','neimenggu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('20','1','宁夏','2','ningxia');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('21','1','青海','2','qinghai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('22','1','山东','2','shandong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('23','1','山西','2','shanxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('24','1','陕西','2','shanxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('26','1','四川','2','sichuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('28','1','西藏','2','xicang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('29','1','新疆','2','xinjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('30','1','云南','2','yunnan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('31','1','浙江','2','zhejiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('36','3','安庆','3','anqing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('37','3','蚌埠','3','bangbu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('38','3','巢湖','3','chaohu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('39','3','池州','3','chizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('40','3','滁州','3','chuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('41','3','阜阳','3','fuyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('42','3','淮北','3','huaibei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('43','3','淮南','3','huainan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('44','3','黄山','3','huangshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('45','3','六安','3','liuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('46','3','马鞍山','3','maanshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('47','3','宿州','3','suzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('48','3','铜陵','3','tongling');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('49','3','芜湖','3','wuhu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('50','3','宣城','3','xuancheng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('51','3','亳州','3','zhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('52','2','北京','2','beijing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('53','4','福州','3','fuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('54','4','龙岩','3','longyan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('55','4','南平','3','nanping');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('56','4','宁德','3','ningde');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('57','4','莆田','3','putian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('58','4','泉州','3','quanzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('59','4','三明','3','sanming');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('60','4','厦门','3','xiamen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('61','4','漳州','3','zhangzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('62','5','兰州','3','lanzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('63','5','白银','3','baiyin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('64','5','定西','3','dingxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('65','5','甘南','3','gannan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('66','5','嘉峪关','3','jiayuguan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('67','5','金昌','3','jinchang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('68','5','酒泉','3','jiuquan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('69','5','临夏','3','linxia');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('70','5','陇南','3','longnan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('71','5','平凉','3','pingliang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('72','5','庆阳','3','qingyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('73','5','天水','3','tianshui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('74','5','武威','3','wuwei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('75','5','张掖','3','zhangye');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('76','6','广州','3','guangzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('77','6','深圳','3','shen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('78','6','潮州','3','chaozhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('79','6','东莞','3','dong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('80','6','佛山','3','foshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('81','6','河源','3','heyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('82','6','惠州','3','huizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('83','6','江门','3','jiangmen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('84','6','揭阳','3','jieyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('85','6','茂名','3','maoming');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('86','6','梅州','3','meizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('87','6','清远','3','qingyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('88','6','汕头','3','shantou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('89','6','汕尾','3','shanwei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('90','6','韶关','3','shaoguan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('91','6','阳江','3','yangjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('92','6','云浮','3','yunfu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('93','6','湛江','3','zhanjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('94','6','肇庆','3','zhaoqing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('95','6','中山','3','zhongshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('96','6','珠海','3','zhuhai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('97','7','南宁','3','nanning');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('98','7','桂林','3','guilin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('99','7','百色','3','baise');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('100','7','北海','3','beihai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('101','7','崇左','3','chongzuo');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('102','7','防城港','3','fangchenggang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('103','7','贵港','3','guigang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('104','7','河池','3','hechi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('105','7','贺州','3','hezhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('106','7','来宾','3','laibin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('107','7','柳州','3','liuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('108','7','钦州','3','qinzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('109','7','梧州','3','wuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('110','7','玉林','3','yulin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('111','8','贵阳','3','guiyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('112','8','安顺','3','anshun');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('113','8','毕节','3','bijie');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('114','8','六盘水','3','liupanshui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('115','8','黔东南','3','qiandongnan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('116','8','黔南','3','qiannan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('117','8','黔西南','3','qianxinan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('118','8','铜仁','3','tongren');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('119','8','遵义','3','zunyi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('120','9','海口','3','haikou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('121','9','三亚','3','sanya');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('122','9','白沙','3','baisha');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('123','9','保亭','3','baoting');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('124','9','昌江','3','changjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('125','9','澄迈县','3','chengmaixian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('126','9','定安县','3','dinganxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('127','9','东方','3','dongfang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('128','9','乐东','3','ledong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('129','9','临高县','3','lingaoxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('130','9','陵水','3','lingshui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('131','9','琼海','3','qionghai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('132','9','琼中','3','qiongzhong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('133','9','屯昌县','3','tunchangxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('134','9','万宁','3','wanning');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('135','9','文昌','3','wenchang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('136','9','五指山','3','wuzhishan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('137','9','儋州','3','zhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('138','10','石家庄','3','shijiazhuang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('139','10','保定','3','baoding');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('140','10','沧州','3','cangzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('141','10','承德','3','chengde');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('142','10','邯郸','3','handan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('143','10','衡水','3','hengshui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('144','10','廊坊','3','langfang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('145','10','秦皇岛','3','qinhuangdao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('146','10','唐山','3','tangshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('147','10','邢台','3','xingtai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('148','10','张家口','3','zhangjiakou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('149','11','郑州','3','zhengzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('150','11','洛阳','3','luoyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('151','11','开封','3','kaifeng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('152','11','安阳','3','anyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('153','11','鹤壁','3','hebi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('154','11','济源','3','jiyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('155','11','焦作','3','jiaozuo');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('156','11','南阳','3','nanyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('157','11','平顶山','3','pingdingshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('158','11','三门峡','3','sanmenxia');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('159','11','商丘','3','shangqiu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('160','11','新乡','3','xinxiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('161','11','信阳','3','xinyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('162','11','许昌','3','xuchang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('163','11','周口','3','zhoukou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('164','11','驻马店','3','zhumadian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('165','11','漯河','3','he');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('166','11','濮阳','3','yang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('167','12','哈尔滨','3','haerbin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('168','12','大庆','3','daqing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('169','12','大兴安岭','3','daxinganling');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('170','12','鹤岗','3','hegang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('171','12','黑河','3','heihe');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('172','12','鸡西','3','jixi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('173','12','佳木斯','3','jiamusi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('174','12','牡丹江','3','mudanjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('175','12','七台河','3','qitaihe');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('176','12','齐齐哈尔','3','qiqihaer');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('177','12','双鸭山','3','shuangyashan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('178','12','绥化','3','suihua');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('179','12','伊春','3','yichun');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('180','13','武汉','3','wuhan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('181','13','仙桃','3','xiantao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('182','13','鄂州','3','ezhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('183','13','黄冈','3','huanggang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('184','13','黄石','3','huangshi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('185','13','荆门','3','jingmen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('186','13','荆州','3','jingzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('187','13','潜江','3','qianjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('188','13','神农架林区','3','shennongjialinqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('189','13','十堰','3','shiyan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('190','13','随州','3','suizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('191','13','天门','3','tianmen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('192','13','咸宁','3','xianning');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('193','13','襄樊','3','xiangfan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('194','13','孝感','3','xiaogan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('195','13','宜昌','3','yichang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('196','13','恩施','3','enshi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('197','14','长沙','3','changsha');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('198','14','张家界','3','zhangjiajie');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('199','14','常德','3','changde');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('200','14','郴州','3','chenzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('201','14','衡阳','3','hengyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('202','14','怀化','3','huaihua');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('203','14','娄底','3','loudi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('204','14','邵阳','3','shaoyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('205','14','湘潭','3','xiangtan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('206','14','湘西','3','xiangxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('207','14','益阳','3','yiyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('208','14','永州','3','yongzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('209','14','岳阳','3','yueyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('210','14','株洲','3','zhuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('211','15','长春','3','changchun');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('212','15','吉林','3','jilin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('213','15','白城','3','baicheng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('214','15','白山','3','baishan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('215','15','辽源','3','liaoyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('216','15','四平','3','siping');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('217','15','松原','3','songyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('218','15','通化','3','tonghua');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('219','15','延边','3','yanbian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('220','16','南京','3','nanjing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('221','16','苏州','3','suzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('222','16','无锡','3','wuxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('223','16','常州','3','changzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('224','16','淮安','3','huaian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('225','16','连云港','3','lianyungang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('226','16','南通','3','nantong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('227','16','宿迁','3','suqian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('228','16','泰州','3','taizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('229','16','徐州','3','xuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('230','16','盐城','3','yancheng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('231','16','扬州','3','yangzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('232','16','镇江','3','zhenjiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('233','17','南昌','3','nanchang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('234','17','抚州','3','fuzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('235','17','赣州','3','ganzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('236','17','吉安','3','jian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('237','17','景德镇','3','jingdezhen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('238','17','九江','3','jiujiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('239','17','萍乡','3','pingxiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('240','17','上饶','3','shangrao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('241','17','新余','3','xinyu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('242','17','宜春','3','yichun');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('243','17','鹰潭','3','yingtan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('244','18','沈阳','3','shenyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('245','18','大连','3','dalian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('246','18','鞍山','3','anshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('247','18','本溪','3','benxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('248','18','朝阳','3','chaoyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('249','18','丹东','3','dandong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('250','18','抚顺','3','fushun');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('251','18','阜新','3','fuxin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('252','18','葫芦岛','3','huludao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('253','18','锦州','3','jinzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('254','18','辽阳','3','liaoyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('255','18','盘锦','3','panjin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('256','18','铁岭','3','tieling');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('257','18','营口','3','yingkou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('258','19','呼和浩特','3','huhehaote');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('259','19','阿拉善盟','3','alashanmeng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('260','19','巴彦淖尔盟','3','bayannaoermeng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('261','19','包头','3','baotou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('262','19','赤峰','3','chifeng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('263','19','鄂尔多斯','3','eerduosi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('264','19','呼伦贝尔','3','hulunbeier');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('265','19','通辽','3','tongliao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('266','19','乌海','3','wuhai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('267','19','乌兰察布市','3','wulanchabushi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('268','19','锡林郭勒盟','3','xilinguolemeng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('269','19','兴安盟','3','xinganmeng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('270','20','银川','3','yinchuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('271','20','固原','3','guyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('272','20','石嘴山','3','shizuishan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('273','20','吴忠','3','wuzhong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('274','20','中卫','3','zhongwei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('275','21','西宁','3','xining');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('276','21','果洛','3','guoluo');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('277','21','海北','3','haibei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('278','21','海东','3','haidong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('279','21','海南','3','hainan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('280','21','海西','3','haixi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('281','21','黄南','3','huangnan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('282','21','玉树','3','yushu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('283','22','济南','3','jinan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('284','22','青岛','3','qingdao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('285','22','滨州','3','binzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('286','22','德州','3','dezhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('287','22','东营','3','dongying');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('288','22','菏泽','3','heze');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('289','22','济宁','3','jining');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('290','22','莱芜','3','laiwu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('291','22','聊城','3','liaocheng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('292','22','临沂','3','linyi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('293','22','日照','3','rizhao');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('294','22','泰安','3','taian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('295','22','威海','3','weihai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('296','22','潍坊','3','weifang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('297','22','烟台','3','yantai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('298','22','枣庄','3','zaozhuang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('299','22','淄博','3','zibo');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('300','23','太原','3','taiyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('301','23','长治','3','changzhi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('302','23','大同','3','datong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('303','23','晋城','3','jincheng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('304','23','晋中','3','jinzhong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('305','23','临汾','3','linfen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('306','23','吕梁','3','lvliang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('307','23','朔州','3','shuozhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('308','23','忻州','3','xinzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('309','23','阳泉','3','yangquan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('310','23','运城','3','yuncheng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('311','24','西安','3','xian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('312','24','安康','3','ankang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('313','24','宝鸡','3','baoji');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('314','24','汉中','3','hanzhong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('315','24','商洛','3','shangluo');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('316','24','铜川','3','tongchuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('317','24','渭南','3','weinan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('318','24','咸阳','3','xianyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('319','24','延安','3','yanan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('320','24','榆林','3','yulin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('321','25','上海','2','shanghai');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('322','26','成都','3','chengdu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('323','26','绵阳','3','mianyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('324','26','阿坝','3','aba');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('325','26','巴中','3','bazhong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('326','26','达州','3','dazhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('327','26','德阳','3','deyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('328','26','甘孜','3','ganzi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('329','26','广安','3','guangan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('330','26','广元','3','guangyuan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('331','26','乐山','3','leshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('332','26','凉山','3','liangshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('333','26','眉山','3','meishan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('334','26','南充','3','nanchong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('335','26','内江','3','neijiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('336','26','攀枝花','3','panzhihua');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('337','26','遂宁','3','suining');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('338','26','雅安','3','yaan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('339','26','宜宾','3','yibin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('340','26','资阳','3','ziyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('341','26','自贡','3','zigong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('342','26','泸州','3','zhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('343','27','天津','2','tianjin');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('344','28','拉萨','3','lasa');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('345','28','阿里','3','ali');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('346','28','昌都','3','changdu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('347','28','林芝','3','linzhi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('348','28','那曲','3','naqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('349','28','日喀则','3','rikaze');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('350','28','山南','3','shannan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('351','29','乌鲁木齐','3','wulumuqi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('352','29','阿克苏','3','akesu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('353','29','阿拉尔','3','alaer');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('354','29','巴音郭楞','3','bayinguoleng');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('355','29','博尔塔拉','3','boertala');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('356','29','昌吉','3','changji');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('357','29','哈密','3','hami');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('358','29','和田','3','hetian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('359','29','喀什','3','kashi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('360','29','克拉玛依','3','kelamayi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('361','29','克孜勒苏','3','kezilesu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('362','29','石河子','3','shihezi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('363','29','图木舒克','3','tumushuke');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('364','29','吐鲁番','3','tulufan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('365','29','五家渠','3','wujiaqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('366','29','伊犁','3','yili');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('367','30','昆明','3','kunming');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('368','30','怒江','3','nujiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('369','30','普洱','3','puer');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('370','30','丽江','3','lijiang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('371','30','保山','3','baoshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('372','30','楚雄','3','chuxiong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('373','30','大理','3','dali');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('374','30','德宏','3','dehong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('375','30','迪庆','3','diqing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('376','30','红河','3','honghe');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('377','30','临沧','3','lincang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('378','30','曲靖','3','qujing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('379','30','文山','3','wenshan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('380','30','西双版纳','3','xishuangbanna');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('381','30','玉溪','3','yuxi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('382','30','昭通','3','zhaotong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('383','31','杭州','3','hangzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('384','31','湖州','3','huzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('385','31','嘉兴','3','jiaxing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('386','31','金华','3','jinhua');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('387','31','丽水','3','lishui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('388','31','宁波','3','ningbo');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('389','31','绍兴','3','shaoxing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('390','31','台州','3','taizhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('391','31','温州','3','wenzhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('392','31','舟山','3','zhoushan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('393','31','衢州','3','zhou');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('394','32','重庆','2','zhongqing');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('395','33','香港','2','xianggang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('396','34','澳门','2','aomen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('397','35','台湾','2','taiwan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('500','52','东城区','3','dongchengqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('501','52','西城区','3','xichengqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('502','52','海淀区','3','haidianqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('503','52','朝阳区','3','chaoyangqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('504','52','崇文区','3','chongwenqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('505','52','宣武区','3','xuanwuqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('506','52','丰台区','3','fengtaiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('507','52','石景山区','3','shijingshanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('508','52','房山区','3','fangshanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('509','52','门头沟区','3','mentougouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('510','52','通州区','3','tongzhouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('511','52','顺义区','3','shunyiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('512','52','昌平区','3','changpingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('513','52','怀柔区','3','huairouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('514','52','平谷区','3','pingguqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('515','52','大兴区','3','daxingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('516','52','密云县','3','miyunxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('517','52','延庆县','3','yanqingxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2703','321','长宁区','3','changningqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2704','321','闸北区','3','zhabeiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2705','321','闵行区','3','xingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2706','321','徐汇区','3','xuhuiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2707','321','浦东新区','3','pudongxinqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2708','321','杨浦区','3','yangpuqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2709','321','普陀区','3','putuoqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2710','321','静安区','3','jinganqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2711','321','卢湾区','3','luwanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2712','321','虹口区','3','hongkouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2713','321','黄浦区','3','huangpuqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2714','321','南汇区','3','nanhuiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2715','321','松江区','3','songjiangqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2716','321','嘉定区','3','jiadingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2717','321','宝山区','3','baoshanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2718','321','青浦区','3','qingpuqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2719','321','金山区','3','jinshanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2720','321','奉贤区','3','fengxianqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2721','321','崇明县','3','chongmingxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2912','343','和平区','3','hepingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2913','343','河西区','3','hexiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2914','343','南开区','3','nankaiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2915','343','河北区','3','hebeiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2916','343','河东区','3','hedongqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2917','343','红桥区','3','hongqiaoqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2918','343','东丽区','3','dongliqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2919','343','津南区','3','jinnanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2920','343','西青区','3','xiqingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2921','343','北辰区','3','beichenqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2922','343','塘沽区','3','tangguqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2923','343','汉沽区','3','hanguqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2924','343','大港区','3','dagangqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2925','343','武清区','3','wuqingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2926','343','宝坻区','3','baoqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2927','343','经济开发区','3','jingjikaifaqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2928','343','宁河县','3','ninghexian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2929','343','静海县','3','jinghaixian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('2930','343','蓟县','3','jixian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3325','394','合川区','3','hechuanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3326','394','江津区','3','jiangjinqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3327','394','南川区','3','nanchuanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3328','394','永川区','3','yongchuanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3329','394','南岸区','3','nananqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3330','394','渝北区','3','yubeiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3331','394','万盛区','3','wanshengqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3332','394','大渡口区','3','dadukouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3333','394','万州区','3','wanzhouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3334','394','北碚区','3','beiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3335','394','沙坪坝区','3','shapingbaqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3336','394','巴南区','3','bananqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3337','394','涪陵区','3','fulingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3338','394','江北区','3','jiangbeiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3339','394','九龙坡区','3','jiulongpoqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3340','394','渝中区','3','yuzhongqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3341','394','黔江开发区','3','qianjiangkaifaqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3342','394','长寿区','3','changshouqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3343','394','双桥区','3','shuangqiaoqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3344','394','綦江县','3','jiangxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3345','394','潼南县','3','nanxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3346','394','铜梁县','3','tongliangxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3347','394','大足县','3','dazuxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3348','394','荣昌县','3','rongchangxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3349','394','璧山县','3','shanxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3350','394','垫江县','3','dianjiangxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3351','394','武隆县','3','wulongxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3352','394','丰都县','3','fengduxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3353','394','城口县','3','chengkouxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3354','394','梁平县','3','liangpingxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3355','394','开县','3','kaixian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3356','394','巫溪县','3','wuxixian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3357','394','巫山县','3','wushanxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3358','394','奉节县','3','fengjiexian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3359','394','云阳县','3','yunyangxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3360','394','忠县','3','zhongxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3361','394','石柱','3','shizhu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3362','394','彭水','3','pengshui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3363','394','酉阳','3','youyang');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3364','394','秀山','3','xiushan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3365','395','沙田区','3','shatianqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3366','395','东区','3','dongqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3367','395','观塘区','3','guantangqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3368','395','黄大仙区','3','huangdaxianqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3369','395','九龙城区','3','jiulongchengqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3370','395','屯门区','3','tunmenqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3371','395','葵青区','3','kuiqingqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3372','395','元朗区','3','yuanlangqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3373','395','深水埗区','3','shenshui');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3374','395','西贡区','3','xigongqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3375','395','大埔区','3','dapuqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3376','395','湾仔区','3','wanziqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3377','395','油尖旺区','3','youjianwangqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3378','395','北区','3','beiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3379','395','南区','3','nanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3380','395','荃湾区','3','wanqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3381','395','中西区','3','zhongxiqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3382','395','离岛区','3','lidaoqu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3383','396','澳门','3','aomen');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3384','397','台北','3','taibei');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3385','397','高雄','3','gaoxiong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3386','397','基隆','3','jilong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3387','397','台中','3','taizhong');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3388','397','台南','3','tainan');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3389','397','新竹','3','xinzhu');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3390','397','嘉义','3','jiayi');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3391','397','宜兰县','3','yilanxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3392','397','桃园县','3','taoyuanxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3393','397','苗栗县','3','miaolixian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3394','397','彰化县','3','zhanghuaxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3395','397','南投县','3','nantouxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3396','397','云林县','3','yunlinxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3397','397','屏东县','3','pingdongxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3398','397','台东县','3','taidongxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3399','397','花莲县','3','hualianxian');
INSERT INTO `%DB_PREFIX%region_conf` VALUES ('3400','397','澎湖县','3','penghuxian');
DROP TABLE IF EXISTS `%DB_PREFIX%remind_count`;
CREATE TABLE `%DB_PREFIX%remind_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_count` int(11) NOT NULL COMMENT '分享数',
  `topic_count_time` int(11) NOT NULL,
  `dp_count` int(11) NOT NULL,
  `dp_count_time` int(11) NOT NULL,
  `msg_count` int(11) NOT NULL COMMENT '会员留言',
  `msg_count_time` int(11) NOT NULL,
  `buy_msg_count` int(11) NOT NULL,
  `buy_msg_count_time` int(11) NOT NULL,
  `order_count` int(11) NOT NULL,
  `order_count_time` int(11) NOT NULL,
  `refund_count` int(11) NOT NULL,
  `refund_count_time` int(11) NOT NULL,
  `retake_count` int(11) NOT NULL,
  `retake_count_time` int(11) NOT NULL,
  `incharge_count` int(11) NOT NULL,
  `incharge_count_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%remind_count` VALUES ('1','35','0','3','0','1','0','0','0','0','1345226482','0','1345226482','0','1345226482','0','0');
DROP TABLE IF EXISTS `%DB_PREFIX%role`;
CREATE TABLE `%DB_PREFIX%role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%role` VALUES ('4','测试管理员','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%role_access`;
CREATE TABLE `%DB_PREFIX%role_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `%DB_PREFIX%role_group`;
CREATE TABLE `%DB_PREFIX%role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nav_id` int(11) NOT NULL COMMENT '???????????ID',
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%role_group` VALUES ('1','首页','1','0','1','1');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('5','系统设置','3','0','1','1');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('7','管理员','3','0','1','2');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('8','数据库操作','3','0','1','6');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('9','系统日志','3','0','1','7');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('19','菜单设置','3','0','1','17');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('28','邮件管理','10','0','1','26');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('29','短信管理','10','0','1','27');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('31','广告设置','3','0','1','29');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('33','队列管理','10','0','1','31');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('69','会员管理','5','0','1','31');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('70','会员整合','5','0','1','32');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('71','同步登录','5','0','1','33');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('72','项目管理','13','0','1','33');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('73','项目支持','13','0','1','34');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('74','项目点评','13','0','1','35');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('75','支付接口','14','0','1','1');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('76','付款记录','14','0','1','2');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('77','消息模板','10','0','1','1');
INSERT INTO `%DB_PREFIX%role_group` VALUES ('78','提现记录','14','0','1','3');
DROP TABLE IF EXISTS `%DB_PREFIX%role_module`;
CREATE TABLE `%DB_PREFIX%role_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%role_module` VALUES ('5','Role','权限组别','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('6','Admin','管理员','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('12','Conf','系统配置','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('13','Database','数据库','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('15','Log','系统日志','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('19','File','文件管理','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('58','Index','首页','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('36','Nav','导航菜单','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('47','MailServer','邮件服务器','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('48','Sms','短信接口','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('53','Adv','广告模块','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('56','DealMsgList','业务群发队列','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('92','Cache','缓存处理','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('113','User','会员管理','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('114','MsgTemplate','消息模板管理','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('115','Integrate','会员整合','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('116','ApiLogin','同步登录','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('117','DealCate','项目分类','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('118','Deal','项目管理','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('119','Payment','支付接口','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('120','IndexImage','轮播广告图','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('121','Help','站点帮助','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('122','Faq','常见问题','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('123','DealOrder','项目支持','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('124','DealComment','项目点评','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('125','PaymentNotice','付款记录','1','0');
INSERT INTO `%DB_PREFIX%role_module` VALUES ('126','UserRefund','用户提现','1','0');
DROP TABLE IF EXISTS `%DB_PREFIX%role_nav`;
CREATE TABLE `%DB_PREFIX%role_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('1','首页','0','1','1');
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('3','系统设置','0','1','10');
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('5','会员管理','0','1','3');
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('10','短信邮件','0','1','7');
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('13','项目管理','0','1','4');
INSERT INTO `%DB_PREFIX%role_nav` VALUES ('14','支付管理','0','1','5');
DROP TABLE IF EXISTS `%DB_PREFIX%role_node`;
CREATE TABLE `%DB_PREFIX%role_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT '??????????????ID',
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=667 DEFAULT CHARSET=gbk;
INSERT INTO `%DB_PREFIX%role_node` VALUES ('334','main','首页','1','0','1','58');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('11','index','管理员分组列表','1','0','7','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('13','trash','管理员分组回收站','1','0','7','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('14','index','管理员列表','1','0','7','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('15','trash','管理员回收站','1','0','7','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('16','index','系统配置','1','0','5','12');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('17','index','数据库备份列表','1','0','8','13');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('18','sql','SQL操作','1','0','8','13');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('19','index','系统日志列表','1','0','9','15');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('24','do_upload','编辑器图片上传','1','0','0','19');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('43','index','导航菜单列表','1','0','19','36');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('57','index','邮件服务器列表','1','0','28','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('58','index','短信接口列表','1','0','29','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('63','index','广告列表','1','0','31','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('66','index','业务队列列表','1','0','33','56');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('68','add','添加页面','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('69','edit','编辑页面','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('70','set_effect','设置生效','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('71','add','添加执行','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('72','update','编辑执行','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('73','delete','删除','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('74','restore','恢复','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('75','foreverdelete','永久删除','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('76','set_default','设置默认管理员','1','0','0','6');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('77','add','添加页面','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('78','edit','编辑页面','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('79','update','编辑执行','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('80','foreverdelete','永久删除','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('81','set_effect','设置生效','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('99','update','更新配置','1','0','0','12');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('100','dump','备份数据','1','0','0','13');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('101','delete','删除备份','1','0','0','13');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('102','restore','恢复备份','1','0','0','13');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('103','load_file','读取页面','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('104','load_adv_id','读取广告位','1','0','0','53');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('105','execute','执行SQL语句','1','0','0','13');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('147','show_content','显示内容','1','0','0','56');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('148','send','手动发送','1','0','0','56');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('149','foreverdelete','永久删除','1','0','0','56');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('181','do_upload_img','图片控件上传','1','0','0','19');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('182','deleteImg','删除图片','1','0','0','19');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('198','foreverdelete','永久删除','1','0','0','15');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('205','add','添加页面','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('206','insert','添加执行','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('207','edit','编辑页面','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('208','update','编辑执行','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('209','set_effect','设置生效','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('210','foreverdelete','永久删除','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('211','send_demo','发送测试邮件','1','0','0','47');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('229','edit','编辑页面','1','0','0','36');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('230','update','编辑执行','1','0','0','36');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('231','set_effect','设置生效','1','0','0','36');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('232','set_sort','排序','1','0','0','36');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('257','add','添加页面','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('258','insert','添加执行','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('259','edit','编辑页面','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('260','update','编辑执行','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('261','set_effect','设置生效','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('262','delete','删除','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('263','restore','恢复','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('264','foreverdelete','永久删除','1','0','0','5');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('265','insert','安装页面','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('266','insert','安装保存','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('267','edit','编辑页面','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('268','update','编辑执行','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('269','uninstall','卸载','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('270','set_effect','设置生效','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('271','send_demo','发送测试短信','1','0','0','48');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('474','index','缓存处理','1','0','0','92');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('475','clear_parse_file','清空脚本样式缓存','1','0','0','92');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('477','clear_data','清空数据缓存','1','0','0','92');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('480','syn_data','同步数据','1','0','0','92');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('481','clear_image','清空图片缓存','1','0','0','92');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('482','clear_admin','清空后台缓存','1','0','0','92');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('605','index','消息模板','1','0','77','114');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('606','update','更新模板','1','0','0','114');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('607','index','会员列表','1','0','69','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('608','add','添加会员','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('609','insert','添提执行','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('610','edit','编辑会员','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('611','update','编辑执行','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('612','delete','删除会员','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('613','modify_account','会员资金变更','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('614','account_detail','帐户日志','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('615','foreverdelete_account_detail','删除帐户日志','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('616','consignee','配送地址','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('617','foreverdelete_consignee','删除配送地址','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('618','weibo','微博列表','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('619','foreverdelete_weibo','删除微博','1','0','0','113');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('620','index','会员整合','1','0','70','115');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('621','save','执行整合','1','0','0','115');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('622','uninstall','卸载整合','1','0','0','115');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('623','index','同步登录接口','1','0','71','116');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('624','insert','安装接口','1','0','0','116');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('625','update','更新配置','1','0','0','116');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('626','uninstall','卸载接口','1','0','0','116');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('627','index','分类列表','1','0','72','117');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('628','insert','添加分类','1','0','0','117');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('629','update','更新分类','1','0','0','117');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('630','foreverdelete','删除分类','1','0','0','117');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('631','online_index','上线项目列表','1','0','72','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('632','submit_index','未审核项目','1','0','72','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('633','index','支付接口列表','1','0','75','119');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('634','insert','安装支付接口','1','0','0','119');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('635','update','更新支付接口','1','0','0','119');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('636','uninstall','卸载接口','1','0','0','119');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('637','index','轮播广告设置','1','0','5','120');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('638','insert','添加广告','1','0','0','120');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('639','update','修改广告','1','0','0','120');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('640','foreverdelete','删除广告','1','0','0','120');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('641','delete_index','回收站','1','0','72','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('642','index','帮助列表','1','0','5','121');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('643','insert','添加帮助','1','0','0','121');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('644','update','修改帮助','1','0','0','121');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('645','foreverdelete','删除帮助','1','0','0','121');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('646','index','常见问题','1','0','5','122');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('647','insert','添加问题','1','0','0','122');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('648','update','更新问题','1','0','0','122');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('649','foreverdelete','删除问题','1','0','0','122');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('650','pay_log','筹款发放','1','0','0','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('651','save_pay_log','发放','1','0','0','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('652','del_pay_log','删除发放','1','0','0','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('653','deal_log','项目日志','1','0','0','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('654','del_deal_log','删除日志','1','0','0','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('655','batch_refund','批量退款','1','0','0','118');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('656','index','项目支持','1','0','73','123');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('657','view','查看详情','1','0','0','123');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('658','refund','项目退款','1','0','0','123');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('659','delete','删除支持','1','0','0','123');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('660','incharge','项目收款','1','0','0','123');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('661','index','项目点评','1','0','74','124');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('662','index','付款记录','1','0','76','125');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('663','delete','删除记录','1','0','0','125');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('664','index','提现记录','1','0','78','126');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('665','delete','删除记录','1','0','0','126');
INSERT INTO `%DB_PREFIX%role_node` VALUES ('666','confirm','确认提现','1','0','0','126');
DROP TABLE IF EXISTS `%DB_PREFIX%shop_cate`;
CREATE TABLE `%DB_PREFIX%shop_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `pid` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('24','服装,内衣,配件','','0','0','1','1','cloth','1');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('25','鞋,箱包','','0','0','1','2','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('26','珠宝饰品、手表眼镜','','0','0','1','3','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('27','家用电器','','0','0','1','4','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('28','居家生活','','0','0','1','5','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('29','母婴用品','','0','0','1','6','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('30','女装','','24','0','1','7','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('31','男装','','24','0','1','8','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('32','家居服','','24','0','1','9','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('33','毛衣','','24','0','1','10','','0');
INSERT INTO `%DB_PREFIX%shop_cate` VALUES ('34','皮衣','','24','0','1','11','','0');
DROP TABLE IF EXISTS `%DB_PREFIX%sms`;
CREATE TABLE `%DB_PREFIX%sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `server_url` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `%DB_PREFIX%supplier`;
CREATE TABLE `%DB_PREFIX%supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `bank_info` text NOT NULL,
  `money` decimal(20,4) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `is_effect` (`is_effect`),
  KEY `sort` (`sort`),
  KEY `city_id` (`city_id`),
  FULLTEXT KEY `name_match` (`name_match`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier` VALUES ('15','闽粤汇','./public/attachment/201201/4f013e6e7145c.jpg','','0','1','0','ux38397ux31908,ux38397ux31908ux27719','闽粤,闽粤汇','','0.0000','','');
INSERT INTO `%DB_PREFIX%supplier` VALUES ('16','爱琴海餐厅','./public/attachment/201201/4f013e40ac45d.jpg','','0','1','0','ux29233ux29748ux28023,ux39184ux21381,ux29233ux29748ux28023ux39184ux21381','爱琴海,餐厅,爱琴海餐厅','','0.0000','','');
INSERT INTO `%DB_PREFIX%supplier` VALUES ('17','老刘野生大鱼坊','./public/attachment/201201/4f013dca6585d.jpg','','0','1','0','ux32769ux21016,ux22823ux40060,ux37326ux29983,ux32769ux21016ux37326ux29983ux22823ux40060ux22346','老刘,大鱼,野生,老刘野生大鱼坊','','0.0000','','');
INSERT INTO `%DB_PREFIX%supplier` VALUES ('18','享客来牛排世家','./public/attachment/201201/4f013ee3d7cb9.jpg','','0','0','0','ux29275ux25490,ux19990ux23478,ux20139ux23458ux26469ux29275ux25490ux19990ux23478','牛排,世家,享客来牛排世家','','0.0000','','');
INSERT INTO `%DB_PREFIX%supplier` VALUES ('19','格瑞雅美容院','./public/attachment/201201/4f013fc452347.jpg','','0','0','0','ux38597ux32654,ux26684ux29790,ux23481ux38498,ux26684ux29790ux38597ux32654ux23481ux38498','雅美,格瑞,容院,格瑞雅美容院','','0.0000','','');
INSERT INTO `%DB_PREFIX%supplier` VALUES ('20','馨语河畔','./public/attachment/201201/4f01422c0c096.jpg','','0','0','0','ux27827ux30036,ux39336ux35821ux27827ux30036','河畔,馨语河畔','','0.0000','','');
INSERT INTO `%DB_PREFIX%supplier` VALUES ('21','泡泡糖宝贝游泳馆','./public/attachment/201201/4f0142c918abd.jpg','','0','0','0','ux27873ux27873ux31958,ux28216ux27891ux39302,ux23453ux36125,ux27873ux27873ux31958ux23453ux36125ux28216ux27891ux39302','泡泡糖,游泳馆,宝贝,泡泡糖宝贝游泳馆','','0.0000','','');
DROP TABLE IF EXISTS `%DB_PREFIX%supplier_account`;
CREATE TABLE `%DB_PREFIX%supplier_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  `login_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `allow_delivery` tinyint(1) NOT NULL,
  `allow_charge` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_account_name` (`account_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `%DB_PREFIX%supplier_account` VALUES ('7','fanwe','6714ccb93be0fda4e51f206b91b46358','21','1','0','测试用的帐号','127.0.0.1','0','1330109616','1','0');
