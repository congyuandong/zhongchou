<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_m_adv`;");
E_C("CREATE TABLE `fanwe_m_adv` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `img` varchar(255) DEFAULT '',
  `page` enum('sharelist','index') DEFAULT 'sharelist',
  `type` tinyint(1) DEFAULT '0' COMMENT '1.标签集,2.url地址,3.分类排行,4.最亮达人,5.搜索发现,6.一起拍,7.热门单品排行,8.直接显示某个分享',
  `data` text,
  `sort` smallint(5) DEFAULT '10',
  `status` tinyint(1) DEFAULT '1',
  `city_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_m_adv` values('8','达人','./public/attachment/201203/03/09/4f51762d89d4d.jpg','sharelist','4','','1','1','0');");
E_D("replace into `fanwe_m_adv` values('9','方维o2o','./public/attachment/201202/04/15/4f2ce3d1827e4.jpg','index','2','a:1:{s:3:\"url\";s:20:\"http://www.fanwe.com\";}','2','1','0');");
E_D("replace into `fanwe_m_adv` values('10','支付宝广告','./public/attachment/201203/03/09/4f5176077b5e6.jpg','index','1','a:2:{s:3:\"cid\";i:1;s:4:\"tags\";a:4:{i:0;s:6:\"游戏\";i:1;s:6:\"电影\";i:2;s:6:\"可爱\";i:3;s:6:\"卖萌\";}}','3','1','0');");
E_D("replace into `fanwe_m_adv` values('11','手机广告','./public/attachment/201203/03/09/4f5175debd973.jpg','index','8','a:1:{s:8:\"share_id\";i:137;}','4','1','0');");
E_D("replace into `fanwe_m_adv` values('12','方维o2o','./public/attachment/201202/04/15/4f2ce3d1827e4.jpg','sharelist','2','a:1:{s:3:\"url\";s:20:\"http://www.fanwe.com\";}','5','1','0');");

require("../../inc/footer.php");
?>