<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_area`;");
E_C("CREATE TABLE `fanwe_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_area` values('8','鼓楼区','15','1','0');");
E_D("replace into `fanwe_area` values('9','晋安区','15','2','0');");
E_D("replace into `fanwe_area` values('10','台江区','15','3','0');");
E_D("replace into `fanwe_area` values('11','仓山区','15','4','0');");
E_D("replace into `fanwe_area` values('12','马尾区','15','5','0');");
E_D("replace into `fanwe_area` values('13','五一广场','15','6','8');");
E_D("replace into `fanwe_area` values('14','东街口','15','7','8');");
E_D("replace into `fanwe_area` values('15','福州广场','15','8','8');");
E_D("replace into `fanwe_area` values('16','省体育中心','15','9','8');");
E_D("replace into `fanwe_area` values('17','西禅寺','15','10','8');");
E_D("replace into `fanwe_area` values('18','社会主义学院','15','11','8');");
E_D("replace into `fanwe_area` values('19','西洪路','15','12','8');");
E_D("replace into `fanwe_area` values('20','屏山','15','13','8');");
E_D("replace into `fanwe_area` values('21','中亭街','15','14','10');");
E_D("replace into `fanwe_area` values('22','六一中路','15','15','10');");
E_D("replace into `fanwe_area` values('23','龙华大厦','15','16','10');");
E_D("replace into `fanwe_area` values('24','时代名城','15','17','10');");
E_D("replace into `fanwe_area` values('25','台江路','15','18','10');");
E_D("replace into `fanwe_area` values('26','宝龙城市广场','15','19','10');");
E_D("replace into `fanwe_area` values('27','万象城','15','20','10');");
E_D("replace into `fanwe_area` values('28','桥亭','15','21','10');");
E_D("replace into `fanwe_area` values('29','小桥头','15','22','10');");
E_D("replace into `fanwe_area` values('30','交通路','15','23','10');");
E_D("replace into `fanwe_area` values('31','中亭街','15','24','10');");
E_D("replace into `fanwe_area` values('32','白马河','15','25','10');");
E_D("replace into `fanwe_area` values('33','博美诗邦','15','26','10');");
E_D("replace into `fanwe_area` values('34','观海路','15','27','11');");
E_D("replace into `fanwe_area` values('35','三叉街新村','15','28','11');");
E_D("replace into `fanwe_area` values('36','北京金山','15','29','11');");
E_D("replace into `fanwe_area` values('37','仓山镇','15','30','11');");
E_D("replace into `fanwe_area` values('38','螺洲','15','31','11');");
E_D("replace into `fanwe_area` values('39','三高路','15','32','11');");
E_D("replace into `fanwe_area` values('40','下渡','15','33','11');");
E_D("replace into `fanwe_area` values('41','工农路','15','34','11');");
E_D("replace into `fanwe_area` values('42','首山路','15','35','11');");
E_D("replace into `fanwe_area` values('43','王庄新村','15','36','9');");
E_D("replace into `fanwe_area` values('44','岳峰路','15','37','9');");
E_D("replace into `fanwe_area` values('45','融侨东区','15','38','9');");
E_D("replace into `fanwe_area` values('46','五里亭','15','39','9');");
E_D("replace into `fanwe_area` values('47','五一新村','15','40','9');");
E_D("replace into `fanwe_area` values('48','福光路','15','41','9');");
E_D("replace into `fanwe_area` values('49','五里亭','15','42','9');");

require("../../inc/footer.php");
?>