-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: FTMS
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `NAME` varchar(255) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  PRIMARY KEY (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES ('chopstick',100,0.5),('fork',100,1),('knife',100,1);
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `NAME` varchar(255) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  PRIMARY KEY (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES ('apple',1,5),('bacon',100,2),('broccoli',44,2),('Caesar dressing',10,5.5),('carrot',100,1),('chicken',10,3.3),('fish',1,1),('lettuce',200,2),('Mixed greens',100,2),('Parmesan cheese',100,1.5),('pen',1,3),('pork collar',1,10),('red onion',100,1.3),('salmon',1,10),('shrimp',1,3);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `ID` varchar(32) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` double NOT NULL,
  `POPULARITY` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('oe6v4qadnzbjr2sbg9sbrsxkcii5vfie','Caesar Salad',12.5,2),('q4kobjo4dyyd9edh2g8lp1bftc4ugowe','apple pen',10,0),('sz0tzfwdhobcykx4k7fvbxpcbf0ooeky','House Salad',10.5,3);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderlist`
--

DROP TABLE IF EXISTS `orderlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderlist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OID` varchar(32) NOT NULL,
  `MID` varchar(32) NOT NULL,
  `MENU_NAME` varchar(255) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderlist`
--

LOCK TABLES `orderlist` WRITE;
/*!40000 ALTER TABLE `orderlist` DISABLE KEYS */;
INSERT INTO `orderlist` VALUES (1,'v2tl46ds54taomnrci7uko0cd53rvxes','253hhl92rhbi2d0vnco7pemj2nvxhdro','applepen',2),(2,'bkr2hj770ee7ciak5g6namczjy73u3pe','kqmzqeqie5a5a1zug2w2x966w6o7daov','pineapplepen',1),(3,'5pglgv0rwi33wlelfibwul4auv8zug2b','kqmzqeqie5a5a1zug2w2x966w6o7daov','pineapplepen',5),(4,'5pglgv0rwi33wlelfibwul4auv8zug2b','253hhl92rhbi2d0vnco7pemj2nvxhdro','applepen',5),(5,'jvmwdp18ebfl2wsx1tbf97eavd0zcps9','oe6v4qadnzbjr2sbg9sbrsxkcii5vfie','Caesar Salad',2),(6,'jg07o29ej0d4tynrvaqvzop6r7j4mbb8','sz0tzfwdhobcykx4k7fvbxpcbf0ooeky','House Salad',3);
/*!40000 ALTER TABLE `orderlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `ID` varchar(32) NOT NULL,
  `TIME` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES ('jg07o29ej0d4tynrvaqvzop6r7j4mbb8','2016-11-28 01:57:00',1),('jvmwdp18ebfl2wsx1tbf97eavd0zcps9','2016-11-28 01:56:24',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MID` varchar(32) NOT NULL,
  `FOOD_NAME` varchar(255) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (23,'q4kobjo4dyyd9edh2g8lp1bftc4ugowe','apple',1),(24,'q4kobjo4dyyd9edh2g8lp1bftc4ugowe','pen',1),(25,'oe6v4qadnzbjr2sbg9sbrsxkcii5vfie','bacon',2),(26,'oe6v4qadnzbjr2sbg9sbrsxkcii5vfie','Caesar dressing',1),(27,'oe6v4qadnzbjr2sbg9sbrsxkcii5vfie','lettuce',2),(28,'oe6v4qadnzbjr2sbg9sbrsxkcii5vfie','Parmesan cheese',1),(29,'sz0tzfwdhobcykx4k7fvbxpcbf0ooeky','Mixed greens',2),(30,'sz0tzfwdhobcykx4k7fvbxpcbf0ooeky','red onion',1),(31,'sz0tzfwdhobcykx4k7fvbxpcbf0ooeky','tomato',1),(32,'sz0tzfwdhobcykx4k7fvbxpcbf0ooeky','carrot',1);
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` varchar(32) NOT NULL,
  `START_TIME` datetime NOT NULL,
  `END_TIME` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (19,'x22ykbi0mkkj5qqporji8pgyvwjepgqi','2016-11-29 14:00:00','2016-11-29 17:00:00'),(20,'x22ykbi0mkkj5qqporji8pgyvwjepgqi','2016-11-30 14:00:00','2016-11-30 17:00:00'),(21,'x22ykbi0mkkj5qqporji8pgyvwjepgqi','2016-12-01 10:00:00','2016-12-01 12:00:00'),(22,'x22ykbi0mkkj5qqporji8pgyvwjepgqi','2016-12-02 11:00:00','2016-12-02 13:00:00'),(24,'gjjxo2f2p7nu0wn0eqq0h51gfvb9v1i5','2016-11-29 10:00:00','2016-11-29 13:00:00'),(25,'gjjxo2f2p7nu0wn0eqq0h51gfvb9v1i5','2016-11-29 18:00:00','2016-11-29 21:00:00'),(26,'gjjxo2f2p7nu0wn0eqq0h51gfvb9v1i5','2016-11-30 14:00:00','2016-11-30 17:00:00'),(27,'gjjxo2f2p7nu0wn0eqq0h51gfvb9v1i5','2016-12-01 10:00:00','2016-12-01 13:00:00'),(28,'gjjxo2f2p7nu0wn0eqq0h51gfvb9v1i5','2016-12-01 18:00:00','2016-12-01 21:00:00');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `ID` varchar(32) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ROLE` varchar(255) NOT NULL,
  `GENDER` varchar(45) NOT NULL,
  `AGE` int(11) NOT NULL,
  `TEL` mediumtext NOT NULL,
  `USERNAME` varchar(45) NOT NULL,
  `PASSWORD` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES ('gjjxo2f2p7nu0wn0eqq0h51gfvb9v1i5','Kevin Yen','Cook','male',20,'5145813089','k8210985','EeE171717'),('skr7r5q6brooarsf18dytnakq5omtsp6','Dishi Zhu','Cook','female',99,'5147483647','dishi','1234567890'),('x22ykbi0mkkj5qqporji8pgyvwjepgqi','shawn','Manager','male',21,'1234567890','admin','admin');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-28 15:40:56
