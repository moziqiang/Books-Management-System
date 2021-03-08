/*
Navicat MySQL Data Transfer

Source Server         : MyLocalhostDatabase
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : book_management

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-01-17 16:23:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for book_admin
-- ----------------------------
DROP TABLE IF EXISTS `book_admin`;
CREATE TABLE `book_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_admin
-- ----------------------------
INSERT INTO `book_admin` VALUES ('1', 'root', '1234567');

-- ----------------------------
-- Table structure for book_borrow
-- ----------------------------
DROP TABLE IF EXISTS `book_borrow`;
CREATE TABLE `book_borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `btime` datetime DEFAULT NULL,
  `rtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_borrow
-- ----------------------------
INSERT INTO `book_borrow` VALUES ('1', '1', '1', '2021-01-08 00:00:02', '2021-01-17 15:40:31');
INSERT INTO `book_borrow` VALUES ('2', '1', '3', '2021-01-09 22:00:00', '2021-01-17 15:51:03');
INSERT INTO `book_borrow` VALUES ('3', '1', '5', '2021-01-09 21:00:00', null);
INSERT INTO `book_borrow` VALUES ('8', '2', '2', '2021-01-14 21:08:15', '2021-01-17 15:40:59');
INSERT INTO `book_borrow` VALUES ('9', '4', '20', '2021-01-14 21:32:47', null);
INSERT INTO `book_borrow` VALUES ('10', '1', '1', '2021-01-17 15:38:11', '2021-01-17 15:40:31');
INSERT INTO `book_borrow` VALUES ('11', '1', '4', '2021-01-17 16:05:34', null);
INSERT INTO `book_borrow` VALUES ('12', '1', '19', '2021-01-17 16:07:19', null);
INSERT INTO `book_borrow` VALUES ('13', '2', '1', '2021-01-17 16:21:48', null);
INSERT INTO `book_borrow` VALUES ('14', '2', '6', '2021-01-17 16:22:07', null);

-- ----------------------------
-- Table structure for book_cate
-- ----------------------------
DROP TABLE IF EXISTS `book_cate`;
CREATE TABLE `book_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_cate
-- ----------------------------
INSERT INTO `book_cate` VALUES ('1', '国外文学');
INSERT INTO `book_cate` VALUES ('2', '小说');
INSERT INTO `book_cate` VALUES ('3', '历史');
INSERT INTO `book_cate` VALUES ('4', '经典');
INSERT INTO `book_cate` VALUES ('5', '文学');
INSERT INTO `book_cate` VALUES ('6', '散文');
INSERT INTO `book_cate` VALUES ('47', '科幻');
INSERT INTO `book_cate` VALUES ('48', '杂志');
INSERT INTO `book_cate` VALUES ('55', '测试分类');
INSERT INTO `book_cate` VALUES ('67', '武侠');

-- ----------------------------
-- Table structure for book_info
-- ----------------------------
DROP TABLE IF EXISTS `book_info`;
CREATE TABLE `book_info` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL DEFAULT '',
  `book_Introduction` varchar(255) DEFAULT NULL,
  `book_price` decimal(10,2) DEFAULT NULL,
  `book_code` varchar(100) DEFAULT '',
  `book_chuban` varchar(255) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `book_status` int(11) DEFAULT 0,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_info
-- ----------------------------
INSERT INTO `book_info` VALUES ('1', '活着', '《活着(新版)》讲述了农村人福贵悲惨的人生遭遇。福贵本是个阔少爷，可他嗜赌如命，终于赌光了家业，一贫如洗。他的父亲被他活活气死，母亲则在穷困中患了重病，福贵...', '20.00', '10001', '作家出版社', '余华', '1');
INSERT INTO `book_info` VALUES ('2', '夜晚的潜水艇', '仿佛鸟栖树，鱼潜渊，一切稳妥又安宁，夜晚这才真正地降临。 《夜晚的潜水艇》是作家陈春成的首部短篇小说集。九个故事，笔锋游走于旧山河与未知宇宙间，以瑰奇飘扬的...', '52.00', '10002', '上海三联书店', '陈春成', '0');
INSERT INTO `book_info` VALUES ('3', '红楼梦', '《红楼梦》是一部百科全书式的长篇小说。以宝黛爱情悲剧为主线，以四大家族的荣辱兴衰为背景，描绘出18世纪中国封建社会的方方面面，以及封建专制下新兴资本主义民主思想的萌动。结构宏大、情节委婉、细节精致，人物形象栩栩如生，声口毕现，堪称中国古代小说中的经 典。', '42.00', '10021', '人民文学出版社', '[清] 曹雪芹 著 / 高鹗 续', '0');
INSERT INTO `book_info` VALUES ('4', '小王子', '小王子是一个超凡脱俗的仙童，他住在一颗只比他大一丁点儿的小行星上。陪伴他的是一朵他非常喜爱的小玫瑰花。但玫瑰花的虚荣心伤害了小王子对她的感情。小王子告别小行...\r\n\r\n', '22.00', '19231', '人民文学出版社', '[法] 圣埃克苏佩里', '1');
INSERT INTO `book_info` VALUES ('5', '追风筝的人', '12岁的阿富汗富家少爷阿米尔与仆人哈桑情同手足。然而，在一场风筝比赛后，发生了一件悲惨不堪的事，阿米尔为自己的懦弱感到自责和痛苦，逼走了哈桑，不久，自己也跟...', '29.00', '10372', '上海人民出版社', '卡勒德·胡赛尼', '1');
INSERT INTO `book_info` VALUES ('6', '呐喊', '《呐喊》是鲁迅1918-1922年所作的短篇小说的结集，收有《狂人日记》、《孔乙己》、《药》、《明天》、《一件小事》、《头发的故事》等14篇作品。当时正值五...', '36.00', '10238', '人民文学出版社', '鲁迅', '1');
INSERT INTO `book_info` VALUES ('19', '天龙八部', '天龙八部乃金笔下的一部长篇小说，与《射雕》，《神雕》等 几部长篇小说一起被称为可读性最高的金庸小说。《天龙》的故事情节曲折，内容丰富，也曾多次被改编为电视作...', '92.00', '12523', '新知三联书店', '金庸', '1');
INSERT INTO `book_info` VALUES ('20', '我们仨', '《我们仨》是钱钟书夫人杨绛撰写的家庭生活回忆录。1998年，钱钟书逝世，而他和杨绛唯一的女儿钱瑗已于此前（1997年）先他们而去。在人生的伴侣离去四年后，杨...', '25.00', '12423', '新知三联书店', '杨绛', '1');

-- ----------------------------
-- Table structure for book_info_cate
-- ----------------------------
DROP TABLE IF EXISTS `book_info_cate`;
CREATE TABLE `book_info_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_info_cate
-- ----------------------------
INSERT INTO `book_info_cate` VALUES ('88', '2', '2');
INSERT INTO `book_info_cate` VALUES ('89', '2', '5');
INSERT INTO `book_info_cate` VALUES ('90', '2', '6');
INSERT INTO `book_info_cate` VALUES ('91', '1', '2');
INSERT INTO `book_info_cate` VALUES ('92', '1', '4');
INSERT INTO `book_info_cate` VALUES ('93', '1', '5');
INSERT INTO `book_info_cate` VALUES ('101', '5', '1');
INSERT INTO `book_info_cate` VALUES ('102', '5', '2');
INSERT INTO `book_info_cate` VALUES ('103', '5', '5');
INSERT INTO `book_info_cate` VALUES ('104', '6', '4');
INSERT INTO `book_info_cate` VALUES ('105', '6', '6');
INSERT INTO `book_info_cate` VALUES ('106', '3', '3');
INSERT INTO `book_info_cate` VALUES ('107', '3', '4');
INSERT INTO `book_info_cate` VALUES ('108', '3', '5');
INSERT INTO `book_info_cate` VALUES ('109', '4', '1');
INSERT INTO `book_info_cate` VALUES ('110', '4', '2');
INSERT INTO `book_info_cate` VALUES ('111', '4', '4');
INSERT INTO `book_info_cate` VALUES ('112', '4', '5');
INSERT INTO `book_info_cate` VALUES ('113', '4', '6');
INSERT INTO `book_info_cate` VALUES ('114', '4', '56');
INSERT INTO `book_info_cate` VALUES ('117', '19', '2');
INSERT INTO `book_info_cate` VALUES ('118', '19', '4');
INSERT INTO `book_info_cate` VALUES ('119', '19', '67');
INSERT INTO `book_info_cate` VALUES ('122', '20', '2');
INSERT INTO `book_info_cate` VALUES ('123', '20', '4');
INSERT INTO `book_info_cate` VALUES ('124', '20', '6');

-- ----------------------------
-- Table structure for book_user
-- ----------------------------
DROP TABLE IF EXISTS `book_user`;
CREATE TABLE `book_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL DEFAULT '123456',
  `student_p` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `ustatus` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_user
-- ----------------------------
INSERT INTO `book_user` VALUES ('1', '张三', '123456', '计算机系', 'PHP1班', '大一', '男', '0');
INSERT INTO `book_user` VALUES ('2', '李四', '123456', '计算机系', 'PHP2班', '大一', '男', '0');
INSERT INTO `book_user` VALUES ('3', '小敏', '123456', '计算机系', 'APP2班', '大二', '女', '0');
INSERT INTO `book_user` VALUES ('4', 'john', '654321', '计算机系', '大数据1班', '大二', '男', '0');
INSERT INTO `book_user` VALUES ('5', 'mike', '123456', '机电系', '物联网1班', '大二', '男', '0');
INSERT INTO `book_user` VALUES ('6', '小敏', '123456', '经济系', '会计1班', '大一', '女', '0');
