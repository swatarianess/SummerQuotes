-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projectsd
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `tbl_quote`
--

DROP TABLE IF EXISTS `tbl_quote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_quote` (
  `id_quote` int(11) NOT NULL AUTO_INCREMENT,
  `quoteString` varchar(255) DEFAULT NULL,
  `quoteCreated` datetime DEFAULT NULL,
  `quoteAuthor` varchar(255) DEFAULT NULL,
  `quotePoster` varchar(255) NOT NULL,
  PRIMARY KEY (`id_quote`),
  KEY `tbl_quote_tbl_users_user_name_fk` (`quotePoster`),
  CONSTRAINT `tbl_quote_tbl_users_user_name_fk` FOREIGN KEY (`quotePoster`) REFERENCES `tbl_users` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_quote`
--

LOCK TABLES `tbl_quote` WRITE;
/*!40000 ALTER TABLE `tbl_quote` DISABLE KEYS */;
INSERT INTO `tbl_quote` VALUES (1,'Quote 1 from admin','2016-08-10 23:14:39','admin person','admin'),(2,'Quote 1 from tester','2016-08-10 23:20:17','tester123','test123'),(3,'Quote 2 from admin','2016-08-10 23:20:07','admin','admin'),(5,'Quote 2 from tester123','2016-08-10 23:20:07','admin','test123'),(7,'Quote e2 from tester123','2016-08-11 14:41:04','sdasdasdas','test123');
/*!40000 ALTER TABLE `tbl_quote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-11 14:59:40
