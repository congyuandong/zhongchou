<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_conf`;");
E_C("CREATE TABLE `fanwe_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `input_type` tinyint(1) NOT NULL COMMENT '?????????????? 0:??????? 1:?????????? 2:????? 3:????',
  `value_scope` text NOT NULL COMMENT '??????',
  `is_effect` tinyint(1) NOT NULL,
  `is_conf` tinyint(1) NOT NULL COMMENT '????????? 0: ??????  1:????????',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_conf` values('1','DEFAULT_ADMIN','admin','1','0','','1','0','0');");
E_D("replace into `fanwe_conf` values('2','URL_MODEL','0','1','1','0,1','1','1','3');");
E_D("replace into `fanwe_conf` values('3','AUTH_KEY','fanwe','1','0','','1','1','4');");
E_D("replace into `fanwe_conf` values('4','TIME_ZONE','8','1','1','0,8','1','1','1');");
E_D("replace into `fanwe_conf` values('5','ADMIN_LOG','1','1','1','0,1','0','1','0');");
E_D("replace into `fanwe_conf` values('6','DB_VERSION','1.0','0','0','','1','0','0');");
E_D("replace into `fanwe_conf` values('7','DB_VOL_MAXSIZE','8000000','1','0','','1','1','11');");
E_D("replace into `fanwe_conf` values('8','WATER_MARK','','2','2','','1','1','48');");
E_D("replace into `fanwe_conf` values('10','BIG_WIDTH','500','2','0','','0','0','49');");
E_D("replace into `fanwe_conf` values('11','BIG_HEIGHT','500','2','0','','0','0','50');");
E_D("replace into `fanwe_conf` values('12','SMALL_WIDTH','200','2','0','','0','0','51');");
E_D("replace into `fanwe_conf` values('13','SMALL_HEIGHT','200','2','0','','0','0','52');");
E_D("replace into `fanwe_conf` values('14','WATER_ALPHA','75','2','0','','1','1','53');");
E_D("replace into `fanwe_conf` values('15','WATER_POSITION','5','2','1','1,2,3,4,5','1','1','54');");
E_D("replace into `fanwe_conf` values('16','MAX_IMAGE_SIZE','3000000','2','0','','1','1','55');");
E_D("replace into `fanwe_conf` values('17','ALLOW_IMAGE_EXT','jpg,gif,png','2','0','','1','1','56');");
E_D("replace into `fanwe_conf` values('18','BG_COLOR','#ffffff','2','0','','0','0','57');");
E_D("replace into `fanwe_conf` values('19','IS_WATER_MARK','1','2','1','0,1','1','1','58');");
E_D("replace into `fanwe_conf` values('20','TEMPLATE','fanwe','1','0','','1','1','17');");
E_D("replace into `fanwe_conf` values('21','SITE_LOGO','http://t1.fanwe.net:93/zc/public/attachment/201210/12/11/5077943312beb.jpg','1','2','','1','1','19');");
E_D("replace into `fanwe_conf` values('173','SEO_TITLE','蜡笔源码','1','0','','1','1','20');");
E_D("replace into `fanwe_conf` values('25','REPLY_ADDRESS','info@fanwe.com','3','0','','1','1','77');");
E_D("replace into `fanwe_conf` values('23','MAIL_ON','1','3','1','0,1','1','1','72');");
E_D("replace into `fanwe_conf` values('24','SMS_ON','0','3','1','0,1','1','1','78');");
E_D("replace into `fanwe_conf` values('26','PUBLIC_DOMAIN_ROOT','','2','0','','1','1','59');");
E_D("replace into `fanwe_conf` values('27','APP_MSG_SENDER_OPEN','0','1','1','0,1','1','1','9');");
E_D("replace into `fanwe_conf` values('28','ADMIN_MSG_SENDER_OPEN','0','1','1','0,1','1','1','10');");
E_D("replace into `fanwe_conf` values('29','GZIP_ON','0','1','1','0,1','1','1','2');");
E_D("replace into `fanwe_conf` values('42','SITE_NAME','方维众筹','1','0','','1','1','1');");
E_D("replace into `fanwe_conf` values('30','CACHE_ON','1','1','1','0,1','1','1','7');");
E_D("replace into `fanwe_conf` values('31','EXPIRED_TIME','0','1','0','','1','1','5');");
E_D("replace into `fanwe_conf` values('32','TMPL_DOMAIN_ROOT','','2','0','0','0','0','62');");
E_D("replace into `fanwe_conf` values('33','CACHE_TYPE','File','1','1','File,Xcache,Memcached','1','1','7');");
E_D("replace into `fanwe_conf` values('34','MEMCACHE_HOST','127.0.0.1:11211','1','0','','1','1','8');");
E_D("replace into `fanwe_conf` values('35','IMAGE_USERNAME','admin','2','0','','1','1','60');");
E_D("replace into `fanwe_conf` values('36','IMAGE_PASSWORD','admin','2','4','','1','1','61');");
E_D("replace into `fanwe_conf` values('37','DEAL_MSG_LOCK','0','0','0','','0','0','0');");
E_D("replace into `fanwe_conf` values('38','SEND_SPAN','2','1','0','','1','1','85');");
E_D("replace into `fanwe_conf` values('39','TMPL_CACHE_ON','1','1','1','0,1','1','1','6');");
E_D("replace into `fanwe_conf` values('40','DOMAIN_ROOT','','1','0','','1','0','10');");
E_D("replace into `fanwe_conf` values('41','COOKIE_PATH','/','1','0','','1','1','10');");
E_D("replace into `fanwe_conf` values('43','INTEGRATE_CFG','','0','0','','1','0','0');");
E_D("replace into `fanwe_conf` values('44','INTEGRATE_CODE','','0','0','','1','0','0');");
E_D("replace into `fanwe_conf` values('172','PAY_RADIO','0.1','3','0','','1','1','10');");
E_D("replace into `fanwe_conf` values('176','SITE_LICENSE','蜡笔源码','1','0','','1','1','22');");
E_D("replace into `fanwe_conf` values('174','SEO_KEYWORD','蜡笔源码','1','0','','1','1','21');");
E_D("replace into `fanwe_conf` values('175','SEO_DESCRIPTION','蜡笔源码','1','0','','1','1','22');");

require("../../inc/footer.php");
?>