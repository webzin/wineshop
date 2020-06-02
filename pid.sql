/*
SQLyog Ultimate v9.63 
MySQL - 5.6.12-log : Database - pid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `pid`;

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`) values (2,'ATR'),(3,'ASARCO RAY'),(4,'FMS'),(5,'HK'),(6,'NA-ESN'),(7,'BHP'),(8,'CDM'),(9,'CMCC'),(10,'COLL'),(11,'PENOLES'),(12,'LBF'),(13,'QB'),(14,'ZALDIVAR'),(15,'AE'),(16,'CCC'),(17,'AE SX-EW'),(18,'CCC-P'),(19,'CCC SBL'),(20,'CHUQUI-P'),(21,'GABY'),(22,'ENM'),(23,'RT'),(24,'DOWA'),(25,'NORANDA'),(26,'FKA'),(27,'ORC'),(28,'KUC'),(29,'ONSAN'),(30,'SME'),(31,'CER'),(32,'MET'),(33,'ESOX'),(34,'SPENCE'),(35,'MITSUBISHI'),(36,'MITSUI'),(37,'HM'),(38,'SR'),(39,'OSR'),(40,'TAMANO'),(41,'P*D'),(42,'SANTA RITA'),(43,'PDMI'),(44,'PDSS'),(45,'PD*GO'),(46,'BCCC'),(47,'CBCC'),(48,'CTB'),(49,'PASAR'),(50,'ABRA'),(51,'SMCV'),(52,'SPCC-ILO'),(53,'SPCC-SXEW'),(54,'SUMIKO'),(55,'WHITE PINE COPPER'),(56,'TINTAYA'),(57,'MCM'),(58,'REC');

/*Table structure for table `building` */

DROP TABLE IF EXISTS `building`;

CREATE TABLE `building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `building` */

insert  into `building`(`id`,`name`) values (2,'621-North'),(3,'621-South'),(4,'641-South'),(5,'651-South'),(6,'661-North'),(7,'661-South'),(8,'671-North'),(9,'671-South');

/*Table structure for table `bundles` */

DROP TABLE IF EXISTS `bundles`;

CREATE TABLE `bundles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival_date` date DEFAULT NULL,
  `custo_id` int(11) DEFAULT NULL,
  `load_id` int(11) DEFAULT NULL,
  `warrant_id` int(11) DEFAULT NULL,
  `batch_id` int(255) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `pieces` int(255) DEFAULT NULL,
  `list_w` int(255) DEFAULT NULL,
  `scale_w` int(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `batch_id` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `bundles` */

insert  into `bundles`(`id`,`arrival_date`,`custo_id`,`load_id`,`warrant_id`,`batch_id`,`brand`,`pieces`,`list_w`,`scale_w`,`location`) values (1,'2018-05-17',63,1,1,56454,2,12,12,12,2),(2,'2018-05-17',64,1,1,12354,2,12,125,12,2),(3,'2018-05-17',9,1,1,12155,2,12,32,454,19),(4,'2018-05-17',9,1,1,854885,2,2235,56,56,19),(5,'2018-05-17',63,1,1,7879,4,45,45,45,19),(6,'2018-05-17',64,3,2,65566,2,455,45,45,2),(7,'2018-05-17',64,3,2,4545,2,45,445,45,2),(8,'2018-05-09',64,3,2,56658,5,2,2,2,2),(9,'2018-05-17',64,3,2,123231,4,45,456,546,18),(10,'2018-05-17',64,3,2,878979,4,45,456,546,18),(11,'2018-05-17',64,3,2,89879879,4,45,456,546,18),(12,'2018-05-17',64,3,2,4554,4,6556,45,5446,18),(13,'2018-05-17',64,3,2,456665,12,56,56,56,11),(14,'2018-05-17',63,1,1,46546,15,45,456,456,18),(15,'2018-05-17',63,1,1,45456,3,45,456,45,2),(16,'2018-05-30',6,4,3,56655,17,45,3255,3255,2),(17,'2018-05-30',64,5,4,64554,5,5645,125,54545,13),(18,'2018-05-30',64,5,4,12313213,6,12,310,3215,10),(19,'2018-05-30',64,5,4,4564,6,12,456,123,10),(20,'2018-05-30',64,5,4,456,6,45,1234,123,10),(21,'2018-05-30',63,6,5,23123,2,45,145,45,2),(22,'2018-06-01',63,6,6,546465,10,12,123,12,13),(23,'2018-06-01',63,6,6,4556,8,465,1230,456,8),(24,'2018-06-01',63,6,6,465,8,12,21,32,8),(25,'2018-06-01',64,2,7,212121,9,21,21,21,17);

/*Table structure for table `loads` */

DROP TABLE IF EXISTS `loads`;

CREATE TABLE `loads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival_date` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_no` int(20) DEFAULT NULL,
  `vech_no` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `building` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `loads` */

insert  into `loads`(`id`,`arrival_date`,`customer_id`,`order_no`,`vech_no`,`user_id`,`building`) values (1,'2018-05-17',63,56546546,'4545',62,2),(2,'2018-05-17',64,45545455,'7878',62,2),(3,'2018-05-17',64,655487,'4578',62,2),(4,'2018-05-30',6,12313,'3213',62,6),(5,'2018-05-30',64,55656,'665',62,4),(6,'2018-05-30',63,123,'12',62,2);

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1702 DEFAULT CHARSET=latin1;

/*Data for the table `location` */

insert  into `location`(`id`,`name`) values (2,'A01'),(3,'A02'),(4,'A03'),(5,'A04'),(6,'A05'),(7,'A06'),(8,'A07'),(9,'A08'),(10,'A09'),(11,'A10'),(12,'A11'),(13,'A12'),(14,'A13'),(15,'A14'),(16,'A15'),(17,'A16'),(18,'A17'),(19,'A18'),(20,'A19'),(21,'A20'),(22,'A21'),(23,'A22'),(24,'A23'),(25,'A24'),(26,'A25'),(27,'A26'),(28,'A27'),(29,'A28'),(30,'A29'),(31,'A30'),(32,'A31'),(33,'A32'),(34,'A33'),(35,'A34'),(36,'A35'),(37,'A36'),(38,'A37'),(39,'A38'),(40,'A39'),(41,'A40'),(42,'A41'),(43,'A42'),(44,'A43'),(45,'A44'),(46,'A45'),(47,'A46'),(48,'A47'),(49,'A48'),(50,'A49'),(51,'A50'),(52,'B01'),(53,'B02'),(54,'B03'),(55,'B04'),(56,'B05'),(57,'B06'),(58,'B07'),(59,'B08'),(60,'B09'),(61,'B10'),(62,'B11'),(63,'B12'),(64,'B13'),(65,'B14'),(66,'B15'),(67,'B16'),(68,'B17'),(69,'B18'),(70,'B19'),(71,'B20'),(72,'B21'),(73,'B22'),(74,'B23'),(75,'B24'),(76,'B25'),(77,'B26'),(78,'B27'),(79,'B28'),(80,'B29'),(81,'B30'),(82,'B31'),(83,'B32'),(84,'B33'),(85,'B34'),(86,'B35'),(87,'B36'),(88,'B37'),(89,'B38'),(90,'B39'),(91,'B40'),(92,'B41'),(93,'B42'),(94,'B43'),(95,'B44'),(96,'B45'),(97,'B46'),(98,'B47'),(99,'B48'),(100,'B49'),(101,'B50'),(102,'C01'),(103,'C02'),(104,'C03'),(105,'C04'),(106,'C05'),(107,'C06'),(108,'C07'),(109,'C08'),(110,'C09'),(111,'C10'),(112,'C11'),(113,'C12'),(114,'C13'),(115,'C14'),(116,'C15'),(117,'C16'),(118,'C17'),(119,'C18'),(120,'C19'),(121,'C20'),(122,'C21'),(123,'C22'),(124,'C23'),(125,'C24'),(126,'C25'),(127,'C26'),(128,'C27'),(129,'C28'),(130,'C29'),(131,'C30'),(132,'C31'),(133,'C32'),(134,'C33'),(135,'C34'),(136,'C35'),(137,'C36'),(138,'C37'),(139,'C38'),(140,'C39'),(141,'C40'),(142,'C41'),(143,'C42'),(144,'C43'),(145,'C44'),(146,'C45'),(147,'C46'),(148,'C47'),(149,'C48'),(150,'C49'),(151,'C50'),(152,'D01'),(153,'D02'),(154,'D03'),(155,'D04'),(156,'D05'),(157,'D06'),(158,'D07'),(159,'D08'),(160,'D09'),(161,'D10'),(162,'D11'),(163,'D12'),(164,'D13'),(165,'D14'),(166,'D15'),(167,'D16'),(168,'D17'),(169,'D18'),(170,'D19'),(171,'D20'),(172,'D21'),(173,'D22'),(174,'D23'),(175,'D24'),(176,'D25'),(177,'D26'),(178,'D27'),(179,'D28'),(180,'D29'),(181,'D30'),(182,'D31'),(183,'D32'),(184,'D33'),(185,'D34'),(186,'D35'),(187,'D36'),(188,'D37'),(189,'D38'),(190,'D39'),(191,'D40'),(192,'D41'),(193,'D42'),(194,'D43'),(195,'D44'),(196,'D45'),(197,'D46'),(198,'D47'),(199,'D48'),(200,'D49'),(201,'D50'),(202,'E01'),(203,'E02'),(204,'E03'),(205,'E04'),(206,'E05'),(207,'E06'),(208,'E07'),(209,'E08'),(210,'E09'),(211,'E10'),(212,'E11'),(213,'E12'),(214,'E13'),(215,'E14'),(216,'E15'),(217,'E16'),(218,'E17'),(219,'E18'),(220,'E19'),(221,'E20'),(222,'E21'),(223,'E22'),(224,'E23'),(225,'E24'),(226,'E25'),(227,'E26'),(228,'E27'),(229,'E28'),(230,'E29'),(231,'E30'),(232,'E31'),(233,'E32'),(234,'E33'),(235,'E34'),(236,'E35'),(237,'E36'),(238,'E37'),(239,'E38'),(240,'E39'),(241,'E40'),(242,'E41'),(243,'E42'),(244,'E43'),(245,'E44'),(246,'E45'),(247,'E46'),(248,'E47'),(249,'E48'),(250,'E49'),(251,'E50'),(252,'F01'),(253,'F02'),(254,'F03'),(255,'F04'),(256,'F05'),(257,'F06'),(258,'F07'),(259,'F08'),(260,'F09'),(261,'F10'),(262,'F11'),(263,'F12'),(264,'F13'),(265,'F14'),(266,'F15'),(267,'F16'),(268,'F17'),(269,'F18'),(270,'F19'),(271,'F20'),(272,'F21'),(273,'F22'),(274,'F23'),(275,'F24'),(276,'F25'),(277,'F26'),(278,'F27'),(279,'F28'),(280,'F29'),(281,'F30'),(282,'F31'),(283,'F32'),(284,'F33'),(285,'F34'),(286,'F35'),(287,'F36'),(288,'F37'),(289,'F38'),(290,'F39'),(291,'F40'),(292,'F41'),(293,'F42'),(294,'F43'),(295,'F44'),(296,'F45'),(297,'F46'),(298,'F47'),(299,'F48'),(300,'F49'),(301,'F50'),(302,'G01'),(303,'G02'),(304,'G03'),(305,'G04'),(306,'G05'),(307,'G06'),(308,'G07'),(309,'G08'),(310,'G09'),(311,'G10'),(312,'G11'),(313,'G12'),(314,'G13'),(315,'G14'),(316,'G15'),(317,'G16'),(318,'G17'),(319,'G18'),(320,'G19'),(321,'G20'),(322,'G21'),(323,'G22'),(324,'G23'),(325,'G24'),(326,'G25'),(327,'G26'),(328,'G27'),(329,'G28'),(330,'G29'),(331,'G30'),(332,'G31'),(333,'G32'),(334,'G33'),(335,'G34'),(336,'G35'),(337,'G36'),(338,'G37'),(339,'G38'),(340,'G39'),(341,'G40'),(342,'G41'),(343,'G42'),(344,'G43'),(345,'G44'),(346,'G45'),(347,'G46'),(348,'G47'),(349,'G48'),(350,'G49'),(351,'G50'),(352,'H01'),(353,'H02'),(354,'H03'),(355,'H04'),(356,'H05'),(357,'H06'),(358,'H07'),(359,'H08'),(360,'H09'),(361,'H10'),(362,'H11'),(363,'H12'),(364,'H13'),(365,'H14'),(366,'H15'),(367,'H16'),(368,'H17'),(369,'H18'),(370,'H19'),(371,'H20'),(372,'H21'),(373,'H22'),(374,'H23'),(375,'H24'),(376,'H25'),(377,'H26'),(378,'H27'),(379,'H28'),(380,'H29'),(381,'H30'),(382,'H31'),(383,'H32'),(384,'H33'),(385,'H34'),(386,'H35'),(387,'H36'),(388,'H37'),(389,'H38'),(390,'H39'),(391,'H40'),(392,'H41'),(393,'H42'),(394,'H43'),(395,'H44'),(396,'H45'),(397,'H46'),(398,'H47'),(399,'H48'),(400,'H49'),(401,'H50'),(402,'I01'),(403,'I02'),(404,'I03'),(405,'I04'),(406,'I05'),(407,'I06'),(408,'I07'),(409,'I08'),(410,'I09'),(411,'I10'),(412,'I11'),(413,'I12'),(414,'I13'),(415,'I14'),(416,'I15'),(417,'I16'),(418,'I17'),(419,'I18'),(420,'I19'),(421,'I20'),(422,'I21'),(423,'I22'),(424,'I23'),(425,'I24'),(426,'I25'),(427,'I26'),(428,'I27'),(429,'I28'),(430,'I29'),(431,'I30'),(432,'I31'),(433,'I32'),(434,'I33'),(435,'I34'),(436,'I35'),(437,'I36'),(438,'I37'),(439,'I38'),(440,'I39'),(441,'I40'),(442,'I41'),(443,'I42'),(444,'I43'),(445,'I44'),(446,'I45'),(447,'I46'),(448,'I47'),(449,'I48'),(450,'I49'),(451,'I50'),(452,'J01'),(453,'J02'),(454,'J03'),(455,'J04'),(456,'J05'),(457,'J06'),(458,'J07'),(459,'J08'),(460,'J09'),(461,'J10'),(462,'J11'),(463,'J12'),(464,'J13'),(465,'J14'),(466,'J15'),(467,'J16'),(468,'J17'),(469,'J18'),(470,'J19'),(471,'J20'),(472,'J21'),(473,'J22'),(474,'J23'),(475,'J24'),(476,'J25'),(477,'J26'),(478,'J27'),(479,'J28'),(480,'J29'),(481,'J30'),(482,'J31'),(483,'J32'),(484,'J33'),(485,'J34'),(486,'J35'),(487,'J36'),(488,'J37'),(489,'J38'),(490,'J39'),(491,'J40'),(492,'J41'),(493,'J42'),(494,'J43'),(495,'J44'),(496,'J45'),(497,'J46'),(498,'J47'),(499,'J48'),(500,'J49'),(501,'J50'),(502,'K01'),(503,'K02'),(504,'K03'),(505,'K04'),(506,'K05'),(507,'K06'),(508,'K07'),(509,'K08'),(510,'K09'),(511,'K10'),(512,'K11'),(513,'K12'),(514,'K13'),(515,'K14'),(516,'K15'),(517,'K16'),(518,'K17'),(519,'K18'),(520,'K19'),(521,'K20'),(522,'K21'),(523,'K22'),(524,'K23'),(525,'K24'),(526,'K25'),(527,'K26'),(528,'K27'),(529,'K28'),(530,'K29'),(531,'K30'),(532,'K31'),(533,'K32'),(534,'K33'),(535,'K34'),(536,'K35'),(537,'K36'),(538,'K37'),(539,'K38'),(540,'K39'),(541,'K40'),(542,'K41'),(543,'K42'),(544,'K43'),(545,'K44'),(546,'K45'),(547,'K46'),(548,'K47'),(549,'K48'),(550,'K49'),(551,'K50'),(552,'L01'),(553,'L02'),(554,'L03'),(555,'L04'),(556,'L05'),(557,'L06'),(558,'L07'),(559,'L08'),(560,'L09'),(561,'L10'),(562,'L11'),(563,'L12'),(564,'L13'),(565,'L14'),(566,'L15'),(567,'L16'),(568,'L17'),(569,'L18'),(570,'L19'),(571,'L20'),(572,'L21'),(573,'L22'),(574,'L23'),(575,'L24'),(576,'L25'),(577,'L26'),(578,'L27'),(579,'L28'),(580,'L29'),(581,'L30'),(582,'L31'),(583,'L32'),(584,'L33'),(585,'L34'),(586,'L35'),(587,'L36'),(588,'L37'),(589,'L38'),(590,'L39'),(591,'L40'),(592,'L41'),(593,'L42'),(594,'L43'),(595,'L44'),(596,'L45'),(597,'L46'),(598,'L47'),(599,'L48'),(600,'L49'),(601,'L50'),(602,'M01'),(603,'M02'),(604,'M03'),(605,'M04'),(606,'M05'),(607,'M06'),(608,'M07'),(609,'M08'),(610,'M09'),(611,'M10'),(612,'M11'),(613,'M12'),(614,'M13'),(615,'M14'),(616,'M15'),(617,'M16'),(618,'M17'),(619,'M18'),(620,'M19'),(621,'M20'),(622,'M21'),(623,'M22'),(624,'M23'),(625,'M24'),(626,'M25'),(627,'M26'),(628,'M27'),(629,'M28'),(630,'M29'),(631,'M30'),(632,'M31'),(633,'M32'),(634,'M33'),(635,'M34'),(636,'M35'),(637,'M36'),(638,'M37'),(639,'M38'),(640,'M39'),(641,'M40'),(642,'M41'),(643,'M42'),(644,'M43'),(645,'M44'),(646,'M45'),(647,'M46'),(648,'M47'),(649,'M48'),(650,'M49'),(651,'M50'),(652,'N01'),(653,'N02'),(654,'N03'),(655,'N04'),(656,'N05'),(657,'N06'),(658,'N07'),(659,'N08'),(660,'N09'),(661,'N10'),(662,'N11'),(663,'N12'),(664,'N13'),(665,'N14'),(666,'N15'),(667,'N16'),(668,'N17'),(669,'N18'),(670,'N19'),(671,'N20'),(672,'N21'),(673,'N22'),(674,'N23'),(675,'N24'),(676,'N25'),(677,'N26'),(678,'N27'),(679,'N28'),(680,'N29'),(681,'N30'),(682,'N31'),(683,'N32'),(684,'N33'),(685,'N34'),(686,'N35'),(687,'N36'),(688,'N37'),(689,'N38'),(690,'N39'),(691,'N40'),(692,'N41'),(693,'N42'),(694,'N43'),(695,'N44'),(696,'N45'),(697,'N46'),(698,'N47'),(699,'N48'),(700,'N49'),(701,'N50'),(702,'O01'),(703,'O02'),(704,'O03'),(705,'O04'),(706,'O05'),(707,'O06'),(708,'O07'),(709,'O08'),(710,'O09'),(711,'O10'),(712,'O11'),(713,'O12'),(714,'O13'),(715,'O14'),(716,'O15'),(717,'O16'),(718,'O17'),(719,'O18'),(720,'O19'),(721,'O20'),(722,'O21'),(723,'O22'),(724,'O23'),(725,'O24'),(726,'O25'),(727,'O26'),(728,'O27'),(729,'O28'),(730,'O29'),(731,'O30'),(732,'O31'),(733,'O32'),(734,'O33'),(735,'O34'),(736,'O35'),(737,'O36'),(738,'O37'),(739,'O38'),(740,'O39'),(741,'O40'),(742,'O41'),(743,'O42'),(744,'O43'),(745,'O44'),(746,'O45'),(747,'O46'),(748,'O47'),(749,'O48'),(750,'O49'),(751,'O50'),(752,'P01'),(753,'P02'),(754,'P03'),(755,'P04'),(756,'P05'),(757,'P06'),(758,'P07'),(759,'P08'),(760,'P09'),(761,'P10'),(762,'P11'),(763,'P12'),(764,'P13'),(765,'P14'),(766,'P15'),(767,'P16'),(768,'P17'),(769,'P18'),(770,'P19'),(771,'P20'),(772,'P21'),(773,'P22'),(774,'P23'),(775,'P24'),(776,'P25'),(777,'P26'),(778,'P27'),(779,'P28'),(780,'P29'),(781,'P30'),(782,'P31'),(783,'P32'),(784,'P33'),(785,'P34'),(786,'P35'),(787,'P36'),(788,'P37'),(789,'P38'),(790,'P39'),(791,'P40'),(792,'P41'),(793,'P42'),(794,'P43'),(795,'P44'),(796,'P45'),(797,'P46'),(798,'P47'),(799,'P48'),(800,'P49'),(801,'P50'),(802,'Q01'),(803,'Q02'),(804,'Q03'),(805,'Q04'),(806,'Q05'),(807,'Q06'),(808,'Q07'),(809,'Q08'),(810,'Q09'),(811,'Q10'),(812,'Q11'),(813,'Q12'),(814,'Q13'),(815,'Q14'),(816,'Q15'),(817,'Q16'),(818,'Q17'),(819,'Q18'),(820,'Q19'),(821,'Q20'),(822,'Q21'),(823,'Q22'),(824,'Q23'),(825,'Q24'),(826,'Q25'),(827,'Q26'),(828,'Q27'),(829,'Q28'),(830,'Q29'),(831,'Q30'),(832,'Q31'),(833,'Q32'),(834,'Q33'),(835,'Q34'),(836,'Q35'),(837,'Q36'),(838,'Q37'),(839,'Q38'),(840,'Q39'),(841,'Q40'),(842,'Q41'),(843,'Q42'),(844,'Q43'),(845,'Q44'),(846,'Q45'),(847,'Q46'),(848,'Q47'),(849,'Q48'),(850,'Q49'),(851,'Q50'),(852,'R01'),(853,'R02'),(854,'R03'),(855,'R04'),(856,'R05'),(857,'R06'),(858,'R07'),(859,'R08'),(860,'R09'),(861,'R10'),(862,'R11'),(863,'R12'),(864,'R13'),(865,'R14'),(866,'R15'),(867,'R16'),(868,'R17'),(869,'R18'),(870,'R19'),(871,'R20'),(872,'R21'),(873,'R22'),(874,'R23'),(875,'R24'),(876,'R25'),(877,'R26'),(878,'R27'),(879,'R28'),(880,'R29'),(881,'R30'),(882,'R31'),(883,'R32'),(884,'R33'),(885,'R34'),(886,'R35'),(887,'R36'),(888,'R37'),(889,'R38'),(890,'R39'),(891,'R40'),(892,'R41'),(893,'R42'),(894,'R43'),(895,'R44'),(896,'R45'),(897,'R46'),(898,'R47'),(899,'R48'),(900,'R49'),(901,'R50'),(902,'S01'),(903,'S02'),(904,'S03'),(905,'S04'),(906,'S05'),(907,'S06'),(908,'S07'),(909,'S08'),(910,'S09'),(911,'S10'),(912,'S11'),(913,'S12'),(914,'S13'),(915,'S14'),(916,'S15'),(917,'S16'),(918,'S17'),(919,'S18'),(920,'S19'),(921,'S20'),(922,'S21'),(923,'S22'),(924,'S23'),(925,'S24'),(926,'S25'),(927,'S26'),(928,'S27'),(929,'S28'),(930,'S29'),(931,'S30'),(932,'S31'),(933,'S32'),(934,'S33'),(935,'S34'),(936,'S35'),(937,'S36'),(938,'S37'),(939,'S38'),(940,'S39'),(941,'S40'),(942,'S41'),(943,'S42'),(944,'S43'),(945,'S44'),(946,'S45'),(947,'S46'),(948,'S47'),(949,'S48'),(950,'S49'),(951,'S50'),(952,'T01'),(953,'T02'),(954,'T03'),(955,'T04'),(956,'T05'),(957,'T06'),(958,'T07'),(959,'T08'),(960,'T09'),(961,'T10'),(962,'T11'),(963,'T12'),(964,'T13'),(965,'T14'),(966,'T15'),(967,'T16'),(968,'T17'),(969,'T18'),(970,'T19'),(971,'T20'),(972,'T21'),(973,'T22'),(974,'T23'),(975,'T24'),(976,'T25'),(977,'T26'),(978,'T27'),(979,'T28'),(980,'T29'),(981,'T30'),(982,'T31'),(983,'T32'),(984,'T33'),(985,'T34'),(986,'T35'),(987,'T36'),(988,'T37'),(989,'T38'),(990,'T39'),(991,'T40'),(992,'T41'),(993,'T42'),(994,'T43'),(995,'T44'),(996,'T45'),(997,'T46'),(998,'T47'),(999,'T48'),(1000,'T49'),(1001,'T50'),(1002,'U01'),(1003,'U02'),(1004,'U03'),(1005,'U04'),(1006,'U05'),(1007,'U06'),(1008,'U07'),(1009,'U08'),(1010,'U09'),(1011,'U10'),(1012,'U11'),(1013,'U12'),(1014,'U13'),(1015,'U14'),(1016,'U15'),(1017,'U16'),(1018,'U17'),(1019,'U18'),(1020,'U19'),(1021,'U20'),(1022,'U21'),(1023,'U22'),(1024,'U23'),(1025,'U24'),(1026,'U25'),(1027,'U26'),(1028,'U27'),(1029,'U28'),(1030,'U29'),(1031,'U30'),(1032,'U31'),(1033,'U32'),(1034,'U33'),(1035,'U34'),(1036,'U35'),(1037,'U36'),(1038,'U37'),(1039,'U38'),(1040,'U39'),(1041,'U40'),(1042,'U41'),(1043,'U42'),(1044,'U43'),(1045,'U44'),(1046,'U45'),(1047,'U46'),(1048,'U47'),(1049,'U48'),(1050,'U49'),(1051,'U50'),(1052,'V01'),(1053,'V02'),(1054,'V03'),(1055,'V04'),(1056,'V05'),(1057,'V06'),(1058,'V07'),(1059,'V08'),(1060,'V09'),(1061,'V10'),(1062,'V11'),(1063,'V12'),(1064,'V13'),(1065,'V14'),(1066,'V15'),(1067,'V16'),(1068,'V17'),(1069,'V18'),(1070,'V19'),(1071,'V20'),(1072,'V21'),(1073,'V22'),(1074,'V23'),(1075,'V24'),(1076,'V25'),(1077,'V26'),(1078,'V27'),(1079,'V28'),(1080,'V29'),(1081,'V30'),(1082,'V31'),(1083,'V32'),(1084,'V33'),(1085,'V34'),(1086,'V35'),(1087,'V36'),(1088,'V37'),(1089,'V38'),(1090,'V39'),(1091,'V40'),(1092,'V41'),(1093,'V42'),(1094,'V43'),(1095,'V44'),(1096,'V45'),(1097,'V46'),(1098,'V47'),(1099,'V48'),(1100,'V49'),(1101,'V50'),(1102,'W01'),(1103,'W02'),(1104,'W03'),(1105,'W04'),(1106,'W05'),(1107,'W06'),(1108,'W07'),(1109,'W08'),(1110,'W09'),(1111,'W10'),(1112,'W11'),(1113,'W12'),(1114,'W13'),(1115,'W14'),(1116,'W15'),(1117,'W16'),(1118,'W17'),(1119,'W18'),(1120,'W19'),(1121,'W20'),(1122,'W21'),(1123,'W22'),(1124,'W23'),(1125,'W24'),(1126,'W25'),(1127,'W26'),(1128,'W27'),(1129,'W28'),(1130,'W29'),(1131,'W30'),(1132,'W31'),(1133,'W32'),(1134,'W33'),(1135,'W34'),(1136,'W35'),(1137,'W36'),(1138,'W37'),(1139,'W38'),(1140,'W39'),(1141,'W40'),(1142,'W41'),(1143,'W42'),(1144,'W43'),(1145,'W44'),(1146,'W45'),(1147,'W46'),(1148,'W47'),(1149,'W48'),(1150,'W49'),(1151,'W50'),(1152,'X01'),(1153,'X02'),(1154,'X03'),(1155,'X04'),(1156,'X05'),(1157,'X06'),(1158,'X07'),(1159,'X08'),(1160,'X09'),(1161,'X10'),(1162,'X11'),(1163,'X12'),(1164,'X13'),(1165,'X14'),(1166,'X15'),(1167,'X16'),(1168,'X17'),(1169,'X18'),(1170,'X19'),(1171,'X20'),(1172,'X21'),(1173,'X22'),(1174,'X23'),(1175,'X24'),(1176,'X25'),(1177,'X26'),(1178,'X27'),(1179,'X28'),(1180,'X29'),(1181,'X30'),(1182,'X31'),(1183,'X32'),(1184,'X33'),(1185,'X34'),(1186,'X35'),(1187,'X36'),(1188,'X37'),(1189,'X38'),(1190,'X39'),(1191,'X40'),(1192,'X41'),(1193,'X42'),(1194,'X43'),(1195,'X44'),(1196,'X45'),(1197,'X46'),(1198,'X47'),(1199,'X48'),(1200,'X49'),(1201,'X50'),(1202,'Y01'),(1203,'Y02'),(1204,'Y03'),(1205,'Y04'),(1206,'Y05'),(1207,'Y06'),(1208,'Y07'),(1209,'Y08'),(1210,'Y09'),(1211,'Y10'),(1212,'Y11'),(1213,'Y12'),(1214,'Y13'),(1215,'Y14'),(1216,'Y15'),(1217,'Y16'),(1218,'Y17'),(1219,'Y18'),(1220,'Y19'),(1221,'Y20'),(1222,'Y21'),(1223,'Y22'),(1224,'Y23'),(1225,'Y24'),(1226,'Y25'),(1227,'Y26'),(1228,'Y27'),(1229,'Y28'),(1230,'Y29'),(1231,'Y30'),(1232,'Y31'),(1233,'Y32'),(1234,'Y33'),(1235,'Y34'),(1236,'Y35'),(1237,'Y36'),(1238,'Y37'),(1239,'Y38'),(1240,'Y39'),(1241,'Y40'),(1242,'Y41'),(1243,'Y42'),(1244,'Y43'),(1245,'Y44'),(1246,'Y45'),(1247,'Y46'),(1248,'Y47'),(1249,'Y48'),(1250,'Y49'),(1251,'Y50'),(1252,'Z01'),(1253,'Z02'),(1254,'Z03'),(1255,'Z04'),(1256,'Z05'),(1257,'Z06'),(1258,'Z07'),(1259,'Z08'),(1260,'Z09'),(1261,'Z10'),(1262,'Z11'),(1263,'Z12'),(1264,'Z13'),(1265,'Z14'),(1266,'Z15'),(1267,'Z16'),(1268,'Z17'),(1269,'Z18'),(1270,'Z19'),(1271,'Z20'),(1272,'Z21'),(1273,'Z22'),(1274,'Z23'),(1275,'Z24'),(1276,'Z25'),(1277,'Z26'),(1278,'Z27'),(1279,'Z28'),(1280,'Z29'),(1281,'Z30'),(1282,'Z31'),(1283,'Z32'),(1284,'Z33'),(1285,'Z34'),(1286,'Z35'),(1287,'Z36'),(1288,'Z37'),(1289,'Z38'),(1290,'Z39'),(1291,'Z40'),(1292,'Z41'),(1293,'Z42'),(1294,'Z43'),(1295,'Z44'),(1296,'Z45'),(1297,'Z46'),(1298,'Z47'),(1299,'Z48'),(1300,'Z49'),(1301,'Z50'),(1302,'AA01'),(1303,'AA02'),(1304,'AA03'),(1305,'AA04'),(1306,'AA05'),(1307,'AA06'),(1308,'AA07'),(1309,'AA08'),(1310,'AA09'),(1311,'AA10'),(1312,'AA11'),(1313,'AA12'),(1314,'AA13'),(1315,'AA14'),(1316,'AA15'),(1317,'AA16'),(1318,'AA17'),(1319,'AA18'),(1320,'AA19'),(1321,'AA20'),(1322,'AA21'),(1323,'AA22'),(1324,'AA23'),(1325,'AA24'),(1326,'AA25'),(1327,'AA26'),(1328,'AA27'),(1329,'AA28'),(1330,'AA29'),(1331,'AA30'),(1332,'AA31'),(1333,'AA32'),(1334,'AA33'),(1335,'AA34'),(1336,'AA35'),(1337,'AA36'),(1338,'AA37'),(1339,'AA38'),(1340,'AA39'),(1341,'AA40'),(1342,'AA41'),(1343,'AA42'),(1344,'AA43'),(1345,'AA44'),(1346,'AA45'),(1347,'AA46'),(1348,'AA47'),(1349,'AA48'),(1350,'AA49'),(1351,'AA50'),(1352,'BB01'),(1353,'BB02'),(1354,'BB03'),(1355,'BB04'),(1356,'BB05'),(1357,'BB06'),(1358,'BB07'),(1359,'BB08'),(1360,'BB09'),(1361,'BB10'),(1362,'BB11'),(1363,'BB12'),(1364,'BB13'),(1365,'BB14'),(1366,'BB15'),(1367,'BB16'),(1368,'BB17'),(1369,'BB18'),(1370,'BB19'),(1371,'BB20'),(1372,'BB21'),(1373,'BB22'),(1374,'BB23'),(1375,'BB24'),(1376,'BB25'),(1377,'BB26'),(1378,'BB27'),(1379,'BB28'),(1380,'BB29'),(1381,'BB30'),(1382,'BB31'),(1383,'BB32'),(1384,'BB33'),(1385,'BB34'),(1386,'BB35'),(1387,'BB36'),(1388,'BB37'),(1389,'BB38'),(1390,'BB39'),(1391,'BB40'),(1392,'BB41'),(1393,'BB42'),(1394,'BB43'),(1395,'BB44'),(1396,'BB45'),(1397,'BB46'),(1398,'BB47'),(1399,'BB48'),(1400,'BB49'),(1401,'BB50'),(1402,'CC01'),(1403,'CC02'),(1404,'CC03'),(1405,'CC04'),(1406,'CC05'),(1407,'CC06'),(1408,'CC07'),(1409,'CC08'),(1410,'CC09'),(1411,'CC10'),(1412,'CC11'),(1413,'CC12'),(1414,'CC13'),(1415,'CC14'),(1416,'CC15'),(1417,'CC16'),(1418,'CC17'),(1419,'CC18'),(1420,'CC19'),(1421,'CC20'),(1422,'CC21'),(1423,'CC22'),(1424,'CC23'),(1425,'CC24'),(1426,'CC25'),(1427,'CC26'),(1428,'CC27'),(1429,'CC28'),(1430,'CC29'),(1431,'CC30'),(1432,'CC31'),(1433,'CC32'),(1434,'CC33'),(1435,'CC34'),(1436,'CC35'),(1437,'CC36'),(1438,'CC37'),(1439,'CC38'),(1440,'CC39'),(1441,'CC40'),(1442,'CC41'),(1443,'CC42'),(1444,'CC43'),(1445,'CC44'),(1446,'CC45'),(1447,'CC46'),(1448,'CC47'),(1449,'CC48'),(1450,'CC49'),(1451,'CC50'),(1452,'DD01'),(1453,'DD02'),(1454,'DD03'),(1455,'DD04'),(1456,'DD05'),(1457,'DD06'),(1458,'DD07'),(1459,'DD08'),(1460,'DD09'),(1461,'DD10'),(1462,'DD11'),(1463,'DD12'),(1464,'DD13'),(1465,'DD14'),(1466,'DD15'),(1467,'DD16'),(1468,'DD17'),(1469,'DD18'),(1470,'DD19'),(1471,'DD20'),(1472,'DD21'),(1473,'DD22'),(1474,'DD23'),(1475,'DD24'),(1476,'DD25'),(1477,'DD26'),(1478,'DD27'),(1479,'DD28'),(1480,'DD29'),(1481,'DD30'),(1482,'DD31'),(1483,'DD32'),(1484,'DD33'),(1485,'DD34'),(1486,'DD35'),(1487,'DD36'),(1488,'DD37'),(1489,'DD38'),(1490,'DD39'),(1491,'DD40'),(1492,'DD41'),(1493,'DD42'),(1494,'DD43'),(1495,'DD44'),(1496,'DD45'),(1497,'DD46'),(1498,'DD47'),(1499,'DD48'),(1500,'DD49'),(1501,'DD50'),(1502,'EE01'),(1503,'EE02'),(1504,'EE03'),(1505,'EE04'),(1506,'EE05'),(1507,'EE06'),(1508,'EE07'),(1509,'EE08'),(1510,'EE09'),(1511,'EE10'),(1512,'EE11'),(1513,'EE12'),(1514,'EE13'),(1515,'EE14'),(1516,'EE15'),(1517,'EE16'),(1518,'EE17'),(1519,'EE18'),(1520,'EE19'),(1521,'EE20'),(1522,'EE21'),(1523,'EE22'),(1524,'EE23'),(1525,'EE24'),(1526,'EE25'),(1527,'EE26'),(1528,'EE27'),(1529,'EE28'),(1530,'EE29'),(1531,'EE30'),(1532,'EE31'),(1533,'EE32'),(1534,'EE33'),(1535,'EE34'),(1536,'EE35'),(1537,'EE36'),(1538,'EE37'),(1539,'EE38'),(1540,'EE39'),(1541,'EE40'),(1542,'EE41'),(1543,'EE42'),(1544,'EE43'),(1545,'EE44'),(1546,'EE45'),(1547,'EE46'),(1548,'EE47'),(1549,'EE48'),(1550,'EE49'),(1551,'EE50'),(1552,'FF01'),(1553,'FF02'),(1554,'FF03'),(1555,'FF04'),(1556,'FF05'),(1557,'FF06'),(1558,'FF07'),(1559,'FF08'),(1560,'FF09'),(1561,'FF10'),(1562,'FF11'),(1563,'FF12'),(1564,'FF13'),(1565,'FF14'),(1566,'FF15'),(1567,'FF16'),(1568,'FF17'),(1569,'FF18'),(1570,'FF19'),(1571,'FF20'),(1572,'FF21'),(1573,'FF22'),(1574,'FF23'),(1575,'FF24'),(1576,'FF25'),(1577,'FF26'),(1578,'FF27'),(1579,'FF28'),(1580,'FF29'),(1581,'FF30'),(1582,'FF31'),(1583,'FF32'),(1584,'FF33'),(1585,'FF34'),(1586,'FF35'),(1587,'FF36'),(1588,'FF37'),(1589,'FF38'),(1590,'FF39'),(1591,'FF40'),(1592,'FF41'),(1593,'FF42'),(1594,'FF43'),(1595,'FF44'),(1596,'FF45'),(1597,'FF46'),(1598,'FF47'),(1599,'FF48'),(1600,'FF49'),(1601,'FF50'),(1602,'GG01'),(1603,'GG02'),(1604,'GG03'),(1605,'GG04'),(1606,'GG05'),(1607,'GG06'),(1608,'GG07'),(1609,'GG08'),(1610,'GG09'),(1611,'GG10'),(1612,'GG11'),(1613,'GG12'),(1614,'GG13'),(1615,'GG14'),(1616,'GG15'),(1617,'GG16'),(1618,'GG17'),(1619,'GG18'),(1620,'GG19'),(1621,'GG20'),(1622,'GG21'),(1623,'GG22'),(1624,'GG23'),(1625,'GG24'),(1626,'GG25'),(1627,'GG26'),(1628,'GG27'),(1629,'GG28'),(1630,'GG29'),(1631,'GG30'),(1632,'GG31'),(1633,'GG32'),(1634,'GG33'),(1635,'GG34'),(1636,'GG35'),(1637,'GG36'),(1638,'GG37'),(1639,'GG38'),(1640,'GG39'),(1641,'GG40'),(1642,'GG41'),(1643,'GG42'),(1644,'GG43'),(1645,'GG44'),(1646,'GG45'),(1647,'GG46'),(1648,'GG47'),(1649,'GG48'),(1650,'GG49'),(1651,'GG50'),(1652,'HH01'),(1653,'HH02'),(1654,'HH03'),(1655,'HH04'),(1656,'HH05'),(1657,'HH06'),(1658,'HH07'),(1659,'HH08'),(1660,'HH09'),(1661,'HH10'),(1662,'HH11'),(1663,'HH12'),(1664,'HH13'),(1665,'HH14'),(1666,'HH15'),(1667,'HH16'),(1668,'HH17'),(1669,'HH18'),(1670,'HH19'),(1671,'HH20'),(1672,'HH21'),(1673,'HH22'),(1674,'HH23'),(1675,'HH24'),(1676,'HH25'),(1677,'HH26'),(1678,'HH27'),(1679,'HH28'),(1680,'HH29'),(1681,'HH30'),(1682,'HH31'),(1683,'HH32'),(1684,'HH33'),(1685,'HH34'),(1686,'HH35'),(1687,'HH36'),(1688,'HH37'),(1689,'HH38'),(1690,'HH39'),(1691,'HH40'),(1692,'HH41'),(1693,'HH42'),(1694,'HH43'),(1695,'HH44'),(1696,'HH45'),(1697,'HH46'),(1698,'HH47'),(1699,'HH48'),(1700,'HH49'),(1701,'HH50');

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

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATE_CODE` char(2) NOT NULL,
  `STATE_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `states` */

insert  into `states`(`ID`,`STATE_CODE`,`STATE_NAME`) values (1,'AL','Alabama'),(2,'AK','Alaska'),(3,'AZ','Arizona'),(4,'AR','Arkansas'),(5,'CA','California'),(6,'CO','Colorado'),(7,'CT','Connecticut'),(8,'DE','Delaware'),(9,'DC','District of Columbia'),(10,'FL','Florida'),(11,'GA','Georgia'),(12,'HI','Hawaii'),(13,'ID','Idaho'),(14,'IL','Illinois'),(15,'IN','Indiana'),(16,'IA','Iowa'),(17,'KS','Kansas'),(18,'KY','Kentucky'),(19,'LA','Louisiana'),(20,'ME','Maine'),(21,'MD','Maryland'),(22,'MA','Massachusetts'),(23,'MI','Michigan'),(24,'MN','Minnesota'),(25,'MS','Mississippi'),(26,'MO','Missouri'),(27,'MT','Montana'),(28,'NE','Nebraska'),(29,'NV','Nevada'),(30,'NH','New Hampshire'),(31,'NJ','New Jersey'),(32,'NM','New Mexico'),(33,'NY','New York'),(34,'NC','North Carolina'),(35,'ND','North Dakota'),(36,'OH','Ohio'),(37,'OK','Oklahoma'),(38,'OR','Oregon'),(39,'PA','Pennsylvania'),(40,'PR','Puerto Rico'),(41,'RI','Rhode Island'),(42,'SC','South Carolina'),(43,'SD','South Dakota'),(44,'TN','Tennessee'),(45,'TX','Texas'),(46,'UT','Utah'),(47,'VT','Vermont'),(48,'VA','Virginia'),(49,'WA','Washington'),(50,'WV','West Virginia'),(51,'WI','Wisconsin'),(52,'WY','Wyoming');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compname` varchar(255) DEFAULT NULL,
  `name` varchar(60) DEFAULT '',
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `activated` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `contactno` (`contactno`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`compname`,`name`,`username`,`password`,`contactno`,`email`,`state`,`country`,`address`,`city`,`zip`,`type`,`activated`) values (1,'Tech 360 INC','Alex','alexgmailcom','b¹âbÏGld£ÅBrž´.','1313213132','alex@gmail.com','SC','USA','64, Gandtoa, doeor slero','utah',0,'A','Y'),(5,'Tech 360','Alex Peterson','alexgmailc','b¹âbÏGld£ÅBrž´.','7879799879','alex@gmadil.com','SC','USA','64, Gandtoa, doeor slero','utah',0,'A','Y'),(6,'WZI Company','Rakso weori','rkpwebzin','b¹âbÏGld£ÅBrž´.','565646451','rkp@wen.cc','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Balangir',767001,'S','N'),(7,'Webzin Infotech Pvt Ltd','Rama Krushna Panda','rkpwebzi','b¹âbÏGld£ÅBrž´.','6546464525','rkp@web.in','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Bhubaneswar',0,'U','Y'),(8,'My Company Name','Rama','rkpwebzin1','Â«œVö³”\Z?Dß /Â§','56464654654','rkp@webz.in','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Bhubaneswar',0,'S','N'),(9,'Test firm company','test','testteom','b¹âbÏGld£ÅBrž´.','98797897897','test@tedst.com','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Angul',759122,'S','N'),(61,'WZI','Rakesh1','rkpwebzincc','b¹âbÏGld£ÅBrž´.','9878976545','rkp@webzin.cc','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Balangir',767001,'S','N'),(62,'Webzin Infotech','Rama Krushna','rkpwebzinin','b¹âbÏGld£ÅBrž´.','8879789778','rkp@webzin.in','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Bhubaneswar',0,'U','Y'),(63,'My Company','Rama Panda','rkpwebzinin1','Â«œVö³”\Z?Dß /Â§','6545465465','rkp@webzin.in1','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Bhubaneswar',0,'S','N'),(64,'Test firm','test name','testtestcom','b¹âbÏGld£ÅBrž´.','5454546455','test@test.com','Odisha','IN','AS55836 Reliance Jio Infocomm Limited','Angul',759122,'S','Y');

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
