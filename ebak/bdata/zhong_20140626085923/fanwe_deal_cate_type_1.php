<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_cate_type`;");
E_C("CREATE TABLE `fanwe_deal_cate_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_cate_type` values('1','咖啡','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('2','闽菜','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('3','东北菜','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('4','川菜','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('5','KTV','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('6','自助游','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('7','周边游','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('8','国内游','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('9','海外游','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('10','洗车','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('11','汽车保养','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('12','驾校','0','0');");
E_D("replace into `fanwe_deal_cate_type` values('13','4S店','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('14','音响','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('15','车载导航','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('16','真皮座椅','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('17','打蜡','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('18','男科','0','0');");
E_D("replace into `fanwe_deal_cate_type` values('19','妇科','0','0');");
E_D("replace into `fanwe_deal_cate_type` values('20','儿科','0','0');");
E_D("replace into `fanwe_deal_cate_type` values('21','口腔科','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('22','眼科','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('23','体检中心','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('24','心理诊所','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('25','疗养院','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('26','日本料理','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('27','本帮菜','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('28','甜点','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('29','面包','1','0');");
E_D("replace into `fanwe_deal_cate_type` values('30','烧烤','1','0');");

require("../../inc/footer.php");
?>