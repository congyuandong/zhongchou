<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_m_config_list`;");
E_C("CREATE TABLE `fanwe_m_config_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pay_id` varchar(50) DEFAULT NULL,
  `group` int(10) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `has_calc` int(1) DEFAULT NULL,
  `money` float(10,2) DEFAULT NULL,
  `is_verify` int(1) DEFAULT '0' COMMENT '0:无效；1:有效',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_m_config_list` values('1','0','1','Malipay','支付宝/各银行','1','0.00','0');");
E_D("replace into `fanwe_m_config_list` values('2','0','1','Mcod','货到付款','1','0.00','0');");
E_D("replace into `fanwe_m_config_list` values('3','','5','1','家','0','0.00','1');");
E_D("replace into `fanwe_m_config_list` values('4','','5','2','公司','0','0.00','1');");

require("../../inc/footer.php");
?>