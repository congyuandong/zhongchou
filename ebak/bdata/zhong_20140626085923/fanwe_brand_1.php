<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_brand`;");
E_C("CREATE TABLE `fanwe_brand` (
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_brand` values('8','耐克','./public/attachment/201201/4f0125515a461.gif','','耐克商标，图案是个小钩子，造型简洁有力，急如闪电，一看就让人想到使用耐克体育用品后所产生的速度和爆发力。','2','25','0','0','0','0','0');");
E_D("replace into `fanwe_brand` values('7','达芙妮','./public/attachment/201201/4f0124a1e1447.gif','','达芙妮的名字来源于希腊女神Daphne与太阳神阿波罗的爱情神话，空间主题的设计象征着对爱亘古不变的追逐。','1','24','0','0','0','0','0');");
E_D("replace into `fanwe_brand` values('9','南极人','./public/attachment/201201/4f012585146cb.gif','','南极人成立于1998年，累计销售额近90亿，拥有30000多个销售网点，品牌覆盖率高达89%，14年中国针织行业家喻户晓的领先品牌，屡次创造行业奇迹，是中国纺织行业的领导品牌.','3','24','0','0','0','0','0');");
E_D("replace into `fanwe_brand` values('10','茵佳妮','./public/attachment/201201/4f0125db13be8.gif','','“茵佳妮”不仅仅为消费者提供服装，更注重为顾客提供全新的品牌体验与内心共鸣，契合顾客群文化内涵注入品牌力量。“incolour茵佳妮”需要的是顾客发自内心的认可与热爱，而并非单一的着装感受。','4','24','0','0','0','0','0');");
E_D("replace into `fanwe_brand` values('11','歌莉娅','./public/attachment/201201/4f0126234229b.gif','','歌莉娅, 诞生于1995年以来, 不断地周游列国探索采撷, 将潮流与各地文化融合, 创作时尚又具有气质的女性服饰。我们相信「旅行就是生活」--世界著名童话故事大师安徒生的经典名言.','5','24','0','0','0','0','0');");
E_D("replace into `fanwe_brand` values('12','七匹狼','./public/attachment/201201/4f01322901e23.gif','','七匹狼狼文化的理念是勇敢，忠诚，沟通，力量，团队，不屈，自信。追逐人生，男人不止一面。','6','31','0','0','0','0','0');");

require("../../inc/footer.php");
?>