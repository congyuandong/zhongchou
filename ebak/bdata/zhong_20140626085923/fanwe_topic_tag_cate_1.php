<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_topic_tag_cate`;");
E_C("CREATE TABLE `fanwe_topic_tag_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL COMMENT '附标题',
  `mobile_title_bg` varchar(255) NOT NULL COMMENT '手机分类背景图',
  `sort` int(11) NOT NULL,
  `showin_mobile` tinyint(1) NOT NULL,
  `showin_web` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_topic_tag_cate` values('1','休闲娱乐','','./public/attachment/201202/04/16/4f2cef7b454fc.png','0','1','1');");
E_D("replace into `fanwe_topic_tag_cate` values('2','乐享美食','','./public/attachment/201202/04/16/4f2cef6c8a9d1.png','0','1','1');");
E_D("replace into `fanwe_topic_tag_cate` values('3','旅游酒店','','./public/attachment/201202/04/16/4f2cef7b454fc.png','0','1','1');");
E_D("replace into `fanwe_topic_tag_cate` values('4','都市购物','','./public/attachment/201202/04/16/4f2cef7b454fc.png','0','1','1');");
E_D("replace into `fanwe_topic_tag_cate` values('5','幸福居家','','','1','0','1');");
E_D("replace into `fanwe_topic_tag_cate` values('6','浪漫婚恋','','','2','0','1');");
E_D("replace into `fanwe_topic_tag_cate` values('7','玩乐帮派','','','3','0','1');");

require("../../inc/footer.php");
?>