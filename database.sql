-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: CowreanLogs
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `ability`
--

DROP TABLE IF EXISTS `ability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ability_name_en` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ability_name_en` (`ability_name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=1254 DEFAULT CHARSET=latin1 COMMENT='Abilitys like Mortal Strike (Warrior), Sinister Strike (Rogue)\r\nSpells like Fireball (Mage), Holy Light (Paladin)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,''),(2,'Abolish Disease'),(3,'Abolish Poison'),(4,'Adrenaline Rush'),(1069,'Aegis of Ragnaros'),(5,'Aftermath'),(6,'Agility'),(7,'Aimed Shot'),(1160,'Alterac Spring Water'),(8,'Ambush'),(9,'Amplify Curse'),(10,'Amplify Damage'),(11,'Amplify Magic'),(12,'Ancient Despair'),(13,'Ancient Dread'),(14,'Ancient Hysteria'),(15,'Anti-Magic Shield'),(1239,'Antimagic Pulse'),(1143,'Aquatic Form'),(16,'Arcane Blast'),(17,'Arcane Bolt'),(18,'Arcane Brilliance'),(19,'Arcane Elixir'),(20,'Arcane Explosion'),(21,'Arcane Focus'),(22,'Arcane Intellect'),(1121,'Arcane Might'),(23,'Arcane Missiles'),(24,'Arcane Power'),(25,'Arcane Protection'),(26,'Arcane Shot'),(27,'Arcing Smash'),(1052,'Argent Dawn'),(28,'Armageddon'),(29,'Armor'),(1084,'Ascendance'),(30,'Aspect of the Cheetah'),(31,'Aspect of the Hawk'),(32,'Aspect of the Monkey'),(33,'Aspect of the Pack'),(34,'Aspect of the Wild'),(35,'Aura of the Blue Dragon'),(36,'Auto Shot'),(37,'Autohit'),(38,'Avatar of Flame'),(39,'Axe Flurry'),(40,'Backhand'),(41,'Backstab'),(42,'Banish'),(43,'Banshee Curse'),(44,'Banshee Wail'),(45,'Barkskin'),(46,'Bash'),(47,'Battle Command'),(48,'Battle Shout'),(49,'Battle Stance'),(1209,'Battlegear of Might'),(50,'Bellowing Roar'),(51,'Berserker Rage'),(52,'Berserker Stance'),(53,'Bite'),(54,'Blackout'),(55,'Blade Flurry'),(56,'Blast Wave'),(57,'Blaze'),(1206,'Blessed Recovery'),(58,'Blessed Sunfruit'),(1106,'Blessed Sunfruit Juice'),(59,'Blessing of Freedom'),(1070,'Blessing of Kings'),(60,'Blessing of Light'),(61,'Blessing of Might'),(62,'Blessing of Protection'),(63,'Blessing of Sacrifice'),(64,'Blessing of Salvation'),(65,'Blessing of Sanctuary'),(66,'Blessing of Wisdom'),(67,'Blind'),(68,'Blink'),(69,'Blizzard'),(70,'Blood Craze'),(71,'Blood Leech'),(72,'Blood Pact'),(73,'Blood Siphon'),(1170,'Bloodfang'),(74,'Bloodlust'),(75,'Bloodrage'),(76,'Bloodthirst'),(1178,'Boar Charge'),(77,'Bomb'),(78,'Bone Armor'),(79,'Bonereaver'),(80,'Brain Wash'),(81,'Breath'),(1186,'Breath of Fire'),(1171,'Brittle Armor'),(82,'Burst of Knowledge'),(83,'Cadaver Worms'),(84,'Call of the Grave'),(85,'Cat Form'),(86,'Cause Insanity'),(87,'Cauterizing Flames'),(88,'Chain Lightning'),(89,'Challenging Roar'),(90,'Challenging Shout'),(91,'Chaos Fire'),(92,'Charge'),(93,'Charge Stun'),(94,'Cheap Shot'),(95,'Chill Nova'),(96,'Chilled'),(97,'Chromatic Infusion'),(98,'Claw'),(99,'Clearcasting'),(100,'Cleave'),(101,'Cloud of Disease'),(102,'Cold Blood'),(103,'Combustion'),(104,'Concentration Aura'),(105,'Concussion Blow'),(106,'Concussive Shot'),(107,'Cone of Cold'),(108,'Cone of Fire'),(109,'Conflagrate'),(1099,'Conflagration'),(110,'Consecration'),(111,'Consuming Shadows'),(112,'Corpse Explosion'),(113,'Corrosive Poison'),(114,'Corrupted Blood'),(115,'Corruption'),(1240,'Counterspell'),(1107,'Counterspell - Silenced'),(1224,'Cower'),(116,'Crest of Retribution'),(117,'Cripple'),(1100,'Crippling Poison'),(118,'Crowd Pummel'),(1122,'Crusader'),(1123,'Crusader Strike'),(1124,'Crusader Strike (2)'),(119,'Crystallize'),(120,'Curse of Agony'),(121,'Curse of Blood'),(122,'Curse of Doom'),(123,'Curse of Impotence'),(124,'Curse of Recklessness'),(125,'Curse of Shadow'),(126,'Curse of the Elements'),(127,'Curse of the Firebrand'),(1201,'Curse of Timmy'),(128,'Curse of Tongues'),(129,'Curse of Weakness'),(130,'Damage Shield'),(1053,'Dampen Magic'),(131,'Dark Plague'),(132,'Dark Rune'),(133,'Dark Strike'),(134,'Dash'),(135,'Dazed'),(1054,'Deaden Magic'),(136,'Deadly Poison'),(137,'Deadly Poison IV'),(138,'Deadly Poison IV (2)'),(139,'Deadly Poison IV (3)'),(140,'Deadly Poison IV (4)'),(141,'Deadly Poison IV (5)'),(142,'Deafening Screech'),(143,'Death Coil'),(144,'Death Wish'),(145,'Decapitate'),(146,'Deep Wound'),(147,'Defensive Stance'),(1136,'Defibrillated!'),(148,'Defiling Aura'),(1210,'Delusions of Jin\'do'),(149,'Demon Armor'),(150,'Demonic Rune'),(151,'Demoralizing Roar'),(152,'Demoralizing Shout'),(153,'Desperate Prayer'),(154,'Detect Greater Invisibility'),(155,'Detect Magic'),(156,'Deterrence'),(157,'Devilsaur Fury'),(158,'Devotion Aura'),(159,'Diamond Flask'),(160,'Dies'),(161,'Dire Bear Form'),(162,'Dire Growl'),(163,'Disarm'),(164,'Disease Burst'),(165,'Disease Cloud'),(166,'Diseased Spit'),(167,'Diseased Spit (2)'),(1137,'Disengage'),(168,'Disjunction'),(169,'Distilled Wisdom'),(1241,'Distracting Shot'),(1187,'Dive'),(170,'Divine Favor'),(171,'Divine Intervention'),(1085,'Divine Protection'),(172,'Divine Shield'),(173,'Divine Spirit'),(174,'Dominate Mind'),(175,'Dragonbane'),(176,'Dragonbreath Chili'),(177,'Drain Life'),(178,'Drain Mana'),(179,'Drain Soul'),(1150,'Draining Blow'),(180,'Drunken Rage'),(1161,'Eagle Eye'),(181,'Earth Shock'),(182,'Earthquake'),(1028,'Eiertritt'),(183,'Elemental Fire'),(1055,'Elixir of the Giants'),(184,'Elixir of the Mongoose'),(1056,'Elixir of the Sages'),(185,'Elune'),(186,'Encasing Webs'),(187,'Enrage'),(188,'Entangling Roots'),(189,'Entrapment'),(190,'Enveloping Web'),(191,'Enveloping Webs'),(192,'Ephemeral Power'),(193,'Eruption'),(1207,'Eskhandar'),(194,'Evasion'),(195,'Eviscerate'),(196,'Evocation'),(197,'Execute'),(198,'Exorcism'),(199,'Exploding Cadaver'),(200,'Exploding Shot'),(201,'Exploit Weakness'),(202,'Explosion'),(203,'Explosive Shot'),(204,'Explosive Trap Effect'),(205,'Expose Armor'),(206,'Expose Weakness'),(1179,'Eyes of the Beast'),(207,'Fade'),(208,'Faerie Fire'),(209,'Faerie Fire (Feral)'),(210,'Falldamage'),(211,'Fatal Bite'),(212,'Fatal Wound'),(213,'Fear'),(214,'Fear Ward'),(215,'Feed Pet Effect'),(216,'Feint'),(217,'Fel Domination'),(218,'Fel Stamina'),(219,'Felstriker'),(220,'Feral Charge Effect'),(221,'Ferocious Bite'),(222,'Fiery Burst'),(1242,'Fiery Weapon'),(223,'Fire Blast'),(224,'Fire Blossom'),(225,'Fire Nova'),(226,'Fire Protection'),(227,'Fire Resistance Aura'),(228,'Fire Shield'),(229,'Fire Shield Effect III'),(230,'Fire Storm'),(231,'Fire Strike'),(232,'Fire Vulnerability'),(233,'Fire Vulnerability (2)'),(234,'Fire Vulnerability (3)'),(235,'Fire Vulnerability (4)'),(1144,'Fire Vulnerability (5)'),(236,'Fire Ward'),(237,'Fireball'),(238,'Fireball Volley'),(239,'Firebolt'),(240,'First Aid'),(241,'Fist of Ragnaros'),(242,'Fixate'),(243,'Flame Breath'),(244,'Flame Buffet'),(245,'Flame Buffet (2)'),(246,'Flame Lash'),(247,'Flame Shock'),(248,'Flame Spear'),(249,'Flamecrack'),(250,'Flames'),(251,'Flamestrike'),(1101,'Flaming Cannonball'),(252,'Flash Heal'),(253,'Flash of Light'),(254,'Flask of the Titans'),(1086,'Flip Out'),(255,'Flurry'),(1108,'Focused Casting'),(256,'Forbearance'),(257,'Force of Will'),(258,'Force Punch'),(259,'Force Reactive Disk'),(260,'Forked Lightning'),(261,'Freeze'),(262,'Freezing Trap Effect'),(263,'Frenzied Regeneration'),(264,'Frenzy'),(1109,'Frightalon'),(265,'Frost Armor'),(1110,'Frost Breath'),(266,'Frost Nova'),(1087,'Frost Power'),(1071,'Frost Resistance Aura'),(267,'Frost Shock'),(268,'Frost Shot'),(269,'Frost Trap Aura'),(270,'Frost Ward'),(271,'Frostbite'),(272,'Frostbolt'),(273,'Frostbolt Volley'),(274,'Furbolg Form'),(275,'Furious Howl'),(276,'Furor'),(277,'Fury of Forgewright'),(278,'Fury of Ragnaros'),(1211,'Gahz\'ranka Slam'),(279,'Gargoyle Strike'),(280,'Garrote'),(1243,'Gehennas\' Curse'),(281,'Ghostly Strike'),(282,'Gift of the Wild'),(1111,'Gordok Green Grog'),(283,'Gouge'),(284,'Gout of Flame'),(1040,'GrayTheLord'),(285,'Greater Agility'),(286,'Greater Arcane Elixir'),(1057,'Greater Armor'),(287,'Greater Blessing of Kings'),(288,'Greater Blessing of Light'),(289,'Greater Blessing of Might'),(290,'Greater Blessing of Salvation'),(291,'Greater Blessing of Sanctuary'),(292,'Greater Blessing of Wisdom'),(1145,'Greater Dreamless Sleep'),(293,'Greater Heal'),(294,'Greater Healthstone'),(295,'Greater Intellect'),(1125,'Greater Invisibility'),(296,'Greater Polymorph'),(1072,'Greater Stoneshield'),(1126,'Ground Smash'),(297,'Ground Stomp'),(298,'Ground Tremor'),(1188,'Grow'),(299,'Growl'),(1112,'Gutgore Ripper'),(300,'Hammer of Justice'),(301,'Hammer of Wrath'),(302,'Hamstring'),(303,'Hand of Ragnaros'),(304,'Hand of Thaurissan'),(305,'Head Crack'),(306,'Heal'),(307,'Healing Potion'),(308,'Healing Touch'),(309,'Health Funnel'),(1172,'Health Regeneration'),(1225,'Heated Ground'),(310,'Hellfire'),(311,'Hellfire Effect'),(312,'Hemorrhage'),(313,'Heroic Strike'),(314,'Heroism'),(315,'Hex'),(316,'Hibernate'),(1024,'Himmelsfeger'),(317,'Holy Fire'),(318,'Holy Light'),(319,'Holy Nova'),(320,'Holy Shield'),(321,'Holy Shock'),(1127,'Holy Smite'),(322,'Holy Strength'),(323,'Holy Strike'),(324,'Holy Wrath'),(325,'Hooked Net'),(1031,'Horstfeuer'),(326,'Howl of Terror'),(327,'Hunter'),(1212,'Hunter\'s Mark'),(328,'Hurricane'),(329,'Ice Armor'),(330,'Ice Barrier'),(331,'Ice Block'),(332,'Ignite'),(333,'Ignite (2)'),(334,'Ignite (3)'),(1146,'Ignite (4)'),(1147,'Ignite (5)'),(335,'Ignite Mana'),(336,'Illumination'),(337,'Immolate'),(1138,'Immolation Trap Effect'),(1148,'Impact'),(338,'Impale'),(339,'Impending Doom'),(340,'Improved Blocking'),(1180,'Improved Concussive Shot'),(341,'Improved Wing Clip'),(342,'Incite Flames'),(343,'Incite Flames (2)'),(1058,'Incite Flames (3)'),(1202,'Incite Flames (4)'),(344,'Increased Stamina'),(345,'Infected Bite'),(1059,'Inferno'),(346,'Inner Fire'),(347,'Inner Focus'),(348,'Innervate'),(349,'Insect Swarm'),(350,'Inspiration'),(351,'Inspire'),(352,'Instant Poison IV'),(353,'Instant Poison V'),(354,'Instant Poison VI'),(355,'Intellect'),(356,'Intercept Stun'),(357,'Intimidating Roar'),(358,'Intimidating Shout'),(359,'Invulnerability'),(1213,'Judgement'),(360,'Judgement of Command'),(361,'Judgement of Light'),(362,'Judgement of Righteousness'),(363,'Judgement of the Crusader'),(364,'Judgement of Wisdom'),(365,'Julie'),(366,'Kick'),(1113,'Kick - Silenced'),(367,'Kidney Shot'),(368,'Knock Away'),(369,'Knockdown'),(370,'Knockout'),(371,'Kreeg'),(1244,'Kreeg\'s Stout Beatdown'),(1203,'Lash of Pain'),(372,'Last Stand'),(373,'Lava Breath'),(374,'Lava Shield'),(375,'Lay on Hands'),(376,'Leader of the Pack'),(377,'Lesser Heal'),(1073,'Lesser Invisibility'),(378,'Life Tap'),(1060,'Lifestone Healing'),(379,'Lightning'),(380,'Lightning Bolt'),(381,'Lightning Shield'),(382,'Lightning Strike'),(383,'Living Bomb'),(384,'Lizard Bolt'),(1102,'Longsight'),(385,'Lord General'),(386,'Lucifron'),(1245,'Lucifron\'s Curse'),(387,'Mage Armor'),(1128,'Maggot Slime'),(388,'Magic Absorption'),(389,'Magic Reflection'),(1061,'Magma Blast'),(390,'Magma Shackles'),(1074,'Magma Spit'),(1075,'Magma Spit (2)'),(1076,'Magma Spit (3)'),(391,'Magma Splash'),(392,'Magma Splash (10)'),(1062,'Magma Splash (11)'),(1246,'Magma Splash (12)'),(393,'Magma Splash (2)'),(394,'Magma Splash (3)'),(395,'Magma Splash (4)'),(396,'Magma Splash (5)'),(397,'Magma Splash (6)'),(398,'Magma Splash (7)'),(399,'Magma Splash (8)'),(400,'Magma Splash (9)'),(401,'Major Healthstone'),(402,'Mana Burn'),(403,'Mana Regeneration'),(404,'Mana Shield'),(405,'Mangle'),(1214,'Mar\'li'),(1215,'Mar\'li\'s Brain Boost'),(406,'Mark of Arlokk'),(407,'Mark of Flames'),(1103,'Mark of the Dragon Lord'),(408,'Mark of the Wild'),(409,'Massive Eruption'),(410,'Massive Tremor'),(1151,'Master Demonologist'),(411,'Master of Elements'),(412,'Maul'),(413,'Melt Armor'),(414,'Melt Armor (2)'),(415,'Melt Armor (3)'),(416,'Melt Armor (4)'),(1063,'Melt Armor (5)'),(1247,'Melt Armor (6)'),(417,'Mend Pet'),(418,'Mighty Blow'),(1204,'Mighty Rage'),(419,'Mind Blast'),(420,'Mind Control'),(421,'Mind Exhaustion'),(422,'Mind Flay'),(1104,'Mind Quickening'),(423,'Mind Soothe'),(424,'Mind Vision'),(425,'Mithril Shield Spike'),(426,'Mocking Blow'),(427,'Molten Blast'),(428,'Mongoose Bite'),(429,'Moonfire'),(430,'Moonkin Aura'),(431,'Moonkin Form'),(432,'Mortal Cleave'),(433,'Mortal Strike'),(434,'Mother'),(435,'Multi-Shot'),(436,'Nagelring'),(437,'Nature'),(1216,'Night Dragon\'s Breath'),(438,'Noggenfogger Elixir'),(439,'Noxious Catalyst'),(1088,'Numbing Pain'),(440,'of Wisdom'),(441,'Omen of Clarity'),(442,'on Hands'),(443,'Orb of Deception'),(444,'Overpower'),(445,'Pagle'),(446,'Panic'),(447,'Paralyzing Poison'),(448,'Parasitic Serpent'),(449,'Parry'),(1157,'Perception'),(450,'Phantom Strike'),(451,'Phase Shift'),(1064,'Physical Protection'),(452,'Pierce Armor'),(453,'Piercing Howl'),(454,'Piercing Shadow'),(455,'Poison'),(456,'Poison Bolt Volley'),(457,'Poison Cloud'),(458,'Poisonous Blood'),(459,'Polymorph'),(460,'Polymorph: Pig'),(461,'Polymorph: Turtle'),(462,'Possess'),(463,'Pounce'),(464,'Pounce Bleed'),(465,'Power Infusion'),(466,'Power Word: Fortitude'),(467,'Power Word: Shield'),(468,'Prayer Beads Blessing'),(469,'Prayer of Fortitude'),(470,'Prayer of Healing'),(471,'Prayer of Shadow Protection'),(472,'Prayer of Spirit'),(1037,'PrayTheLord'),(1158,'Premeditation'),(473,'Presence of Mind'),(474,'Primal Blessing'),(1226,'Primal Fury'),(1189,'Primal Instinct'),(475,'Prowl'),(476,'Psychic Scream'),(477,'Pummel'),(478,'Putrid Enzyme'),(479,'Pyroblast'),(480,'Pyroclast Barrage'),(481,'Quick Shots'),(482,'Rain of Fire'),(483,'Rake'),(484,'Rallying Cry of the Dragonslayer'),(485,'Rapid Fire'),(486,'Raptor Strike'),(487,'Ravage'),(488,'Ravenous Claw'),(489,'Reactive Fade'),(490,'Recently Bandaged'),(491,'Recklessness'),(492,'Redoubt'),(493,'Regeneration'),(494,'Regrowth'),(495,'Rejuvenation'),(496,'Relentless Strikes Effect'),(1181,'Remorseless'),(497,'Rend'),(498,'Renew'),(1152,'Repentance'),(499,'Replenish Mana'),(1205,'Resistance'),(500,'Restore Energy'),(501,'Restore Mana'),(1173,'Retaliation'),(502,'Retribution Aura'),(503,'Revenge'),(504,'Revenge Stun'),(1077,'Revitalize'),(505,'Righteous Fury'),(506,'Rip'),(507,'Riposte'),(1034,'rOfLcopter'),(1190,'Rogue Armor Energize'),(508,'Rumsey Rum Black Label'),(1078,'Rumsey Rum Dark'),(509,'Rupture'),(510,'Sanctity Aura'),(511,'Sanctuary'),(512,'Sap'),(1162,'Scare Beast'),(513,'Scatter Shot'),(514,'Scorch'),(515,'Scorpid Sting'),(1191,'Screech'),(516,'Seal of Command'),(517,'Seal of Light'),(518,'Seal of Reckoning'),(519,'Seal of Righteousness'),(520,'Seal of the Crusader'),(521,'Seal of Wisdom'),(522,'Searing Pain'),(523,'Second Wind'),(524,'Separation Anxiety'),(525,'Serpent Sting'),(526,'Serrated Bite'),(527,'Serrated Bite (2)'),(528,'Serrated Bite (3)'),(529,'Serrated Bite (4)'),(530,'Serrated Bite (5)'),(531,'Shackle Undead'),(1129,'Shadow Barrier'),(532,'Shadow Bolt'),(533,'Shadow Bolt Volley'),(534,'Shadow Power'),(535,'Shadow Protection'),(536,'Shadow Resistance Aura'),(537,'Shadow Shield'),(538,'Shadow Shock'),(539,'Shadow Trance'),(540,'Shadow Vulnerability'),(541,'Shadow Vulnerability (2)'),(542,'Shadow Vulnerability (3)'),(543,'Shadow Vulnerability (4)'),(544,'Shadow Vulnerability (5)'),(545,'Shadow Ward'),(546,'Shadow Word: Pain'),(547,'Shadowbolt'),(548,'Shadowburn'),(549,'Shadowform'),(550,'Shadowmeld'),(1065,'Shazzrah'),(1248,'Shazzrah\'s Curse'),(551,'Shield Bash'),(1174,'Shield Bash - Silenced'),(552,'Shield Block'),(1130,'Shield Charge'),(553,'Shield Slam'),(1217,'Shield Specialization'),(554,'Shield Wall'),(555,'Shock'),(556,'Shoot'),(557,'Shoot Bow'),(558,'Shoot Crossbow'),(559,'Shoot Gun'),(560,'Shred'),(561,'Shrink'),(562,'Silence'),(563,'Sinister Strike'),(564,'Siphon Life'),(565,'Skull Crack'),(566,'Skullforge Brand'),(567,'Slam'),(568,'Slice and Dice'),(569,'Slow'),(570,'Slowing Poison'),(571,'Smash'),(572,'Smite'),(573,'Snap Kick'),(574,'Songflower Serenade'),(575,'Sonic Burst'),(1249,'Soothing Kiss'),(576,'Soul Burn'),(577,'Soul Fire'),(578,'Soul Siphon'),(579,'Soul Tap'),(580,'Soulstone Resurrection'),(581,'Speed'),(582,'Spell Vulnerability'),(1153,'Spinal Reaper'),(583,'Spirit'),(1182,'Spirit of Zandalar'),(584,'Spirit Tap'),(585,'Sprint'),(586,'Stamina'),(587,'Starfire'),(588,'Starfire Stun'),(589,'Stealth'),(590,'Stoneform'),(1167,'Stoneshield'),(591,'Stratholme Holy Water'),(592,'Strength'),(593,'Strike'),(1163,'Stun'),(594,'Stun Bomb'),(595,'Stunning Blow'),(596,'Summon Charger'),(597,'Summon Dreadsteed'),(598,'Summon Felsteed'),(599,'Summon Warhorse'),(600,'Sunder Armor'),(601,'Sunder Armor (2)'),(602,'Sunder Armor (3)'),(603,'Sunder Armor (4)'),(604,'Sunder Armor (5)'),(1066,'Sunder Armor (6)'),(1089,'Sunder Armor (7)'),(605,'Sundering Cleave'),(606,'Supreme Power'),(607,'Surge'),(608,'Sweeping Strikes'),(609,'Swiftmend'),(610,'Swipe'),(611,'Swoop'),(612,'Tail Sweep'),(613,'Taunt'),(1250,'Teleport'),(614,'Tendon Rip'),(615,'Terrifying Howl'),(616,'Terrifying Screech'),(617,'Thorium Grenade'),(618,'Thorium Shield Spike'),(619,'Thorns'),(620,'Threatening Gaze'),(621,'Throw'),(622,'Throw Axe'),(623,'Throw Dynamite'),(624,'Throw Liquid Fire'),(625,'Throw Wrench'),(626,'Thunder Clap'),(627,'Thunderclap'),(628,'Thunderfury'),(1164,'Thunderstomp'),(629,'Tiger'),(630,'Touch of Shadow'),(1192,'Track Giants'),(631,'Track Humanoids'),(632,'Trample'),(633,'Tranquility'),(1067,'Tranquilizing Shot'),(634,'Travel Form'),(635,'Trueshot Aura'),(1168,'Turn Undead'),(1218,'Unbridled Wrath'),(636,'Unending Breath'),(637,'Unholy Aura'),(1090,'Unholy Curse'),(638,'Unstable Concoction'),(639,'Unstable Power'),(640,'Uppercut'),(641,'Vampiric Embrace'),(642,'Veil of Shadow'),(643,'Vengeance'),(644,'Venom Spit'),(645,'Venom Spit (2)'),(646,'Venom Spit (3)'),(1114,'Venomhide Poison'),(1115,'Venomhide Poison (2)'),(1116,'Venomhide Poison (3)'),(647,'Vindication'),(648,'Viper Sting'),(649,'Volley'),(650,'Wail of Souls'),(651,'Wandering Plague'),(652,'War Stomp'),(653,'Warrior'),(1117,'Water'),(654,'Weakened Soul'),(655,'Web Explosion'),(1175,'Whipper Root Tuber'),(656,'Whirling Trip'),(657,'Whirlwind'),(658,'Will of Hakkar'),(659,'Wing Buffet'),(660,'Wing Clip'),(661,'Winter'),(1227,'Winter\'s Chill'),(1228,'Winter\'s Chill (2)'),(1229,'Winter\'s Chill (3)'),(1230,'Winter\'s Chill (4)'),(1231,'Winter\'s Chill (5)'),(662,'Winterfall Firewater'),(1068,'Withering Heat'),(663,'World Enlarger'),(664,'Wound'),(665,'Wrath'),(666,'Wrath of Ragnaros'),(1251,'Yaaarrrr'),(667,'Zeal'),(668,'Zulian Slice');
/*!40000 ALTER TABLE `ability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `accountname` varchar(50) NOT NULL COMMENT 'Login-Name',
  `password` varchar(50) NOT NULL COMMENT 'Login-Password',
  `admin` int(11) NOT NULL DEFAULT '0' COMMENT 'Admin-Flag',
  `firstname` varchar(50) NOT NULL DEFAULT '0' COMMENT 'RL name',
  `lastname` varchar(50) NOT NULL DEFAULT '0' COMMENT 'RL familyname',
  `mail` varchar(50) NOT NULL DEFAULT '0' COMMENT 'mailaddress, not used jet',
  `active` int(11) NOT NULL DEFAULT '0' COMMENT '0=disabled, 1=enabled',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Store Some Login-Information';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'test','81dc9bdb52d04dc20036dbd8313ed055',1,'max','mustermann','voidzone',1),(2,'luziel','302e01f33e5969bf5bbeada08db85109',1,'steffen','riekert','friss@web.de',1),(3,'mario','81dc9bdb52d04dc20036dbd8313ed055',0,'ssadf','sdaf','dsaf',0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_rank`
--

DROP TABLE IF EXISTS `account_rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Merge with account.id',
  `description` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_rank`
--

LOCK TABLES `account_rank` WRITE;
/*!40000 ALTER TABLE `account_rank` DISABLE KEYS */;
INSERT INTO `account_rank` VALUES (1,'Root');
/*!40000 ALTER TABLE `account_rank` ENABLE KEYS */;
UNLOCK TABLES;

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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Autoincrement Primary Key',
  `char_name_de` varchar(255) NOT NULL COMMENT 'German Name',
  `char_name_en` varchar(255) DEFAULT NULL COMMENT 'English Name',
  `char_faction` int(11) DEFAULT NULL COMMENT 'Ally, Enemy, Pet, etc.',
  `class` int(11) DEFAULT NULL COMMENT 'Priest, Druid, Paladin, etc.',
  `zone` int(11) DEFAULT NULL,
  `encounter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`char_name_de`),
  UNIQUE KEY `char_name_en` (`char_name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=954 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character`
--

LOCK TABLES `character` WRITE;
/*!40000 ALTER TABLE `character` DISABLE KEYS */;
INSERT INTO `character` VALUES (1,'Lucifron',NULL,NULL,NULL,20,1),(2,'Magmadar',NULL,NULL,NULL,20,2),(3,'Gehennas',NULL,NULL,NULL,20,3),(4,'Garr',NULL,NULL,NULL,20,4),(5,'Baron Geddon',NULL,NULL,NULL,20,5),(6,'Shazzrah',NULL,NULL,NULL,20,6),(7,'Sulfuronherold',NULL,NULL,NULL,20,7),(8,'Golemagg the Incinerator',NULL,NULL,NULL,20,8),(9,'Majordomus Exekutus',NULL,NULL,NULL,20,9),(10,'Ragnaros',NULL,NULL,NULL,20,10),(11,'Golemagg der Verbrenner',NULL,NULL,NULL,20,8),(12,'High Priestess Jeklik',NULL,NULL,NULL,29,1),(13,'High Priest Venoxis',NULL,NULL,NULL,29,2),(14,'High Priestess Mar\'li',NULL,NULL,NULL,29,3),(15,'Bloodlord Mandokir',NULL,NULL,NULL,29,4),(16,'High Priest Thekal',NULL,NULL,NULL,29,9),(17,'Gahz\'ranka',NULL,NULL,NULL,29,10),(18,'High Priestess Arlokk',NULL,NULL,NULL,29,11),(19,'Jin\'do the Hexxer',NULL,NULL,NULL,29,12),(20,'Hakkar',NULL,NULL,NULL,29,13),(21,'Razorgore the Untamed',NULL,NULL,NULL,17,1),(22,'Sulfuron Harbinger',NULL,NULL,NULL,20,7);
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
  `trigger` int(11) DEFAULT NULL COMMENT 'Source-User of this String',
  `target` int(11) DEFAULT NULL COMMENT 'Target-User of this String',
  `separator` int(11) DEFAULT NULL COMMENT 'String to seppparate Values from Log_File',
  `value` int(11) DEFAULT NULL COMMENT 'Heal, Damage',
  `value_type` int(11) DEFAULT NULL COMMENT 'Dodge, Hit, Crit, Resist, etc.',
  `value2` int(11) DEFAULT NULL COMMENT 'Reduced Value (Glancing, Resist, Absorb)',
  `value2_type` int(11) DEFAULT NULL COMMENT 'Kind of Reduce_Type (Glancing, Resist, etc.)',
  `spell` int(11) DEFAULT NULL COMMENT 'SpellID, Given from Blizzard',
  `damage_school` int(11) DEFAULT NULL COMMENT 'Holy, Physical, Shadow, Frost, etc.',
  PRIMARY KEY (`id`),
  KEY `Schlüssel 2` (`event`,`trigger`,`value_type`),
  KEY `Schlüssel 3` (`target`,`event`,`value_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3263060 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
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
INSERT INTO `instanz` VALUES (1,'BFD','Blackfathom Deeps','Tiefschwarze Grotte'),(2,'DM(E)','Dire Maul East','Düsterbruch Ost'),(3,'DM(N)','Dire Maul North','Düsterbruch Nord'),(4,'DM(W)','Dire Maul West','Düsterbruch West'),(5,'Mara','Maraudon','Maraudon'),(6,'Ony','Onyxia\'s Lair','Onyxias Hort'),(7,'RFC','Ragefire Chasm','Flammenschlund'),(8,'RFD','Razorfen Downs','Hügel der Klingenhauer'),(9,'RFK','Razorfen Kraul','Kral der Klingenhauer'),(10,'AQ20','Ruins of Ahn\'Qiraj','Ruinen von Ahn\'Qiraj'),(11,'AQ40','Temple of Ahn\'Qiraj','Tempel von Ahn\'Qiraj'),(12,'WC','Wailing Caverns','Höhle des Wegladerens'),(13,'ZF','Zul\'Farrak','Zul\'Farrak'),(14,'BRD','Blackrock Depths','Schwarzfelstiefen'),(15,'UBRS','Upper Blackrock Spire','Obere Schwarzfelsspitze'),(16,'LBRS','Lower Blackrock Spire','Untere Schwarzfelsspitze'),(17,'BWL','Blackwing Lair','Pechschwingenhort'),(18,'DM','Deadmines','Todesminen'),(19,'Gnome','Gnomeregan','Gnomeregan'),(20,'MC','Molten Core','Geschmolzener Kern'),(21,'Nax','Naxxramas','Naxxramas'),(22,'SM','Scarlet Monastery','Scharlachrotes Kloster'),(23,'Scholo','Scholomance','Scholomance'),(24,'SFK','Shadowfang Keep','Burg Schattenfang'),(25,'Stockade','Stockade','Verlies'),(26,'Strat','Stratholme','Stratholme'),(27,'ST','Sunken Temple','Versunkener Tempel'),(28,'Ulda','Uldaman','Uldaman'),(29,'ZG','Zul\'Gurub','Zul\'Gurub');
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

-- Dump completed on 2015-08-18  8:42:12
