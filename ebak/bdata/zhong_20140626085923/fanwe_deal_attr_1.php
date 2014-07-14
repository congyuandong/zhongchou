<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_attr`;");
E_C("CREATE TABLE `fanwe_deal_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `goods_type_attr_id` int(11) NOT NULL,
  `price` decimal(20,4) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `is_checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_type_attr_id` (`goods_type_attr_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_attr` values('222','均码','13','0.0000','40','1');");
E_D("replace into `fanwe_deal_attr` values('221','中码','13','0.0000','40','1');");
E_D("replace into `fanwe_deal_attr` values('220','大码','13','0.0000','40','1');");
E_D("replace into `fanwe_deal_attr` values('219','红色','12','0.0000','40','1');");
E_D("replace into `fanwe_deal_attr` values('218','均码','13','10.0000','41','0');");
E_D("replace into `fanwe_deal_attr` values('217','大码','13','0.0000','41','0');");
E_D("replace into `fanwe_deal_attr` values('216','中码','13','0.0000','41','0');");
E_D("replace into `fanwe_deal_attr` values('215','小码','13','0.0000','41','0');");
E_D("replace into `fanwe_deal_attr` values('214','黑色','12','0.0000','41','0');");
E_D("replace into `fanwe_deal_attr` values('213','红色','12','0.0000','41','0');");
E_D("replace into `fanwe_deal_attr` values('211','中码','13','0.0000','42','0');");
E_D("replace into `fanwe_deal_attr` values('210','小码','13','0.0000','42','0');");
E_D("replace into `fanwe_deal_attr` values('209','均码','13','0.0000','42','0');");
E_D("replace into `fanwe_deal_attr` values('208','北极蓝','12','0.0000','42','0');");
E_D("replace into `fanwe_deal_attr` values('207','玫红','12','0.0000','42','0');");
E_D("replace into `fanwe_deal_attr` values('206','洋紫','12','0.0000','42','0');");
E_D("replace into `fanwe_deal_attr` values('205','中码','13','0.0000','43','0');");
E_D("replace into `fanwe_deal_attr` values('204','均码','13','0.0000','43','0');");
E_D("replace into `fanwe_deal_attr` values('203','红色','12','0.0000','43','0');");
E_D("replace into `fanwe_deal_attr` values('202','驼色','12','0.0000','43','0');");
E_D("replace into `fanwe_deal_attr` values('201','黑色','12','0.0000','43','0');");
E_D("replace into `fanwe_deal_attr` values('199','中码','13','0.0000','44','0');");
E_D("replace into `fanwe_deal_attr` values('198','翡翠绿','12','0.0000','44','0');");
E_D("replace into `fanwe_deal_attr` values('196','均码','13','0.0000','45','0');");
E_D("replace into `fanwe_deal_attr` values('195','红黑格','12','0.0000','45','0');");
E_D("replace into `fanwe_deal_attr` values('194','黑白格','12','0.0000','45','0');");
E_D("replace into `fanwe_deal_attr` values('193','均码','13','0.0000','46','0');");
E_D("replace into `fanwe_deal_attr` values('192','紫色','12','0.0000','46','0');");
E_D("replace into `fanwe_deal_attr` values('191','黑色','12','0.0000','46','0');");
E_D("replace into `fanwe_deal_attr` values('189','大码','13','0.0000','47','0');");
E_D("replace into `fanwe_deal_attr` values('188','超大码','13','0.0000','47','0');");
E_D("replace into `fanwe_deal_attr` values('187','黑色','12','0.0000','47','0');");
E_D("replace into `fanwe_deal_attr` values('190','中码','13','0.0000','47','0');");
E_D("replace into `fanwe_deal_attr` values('197','中码','13','0.0000','45','0');");
E_D("replace into `fanwe_deal_attr` values('200','均码','13','0.0000','44','0');");
E_D("replace into `fanwe_deal_attr` values('212','大码','13','0.0000','42','0');");

require("../../inc/footer.php");
?>