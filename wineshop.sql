/*
SQLyog Ultimate v9.63 
MySQL - 5.6.12-log : Database - wineshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `wineshop`;

/*Table structure for table `admin-user` */

DROP TABLE IF EXISTS `admin-user`;

CREATE TABLE `admin-user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `adharno` bigint(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(15) NOT NULL,
  `zip` int(10) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `admin-user` */

insert  into `admin-user`(`id`,`name`,`email`,`mobile`,`adharno`,`password`,`address`,`country`,`zip`,`city`,`state`) values (1,'Bhakti Prasad','alex@gmail.com',9090909090,408773644415,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','INDIA',123456,'utah','SC');

/*Table structure for table `auditor_stock_updates` */

DROP TABLE IF EXISTS `auditor_stock_updates`;

CREATE TABLE `auditor_stock_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `var_type_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `vol_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `stock_diff_qty` int(11) DEFAULT NULL,
  `in_out` char(5) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `auditor_stock_updates` */

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`) values (192,'1965 Spirit of Victory'),(234,'7 Hills'),(185,'8 PM'),(197,'Absolut'),(63,'AD79'),(136,'Addiction'),(188,'After Dark'),(177,'Alpha Q'),(55,'Amrut Amalgam'),(164,'Antiquity'),(103,'Aristocrat'),(35,'Artic'),(23,'ASB'),(85,'B & G Barton & Guestier'),(10,'Bacardi'),(250,'Baccardi'),(160,'Bagpiper'),(194,'Ballantine\'s'),(84,'Banrock Station'),(146,'Beach House'),(216,'Beck\'s Ice'),(205,'BEE FEATER'),(62,'Bhutan Blue'),(65,'Bill Carson'),(210,'Black & Gold'),(167,'Black & White'),(20,'Black Berry'),(209,'Black Bull'),(166,'Black Dog'),(244,'Black Fort'),(86,'Black Tower'),(137,'Blue Eyes'),(178,'Blue Lagoon'),(175,'Blue Magic'),(142,'Bols Premier'),(13,'Bombay Sapphire'),(143,'BOOTZ Dark'),(249,'Breezer'),(57,'Bro Code'),(87,'Brut Freixenet'),(227,'Budweiser'),(12,'Camino Real'),(171,'Captain Morgan'),(25,'Carbon Alpha'),(156,'Carew\'s Doctor'),(219,'Carlsberg'),(112,'Carnival Grande'),(233,'Cats Eyes'),(71,'Chateau'),(102,'Chinkara'),(193,'Chivas Regal '),(173,'Ciroc Snap'),(1,'Class 21'),(118,'Cliff Hanger'),(49,'Cointreau'),(40,'Colonel\'s'),(138,'Commander N Chief'),(184,'Contessa'),(229,'Corona'),(183,'Courrier Napoleon'),(144,'Cutty Sark'),(64,'D&G Directors Goal'),(223,'Dansberg'),(32,'Dark Knight'),(176,'Day & Night'),(28,'Democrat'),(134,'Dennis'),(221,'Denzong'),(161,'Derby'),(14,'Dewar\'s'),(46,'Dia'),(42,'Diplomat'),(41,'Doctor\'s'),(50,'Don Alejandro'),(90,'Don Angel'),(123,'Double Blue'),(217,'Druk'),(113,'Eclipse'),(58,'Enso Japanese'),(125,'Episode'),(31,'Especial Constantino'),(128,'Fashion'),(99,'Fortant'),(214,'Fosters'),(140,'Four Seasons'),(94,'Fratelli'),(19,'Front Line'),(76,'GHOST'),(115,'Gladius'),(93,'Glengrant'),(56,'God\'s Own'),(226,'Godfather'),(211,'Gold House'),(8,'Golden Green'),(24,'Golden Rock on'),(83,'Golden Sparrow'),(6,'Golfer\'s Shot'),(67,'Governors Reserve'),(107,'Granton'),(11,'Grey Goose'),(152,'Grover'),(51,'Hardys'),(212,'Haywards'),(222,'He-Man'),(240,'Heineken'),(26,'Hercules'),(33,'Highflyer'),(228,'Hoegaarden'),(237,'Hunter'),(196,'Imperial Blue'),(111,'Jackies Crown'),(199,'Jacob\'s Creek'),(89,'Jagermeister'),(200,'Jameson'),(141,'John Exshaw'),(132,'John Rider'),(170,'Johnnie Walker'),(116,'Jordy\'s Bar '),(247,'Jumbo'),(224,'Jungle King'),(238,'Kalyani'),(239,'KingFisher'),(131,'Kingmon Royal'),(43,'Knght Rider'),(213,'KNOCK OUT'),(225,'Kotsberg'),(95,'Kyra'),(72,'Lancers'),(17,'Laphroaigislay'),(52,'LE Grand'),(120,'LE ROI\''),(231,'Leffe'),(34,'Lemme'),(101,'Lindeman\'s'),(9,'Lion Daddy'),(235,'M Power'),(187,'M2 Magic Moments'),(151,'Mad General'),(45,'Madera Nashik'),(182,'Madiraa Gold'),(186,'Magic Moments'),(119,'Maharani'),(232,'Maikal'),(179,'Mansion House'),(54,'Maqintosh'),(114,'Maria Indian'),(110,'Marlin'),(243,'Martens'),(157,'McD No.1'),(165,'McDowell\'s No.1'),(242,'Moller'),(124,'Moonwalk'),(189,'Morpheus'),(81,'New Z'),(75,'NO LIMITS'),(68,'Oakton Barel Aged'),(129,'Oakwood'),(2,'Officer\'s Choice'),(38,'Old Monk'),(109,'Old Professor'),(174,'Old Scot'),(4,'Old Smuggler'),(158,'Olde Adventurer'),(21,'One Shot'),(127,'Pearly'),(27,'Peter Scot'),(190,'Pluton Bay'),(47,'Port'),(104,'Porto Espana'),(245,'Power Cool'),(22,'Red Knight'),(78,'Red Lady'),(191,'Regal Talons'),(48,'Remy Martin'),(135,'Revolution'),(133,'Rich N Rare'),(74,'RIF RAF'),(60,'Royal Bhutan'),(215,'Royal Challange'),(163,'Royal Challenge'),(149,'Royal Gold'),(122,'Royal Green'),(77,'Royal One'),(204,'Royal Salute'),(105,'Rum 99'),(80,'S 6'),(53,'Samara'),(154,'Santa Cruz '),(69,'Santana'),(155,'Sante'),(16,'Sauza'),(79,'SCIX'),(91,'Scottish Leader'),(195,'Seagram\'s'),(180,'Senate'),(96,'Sidus'),(162,'Signature'),(150,'Sikkim'),(241,'Sir John'),(92,'Skyy'),(169,'Smirnoff'),(39,'Solan'),(108,'Soldier\'s'),(98,'Sollazzo'),(202,'Something'),(73,'Soro'),(148,'Soulmate'),(230,'Stella'),(3,'Sterling'),(88,'Stolichnaya'),(44,'Sula Vineyards'),(145,'Sulmate'),(172,'Talisker'),(220,'TBG'),(18,'Teacher\'s'),(126,'The Generation'),(198,'The Glenlivet'),(37,'The Hawkston'),(66,'The Impression'),(36,'The Rockford'),(106,'Three Royals '),(218,'Tuborg'),(82,'Two Oceans'),(147,'V2 O'),(168,'Vat 69'),(70,'Vintales'),(121,'Wassup'),(5,'White & Blue'),(7,'White Hills '),(159,'White Mischif '),(15,'William Lawson\'s'),(246,'Wood Pecker'),(248,'Young Fisherman'),(153,'Zampa'),(61,'Zumzin');

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `variant_id` int(11) NOT NULL,
  `vol_id` int(11) DEFAULT NULL,
  `item_name` text,
  `buy_price` int(11) DEFAULT NULL,
  `wholesale_price` int(11) DEFAULT NULL,
  `retail_price` int(11) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `items` */

insert  into `items`(`id`,`brand_id`,`type_id`,`variant_id`,`vol_id`,`item_name`,`buy_price`,`wholesale_price`,`retail_price`,`current_stock`) values (1,1,1,16,6,'sdfsdfsdfs',11,11,11,NULL),(2,2,2,13,7,'sdfsdfsdfs',45,45,45,NULL),(3,2,2,13,7,'sdfsdfsdfs',45,45,45,NULL),(4,2,2,13,7,'sdfsdfsdfs',45,45,45,NULL),(5,2,2,13,7,'sdfsdfsdfs',45,45,45,NULL),(6,2,2,13,7,'sdfsdfsdfs',45,45,45,NULL),(7,2,2,13,7,'',45,45,45,NULL);

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `log` */

insert  into `log`(`id`,`msg`,`user`,`timestamp`,`ip`,`priority`,`class`) values (1,'Text was edited','Guest',1526473220,'::1','medium','yellow'),(2,'Login denied','Guest',1526473224,'::1','high','red'),(3,'Login denied','Guest',1526473268,'::1','high','red'),(4,'Text was edited','Guest',1526473298,'::1','medium','yellow'),(5,'New message','Guest',1526473309,'::1','low','green'),(6,'Login allowed','Guest',1526473426,'::1','low','blue'),(7,'Text was edited','Guest',1526473773,'::1','medium','yellow');

/*Table structure for table `stock_in` */

DROP TABLE IF EXISTS `stock_in`;

CREATE TABLE `stock_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `chalan_no` int(11) DEFAULT NULL,
  `depo_chalan_file` varchar(255) DEFAULT NULL,
  `depo_user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `store_user_id` int(11) DEFAULT NULL,
  `store_chalan_file` varchar(255) DEFAULT NULL,
  `store_accepted` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `stock_in` */

insert  into `stock_in`(`id`,`date`,`item_id`,`qty`,`chalan_no`,`depo_chalan_file`,`depo_user_id`,`store_id`,`store_user_id`,`store_chalan_file`,`store_accepted`) values (1,'2018-05-17',8,11,5649879,NULL,74,10,77,NULL,'Y'),(2,'2018-05-17',12,55,98795456,NULL,74,10,77,NULL,'N'),(3,'2018-05-17',8,55,23123578,NULL,74,10,77,NULL,'N'),(4,'2018-05-30',6,10,65565656,NULL,74,11,78,NULL,'Y'),(5,'2018-05-30',2,80,1564532,NULL,74,11,78,NULL,'N'),(6,'2018-05-30',10,25,1254521,NULL,74,11,78,NULL,'Y');

/*Table structure for table `stock_items` */

DROP TABLE IF EXISTS `stock_items`;

CREATE TABLE `stock_items` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `variant_id` int(11) NOT NULL,
  `vol_id` int(11) DEFAULT NULL,
  `buy_price` int(11) DEFAULT NULL,
  `wholesale_price` int(11) DEFAULT NULL,
  `retail_price` int(11) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `stock_items` */

insert  into `stock_items`(`ID`,`brand_id`,`type_id`,`variant_id`,`vol_id`,`buy_price`,`wholesale_price`,`retail_price`,`current_stock`) values (1,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(2,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(3,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(4,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(5,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(6,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(7,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(8,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(9,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(10,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(11,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(12,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(13,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(14,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(15,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(16,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(17,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(18,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(19,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(20,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(21,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(22,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(23,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(24,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(25,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(26,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(27,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(28,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(29,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(30,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(31,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(32,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(33,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(34,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(35,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(36,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(37,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(38,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(39,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(40,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(41,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(42,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(43,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(44,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(45,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(46,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(47,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(48,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(49,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(50,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(51,0,NULL,0,NULL,NULL,NULL,NULL,NULL),(52,0,NULL,0,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `stock_out` */

DROP TABLE IF EXISTS `stock_out`;

CREATE TABLE `stock_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `sale_type` varchar(25) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `store_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `stock_out` */

insert  into `stock_out`(`id`,`date`,`item`,`qty`,`sale_type`,`store_id`,`store_user_id`) values (1,'2018-05-17',63,56546546,'4545',2,NULL),(2,'2018-05-17',64,45545455,'7878',2,NULL),(3,'2018-05-17',64,655487,'4578',2,NULL),(4,'2018-05-30',6,12313,'3213',6,NULL),(5,'2018-05-30',64,55656,'665',4,NULL),(6,'2018-05-30',63,123,'12',2,NULL);

/*Table structure for table `store` */

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(111) DEFAULT NULL,
  `state` varchar(111) DEFAULT NULL,
  `country` varchar(22) DEFAULT NULL,
  `zip` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `store` */

insert  into `store`(`id`,`name`,`address`,`city`,`state`,`country`,`zip`) values (1,'Nayapalli','Nh5','bhubaneswar','odisha','india',751012),(2,'Patia','patia square','bhubaneswar','odisha','india',751024),(3,'Laxmisagar','laxmi sagar square','bhubaneswar','odisha','india',751008);

/*Table structure for table `stores` */

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `incharge_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(111) DEFAULT NULL,
  `state` varchar(111) DEFAULT NULL,
  `country` varchar(22) DEFAULT NULL,
  `zip` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `stores` */

insert  into `stores`(`id`,`name`,`incharge_name`,`email`,`phone`,`address`,`city`,`state`,`country`,`zip`) values (11,'Patia',NULL,NULL,NULL,'patia square','bhubaneswar','odisha','india',751024),(17,'Patia',NULL,NULL,NULL,'patia square','bhubaneswar','odisha','india',751024),(20,'Patia',NULL,NULL,NULL,'patia square','bhubaneswar','odisha','india',751024),(21,'Laxmisagar',NULL,NULL,NULL,'laxmi sagar square','bhubaneswar','odisha','india',751008),(22,'My Company Name','Eesserd','jason@satom.com',2147483647,'64, Gandtoa, doeor slero','Utah','Odisha','India',455451),(23,'My Company Name','Eesserd','jason@satom.com',9933885588,'64, Gandtoa, doeor slero','Utah','Odisha','India',455451),(24,'Webzin Infotech','tes erterte','sales@webzin.in',9040038535,'404, Brit Colony','Bhubaneswar','Odisha','India',751012),(25,'Webzin Infotech Pvt Ltd ','test tewrs','rkp@webzin.in',909090909090,'13/2484, Indira Maidan Street, CRP Square, Nayapalli','Bhubaneswar','Odisha','India',751012),(26,'Webzin Infotech Pvt Ltd','werwe werwerwe','KRISHNA@WZI.CO.IN',7978752027,'N1-14 IRC VILLAGE','BHUBANESWAR','Odisha','India',751015),(27,'Webzin Infotech Pvt Ltd','werwe werwerwe','KRISHNA@WZI.CO.IN',7978752027,'N1-14 IRC VILLAGE','BHUBANESWAR','Odisha','India',751015);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `adharno` bigint(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(15) NOT NULL,
  `zip` int(10) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `activated` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`store_id`,`name`,`email`,`mobile`,`adharno`,`password`,`address`,`country`,`zip`,`city`,`state`,`type`,`activated`) values (1,1,'Bhakti Prasad','alex@gmail.com',9090909090,408773644415,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(69,2,'Bhakti','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(70,3,'Prasad','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(71,4,'BhaktiP','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(72,5,'PPrasad','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(73,7,'BhaktiPP','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','DEPOT','Y'),(74,8,'RASrasad','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','DEPOT','Y'),(75,6,'RA SOE','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','AUDIT','Y'),(76,9,'test user','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(77,10,'user test','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(78,11,'testing user','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(79,12,'my name','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y'),(80,13,'name user','alex@gmail.com',9090909091,0,'b¹âbÏGld£ÅBrž´.','64, Gandtoa, doeor slero','USA',0,'utah','SC','STORE','Y');

/*Table structure for table `variants` */

DROP TABLE IF EXISTS `variants`;

CREATE TABLE `variants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `variants` */

insert  into `variants`(`id`,`name`) values (15,'8000 Super Strong Beer'),(13,'Artois'),(12,'Beer'),(14,'Blonde Blond'),(18,'Blue Lable Super Strong Classic Beer'),(7,'Electra International Quality Beer Can'),(8,'Electra Premium Strong Beer'),(11,'Extra Beer'),(20,'Grain Vodka'),(3,'Magnum Beer'),(10,'Magnum Can Beer'),(9,'Original Pils Beer'),(6,'Premium King of Beers'),(4,'Premium King of Can Beers'),(5,'Premium Pils Beer Can'),(19,'Red Superior Titanic Beer'),(16,'Strong Beer'),(17,'Super Stong Beer'),(2,'Supreme Super Stong Beer');

/*Table structure for table `variants_type` */

DROP TABLE IF EXISTS `variants_type`;

CREATE TABLE `variants_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `variants_type` */

insert  into `variants_type`(`id`,`name`) values (1,'Beer'),(11,'Brandy'),(8,'Breezer'),(10,'Gin'),(6,'Red Wine'),(4,'Rum'),(9,'Soctch'),(2,'Vodka'),(3,'Whisky'),(7,'White Wine'),(5,'Wine');

/*Table structure for table `volume` */

DROP TABLE IF EXISTS `volume`;

CREATE TABLE `volume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `volume` */

insert  into `volume`(`id`,`name`) values (3,'180ml'),(7,'275ml'),(8,'330ml'),(4,'375ml'),(9,'500ml'),(5,'650ml'),(10,'650ml DEF'),(6,'750ml'),(12,'750ml DEF'),(2,'90ml');

/*Table structure for table `volume-size` */

DROP TABLE IF EXISTS `volume-size`;

CREATE TABLE `volume-size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `volume-size` */

insert  into `volume-size`(`id`,`name`) values (3,'180ml'),(7,'275ml'),(8,'330ml'),(4,'375ml'),(9,'500ml'),(5,'650ml'),(10,'650ml DEF'),(6,'750ml'),(12,'750ml DEF'),(2,'90ml');

/*Table structure for table `warrants` */

DROP TABLE IF EXISTS `warrants`;

CREATE TABLE `warrants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_date` date DEFAULT NULL,
  `load_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `warrant_no` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `warrant_no` (`warrant_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `warrants` */

insert  into `warrants`(`id`,`w_date`,`load_id`,`customer_id`,`warrant_no`) values (1,'2018-05-17',1,63,'65454'),(2,'2018-05-17',3,64,'9879'),(3,'2018-05-30',4,6,'4465465'),(4,'2018-05-30',5,64,'566'),(5,'2018-05-30',6,63,'158'),(6,'2018-06-01',6,63,'48787'),(7,'2018-06-01',2,64,'2121');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
