/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : forum

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-05-20 11:29:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_claim`
-- ----------------------------
DROP TABLE IF EXISTS `t_claim`;
CREATE TABLE `t_claim` (
  `claim_id` int(11) NOT NULL AUTO_INCREMENT,
  `claim_detail` text,
  `user_id` int(11) DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(255) DEFAULT NULL,
  `claim_title` text,
  PRIMARY KEY (`claim_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_claim_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_claim
-- ----------------------------
INSERT INTO `t_claim` VALUES ('3', '失物招领', '1', '2017-05-20 10:48:07', 'img/1.jpg', 'ds ');

-- ----------------------------
-- Table structure for `t_goods`
-- ----------------------------
DROP TABLE IF EXISTS `t_goods`;
CREATE TABLE `t_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) DEFAULT NULL,
  `goods_detail` text,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `img_src` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT '0',
  PRIMARY KEY (`goods_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_goods_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_goods
-- ----------------------------
INSERT INTO `t_goods` VALUES ('1', '防晒霜', '99新的一个防晒霜', '1', 'img/1.jpg', '80', '0');
INSERT INTO `t_goods` VALUES ('2', '面膜', '全新面膜', '1', 'img/1.jpg', '50', '0');
INSERT INTO `t_goods` VALUES ('3', '123', '123', '1', 'img/20170520033344_14276.jpg', '123', '0');

-- ----------------------------
-- Table structure for `t_love`
-- ----------------------------
DROP TABLE IF EXISTS `t_love`;
CREATE TABLE `t_love` (
  `love_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`love_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_love_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_love
-- ----------------------------
INSERT INTO `t_love` VALUES ('1', '喜欢你', '2017-05-19 23:19:36', '1');
INSERT INTO `t_love` VALUES ('2', '表白', '2017-05-19 23:19:52', '1');
INSERT INTO `t_love` VALUES ('3', '是事实', '2017-05-19 23:56:08', '1');
INSERT INTO `t_love` VALUES ('4', null, '2017-05-20 03:52:53', '1');
INSERT INTO `t_love` VALUES ('5', 'xih', '2017-05-20 03:53:21', '1');

-- ----------------------------
-- Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`),
  CONSTRAINT `t_order_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `t_goods` (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('2', '1', '1');

-- ----------------------------
-- Table structure for `t_tree`
-- ----------------------------
DROP TABLE IF EXISTS `t_tree`;
CREATE TABLE `t_tree` (
  `tree_id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_detail` text,
  `tree_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tree_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_tree_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_tree
-- ----------------------------
INSERT INTO `t_tree` VALUES ('1', '明天考试', '2017-05-19 23:20:13', '1', 'img/1.jpg');
INSERT INTO `t_tree` VALUES ('2', '123', '2017-05-20 03:48:51', '1', 'img/20170520034851_48746.jpg');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', '20135878', '12345678', '1884848888', '0');
INSERT INTO `t_user` VALUES ('2', '123', '123', '12345678977', '0');
INSERT INTO `t_user` VALUES ('3', '1231456', '111', '12345678977', '0');
INSERT INTO `t_user` VALUES ('4', '123', '123', '12345678977', '0');
