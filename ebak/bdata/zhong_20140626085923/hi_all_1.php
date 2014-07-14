<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `hi_all`;");
E_C("CREATE TABLE `hi_all` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(255) NOT NULL,
  `a_key` varchar(255) NOT NULL,
  `a_disc` varchar(255) NOT NULL,
  `a_bottom` varchar(255) NOT NULL,
  `a_alipay` varchar(50) NOT NULL,
  `a_paykey` varchar(50) NOT NULL,
  `a_pid` varchar(50) NOT NULL,
  `a_alipayclass` varchar(1) NOT NULL,
  `a_tel` varchar(20) CHARACTER SET greek NOT NULL,
  `a_qq` varchar(20) NOT NULL,
  `a_www` varchar(20) NOT NULL,
  `s_jf` int(10) NOT NULL,
  `mysite` varchar(200) NOT NULL,
  `yjbl` varchar(10) NOT NULL,
  `fx` varchar(1) CHARACTER SET gb2312 NOT NULL,
  `user_top` text NOT NULL,
  `p_gs` int(3) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `hi_all` values('1','破解版（自动财富机）系统!','破解版（自动财富机）系统!','破解版（自动财富机）系统!','Copyright &#169; 2012-2013 【破解版（自动财富机）系统!】平台 版权所有 <script language=\"javascript\" type=\"text/javascript\" src=\"http://js.users.51.la/15836921.js\"></script>','xxxxxxx@qq.com','dkhdihnj5kjkljn5hklnhw2kjlklklnl4','5462132323232313','2','','123456','mall','1','127.0.0.1','0.0','0','<p class=\"hip\">\r\n        	1、将您的专属推广连接，发布至QQ群、博客、论坛、社区...只要有人通过您的连接来到本站注册成功，您都将获得 <span style=\"color:#ff0000; font-size:14px\">1积份/人</span>。\r\n        </p>\r\n        <p class=\"hip\">\r\n2、您所推广的人数满10人，您将免费升级为正式推广者，开始获得成交50%收入提成！\r\n        </p>\r\n        <p class=\"hip\">\r\n3、有了积分您可以兑换本站相关精品干货资源，让您实现从月入1000至月入50000的飞跃！而且推广的会员如果在本站进行现金消费，你可以自动获得50%收入提成，随时可提现！\r\n</p>\r\n','0');");

require("../../inc/footer.php");
?>