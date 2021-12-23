-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: laravel-training
-- ------------------------------------------------------
-- Server version	5.5.5-10.6.4-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin@multi-auth.test',NULL,'$2y$10$7jml.A0vHskJfYxH5ATc4.PKizZqQQ3/whY8bvgtyn5nGm1iopSVq',NULL,'2021-06-06 05:20:31','2021-06-06 05:20:31');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_plant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `investment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measurment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_plant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (7,'Sufian','','sufian@gmail.com','','','','','','Active','',NULL,NULL,'314'),(8,'En. Inzuddin','','izu@bit.com.my','','','','','','Active','',NULL,NULL,'7204'),(11,'Khairul',NULL,'khairul@gmail.com',NULL,NULL,NULL,NULL,NULL,'Active',NULL,NULL,NULL,'2063923203'),(12,'syafiq',NULL,'syafiq@gmail.com',NULL,NULL,NULL,NULL,NULL,'Pending IOT',NULL,NULL,NULL,'2343'),(13,'Kharizmi',NULL,'kharizmi@gmail.com',NULL,NULL,NULL,NULL,NULL,'Pending IOT',NULL,NULL,NULL,'879252494'),(14,'faizuddin',NULL,'faiz@gmail.com',NULL,NULL,NULL,NULL,NULL,'Active',NULL,NULL,NULL,'545465076');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_details`
--

DROP TABLE IF EXISTS `customers_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `m_npk` text DEFAULT NULL,
  `m_weather` text DEFAULT NULL,
  `m_adv` text DEFAULT NULL,
  `id_plant` varchar(100) DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_details`
--

LOCK TABLES `customers_details` WRITE;
/*!40000 ALTER TABLE `customers_details` DISABLE KEYS */;
INSERT INTO `customers_details` VALUES (43,'2343','Olak Lempit, Selangor','soil_0095690e00001988','nict_weather','ffffff1000018fa7','314','2021-07-11 05:52:46','2',NULL,NULL),(44,'2343','Olak Lempit, Selangor','soil_0095690e00001988','nict_weather','ffffff1000018fa7','507','2021-07-11 06:58:46','2',NULL,NULL),(45,'2343','Olak Lempit, Selangor','soil_0095690e00001988','nict_weather','ffffff1000018fa7','507','2021-07-11 06:58:57','2',NULL,NULL),(47,'7501','Tumpat, Kelantan','soil_0095690e00001029','nict_weather','ffffff1000018fa7','7204','2021-07-13 08:30:48','2',NULL,NULL),(53,'5939','Johor Bahru','soil_0095690e00001029','nict_weather','ffffff1000018fa7','2343','2021-12-21 06:30:53','2','http://localhost:8082/public/files/2_16400682531.jpg','jpg'),(54,'2343','Johor Bahru','soil_0095690e00001029','nict_weather','ffffff1000018fa7','879252494','2021-12-21 06:37:35','2','http://localhost:8082/public/files/2_16400686551.jpg','jpg'),(55,'1105304831','Melaka','soil_0095690e00001029','nict_weather','ffffff1000018fb0','545465076','2021-12-21 06:51:43','2','','');
/*!40000 ALTER TABLE `customers_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_conf_item`
--

DROP TABLE IF EXISTS `data_conf_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_conf_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plant` varchar(100) DEFAULT NULL,
  `iot_sensor` varchar(100) DEFAULT NULL,
  `parameter` varchar(100) DEFAULT NULL,
  `range_start` varchar(100) DEFAULT NULL,
  `range_end` varchar(100) DEFAULT NULL,
  `analysis` text DEFAULT NULL,
  `effect` text DEFAULT NULL,
  `correction` text DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `additional_text` text DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_conf_item`
--

LOCK TABLES `data_conf_item` WRITE;
/*!40000 ALTER TABLE `data_conf_item` DISABLE KEYS */;
INSERT INTO `data_conf_item` VALUES (1,'6293','Nitrogen','High','1','2','tes','test','reas','2021-07-10 15:34:29',NULL,NULL,NULL),(2,'5786','Phosphorus','High','10','15','test','tes','txx','2021-07-10 15:42:35',NULL,NULL,NULL),(3,'2133','Phosphorus','High','2','3','test','test','test','2021-07-10 15:43:22',NULL,NULL,NULL),(4,'2133','Phosphorus','High','2','3','test','test','test','2021-07-10 15:43:22',NULL,NULL,NULL),(5,'9999','Potassium','Low','1','2','test','test','test','2021-07-10 15:47:16',NULL,NULL,NULL),(6,'3936','Nitrogen','High','10','15','test','test','test','2021-07-10 15:53:59',NULL,NULL,NULL),(7,'5121','Soil Moisture','Low','1','5','test','test','test','2021-07-10 15:55:36',NULL,NULL,NULL),(8,'4148','Soil Temperature','Medium','5','10','test','test','test','2021-07-10 15:57:23',NULL,NULL,NULL),(9,'1321','Soil Temperature','Medium','5','5','test','test','test','2021-07-10 15:59:16',NULL,NULL,NULL),(10,'961','Soil Moisture','Medium','5','5','testtest','tret','test','2021-07-10 16:05:26',NULL,NULL,NULL),(11,'961','Soil Moisture','Low','33','`40','tw','txax','tes','2021-07-10 16:05:53',NULL,NULL,NULL),(14,'195','Soil Temperature','Medium','10','12','test','test','tes','2021-07-10 16:51:03',NULL,NULL,NULL),(19,'2343','Nitrogen','Normal','5','10','Good Condition','Good Condition','Good Condition','2021-07-11 02:00:17',NULL,NULL,NULL),(20,'2343','Nitrogen','Low','1','4','\"General chlorosis - leaves are pale green, smaller or yellow, stunted growth.\n\nAdvanced chlorosis - Entire plant becomes yellow and leaves.\"','Older leaves become pale green and smaller, as a result of reduced chlorophyll content. At a more advanced stage of the deficiency, the entire plant becomes yellow and leaves','Apply fertilization.','2021-07-11 02:01:26',NULL,NULL,NULL),(21,'2343','Nitrogen','High','11','50','\"General chlorosis - leaves are pale green, smaller or yellow, stunted growth.\n\nAdvanced chlorosis - Entire plant becomes yellow and leaves.\"','Excess of nitrogen promotes excessive vegetative growth, while flowering and fruit set may delay. This results in decreased yield','To correct for high, irrigate with clear water to the point of excessive leaching to wash out the extra.','2021-07-11 02:02:34',NULL,NULL,NULL),(23,'2343','Phosphorus','Normal','30','50','Good Condition','Good Condition','Good Condition','2021-07-11 02:04:25',NULL,NULL,NULL),(24,'2343','Phosphorus','Low','0','29','Dark green leaves, purple coloration, poor root development, stunted growth','Symptoms of phosphorus deficiency first occur on lower leaves. Leaves may develop dark green or purplish color (result of accumulation anthocyanin pigments), starting from the edges of the leaves. This symptom typically occurs in the earlier growth stages of the crop, when root system is not yet developed. Deficiency is more common under conditions cool, wet soils, soils with pH <5.5 and soils low in organic matter','Apply fertilization.','2021-07-11 02:05:16',NULL,NULL,NULL),(25,'2343','Phosphorus','High','51','100','Dark green leaves, purple coloration, poor root development, stunted growth','Excess phosphorus in soil may interfere in the availability of other nutrients, such as zinc, iron and manganese. Furthermore, excessive applications of phosphorus may result in contamination of surface water runoff, which can cause eutrophication – an unwanted growth of algae and aquatic weeds in the water, which restricts its use for fisheries, drinking, industry etc','Irrigate with clear water to the point of excessive leaching to wash out the extra.\n','2021-07-11 02:06:09',NULL,NULL,NULL),(26,'2343','Potassium','Normal','81','120','Good Condition','Good Condition','Good Condition','2021-07-11 02:06:58',NULL,NULL,NULL),(27,'2343','Potassium','Low','0','80','\"Chlorosis and necrosis starting at leaf edges\nand moving inwards smaller leaves. Leaf edges eventually become brown and die.\nOther symptoms include:\n• Poor crop yield\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\n• The crop might be more susceptible to diseases.\"','\"Potassium deficiency symptoms may vary among crops. However, the most common visual symptoms of potassium deficiency include scorching and yellowing of leaf edges, while the inner side of the leaf remains green. Leaf edges eventually become brown and die.\nher potassium deficiency symptoms include:\n• Smaller leaves.\n• Poor crop yield\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\n• Shorter shelf life.\n• The crop might be more susceptible to diseases.\"','Apply fertilization.\n','2021-07-11 02:08:32',NULL,NULL,NULL),(28,'2343','Potassium','High','121','1000','\"Chlorosis and necrosis starting at leaf edges\nand moving inwards smaller leaves. Leaf edges eventually become brown and die.\nOther symptoms include:\n• Poor crop yield\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\n• The crop might be more susceptible to diseases.\"','Excess Potassium may cause nutrient deficiencies. Under such conditions of oxygen stress, roots cannot function efficiently','Irrigate with clear water to the point of excessive leaching to wash out the extra.\n','2021-07-11 02:11:07',NULL,NULL,NULL),(29,'2343','pH','Normal','5.6','6.5','Good Condition','Good Condition','Good Condition','2021-07-11 02:11:49',NULL,NULL,NULL),(30,'2343','pH','Low','0','5.5','low pH soil on acidic','\"Lower pH below 5.5, might cause toxicity of micronutrients such as iron and\nmanganese and might also cause irreversible damage to growing roots.\"','\"Lime is usually added to acid soils to increase soil pH. The addition of lime not only replaces hydrogen ions and raises soil pH, thereby eliminating most major problems associated with acid soils but it also provides two nutrients, calcium and magnesium to the soil.\nLime does more than just correct soil acidity. It also:\n1. Supplies essential plant nutrients, Ca and Mg, if dolomitic lime is used\n2. Makes other essential nutrients more available\n3.     Prevents elements such as Mn and Al from being toxic to plant growth\n\ncan choose from four types of ground limestone products: pulverized, granular, pelletized and hydrated. Pulverized lime is finely ground. Granular and pelletized lime are less likely to clog when spread with a fertilizer spreader over turf areas. The finer the grind of the limestone the faster it will change the soil pH value. Hydrated lime should be used with caution since it has a greater ability to neutralize soil acidity than regular limestone.\"','2021-07-11 03:42:31',NULL,NULL,NULL),(31,'2343','pH','High','6.6','14','low pH soil on Alkaline','\"Higher pH above 5.5 might result in nutrient deficiencies and could cause clogging of emitters:\nNutrient deficiencies - Micronutrients, such as iron and manganese become unavailable to plants at pH greater than 7.0.\nClogging of emitters - Precipitation of minerals, such as calcium carbonates, calcium sulfate and phosphates, is a common cause of emitter clogging in irrigation systems at high irrigation water pH.\"','\"Soil pH can be reduced most effectively by adding elemental sulfur or aluminum sulfate. Aluminum sulfate is faster acting than elemental sulfur because it is very soluble.  The advantage of elemental sulfur is that it is more economical, particularly if a large area is to be treated.\nApplying organic, elemental garden sulfur is a safe and efficient way to make the soil more acidic. Sulfur is an essential nutrient that can bolster disease resistance in plants\"\n','2021-07-11 03:53:04',NULL,NULL,NULL),(32,'2343','Soil Moisture','Normal','40','60','Good Condition','Good Condition','Good Condition','2021-07-11 03:54:07',NULL,NULL,NULL),(33,'2343','Soil Moisture','Low','0','39','Low water level','If we are chronically under watering a plant, but still giving it enough water to survive, growth will be slower than normal or expected\nWhen a plant doesn\'t get enough water, the tips and edges of leaves dry out and turn brown. Ultimately, entire leaves will brown and die.','water the plants adequately','2021-07-11 04:30:30',NULL,NULL,NULL),(34,'2343','Soil Moisture','High','61','100','too much water and damp','High moisture levels may produce anaerobic conditions and the compost will develop that may cause nutrient deficiencies. It also may cause oxygen stress, roots cannot function efficiently','water the plants at an appropriate rate','2021-07-11 04:35:05',NULL,NULL,NULL),(35,'2343','Soil Temperature','Normal','18','24','Good Condition','Good Condition','Good Condition','2021-07-11 04:46:54',NULL,NULL,NULL),(36,'2343','Soil Temperature','Low','0','17','low temperature reading','Impede root activity and restrict nutrients uptake that can cause nutrients deficiency. For example, the transport of nitrate to the leaves may become restricted.','Use of clear plastic mulch or black plastic mulch is one of the quickest ways to warm up the soil. Depending on the weather condition, clear plastic mulch can warm the top 2 inches of soil about 8-10 degrees within 2 weeks, and a black plastic mulch about 4 degrees','2021-07-11 05:23:49',NULL,NULL,NULL),(37,'2343','Soil Temperature','High','25','100','high temperature reading','\"Oxygen becomes less soluble in water and its availability decreases.\nResult in greater losses of nitrogen.\"','\"Use mulch that can act as an insulation. It keeps heat from being absorbed during the day and released at nighter of material applied to the surface of soil. Reasons for applying mulch include conservation of soil moisture, improving fertility and health of the soil, reducing weed growth and enhancing the visual appeal of the area. A mulch is usually, but not exclusively, organic in nature.\n\nShading the soil also keeps it cooler during the day. You can shade soil with ground covers or other plants, or with structures.\"','2021-07-11 05:27:27',NULL,NULL,NULL),(38,'2343','Electrical Conductivity','Normal','600','1500','Good Condition','Good Condition','Good Condition','2021-07-11 05:28:44',NULL,NULL,NULL),(39,'2343','Electrical Conductivity','Low','0','599','Low Electrical conductivity reading','EC that is too low indicates insufficient nutrition','Apply fertilization.','2021-07-11 05:31:53',NULL,NULL,NULL),(41,'2343','Electrical Conductivity','High','1501','3000','High Electrical Conductivity ','\"EC that is too high can result in a physiological drought which restricts root water uptake by the plant, even when the substrate is moist\n\nHigh salinity affects plants in three ways:\n1. reduces water availability (uptake) to plants\n2. high electrical conductivity of the soil solution or nutrient solution can usually imply high concentration of particular ions, which are potentially toxic to the plant. For example, high concentration of chlorides, sodium, boron etc.\n3. The high concentration of ions increases the chance for competition between ions for uptake. For example, high concentration of chlorides might restrict nitrate uptake, calcium competes with potassium etc.\"','Irrigate with clear water to the point of excessive leaching to wash out the extra.','2021-07-11 05:33:57',NULL,NULL,NULL),(43,'7501','Nitrogen','Normal','5','10','Good Condition','Good Condition','Good Condition','2021-07-12 21:59:00',NULL,NULL,NULL),(44,'7501','Phosphorus','Normal','30','50','Good Condition','Good Condition','Good Condition','2021-07-12 21:59:26',NULL,NULL,NULL),(45,'7501','Potassium','Normal','81','120','Good Condition','Good Condition','Good Condition','2021-07-12 21:59:51',NULL,NULL,NULL),(46,'7501','Nitrogen','Low','0','4','\"General chlorosis - leaves are pale green, smaller or yellow, stunted growth.\n\nAdvanced chlorosis - Entire plant becomes yellow and leaves.\"\n','Older leaves become pale green and smaller, as a result of reduced chlorophyll content. At a more advanced stage of the deficiency, the entire plant becomes yellow and leaves\n','To correct for low, apply fertilization','2021-07-12 22:01:49',NULL,NULL,NULL),(47,'7501','Nitrogen','High','11','100','\"General chlorosis - leaves are pale green, smaller or yellow, stunted growth.\n\nAdvanced chlorosis - Entire plant becomes yellow and leaves.\"\n','Excess of nitrogen promotes excessive vegetative growth, while flowering and fruit set may delay. This results in decreased yield\n','To correct for high, irrigate with clear water to the point of excessive leaching to wash out the extra.\n','2021-07-12 22:02:25',NULL,NULL,NULL),(48,'7501','Phosphorus','Low','0','29','Dark green leaves, purple coloration, poor root development, stunted growth','Symptoms of phosphorus deficiency first occur on lower leaves. Leaves may develop dark green or purplish color (result of accumulation anthocyanin pigments), starting from the edges of the leaves. This symptom typically occurs in the earlier growth stages of the crop, when root system is not yet developed. Deficiency is more common under conditions cool, wet soils, soils with pH <5.5 and soils low in organic matter','Apply fertilization','2021-07-13 14:05:16',NULL,NULL,NULL),(49,'7501','Phosphorus','High','51','100','Dark green leaves, purple coloration, poor root development, stunted growth','Excess phosphorus in soil may interfere in the availability of other nutrients, such as zinc, iron and manganese. Furthermore, excessive applications of phosphorus may result in contamination of surface water runoff, which can cause eutrophication – an unwanted growth of algae and aquatic weeds in the water, which restricts its use for fisheries, drinking, industry etc','Irrigate with clear water to the point of excessive leaching to wash out the extra.\r\n','2021-07-13 14:06:09',NULL,NULL,NULL),(50,'7501','Potassium','Low','0','80','Chlorosis and necrosis starting at leaf edges\r\nand moving inwards smaller leaves. Leaf edges eventually become brown and die.\r\nOther symptoms include:\r\n• Poor crop yield\r\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\r\n• The crop might be more susceptible to diseases','Potassium deficiency symptoms may vary among crops. However, the most common visual symptoms of potassium deficiency include scorching and yellowing of leaf edges, while the inner side of the leaf remains green. Leaf edges eventually become brown and die.\r\nher potassium deficiency symptoms include:\r\n• Smaller leaves.\r\n• Poor crop yield\r\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\r\n• Shorter shelf life.\r\n• The crop might be more susceptible to diseases','Apply fertilization','2021-07-13 14:08:32',NULL,NULL,NULL),(51,'7501','Potassium','High','121','1000','\"Chlorosis and necrosis starting at leaf edges\r\nand moving inwards smaller leaves. Leaf edges eventually become brown and die.\r\nOther symptoms include:\r\n• Poor crop yield\r\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\r\n• The crop might be more susceptible to diseases.\"','Excess Potassium may cause nutrient deficiencies. Under such conditions of oxygen stress, roots cannot function efficiently','Irrigate with clear water to the point of excessive leaching to wash out the extra.\r\n','2021-07-13 14:11:07',NULL,NULL,NULL),(52,'7501','pH','Normal','5.6','6.5','Good Condition','Good Condition','Good Condition','2021-07-13 14:11:49',NULL,NULL,NULL),(53,'7501','pH','Low','0','5.5','low pH soil on acidic','\"Lower pH below 5.5, might cause toxicity of micronutrients such as iron and\nmanganese and might also cause irreversible damage to growing roots.\"','\"Lime is usually added to acid soils to increase soil pH. The addition of lime not only replaces hydrogen ions and raises soil pH, thereby eliminating most major problems associated with acid soils but it also provides two nutrients, calcium and magnesium to the soil.\nLime does more than just correct soil acidity. It also:\n1. Supplies essential plant nutrients, Ca and Mg, if dolomitic lime is used\n2. Makes other essential nutrients more available\n3.     Prevents elements such as Mn and Al from being toxic to plant growth\n\ncan choose from four types of ground limestone products: pulverized, granular, pelletized and hydrated. Pulverized lime is finely ground. Granular and pelletized lime are less likely to clog when spread with a fertilizer spreader over turf areas. The finer the grind of the limestone the faster it will change the soil pH value. Hydrated lime should be used with caution since it has a greater ability to neutralize soil acidity than regular limestone.\"','2021-07-13 14:42:31',NULL,NULL,NULL),(54,'7501','pH','High','6.6','14','low pH soil on Alkaline','\"Higher pH above 5.5 might result in nutrient deficiencies and could cause clogging of emitters:\nNutrient deficiencies - Micronutrients, such as iron and manganese become unavailable to plants at pH greater than 7.0.\nClogging of emitters - Precipitation of minerals, such as calcium carbonates, calcium sulfate and phosphates, is a common cause of emitter clogging in irrigation systems at high irrigation water pH.\"','\"Soil pH can be reduced most effectively by adding elemental sulfur or aluminum sulfate. Aluminum sulfate is faster acting than elemental sulfur because it is very soluble.  The advantage of elemental sulfur is that it is more economical, particularly if a large area is to be treated.\nApplying organic, elemental garden sulfur is a safe and efficient way to make the soil more acidic. Sulfur is an essential nutrient that can bolster disease resistance in plants\"\n','2021-07-13 14:53:04',NULL,NULL,NULL),(55,'7501','Soil Moisture','Normal','40','60','Good Condition','Good Condition','Good Condition','2021-07-13 15:54:07',NULL,NULL,NULL),(56,'7501','Soil Moisture','Low','0','39','Low water level','If we are chronically under watering a plant, but still giving it enough water to survive, growth will be slower than normal or expected\nWhen a plant doesn\'t get enough water, the tips and edges of leaves dry out and turn brown. Ultimately, entire leaves will brown and die.','water the plants adequately','2021-07-13 16:30:30',NULL,NULL,NULL),(57,'7501','Soil Moisture','High','61','100','too much water and damp','High moisture levels may produce anaerobic conditions and the compost will develop that may cause nutrient deficiencies. It also may cause oxygen stress, roots cannot function efficiently','water the plants at an appropriate rate','2021-07-13 16:35:05',NULL,NULL,NULL),(58,'7501','Soil Temperature','Normal','18','24','Good Condition','Good Condition','Good Condition','2021-07-13 16:46:54',NULL,NULL,NULL),(59,'7501','Soil Temperature','Low','0','17','low temperature reading','Impede root activity and restrict nutrients uptake that can cause nutrients deficiency. For example, the transport of nitrate to the leaves may become restricted.','Use of clear plastic mulch or black plastic mulch is one of the quickest ways to warm up the soil. Depending on the weather condition, clear plastic mulch can warm the top 2 inches of soil about 8-10 degrees within 2 weeks, and a black plastic mulch about 4 degrees','2021-07-13 17:23:49',NULL,NULL,NULL),(60,'7501','Soil Temperature','High','25','100','high temperature reading','\"Oxygen becomes less soluble in water and its availability decreases.\nResult in greater losses of nitrogen.\"','\"Use mulch that can act as an insulation. It keeps heat from being absorbed during the day and released at nighter of material applied to the surface of soil. Reasons for applying mulch include conservation of soil moisture, improving fertility and health of the soil, reducing weed growth and enhancing the visual appeal of the area. A mulch is usually, but not exclusively, organic in nature.\n\nShading the soil also keeps it cooler during the day. You can shade soil with ground covers or other plants, or with structures.\"','2021-07-13 17:27:27',NULL,NULL,NULL),(61,'7501','Electrical Conductivity','Normal','600','1500','Good Condition','Good Condition','Good Condition','2021-07-13 17:28:44',NULL,NULL,NULL),(62,'7501','Electrical Conductivity','Low','0','599','Low Electrical conductivity reading','EC that is too low indicates insufficient nutrition','Apply fertilization.','2021-07-13 17:31:53',NULL,NULL,NULL),(63,'7501','Electrical Conductivity','High','1501','3000','High Electrical Conductivity ','\"EC that is too high can result in a physiological drought which restricts root water uptake by the plant, even when the substrate is moist\n\nHigh salinity affects plants in three ways:\n1. reduces water availability (uptake) to plants\n2. high electrical conductivity of the soil solution or nutrient solution can usually imply high concentration of particular ions, which are potentially toxic to the plant. For example, high concentration of chlorides, sodium, boron etc.\n3. The high concentration of ions increases the chance for competition between ions for uptake. For example, high concentration of chlorides might restrict nitrate uptake, calcium competes with potassium etc.\"','Irrigate with clear water to the point of excessive leaching to wash out the extra.','2021-07-13 17:33:57',NULL,NULL,NULL),(64,'7501','Outside Temperature','Normal','13','30','Good Condition','Good Condition','Good Condition','2021-07-17 22:28:38',NULL,NULL,NULL),(65,'7501','Outside Temperature','Low','0','12','-','Colder weather can decrease plant enzyme activity. This then disrupts plant nutrient intake because plants secrete enzymes to digest surrounding materials for soil. Consequently, this can stunt growth or more severely cause them to die','-','2021-07-17 22:29:26',NULL,NULL,NULL),(66,'7501','Outside Temperature','High','31','100','-','When soil temperature rises above an optimum threshold, plant water and nutrient uptake can be impeded, causing damage to plant components\n','-','2021-07-17 22:29:46',NULL,NULL,NULL),(67,'7501','Humidity','Normal','40','60','Good Condition','Good Condition','Good Condition','2021-07-17 22:31:41',NULL,NULL,NULL),(68,'7501','Humidity','Low','0','39','-','When the humidity levels are too low, plant transpiration rates will increase. When the environment surrounding a plant is drier than the environment inside the plant’s cells, then moisture leaves the cells and moves into the surrounding environment. That process, called transpiration, can quickly dehydrate a plant if it does not have the means to replace the water it loses to the air.','-','2021-07-17 22:32:13',NULL,NULL,NULL),(69,'7501','Humidity','High','61','100','-','\"When relative humidity levels are too high or there is a lack of air circulation, a plant cannot make water evaporate (part of the transpiration process) or draw nutrients from the soil.\nWhen conditions are too humid, it may promote the growth of mould and bacteria that cause plants to die and crops to fail, as well as conditions like root or crown rot. Humid conditions also invite the presence of pests, such as fungus gnats, whose larva feed on plant roots and thrive in moist soil\"','-','2021-07-17 22:32:49',NULL,NULL,NULL),(70,'2343','Humidity','Normal','40','60','Good Condition','Good Condition','Good Condition','2021-07-21 23:40:43',NULL,NULL,NULL),(71,'2343','Humidity','Low','0','39','-','When the humidity levels are too low, plant transpiration rates will increase. When the environment surrounding a plant is drier than the environment inside the plant’s cells, then moisture leaves the cells and moves into the surrounding environment. That process, called transpiration, can quickly dehydrate a plant if it does not have the means to replace the water it loses to the air.','-','2021-07-21 23:41:21',NULL,NULL,NULL),(72,'2343','Humidity','High','61','100','-','\"When relative humidity levels are too high or there is a lack of air circulation, a plant cannot make water evaporate (part of the transpiration process) or draw nutrients from the soil. When conditions are too humid, it may promote the growth of mould and bacteria that cause plants to die and crops to fail, as well as conditions like root or crown rot. Humid conditions also invite the presence of pests, such as fungus gnats, whose larva feed on plant roots and thrive in moist soil\"','-','2021-07-21 23:41:47',NULL,NULL,NULL),(73,'2343','Outside Temperature','Low','0','12','-','Colder weather can decrease plant enzyme activity. This then disrupts plant nutrient intake because plants secrete enzymes to digest surrounding materials for soil. Consequently, this can stunt growth or more severely cause them to die','-','2021-07-21 23:42:18',NULL,NULL,NULL),(74,'2343','Outside Temperature','Normal','13','30','Good Condition','Good Condition','Good Condition','2021-07-21 23:42:40',NULL,NULL,NULL),(75,'2343','Outside Temperature','High','31','100','-','When soil temperature rises above an optimum threshold, plant water and nutrient uptake can be impeded, causing damage to plant components','-','2021-07-21 23:43:18',NULL,NULL,NULL),(76,'5939','Nitrogen','Normal','5','10','Good Condition','Good Condition','Good Condition','2021-07-27 22:17:13',NULL,NULL,NULL),(77,'5939','Phosphorus','Normal','30','50','Good Condition','Good Condition','Good Condition','2021-07-12 21:59:26',NULL,NULL,NULL),(78,'5939','Potassium','Normal','81','120','Good Condition','Good Condition','Good Condition','2021-07-12 21:59:51',NULL,NULL,NULL),(79,'5939','Nitrogen','Low','0','4','\"General chlorosis - leaves are pale green, smaller or yellow, stunted growth.\n\nAdvanced chlorosis - Entire plant becomes yellow and leaves.\"\n','Older leaves become pale green and smaller, as a result of reduced chlorophyll content. At a more advanced stage of the deficiency, the entire plant becomes yellow and leaves\n','To correct for low, apply fertilization','2021-07-12 22:01:49',NULL,NULL,NULL),(80,'5939','Nitrogen','High','11','100','\"General chlorosis - leaves are pale green, smaller or yellow, stunted growth.\n\nAdvanced chlorosis - Entire plant becomes yellow and leaves.\"\n','Excess of nitrogen promotes excessive vegetative growth, while flowering and fruit set may delay. This results in decreased yield\n','To correct for high, irrigate with clear water to the point of excessive leaching to wash out the extra.\n','2021-07-12 22:02:25',NULL,NULL,NULL),(81,'5939','Phosphorus','Low','0','29','Dark green leaves, purple coloration, poor root development, stunted growth','Symptoms of phosphorus deficiency first occur on lower leaves. Leaves may develop dark green or purplish color (result of accumulation anthocyanin pigments), starting from the edges of the leaves. This symptom typically occurs in the earlier growth stages of the crop, when root system is not yet developed. Deficiency is more common under conditions cool, wet soils, soils with pH <5.5 and soils low in organic matter','Apply fertilization','2021-07-13 14:05:16',NULL,NULL,NULL),(82,'5939','Phosphorus','High','51','100','Dark green leaves, purple coloration, poor root development, stunted growth','Excess phosphorus in soil may interfere in the availability of other nutrients, such as zinc, iron and manganese. Furthermore, excessive applications of phosphorus may result in contamination of surface water runoff, which can cause eutrophication – an unwanted growth of algae and aquatic weeds in the water, which restricts its use for fisheries, drinking, industry etc','Irrigate with clear water to the point of excessive leaching to wash out the extra.\r\n','2021-07-13 14:06:09',NULL,NULL,NULL),(83,'5939','Potassium','Low','0','80','Chlorosis and necrosis starting at leaf edges\r\nand moving inwards smaller leaves. Leaf edges eventually become brown and die.\r\nOther symptoms include:\r\n• Poor crop yield\r\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\r\n• The crop might be more susceptible to diseases','Potassium deficiency symptoms may vary among crops. However, the most common visual symptoms of potassium deficiency include scorching and yellowing of leaf edges, while the inner side of the leaf remains green. Leaf edges eventually become brown and die.\r\nher potassium deficiency symptoms include:\r\n• Smaller leaves.\r\n• Poor crop yield\r\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\r\n• Shorter shelf life.\r\n• The crop might be more susceptible to diseases','Apply fertilization','2021-07-13 14:08:32',NULL,NULL,NULL),(84,'5939','Potassium','High','121','1000','\"Chlorosis and necrosis starting at leaf edges\r\nand moving inwards smaller leaves. Leaf edges eventually become brown and die.\r\nOther symptoms include:\r\n• Poor crop yield\r\n• Poor yield quality – size, uniformity, sugar content, protein content etc.\r\n• The crop might be more susceptible to diseases.\"','Excess Potassium may cause nutrient deficiencies. Under such conditions of oxygen stress, roots cannot function efficiently','Irrigate with clear water to the point of excessive leaching to wash out the extra.\r\n','2021-07-13 14:11:07',NULL,NULL,NULL),(85,'5939','pH','Normal','5.6','6.5','Good Condition','Good Condition','Good Condition','2021-07-13 14:11:49',NULL,NULL,NULL),(86,'5939','pH','Low','0','5.5','low pH soil on acidic','\"Lower pH below 5.5, might cause toxicity of micronutrients such as iron and\nmanganese and might also cause irreversible damage to growing roots.\"','\"Lime is usually added to acid soils to increase soil pH. The addition of lime not only replaces hydrogen ions and raises soil pH, thereby eliminating most major problems associated with acid soils but it also provides two nutrients, calcium and magnesium to the soil.\nLime does more than just correct soil acidity. It also:\n1. Supplies essential plant nutrients, Ca and Mg, if dolomitic lime is used\n2. Makes other essential nutrients more available\n3.     Prevents elements such as Mn and Al from being toxic to plant growth\n\ncan choose from four types of ground limestone products: pulverized, granular, pelletized and hydrated. Pulverized lime is finely ground. Granular and pelletized lime are less likely to clog when spread with a fertilizer spreader over turf areas. The finer the grind of the limestone the faster it will change the soil pH value. Hydrated lime should be used with caution since it has a greater ability to neutralize soil acidity than regular limestone.\"','2021-07-13 14:42:31',NULL,NULL,NULL),(87,'5939','pH','High','6.6','14','low pH soil on Alkaline','\"Higher pH above 5.5 might result in nutrient deficiencies and could cause clogging of emitters:\nNutrient deficiencies - Micronutrients, such as iron and manganese become unavailable to plants at pH greater than 7.0.\nClogging of emitters - Precipitation of minerals, such as calcium carbonates, calcium sulfate and phosphates, is a common cause of emitter clogging in irrigation systems at high irrigation water pH.\"','\"Soil pH can be reduced most effectively by adding elemental sulfur or aluminum sulfate. Aluminum sulfate is faster acting than elemental sulfur because it is very soluble.  The advantage of elemental sulfur is that it is more economical, particularly if a large area is to be treated.\nApplying organic, elemental garden sulfur is a safe and efficient way to make the soil more acidic. Sulfur is an essential nutrient that can bolster disease resistance in plants\"\n','2021-07-13 14:53:04',NULL,NULL,NULL),(88,'5939','Soil Moisture','Normal','40','60','Good Condition','Good Condition','Good Condition','2021-07-13 15:54:07',NULL,NULL,NULL),(89,'5939','Soil Moisture','Low','0','39','Low water level','If we are chronically under watering a plant, but still giving it enough water to survive, growth will be slower than normal or expected\nWhen a plant doesn\'t get enough water, the tips and edges of leaves dry out and turn brown. Ultimately, entire leaves will brown and die.','water the plants adequately','2021-07-13 16:30:30',NULL,NULL,NULL),(90,'5939','Soil Moisture','High','61','100','too much water and damp','High moisture levels may produce anaerobic conditions and the compost will develop that may cause nutrient deficiencies. It also may cause oxygen stress, roots cannot function efficiently','water the plants at an appropriate rate','2021-07-13 16:35:05',NULL,NULL,NULL),(91,'5939','Soil Temperature','Normal','18','24','Good Condition','Good Condition','Good Condition','2021-07-13 16:46:54',NULL,NULL,NULL),(92,'5939','Soil Temperature','Low','0','17','low temperature reading','Impede root activity and restrict nutrients uptake that can cause nutrients deficiency. For example, the transport of nitrate to the leaves may become restricted.','Use of clear plastic mulch or black plastic mulch is one of the quickest ways to warm up the soil. Depending on the weather condition, clear plastic mulch can warm the top 2 inches of soil about 8-10 degrees within 2 weeks, and a black plastic mulch about 4 degrees','2021-07-13 17:23:49',NULL,NULL,NULL),(93,'5939','Soil Temperature','High','25','100','high temperature reading','\"Oxygen becomes less soluble in water and its availability decreases.\nResult in greater losses of nitrogen.\"','\"Use mulch that can act as an insulation. It keeps heat from being absorbed during the day and released at nighter of material applied to the surface of soil. Reasons for applying mulch include conservation of soil moisture, improving fertility and health of the soil, reducing weed growth and enhancing the visual appeal of the area. A mulch is usually, but not exclusively, organic in nature.\n\nShading the soil also keeps it cooler during the day. You can shade soil with ground covers or other plants, or with structures.\"','2021-07-13 17:27:27',NULL,NULL,NULL),(94,'5939','Electrical Conductivity','Normal','600','1500','Good Condition','Good Condition','Good Condition','2021-07-13 17:28:44',NULL,NULL,NULL),(95,'5939','Electrical Conductivity','Low','0','599','Low Electrical conductivity reading','EC that is too low indicates insufficient nutrition','Apply fertilization.','2021-07-13 17:31:53',NULL,NULL,NULL),(96,'5939','Electrical Conductivity','High','1501','3000','High Electrical Conductivity ','\"EC that is too high can result in a physiological drought which restricts root water uptake by the plant, even when the substrate is moist\n\nHigh salinity affects plants in three ways:\n1. reduces water availability (uptake) to plants\n2. high electrical conductivity of the soil solution or nutrient solution can usually imply high concentration of particular ions, which are potentially toxic to the plant. For example, high concentration of chlorides, sodium, boron etc.\n3. The high concentration of ions increases the chance for competition between ions for uptake. For example, high concentration of chlorides might restrict nitrate uptake, calcium competes with potassium etc.\"','Irrigate with clear water to the point of excessive leaching to wash out the extra.','2021-07-13 17:33:57',NULL,NULL,NULL),(97,'5939','Outside Temperature','Normal','13','30','Good Condition','Good Condition','Good Condition','2021-07-17 22:28:38',NULL,NULL,NULL),(98,'5939','Outside Temperature','Low','0','12','-','Colder weather can decrease plant enzyme activity. This then disrupts plant nutrient intake because plants secrete enzymes to digest surrounding materials for soil. Consequently, this can stunt growth or more severely cause them to die','-','2021-07-17 22:29:26',NULL,NULL,NULL),(99,'5939','Outside Temperature','High','31','100','-','When soil temperature rises above an optimum threshold, plant water and nutrient uptake can be impeded, causing damage to plant components\n','-','2021-07-17 22:29:46',NULL,NULL,NULL),(100,'5939','Humidity','Normal','40','60','Good Condition','Good Condition','Good Condition','2021-07-17 22:31:41',NULL,NULL,NULL),(101,'5939','Humidity','Low','0','39','-','When the humidity levels are too low, plant transpiration rates will increase. When the environment surrounding a plant is drier than the environment inside the plant’s cells, then moisture leaves the cells and moves into the surrounding environment. That process, called transpiration, can quickly dehydrate a plant if it does not have the means to replace the water it loses to the air.','-','2021-07-17 22:32:13',NULL,NULL,NULL),(102,'5939','Humidity','High','61','100','-','\"When relative humidity levels are too high or there is a lack of air circulation, a plant cannot make water evaporate (part of the transpiration process) or draw nutrients from the soil.\nWhen conditions are too humid, it may promote the growth of mould and bacteria that cause plants to die and crops to fail, as well as conditions like root or crown rot. Humid conditions also invite the presence of pests, such as fungus gnats, whose larva feed on plant roots and thrive in moist soil\"','-','2021-07-17 22:32:49',NULL,NULL,NULL),(103,'1038330791','Nitrogen','High','1','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(104,'1105304831','Nitrogen','High','1','10',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,'789005764','Nitrogen','High','30','50',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(106,'2063923203','Soil Moisture','High','3','5','test','test','test',NULL,NULL,NULL,NULL),(107,'1257928707','Nitrogen','High','3','10','test','test 2','test 3',NULL,NULL,NULL,NULL),(108,'2138030690','Nitrogen','Normal','1','10','test','test','test',NULL,NULL,NULL,NULL),(109,'2138030690','Phosphorus','Normal','5','10','test','test 3','test',NULL,NULL,NULL,NULL),(110,'2138030690','Electrical Conductivity','Normal','3','2','test','tes','test',NULL,NULL,NULL,NULL),(111,'10505175','Phosphorus','High','1','10','test','test','test',NULL,NULL,NULL,NULL),(112,'924758513','Phosphorus','High','1','20','test','tets','tets',NULL,NULL,NULL,NULL),(114,'924758513','Phosphorus','High','1','10','test','test','test',NULL,NULL,NULL,NULL),(115,'1506180112','Nitrogen','High','4','3','test data','test data','test',NULL,'test',NULL,NULL),(116,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://localhost:8082/public/files/2_16401865711.jpg','jpg'),(117,'682274440','Nitrogen','High','1','10','t','t','t',NULL,'t','http://localhost:8082/public/files/2_16401866901.jpg','jpg'),(118,'2026083018','Nitrogen','High','3','3','t','t','t',NULL,'t','http://localhost:8082/public/files/2_16401868691.jpg','jpg'),(119,'631710333','Nitrogen','Normal','3','10','t','t','t',NULL,'t','http://localhost:8082/public/files/2_16401869571.jpg','jpg'),(120,'2070390302','Nitrogen','Normal','3','3','t','t','t',NULL,'t','http://localhost:8082/public/files/2_16401869801.jpg','jpg'),(121,'1790006813','Nitrogen','High','3','3','test','test','test',NULL,'test','http://localhost:8082/public/files/2_16401870151.jpg','jpg');
/*!40000 ALTER TABLE `data_conf_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_conf_register`
--

DROP TABLE IF EXISTS `data_conf_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_conf_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plant` varchar(100) DEFAULT NULL,
  `name_plant` text DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_conf_register`
--

LOCK TABLES `data_conf_register` WRITE;
/*!40000 ALTER TABLE `data_conf_register` DISABLE KEYS */;
INSERT INTO `data_conf_register` VALUES (4,'2343','Durian','2021-07-11 05:24:02'),(6,'7501','Kurma','2021-07-12 21:59:56'),(7,'5939','Nanas','2021-07-27 22:17:15'),(8,'1038330791','Epal','2021-12-18 14:06:23'),(9,'1105304831','Rambutan','2021-12-18 14:37:44'),(10,'789005764','Epal','2021-12-18 14:41:33'),(11,'2063923203','Nenas','2021-12-18 14:49:12'),(12,'1257928707','Epal','2021-12-18 14:50:40'),(13,'2138030690','Epal','2021-12-18 14:51:43'),(14,'10505175','Manggis','2021-12-18 14:54:09'),(15,'924758513','Moktan','2021-12-18 14:59:01'),(16,'1506180112','Banan','2021-12-22 15:01:03'),(17,NULL,NULL,'2021-12-22 15:22:51'),(18,'682274440','Orange','2021-12-22 15:24:50'),(19,'2026083018','Orange','2021-12-22 15:27:49'),(20,'631710333','Banan','2021-12-22 15:29:17'),(21,'2070390302','Banan','2021-12-22 15:29:40'),(22,'1790006813','Banan','2021-12-22 15:30:15');
/*!40000 ALTER TABLE `data_conf_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_06_06_041127_create_admins_table',2),(5,'2021_06_09_170127_test_data_table',3),(6,'2021_06_11_225447_add_original_passwords_to_users_table',4),(7,'2021_06_12_123548_create_customers_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multispectra_history`
--

DROP TABLE IF EXISTS `multispectra_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multispectra_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `id_plant` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multispectra_history`
--

LOCK TABLES `multispectra_history` WRITE;
/*!40000 ALTER TABLE `multispectra_history` DISABLE KEYS */;
INSERT INTO `multispectra_history` VALUES (1,'http://localhost:8082/public/files/2_16401831711.jpg','jpg',NULL,'2021-12-22 14:26:11','2'),(2,'http://localhost:8082/public/files/2_16401832101.jpg','jpg','314','2021-12-22 14:26:50','2'),(3,'http://localhost:8082/public/files/2_16401832591.jpg','jpg','314','2021-12-22 14:27:39','2'),(4,'http://localhost:8082/public/files/2_16401832811.jpg','jpg','314','2021-12-22 14:28:01','2'),(5,'http://localhost:8082/public/files/2_16401833761.jpg','jpg','314','2021-12-22 14:29:36','2'),(6,'http://localhost:8082/public/files/2_16401833951.jpg','jpg','314','2021-12-22 14:29:55','2'),(7,'http://localhost:8082/public/files/2_16401834181.jpg','jpg','314','2021-12-22 14:30:18','2'),(8,'http://localhost:8082/public/files/2_16401834581.jpg','jpg','314','2021-12-22 14:30:58','2'),(9,'http://localhost:8082/public/files/2_16401835651.jpg','jpg','314','2021-12-22 14:32:45','2'),(10,'http://localhost:8082/public/files/2_16401836711.jpg','jpg','314','2021-12-22 14:34:31','2'),(11,'http://localhost:8082/public/files/2_16401836711.jpg','jpg','314','2021-12-22 14:34:31','2'),(12,'http://localhost:8082/public/files/2_16401838021.jpg','jpg','314','2021-12-22 14:36:42','2'),(13,'http://localhost:8082/public/files/2_16401838181.jpg','jpg','314','2021-12-22 14:36:58','2'),(14,'http://localhost:8082/public/files/2_16401838251.jpg','jpg','314','2021-12-22 14:37:05','2'),(15,'http://localhost:8082/public/files/2_16401839351.jpg','jpg','314','2021-12-22 14:38:55','2'),(16,'http://localhost:8082/public/files/2_16401843401.jpg','jpg','314','2021-12-22 14:45:40','2'),(17,'http://localhost:8082/public/files/2_16401844101.jpg','jpg','314','2021-12-22 14:46:50','2'),(18,'http://localhost:8082/public/files/2_16401844721.jpg','jpg','314','2021-12-22 14:47:52','2'),(19,'http://localhost:8082/public/files/2_16401845421.jpg','jpg','314','2021-12-22 14:49:02','2'),(20,'http://localhost:8082/public/files/2_16401846141.jpg','jpg','314','2021-12-22 14:50:14','2'),(21,'http://localhost:8082/public/files/2_16401846701.jpg','jpg','314','2021-12-22 14:51:10','2'),(22,'http://localhost:8082/public/files/2_16401846921.jpg','jpg','314','2021-12-22 14:51:32','2'),(23,'http://localhost:8082/public/files/2_16401849481.jpg','jpg','314','2021-12-22 14:55:48','2'),(24,'http://localhost:8082/public/files/2_16401849661.jpg','jpg','314','2021-12-22 14:56:06','2');
/*!40000 ALTER TABLE `multispectra_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_data`
--

DROP TABLE IF EXISTS `test_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_data`
--

LOCK TABLES `test_data` WRITE;
/*!40000 ALTER TABLE `test_data` DISABLE KEYS */;
INSERT INTO `test_data` VALUES (1,'My name is Sufian','1',NULL,NULL),(2,'My name is Abu','1','2021-06-09 17:10:17','2021-06-09 17:10:17'),(3,'sufian','1','2021-06-09 17:15:19','2021-06-09 17:15:19'),(4,'ok test','1','2021-06-09 17:15:48','2021-06-09 17:15:48');
/*!40000 ALTER TABLE `test_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `original_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'user','user@gmail.com',NULL,'$2y$10$vGYszUKqAZLiy4pnANXjcuxE/HWaMtGILxM9TP3Dw2Ti.BX0ATP0G',NULL,'2021-06-12 06:47:36','2021-06-12 06:47:36','12345678'),(3,'user1','user1@gmail.com',NULL,'$2y$10$eYxmHdQjmvPLw23DpebBTOqIKOr1eS1l/cNpy8K3dpQdCW4bE6RKe',NULL,'2021-06-12 06:47:36','2021-06-12 06:47:36','12345678');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laravel-training'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-23 10:09:58
