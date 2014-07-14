<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_filter`;");
E_C("CREATE TABLE `fanwe_deal_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter` text NOT NULL,
  `deal_id` int(11) NOT NULL,
  `filter_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_filter` values('119','红色','40','9');");
E_D("replace into `fanwe_deal_filter` values('118','大码,中码,均码','40','8');");
E_D("replace into `fanwe_deal_filter` values('117','纯绵','40','7');");
E_D("replace into `fanwe_deal_filter` values('116','红色,黑色','41','9');");
E_D("replace into `fanwe_deal_filter` values('115','小码,中码,大码,均码','41','8');");
E_D("replace into `fanwe_deal_filter` values('114','常规毛线','41','7');");
E_D("replace into `fanwe_deal_filter` values('113','洋紫,玫红,北极蓝','42','9');");
E_D("replace into `fanwe_deal_filter` values('112','小码,中码,大码,均码','42','8');");
E_D("replace into `fanwe_deal_filter` values('111','羽绒','42','7');");
E_D("replace into `fanwe_deal_filter` values('110','黑色,驼色,红色','43','9');");
E_D("replace into `fanwe_deal_filter` values('109','均码,中码','43','8');");
E_D("replace into `fanwe_deal_filter` values('108','尼绒','43','7');");
E_D("replace into `fanwe_deal_filter` values('107','翡翠绿','44','9');");
E_D("replace into `fanwe_deal_filter` values('106','中码,均码','44','8');");
E_D("replace into `fanwe_deal_filter` values('105','','44','7');");
E_D("replace into `fanwe_deal_filter` values('104','黑白格,红黑格','45','9');");
E_D("replace into `fanwe_deal_filter` values('103','均码,中码','45','8');");
E_D("replace into `fanwe_deal_filter` values('102','','45','7');");
E_D("replace into `fanwe_deal_filter` values('101','黑色,紫色','46','9');");
E_D("replace into `fanwe_deal_filter` values('100','均码','46','8');");
E_D("replace into `fanwe_deal_filter` values('99','纯绵','46','7');");
E_D("replace into `fanwe_deal_filter` values('98','黑色','47','9');");
E_D("replace into `fanwe_deal_filter` values('97','超大码,大码,中码','47','8');");
E_D("replace into `fanwe_deal_filter` values('96','','47','7');");
E_D("replace into `fanwe_deal_filter` values('95','','48','9');");
E_D("replace into `fanwe_deal_filter` values('94','','48','8');");
E_D("replace into `fanwe_deal_filter` values('93','','48','7');");

require("../../inc/footer.php");
?>