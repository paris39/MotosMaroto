-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: maroto
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `accesory`
--

DROP TABLE IF EXISTS `accesory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesory` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto del accesorio',
  `type` int(10) unsigned NOT NULL COMMENT 'Tipo de accesorio',
  `size` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Talla',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del accesorio',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del accesorio',
  PRIMARY KEY (`id`),
  KEY `accesory_accesory_type_fk` (`type`),
  CONSTRAINT `accesory_accesory_type_fk` FOREIGN KEY (`type`) REFERENCES `accesory_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Accesorios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesory`
--

LOCK TABLES `accesory` WRITE;
/*!40000 ALTER TABLE `accesory` DISABLE KEYS */;
/*!40000 ALTER TABLE `accesory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accesory_type`
--

DROP TABLE IF EXISTS `accesory_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesory_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de accesorio',
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de accesorio',
  `category` int(10) unsigned NOT NULL COMMENT 'Identificador de la categoría del tipo de accesorio',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de accesorio',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de accesorio',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accesory_type_un` (`name`,`category`),
  KEY `accesory_type_product_category_fk` (`category`),
  CONSTRAINT `accesory_type_product_category_fk` FOREIGN KEY (`category`) REFERENCES `product_category` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipo de accesorio';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesory_type`
--

LOCK TABLES `accesory_type` WRITE;
/*!40000 ALTER TABLE `accesory_type` DISABLE KEYS */;
INSERT INTO `accesory_type` VALUES (1,'Pastillas de freno',1,'2019-01-09 12:53:38',NULL),(2,'Cuentakilómetros',1,'2019-01-09 12:59:33',NULL),(3,'Cadenas',1,'2019-01-09 12:59:33',NULL),(4,'Platos',1,'2019-01-09 12:59:33',NULL),(5,'Piñones',1,'2019-01-09 12:59:33',NULL),(6,'Cubiertas',1,'2019-01-09 12:59:33',NULL),(7,'Latiguillos',1,'2019-01-09 12:59:33',NULL),(8,'Discos de freno',1,'2019-01-09 12:59:33',NULL),(9,'Guardabarros',1,'2019-01-09 12:59:33',NULL),(10,'Limpiacadenas',1,'2019-01-09 12:59:33',NULL),(11,'Limpiabicicletas',1,'2019-01-09 12:59:33',NULL),(12,'Sillines',1,'2019-01-09 12:59:33',NULL),(13,'Inflador',1,'2019-01-09 12:59:33',NULL),(14,'Puños',1,'2019-01-09 12:59:33',NULL),(15,'Potencia manillar',1,'2019-01-09 12:59:33',NULL),(16,'Portabidones',1,'2019-01-09 12:59:33',NULL),(17,'Pedales',1,'2019-01-09 12:59:33',NULL),(18,'Calas pedales',1,'2019-01-09 12:59:33',NULL),(19,'Bolsas herramientas',1,'2019-01-09 12:59:33',NULL),(20,'Cintas manillar',1,'2019-01-09 12:59:33',NULL),(21,'Llantas',1,'2019-01-09 12:59:33',NULL),(22,'Luces LED',1,'2019-01-09 12:59:33',NULL),(23,'Kit antipinchazos',1,'2019-01-09 12:59:33',NULL),(24,'Tronchacadenas',1,'2019-01-09 12:59:33',NULL),(25,'Cinta tubular',1,'2019-01-09 12:59:33',NULL),(26,'Tubulares',1,'2019-01-09 12:59:33',NULL),(27,'Candados antirrobo',1,'2019-01-09 12:59:33',NULL),(28,'Retenes de horquilla',1,'2019-01-09 12:59:33',NULL),(29,'Rodillos',1,'2019-01-09 12:59:33',NULL),(31,'Filtros de aceite',2,'2019-01-09 13:19:41',NULL),(32,'Aceite',2,'2019-01-09 13:19:41',NULL),(35,'Cadena',2,'2019-01-09 13:19:41',NULL),(37,'Pastillas de freno',2,'2019-01-09 13:17:19',NULL),(38,'Antirrobos',2,'2019-01-09 13:17:19',NULL),(39,'Intermitentes',2,'2019-01-09 13:17:19',NULL),(40,'Manetas de freno',2,'2019-01-09 13:17:19',NULL),(41,'Manetas de embrague',2,'2019-01-09 13:17:19',NULL),(42,'Retrovisores',2,'2019-01-09 13:17:19',NULL),(43,'Soportes de matrícula',2,'2019-01-09 13:17:19',NULL),(44,'Palancas de cambio',2,'2019-01-09 13:17:19',NULL),(45,'Puños',2,'2019-01-09 13:17:19',NULL);
/*!40000 ALTER TABLE `accesory_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bike`
--

DROP TABLE IF EXISTS `bike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bike` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto de la bicicleta',
  `type` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de bicicleta',
  `size` int(10) unsigned DEFAULT NULL COMMENT 'Talla',
  `gears` int(10) unsigned DEFAULT NULL COMMENT 'Velocidades / Marchas',
  `frame` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Cuadro',
  `fork` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Horquilla',
  `brakes` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Frenos',
  `wheels` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Llanta / rueda',
  `tyres` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Neumáticos',
  `seat` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Sillín',
  `handlebars` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Manillar',
  `shift` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Sistema de cambio',
  `derailleur` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Desviador del cambio',
  `twist_shifters` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Mandos del cambio',
  `speed_groupset` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Grupo',
  `weight` decimal(10,0) unsigned DEFAULT NULL COMMENT 'Peso de la bicicleta (kg)',
  `pedals` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Pedales',
  `cranks` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Bielas',
  `cassette` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Cassette',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la bicicleta',
  PRIMARY KEY (`id`),
  KEY `bike_bike_size_fk` (`size`),
  KEY `bike_bike_type_fk` (`type`),
  CONSTRAINT `bike_bike_size_fk` FOREIGN KEY (`size`) REFERENCES `bike_size` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `bike_bike_type_fk` FOREIGN KEY (`type`) REFERENCES `bike_type` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `bike_product_fk` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Bicicletas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bike`
--

LOCK TABLES `bike` WRITE;
/*!40000 ALTER TABLE `bike` DISABLE KEYS */;
/*!40000 ALTER TABLE `bike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bike_size`
--

DROP TABLE IF EXISTS `bike_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bike_size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la talla de bicicleta',
  `name` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la talla de la bicicleta',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la talla de bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la talla de bicicleta',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bike_size_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tallas de bicicletas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bike_size`
--

LOCK TABLES `bike_size` WRITE;
/*!40000 ALTER TABLE `bike_size` DISABLE KEYS */;
INSERT INTO `bike_size` VALUES (1,'XS','2019-01-09 12:33:17',NULL),(2,'S','2019-01-09 12:33:17',NULL),(3,'M','2019-01-09 12:33:17',NULL),(4,'L','2019-01-09 12:33:17',NULL),(5,'XL','2019-01-09 12:33:17',NULL),(6,'XXL','2019-01-09 12:33:17',NULL),(7,'Bebé','2019-01-09 12:33:17',NULL),(8,'Infantil','2019-01-09 12:34:17',NULL);
/*!40000 ALTER TABLE `bike_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bike_type`
--

DROP TABLE IF EXISTS `bike_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bike_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de bicicleta',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de bicicleta',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de bicicleta',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de bicicleta';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bike_type`
--

LOCK TABLES `bike_type` WRITE;
/*!40000 ALTER TABLE `bike_type` DISABLE KEYS */;
INSERT INTO `bike_type` VALUES (1,'Carretera','2019-01-09 12:22:52',NULL),(2,'Eléctrica','2019-01-09 12:22:53',NULL),(3,'Fat','2019-01-09 12:22:53',NULL),(4,'Fixie','2019-01-09 12:22:53',NULL),(5,'Híbrida','2019-01-09 12:22:53',NULL),(6,'MBX','2019-01-09 12:22:53',NULL),(7,'Montaña','2019-01-09 12:22:53',NULL),(8,'Plegable','2019-01-09 12:22:53',NULL),(9,'Urbana','2019-01-09 12:22:53',NULL);
/*!40000 ALTER TABLE `bike_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del color',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del color',
  `original_name` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre original (inglés) del color',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del registro',
  PRIMARY KEY (`id`),
  UNIQUE KEY `color_un` (`name`),
  UNIQUE KEY `color_name_idx` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Colores de los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Rojo','red','2019-01-09 12:45:47',NULL),(2,'Marrón','brown','2019-01-09 12:45:47',NULL),(3,'Rosa','hotpink','2019-01-09 12:45:47',NULL),(4,'Naranja','orange','2019-01-09 12:45:47',NULL),(5,'Amarillo','yellow','2019-01-09 12:45:47',NULL),(6,'Verde','green','2019-01-09 12:45:47',NULL),(7,'Cyan','cyan','2019-01-09 12:45:47',NULL),(8,'Azul','blue','2019-01-09 12:45:47',NULL),(9,'Morado','purple','2019-01-09 12:45:47',NULL),(10,'Magenta','magenta','2019-01-09 12:45:47',NULL),(11,'Blanco','white','2019-01-09 12:45:47',NULL),(12,'Gris','gray','2019-01-09 12:45:47',NULL),(13,'Negro','black','2019-01-09 12:45:47',NULL);
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto del equipamiento',
  `type` int(10) unsigned NOT NULL COMMENT 'Tipo de equipación',
  `size` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Talla de la equipación',
  `gender` int(10) unsigned NOT NULL COMMENT 'Género del producto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del equipamiento',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del equipamiento',
  PRIMARY KEY (`id`),
  KEY `equipment_gender_fk` (`gender`),
  KEY `equipment_equipment_type_fk` (`type`),
  CONSTRAINT `equipment_equipment_type_fk` FOREIGN KEY (`type`) REFERENCES `equipment_type` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_gender_fk` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipment_product_fk` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Equipación';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_type`
--

DROP TABLE IF EXISTS `equipment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de equipación',
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de equipación',
  `category` int(10) unsigned NOT NULL COMMENT 'Categoría del tipo de equipación',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de equipación',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de equipación',
  PRIMARY KEY (`id`),
  UNIQUE KEY `equipment_type_un` (`name`,`category`),
  KEY `equipment_type_product_category_fk` (`category`),
  CONSTRAINT `equipment_type_product_category_fk` FOREIGN KEY (`category`) REFERENCES `product_category` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipo de equipación';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_type`
--

LOCK TABLES `equipment_type` WRITE;
/*!40000 ALTER TABLE `equipment_type` DISABLE KEYS */;
INSERT INTO `equipment_type` VALUES (1,'Calcetines',1,'2019-01-09 13:29:32',NULL),(2,'Camisetas',1,'2019-01-09 13:29:32',NULL),(3,'Cascos',1,'2019-01-09 13:29:32',NULL),(4,'Chalecos',1,'2019-01-09 13:29:32',NULL),(5,'Chaquetas',1,'2019-01-09 13:29:32',NULL),(6,'Cullotes',1,'2019-01-09 13:29:32',NULL),(7,'Gafas',1,'2019-01-09 13:29:32',NULL),(8,'Gorras',1,'2019-01-09 13:29:32',NULL),(9,'Guantes',1,'2019-01-09 13:29:32',NULL),(10,'Maillots',1,'2019-01-09 13:29:32',NULL),(11,'Mochilas',1,'2019-01-09 13:29:32',NULL),(12,'Pantalones',1,'2019-01-09 13:29:32',NULL),(13,'Protecciones',1,'2019-01-09 13:29:32',NULL),(14,'Ropa térmica',1,'2019-01-09 13:29:32',NULL),(15,'Zapatillas',1,'2019-01-09 13:29:32',NULL),(16,'Botas',2,'2019-01-09 13:32:49',NULL),(17,'Calcetines',2,'2019-01-09 13:32:49',NULL),(18,'Camisetas',2,'2019-01-09 13:32:49',NULL),(19,'Cascos',2,'2019-01-09 13:32:49',NULL),(20,'Chaquetas',2,'2019-01-09 13:32:49',NULL),(21,'Guantes',2,'2019-01-09 13:32:49',NULL),(22,'Monos',2,'2019-01-09 13:32:49',NULL),(23,'Pantalones',2,'2019-01-09 13:32:49',NULL),(24,'Protecciones',2,'2019-01-09 13:32:49',NULL),(25,'Ropa térmica',2,'2019-01-09 13:32:49',NULL),(26,'Zapatillas',2,'2019-01-09 13:32:49',NULL);
/*!40000 ALTER TABLE `equipment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del género',
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del género',
  `active` tinyint(1) DEFAULT '1' COMMENT 'Indica si el género está activo en la web (1: activo, 0: desactivado)',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del regitro',
  PRIMARY KEY (`id`),
  UNIQUE KEY `genders_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Géneros de personas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Masculino',1,'2019-01-03 14:24:24',NULL),(2,'Femenino',1,'2019-01-03 14:24:44',NULL),(3,'Unisex',1,'2019-01-03 14:25:20',NULL),(4,'Infantil',1,'2019-01-03 14:25:30',NULL);
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la imagen',
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre de la imagen',
  `url` varchar(180) COLLATE utf8_spanish_ci NOT NULL COMMENT 'URL de la imagen',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la imagen',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la imagen',
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_un` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Imágenes de productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto`
--

DROP TABLE IF EXISTS `moto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de producto de la moto',
  `type` int(10) unsigned NOT NULL COMMENT 'Tipo de moto',
  `number_plate` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Matrícula de la moto',
  `power` float DEFAULT NULL COMMENT 'Potencia de la moto',
  `power_unit` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Unidad de potencia de la moto (cv, kW, hp...)',
  `cylinder_capacity` float DEFAULT NULL COMMENT 'Cilindrada del motor (cc3)',
  `cylinders` int(10) unsigned DEFAULT NULL COMMENT 'Número de cilindros',
  `gears` int(10) unsigned DEFAULT NULL COMMENT 'Velocidades / Marchas',
  `front_brake` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Freno delantero',
  `rear_break` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Freno trasero',
  `kilometers` int(10) unsigned DEFAULT NULL COMMENT 'Kilómetros',
  `license` int(10) unsigned DEFAULT NULL COMMENT 'Carnet de conducir permitido para la moto',
  `places` int(10) unsigned DEFAULT NULL COMMENT 'Plazas homologadas',
  `fuel` int(10) unsigned DEFAULT NULL COMMENT 'Combustible de la moto',
  `contamination` int(10) unsigned DEFAULT NULL COMMENT 'Distintivo de contaminación',
  `transmission` int(10) unsigned DEFAULT NULL COMMENT 'Tipo de transmisión',
  `second_hand` tinyint(1) DEFAULT NULL COMMENT 'Producto de segunda mano (1: Sí, 0 ó Null: No)',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la moto',
  UNIQUE KEY `moto_un` (`id`),
  KEY `moto_moto_contamination_fk` (`contamination`),
  KEY `moto_moto_fuel_fk` (`fuel`),
  KEY `moto_moto_license_fk` (`license`),
  KEY `moto_moto_transmission_fk` (`transmission`),
  KEY `moto_moto_type_fk` (`type`),
  CONSTRAINT `moto_moto_contamination_fk` FOREIGN KEY (`contamination`) REFERENCES `moto_contamination` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_fuel_fk` FOREIGN KEY (`fuel`) REFERENCES `moto_fuel` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_license_fk` FOREIGN KEY (`license`) REFERENCES `moto_license` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_transmission_fk` FOREIGN KEY (`transmission`) REFERENCES `moto_transmission` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_moto_type_fk` FOREIGN KEY (`type`) REFERENCES `moto_type` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `moto_product_fk` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Motos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto`
--

LOCK TABLES `moto` WRITE;
/*!40000 ALTER TABLE `moto` DISABLE KEYS */;
/*!40000 ALTER TABLE `moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto_contamination`
--

DROP TABLE IF EXISTS `moto_contamination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto_contamination` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del distintivo de contaminación de la moto',
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del distintivo de contaminación de la moto',
  `color` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Color del distintivo de contaminación de la moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del distintivo de contaminación de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del distintivo de contaminación de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_contamination_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Distintivos de contaminación de la moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto_contamination`
--

LOCK TABLES `moto_contamination` WRITE;
/*!40000 ALTER TABLE `moto_contamination` DISABLE KEYS */;
INSERT INTO `moto_contamination` VALUES (1,'No corresponde',NULL,'2019-01-09 12:29:08',NULL),(2,'B','Amarillo','2019-01-09 12:29:08',NULL),(3,'C','Verde','2019-01-09 12:29:08',NULL),(4,'ECO','Verde y azul','2019-01-09 12:29:08',NULL),(5,'0','Azul','2019-01-09 12:29:08',NULL);
/*!40000 ALTER TABLE `moto_contamination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto_fuel`
--

DROP TABLE IF EXISTS `moto_fuel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto_fuel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del combustible',
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del combustible de la moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del combustible de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del combustible de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_fuel_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Combustibles de motos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto_fuel`
--

LOCK TABLES `moto_fuel` WRITE;
/*!40000 ALTER TABLE `moto_fuel` DISABLE KEYS */;
INSERT INTO `moto_fuel` VALUES (1,'Eléctrico','2019-01-09 12:28:17',NULL),(2,'Gasolina 95','2019-01-09 12:28:17',NULL),(3,'Gasolina 98','2019-01-09 12:28:17',NULL);
/*!40000 ALTER TABLE `moto_fuel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto_license`
--

DROP TABLE IF EXISTS `moto_license`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto_license` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del carnet de conducir',
  `name` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del carnet de conducir',
  `observations` text COLLATE utf8_spanish_ci COMMENT 'Observaciones sobre el carnet de conducir',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del carnet de conducir',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del carnet de conducir',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_license_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Carnets de conducir de moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto_license`
--

LOCK TABLES `moto_license` WRITE;
/*!40000 ALTER TABLE `moto_license` DISABLE KEYS */;
INSERT INTO `moto_license` VALUES (1,'AM',NULL,'2019-01-09 12:27:40',NULL),(2,'A1',NULL,'2019-01-09 12:27:40',NULL),(3,'A2',NULL,'2019-01-09 12:27:40',NULL),(4,'A',NULL,'2019-01-09 12:27:40',NULL),(5,'B','>3 años','2019-01-09 12:27:40',NULL);
/*!40000 ALTER TABLE `moto_license` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto_transmission`
--

DROP TABLE IF EXISTS `moto_transmission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto_transmission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de transmisión de la moto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de transmisión de la moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de transmisión de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de transmisión de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_transmission_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipo de transmisión de la moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto_transmission`
--

LOCK TABLES `moto_transmission` WRITE;
/*!40000 ALTER TABLE `moto_transmission` DISABLE KEYS */;
INSERT INTO `moto_transmission` VALUES (1,'Cadena','2019-01-09 12:26:41',NULL),(2,'Cardán','2019-01-09 12:26:41',NULL),(3,'Correa','2019-01-09 12:26:41',NULL);
/*!40000 ALTER TABLE `moto_transmission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto_type`
--

DROP TABLE IF EXISTS `moto_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de moto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_type_name_idx` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de moto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto_type`
--

LOCK TABLES `moto_type` WRITE;
/*!40000 ALTER TABLE `moto_type` DISABLE KEYS */;
INSERT INTO `moto_type` VALUES (1,'Chopper','2019-01-09 12:22:52',NULL),(2,'Custom','2019-01-09 12:22:53',NULL),(3,'Enduro','2019-01-09 12:22:53',NULL),(4,'Gran Turismo','2019-01-09 12:22:53',NULL),(5,'Motocross','2019-01-09 12:22:53',NULL),(6,'Naked','2019-01-09 12:22:53',NULL),(7,'Racing','2019-01-09 12:22:53',NULL),(8,'Trail','2019-01-09 12:22:53',NULL),(9,'Maxi Trail','2019-01-09 12:22:53',NULL),(10,'Scooter','2019-01-09 12:25:51',NULL),(11,'Maxi Scooter','2019-01-09 12:25:51',NULL);
/*!40000 ALTER TABLE `moto_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del producto',
  `name` varchar(120) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre comercial del producto',
  `mark` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Marca del producto',
  `model` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Modelo del producto',
  `description` text COLLATE utf8_spanish_ci COMMENT 'Descripción detallada del producto',
  `price` decimal(10,0) unsigned NOT NULL COMMENT 'Precio del producto',
  `category` int(10) unsigned DEFAULT NULL COMMENT 'Categoría del producto',
  `subcategory` int(10) unsigned DEFAULT NULL COMMENT 'Subcategoría del producto',
  `stock` int(10) unsigned DEFAULT NULL COMMENT 'Existencias del producto',
  `rent` tinyint(1) DEFAULT '0' COMMENT 'Indica si el producto es de alquiler (1: Sí, 0: No)',
  `observations` text COLLATE utf8_spanish_ci COMMENT 'Observaciones (alquiler, venta...)',
  `active` tinyint(1) DEFAULT NULL COMMENT 'Indica si el producto está disponible en la web (1: Activado, 0: Desactivado)',
  `product_date` datetime DEFAULT NULL COMMENT 'Fecha del producto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del producto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de modificación del producto',
  PRIMARY KEY (`id`),
  KEY `product_category_fk` (`category`),
  KEY `product_subcategory_fk` (`subcategory`),
  CONSTRAINT `product_category_fk` FOREIGN KEY (`category`) REFERENCES `product_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `product_subcategory_fk` FOREIGN KEY (`subcategory`) REFERENCES `product_subcategory` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la categoría del producto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la categoría del producto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la categoría',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la categoría',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Categoría de los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Bicicletas','2019-01-09 12:20:13',NULL),(2,'Motos','2019-01-09 12:20:13',NULL),(3,'Otros','2019-01-09 12:20:13',NULL);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_subcategory`
--

DROP TABLE IF EXISTS `product_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_subcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la subcategoría del producto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la subcategoría del producto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la subcategoría',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la subcategoría',
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategory_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Subcategoría de los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_subcategory`
--

LOCK TABLES `product_subcategory` WRITE;
/*!40000 ALTER TABLE `product_subcategory` DISABLE KEYS */;
INSERT INTO `product_subcategory` VALUES (1,'Bicicleta','2019-01-09 12:19:41',NULL),(2,'Moto','2019-01-09 12:19:41',NULL),(3,'Equipación','2019-01-09 12:19:41',NULL),(4,'Accesorio','2019-01-09 12:19:41',NULL),(5,'Otro','2019-01-09 12:19:41',NULL);
/*!40000 ALTER TABLE `product_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_colors`
--

DROP TABLE IF EXISTS `products_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_colors` (
  `product` int(10) unsigned NOT NULL COMMENT 'Identificador del producto',
  `color` int(10) unsigned NOT NULL COMMENT 'Identificador del color',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del registro',
  PRIMARY KEY (`product`,`color`),
  KEY `product_color_color_fk` (`color`),
  CONSTRAINT `product_color_color_fk` FOREIGN KEY (`color`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_color_product_fk` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Producto - Color';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_colors`
--

LOCK TABLES `products_colors` WRITE;
/*!40000 ALTER TABLE `products_colors` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_images` (
  `product` int(10) unsigned NOT NULL COMMENT 'Identificador del producto',
  `image` int(10) unsigned NOT NULL COMMENT 'Identificador de la imagen',
  `main` tinyint(1) DEFAULT NULL COMMENT 'Indica si la imagen es la principal del producto (1: Sí, 0 ó Null: No)',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del registro',
  PRIMARY KEY (`product`,`image`),
  UNIQUE KEY `product_image_un` (`product`,`main`),
  KEY `product_image_image_fk` (`image`),
  CONSTRAINT `product_image_image_fk` FOREIGN KEY (`image`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_image_product_fk` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Producto - Imagen';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador único',
  `nick` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Alias del usuario',
  `name` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del usuario',
  `surname` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Apellidos del usuario',
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contraseña de acceso del usuario',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Indica si el usuario está activo en la web (1: activo, 0: desactivado)',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de alta en el Sistema',
  `last_modified_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_un` (`nick`),
  UNIQUE KEY `users_nick_idx` (`nick`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Usuarios del Sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2019-03-15 14:06:40
