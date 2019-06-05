-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: maroto
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

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
-- Dumping data for table `accesory`
--

LOCK TABLES `accesory` WRITE;
/*!40000 ALTER TABLE `accesory` DISABLE KEYS */;
/*!40000 ALTER TABLE `accesory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `accesory_type`
--

LOCK TABLES `accesory_type` WRITE;
/*!40000 ALTER TABLE `accesory_type` DISABLE KEYS */;
INSERT INTO `accesory_type` VALUES (1,'Pastillas de freno',1,'2019-01-09 12:53:38',NULL),(2,'Cuentakilómetros',1,'2019-01-09 12:59:33',NULL),(3,'Cadenas',1,'2019-01-09 12:59:33',NULL),(4,'Platos',1,'2019-01-09 12:59:33',NULL),(5,'Piñones',1,'2019-01-09 12:59:33',NULL),(6,'Cubiertas',1,'2019-01-09 12:59:33',NULL),(7,'Latiguillos',1,'2019-01-09 12:59:33',NULL),(8,'Discos de freno',1,'2019-01-09 12:59:33',NULL),(9,'Guardabarros',1,'2019-01-09 12:59:33',NULL),(10,'Limpiacadenas',1,'2019-01-09 12:59:33',NULL),(11,'Limpiabicicletas',1,'2019-01-09 12:59:33',NULL),(12,'Sillines',1,'2019-01-09 12:59:33',NULL),(13,'Inflador',1,'2019-01-09 12:59:33',NULL),(14,'Puños',1,'2019-01-09 12:59:33',NULL),(15,'Potencia manillar',1,'2019-01-09 12:59:33',NULL),(16,'Portabidones',1,'2019-01-09 12:59:33',NULL),(17,'Pedales',1,'2019-01-09 12:59:33',NULL),(18,'Calas pedales',1,'2019-01-09 12:59:33',NULL),(19,'Bolsas herramientas',1,'2019-01-09 12:59:33',NULL),(20,'Cintas manillar',1,'2019-01-09 12:59:33',NULL),(21,'Llantas',1,'2019-01-09 12:59:33',NULL),(22,'Luces LED',1,'2019-01-09 12:59:33',NULL),(23,'Kit antipinchazos',1,'2019-01-09 12:59:33',NULL),(24,'Tronchacadenas',1,'2019-01-09 12:59:33',NULL),(25,'Cinta tubular',1,'2019-01-09 12:59:33',NULL),(26,'Tubulares',1,'2019-01-09 12:59:33',NULL),(27,'Candados antirrobo',1,'2019-01-09 12:59:33',NULL),(28,'Retenes de horquilla',1,'2019-01-09 12:59:33',NULL),(29,'Rodillos',1,'2019-01-09 12:59:33',NULL),(31,'Filtros de aceite',2,'2019-01-09 13:19:41',NULL),(32,'Aceite',2,'2019-01-09 13:19:41',NULL),(35,'Cadena',2,'2019-01-09 13:19:41',NULL),(37,'Pastillas de freno',2,'2019-01-09 13:17:19',NULL),(38,'Antirrobos',2,'2019-01-09 13:17:19',NULL),(39,'Intermitentes',2,'2019-01-09 13:17:19',NULL),(40,'Manetas de freno',2,'2019-01-09 13:17:19',NULL),(41,'Manetas de embrague',2,'2019-01-09 13:17:19',NULL),(42,'Retrovisores',2,'2019-01-09 13:17:19',NULL),(43,'Soportes de matrícula',2,'2019-01-09 13:17:19',NULL),(44,'Palancas de cambio',2,'2019-01-09 13:17:19',NULL),(45,'Puños',2,'2019-01-09 13:17:19',NULL);
/*!40000 ALTER TABLE `accesory_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bike`
--

LOCK TABLES `bike` WRITE;
/*!40000 ALTER TABLE `bike` DISABLE KEYS */;
/*!40000 ALTER TABLE `bike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bike_size`
--

LOCK TABLES `bike_size` WRITE;
/*!40000 ALTER TABLE `bike_size` DISABLE KEYS */;
INSERT INTO `bike_size` VALUES (1,'XS','2019-01-09 12:33:17',NULL),(2,'S','2019-01-09 12:33:17',NULL),(3,'M','2019-01-09 12:33:17',NULL),(4,'L','2019-01-09 12:33:17',NULL),(5,'XL','2019-01-09 12:33:17',NULL),(6,'XXL','2019-01-09 12:33:17',NULL),(7,'Bebé','2019-01-09 12:33:17',NULL),(8,'Infantil','2019-01-09 12:34:17',NULL);
/*!40000 ALTER TABLE `bike_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bike_type`
--

LOCK TABLES `bike_type` WRITE;
/*!40000 ALTER TABLE `bike_type` DISABLE KEYS */;
INSERT INTO `bike_type` VALUES (1,'Carretera','2019-01-09 12:22:52',NULL),(2,'Eléctrica','2019-01-09 12:22:53',NULL),(3,'Fat','2019-01-09 12:22:53',NULL),(4,'Fixie','2019-01-09 12:22:53',NULL),(5,'Híbrida','2019-01-09 12:22:53',NULL),(6,'MBX','2019-01-09 12:22:53',NULL),(7,'Montaña','2019-01-09 12:22:53',NULL),(8,'Plegable','2019-01-09 12:22:53',NULL),(9,'Urbana','2019-01-09 12:22:53',NULL);
/*!40000 ALTER TABLE `bike_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Rojo','red','2019-01-09 12:45:47',NULL),(2,'Marrón','brown','2019-01-09 12:45:47',NULL),(3,'Rosa','hotpink','2019-01-09 12:45:47',NULL),(4,'Naranja','orange','2019-01-09 12:45:47',NULL),(5,'Amarillo','yellow','2019-01-09 12:45:47',NULL),(6,'Verde','green','2019-01-09 12:45:47',NULL),(7,'Cyan','cyan','2019-01-09 12:45:47',NULL),(8,'Azul','blue','2019-01-09 12:45:47',NULL),(9,'Morado','purple','2019-01-09 12:45:47',NULL),(10,'Magenta','magenta','2019-01-09 12:45:47',NULL),(11,'Blanco','white','2019-01-09 12:45:47',NULL),(12,'Gris','gray','2019-01-09 12:45:47',NULL),(13,'Negro','black','2019-01-09 12:45:47',NULL);
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `equipment_size`
--

LOCK TABLES `equipment_size` WRITE;
/*!40000 ALTER TABLE `equipment_size` DISABLE KEYS */;
INSERT INTO `equipment_size` VALUES (1,'XXS','2019-05-17 12:18:33',NULL),(2,'XS','2019-05-17 12:18:33',NULL),(3,'S','2019-05-17 12:18:33',NULL),(4,'M','2019-05-17 12:18:33',NULL),(5,'L','2019-05-17 12:18:33',NULL),(6,'XL','2019-05-17 12:18:33',NULL),(7,'XXL','2019-05-17 12:18:33',NULL),(8,'XXXL','2019-05-17 12:18:33',NULL),(9,'8','2019-05-17 12:18:33',NULL),(10,'10','2019-05-17 12:18:33',NULL),(11,'12','2019-05-17 12:18:33',NULL),(12,'14','2019-05-17 12:18:33',NULL),(13,'16','2019-05-17 12:18:33',NULL);
/*!40000 ALTER TABLE `equipment_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `equipment_type`
--

LOCK TABLES `equipment_type` WRITE;
/*!40000 ALTER TABLE `equipment_type` DISABLE KEYS */;
INSERT INTO `equipment_type` VALUES (1,'Calcetines',1,'2019-01-09 13:29:32',NULL),(2,'Camisetas',1,'2019-01-09 13:29:32',NULL),(3,'Cascos',1,'2019-01-09 13:29:32',NULL),(4,'Chalecos',1,'2019-01-09 13:29:32',NULL),(5,'Chaquetas',1,'2019-01-09 13:29:32',NULL),(6,'Cullotes',1,'2019-01-09 13:29:32',NULL),(7,'Gafas',1,'2019-01-09 13:29:32',NULL),(8,'Gorras',1,'2019-01-09 13:29:32',NULL),(9,'Guantes',1,'2019-01-09 13:29:32',NULL),(10,'Maillots',1,'2019-01-09 13:29:32',NULL),(11,'Mochilas',1,'2019-01-09 13:29:32',NULL),(12,'Pantalones',1,'2019-01-09 13:29:32',NULL),(13,'Protecciones',1,'2019-01-09 13:29:32',NULL),(14,'Ropa térmica',1,'2019-01-09 13:29:32',NULL),(15,'Zapatillas',1,'2019-01-09 13:29:32',NULL),(16,'Botas',2,'2019-01-09 13:32:49',NULL),(17,'Calcetines',2,'2019-01-09 13:32:49',NULL),(18,'Camisetas',2,'2019-01-09 13:32:49',NULL),(19,'Cascos',2,'2019-01-09 13:32:49',NULL),(20,'Chaquetas',2,'2019-01-09 13:32:49',NULL),(21,'Guantes',2,'2019-01-09 13:32:49',NULL),(22,'Monos',2,'2019-01-09 13:32:49',NULL),(23,'Pantalones',2,'2019-01-09 13:32:49',NULL),(24,'Protecciones',2,'2019-01-09 13:32:49',NULL),(25,'Ropa térmica',2,'2019-01-09 13:32:49',NULL),(26,'Zapatillas',2,'2019-01-09 13:32:49',NULL),(27,'Guantes',3,'2019-05-09 10:14:23',NULL);
/*!40000 ALTER TABLE `equipment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Masculino',1,'2019-01-03 14:24:24',NULL),(2,'Femenino',1,'2019-01-03 14:24:44',NULL),(3,'Unisex',1,'2019-01-03 14:25:20',NULL),(4,'Infantil',1,'2019-01-03 14:25:30',NULL),(5,'Infantil masculino',0,'2019-05-10 09:35:26',NULL),(6,'Infantil femenino',0,'2019-05-10 09:35:36',NULL);
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'Honda Transalp XLV 700','honda-xlv700.jpg','2019-05-29 14:19:40',NULL),(2,'Honda Transalp XLV 700','honda-xl-700-v-transalp-lateral-derecho-1.jpg','2019-06-03 13:07:13',NULL),(3,'Honda Transalp XLV 700','honda-transalp-700.jpg','2019-06-03 13:07:13',NULL),(4,'Honda Transalp XLV 700','honda_xl-700-v.jpg','2019-06-03 13:07:13',NULL),(5,'Honda Transalp XLV 700','XL700V.jpg','2019-06-03 13:07:13',NULL);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moto`
--

LOCK TABLES `moto` WRITE;
/*!40000 ALTER TABLE `moto` DISABLE KEYS */;
INSERT INTO `moto` VALUES (2,8,'1324BCD',60,'cv',660,2,5,NULL,NULL,120000,1,2,2,2,1,1,'2019-05-14 14:04:18',NULL);
/*!40000 ALTER TABLE `moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moto_contamination`
--

LOCK TABLES `moto_contamination` WRITE;
/*!40000 ALTER TABLE `moto_contamination` DISABLE KEYS */;
INSERT INTO `moto_contamination` VALUES (1,'No corresponde',NULL,'2019-01-09 12:29:08',NULL),(2,'B','Amarillo','2019-01-09 12:29:08',NULL),(3,'C','Verde','2019-01-09 12:29:08',NULL),(4,'ECO','Verde y azul','2019-01-09 12:29:08',NULL),(5,'0','Azul','2019-01-09 12:29:08',NULL);
/*!40000 ALTER TABLE `moto_contamination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moto_fuel`
--

LOCK TABLES `moto_fuel` WRITE;
/*!40000 ALTER TABLE `moto_fuel` DISABLE KEYS */;
INSERT INTO `moto_fuel` VALUES (1,'Eléctrico','2019-01-09 12:28:17',NULL),(2,'Gasolina 95','2019-01-09 12:28:17',NULL),(3,'Gasolina 98','2019-01-09 12:28:17',NULL);
/*!40000 ALTER TABLE `moto_fuel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moto_license`
--

LOCK TABLES `moto_license` WRITE;
/*!40000 ALTER TABLE `moto_license` DISABLE KEYS */;
INSERT INTO `moto_license` VALUES (1,'AM',NULL,'2019-01-09 12:27:40',NULL),(2,'A1',NULL,'2019-01-09 12:27:40',NULL),(3,'A2',NULL,'2019-01-09 12:27:40',NULL),(4,'A',NULL,'2019-01-09 12:27:40',NULL),(5,'B','>3 años','2019-01-09 12:27:40',NULL);
/*!40000 ALTER TABLE `moto_license` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moto_transmission`
--

LOCK TABLES `moto_transmission` WRITE;
/*!40000 ALTER TABLE `moto_transmission` DISABLE KEYS */;
INSERT INTO `moto_transmission` VALUES (1,'Cadena','2019-01-09 12:26:41',NULL),(2,'Cardán','2019-01-09 12:26:41',NULL),(3,'Correa','2019-01-09 12:26:41',NULL);
/*!40000 ALTER TABLE `moto_transmission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `moto_type`
--

LOCK TABLES `moto_type` WRITE;
/*!40000 ALTER TABLE `moto_type` DISABLE KEYS */;
INSERT INTO `moto_type` VALUES (1,'Chopper','2019-01-09 12:22:52',NULL),(2,'Custom','2019-01-09 12:22:53',NULL),(3,'Enduro','2019-01-09 12:22:53',NULL),(4,'Gran Turismo','2019-01-09 12:22:53',NULL),(5,'Motocross','2019-01-09 12:22:53',NULL),(6,'Naked','2019-01-09 12:22:53',NULL),(7,'Racing','2019-01-09 12:22:53',NULL),(8,'Trail','2019-01-09 12:22:53',NULL),(9,'Maxi Trail','2019-01-09 12:22:53',NULL),(10,'Scooter','2019-01-09 12:25:51',NULL),(11,'Maxi Scooter','2019-01-09 12:25:51',NULL);
/*!40000 ALTER TABLE `moto_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `other_type`
--

LOCK TABLES `other_type` WRITE;
/*!40000 ALTER TABLE `other_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `other_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Desbrozadora','Ducati','C250','Desbrozadora potente',200,5,3,1,0,'',1,'2012-01-01','2019-04-26 10:05:51','2019-04-26 10:05:51'),(2,'Honda Transalp XL700V','Honda','Transalp XL700V','Honda Transalp XL700V',4000,2,2,1,0,NULL,0,'2010-01-01','2019-05-13 14:07:05',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Bicicleta','2019-01-09 12:19:41',NULL),(2,'Moto','2019-01-09 12:19:41',NULL),(3,'Equipación','2019-01-09 12:19:41',NULL),(4,'Accesorio','2019-01-09 12:19:41',NULL),(5,'Otro','2019-01-09 12:19:41',NULL);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_subcategory`
--

LOCK TABLES `product_subcategory` WRITE;
/*!40000 ALTER TABLE `product_subcategory` DISABLE KEYS */;
INSERT INTO `product_subcategory` VALUES (1,'Bicicletas','2019-01-09 12:20:13',NULL),(2,'Motos','2019-01-09 12:20:13',NULL),(3,'Otros','2019-01-09 12:20:13',NULL);
/*!40000 ALTER TABLE `product_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products_colors`
--

LOCK TABLES `products_colors` WRITE;
/*!40000 ALTER TABLE `products_colors` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES (2,1,1,'2019-05-29 14:20:08',NULL),(2,2,NULL,'2019-06-03 13:12:25',NULL),(2,3,NULL,'2019-06-03 13:11:54',NULL),(2,4,NULL,'2019-06-03 13:11:54',NULL),(2,5,NULL,'2019-06-03 13:11:54',NULL);
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2019-06-05 12:56:34
