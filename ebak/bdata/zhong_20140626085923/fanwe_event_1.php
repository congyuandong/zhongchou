<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_event`;");
E_C("CREATE TABLE `fanwe_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `event_begin_time` int(11) NOT NULL,
  `event_end_time` int(11) NOT NULL,
  `submit_begin_time` int(11) NOT NULL,
  `submit_end_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `xpoint` varchar(255) NOT NULL,
  `ypoint` varchar(255) NOT NULL,
  `locate_match` text NOT NULL,
  `locate_match_row` text NOT NULL,
  `cate_match` text NOT NULL,
  `cate_match_row` text NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `submit_count` int(11) NOT NULL,
  `reply_count` int(11) NOT NULL,
  `brief` text NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `click_count` int(11) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `publish_wait` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name_match` (`name_match`),
  FULLTEXT KEY `locate_match` (`locate_match`),
  FULLTEXT KEY `cate_match` (`cate_match`),
  FULLTEXT KEY `all_match` (`locate_match`,`cate_match`,`name_match`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_event` values('1','免费品偿巧克力','./public/attachment/201202/16/11/4f3c7ea394a90.jpg','1328040080','1360958483','1328126485','1363377687','0','<p><strong>【特别提示】</strong></p>\r\n<p><span style=\"color:#ff0000;\"><strong>有 效 期：截止至2012年3月18日（过期无效）</strong></span></p>\r\n<p><strong>使用限制</strong>：每个ID限购10份；</p>\r\n<p><strong>营业时间</strong>：10：00—19:00；</p>\r\n<p><strong>商家地址</strong>：福州市台江区五一中路万都阿波罗10层1007（阿波罗大酒店后侧）；</p>\r\n<p><strong>预约电话</strong>：0591-28311183；（为保服务质量，请提前1天预约）</p>\r\n<p><strong>使用提示：</strong></p>\r\n<p>1.凭手机二维码至商家店内验证消费，节假日通用，一经验证，不予退款，请见谅；</p>\r\n<p align=\"left\">2.请在有效期内验证，逾期无效；</p>\r\n<p align=\"left\">3.团购不找零，不予店内其他优惠同享，商家承诺无隐性消费；</p>\r\n<p align=\"left\">4.退款说明：有效期内退款额=（团购价-每份2元二维码信息费），有效期外退款额=（团购价-每份2元二维码信息费）*95%，请在提交退款申请时自动扣除，以便我们尽快的为您办理退款。</p>\r\n<p><strong>购买流程：</strong></p>\r\n<p><span style=\"color:#ff0000;\">购买团购券&nbsp;&gt;&nbsp;提前1天致电预约，到店验证消费 &gt;&nbsp;开心享受服务</span></p>\r\n<p>客服电话：400-600-5515 </p>\r\n<p><strong>【活动详情】</strong></p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;【情人节特供】甜蜜情人节，DIY巧克力表爱意！仅39元，即享原价106元【小丫烘焙坊】DIY巧克力18粒礼盒装。爱有时候可以不用说出来，但可以写出来，要表达什么就看你的手艺咯！</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;黑白巧克力的经典融合，甜蜜爱情的美丽代表。</p>\r\n<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201202/16/12/4f3c7fd896822.jpg\" alt=\"\" border=\"0\" /><br />\r\n</p>','3','15','福州宝龙城市广场','119.298129','26.068769','ux20840ux22269,ux31119ux24030,ux23453ux40857,ux24191ux22330,ux22478ux24066,ux31119ux24030ux23453ux40857ux22478ux24066ux24191ux22330,ux40723ux27004ux21306,ux39532ux23614ux21306,ux21488ux27743ux21306,ux20845ux19968ux20013ux36335,ux19975ux35937ux22478,ux23567ux26725ux22836,ux20179ux23665ux21306,ux20179ux23665ux38215,ux34746ux27954,ux19977ux39640ux36335,ux39318ux23665ux36335,ux26187ux23433ux21306,ux29579ux24196ux26032ux26449','全国,福州,宝龙,广场,城市,福州宝龙城市广场,鼓楼区,马尾区,台江区,六一中路,万象城,小桥头,仓山区,仓山镇,螺洲,三高路,首山路,晋安区,王庄新村','ux30005ux24433','电影','ux24039ux20811ux21147,ux20813ux36153,ux20813ux36153ux21697ux20607ux24039ux20811ux21147,ux21487ux20197,ux28888ux28953,ux31036ux30418,ux25163ux33402,ux23567ux20011,ux29233ux24847,ux19981ux29992ux35828,ux20889ux20986,ux21407ux20215,ux29980ux34588ux24773ux20154ux33410ux65292ux68ux73ux89ux24039ux20811ux21147ux34920ux29233ux24847ux65281ux20165ux51ux57ux20803ux65292ux21363ux20139ux21407ux20215ux49ux48ux54ux20803ux12304ux23567ux20011ux28888ux28953ux22346ux12305ux68ux73ux89ux24039ux20811ux21147ux49ux56ux31890ux31036ux30418ux35013ux12290ux29233ux26377ux26102ux20505ux21487ux20197ux19981ux29992ux35828ux20986ux26469ux65292ux20294ux21487ux20197ux20889ux20986ux26469ux65292ux35201ux34920ux36798ux20160ux20040ux23601ux30475ux20320ux30340ux25163ux33402ux21679ux65281','巧克力,免费,免费品偿巧克力,可以,烘焙,礼盒,手艺,小丫,爱意,不用说,写出,原价,甜蜜情人节，DIY巧克力表爱意！仅39元，即享原价106元【小丫烘焙坊】DIY巧克力18粒礼盒装。爱有时候可以不用说出来，但可以写出来，要表达什么就看你的手艺咯！','1','1','甜蜜情人节，DIY巧克力表爱意！仅39元，即享原价106元【小丫烘焙坊】DIY巧克力18粒礼盒装。爱有时候可以不用说出来，但可以写出来，要表达什么就看你的手艺咯！','1','1','0','0','15','0');");

require("../../inc/footer.php");
?>