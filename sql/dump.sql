-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: mariadb    Database: database
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB-1:10.7.3+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `database`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `database` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `database`;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryTitle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES
(1,'Starters'),
(2,'Main Dishes'),
(3,'Deserts'),
(4,'Drinks'),
(5,'Vegetarian'),
(6,'Spicy');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homepage_item`
--

DROP TABLE IF EXISTS `homepage_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homepage_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` text DEFAULT NULL,
  `itemOrder` int(2) DEFAULT NULL,
  `activeStatus` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homepage_item`
--

LOCK TABLES `homepage_item` WRITE;
/*!40000 ALTER TABLE `homepage_item` DISABLE KEYS */;
INSERT INTO `homepage_item` VALUES
(1,'header','Welcome to the house of noodles','No life without noodles',NULL,NULL,1,'0000-00-00 00:00:00','2022-04-01 14:47:50'),
(2,'hours-main','Opening Hours',NULL,NULL,NULL,1,'2022-04-01 14:11:06','2022-04-01 14:43:19'),
(3,'hours-1','Monday to Thursday','09:00 - 23:00',NULL,NULL,1,'2022-04-11 13:16:29','2022-04-11 13:16:29'),
(4,'hours-2','Friday and Saturday','08:00 - 24:00',NULL,NULL,1,'2022-04-11 13:16:29','2022-04-11 13:16:29'),
(5,'menu','Our Menu','Our menu changes occasionally. Any meat can be replaced with tofu or saitan. Ask our server for more information about specific allergen.',NULL,NULL,1,'2022-04-06 14:16:13','2022-04-06 14:16:13'),
(6,'testimonial','Testimonial','Jean-Claude Van Damme','I ordered the spicy tonkotsu ramen, the flavor profile was 10/10. I truly appreciate how much care they put into the presentation of the bowl. That really took the experience the extra mile for me. The noodles are fresh, the cuts of pork belly are juicy and the broth is delicious and not too salty. It was an excellent experience, must try for noodle lovers!',NULL,1,'2022-04-06 14:07:18','2022-04-06 14:07:18'),
(7,'card-main','Our Values','Our core values allow us to bring the best foods and services to you.',NULL,NULL,1,'2022-04-06 14:10:47','2022-04-06 14:10:47'),
(8,'card-1','Fresh','Every ingredients are sourced from responsible suppliers who provide high quality products.',NULL,NULL,1,'2022-04-06 14:12:58','2022-04-06 14:12:58'),
(9,'card-2','Authenticity','The recipes used are authentic from deep research and have been passed down for generations.',NULL,NULL,1,'2022-04-06 14:12:58','2022-04-06 14:12:58'),
(10,'card-3','Made With Love','Every dish is made by our professional chefs with love and passion for good food.',NULL,NULL,1,'2022-04-06 14:12:58','2022-04-06 14:12:58');
/*!40000 ALTER TABLE `homepage_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuItem` varchar(255) NOT NULL,
  `menuDescription` text NOT NULL,
  `menuItemOrder` int(2) NOT NULL,
  `price` float NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES
(1,'Bangkok Shrimp Pad Thai','Stir-fried rice noodles with shrimp, peanuts, a scrambled egg, and bean sprouts.',1,15,'2022-04-04 08:59:21','2022-04-04 08:59:21'),
(2,'Bali Chicken Fried Noodles','Thin yellow noodles stir fried in cooking oil with garlic, onion, chicken, cabbages and tomatoes.',2,16,'2022-04-04 08:59:21','2022-04-04 08:59:21'),
(3,'Saigon Beef Pho Bo','Vietnamese noodle soup dish consisting of broth, rice noodles, herbs, and beef meat.',3,14,'2022-04-04 08:59:21','2022-04-04 08:59:21'),
(4,'Osaka Spicy Tofu Ramen','Vegetarian ramen with mushroom, carrot, vegetable broth and sweet soy sauce braised tofu.',4,14,'2022-04-04 08:59:21','2022-04-04 08:59:21');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_category`
--

DROP TABLE IF EXISTS `menu_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_category` (
  `idMenu` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  KEY `FK_menu` (`idMenu`),
  KEY `FK_category` (`idCategory`),
  CONSTRAINT `FK_category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_menu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_category`
--

LOCK TABLES `menu_category` WRITE;
/*!40000 ALTER TABLE `menu_category` DISABLE KEYS */;
INSERT INTO `menu_category` VALUES
(1,2),
(2,2),
(3,2),
(4,2),
(4,5),
(4,6);
/*!40000 ALTER TABLE `menu_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navbar`
--

DROP TABLE IF EXISTS `navbar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navbarItem` varchar(50) NOT NULL,
  `navbarLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navbar`
--

LOCK TABLES `navbar` WRITE;
/*!40000 ALTER TABLE `navbar` DISABLE KEYS */;
INSERT INTO `navbar` VALUES
(1,'Menu','#menu-section'),
(2,'Reservation','#reservation-section'),
(3,'Contact Us','#footer-section'),
(4,'12.34.56.78.90','tel:123-456-7890');
/*!40000 ALTER TABLE `navbar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_form`
--

DROP TABLE IF EXISTS `reservation_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `person` int(2) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_form`
--

LOCK TABLES `reservation_form` WRITE;
/*!40000 ALTER TABLE `reservation_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_status`
--

DROP TABLE IF EXISTS `reservation_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('pending','confirmed','cancelled','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_status`
--

LOCK TABLES `reservation_status` WRITE;
/*!40000 ALTER TABLE `reservation_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style_option`
--

DROP TABLE IF EXISTS `style_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `optionName` varchar(255) NOT NULL,
  `optionValue` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style_option`
--

LOCK TABLES `style_option` WRITE;
/*!40000 ALTER TABLE `style_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `style_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastLogin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'','','','','annisa','$2y$10$6VMaDWqhGJKZGM8UEX/e4O9LhK0I/QGVQWwd/.v2MMmDrrDjZ9ofC','0000-00-00 00:00:00'),
(2,'','','','','foo','$2y$10$Ro0MwMP5MEk3as9fye20ee2U3NAqvVpJ8HlE1ndsMunCilTwwdzvS','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-11 13:59:52
