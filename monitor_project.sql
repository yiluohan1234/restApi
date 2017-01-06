/*
Navicat MySQL Data Transfer

Source Server         : blog
Source Server Version : 100116
Source Host           : localhost:3306
Source Database       : monitor

Target Server Type    : MYSQL
Target Server Version : 100116
File Encoding         : 65001

Date: 2016-12-25 22:09:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for monitor_project
-- ----------------------------
DROP TABLE IF EXISTS `monitor_project`;
CREATE TABLE `monitor_project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//项目ID',
  `project_name` varchar(50) DEFAULT '' COMMENT '//项目的名字',
  `project_description` varchar(255) DEFAULT '' COMMENT '项目的描述',
  `project_editor` varchar(50) DEFAULT '' COMMENT '//项目的编辑者',
  `project_time` int(11) DEFAULT '0' COMMENT '//发布时间',
  `project_order` int(11) DEFAULT '0' COMMENT '//项目的排序',
  `project_pid` int(11) DEFAULT '0' COMMENT '//项目的pid',
  `project_url` varchar(50) DEFAULT '' COMMENT '//项目的url',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of monitor_project
-- ----------------------------
INSERT INTO `monitor_project` VALUES ('20', 'API', '接口相关的的项目', 'cuiyufei', '1482577019', '1', '0', '');
INSERT INTO `monitor_project` VALUES ('21', '用户画像二期', '为内部人员使用的数据平台', 'cuiyufei', '1482577059', '2', '20', 'rest/userpicture');
INSERT INTO `monitor_project` VALUES ('22', 'ugc', 'ugc相关的接口\r\n', 'cuiyufei', '1482584938', '3', '20', 'rest/ugc');

-- ----------------------------
-- Table structure for monitor_ugc
-- ----------------------------
DROP TABLE IF EXISTS `monitor_ugc`;
CREATE TABLE `monitor_ugc` (
  `api_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//接口的id',
  `api_name` varchar(50) DEFAULT '' COMMENT '//接口的名字',
  `api_description` varchar(255) DEFAULT '' COMMENT '//接口的描述',
  `api_url` varchar(255) DEFAULT '' COMMENT '//接口的url',
  `api_wiki` varchar(255) DEFAULT '' COMMENT '//接口的wiki地址',
  `api_redmine` varchar(255) DEFAULT '' COMMENT '//接口的redmine地址',
  `api_time` int(11) DEFAULT '0' COMMENT '//创建的时间',
  `api_editor` varchar(50) DEFAULT '' COMMENT '//接口作者',
  PRIMARY KEY (`api_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of monitor_ugc
-- ----------------------------
INSERT INTO `monitor_ugc` VALUES ('4', '评论', 'http://www.baidu.com', 'http://www.baidu.com', 'http://www.baidu.com', 'http://www.baidu.com', '1482586656', 'cuiyufei');

-- ----------------------------
-- Table structure for monitor_user
-- ----------------------------
DROP TABLE IF EXISTS `monitor_user`;
CREATE TABLE `monitor_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//用户id',
  `user_name` varchar(50) DEFAULT '' COMMENT '//用户名',
  `user_password` varchar(255) DEFAULT '' COMMENT '//用户密码',
  `user_authority` int(10) DEFAULT '0' COMMENT '//用户权限 0为管理员，1为普通用户',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of monitor_user
-- ----------------------------
INSERT INTO `monitor_user` VALUES ('1', 'cuiyufei', 'eyJpdiI6IkYxS2drQTRvUmVra1wvK2o0anVDWGVBPT0iLCJ2YWx1ZSI6ImZnek5DOTB1OFV5UW1zYXdRaCtmeGc9PSIsIm1hYyI6IjU4MGNlNTQ4ZDRiMjgwMDU0NzRjMjVkZDViOTQ1NjhmNWRhYzk5OTI1YjRmODhhZjVmYzA3NGJhMDVmOTViNWMifQ==', '0');
INSERT INTO `monitor_user` VALUES ('2', 'xxd', 'eyJpdiI6IkYxS2drQTRvUmVra1wvK2o0anVDWGVBPT0iLCJ2YWx1ZSI6ImZnek5DOTB1OFV5UW1zYXdRaCtmeGc9PSIsIm1hYyI6IjU4MGNlNTQ4ZDRiMjgwMDU0NzRjMjVkZDViOTQ1NjhmNWRhYzk5OTI1YjRmODhhZjVmYzA3NGJhMDVmOTViNWMifQ==', '1');
INSERT INTO `monitor_user` VALUES ('3', 'wgc', 'eyJpdiI6IkgxUDVPSmNjT3J1eitpR0F1U2o4ZkE9PSIsInZhbHVlIjoiNXhYb1FZVnRoRnVlQkljbVBTK2FNQT09IiwibWFjIjoiZjcyMzIzYmExYzAzNTA1MDc4YjE4ZjEzY2Y5ZDJhZDExOGY2ZDhhNDFiMzA1NGM4Nzk3MGRhNWE5Y2I1NGIxOSJ9', '1');
INSERT INTO `monitor_user` VALUES ('4', 'zxq', 'eyJpdiI6IjhpclVvcVZtbld2UEVwTjhVckJqMmc9PSIsInZhbHVlIjoiR1wvZmpOSjllRUJxN0lCMnNUalJrQ1E9PSIsIm1hYyI6ImU2NjkxYTI3NzAzNTQ1NGVhMmM5YjI5NWNhYjliZWM4NWNmODE5MTgyYWNiOTYwMDczMWJlYmE3OThmNWJkNDIifQ==', '1');
INSERT INTO `monitor_user` VALUES ('5', 'wwj', 'eyJpdiI6IkhOUzhrbXJ5RHhxNURZWmM3bWJzbVE9PSIsInZhbHVlIjoic3UzdmxUVjJjNXN2RVR3ZE9DMVVjdz09IiwibWFjIjoiZDhjMTRjYWMzZGJlNWIwOWIxOWJhMjgwOGM3ZDE2Y2U5MjE0NGFlMmNhMjJjOWNhMjI0YjQ4MmVmMjk4YmU1NiJ9', '1');

-- ----------------------------
-- Table structure for monitor_userpicture
-- ----------------------------
DROP TABLE IF EXISTS `monitor_userpicture`;
CREATE TABLE `monitor_userpicture` (
  `api_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//接口的id',
  `api_name` varchar(50) DEFAULT '' COMMENT '//接口的名字',
  `api_description` varchar(255) DEFAULT '' COMMENT '//接口的描述',
  `api_url` varchar(255) DEFAULT '' COMMENT '//接口的url',
  `api_wiki` varchar(255) DEFAULT '' COMMENT '//接口的wiki地址',
  `api_redmine` varchar(255) DEFAULT '' COMMENT '//接口的redmine地址',
  `api_time` int(11) DEFAULT '0' COMMENT '//创建的时间',
  `api_editor` varchar(50) DEFAULT '' COMMENT '//接口作者',
  PRIMARY KEY (`api_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of monitor_userpicture
-- ----------------------------
INSERT INTO `monitor_userpicture` VALUES ('3', '用户喜好', '', 'http://192.168.0.220:8141/portrait/musichobbypaginate?module=language&offset=1&limit=10&product_line=music-android&start_month=201612&end_month=201612', 'http://www.baidu.com', 'http://www.baidu.com', '1482582592', 'chenbiao');
