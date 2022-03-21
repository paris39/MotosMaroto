-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: maroto
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

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
-- Table structure for table `ACCESORY`
--

DROP TABLE IF EXISTS `ACCESORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ACCESORY` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto del accesorio',
  `type` int(10) unsigned NOT NULL COMMENT 'Tipo de accesorio',
  `size` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Talla',
  `active` tinyint(1) DEFAULT 1 COMMENT 'Indica si el accesorio está activo en la web',
  `observation_active` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Observaciones de la activación/desactivación del accesorio',
  `logic_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indica si el accesorio ha sufrido un borrado lógico (0: No, 1: Sí)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del accesorio',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del accesorio',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del accesorio',
  PRIMARY KEY (`id`),
  KEY `accesory_accesory_type_fk` (`type`),
  KEY `accesory_user_fk` (`last_modify_user`),
  CONSTRAINT `accesory_accesory_type_fk` FOREIGN KEY (`type`) REFERENCES `ACCESORY_TYPE` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `accesory_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Accesorios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ACCESORY`
--

LOCK TABLES `ACCESORY` WRITE;
/*!40000 ALTER TABLE `ACCESORY` DISABLE KEYS */;
INSERT INTO `ACCESORY` VALUES (8,33,'130/80R19',1,NULL,0,'2019-12-20 12:18:39',NULL,2);
/*!40000 ALTER TABLE `ACCESORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ACCESORY_TYPE`
--

DROP TABLE IF EXISTS `ACCESORY_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ACCESORY_TYPE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de accesorio',
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del tipo de accesorio',
  `category` int(10) unsigned NOT NULL COMMENT 'Identificador de la categoría del tipo de accesorio',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del tipo de accesorio',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de accesorio',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del tipo de accesorio',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accesory_type_un` (`name`,`category`),
  KEY `accesory_type_product_category_fk` (`category`),
  KEY `accesory_type_fk` (`last_modify_user`),
  CONSTRAINT `accesory_type_product_category_fk` FOREIGN KEY (`category`) REFERENCES `PRODUCT_SUBCATEGORY` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `accesory_type_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tipo de accesorio';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ACCESORY_TYPE`
--

LOCK TABLES `ACCESORY_TYPE` WRITE;
/*!40000 ALTER TABLE `ACCESORY_TYPE` DISABLE KEYS */;
INSERT INTO `ACCESORY_TYPE` VALUES (1,'Pastillas de freno',1,'2019-01-09 12:53:38',NULL,2),(2,'Cuentakilómetros',1,'2019-01-09 12:59:33',NULL,2),(3,'Cadenas',1,'2019-01-09 12:59:33',NULL,2),(4,'Platos',1,'2019-01-09 12:59:33',NULL,2),(5,'Piñones',1,'2019-01-09 12:59:33',NULL,2),(6,'Cubiertas',1,'2019-01-09 12:59:33',NULL,2),(7,'Latiguillos',1,'2019-01-09 12:59:33',NULL,2),(8,'Discos de freno',1,'2019-01-09 12:59:33',NULL,2),(9,'Guardabarros',1,'2019-01-09 12:59:33',NULL,2),(10,'Limpiacadenas',1,'2019-01-09 12:59:33',NULL,2),(11,'Limpiabicicletas',1,'2019-01-09 12:59:33',NULL,2),(12,'Sillines',1,'2019-01-09 12:59:33',NULL,2),(13,'Inflador',1,'2019-01-09 12:59:33',NULL,2),(14,'Puños',1,'2019-01-09 12:59:33',NULL,2),(15,'Potencia manillar',1,'2019-01-09 12:59:33',NULL,2),(16,'Portabidones',1,'2019-01-09 12:59:33',NULL,2),(17,'Pedales',1,'2019-01-09 12:59:33',NULL,2),(18,'Calas pedales',1,'2019-01-09 12:59:33',NULL,2),(19,'Bolsas herramientas',1,'2019-01-09 12:59:33',NULL,2),(20,'Cintas manillar',1,'2019-01-09 12:59:33',NULL,2),(21,'Llantas',1,'2019-01-09 12:59:33',NULL,2),(22,'Luces LED',1,'2019-01-09 12:59:33',NULL,2),(23,'Kit antipinchazos',1,'2019-01-09 12:59:33',NULL,2),(24,'Tronchacadenas',1,'2019-01-09 12:59:33',NULL,2),(25,'Cinta tubular',1,'2019-01-09 12:59:33',NULL,2),(26,'Tubulares',1,'2019-01-09 12:59:33',NULL,2),(27,'Candados antirrobo',1,'2019-01-09 12:59:33',NULL,2),(28,'Retenes de horquilla',1,'2019-01-09 12:59:33',NULL,2),(29,'Rodillos',1,'2019-01-09 12:59:33',NULL,2),(31,'Filtros de aceite',2,'2019-01-09 13:19:41',NULL,2),(32,'Aceite',2,'2019-01-09 13:19:41',NULL,2),(33,'Neumáticos',2,'2019-12-20 12:17:19',NULL,2),(35,'Cadenas',2,'2019-01-09 13:19:41',NULL,2),(37,'Pastillas de freno',2,'2019-01-09 13:17:19',NULL,2),(38,'Antirrobos',2,'2019-01-09 13:17:19',NULL,2),(39,'Intermitentes',2,'2019-01-09 13:17:19',NULL,2),(40,'Manetas de freno',2,'2019-01-09 13:17:19',NULL,2),(41,'Manetas de embrague',2,'2019-01-09 13:17:19',NULL,2),(42,'Retrovisores',2,'2019-01-09 13:17:19',NULL,2),(43,'Soportes de matrícula',2,'2019-01-09 13:17:19',NULL,2),(44,'Palancas de cambio',2,'2019-01-09 13:17:19',NULL,2),(45,'Puños',2,'2019-01-09 13:17:19',NULL,2);
/*!40000 ALTER TABLE `ACCESORY_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BIKE`
--

DROP TABLE IF EXISTS `BIKE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BIKE` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto de la bicicleta',
  `type` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de bicicleta',
  `size` int(10) unsigned DEFAULT NULL COMMENT 'Talla',
  `gears` int(10) unsigned DEFAULT NULL COMMENT 'Velocidades / Marchas',
  `frame` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Cuadro',
  `fork` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Horquilla',
  `brakes` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Frenos',
  `wheels` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Llanta / rueda',
  `tyres` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Neumáticos',
  `seat` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Sillín',
  `handlebars` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Manillar',
  `shift` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Sistema de cambio',
  `derailleur` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Desviador del cambio',
  `twist_shifters` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Mandos del cambio',
  `speed_groupset` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Grupo',
  `weight` decimal(10,0) unsigned DEFAULT NULL COMMENT 'Peso de la bicicleta (kg)',
  `pedals` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Pedales',
  `cranks` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Bielas',
  `cassette` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Cassette',
  `active` tinyint(1) DEFAULT 1 COMMENT 'Indica si la bicicleta está activa en la web',
  `observation_active` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Observaciones sobre la activación/desactivación de la bicicleta',
  `logic_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indica si el producto ha sufrido un borrado lógico (0: No, 1: Sí)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la bicicleta',
  `last_modfy_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la bicicleta',
  PRIMARY KEY (`id`),
  KEY `bike_bike_size_fk` (`size`),
  KEY `bike_bike_type_fk` (`type`),
  KEY `bike_user_fk` (`last_modfy_user`),
  CONSTRAINT `bike_bike_size_fk` FOREIGN KEY (`size`) REFERENCES `BIKE_SIZE` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `bike_bike_type_fk` FOREIGN KEY (`type`) REFERENCES `BIKE_TYPE` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `bike_product_fk` FOREIGN KEY (`id`) REFERENCES `PRODUCT` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `bike_user_fk` FOREIGN KEY (`last_modfy_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Bicicletas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BIKE`
--

LOCK TABLES `BIKE` WRITE;
/*!40000 ALTER TABLE `BIKE` DISABLE KEYS */;
INSERT INTO `BIKE` VALUES (3,1,5,25,'Cuadro','Horquilla','Frenos','Rueda','Continental','Sillín','Manillar','Shinmanos','Desviador','Mando','Grupo',7,'Pedales','Bielas','Cassette',1,NULL,0,'2020-11-04 13:59:25','2020-11-04 13:59:25',2),(4,1,4,27,'Cuadro','Horquilla','Frenos','Rueda','Michelín','Sillín','Manillar','Shimano','Desviador','Mando','Grupo',7,'Pedales','Bielas','Cassette',1,NULL,0,'2020-11-25 13:54:51','2020-11-25 13:54:53',2),(5,9,5,24,'Cuadro','Horquilla','Frenos','Rueda','Continental','Sillín','Manillar','Shinmanos','Desviador','Mando','Grupo',7,'Pedales','Bielas','Cassette',1,NULL,0,'2020-11-25 14:09:32','2020-11-25 14:09:33',2);
/*!40000 ALTER TABLE `BIKE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BIKE_SIZE`
--

DROP TABLE IF EXISTS `BIKE_SIZE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BIKE_SIZE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la talla de bicicleta',
  `name` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre de la talla de la bicicleta',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la talla de bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la talla de bicicleta',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la talla de bicicleta',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bike_size_un` (`name`),
  KEY `bike_size_user_fk` (`last_modify_user`),
  CONSTRAINT `bike_size_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tallas de bicicletas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BIKE_SIZE`
--

LOCK TABLES `BIKE_SIZE` WRITE;
/*!40000 ALTER TABLE `BIKE_SIZE` DISABLE KEYS */;
INSERT INTO `BIKE_SIZE` VALUES (1,'XS','2019-01-09 12:33:17',NULL,1),(2,'S','2019-01-09 12:33:17',NULL,1),(3,'M','2019-01-09 12:33:17',NULL,1),(4,'L','2019-01-09 12:33:17',NULL,1),(5,'XL','2019-01-09 12:33:17',NULL,1),(6,'XXL','2019-01-09 12:33:17',NULL,1),(7,'Bebé','2019-01-09 12:33:17',NULL,1),(8,'Infantil','2019-01-09 12:34:17',NULL,1);
/*!40000 ALTER TABLE `BIKE_SIZE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BIKE_TYPE`
--

DROP TABLE IF EXISTS `BIKE_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BIKE_TYPE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de bicicleta',
  `name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del tipo de bicicleta',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del tipo de bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de bicicleta',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del tipo de bicicleta',
  PRIMARY KEY (`id`),
  KEY `bike_type_fk` (`last_modify_user`),
  CONSTRAINT `bike_type_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tipos de bicicleta';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BIKE_TYPE`
--

LOCK TABLES `BIKE_TYPE` WRITE;
/*!40000 ALTER TABLE `BIKE_TYPE` DISABLE KEYS */;
INSERT INTO `BIKE_TYPE` VALUES (1,'Carretera','2019-01-09 12:22:52',NULL,2),(2,'Eléctrica','2019-01-09 12:22:53',NULL,2),(3,'Fat','2019-01-09 12:22:53',NULL,2),(4,'Fixie','2019-01-09 12:22:53',NULL,2),(5,'Híbrida','2019-01-09 12:22:53',NULL,2),(6,'MBX','2019-01-09 12:22:53',NULL,2),(7,'Montaña','2019-01-09 12:22:53',NULL,2),(8,'Plegable','2019-01-09 12:22:53',NULL,2),(9,'Urbana','2019-01-09 12:22:53',NULL,2);
/*!40000 ALTER TABLE `BIKE_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COLOR`
--

DROP TABLE IF EXISTS `COLOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COLOR` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del color',
  `name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del color',
  `original_name` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Nombre original (inglés) del color',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del registro',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del color',
  PRIMARY KEY (`id`),
  UNIQUE KEY `color_un` (`name`),
  UNIQUE KEY `color_name_idx` (`name`) USING BTREE,
  KEY `color_user_fk` (`last_modify_user`),
  CONSTRAINT `color_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Colores de los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COLOR`
--

LOCK TABLES `COLOR` WRITE;
/*!40000 ALTER TABLE `COLOR` DISABLE KEYS */;
INSERT INTO `COLOR` VALUES (1,'Rojo','red','2019-01-09 12:45:47',NULL,2),(2,'Marrón','brown','2019-01-09 12:45:47',NULL,2),(3,'Rosa','hotpink','2019-01-09 12:45:47',NULL,2),(4,'Naranja','orange','2019-01-09 12:45:47',NULL,2),(5,'Amarillo','yellow','2019-01-09 12:45:47',NULL,2),(6,'Verde','green','2019-01-09 12:45:47',NULL,2),(7,'Cyan','cyan','2019-01-09 12:45:47',NULL,2),(8,'Azul','blue','2019-01-09 12:45:47',NULL,2),(9,'Morado','purple','2019-01-09 12:45:47',NULL,2),(10,'Magenta','magenta','2019-01-09 12:45:47',NULL,2),(11,'Blanco','white','2019-01-09 12:45:47',NULL,2),(12,'Gris','gray','2019-01-09 12:45:47',NULL,2),(13,'Negro','black','2019-01-09 12:45:47',NULL,2);
/*!40000 ALTER TABLE `COLOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EQUIPMENT`
--

DROP TABLE IF EXISTS `EQUIPMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EQUIPMENT` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto del equipamiento',
  `type` int(10) unsigned NOT NULL COMMENT 'Tipo de equipación',
  `size` int(10) unsigned NOT NULL COMMENT 'Talla de la equipación',
  `GENDER` int(10) unsigned NOT NULL COMMENT 'Género del producto',
  `active` tinyint(1) DEFAULT 1 COMMENT 'Indica si el equipamiento está activo en la web',
  `observation_active` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Obersavaciones sobre la activación/desactivación de la equipación',
  `logic_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indica si el producto ha sufrido un borrado lógico (0: No, 1: Sí)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del equipamiento',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del equipamiento',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del equipamiento',
  PRIMARY KEY (`id`),
  KEY `equipment_gender_fk` (`GENDER`),
  KEY `equipment_equipment_type_fk` (`type`),
  KEY `equipment_equipment_size_fk` (`size`),
  KEY `equipment_user_fk` (`last_modify_user`),
  CONSTRAINT `equipment_equipment_size_fk` FOREIGN KEY (`size`) REFERENCES `EQUIPMENT_SIZE` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_equipment_type_fk` FOREIGN KEY (`type`) REFERENCES `EQUIPMENT_TYPE` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_gender_fk` FOREIGN KEY (`GENDER`) REFERENCES `GENDER` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_product_fk` FOREIGN KEY (`id`) REFERENCES `PRODUCT` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Equipación';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EQUIPMENT`
--

LOCK TABLES `EQUIPMENT` WRITE;
/*!40000 ALTER TABLE `EQUIPMENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `EQUIPMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EQUIPMENT_SIZE`
--

DROP TABLE IF EXISTS `EQUIPMENT_SIZE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EQUIPMENT_SIZE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la talla de equipamiento',
  `name` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre de la talla de equipamiento',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la talla de equipamiento',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la talla de equipamiento',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la talla de equipamiento',
  PRIMARY KEY (`id`),
  UNIQUE KEY `equipment_size_un` (`name`),
  KEY `equipment_size_user_fk` (`last_modify_user`),
  CONSTRAINT `equipment_size_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tallas de equipamiento';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EQUIPMENT_SIZE`
--

LOCK TABLES `EQUIPMENT_SIZE` WRITE;
/*!40000 ALTER TABLE `EQUIPMENT_SIZE` DISABLE KEYS */;
INSERT INTO `EQUIPMENT_SIZE` VALUES (1,'XXS','2019-05-17 12:18:33',NULL,2),(2,'XS','2019-05-17 12:18:33',NULL,2),(3,'S','2019-05-17 12:18:33',NULL,2),(4,'M','2019-05-17 12:18:33',NULL,2),(5,'L','2019-05-17 12:18:33',NULL,2),(6,'XL','2019-05-17 12:18:33',NULL,2),(7,'XXL','2019-05-17 12:18:33',NULL,2),(8,'XXXL','2019-05-17 12:18:33',NULL,2),(9,'8','2019-05-17 12:18:33',NULL,2),(10,'10','2019-05-17 12:18:33',NULL,2),(11,'12','2019-05-17 12:18:33',NULL,2),(12,'14','2019-05-17 12:18:33',NULL,2),(13,'16','2019-05-17 12:18:33',NULL,2);
/*!40000 ALTER TABLE `EQUIPMENT_SIZE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EQUIPMENT_TYPE`
--

DROP TABLE IF EXISTS `EQUIPMENT_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EQUIPMENT_TYPE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de equipación',
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del tipo de equipación',
  `category` int(10) unsigned DEFAULT NULL COMMENT 'Categoría del tipo de equipación',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del tipo de equipación',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de equipación',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del tipo de equipación',
  PRIMARY KEY (`id`),
  UNIQUE KEY `equipment_type_un` (`name`,`category`),
  KEY `equipment_type_product_subcategory_fk` (`category`),
  KEY `equipment_type_user_fk` (`last_modify_user`),
  CONSTRAINT `equipment_type_product_subcategory_fk` FOREIGN KEY (`category`) REFERENCES `PRODUCT_SUBCATEGORY` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_type_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tipo de equipación';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EQUIPMENT_TYPE`
--

LOCK TABLES `EQUIPMENT_TYPE` WRITE;
/*!40000 ALTER TABLE `EQUIPMENT_TYPE` DISABLE KEYS */;
INSERT INTO `EQUIPMENT_TYPE` VALUES (1,'Calcetines',1,'2019-01-09 13:29:32',NULL,2),(2,'Camisetas',1,'2019-01-09 13:29:32',NULL,2),(3,'Cascos',1,'2019-01-09 13:29:32',NULL,2),(4,'Chalecos',1,'2019-01-09 13:29:32',NULL,2),(5,'Chaquetas',1,'2019-01-09 13:29:32',NULL,2),(6,'Cullotes',1,'2019-01-09 13:29:32',NULL,2),(7,'Gafas',1,'2019-01-09 13:29:32',NULL,2),(8,'Gorras',1,'2019-01-09 13:29:32',NULL,2),(9,'Guantes',1,'2019-01-09 13:29:32',NULL,2),(10,'Maillots',1,'2019-01-09 13:29:32',NULL,2),(11,'Mochilas',1,'2019-01-09 13:29:32',NULL,2),(12,'Pantalones',1,'2019-01-09 13:29:32',NULL,2),(13,'Protecciones',1,'2019-01-09 13:29:32',NULL,2),(14,'Ropa térmica',1,'2019-01-09 13:29:32',NULL,2),(15,'Zapatillas',1,'2019-01-09 13:29:32',NULL,2),(16,'Botas',2,'2019-01-09 13:32:49',NULL,2),(17,'Calcetines',2,'2019-01-09 13:32:49',NULL,2),(18,'Camisetas',2,'2019-01-09 13:32:49',NULL,2),(19,'Cascos',2,'2019-01-09 13:32:49',NULL,2),(20,'Chaquetas',2,'2019-01-09 13:32:49',NULL,2),(21,'Guantes',2,'2019-01-09 13:32:49',NULL,2),(22,'Monos',2,'2019-01-09 13:32:49',NULL,2),(23,'Pantalones',2,'2019-01-09 13:32:49',NULL,2),(24,'Protecciones',2,'2019-01-09 13:32:49',NULL,2),(25,'Ropa térmica',2,'2019-01-09 13:32:49',NULL,2),(26,'Zapatillas',2,'2019-01-09 13:32:49',NULL,2),(27,'Guantes',3,'2019-05-09 10:14:23',NULL,2);
/*!40000 ALTER TABLE `EQUIPMENT_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GENDER`
--

DROP TABLE IF EXISTS `GENDER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GENDER` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del género',
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del género',
  `active` tinyint(1) DEFAULT 1 COMMENT 'Indica si el género está activo en la web (1: activo, 0: desactivado)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del regitro',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del género',
  PRIMARY KEY (`id`),
  UNIQUE KEY `genders_un` (`name`),
  KEY `gender_user_fk` (`last_modify_user`),
  CONSTRAINT `gender_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Géneros de personas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GENDER`
--

LOCK TABLES `GENDER` WRITE;
/*!40000 ALTER TABLE `GENDER` DISABLE KEYS */;
INSERT INTO `GENDER` VALUES (1,'Masculino',1,'2019-01-03 14:24:24',NULL,2),(2,'Femenino',1,'2019-01-03 14:24:44',NULL,2),(3,'Unisex',1,'2019-01-03 14:25:20',NULL,2),(4,'Infantil',1,'2019-01-03 14:25:30',NULL,2),(5,'Infantil masculino',0,'2019-05-10 09:35:26',NULL,2),(6,'Infantil femenino',0,'2019-05-10 09:35:36',NULL,2);
/*!40000 ALTER TABLE `GENDER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IMAGE`
--

DROP TABLE IF EXISTS `IMAGE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `IMAGE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la imagen',
  `name` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Nombre de la imagen',
  `url` varchar(180) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'URL de la imagen',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la imagen',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la imagen',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la imagen',
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_un` (`url`),
  KEY `image_user_fk` (`last_modify_user`),
  CONSTRAINT `image_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Imágenes de productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IMAGE`
--

LOCK TABLES `IMAGE` WRITE;
/*!40000 ALTER TABLE `IMAGE` DISABLE KEYS */;
INSERT INTO `IMAGE` VALUES (1,'Honda Transalp XLV 700','honda-xlv700.jpg','2019-05-29 14:19:40',NULL,2),(2,'Honda Transalp XLV 700','honda-xl-700-v-transalp-lateral-derecho-1.jpg','2019-06-03 13:07:13',NULL,2),(3,'Honda Transalp XLV 700','honda-transalp-700.jpg','2019-06-03 13:07:13',NULL,2),(4,'Honda Transalp XLV 700','honda_xl-700-v.jpg','2019-06-03 13:07:13',NULL,2),(5,'Honda Transalp XLV 700','XL700V.jpg','2019-06-03 13:07:13',NULL,2),(6,'Honda Transalp XLV 700','honda-xlv-transalp.jpg','2019-06-05 14:02:53',NULL,2),(7,'Vitoria Nyxtralight Acqua','nyxtralight-acqua-sh-105fsa.jpg','2020-11-04 14:09:37',NULL,2);
/*!40000 ALTER TABLE `IMAGE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTO`
--

DROP TABLE IF EXISTS `MOTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTO` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto de la moto',
  `type` int(10) unsigned NOT NULL COMMENT 'Tipo de moto',
  `number_plate` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Matrícula de la moto',
  `power` float DEFAULT NULL COMMENT 'Potencia de la moto',
  `power_unit` varchar(2) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Unidad de potencia de la moto (cv, kW, hp...)',
  `cylinder_capacity` float DEFAULT NULL COMMENT 'Cilindrada del motor (cc3)',
  `cylinders` int(10) unsigned DEFAULT NULL COMMENT 'Número de cilindros',
  `gears` int(10) unsigned DEFAULT NULL COMMENT 'Velocidades / Marchas',
  `front_brake` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Freno delantero',
  `rear_brake` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Freno trasero',
  `kilometers` int(10) unsigned DEFAULT NULL COMMENT 'Kilómetros',
  `license` int(10) unsigned DEFAULT NULL COMMENT 'Carnet de conducir permitido para la moto',
  `places` int(10) unsigned DEFAULT NULL COMMENT 'Plazas homologadas',
  `fuel` int(10) unsigned DEFAULT NULL COMMENT 'Combustible de la moto',
  `contamination` int(10) unsigned DEFAULT NULL COMMENT 'Distintivo de contaminación',
  `transmission` int(10) unsigned DEFAULT NULL COMMENT 'Tipo de transmisión',
  `second_hand` tinyint(1) DEFAULT NULL COMMENT 'Producto de segunda mano (1: Sí, 0 ó Null: No)',
  `active` tinyint(1) DEFAULT 1 COMMENT 'Indica si la moto está activa en la web',
  `observation_active` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Observaciones sobre la activación/desactivación de la moto',
  `logic_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indica si el producto ha sufrido un borrado lógico (0: No, 1: Sí)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la moto',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la moto',
  UNIQUE KEY `moto_un` (`id`),
  KEY `moto_moto_contamination_fk` (`contamination`),
  KEY `moto_moto_fuel_fk` (`fuel`),
  KEY `moto_moto_license_fk` (`license`),
  KEY `moto_moto_transmission_fk` (`transmission`),
  KEY `moto_moto_type_fk` (`type`),
  KEY `moto_user_fk` (`last_modify_user`),
  CONSTRAINT `moto_moto_contamination_fk` FOREIGN KEY (`contamination`) REFERENCES `MOTO_CONTAMINATION` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_fuel_fk` FOREIGN KEY (`fuel`) REFERENCES `MOTO_FUEL` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_license_fk` FOREIGN KEY (`license`) REFERENCES `MOTO_LICENSE` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_transmission_fk` FOREIGN KEY (`transmission`) REFERENCES `MOTO_TRANSMISSION` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_type_fk` FOREIGN KEY (`type`) REFERENCES `MOTO_TYPE` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_product_fk` FOREIGN KEY (`id`) REFERENCES `PRODUCT` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Motos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTO`
--

LOCK TABLES `MOTO` WRITE;
/*!40000 ALTER TABLE `MOTO` DISABLE KEYS */;
INSERT INTO `MOTO` VALUES (2,8,'1324BCD',60,'cv',660,2,5,'Doble disco','Monodisco',120000,1,2,2,2,1,1,1,NULL,0,'2019-05-14 14:04:18',NULL,2);
/*!40000 ALTER TABLE `MOTO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTO_CONTAMINATION`
--

DROP TABLE IF EXISTS `MOTO_CONTAMINATION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTO_CONTAMINATION` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del distintivo de contaminación de la moto',
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del distintivo de contaminación de la moto',
  `COLOR` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Color del distintivo de contaminación de la moto',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del distintivo de contaminación de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del distintivo de contaminación de la moto',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la útlima modificación del distintivo de contaminación',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_contamination_un` (`name`),
  KEY `moto_contamination_user_fk` (`last_modify_user`),
  CONSTRAINT `moto_contamination_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Distintivos de contaminación de la moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTO_CONTAMINATION`
--

LOCK TABLES `MOTO_CONTAMINATION` WRITE;
/*!40000 ALTER TABLE `MOTO_CONTAMINATION` DISABLE KEYS */;
INSERT INTO `MOTO_CONTAMINATION` VALUES (1,'No corresponde',NULL,'2019-01-09 12:29:08',NULL,2),(2,'B','Amarillo','2019-01-09 12:29:08',NULL,2),(3,'C','Verde','2019-01-09 12:29:08',NULL,2),(4,'ECO','Verde y azul','2019-01-09 12:29:08',NULL,2),(5,'0','Azul','2019-01-09 12:29:08',NULL,2);
/*!40000 ALTER TABLE `MOTO_CONTAMINATION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTO_FUEL`
--

DROP TABLE IF EXISTS `MOTO_FUEL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTO_FUEL` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del combustible',
  `name` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del combustible de la moto',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del combustible de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del combustible de la moto',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del combustible de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_fuel_un` (`name`),
  KEY `moto_fuel_user_fk` (`last_modify_user`),
  CONSTRAINT `moto_fuel_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Combustibles de motos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTO_FUEL`
--

LOCK TABLES `MOTO_FUEL` WRITE;
/*!40000 ALTER TABLE `MOTO_FUEL` DISABLE KEYS */;
INSERT INTO `MOTO_FUEL` VALUES (1,'Eléctrico','2019-01-09 12:28:17',NULL,2),(2,'Gasolina 95','2019-01-09 12:28:17',NULL,2),(3,'Gasolina 98','2019-01-09 12:28:17',NULL,2);
/*!40000 ALTER TABLE `MOTO_FUEL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTO_LICENSE`
--

DROP TABLE IF EXISTS `MOTO_LICENSE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTO_LICENSE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del carnet de conducir',
  `name` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del carnet de conducir',
  `observations` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Observaciones sobre el carnet de conducir',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del carnet de conducir',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del carnet de conducir',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del carnet de conducir',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_license_un` (`name`),
  KEY `moto_license_user_fk` (`last_modify_user`),
  CONSTRAINT `moto_license_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Carnets de conducir de moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTO_LICENSE`
--

LOCK TABLES `MOTO_LICENSE` WRITE;
/*!40000 ALTER TABLE `MOTO_LICENSE` DISABLE KEYS */;
INSERT INTO `MOTO_LICENSE` VALUES (1,'AM',NULL,'2019-01-09 12:27:40',NULL,2),(2,'A1',NULL,'2019-01-09 12:27:40',NULL,2),(3,'A2',NULL,'2019-01-09 12:27:40',NULL,2),(4,'A',NULL,'2019-01-09 12:27:40',NULL,2),(5,'B','>3 años','2019-01-09 12:27:40',NULL,2);
/*!40000 ALTER TABLE `MOTO_LICENSE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTO_TRANSMISSION`
--

DROP TABLE IF EXISTS `MOTO_TRANSMISSION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTO_TRANSMISSION` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de transmisión de la moto',
  `name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del tipo de transmisión de la moto',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del tipo de transmisión de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de transmisión de la moto',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del tipo de transmisión de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_transmission_un` (`name`),
  KEY `moto_transmission_user_fk` (`last_modify_user`),
  CONSTRAINT `moto_transmission_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tipo de transmisión de la moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTO_TRANSMISSION`
--

LOCK TABLES `MOTO_TRANSMISSION` WRITE;
/*!40000 ALTER TABLE `MOTO_TRANSMISSION` DISABLE KEYS */;
INSERT INTO `MOTO_TRANSMISSION` VALUES (1,'Cadena','2019-01-09 12:26:41',NULL,2),(2,'Cardán','2019-01-09 12:26:41',NULL,2),(3,'Correa','2019-01-09 12:26:41',NULL,2);
/*!40000 ALTER TABLE `MOTO_TRANSMISSION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOTO_TYPE`
--

DROP TABLE IF EXISTS `MOTO_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MOTO_TYPE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de moto',
  `name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del tipo de moto',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del tipo de moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de moto',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del tipo de moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_type_name_idx` (`name`) USING BTREE,
  KEY `moto_type_user_fk` (`last_modify_user`),
  CONSTRAINT `moto_type_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tipos de moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOTO_TYPE`
--

LOCK TABLES `MOTO_TYPE` WRITE;
/*!40000 ALTER TABLE `MOTO_TYPE` DISABLE KEYS */;
INSERT INTO `MOTO_TYPE` VALUES (1,'Chopper','2019-01-09 12:22:52',NULL,2),(2,'Custom','2019-01-09 12:22:53',NULL,2),(3,'Enduro','2019-01-09 12:22:53',NULL,2),(4,'Gran Turismo','2019-01-09 12:22:53',NULL,2),(5,'Motocross','2019-01-09 12:22:53',NULL,2),(6,'Naked','2019-01-09 12:22:53',NULL,2),(7,'Racing','2019-01-09 12:22:53',NULL,2),(8,'Trail','2019-01-09 12:22:53',NULL,2),(9,'Maxi Trail','2019-01-09 12:22:53',NULL,2),(10,'Scooter','2019-01-09 12:25:51',NULL,2),(11,'Maxi Scooter','2019-01-09 12:25:51',NULL,2),(12,'Quad','2021-02-08 12:12:57',NULL,2);
/*!40000 ALTER TABLE `MOTO_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OTHER_TYPE`
--

DROP TABLE IF EXISTS `OTHER_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OTHER_TYPE` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de otros',
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre del tipo de otros',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del tipo de otros',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de equipación',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del tipo de equipación',
  PRIMARY KEY (`id`),
  UNIQUE KEY `other_type_un` (`name`),
  KEY `other_type_user_fk` (`last_modify_user`),
  CONSTRAINT `other_type_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tipo de otros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OTHER_TYPE`
--

LOCK TABLES `OTHER_TYPE` WRITE;
/*!40000 ALTER TABLE `OTHER_TYPE` DISABLE KEYS */;
/*!40000 ALTER TABLE `OTHER_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT`
--

DROP TABLE IF EXISTS `PRODUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del producto',
  `name` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre comercial del producto',
  `mark` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Marca del producto',
  `model` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Modelo del producto',
  `description` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Descripción detallada del producto',
  `price` decimal(10,2) unsigned NOT NULL COMMENT 'Precio del producto',
  `old_price` decimal(10,2) unsigned DEFAULT NULL COMMENT 'Precio antiguo del producto',
  `category` int(10) unsigned DEFAULT NULL COMMENT 'Categoría del producto',
  `subcategory` int(10) unsigned DEFAULT NULL COMMENT 'Subcategoría del producto',
  `stock` int(10) unsigned DEFAULT NULL COMMENT 'Existencias del producto',
  `rent` tinyint(1) DEFAULT 0 COMMENT 'Indica si el producto es de alquiler (1: Sí, 0: No)',
  `observations` text COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Observaciones (alquiler, venta...)',
  `active` tinyint(1) NOT NULL COMMENT 'Indica si el producto está disponible en la web (1: Activado, 0: Desactivado)',
  `product_date` date DEFAULT NULL COMMENT 'Fecha del producto',
  `logic_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indica si el producto ha sufrido un borrado lógico (0: No, 1: Sí)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del producto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del producto',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del producto',
  PRIMARY KEY (`id`),
  KEY `product_subcategory_fk` (`subcategory`),
  KEY `product_category_fk` (`category`),
  KEY `product_user_fk` (`last_modify_user`),
  CONSTRAINT `product_category_fk` FOREIGN KEY (`category`) REFERENCES `PRODUCT_CATEGORY` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `product_subcategory_fk` FOREIGN KEY (`subcategory`) REFERENCES `PRODUCT_SUBCATEGORY` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `product_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT`
--

LOCK TABLES `PRODUCT` WRITE;
/*!40000 ALTER TABLE `PRODUCT` DISABLE KEYS */;
INSERT INTO `PRODUCT` VALUES (1,'Desbrozadora','Ducati','C250','Desbrozadora potente',200.00,NULL,5,3,1,0,'',1,'2012-01-01',0,'2019-04-26 10:05:51','2019-04-26 10:05:51',2),(2,'Honda Transalp XL700V','Honda','Transalp XL700V','Honda Transalp XL700V',4000.00,4200.00,2,2,1,0,'Tragamillas',0,'2010-01-01',0,'2019-05-13 14:07:05',NULL,2),(3,'Nyxtralight Acqua SH 105 R7/FSA','Vitoria','Nyxtralight Acqua SH 105 R7/FSA','Vitoria Nyxtralight Acqua SH 105 R7/FSA',650.00,NULL,1,1,2,0,'Resistencia',1,'2018-01-01',0,'2020-11-04 13:46:11','2020-11-04 13:46:16',2),(4,'Nyxtralight Acqua SH 105 R7/FSA','Vitoria','Nyxtralight Acqua SH 105 R7/FSA','Vitoria Nyxtralight Acqua SH 105 R7/FSA',655.00,NULL,1,1,1,0,'Resistencia y ligereza',1,'2019-01-01',0,'2020-11-25 13:52:30',NULL,2),(5,'Nyxtralight Acqua SH 105 R7/FSA','Vitoria','Nyxtralight Acqua SH 105 R7/FSA','Vitoria Nyxtralight Acqua SH 105 R7/FSA',660.99,NULL,1,1,3,0,'Ligera y espectacular',1,'2020-11-25',0,'2020-11-25 14:07:21','2020-11-25 14:07:22',2),(8,'Michelín Anakee III 130/80R19','Michelín','Anakee III','Nuevo Michelín Anakee III 130/80R19',120.00,NULL,4,2,1,0,'',1,'2017-01-01',0,'2019-12-19 11:39:07','2019-12-19 11:39:07',1);
/*!40000 ALTER TABLE `PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT_CATEGORY`
--

DROP TABLE IF EXISTS `PRODUCT_CATEGORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT_CATEGORY` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la subcategoría del producto',
  `name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre de la subcategoría del producto',
  `original_name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre en inglés de la subcategoría del producto',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la subcategoría',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la subcategoría',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la subcategoría',
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategory_un` (`name`),
  UNIQUE KEY `product_category_original_name_un` (`original_name`),
  KEY `product_category_user_fk` (`last_modify_user`),
  CONSTRAINT `product_category_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Categoría de los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT_CATEGORY`
--

LOCK TABLES `PRODUCT_CATEGORY` WRITE;
/*!40000 ALTER TABLE `PRODUCT_CATEGORY` DISABLE KEYS */;
INSERT INTO `PRODUCT_CATEGORY` VALUES (1,'Bicicleta','Bike','2019-01-09 12:19:41',NULL,2),(2,'Moto','Moto','2019-01-09 12:19:41',NULL,2),(3,'Equipación','Equipment','2019-01-09 12:19:41',NULL,2),(4,'Accesorio','Accesory','2019-01-09 12:19:41',NULL,2),(5,'Otro','Other','2019-01-09 12:19:41',NULL,2);
/*!40000 ALTER TABLE `PRODUCT_CATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT_SUBCATEGORY`
--

DROP TABLE IF EXISTS `PRODUCT_SUBCATEGORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT_SUBCATEGORY` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la categoría del producto',
  `name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre de la categoría del producto',
  `original_name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Nombre original de la categoría del producto',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación de la categoría',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la categoría',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación de la categoría',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_un` (`name`),
  UNIQUE KEY `product_subcategory_original_name_un` (`original_name`),
  KEY `product_subcategory_user_fk` (`last_modify_user`),
  CONSTRAINT `product_subcategory_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Subcategoría de los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT_SUBCATEGORY`
--

LOCK TABLES `PRODUCT_SUBCATEGORY` WRITE;
/*!40000 ALTER TABLE `PRODUCT_SUBCATEGORY` DISABLE KEYS */;
INSERT INTO `PRODUCT_SUBCATEGORY` VALUES (1,'Bicicletas','Bikes','2019-01-09 12:20:13',NULL,2),(2,'Motos','Motos','2019-01-09 12:20:13',NULL,2),(3,'Otros','Others','2019-01-09 12:20:13',NULL,2);
/*!40000 ALTER TABLE `PRODUCT_SUBCATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCTS_COLORS`
--

DROP TABLE IF EXISTS `PRODUCTS_COLORS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCTS_COLORS` (
  `PRODUCT` int(10) unsigned NOT NULL COMMENT 'Identificador del producto',
  `COLOR` int(10) unsigned NOT NULL COMMENT 'Identificador del color',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del registro',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del registro',
  PRIMARY KEY (`PRODUCT`,`COLOR`),
  KEY `product_color_color_fk` (`COLOR`),
  KEY `products_colors_user_fk` (`last_modify_user`),
  CONSTRAINT `product_color_color_fk` FOREIGN KEY (`COLOR`) REFERENCES `COLOR` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_color_product_fk` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_colors_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Producto - Color';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTS_COLORS`
--

LOCK TABLES `PRODUCTS_COLORS` WRITE;
/*!40000 ALTER TABLE `PRODUCTS_COLORS` DISABLE KEYS */;
INSERT INTO `PRODUCTS_COLORS` VALUES (2,8,'2019-06-06 12:52:15',NULL,2),(2,11,'2019-06-06 12:52:15',NULL,2),(2,12,'2019-06-06 12:52:15',NULL,2),(3,1,'2020-11-04 14:04:18',NULL,2),(4,2,'2020-11-25 13:56:42',NULL,2),(5,3,'2020-11-25 14:09:56',NULL,2);
/*!40000 ALTER TABLE `PRODUCTS_COLORS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCTS_IMAGES`
--

DROP TABLE IF EXISTS `PRODUCTS_IMAGES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCTS_IMAGES` (
  `PRODUCT` int(10) unsigned NOT NULL COMMENT 'Identificador del producto',
  `IMAGE` int(10) unsigned NOT NULL COMMENT 'Identificador de la imagen',
  `main` tinyint(1) DEFAULT NULL COMMENT 'Indica si la imagen es la principal del producto (1: Sí, 0 ó Null: No)',
  `active` tinyint(1) DEFAULT NULL COMMENT 'Indica si la imagen del producto está activa (1: Sí, 0 ó Null: No)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del registro',
  `last_modify_user` int(10) unsigned NOT NULL COMMENT 'Usuario de la última modificación del registro',
  PRIMARY KEY (`PRODUCT`,`IMAGE`),
  UNIQUE KEY `product_image_un` (`PRODUCT`,`main`),
  KEY `product_image_image_fk` (`IMAGE`),
  KEY `products_images_user_fk` (`last_modify_user`),
  CONSTRAINT `product_image_image_fk` FOREIGN KEY (`IMAGE`) REFERENCES `IMAGE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_image_product_fk` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_images_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Producto - Imagen';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTS_IMAGES`
--

LOCK TABLES `PRODUCTS_IMAGES` WRITE;
/*!40000 ALTER TABLE `PRODUCTS_IMAGES` DISABLE KEYS */;
INSERT INTO `PRODUCTS_IMAGES` VALUES (2,1,1,1,'2019-05-29 14:20:08',NULL,2),(2,2,NULL,1,'2019-06-03 13:12:25',NULL,2),(2,3,NULL,1,'2019-06-03 13:11:54',NULL,2),(2,4,NULL,1,'2019-06-03 13:11:54',NULL,2),(2,5,NULL,1,'2019-06-03 13:11:54',NULL,2),(2,6,NULL,1,'2019-06-05 14:03:06',NULL,2),(3,7,1,1,'2020-11-04 14:16:44',NULL,2),(4,7,1,1,'2020-11-25 13:57:33',NULL,2),(5,7,1,1,'2020-11-25 14:11:13',NULL,2);
/*!40000 ALTER TABLE `PRODUCTS_IMAGES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador único',
  `nick` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Alias del usuario',
  `name` varchar(80) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Nombre del usuario',
  `surname` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Apellidos del usuario',
  `password` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Contraseña de acceso del usuario',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Indica si el usuario está activo en la web (1: activo, 0: desactivado)',
  `create_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de alta en el Sistema',
  `last_modified_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del usuario',
  `last_modify_user` int(10) unsigned DEFAULT NULL COMMENT 'Usuario de la última modificaicón del registro',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_un` (`nick`),
  UNIQUE KEY `users_nick_idx` (`nick`) USING BTREE,
  KEY `user_user_fk` (`last_modify_user`),
  CONSTRAINT `user_user_fk` FOREIGN KEY (`last_modify_user`) REFERENCES `USER` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Usuarios del Sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (1,'jesus','Jesús','Maroto','12gslHdVPBiFo',1,'2019-08-19 10:13:53',NULL,2),(2,'webmaster','Javier','París','12oSBY7t7cZI2',1,'2019-08-19 12:05:00',NULL,2);
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'maroto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-11 10:57:11
