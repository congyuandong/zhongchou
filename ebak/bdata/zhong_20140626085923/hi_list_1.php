<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `hi_list`;");
E_C("CREATE TABLE `hi_list` (
  `xitong` varchar(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `lid` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `hi_list` values('2','203cb617360701b110dbfc9da891659cb356832a232e99bd','1');");

require("../../inc/footer.php");
?>