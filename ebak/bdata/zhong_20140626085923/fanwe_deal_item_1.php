<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_item`;");
E_C("CREATE TABLE `fanwe_deal_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `price` double(20,4) NOT NULL,
  `support_count` int(11) NOT NULL,
  `support_amount` double(20,4) NOT NULL,
  `description` text NOT NULL,
  `is_delivery` tinyint(1) NOT NULL,
  `delivery_fee` double(20,4) NOT NULL,
  `is_limit_user` tinyint(1) NOT NULL COMMENT '?????',
  `limit_user` int(11) NOT NULL COMMENT '???????',
  `repaid_day` int(11) NOT NULL COMMENT '???????????????',
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_item` values('17','55','10.0000','0','0.0000','我们将以平信的方式寄出2款桌游的首发纪念牌，随机赠送部分游戏牌（至少5张）并在游戏说明书中致谢','1','0.0000','0','0','60');");
E_D("replace into `fanwe_deal_item` values('18','55','15.0000','1','15.0000','我们将回报《黄金密码》1套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）','1','5.0000','0','0','60');");
E_D("replace into `fanwe_deal_item` values('19','55','30.0000','0','0.0000','我们将回报《黄金密码》、《功夫》各1套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）','1','5.0000','0','0','60');");
E_D("replace into `fanwe_deal_item` values('20','55','50.0000','0','0.0000','我们将回报《黄金密码》、《功夫》各2套，赠送首发纪念牌并在游戏说明书中致谢。（邮费另计）','1','5.0000','0','0','60');");
E_D("replace into `fanwe_deal_item` values('21','55','500.0000','0','0.0000','我们将回报《黄金密码》40套，赠送首发纪念牌并在游戏说明书中致谢，同时还将在首发纪念牌上印上您的姓名或公司名称致谢！（限额2名）。（国内包邮）','1','0.0000','0','0','60');");
E_D("replace into `fanwe_deal_item` values('22','56','50.0000','0','0.0000','你将收到小组成员，在旅行中为你寄出的一张祝福明信片\r\n你将成为我们开业PARTY的座上嘉宾\r\n所以，请留下你的联系方式（电话，地址及邮编）','1','0.0000','0','0','50');");
E_D("replace into `fanwe_deal_item` values('23','56','200.0000','0','0.0000','你将获得咖啡馆开业后永久9折会员卡一张（会员卡可用于借阅书籍，并在生日当天获得免费饮料一杯）\r\n店内旅行纪念手信一份（价值在50元以内）\r\n成为开业PARTY的邀请来宾','1','0.0000','0','0','60');");
E_D("replace into `fanwe_deal_item` values('24','56','500.0000','11','5500.0000','你将获得咖啡馆开业后永久9折会员卡一张（会员卡可用于借阅书籍，并在生日当天获得免费饮料一杯）\r\n一份店内招牌下午茶套餐的招待券\r\n免费参加店内组织的活动（各类分享会、试吃体验等等）\r\n成为开业PARTY的邀请来宾','1','0.0000','0','0','50');");
E_D("replace into `fanwe_deal_item` values('25','57','60.0000','0','0.0000','电影签名海报和明信片。全国包邮。','1','0.0000','0','0','50');");
E_D("replace into `fanwe_deal_item` values('26','57','150.0000','0','0.0000','电影DVD的拷贝一张，以及片尾特别感谢。全国包邮。','1','0.0000','0','0','55');");
E_D("replace into `fanwe_deal_item` values('27','57','600.0000','0','0.0000','一个崭新的印有影片标志的8GB快闪储存器（flash drive), 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）, 以及片尾特别感谢。（所有DVD均有中文字幕），全国包邮。','1','0.0000','1','20','50');");
E_D("replace into `fanwe_deal_item` values('28','57','1200.0000','0','0.0000','电影签名海报和明信片， 一个崭新的印有影片标志的8GB快闪储存器（flash drive), 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）, 以及片尾特别感谢。（所有DVD均有中文字幕）全国包邮。','1','0.0000','1','5','10');");
E_D("replace into `fanwe_deal_item` values('29','57','3000.0000','1','3000.0000','成为影片的联合制片人（associate producer), 8GB的快闪储存器（flash drive)， 电影DVD 拷贝，剧照，和特别回报（包括预告片DVD，拍摄花絮DVD）。（所有DVD均有中文字幕） 全国包邮。','1','0.0000','0','0','10');");
E_D("replace into `fanwe_deal_item` values('30','58','1000.0000','0','0.0000','爱的礼物：精美工艺品及红酒。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及价值399元的澳洲红宝龙红酒一瓶！你将成为爱天使的终生会员。。。','1','0.0000','0','0','50');");
E_D("replace into `fanwe_deal_item` values('31','58','2000.0000','1','2000.0000','爱的礼物：精美工艺品红酒及晚餐。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及澳洲红宝龙红酒一瓶及邀请你到爱天使享受晚餐！你将成为爱天使的终生会员。。。','1','0.0000','0','0','50');");
E_D("replace into `fanwe_deal_item` values('32','58','3000.0000','1','3000.0000','爱的礼物：精美工艺品及红酒及晚餐。如果你希望得到一份爱的礼物与记念，请留言你的详细地址姓名电话，我将会于爱天使重建之后的三个月内为你寄一件精美的工艺品及价值688元的澳洲康纳瓦拉红酒一瓶及邀请你到爱天使享受晚餐！你将成为爱天使的终生会员。。。','1','0.0000','0','0','50');");

require("../../inc/footer.php");
?>