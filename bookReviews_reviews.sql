-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: bookReviews
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(245) DEFAULT NULL,
  `author` varchar(245) DEFAULT NULL,
  `review` varchar(245) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `date_created` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users_idx` (`users_id`),
  CONSTRAINT `fk_reviews_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (228,'Christmas Carol','Charles Dickens','Amazing',5,18,'2015-06-30 13:05:15'),(229,'Christmas Carol','Charles Dickens','Amazing',5,18,'2015-06-30 13:06:09'),(230,'Christmas Carol','Charles Dickens','Amazing',5,18,'2015-06-30 13:07:08'),(248,'0','0','0',0,18,'2015-06-30 14:30:25'),(249,'0','0','0',0,18,'2015-06-30 14:30:35'),(250,'christmas carol','charles dickens','excellent book',5,18,'2015-06-30 14:49:42'),(251,'christmas carol','charles dickens',' i thought it\'s great too. ',5,18,'2015-06-30 14:50:03'),(252,'christmas carol','charles dickens',' i thought it\'s great too. ',5,18,'2015-06-30 14:51:04'),(253,'christmas carol','charles dickens','excellent book',5,18,'2015-06-30 14:52:40'),(254,'christmas carol','charles dickens','excellent book',5,18,'2015-06-30 14:52:59'),(255,'christmas carol','charles dickens','excellent book',5,18,'2015-06-30 14:53:17'),(256,'christmas carol','charles dickens','excellent book',5,18,'2015-06-30 14:54:24'),(257,'christmas carol','charles dickens',' i thought it\'s great too. ',5,18,'2015-06-30 14:54:25'),(258,'history of man','ben wong','great book',5,18,'2015-06-30 14:55:36'),(259,'history of man','ben wong',' so so',3,18,'2015-06-30 14:55:51'),(260,'history of everything','abc','great great great',5,18,'2015-06-30 14:58:50'),(261,'history of everything','abc','great great great',5,18,'2015-06-30 14:59:21'),(262,'history of everything','abc','great great great',5,18,'2015-06-30 14:59:29'),(263,'history of everything','abc','great great great',5,18,'2015-06-30 15:00:14'),(264,'history of everything','abc','great great great',5,18,'2015-06-30 15:00:21'),(265,'xxx','yyy',' stupendous',5,18,'2015-06-30 15:03:48'),(266,'christmas carol','charles dickens','marvelous ',5,18,'2015-06-30 21:52:45'),(267,'christmas carol','charles dickens','lovely ',5,18,'2015-07-01 10:13:39'),(268,'christmas carol','charles dickens','lovely ',5,18,'2015-07-01 10:13:43');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-01 10:14:16
