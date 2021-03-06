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
  `categoryIcon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES
(1,'Starters','<i class=\"fa-solid fa-cookie\"></i>'),
(2,'Main Dishes','<i class=\"fa-solid fa-bowl-rice\"></i>'),
(3,'Deserts','<i class=\"fa-solid fa-cheese\"></i>'),
(4,'Drinks','<i class=\"fa-solid fa-martini-glass-citrus\"></i>'),
(5,'Vegetarian','<i class=\"fa-solid fa-seedling\"></i>'),
(6,'Spicy','<i class=\"fa-solid fa-pepper-hot\"></i>');
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
INSERT INTO `contact_form` VALUES
(15,'foo','foo@','1234567','foo','foo bar','2022-04-13 10:38:55'),
(16,'Jean Dujardin','bonjour@jean','5555555','Hi','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.','2022-04-13 11:10:23'),
(22,'foo','bar@','787','foo','bar','2022-04-13 13:53:41'),
(23,'foo','bar@','787','foo','bar','2022-04-13 13:54:20'),
(33,'cvc','bar','787','foo','bar','2022-04-13 14:38:29'),
(34,'ds','bar@mail.com','7642797879','foo','bar','2022-04-13 14:53:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
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
(4,'Osaka Spicy Tofu Ramen','Vegetarian ramen with mushroom, carrot, vegetable broth and sweet soy sauce braised tofu.',4,14,'2022-04-04 08:59:21','2022-04-04 08:59:21'),
(5,'Pork Gyoza','Pan-fried Japanese dumplings which make perfect starters or nibbles. Filled with a savory mixture of ground pork and Japanese flavors.',1,4,'2022-04-21 12:00:34','2022-04-21 12:00:34'),
(6,'Crispy Salmon Salad','Luscious salad that is a riot of flavours, colours and textures. With crispy salmon, crunchy coconut and sweet, sour, spicy sauce.',2,5,'2022-04-21 12:04:11','2022-04-21 12:04:11'),
(7,'Miso Cold Noodle Salad','Miso adds authentic sweet flavour to the marinade in this cold and fresh noodle salad.',3,4.5,'2022-04-21 12:06:13','2022-04-21 12:06:13'),
(8,'Ice Cream with Grass Jelly','Grass jelly, also known as leaf jelly or herb jelly, is a traditional Asian herbal dessert that tastes like mint. Perfect to finish your meal.',1,3,'2022-04-21 12:09:38','2022-04-21 12:09:38'),
(9,'Soju Watermelon Cocktail','An excellent summertime drink with light, dry, slightly flowery, and has a ton of watermelon yumminess. Slushy and cold, making it the perfect way to cool down on a hot day.  ',1,3,'2022-04-21 12:14:11','2022-04-21 12:14:11'),
(10,'Singapore Sling','The multiple ingredients are what makes it so good. The primary flavor is fruit ??? pineapple, cherry, lime, and orange ??? but there are other, earthier tastes in the drink ??? primarily herbs. ',2,3.5,'2022-04-21 12:14:11','2022-04-21 12:14:11');
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
(4,6),
(5,1),
(6,1),
(7,1),
(8,3),
(7,5),
(9,4),
(10,4);
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
  `idStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_reservation_status` (`idStatus`),
  CONSTRAINT `FK_reservation_status` FOREIGN KEY (`idStatus`) REFERENCES `reservation_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_form`
--

LOCK TABLES `reservation_form` WRITE;
/*!40000 ALTER TABLE `reservation_form` DISABLE KEYS */;
INSERT INTO `reservation_form` VALUES
(1,'foo','bar@foo.com','1234567890',1,'2022-04-15','12:14:00','2022-04-13 17:37:08',1),
(2,'foo','foo@bar.com','6543246896',3,'2022-04-12','14:15:00','2022-04-13 17:39:08',1),
(3,'test','foo@bar.com','7654387608',3,'2022-04-15','21:04:00','2022-04-13 17:57:36',1),
(4,'Asterix','asterix@mail.fr','5643125797',2,'2022-04-18','19:57:00','2022-04-13 17:59:18',1),
(5,'Will Smith','will@smith.com','1234567890',2,'2022-04-19','20:41:00','2022-04-14 07:43:02',1),
(6,'Chris Rock','chris@rock.com','0987654321',1,'2022-04-20','18:49:00','2022-04-14 07:48:49',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_status`
--

LOCK TABLES `reservation_status` WRITE;
/*!40000 ALTER TABLE `reservation_status` DISABLE KEYS */;
INSERT INTO `reservation_status` VALUES
(1,'pending'),
(2,'confirmed'),
(3,'cancelled');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'Annisa','Hidayati','hidayati.ann@gmail.com','[\'SUPER_ADMIN\']','annisa','$2y$10$6VMaDWqhGJKZGM8UEX/e4O9LhK0I/QGVQWwd/.v2MMmDrrDjZ9ofC','2022-04-28 12:23:31'),
(2,'fooFirstname','barLastname','foo@bar.com','[\'USER\']','foo','$2y$10$Ro0MwMP5MEk3as9fye20ee2U3NAqvVpJ8HlE1ndsMunCilTwwdzvS','2022-04-28 12:23:50');
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

-- Dump completed on 2022-04-28 12:24:33
