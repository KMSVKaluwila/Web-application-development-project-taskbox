-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: taskbox
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agerating`
--

DROP TABLE IF EXISTS `agerating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agerating` (
  `age_ID` int NOT NULL AUTO_INCREMENT,
  `age` varchar(45) NOT NULL,
  PRIMARY KEY (`age_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agerating`
--

LOCK TABLES `agerating` WRITE;
/*!40000 ALTER TABLE `agerating` DISABLE KEYS */;
INSERT INTO `agerating` VALUES (1,'Everyone'),(2,'Teen'),(3,'Everyone 10+'),(4,'17+'),(5,'Only 18+');
/*!40000 ALTER TABLE `agerating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `cart_qty` varchar(45) NOT NULL,
  `user_userID` int NOT NULL,
  `stock_stock_ID` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_user1_idx` (`user_userID`),
  KEY `fk_cart_stock1_idx` (`stock_stock_ID`),
  CONSTRAINT `fk_cart_stock1` FOREIGN KEY (`stock_stock_ID`) REFERENCES `stock` (`stock_ID`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (10,'1',2,28),(17,'1',3,24),(21,'1',2,10),(22,'1',2,6),(23,'1',2,39),(24,'1',2,23);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developer`
--

DROP TABLE IF EXISTS `developer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `developer` (
  `developer_ID` int NOT NULL AUTO_INCREMENT,
  `developer_name` varchar(45) NOT NULL,
  PRIMARY KEY (`developer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developer`
--

LOCK TABLES `developer` WRITE;
/*!40000 ALTER TABLE `developer` DISABLE KEYS */;
INSERT INTO `developer` VALUES (1,'Epic Games'),(2,'Nintendo'),(3,'Activision Blizzard'),(4,'Square Enix'),(5,'Gameloft'),(6,'Rockstar Games'),(7,'Crytec'),(8,'Sony Computer Entertainment'),(9,'Ubisoft Montreal'),(10,'DICE (Digital Illusions CE)'),(11,'Guerrilla Games');
/*!40000 ALTER TABLE `developer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gander`
--

DROP TABLE IF EXISTS `gander`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gander` (
  `ganderID` int NOT NULL AUTO_INCREMENT,
  `ganderType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ganderID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gander`
--

LOCK TABLES `gander` WRITE;
/*!40000 ALTER TABLE `gander` DISABLE KEYS */;
INSERT INTO `gander` VALUES (1,'Male'),(2,'Female'),(3,'Other');
/*!40000 ALTER TABLE `gander` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genre` (
  `genre_ID` int NOT NULL AUTO_INCREMENT,
  `genre_typ` varchar(45) NOT NULL,
  PRIMARY KEY (`genre_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Action-adventure game'),(2,'RPG'),(3,'Adventure game'),(4,'Fighting'),(5,'Funny'),(6,'Third-Person Action'),(7,'First-Person Shooter'),(8,'Online Shooter'),(9,'Adventure'),(10,'	Sport');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_hitory`
--

DROP TABLE IF EXISTS `order_hitory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_hitory` (
  `ohid` int NOT NULL AUTO_INCREMENT,
  `oid` text NOT NULL,
  `order_date` datetime NOT NULL,
  `amount` double NOT NULL,
  `user_userID` int NOT NULL,
  PRIMARY KEY (`ohid`),
  KEY `fk_order_hitory_user1_idx` (`user_userID`),
  CONSTRAINT `fk_order_hitory_user1` FOREIGN KEY (`user_userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_hitory`
--

LOCK TABLES `order_hitory` WRITE;
/*!40000 ALTER TABLE `order_hitory` DISABLE KEYS */;
INSERT INTO `order_hitory` VALUES (1,'66aa82ffbc8a4','2024-08-01 00:10:12',20900,2),(3,'66aa8ac7e0596','2024-08-01 00:35:19',10400,2),(4,'66acf7b1019fa','2024-08-02 20:44:42',34900,2),(5,'66acf9978da92','2024-08-02 20:52:39',33788,3),(6,'66acfa426490e','2024-08-02 20:55:17',25400,3),(7,'66ad01931fd27','2024-08-02 21:26:36',5200,3),(8,'66ae1281e60c5','2024-08-03 16:51:39',30900,4);
/*!40000 ALTER TABLE `order_hitory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_iteam`
--

DROP TABLE IF EXISTS `order_iteam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_iteam` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `oi_qty` int NOT NULL,
  `order_hitory_ohid` int NOT NULL,
  `stock_stock_ID` int NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `fk_order_iteam_order_hitory1_idx` (`order_hitory_ohid`),
  KEY `fk_order_iteam_stock1_idx` (`stock_stock_ID`),
  CONSTRAINT `fk_order_iteam_order_hitory1` FOREIGN KEY (`order_hitory_ohid`) REFERENCES `order_hitory` (`ohid`),
  CONSTRAINT `fk_order_iteam_stock1` FOREIGN KEY (`stock_stock_ID`) REFERENCES `stock` (`stock_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_iteam`
--

LOCK TABLES `order_iteam` WRITE;
/*!40000 ALTER TABLE `order_iteam` DISABLE KEYS */;
INSERT INTO `order_iteam` VALUES (1,1,1,6),(2,1,3,4),(3,1,4,4),(4,1,4,18),(5,1,4,36),(6,1,4,23),(7,1,5,27),(8,1,5,41),(9,1,6,33),(10,1,6,19),(11,1,7,24),(12,1,8,32),(13,1,8,40),(14,1,8,20);
/*!40000 ALTER TABLE `order_iteam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platform`
--

DROP TABLE IF EXISTS `platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `platform` (
  `plat_ID` int NOT NULL AUTO_INCREMENT,
  `platform_type` varchar(45) NOT NULL,
  PRIMARY KEY (`plat_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platform`
--

LOCK TABLES `platform` WRITE;
/*!40000 ALTER TABLE `platform` DISABLE KEYS */;
INSERT INTO `platform` VALUES (1,'PC'),(2,'Nintendo Switch'),(3,'Xbox Game Pass'),(4,'Playstation');
/*!40000 ALTER TABLE `platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `pro_ID` int NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `path` varchar(100) NOT NULL,
  `publisher_pub_ID` int NOT NULL,
  `platform_plat_ID` int NOT NULL,
  `genre_genre_ID` int NOT NULL,
  `developer_developer_ID` int NOT NULL,
  `agerating_age_ID` int NOT NULL,
  PRIMARY KEY (`pro_ID`),
  KEY `fk_product_publisher1_idx` (`publisher_pub_ID`),
  KEY `fk_product_platform1_idx` (`platform_plat_ID`),
  KEY `fk_product_genre1_idx` (`genre_genre_ID`),
  KEY `fk_product_developer1_idx` (`developer_developer_ID`),
  KEY `fk_product_agerating1_idx` (`agerating_age_ID`),
  CONSTRAINT `fk_product_agerating1` FOREIGN KEY (`agerating_age_ID`) REFERENCES `agerating` (`age_ID`),
  CONSTRAINT `fk_product_developer1` FOREIGN KEY (`developer_developer_ID`) REFERENCES `developer` (`developer_ID`),
  CONSTRAINT `fk_product_genre1` FOREIGN KEY (`genre_genre_ID`) REFERENCES `genre` (`genre_ID`),
  CONSTRAINT `fk_product_platform1` FOREIGN KEY (`platform_plat_ID`) REFERENCES `platform` (`plat_ID`),
  CONSTRAINT `fk_product_publisher1` FOREIGN KEY (`publisher_pub_ID`) REFERENCES `publisher` (`pub_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Batman Arkham Collection – PlayStation 4','Batman: Arkham Collection includes: Batman: Arkham Asylum Batman: Arkham City Batman: Arkham Knight (full game download) Batman: ','resources/productimage//66a8f6555c67e.png',1,1,4,3,5),(2,'Red Dead Redemption 2','Red Dead Redemption 2 is a 2018 action-adventure game developed and published by Rockstar Games.','resources\\productimage\\66a8f81c7227f.png',5,3,1,6,5),(3,'The Legend of Zelda: Breath of the Wild','The Legend of Zelda: Breath of the Wild is a 2017 action-adventure game developed and published by Nintendo for the Nintendo Switch and Wii U.','resources/productimage//66a8f8ddc3ba0.png',1,2,3,1,2),(4,'Mass Effect 2','Mass Effect 2 is an action role-playing video game developed by BioWare and published by Microsoft Game Studios and Electronic Arts for Windows and Xbox 360 in 2010 and published by Electronic Arts','resources/productimage//66a8f9c572e9a.png',4,4,5,1,1),(5,'Crysis Remastered Trilogy','Crysis Remastered – A simple rescue mission turns into an all-out war as alien invaders swarm over a chain of North Korean islands. ','resources/productimage//66a91f12d67ef.png',6,4,4,7,4),(6,'The Lost Legacy','Led by fan-favorite character, Chloe Frazer, Uncharted: The Lost Legacy is an standalone chapter covering unseen aspects of the Uncharted saga.','resources/productimage//66a91ffcd8531.png',7,4,3,8,4),(7,'Destiny 2 ','From Bungie, the makers of the acclaimed hit game Destiny, comes the much-anticipated sequel, Destiny 2.','resources/productimage//66a920ec68d50.png',8,4,1,3,4),(8,'Grand Theft Auto V Premium Edition','Trouble taps on your window again with this next chapter in the Grand Theft Auto universe, set in the city of Los Santos and its surrounding hills, countryside and beaches.','resources/productimage//66a9218ed9044.png',5,1,6,6,5),(9,'Far Cry 5','In Far Cry 5, players take on the role of the new junior deputy in Hope County, Montana, ','resources/productimage//66a9225c823b1.png',9,1,7,9,5),(10,'Ghost Recon Wildlands Gold Edition','Bolivia, a few years from now: this beautiful South American country has become the largest cocaine producer in the world. The influential and vic','resources/productimage//66a922d0208ef.png',9,3,7,9,4),(11,'Assassin’s Creed Origins','Start here, at the very beginning, with the never-before-told origin story of Assassin’s Creed. Set in Ancient Egypt, players will journey to the most mysterious place in history,','resources/productimage//66a9233875f28.png',9,4,4,9,2),(12,'Uncharted 4: A Thief’s End','Set three years after the events of Uncharted 3: Drake’s Deception, Nathan Drake has presumably left the world of fortune hunting behind.','resources/productimage//66a923b141e81.png',7,3,3,8,5),(13,'Uncharted The Nathan Drake Collection','From the groundbreaking storytellers at Naughty Dog, comes the genre-defining epic that revolutionized adventure storytelling, rebuilt by Bluepoint Games with the power of the PS4 system. ','resources/productimage//66a9242822a56.png',7,2,2,2,2),(14,'Star Wars: Battlefront II ','This follow-up to the 2015 Star Wars multiplayer battle game promises “bigger and better worlds” and content from the new films in the Star Wars franchise.','resources/productimage//66a924d8653c3.png',10,4,8,10,1),(15,'Watch Dogs 2 ','Players will explore the birthplace of the tech revolution as Marcus Holloway, a brilliant young hacker who has fallen victim to ctOS 2.0’s ','resources/productimage//66a9257ae4302.png',1,4,1,3,3),(16,'Pokemon Ultra Moon USA','Featuring Pokemon not seen in the original adventures, Pokemon Ultra Sun and Pokemon Ultra Moon offer an alternate story taking place in the world of Pokemon Sun/Moon.','resources/productimage//66a926117fa37.png',7,2,4,2,1),(17,'Grand Theft Auto: The Trilogy','Three iconic cities, three epic stories. Play the genre-defining classics of the original Grand Theft Auto Trilogy: Grand Theft Auto III, Grand Theft Auto: Vice City and Grand Theft Auto:','resources/productimage//66abef52032d0.png',5,4,1,6,5),(18,'Horizon: Zero Dawn','Horizon Zero Dawn is an exhilarating action role playing game developed by the award winning Guerrilla Games, creators of PlayStation’s venerated Killzone franchise. ','resources/productimage//66abf02ac3e6e.png',11,4,9,11,1),(19,'Ghost of Tsushima Director’s Cut','Pre-order now and receive the following digital content* (redeem by 31 December 2024):\r\n\r\n','resources/productimage//66abf164d884b.png',7,2,4,2,4),(20,'God of War Ragnarök','Embark on an epic and heartfelt journey as Kratos and Atreus struggle with holding on and letting go.\r\n','resources/productimage//66abf1facde34.png',10,1,1,3,1),(21,'Call of Duty: Black Ops Cold War','The iconic Black Ops series is back with Call of Duty®: Black Ops Cold War – the direct sequel to the original and fan-favourite Call of Duty®: Black Ops.','resources/productimage//66abf2c0766c7.png',1,1,7,3,3),(22,'Kena: Bridge of Spirits Deluxe Edition','A story-driven, action adventure combining exploration with fast-paced combat.','resources/productimage//66abf33e654e3.png',10,3,3,5,1),(23,'Gran Turismo 7','Whether you’re a competitive or casual racer, collector, tuner, livery designer, or photographer ','resources/productimage//66abf3e2673ac.png',8,3,2,1,2),(24,'Watch Dogs: Legion','In the near future, London is facing its downfall. After devastating terror attacks rock the city, an all-seeing authoritarian state has oppressed the people,','resources/productimage//66abf45b74e24.png',7,2,2,2,3),(25,'Marvel’s Spider-Man','Discover the complete web-slinging story with the Marvel’s Spider-Man: Miles Morales Ultimate Edition. This unmissable bundle includes Marvel’s Spider-Man Remastered','resources/productimage//66abf4ce918a0.png',1,1,1,1,1),(26,'Godfall','Aperion is on the precipice of ruin. You are the last of the Valorian knights, god-like warriors able to equip Valorplates, ','resources/productimage//66abf556c2c43.png',11,4,9,11,5),(27,'Immortals of Aveum','Join the Order of the Immortals, the champion protectors of Lucium, and become Jak, an elite Triarch Magnus. ','resources/productimage//66abf6140c33a.png',7,3,3,3,2),(28,'Call of Duty: Modern Warfare III ','In the direct sequel to the record-breaking Call of Duty®: Modern Warfare® II, Captain Price and Task Force 141 face off against the ultimate threat.','resources/productimage//66ac4af49e598.png',1,4,7,3,4),(29,'Call of Duty: Modern Warfare','The stakes have never been higher as players take on the role of lethal Tier One operators in a heart-racing saga that will affect the global balance of power. Call of Duty®:','resources/productimage//66ac4b5e42e40.png',1,4,7,3,5),(30,'EA Sports FC 24','EA SPORTS FC 24 welcomes you to The World’s Game—the most true-to-football experience ever with HyperMotionV.','resources/productimage//66ac4c4c96359.png',11,4,10,11,5),(31,'Call of Duty Modern Warfare II','Call of Duty®: Modern Warfare® II is the sequel to 2019’s blockbuster Modern Warfare®. Featuring the return of the iconic, team leader Captain John Price.','resources/productimage//66ac4ce8a24a4.png',1,4,7,3,4),(32,'Titanfall 2','Bring down the sky yet again in the fast-paced warfare of the sequel to Titanfall, featuring multiplayer and for the first time a single-player ','resources/productimage//66ac4d7f2e9a8.png',9,4,2,4,2),(33,'Dragon Ball Xenoverse','Bandai Namco’s Dragon Ball Xenoverse 1 + 2 Double Pack for the Sony PS4 will bring all the frantic battles between Goku ','resources/productimage//66ac4efb39cab.png',7,4,4,2,2),(34,'Skull And Bones','Enter the perilous paradise of SKULL AND BONES inspired by the Indian Ocean during the Golden Age of Piracy, as you overcome the odds and rise from an outcast to an infamous pirate.','resources/productimage//66ae3921b94b7.png',4,1,2,5,2),(35,'Avatar: Frontiers of Pandora','Avatar: Frontiers of Pandora™ is a first-person, action-adventure game set in the Western Frontier.','resources/productimage//66ae397ee4a1d.png',10,3,1,1,3),(36,'Cyberpunk 2077 Ultimate Edition','Cyberpunk 2077 Ultimate Edition includes an exclusive set of stickers and rewards leaflet with a Wild Hunt Jacket and a Scorch Pistol','resources/productimage//66ae39f3680ba.png',5,4,6,6,5),(37,'Ultimate Ninja Storm Connections','Celebrate the 20th anniversary of Naruto’s anime debut with Naruto X Boruto Ultimate Ninja Storm Connections.','resources/productimage//66ae3adaa26dd.png',7,4,4,2,1),(38,'Helldivers 2','Enlist in the Helldivers and join the fight for freedom across a hostile galaxy in a fast, frantic, and ferocious third-person shooter.\r\n\r\n','resources/productimage//66ae3b7bcc60e.png',4,4,1,4,3),(39,'Tom Clancy’s Rainbow Six Siege','Tom Clancy’s Rainbow Six Siege features an ever-expanding experience with limitless opportunities to perfect your strategy and help lead your team to victory. ','resources/productimage//66ae3c5b8faf0.png',8,4,4,9,5),(40,'Mortal Kombat 11 Ultimate','Take control of Earthrealm’s protectors in the game’s TWO critically acclaimed, time-bending Story Campaigns as they race to stop Kronika from rewinding time and rebooting history. ','resources/productimage//66ae3ce480509.png',8,4,4,3,5),(41,'Assassins Creed Valhalla','Ninth century AD. Driven from Norway by endless wars and dwindling resources, a Viking raider, Eivor, leads a clan of Norsemen across the icy North Sea to the rich lands of England’s broken kingdoms','resources/productimage//66ae3d73a9269.png',11,3,4,1,5),(42,'Hitman 3','HITMAN 3 is the dramatic conclusion to the World of Assassination trilogy and takes players around the world on a globetrotting adventure to sprawling sandbox locations','resources/productimage//66ae3dc8ce521.png',11,3,7,8,4);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publisher` (
  `pub_ID` int NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(45) NOT NULL,
  PRIMARY KEY (`pub_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'Activision'),(2,'Activision Blizzard'),(3,'Addictive Games'),(4,'The Adventure '),(5,'Rockstar Games'),(6,'Crytec'),(7,'Naughty Dog Software'),(8,'Bungie Software'),(9,'Ubisoft'),(10,'Electronic Arts'),(11,'Sony Computer ');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `stock_ID` int NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `qut` int NOT NULL,
  `status` int DEFAULT '1',
  `product_pro_ID` int NOT NULL,
  PRIMARY KEY (`stock_ID`),
  KEY `fk_stock_product1_idx` (`product_pro_ID`),
  CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_pro_ID`) REFERENCES `product` (`pro_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (4,10000,4,1,5),(5,20000,10,1,6),(6,20500,7,1,7),(8,16000,50,1,9),(9,88000,10,1,10),(10,8800,10,1,1),(11,16000,10,1,2),(12,10000,6,1,3),(13,5000,20,1,4),(14,8850,3,1,5),(15,7888,12,1,6),(16,8500,7,1,7),(18,6000,7,1,9),(19,9000,11,1,10),(20,4500,6,1,11),(21,8500,8,1,12),(22,3000,4,1,13),(23,8500,9,1,14),(24,4800,11,1,15),(25,7500,4,1,16),(26,4500,15,1,8),(27,10888,11,1,17),(28,5888,12,1,17),(29,15888,12,1,19),(30,16888,12,1,20),(31,12000,12,1,21),(32,11000,11,1,22),(33,16000,11,1,23),(34,9050,12,1,24),(35,12500,14,1,25),(36,10000,11,1,26),(37,14500,12,1,27),(38,2500,14,1,28),(39,12050,14,1,29),(40,15000,9,1,30),(41,22500,11,1,31),(42,1000,12,1,32),(43,12000,12,1,33),(44,14500,14,1,34),(45,19000,12,1,35),(46,15020,12,1,36),(47,16800,12,1,37),(48,14800,12,1,38),(49,3500,6,1,39),(50,11000,12,1,40),(51,8500,8,1,41),(52,15000,9,1,42);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `gander_ganderID` int NOT NULL,
  `usertype_usertypeID` int NOT NULL,
  `no` varchar(45) DEFAULT NULL,
  `line_01` varchar(45) DEFAULT NULL,
  `line_02` varchar(45) DEFAULT NULL,
  `img_path` varchar(150) DEFAULT NULL,
  `v_code` text,
  PRIMARY KEY (`userID`),
  KEY `fk_user_gander_idx` (`gander_ganderID`),
  KEY `fk_user_usertype1_idx` (`usertype_usertypeID`),
  CONSTRAINT `fk_user_gander` FOREIGN KEY (`gander_ganderID`) REFERENCES `gander` (`ganderID`),
  CONSTRAINT `fk_user_usertype1` FOREIGN KEY (`usertype_usertypeID`) REFERENCES `usertype` (`usertypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Shehan','Wishwa','0716750200','shehanwishwa38@gmail.com',1,'123654',1,1,NULL,NULL,NULL,NULL,NULL),(2,'Vimukthi','Kaluwila','0252245892','kmsvsachin@gmail.com',1,'seaways',1,1,'01','karapikkada road','Medawachchiya','resources/profileImage/66a9d233a21c4.png','66ae89fcdf3aa'),(3,'sithumin','pramoddaya','0716750200','sithumini@gmail.com',1,'123456',2,2,'01','karapikkada road','Medawachchiya',NULL,NULL),(4,'nethmini','pramoddaya','0716750200','nethmini@gmail.com',1,'123456',2,2,NULL,NULL,NULL,NULL,NULL),(5,'pasidu','prebasana','0716750200','pasidu@gmail.com',1,'789456',1,2,NULL,NULL,NULL,NULL,NULL),(6,'dumidu','kaluwila','0253645976','dumidu@gmail.com',0,'789456',1,2,NULL,NULL,NULL,NULL,NULL),(7,'asela','pathirana','0253645123','asela@gmail.com',1,'asd456',1,2,NULL,NULL,NULL,NULL,NULL),(8,'usesh','hewage','0253123456','udeshi@gmail.com',1,'098lkj',1,2,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `usertypeID` int NOT NULL AUTO_INCREMENT,
  `userType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`usertypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'Addmin'),(2,'User');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-05 10:01:03
