-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: 18bitsgaming
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(10) unsigned NOT NULL,
  `link` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `access_role` (`role`),
  KEY `access_link` (`link`),
  CONSTRAINT `access_link` FOREIGN KEY (`link`) REFERENCES `link` (`id`) ON DELETE CASCADE,
  CONSTRAINT `access_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` VALUES (24,3,11,'2018-11-21 10:59:01'),(25,3,12,'2018-11-21 10:59:01'),(26,3,13,'2018-11-21 10:59:02'),(27,3,14,'2018-11-21 10:59:02'),(28,3,15,'2018-11-21 10:59:02'),(29,3,16,'2018-11-21 10:59:02'),(30,3,17,'2018-11-21 10:59:02'),(31,3,18,'2018-11-21 10:59:02'),(32,3,19,'2018-11-21 10:59:02'),(33,3,20,'2018-11-21 10:59:02'),(34,3,21,'2018-11-21 12:02:14'),(35,3,22,'2018-11-21 12:05:14'),(36,3,23,'2018-11-21 12:28:57'),(37,3,24,'2018-11-21 12:28:57'),(38,3,25,'2018-11-21 14:49:10'),(39,3,26,'2018-11-21 14:49:11'),(40,3,27,'2018-11-27 15:38:04'),(41,3,28,'2018-11-27 15:38:05');
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) unsigned NOT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_role` (`role`),
  CONSTRAINT `admin_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'18bitsgaming','info@18bitsgaming.com','public/upload/profile/u5goezleo8unafe8pou6.png','courier-ng','18bits Gaming','1aa9cd5e111571f1661f65d07f31a2424e8bcbbef26888cb229f856785e03dd6',3,'2018-04-06 18:42:21','2018-04-06 18:42:21','2018-12-05 16:09:18');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `parent` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`,`link`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (22,'News','news',NULL,'2018-07-31 17:36:11','2018-07-31 17:36:11');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(10) unsigned NOT NULL DEFAULT '1',
  `banner` int(10) unsigned DEFAULT NULL,
  `bannerVideo` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `config_banner` (`banner`),
  KEY `config_updated_by` (`updated_by`),
  KEY `config_bannerVideo` (`bannerVideo`),
  CONSTRAINT `config_banner` FOREIGN KEY (`banner`) REFERENCES `image` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `config_bannerVideo` FOREIGN KEY (`bannerVideo`) REFERENCES `video` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `config_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,41,3,1,'2018-11-29 11:37:51');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `franchise`
--

DROP TABLE IF EXISTS `franchise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franchise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franchise`
--

LOCK TABLES `franchise` WRITE;
/*!40000 ALTER TABLE `franchise` DISABLE KEYS */;
/*!40000 ALTER TABLE `franchise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `published` tinyint(4) DEFAULT '0',
  `prototype` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'Jack\'s Map Out','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>No Description</p>\r\n</body>\r\n</html>','jack-s-map-out_475',1,0,'2018-11-21 12:29:07','2018-11-27 15:25:07'),(2,'Freaky Friday','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>No Description</p>\r\n</body>\r\n</html>','freaky-friday_69486',1,0,'2018-11-23 14:43:10','2018-12-03 11:06:36');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_franchise`
--

DROP TABLE IF EXISTS `game_franchise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_franchise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(10) unsigned NOT NULL,
  `franchise` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `game_franchise_game` (`game`),
  KEY `game_franchise_franchise` (`franchise`),
  CONSTRAINT `game_franchise_franchise` FOREIGN KEY (`franchise`) REFERENCES `franchise` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `game_franchise_game` FOREIGN KEY (`game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_franchise`
--

LOCK TABLES `game_franchise` WRITE;
/*!40000 ALTER TABLE `game_franchise` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_franchise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_genre`
--

DROP TABLE IF EXISTS `game_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(10) unsigned NOT NULL,
  `genre` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `game_genre_game` (`game`),
  KEY `game_genre_genre` (`genre`),
  CONSTRAINT `game_genre_game` FOREIGN KEY (`game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `game_genre_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_genre`
--

LOCK TABLES `game_genre` WRITE;
/*!40000 ALTER TABLE `game_genre` DISABLE KEYS */;
INSERT INTO `game_genre` VALUES (1,1,1,'2018-11-23 04:18:06'),(2,1,2,'2018-11-23 04:18:07'),(3,1,3,'2018-11-23 04:18:08'),(5,1,5,'2018-11-23 04:19:57'),(6,2,1,'2018-11-23 14:43:33'),(7,2,2,'2018-11-23 14:43:33'),(8,2,3,'2018-11-23 14:43:34');
/*!40000 ALTER TABLE `game_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_image`
--

DROP TABLE IF EXISTS `game_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(10) unsigned NOT NULL,
  `image` int(10) unsigned NOT NULL,
  `main` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `game_image_image` (`image`),
  KEY `game_image_game` (`game`),
  CONSTRAINT `game_image_game` FOREIGN KEY (`game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `game_image_image` FOREIGN KEY (`image`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_image`
--

LOCK TABLES `game_image` WRITE;
/*!40000 ALTER TABLE `game_image` DISABLE KEYS */;
INSERT INTO `game_image` VALUES (17,1,41,0,'2018-11-23 05:36:40','2018-11-23 05:36:40'),(18,1,42,0,'2018-11-23 05:36:54','2018-11-23 05:36:54'),(19,1,43,0,'2018-11-23 05:37:11','2018-11-23 05:37:11'),(20,1,44,0,'2018-11-23 05:37:35','2018-11-23 05:37:35'),(21,1,45,1,'2018-11-23 05:39:05','2018-11-23 05:39:25'),(22,2,46,1,'2018-11-23 14:44:23','2018-11-23 14:45:31');
/*!40000 ALTER TABLE `game_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_platform`
--

DROP TABLE IF EXISTS `game_platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_platform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(10) unsigned NOT NULL,
  `platform` int(10) unsigned NOT NULL,
  `status` int(10) unsigned DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `game_platform_game` (`game`),
  KEY `game_platform_platform` (`platform`),
  KEY `game_platform_status` (`status`),
  CONSTRAINT `game_platform_game` FOREIGN KEY (`game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `game_platform_platform` FOREIGN KEY (`platform`) REFERENCES `platform` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `game_platform_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_platform`
--

LOCK TABLES `game_platform` WRITE;
/*!40000 ALTER TABLE `game_platform` DISABLE KEYS */;
INSERT INTO `game_platform` VALUES (1,1,12,2,'2018-12-13 00:00:00','2018-11-21 23:46:08','2018-11-21 23:46:08'),(2,1,10,2,'0000-00-00 00:00:00','2018-11-21 23:56:13','2018-11-23 06:29:18');
/*!40000 ALTER TABLE `game_platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_store`
--

DROP TABLE IF EXISTS `game_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(10) unsigned NOT NULL,
  `store` int(10) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `game_store_game` (`game`),
  KEY `game_store_store` (`store`),
  CONSTRAINT `game_store_game` FOREIGN KEY (`game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `game_store_store` FOREIGN KEY (`store`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_store`
--

LOCK TABLES `game_store` WRITE;
/*!40000 ALTER TABLE `game_store` DISABLE KEYS */;
INSERT INTO `game_store` VALUES (3,1,4,'store link or something','2018-11-22 01:02:02');
/*!40000 ALTER TABLE `game_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_video`
--

DROP TABLE IF EXISTS `game_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(10) unsigned NOT NULL,
  `video` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_video`
--

LOCK TABLES `game_video` WRITE;
/*!40000 ALTER TABLE `game_video` DISABLE KEYS */;
INSERT INTO `game_video` VALUES (1,1,1,'2018-11-27 13:09:01'),(3,1,2,'2018-11-27 13:13:26'),(5,1,3,'2018-11-28 17:08:42');
/*!40000 ALTER TABLE `game_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Puzzle','puzzle_8934','2018-11-23 04:15:06'),(2,'3d Platformer','3d-platformer_6497','2018-11-23 04:18:07'),(3,'Action Adventure','action-adventure_641050','2018-11-23 04:18:08'),(5,'First Person Shooter','first-person-shooter_457','2018-11-23 04:19:57');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(500) NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (41,'Jack Map Out Start Menu','public/media/image/6ap50i0takqqrt2kgu9d.png','public/media/image/thumb/6ap50i0takqqrt2kgu9d.png','2018-11-23 05:36:40'),(42,'Jack Map Out Load Screen','public/media/image/hiny1jk96mvg3n54n4xo.png','public/media/image/thumb/hiny1jk96mvg3n54n4xo.png','2018-11-23 05:36:54'),(43,'Jack Map Out Play Test','public/media/image/aeji10jfd32h1xj8qckm.png','public/media/image/thumb/aeji10jfd32h1xj8qckm.png','2018-11-23 05:37:11'),(44,'Jack Map Out Play Test','public/media/image/4j8zqytv92087zrb66r9.png','public/media/image/thumb/4j8zqytv92087zrb66r9.png','2018-11-23 05:37:35'),(45,'Jack Map Out Cover','public/media/image/voh7o3b4iz7luf894h12.png','public/media/image/thumb/voh7o3b4iz7luf894h12.png','2018-11-23 05:39:05'),(46,'Freaky Friday Cover','public/media/image/cli8h4o4juftxbkxb8jr.png','public/media/image/thumb/cli8h4o4juftxbkxb8jr.png','2018-11-23 14:44:23'),(51,'18bits Gaming Logo','public/media/image/1uiqx71g4v29euj3h0p7.png','public/media/image/thumb/1uiqx71g4v29euj3h0p7.png','2018-12-03 10:47:24'),(52,NULL,'public/media/image/zozkjyzhd959441yxr3y.jpg','public/media/image/thumb/zozkjyzhd959441yxr3y.jpg','2019-06-17 16:20:28');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` int(10) unsigned DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `linkName` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `navbar` tinyint(4) DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `link_group` (`group`),
  CONSTRAINT `link_group` FOREIGN KEY (`group`) REFERENCES `link_group` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (11,1,'category','category','Blog Category',1,'fa fa-filter','2018-11-21 10:22:09','2018-11-21 10:54:35'),(12,3,'users','users','Administrator List',1,'fa fa-users','2018-11-21 10:42:31','2018-11-21 10:42:31'),(13,3,'roles','roles','Admin Roles',1,'fa fa-user-md','2018-11-21 10:46:36','2018-11-21 10:46:36'),(14,3,'links','links','Admin Links',1,'fa fa-link','2018-11-21 10:47:38','2018-11-21 10:49:37'),(15,3,'link_group','link_group','Admin Link Group',1,'fa fa-external-link-square-alt','2018-11-21 10:49:18','2018-11-21 10:49:18'),(16,1,'tags','tags','Blog Tags',1,'fa fa-tags','2018-11-21 10:50:23','2018-11-21 10:50:23'),(17,3,'role','role','Admin Role',0,'fa fa-fw fa-user-md','2018-11-21 10:51:13','2018-11-21 10:51:13'),(18,1,'new_article','new_article','Create Article',1,'fa fa-file-upload','2018-11-21 10:53:44','2018-11-21 10:53:44'),(19,1,'article','article','Article',0,'far fa-newspaper','2018-11-21 10:55:36','2018-11-21 10:55:36'),(20,1,'articles','articles','Articles',1,'fas fa-newspaper','2018-11-21 10:56:19','2018-11-21 10:57:03'),(21,4,'genre','genre','Genre',1,'fa fa-puzzle-piece ','2018-11-21 11:49:14','2018-11-21 11:49:14'),(22,4,'new_game','new_game','New Game',1,'fa fa-dice-one','2018-11-21 12:04:53','2018-11-21 12:04:53'),(23,4,'games','games','Games',1,'fa fa-dice','2018-11-21 12:08:10','2018-11-21 12:08:10'),(24,4,'game','game','Game',0,'fa fa-dice-six','2018-11-21 12:09:24','2018-11-21 12:09:24'),(25,4,'platform','platform','Platform',1,'fa fa-tv','2018-11-21 14:17:43','2018-11-21 14:17:43'),(26,4,'store','store','Store',1,'fa fa-store','2018-11-21 14:18:40','2018-11-21 14:18:40'),(27,5,'images','images','Images',1,'fa fa-images ','2018-11-27 14:39:19','2018-11-27 14:39:19'),(28,5,'videos','videos','Videos',1,'fa fa-file-video','2018-11-27 14:40:22','2018-11-27 14:40:22');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_group`
--

DROP TABLE IF EXISTS `link_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_group`
--

LOCK TABLES `link_group` WRITE;
/*!40000 ALTER TABLE `link_group` DISABLE KEYS */;
INSERT INTO `link_group` VALUES (1,'Blog','far fa-newspaper','2018-11-21 01:42:34'),(3,'Settings','fa fa-cogs','2018-11-21 10:41:14'),(4,'Games Area','fa fa-gamepad ','2018-11-21 11:47:25'),(5,'General','fa fa-desktop','2018-11-27 14:37:51');
/*!40000 ALTER TABLE `link_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platform`
--

DROP TABLE IF EXISTS `platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platform`
--

LOCK TABLES `platform` WRITE;
/*!40000 ALTER TABLE `platform` DISABLE KEYS */;
INSERT INTO `platform` VALUES (8,'Xbox','xbox_4267','fab fa-xbox','2018-11-21 14:51:34'),(9,'Nintendo Switch ','nintendo-switch_3465','fab fa-nintendo-switch ','2018-11-21 14:52:17'),(10,'PC','pc_4435','fab fa-windows ','2018-11-21 14:53:51'),(11,'Mac','mac_4522','fab fa-apple','2018-11-21 14:54:09'),(12,'Android','android_345','fab fa-android','2018-11-21 14:54:30'),(13,'IOS','ios_3454','fab fa-apple','2018-11-21 14:56:27'),(14,'PS4','ps4_3452','fab fa-playstation ','2018-11-21 15:23:47');
/*!40000 ALTER TABLE `platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(10) unsigned NOT NULL,
  `category` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(500) NOT NULL,
  `post` longtext NOT NULL,
  `abstract` varchar(300) NOT NULL,
  `image` int(10) unsigned DEFAULT NULL,
  `published` tinyint(4) DEFAULT '0',
  `top` tinyint(4) DEFAULT '0',
  `views` int(10) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `post_admin` (`admin`),
  KEY `post_category` (`category`),
  KEY `post_image` (`image`),
  FULLTEXT KEY `post_fulltext` (`title`,`post`,`abstract`),
  CONSTRAINT `post_admin` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE SET NULL,
  CONSTRAINT `post_image` FOREIGN KEY (`image`) REFERENCES `image` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (17,1,22,'Real Estate in Nigeria','real-estate-in-nigeria_732','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>It is evident that Nigeria has the potential to be a Real Estate hub in West Africa and prbably even Africa. Considering the amount of talented Realtors in the Nigerian market, especially the development gurus who have been ablle to refurbish delapitated building and even better develop new and exciting properties across the different sectors (residential, commercial and Industrial). Unfortunately potential is never anough, and to make big of all the promises there in, Nigerian\'s property body NIESV must buckle up and set its members right, in the same vein, they ought to create an atmosphere that deters unprofessional participants-in 2017 alone, a large 30% of the properties purchased, sold or leased out were by non-member individuals who claimed to have had the \"experience\' of transacting in property. It may sound so ordinary but it is indeed a smear in the face the associaion intends to uphold.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/18bitsadmin/public/froala/image/ddd6h232su7tq3jr6i16.png\" alt=\"\" width=\"178\" height=\"178\" /></p>\r\n</body>\r\n</html>','Transacting in property in Nigeria seems to be on a high, Ifeanyi Obi examines the true cost of this milestone',46,1,1,0,'2018-08-01 14:22:01','2018-12-03 10:39:28'),(18,1,22,'Welcome to 18bitsgaming.com','welcome-to-18bitsgaming-com_0930','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>18bitsgaming.com is finally here 18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here 18bitsgaming.com is finally here 18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here&nbsp;18bitsgaming.com is finally here v</p>\r\n</body>\r\n</html>','18bitsgaming.com is finally here',51,1,1,0,'2018-11-21 00:55:58','2018-12-03 10:48:03'),(22,1,22,'Jack\'s Map Out','jack-s-map-out_0200','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Jack Map\'s Out is Coming soon Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;Jack Map\'s Out is Coming soon&nbsp;</p>\r\n</body>\r\n</html>','Jack Map\'s Out is Coming soon',45,1,1,0,'2018-11-23 14:41:56','2018-12-03 10:38:47'),(23,1,22,'New Post','draft_1689','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>New Post</p>\r\n</body>\r\n</html>','New Abstract',NULL,0,0,0,'2018-12-12 12:00:10','2018-12-12 12:00:17');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post` int(10) unsigned NOT NULL,
  `tag` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_tag_post` (`post`),
  KEY `post_tag_tag` (`tag`),
  CONSTRAINT `post_tag_post` FOREIGN KEY (`post`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag` FOREIGN KEY (`tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (54,17,44,'2018-08-01 16:18:57'),(55,17,43,'2018-08-01 16:19:32'),(56,17,45,'2018-11-21 00:12:56'),(57,17,46,'2018-11-21 00:15:17'),(58,17,47,'2018-11-21 00:15:20');
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (3,'Owner','Run the show','2018-04-04 14:52:48','2018-04-04 14:52:48'),(7,'Editor','Publication editorial leader, responsible for operations and policies','2018-08-01 14:13:00','2018-08-01 14:13:00');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Prototype','2018-11-21 23:12:23'),(2,'Development','2018-11-21 23:12:23'),(3,'Alpha Testing','2018-11-21 23:12:23'),(4,'Beta Testing','2018-11-21 23:12:23'),(5,'Early Access','2018-11-21 23:12:23'),(6,'Released','2018-11-21 23:12:23');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,'Apple Store','public/svgs/app-store.svg','https://www.apple.com/ios/app-store/','2018-11-21 16:38:53'),(2,'Google Play Store','public/svgs/google-play.svg','https://play.google.com/store','2018-11-21 16:44:44'),(3,'Humble Bundle','public/svgs/humblebundle.svg','https://humblebundle.com/','2018-11-21 16:45:58'),(4,'Itch.io','public/svgs/itch-io.svg','https://itch.io/','2018-11-21 16:47:13'),(5,'Steam','public/svgs/steam.svg','https://store.steampowered.com/','2018-11-21 16:48:16'),(6,'Microsoft Store','public/svgs/microsoft_store.svg','https://www.microsoft.com/en-us/store/b/home','2018-11-21 16:51:53'),(7,'GOG.com','public/svgs/gog.svg','https://www.gog.com/','2018-11-21 16:53:33'),(8,'Gamejolt','public/svgs/gamejolt.svg','https://gamejolt.com/','2018-11-21 16:54:18');
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(200) NOT NULL,
  `series` tinyint(4) DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (2,'Rockstar Games',0,'rockstar_games-453','2018-04-23 17:05:41','2018-04-23 18:25:40'),(3,'Cakes',0,'cakes_26625','2018-04-23 18:26:42','2018-04-23 18:26:42'),(4,'Roses',0,'roses_0916','2018-04-23 18:26:53','2018-04-23 18:26:53'),(5,'Food',0,'food_32838','2018-04-23 18:26:58','2018-04-23 18:26:58'),(6,'Games',0,'games_43299','2018-04-23 18:30:44','2018-04-23 18:30:44'),(7,'Open World',0,'open-world_052','2018-04-23 18:31:00','2018-04-23 18:31:00'),(8,'Puzzle',0,'puzzle_8268','2018-04-23 18:31:34','2018-04-23 18:31:34'),(9,'Indie',0,'indie_503820','2018-04-23 18:31:40','2018-04-23 18:31:40'),(10,'Gaming',0,'gaming_640923','2018-05-01 18:55:22','2018-05-01 18:55:22'),(11,'Entertainment',0,'entertainment_182','2018-05-01 18:55:31','2018-05-01 18:55:31'),(12,'Destiny 2',0,'destiny-2_474','2018-05-01 18:55:38','2018-05-01 18:55:38'),(13,'Warmind',0,'warmind_596298','2018-05-01 18:55:45','2018-05-01 18:55:45'),(14,'Opinion',0,'opinion_84781','2018-05-01 19:01:45','2018-05-01 19:01:45'),(15,'Religion',0,'religion_6911','2018-05-01 19:01:51','2018-05-01 19:01:51'),(16,'Nigeria',0,'nigeria_724290','2018-05-01 19:02:33','2018-05-01 19:02:33'),(17,'Africa',0,'africa_90052','2018-05-01 19:02:41','2018-05-01 19:02:41'),(18,'Black Panther',0,'black-panther_161939','2018-05-01 19:23:36','2018-05-01 19:23:36'),(19,'YouTube',0,'youtube_6122','2018-05-01 19:24:08','2018-05-01 19:24:08'),(20,'Music',0,'music_422','2018-05-01 19:32:05','2018-05-01 19:32:05'),(21,'JTK',0,'jtk_3659','2018-05-01 19:32:23','2018-05-01 19:32:23'),(22,'Tunji',0,'tunji_07260','2018-05-01 19:32:39','2018-05-01 19:32:39'),(23,'New Music',0,'new-music_320','2018-05-01 19:32:49','2018-05-01 19:32:49'),(24,'Soundcloud',0,'soundcloud_09577','2018-05-01 19:32:56','2018-05-01 19:32:56'),(25,'John Boyega',0,'john-boyega_65203','2018-05-01 19:43:16','2018-05-01 19:43:16'),(26,'Marvel',0,'marvel_13403','2018-05-01 19:43:34','2018-05-01 19:43:34'),(27,'Blade',0,'blade_02618','2018-05-01 19:43:48','2018-05-01 19:43:48'),(28,'Wesley Snipes',0,'wesley-snipes_25389','2018-05-01 19:43:58','2018-05-01 19:43:58'),(29,'Scott Derrickson',0,'scott-derrickson_70136','2018-05-01 19:44:09','2018-05-01 19:44:09'),(30,'Doctor Strange',0,'doctor-strange_29853','2018-05-01 19:44:16','2018-05-01 19:44:16'),(31,'Update',0,'update_18750','2018-05-01 20:36:38','2018-05-01 20:36:38'),(32,'Social Media',0,'social-media_12998','2018-05-01 20:36:47','2018-05-01 20:36:47'),(33,'Avengers: Infinity War',0,'avengers-infinity-war_57999','2018-05-02 15:10:56','2018-05-02 15:10:56'),(34,'Review',0,'review_813','2018-05-02 15:11:27','2018-05-02 15:11:27'),(35,'No Spoilers',0,'no-spoilers_73336','2018-05-02 15:11:44','2018-05-02 15:11:44'),(36,'Ant-Man',0,'ant-man_4185','2018-05-02 16:18:55','2018-05-02 16:18:55'),(37,'The Wasp',0,'the-wasp_11434','2018-05-02 16:19:09','2018-05-02 16:19:09'),(38,'Trailer',0,'trailer_469','2018-05-02 16:19:16','2018-05-02 16:19:16'),(39,'Paul Rudd',0,'paul-rudd_701','2018-05-02 16:20:06','2018-05-02 16:20:06'),(40,'Michael Douglas',0,'michael-douglas_075128','2018-05-02 16:20:14','2018-05-02 16:20:14'),(41,'Walter Goggins',0,'walter-goggins_819','2018-05-02 16:20:23','2018-05-02 16:20:23'),(42,'Evangeline Lily',0,'evangeline-lily_9526','2018-05-02 16:20:32','2018-05-02 16:20:32'),(43,'Real Estate',0,'real-estate_6013','2018-08-01 16:13:42','2018-08-01 16:13:42'),(44,'Property',0,'property_6867','2018-08-01 16:13:57','2018-08-01 16:13:57'),(45,'Safe',0,'safe_829','2018-11-21 00:12:56','2018-11-21 00:12:56'),(46,'House',0,'house_550217','2018-11-21 00:15:16','2018-11-21 00:15:16'),(47,'Car',0,'car_919214','2018-11-21 00:15:20','2018-11-21 00:15:20');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `position` (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `youtube_id` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'Jack\'s map out ','oXwPPxWCjLQ','2018-11-27 13:07:34'),(2,'The Best Key Hunter | Jack\'s Map Out','cl-R7IDDiDQ','2018-11-27 13:13:26'),(3,'Jack\'s Map Out: Android Test Play','lOAoUIPwgvc','2018-11-28 17:08:42');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `views` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post` int(10) unsigned NOT NULL,
  `source_site` varchar(300) NOT NULL,
  `source_url` varchar(300) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `views_post` (`post`),
  CONSTRAINT `views_post` FOREIGN KEY (`post`) REFERENCES `post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `views`
--

LOCK TABLES `views` WRITE;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
INSERT INTO `views` VALUES (23,17,'localhost','http://localhost/newcourier/','::1','Firefox','2018-08-01 14:25:27');
/*!40000 ALTER TABLE `views` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-01 23:35:48
