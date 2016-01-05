-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: mysql.aquatreasurequest.com    Database: aquatreasurequest
-- ------------------------------------------------------
-- Server version	5.6.25-log

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
-- Table structure for table `CountryList`
--

DROP TABLE IF EXISTS `CountryList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CountryList` (
  `CountryId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `CountryCode` varchar(15) NOT NULL,
  `CountryName` varchar(40) NOT NULL,
  `CountryContinent` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CountryList`
--

LOCK TABLES `CountryList` WRITE;
/*!40000 ALTER TABLE `CountryList` DISABLE KEYS */;
INSERT INTO `CountryList` VALUES (1,'AFG','Afganistan','Asia'),(2,'ALB','Albania','Europe'),(3,'ALG','Algeria','Africa'),(4,'SAA','American \n\nSamoa','Oceania'),(5,'AND','Andorra','Europe'),(6,'AGL','Angola','Africa'),(7,'AGI','Anguilla','Caribbean'),(8,'ATG','Antigua & \n\nBarbuda','Caribbean'),(9,'ARG','Argentina','South \n\nAmerica'),(10,'ARM','Armenia','Asia'),(11,'ARU','Aruba','Caribbean'),(12,'AUS','Australia','Oceania'),(13,'AUT','Austria','Europe'),(14,'AZE','Azerbaijan','Asia'),(15,'AZR','Azores','Europe'),(16,'BAH','Bahamas','Caribbean'),(17,'BHR','Bahrain','Middle \n\nEast'),(18,'BNG','Bangladesh','Asia'),(19,'BRB','Barbados','Caribbean'),(20,'BLR','Belarus','Europe'),(21,'BEL','Belgium','Europe'),(22,'BLZ','Belize','Caribbean'),(23,'BEN','Benin','Africa'),(24,'BER','Bermuda','Caribbean'),(25,'BHU','Bhutan','Asia'),(26,'BOL','Bolivia','South \n\nAmerica'),(27,'BOS','Bosnia & \n\nHerzegovina','Europe'),(28,'BOT','Botswana','Africa'),(29,'BRA','Brazil','South \n\nAmerica'),(30,'BRU','Brunei','Asia'),(31,'BUL','Bulgaria','Europe'),(32,'BFS','Burkina \n\nFaso','Africa'),(33,'MMR','Burma \n\n-Myanmar-','Asia'),(34,'BDI','Burundi','Africa'),(35,'VRG','British Virgin \n\nIslands','Caribbean'),(36,'CBG','Cambodia','Asia'),(37,'CAM','Cameroon','Africa'),(38,'CAN','Canada','North \n\nAmerica'),(39,'ICA','Canary \n\nIslands','Africa'),(40,'CAV','Cape \n\nVerde','Africa'),(41,'CYM','Cayman \n\nIslands','Caribbean'),(42,'CAF','Central African \n\nRep.','Africa'),(43,'TCD','Chad','Africa'),(44,'JER','Channel \n\nIslands','Europe'),(45,'CHL','Chile','South \n\nAmerica'),(46,'CHN','China','Asia'),(47,'CHR','Christmas \n\nIsland','Asia'),(48,'COL','Colombia','South \n\nAmerica'),(49,'COM','Comoros','Africa'),(50,'COG','Congo','Africa'),(51,'ZAI','Congo Dem. \n\nRep','Africa'),(52,'COK','Cook \n\nIslands','Oceania'),(53,'CRI','Costa \n\nRica','Caribbean'),(54,'CRO','Croatia','Europe'),(55,'CUB','Cuba','Caribbean'),(56,'CYP','Cyprus','Middle \n\nEast'),(57,'TCH','Czech \n\nRep.','Europe'),(58,'DNK','Denmark','Europe'),(59,'DJI','Djibouti','Africa'),(60,'DMA','Dominica','Caribbean'),(61,'DOM','Dominican \n\nRep.','Caribbean'),(62,'TIM','East \n\nTimor','Asia'),(63,'ECU','Ecuador','South \n\nAmerica'),(64,'EGY','Egypt','Africa'),(65,'GNE','Equatorial \n\nGuinea','Africa'),(66,'ERI','Eritrea','Africa'),(67,'EST','Estonia','Europe'),(68,'ETH','Ethiopia','Africa'),(69,'FLK','Falkland \n\nIslands','South America'),(70,'FRO','Faroe \n\nIslands','Europe'),(71,'FIJ','Fiji','Oceania'),(72,'FIN','Finland','Europe'),(73,'FRA','France','Europe'),(74,'GIA','French \n\nGuiana','South America'),(75,'PFR','French \n\nPolynesia','Oceania'),(76,'GAB','Gabon','Africa'),(77,'GAM','Gambia','Africa'),(78,'GEO','Georgia','Europe'),(79,'GER','Germany','Europe'),(80,'GHA','Ghana','Africa'),(81,'GIB','Gibraltar','Europe'),(82,'GBR','Great \n\nBritain','Europe'),(83,'GRE','Greece','Europe'),(84,'GRL','Greenland','Arctic \n\nRegion'),(85,'GRD','Grenada','Caribbean'),(86,'GDL','Guadeloupe','Caribbean'),(87,'GUM','Guam','Oceania'),(88,'GTM','Guatemala','Caribbean'),(89,'GUI','Guinea','Africa'),(90,'GNB','Guinea-Bissau','Africa'),(91,'GUY','Guyana','South \n\nAmerica'),(92,'HAI','Haiti','Caribbean'),(93,'HND','Honduras','Caribbean'),(94,'HUN','Hungary','Europe'),(95,'ISL','Iceland','Arctic \n\nRegion'),(96,'IND','India','Asia'),(97,'IDN','Indonesia','Asia'),(98,'IRN','Iran','Middle \n\nEast'),(99,'IRQ','Iraq','Middle \n\nEast'),(100,'IRL','Ireland','Europe'),(101,'MAN','Isle of \n\nMan','Europe'),(102,'ISR','Israel','Middle \n\nEast'),(103,'ITA','Italy','Europe'),(104,'CIV','Ivory \n\nCoast','Africa'),(105,'JAM','Jamaica','Caribbean'),(106,'JAP','Japan','Asia'),(107,'JER','Jersey & \n\nGuernsey','Europe'),(108,'JOR','Jordan','Middle \n\nEast'),(109,'KAZ','Kazakhstan','Asia'),(110,'KEN','Kenya','Africa'),(111,'KIR','Kiribati','Oceania'),(112,'KOR','Korea','Asia'),(113,'KUW','Kuwait','Middle \n\nEast'),(114,'KGZ','Kyrgyzstan','Asia'),(115,'LAO','Laos','Asia'),(116,'LAT','Latvia','Europe'),(117,'LIB','Lebanon','Middle \n\nEast'),(118,'LSO','Lesotho','Africa'),(119,'LBR','Liberia','Africa'),(120,'LBY','Libya','Africa'),(121,'LIE','Liechtenstein','Europe'),(122,'LIT','Lithuania','Europe'),(123,'LUX','Luxembourg','Europe'),(124,'MAC','Macau','Asia'),(125,'MKD','Macedonia','Europe'),(126,'MAD','Madagascar','Africa'),(127,'MDR','Madeira','Europe'),(128,'MWI','Malawi','Africa'),(129,'MLS','Malaysia','Asia'),(130,'MLD','Maldives','Asia'),(131,'MLI','Mali','Africa'),(132,'MLT','Malta','Europe'),(133,'MRN','Mariana \n\nIslands','Oceania'),(134,'MHL','Marshall \n\nIslands','Oceania'),(135,'MTN','Martinique','Caribbean'),(136,'MRT','Mauritania','Africa'),(137,'MRI','Mauritius','Africa'),(138,'MYT','Mayotte','Africa'),(139,'MEX','Mexico','North \n\nAmerica'),(140,'MIC','Micronesia','Oceania'),(141,'MOL','Moldova','Europe'),(142,'MCO','Monaco','Europe'),(143,'MNG','Mongolia','Asia'),(144,'MSR','Montserrat','Caribbean'),(145,'MAR','Morocco','Africa'),(146,'MOZ','Mozambique','Africa'),(147,'MMR','Myanmar \n\n(Burma)','Asia'),(148,'NAM','Namibia','Africa'),(149,'NRU','Nauru','Oceania'),(150,'NEP','Nepal','Asia'),(151,'NED','Netherlands','Europe'),(152,'ATN','Netherlands \n\nAntilles','Caribbean'),(153,'NCL','New \n\nCaledonia','Oceania'),(154,'NZL','New \n\nZealand','Oceania'),(155,'NIC','Nicaragua','Caribbean'),(156,'NGR','Niger','Africa'),(157,'NIU','Niue','Oceania'),(158,'NIG','Nigeria','Africa'),(159,'NFK','Norfolk','Oceania'),(160,'MRN','Northern Mariana \n\nIslands','Oceania'),(161,'NOR','Norway','Europe'),(162,'OMA','Oman','Middle \n\nEast'),(163,'PAK','Pakistan','Asia'),(164,'PLW','Palau','Oceania'),(165,'PAN','Panama','Caribbean'),(166,'PNG','Papua New \n\nGuinea','Oceania'),(167,'PAR','Paraguay','South \n\nAmerica'),(168,'PER','Peru','South \n\nAmerica'),(169,'PHL','Philippines','Asia'),(170,'PIT','Pitcairn','Oceania'),(171,'POL','Poland','Europe'),(172,'PRT','Portugal','Europe'),(173,'PRI','Puerto \n\nRico','Caribbean'),(174,'QAT','Qatar','Middle \n\nEast'),(175,'REU','Reunion','Africa'),(176,'ROM','Romania','Europe'),(177,'RUS','Russia','Europe'),(178,'RWA','Rwanda','Africa'),(179,'SHE','Saint \n\nHelena','Africa'),(180,'SKN','Saint Kitts & \n\nNevis','Caribbean'),(181,'SLU','Saint \n\nLucia','Caribbean'),(182,'SPM','St Pierre & \n\nMiquelon','North America'),(183,'VCT','St Vincent & \n\nGrenadines','Caribbean'),(184,'SLV','El \n\nSalvador','Caribbean'),(185,'SMR','San \n\nMarino','Europe'),(186,'STP','Sao Tome & \n\nPrincipe','Africa'),(187,'SAU','Saudi \n\nArabia','Middle East'),(188,'SEN','Senegal','Africa'),(189,'SEY','Seychelles','Africa'),(190,'SLE','Sierra \n\nLeone','Africa'),(191,'SGP','Singapore','Asia'),(192,'SLO','Slovakia','Europe'),(193,'SVN','Slovenia','Europe'),(194,'SLM','Solomon','Oceania'),(195,'SOM','Somalia','Africa'),(196,'SAF','South \n\nAfrica','Africa'),(197,'ESP','Spain','Europe'),(198,'SRI','Sri Lanka','Asia'),(199,'SDN','Sudan','Africa'),(200,'SUR','Suriname','South \n\nAmerica'),(201,'SWA','Swaziland','Africa'),(202,'SWE','Sweden','Europe'),(203,'SUI','Switzerland','Europe'),(204,'SYR','Syria','Middle \n\nEast'),(205,'TAI','Taiwan','Asia'),(206,'TJK','Tajikistan','Asia'),(207,'TZA','Tanzania','Africa'),(208,'THA','Thailand','Asia'),(209,'TOG','Togo','Africa'),(210,'TOK','Tokelau','Oceania'),(211,'TON','Tonga','Oceania'),(212,'TRI','Trinidad & \n\nTobago','Caribbean'),(213,'TUN','Tunisia','Africa'),(214,'TUR','Turkey','Middle \n\nEast'),(215,'TKM','Turkmenistan','Asia'),(216,'TCA','Turks & Caicos \n\nIslands','Caribbean'),(217,'TUV','Tuvalu','Oceania'),(218,'UGA','Uganda','Africa'),(219,'UKR','Ukraine','Europe'),(220,'UAE','United Arab \n\nEmirates','Middle East'),(221,'GBR','United \n\nKingdom','Europe'),(222,'URU','Uruguay','South \n\nAmerica'),(223,'USA','USA','North \n\nAmerica'),(224,'UZB','Uzbekistan','Asia'),(225,'VIR','US Virgin \n\nIsland','Caribbean'),(226,'VAN','Vanuatu','Oceania'),(227,'VAT','Vatican','Europe'),(228,'VTN','Viet Nam','Asia'),(229,'WAL','Wallis & \n\nFutuna','Oceania'),(230,'SAH','Western \n\nSahara','Africa'),(231,'SAM','Western \n\nSamoa','Oceania'),(232,'YEM','Yemen','Middle \n\nEast'),(233,'YUG','Yugoslavia','Europe'),(234,'ZAI','Zaire (Congo \n\nD.Rep)','Africa'),(235,'ZAM','Zambia','Africa'),(236,'ZIM','Zimbabwe','Africa'),(237,'ZIM','Zimbabwe','Africa');
/*!40000 ALTER TABLE `CountryList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSite`
--

DROP TABLE IF EXISTS `DiveSite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSite` (
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteStatus` varchar(10) NOT NULL,
  `DiveSiteEnteredBy` varchar(25) NOT NULL,
  `DiveSiteDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteRating` varchar(10) NOT NULL,
  `DiveSiteElevation` int(11) NOT NULL,
  `DiveSiteElevationUnits` varchar(5) NOT NULL,
  `DiveSiteWater` varchar(50) NOT NULL,
  `DiveSiteDepthMin` int(11) NOT NULL,
  `DiveSiteDepthMax` int(11) NOT NULL,
  `DiveSiteDepthUnits` varchar(5) NOT NULL,
  `DiveSiteBottomComposition` varchar(100) NOT NULL,
  `DiveSiteHazards` varchar(100) NOT NULL,
  `DiveSiteHazardsNotes` varchar(1000) NOT NULL,
  `DiveSiteType` varchar(100) NOT NULL,
  `DiveSiteLevel` varchar(100) NOT NULL,
  `DiveSiteDifficulty` varchar(20) DEFAULT NULL,
  `DiveSiteTideTable` varchar(80) NOT NULL,
  `DiveSiteBestDiveMonths` varchar(15) NOT NULL,
  `DiveSiteTimeRestrictions` varchar(50) NOT NULL,
  `DiveSitePermitRequired` varchar(50) NOT NULL,
  `DiveSiteWinterTemp` int(11) NOT NULL,
  `DiveSiteSummerTemp` int(11) NOT NULL,
  `DiveSiteFallTemp` int(11) NOT NULL,
  `DiveSiteSpringTemp` int(11) NOT NULL,
  `DiveSiteTempUnits` varchar(12) NOT NULL,
  `DiveSiteVisibilityMinimum` int(11) NOT NULL,
  `DiveSiteVisibilityMaximum` int(11) NOT NULL,
  `DiveSiteVisibilityUnits` varchar(15) NOT NULL,
  `DiveSiteFacilities` varchar(50) NOT NULL,
  `DiveSiteFacilitiesNotes` varchar(1500) NOT NULL,
  `DiveSiteRecommendationNotes` varchar(1000) NOT NULL,
  `DiveSiteNotes` varchar(2000) DEFAULT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteShoreLat` float(10,6) NOT NULL,
  `DiveSiteShoreLong` float(10,6) NOT NULL,
  `DiveSiteShoreNotes` varchar(2000) DEFAULT NULL,
  `DiveSiteWebPage` varchar(150) DEFAULT NULL,
  `DiveSiteBackground` varchar(150) DEFAULT NULL,
  `DiveSiteEAPId` mediumint(8) NOT NULL,
  PRIMARY KEY (`DiveSiteId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSite`
--

LOCK TABLES `DiveSite` WRITE;
/*!40000 ALTER TABLE `DiveSite` DISABLE KEYS */;
INSERT INTO `DiveSite` VALUES (00000001,'PENDING','TreasureTrove','2011-08-28','','BC','Canada','Madrona Point','Small Wall','','',0,'','',0,0,'','','','','','','Novice','','','','',0,0,0,0,'',0,0,'','','','','',49.312908,-124.243156,49.312511,-124.241302,'','','',0),(00000002,'PENDING','TreasureTrove','2011-08-28','','Alberta','Canada','Lake Minnewanka','Plaque Site','Pilings','',0,'','',0,0,'','','','','','','Advanced','','','','',0,0,0,0,'',0,0,'','','','','',51.243019,-115.494827,51.242760,-115.495178,'','','',0),(00000003,'PENDING','TreasureTrove','2011-08-28','','Alberta','Canada','Lake Minnewanka','1912 Dam','','',0,'','',0,0,'','','','','','','Advanced','','','','',0,0,0,0,'',0,0,'','','','','',51.246498,-115.497314,51.246181,-115.497925,'','','',0),(00000004,'PENDING','TreasureTrove','2011-08-28','','Alberta','Canada','Two Jack Lake','River Bed','','',0,'','',0,0,'','','','','','','Novice','','','','',0,0,0,0,'',0,0,'','','','','',51.227959,-115.496521,51.227741,-115.500168,'','','',0),(00000005,'PENDING','TreasureTrove','2011-08-28','','Alberta','Canada','Two Jack Lake','Fish Bowl','','',0,'','',0,0,'','','','','','','Advanced','','','','',0,0,0,0,'',0,0,'','','','','',51.230026,-115.493607,51.227741,-115.500168,'','','',0),(00000006,'PENDING','TreasureTrove','2011-08-28','','BC','Canada','Madrona Point','Big Wall','','',0,'','',0,0,'','','','','','','Advanced','','','','',0,0,0,0,'',0,0,'','','','','',49.313461,-124.242569,49.312511,-124.241302,'','','',0),(00000007,'PENDING','TreasureTrove','2011-08-28','','BritishColumbia','Canada','Okanagan Lake','The Store','','',0,'','',0,0,'','','','','','','Novice','','','','',0,0,0,0,'',0,0,'','','','','',50.051174,-119.449028,50.051041,-119.448570,'','','',0),(00000008,'PENDING','TreasureTrove','2011-08-28','','BritishColumbia','Canada','Ellison Lake','Otter Bay','','',0,'','',0,0,'','','','','','','Novice','','','','',0,0,0,0,'',0,0,'','','','','',49.986526,-119.387054,49.987793,-119.386322,'','','',0),(00000009,'PENDING','TreasureTrove','2011-08-28','','BritishColumbia','Canada','Okanagon Lake','Fintry Wreck','','',0,'','',0,0,'','','','','','','Novice','','','','',0,0,0,0,'',0,0,'','','','','',50.141293,-119.494728,50.140717,-119.495758,'','','',0),(00000010,'PENDING','TreasureTrove','2011-08-28','','BritishColumbia','Canada','Porteau Cove','Nakaya','','',0,'','',0,0,'','','','','','','ADVANCED','','','','',0,0,0,0,'',0,0,'','','','','',49.559864,-123.234177,49.559128,-123.243477,'','','',0),(00000011,'PENDING','TreasureTrove','2011-08-28','','BritishColumbia','Canada','Porteau Cove','Granthall','','',0,'','',0,0,'','','','','','','Novice','','','','',0,0,0,0,'',0,0,'','','','','',49.559788,-123.234436,49.559128,-123.243477,'','','',0),(00000012,'PENDING','Grizzly01','2011-09-12','Sylvan Lake','Alberta','Canada','Sylvan Lake','Sylvan Lake Underwater Park','','',3097,'feet','Fresh',5,40,'feet','','','','','','Novice','','','','',0,0,0,0,'',5,20,'feet','','','','',52.331982,-114.132164,52.331268,-114.132309,'','','',0);
/*!40000 ALTER TABLE `DiveSite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteBuddy`
--

DROP TABLE IF EXISTS `DiveSiteBuddy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteBuddy` (
  `DiveSiteBuddyId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSiteBuddyEnteredBy` varchar(25) NOT NULL,
  `DiveSiteBuddyDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteBuddyHandle` varchar(30) NOT NULL,
  `DiveSiteBuddyExperienceLevel` varchar(20) NOT NULL,
  `DiveSiteBuddyDaysAvailable` varchar(10) NOT NULL,
  `DiveSiteBuddyPixFileInfo` varchar(150) DEFAULT NULL,
  `DiveSiteBuddyNotes` varchar(1000) NOT NULL,
  PRIMARY KEY (`DiveSiteBuddyId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteBuddy`
--

LOCK TABLES `DiveSiteBuddy` WRITE;
/*!40000 ALTER TABLE `DiveSiteBuddy` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteBuddy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteCommunityAssessment`
--

DROP TABLE IF EXISTS `DiveSiteCommunityAssessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteCommunityAssessment` (
  `DiveSiteCommunityAssessmentId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteCommunityAssessmentRank` int(11) NOT NULL,
  `DiveSiteCommunityAssessmentDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteCommunityAssessmentId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteCommunityAssessment`
--

LOCK TABLES `DiveSiteCommunityAssessment` WRITE;
/*!40000 ALTER TABLE `DiveSiteCommunityAssessment` DISABLE KEYS */;
INSERT INTO `DiveSiteCommunityAssessment` VALUES (00000001,1,'Visibility'),(00000002,2,'Accessibility'),(00000003,3,'Marine Life'),(00000004,4,'Dive Experience');
/*!40000 ALTER TABLE `DiveSiteCommunityAssessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteComposition`
--

DROP TABLE IF EXISTS `DiveSiteComposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteComposition` (
  `DiveSiteCompositionId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteCompositionRank` int(11) NOT NULL,
  `DiveSiteCompositionDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteCompositionId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteComposition`
--

LOCK TABLES `DiveSiteComposition` WRITE;
/*!40000 ALTER TABLE `DiveSiteComposition` DISABLE KEYS */;
INSERT INTO `DiveSiteComposition` VALUES (00000001,0,'Sand'),(00000002,1,'Coral'),(00000003,2,'Mud'),(00000004,3,'Rock'),(00000005,4,'Fish Poop'),(00000006,6,'Silt'),(00000007,5,'Pebbles');
/*!40000 ALTER TABLE `DiveSiteComposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteDifficulty`
--

DROP TABLE IF EXISTS `DiveSiteDifficulty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteDifficulty` (
  `DiveSiteDifficultyId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteDifficultyRank` int(11) NOT NULL,
  `DiveSiteDifficultyDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteDifficultyId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteDifficulty`
--

LOCK TABLES `DiveSiteDifficulty` WRITE;
/*!40000 ALTER TABLE `DiveSiteDifficulty` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteDifficulty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteEAP`
--

DROP TABLE IF EXISTS `DiveSiteEAP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteEAP` (
  `DiveSiteEAPId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSiteEAPEnteredBy` varchar(25) NOT NULL,
  `DiveSiteEAPDateEntered` date NOT NULL,
  `DiveSiteEAPCity` varchar(30) NOT NULL,
  `DiveSiteEAPProvince` varchar(15) DEFAULT NULL,
  `DiveSiteEAPCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteEAPMedical` varchar(80) NOT NULL,
  `DiveSiteEAPRecompression` varchar(80) NOT NULL,
  `DiveSiteEAPContact1` varchar(80) NOT NULL,
  `DiveSiteEAPContact2` varchar(80) DEFAULT NULL,
  `DiveSiteEAPTravelNotes` varchar(500) NOT NULL,
  PRIMARY KEY (`DiveSiteEAPId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteEAP`
--

LOCK TABLES `DiveSiteEAP` WRITE;
/*!40000 ALTER TABLE `DiveSiteEAP` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteEAP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteFacilities`
--

DROP TABLE IF EXISTS `DiveSiteFacilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteFacilities` (
  `DiveSiteFacilitiesId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `DiveSiteFacilitiesRank` int(11) NOT NULL,
  `DiveSiteFacilitiesDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteFacilitiesId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteFacilities`
--

LOCK TABLES `DiveSiteFacilities` WRITE;
/*!40000 ALTER TABLE `DiveSiteFacilities` DISABLE KEYS */;
INSERT INTO `DiveSiteFacilities` VALUES (1,3,'Picnic Tables'),(2,2,'Picnic Shelters'),(3,1,'Washrooms'),(4,4,'Concession Stand'),(5,5,'Fire Pits');
/*!40000 ALTER TABLE `DiveSiteFacilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteHazards`
--

DROP TABLE IF EXISTS `DiveSiteHazards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteHazards` (
  `DiveSiteHazardsId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteHazardsRank` int(11) NOT NULL,
  `DiveSiteHazardsDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteHazardsId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteHazards`
--

LOCK TABLES `DiveSiteHazards` WRITE;
/*!40000 ALTER TABLE `DiveSiteHazards` DISABLE KEYS */;
INSERT INTO `DiveSiteHazards` VALUES (00000001,0,'Boats'),(00000002,1,'Current'),(00000003,2,'Depth'),(00000004,3,'Electrical Cable'),(00000005,5,'Intakes'),(00000006,4,'Outflows'),(00000007,6,'Visibility'),(00000008,7,'Poisonous Marine Life'),(00000009,8,'Fishing Line'),(00000010,9,'Kelp'),(00000011,10,'Unstable Structures'),(00000012,11,'Penetrable Wreck'),(00000013,12,'Poisonous Land Animals');
/*!40000 ALTER TABLE `DiveSiteHazards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteLevel`
--

DROP TABLE IF EXISTS `DiveSiteLevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteLevel` (
  `DiveSiteLevelId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteLevelRank` int(11) NOT NULL,
  `DiveSiteLevelDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteLevelId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteLevel`
--

LOCK TABLES `DiveSiteLevel` WRITE;
/*!40000 ALTER TABLE `DiveSiteLevel` DISABLE KEYS */;
INSERT INTO `DiveSiteLevel` VALUES (00000001,0,'Beginner'),(00000002,1,'Experienced'),(00000003,2,'Technical'),(00000004,3,'Extreme'),(00000005,7,'Intermediate');
/*!40000 ALTER TABLE `DiveSiteLevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteMap`
--

DROP TABLE IF EXISTS `DiveSiteMap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteMap` (
  `DiveSiteMapId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSiteMapEnteredBy` varchar(25) NOT NULL,
  `DiveSiteMapDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteMapFileInfo` varchar(150) DEFAULT NULL,
  `DiveSiteMapNotes` varchar(1000) NOT NULL,
  PRIMARY KEY (`DiveSiteMapId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteMap`
--

LOCK TABLES `DiveSiteMap` WRITE;
/*!40000 ALTER TABLE `DiveSiteMap` DISABLE KEYS */;
INSERT INTO `DiveSiteMap` VALUES (00000001,00000012,'Grizzly01','2011-09-14','Sylvan Lake','Alberta','Canada','Sylvan Underwater Park','','',52.331982,-114.132164,'DiveSiteMaps/Sylvan_Underwater_Park_00000001.jpg','Map supplied by local resident');
/*!40000 ALTER TABLE `DiveSiteMap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteMarineLife`
--

DROP TABLE IF EXISTS `DiveSiteMarineLife`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteMarineLife` (
  `DiveSiteMarineLifeId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSiteMarineLifeEnteredBy` varchar(25) NOT NULL,
  `DiveSiteMarineLifeDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteMarineLifeDomain` varchar(20) NOT NULL,
  `DiveSiteMarineLifeKingdom` varchar(20) NOT NULL,
  `DiveSiteMarineLifePhylum` varchar(20) NOT NULL,
  `DiveSiteMarineLifeClass` varchar(20) NOT NULL,
  `DiveSiteMarineLifeSubClass` varchar(20) NOT NULL,
  `DiveSiteMarineLifeInfraClass` varchar(20) NOT NULL,
  `DiveSiteMarineLifeOrder` varchar(20) NOT NULL,
  `DiveSiteMarineLifeFamily` varchar(20) NOT NULL,
  `DiveSiteMarineLifeGenus` varchar(20) NOT NULL,
  `DiveSiteMarineLifeSpecies` varchar(20) NOT NULL,
  `DiveSiteMarineLifeCommonName` varchar(40) NOT NULL,
  `DiveSiteMarineLifeScientificName` varchar(40) NOT NULL,
  `DiveSiteMarineLifePictureURLFileInfo1` varchar(150) DEFAULT NULL,
  `DiveSiteMarineLifePictureURLFileInfo2` varchar(150) NOT NULL,
  `DiveSiteMarineLifePictureURLFileInfo3` varchar(150) NOT NULL,
  `DiveSiteMarineLifePictureURLFileInfo4` varchar(150) NOT NULL,
  `DiveSiteMarineLifePictureURLFileInfo5` varchar(150) NOT NULL,
  `DiveSiteMarineLifeNotes` varchar(1000) NOT NULL,
  PRIMARY KEY (`DiveSiteMarineLifeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteMarineLife`
--

LOCK TABLES `DiveSiteMarineLife` WRITE;
/*!40000 ALTER TABLE `DiveSiteMarineLife` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteMarineLife` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteMedical`
--

DROP TABLE IF EXISTS `DiveSiteMedical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteMedical` (
  `DiveSiteMedicalId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteMedicalRank` int(11) NOT NULL,
  `DiveSiteMedicalDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteMedicalId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteMedical`
--

LOCK TABLES `DiveSiteMedical` WRITE;
/*!40000 ALTER TABLE `DiveSiteMedical` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteMedical` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSitePOI`
--

DROP TABLE IF EXISTS `DiveSitePOI`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSitePOI` (
  `DiveSitePOIId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSitePOIEnteredBy` varchar(25) NOT NULL,
  `DiveSitePixDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSitePOITitle` varchar(80) NOT NULL,
  `DiveSitePOIType` varchar(20) NOT NULL,
  `DiveSitePOINoteKeywords` varchar(1000) NOT NULL,
  `DiveSitePOIPictureURLFileInfo` varchar(150) DEFAULT NULL,
  `DiveSitePOINotes` varchar(1000) NOT NULL,
  PRIMARY KEY (`DiveSitePOIId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSitePOI`
--

LOCK TABLES `DiveSitePOI` WRITE;
/*!40000 ALTER TABLE `DiveSitePOI` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSitePOI` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSitePix`
--

DROP TABLE IF EXISTS `DiveSitePix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSitePix` (
  `DiveSitePixId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSitePixEnteredBy` varchar(25) NOT NULL,
  `DiveSitePixDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSitePixTitle` varchar(80) NOT NULL,
  `DIveSitePixType` varchar(20) NOT NULL,
  `DiveSitePixNoteKeywords` varchar(1000) NOT NULL,
  `DiveSitePixPictureURLFileInfo` varchar(150) DEFAULT NULL,
  `DiveSitePixNotes` varchar(1000) NOT NULL,
  PRIMARY KEY (`DiveSitePixId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSitePix`
--

LOCK TABLES `DiveSitePix` WRITE;
/*!40000 ALTER TABLE `DiveSitePix` DISABLE KEYS */;
INSERT INTO `DiveSitePix` VALUES (00000001,00000001,'','2011-08-09','Banff','Alberta','Canada','Two Jack Lake','River Bed','',51.227959,-115.496521,'','','','BanffTwo00000001.jpg',''),(00000002,00000001,'','2011-08-09','Banff','Alberta','Canada','Two Jack Lake','River Bed','',51.227959,-115.496521,'','','','BanffTwo00000002.jpg',''),(00000003,00000012,'Grizzly01','2011-09-14','Sylvan Lake','Alberta','Canada','Sylvan Underwater Park','','',52.331982,-114.132164,'Underwater boat ','Wreck','','Sylvan_Underwater_Park_00000003.jpg','Underwater boat at C in map');
/*!40000 ALTER TABLE `DiveSitePix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteRating`
--

DROP TABLE IF EXISTS `DiveSiteRating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteRating` (
  `DiveSiteRatingId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteRatingRank` int(11) NOT NULL,
  `DiveSiteRatingDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteRatingId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteRating`
--

LOCK TABLES `DiveSiteRating` WRITE;
/*!40000 ALTER TABLE `DiveSiteRating` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteRating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteReview`
--

DROP TABLE IF EXISTS `DiveSiteReview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteReview` (
  `DiveSiteReviewId` mediumint(8) NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned NOT NULL,
  `DiveSiteReviewReviewerLevel` varchar(15) NOT NULL,
  `DiveSiteReviewDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteReviewRating` varchar(10) NOT NULL,
  `DiveSiteReviewTemp` int(11) NOT NULL,
  `DiveSiteReviewVisibility` int(11) NOT NULL,
  `DiveSiteReviewNotes` varchar(2000) DEFAULT NULL,
  `DiveSiteReviewPix1URLFileInfo` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix1Note` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix2URLFileInfo` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix2Note` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix3URLFileInfo` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix3Note` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix4URLFileInfo` varchar(100) DEFAULT NULL,
  `DiveSiteReviewPix4Note` varchar(100) DEFAULT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  PRIMARY KEY (`DiveSiteReviewId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteReview`
--

LOCK TABLES `DiveSiteReview` WRITE;
/*!40000 ALTER TABLE `DiveSiteReview` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteReview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteSI`
--

DROP TABLE IF EXISTS `DiveSiteSI`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteSI` (
  `DiveSiteSIId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned zerofill NOT NULL,
  `DiveSiteSIEnteredBy` varchar(25) NOT NULL,
  `DiveSiteSIDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteSITitle` varchar(80) NOT NULL,
  `DiveSiteSIType` varchar(50) NOT NULL,
  `DiveSiteSIFriendlyFacts` varchar(50) NOT NULL,
  `DiveSiteSIPictureURLFileInfo` varchar(150) DEFAULT NULL,
  `DiveSiteSINotes` varchar(1000) NOT NULL,
  PRIMARY KEY (`DiveSiteSIId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteSI`
--

LOCK TABLES `DiveSiteSI` WRITE;
/*!40000 ALTER TABLE `DiveSiteSI` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteSI` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteTelephone`
--

DROP TABLE IF EXISTS `DiveSiteTelephone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteTelephone` (
  `DiveSiteTelephoneId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteTelephoneRank` int(11) NOT NULL,
  `DiveSiteTelephoneDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteTelephoneId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteTelephone`
--

LOCK TABLES `DiveSiteTelephone` WRITE;
/*!40000 ALTER TABLE `DiveSiteTelephone` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteTelephone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteType`
--

DROP TABLE IF EXISTS `DiveSiteType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteType` (
  `DiveSiteTypeId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteTypeRank` int(11) NOT NULL,
  `DiveSiteTypeDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteType`
--

LOCK TABLES `DiveSiteType` WRITE;
/*!40000 ALTER TABLE `DiveSiteType` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteVideo`
--

DROP TABLE IF EXISTS `DiveSiteVideo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteVideo` (
  `DiveSiteVideoId` mediumint(8) NOT NULL AUTO_INCREMENT,
  `DiveSiteId` mediumint(8) unsigned NOT NULL,
  `DiveSiteVideoDateEntered` date NOT NULL,
  `DiveSiteCity` varchar(30) NOT NULL,
  `DiveSiteProvince` varchar(15) DEFAULT NULL,
  `DiveSiteCountry` varchar(15) DEFAULT NULL,
  `DiveSiteName` varchar(80) NOT NULL,
  `DiveSiteMajorName` varchar(80) NOT NULL,
  `DiveSiteMinorName` varchar(80) NOT NULL,
  `DiveSiteDifficulty` varchar(20) DEFAULT NULL,
  `DiveSiteExactLat` float(10,6) NOT NULL,
  `DiveSiteExactLong` float(10,6) NOT NULL,
  `DiveSiteVideoTitle` varchar(80) NOT NULL,
  `DiveSiteVideoType` varchar(20) NOT NULL,
  `DiveSiteVideoNoteKeywords` varchar(1000) NOT NULL,
  `DiveSiteVideoURLFileInfo` varchar(150) DEFAULT NULL,
  `DiveSiteVideoNotes` varchar(2000) NOT NULL,
  PRIMARY KEY (`DiveSiteVideoId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteVideo`
--

LOCK TABLES `DiveSiteVideo` WRITE;
/*!40000 ALTER TABLE `DiveSiteVideo` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteVideo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DiveSiteWater`
--

DROP TABLE IF EXISTS `DiveSiteWater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DiveSiteWater` (
  `DiveSiteWaterId` mediumint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DiveSiteWaterRank` int(11) NOT NULL,
  `DiveSiteWaterDescription` varchar(40) NOT NULL,
  PRIMARY KEY (`DiveSiteWaterId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DiveSiteWater`
--

LOCK TABLES `DiveSiteWater` WRITE;
/*!40000 ALTER TABLE `DiveSiteWater` DISABLE KEYS */;
/*!40000 ALTER TABLE `DiveSiteWater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProvinceList`
--

DROP TABLE IF EXISTS `ProvinceList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProvinceList` (
  `ProvinceId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ProvinceCode` varchar(15) NOT NULL,
  `ProvinceName` varchar(40) NOT NULL,
  `ProvinceCountry` varchar(15) NOT NULL,
  PRIMARY KEY (`ProvinceId`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProvinceList`
--

LOCK TABLES `ProvinceList` WRITE;
/*!40000 ALTER TABLE `ProvinceList` DISABLE KEYS */;
INSERT INTO `ProvinceList` VALUES (1,'BC','British Columbia','Canada'),(2,'AB','Alberta','Canada'),(3,'SK','Saskatchewan','Canada'),(4,'MB','Manitoba','Canada'),(5,'QC','Quebec','Canada'),(6,'ON','Ontario','Canada'),(7,'NB','New Brunswick','Canada'),(8,'NS','Nova Scotia','Canada'),(9,'NL','Newfoundland & Labrador','Canada'),(10,'YK','Yukon','Canada'),(11,'NT','Northwest Territories','Canada'),(12,'NU','Nunavut','Canada'),(13,'alabama','Alabama','USA'),(14,'alaska','Alaska','USA'),(15,'arizona','Arizona','USA'),(16,'arkansas','Arkansas','USA'),(17,'california','California','USA'),(18,'colorado','Colorado','USA'),(19,'connecticut','Connecticut','USA'),(20,'delaware','Delaware','USA'),(21,'dc','District of \n\nColumbia','USA'),(22,'florida','Florida','USA'),(23,'georgia','Georgia','USA'),(24,'hawaii','Hawaii','USA'),(25,'idaho','Idaho','USA'),(26,'illinois','Illinois','USA'),(27,'indiana','Indiana','USA'),(28,'iowa','Iowa','USA'),(29,'kansas','Kansas','USA'),(30,'kentucky','Kentucky','USA'),(31,'louisiana','Louisiana','USA'),(32,'maine','Maine','USA'),(33,'maryland','Maryland','USA'),(34,'massachusetts','Massachusetts','USA'),(35,'michigan','Michigan','USA'),(36,'minnesota','Minnesota','USA'),(37,'mississippi','Mississippi','USA'),(38,'missouri','Missouri','USA'),(39,'montana','Montana','USA'),(40,'nebraska','Nebraska','USA'),(41,'nevada','Nevada','USA'),(42,'newhampshire','New \n\nHampshire','USA'),(43,'newjersey','New \n\nJersey','USA'),(44,'newmexico','New \n\nMexico','USA'),(45,'newyork','New York','USA'),(46,'northcarolina','North \n\nCarolina','USA'),(47,'northdakota','North \n\nDakota','USA'),(48,'ohio','Ohio','USA'),(49,'oklahoma','Oklahoma','USA'),(50,'oregon','Oregon','USA'),(51,'pennsylvania','Pennsylvania','USA'),(52,'rhodeisland','Rhode \n\nIsland','USA'),(53,'southcarolina','South \n\nCarolina','USA'),(54,'southdakota','South \n\nDakota','USA'),(55,'tennessee','Tennessee','USA'),(56,'texas','Texas','USA'),(57,'utah','Utah','USA'),(58,'vermont','Vermont','USA'),(59,'virginia','Virginia','USA'),(60,'washington','Washington','USA'),(61,'westvirginia','West \n\nVirginia','USA'),(62,'wisconsin','Wisconsin','USA'),(63,'wyoming','Wyoming','USA');
/*!40000 ALTER TABLE `ProvinceList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ServiceProviderData`
--

DROP TABLE IF EXISTS `ServiceProviderData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ServiceProviderData` (
  `ServiceProviderID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ServiceProviderCode` varchar(30) NOT NULL,
  `ServiceProviderName` varchar(100) DEFAULT NULL,
  `ServiceProviderAddress1` varchar(25) DEFAULT NULL,
  `ServiceProviderAddress2` varchar(25) DEFAULT NULL,
  `ServiceProviderCity` varchar(25) DEFAULT NULL,
  `ServiceProviderProvince` varchar(15) DEFAULT NULL,
  `ServiceProviderCountry` varchar(15) DEFAULT NULL,
  `ServiceProviderPostalCode` varchar(15) DEFAULT NULL,
  `ServiceProviderPhone` varchar(15) DEFAULT NULL,
  `ServiceProviderFaxPhone` varchar(15) DEFAULT NULL,
  `ServiceProviderEmailAddress1` varchar(100) DEFAULT NULL,
  `ServiceProviderEmailAddress2` varchar(100) DEFAULT NULL,
  `ServiceProviderURL` varchar(100) DEFAULT NULL,
  `ServiceProviderContact` varchar(30) DEFAULT NULL,
  `ServiceProviderMsgSuffix` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ServiceProviderID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ServiceProviderData`
--

LOCK TABLES `ServiceProviderData` WRITE;
/*!40000 ALTER TABLE `ServiceProviderData` DISABLE KEYS */;
INSERT INTO `ServiceProviderData` VALUES (1,'BELL','Bell Mobility',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'@txt.bell.ca'),(2,'TELUS','Telus Mobility',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'@msg.telus.com'),(3,'ROGERS','Rogers Canada',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'@pcs.rogers.com'),(4,'FIDO','Fido Canada',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'@fido.ca');
/*!40000 ALTER TABLE `ServiceProviderData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreasureTrove`
--

DROP TABLE IF EXISTS `TreasureTrove`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreasureTrove` (
  `TreasureTroveId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TreasureTroveCode` varchar(15) NOT NULL,
  `TreasureTroveStatus` varchar(10) NOT NULL,
  `TreasureTroveDateInstall` date NOT NULL,
  `TreasureTroveOwner` varchar(30) NOT NULL,
  `TreasureTroveProvince` varchar(15) DEFAULT NULL,
  `TreasureTroveCountry` varchar(15) DEFAULT NULL,
  `TreasureTroveSiteName` varchar(80) NOT NULL,
  `TreasureTroveMajorName` varchar(80) NOT NULL,
  `TreasureTroveMinorName` varchar(80) NOT NULL,
  `TreasureTroveDifficulty` varchar(20) DEFAULT NULL,
  `TreasureTroveDepth` varchar(80) DEFAULT NULL,
  `TreasureTroveNotes` varchar(2000) DEFAULT NULL,
  `TreasureTroveExactLat` float(10,6) NOT NULL,
  `TreasureTroveExactLong` float(10,6) NOT NULL,
  `TreasureTroveShoreLat` float(10,6) NOT NULL,
  `TreasureTroveShoreLong` float(10,6) NOT NULL,
  `TreasureTroveShoreNotes` varchar(2000) DEFAULT NULL,
  `TreasureTroveShoreNotesHints` varchar(1000) DEFAULT NULL,
  `TreasureTroveReviewNotes` varchar(1000) DEFAULT NULL,
  `TreasureTroveWebPage` varchar(150) DEFAULT NULL,
  `TreasureTroveBackground` varchar(150) DEFAULT NULL,
  `TreasureTrovePicture` varchar(100) DEFAULT NULL,
  `TreasureTroveType` varchar(15) NOT NULL,
  `TreasureTroveDiveSiteId` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`TreasureTroveId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreasureTrove`
--

LOCK TABLES `TreasureTrove` WRITE;
/*!40000 ALTER TABLE `TreasureTrove` DISABLE KEYS */;
INSERT INTO `TreasureTrove` VALUES (1,'ATT00001','PENDING','2009-10-25','Grizzly_01','BC','Canada','Madrona Point','Small Wall','','Novice','40\'','',49.312908,-124.243156,49.312511,-124.241302,'','','','','',NULL,'Shore',1),(6,'ATT00006','PENDING','2009-08-20','Grizzly_01','BC','Canada','Madrona Point','Big Wall','','Advanced','90\'',NULL,49.313461,-124.242569,49.312511,-124.241302,NULL,NULL,NULL,NULL,NULL,NULL,'Shore/Boat',6),(2,'ATT00002','PENDING','2011-06-15','Grizzly_01','Alberta','Canada','Lake Minnewanka','Plaque Site','Pilings','Advanced','70\'',NULL,51.243019,-115.494827,51.242760,-115.495178,NULL,NULL,NULL,NULL,NULL,NULL,'Shore',2),(3,'ATT00003','PENDING','2011-07-07','Grizzly_01','Alberta','Canada','Lake Minnewanka','1912 Dam','','Advanced','80\'',NULL,51.246498,-115.497314,51.246181,-115.497925,NULL,NULL,NULL,NULL,NULL,NULL,'Shore',3),(4,'ATT00004','PENDING','2010-07-14','Grizzly_01','Alberta','Canada','Two Jack Lake','River Bed','','Novice','30\'',NULL,51.227959,-115.496521,51.227741,-115.500168,NULL,NULL,NULL,NULL,NULL,NULL,'Shore',4),(5,'ATT00005','PENDING','2009-04-15','Grizzly_01','Alberta','Canada','Two Jack Lake','Fish Bowl','','Advanced','60\'',NULL,51.230026,-115.493607,51.227741,-115.500168,NULL,NULL,NULL,NULL,NULL,NULL,'Shore',5),(7,'KETEST001','ACTIVE','2011-08-26','Grizzly_01','BritishColumbia','Canada','Okanagan Lake','The Store','','Novice','30-90\'','All level site',50.051174,-119.449028,50.051041,-119.448570,NULL,NULL,NULL,NULL,NULL,NULL,'Shore',7),(8,'KETEST002','ACTIVE','2011-08-26','nat','BritishColumbia','Canada','Ellison Lake','Otter Bay','','Novice','30\' - 40\'',NULL,49.986526,-119.387054,49.987793,-119.386322,'Drive to gate and hike gear down',NULL,NULL,NULL,NULL,NULL,'',8),(9,'KETEST003','ACTIVE','2011-08-26','Grizzly_01','BritishColumbia','Canada','Okanagon Lake','Fintry Wreck','','Novice','40\' +','Old RaiL Barge',50.141293,-119.494728,50.140717,-119.495758,'Park at campsite 65 - permission from ranger required','Grapple Grommets',NULL,NULL,NULL,NULL,'',9),(10,'KETEST004','ACTIVE','2011-08-24','nat','BritishColumbia','Canada','Porteau Cove','Nakaya','','ADVANCED','90\'+','Outside - poop deck',49.559864,-123.234177,49.559128,-123.243477,'No parking  fees at the park','Use stairs',NULL,NULL,NULL,NULL,'',10),(11,'KETEST005','ACTIVE','2011-08-15','Grizzly_01','BritishColumbia','Canada','Porteau Cove','Granthall','','Novice','50\'+','In the shadows',49.559788,-123.234436,49.559128,-123.243477,'Parking permits not required',NULL,NULL,NULL,NULL,NULL,'',11);
/*!40000 ALTER TABLE `TreasureTrove` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreasureTroveLog`
--

DROP TABLE IF EXISTS `TreasureTroveLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreasureTroveLog` (
  `TreasureTroveLogId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TreasureTroveLogStatus` varchar(10) NOT NULL,
  `TreasureTroveLogCode` varchar(15) NOT NULL,
  `TreasureTroveLogType` varchar(20) NOT NULL,
  `TreasureTroveLogDate` date NOT NULL,
  `TreasureTroveLogUser` varchar(30) NOT NULL,
  `TreasureTroveLogNotes` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`TreasureTroveLogId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreasureTroveLog`
--

LOCK TABLES `TreasureTroveLog` WRITE;
/*!40000 ALTER TABLE `TreasureTroveLog` DISABLE KEYS */;
INSERT INTO `TreasureTroveLog` VALUES (1,'ACTIVE','ATT00001','FOUND','2009-10-26','Grizzly_01','found easily'),(2,'ACTIVE','ATT00001','NOT FOUND','2009-10-25','Grizzly_01','Serached and could not find - come back another day'),(3,'ACTIVE','ATT00001','FOUND','2009-10-28','Grizzly_01','ok - good spot for it'),(6,'ACTIVE','ATT00001','FOUND','2010-01-11','nat','test add with new screen'),(5,'ACTIVE','ATT00001','FOUND','2010-01-07','nat','Cool spot for it - octopus curled around it was an added bonuse'),(7,'ACTIVE','ATT00001','FOUND','2010-01-12','nat','try add on next day'),(8,'ACTIVE','ATT00001','FOUND','2010-01-13','nat','third add test'),(9,'ACTIVE','ATT00001','FOUND','2010-01-14','nat','changed to add another record'),(10,'ACTIVE','ATT00001','FOUND','2010-01-15','nat','changed to add another record'),(11,'ACTIVE','ATT00001','NOT FOUND','2010-02-16','nat','test add to see if this works'),(12,'ACTIVE','ATT00001','FOUND','2010-02-17','nat','test add of trove find ');
/*!40000 ALTER TABLE `TreasureTroveLog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreasureTroveLogPix`
--

DROP TABLE IF EXISTS `TreasureTroveLogPix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreasureTroveLogPix` (
  `TreasureTroveLogPixId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TreasureTroveLogPixCode` varchar(15) NOT NULL,
  `TreasureTroveLogPixDate` date NOT NULL,
  `TreasureTroveLogPixUser` varchar(30) NOT NULL,
  `TreasureTroveLogPixTitle` varchar(100) DEFAULT NULL,
  `TreasureTroveLogPixName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TreasureTroveLogPixId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreasureTroveLogPix`
--

LOCK TABLES `TreasureTroveLogPix` WRITE;
/*!40000 ALTER TABLE `TreasureTroveLogPix` DISABLE KEYS */;
INSERT INTO `TreasureTroveLogPix` VALUES (2,'ATT00001','2009-10-26','Grizzly_01','test add pix','./TreasureTrovePix/ATT00001=2009-10-26=Grizzly_01=2.jpg'),(3,'ATT00001','2009-10-25','Grizzly_01','test pix add','./TreasureTrovePix/ATT00001=2009-10-25=Grizzly_01=3.jpg'),(4,'ATT00001','2009-10-25','Grizzly_01','Added and changed test','./TreasureTrovePix/ATT00001=2009-10-25=Grizzly_01=4.jpg'),(5,'ATT00001','2010-01-14','nat','Test ADD after the fact','./TreasureTrovePix/ATT00001=2010-01-14=nat=5.jpg');
/*!40000 ALTER TABLE `TreasureTroveLogPix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreasureTroveTrackable`
--

DROP TABLE IF EXISTS `TreasureTroveTrackable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreasureTroveTrackable` (
  `TreasureTroveTrackableId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TreasureTroveTrackableCode` varchar(15) NOT NULL,
  `TreasureTroveTrackableStatus` varchar(10) NOT NULL,
  `TreasureTroveTrackableDateInstall` date NOT NULL,
  `TreasureTroveTrackableOwner` varchar(30) NOT NULL,
  `TreasureTroveTrackableName` varchar(80) NOT NULL,
  `TreasureTroveTrackableMissionNotes` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`TreasureTroveTrackableId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreasureTroveTrackable`
--

LOCK TABLES `TreasureTroveTrackable` WRITE;
/*!40000 ALTER TABLE `TreasureTroveTrackable` DISABLE KEYS */;
INSERT INTO `TreasureTroveTrackable` VALUES (1,'SHARK000001','PENDING','2009-10-25','Grizzly_01','First one out of the chute','going to thailand'),(2,'123123','PENDING','2009-10-25','Grizzly_01','dodo','hope');
/*!40000 ALTER TABLE `TreasureTroveTrackable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreasureTroveTrackableLog`
--

DROP TABLE IF EXISTS `TreasureTroveTrackableLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreasureTroveTrackableLog` (
  `TreasureTroveTrackableLogId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TreasureTroveTrackableLogStatus` varchar(10) NOT NULL,
  `TreasureTroveTrackableLogCode` varchar(15) NOT NULL,
  `TreasureTroveTrackableLogTroveCode` varchar(15) NOT NULL,
  `TreasureTroveTrackableLogDate` date NOT NULL,
  `TreasureTroveTrackableLogUser` varchar(30) NOT NULL,
  `TreasureTroveTrackableLogNotes` varchar(2000) DEFAULT NULL,
  `TreasureTroveTrackableLogType` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TreasureTroveTrackableLogId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreasureTroveTrackableLog`
--

LOCK TABLES `TreasureTroveTrackableLog` WRITE;
/*!40000 ALTER TABLE `TreasureTroveTrackableLog` DISABLE KEYS */;
INSERT INTO `TreasureTroveTrackableLog` VALUES (1,'ACTIVE','SHARK000001','ATT00001','2009-10-25','Grizzly_01','Adding shark to ATT00001','ADD'),(2,'ACTIVE','123123','ATT00001','2009-10-25','Grizzly_01','jh','ADD'),(3,'ACTIVE','123123','ATT00001','2009-10-27','Grizzly_01','Moving on!','REMOVE');
/*!40000 ALTER TABLE `TreasureTroveTrackableLog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreasureTroveTrackableLogPix`
--

DROP TABLE IF EXISTS `TreasureTroveTrackableLogPix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreasureTroveTrackableLogPix` (
  `TreasureTroveTrackableLogPixId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `TreasureTroveTrackableLogPixCode` varchar(15) NOT NULL,
  `TreasureTroveTrackableLogPixDate` date NOT NULL,
  `TreasureTroveTrackableLogPixUser` varchar(30) NOT NULL,
  `TreasureTroveTrackableLogPixTitle` varchar(100) DEFAULT NULL,
  `TreasureTroveTrackableLogPixName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TreasureTroveTrackableLogPixId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreasureTroveTrackableLogPix`
--

LOCK TABLES `TreasureTroveTrackableLogPix` WRITE;
/*!40000 ALTER TABLE `TreasureTroveTrackableLogPix` DISABLE KEYS */;
INSERT INTO `TreasureTroveTrackableLogPix` VALUES (3,'123123','2009-10-25','Grizzly_01','test','./TreasureTroveTrackablePix/123123=2009-10-25=Grizzly_01=3.jpg'),(4,'123123','2009-10-25','Grizzly_01','try','./TreasureTroveTrackablePix/123123=2009-10-25=Grizzly_01=4.jpg'),(5,'123123','2009-10-25','Grizzly_01','test 4','./TreasureTroveTrackablePix/123123=2009-10-25=Grizzly_01=5.jpg'),(6,'SHARK000001','2009-10-25','Grizzly_01','Test of pix add','./TreasureTroveTrackablePix/SHARK000001=2009-10-25=Grizzly_01=6.jpg');
/*!40000 ALTER TABLE `TreasureTroveTrackableLogPix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserList`
--

DROP TABLE IF EXISTS `UserList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserList` (
  `UserId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `UserCode` varchar(30) NOT NULL,
  `UserPassword` varchar(20) DEFAULT NULL,
  `UserEmailAddress1` varchar(100) DEFAULT NULL,
  `UserStatus` varchar(10) DEFAULT NULL,
  `UserLevel` varchar(15) DEFAULT NULL,
  `UserSignUpDate` date DEFAULT NULL,
  `UserNotes` varchar(500) DEFAULT NULL,
  `UserLastName` varchar(40) DEFAULT NULL,
  `UserGivenName` varchar(40) DEFAULT NULL,
  `UserAddress1` varchar(60) DEFAULT NULL,
  `UserAddress2` varchar(60) DEFAULT NULL,
  `UserCity` varchar(60) DEFAULT NULL,
  `UserProvince` varchar(20) DEFAULT NULL,
  `UserCountry` varchar(20) DEFAULT NULL,
  `UserPostalCode` varchar(15) DEFAULT NULL,
  `UserCellPhone` varchar(15) DEFAULT NULL,
  `UserCellPhoneProvider` varchar(15) DEFAULT NULL,
  `UserCellTextPermission` varchar(3) DEFAULT NULL,
  `UserFoundTroveNumber` mediumint(8) unsigned DEFAULT NULL,
  `UserOwnedTroveNumber` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserList`
--

LOCK TABLES `UserList` WRITE;
/*!40000 ALTER TABLE `UserList` DISABLE KEYS */;
INSERT INTO `UserList` VALUES (1,'Grizzly_01','forget','Grizzly_01@test.com','PENDING','STANDARD','2009-10-25','','','','','','Calgary','Alberta','Canada','','','','',0,0),(2,'Grizzly_02','hello','test@test.com','PENDING','STANDARD','2009-11-06','test add with password handler','G_02Sn','G_02Gn','G_02Sn add1','G_02Sn add1','Calgary','Alberta','Canada','','','','',0,0),(3,'Frzzly_03','fff','','PENDING','STANDARD','2009-11-06','','','','','','Calgary','Alberta','Canada','','','','',0,0),(4,'H0001','asd','H001@test.com','PENDING','STANDARD','2009-11-06','','','','','','Calgary','Alberta','Canada','','','','',0,0),(5,'Grizzly_021','forget','Grizzly_021@test.com','PENDING','STANDARD','2009-11-22','','','','','','Calgary','Alberta','Canada','','','','',0,0),(6,'Zip','zip','zip@zip.com','PENDING','STANDARD','2009-11-24','','','','','','Calgary','Alberta','Canada','','','','',0,0),(7,'nat','nat','nat@nat.nat','PENDING','STANDARD','2010-01-23','','nat','nat','nat','nat','Calgary','Alberta','Canada','t2m3s2','','','',0,0);
/*!40000 ALTER TABLE `UserList` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-04 12:19:30
