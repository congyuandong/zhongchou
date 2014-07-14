<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `fanwe_deal`;");
E_C("CREATE TABLE `fanwe_deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_match` text NOT NULL,
  `name_match_row` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `source_vedio` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `deal_days` int(11) NOT NULL COMMENT '??????????????????????????',
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `limit_price` double(20,4) NOT NULL,
  `brief` text NOT NULL,
  `description` text NOT NULL,
  `comment_count` int(11) NOT NULL,
  `support_count` int(11) NOT NULL COMMENT '???????',
  `focus_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `log_count` int(11) NOT NULL,
  `support_amount` double(20,4) NOT NULL COMMENT '????????????????limit_price(???????)',
  `pay_amount` double(20,4) NOT NULL COMMENT '?????????????????????????????????????????\r\n??support_amount*???????+delivery_fee_amount',
  `delivery_fee_amount` double(20,4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `tags` text NOT NULL,
  `tags_match` text NOT NULL,
  `tags_match_row` text NOT NULL,
  `success_time` int(11) NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL COMMENT '??????',
  `is_classic` tinyint(1) NOT NULL COMMENT '???????',
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `begin_time` (`begin_time`),
  KEY `end_time` (`end_time`),
  KEY `is_effect` (`is_effect`),
  KEY `limit_price` (`limit_price`),
  KEY `comment_count` (`comment_count`),
  KEY `support_count` (`support_count`),
  KEY `focus_count` (`focus_count`),
  KEY `view_count` (`view_count`),
  KEY `log_count` (`log_count`),
  KEY `support_amount` (`support_amount`),
  KEY `create_time` (`create_time`),
  KEY `is_success` (`is_success`),
  KEY `cate_id` (`cate_id`),
  KEY `sort` (`sort`),
  KEY `is_recommend` (`is_recommend`),
  KEY `is_classic` (`is_classic`),
  KEY `is_delete` (`is_delete`),
  FULLTEXT KEY `tags_match` (`tags_match`),
  FULLTEXT KEY `name_match` (`name_match`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=gbk");
E_D("replace into `fanwe_deal` values('55','原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','ux21151ux22827,ux26700ux38754,ux26399ux24453,ux23494ux30721,ux40644ux37329,ux25903ux25345,ux21407ux21019,ux28216ux25103,ux68ux73ux89,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345,ux21407ux21019ux68ux73ux89ux26700ux38754ux28216ux25103ux12298ux21151ux22827ux12299ux12298ux40644ux37329ux23494ux30721ux12299ux26399ux24453ux24744ux30340ux25903ux25345','功夫,桌面,期待,密码,黄金,支持,原创,游戏,DIY,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持,原创DIY桌面游戏《功夫》《黄金密码》期待您的支持','./public/attachment/201211/07/10/021e2f6812298468cfab78cbd07b90ee85.jpg','','','15','1351710606','1448824200','1','3000.0000','这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，希望大家能够喜欢并支持我们！','这次给大家带来的是我们自己原创的两个桌面游戏《功夫》和《黄金密码》，由于我们并非专业的桌游制作公司，所以在游戏的美术、包装、宣传等方面都会存在一些不足。但本次带来的两个作品都是我们利用几乎所有的业余时间尽心尽力制作出来的，希望大家能够喜欢并支持我们！<p><br />\r\n</p>\r\n<h3>我想要做什么</h3>\r\n<p>&nbsp; 桌面游戏是一种健康的休闲方式，你不用整天面对电脑的辐射，同时也让你可以不再过度沉迷于虚拟的网络世界中。因为桌面游戏方式的特殊性，能使你更加注重加强与人面对面的交流，提高自己的语言和沟通能力，还可以在现实生活中用这种轻松愉快的休闲方式结交更多的朋友。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;我们就是这样一群喜爱桌游，同时喜欢设计桌游的年轻人，我们并非专业的桌游制作团队，我们只是凭着对桌游的爱好开始了对桌游设计的探索。我们希望通过努力，将桌游的快乐带给更多喜欢轻松休闲、热爱生活的朋友。但是，我们的资金及能力有限，需要得到大家的帮助与支持，才能实现这样的梦想。也希望您在支持我们的同时收获一份快乐和惊喜！</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;我们这次将原创的桌面游戏《功夫》和《黄金密码》一起放到这里，希望得到大家的支持！&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><br />\r\n<img src=\"./public/attachment/201211/07/16/da4f6f7e11b249dcf71bf5e9c6a86d8a83o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n</p>\r\n<p>游戏人数：2-4人</p>\r\n<p>适合年龄：8+</p>\r\n<p>游戏时间：10-30分钟</p>\r\n<p>游戏类型：手牌管理</p>\r\n<p>游戏背景：你在游戏中扮演一名武者，灵活运用你掌握的功夫（手牌）和装备（装备牌）对抗其他的武者并最终打败他们。</p>\r\n<p>游戏目标：扣除敌方所有人物的体力为胜。</p>\r\n游戏配件：69张动作牌（手牌）、6张道具牌、2张血量牌（需自行制作）<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/7a404c90f81ca1368ff0f5b24e26a5d781o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n</p>\r\n<p>游戏过程：游戏的每个回合分两个阶段，第一阶段为热身阶段，获得热身阶段胜利的玩家成为第二阶段（攻击阶段）的主导者，由他决定第二阶段如何进行。</p>\r\n<p>&nbsp;&nbsp;&nbsp;《功夫》用卡牌较好的模拟再现了格斗中的一些乐趣，比如热身阶段的猜招、攻击阶段一招一式的过招，同时结合手牌管理的一些特点，打出组合招式及连招，配合你获得的道具，最终战胜对手。在游戏过程中，当你取得一定的优势时，也不能掉以轻心，形式可能会因为你的任何一个破绽而发生逆转，这与格斗、搏击的情况十分相似。所以如何保持良好的心态，灵活的运用手牌才是这个游戏制胜的关键所在。（具体规则见最下方及本项目动态）</p>\r\n<p><br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p>游戏人数：3-4人</p>\r\n<p>适合年龄：8+</p>\r\n<p>游戏时间：20-40分钟</p>\r\n<p>游戏类型：逻辑推理、谜题设计</p>\r\n<p>游戏背景：二战时期，德军将一批黄金铸成金条，分别保存在3个金库里，并派重兵把守。为了得到这批黄金，美军重金收买了一个德军守卫为内奸，内奸成功获取了金库的密码破解方法，并将密码破解方法以暗号的形式告知了美军特工。但是，与此同时德军也发现了暗号，并且金库的守卫非常森严，解开金库密码的时间只有1分钟……玩家在这个游戏中分别扮演德军、德军内奸、美军特工。如何设计出德军看不懂，美军特工又能在1分钟内解出的暗号密码。就看你的表现啦！</p>\r\n<p>游戏目标：根据身份的不同，任务也不同。德军需解开密码保住金库，特工需设置密码阻止德军解密，美军需解开密码同时选择金库获得黄金。</p>\r\n<p>游戏配件：10张密码牌、12张空箱牌、24张黄金牌、沙漏1个、草稿纸和笔（自备）</p>\r\n<p>游戏过程：每人分别扮演一次特工、德军、美军，完成后计算每人所获得的黄金数量，黄金最多的玩家获胜。</p>\r\n<p><br />\r\n<br />\r\n</p>\r\n<p></p>\r\n','0','1','0','10','1','15.0000','18.5000','5.0000','1403635327','','','','','','','0','0','8','福建','福州','17','0','fanwe','1','1','0');");
E_D("replace into `fanwe_deal` values('56','拥有自己的咖啡馆','ux21654ux21857ux39302,ux25317ux26377,ux33258ux24049,ux25317ux26377ux33258ux24049ux30340ux21654ux21857ux39302','咖啡馆,拥有,自己,拥有自己的咖啡馆','./public/attachment/201211/07/11/40e44eb97b0ca5aed5148e59c2cc8dcb95.jpg','','','30','1351711495','1448825040','1','5000.0000','每个人心目中都有一个属于自己的咖啡馆,我们也是.但我们想要的咖啡馆，又不仅仅是咖啡馆','<h3>关于我</h3>\r\n<p>每个人心目中都有一个属于自己的咖啡馆<br />\r\n我们也是<br />\r\n但我们想要的咖啡馆，又不仅仅是咖啡馆<br />\r\n这里除了售卖咖啡和甜点，还有旅行的梦想<br />\r\n我们想要一个“窝”，一个无论在出发前还是归来后随时开放的地方<br />\r\n梦想着有一天<br />\r\n我们可以带着咖啡的香气出发<br />\r\n又满载着旅行的收获回到充满咖啡香气的小“窝”</p>\r\n<h3>我想要做什么</h3>\r\n<p>以图文并茂的方式简洁生动地说明你的项目，让大家一目了然，这会决定是否将你的项目描述继续看下去。建议不超过300字。<br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/0482ef5836f6745af0f59ff40d40805765o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n</p>\r\n<h3>为什么我需要你的支持</h3>\r\n<p>这是加分项。说说你的项目不同寻常的特色、资金用途、以及大家支持你的理由。这会让更多人能够支持你，不超过200个汉字。<br />\r\n<br />\r\n</p>\r\n<h3>我的承诺与回报</h3>\r\n让大家感到你对待项目的认真程度，鞭策你将项目执行最终成功。同时向大家展示一下你为支持者准备的回报，来吸引更多人支持你。<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/2ae4c7149cfd31f12d91453713322f9076o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n','0','11','1','13','1','5500.0000','4950.0000','0.0000','1403635293','','','','','','','1352230293','1','1','北京','东城区','18','0','fzmatthew','1','1','0');");
E_D("replace into `fanwe_deal` values('57','拍微电影《转角 爱》','ux30701ux29255,ux30005ux24433,ux66ux108ux105ux110ux100,ux76ux111ux118ux101,ux30701ux29255ux30005ux24433ux12298ux66ux108ux105ux110ux100ux76ux111ux118ux101ux12299,ux36716ux35282,ux25293ux24494ux30005ux24433ux12298ux36716ux35282ux29233ux12299','短片,电影,Blind,Love,短片电影《Blind Love》,转角,拍微电影《转角 爱》','./public/attachment/201211/07/11/0c067c4522bba51595c324028be7070d11.jpg','http://player.youku.com/player.php/sid/XNzIxMDI3NTQ0/v.swf','http://v.youku.com/v_show/id_XNzIxMDI3NTQ0.html','7895','1349034009','1479843600','1','50000.0000','我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。','<p>我叫武秋辰， 美国圣地亚哥大学影视专业硕士毕业。这是我在毕业后的第一部独立电影作品，讲述了一个关于盲人画家的唯美爱情故事。</p>\r\n <p>这是一个需要爱与被爱的世界，然而在我们面对这纷繁复杂多变的世界时，我们如何过滤掉那迷乱双眼的尘沙找到真爱？我们在爱中得救，在爱中迷失。我们过度相信我们用双眼所见的，却忘记听从内心最真的感受！<br />\r\n<br />\r\n</p>\r\n<p>我们一路奔跑、一路追逐，生活的洪流把我们涌向未来不确定的方向，我们有着一双能望穿苍穹的眼睛，却不断的迷失在路途中。如果有一天我们的双眼失去光明……<br />\r\n<br />\r\n</p>\r\n<p>真爱是否还遥远？<br />\r\n<br />\r\n</p>\r\n<p>导演武秋辰将用电影语言为我们讲述一位盲人画家的爱情故事，如同她所写道的：“我们视觉正常的人很容易被表象所迷惑，而我们的触觉，听觉和嗅觉却非常的精准，给我们带来更丰富的感知。”当我们不仅凭双眼去认识这个世界的时候，也许答案就在那里！<br />\r\n<br />\r\n</p>\r\n<p>为了使影片更富深入性、更具专业性，导演请来了好莱坞的职业演员，就连剧中的盲人画像也由美国著名画家OlyaLusina特为此片创作。<br />\r\n<br />\r\n</p>\r\n<p>该片不仅是一个远赴美国实现梦想的中国女孩的心血之作，同时也深刻展现了一个盲人心中的世界，从“他”的角度为因爱迷失的人们找到了一个诗意的出口。<br />\r\n<br />\r\n</p>\r\n<p>在这里，真诚地感谢您的关注！关注武秋辰和她的《BlindLove》！<br />\r\n<br />\r\n</p>\r\n<h3>自我介绍<br />\r\n</h3>\r\n<p>我是一个在美国学电影做电影的中国女孩。在美国圣地亚哥大学电影系求学的过程中，我学会了编剧，导演，拍摄和剪辑，参与了几十部电影的创作。“盲爱”是我在硕士毕业后自编自导的第一部独立电影作品。</p>\r\n<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/148cb883cbb170735c331125a96c11e162o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n</p>\r\n<p><br />\r\n</p>\r\n<p><img src=\"./public/attachment/201211/07/16/875016977d65ee2cc679ab0cfd7a7f6620o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n</p>\r\n','0','1','0','11','1','3000.0000','2700.0000','0.0000','1403635198','','','','','','','0','0','3','福建','福州','17','0','fanwe','1','1','0');");
E_D("replace into `fanwe_deal` values('58','流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','ux21654ux21857ux39302,ux37325ux24314,ux20844ux30410,ux27969ux28010,ux21147ux37327,ux38656ux35201,ux22825ux20351,ux22823ux23478,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281,ux27969ux28010ux29483ux30340ux23478ux8212ux29233ux22825ux20351ux20844ux30410ux21654ux21857ux39302ux30340ux37325ux24314ux38656ux35201ux22823ux23478ux30340ux21147ux37327ux65281','咖啡馆,重建,公益,流浪,力量,需要,天使,大家,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！,流浪猫的家—爱天使公益咖啡馆的重建需要大家的力量！','./public/attachment/201211/07/11/438813e6d75cb84c6b0df8ffbad7aa8c31.jpg','http://www.tudou.com/v/r/v.swf','http://www.tudou.com/listplay/i67lCgQt5nQ/i9toRdup3ok.html','50','1352145022','1480362600','1','3000.0000','爱天使成立的猫天使驿站三年多收养救助了两百余只的流浪猫并为它们找到了一个个温暖的家。','<p>爱天使成立的猫天使驿站三年多收养救助了两百余只的流浪猫并为它们找到了一个个温暖的家。爱天使是一种爱，更是一种生活！坚持个人信念的我一直努力活出这个世上不一般的价值人生。那就是不追求自己能拥有什么而在能为自己以外的生命带去什么。。。爱天使在今年因合同到期而到了转折点，重建是艰辛的却也坚信必将更加强大。</p>\r\n <h3>【关于我】——将救助流浪猫视为自己的事业！</h3>\r\n<p>首先做个自我介绍：</p>\r\n<p>我叫李文婷，英文名ANGELLI。</p>\r\n<p>是一名爱猫如命的“狂热分子”，</p>\r\n<p>作为流浪猫的代理麻麻已收养救助过两百余只猫咪；</p>\r\n<p>00年在大学校园宿舍开始拨号上网的网络生活，</p>\r\n<p>担任系学生会副主席及宣传部长等，</p>\r\n<p>参与系女篮队、校诗朗诵比赛、主持系选举活动，<br />\r\n</p>\r\n<p>组织带领系队作为一辩参加校辩论赛获得季军，</p>\r\n<p>毕业后于厦门海尔及三五互联等公司工作近六年。</p>\r\n<p>工作中一直表现突出主持公司千人晚会并荣获过部门最高荣誉奖。</p>\r\n<p>08年辞去部门经理一职后成为SOHO一族，</p>\r\n<p>经营LA爱天使韩国饰品成为淘宝卖家。</p>\r\n<p>于短短半年间毫无虚假的升为二钻一年后升至三钻，</p>\r\n<p>于09年6月20日在老爸大力的支持下经营爱天使咖啡馆，</p>\r\n<p>于2010年10月创办猫天使驿站正式收养救助流浪猫，</p>\r\n<p>先后接受了海峡导报厦门卫视等媒体及大学生的多次采访报道。<br />\r\n</p>\r\n<p>三年间收养救助了两百余只流浪猫并为它们找到了一个个温暖的家。</p>\r\n<p>与仔仔、全全、QQ、EE四只咪咪一起相伴爱天使救命流浪猫的生活。</p>\r\n<p>爱天使就是流浪猫们的家，是我将用余生为之奋斗的事业！</p>\r\n将“关爱弱小弱势生命，传递爱分享快乐”救助流浪猫视为毕生为之努力的事业。<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/dda29128a6310c273da111f1f30296c172o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<img src=\"./public/attachment/201211/07/16/c7650c3dd93e5585dbfad780ba3bbced31o5700.jpg\" rel=\"0\" /><br />\r\n<br />\r\n<br />\r\n','1','2','1','6','1','5000.0000','4500.0000','0.0000','1403635337','','','','','','','1352231704','1','7','福建','福州','17','0','fanwe','1','1','0');");

require("../../inc/footer.php");
?>