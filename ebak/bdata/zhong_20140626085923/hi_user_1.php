<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `hi_user`;");
E_C("CREATE TABLE `hi_user` (
  `u_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_tui` varchar(20) NOT NULL,
  `jf` float NOT NULL,
  `qian` float NOT NULL,
  `add_time` varchar(20) NOT NULL,
  `u_ip` varchar(20) NOT NULL,
  `u_qx` int(1) NOT NULL,
  `alipay` varchar(200) NOT NULL,
  `alipayname` varchar(200) NOT NULL,
  `shdz` varchar(200) NOT NULL,
  `user_dlj` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3158 DEFAULT CHARSET=gbk");
E_D("replace into `hi_user` values('3156','','e10adc3949ba59abbe56e057f20f883e','123456@qq.com','','0','0','1372442261','182.89.50.210','2','','','','1');");
E_D("replace into `hi_user` values('3157','','17fb17fbfae0eaa1708cc90f612ef50c','8888888@qq.com','3156','0','0','1372442468','183.60.158.213','3','','','','0');");

require("../../inc/footer.php");
?>