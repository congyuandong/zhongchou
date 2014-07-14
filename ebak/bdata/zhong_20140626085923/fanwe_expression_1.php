<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_expression`;");
E_C("CREATE TABLE `fanwe_expression` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'tusiji',
  `emotion` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_expression` values('19','傲慢','qq','[傲慢]','aoman.gif');");
E_D("replace into `fanwe_expression` values('20','白眼','qq','[白眼]','baiyan.gif');");
E_D("replace into `fanwe_expression` values('21','鄙视','qq','[鄙视]','bishi.gif');");
E_D("replace into `fanwe_expression` values('22','闭嘴','qq','[闭嘴]','bizui.gif');");
E_D("replace into `fanwe_expression` values('23','擦汗','qq','[擦汗]','cahan.gif');");
E_D("replace into `fanwe_expression` values('24','菜刀','qq','[菜刀]','caidao.gif');");
E_D("replace into `fanwe_expression` values('25','差劲','qq','[差劲]','chajin.gif');");
E_D("replace into `fanwe_expression` values('26','欢庆','qq','[欢庆]','cheer.gif');");
E_D("replace into `fanwe_expression` values('27','虫子','qq','[虫子]','chong.gif');");
E_D("replace into `fanwe_expression` values('28','呲牙','qq','[呲牙]','ciya.gif');");
E_D("replace into `fanwe_expression` values('29','捶打','qq','[捶打]','da.gif');");
E_D("replace into `fanwe_expression` values('30','大便','qq','[大便]','dabian.gif');");
E_D("replace into `fanwe_expression` values('31','大兵','qq','[大兵]','dabing.gif');");
E_D("replace into `fanwe_expression` values('32','大叫','qq','[大叫]','dajiao.gif');");
E_D("replace into `fanwe_expression` values('33','大哭','qq','[大哭]','daku.gif');");
E_D("replace into `fanwe_expression` values('34','蛋糕','qq','[蛋糕]','dangao.gif');");
E_D("replace into `fanwe_expression` values('35','发怒','qq','[发怒]','fanu.gif');");
E_D("replace into `fanwe_expression` values('36','刀','qq','[刀]','dao.gif');");
E_D("replace into `fanwe_expression` values('37','得意','qq','[得意]','deyi.gif');");
E_D("replace into `fanwe_expression` values('38','凋谢','qq','[凋谢]','diaoxie.gif');");
E_D("replace into `fanwe_expression` values('39','饿','qq','[饿]','er.gif');");
E_D("replace into `fanwe_expression` values('40','发呆','qq','[发呆]','fadai.gif');");
E_D("replace into `fanwe_expression` values('41','发抖','qq','[发抖]','fadou.gif');");
E_D("replace into `fanwe_expression` values('42','饭','qq','[饭]','fan.gif');");
E_D("replace into `fanwe_expression` values('43','飞吻','qq','[飞吻]','feiwen.gif');");
E_D("replace into `fanwe_expression` values('44','奋斗','qq','[奋斗]','fendou.gif');");
E_D("replace into `fanwe_expression` values('45','尴尬','qq','[尴尬]','gangga.gif');");
E_D("replace into `fanwe_expression` values('46','给力','qq','[给力]','geili.gif');");
E_D("replace into `fanwe_expression` values('47','勾引','qq','[勾引]','gouyin.gif');");
E_D("replace into `fanwe_expression` values('48','鼓掌','qq','[鼓掌]','guzhang.gif');");
E_D("replace into `fanwe_expression` values('49','哈哈','qq','[哈哈]','haha.gif');");
E_D("replace into `fanwe_expression` values('50','害羞','qq','[害羞]','haixiu.gif');");
E_D("replace into `fanwe_expression` values('51','哈欠','qq','[哈欠]','haqian.gif');");
E_D("replace into `fanwe_expression` values('52','花','qq','[花]','hua.gif');");
E_D("replace into `fanwe_expression` values('53','坏笑','qq','[坏笑]','huaixiao.gif');");
E_D("replace into `fanwe_expression` values('54','挥手','qq','[挥手]','huishou.gif');");
E_D("replace into `fanwe_expression` values('55','回头','qq','[回头]','huitou.gif');");
E_D("replace into `fanwe_expression` values('56','激动','qq','[激动]','jidong.gif');");
E_D("replace into `fanwe_expression` values('57','惊恐','qq','[惊恐]','jingkong.gif');");
E_D("replace into `fanwe_expression` values('58','惊讶','qq','[惊讶]','jingya.gif');");
E_D("replace into `fanwe_expression` values('59','咖啡','qq','[咖啡]','kafei.gif');");
E_D("replace into `fanwe_expression` values('60','可爱','qq','[可爱]','keai.gif');");
E_D("replace into `fanwe_expression` values('61','可怜','qq','[可怜]','kelian.gif');");
E_D("replace into `fanwe_expression` values('62','磕头','qq','[磕头]','ketou.gif');");
E_D("replace into `fanwe_expression` values('63','示爱','qq','[示爱]','kiss.gif');");
E_D("replace into `fanwe_expression` values('64','酷','qq','[酷]','ku.gif');");
E_D("replace into `fanwe_expression` values('65','难过','qq','[难过]','kuaikule.gif');");
E_D("replace into `fanwe_expression` values('66','骷髅','qq','[骷髅]','kulou.gif');");
E_D("replace into `fanwe_expression` values('67','困','qq','[困]','kun.gif');");
E_D("replace into `fanwe_expression` values('68','篮球','qq','[篮球]','lanqiu.gif');");
E_D("replace into `fanwe_expression` values('69','冷汗','qq','[冷汗]','lenghan.gif');");
E_D("replace into `fanwe_expression` values('70','流汗','qq','[流汗]','liuhan.gif');");
E_D("replace into `fanwe_expression` values('71','流泪','qq','[流泪]','liulei.gif');");
E_D("replace into `fanwe_expression` values('72','礼物','qq','[礼物]','liwu.gif');");
E_D("replace into `fanwe_expression` values('73','爱心','qq','[爱心]','love.gif');");
E_D("replace into `fanwe_expression` values('74','骂人','qq','[骂人]','ma.gif');");
E_D("replace into `fanwe_expression` values('75','不开心','qq','[不开心]','nanguo.gif');");
E_D("replace into `fanwe_expression` values('76','不好','qq','[不好]','no.gif');");
E_D("replace into `fanwe_expression` values('77','很好','qq','[很好]','ok.gif');");
E_D("replace into `fanwe_expression` values('78','佩服','qq','[佩服]','peifu.gif');");
E_D("replace into `fanwe_expression` values('79','啤酒','qq','[啤酒]','pijiu.gif');");
E_D("replace into `fanwe_expression` values('80','乒乓','qq','[乒乓]','pingpang.gif');");
E_D("replace into `fanwe_expression` values('81','撇嘴','qq','[撇嘴]','pizui.gif');");
E_D("replace into `fanwe_expression` values('82','强','qq','[强]','qiang.gif');");
E_D("replace into `fanwe_expression` values('83','亲亲','qq','[亲亲]','qinqin.gif');");
E_D("replace into `fanwe_expression` values('84','出丑','qq','[出丑]','qioudale.gif');");
E_D("replace into `fanwe_expression` values('85','足球','qq','[足球]','qiu.gif');");
E_D("replace into `fanwe_expression` values('86','拳头','qq','[拳头]','quantou.gif');");
E_D("replace into `fanwe_expression` values('87','弱','qq','[弱]','ruo.gif');");
E_D("replace into `fanwe_expression` values('88','色','qq','[色]','se.gif');");
E_D("replace into `fanwe_expression` values('89','闪电','qq','[闪电]','shandian.gif');");
E_D("replace into `fanwe_expression` values('90','胜利','qq','[胜利]','shengli.gif');");
E_D("replace into `fanwe_expression` values('91','衰','qq','[衰]','shuai.gif');");
E_D("replace into `fanwe_expression` values('92','睡觉','qq','[睡觉]','shuijiao.gif');");
E_D("replace into `fanwe_expression` values('93','太阳','qq','[太阳]','taiyang.gif');");
E_D("replace into `fanwe_expression` values('96','啊','tusiji','[啊]','aa.gif');");
E_D("replace into `fanwe_expression` values('97','暗爽','tusiji','[暗爽]','anshuang.gif');");
E_D("replace into `fanwe_expression` values('98','byebye','tusiji','[byebye]','baibai.gif');");
E_D("replace into `fanwe_expression` values('99','不行','tusiji','[不行]','buxing.gif');");
E_D("replace into `fanwe_expression` values('100','戳眼','tusiji','[戳眼]','chuoyan.gif');");
E_D("replace into `fanwe_expression` values('101','很得意','tusiji','[很得意]','deyi.gif');");
E_D("replace into `fanwe_expression` values('102','顶','tusiji','[顶]','ding.gif');");
E_D("replace into `fanwe_expression` values('103','抖抖','tusiji','[抖抖]','douxiong.gif');");
E_D("replace into `fanwe_expression` values('104','哼','tusiji','[哼]','heng.gif');");
E_D("replace into `fanwe_expression` values('105','挥汗','tusiji','[挥汗]','huihan.gif');");
E_D("replace into `fanwe_expression` values('106','昏迷','tusiji','[昏迷]','hunmi.gif');");
E_D("replace into `fanwe_expression` values('107','互拍','tusiji','[互拍]','hupai.gif');");
E_D("replace into `fanwe_expression` values('108','瞌睡','tusiji','[瞌睡]','keshui.gif');");
E_D("replace into `fanwe_expression` values('109','笼子','tusiji','[笼子]','longzi.gif');");
E_D("replace into `fanwe_expression` values('110','听歌','tusiji','[听歌]','music.gif');");
E_D("replace into `fanwe_expression` values('111','奶瓶','tusiji','[奶瓶]','naiping.gif');");
E_D("replace into `fanwe_expression` values('112','扭背','tusiji','[扭背]','niubei.gif');");
E_D("replace into `fanwe_expression` values('113','拍砖','tusiji','[拍砖]','paizhuan.gif');");
E_D("replace into `fanwe_expression` values('114','飘过','tusiji','[飘过]','piaoguo.gif');");
E_D("replace into `fanwe_expression` values('115','揉脸','tusiji','[揉脸]','roulian.gif');");
E_D("replace into `fanwe_expression` values('116','闪闪','tusiji','[闪闪]','shanshan.gif');");
E_D("replace into `fanwe_expression` values('117','生日','tusiji','[生日]','shengri.gif');");
E_D("replace into `fanwe_expression` values('118','摊手','tusiji','[摊手]','tanshou.gif');");
E_D("replace into `fanwe_expression` values('119','躺坐','tusiji','[躺坐]','tanzuo.gif');");
E_D("replace into `fanwe_expression` values('120','歪头','tusiji','[歪头]','waitou.gif');");
E_D("replace into `fanwe_expression` values('121','我踢','tusiji','[我踢]','woti.gif');");
E_D("replace into `fanwe_expression` values('122','无聊','tusiji','[无聊]','wuliao.gif');");
E_D("replace into `fanwe_expression` values('123','醒醒','tusiji','[醒醒]','xingxing.gif');");
E_D("replace into `fanwe_expression` values('124','睡了','tusiji','[睡了]','xixishui.gif');");
E_D("replace into `fanwe_expression` values('125','旋转','tusiji','[旋转]','xuanzhuan.gif');");
E_D("replace into `fanwe_expression` values('126','摇晃','tusiji','[摇晃]','yaohuang.gif');");
E_D("replace into `fanwe_expression` values('127','耶','tusiji','[耶]','yeah.gif');");
E_D("replace into `fanwe_expression` values('128','郁闷','tusiji','[郁闷]','yumen.gif');");
E_D("replace into `fanwe_expression` values('129','晕厥','tusiji','[晕厥]','yunjue.gif');");
E_D("replace into `fanwe_expression` values('130','砸','tusiji','[砸]','za.gif');");
E_D("replace into `fanwe_expression` values('131','震荡','tusiji','[震荡]','zhendang.gif');");
E_D("replace into `fanwe_expression` values('132','撞墙','tusiji','[撞墙]','zhuangqiang.gif');");
E_D("replace into `fanwe_expression` values('133','转头','tusiji','[转头]','zhuantou.gif');");
E_D("replace into `fanwe_expression` values('134','抓墙','tusiji','[抓墙]','zhuaqiang.gif');");

require("../../inc/footer.php");
?>