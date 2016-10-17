/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : laymaneasylife

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-16 00:19:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for formfields
-- ----------------------------
DROP TABLE IF EXISTS `formfields`;
CREATE TABLE `formfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fieldtype` varchar(255) DEFAULT NULL,
  `expression` varchar(255) DEFAULT NULL,
  `field_size` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `field_size_min` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `required` int(1) DEFAULT NULL,
  `error_message` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `position` int(2) DEFAULT NULL,
  `visible` int(1) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of formfields
-- ----------------------------

-- ----------------------------
-- Table structure for models
-- ----------------------------
DROP TABLE IF EXISTS `models`;
CREATE TABLE `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) DEFAULT NULL,
  `activestatus` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



-- ----------------------------
-- Table structure for validators
-- ----------------------------
DROP TABLE IF EXISTS `validators`;
CREATE TABLE `validators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of validators
-- ----------------------------
INSERT INTO `validators` VALUES ('1', 'boolean', 'yii\\validators\\BooleanValidator', '1476528295', '1476528295', null, null, '1');
INSERT INTO `validators` VALUES ('2', 'captcha', 'yii\\captcha\\CaptchaValidator', '1476528310', '1476528310', null, null, '0');
INSERT INTO `validators` VALUES ('3', 'compare', 'yii\\validators\\CompareValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('4', 'boolean', 'yii\\validators\\BooleanValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('5', 'captcha', 'yii\\captcha\\CaptchaValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('6', 'compare', 'yii\\validators\\CompareValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('7', 'date', 'yii\\validators\\DateValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('8', 'default', 'yii\\validators\\DefaultValueValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('9', 'double', 'yii\\validators\\NumberValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('10', 'each', 'yii\\validators\\EachValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('11', 'email', 'yii\\validators\\EmailValidator', '1476528336', '1476528336', null, null, '1');
INSERT INTO `validators` VALUES ('12', 'exist', 'yii\\validators\\ExistValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('13', 'file', 'yii\\validators\\FileValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('14', 'filter', 'yii\\validators\\FilterValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('15', 'image', 'yii\\validators\\ImageValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('16', 'in', 'yii\\validators\\RangeValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('17', 'trim', 'yii\\validators\\FilterValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('18', 'match', 'yii\\validators\\RegularExpressionValidator', '1476528336', '1476528336', null, null, '1');
INSERT INTO `validators` VALUES ('19', 'number', 'yii\\validators\\NumberValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('20', 'required', 'yii\\validators\\RequiredValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('21', 'safe', 'yii\\validators\\SafeValidator', '1476528336', '1476528336', null, null, '1');
INSERT INTO `validators` VALUES ('22', 'string', 'yii\\validators\\StringValidator', '1476528336', '1476528336', null, null, '1');
INSERT INTO `validators` VALUES ('23', 'unique', 'yii\\validators\\UniqueValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('24', 'url', 'yii\\validators\\UrlValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('25', 'ip', 'yii\\validators\\IpValidator', '1476528336', '1476528336', null, null, '0');
INSERT INTO `validators` VALUES ('26', 'integer', 'yii\\validators\\NumberValidator', '1476528336', '1476528336', null, null, '1');
