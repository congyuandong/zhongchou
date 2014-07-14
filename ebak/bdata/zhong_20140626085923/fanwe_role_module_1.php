<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_module`;");
E_C("CREATE TABLE `fanwe_role_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_module` values('5','Role','权限组别','1','0');");
E_D("replace into `fanwe_role_module` values('6','Admin','管理员','1','0');");
E_D("replace into `fanwe_role_module` values('12','Conf','系统配置','1','0');");
E_D("replace into `fanwe_role_module` values('13','Database','数据库','1','0');");
E_D("replace into `fanwe_role_module` values('15','Log','系统日志','1','0');");
E_D("replace into `fanwe_role_module` values('19','File','文件管理','1','0');");
E_D("replace into `fanwe_role_module` values('58','Index','首页','1','0');");
E_D("replace into `fanwe_role_module` values('36','Nav','导航菜单','1','0');");
E_D("replace into `fanwe_role_module` values('47','MailServer','邮件服务器','1','0');");
E_D("replace into `fanwe_role_module` values('48','Sms','短信接口','1','0');");
E_D("replace into `fanwe_role_module` values('53','Adv','广告模块','1','0');");
E_D("replace into `fanwe_role_module` values('56','DealMsgList','业务群发队列','1','0');");
E_D("replace into `fanwe_role_module` values('92','Cache','缓存处理','1','0');");
E_D("replace into `fanwe_role_module` values('113','User','会员管理','1','0');");
E_D("replace into `fanwe_role_module` values('114','MsgTemplate','消息模板管理','1','0');");
E_D("replace into `fanwe_role_module` values('115','Integrate','会员整合','1','0');");
E_D("replace into `fanwe_role_module` values('116','ApiLogin','同步登录','1','0');");
E_D("replace into `fanwe_role_module` values('117','DealCate','项目分类','1','0');");
E_D("replace into `fanwe_role_module` values('118','Deal','项目管理','1','0');");
E_D("replace into `fanwe_role_module` values('119','Payment','支付接口','1','0');");
E_D("replace into `fanwe_role_module` values('120','IndexImage','轮播广告图','1','0');");
E_D("replace into `fanwe_role_module` values('121','Help','站点帮助','1','0');");
E_D("replace into `fanwe_role_module` values('122','Faq','常见问题','1','0');");
E_D("replace into `fanwe_role_module` values('123','DealOrder','项目支持','1','0');");
E_D("replace into `fanwe_role_module` values('124','DealComment','项目点评','1','0');");
E_D("replace into `fanwe_role_module` values('125','PaymentNotice','付款记录','1','0');");
E_D("replace into `fanwe_role_module` values('126','UserRefund','用户提现','1','0');");

require("../../inc/footer.php");
?>