-- Progettazione Web 
DROP DATABASE if exists dressrobe; 
CREATE DATABASE dressrobe; 
USE dressrobe; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: dressrobe
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `carrello`
--

DROP TABLE IF EXISTS `carrello`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrello` (
  `IDCarrello` int(11) NOT NULL AUTO_INCREMENT,
  `Account` varchar(50) NOT NULL,
  `Prodotto` int(50) NOT NULL,
  `Prezzo` double(10,2) NOT NULL,
  `Taglia` varchar(50) NOT NULL,
  PRIMARY KEY (`IDCarrello`),
  KEY `Account` (`Account`),
  KEY `Prodotto` (`Prodotto`),
  CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`Account`) REFERENCES `users` (`Utente`) ON DELETE CASCADE,
  CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`Prodotto`) REFERENCES `prodotti` (`IDProdotto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrello`
--

LOCK TABLES `carrello` WRITE;
/*!40000 ALTER TABLE `carrello` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrello` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `IDCategoria` int(10) NOT NULL,
  `NomeCategoria` varchar(50) NOT NULL,
  `Immagine` varchar(100) DEFAULT NULL,
  `Descrizione` varchar(250) NOT NULL,
  PRIMARY KEY (`IDCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Pantaloni','Cattura.jpg','xxxxxxxxxxxxxxxxxxxxxxxxxxxx'),(2,'Scarpe','sfondo3.jpg','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),(3,'Maglie','bg4.jpg','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),(4,'Accessori','over.jpg','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),(5,'Giacche','Cattura6.jpg','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordine`
--

DROP TABLE IF EXISTS `ordine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordine` (
  `IDOrdine` int(11) NOT NULL AUTO_INCREMENT,
  `AccountUser` varchar(50) NOT NULL,
  `NomeProdotto` varchar(50) NOT NULL,
  `Prezzo` double(10,2) NOT NULL,
  `Taglia` varchar(50) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDOrdine`),
  KEY `AccountUser` (`AccountUser`),
  CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`AccountUser`) REFERENCES `users` (`Utente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordine`
--

LOCK TABLES `ordine` WRITE;
/*!40000 ALTER TABLE `ordine` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodotti` (
  `IDProdotto` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `ProdottoImmagine` varchar(100) DEFAULT NULL,
  `Descrizione` varchar(100) NOT NULL,
  `Prezzo` double(10,2) NOT NULL,
  `Categoria` int(10) NOT NULL,
  PRIMARY KEY (`IDProdotto`),
  KEY `Categoria` (`Categoria`),
  CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categoria` (`IDCategoria`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'Giacca lunga','h.jpg','Descrizione',76.00,5),(2,'Occhiali da vista','z2.jpg','Descrizione',145.00,4),(3,'Giubbotto in camoscio ','m2.jpg','Descrizione',76.50,5),(4,'Giacca color magenta','a2.jpg','Descrizione',56.00,5),(5,'Chinos marrone','b.jpg','Descrizione',44.50,1),(6,'Chinos grigio','b2.jpg','Descrizione',45.50,1),(7,'Tesa larga','i.jpg','Descrizione',17.00,4),(8,'Occhiali da sole','y2.jpg','Descrizione',85.00,4),(9,'Scarpe da ginnastica','m.jpg','Descrizione',45.50,2),(10,'T-shirt nera','w2.jpg','Descrizione',5.50,3),(11,'Scarpe di pelle','f.jpg','Descrizione',65.50,2),(12,'Scarpe in camoscio','r.jpg','Descrizione',84.00,2),(13,'Jeans blu','e2.jpg','Descrizione',50.00,1),(14,'Felpa grigia','fa.jpg','Descrizione',46.00,3);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taglia`
--

DROP TABLE IF EXISTS `taglia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taglia` (
  `IDTaglia` int(11) NOT NULL AUTO_INCREMENT,
  `NomeTaglia` varchar(50) NOT NULL,
  `ProdottoTaglia` int(50) NOT NULL,
  PRIMARY KEY (`IDTaglia`),
  KEY `ProdottoTaglia` (`ProdottoTaglia`),
  CONSTRAINT `taglia_ibfk_1` FOREIGN KEY (`ProdottoTaglia`) REFERENCES `prodotti` (`IDProdotto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taglia`
--

LOCK TABLES `taglia` WRITE;
/*!40000 ALTER TABLE `taglia` DISABLE KEYS */;
INSERT INTO `taglia` VALUES (1,'S',1),(2,'M',1),(3,'L',1),(4,'XL',1),(5,'XXL',1),(6,'S',3),(7,'M',3),(8,'L',3),(9,'XL',3),(10,'XXL',3),(11,'S',4),(12,'M',4),(13,'L',4),(14,'XL',4),(15,'XXL',4),(16,'S',5),(17,'M',5),(18,'L',5),(19,'XL',5),(20,'XXL',5),(21,'S',6),(22,'M',6),(23,'L',6),(24,'XL',6),(25,'XXL',6),(26,'40',9),(27,'41',9),(28,'42',9),(29,'43',9),(30,'44',9),(31,'S',10),(32,'M',10),(33,'L',10),(34,'XL',10),(35,'XXL',10),(36,'40',11),(37,'41',11),(38,'42',11),(39,'43',11),(40,'44',11),(41,'40',12),(42,'41',12),(43,'42',12),(44,'43',12),(45,'44',12),(46,'S',13),(47,'M',13),(48,'L',13),(49,'XL',13),(50,'XXL',13),(51,'S',14),(52,'M',14),(53,'L',14),(54,'XL',14),(55,'XXL',14);
/*!40000 ALTER TABLE `taglia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `Utente` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Indirizzo` varchar(100) DEFAULT NULL,
  `Civico` varchar(50) DEFAULT NULL,
  `Pwd` varchar(50) NOT NULL,
  `Admin` int(11) NOT NULL,
  PRIMARY KEY (`Utente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Angelo','Angelo','Carbone','Carbobest@gmail.com','373896625','Via Carboni','1','908bfe7788a0fa4c3eff7698a5782f91',0),('bill','bill','mono','monobill6@gmail.com','3466578274','Via Galli','22','e8375d7cd983efcbf956da5937050ffc',1),('Davide','Davide','Coccomini','Coccoda@gmail.com','3563394764','Via Nani','7','446fca5553df49ad9c6348cf1ff71d51',0),('franz','franz','mono','franzmono62@gmail.com','3335867081','Via Legli','42','7f8f98248522f399e9f98a29fb149eee',0),('giada','giada','briganti','giadina96@hotmail.it','3477568790','Via Ridensi','78','6e6bc4e49dd477ebc98ef4046c067b5f',0),('Leo','leonardo','Turchetti','leoturco@gmail.com','3476939460','Via Belli','17','d5a7ddc520d27b3058b65e7b2bc755ed',0),('Mirko','Mirko','Di Lucia','Mirko@hotmail.it','3325675205','Via Crispi','98','13592f2caf86af30572a825229a2a8dc',0);
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

-- Dump completed on 2019-01-26 11:03:58
