<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate`;");
E_C("CREATE TABLE `fanwe_deal_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_cate` values('1','设计','1');");
E_D("replace into `fanwe_deal_cate` values('2','科技','2');");
E_D("replace into `fanwe_deal_cate` values('3','影视','3');");
E_D("replace into `fanwe_deal_cate` values('4','摄影','4');");
E_D("replace into `fanwe_deal_cate` values('5','音乐','5');");
E_D("replace into `fanwe_deal_cate` values('6','出版','6');");
E_D("replace into `fanwe_deal_cate` values('7','活动','7');");
E_D("replace into `fanwe_deal_cate` values('8','游戏','8');");
E_D("replace into `fanwe_deal_cate` values('9','旅行','9');");
E_D("replace into `fanwe_deal_cate` values('10','其他','10');");
E_D("replace into `fanwe_deal_cate` values('11','预热','11');");

require("../../inc/footer.php");
?>