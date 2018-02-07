-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: sql9.freesqldatabase.com    Database: sql9150477
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `Publisher`
--

DROP TABLE IF EXISTS `Publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Publisher` (
  `ID` int(11) NOT NULL,
  `Name` text CHARACTER SET latin1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Publisher`
--

LOCK TABLES `Publisher` WRITE;
/*!40000 ALTER TABLE `Publisher` DISABLE KEYS */;
INSERT INTO `Publisher` VALUES (0,NULL),(1,'Abkco Music'),(2,'Alain Boublil Music'),(3,'Alfred'),(4,'Alfred Music'),(5,'Almitra Music Co.'),(6,'Almo Music'),(7,'Amstel Music'),(8,'Ann Ronnell Music'),(9,'April Music'),(10,'Atlantic Music'),(11,'Average Music'),(12,'Banes Music'),(13,'Barnaby Music'),(14,'Beam Me Up Music'),(15,'Bee-Pee Music'),(16,'Belwin'),(17,'Belwin-Mills'),(18,'Big Bells'),(19,'Birch Island Music Press'),(20,'Boosey & Co.'),(21,'Boosey & Hawkes'),(22,'Bourne'),(23,'Bourne Co.'),(24,'Brassworks Music'),(25,'Brockman Music'),(26,'Bruin Music Co.'),(27,'Bughouse Music'),(28,'Byron –Douglas'),(29,'C.L. Barnhouse'),(30,'C.L. Barnhouse Co.'),(31,'Canopy Music'),(32,'Carl Fischer'),(33,'Carl Fischer, LLC'),(34,'Catstyle Music'),(35,'Chappell & Co.'),(36,'Charter'),(37,'Cherio'),(38,'Chesford Music'),(39,'Chuck Sayre Music'),(40,'Colpix Music'),(41,'Columbia Lady Music'),(42,'Consolidated Music'),(43,'Corcovado Music'),(44,'CTV'),(45,'Curnow Music Press'),(46,'Curnow Music Press,'),(47,'D\'Accord Music'),(48,'De Haske'),(49,'De Haske Music'),(50,'Derry Music'),(51,'Desmond Music Co.'),(52,'Diane Basie Music'),(53,'Doug Beach Music'),(54,'Duchess Music'),(55,'East/Memphis Music'),(56,'Ecaroh Music'),(57,'Editorial Mexicana De Musica Internacional'),(58,'Edmondson & McGinty'),(59,'Educational Programs'),(60,'Edward B. Marks Music'),(61,'Edward B. Marks Music Co.'),(62,'Edwin H. Morris & Co.'),(63,'Eighth Note'),(64,'Embassy Music'),(65,'Emi April Music'),(66,'Emi Blackwood Music'),(67,'Emi Feist Catalog'),(68,'Emi Full Keel Music'),(69,'Emi Mills Music'),(70,'Emi Robbins Catalog'),(71,'Emi Unart Catalog'),(72,'Enoch Et Cie'),(73,'Famous Music'),(74,'Far Out Music'),(75,'Fenwood Music'),(76,'Fenwood Music Co.'),(77,'Flying Red Rhino'),(78,'Fox Fanfare Music'),(79,'Fox Film Music'),(80,'G. & I. Holst'),(81,'G. Schirmer'),(82,'Gaelic Storm Music'),(83,'Gates Music'),(84,'General Words and Music Co.'),(85,'Gia Prima'),(86,'Gordon V. Thompson'),(87,'Hal Leonard'),(88,'Hancock Music'),(89,'Hancock Music Co.'),(90,'Harlem Music'),(91,'Harris Music'),(92,'Hawkes & Son.'),(93,'Heritage Music Press'),(94,'Hill & Range Songs'),(95,'Hollenbeck Music Co.'),(96,'Hubtones Music Co.'),(97,'Hudmar Publishing Co.'),(98,'Ibbob Music'),(99,'Impulsive Music'),(100,'Ira Gershwin Music'),(101,'Irving Berlin'),(102,'Irving Music'),(103,'Janerio Music Co.'),(104,'Jenon'),(105,'Jenson'),(106,'Jenson Educational'),(107,'Jenson Publications'),(108,'Jerry Herman'),(109,'Jerry Leiber Music'),(110,'Jewel Music'),(111,'Jobete Music Co.'),(112,'Joel Songs'),(113,'Joint Ownership Redfield and Norice'),(114,'Jowcol Music'),(115,'Kahl Music'),(116,'Kendor Music'),(117,'Kundalini Music'),(118,'Lake State'),(119,'Lee Mendelson Film'),(120,'Leeds Music'),(121,'Lewis Music'),(122,'Litha Music Co.'),(123,'Low-Sal'),(124,'Ludwig Music'),(125,'Lynnstorm Publishing Co.'),(126,'Manhattan Beach'),(127,'Manhattan Beach Music'),(128,'Maraville Music'),(129,'Matt Harris Music'),(130,'Mattman Music'),(131,'Max Williams'),(132,'Maynard Ferguson Music'),(133,'MCA Music'),(134,'Medici Music Press'),(135,'Melody Trails'),(136,'Metro-Goldwyn-Mayer'),(137,'Michael H. Goldsen'),(138,'Microsoft Music'),(139,'Mills Music'),(140,'Molenaar'),(141,'Mulatto Music'),(142,'Musicians'),(143,'Musicworks'),(144,'Mutual Music Society'),(145,'Neil A. Kjos Music Co.'),(146,'Neil Hefti Music'),(147,'New World Music'),(148,'Norak Musikkforlag'),(149,'Northridge Music'),(150,'Northridge Music Co.'),(151,'Onyx Music'),(152,'Original Canadian Brass Music'),(153,'Paul Simon'),(154,'Peermusic Ltd.'),(155,'Percy Grainger'),(156,'Phoebus'),(157,'Pic'),(158,'Pickwick Music'),(159,'Piedmont Music'),(160,'Piedmont Music Co.'),(161,'Plymouth Music Co.'),(162,'PolyGram International'),(163,'Pop \'N\' Roll Music'),(164,'Powerforce Music'),(165,'Prestige Music'),(166,'Pro Art'),(167,'Regent Music'),(168,'Rightsong Music'),(169,'Rilting Music'),(170,'Robbins Music'),(171,'Rosemeadow'),(172,'Rubank'),(173,'Sam Fox'),(174,'Sam Fox Publishing Co.'),(175,'Samuel French'),(176,'Scherzo Music'),(177,'Screen Gems-Emi Music'),(178,'Second Floor Music'),(179,'Shapiro, Bernstein & Co.'),(180,'Shawnee Pres.'),(181,'Silhouette Music'),(182,'Sony/ATV Music'),(183,'Southern Music Co.'),(184,'St. Nicholas Music'),(185,'Studio 224'),(186,'Studio P R'),(187,'Studio P/R.'),(188,'Summy-Bichard Music'),(189,'Tauripin Tunes'),(190,'The Big 3 Music'),(191,'The John Church Co.'),(192,'The Really Useful Group'),(193,'Theodore Presser Co.'),(194,'Treat Baker'),(195,'Turner Fenton'),(196,'Unichappell Music'),(197,'United Artists'),(198,'Universal Music'),(199,'Universal-MCA Music'),(200,'Upam Music'),(201,'Upam Music Co.'),(202,'Walt Disney Music'),(203,'Walt Disney Music Co.'),(204,'Warner Bros'),(205,'Warner Bros.'),(206,'Warner-Barham Music LLC'),(207,'Warner-Tamerlane'),(208,'Wayward Music'),(209,'Weedhigh-Nightmare Music'),(210,'William Allen  Music'),(211,'William Allen Music'),(212,'Williamson Music'),(213,'Wingert-Jones Music'),(214,'Wingood Music Productions'),(215,'Wolf-Mills Music'),(216,'Wonderland Music Co.'),(217,'Soundcloud'),(219,'Soundclown'),(220,'Justin Xu'),(221,'Water');
/*!40000 ALTER TABLE `Publisher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-21 20:47:22
