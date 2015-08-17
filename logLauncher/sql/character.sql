-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cowrea
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `char_class`
--

DROP TABLE IF EXISTS `char_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `char_class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `class_name_de` varchar(45) NOT NULL,
  `class_name_en` varchar(45) NOT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `char_class`
--

LOCK TABLES `char_class` WRITE;
/*!40000 ALTER TABLE `char_class` DISABLE KEYS */;
INSERT INTO `char_class` VALUES (1,'Magier','Mage'),(2,'Hexenmeister','Warlock'),(3,'Priester','Priest'),(4,'Schurke','Rogue'),(5,'Druide','Druid'),(6,'Jäger','Hunter'),(7,'Schamane','Shaman'),(8,'Krieger','Warrior'),(9,'Paladin','Paladin'),(10,'Feind','Enemy');
/*!40000 ALTER TABLE `char_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `character`
--

DROP TABLE IF EXISTS `character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character` (
  `id` int(11) NOT NULL COMMENT 'Autoincrement Primary Key',
  `char_name_de` varchar(255) NOT NULL COMMENT 'German Name',
  `char_name_en` varchar(255) NOT NULL COMMENT 'English Name',
  `char_faction` int(11) NOT NULL COMMENT 'Ally, Enemy, Pet, etc.',
  `class` int(11) NOT NULL COMMENT 'Priest, Druid, Paladin, etc.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`char_name_de`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character`
--

LOCK TABLES `character` WRITE;
/*!40000 ALTER TABLE `character` DISABLE KEYS */;
/*!40000 ALTER TABLE `character` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `character_type`
--

DROP TABLE IF EXISTS `character_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character_type` (
  `id_character_type` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_character_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character_type`
--

LOCK TABLES `character_type` WRITE;
/*!40000 ALTER TABLE `character_type` DISABLE KEYS */;
INSERT INTO `character_type` VALUES (1,'NPC'),(2,'PC');
/*!40000 ALTER TABLE `character_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combat_action`
--

DROP TABLE IF EXISTS `combat_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combat_action` (
  `combatID` int(11) NOT NULL AUTO_INCREMENT,
  `combat_en` varchar(45) NOT NULL,
  PRIMARY KEY (`combatID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combat_action`
--

LOCK TABLES `combat_action` WRITE;
/*!40000 ALTER TABLE `combat_action` DISABLE KEYS */;
INSERT INTO `combat_action` VALUES (1,'Hit'),(2,'Crit'),(3,'Glancing'),(4,'Block'),(5,'Block(Crit)'),(6,'Ressist'),(7,'Pary'),(8,'Dodge'),(9,'Miss'),(10,'Block(Glancing)'),(11,'Absorb'),(12,'Immun'),(13,'Heal'),(14,'HOT'),(15,'Heal Crit'),(16,'Mana'),(17,'Rage'),(18,'Energy'),(19,'DOT'),(20,'Dies'),(21,'Fall Damage');
/*!40000 ALTER TABLE `combat_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combat_log`
--

DROP TABLE IF EXISTS `combat_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combat_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Autoincrement ID',
  `timestamp` datetime DEFAULT NULL COMMENT 'Timestamp from Log_File',
  `event` int(11) DEFAULT NULL COMMENT 'Raidname as Integer, ZG, MC, Ony, etc.',
  `trigger` varchar(50) DEFAULT NULL COMMENT 'Source-User of this String',
  `target` varchar(50) DEFAULT NULL COMMENT 'Target-User of this String',
  `separator` int(11) DEFAULT NULL COMMENT 'String to seppparate Values from Log_File',
  `value` int(11) DEFAULT NULL COMMENT 'Heal, Damage',
  `value_type` int(11) DEFAULT NULL COMMENT 'Dodge, Hit, Crit, Resist, etc.',
  `value2` int(11) DEFAULT NULL COMMENT 'Reduced Value (Glancing, Resist, Absorb)',
  `value2_type` int(11) DEFAULT NULL COMMENT 'Kind of Reduce_Type (Glancing, Resist, etc.)',
  `spell` varchar(50) DEFAULT NULL COMMENT 'SpellID, Given from Blizzard',
  `damage_school` int(11) DEFAULT NULL COMMENT 'Holy, Physical, Shadow, Frost, etc.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combat_log`
--

LOCK TABLES `combat_log` WRITE;
/*!40000 ALTER TABLE `combat_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `combat_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `damage_school`
--

DROP TABLE IF EXISTS `damage_school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `damage_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `damage_school`
--

LOCK TABLES `damage_school` WRITE;
/*!40000 ALTER TABLE `damage_school` DISABLE KEYS */;
INSERT INTO `damage_school` VALUES (1,'Physical'),(2,'Holy'),(3,'Arcane'),(4,'Fire'),(5,'Nature'),(6,'Frost'),(7,'Shadow');
/*!40000 ALTER TABLE `damage_school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instanz`
--

DROP TABLE IF EXISTS `instanz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instanz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shortcut` varchar(45) DEFAULT NULL,
  `english` varchar(45) DEFAULT NULL,
  `german` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instanz`
--

LOCK TABLES `instanz` WRITE;
/*!40000 ALTER TABLE `instanz` DISABLE KEYS */;
INSERT INTO `instanz` VALUES (1,'BFD','Blackfathom Deeps','Tiefschwarze Grotte'),(2,'DM(E)','Dire Maul East','Düsterbruch Ost'),(3,'DM(N)','Dire Maul North','Düsterbruch Nord'),(4,'DM(W)','Dire Maul West','Düsterbruch West'),(5,'Mara','Maraudon','Maraudon'),(6,'Ony','Onyxia\'s Lair','Onyxias Hort'),(7,'RFC','Ragefire Chasm','Flammenschlund'),(8,'RFD','Razorfen Downs','Hügel der Klingenhauer'),(9,'RFK','Razorfen Kraul','Kral der Klingenhauer'),(10,'AQ20','Ruins of Ahn\'Qiraj','Ruinen von Ahn\'Qiraj'),(11,'AQ40','Temple of Ahn\'Qiraj','Tempel von Ahn\'Qiraj'),(12,'WC','Wailing Caverns','Höhle des Wegladerens'),(13,'ZF','Zul\'Farrak','Zul\'Farrak'),(14,'BRD','Blackrock Depths','Schwarzfelstiefen'),(15,'UBRS','Upper Blackrock Spire','Obere Schwarzfelsspitze'),(16,'LBRS','Lower Blackrock Spire','Untere Schwarzfelsspitze'),(17,'BWL','Blackwing Lair','Pechschwingenhort'),(18,'DM','Deadmines','Todesminen'),(19,'Gnome','Gnomeregan','Gnomeregan'),(20,'MC','Molten Core','Geschmolzener Kern'),(21,'Nax','Naxxramas','Naxxramas'),(22,'SM','Scarlet Monastery','Scharlachrotes Kloster'),(23,'Scholo','Scholomance','Scholomance'),(24,'SFK','Shadowfang Keep','Burg Schattenfang'),(25,'Stockade','Stockade','Verlies'),(26,'Strat','Stratholme','Stratholme'),(27,'ST','Sunken Temple','Versunkener Tempel'),(28,'Ulda','Uldaman','Uldaman'),(29,'ZG','Zul_Gurub','Zul\'Gurub');
/*!40000 ALTER TABLE `instanz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seperator`
--

DROP TABLE IF EXISTS `seperator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seperator` (
  `id_trennwort` int(11) NOT NULL AUTO_INCREMENT,
  `seperator_string` varchar(45) DEFAULT NULL,
  `trigger_position` int(11) DEFAULT NULL COMMENT 'Required for Import Log-File\n1=bevore seperator-String\n2=after seperator-String',
  PRIMARY KEY (`id_trennwort`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seperator`
--

LOCK TABLES `seperator` WRITE;
/*!40000 ALTER TABLE `seperator` DISABLE KEYS */;
INSERT INTO `seperator` VALUES (1,'gains',1),(2,'fades from',1),(3,'critically heals',1),(4,'is afflicted by',1),(5,'begins to cast',1),(6,'reflects',1),(7,'fails to cast',1),(8,'fail to cast',1),(9,'equipped items suffer a 10% durability loss.',1),(10,'attacks',1),(11,'hits',1),(12,'crits',1),(13,'heals',1),(14,'was resisted',1),(15,'are afflicted by',1),(16,'misses',1),(17,'suffers',1),(18,'dies',1),(19,'was parried',1),(20,'have slain',1),(21,'is slain by',1),(22,'reputation',1),(23,'is absorbed',1),(24,'was dodged',1),(25,'attack.',1),(26,'missed',1),(27,'fails',1),(28,'miss',1),(29,'cast',1),(30,'absorb',1),(31,'begins eating a',1),(32,'failed',1),(33,'fall and lose',1),(34,'falls and loses',1),(35,'is removed',1),(36,'die',1),(37,'was evaded.',1),(38,'creates',1),(39,'fades',2),(40,'suffer',1),(41,'hit',1),(42,'gain',1),(43,'reflect',1),(44,'for',1),(46,' ',NULL);
/*!40000 ALTER TABLE `seperator` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-13 16:10:48
