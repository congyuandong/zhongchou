<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_item_image`;");
E_C("CREATE TABLE `fanwe_deal_item_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `deal_item_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_item_id` (`deal_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_item_image` values('40','55','18','./public/attachment/201211/07/10/1df0db265b86352e3886b9c62e8ef01b18.jpg');");
E_D("replace into `fanwe_deal_item_image` values('41','55','18','./public/attachment/201211/07/10/4a4a8bdca29b165b7bd5f510ce200c4385.jpg');");
E_D("replace into `fanwe_deal_item_image` values('42','55','18','./public/attachment/201211/07/10/c8223b4192fc39e4a3dce8a986eccf3994.jpg');");
E_D("replace into `fanwe_deal_item_image` values('43','55','19','./public/attachment/201211/07/10/a37a306a3bedaa664011115de251576034.jpg');");
E_D("replace into `fanwe_deal_item_image` values('44','55','20','./public/attachment/201211/07/10/cc12200a637c9db1dcf7354e592f220985.jpg');");
E_D("replace into `fanwe_deal_item_image` values('45','55','21','./public/attachment/201211/07/10/d65e7badd7098a0922db2b49c2fd8ef011.jpg');");
E_D("replace into `fanwe_deal_item_image` values('46','56','22','./public/attachment/201211/07/11/5d379d45a98db1816b027e85d59ca47c58.jpg');");
E_D("replace into `fanwe_deal_item_image` values('47','56','23','./public/attachment/201211/07/11/1ed8f029594ec5e809d95d8074fe3d2760.jpg');");
E_D("replace into `fanwe_deal_item_image` values('48','56','24','./public/attachment/201211/07/11/b08505b20319f493cbc03debd52eceb474.jpg');");
E_D("replace into `fanwe_deal_item_image` values('49','56','24','./public/attachment/201211/07/11/18b75305fe13c623363abb4ab995f6af34.jpg');");
E_D("replace into `fanwe_deal_item_image` values('50','57','25','./public/attachment/201211/07/11/7ecd287a12bff4289d305c0fb949889e29.jpg');");
E_D("replace into `fanwe_deal_item_image` values('51','57','26','./public/attachment/201211/07/11/d84152ab2d569c584c795018846cbb7233.jpg');");
E_D("replace into `fanwe_deal_item_image` values('52','57','27','./public/attachment/201211/07/11/bdefb72e944b41b60a751d50d0d84fe983.jpg');");
E_D("replace into `fanwe_deal_item_image` values('53','57','28','./public/attachment/201211/07/11/c0df234411b34427dedb121ab9bd577352.jpg');");
E_D("replace into `fanwe_deal_item_image` values('54','57','28','./public/attachment/201211/07/11/9c82e2a30f02513d0a197f3d4573794e76.jpg');");
E_D("replace into `fanwe_deal_item_image` values('55','57','29','./public/attachment/201211/07/11/326730647fde78562777b82f0a9e81a155.jpg');");
E_D("replace into `fanwe_deal_item_image` values('56','58','30','./public/attachment/201211/07/11/06bab2f2823bdd050ef8949162bf717729.jpg');");
E_D("replace into `fanwe_deal_item_image` values('57','58','31','./public/attachment/201211/07/11/c835e1fd43685e3106c4de641f70cf2b62.jpg');");
E_D("replace into `fanwe_deal_item_image` values('58','58','32','./public/attachment/201211/07/11/44036ee2e369e9c91be966a329cac70084.jpg');");

require("../../inc/footer.php");
?>