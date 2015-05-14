-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: oculus
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `a_ecrit`
--

DROP TABLE IF EXISTS `a_ecrit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_ecrit` (
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_article`),
  KEY `FK_a_ecrit_id_article` (`id_article`),
  CONSTRAINT `FK_a_ecrit_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  CONSTRAINT `FK_a_ecrit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_ecrit`
--

LOCK TABLES `a_ecrit` WRITE;
/*!40000 ALTER TABLE `a_ecrit` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_ecrit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_pour`
--

DROP TABLE IF EXISTS `a_pour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_pour` (
  `id_article` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_article`,`id_categorie`),
  KEY `FK_a_pour_id_categorie` (`id_categorie`),
  CONSTRAINT `FK_a_pour_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  CONSTRAINT `FK_a_pour_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_pour`
--

LOCK TABLES `a_pour` WRITE;
/*!40000 ALTER TABLE `a_pour` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_pour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `Ville` char(25) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `adresse_1` char(25) DEFAULT NULL,
  `adresse_2` char(25) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse`
--

LOCK TABLES `adresse` WRITE;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
/*!40000 ALTER TABLE `adresse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apparente`
--

DROP TABLE IF EXISTS `apparente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apparente` (
  `id_categorie` int(11) NOT NULL,
  `id_categorie_categorie_articles` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`,`id_categorie_categorie_articles`),
  KEY `FK_apparente_id_categorie_categorie_articles` (`id_categorie_categorie_articles`),
  CONSTRAINT `FK_apparente_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  CONSTRAINT `FK_apparente_id_categorie_categorie_articles` FOREIGN KEY (`id_categorie_categorie_articles`) REFERENCES `categorie_articles` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apparente`
--

LOCK TABLES `apparente` WRITE;
/*!40000 ALTER TABLE `apparente` DISABLE KEYS */;
/*!40000 ALTER TABLE `apparente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` char(25) DEFAULT NULL,
  `date_article` date DEFAULT NULL,
  `contenu` varchar(65) DEFAULT NULL,
  `pseudo` char(25) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'blabla',NULL,'this is the new shit',''),(2,'Get jinxed',NULL,'Wana join me?\r\nComme and play!\r\nBut I might shoot you,\r\nIn your f','');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_articles`
--

DROP TABLE IF EXISTS `categorie_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_articles` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_articles`
--

LOCK TABLES `categorie_articles` WRITE;
/*!40000 ALTER TABLE `categorie_articles` DISABLE KEYS */;
INSERT INTO `categorie_articles` VALUES (1,'nouvelles technologies'),(2,'ordinateur'),(3,'console'),(4,'mobile'),(5,'objets connectés'),(6,'jeux'),(7,'consoles'),(8,'PC');
/*!40000 ALTER TABLE `categorie_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messagerie` (
  `id_utilisateur` int(11) NOT NULL,
  `id_utilisateur_1` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_utilisateur_1`),
  KEY `FK_messagerie_id_utilisateur_1` (`id_utilisateur_1`),
  CONSTRAINT `FK_messagerie_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userId`),
  CONSTRAINT `FK_messagerie_id_utilisateur_1` FOREIGN KEY (`id_utilisateur_1`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messagerie`
--

LOCK TABLES `messagerie` WRITE;
/*!40000 ALTER TABLE `messagerie` DISABLE KEYS */;
/*!40000 ALTER TABLE `messagerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statut` (
  `nom_grade` char(25) NOT NULL,
  `niveau_droit` int(11) DEFAULT NULL,
  PRIMARY KEY (`nom_grade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suit`
--

DROP TABLE IF EXISTS `suit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suit` (
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_categorie`),
  KEY `FK_suit_id_categorie` (`id_categorie`),
  CONSTRAINT `FK_suit_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  CONSTRAINT `FK_suit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suit`
--

LOCK TABLES `suit` WRITE;
/*!40000 ALTER TABLE `suit` DISABLE KEYS */;
/*!40000 ALTER TABLE `suit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` char(25) DEFAULT NULL,
  `passWord` char(50) DEFAULT NULL,
  `lastName` char(25) DEFAULT NULL,
  `firstName` char(25) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `sexe` char(25) DEFAULT NULL,
  `email` char(25) DEFAULT NULL,
  `hobits` varchar(25) DEFAULT NULL,
  `geekHobits` varchar(25) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `nom_grade` char(25) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK_utilisateur_id_adresse` (`id_adresse`),
  KEY `FK_utilisateur_nom_grade` (`nom_grade`),
  CONSTRAINT `FK_utilisateur_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  CONSTRAINT `FK_utilisateur_nom_grade` FOREIGN KEY (`nom_grade`) REFERENCES `statut` (`nom_grade`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Testeur','root','Premier','Test','0000-00-00','','aria@gmail.com','','',NULL,NULL),(5,'Max','root','Petit','Maxime','0000-00-00','','maxime@gmail.com','','',NULL,NULL),(7,'Wardov','root','Meriguet','Arnaud','1994-01-14','Masculin','marnaudm@gmail.com','Escalade, musique, chant,','J\'aime beaucoup la rÃ©ali',NULL,NULL),(8,'Dickbut','root','Dickinson','Marjin','0000-00-00','','sdfesf@gmail.com','','',NULL,NULL),(9,'voila','rest','derniernom','premiernom','1985-07-16','Homme','adresse.mail@email.com','all','Games & Tech',NULL,NULL);
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

-- Dump completed on 2015-05-14 21:44:48
