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
-- Table structure for table `Part`
--

DROP TABLE IF EXISTS `Part`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Part` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PieceID` int(11) DEFAULT NULL,
  `Instrument` text CHARACTER SET utf8mb4,
  `Quantity` int(2) DEFAULT NULL,
  `Status` int(1) DEFAULT '0',
  `LastBorrowedBy` text CHARACTER SET utf8mb4,
  `DateBorrowed` date DEFAULT '0000-00-00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Part`
--

LOCK TABLES `Part` WRITE;
/*!40000 ALTER TABLE `Part` DISABLE KEYS */;
INSERT INTO `Part` VALUES (1,676,'Synth',2147483647,2,'Jaxone','2017-01-01'),(2,568,'Conductor',1,0,NULL,NULL),(3,568,'Flute',8,0,NULL,NULL),(4,568,'Oboe',1,0,NULL,NULL),(5,568,'Bassoon',1,0,NULL,NULL),(6,568,'B♭ Clarinet 1',4,0,NULL,NULL),(7,568,'B♭ Clarinet 2',4,0,NULL,NULL),(8,568,'B♭ Clarinet 3',4,0,NULL,NULL),(9,568,'E♭ Alto Clarinet',1,0,NULL,NULL),(10,568,'B♭ Bass Clarinet',2,0,NULL,NULL),(11,568,'E♭ Alto Saxophone 1',2,0,NULL,NULL),(12,568,'E♭ Alto Saxophone 2',2,0,NULL,NULL),(13,568,'B♭ Tenor Saxophone',2,0,NULL,NULL),(14,568,'E♭ Baritone Saxophone',1,0,NULL,NULL),(15,568,'B♭ Trumpet 1',4,0,NULL,NULL),(16,568,'B♭ Trumpet 2',4,0,NULL,NULL),(17,568,'F Horn',4,0,NULL,NULL),(18,568,'Trombone',4,0,NULL,NULL),(19,568,'Baritone B.C.',2,0,NULL,NULL),(20,568,'Baritone T.C.',2,0,NULL,NULL),(21,568,'Tuba',4,0,NULL,NULL),(22,568,'Convertible Bass Line',2,0,NULL,NULL),(23,568,'Percussion 1 (SD, BD)',2,0,NULL,NULL),(24,568,'Percussion 2 (Cr. Cym., Sus. Cyn., Anvil, Broke Drum, Whip, Bell Tree, Hi-Hat, Toms)',2,0,NULL,NULL),(25,568,'Mallet Percussion (Chimes, Bells, Xylo.)',2,0,NULL,NULL),(26,568,'Timpani',1,0,NULL,NULL),(27,14,'Full Score',1,0,NULL,NULL),(28,14,'Flute (Piccolo)',8,0,NULL,NULL),(29,14,'Oboe',2,0,NULL,NULL),(30,14,'B♭ Clarinet 1',4,0,NULL,NULL),(31,14,'B♭ Clarinet 2',4,0,NULL,NULL),(32,14,'B♭ Clarinet 3',4,0,NULL,NULL),(33,14,'E♭ Alto Clarinet',1,0,NULL,NULL),(34,14,'B♭ Bass Clarinet',2,0,NULL,NULL),(35,14,'Bassoon',2,0,NULL,NULL),(36,14,'E♭ Alto Saxophone 1',2,0,NULL,NULL),(37,14,'E♭ Alto Saxophone 2',2,0,NULL,NULL),(38,14,'B♭ Tenor Saxophone',2,0,NULL,NULL),(39,14,'E♭ Baritone Saxophone',1,0,NULL,NULL),(40,14,'B♭ Trumpet 1',2,0,NULL,NULL),(41,14,'B♭ Trumpet 2',2,0,NULL,NULL),(42,14,'B♭ Trumpet 3',2,0,NULL,NULL),(43,14,'F Horn 1',2,0,NULL,NULL),(44,14,'F Horn 2',2,0,NULL,NULL),(45,14,'Trombone 1',2,0,NULL,NULL),(46,14,'Trombone 2',2,0,NULL,NULL),(47,14,'Trombone 3',2,0,NULL,NULL),(48,14,'Baritone B.C.',2,0,NULL,NULL),(49,14,'Baritone T.C.',1,0,NULL,NULL),(50,14,'Tuba',4,0,NULL,NULL),(51,14,'String Bass',2,0,NULL,NULL),(52,14,'Mallet Percussion',1,0,NULL,NULL),(53,14,'Timpani',1,0,NULL,NULL),(54,14,'Percussion 1',2,0,NULL,NULL),(55,14,'Percussion 2',2,0,NULL,NULL),(56,12,'B♭ Clarinet 3',4,0,NULL,NULL),(57,12,'Full Score',1,0,NULL,NULL),(58,12,'C Piccolo',1,0,NULL,NULL),(59,12,'Flute',8,0,NULL,NULL),(60,12,'Oboe',2,0,NULL,NULL),(61,12,'E♭ Clarinet',1,0,NULL,NULL),(62,12,'B♭ Clarinet 1',4,0,NULL,NULL),(63,12,'B♭ Clarinet 2',4,0,NULL,NULL),(64,12,'B♭ Clarinet 3',4,0,NULL,NULL),(65,12,'E♭ Alto Clarinet',2,0,NULL,NULL),(66,12,'B♭ Bass Clarinet',2,0,NULL,NULL),(67,12,'Bassoon',2,0,NULL,NULL),(68,12,'E♭ Alto Saxophone 1',2,0,NULL,NULL),(69,12,'E♭ Alto Saxophone 2',2,0,NULL,NULL),(70,12,'B♭ Tenor Saxophone',2,0,NULL,NULL),(71,12,'E♭ Baritone Saxophone',1,0,NULL,NULL),(72,12,'B♭ Cornet 1',4,0,NULL,NULL),(73,12,'B♭ Cornet 2',4,0,NULL,NULL),(74,12,'B♭ Cornet 3',4,0,NULL,NULL),(75,12,'F Horn 1 & 2',4,0,NULL,NULL),(76,12,'F Horn 3 & 4',4,0,NULL,NULL),(77,12,'Trombone 1',2,0,NULL,NULL),(78,12,'Trombone 2',2,0,NULL,NULL),(79,12,'Trombone 3',2,0,NULL,NULL),(80,12,'Baritone T.C.',3,0,NULL,NULL),(81,12,'Baritone B.C.',3,0,NULL,NULL),(82,12,'Tuba',4,0,NULL,NULL),(83,12,'Basses',6,0,NULL,NULL),(84,12,'String Bass',1,0,NULL,NULL),(85,12,'Percussion',6,0,NULL,NULL),(86,12,'Timpani',1,0,NULL,NULL),(87,12,'Bells',1,0,NULL,NULL),(88,670,'Full Score',1,0,NULL,NULL),(89,670,'C Flute',6,0,NULL,NULL),(90,670,'Oboe',2,0,NULL,NULL),(91,670,'B♭ Clarinet 1',4,0,NULL,NULL),(92,670,'B♭ Clarinet 2',4,0,NULL,NULL),(93,670,'B♭ Bass Clarinet',2,0,NULL,NULL),(94,670,'Bassoon',2,0,NULL,NULL),(95,670,'E♭ Alto Saxophone',2,0,NULL,NULL),(96,670,'B♭ Tenor Saxophone',1,0,NULL,NULL),(97,670,'E♭ Baritone Saxophone',1,0,NULL,NULL),(98,670,'B♭ Trumpet 1',4,0,NULL,NULL),(99,670,'B♭ Trumpet 2',4,0,NULL,NULL),(100,670,'F Horn',4,0,NULL,NULL),(101,670,'Trombone',4,0,NULL,NULL),(102,670,'Baritone B.C.',2,0,NULL,NULL),(103,670,'Baritone T.C.',1,0,NULL,NULL),(104,670,'Tuba',4,0,NULL,NULL),(105,670,'Mallet Percussion (Bells)',1,0,NULL,NULL),(106,670,'Percussion 1 (SD, BD)',2,0,NULL,NULL),(107,670,'Percussion 2 (Sus. Cym., Triangle, Sleigh Bells, Cowbell)',3,0,NULL,NULL),(108,670,'E♭ Horn',4,0,NULL,NULL),(109,670,'B♭ Trombone T.C.',3,0,NULL,NULL),(110,670,'E♭ Tuba T.C.',4,0,NULL,NULL),(111,670,'B♭ Tuba T.C.',4,0,NULL,NULL),(112,16,'Conductor',1,0,NULL,NULL),(113,16,'Piccolo',1,0,NULL,NULL),(114,16,'Flute 1 & 2',8,0,NULL,NULL),(115,16,'Oboe',2,0,NULL,NULL),(116,16,'Bassoon',2,0,NULL,NULL),(117,16,'B♭ Clarinet 1',4,0,NULL,NULL),(118,16,'B♭ Clarinet 2',4,0,NULL,NULL),(119,16,'B♭ Clarinet 3',4,0,NULL,NULL),(120,16,'E♭ Alto Clarinet',1,0,NULL,NULL),(121,16,'B♭ Bass Clarinet',2,0,NULL,NULL),(122,16,'E♭ Alto Saxophone 1',2,0,NULL,NULL),(123,16,'E♭ Alto Saxophone 2',2,0,NULL,NULL),(124,16,'B♭ Tenor Saxophone',1,0,NULL,NULL),(125,16,'E♭ Baritone Saxophone',1,0,NULL,NULL),(126,16,'B♭ Cornet/Trumpet 1',3,0,NULL,NULL),(127,16,'B♭ Cornet/Trumpet 2',3,0,NULL,NULL),(128,16,'B♭ Cornet/Trumpet 3',3,0,NULL,NULL),(129,16,'F Horn 1 & 2',2,0,NULL,NULL),(130,16,'F Horn 3 & 4',2,0,NULL,NULL),(131,16,'Trombone 1',2,0,NULL,NULL),(132,16,'Trombone 2',2,0,NULL,NULL),(133,16,'Trombone 3',2,0,NULL,NULL),(134,16,'Baritone B.C.',2,0,NULL,NULL),(135,16,'Baritone T.C.',2,0,NULL,NULL),(136,16,'Basses',4,0,NULL,NULL),(137,16,'String Bass',1,0,NULL,NULL),(138,16,'Timpani',1,0,NULL,NULL),(139,16,'Mallets (Bells, Chimes)',2,0,NULL,NULL),(140,16,'Drums',3,0,NULL,NULL),(141,17,'Full Score',1,0,NULL,NULL),(142,17,'Conductor',1,0,NULL,NULL),(143,17,'Flute 1 & 2',5,0,NULL,NULL),(144,17,'Flute 3 (Piccolo)',1,0,NULL,NULL),(145,17,'Oboe 1 & 2',2,0,NULL,NULL),(146,17,'Bassoon 1 & 2',2,0,NULL,NULL),(147,17,'E♭ Clarinet',1,0,NULL,NULL),(148,17,'B♭ Clarinet 1',4,0,NULL,NULL),(149,17,'B♭ Clarinet 2',4,0,NULL,NULL),(150,17,'B♭ Clarinet 3',4,0,NULL,NULL),(151,17,'E♭ Alto Clarinet',2,0,NULL,NULL),(152,17,'B♭ Bass Clarinet',2,0,NULL,NULL),(153,17,'E♭ Alto Saxophone 1',1,0,NULL,NULL),(154,17,'E♭ Alto Saxophone 2',1,0,NULL,NULL),(155,17,'B♭ Tenor Saxophone',1,0,NULL,NULL),(156,17,'E♭ Baritone Saxophone',1,0,NULL,NULL),(157,17,'B♭ Cornet 1',3,0,NULL,NULL),(158,17,'B♭ Cornet 2',3,0,NULL,NULL),(159,17,'B♭ Cornet 3',3,0,NULL,NULL),(160,17,'F Horn 1 & 2',2,0,NULL,NULL),(161,17,'F Horn 3 & 4',2,0,NULL,NULL),(162,17,'Trombone 1',2,0,NULL,NULL),(163,17,'Trombone 2',1,0,NULL,NULL),(164,17,'Trombone 3',1,0,NULL,NULL),(165,17,'Baritone T.C.',2,0,NULL,NULL),(166,17,'Baritone B.C.',2,0,NULL,NULL),(167,17,'Tuba',6,0,NULL,NULL),(168,17,'String Bass',1,0,NULL,NULL),(169,17,'Timpani',1,0,NULL,NULL),(170,17,'Percussion 1 (Bess, Xylo., Chimes)',2,0,NULL,NULL),(171,17,'Percussion 2 (SD, BD, Pair of Cym., Sus. Cym., Triangle, Sleigh Bells)',2,0,NULL,NULL),(172,18,'Conductor',1,0,NULL,NULL),(173,18,'Flute/Piccolo 1',4,0,NULL,NULL),(174,18,'Flute 2',4,0,NULL,NULL),(175,18,'Oboe',2,0,NULL,NULL),(176,18,'Bassoon',2,0,NULL,NULL),(177,18,'B♭ Clarinet 1',4,0,NULL,NULL),(178,18,'B♭ Clarinet 2',4,0,NULL,NULL),(179,18,'B♭ Clarinet 3',4,0,NULL,NULL),(180,18,'E♭ Alto Clarinet',1,0,NULL,NULL),(181,18,'B♭ Bass Clarinet',1,0,NULL,NULL),(182,18,'E♭ Alto Saxophone 1',2,0,NULL,NULL),(183,18,'E♭ Alto Saxophone 2',2,0,NULL,NULL),(184,18,'B♭ Tenor Saxophone',2,0,NULL,NULL),(185,18,'E♭ Baritone Saxophone',1,0,NULL,NULL),(186,18,'B♭ Cornet 1',3,0,NULL,NULL),(187,18,'B♭ Cornet 2',3,0,NULL,NULL),(188,18,'B♭ Cornet 3',3,0,NULL,NULL),(189,18,'F Horn 1 & 2',2,0,NULL,NULL),(190,18,'F Horn 3 & 4',2,0,NULL,NULL),(191,18,'Trombone 1',2,0,NULL,NULL),(192,18,'Trombone 2',1,0,NULL,NULL),(193,18,'Trombone 3',1,0,NULL,NULL),(194,18,'Baritone B.C.',2,0,NULL,NULL),(195,18,'Baritone T.C.',2,0,NULL,NULL),(196,18,'String Bass',1,0,NULL,NULL),(197,18,'Drums (Opt. Set)',2,0,NULL,NULL),(198,18,'Timpani/Sleigh Bells',1,0,NULL,NULL),(199,18,'Mallets (Chimes, Bells)',1,0,NULL,NULL),(260,19,'Full Score',1,0,NULL,'0000-00-00'),(261,19,'Flute (Piccolo)',10,0,NULL,'0000-00-00'),(262,19,'Oboe',2,0,NULL,'0000-00-00'),(263,19,'Bassoon',2,0,NULL,'0000-00-00'),(264,19,'E♭ Clarinet',1,0,NULL,'0000-00-00'),(265,19,'B♭ Clarinet 1',4,0,NULL,'0000-00-00'),(266,19,'B♭ Clarinet 2',4,0,NULL,'0000-00-00'),(267,19,'B♭ Clarinet 3',4,0,NULL,'0000-00-00'),(268,19,'E♭ Alto Clarinet',1,0,NULL,'0000-00-00'),(269,19,'B♭ Bass Clarinet',2,0,NULL,'0000-00-00'),(270,19,'E♭ Contra Alto Clarinet',1,0,NULL,'0000-00-00'),(271,19,'E♭ Alto Saxophone 1',2,0,NULL,'0000-00-00'),(272,19,'E♭ Alto Saxophone 2',2,0,NULL,'0000-00-00'),(273,19,'B♭ Tenor Saxophone',2,0,NULL,'0000-00-00'),(274,19,'E♭ Baritone Saxophone',2,0,NULL,'0000-00-00'),(275,19,'B♭ Trumpet 1',3,0,NULL,'0000-00-00'),(276,19,'B♭ Trumpet 2',3,0,NULL,'0000-00-00'),(277,19,'B♭ Trumpet 3',3,0,NULL,'0000-00-00'),(278,19,'F Horn 1 & 2',2,0,NULL,'0000-00-00'),(279,19,'F Horn 3 & 4',2,0,NULL,'0000-00-00'),(280,19,'Trombone 1',2,0,NULL,'0000-00-00'),(281,19,'Trombone 2',2,0,NULL,'0000-00-00'),(282,19,'Trombone 3',2,0,NULL,'0000-00-00'),(283,19,'Trombone',42,0,'Rikin Gurditta','2000-09-29'),(284,677,'Roland TR808',808,1,'Jaxone','2017-01-20');
/*!40000 ALTER TABLE `Part` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-21 20:47:25
