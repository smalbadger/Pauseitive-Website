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
DROP DATABASE IF EXISTS `pauseitive`;
CREATE DATABASE `pauseitive` /*!40100 DEFAULT CHARACTER SET latin1 */;
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
  `Product_Price` decimal(5,2) DEFAULT '0.00',
  `Product_Image_Path` varchar(1024) DEFAULT NULL,
  `Product_Rating` int(2) DEFAULT '0',
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (6,'Three Quarters Sleeves Tee ',24.99,'three_quarters_mens_tee_20.jpg',0),(7,'Sweater',29.99,'sweater.jpg',0),(8,'Kid\'s Tee',14.99,'kids_tee.jpg',0),(9,'Hoodie',34.99,'hoodie.jpg',0),(10,'Long Sleeve Tee',24.99,'long_sleeve.jpg',0),(11,'Women\'s Black Tee',19.99,'womens_tee_black.jpg',0),(12,'Women\'s Gray Tee',19.99,'womens_tee_gray.jpg',0),(13,'Women\'s White Tee',19.99,'womens_tee_white.jpg',0),(15,'Men\'s Gray Tee',19.99,'mens_tee_gray.jpg',0),(17,'Men\'s White Tee',19.99,'mens_tee_white.jpg',0);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Admin','Administrator','VIP',0,'admin@pauseitive.com','$2y$10$nq/7KaSh4MSdoLS6OBzEjewLOLhRtHlczq0wP2D4vI4YdKQRbHZWC','2017-04-29 16:32:58','ADMINISTRATOR'),(5,'smalbadger','Sam','Badger',0,'smalbadger@email.arizona.edu','$2y$10$7QW2dXRq.hEelfWO6r1ZOOt3eK7MKQoGv.sQMJec8LdaQhZZYoPym','2017-04-29 17:57:51','CUSTOMER'),(6,'s','Sam','Badger',0,'s@email.com','$2y$10$MZB94D2dVRFa8OYGx2.3QeGWABlge0HGTwmr8CjGG5VOE4Dn6T..O','2017-04-30 23:16:13','CUSTOMER'),(7,'SamGisGay','Sam','Gardner',0,'samGisGay@gaypeople.com','$2y$10$fS06vcLrIGldLeP3r2I/HOmW8Nff1Gy3wKW6jecDDE8E77Hzm7Kd2','2017-04-30 23:37:36','CUSTOMER'),(8,'nic','Nic','E',0,'nic@nic.com','$2y$10$UZEvrxdVc1eiSRINwWTiuOzkR9SaW6uEdrmAQlNYBDHmpJ0i6oM92','2017-05-01 12:02:01','CUSTOMER');
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

-- Dump completed on 2017-05-01 21:03:02
