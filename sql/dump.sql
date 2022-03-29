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
  `menuCategoryTitle` varchar(100) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
INSERT INTO `contact_form` VALUES
(7,'test','mail@test','777','foo','bar','2022-03-29 09:02:28'),
(8,'test','mail','777','foo','bar','2022-03-29 09:02:42');
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
  `heading` varchar(50) NOT NULL,
  `subheading` varchar(50) NOT NULL,
  `textDescription` text DEFAULT NULL,
  `itemOrder` int(2) DEFAULT NULL,
  `activeStatus` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homepage_item`
--

LOCK TABLES `homepage_item` WRITE;
/*!40000 ALTER TABLE `homepage_item` DISABLE KEYS */;
INSERT INTO `homepage_item` VALUES
(1,'header','Welcome to the house of noodles','No life without noodles','',0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES
(1,'Bangkok Shrimp Pad Thai','Stir-fried rice noodles with shrimp, peanuts, a scrambled egg, and bean sprouts.',1,15),
(2,'Bali Chicken Fried Noodles','Thin yellow noodles stir fried in cooking oil with garlic, onion, chicken, cabbages and tomatoes.',2,16),
(3,'Saigon Beef Pho Bo','Vietnamese noodle soup dish consisting of broth, rice noodles, herbs, and beef meat.',3,14),
(4,'Osaka Spicy Tofu Ramen','Vegetarian ramen with mushroom, carrot, vegetable broth and sweet soy sauce braised tofu.',4,14);
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
  CONSTRAINT `FK_category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_menu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`)
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-29 15:31:39
