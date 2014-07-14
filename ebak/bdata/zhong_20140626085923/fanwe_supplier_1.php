<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_supplier`;");
E_C("CREATE TABLE `fanwe_supplier` (
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_supplier` values('15','闽粤汇','./public/attachment/201201/4f013e6e7145c.jpg','','0','1','0','ux38397ux31908,ux38397ux31908ux27719','闽粤,闽粤汇','','0.0000','','');");
E_D("replace into `fanwe_supplier` values('16','爱琴海餐厅','./public/attachment/201201/4f013e40ac45d.jpg','','0','1','0','ux29233ux29748ux28023,ux39184ux21381,ux29233ux29748ux28023ux39184ux21381','爱琴海,餐厅,爱琴海餐厅','','0.0000','','');");
E_D("replace into `fanwe_supplier` values('17','老刘野生大鱼坊','./public/attachment/201201/4f013dca6585d.jpg','','0','1','0','ux32769ux21016,ux22823ux40060,ux37326ux29983,ux32769ux21016ux37326ux29983ux22823ux40060ux22346','老刘,大鱼,野生,老刘野生大鱼坊','','0.0000','','');");
E_D("replace into `fanwe_supplier` values('18','享客来牛排世家','./public/attachment/201201/4f013ee3d7cb9.jpg','','0','0','0','ux29275ux25490,ux19990ux23478,ux20139ux23458ux26469ux29275ux25490ux19990ux23478','牛排,世家,享客来牛排世家','','0.0000','','');");
E_D("replace into `fanwe_supplier` values('19','格瑞雅美容院','./public/attachment/201201/4f013fc452347.jpg','','0','0','0','ux38597ux32654,ux26684ux29790,ux23481ux38498,ux26684ux29790ux38597ux32654ux23481ux38498','雅美,格瑞,容院,格瑞雅美容院','','0.0000','','');");
E_D("replace into `fanwe_supplier` values('20','馨语河畔','./public/attachment/201201/4f01422c0c096.jpg','','0','0','0','ux27827ux30036,ux39336ux35821ux27827ux30036','河畔,馨语河畔','','0.0000','','');");
E_D("replace into `fanwe_supplier` values('21','泡泡糖宝贝游泳馆','./public/attachment/201201/4f0142c918abd.jpg','','0','0','0','ux27873ux27873ux31958,ux28216ux27891ux39302,ux23453ux36125,ux27873ux27873ux31958ux23453ux36125ux28216ux27891ux39302','泡泡糖,游泳馆,宝贝,泡泡糖宝贝游泳馆','','0.0000','','');");

require("../../inc/footer.php");
?>