<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_msg_template`;");
E_C("CREATE TABLE `fanwe_msg_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_msg_template` values('1','TPL_MAIL_USER_PASSWORD','{\$user.user_name}你好，请点击以下链接修改您的密码\r\n</p>\r\n<a href=''{\$user.password_url}''>{\$user.password_url}</a>','1','1');");

require("../../inc/footer.php");
?>