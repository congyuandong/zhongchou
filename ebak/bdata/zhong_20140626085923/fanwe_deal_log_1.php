<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal_log`;");
E_C("CREATE TABLE `fanwe_deal_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal_log` values('26','功夫图文说明书1','1352229555','17','fanwe','55','./public/attachment/201211/07/11/5d2a94ce2a3db73277fb04be463365a255.jpg','','');");
E_D("replace into `fanwe_deal_log` values('27','每当我们踏上新的旅程，总是带着期待和兴奋\r\n\r\n而每次踏上归程，多多少少都会怀有一丝的失落\r\n\r\n在路上，我们拥有一拍即合、相谈甚欢的朋友\r\n\r\n在路上，我们总能遇到有趣的人，听到有意思的故事\r\n\r\n在路上，我们可以遗忘时间，丢开工作，在任何一方天地里享用美食和咖啡\r\n\r\n但是归来后，工作和生活又将我们丢回压力和快节奏之下\r\n\r\n我们想要一个在城市中，也能随时抽离的天地\r\n\r\n找朋友，找梦想，找快乐\r\n\r\n \r\n\r\n我们的小窝不会很大，但足以容纳所有的做梦者\r\n\r\n这里有齐全的旅行攻略书籍、各种旅行散文、绘本、游记……\r\n\r\n这里有香浓的咖啡和好吃的甜点\r\n\r\n这里有同样喜爱旅行，爱结交朋友的年轻人\r\n\r\n每一个将这里当做家的人，你们是我们的客人，更是这里的主人','1352230347','18','fzmatthew','56','./public/attachment/201211/07/11/714396a1e4416b0f7510d97e6966190459.jpg','','');");
E_D("replace into `fanwe_deal_log` values('28','在电影里看到的最自然的场景在拍摄的时候都是要用灯光特别加工出来的，因为摄影机和人对光的感受能力不一样。人的眼睛可以说是世界上最好的摄影机。这一幕女主角站在窗边充满惆怅的向男主角的方向望过去，明显的受到了日本导演岩井俊二的影响。','1352230864','17','fanwe','57','./public/attachment/201211/07/11/eab603d5c65ec25f88a7fdd8ec9a5c1095.jpg','','');");
E_D("replace into `fanwe_deal_log` values('29','谢谢这几天来帮忙的朋友们，昨天一群的同学们让窗户变得明亮，虽然还是挺乱但却充满了快乐与欢。。爱天使每天都要这样充满爱与快乐。。谢谢有你们！因为东西太多可能还要打理两天才能开业，希望最近有空的朋友还能过来帮忙。下午两点过来便可13400642022。地址文化艺术中心大润发楼上正中间店。谢谢！','1352231575','17','fanwe','58','./public/attachment/201211/07/11/85a7d1e781bfb8812271b6f6f1bee91d25.jpg','','');");

require("../../inc/footer.php");
?>