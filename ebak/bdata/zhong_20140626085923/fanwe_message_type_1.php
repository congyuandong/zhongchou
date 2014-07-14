<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_message_type`;");
E_C("CREATE TABLE `fanwe_message_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  `is_fix` tinyint(1) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_message_type` values('1','deal','1','商品评论','1','0');");
E_D("replace into `fanwe_message_type` values('2','deal_order','1','订单留言','0','0');");
E_D("replace into `fanwe_message_type` values('3','feedback','1','意见反馈','0','0');");
E_D("replace into `fanwe_message_type` values('4','seller','1','商务合作','0','0');");
E_D("replace into `fanwe_message_type` values('6','tx','1','提现申请','0','0');");
E_D("replace into `fanwe_message_type` values('5','after_sale','0','售后服务','0','2');");
E_D("replace into `fanwe_message_type` values('8','before_sale','0','售前咨询','1','3');");
E_D("replace into `fanwe_message_type` values('10','faq','1','问题答疑','1','0');");

require("../../inc/footer.php");
?>