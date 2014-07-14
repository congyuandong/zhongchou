<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_article`;");
E_C("CREATE TABLE `fanwe_article` (
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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_article` values('20','关于我们','关于我们','11','0','1305160934','0','1','','0','0','18','11','','','','','0','','');");
E_D("replace into `fanwe_article` values('37','岁末回馈5折原价1299正品七匹狼男装外套时尚中长装羽绒服701604','','18','1325451781','1325451781','0','1','u:shop|goods|id=48','0','0','1','27','','','','','0','','');");
E_D("replace into `fanwe_article` values('38','老刘野生大鱼坊超值套餐','','18','1325451857','1325451857','0','1','u:tuan|deal|id=39','0','0','0','28','','','','','0','','');");
E_D("replace into `fanwe_article` values('39','全场新品上市','','18','1325451918','1325451918','0','1','u:shop|rec#rnew','0','0','0','29','','','','new','0','','');");
E_D("replace into `fanwe_article` values('40','优惠券频道 更多优惠精彩','','18','1325452086','1325452086','0','1','u:youhui|index','0','0','1','30','','','','youhui','0','','');");
E_D("replace into `fanwe_article` values('27','免责条款','免责条款','19','1305160898','1305160898','0','1','','0','0','3','18','','','','','0','','');");
E_D("replace into `fanwe_article` values('28','隐私保护','隐私保护','19','1305160911','1305160911','0','1','','0','0','4','19','','','','','0','','');");
E_D("replace into `fanwe_article` values('29','咨询热点','咨询热点','19','1305160923','1305160923','0','1','','0','0','2','20','','','','','0','','');");
E_D("replace into `fanwe_article` values('30','联系我们','联系我们','19','1305160934','1305160934','0','1','','0','0','30','21','','','','','0','','');");
E_D("replace into `fanwe_article` values('31','公司简介','公司简介','19','1305160946','1305160946','0','1','','0','0','92','22','','','','','0','','');");
E_D("replace into `fanwe_article` values('5','如何抽奖','如何抽奖','19','0','1305489528','0','1','','0','0','3','0','','','','','0','','');");
E_D("replace into `fanwe_article` values('33','女装新品热卖中!','','18','1325451464','1325451573','0','1','u:shop|cate|id=30','0','0','2','23','','','','','0','','');");
E_D("replace into `fanwe_article` values('6','加入我们','加入我们','11','0','1324319464','0','1','u:shop|user#register','0','0','22','2','','','','','0','','');");
E_D("replace into `fanwe_article` values('7','开放API','','9','0','1324238746','0','1','u:tuan|dhapi','0','0','4','1','','','','','0','','');");
E_D("replace into `fanwe_article` values('8','RSS订阅','','9','0','1324083243','0','1','u:tuan|rss','0','0','0','4','','','','','0','','');");
E_D("replace into `fanwe_article` values('9','商家登录','','10','0','1324069250','0','1','u:tuan|coupon#supplier_login','0','0','0','5','','','','','0','','');");
E_D("replace into `fanwe_article` values('10','友情链接','','10','0','1324083193','0','1','u:shop|link','0','0','0','6','','','','','0','','');");
E_D("replace into `fanwe_article` values('34','品牌馆开张','','18','1325451633','1325451633','0','1','u:shop|brand','0','0','0','24','','','','','0','','');");
E_D("replace into `fanwe_article` values('35','各种特价，抢到手软！','各种特价，抢到手软！','18','1325451669','1325451669','0','1','','0','0','0','25','','','','','0','','');");
E_D("replace into `fanwe_article` values('36','# 5元奖励包装评论 5000万礼卡免费领','5元奖励包装评论 5000万礼卡免费领','18','1325451735','1325451735','0','1','','0','0','0','26','','','','','0','','');");
E_D("replace into `fanwe_article` values('41','2月情人密语之约“惠”生活指南！','','22','1329333829','1329333855','0','1','u:youhui|fcate','0','0','1','31','','','','','3','每周播报','情人节约会哪里走？丁丁优惠带您吃喝玩乐应有尽有，网罗沪上甜点热饮，休闲娱乐，“惠”生活的亲密爱人们，赶快点击进入挑选你的情人节行程吧！');");
E_D("replace into `fanwe_article` values('42','美罗城“因微爱情”主题活动开始啦！','','22','1329334475','1329334475','0','1','u:youhui|event','0','0','0','32','','','','','3','独家活动','2012年2月11日至3月14日，微博“微爱情@美罗城”情人节晒出爱的礼物或宣言，即有机会赢取价值20000元大奖“马尔代夫”双人游、奔驰情人节礼品。');");
E_D("replace into `fanwe_article` values('43','“爱”月情人节 找情侣送约会基金','','22','1329334503','1329334503','0','1','u:youhui|event','0','0','0','33','','','','','3','全城热恋','圣诞节一个人过，情人节还想一个人过？在世界末日前的最后一个情人节，丁丁网为你找到最match的TA！更有200元约会基金为你们随时待命……');");

require("../../inc/footer.php");
?>