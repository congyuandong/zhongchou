<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `hi_tx`;");
E_C("CREATE TABLE `hi_tx` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `addtime` varchar(20) NOT NULL,
  `zt` int(1) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=gbk");
E_D("replace into `hi_tx` values('22','2823','100','1371395271','1','13713952711929');");
E_D("replace into `hi_tx` values('23','2823','1000','1371395519','1','13713955193576');");
E_D("replace into `hi_tx` values('24','2823','100','1371649122','1','13716491226522');");

require("../../inc/footer.php");
?>