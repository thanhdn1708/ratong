/*
Navicat MySQL Data Transfer

Source Server         : RATONG
Source Server Version : 50557
Source Host           : localhost:3306
Source Database       : chanacom_ratong

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2017-11-14 10:47:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `livescore`
-- ----------------------------
DROP TABLE IF EXISTS `livescore`;
CREATE TABLE `livescore` (
  `id` smallint(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` smallint(11) DEFAULT NULL,
  `orangea` varchar(11) DEFAULT NULL,
  `orangeb` varchar(11) DEFAULT NULL,
  `orangepoint` smallint(11) DEFAULT NULL,
  `greena` varchar(11) DEFAULT NULL,
  `greenb` varchar(11) DEFAULT NULL,
  `greenpoint` smallint(11) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of livescore
-- ----------------------------
INSERT INTO `livescore` VALUES ('1', '1', 'Ha', 'Linh', '0', 'Doan', 'Duy', '5', '2017-09-27 03:52:59');
INSERT INTO `livescore` VALUES ('2', '1', 'Doan', 'Duy', '2', 'Phuong', 'Tri', '5', '2017-09-27 03:52:59');
INSERT INTO `livescore` VALUES ('3', '1', 'Phuong', 'Tri', '0', 'Ha', 'Linh', '5', '2017-09-27 03:52:59');
INSERT INTO `livescore` VALUES ('4', '2', 'Tri', 'Linh', '5', 'Phuong', 'Duy', '4', '2017-09-28 03:33:50');
INSERT INTO `livescore` VALUES ('5', '2', 'Phuong', 'Duy', '5', 'Ha', 'Doan', '3', '2017-09-28 03:33:50');
INSERT INTO `livescore` VALUES ('6', '2', 'Ha', 'Doan', '5', 'Tri', 'Linh', '3', '2017-09-28 03:33:50');
INSERT INTO `livescore` VALUES ('7', '3', 'Tri', 'Doan', '3', 'Phuong', 'Ha', '5', '2017-09-28 23:52:47');
INSERT INTO `livescore` VALUES ('8', '3', 'Phuong', 'Ha', '5', 'Linh', 'Duy', '2', '2017-09-28 23:52:47');
INSERT INTO `livescore` VALUES ('9', '3', 'Linh', 'Duy', '1', 'Tri', 'Doan', '5', '2017-09-28 23:52:47');
INSERT INTO `livescore` VALUES ('10', '4', 'Linh', 'Phuong', '5', 'Duy', 'Ha', '2', '2017-09-29 03:52:47');
INSERT INTO `livescore` VALUES ('11', '4', 'Duy', 'Ha', '5', 'Tri', 'Doan', '1', '2017-09-29 03:52:47');
INSERT INTO `livescore` VALUES ('12', '4', 'Tri', 'Doan', '3', 'Linh', 'Phuong', '5', '2017-09-29 03:52:47');
INSERT INTO `livescore` VALUES ('13', '5', 'Tri', 'Phuong', '4', 'Linh', 'Ha', '5', '2017-09-29 04:06:46');
INSERT INTO `livescore` VALUES ('14', '5', 'Linh', 'Ha', '5', 'Duy', 'Doan', '2', '2017-09-29 04:06:46');
INSERT INTO `livescore` VALUES ('15', '5', 'Duy', 'Doan', '5', 'Tri', 'Phuong', '2', '2017-09-29 04:06:46');
INSERT INTO `livescore` VALUES ('16', '6', 'Tri', 'Linh', '0', 'Duy', 'Ha', '5', '2017-10-01 23:42:29');
INSERT INTO `livescore` VALUES ('17', '6', 'Duy', 'Ha', '4', 'Doan', 'Phuong', '5', '2017-10-01 23:42:29');
INSERT INTO `livescore` VALUES ('18', '6', 'Doan', 'Phuong', '5', 'Tri', 'Linh', '3', '2017-10-01 23:42:29');
INSERT INTO `livescore` VALUES ('19', '7', 'Tri', 'Ha', '4', 'Linh', 'Phuong', '5', '2017-10-02 03:59:04');
INSERT INTO `livescore` VALUES ('20', '7', 'Linh', 'Phuong', '5', 'Doan', 'Duy', '4', '2017-10-02 03:59:04');
INSERT INTO `livescore` VALUES ('21', '7', 'Doan', 'Duy', '4', 'Tri', 'Ha', '5', '2017-10-02 03:59:04');
INSERT INTO `livescore` VALUES ('22', '8', 'Tri', 'Phuong', '4', 'Duy', 'Ha', '5', '2017-10-02 23:39:53');
INSERT INTO `livescore` VALUES ('23', '8', 'Duy', 'Ha', '3', 'Linh', 'Doan', '5', '2017-10-02 23:39:53');
INSERT INTO `livescore` VALUES ('24', '8', 'Linh', 'Doan', '5', 'Tri', 'Phuong', '3', '2017-10-02 23:39:53');
INSERT INTO `livescore` VALUES ('25', '9', 'Tri', 'Linh', '2', 'Doan', 'Ha', '5', '2017-10-03 03:54:17');
INSERT INTO `livescore` VALUES ('26', '9', 'Doan', 'Ha', '5', 'Duy', 'Phuong', '3', '2017-10-03 03:54:17');
INSERT INTO `livescore` VALUES ('27', '9', 'Duy', 'Phuong', '5', 'Tri', 'Linh', '3', '2017-10-03 03:54:17');
INSERT INTO `livescore` VALUES ('28', '10', 'Tri', 'Ha', '0', 'Phuong', 'Doan', '5', '2017-10-03 04:07:16');
INSERT INTO `livescore` VALUES ('29', '10', 'Phuong', 'Doan', '3', 'Linh', 'Duy', '5', '2017-10-03 04:07:16');
INSERT INTO `livescore` VALUES ('30', '10', 'Linh', 'Duy', '3', 'Tri', 'Ha', '5', '2017-10-03 04:07:16');
INSERT INTO `livescore` VALUES ('31', '11', 'Tri', 'Phuong', '3', 'Linh', 'Ha', '5', '2017-10-03 23:37:46');
INSERT INTO `livescore` VALUES ('32', '11', 'Linh', 'Ha', '3', 'Duy', 'Doan', '5', '2017-10-03 23:37:46');
INSERT INTO `livescore` VALUES ('33', '11', 'Duy', 'Doan', '5', 'Tri', 'Phuong', '3', '2017-10-03 23:37:46');
INSERT INTO `livescore` VALUES ('34', '12', 'Tri', 'Ha', '3', 'Phuong', 'Doan', '5', '2017-10-04 03:49:11');
INSERT INTO `livescore` VALUES ('35', '12', 'Phuong', 'Doan', '0', 'Linh', 'Duy', '5', '2017-10-04 03:49:11');
INSERT INTO `livescore` VALUES ('36', '12', 'Linh', 'Duy', '5', 'Tri', 'Ha', '2', '2017-10-04 03:49:11');
INSERT INTO `livescore` VALUES ('37', '14', 'Phuong', 'Duy', '3', 'Ha', 'Doan', '5', '2017-10-04 23:50:30');
INSERT INTO `livescore` VALUES ('38', '15', 'Tri', 'Phuong', '5', 'Ha', 'Linh', '4', '2017-10-05 03:48:19');
INSERT INTO `livescore` VALUES ('39', '15', 'Ha', 'Linh', '4', 'Duy', 'Doan', '5', '2017-10-05 03:48:19');
INSERT INTO `livescore` VALUES ('40', '15', 'Duy', 'Doan', '4', 'Tri', 'Phuong', '5', '2017-10-05 03:48:19');
INSERT INTO `livescore` VALUES ('41', '16', 'Tri', 'Linh', '2', 'Ha', 'Doan', '5', '2017-10-05 23:40:28');
INSERT INTO `livescore` VALUES ('42', '16', 'Ha', 'Doan', '5', 'Phuong', 'Duy', '4', '2017-10-05 23:40:28');
INSERT INTO `livescore` VALUES ('43', '16', 'Phuong', 'Duy', '3', 'Tri', 'Linh', '5', '2017-10-05 23:40:28');
INSERT INTO `livescore` VALUES ('44', '18', 'Phuong', 'Linh', '3', 'Tri', 'Doan', '5', '2017-10-06 03:50:37');
INSERT INTO `livescore` VALUES ('45', '18', 'Tri', 'Doan', '1', 'Ha', 'Duy', '5', '2017-10-06 03:50:37');
INSERT INTO `livescore` VALUES ('46', '18', 'Ha', 'Duy', '4', 'Phuong', 'Linh', '5', '2017-10-06 03:50:37');
INSERT INTO `livescore` VALUES ('47', '19', 'Tri', 'Phuong', '5', 'Linh', 'Ha', '3', '2017-10-06 04:12:44');
INSERT INTO `livescore` VALUES ('48', '19', 'Linh', 'Ha', '5', 'Duy', 'Doan', '0', '2017-10-06 04:12:44');
INSERT INTO `livescore` VALUES ('49', '19', 'Duy', 'Doan', '5', 'Tri', 'Phuong', '4', '2017-10-06 04:12:44');
INSERT INTO `livescore` VALUES ('50', '20', 'Phuong', 'Linh', '5', 'Doan', 'Ha', '4', '2017-10-08 23:42:20');
INSERT INTO `livescore` VALUES ('51', '20', 'Doan', 'Ha', '5', 'Tri', 'Duy', '2', '2017-10-08 23:42:20');
INSERT INTO `livescore` VALUES ('52', '20', 'Tri', 'Duy', '5', 'Phuong', 'Linh', '4', '2017-10-08 23:42:20');
INSERT INTO `livescore` VALUES ('53', '21', 'Phuong', 'Tri', '2', 'Linh', 'Duy', '5', '2017-10-09 03:49:01');
INSERT INTO `livescore` VALUES ('54', '21', 'Linh', 'Duy', '2', 'Ha', 'Doan', '5', '2017-10-09 03:49:01');
INSERT INTO `livescore` VALUES ('55', '21', 'Ha', 'Doan', '1', 'Phuong', 'Tri', '5', '2017-10-09 03:49:01');
INSERT INTO `livescore` VALUES ('56', '22', 'Linh', 'Tri', '5', 'Duy', 'Ha', '4', '2017-10-09 04:05:26');
INSERT INTO `livescore` VALUES ('57', '22', 'Duy', 'Ha', '2', 'Phuong', 'Doan', '5', '2017-10-09 04:05:26');
INSERT INTO `livescore` VALUES ('58', '22', 'Phuong', 'Doan', '2', 'Linh', 'Tri', '5', '2017-10-09 04:05:26');
INSERT INTO `livescore` VALUES ('59', '23', 'Phuong', 'Ha', '5', 'Linh', 'Doan', '1', '2017-10-09 23:41:41');
INSERT INTO `livescore` VALUES ('60', '23', 'Linh', 'Doan', '2', 'Tri', 'Duy', '5', '2017-10-09 23:41:41');
INSERT INTO `livescore` VALUES ('61', '23', 'Tri', 'Duy', '5', 'Phuong', 'Ha', '1', '2017-10-09 23:41:41');
INSERT INTO `livescore` VALUES ('62', '24', 'Doan', 'Ha', '2', 'Duy', 'Phuong', '5', '2017-10-10 03:55:19');
INSERT INTO `livescore` VALUES ('63', '24', 'Duy', 'Phuong', '5', 'Linh', 'Tri', '2', '2017-10-10 03:55:19');
INSERT INTO `livescore` VALUES ('64', '24', 'Linh', 'Tri', '3', 'Doan', 'Ha', '5', '2017-10-10 03:55:19');
INSERT INTO `livescore` VALUES ('65', '25', 'Doan', 'Tri', '5', 'Duy', 'Linh', '2', '2017-10-10 04:07:21');
INSERT INTO `livescore` VALUES ('66', '25', 'Duy', 'Linh', '5', 'Ha', 'Phuong', '1', '2017-10-10 04:07:21');
INSERT INTO `livescore` VALUES ('67', '25', 'Ha', 'Phuong', '5', 'Doan', 'Tri', '2', '2017-10-10 04:07:21');
INSERT INTO `livescore` VALUES ('68', '26', 'Doan', 'Phuong', '5', 'Duy', 'Tri', '2', '2017-10-10 23:40:15');
INSERT INTO `livescore` VALUES ('69', '26', 'Duy', 'Tri', '3', 'Ha', 'Linh', '5', '2017-10-10 23:40:15');
INSERT INTO `livescore` VALUES ('70', '26', 'Ha', 'Linh', '5', 'Doan', 'Phuong', '3', '2017-10-10 23:40:15');
INSERT INTO `livescore` VALUES ('71', '27', 'Doan', 'Duy', '4', 'Linh', 'Tri', '5', '2017-10-11 03:53:10');
INSERT INTO `livescore` VALUES ('72', '27', 'Linh', 'Tri', '4', 'Ha', 'Phuong', '5', '2017-10-11 03:53:10');
INSERT INTO `livescore` VALUES ('73', '27', 'Ha', 'Phuong', '2', 'Doan', 'Duy', '5', '2017-10-11 03:53:10');
INSERT INTO `livescore` VALUES ('74', '28', 'Phuong', 'Tri', '1', 'Doan', 'Linh', '5', '2017-10-11 04:07:53');
INSERT INTO `livescore` VALUES ('75', '28', 'Doan', 'Linh', '5', 'Ha', 'Duy', '3', '2017-10-11 04:07:53');
INSERT INTO `livescore` VALUES ('76', '28', 'Ha', 'Duy', '5', 'Phuong', 'Tri', '3', '2017-10-11 04:07:53');
INSERT INTO `livescore` VALUES ('77', '29', 'Tri', 'Doan', '5', 'Phuong', 'Linh', '4', '2017-10-11 23:33:06');
INSERT INTO `livescore` VALUES ('78', '29', 'Phuong', 'Linh', '5', 'Ha', 'Duy', '0', '2017-10-11 23:33:06');
INSERT INTO `livescore` VALUES ('79', '29', 'Ha', 'Duy', '3', 'Tri', 'Doan', '5', '2017-10-11 23:33:06');
INSERT INTO `livescore` VALUES ('80', '30', 'Duy', 'Linh', '5', 'Tri', 'Phuong', '2', '2017-10-12 03:48:33');
INSERT INTO `livescore` VALUES ('81', '30', 'Tri', 'Phuong', '5', 'Ha', 'Doan', '1', '2017-10-12 03:48:33');
INSERT INTO `livescore` VALUES ('82', '30', 'Ha', 'Doan', '0', 'Duy', 'Linh', '5', '2017-10-12 03:48:33');
INSERT INTO `livescore` VALUES ('83', '31', 'Doan', 'Linh', '5', 'Duy', 'Tri', '1', '2017-10-12 23:49:36');
INSERT INTO `livescore` VALUES ('84', '31', 'Duy', 'Tri', '4', 'Ha', 'Phuong', '5', '2017-10-12 23:49:36');
INSERT INTO `livescore` VALUES ('85', '31', 'Ha', 'Phuong', '4', 'Doan', 'Linh', '5', '2017-10-12 23:49:36');
INSERT INTO `livescore` VALUES ('86', '33', 'Linh', 'Ha', '5', 'Phuong', 'Tri', '4', '2017-10-13 03:39:20');
INSERT INTO `livescore` VALUES ('87', '33', 'Phuong', 'Tri', '1', 'Doan', 'Duy', '5', '2017-10-13 03:39:20');
INSERT INTO `livescore` VALUES ('88', '33', 'Doan', 'Duy', '5', 'Linh', 'Ha', '2', '2017-10-13 03:39:20');
INSERT INTO `livescore` VALUES ('89', '35', 'Tri', 'Doan', '4', 'Phuong', 'Linh', '5', '2017-10-13 03:50:52');
INSERT INTO `livescore` VALUES ('90', '35', 'Phuong', 'Linh', '3', 'Ha', 'Duy', '5', '2017-10-13 03:50:52');
INSERT INTO `livescore` VALUES ('91', '35', 'Ha', 'Duy', '5', 'Tri', 'Doan', '4', '2017-10-13 03:50:52');
INSERT INTO `livescore` VALUES ('92', '42', 'Phuong', 'Doan', '2', 'Ha', 'Duy', '5', '2017-10-16 00:01:10');
INSERT INTO `livescore` VALUES ('93', '44', 'Phuong', 'Duy', '5', 'Ha', 'Doan', '1', '2017-10-16 03:44:01');
INSERT INTO `livescore` VALUES ('94', '46', 'Phuong', 'Doan', '5', 'Ha', 'Duy', '4', '2017-10-16 03:57:37');
INSERT INTO `livescore` VALUES ('95', '47', 'Tri', 'Linh', '3', 'Phuong', 'Duy', '5', '2017-10-16 23:44:12');
INSERT INTO `livescore` VALUES ('96', '47', 'Phuong', 'Duy', '5', 'Ha', 'Doan', '1', '2017-10-16 23:44:12');
INSERT INTO `livescore` VALUES ('97', '47', 'Ha', 'Doan', '5', 'Tri', 'Linh', '3', '2017-10-16 23:44:12');
INSERT INTO `livescore` VALUES ('98', '48', 'Tri', 'Doan', '4', 'Linh', 'Phuong', '5', '2017-10-17 04:03:29');
INSERT INTO `livescore` VALUES ('99', '48', 'Linh', 'Phuong', '4', 'Ha', 'Duy', '5', '2017-10-17 04:03:29');
INSERT INTO `livescore` VALUES ('100', '48', 'Ha', 'Duy', '5', 'Tri', 'Doan', '2', '2017-10-17 04:03:29');
INSERT INTO `livescore` VALUES ('101', '49', 'Doan', 'Phuong', '5', 'Duy', 'Tri', '2', '2017-10-17 04:13:39');
INSERT INTO `livescore` VALUES ('102', '49', 'Duy', 'Tri', '1', 'Ha', 'Linh', '5', '2017-10-17 04:13:39');
INSERT INTO `livescore` VALUES ('103', '49', 'Ha', 'Linh', '5', 'Doan', 'Phuong', '0', '2017-10-17 04:13:39');
INSERT INTO `livescore` VALUES ('104', '50', 'Phuong', 'Tri', '5', 'Linh', 'Doan', '4', '2017-10-17 23:46:00');
INSERT INTO `livescore` VALUES ('105', '50', 'Linh', 'Doan', '0', 'Ha', 'Duy', '5', '2017-10-17 23:46:00');
INSERT INTO `livescore` VALUES ('106', '50', 'Ha', 'Duy', '0', 'Phuong', 'Tri', '5', '2017-10-17 23:46:00');
INSERT INTO `livescore` VALUES ('107', '51', 'Doan', 'Tri', '3', 'Duy', 'Phuong', '5', '2017-10-18 03:53:36');
INSERT INTO `livescore` VALUES ('108', '51', 'Duy', 'Phuong', '5', 'Ha', 'Linh', '1', '2017-10-18 03:53:36');
INSERT INTO `livescore` VALUES ('109', '51', 'Ha', 'Linh', '5', 'Doan', 'Tri', '4', '2017-10-18 03:53:36');
INSERT INTO `livescore` VALUES ('110', '53', 'Doan', 'Linh', '5', 'Duy', 'Tri', '4', '2017-10-18 04:11:31');
INSERT INTO `livescore` VALUES ('111', '53', 'Duy', 'Tri', '4', 'Ha', 'Phuong', '5', '2017-10-18 04:11:31');
INSERT INTO `livescore` VALUES ('112', '53', 'Ha', 'Phuong', '4', 'Doan', 'Linh', '5', '2017-10-18 04:11:31');
INSERT INTO `livescore` VALUES ('113', '54', 'Phuong', 'Duy', '5', 'Linh', 'Tri', '4', '2017-10-19 00:01:01');
INSERT INTO `livescore` VALUES ('114', '54', 'Linh', 'Tri', '2', 'Ha', 'Doan', '5', '2017-10-19 00:01:01');
INSERT INTO `livescore` VALUES ('115', '54', 'Ha', 'Doan', '3', 'Phuong', 'Duy', '5', '2017-10-19 00:01:01');
INSERT INTO `livescore` VALUES ('116', '57', 'Tri', 'Duy', '5', 'Doan', 'Phuong', '2', '2017-10-19 03:50:16');
INSERT INTO `livescore` VALUES ('117', '57', 'Doan', 'Phuong', '5', 'Linh', 'Ha', '3', '2017-10-19 03:50:16');
INSERT INTO `livescore` VALUES ('118', '57', 'Linh', 'Ha', '5', 'Tri', 'Duy', '3', '2017-10-19 03:50:16');
INSERT INTO `livescore` VALUES ('119', '59', 'Phuong', 'Tri', '5', 'Ha', 'Duy', '2', '2017-10-19 04:03:05');
INSERT INTO `livescore` VALUES ('120', '59', 'Ha', 'Duy', '3', 'Linh', 'Doan', '5', '2017-10-19 04:03:05');
INSERT INTO `livescore` VALUES ('121', '59', 'Linh', 'Doan', '3', 'Phuong', 'Tri', '5', '2017-10-19 04:03:05');
INSERT INTO `livescore` VALUES ('122', '60', 'Tri', 'Duy', '5', 'Thanh', 'Phuong', '4', '2017-10-22 23:45:04');
INSERT INTO `livescore` VALUES ('123', '60', 'Thanh', 'Phuong', '5', 'Doan', 'Linh', '3', '2017-10-22 23:45:04');
INSERT INTO `livescore` VALUES ('124', '60', 'Doan', 'Linh', '5', 'Tri', 'Duy', '3', '2017-10-22 23:45:04');
INSERT INTO `livescore` VALUES ('125', '62', 'Tri', 'Phuong', '5', 'Thanh', 'Linh', '2', '2017-10-23 08:16:08');
INSERT INTO `livescore` VALUES ('126', '62', 'Thanh', 'Linh', '2', 'Doan', 'Duy', '5', '2017-10-23 08:16:08');
INSERT INTO `livescore` VALUES ('127', '62', 'Doan', 'Duy', '4', 'Tri', 'Phuong', '5', '2017-10-23 08:16:08');
INSERT INTO `livescore` VALUES ('128', '63', 'Doan', 'Phuong', '5', 'Duy', 'Tri', '3', '2017-10-23 23:30:55');
INSERT INTO `livescore` VALUES ('129', '63', 'Duy', 'Tri', '5', 'Thanh', 'Linh', '3', '2017-10-23 23:30:55');
INSERT INTO `livescore` VALUES ('130', '63', 'Thanh', 'Linh', '3', 'Doan', 'Phuong', '5', '2017-10-23 23:30:55');
INSERT INTO `livescore` VALUES ('131', '65', 'Tri', 'Phuong', '0', 'Thanh', 'Doan', '5', '2017-10-24 03:35:11');
INSERT INTO `livescore` VALUES ('132', '65', 'Thanh', 'Doan', '5', 'Linh', 'Duy', '3', '2017-10-24 03:35:11');
INSERT INTO `livescore` VALUES ('133', '65', 'Linh', 'Duy', '2', 'Tri', 'Phuong', '5', '2017-10-24 03:35:11');
INSERT INTO `livescore` VALUES ('134', '66', 'Doan', 'Phuong', '5', 'Duy', 'Tri', '2', '2017-10-24 03:44:09');
INSERT INTO `livescore` VALUES ('135', '66', 'Duy', 'Tri', '5', 'Thanh', 'Linh', '1', '2017-10-24 03:44:09');
INSERT INTO `livescore` VALUES ('136', '66', 'Thanh', 'Linh', '3', 'Doan', 'Phuong', '5', '2017-10-24 03:44:09');
INSERT INTO `livescore` VALUES ('137', '67', 'Linh', 'Phuong', '5', 'Duy', 'Thanh', '1', '2017-10-24 04:02:57');
INSERT INTO `livescore` VALUES ('138', '67', 'Duy', 'Thanh', '5', 'Tri', 'Doan', '3', '2017-10-24 04:02:57');
INSERT INTO `livescore` VALUES ('139', '67', 'Tri', 'Doan', '3', 'Linh', 'Phuong', '5', '2017-10-24 04:02:57');
INSERT INTO `livescore` VALUES ('140', '70', 'Thanh', 'Phuong', '5', 'Tri', 'Duy', '3', '2017-10-24 23:50:25');
INSERT INTO `livescore` VALUES ('141', '70', 'Tri', 'Duy', '4', 'Linh', 'Doan', '5', '2017-10-24 23:50:25');
INSERT INTO `livescore` VALUES ('142', '70', 'Linh', 'Doan', '4', 'Thanh', 'Phuong', '5', '2017-10-24 23:50:25');
INSERT INTO `livescore` VALUES ('143', '70', 'Duy', 'Phuong', '5', 'Linh', 'Thanh', '2', '2017-10-25 03:44:18');
INSERT INTO `livescore` VALUES ('144', '70', 'Linh', 'Thanh', '1', 'Tri', 'Doan', '5', '2017-10-25 03:44:18');
INSERT INTO `livescore` VALUES ('145', '70', 'Tri', 'Doan', '0', 'Duy', 'Phuong', '5', '2017-10-25 03:44:18');
INSERT INTO `livescore` VALUES ('146', '72', 'Thanh', 'Doan', '4', 'Tri', 'Duy', '5', '2017-10-25 04:00:22');
INSERT INTO `livescore` VALUES ('147', '72', 'Tri', 'Duy', '5', 'Linh', 'Phuong', '2', '2017-10-25 04:00:22');
INSERT INTO `livescore` VALUES ('148', '72', 'Linh', 'Phuong', '4', 'Thanh', 'Doan', '5', '2017-10-25 04:00:22');
INSERT INTO `livescore` VALUES ('149', '73', 'Phuong', 'Duy', '4', 'Doan', 'Linh', '5', '2017-10-25 23:42:01');
INSERT INTO `livescore` VALUES ('150', '73', 'Doan', 'Linh', '5', 'Tri', 'Thanh', '1', '2017-10-25 23:42:01');
INSERT INTO `livescore` VALUES ('151', '73', 'Tri', 'Thanh', '2', 'Phuong', 'Duy', '5', '2017-10-25 23:42:01');
INSERT INTO `livescore` VALUES ('152', '74', 'Linh', 'Thanh', '5', 'Tri', 'Doan', '3', '2017-10-26 03:50:47');
INSERT INTO `livescore` VALUES ('153', '74', 'Tri', 'Doan', '1', 'Duy', 'Phuong', '5', '2017-10-26 03:50:47');
INSERT INTO `livescore` VALUES ('154', '74', 'Duy', 'Phuong', '2', 'Linh', 'Thanh', '5', '2017-10-26 03:50:47');
INSERT INTO `livescore` VALUES ('155', '77', 'Tri', 'Thanh', '2', 'Duy', 'Doan', '5', '2017-10-26 04:05:39');
INSERT INTO `livescore` VALUES ('156', '77', 'Duy', 'Doan', '4', 'Linh', 'Phuong', '5', '2017-10-26 04:05:39');
INSERT INTO `livescore` VALUES ('157', '77', 'Linh', 'Phuong', '5', 'Tri', 'Thanh', '2', '2017-10-26 04:05:39');
INSERT INTO `livescore` VALUES ('158', '78', 'Thanh', 'Phuong', '5', 'Tri', 'Doan', '1', '2017-10-26 23:43:59');
INSERT INTO `livescore` VALUES ('159', '78', 'Tri', 'Doan', '5', 'Thanh', 'Phuong', '2', '2017-10-26 23:43:59');
INSERT INTO `livescore` VALUES ('160', '78', 'Thanh', 'Phuong', '3', 'Tri', 'Doan', '5', '2017-10-26 23:43:59');
INSERT INTO `livescore` VALUES ('161', '79', 'Thanh', 'Doan', '2', 'Tri', 'Phuong', '5', '2017-10-27 03:53:01');
INSERT INTO `livescore` VALUES ('162', '79', 'Tri', 'Phuong', '5', 'Ha', 'Linh', '4', '2017-10-27 03:53:02');
INSERT INTO `livescore` VALUES ('163', '79', 'Ha', 'Linh', '5', 'Thanh', 'Doan', '1', '2017-10-27 03:53:02');
INSERT INTO `livescore` VALUES ('164', '80', 'Thanh', 'Linh', '4', 'Tri', 'Doan', '5', '2017-10-27 04:07:21');
INSERT INTO `livescore` VALUES ('165', '80', 'Tri', 'Doan', '5', 'Ha', 'Phuong', '0', '2017-10-27 04:07:21');
INSERT INTO `livescore` VALUES ('166', '80', 'Ha', 'Phuong', '3', 'Thanh', 'Linh', '5', '2017-10-27 04:07:21');
INSERT INTO `livescore` VALUES ('167', '82', 'Thanh', 'Duy', '5', 'Tri', 'Linh', '3', '2017-10-29 23:33:14');
INSERT INTO `livescore` VALUES ('168', '82', 'Tri', 'Linh', '3', 'Ha', 'Phuong', '5', '2017-10-29 23:33:14');
INSERT INTO `livescore` VALUES ('169', '82', 'Ha', 'Phuong', '5', 'Thanh', 'Duy', '2', '2017-10-29 23:33:14');
INSERT INTO `livescore` VALUES ('170', '84', 'Tri', 'Duy', '3', 'Thanh', 'Phuong', '5', '2017-10-30 03:55:49');
INSERT INTO `livescore` VALUES ('171', '84', 'Thanh', 'Phuong', '5', 'Doan', 'Ha', '2', '2017-10-30 03:55:49');
INSERT INTO `livescore` VALUES ('172', '84', 'Doan', 'Ha', '5', 'Tri', 'Duy', '1', '2017-10-30 03:55:49');
INSERT INTO `livescore` VALUES ('173', '85', 'Thanh', 'Doan', '2', 'Tri', 'Phuong', '5', '2017-10-30 04:08:11');
INSERT INTO `livescore` VALUES ('174', '85', 'Tri', 'Phuong', '5', 'Ha', 'Duy', '3', '2017-10-30 04:08:11');
INSERT INTO `livescore` VALUES ('175', '85', 'Ha', 'Duy', '5', 'Thanh', 'Doan', '2', '2017-10-30 04:08:11');
INSERT INTO `livescore` VALUES ('176', '87', 'Phuong', 'Ha', '5', 'Linh', 'Duy', '2', '2017-10-30 23:37:02');
INSERT INTO `livescore` VALUES ('177', '87', 'Linh', 'Duy', '4', 'Doan', 'Tri', '5', '2017-10-30 23:37:02');
INSERT INTO `livescore` VALUES ('178', '87', 'Doan', 'Tri', '5', 'Phuong', 'Ha', '4', '2017-10-30 23:37:02');
INSERT INTO `livescore` VALUES ('179', '88', 'Phuong', 'Duy', '5', 'Thanh', 'Tri', '3', '2017-10-31 03:52:44');
INSERT INTO `livescore` VALUES ('180', '88', 'Thanh', 'Tri', '4', 'Ha', 'Doan', '5', '2017-10-31 03:52:44');
INSERT INTO `livescore` VALUES ('181', '88', 'Ha', 'Doan', '5', 'Phuong', 'Duy', '2', '2017-10-31 03:52:44');
INSERT INTO `livescore` VALUES ('182', '89', 'Duy', 'Ha', '5', 'Thanh', 'Phuong', '0', '2017-10-31 04:05:07');
INSERT INTO `livescore` VALUES ('183', '89', 'Thanh', 'Phuong', '5', 'Doan', 'Tri', '4', '2017-10-31 04:05:07');
INSERT INTO `livescore` VALUES ('184', '89', 'Doan', 'Tri', '2', 'Duy', 'Ha', '5', '2017-10-31 04:05:07');
INSERT INTO `livescore` VALUES ('185', '90', 'Phuong', 'Doan', '5', 'Duy', 'Ha', '2', '2017-10-31 23:39:21');
INSERT INTO `livescore` VALUES ('186', '90', 'Duy', 'Ha', '5', 'Linh', 'Tri', '1', '2017-10-31 23:39:21');
INSERT INTO `livescore` VALUES ('187', '90', 'Linh', 'Tri', '2', 'Phuong', 'Doan', '5', '2017-10-31 23:39:21');
INSERT INTO `livescore` VALUES ('188', '91', 'Duy', 'Phuong', '5', 'Thanh', 'Ha', '0', '2017-11-01 04:01:33');
INSERT INTO `livescore` VALUES ('189', '91', 'Thanh', 'Ha', '5', 'Tri', 'Doan', '4', '2017-11-01 04:01:33');
INSERT INTO `livescore` VALUES ('190', '91', 'Tri', 'Doan', '5', 'Duy', 'Phuong', '4', '2017-11-01 04:01:33');
INSERT INTO `livescore` VALUES ('191', '92', 'Thanh', 'Linh', '3', 'Tri', 'Duy', '5', '2017-11-01 04:12:33');
INSERT INTO `livescore` VALUES ('192', '92', 'Tri', 'Duy', '5', 'Ha', 'Phuong', '3', '2017-11-01 04:12:33');
INSERT INTO `livescore` VALUES ('193', '92', 'Ha', 'Phuong', '0', 'Thanh', 'Linh', '5', '2017-11-01 04:12:33');
INSERT INTO `livescore` VALUES ('194', '93', 'Linh', 'Ha', '5', 'Duy', 'Phuong', '3', '2017-11-01 23:38:54');
INSERT INTO `livescore` VALUES ('195', '93', 'Duy', 'Phuong', '5', 'Doan', 'Tri', '2', '2017-11-01 23:38:54');
INSERT INTO `livescore` VALUES ('196', '93', 'Doan', 'Tri', '0', 'Linh', 'Ha', '5', '2017-11-01 23:38:54');
INSERT INTO `livescore` VALUES ('197', '95', 'Linh', 'Duy', '5', 'Doan', 'Ha', '2', '2017-11-02 03:50:26');
INSERT INTO `livescore` VALUES ('198', '95', 'Doan', 'Ha', '5', 'Tri', 'Phuong', '1', '2017-11-02 03:50:26');
INSERT INTO `livescore` VALUES ('199', '95', 'Tri', 'Phuong', '4', 'Linh', 'Duy', '5', '2017-11-02 03:50:26');
INSERT INTO `livescore` VALUES ('200', '96', 'Phuong', 'Doan', '2', 'Duy', 'Ha', '5', '2017-11-02 04:03:03');
INSERT INTO `livescore` VALUES ('201', '96', 'Duy', 'Ha', '5', 'Thanh', 'Linh', '1', '2017-11-02 04:03:03');
INSERT INTO `livescore` VALUES ('202', '96', 'Thanh', 'Linh', '1', 'Phuong', 'Doan', '5', '2017-11-02 04:03:03');
INSERT INTO `livescore` VALUES ('203', '98', 'Phuong', 'Thanh', '4', 'Duy', 'Tri', '5', '2017-11-02 23:40:26');
INSERT INTO `livescore` VALUES ('204', '98', 'Duy', 'Tri', '4', 'Doan', 'Ha', '5', '2017-11-02 23:40:26');
INSERT INTO `livescore` VALUES ('205', '98', 'Doan', 'Ha', '5', 'Phuong', 'Thanh', '4', '2017-11-02 23:40:26');
INSERT INTO `livescore` VALUES ('206', '100', 'Tri', 'Doan', '3', 'Linh', 'Duy', '5', '2017-11-03 03:59:00');
INSERT INTO `livescore` VALUES ('207', '100', 'Linh', 'Duy', '5', 'Ha', 'Phuong', '3', '2017-11-03 03:59:00');
INSERT INTO `livescore` VALUES ('208', '100', 'Ha', 'Phuong', '5', 'Tri', 'Doan', '1', '2017-11-03 03:59:00');
INSERT INTO `livescore` VALUES ('209', '102', 'Tri', 'Phuong', '2', 'Linh', 'Ha', '5', '2017-11-03 04:14:53');
INSERT INTO `livescore` VALUES ('210', '102', 'Linh', 'Ha', '3', 'Doan', 'Duy', '5', '2017-11-03 04:14:53');
INSERT INTO `livescore` VALUES ('211', '102', 'Doan', 'Duy', '4', 'Tri', 'Phuong', '5', '2017-11-03 04:14:53');
INSERT INTO `livescore` VALUES ('212', '104', 'Tri', 'Doan', '5', 'Linh', 'Phuong', '2', '2017-11-07 23:40:34');
INSERT INTO `livescore` VALUES ('213', '104', 'Linh', 'Phuong', '0', 'Ha', 'Duy', '5', '2017-11-07 23:40:34');
INSERT INTO `livescore` VALUES ('214', '104', 'Ha', 'Duy', '5', 'Tri', 'Doan', '1', '2017-11-07 23:40:34');
INSERT INTO `livescore` VALUES ('215', '106', 'Tri', 'Duy', '1', 'Linh', 'Doan', '5', '2017-11-08 03:47:56');
INSERT INTO `livescore` VALUES ('216', '106', 'Linh', 'Doan', '5', 'Ha', 'Phuong', '2', '2017-11-08 03:47:56');
INSERT INTO `livescore` VALUES ('217', '106', 'Ha', 'Phuong', '5', 'Tri', 'Duy', '3', '2017-11-08 03:47:56');
INSERT INTO `livescore` VALUES ('218', '107', 'Tri', 'Doan', '5', 'Linh', 'Phuong', '4', '2017-11-08 04:03:59');
INSERT INTO `livescore` VALUES ('219', '107', 'Linh', 'Phuong', '4', 'Ha', 'Duy', '5', '2017-11-08 04:03:59');
INSERT INTO `livescore` VALUES ('220', '107', 'Ha', 'Duy', '5', 'Tri', 'Doan', '4', '2017-11-08 04:03:59');
INSERT INTO `livescore` VALUES ('221', '108', 'Tri', 'Ha', '4', 'Phuong', 'Doan', '5', '2017-11-08 23:44:17');
INSERT INTO `livescore` VALUES ('222', '108', 'Phuong', 'Doan', '5', 'Thanh', 'Linh', '4', '2017-11-08 23:44:17');
INSERT INTO `livescore` VALUES ('223', '108', 'Thanh', 'Linh', '1', 'Tri', 'Ha', '5', '2017-11-08 23:44:17');
INSERT INTO `livescore` VALUES ('224', '113', 'Doan', 'Ha', '5', 'Tri', 'Linh', '2', '2017-11-09 03:51:12');
INSERT INTO `livescore` VALUES ('225', '113', 'Tri', 'Linh', '0', 'Duy', 'Phuong', '5', '2017-11-09 03:51:12');
INSERT INTO `livescore` VALUES ('226', '113', 'Duy', 'Phuong', '5', 'Doan', 'Ha', '2', '2017-11-09 03:51:12');
INSERT INTO `livescore` VALUES ('227', '114', 'Doan', 'Phuong', '5', 'Duy', 'Tri', '3', '2017-11-09 04:00:35');
INSERT INTO `livescore` VALUES ('228', '114', 'Duy', 'Tri', '1', 'Ha', 'Linh', '5', '2017-11-09 04:00:35');
INSERT INTO `livescore` VALUES ('229', '114', 'Ha', 'Linh', '5', 'Doan', 'Phuong', '1', '2017-11-09 04:00:35');
INSERT INTO `livescore` VALUES ('230', '115', 'Doan', 'Linh', '5', 'Ha', 'Duy', '3', '2017-11-09 04:14:26');
INSERT INTO `livescore` VALUES ('231', '115', 'Ha', 'Duy', '5', 'Thanh', 'Tri', '1', '2017-11-09 04:14:26');
INSERT INTO `livescore` VALUES ('232', '115', 'Thanh', 'Tri', '0', 'Doan', 'Linh', '5', '2017-11-09 04:14:26');
INSERT INTO `livescore` VALUES ('233', '117', 'Doan', 'Linh', '5', 'Phuong', 'Tri', '4', '2017-11-10 00:05:22');
INSERT INTO `livescore` VALUES ('234', '117', 'Phuong', 'Tri', '0', 'Ha', 'Thanh', '5', '2017-11-10 00:05:22');
INSERT INTO `livescore` VALUES ('235', '117', 'Ha', 'Thanh', '5', 'Doan', 'Linh', '3', '2017-11-10 00:05:22');
INSERT INTO `livescore` VALUES ('236', '118', 'Tri', 'Linh', '0', 'Phuong', 'Ha', '0', '2017-11-12 21:21:56');
INSERT INTO `livescore` VALUES ('237', '118', 'Phuong', 'Ha', '0', 'Duy', 'Doan', '0', '2017-11-12 21:21:56');
INSERT INTO `livescore` VALUES ('238', '118', 'Duy', 'Doan', '0', 'Tri', 'Linh', '0', '2017-11-12 21:21:56');
INSERT INTO `livescore` VALUES ('239', '120', 'Duy', 'Ha', '5', 'Tri', 'Doan', '0', '2017-11-12 23:45:05');
INSERT INTO `livescore` VALUES ('240', '120', 'Tri', 'Doan', '2', 'Linh', 'Phuong', '5', '2017-11-12 23:45:05');
INSERT INTO `livescore` VALUES ('241', '120', 'Linh', 'Phuong', '4', 'Duy', 'Ha', '5', '2017-11-12 23:45:05');
INSERT INTO `livescore` VALUES ('242', '121', 'Thanh', 'Linh', '1', 'Tri', 'Phuong', '5', '2017-11-13 03:49:07');
INSERT INTO `livescore` VALUES ('243', '121', 'Tri', 'Phuong', '3', 'Doan', 'Duy', '5', '2017-11-13 03:49:07');
INSERT INTO `livescore` VALUES ('244', '121', 'Doan', 'Duy', '4', 'Thanh', 'Linh', '5', '2017-11-13 03:49:07');

-- ----------------------------
-- Table structure for `player`
-- ----------------------------
DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `register` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of player
-- ----------------------------
INSERT INTO `player` VALUES ('1', 'Doan', '3017d911efceb27d1de6a92b70979795', '0');
INSERT INTO `player` VALUES ('2', 'Duy', 'eab71244afb687f16d8c4f5ee9d6ef0e', '0');
INSERT INTO `player` VALUES ('3', 'Ha', '5e36941b3d856737e81516acd45edc50', '0');
INSERT INTO `player` VALUES ('4', 'Linh', '192292e35fbe73f6d2b8d96bd1b6697d', '0');
INSERT INTO `player` VALUES ('5', 'Phuong', '9c95319bf274672d6eae7eb97c3dfda5', '0');
INSERT INTO `player` VALUES ('6', 'Tri', '7d0db380a5b95a8ba1da0bca241abda1', '0');
INSERT INTO `player` VALUES ('7', 'Thanh', '1f2dfa567dcf95833eddf7aec167fec7', '0');

-- ----------------------------
-- Table structure for `schedule`
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` smallint(11) NOT NULL AUTO_INCREMENT,
  `schedule_data` text,
  `win` varchar(100) DEFAULT NULL,
  `lost` varchar(100) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `schedule_type` smallint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('1', 'a:3:{i:0;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}', 'Doan - Duy', 'Phuong - Tri', '2017-09-27 03:52:59', '0');
INSERT INTO `schedule` VALUES ('2', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Phuong - Duy', 'Tri - Linh', '2017-09-28 03:33:50', '0');
INSERT INTO `schedule` VALUES ('3', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', 'Phuong - Ha', 'Linh - Duy', '2017-09-28 23:52:47', '0');
INSERT INTO `schedule` VALUES ('4', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', 'Linh - Phuong', 'Tri - Doan', '2017-09-29 03:52:47', '0');
INSERT INTO `schedule` VALUES ('5', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}}', 'Linh - Ha', 'Tri - Phuong', '2017-09-29 04:06:46', '0');
INSERT INTO `schedule` VALUES ('6', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}}', 'Doan - Phuong', 'Tri - Linh', '2017-10-01 23:42:29', '0');
INSERT INTO `schedule` VALUES ('7', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}}', 'Linh - Phuong', 'Doan - Duy', '2017-10-02 03:59:04', '0');
INSERT INTO `schedule` VALUES ('8', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}}', 'Linh - Doan', 'Tri - Phuong', '2017-10-02 23:39:53', '0');
INSERT INTO `schedule` VALUES ('9', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', 'Doan - Ha', 'Tri - Linh', '2017-10-03 03:54:17', '0');
INSERT INTO `schedule` VALUES ('10', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', 'Phuong - Doan', 'Tri - Ha', '2017-10-03 04:07:16', '0');
INSERT INTO `schedule` VALUES ('11', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}}', 'Duy - Doan', 'Tri - Phuong', '2017-10-03 23:37:46', '0');
INSERT INTO `schedule` VALUES ('12', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', 'Linh - Duy', 'Tri - Ha', '2017-10-04 03:49:11', '0');
INSERT INTO `schedule` VALUES ('14', 'a:2:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Ha - Doan', 'Phuong - Duy', '2017-10-04 23:50:30', '0');
INSERT INTO `schedule` VALUES ('15', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}}', 'Tri - Phuong', 'Ha - Linh', '2017-10-05 03:48:19', '0');
INSERT INTO `schedule` VALUES ('16', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}}', 'Ha - Doan', 'Phuong - Duy', '2017-10-05 23:40:28', '0');
INSERT INTO `schedule` VALUES ('18', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Ha - Duy', 'Tri - Doan', '2017-10-06 03:50:37', '0');
INSERT INTO `schedule` VALUES ('19', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}}', 'Linh - Ha', 'Duy - Doan', '2017-10-06 04:12:44', '1');
INSERT INTO `schedule` VALUES ('20', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}}', 'Doan - Ha', 'Tri - Duy', '2017-10-08 23:42:20', '0');
INSERT INTO `schedule` VALUES ('21', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Phuong - Tri', 'Ha - Doan', '2017-10-09 03:49:01', '0');
INSERT INTO `schedule` VALUES ('22', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}}', 'Linh - Tri', 'Duy - Ha', '2017-10-09 04:05:26', '5');
INSERT INTO `schedule` VALUES ('23', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}}', 'Tri - Duy', 'Linh - Doan', '2017-10-09 23:41:41', '0');
INSERT INTO `schedule` VALUES ('24', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Tri\";}}', 'Duy - Phuong', 'Linh - Tri', '2017-10-10 03:55:19', '0');
INSERT INTO `schedule` VALUES ('25', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Duy - Linh', 'Ha - Phuong', '2017-10-10 04:07:21', '6');
INSERT INTO `schedule` VALUES ('26', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', 'Ha - Linh', 'Duy - Tri', '2017-10-10 23:40:15', '0');
INSERT INTO `schedule` VALUES ('27', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Doan - Duy', 'Ha - Phuong', '2017-10-11 03:53:10', '0');
INSERT INTO `schedule` VALUES ('28', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Doan - Linh', 'Phuong - Tri', '2017-10-11 04:07:53', '8');
INSERT INTO `schedule` VALUES ('29', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Tri - Doan', 'Ha - Duy', '2017-10-11 23:33:06', '0');
INSERT INTO `schedule` VALUES ('30', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Duy - Linh', 'Ha - Doan', '2017-10-12 03:48:33', '0');
INSERT INTO `schedule` VALUES ('31', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Doan - Linh', 'Duy - Tri', '2017-10-12 23:49:36', '0');
INSERT INTO `schedule` VALUES ('32', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-12 23:49:36', '0');
INSERT INTO `schedule` VALUES ('33', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}}', 'Doan - Duy', 'Phuong - Tri', '2017-10-13 03:39:20', '0');
INSERT INTO `schedule` VALUES ('34', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', null, null, '2017-10-13 03:39:20', '0');
INSERT INTO `schedule` VALUES ('35', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Ha - Duy', 'Tri - Doan', '2017-10-13 03:50:52', '1');
INSERT INTO `schedule` VALUES ('36', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', null, null, '2017-10-13 03:50:52', '0');
INSERT INTO `schedule` VALUES ('37', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', null, null, '2017-10-13 03:52:15', '0');
INSERT INTO `schedule` VALUES ('38', 'a:2:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-16 00:00:18', '0');
INSERT INTO `schedule` VALUES ('39', 'a:2:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', null, null, '2017-10-16 00:00:33', '0');
INSERT INTO `schedule` VALUES ('40', 'a:2:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-16 00:00:41', '0');
INSERT INTO `schedule` VALUES ('41', 'a:2:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', null, null, '2017-10-16 00:00:48', '0');
INSERT INTO `schedule` VALUES ('42', 'a:2:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Ha - Duy', 'Phuong - Doan', '2017-10-16 00:01:10', '0');
INSERT INTO `schedule` VALUES ('43', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-16 00:01:10', '0');
INSERT INTO `schedule` VALUES ('44', 'a:2:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Phuong - Duy', 'Ha - Doan', '2017-10-16 03:44:01', '0');
INSERT INTO `schedule` VALUES ('45', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', null, null, '2017-10-16 03:44:01', '0');
INSERT INTO `schedule` VALUES ('46', 'a:2:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Phuong - Doan', 'Ha - Duy', '2017-10-16 03:57:37', '5');
INSERT INTO `schedule` VALUES ('47', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Phuong - Duy', 'Tri - Linh', '2017-10-16 23:44:12', '0');
INSERT INTO `schedule` VALUES ('48', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Ha - Duy', 'Tri - Doan', '2017-10-17 04:03:29', '0');
INSERT INTO `schedule` VALUES ('49', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', 'Ha - Linh', 'Duy - Tri', '2017-10-17 04:13:39', '8');
INSERT INTO `schedule` VALUES ('50', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Phuong - Tri', 'Linh - Doan', '2017-10-17 23:46:00', '0');
INSERT INTO `schedule` VALUES ('51', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', 'Duy - Phuong', 'Doan - Tri', '2017-10-18 03:53:36', '0');
INSERT INTO `schedule` VALUES ('53', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Doan - Linh', 'Duy - Tri', '2017-10-18 04:11:31', '5');
INSERT INTO `schedule` VALUES ('54', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Phuong - Duy', 'Linh - Tri', '2017-10-19 00:01:01', '0');
INSERT INTO `schedule` VALUES ('57', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}}', 'Tri - Duy', 'Doan - Phuong', '2017-10-19 03:50:16', '0');
INSERT INTO `schedule` VALUES ('58', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}}', null, null, '2017-10-19 03:50:16', '0');
INSERT INTO `schedule` VALUES ('59', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}}', 'Phuong - Tri', 'Ha - Duy', '2017-10-19 04:03:05', '3');
INSERT INTO `schedule` VALUES ('60', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:2:\"Thanh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}}', 'Thanh - Phuong', 'Tri - Duy', '2017-10-22 23:45:04', '0');
INSERT INTO `schedule` VALUES ('61', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Thanh\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}}', null, null, '2017-10-22 23:45:04', '0');
INSERT INTO `schedule` VALUES ('62', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:2:\"Thanh\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}}', 'Tri - Phuong', 'Thanh - Linh', '2017-10-23 08:16:08', '0');
INSERT INTO `schedule` VALUES ('63', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Thanh\";i:1;s:4:\"Linh\";}}', 'Doan - Phuong', 'Thanh - Linh', '2017-10-23 23:30:55', '0');
INSERT INTO `schedule` VALUES ('64', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:2:\"Thanh\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}}', null, null, '2017-10-23 23:30:55', '0');
INSERT INTO `schedule` VALUES ('65', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:2:\"Thanh\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', 'Thanh - Doan', 'Linh - Duy', '2017-10-24 03:35:11', '0');
INSERT INTO `schedule` VALUES ('66', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Thanh\";i:1;s:4:\"Linh\";}}', 'Doan - Phuong', 'Thanh - Linh', '2017-10-24 03:44:09', '5');
INSERT INTO `schedule` VALUES ('67', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Thanh\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', 'Linh - Phuong', 'Tri - Doan', '2017-10-24 04:02:57', '6');
INSERT INTO `schedule` VALUES ('68', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Tri\";}}', null, null, '2017-10-24 04:02:57', '0');
INSERT INTO `schedule` VALUES ('69', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:5:\"Thanh\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-24 09:35:24', '0');
INSERT INTO `schedule` VALUES ('70', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}}', 'Duy - Phuong', 'Linh - Thanh', '2017-10-25 03:44:18', '0');
INSERT INTO `schedule` VALUES ('72', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}}', 'Tri - Duy', 'Linh - Phuong', '2017-10-25 04:00:22', '8');
INSERT INTO `schedule` VALUES ('73', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:5:\"Thanh\";}}', 'Doan - Linh', 'Tri - Thanh', '2017-10-25 23:42:01', '0');
INSERT INTO `schedule` VALUES ('74', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:5:\"Thanh\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', 'Linh - Thanh', 'Tri - Doan', '2017-10-26 03:50:47', '0');
INSERT INTO `schedule` VALUES ('77', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:5:\"Thanh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}}', 'Linh - Phuong', 'Tri - Thanh', '2017-10-26 04:05:39', '6');
INSERT INTO `schedule` VALUES ('78', 'a:2:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', 'Tri - Doan', 'Thanh - Phuong', '2017-10-26 23:43:59', '0');
INSERT INTO `schedule` VALUES ('79', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', 'Tri - Phuong', 'Thanh - Doan', '2017-10-27 03:53:02', '0');
INSERT INTO `schedule` VALUES ('80', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Tri - Doan', 'Ha - Phuong', '2017-10-27 04:07:21', '1');
INSERT INTO `schedule` VALUES ('81', 'a:3:{i:0;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}}', null, null, '2017-10-29 23:22:05', '0');
INSERT INTO `schedule` VALUES ('82', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Ha - Phuong', 'Tri - Linh', '2017-10-29 23:33:14', '0');
INSERT INTO `schedule` VALUES ('83', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}}', null, null, '2017-10-30 03:13:03', '0');
INSERT INTO `schedule` VALUES ('84', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:5:\"Thanh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}}', 'Thanh - Phuong', 'Tri - Duy', '2017-10-30 03:55:49', '0');
INSERT INTO `schedule` VALUES ('85', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Tri - Phuong', 'Thanh - Doan', '2017-10-30 04:08:11', '3');
INSERT INTO `schedule` VALUES ('86', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:5:\"Thanh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}}', null, null, '2017-10-30 21:11:47', '0');
INSERT INTO `schedule` VALUES ('87', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Tri\";}}', 'Doan - Tri', 'Linh - Duy', '2017-10-30 23:37:02', '0');
INSERT INTO `schedule` VALUES ('88', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:5:\"Thanh\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Ha - Doan', 'Thanh - Tri', '2017-10-31 03:52:44', '0');
INSERT INTO `schedule` VALUES ('89', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:5:\"Thanh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Tri\";}}', 'Duy - Ha', 'Doan - Tri', '2017-10-31 04:05:07', '8');
INSERT INTO `schedule` VALUES ('90', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:5:\"Ha\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Tri\";}}', 'Phuong - Doan', 'Linh - Tri', '2017-10-31 23:39:21', '0');
INSERT INTO `schedule` VALUES ('91', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:5:\"Thanh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', 'Duy - Phuong', 'Thanh - Ha', '2017-11-01 04:01:33', '0');
INSERT INTO `schedule` VALUES ('92', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Tri - Duy', 'Ha - Phuong', '2017-11-01 04:12:33', '5');
INSERT INTO `schedule` VALUES ('93', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Tri\";}}', 'Linh - Ha', 'Doan - Tri', '2017-11-01 23:38:54', '0');
INSERT INTO `schedule` VALUES ('94', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}}', null, null, '2017-11-01 23:41:57', '0');
INSERT INTO `schedule` VALUES ('95', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}}', 'Linh - Duy', 'Tri - Phuong', '2017-11-02 03:50:26', '0');
INSERT INTO `schedule` VALUES ('96', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Linh\";}}', 'Duy - Ha', 'Thanh - Linh', '2017-11-02 04:03:03', '7');
INSERT INTO `schedule` VALUES ('97', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}}', null, null, '2017-11-02 19:32:59', '0');
INSERT INTO `schedule` VALUES ('98', 'a:3:{i:0;a:2:{i:0;s:6:\"Phuong\";i:1;s:5:\"Thanh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}}', 'Doan - Ha', 'Phuong - Thanh', '2017-11-02 23:40:26', '0');
INSERT INTO `schedule` VALUES ('99', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}}', null, null, '2017-11-03 02:52:53', '0');
INSERT INTO `schedule` VALUES ('100', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Linh - Duy', 'Tri - Doan', '2017-11-03 03:59:00', '0');
INSERT INTO `schedule` VALUES ('101', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Tri\";}}', null, null, '2017-11-03 03:59:16', '0');
INSERT INTO `schedule` VALUES ('102', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}}', 'Doan - Duy', 'Tri - Phuong', '2017-11-03 04:14:53', '1');
INSERT INTO `schedule` VALUES ('103', 'a:2:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', null, null, '2017-11-06 01:13:45', '0');
INSERT INTO `schedule` VALUES ('104', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Ha - Duy', 'Linh - Phuong', '2017-11-07 23:40:34', '0');
INSERT INTO `schedule` VALUES ('106', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:3:\"Duy\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:6:\"Phuong\";}}', 'Linh - Doan', 'Tri - Duy', '2017-11-08 03:47:56', '0');
INSERT INTO `schedule` VALUES ('107', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}}', 'Ha - Duy', 'Linh - Phuong', '2017-11-08 04:03:59', '8');
INSERT INTO `schedule` VALUES ('108', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Linh\";}}', 'Phuong - Doan', 'Thanh - Linh', '2017-11-08 23:44:17', '0');
INSERT INTO `schedule` VALUES ('109', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:5:\"Thanh\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}}', null, null, '2017-11-09 01:16:24', '0');
INSERT INTO `schedule` VALUES ('110', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:5:\"Thanh\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', null, null, '2017-11-09 01:20:11', '0');
INSERT INTO `schedule` VALUES ('111', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:5:\"Thanh\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', null, null, '2017-11-09 01:21:09', '0');
INSERT INTO `schedule` VALUES ('112', 'a:2:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', null, null, '2017-11-09 01:36:04', '0');
INSERT INTO `schedule` VALUES ('113', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', 'Duy - Phuong', 'Tri - Linh', '2017-11-09 03:51:12', '0');
INSERT INTO `schedule` VALUES ('114', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}}', 'Ha - Linh', 'Duy - Tri', '2017-11-09 04:00:35', '6');
INSERT INTO `schedule` VALUES ('115', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:2:\"Ha\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:5:\"Thanh\";i:1;s:3:\"Tri\";}}', 'Doan - Linh', 'Thanh - Tri', '2017-11-09 04:14:26', '10');
INSERT INTO `schedule` VALUES ('117', 'a:3:{i:0;a:2:{i:0;s:4:\"Doan\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:5:\"Thanh\";}}', 'Ha - Thanh', 'Phuong - Tri', '2017-11-10 00:05:22', '0');
INSERT INTO `schedule` VALUES ('120', 'a:3:{i:0;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}}', 'Duy - Ha', 'Tri - Doan', '2017-11-12 23:45:05', '0');
INSERT INTO `schedule` VALUES ('121', 'a:3:{i:0;a:2:{i:0;s:5:\"Thanh\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}}', 'Tri - Phuong', 'Thanh - Linh', '2017-11-13 03:49:07', '7');
