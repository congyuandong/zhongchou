<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_user_consignee`;");
E_C("CREATE TABLE `fanwe_user_consignee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_user_consignee` values('18','18','福建','福州','福建福州台江区工业路博美诗邦','13333333333','350000','方维');");
E_D("replace into `fanwe_user_consignee` values('19','17','福建','福州','方维方维方维方维方维','14444444444','22222','方维');");
E_D("replace into `fanwe_user_consignee` values('20','19','湖北','襄樊','test','13344455555','test','test');");
E_D("replace into `fanwe_user_consignee` values('21','22','甘肃','兰州','啊实打实大','13800138056','564121','年十大');");

require("../../inc/footer.php");
?>