/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50163
 Source Host           : localhost
 Source Database       : fangwei

 Target Server Version : 50163
 File Encoding         : utf-8

 Date: 07/15/2014 16:23:44 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fanwe_nav`
-- ----------------------------
DROP TABLE IF EXISTS `fanwe_nav`;
CREATE TABLE `fanwe_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `blank` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `u_module` varchar(255) NOT NULL,
  `u_action` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records of `fanwe_nav`
-- ----------------------------
BEGIN;
INSERT INTO `fanwe_nav` VALUES ('42', '首页', '', '0', '1', '1', 'index', '', '0', ''), ('47', '债券众筹', '', '0', '3', '1', 'bond', 'index', '0', ''), ('46', '股权众筹', '', '0', '2', '1', 'stock', 'index', '0', ''), ('48', '众筹转让', '', '0', '4', '1', 'transfer', 'index', '0', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
