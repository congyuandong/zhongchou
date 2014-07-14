<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_shop_cate`;");
E_C("CREATE TABLE `fanwe_shop_cate` (
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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_shop_cate` values('24','服装,内衣,配件','','0','0','1','1','cloth','1');");
E_D("replace into `fanwe_shop_cate` values('25','鞋,箱包','','0','0','1','2','','0');");
E_D("replace into `fanwe_shop_cate` values('26','珠宝饰品、手表眼镜','','0','0','1','3','','0');");
E_D("replace into `fanwe_shop_cate` values('27','家用电器','','0','0','1','4','','0');");
E_D("replace into `fanwe_shop_cate` values('28','居家生活','','0','0','1','5','','0');");
E_D("replace into `fanwe_shop_cate` values('29','母婴用品','','0','0','1','6','','0');");
E_D("replace into `fanwe_shop_cate` values('30','女装','','24','0','1','7','','0');");
E_D("replace into `fanwe_shop_cate` values('31','男装','','24','0','1','8','','0');");
E_D("replace into `fanwe_shop_cate` values('32','家居服','','24','0','1','9','','0');");
E_D("replace into `fanwe_shop_cate` values('33','毛衣','','24','0','1','10','','0');");
E_D("replace into `fanwe_shop_cate` values('34','皮衣','','24','0','1','11','','0');");

require("../../inc/footer.php");
?>