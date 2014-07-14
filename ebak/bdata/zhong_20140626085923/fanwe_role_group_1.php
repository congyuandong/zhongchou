<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_group`;");
E_C("CREATE TABLE `fanwe_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nav_id` int(11) NOT NULL COMMENT '???????????ID',
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_group` values('1','首页','1','0','1','1');");
E_D("replace into `fanwe_role_group` values('5','系统设置','3','0','1','1');");
E_D("replace into `fanwe_role_group` values('7','管理员','3','0','1','2');");
E_D("replace into `fanwe_role_group` values('8','数据库操作','3','0','1','6');");
E_D("replace into `fanwe_role_group` values('9','系统日志','3','0','1','7');");
E_D("replace into `fanwe_role_group` values('19','菜单设置','3','0','1','17');");
E_D("replace into `fanwe_role_group` values('28','邮件管理','10','0','1','26');");
E_D("replace into `fanwe_role_group` values('29','短信管理','10','0','1','27');");
E_D("replace into `fanwe_role_group` values('31','广告设置','3','0','1','29');");
E_D("replace into `fanwe_role_group` values('33','队列管理','10','0','1','31');");
E_D("replace into `fanwe_role_group` values('69','会员管理','5','0','1','31');");
E_D("replace into `fanwe_role_group` values('70','会员整合','5','0','1','32');");
E_D("replace into `fanwe_role_group` values('71','同步登录','5','0','1','33');");
E_D("replace into `fanwe_role_group` values('72','项目管理','13','0','1','33');");
E_D("replace into `fanwe_role_group` values('73','项目支持','13','0','1','34');");
E_D("replace into `fanwe_role_group` values('74','项目点评','13','0','1','35');");
E_D("replace into `fanwe_role_group` values('75','支付接口','14','0','1','1');");
E_D("replace into `fanwe_role_group` values('76','付款记录','14','0','1','2');");
E_D("replace into `fanwe_role_group` values('77','消息模板','10','0','1','1');");
E_D("replace into `fanwe_role_group` values('78','提现记录','14','0','1','3');");

require("../../inc/footer.php");
?>