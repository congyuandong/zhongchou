<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_payment_notice`;");
E_C("CREATE TABLE `fanwe_payment_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'order_id?0?????',
  `is_paid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `memo` text NOT NULL,
  `money` double(20,4) NOT NULL,
  `outer_notice_sn` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL COMMENT '0????',
  `deal_item_id` int(11) NOT NULL COMMENT '0????',
  `deal_name` varchar(255) NOT NULL COMMENT '??????',
  PRIMARY KEY (`id`),
  UNIQUE KEY `notice_sn_unk` (`notice_sn`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_payment_notice` values('200','20121107399','1352230157','0','67','0','19','24','ICBCB2C','','500.0000','','56','24','拥有自己的咖啡馆');");
E_D("replace into `fanwe_payment_notice` values('201','20121107985','1352230180','1352230180','67','1','19','0','','管理员收款','500.0000','','56','24','拥有自己的咖啡馆');");
E_D("replace into `fanwe_payment_notice` values('202','20121107931','1352231631','0','78','0','19','24','CCB','ttt','500.0000','','58','30','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！');");
E_D("replace into `fanwe_payment_notice` values('203','20121107124','1352231671','0','79','0','17','24','ICBCB2C','部份支付','200.0000','','56','24','拥有自己的咖啡馆');");

require("../../inc/footer.php");
?>