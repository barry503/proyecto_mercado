-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2022 a las 06:58:30
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_mercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id` mediumint(9) NOT NULL,
  `uuid` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `evento` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `contrib_id_fk` int(11) NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `ultimo_pago` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `puesto_id_fk` int(11) DEFAULT NULL,
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giro_id_fk` smallint(6) NOT NULL,
  `puesto_egreso_fk` int(11) DEFAULT NULL,
  `licencia` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `codigo_licencia` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyentes`
--

CREATE TABLE `contribuyentes` (
  `id` int(11) NOT NULL,
  `dui` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_cta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_principal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_secundario` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `municipio_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divermovimientos`
--

CREATE TABLE `divermovimientos` (
  `pago_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  `fecha_horapago` datetime(6) NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_presup` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `precio_unitario` double UNSIGNED NOT NULL,
  `precio_fiestas` double UNSIGNED NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL,
  `usuario_email_fk` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `serie_inicial` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie_final` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divertarifas`
--

CREATE TABLE `divertarifas` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo_presup` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double UNSIGNED NOT NULL,
  `precio_fiestas` double UNSIGNED NOT NULL DEFAULT '0',
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `vigente` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diverubicaciones`
--

CREATE TABLE `diverubicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diverusuarios`
--

CREATE TABLE `diverusuarios` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiamientos`
--

CREATE TABLE `financiamientos` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `contrib_id_fk` int(11) NOT NULL,
  `inicio_periodo` date NOT NULL,
  `final_periodo` date NOT NULL,
  `financiado` double NOT NULL,
  `pagado_periodo` date DEFAULT NULL,
  `ultimo_pago` date NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `puesto_id_fk` int(11) NOT NULL,
  `valor_cuota` double NOT NULL,
  `saldo_actual` double NOT NULL,
  `saldo_anterior` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giros`
--

CREATE TABLE `giros` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE `impuestos` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `contrib_id_fk` int(11) NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `ultimo_pago` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `puesto_id_fk` int(11) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` smallint(6) NOT NULL,
  `direccion` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_corte` time NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` blob,
  `fiestas` double NOT NULL,
  `intereses` double NOT NULL,
  `imagend` blob,
  `inicio_exencion` date DEFAULT NULL,
  `final_exencion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='En esta tabla se almacenan toda la informacion general de la institucion o alcaldia ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificaciones`
--

CREATE TABLE `justificaciones` (
  `id` mediumint(9) NOT NULL,
  `contrib_id_fk` smallint(6) NOT NULL,
  `asignacion_id_fk` smallint(6) NOT NULL,
  `campo` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `valor_antes` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `valor_nuevo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `justificacion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uuid` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `pago_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  `fecha_horapago` datetime(6) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `sub_total` double NOT NULL,
  `monto_total` double NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `tarifa_unitario` double NOT NULL,
  `fiestas` double NOT NULL,
  `intereses` double NOT NULL,
  `multa` double NOT NULL,
  `asignacion_id_fk` int(11) DEFAULT NULL,
  `usuario_email_fk` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `serie_inicial` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie_final` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo_anterior` double DEFAULT NULL,
  `saldo_actual` double DEFAULT NULL,
  `tipo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` smallint(6) NOT NULL,
  `municipio_departamento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parkmovimientos`
--

CREATE TABLE `parkmovimientos` (
  `pago_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horaentra` datetime(6) NOT NULL,
  `fecha_horasale` datetime(6) DEFAULT NULL,
  `codigo_presup` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `precio_unitario` double NOT NULL,
  `tiempo_minutos` int(10) UNSIGNED DEFAULT NULL,
  `monto_total` double NOT NULL,
  `serie_entrada` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_salida` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_horapago` datetime(6) DEFAULT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL,
  `usuario_email_fk` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_hora_anula` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parktarifas`
--

CREATE TABLE `parktarifas` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `periodo` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `vigente` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL,
  `iconfile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parkubicaciones`
--

CREATE TABLE `parkubicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parkusuarios`
--

CREATE TABLE `parkusuarios` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pm_admiweb`
--

CREATE TABLE `pm_admiweb` (
  `id` int(11) NOT NULL COMMENT 'identificador autoincrementable',
  `nom_section` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nombre de la seccion',
  `public_data` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Todos los datos publicos que se visualizaran en el website',
  `des_section` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT 'descripcion de la seccion',
  `estado` tinyint(1) NOT NULL COMMENT 'el estado reflejara si la seccion se encuentra activada o desactivada',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de creacion de la seccion autoincrementable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Esta tabla contiene las secciones del website de la empresa';

--
-- Volcado de datos para la tabla `pm_admiweb`
--

INSERT INTO `pm_admiweb` (`id`, `nom_section`, `public_data`, `des_section`, `estado`, `date_create`) VALUES
(1, 'nombre', 'Proyecto Mercado', 'Este es el nombre de la Empresa', 1, '2022-09-01 23:00:35'),
(2, 'abreviatura', 'mercado', 'Abreviatura de la empresa', 1, '2022-09-01 23:10:02'),
(3, 'correo', 'admin@mercado.com', 'correo del website', 1, '2022-09-03 07:44:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pm_imgweb`
--

CREATE TABLE `pm_imgweb` (
  `id` int(11) NOT NULL,
  `nombre_campo` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'campo para llamar',
  `url_img` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'campo de la ubicacion de la img',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de creacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En esta tabla se almacenan todas las imagenes visibles en el proyecto';

--
-- Volcado de datos para la tabla `pm_imgweb`
--

INSERT INTO `pm_imgweb` (`id`, `nombre_campo`, `url_img`, `date`) VALUES
(1, 'logo', 'logo.png', '2022-09-01 23:03:12'),
(2, 'background', '2.png', '2022-09-01 23:05:12'),
(3, 'historia', '3.png', '2022-09-01 23:09:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pm_permiso`
--

CREATE TABLE `pm_permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En esta tabla estan los permisos que los usuarios pueden obtener dentro del sistema web';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pm_usuario`
--

CREATE TABLE `pm_usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT '0',
  `direccion` varchar(400) COLLATE utf8_unicode_ci DEFAULT 'Dirección',
  `fecha_creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unique_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En esta tabla se almacenan los usuarios que tienen acceso al sistema';

--
-- Volcado de datos para la tabla `pm_usuario`
--

INSERT INTO `pm_usuario` (`idusuario`, `nombre`, `apellido`, `imagen`, `usuario`, `clave`, `email`, `telefono`, `direccion`, `fecha_creado`, `unique_id`, `condicion`, `status`) VALUES
(1, 'luis', 'turcios', 'defecto.png', 'luis', 'c5ff177a86e82441f93e3772da700d5f6838157fa1bfdc0bb689d7f7e55e7aba', 'l.turcios.08@gmail.com', 0, 'Dirección', '2022-09-05 22:36:36', '1383', 1, 'Desconectado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pm_usuario_permiso`
--

CREATE TABLE `pm_usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En esta tabla se guardan los permisos de cada uno de los usuarios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medida_calificacion` double NOT NULL,
  `medida_compensa` double NOT NULL,
  `medida_fondo` double NOT NULL,
  `medida_frente` double NOT NULL,
  `modulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `sector_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` smallint(6) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `usuario_email_fk` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas_puestos`
--

CREATE TABLE `rutas_puestos` (
  `ruta_id` smallint(6) NOT NULL,
  `puestos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanimovimientos`
--

CREATE TABLE `sanimovimientos` (
  `pago_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_presup` int(11) NOT NULL DEFAULT '0',
  `fecha_hora_anula` datetime(6) DEFAULT NULL,
  `fecha_horapago` datetime(6) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL,
  `usuario_email_fk` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_horainsert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `serie_inicial` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie_final` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saniresumen`
--

CREATE TABLE `saniresumen` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `inicial` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `final` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tarifa` double UNSIGNED NOT NULL DEFAULT '0',
  `total` int(10) UNSIGNED NOT NULL COMMENT 'Modificacion: se debe agregar el siguiente proceso en la logica de php para almacenar en este campo usar como referencia esto estaba agregado en la consulta: GENERATED ALWAYS AS (((`final` - `inicial`) + 1)) STORED',
  `ingreso` double UNSIGNED NOT NULL COMMENT 'Modificacion: se debe agregar el siguiente proceso en la logica de php para almacenar en este campo usar como referencia esto estaba agregado en la consulta: GENERATED ALWAYS AS ((`total` * `tarifa`)) STORED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanitarifas`
--

CREATE TABLE `sanitarifas` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `vigente` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ubicacion_id_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saniubicaciones`
--

CREATE TABLE `saniubicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saniusuarios`
--

CREATE TABLE `saniusuarios` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `ubicacion_id_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `contrib_id_fk` int(11) NOT NULL,
  `valor_cuota` double UNSIGNED NOT NULL DEFAULT '0',
  `fecha_egreso` date DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `ultimo_pago` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `puesto_id_fk` int(11) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(11) NOT NULL,
  `codigo_presup` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_unitario` double NOT NULL,
  `aplicafiestas` bit(1) NOT NULL,
  `aplicamulta` bit(1) NOT NULL,
  `aplicaintereses` bit(1) NOT NULL,
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vigencia` date NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id_fk` smallint(6) NOT NULL,
  `device_prefix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `alcance` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_42qw16kd6k0ghir1cowqaxuec` (`puesto_id_fk`),
  ADD KEY `FKobb4sdq1u82re8yisbcuew6jb` (`giro_id_fk`),
  ADD KEY `FK6tmji5l3bnot5cxpru5bgr97w` (`institucion_id_fk`),
  ADD KEY `FKmda3g6v2umxvd4nnoikfsdl9v` (`puesto_egreso_fk`),
  ADD KEY `FKgdgm7r36kdneeo094swb6aykg` (`contrib_id_fk`);

--
-- Indices de la tabla `contribuyentes`
--
ALTER TABLE `contribuyentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_q4t8lxmg8qc3tjsw6o9skdf9o` (`codigo_cta`),
  ADD KEY `FK7i081we6pci7kn4mpso72nurp` (`institucion_id_fk`),
  ADD KEY `FKd7dcgvc9j6f9qrug2droe5mxs` (`municipio_id_fk`);

--
-- Indices de la tabla `divermovimientos`
--
ALTER TABLE `divermovimientos`
  ADD PRIMARY KEY (`pago_id`) USING BTREE,
  ADD KEY `FKo6vp2ilbphgd0o0mp5gs99mumd` (`ubicacion_id_fk`) USING BTREE,
  ADD KEY `FKay1gu49ro5d5qsr0b5c43q9kad` (`usuario_email_fk`) USING BTREE;

--
-- Indices de la tabla `divertarifas`
--
ALTER TABLE `divertarifas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK284gy9elrsxfotluwah7f2b0td` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FK2ubicacionfromtarifasd` (`ubicacion_id_fk`) USING BTREE;

--
-- Indices de la tabla `diverubicaciones`
--
ALTER TABLE `diverubicaciones`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK284gy9elrsxfotluwah7f3b0d` (`institucion_id_fk`) USING BTREE;

--
-- Indices de la tabla `diverusuarios`
--
ALTER TABLE `diverusuarios`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD KEY `FKgquxq5ybs1pad7os99r5iwu82d` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FKubicacionfromusuariosd` (`ubicacion_id_fk`) USING BTREE;

--
-- Indices de la tabla `financiamientos`
--
ALTER TABLE `financiamientos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `UK_42qw16kd6k0ghir1cowqaxuec` (`puesto_id_fk`) USING BTREE,
  ADD KEY `FK6tmji5l3bnot5cxpru5bgr97w` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FKgdgm7r36kdneeo094swb6aykg` (`contrib_id_fk`) USING BTREE;

--
-- Indices de la tabla `giros`
--
ALTER TABLE `giros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKc79p15s4du6snxbudumu0jv9x` (`institucion_id_fk`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK6tmji5l3bnot5cxpru5bgr97i` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FKgdgm7r36kdneeo094swb6ayki` (`contrib_id_fk`) USING BTREE,
  ADD KEY `FKpuestoid2impuesto` (`puesto_id_fk`) USING BTREE;

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`pago_id`),
  ADD KEY `FKo6vp1ilbphgd0o0mp5gs99mum` (`asignacion_id_fk`),
  ADD KEY `FKay0gu49ro5d5qsr0b5c43q9ka` (`usuario_email_fk`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parkmovimientos`
--
ALTER TABLE `parkmovimientos`
  ADD PRIMARY KEY (`pago_id`) USING BTREE,
  ADD KEY `FKo6vp2ilbphgd0o0mp5gs99muy` (`ubicacion_id_fk`) USING BTREE,
  ADD KEY `FKay1gu49ro5d5qsr0b5c43q9ky` (`usuario_email_fk`) USING BTREE;

--
-- Indices de la tabla `parktarifas`
--
ALTER TABLE `parktarifas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK284gy9elrsxfotluwah7f2b0y` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FK2ubicacionfromtarifay` (`ubicacion_id_fk`) USING BTREE;

--
-- Indices de la tabla `parkubicaciones`
--
ALTER TABLE `parkubicaciones`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK284gy9elrsxfotluwah7f3b0y` (`institucion_id_fk`) USING BTREE;

--
-- Indices de la tabla `parkusuarios`
--
ALTER TABLE `parkusuarios`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD KEY `FKgquxq5ybs1pad7os99r5iwu8y` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FKubicacionfromusuarioy` (`ubicacion_id_fk`) USING BTREE;

--
-- Indices de la tabla `pm_admiweb`
--
ALTER TABLE `pm_admiweb`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pm_imgweb`
--
ALTER TABLE `pm_imgweb`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pm_permiso`
--
ALTER TABLE `pm_permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `pm_usuario`
--
ALTER TABLE `pm_usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `pm_usuario_permiso`
--
ALTER TABLE `pm_usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idpermiso` (`idpermiso`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKj3vlxncj6rnxbsxtrfpfhun86` (`institucion_id_fk`),
  ADD KEY `FK3w74v4o9ha94e0skgsfi9xf79` (`sector_id_fk`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKexupnx62bowpqqqdhj8rr37tr` (`institucion_id_fk`),
  ADD KEY `FK8j06lmdsbybti790ispg4jw1d` (`usuario_email_fk`);

--
-- Indices de la tabla `rutas_puestos`
--
ALTER TABLE `rutas_puestos`
  ADD KEY `FKi9bo9wx2s85u6g7214b6t6wow` (`ruta_id`),
  ADD KEY `UK_2n6ke77owp7tfou9uaansnv9` (`puestos_id`) USING BTREE;

--
-- Indices de la tabla `sanimovimientos`
--
ALTER TABLE `sanimovimientos`
  ADD PRIMARY KEY (`pago_id`) USING BTREE,
  ADD KEY `FKo6vp2ilbphgd0o0mp5gs99mum` (`ubicacion_id_fk`) USING BTREE,
  ADD KEY `FKay1gu49ro5d5qsr0b5c43q9ka` (`usuario_email_fk`) USING BTREE;

--
-- Indices de la tabla `saniresumen`
--
ALTER TABLE `saniresumen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sanitarifas`
--
ALTER TABLE `sanitarifas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK284gy9elrsxfotluwah7f2b0t` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FK2ubicacionfromtarifas` (`ubicacion_id_fk`);

--
-- Indices de la tabla `saniubicaciones`
--
ALTER TABLE `saniubicaciones`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK284gy9elrsxfotluwah7f3b0t` (`institucion_id_fk`) USING BTREE;

--
-- Indices de la tabla `saniusuarios`
--
ALTER TABLE `saniusuarios`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD KEY `FKgquxq5ybs1pad7os99r5iwu82` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FKubicacionfromusuarios` (`ubicacion_id_fk`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKl6enqjbimbmscsxjee6xb3kt2` (`institucion_id_fk`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK6tmji5l3bnot5cxpru5bgr97s` (`institucion_id_fk`) USING BTREE,
  ADD KEY `FKgdgm7r36kdneeo094swb6ayks` (`contrib_id_fk`) USING BTREE,
  ADD KEY `FKpuestoid2servicio` (`puesto_id_fk`) USING BTREE;

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK284gy9elrsxfotluwah7flb0t` (`institucion_id_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`),
  ADD KEY `FKgquxq5ybs1pad7os99r5iwu8l` (`institucion_id_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=742;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3554;

--
-- AUTO_INCREMENT de la tabla `contribuyentes`
--
ALTER TABLE `contribuyentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3600;

--
-- AUTO_INCREMENT de la tabla `divertarifas`
--
ALTER TABLE `divertarifas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `diverubicaciones`
--
ALTER TABLE `diverubicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `financiamientos`
--
ALTER TABLE `financiamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `giros`
--
ALTER TABLE `giros`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT de la tabla `parktarifas`
--
ALTER TABLE `parktarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `parkubicaciones`
--
ALTER TABLE `parkubicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pm_admiweb`
--
ALTER TABLE `pm_admiweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrementable', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pm_imgweb`
--
ALTER TABLE `pm_imgweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pm_permiso`
--
ALTER TABLE `pm_permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pm_usuario`
--
ALTER TABLE `pm_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pm_usuario_permiso`
--
ALTER TABLE `pm_usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4167;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `saniresumen`
--
ALTER TABLE `saniresumen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sanitarifas`
--
ALTER TABLE `sanitarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `saniubicaciones`
--
ALTER TABLE `saniubicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97w` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKeuifsxegy9i5plunmmibn3gdm` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  ADD CONSTRAINT `FKgdgm7r36kdneeo094swb6aykg` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`),
  ADD CONSTRAINT `FKmda3g6v2umxvd4nnoikfsdl9v` FOREIGN KEY (`puesto_egreso_fk`) REFERENCES `puestos` (`id`),
  ADD CONSTRAINT `FKobb4sdq1u82re8yisbcuew6jb` FOREIGN KEY (`giro_id_fk`) REFERENCES `giros` (`id`);

--
-- Filtros para la tabla `contribuyentes`
--
ALTER TABLE `contribuyentes`
  ADD CONSTRAINT `FK7i081we6pci7kn4mpso72nurp` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKd7dcgvc9j6f9qrug2droe5mxs` FOREIGN KEY (`municipio_id_fk`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `divermovimientos`
--
ALTER TABLE `divermovimientos`
  ADD CONSTRAINT `FK2ubicacionfrommovimientosd` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `diverubicaciones` (`id`),
  ADD CONSTRAINT `FKay1gu49ro5d5qsr0b5c43q9kad` FOREIGN KEY (`usuario_email_fk`) REFERENCES `diverusuarios` (`email`);

--
-- Filtros para la tabla `divertarifas`
--
ALTER TABLE `divertarifas`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7f2b0td` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FK2ubicacionfromtarifasd` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `diverubicaciones` (`id`);

--
-- Filtros para la tabla `diverubicaciones`
--
ALTER TABLE `diverubicaciones`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7f3b0d` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `diverusuarios`
--
ALTER TABLE `diverusuarios`
  ADD CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu82d` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKubicacionfromusuariosd` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `diverubicaciones` (`id`);

--
-- Filtros para la tabla `financiamientos`
--
ALTER TABLE `financiamientos`
  ADD CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97f` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKeuifsxegy9i5plunmmibn3gdf` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  ADD CONSTRAINT `FKgdgm7r36kdneeo094swb6aykf` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`);

--
-- Filtros para la tabla `giros`
--
ALTER TABLE `giros`
  ADD CONSTRAINT `FKc79p15s4du6snxbudumu0jv9x` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97i` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKeuifsxegy9i5plunmmibn3gdi` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  ADD CONSTRAINT `FKgdgm7r36kdneeo094swb6ayki` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `FKay0gu49ro5d5qsr0b5c43q9ka` FOREIGN KEY (`usuario_email_fk`) REFERENCES `usuarios` (`email`),
  ADD CONSTRAINT `FKo6vp1ilbphgd0o0mp5gs99mum` FOREIGN KEY (`asignacion_id_fk`) REFERENCES `asignaciones` (`id`);

--
-- Filtros para la tabla `parkmovimientos`
--
ALTER TABLE `parkmovimientos`
  ADD CONSTRAINT `FK2ubicacionfrommovimientoy` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `parkubicaciones` (`id`),
  ADD CONSTRAINT `FKay1gu49ro5d5qsr0b5c43q9ky` FOREIGN KEY (`usuario_email_fk`) REFERENCES `parkusuarios` (`email`);

--
-- Filtros para la tabla `parktarifas`
--
ALTER TABLE `parktarifas`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7f2b0y` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FK2ubicacionfromtarifay` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `parkubicaciones` (`id`);

--
-- Filtros para la tabla `parkubicaciones`
--
ALTER TABLE `parkubicaciones`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7f3b0y` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `parkusuarios`
--
ALTER TABLE `parkusuarios`
  ADD CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu8y` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKubicacionfromusuarioy` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `parkubicaciones` (`id`);

--
-- Filtros para la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `FK3w74v4o9ha94e0skgsfi9xf79` FOREIGN KEY (`sector_id_fk`) REFERENCES `sectores` (`id`),
  ADD CONSTRAINT `FKj3vlxncj6rnxbsxtrfpfhun86` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `FK8j06lmdsbybti790ispg4jw1d` FOREIGN KEY (`usuario_email_fk`) REFERENCES `usuarios` (`email`),
  ADD CONSTRAINT `FKexupnx62bowpqqqdhj8rr37tr` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `rutas_puestos`
--
ALTER TABLE `rutas_puestos`
  ADD CONSTRAINT `FKi9bo9wx2s85u6g7214b6t6wow` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`),
  ADD CONSTRAINT `FKl1j16as48u9p0ru1e1ujd1lqs` FOREIGN KEY (`puestos_id`) REFERENCES `puestos` (`id`);

--
-- Filtros para la tabla `sanimovimientos`
--
ALTER TABLE `sanimovimientos`
  ADD CONSTRAINT `FK2ubicacionfrommovimientos` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `saniubicaciones` (`id`),
  ADD CONSTRAINT `FKay1gu49ro5d5qsr0b5c43q9ka` FOREIGN KEY (`usuario_email_fk`) REFERENCES `saniusuarios` (`email`);

--
-- Filtros para la tabla `sanitarifas`
--
ALTER TABLE `sanitarifas`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7f2b0t` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FK2ubicacionfromtarifas` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `saniubicaciones` (`id`);

--
-- Filtros para la tabla `saniubicaciones`
--
ALTER TABLE `saniubicaciones`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7f3b0t` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `saniusuarios`
--
ALTER TABLE `saniusuarios`
  ADD CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu82` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKubicacionfromusuarios` FOREIGN KEY (`ubicacion_id_fk`) REFERENCES `saniubicaciones` (`id`);

--
-- Filtros para la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `FKl6enqjbimbmscsxjee6xb3kt2` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `FK6tmji5l3bnot5cxpru5bgr97s` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `FKeuifsxegy9i5plunmmibn3gds` FOREIGN KEY (`puesto_id_fk`) REFERENCES `puestos` (`id`),
  ADD CONSTRAINT `FKgdgm7r36kdneeo094swb6ayks` FOREIGN KEY (`contrib_id_fk`) REFERENCES `contribuyentes` (`id`);

--
-- Filtros para la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD CONSTRAINT `FK284gy9elrsxfotluwah7flb0t` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FKgquxq5ybs1pad7os99r5iwu8l` FOREIGN KEY (`institucion_id_fk`) REFERENCES `instituciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
