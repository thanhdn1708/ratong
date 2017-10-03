/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ratong

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-03 18:08:37
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of livescore
-- ----------------------------
INSERT INTO `livescore` VALUES ('1', '1', 'Ha', 'Linh', '0', 'Doan', 'Duy', '5', '2017-09-27 07:52:45');
INSERT INTO `livescore` VALUES ('2', '1', 'Doan', 'Duy', '2', 'Phuong', 'Tri', '5', '2017-09-27 07:53:02');
INSERT INTO `livescore` VALUES ('3', '1', 'Phuong', 'Tri', '0', 'Ha', 'Linh', '5', '2017-09-27 07:52:59');
INSERT INTO `livescore` VALUES ('4', '2', 'Tri', 'Linh', '5', 'Phuong', 'Duy', '4', '2017-09-28 09:33:50');
INSERT INTO `livescore` VALUES ('5', '2', 'Phuong', 'Duy', '5', 'Ha', 'Doan', '3', '2017-09-28 09:33:50');
INSERT INTO `livescore` VALUES ('6', '2', 'Ha', 'Doan', '5', 'Tri', 'Linh', '3', '2017-09-28 09:33:50');
INSERT INTO `livescore` VALUES ('7', '3', 'Tri', 'Doan', '3', 'Phuong', 'Ha', '5', '2017-09-29 02:52:47');
INSERT INTO `livescore` VALUES ('8', '3', 'Phuong', 'Ha', '5', 'Linh', 'Duy', '2', '2017-09-29 02:52:47');
INSERT INTO `livescore` VALUES ('9', '3', 'Linh', 'Duy', '1', 'Tri', 'Doan', '5', '2017-09-29 02:52:47');
INSERT INTO `livescore` VALUES ('10', '4', 'Linh', 'Phuong', '5', 'Duy', 'Ha', '2', '2017-09-29 06:53:21');
INSERT INTO `livescore` VALUES ('11', '4', 'Duy', 'Ha', '5', 'Tri', 'Doan', '1', '2017-09-29 06:53:21');
INSERT INTO `livescore` VALUES ('12', '4', 'Tri', 'Doan', '3', 'Linh', 'Phuong', '5', '2017-09-29 06:53:21');
INSERT INTO `livescore` VALUES ('13', '5', 'Tri', 'Phuong', '4', 'Linh', 'Ha', '5', '2017-09-29 07:06:46');
INSERT INTO `livescore` VALUES ('14', '5', 'Linh', 'Ha', '5', 'Duy', 'Doan', '2', '2017-09-29 07:06:46');
INSERT INTO `livescore` VALUES ('15', '5', 'Duy', 'Doan', '5', 'Tri', 'Phuong', '2', '2017-09-29 07:06:46');
INSERT INTO `livescore` VALUES ('16', '6', 'Tri', 'Linh', '0', 'Duy', 'Ha', '5', '2017-10-02 02:42:29');
INSERT INTO `livescore` VALUES ('17', '6', 'Duy', 'Ha', '4', 'Doan', 'Phuong', '5', '2017-10-02 02:42:29');
INSERT INTO `livescore` VALUES ('18', '6', 'Doan', 'Phuong', '5', 'Tri', 'Linh', '3', '2017-10-02 02:42:29');
INSERT INTO `livescore` VALUES ('19', '7', 'Tri', 'Ha', '4', 'Linh', 'Phuong', '5', '2017-10-02 06:59:04');
INSERT INTO `livescore` VALUES ('20', '7', 'Linh', 'Phuong', '5', 'Doan', 'Duy', '4', '2017-10-02 06:59:04');
INSERT INTO `livescore` VALUES ('21', '7', 'Doan', 'Duy', '4', 'Tri', 'Ha', '5', '2017-10-02 06:59:04');
INSERT INTO `livescore` VALUES ('22', '8', 'Tri', 'Phuong', '4', 'Duy', 'Ha', '5', '2017-10-03 13:39:53');
INSERT INTO `livescore` VALUES ('23', '8', 'Duy', 'Ha', '3', 'Linh', 'Doan', '5', '2017-10-03 13:39:53');
INSERT INTO `livescore` VALUES ('24', '8', 'Linh', 'Doan', '5', 'Tri', 'Phuong', '3', '2017-10-03 13:39:53');
INSERT INTO `livescore` VALUES ('25', '9', 'Tri', 'Linh', '2', 'Doan', 'Ha', '5', '2017-10-03 17:54:17');
INSERT INTO `livescore` VALUES ('26', '9', 'Doan', 'Ha', '5', 'Duy', 'Phuong', '3', '2017-10-03 17:54:17');
INSERT INTO `livescore` VALUES ('27', '9', 'Duy', 'Phuong', '5', 'Tri', 'Linh', '3', '2017-10-03 17:54:17');
INSERT INTO `livescore` VALUES ('28', '10', 'Tri', 'Ha', '0', 'Phuong', 'Doan', '5', '2017-10-03 18:07:16');
INSERT INTO `livescore` VALUES ('29', '10', 'Phuong', 'Doan', '3', 'Linh', 'Duy', '5', '2017-10-03 18:07:16');
INSERT INTO `livescore` VALUES ('30', '10', 'Linh', 'Duy', '3', 'Tri', 'Ha', '5', '2017-10-03 18:07:16');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('1', 'a:3:{i:0;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Tri\";}', 'Doan - Duy', 'Phuong - Tri', '2017-09-27 07:52:45');
INSERT INTO `schedule` VALUES ('2', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:3:\"Duy\";}i:2;a:2:{i:0;s:2:\"Ha\";i:1;s:4:\"Doan\";}}', 'Phuong - Duy', 'Tri - Linh', '2017-09-28 09:33:50');
INSERT INTO `schedule` VALUES ('3', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', 'Phuong - Ha', 'Linh - Duy', '2017-09-29 02:52:47');
INSERT INTO `schedule` VALUES ('4', 'a:3:{i:0;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Doan\";}}', 'Linh - Phuong', 'Tri - Doan', '2017-09-29 06:53:21');
INSERT INTO `schedule` VALUES ('5', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}}', 'Linh - Ha', 'Tri - Phuong', '2017-09-29 07:06:46');
INSERT INTO `schedule` VALUES ('6', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:6:\"Phuong\";}}', 'Doan - Phuong', 'Tri - Linh', '2017-10-02 02:42:29');
INSERT INTO `schedule` VALUES ('7', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:6:\"Phuong\";}i:2;a:2:{i:0;s:4:\"Doan\";i:1;s:3:\"Duy\";}}', 'Linh - Phuong', 'Doan - Duy', '2017-10-02 06:59:04');
INSERT INTO `schedule` VALUES ('8', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:3:\"Duy\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-02 13:19:34');
INSERT INTO `schedule` VALUES ('9', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:4:\"Linh\";}i:1;a:2:{i:0;s:4:\"Doan\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:6:\"Phuong\";}}', null, null, '2017-10-03 13:39:53');
INSERT INTO `schedule` VALUES ('10', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:2:\"Ha\";}i:1;a:2:{i:0;s:6:\"Phuong\";i:1;s:4:\"Doan\";}i:2;a:2:{i:0;s:4:\"Linh\";i:1;s:3:\"Duy\";}}', null, null, '2017-10-03 17:54:17');
INSERT INTO `schedule` VALUES ('11', 'a:3:{i:0;a:2:{i:0;s:3:\"Tri\";i:1;s:6:\"Phuong\";}i:1;a:2:{i:0;s:4:\"Linh\";i:1;s:2:\"Ha\";}i:2;a:2:{i:0;s:3:\"Duy\";i:1;s:4:\"Doan\";}}', null, null, '2017-10-03 18:07:16');
