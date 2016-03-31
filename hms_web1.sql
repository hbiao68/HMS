-- MySQL dump 10.13  Distrib 5.5.32, for Win32 (x86)
--
-- Host: localhost    Database: hms_web1
-- ------------------------------------------------------
-- Server version	5.5.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hms_ad_info`
--

DROP TABLE IF EXISTS `hms_ad_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_ad_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '广告名称',
  `l_id` int(11) DEFAULT NULL COMMENT '广告位ID',
  `url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `click` bigint(20) DEFAULT '0' COMMENT '点击量',
  `is_show` smallint(6) DEFAULT NULL COMMENT '是否显示：1、显示 2、不显示',
  `type` smallint(6) DEFAULT NULL COMMENT '广告类型：1、图片广告；2、轮播广告；3、文字广告',
  `begin_time` bigint(20) DEFAULT NULL COMMENT '开始显示时间',
  `end_time` int(11) DEFAULT NULL COMMENT '结束显示时间',
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `sort` smallint(6) DEFAULT NULL COMMENT '排序',
  `img` varchar(255) DEFAULT NULL COMMENT '图片',
  `flag` smallint(6) DEFAULT '1' COMMENT ' 状态： 1、正常 2、删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_ad_info`
--

LOCK TABLES `hms_ad_info` WRITE;
/*!40000 ALTER TABLE `hms_ad_info` DISABLE KEYS */;
INSERT INTO `hms_ad_info` VALUES (1,'首页轮播一',1,'http://www.hms_web1.com',NULL,1,0,1457366400,NULL,1457447311,1,'/Uploads/2016-03-08/56dee18f962cc.jpg',1),(2,'首页轮播二',1,'http://www.hms_web12.com',NULL,1,0,1457280000,1483113600,1457447367,2,'/Uploads/2016-03-08/56dee1ade862b.jpg',1),(3,'首页轮播三',1,'http://www.hms_web1.com',0,1,0,1457366400,NULL,1457447404,3,'/Uploads/2016-03-08/56dee1ec05f52.jpg',1),(4,'关于我们横幅广告',2,'',0,1,0,1457452800,NULL,1457525327,4,'/Uploads/2016-03-09/56e0124f4cff8.jpg',1),(5,'新闻横幅广告',3,'',0,1,0,1457452800,NULL,1457526903,5,'/Uploads/2016-03-09/56e01877cafe4.jpg',1),(6,'案例横幅广告',4,'',0,1,0,1457452800,NULL,1457535152,6,'/Uploads/2016-03-09/56e038b036039.jpg',1),(7,'联系我们横幅广告',5,'',0,1,0,1457539200,NULL,1457614087,7,'/Uploads/2016-03-10/56e16d07068a3.jpg',1);
/*!40000 ALTER TABLE `hms_ad_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_ad_location_info`
--

DROP TABLE IF EXISTS `hms_ad_location_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_ad_location_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '广告位名称',
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `height` smallint(6) DEFAULT NULL COMMENT '广告高度',
  `width` smallint(6) DEFAULT NULL COMMENT '广告宽度',
  `flag` smallint(6) DEFAULT '1' COMMENT '是否可用 1、可用 2、不可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_ad_location_info`
--

LOCK TABLES `hms_ad_location_info` WRITE;
/*!40000 ALTER TABLE `hms_ad_location_info` DISABLE KEYS */;
INSERT INTO `hms_ad_location_info` VALUES (1,'首页轮播',1457434367,0,0,1),(2,'关于我们横幅广告位',1457436489,0,0,1),(3,'新闻横幅广告位',1457526857,0,0,1),(4,'案例横幅广告',1457535059,NULL,NULL,1),(5,'联系我们横幅广告位',1457614046,NULL,NULL,1);
/*!40000 ALTER TABLE `hms_ad_location_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_admin_user_info`
--

DROP TABLE IF EXISTS `hms_admin_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_admin_user_info` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `nickname` varchar(50) NOT NULL COMMENT '昵称/姓名',
  `password` char(32) NOT NULL COMMENT '密码',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(40) NOT NULL COMMENT '上次登录IP',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '余额',
  `point` tinyint(8) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `vip` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT 'vip等级',
  `overduedate` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'vip到期时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态 1：可用，2：不可用',
  `info` text NOT NULL COMMENT '信息',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_admin_user_info`
--

LOCK TABLES `hms_admin_user_info` WRITE;
/*!40000 ALTER TABLE `hms_admin_user_info` DISABLE KEYS */;
INSERT INTO `hms_admin_user_info` VALUES (1,'admin','超级管理员','0192023a7bbd73250516f069df18b500',1457622933,'127.0.0.1','305167951@qq.com','这里是备注',0.00,0,0,0,1443594693,1444457859,1,''),(2,'huangzhen','huangzhen','e10adc3949ba59abbe56e057f20f883e',1452826103,'175.8.107.194','305167951@qq.com','哈哈哈哈哈哈哈哈哈哈2',0.00,0,0,0,1443594693,1452826080,1,'');
/*!40000 ALTER TABLE `hms_admin_user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_auth_group_access`
--

DROP TABLE IF EXISTS `hms_auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_auth_group_access`
--

LOCK TABLES `hms_auth_group_access` WRITE;
/*!40000 ALTER TABLE `hms_auth_group_access` DISABLE KEYS */;
INSERT INTO `hms_auth_group_access` VALUES (1,1),(2,3);
/*!40000 ALTER TABLE `hms_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_auth_group_info`
--

DROP TABLE IF EXISTS `hms_auth_group_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_auth_group_info` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL COMMENT '用户组标题',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '用户组状态：1、正常；2、关闭',
  `rules` text NOT NULL COMMENT '用户权限',
  `sort` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_auth_group_info`
--

LOCK TABLES `hms_auth_group_info` WRITE;
/*!40000 ALTER TABLE `hms_auth_group_info` DISABLE KEYS */;
INSERT INTO `hms_auth_group_info` VALUES (1,'超级管理组',1,'2,3,4,6,7,8,9,10,11,12',1,1448719879),(2,'超级管理组1eqwreqwr',2,'1,41,42,4,61,45,46,47,48,49,52,51,50,29,32,31,30,33,36,35,34,5,62,38,37,40,39,2,6,57,60,59,58,25,26,27,28,7,13,14,15,16,17,20,3,11,12,9,10',1,1448719879),(3,'超级管理组2',1,'1,41,42,4,61,45,46,47,48,49,52,51,50,29,32,31,30,33,36,35,34,5,62,38,37,40,39,2,6,57,60,59,58,25,26,27,28,7,13,14,15,16,17,20,3,11,12,9,10',1,1448719879),(4,'超级管理组3',1,'1,41,42,4,61,45,46,47,48,49,52,51,50,29,32,31,30,33,36,35,34,5,62,38,37,40,39,2,6,57,60,59,58,25,26,27,28,7,13,14,15,16,17,20,3,11,12,9,10',1,1448719879),(5,'超级管理组4',1,'1,41,42,4,61,45,46,47,48,49,52,51,50,29,32,31,30,33,36,35,34,5,62,38,37,40,39,2,6,57,60,59,58,25,26,27,28,7,13,14,15,16,17,20,3,11,12,9,10,8',1,1448719879),(6,'adsfasdfa',1,'',1,0),(7,'bbbbb',1,'',1,1449042380);
/*!40000 ALTER TABLE `hms_auth_group_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_auth_rule`
--

DROP TABLE IF EXISTS `hms_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `url` varchar(200) DEFAULT '' COMMENT 'url',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '功能名称',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否在菜单栏显示：1、显示；2、不显示',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：1、开放；2、关闭',
  `mark` varchar(255) DEFAULT NULL COMMENT '标示，用于导航条选中高亮',
  `sort` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_auth_rule`
--

LOCK TABLES `hms_auth_rule` WRITE;
/*!40000 ALTER TABLE `hms_auth_rule` DISABLE KEYS */;
INSERT INTO `hms_auth_rule` VALUES (1,0,'','系统管理','fa-laptop',1,1,'system',1,1449204161),(2,1,'AuthRule/index','系统功能管理','',1,1,'system',1,1449204212),(3,1,'AuthRule/add','添加系统功能',NULL,2,1,'system',2,1449204258),(4,1,'AuthRule/edit','修改系统功能',NULL,2,1,'system',3,1449204337),(5,0,'','后台用户管理','fa-user',1,1,'adminUser',2,1449204356),(6,5,'AuthGroup/index','用户组管理',NULL,1,1,'adminUser',1,1449204380),(7,5,'AuthGroup/add','添加用户组','',2,1,'adminUser',2,1449204409),(8,5,'AuthGroup/edit','修改用户组',NULL,2,1,'adminUser',3,1449204443),(9,5,'AuthGroup/setRule','设置用户组权限',NULL,2,1,'adminUser',4,1449204480),(10,5,'AdminUser/index','用户管理',NULL,1,1,'adminUser',2,1449204639),(11,5,'AdminUser/add','添加后台用户',NULL,2,1,'adminUser',1,1449204698),(12,5,'AdminUser/edit','修改后台用户',NULL,2,1,'adminUser',3,1449204728),(13,0,'','新闻管理','fa-book',1,1,'news',3,1456195811),(14,13,'News/catList','新闻分类管理','',1,1,'news',2,1456197698),(15,13,'News/index','新闻列表','',1,1,'news',3,1456197891),(16,13,'News/trashList','新闻回收站','',1,1,'news',4,1456283923),(17,0,'','案例管理','fa-stack-exchange',1,1,'case',4,1456295088),(18,17,'Case/catList','案例分类管理','',1,1,'case',2,1456197698),(19,17,'Case/index','案例列表','',1,1,'case',3,1456197891),(20,0,'','单页管理','fa-pagelines',1,1,'page',5,1456298609),(21,20,'Page/catList','单页分类管理','',1,1,'page',2,1456450057),(22,20,'Page/index','单页列表','',1,1,'page',3,1456450094),(23,1,'MenuWeb/index','导航管理','',1,1,'system',4,1457364963),(24,0,'','广告管理','fa-volume-up',1,1,'advertisement',6,1457402279),(25,24,'Advertisement/ad_location','广告位管理','',1,1,'advertisement',2,1457402519),(26,24,'Advertisement/ad','广告列表','',1,1,'advertisement',3,1457433487),(27,1,'SystemInfo/index','系统设置','',1,1,'system',5,1457537300);
/*!40000 ALTER TABLE `hms_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_case`
--

DROP TABLE IF EXISTS `hms_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '分类id',
  `name` varchar(255) NOT NULL COMMENT '案例标题',
  `img` varchar(255) DEFAULT NULL COMMENT '案例图片',
  `content` text COMMENT '案例内容',
  `author` varchar(255) DEFAULT NULL COMMENT '发布作者',
  `click` int(11) DEFAULT NULL COMMENT '点击量',
  `url` varchar(255) DEFAULT NULL COMMENT '案例链接',
  `createtime` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_case`
--

LOCK TABLES `hms_case` WRITE;
/*!40000 ALTER TABLE `hms_case` DISABLE KEYS */;
INSERT INTO `hms_case` VALUES (1,2,'还让他也特意太容易也让他','/Uploads/2016-02-24/56cd54caaa619.jpg','<p>会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人</p>\r\n\r\n<p><img alt=\"\" src=\"/Uploads/2016-02-24/56cd54c34fb3b.jpg\" style=\"width: 200px; height: 150px;\" /></p>\r\n\r\n<p>会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人会跳舞也让他让他梵蒂冈烦得很发的秩序梵蒂冈发和挂号费的蝴蝶飞过vcxbcfgsdfg稍等是大概士大夫如委托人</p>\r\n','admin',NULL,'http://www.baidu.com',1456297162),(2,2,'平面视觉设计','/Uploads/2016-03-08/56dee8e3911f0.jpg','<p>【环球网综合】十二届全国人大四次会议新闻中心于今日15时在梅地亚中心多功能厅举行记者会，由国家卫生和计划生育委员会主任李斌、副主任马晓伟和副主任王培安就&ldquo;实施全面两孩政策&rdquo;的相关问题回答中外记者的提问。</p>\r\n\r\n<p>　　记者：我有两个问题想问一下李斌主任。第一个问题，全面两孩政策实施之后，社会抚养费的去留和如何征收备受关注，<strong>请问这个社会抚养费未来会不会统一标准或者下调？</strong>第二个问题，&ldquo;十三五&rdquo;会对港资医院释放什么样的政策红利，您认为港资医院在补充公立医院医疗方面发挥了怎样的作用？谢谢。 　　</p>\r\n\r\n<p>　　王培安：谢谢你的提问，我来回答第一个问题。大家都知道，全面两孩政策前面有个前提，就是计划生育国策要继续坚持，<strong>继续坚持计划生育基本国策就要继续实行社会抚养费的征收。</strong>根 据新修订的《人口与计划生育法》，实施全面两孩政策后，社会抚养费作为限制政策外生育的制度仍需继续坚持。对于全面两孩政策实施前，也就是2016年元月 1日之前，违反法律法规规定生育第二个子女的，已经依法处理完成的，应当维持处理的决定，尚未处理或者处理不到位的，由各省市自治区结合实际，依法依规， 妥善处理。 　　</p>\r\n\r\n<div class=\"ad250x250 fLeft marRig10\" id=\"adPp\">\r\n<div id=\"BAIDU_SSP__wrapper_1028976_0\">&nbsp;</div>\r\n\r\n<div id=\"BAIDU_UNION__wrapper_u2245484_0\">&nbsp;</div>\r\n</div>\r\n\r\n<p>　　王培安：2014年11月，国务院法制办向社会公开征求了意见，拟将《社会抚养费征收管理办法》改为《社会抚养费征收管理条例》，拟修订《办 法》中的部分条款。鉴于全面两孩政策实施以后，情形发生了较大的变化，根据变化的情况，还需要进行研究评估。据了解，已经修订的地方人口与计划生育条例的 省份根据国家法律法规的规定，结合本地的实际，对社会抚养费的征收管理制度做出了一些修改完善。 　　</p>\r\n\r\n<div class=\"spTopic\">&nbsp;</div>\r\n','admin',NULL,'http://www.hms_web1.com',1457449187);
/*!40000 ALTER TABLE `hms_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_case_cat`
--

DROP TABLE IF EXISTS `hms_case_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_case_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `name` varchar(255) NOT NULL COMMENT '新闻分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_case_cat`
--

LOCK TABLES `hms_case_cat` WRITE;
/*!40000 ALTER TABLE `hms_case_cat` DISABLE KEYS */;
INSERT INTO `hms_case_cat` VALUES (1,0,'嘎达发生过的阿斯顿去'),(2,1,'也让他也突然');
/*!40000 ALTER TABLE `hms_case_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_menu_web`
--

DROP TABLE IF EXISTS `hms_menu_web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_menu_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL COMMENT '导航位置：1、顶部；2、底部',
  `name` varchar(255) DEFAULT NULL COMMENT '导航标题',
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  `status` int(2) DEFAULT '1' COMMENT '状态：1、可用；2、不可用',
  `sort` int(2) DEFAULT NULL COMMENT '排序',
  `createtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_menu_web`
--

LOCK TABLES `hms_menu_web` WRITE;
/*!40000 ALTER TABLE `hms_menu_web` DISABLE KEYS */;
INSERT INTO `hms_menu_web` VALUES (1,1,'首页','/',1,1,1457366148),(2,1,'关于我们','/Web/About/index.html',1,2,1457447040),(3,1,'新闻','/Web/News/index.html',1,3,1457447071),(4,1,'案例','/Web/Case/index.html',1,4,1457447085),(5,1,'联系我们','/Web/Contact/index.html',1,5,1457447097);
/*!40000 ALTER TABLE `hms_menu_web` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_news`
--

DROP TABLE IF EXISTS `hms_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '分类id',
  `name` varchar(255) NOT NULL COMMENT '新闻标题',
  `img` varchar(255) DEFAULT NULL COMMENT '新闻图片',
  `content` text COMMENT '新闻内容',
  `author` varchar(255) DEFAULT NULL COMMENT '发布作者',
  `click` int(11) DEFAULT NULL COMMENT '点击量',
  `status` int(1) DEFAULT '1' COMMENT '状态：1、正常；2、回收站',
  `createtime` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_news`
--

LOCK TABLES `hms_news` WRITE;
/*!40000 ALTER TABLE `hms_news` DISABLE KEYS */;
INSERT INTO `hms_news` VALUES (1,0,'新闻分类1',NULL,NULL,NULL,NULL,2,NULL),(2,3,'个符号对方花粉管贪玩儿提问','/Uploads/2016-02-24/56cd1840220da.jpg','&lt;p&gt;管是地方官是大概而且无日期为好人土土&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/Uploads/2016-02-24/56cd182de26d0.jpg&quot; style=&quot;width: 1024px; height: 768px;&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width: 500px;&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;法师打发沙发&lt;/td&gt;\r\n			&lt;td&gt;下次vxvz&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n','admin',NULL,2,NULL),(3,1,'让他热台湾儿童1','/Uploads/2016-02-24/56cd284dc5a45.jpg','<p><img alt=\"\" src=\"/Uploads/2016-02-24/56cd297da1d89.jpg\" style=\"width: 200px; height: 150px;\" /></p>\r\n\r\n<p>她到公司工作快三年了，比她后来的同事陆续得到了升职的机会，她却原地不动，心里颇不是滋味。</p>\r\n\r\n<p>　　终于有一天，她冒着被解聘的危险，找到老板理论。&ldquo;老板，我有过迟到，早退或乱章违纪的现象吗？&rdquo;。老板干脆地回答&ldquo;没有&rdquo;。</p>\r\n\r\n<p>　　&ldquo;那是公司对我有偏见吗？&rdquo;老板先是一怔，继而说&ldquo;当然没有。&rdquo;</p>\r\n\r\n<p>　　&ldquo;为什么比我资历浅的人都可以得到重用，而我却一直在微不足道的岗位上？&rdquo;</p>\r\n\r\n<p>　　老板沉思了两秒，然后笑笑说：&ldquo;你的事咱们等会再说，我手头上有个急事，要不你先帮我处理一下？&rdquo;</p>\r\n\r\n<p>　　&ldquo;一家客户准备到公司来考察产品状况，你联系一下他们，问问何时过来。&rdquo;老板说。</p>\r\n\r\n<p>　　&ldquo;这真是个重要的任务。&rdquo;临出门前，老板补充了一句。</p>\r\n\r\n<p>　　一刻钟后，她回到老板办公室。</p>\r\n\r\n<p>　　&ldquo;联系到了吗？&rdquo;老板问。</p>\r\n\r\n<p>　　&ldquo;联系到了，他们说可能下周过来。&rdquo;</p>\r\n\r\n<p>　　&ldquo;具体是下周几？&rdquo;老板问。</p>\r\n\r\n<p>　　&ldquo;这个我没细问。&rdquo;</p>\r\n\r\n<p>　　&ldquo;他们一行多少人。&rdquo;</p>\r\n\r\n<p>　　&ldquo;啊！您没问我这个啊！&rdquo;</p>\r\n\r\n<p>　　&ldquo;那他们是坐火车还是飞机？&rdquo;</p>\r\n\r\n<p>　　&ldquo;这个您也没叫我问呀！&rdquo;</p>\r\n\r\n<p>　　老板不再说什么了，他打电话叫张怡过来。张怡比她晚到公司一年，现在已是一个部门的负责人了，张怡接到了与她刚才相同的任务。一会儿工功夫，张怡回来了。</p>\r\n\r\n<p>　　&ldquo;是这样的&hellip;&hellip;&rdquo;张怡答道：&ldquo;他们是乘下周五下午3点的飞机，大约晚上6点钟到，他们一行5人，由采购部王经理带队，我跟他们说了，我公司会派人到机场迎接。&rdquo;</p>\r\n\r\n<p>　　&ldquo;另外，他们计划考察两天时间，具体行程到了以后双方再商榷。为了方便工作，我建议把他们安置在附近的国际酒店，如果您同意，房间明天我就提前预订。&rdquo;</p>\r\n\r\n<p>　　&ldquo;还有，下周天气预报有雨，我会随时和他们保持联系，一旦情况有变，我将随时向您汇报。&rdquo;</p>\r\n\r\n<p>　　张怡出去后，老板拍了她一下说：&ldquo;现在我们来谈谈你提的问题。&rdquo;</p>\r\n\r\n<p>　　&ldquo;不用了，我已经知道原因，打搅您了。&rdquo;</p>\r\n\r\n<p>　　她突然间明白，没有谁生来就能担当大任，都是从简单、平凡的小事做起，今天你为自己贴上什么样的标签，或许就决定了明天你是否会被委以重任。</p>\r\n\r\n<p>　　操心的程度直接影响到办事的效率，任何一个公司都迫切需要那些工作积极主动负责的员工。</p>\r\n\r\n<p>　　优秀的员工往往不是被动地等待别人安排工作，而是主动去了解自己应该做什么，然后全力以赴地去完成。</p>\r\n\r\n<p>　　希望看完这个故事有更多的朋友成为优秀员工！</p>\r\n\r\n<p>&nbsp;－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－</p>\r\n\r\n<p>　　Ps：和优秀的人共事很简单！告诉他要做什么事，要什么效果，他就会想办法搞定，因为不讲条件。经过无数次的积累，他本人就成了最大的&ldquo;条件&rdquo;，缺了 他，这事别人搞不定。所以，越是出色的人越善于在缺乏条件的状态下把事情做到最好，越是平庸的人越是对做事的条件挑三拣四。&mdash;&mdash;乔布斯</p>\r\n','admin',NULL,1,1456281865);
/*!40000 ALTER TABLE `hms_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_news_cat`
--

DROP TABLE IF EXISTS `hms_news_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_news_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `name` varchar(255) NOT NULL COMMENT '新闻分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_news_cat`
--

LOCK TABLES `hms_news_cat` WRITE;
/*!40000 ALTER TABLE `hms_news_cat` DISABLE KEYS */;
INSERT INTO `hms_news_cat` VALUES (1,0,'旗人旗貌'),(2,0,'旗闻旗事'),(3,0,'旗言旗语');
/*!40000 ALTER TABLE `hms_news_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_page`
--

DROP TABLE IF EXISTS `hms_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '分类id',
  `name` varchar(255) NOT NULL COMMENT '标题',
  `introduction` varchar(255) DEFAULT NULL COMMENT '简介',
  `content` text COMMENT '内容',
  `createtime` int(11) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_page`
--

LOCK TABLES `hms_page` WRITE;
/*!40000 ALTER TABLE `hms_page` DISABLE KEYS */;
INSERT INTO `hms_page` VALUES (2,1,'关于我们','公司定位于做可执行的创意·做有创意的执行，以资深的专业实力、创新的执行策略，为客户提供全天候、高质量、快速度的一流服务。公司成立以来，已与50多家一线品牌建立起了良好的战略合作关系。','<div class=\"main_l_3\">\r\n<div class=\"title\"><img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_03.jpg\" />\r\n<div>公司发展大事记</div>\r\n</div>\r\n\r\n<div class=\"about_l\">\r\n<div>\r\n<h3>大旗深信，变是永恒的不变！<br />\r\n11年来多次的改革创新，使企业跃上新的发展平台！</h3>\r\n\r\n<div class=\"clear\">&nbsp;</div>\r\n\r\n<ul>\r\n	<li><span>2005年</span>\r\n\r\n	<p>大旗成立，凭借自主研发的专利技术（实物广告模型转动装置ZL200320113876.4）与酒鬼酒合作开发出酒鬼背酒鬼动感模型，一经发布便受到众多媒体竞相报道。</p>\r\n	</li>\r\n	<li><span>2006年</span>\r\n	<p>大旗涉足快消品行业，为康师傅、金龙鱼、王老吉等知名品牌策划并执行了上百场大中小型路演以及终端宣传推广。</p>\r\n	</li>\r\n	<li><span>2007年</span>\r\n	<p>大旗相继与蒙牛乳业、光明乳业、青岛啤酒、浏阳河酒业、可口可乐、娃哈哈、芝林大药房、诺基亚等品牌签约合作。</p>\r\n	</li>\r\n	<li><span>2008年</span>\r\n	<p>大旗与酒鬼酒深入合作，开发制作了一系列终端促销品。同时，为各大快消品牌策划执行奥运主题活动数十场。借助快消品一线服务经验，为湖南本土的湘丽金银花凉茶做了一系列策划案。</p>\r\n	</li>\r\n	<li><span>2009年</span>\r\n	<p>大旗涉足房地产新领域，为恒大地产长沙各楼盘提供开盘解筹与物料制作服务，由此拉开了大旗在房地产行业的新篇章。同年，为康师傅、银鹭、可口可乐、青岛啤酒等客户在长沙步行街策划路演活动数十场。</p>\r\n	</li>\r\n	<li><span>2011年</span>\r\n	<p>大旗已陆续为恒大、时代、富基、佳兆业、碧桂园、双瑞等众多一线地产商的50余项目提供园区包装与物料制作，策划执行奠基、开盘、解筹、路演、暖场活动百余场，成为湖南地区开盘解筹专业户。</p>\r\n	</li>\r\n	<li><span>2011年</span>\r\n	<p>大旗签约钧鼎康乐美品牌策划项目，从产品的命名定位、包装设计到媒体宣传、市场推广，展示了公司在品牌策划领域的实力。年底，为可口可乐、哈尔滨啤酒、银鹭等品牌创作发布的长沙步行街地标成为快消行业商圈布件的经典之作。</p>\r\n	</li>\r\n	<li><span>2012年</span>\r\n	<p>大旗签约加多宝凉茶，地毯式的活动宣传与广告制作共同掀起了湖湘一波接一波的红色浪潮。与酒鬼酒合作完成了一系列终端促销品、陈列、展示的创作。为学海集团导入全新视觉形象。同年成立大旗株洲分公司。</p>\r\n	</li>\r\n	<li><span>2013年</span>\r\n	<p>大旗乔迁新址，入驻高桥国际。万科、五矿、新城新世界签约大旗。年初组建全新发展平台&mdash;&mdash;长沙万谋广告有限公司，旨在为客户提供更加专业专注的服务，为员工提供更宽阔更具挑战的舞台。</p>\r\n	</li>\r\n	<li><span>2014年</span>\r\n	<p>大旗《基本法》的实施，让公司进一步朝着精细化管理与精品化工程迈进，两场大型音乐节的操盘，让大旗站在了又一崭新的行业高度。年末，湖南大旗婚庆礼仪有限公司注册成立，开启了大旗人在婚礼行业新的征程。</p>\r\n	</li>\r\n	<li><span>2015年</span>\r\n	<p>大旗一如继往地为国内众多一线品牌提供年度活动策划执行及物料制作供应服务；年初将旗下子品牌万谋广告重组为房地产整合推广机构，专业为地产开发商提供全方位智力支持。</p>\r\n	</li>\r\n	<li id=\"streak\"><span>2016年</span>\r\n	<p>大旗人携手并进，共创明日辉煌！</p>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"title\"><img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_03.jpg\" />\r\n<div>企业文化</div>\r\n</div>\r\n\r\n<div class=\"about_l_two\">\r\n<div>\r\n<h3>指导思想</h3>\r\n\r\n<div class=\"clear\">&nbsp;</div>\r\n\r\n<ul>\r\n	<li><span>大旗的使命</span>\r\n\r\n	<p>建立一个让所有大旗人实现梦想的平台</p>\r\n	</li>\r\n	<li><span>大旗的宗旨</span>\r\n	<p>做可执行的创意 &middot; 做有创意的执行</p>\r\n	</li>\r\n	<li><span>大旗的精神</span>\r\n	<p>务实 &middot; 创新 &middot; 敬业 &middot; 奉献</p>\r\n	</li>\r\n	<li><span>大旗的司训</span>\r\n	<p>相信自己是最优秀的；假设自己是错误的；没有永远的强者；暂时的落后并不意味着最后的失败；今天的成功是明天危机的开始</p>\r\n	</li>\r\n	<li id=\"streak\"><span>大旗座右铭</span>\r\n	<p>知耻后勇 &middot; 见贤思齐</p>\r\n	</li>\r\n</ul>\r\n\r\n<div class=\"clear\" style=\"height:30px;\">&nbsp;</div>\r\n\r\n<h3>大旗理念</h3>\r\n\r\n<div class=\"clear\">&nbsp;</div>\r\n\r\n<ul>\r\n	<li><span>核心价值观</span>\r\n\r\n	<p>为客户创造价值、为公司创造效益、为员工创造机会</p>\r\n	</li>\r\n	<li><span>大旗服务观</span>\r\n	<p>永远提供全天候、高质量、快速度的专业服务，客户满意是检验我们工作的唯一标准</p>\r\n	</li>\r\n	<li><span>大旗发展观</span>\r\n	<p>创新抗击传统，速度抗击规模</p>\r\n	</li>\r\n	<li><span>大旗团队观</span>\r\n	<p>群狼搏虎，无坚不摧</p>\r\n	</li>\r\n	<li><span>大旗学习观</span>\r\n	<p>终身学习，学则能，能则战，战则胜</p>\r\n	</li>\r\n	<li><span>大旗人才观</span>\r\n	<p>大旗没有打工者，所有大旗人都是公司的事业伙伴；员工的一小步，公司的一大步；帮助员工成长，从而使公司更快地成长</p>\r\n	</li>\r\n	<li id=\"streak\"><span>大旗经营观</span>\r\n	<p>坚守法律底线，构筑道德高度</p>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"title\"><img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_03.jpg\" />\r\n<div>团队风采</div>\r\n</div>\r\n\r\n<div class=\"about_l_three\">\r\n<div>\r\n<h3>资源整合，专业的事让专业的人做！</h3>\r\n\r\n<p>大旗广告，将为客户服务的各个环节细分，为每一个关键环节寻找专业资源，引入职业化管理、协作模式，进而输入大旗式经营理 念，进行行之有效的资源整合，从而驾驭着大旗战车，在中国广告行业纵横驰骋。大旗人秉承为社会创造财富、为客户创造价值的理念，为实现明天共同的伟大梦想 而忠诚敬业、拼搏付出。</p>\r\n<img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_47.jpg\" /></div>\r\n\r\n<div>\r\n<h3>大旗11年，我们风雨同行！</h3>\r\n\r\n<p>这是一群激情澎湃、注重实干、赋有创造力的职业广告人，创业进取的精神品格，朝气蓬勃的职业人格，独特经营的管理风格，因注重实干而坚实厚重，因永葆青春而激情无限，因创造力而活力充沛，因领悟快乐而不懈努力。</p>\r\n\r\n<p>峥嵘11载，围绕着大旗，始终有一种神秘的力量，它让人亦步亦趋、紧密追随！11年的理想坚持，凝聚了所有的力量；11年的携手共进，创造了崭新的未来；11年的努力拼搏，筑就了大旗的荣耀；11年，我们风雨同行，携手明日辉煌！</p>\r\n<img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_48.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"title\"><img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_03.jpg\" />\r\n<div>工作环境</div>\r\n</div>\r\n\r\n<div class=\"about_l_three\" style=\"margin-bottom:0px;\"><img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_49.jpg\" /> <img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_50.jpg\" /> <img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_51.jpg\" /> <img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_52.jpg\" /> <img src=\"http://adhao.hnjyhb.com.cn/imgaes/img_53.jpg\" /></div>\r\n</div>\r\n',1457525253),(3,1,'联系我们','','<div class=\"contact_us_nr\">\r\n<div class=\"mc\">长沙大旗广告有限公司</div>\r\n\r\n<p>地址：长沙大道278号高桥国际23F</p>\r\n\r\n<p>电话：0731-8512 1208</p>\r\n\r\n<p>传真：0731-8512 5799</p>\r\n\r\n<p>网址：www.adhao.com</p>\r\n<img src=\"http://www.hms_web1.com/Public/Static/Web/imgaes/img_06.jpg\" />\r\n<div><img src=\"http://www.hms_web1.com/Public/Static/Web/imgaes/img_42.jpg\" />\r\n<p style=\"margin-top:5px;\">扫描二维码关注大旗广告官方微信</p>\r\n</div>\r\n</div>\r\n',1457536325);
/*!40000 ALTER TABLE `hms_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_page_cat`
--

DROP TABLE IF EXISTS `hms_page_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_page_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '单页分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_page_cat`
--

LOCK TABLES `hms_page_cat` WRITE;
/*!40000 ALTER TABLE `hms_page_cat` DISABLE KEYS */;
INSERT INTO `hms_page_cat` VALUES (1,'系统单页');
/*!40000 ALTER TABLE `hms_page_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hms_system_info`
--

DROP TABLE IF EXISTS `hms_system_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hms_system_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `systemkey` varchar(255) DEFAULT NULL COMMENT 'key',
  `systemvalue` varchar(255) DEFAULT NULL COMMENT 'value',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hms_system_info`
--

LOCK TABLES `hms_system_info` WRITE;
/*!40000 ALTER TABLE `hms_system_info` DISABLE KEYS */;
INSERT INTO `hms_system_info` VALUES (21,'domain','http://www.hms_web1.com'),(22,'phone','0731-85121208'),(23,'qq','1027184272,958691895,742831577'),(24,'footer_content','<p>@ 2005-2016 长沙大旗广告有限公司. All Rights Reserved. 网站备案号：湘ICP备05006262号</p>\r\n\r\n<p>本网站所有图片及资料均为本公司版权所有，对于任何形式的侵权行为，我们将保留一切追究法律责任的权利。<a href=\"http://www.zhonghuyx.com/\" style=\"color:#999;\">网站制作：中虎营销</a></p>\r\n');
/*!40000 ALTER TABLE `hms_system_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-10 23:16:29
