-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: zimlab
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(70) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `phone1` bigint DEFAULT NULL,
  `phone2` bigint DEFAULT NULL,
  `phone3` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq` (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'Igor','Boldyrev','igorboldyrev@gmail.com','Zimlab','junior',89501234567,NULL,NULL),(2,'Semen','Sidorov','semensidorov@gmail.com','Apple','middle',89507654321,NULL,NULL),(3,'John','Black','johnblack@gmail.com',NULL,NULL,89501324567,NULL,NULL),(4,'Andrew','Tate','andrewtate@gmail.com',NULL,NULL,89501324588,89501324577,NULL),(5,'James','Bond','jamesbond@gmail.com',NULL,NULL,NULL,NULL,NULL),(8,'Stewie','White','stewiewhite@gmail.com',NULL,NULL,89501324533,NULL,NULL),(10,'Gennadi','Zinoviev','gennadizinoviev@gmail.com','Samsung','middle',NULL,NULL,NULL),(11,'Nicolas','Famous','nicolasfame@gmail.com','Netflix','junior',NULL,NULL,NULL),(12,'Zack','Brown','zackbrown@gmail.com','Intel','senior',89501327777,NULL,NULL),(13,'Quentin','Tarantino','quentintarantino@gmail.ru','BandApart','director',89501327654,89501327555,89501327333),(14,'Jason','Bourne','jasonbourne@gmail.com','Nokia','middle',89506666666,NULL,NULL),(15,'Harry','Potter','harrypotter@gmail.com','Hogwartz','junior',NULL,NULL,NULL),(18,'Jack','Richer','jackricher@gmail.com',NULL,NULL,89507777777,NULL,NULL),(19,'Lorne','Malvo','lornemalvo@gmail.com','Fargo','assasin',NULL,NULL,NULL),(22,'Anatoly','Artamonov','gubami@gmail.com','Twitch',NULL,NULL,NULL,NULL),(24,'Sam','Hyde','ghostofkiev@gmail.com','YouTube',NULL,NULL,NULL,NULL),(26,'Jeffrey','Lebowski','whereismoney@gmail.com',NULL,NULL,NULL,NULL,NULL),(27,'Tom','Cruise','tomcruise@gmail.com','Universal','actor',NULL,NULL,NULL),(28,'George','Lucas','starwars@gmail.com','Lucasfilms','producer',NULL,NULL,NULL),(29,'Olof','Kajbjer','olofkajbjer@gmail.com','Twitch',NULL,89502222222,89502323231,NULL),(30,'Zimlab','Zimlabov','zimlabovich@gmail.com','Zimlab','teamlead',NULL,NULL,NULL),(31,'Jason','Statham','jasonstatham@gmail.com','Paramount',NULL,NULL,NULL,NULL),(32,'Alexandr','Pushkin','alexpushka@gmail.com',NULL,'writer',NULL,NULL,NULL),(33,'Andrey','Tarkovsky','atarkovsky@gmail.com',NULL,'director',NULL,NULL,NULL),(34,'Linus','Torvalds','linustorvalds@gmail.com','Linux','CTO',89502315647,NULL,NULL),(35,'Bill','Gates','billgates@gmail.com','Microsoft','CEO',NULL,NULL,NULL),(36,'Steve','Jobs','stevejobs@gmail.com','Apple','CEO',89502315647,89502315642,NULL),(37,'Michael','Meyers','michaelmeyers@gmail.com',NULL,NULL,NULL,NULL,NULL),(38,'John','Kramer','johnkramer@gmail.com','SawCompany','senior-engineer',NULL,NULL,NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-26 10:01:55
