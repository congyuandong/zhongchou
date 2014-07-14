<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_m_config`;");
E_C("CREATE TABLE `fanwe_m_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `val` text,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_m_config` values('1','catalog_id','生活服务默认分类id','8','0');");
E_D("replace into `fanwe_m_config` values('19','index_logo','首页logo','./public/attachment/201202/04/16/4f2ce8336d784.png','2');");
E_D("replace into `fanwe_m_config` values('3','has_ecv','有优惠券','1','0');");
E_D("replace into `fanwe_m_config` values('6','has_message','有留言框','1','0');");
E_D("replace into `fanwe_m_config` values('7','has_region','有配送地区选择项','1','0');");
E_D("replace into `fanwe_m_config` values('8','region_version','配送地区版本','1','0');");
E_D("replace into `fanwe_m_config` values('9','only_one_delivery','只有一个配送地区','1','0');");
E_D("replace into `fanwe_m_config` values('10','kf_phone','客服电话','400-000-0000','0');");
E_D("replace into `fanwe_m_config` values('11','kf_email','客服邮箱','qq@fanwe.com','0');");
E_D("replace into `fanwe_m_config` values('12','select_payment_id','默认支付方式','0','0');");
E_D("replace into `fanwe_m_config` values('15','delivery_id','默认配送方式','0','0');");
E_D("replace into `fanwe_m_config` values('16','page_size','分页大小','10','0');");
E_D("replace into `fanwe_m_config` values('17','about_info','关于我们','关于我们','1');");
E_D("replace into `fanwe_m_config` values('18','program_title','程序标题名称','方维o2o商业系统','0');");
E_D("replace into `fanwe_m_config` values('20','event_cate_id','活动默认分类id','3','0');");
E_D("replace into `fanwe_m_config` values('21','shop_cate_id','商城默认分类id','24','0');");
E_D("replace into `fanwe_m_config` values('22','sina_app_key','新浪APP_KEY','','0');");
E_D("replace into `fanwe_m_config` values('23','sina_app_secret','新浪APP_SECRET','','0');");
E_D("replace into `fanwe_m_config` values('24','sina_bind_url','新浪回调地址','','0');");
E_D("replace into `fanwe_m_config` values('25','tencent_app_key','腾讯APP_KEY','','0');");
E_D("replace into `fanwe_m_config` values('26','tencent_app_secret','腾讯APP_SECRET','','0');");
E_D("replace into `fanwe_m_config` values('27','tencent_bind_url','腾讯回调地址','','0');");

require("../../inc/footer.php");
?>