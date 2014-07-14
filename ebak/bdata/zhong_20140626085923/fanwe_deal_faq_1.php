<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_faq`;");
E_C("CREATE TABLE `fanwe_deal_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_faq` values('103','56','我们的咖啡馆在哪里？','目前暂定的店址，是在延安西路、重庆北路附近。','1');");
E_D("replace into `fanwe_deal_faq` values('104','56','我们的咖啡馆大概有多大？','目前定的店址面积约在200平米以内，有上下两层，底楼较小，二层是整个一层。','2');");
E_D("replace into `fanwe_deal_faq` values('105','56','咖啡馆筹备的进度是？','由于各种的原因，在寻找店址的过程中，先先后后放弃了很多地方，目前找的店址，在办证、面积、交通等方面都较理想。所以基本确定了地方，正在积极办理营业执照及设计各方面的工作，同时也在现有资金的基础上，募集更多的资金及支持。目前店面的装修免租期约在2个月内，所以离正式开业还需要一些时日。','3');");
E_D("replace into `fanwe_deal_faq` values('107','58','新店确定了吗？装修顺利吗？在哪里呢？','新店终于在几经各方协商后于前日确定于文化艺术中心广场正中间（五一文化广场中间文化宫左边，图书馆对面，大润发楼上正中间）的玻璃房。昨天开始了紧张的重新设计装修中。关于搬店的过程几经周折的磨难苦不堪言。因为新店面积比老店小了，而东西只能先搬过去，而里面要装修所以大柜子都没办法先放进去。里面也已堆满了东西，装修师傅找了五个都不愿意接，因为太多东西很影响装修。东西要一直搬来搬去，现在全部是灰，之后又是一大堆的卫生清洁整理工作，已有很多东西因此受到损坏了。。。新店是转过来了付了一大笔转让费未想因为要重装再装修又要投入两万多的改装费，这笔当时完全忘记预算在内了。。。 不过现在顺利的进入装修重新开业在即。谢谢大家的关注支持！我会让爱天使尽快走回正轨。','2');");
E_D("replace into `fanwe_deal_faq` values('106','58','流浪猫与爱天使咖啡是什么关系呢？','爱天使就是收养救助流浪猫的咖啡馆。因为救助需要资金与空间，这个资金的最好来源一定是要有一个有收益的项目来支撑而非单纯靠募捐方式，否则容易造成依赖与被动，当然其实也因自己个性好强。 在繁殖季爱天使最多一天能收到3-6只的流浪猫，三年间独自一人艰难维持并收养救助两百多只流浪猫，所需空间资金精力全部由我个人维持。','1');");

require("../../inc/footer.php");
?>