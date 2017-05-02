-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Current Database: `pauseitive`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `pauseitive` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pauseitive`;

--
-- Table structure for table `product_tags`
--

DROP TABLE IF EXISTS `product_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_tags` (
  `Product_Tag_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tag_ID` int(11) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Product_Tag_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tags`
--

LOCK TABLES `product_tags` WRITE;
/*!40000 ALTER TABLE `product_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(128) DEFAULT NULL,
  `Product_Price` decimal(5,2) DEFAULT '000.00',
  `Product_Image_Path` varchar(1024) DEFAULT NULL,
  `Product_Rating` int(2) DEFAULT '0',
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Men\'s Three Quarters Sleeves Tee',9.99,'./three_quarters_mens_tee_20.jpg',0),(2,'Kids Tee',3.50,'./kids_tee.jpg',5),(3,'Long Sleeve',9.99,'./long_sleeve.jpg',5),(4,'Sweater',9.99,'./sweater.jpg',5),(5,'Sweatshirt',0.75,'./hoodie.jpg',5);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(128) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  `Product_Count` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `Tag_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tag_Name` varchar(128) DEFAULT NULL,
  `Tag_Rating` int(2) DEFAULT '0',
  PRIMARY KEY (`Tag_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Transaction_Type` varchar(64) DEFAULT 'PURCHASE',
  `Product_ID` int(11) DEFAULT NULL,
  `User_Name` varchar(128) DEFAULT NULL,
  `Address` varchar(256) DEFAULT NULL,
  `Credit_Card` int(20) DEFAULT '0',
  `Transaction_Date` datetime DEFAULT NULL,
  `Status` varchar(64) DEFAULT 'UNPROCESSED',
  PRIMARY KEY (`Transaction_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (4,'PURCHASE',1,'smalbadger','a a a, a a',0,'2017-04-29 16:15:26','UNPROCESSED'),(5,'PURCHASE',2,'smalbadger','a a a, a a',0,'2017-04-29 16:15:26','UNPROCESSED'),(6,'PURCHASE',3,'smalbadger','a a a, a a',0,'2017-04-29 16:15:26','UNPROCESSED'),(7,'PURCHASE',4,'smalbadger','a a a, a a',0,'2017-04-29 16:15:26','UNPROCESSED'),(8,'PURCHASE',5,'smalbadger','a a a, a a',0,'2017-04-29 16:15:26','UNPROCESSED'),(9,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(10,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(11,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(12,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(13,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(14,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(15,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(16,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(17,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED'),(18,'PURCHASE',1,'smalbadger','  ,  ',0,'2017-04-29 17:59:18','UNPROCESSED');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(128) DEFAULT NULL,
  `First_Name` varchar(128) DEFAULT NULL,
  `Last_Name` varchar(128) DEFAULT NULL,
  `User_Phone` int(10) DEFAULT NULL,
  `User_Email` varchar(255) DEFAULT NULL,
  `User_Hashed_Password` varchar(255) DEFAULT NULL,
  `User_Date_Joined` datetime DEFAULT NULL,
  `User_Type` varchar(64) DEFAULT 'CUSTOMER',
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Admin','Administrator','VIP',0,'admin@pauseitive.com','$2y$10$nq/7KaSh4MSdoLS6OBzEjewLOLhRtHlczq0wP2D4vI4YdKQRbHZWC','2017-04-29 16:32:58','ADMINISTRATOR'),(5,'smalbadger','Sam','Badger',0,'smalbadger@email.arizona.edu','$2y$10$7QW2dXRq.hEelfWO6r1ZOOt3eK7MKQoGv.sQMJec8LdaQhZZYoPym','2017-04-29 17:57:51','CUSTOMER');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-29 18:01:56
