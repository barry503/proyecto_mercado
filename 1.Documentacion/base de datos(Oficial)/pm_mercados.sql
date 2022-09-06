-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.21 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table u448952548_mercados.accesos
CREATE TABLE IF NOT EXISTS `accesos` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `uuid` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `evento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=742 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.asignaciones
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `contrib_id_fk` int NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `ultimo_pago` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `puesto_id_fk` int DEFAULT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giro_id_fk` smallint NOT NULL,
  `puesto_egreso_fk` int DEFAULT NULL,
  `licencia` int unsigned NOT NULL DEFAULT '0',
  `codigo_licencia` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_42qw16kd6k0ghir1cowqaxuec` (`puesto_id_fk`),
  KEY `FKobb4sdq1u82re8yisbcuew6jb` (`giro_id_fk`),
  KEY `FK6tmji5l3bnot5cxpru5bgr97w` (`institucion_id_fk`),
  KEY `FKmda3g6v2umxvd4nnoikfsdl9v` (`puesto_egreso_fk`),
  KEY `FKgdgm7r36kdneeo094swb6aykg` (`contrib_id_fk`),
  CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97w` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKeuifsxegy9i5plunmmibn3gdm` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  CONSTRAINT `FKgdgm7r36kdneeo094swb6aykg` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`),
  CONSTRAINT `FKmda3g6v2umxvd4nnoikfsdl9v` FOREIGN KEY (`puesto_egreso_fk`) REFERENCES `puestos` (`id`),
  CONSTRAINT `FKobb4sdq1u82re8yisbcuew6jb` FOREIGN KEY (`giro_id_fk`) REFERENCES `giros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3554 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.contribuyentes
CREATE TABLE IF NOT EXISTS `contribuyentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dui` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `codigo_cta` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(125) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombres` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono_principal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_secundario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `municipio_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_q4t8lxmg8qc3tjsw6o9skdf9o` (`codigo_cta`),
  KEY `FK7i081we6pci7kn4mpso72nurp` (`institucion_id_fk`),
  KEY `FKd7dcgvc9j6f9qrug2droe5mxs` (`municipio_id_fk`),
  CONSTRAINT `FK7i081we6pci7kn4mpso72nurp` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKd7dcgvc9j6f9qrug2droe5mxs` FOREIGN KEY (`municipio_id_fk`) REFERENCES `municipios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3600 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.divermovimientos
CREATE TABLE IF NOT EXISTS `divermovimientos` (
  `pago_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  `fecha_horapago` datetime(6) NOT NULL,
  `observaciones` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo_presup` int unsigned NOT NULL DEFAULT '0',
  `precio_unitario` double unsigned NOT NULL,
  `precio_fiestas` double unsigned NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int unsigned NOT NULL,
  `usuario_email_fk` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `serie_inicial` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie_final` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pago_id`) USING BTREE,
  KEY `FKo6vp2ilbphgd0o0mp5gs99mumd` (`ubicacion_id_fk`) USING BTREE,
  KEY `FKay1gu49ro5d5qsr0b5c43q9kad` (`usuario_email_fk`) USING BTREE,
  CONSTRAINT `FK2ubicacionfrommovimientosd` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `diverubicaciones` (`id`),
  CONSTRAINT `FKay1gu49ro5d5qsr0b5c43q9kad` FOREIGN KEY (`usuario_email_fk`) REFERENCES `diverusuarios` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.divertarifas
CREATE TABLE IF NOT EXISTS `divertarifas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `codigo_presup` int unsigned NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double unsigned NOT NULL,
  `precio_fiestas` double unsigned NOT NULL DEFAULT '0',
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `vigente` tinyint unsigned NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK284gy9elrsxfotluwah7f2b0td` (`institucion_id_fk`) USING BTREE,
  KEY `FK2ubicacionfromtarifasd` (`ubicacion_id_fk`) USING BTREE,
  CONSTRAINT `FK284gy9elrsxfotluwah7f2b0td` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FK2ubicacionfromtarifasd` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `diverubicaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.diverubicaciones
CREATE TABLE IF NOT EXISTS `diverubicaciones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK284gy9elrsxfotluwah7f3b0d` (`institucion_id_fk`) USING BTREE,
  CONSTRAINT `FK284gy9elrsxfotluwah7f3b0d` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.diverusuarios
CREATE TABLE IF NOT EXISTS `diverusuarios` (
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(16) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `ubicacion_id_fk` int unsigned NOT NULL,
  PRIMARY KEY (`email`) USING BTREE,
  KEY `FKgquxq5ybs1pad7os99r5iwu82d` (`institucion_id_fk`) USING BTREE,
  KEY `FKubicacionfromusuariosd` (`ubicacion_id_fk`) USING BTREE,
  CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu82d` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKubicacionfromusuariosd` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `diverubicaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.financiamientos
CREATE TABLE IF NOT EXISTS `financiamientos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `contrib_id_fk` int NOT NULL,
  `inicio_periodo` date NOT NULL,
  `final_periodo` date NOT NULL,
  `financiado` double NOT NULL,
  `pagado_periodo` date DEFAULT NULL,
  `ultimo_pago` date NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `puesto_id_fk` int NOT NULL,
  `valor_cuota` double NOT NULL,
  `saldo_actual` double NOT NULL,
  `saldo_anterior` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `UK_42qw16kd6k0ghir1cowqaxuec` (`puesto_id_fk`) USING BTREE,
  KEY `FK6tmji5l3bnot5cxpru5bgr97w` (`institucion_id_fk`) USING BTREE,
  KEY `FKgdgm7r36kdneeo094swb6aykg` (`contrib_id_fk`) USING BTREE,
  CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97f` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKeuifsxegy9i5plunmmibn3gdf` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  CONSTRAINT `FKgdgm7r36kdneeo094swb6aykf` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.giros
CREATE TABLE IF NOT EXISTS `giros` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKc79p15s4du6snxbudumu0jv9x` (`institucion_id_fk`),
  CONSTRAINT `FKc79p15s4du6snxbudumu0jv9x` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.impuestos
CREATE TABLE IF NOT EXISTS `impuestos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `contrib_id_fk` int NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `ultimo_pago` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `puesto_id_fk` int NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK6tmji5l3bnot5cxpru5bgr97i` (`institucion_id_fk`) USING BTREE,
  KEY `FKgdgm7r36kdneeo094swb6ayki` (`contrib_id_fk`) USING BTREE,
  KEY `FKpuestoid2impuesto` (`puesto_id_fk`) USING BTREE,
  CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97i` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKeuifsxegy9i5plunmmibn3gdi` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  CONSTRAINT `FKgdgm7r36kdneeo094swb6ayki` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.instituciones
CREATE TABLE IF NOT EXISTS `instituciones` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `direccion` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_corte` time NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` blob,
  `fiestas` double NOT NULL,
  `intereses` double NOT NULL,
  `imagend` blob,
  `inicio_exencion` date DEFAULT NULL,
  `final_exencion` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.justificaciones
CREATE TABLE IF NOT EXISTS `justificaciones` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `contrib_id_fk` smallint NOT NULL,
  `asignacion_id_fk` smallint NOT NULL,
  `campo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `valor_antes` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `valor_nuevo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `justificacion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uuid` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.movimientos
CREATE TABLE IF NOT EXISTS `movimientos` (
  `pago_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  `fecha_horapago` datetime(6) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `sub_total` double NOT NULL,
  `monto_total` double NOT NULL,
  `observaciones` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `tarifa_unitario` double NOT NULL,
  `fiestas` double NOT NULL,
  `intereses` double NOT NULL,
  `multa` double NOT NULL,
  `asignacion_id_fk` int DEFAULT NULL,
  `usuario_email_fk` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `serie_inicial` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie_final` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  `saldo_actual` double DEFAULT NULL,
  `tipo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pago_id`),
  KEY `FKo6vp1ilbphgd0o0mp5gs99mum` (`asignacion_id_fk`),
  KEY `FKay0gu49ro5d5qsr0b5c43q9ka` (`usuario_email_fk`),
  CONSTRAINT `FKay0gu49ro5d5qsr0b5c43q9ka` FOREIGN KEY (`usuario_email_fk`) REFERENCES `usuarios` (`email`),
  CONSTRAINT `FKo6vp1ilbphgd0o0mp5gs99mum` FOREIGN KEY (`asignacion_id_fk`) REFERENCES `asignaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.municipios
CREATE TABLE IF NOT EXISTS `municipios` (
  `id` smallint NOT NULL,
  `municipio_departamento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.parkmovimientos
CREATE TABLE IF NOT EXISTS `parkmovimientos` (
  `pago_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horaentra` datetime(6) NOT NULL,
  `fecha_horasale` datetime(6) DEFAULT NULL,
  `codigo_presup` int unsigned NOT NULL DEFAULT '0',
  `precio_unitario` double NOT NULL,
  `tiempo_minutos` int unsigned DEFAULT NULL,
  `monto_total` double NOT NULL,
  `serie_entrada` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_salida` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_horapago` datetime(6) DEFAULT NULL,
  `observaciones` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `ubicacion_id_fk` int unsigned NOT NULL,
  `usuario_email_fk` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`pago_id`) USING BTREE,
  KEY `FKo6vp2ilbphgd0o0mp5gs99muy` (`ubicacion_id_fk`) USING BTREE,
  KEY `FKay1gu49ro5d5qsr0b5c43q9ky` (`usuario_email_fk`) USING BTREE,
  CONSTRAINT `FK2ubicacionfrommovimientoy` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `parkubicaciones` (`id`),
  CONSTRAINT `FKay1gu49ro5d5qsr0b5c43q9ky` FOREIGN KEY (`usuario_email_fk`) REFERENCES `parkusuarios` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.parktarifas
CREATE TABLE IF NOT EXISTS `parktarifas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `periodo` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `vigente` tinyint unsigned NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int unsigned NOT NULL,
  `iconfile` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK284gy9elrsxfotluwah7f2b0y` (`institucion_id_fk`) USING BTREE,
  KEY `FK2ubicacionfromtarifay` (`ubicacion_id_fk`) USING BTREE,
  CONSTRAINT `FK284gy9elrsxfotluwah7f2b0y` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FK2ubicacionfromtarifay` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `parkubicaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.parkubicaciones
CREATE TABLE IF NOT EXISTS `parkubicaciones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK284gy9elrsxfotluwah7f3b0y` (`institucion_id_fk`) USING BTREE,
  CONSTRAINT `FK284gy9elrsxfotluwah7f3b0y` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.parkusuarios
CREATE TABLE IF NOT EXISTS `parkusuarios` (
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(16) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `ubicacion_id_fk` int unsigned NOT NULL,
  PRIMARY KEY (`email`) USING BTREE,
  KEY `FKgquxq5ybs1pad7os99r5iwu8y` (`institucion_id_fk`) USING BTREE,
  KEY `FKubicacionfromusuarioy` (`ubicacion_id_fk`) USING BTREE,
  CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu8y` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKubicacionfromusuarioy` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `parkubicaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.puestos
CREATE TABLE IF NOT EXISTS `puestos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `medida_calificacion` double NOT NULL,
  `medida_compensa` double NOT NULL,
  `medida_fondo` double NOT NULL,
  `medida_frente` double NOT NULL,
  `modulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `sector_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKj3vlxncj6rnxbsxtrfpfhun86` (`institucion_id_fk`),
  KEY `FK3w74v4o9ha94e0skgsfi9xf79` (`sector_id_fk`),
  CONSTRAINT `FK3w74v4o9ha94e0skgsfi9xf79` FOREIGN KEY (`sector_id_fk`) REFERENCES `sectores` (`id`),
  CONSTRAINT `FKj3vlxncj6rnxbsxtrfpfhun86` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.rutas
CREATE TABLE IF NOT EXISTS `rutas` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `usuario_email_fk` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKexupnx62bowpqqqdhj8rr37tr` (`institucion_id_fk`),
  KEY `FK8j06lmdsbybti790ispg4jw1d` (`usuario_email_fk`),
  CONSTRAINT `FK8j06lmdsbybti790ispg4jw1d` FOREIGN KEY (`usuario_email_fk`) REFERENCES `usuarios` (`email`),
  CONSTRAINT `FKexupnx62bowpqqqdhj8rr37tr` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.rutas_puestos
CREATE TABLE IF NOT EXISTS `rutas_puestos` (
  `ruta_id` smallint NOT NULL,
  `puestos_id` int NOT NULL,
  KEY `FKi9bo9wx2s85u6g7214b6t6wow` (`ruta_id`),
  KEY `UK_2n6ke77owp7tfou9uaansnv9` (`puestos_id`) USING BTREE,
  CONSTRAINT `FKi9bo9wx2s85u6g7214b6t6wow` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`),
  CONSTRAINT `FKl1j16as48u9p0ru1e1ujd1lqs` FOREIGN KEY (`puestos_id`) REFERENCES `puestos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.sanimovimientos
CREATE TABLE IF NOT EXISTS `sanimovimientos` (
  `pago_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_presup` int NOT NULL DEFAULT '0',
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  `fecha_horapago` datetime(6) NOT NULL,
  `observaciones` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `ubicacion_id_fk` int unsigned NOT NULL,
  `usuario_email_fk` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `serie_inicial` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie_final` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pago_id`) USING BTREE,
  KEY `FKo6vp2ilbphgd0o0mp5gs99mum` (`ubicacion_id_fk`) USING BTREE,
  KEY `FKay1gu49ro5d5qsr0b5c43q9ka` (`usuario_email_fk`) USING BTREE,
  CONSTRAINT `FK2ubicacionfrommovimientos` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `saniubicaciones` (`id`),
  CONSTRAINT `FKay1gu49ro5d5qsr0b5c43q9ka` FOREIGN KEY (`usuario_email_fk`) REFERENCES `saniusuarios` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.saniresumen
CREATE TABLE IF NOT EXISTS `saniresumen` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `inicial` int unsigned NOT NULL DEFAULT '0',
  `final` int unsigned NOT NULL DEFAULT '0',
  `tarifa` double unsigned NOT NULL DEFAULT '0',
  `total` int GENERATED ALWAYS AS (((`final` - `inicial`) + 1)) STORED,
  `ingreso` double GENERATED ALWAYS AS ((`total` * `tarifa`)) STORED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.sanitarifas
CREATE TABLE IF NOT EXISTS `sanitarifas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `vigente` tinyint unsigned NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK284gy9elrsxfotluwah7f2b0t` (`institucion_id_fk`) USING BTREE,
  KEY `FK2ubicacionfromtarifas` (`ubicacion_id_fk`),
  CONSTRAINT `FK284gy9elrsxfotluwah7f2b0t` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FK2ubicacionfromtarifas` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `saniubicaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.saniubicaciones
CREATE TABLE IF NOT EXISTS `saniubicaciones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK284gy9elrsxfotluwah7f3b0t` (`institucion_id_fk`) USING BTREE,
  CONSTRAINT `FK284gy9elrsxfotluwah7f3b0t` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.saniusuarios
CREATE TABLE IF NOT EXISTS `saniusuarios` (
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(16) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `ubicacion_id_fk` int unsigned DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE,
  KEY `FKgquxq5ybs1pad7os99r5iwu82` (`institucion_id_fk`) USING BTREE,
  KEY `FKubicacionfromusuarios` (`ubicacion_id_fk`),
  CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu82` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKubicacionfromusuarios` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `saniubicaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.sectores
CREATE TABLE IF NOT EXISTS `sectores` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKl6enqjbimbmscsxjee6xb3kt2` (`institucion_id_fk`),
  CONSTRAINT `FKl6enqjbimbmscsxjee6xb3kt2` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `contrib_id_fk` int NOT NULL,
  `valor_cuota` double unsigned NOT NULL DEFAULT '0',
  `fecha_egreso` date DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `ultimo_pago` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `puesto_id_fk` int NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK6tmji5l3bnot5cxpru5bgr97s` (`institucion_id_fk`) USING BTREE,
  KEY `FKgdgm7r36kdneeo094swb6ayks` (`contrib_id_fk`) USING BTREE,
  KEY `FKpuestoid2servicio` (`puesto_id_fk`) USING BTREE,
  CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97s` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `FKeuifsxegy9i5plunmmibn3gds` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  CONSTRAINT `FKgdgm7r36kdneeo094swb6ayks` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.tarifas
CREATE TABLE IF NOT EXISTS `tarifas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_presup` int NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `aplicafiestas` bit(1) NOT NULL,
  `aplicamulta` bit(1) NOT NULL,
  `aplicaintereses` bit(1) NOT NULL,
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK284gy9elrsxfotluwah7flb0t` (`institucion_id_fk`),
  CONSTRAINT `FK284gy9elrsxfotluwah7flb0t` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table u448952548_mercados.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(16) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `institucion_id_fk` smallint NOT NULL,
  `device_prefix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `alcance` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  KEY `FKgquxq5ybs1pad7os99r5iwu8l` (`institucion_id_fk`),
  CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu8l` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
