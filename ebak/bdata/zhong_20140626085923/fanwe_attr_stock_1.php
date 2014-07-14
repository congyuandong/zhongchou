<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_attr_stock`;");
E_C("CREATE TABLE `fanwe_attr_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `attr_cfg` text NOT NULL,
  `stock_cfg` int(11) NOT NULL,
  `attr_str` text NOT NULL,
  `buy_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_attr_stock` values('89','40','a:2:{i:12;s:6:\"红色\";i:13;s:6:\"大码\";}','10','红色大码','0');");
E_D("replace into `fanwe_attr_stock` values('90','40','a:2:{i:12;s:6:\"红色\";i:13;s:6:\"中码\";}','5','红色中码','0');");
E_D("replace into `fanwe_attr_stock` values('91','40','a:2:{i:12;s:6:\"红色\";i:13;s:6:\"均码\";}','1000','红色均码','0');");

require("../../inc/footer.php");
?>