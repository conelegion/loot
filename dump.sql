CREATE DATABASE  IF NOT EXISTS `loot` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `loot`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: loot
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `atributo`
--

DROP TABLE IF EXISTS `atributo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atributo` (
  `id_atributo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_atributo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atributo`
--

LOCK TABLES `atributo` WRITE;
/*!40000 ALTER TABLE `atributo` DISABLE KEYS */;
INSERT INTO `atributo` VALUES (1,'Strength'),(2,'Agility'),(3,'Intelect');
/*!40000 ALTER TABLE `atributo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'Warrior'),(2,'Paladin'),(3,'Hunter'),(4,'Rogue'),(5,'Priest'),(6,'Death Knight'),(7,'Shaman'),(8,'Mage'),(9,'Warlock'),(10,'Monk'),(11,'Druid');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_raid`
--

DROP TABLE IF EXISTS `horario_raid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_raid` (
  `id_horario_raid` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(45) NOT NULL,
  `inicio` varchar(45) NOT NULL,
  `duracao` varchar(45) NOT NULL,
  `raid_id_raid` int(11) NOT NULL,
  PRIMARY KEY (`id_horario_raid`),
  KEY `fk_horario_raid_raid1_idx` (`raid_id_raid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_raid`
--

LOCK TABLES `horario_raid` WRITE;
/*!40000 ALTER TABLE `horario_raid` DISABLE KEYS */;
INSERT INTO `horario_raid` VALUES (1,'Sábado','15:00','03:00',2),(2,'Domingo','17:00','4:00',2);
/*!40000 ALTER TABLE `horario_raid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loot`
--

DROP TABLE IF EXISTS `loot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loot` (
  `id_loot` int(11) NOT NULL AUTO_INCREMENT,
  `participacoes` int(11) NOT NULL DEFAULT '0',
  `loot_recebidos` int(11) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `character_id_character` int(11) NOT NULL,
  PRIMARY KEY (`id_loot`),
  KEY `fk_loot_character1_idx` (`character_id_character`),
  CONSTRAINT `fk_loot_character1` FOREIGN KEY (`character_id_character`) REFERENCES `personagem` (`id_character`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loot`
--

LOCK TABLES `loot` WRITE;
/*!40000 ALTER TABLE `loot` DISABLE KEYS */;
/*!40000 ALTER TABLE `loot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personagem`
--

DROP TABLE IF EXISTS `personagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personagem` (
  `id_character` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `race_id_race` int(11) DEFAULT NULL,
  `spec_id_spec` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `user_id_user` int(11) DEFAULT NULL,
  `raid_id_raid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_character`),
  KEY `fk_character_race1_idx` (`race_id_race`),
  KEY `fk_character_spec1_idx` (`spec_id_spec`),
  KEY `fk_character_user1_idx` (`user_id_user`),
  KEY `fk_character_raid1_idx` (`raid_id_raid`),
  CONSTRAINT `fk_character_race1` FOREIGN KEY (`race_id_race`) REFERENCES `race` (`id_race`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_raid1` FOREIGN KEY (`raid_id_raid`) REFERENCES `raid` (`id_raid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_spec1` FOREIGN KEY (`spec_id_spec`) REFERENCES `spec` (`id_spec`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personagem`
--

LOCK TABLES `personagem` WRITE;
/*!40000 ALTER TABLE `personagem` DISABLE KEYS */;
INSERT INTO `personagem` VALUES (1,'ZÃ³dd',2,21,1,1,2);
/*!40000 ALTER TABLE `personagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `race`
--

DROP TABLE IF EXISTS `race`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race` (
  `id_race` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_race`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race`
--

LOCK TABLES `race` WRITE;
/*!40000 ALTER TABLE `race` DISABLE KEYS */;
INSERT INTO `race` VALUES (1,'Human'),(2,'Orc'),(3,'Dwarf'),(4,'Night Elf'),(5,'Undead'),(6,'Tauren'),(7,'Gnome'),(8,'Troll'),(9,'Goblin'),(10,'Blood Elf'),(11,'Draenei'),(12,'Worgen'),(13,'Pandaren');
/*!40000 ALTER TABLE `race` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raid`
--

DROP TABLE IF EXISTS `raid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raid` (
  `id_raid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `observacao` varchar(45) DEFAULT NULL,
  `user_id_user` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_raid`),
  KEY `fk_raid_user1_idx` (`user_id_user`),
  CONSTRAINT `fk_raid_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raid`
--

LOCK TABLES `raid` WRITE;
/*!40000 ALTER TABLE `raid` DISABLE KEYS */;
INSERT INTO `raid` VALUES (1,'Core 1','teste teste',2,1),(2,'teste',NULL,1,NULL),(10,'Nenhum',NULL,NULL,1);
/*!40000 ALTER TABLE `raid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Tank'),(2,'Healer'),(3,'Melee'),(4,'Ranged');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec`
--

DROP TABLE IF EXISTS `spec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec` (
  `id_spec` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `class_id_class` int(11) NOT NULL,
  `role_id_role` int(11) DEFAULT NULL,
  `atributo_id_atributo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_spec`),
  KEY `fk_spec_class_idx` (`class_id_class`),
  KEY `fk_spec_role_idx` (`role_id_role`),
  KEY `fk_spec_atributo_idx` (`atributo_id_atributo`),
  CONSTRAINT `fk_spec_atributo` FOREIGN KEY (`atributo_id_atributo`) REFERENCES `atributo` (`id_atributo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spec_class` FOREIGN KEY (`class_id_class`) REFERENCES `class` (`id_class`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_spec_role` FOREIGN KEY (`role_id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec`
--

LOCK TABLES `spec` WRITE;
/*!40000 ALTER TABLE `spec` DISABLE KEYS */;
INSERT INTO `spec` VALUES (1,'Arms',1,3,1),(2,'Fury',1,3,1),(3,'Protection',1,1,1),(4,'Protection',2,1,1),(5,'Retribution',2,3,1),(6,'Holy',2,2,3),(7,'Marksman',3,4,2),(8,'Survival',3,4,2),(9,'Beast Mastery',3,4,2),(10,'Assassination',4,3,2),(11,'Combat',4,3,2),(12,'Subtlety',4,3,2),(13,'Shadow',5,4,3),(14,'Discipline',5,2,3),(15,'Holy',5,2,3),(16,'Blood',6,1,1),(17,'Unholy',6,3,1),(18,'Frost',6,3,1),(19,'Restoration',7,2,3),(20,'Elemental',7,4,3),(21,'Enhancement',7,3,2),(22,'Fire',8,4,3),(23,'Frost',8,4,3),(24,'Arcane',8,4,3),(25,'Destruction',9,4,3),(26,'Demonology',9,4,3),(27,'Affliction',9,4,3),(28,'Brewmaster',10,1,2),(29,'Windwalker',10,3,2),(30,'Mistweaver',10,2,3),(31,'Restoration',11,2,3),(32,'Balance',11,4,3),(33,'Feral',11,3,2),(34,'Guardian',11,1,2);
/*!40000 ALTER TABLE `spec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Guilherme','guilherme@','12345','ZÃ³d',NULL),(2,'Rafael','rafael@','12345','GrÃ­ma',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-06 17:04:27
