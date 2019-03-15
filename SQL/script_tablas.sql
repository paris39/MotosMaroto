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

CREATE TABLE `bike_size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la talla de bicicleta',
  `name` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la talla de la bicicleta',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la talla de bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la talla de bicicleta',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bike_size_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tallas de bicicletas';

CREATE TABLE `bike_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de bicicleta',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de bicicleta',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de bicicleta',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de bicicleta',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de bicicleta';

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

CREATE TABLE `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del género',
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del género',
  `active` tinyint(1) DEFAULT '1' COMMENT 'Indica si el género está activo en la web (1: activo, 0: desactivado)',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del regitro',
  PRIMARY KEY (`id`),
  UNIQUE KEY `genders_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Géneros de personas';

CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la imagen',
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre de la imagen',
  `url` varchar(180) COLLATE utf8_spanish_ci NOT NULL COMMENT 'URL de la imagen',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la imagen',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la imagen',
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_un` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Imágenes de productos';

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

CREATE TABLE `moto_contamination` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del distintivo de contaminación de la moto',
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del distintivo de contaminación de la moto',
  `color` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Color del distintivo de contaminación de la moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del distintivo de contaminación de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del distintivo de contaminación de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_contamination_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Distintivos de contaminación de la moto';

CREATE TABLE `moto_fuel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del combustible',
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del combustible de la moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del combustible de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del combustible de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_fuel_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Combustibles de motos';

CREATE TABLE `moto_license` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del carnet de conducir',
  `name` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del carnet de conducir',
  `observations` text COLLATE utf8_spanish_ci COMMENT 'Observaciones sobre el carnet de conducir',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del carnet de conducir',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del carnet de conducir',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_license_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Carnets de conducir de moto';

CREATE TABLE `moto_transmission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de transmisión de la moto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de transmisión de la moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de transmisión de la moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de transmisión de la moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_transmission_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipo de transmisión de la moto';

CREATE TABLE `moto_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de moto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo de moto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del tipo de moto',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación del tipo de moto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_type_name_idx` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de moto';

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

CREATE TABLE `product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la categoría del producto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la categoría del producto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la categoría',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la categoría',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Categoría de los productos';

CREATE TABLE `product_subcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la subcategoría del producto',
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la subcategoría del producto',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la subcategoría',
  `last_modify_date` datetime DEFAULT NULL COMMENT 'Fecha de la última modificación de la subcategoría',
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategory_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Subcategoría de los productos';

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
