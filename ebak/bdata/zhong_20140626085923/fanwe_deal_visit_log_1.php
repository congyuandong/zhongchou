<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_visit_log`;");
E_C("CREATE TABLE `fanwe_deal_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `client_ip` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_visit_log` values('117','55','127.0.0.1','1352229137');");
E_D("replace into `fanwe_deal_visit_log` values('118','56','127.0.0.1','1352230070');");
E_D("replace into `fanwe_deal_visit_log` values('119','57','127.0.0.1','1352230830');");
E_D("replace into `fanwe_deal_visit_log` values('120','58','127.0.0.1','1352231514');");
E_D("replace into `fanwe_deal_visit_log` values('121','56','127.0.0.1','1352231651');");
E_D("replace into `fanwe_deal_visit_log` values('122','55','127.0.0.1','1352232299');");
E_D("replace into `fanwe_deal_visit_log` values('123','58','127.0.0.1','1352232420');");
E_D("replace into `fanwe_deal_visit_log` values('124','56','127.0.0.1','1352232590');");
E_D("replace into `fanwe_deal_visit_log` values('125','57','127.0.0.1','1352232717');");
E_D("replace into `fanwe_deal_visit_log` values('126','55','127.0.0.1','1352246374');");
E_D("replace into `fanwe_deal_visit_log` values('127','57','127.0.0.1','1352246699');");
E_D("replace into `fanwe_deal_visit_log` values('128','56','127.0.0.1','1352246710');");
E_D("replace into `fanwe_deal_visit_log` values('129','58','127.0.0.1','1352246719');");
E_D("replace into `fanwe_deal_visit_log` values('130','58','140.224.90.157','1353888322');");
E_D("replace into `fanwe_deal_visit_log` values('131','55','140.224.90.157','1353888330');");
E_D("replace into `fanwe_deal_visit_log` values('132','57','140.224.90.157','1353888339');");
E_D("replace into `fanwe_deal_visit_log` values('133','57','116.28.48.56','1361047640');");
E_D("replace into `fanwe_deal_visit_log` values('134','56','127.0.0.1','1364012515');");
E_D("replace into `fanwe_deal_visit_log` values('135','55','127.0.0.1','1364012843');");
E_D("replace into `fanwe_deal_visit_log` values('136','57','127.0.0.1','1364013380');");
E_D("replace into `fanwe_deal_visit_log` values('137','56','127.0.0.1','1364013647');");
E_D("replace into `fanwe_deal_visit_log` values('138','55','127.0.0.1','1364014145');");
E_D("replace into `fanwe_deal_visit_log` values('139','56','127.0.0.1','1402190320');");
E_D("replace into `fanwe_deal_visit_log` values('140','56','127.0.0.1','1402203551');");
E_D("replace into `fanwe_deal_visit_log` values('141','55','127.0.0.1','1402203992');");
E_D("replace into `fanwe_deal_visit_log` values('142','56','127.0.0.1','1402204999');");
E_D("replace into `fanwe_deal_visit_log` values('143','56','127.0.0.1','1402205900');");
E_D("replace into `fanwe_deal_visit_log` values('144','57','127.0.0.1','1402211748');");
E_D("replace into `fanwe_deal_visit_log` values('145','56','127.0.0.1','1402216616');");
E_D("replace into `fanwe_deal_visit_log` values('146','58','127.0.0.1','1402216621');");
E_D("replace into `fanwe_deal_visit_log` values('147','57','127.0.0.1','1402216624');");
E_D("replace into `fanwe_deal_visit_log` values('148','56','112.90.37.54','1403634624');");
E_D("replace into `fanwe_deal_visit_log` values('149','57','112.90.37.54','1403634724');");
E_D("replace into `fanwe_deal_visit_log` values('150','55','112.90.37.54','1403635359');");
E_D("replace into `fanwe_deal_visit_log` values('151','57','112.90.37.54','1403635383');");
E_D("replace into `fanwe_deal_visit_log` values('152','56','112.90.37.54','1403635389');");
E_D("replace into `fanwe_deal_visit_log` values('153','58','112.90.37.54','1403635401');");
E_D("replace into `fanwe_deal_visit_log` values('154','57','220.181.132.217','1403639207');");
E_D("replace into `fanwe_deal_visit_log` values('155','55','112.5.237.172','1403672142');");
E_D("replace into `fanwe_deal_visit_log` values('156','55','218.6.53.173','1403743219');");

require("../../inc/footer.php");
?>