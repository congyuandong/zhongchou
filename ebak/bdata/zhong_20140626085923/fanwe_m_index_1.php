<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_m_index`;");
E_C("CREATE TABLE `fanwe_m_index` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `vice_name` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT '',
  `img` varchar(255) DEFAULT '',
  `type` tinyint(1) DEFAULT '0' COMMENT '1.标签集,2.url地址,3.分类排行,4.最亮达人,5.搜索发现,6.一起拍,7.热门单品排行,8.直接显示某个分享',
  `data` text,
  `sort` smallint(5) DEFAULT '10',
  `status` tinyint(1) DEFAULT '1',
  `is_hot` tinyint(1) DEFAULT '0',
  `is_new` tinyint(1) DEFAULT '0',
  `city_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_m_index` values('18','优惠列表','优惠列表','优惠列表','./public/attachment/201203/03/09/4f5178a568027.png','12','a:1:{s:7:\"cate_id\";i:0;}','5','1','0','0','0');");
E_D("replace into `fanwe_m_index` values('19','团购列表','团购列表','团购列表','./public/attachment/201203/03/09/4f517883c6873.png','9','a:1:{s:7:\"cate_id\";i:0;}','6','1','0','0','0');");
E_D("replace into `fanwe_m_index` values('20','商城列表','商城列表','商城列表','./public/attachment/201203/03/09/4f51795a1792a.png','10','a:1:{s:7:\"cate_id\";i:0;}','7','1','0','0','0');");
E_D("replace into `fanwe_m_index` values('21','优惠首页','优惠首页','优惠首页','./public/attachment/201203/03/09/4f5179727e5f6.png','20','','10','1','0','0','0');");

require("../../inc/footer.php");
?>