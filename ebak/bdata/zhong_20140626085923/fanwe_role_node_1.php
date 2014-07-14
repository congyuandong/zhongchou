<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_role_node`;");
E_C("CREATE TABLE `fanwe_role_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT '??????????????ID',
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=667 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_role_node` values('334','main','首页','1','0','1','58');");
E_D("replace into `fanwe_role_node` values('11','index','管理员分组列表','1','0','7','5');");
E_D("replace into `fanwe_role_node` values('13','trash','管理员分组回收站','1','0','7','5');");
E_D("replace into `fanwe_role_node` values('14','index','管理员列表','1','0','7','6');");
E_D("replace into `fanwe_role_node` values('15','trash','管理员回收站','1','0','7','6');");
E_D("replace into `fanwe_role_node` values('16','index','系统配置','1','0','5','12');");
E_D("replace into `fanwe_role_node` values('17','index','数据库备份列表','1','0','8','13');");
E_D("replace into `fanwe_role_node` values('18','sql','SQL操作','1','0','8','13');");
E_D("replace into `fanwe_role_node` values('19','index','系统日志列表','1','0','9','15');");
E_D("replace into `fanwe_role_node` values('24','do_upload','编辑器图片上传','1','0','0','19');");
E_D("replace into `fanwe_role_node` values('43','index','导航菜单列表','1','0','19','36');");
E_D("replace into `fanwe_role_node` values('57','index','邮件服务器列表','1','0','28','47');");
E_D("replace into `fanwe_role_node` values('58','index','短信接口列表','1','0','29','48');");
E_D("replace into `fanwe_role_node` values('63','index','广告列表','1','0','31','53');");
E_D("replace into `fanwe_role_node` values('66','index','业务队列列表','1','0','33','56');");
E_D("replace into `fanwe_role_node` values('68','add','添加页面','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('69','edit','编辑页面','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('70','set_effect','设置生效','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('71','add','添加执行','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('72','update','编辑执行','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('73','delete','删除','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('74','restore','恢复','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('75','foreverdelete','永久删除','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('76','set_default','设置默认管理员','1','0','0','6');");
E_D("replace into `fanwe_role_node` values('77','add','添加页面','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('78','edit','编辑页面','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('79','update','编辑执行','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('80','foreverdelete','永久删除','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('81','set_effect','设置生效','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('99','update','更新配置','1','0','0','12');");
E_D("replace into `fanwe_role_node` values('100','dump','备份数据','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('101','delete','删除备份','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('102','restore','恢复备份','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('103','load_file','读取页面','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('104','load_adv_id','读取广告位','1','0','0','53');");
E_D("replace into `fanwe_role_node` values('105','execute','执行SQL语句','1','0','0','13');");
E_D("replace into `fanwe_role_node` values('147','show_content','显示内容','1','0','0','56');");
E_D("replace into `fanwe_role_node` values('148','send','手动发送','1','0','0','56');");
E_D("replace into `fanwe_role_node` values('149','foreverdelete','永久删除','1','0','0','56');");
E_D("replace into `fanwe_role_node` values('181','do_upload_img','图片控件上传','1','0','0','19');");
E_D("replace into `fanwe_role_node` values('182','deleteImg','删除图片','1','0','0','19');");
E_D("replace into `fanwe_role_node` values('198','foreverdelete','永久删除','1','0','0','15');");
E_D("replace into `fanwe_role_node` values('205','add','添加页面','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('206','insert','添加执行','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('207','edit','编辑页面','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('208','update','编辑执行','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('209','set_effect','设置生效','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('210','foreverdelete','永久删除','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('211','send_demo','发送测试邮件','1','0','0','47');");
E_D("replace into `fanwe_role_node` values('229','edit','编辑页面','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('230','update','编辑执行','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('231','set_effect','设置生效','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('232','set_sort','排序','1','0','0','36');");
E_D("replace into `fanwe_role_node` values('257','add','添加页面','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('258','insert','添加执行','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('259','edit','编辑页面','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('260','update','编辑执行','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('261','set_effect','设置生效','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('262','delete','删除','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('263','restore','恢复','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('264','foreverdelete','永久删除','1','0','0','5');");
E_D("replace into `fanwe_role_node` values('265','insert','安装页面','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('266','insert','安装保存','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('267','edit','编辑页面','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('268','update','编辑执行','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('269','uninstall','卸载','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('270','set_effect','设置生效','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('271','send_demo','发送测试短信','1','0','0','48');");
E_D("replace into `fanwe_role_node` values('474','index','缓存处理','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('475','clear_parse_file','清空脚本样式缓存','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('477','clear_data','清空数据缓存','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('480','syn_data','同步数据','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('481','clear_image','清空图片缓存','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('482','clear_admin','清空后台缓存','1','0','0','92');");
E_D("replace into `fanwe_role_node` values('605','index','消息模板','1','0','77','114');");
E_D("replace into `fanwe_role_node` values('606','update','更新模板','1','0','0','114');");
E_D("replace into `fanwe_role_node` values('607','index','会员列表','1','0','69','113');");
E_D("replace into `fanwe_role_node` values('608','add','添加会员','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('609','insert','添提执行','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('610','edit','编辑会员','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('611','update','编辑执行','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('612','delete','删除会员','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('613','modify_account','会员资金变更','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('614','account_detail','帐户日志','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('615','foreverdelete_account_detail','删除帐户日志','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('616','consignee','配送地址','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('617','foreverdelete_consignee','删除配送地址','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('618','weibo','微博列表','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('619','foreverdelete_weibo','删除微博','1','0','0','113');");
E_D("replace into `fanwe_role_node` values('620','index','会员整合','1','0','70','115');");
E_D("replace into `fanwe_role_node` values('621','save','执行整合','1','0','0','115');");
E_D("replace into `fanwe_role_node` values('622','uninstall','卸载整合','1','0','0','115');");
E_D("replace into `fanwe_role_node` values('623','index','同步登录接口','1','0','71','116');");
E_D("replace into `fanwe_role_node` values('624','insert','安装接口','1','0','0','116');");
E_D("replace into `fanwe_role_node` values('625','update','更新配置','1','0','0','116');");
E_D("replace into `fanwe_role_node` values('626','uninstall','卸载接口','1','0','0','116');");
E_D("replace into `fanwe_role_node` values('627','index','分类列表','1','0','72','117');");
E_D("replace into `fanwe_role_node` values('628','insert','添加分类','1','0','0','117');");
E_D("replace into `fanwe_role_node` values('629','update','更新分类','1','0','0','117');");
E_D("replace into `fanwe_role_node` values('630','foreverdelete','删除分类','1','0','0','117');");
E_D("replace into `fanwe_role_node` values('631','online_index','上线项目列表','1','0','72','118');");
E_D("replace into `fanwe_role_node` values('632','submit_index','未审核项目','1','0','72','118');");
E_D("replace into `fanwe_role_node` values('633','index','支付接口列表','1','0','75','119');");
E_D("replace into `fanwe_role_node` values('634','insert','安装支付接口','1','0','0','119');");
E_D("replace into `fanwe_role_node` values('635','update','更新支付接口','1','0','0','119');");
E_D("replace into `fanwe_role_node` values('636','uninstall','卸载接口','1','0','0','119');");
E_D("replace into `fanwe_role_node` values('637','index','轮播广告设置','1','0','5','120');");
E_D("replace into `fanwe_role_node` values('638','insert','添加广告','1','0','0','120');");
E_D("replace into `fanwe_role_node` values('639','update','修改广告','1','0','0','120');");
E_D("replace into `fanwe_role_node` values('640','foreverdelete','删除广告','1','0','0','120');");
E_D("replace into `fanwe_role_node` values('641','delete_index','回收站','1','0','72','118');");
E_D("replace into `fanwe_role_node` values('642','index','帮助列表','1','0','5','121');");
E_D("replace into `fanwe_role_node` values('643','insert','添加帮助','1','0','0','121');");
E_D("replace into `fanwe_role_node` values('644','update','修改帮助','1','0','0','121');");
E_D("replace into `fanwe_role_node` values('645','foreverdelete','删除帮助','1','0','0','121');");
E_D("replace into `fanwe_role_node` values('646','index','常见问题','1','0','5','122');");
E_D("replace into `fanwe_role_node` values('647','insert','添加问题','1','0','0','122');");
E_D("replace into `fanwe_role_node` values('648','update','更新问题','1','0','0','122');");
E_D("replace into `fanwe_role_node` values('649','foreverdelete','删除问题','1','0','0','122');");
E_D("replace into `fanwe_role_node` values('650','pay_log','筹款发放','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('651','save_pay_log','发放','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('652','del_pay_log','删除发放','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('653','deal_log','项目日志','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('654','del_deal_log','删除日志','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('655','batch_refund','批量退款','1','0','0','118');");
E_D("replace into `fanwe_role_node` values('656','index','项目支持','1','0','73','123');");
E_D("replace into `fanwe_role_node` values('657','view','查看详情','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('658','refund','项目退款','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('659','delete','删除支持','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('660','incharge','项目收款','1','0','0','123');");
E_D("replace into `fanwe_role_node` values('661','index','项目点评','1','0','74','124');");
E_D("replace into `fanwe_role_node` values('662','index','付款记录','1','0','76','125');");
E_D("replace into `fanwe_role_node` values('663','delete','删除记录','1','0','0','125');");
E_D("replace into `fanwe_role_node` values('664','index','提现记录','1','0','78','126');");
E_D("replace into `fanwe_role_node` values('665','delete','删除记录','1','0','0','126');");
E_D("replace into `fanwe_role_node` values('666','confirm','确认提现','1','0','0','126');");

require("../../inc/footer.php");
?>