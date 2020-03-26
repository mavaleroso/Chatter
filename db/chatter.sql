/*
 Navicat Premium Data Transfer

 Source Server         : Server 1
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : chatter

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 26/03/2020 10:40:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `m_to` int(40) NULL DEFAULT NULL,
  `m_from` int(40) NULL DEFAULT NULL,
  `m_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `m_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_seen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `m_date` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (1, 2, 1, 'Hi', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-25 21:57:41.000000');
INSERT INTO `messages` VALUES (2, 1, 2, 'Hello', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-25 21:57:55.000000');
INSERT INTO `messages` VALUES (3, 2, 1, 'hey', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:18:51.000000');
INSERT INTO `messages` VALUES (4, 2, 1, 'hey', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:19:44.000000');
INSERT INTO `messages` VALUES (5, 2, 1, 'hello', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:19:54.000000');
INSERT INTO `messages` VALUES (6, 2, 1, 'hey men', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:20:06.000000');
INSERT INTO `messages` VALUES (7, 1, 2, 'wooh', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:20:41.000000');
INSERT INTO `messages` VALUES (8, 1, 2, 'nice to meet you', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:20:49.000000');
INSERT INTO `messages` VALUES (9, 2, 1, 'wow you still there', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:20:59.000000');
INSERT INTO `messages` VALUES (10, 2, 1, 'hey', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:25:37.000000');
INSERT INTO `messages` VALUES (11, 2, 1, 'nice', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:25:43.000000');
INSERT INTO `messages` VALUES (12, 1, 2, 'wow still there', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:25:50.000000');
INSERT INTO `messages` VALUES (13, 2, 1, 'nice', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:30:38.000000');
INSERT INTO `messages` VALUES (14, 2, 1, 'hey', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '2020-03-26 10:39:11.000000');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Marwen', 'marwen', '12345');
INSERT INTO `users` VALUES (2, 'Mreawn', 'mreawn', '12345');

SET FOREIGN_KEY_CHECKS = 1;
