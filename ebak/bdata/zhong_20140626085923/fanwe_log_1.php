<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_log`;");
E_C("CREATE TABLE `fanwe_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin` int(11) NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  `log_status` tinyint(1) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2436 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_log` values('2359','方维众筹添加成功','1352227067','1','127.0.0.1','1','IndexImage','insert');");
E_D("replace into `fanwe_log` values('2360','方维众筹添加成功','1352227077','1','127.0.0.1','1','IndexImage','insert');");
E_D("replace into `fanwe_log` values('2361','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持更新成功','1352229024','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('2362','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持更新成功','1352229031','1','127.0.0.1','1','Deal','update');");
E_D("replace into `fanwe_log` values('2363','55_is_recommend启用成功','1352229046','1','127.0.0.1','1','Deal','toogle_status');");
E_D("replace into `fanwe_log` values('2394','admin登录成功','1364014964','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2395','admin管理员密码错误','1380612230','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2396','admin管理员密码错误','1380612242','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2397','admin管理员密码错误','1380612266','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2398','admin管理员密码错误','1380612295','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2399','admin管理员密码错误','1380612429','0','127.0.0.1','0','Public','do_login');");
E_D("replace into `fanwe_log` values('2400','admin登录成功','1380612437','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2401','搜虎精品社区彻底删除成功','1380612460','1','127.0.0.1','1','Nav','foreverdelete');");
E_D("replace into `fanwe_log` values('2402','admin更新成功','1380612524','1','127.0.0.1','1','Admin','update');");
E_D("replace into `fanwe_log` values('2403','admin密码修改成功','1380612579','1','127.0.0.1','1','Index','do_change_password');");
E_D("replace into `fanwe_log` values('2404','admin登录成功','1380612594','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2405','极品商业源码彻底删除成功','1380617731','1','127.0.0.1','1','Help','foreverdelete');");
E_D("replace into `fanwe_log` values('2406','官方交流论坛彻底删除成功','1380617733','1','127.0.0.1','1','Help','foreverdelete');");
E_D("replace into `fanwe_log` values('2407','关于我们更新成功','1380617750','1','127.0.0.1','1','Help','update');");
E_D("replace into `fanwe_log` values('2408','更新系统配置','1380617821','1','127.0.0.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('2409','admin登录成功','1400706021','1','115.207.7.32','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2410','搜虎精品社区www.souho.net|www.souho.cc提供本程序更新成功','1400706068','1','115.207.7.32','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2411','更多极品商业源码,就在搜虎精品社区VIP服务：vip.souho.cc更新成功','1400706087','1','115.207.7.32','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2412','admin登录成功','1402206677','1','127.0.0.1','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2413','商业源码网测试www.zzcodes.net更新成功','1402208542','1','127.0.0.1','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2414','更多极品商业源码,就在www.zzcodes.net更新成功','1402208568','1','127.0.0.1','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2415','更新系统配置','1402216524','1','127.0.0.1','1','Conf','update');");
E_D("replace into `fanwe_log` values('2416','admin登录成功','1403634488','1','112.90.37.54','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2417','更新系统配置','1403634566','1','112.90.37.54','1','Conf','update');");
E_D("replace into `fanwe_log` values('2418','锦尚中国更新成功','1403634590','1','112.90.37.54','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2419','站长数据更新成功','1403634600','1','112.90.37.54','1','IndexImage','update');");
E_D("replace into `fanwe_log` values('2420','拍微电影《转角 爱》添加失败','1403635029','1','112.90.37.54','0','Deal','insert');");
E_D("replace into `fanwe_log` values('2421','短片电影《Blind Love》更新成功','1403635074','1','112.90.37.54','1','Deal','update');");
E_D("replace into `fanwe_log` values('2422','52jscn彻底删除成功','1403635123','1','112.90.37.54','1','User','delete');");
E_D("replace into `fanwe_log` values('2423','蜡笔源码添加成功','1403635149','1','112.90.37.54','1','User','insert');");
E_D("replace into `fanwe_log` values('2424','管理员操作','1403635158','1','112.90.37.54','1','User','modify_account');");
E_D("replace into `fanwe_log` values('2425','拍微电影《转角 爱》更新成功','1403635198','1','112.90.37.54','1','Deal','update');");
E_D("replace into `fanwe_log` values('2426','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！更新成功','1403635278','1','112.90.37.54','1','Deal','update');");
E_D("replace into `fanwe_log` values('2427','拥有自己的咖啡馆更新成功','1403635294','1','112.90.37.54','1','Deal','update');");
E_D("replace into `fanwe_log` values('2428','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持更新成功','1403635328','1','112.90.37.54','1','Deal','update');");
E_D("replace into `fanwe_log` values('2429','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！更新成功','1403635338','1','112.90.37.54','1','Deal','update');");
E_D("replace into `fanwe_log` values('2430','蜡笔源码彻底删除成功','1403635512','1','112.90.37.54','1','IndexImage','foreverdelete');");
E_D("replace into `fanwe_log` values('2431','蜡笔源码添加成功','1403635540','1','112.90.37.54','1','IndexImage','insert');");
E_D("replace into `fanwe_log` values('2432','更新系统配置','1403635806','1','112.90.37.54','1','Conf','update');");
E_D("replace into `fanwe_log` values('2433','预热添加成功','1403635962','1','112.90.37.54','1','DealCate','insert');");
E_D("replace into `fanwe_log` values('2434','admin登录成功','1403655334','1','111.161.79.30','1','Public','do_login');");
E_D("replace into `fanwe_log` values('2435','admin登录成功','1403744203','1','58.251.146.202','1','Public','do_login');");

require("../../inc/footer.php");
?>