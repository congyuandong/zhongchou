<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_article_cate`;");
E_C("CREATE TABLE `fanwe_article_cate` (
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_article_cate` values('11','公司信息','','0','1','0','1','4');");
E_D("replace into `fanwe_article_cate` values('10','商务合作','','0','1','0','1','2');");
E_D("replace into `fanwe_article_cate` values('9','获取更新','','0','1','0','1','3');");
E_D("replace into `fanwe_article_cate` values('7','用户帮助','','0','1','0','1','1');");
E_D("replace into `fanwe_article_cate` values('18','商城公告','','0','1','0','2','5');");
E_D("replace into `fanwe_article_cate` values('19','系统文章','','0','1','0','3','6');");
E_D("replace into `fanwe_article_cate` values('22','热门推荐','','0','1','0','2','7');");

require("../../inc/footer.php");
?>