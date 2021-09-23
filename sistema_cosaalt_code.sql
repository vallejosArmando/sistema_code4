-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2021 a las 08:57:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_cosaalt_code`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `permisos` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `id_grupo`, `id_opcion`, `id_rol`, `permisos`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 1, 1, 'a', '2021-09-01 09:43:21', '2021-09-01 09:43:21', 1, '1'),
(2, 1, 2, 1, 'a', '2021-09-01 09:43:50', '2021-09-01 09:43:50', 1, '1'),
(3, 3, 8, 1, 'a', '2021-09-04 06:01:39', '2021-09-04 06:01:39', 1, '1'),
(4, 3, 8, 2, 'a', '2021-09-04 06:00:57', '2021-09-04 06:00:57', 1, '1'),
(5, 1, 5, 1, 'a', '2021-09-04 06:37:11', '2021-09-04 06:37:11', 1, '1'),
(6, 1, 4, 1, 'a', '2021-09-04 06:36:57', '2021-09-04 06:36:57', 1, '1'),
(7, 1, 6, 1, 'a', '2021-09-04 08:24:26', '2021-09-04 08:24:26', 1, '1'),
(8, 3, 9, 1, 'a', '2021-09-04 08:29:11', '2021-09-04 08:29:11', 1, '1'),
(9, 3, 10, 1, 'a', '2021-09-04 08:29:51', '2021-09-04 08:29:51', 1, '1'),
(10, 3, 12, 1, 'a', '2021-09-04 15:22:26', '2021-09-04 15:22:26', 1, '1'),
(11, 3, 11, 1, 'a', '2021-09-04 15:23:00', '2021-09-04 15:23:00', 1, '1'),
(12, 3, 13, 1, 'a', '2021-09-04 15:23:15', '2021-09-04 15:23:15', 1, '1'),
(13, 3, 14, 1, 'a', '2021-09-04 15:23:36', '2021-09-04 15:23:36', 1, '1'),
(14, 3, 15, 1, 'a', '2021-09-04 15:23:53', '2021-09-04 15:23:53', 1, '1'),
(15, 4, 16, 1, 'a', '2021-09-04 16:03:36', '2021-09-04 16:03:36', 1, '1'),
(16, 4, 17, 1, 'a', '2021-09-04 16:05:58', '2021-09-04 16:05:58', 1, '1'),
(17, 4, 18, 1, 'a', '2021-09-04 16:04:13', '2021-09-04 16:04:13', 1, '1'),
(18, 3, 19, 1, 'a', '2021-09-05 22:40:36', '2021-09-05 22:40:36', 1, '1'),
(19, 1, 3, 1, 'a', '2021-09-10 23:48:36', '2021-09-10 23:48:36', 1, '1'),
(20, 3, 9, 3, 'a', '2021-09-13 00:12:19', '2021-09-13 00:12:19', 1, '1'),
(21, 1, 20, 1, 'a', '2021-09-23 02:13:57', '2021-09-23 02:13:57', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `id_sistema` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `id_sistema`, `nombre`, `descripcion`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 'Mantenimiento', 'agua potabless', '2021-09-01 09:26:59', '2021-09-01 09:26:59', 1, '1'),
(2, 1, 'Comercial', 'Cobros y reconexión de servicio', '2021-09-05 06:09:20', '2021-09-05 06:09:20', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `id_conf` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fec_inicio` date NOT NULL,
  `fec_fin` date NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_sistema` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `tel_fijo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tel_cel` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `id_tipo`, `id_area`, `id_sistema`, `nombres`, `ap`, `am`, `ci`, `tel_fijo`, `tel_cel`, `direccion`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 1, 1, 'ssee', 'ss', 'ss', 422, '232', '2434', 'rrr', '2021-09-18 02:39:26', '2021-09-18 02:39:26', 1, '1'),
(2, 1, 2, 1, 'ggggscxc', 'hgfh', 'hfgh', 422, '5435', '53453', 'fgjhh', '2021-09-23 06:41:44', '2021-09-23 06:41:44', 1, '1'),
(3, 1, 1, 1, 'fff', 'gfg', 'ggg', 45, '545', '545', 'jjjjj', '2021-09-22 20:51:37', '2021-09-22 20:51:37', 1, '1'),
(4, 1, 1, 1, 'fffgf', 'gfgg', 'gfg', 2424, '554', '5454', 'ttttt', '2021-09-22 20:53:57', '2021-09-22 20:53:57', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `grupo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `grupo`, `icono`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 'Herramientas', 'fa fa-cog', '2021-09-01 09:04:44', '2021-09-01 09:04:44', 1, '1'),
(2, 'Parametros', 'fa fa-list', '2021-09-01 09:05:09', '2021-09-01 09:05:09', 1, '1'),
(3, 'Sistemas', 'fa fa-list', '2021-09-04 04:55:05', '2021-09-04 04:55:05', 1, '1'),
(4, 'Reportes', 'fa fa-table', '2021-09-01 09:05:45', '2021-09-01 09:05:45', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `hora_entrada` datetime(6) DEFAULT NULL,
  `hora_salida` datetime(6) DEFAULT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes_area`
--

CREATE TABLE `jefes_area` (
  `id` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `nombres` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `telefono` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `correo` char(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_inicio` date NOT NULL,
  `fec_fin` date NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jefes_area`
--

INSERT INTO `jefes_area` (`id`, `id_area`, `nombres`, `ap`, `am`, `ci`, `telefono`, `correo`, `fec_inicio`, `fec_fin`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 'dsd', 'asdd', 'gjttttttt', 42, '2577', 'jhkjk', '0000-00-00', '0000-00-00', '2021-09-01 09:29:48', '2021-09-01 09:29:48', 1, '1'),
(2, 1, 'dfdsasasas', 'fssd', 'dsdg', 534, 'fgfdg', 'gdfg', '0000-00-00', '0000-00-00', '2021-09-18 02:50:50', '2021-09-18 02:50:50', 1, '1'),
(3, 2, 'ggg', 'ggg', 'ghfh', 242, '252', 'jhj', '0000-00-00', '0000-00-00', '2021-09-22 20:13:20', '2021-09-22 20:13:20', 1, '1'),
(4, 1, 'ssss', 'ssss', 'sss', 11, '4646', 'dddd2@', '2021-09-22', '2021-09-22', '2021-09-22 20:38:30', '2021-09-22 20:38:30', 1, '1'),
(5, 1, 'ccddd', 'cc', 'cc', 454, '56446', 'cc@gmail.com', '2021-09-21', '2021-09-22', '2021-09-22 20:42:25', '2021-09-22 20:42:25', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE `opcion` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `op_url` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `mostrar` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(100) NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`id`, `id_grupo`, `nombre`, `op_url`, `mostrar`, `orden`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 'Personas', 'persona', 'si', 1, '2021-09-18 02:30:58', '2021-09-18 02:30:58', 1, '1'),
(2, 1, 'Usuarios', 'usuario', 'si', 2, '2021-09-01 09:06:59', '2021-09-01 09:06:59', 1, '1'),
(3, 1, 'Usuario Roles', 'usurol', 'si', 3, '2021-09-18 02:33:35', '2021-09-18 02:33:35', 1, '1'),
(4, 1, 'Roles', 'rol', 'si', 4, '2021-09-01 09:07:46', '2021-09-01 09:07:46', 1, '1'),
(5, 1, 'Accesos', 'acceso', 'si', 5, '2021-09-01 09:08:11', '2021-09-01 09:08:11', 1, '1'),
(6, 1, 'Opciones', 'opcion', 'si', 6, '2021-09-01 09:08:31', '2021-09-01 09:08:31', 1, '1'),
(7, 1, 'Grupos', 'grupo', 'si', 7, '2021-09-01 09:09:23', '2021-09-01 09:09:23', 1, '1'),
(8, 3, 'Sistemas', 'sistema', 'si', 1, '2021-09-04 05:58:47', '2021-09-04 05:58:47', 1, '1'),
(9, 3, 'Areas', 'area', 'si', 2, '2021-09-04 08:26:08', '2021-09-04 08:26:08', 1, '1'),
(10, 3, 'Jefe de Areas', 'jefe_area', 'Mostrar', 3, '2021-09-04 08:30:42', '2021-09-04 08:30:42', 1, '1'),
(11, 3, 'Empleados', 'empleado', 'si', 4, '2021-09-04 08:27:55', '2021-09-04 08:27:55', 1, '1'),
(12, 3, 'Asignaciones', 'asignacion', 'si', 4, '2021-09-04 15:18:20', '2021-09-04 15:18:20', 1, '1'),
(13, 3, 'Tipo Empleado', 'tipo', 'Mostrar', 5, '2021-09-18 02:42:25', '2021-09-18 02:42:25', 1, '1'),
(14, 3, 'Reclamos', 'reclamo', 'si', 6, '2021-09-04 15:19:46', '2021-09-04 15:19:46', 1, '1'),
(15, 3, 'Reclamo Confirmado', 'reclamo_confirmado', 'si', 7, '2021-09-04 15:21:24', '2021-09-04 15:21:24', 1, '1'),
(16, 4, 'Por fechas', 'reporte', 'si', 1, '2021-09-04 20:13:24', '2021-09-04 20:13:24', 1, '1'),
(17, 4, 'Por genero', 'rep_genero', 'si', 2, '2021-09-04 16:01:58', '2021-09-04 16:01:58', 1, '1'),
(18, 4, 'Por parametro', 'rep_param', 'si', 3, '2021-09-04 16:03:09', '2021-09-04 16:03:09', 1, '1'),
(19, 3, 'Ajax', 'ajaxx', 'si', 10, '2021-09-05 22:40:13', '2021-09-05 22:40:13', 1, '1'),
(20, 1, 'Grupo', 'grupo', 'si', 7, '2021-09-23 02:13:32', '2021-09-23 02:13:32', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `id_sistema` int(11) NOT NULL,
  `ci` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `am` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `id_sistema`, `ci`, `nombres`, `ap`, `am`, `telefono`, `direccion`, `genero`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, '4545454', 'Eric', 'Vallejos', 'Perez', '54684', 'la Florida', 'm', '2021-09-01 05:44:45', '2021-09-01 05:44:45', 1, '1'),
(2, 1, 'thhj', 'ggg', 'ggg', 'gg', '435', 'ggg', 'm', '2021-09-18 02:34:15', '2021-09-18 02:34:15', 1, '1'),
(3, 1, '435', 'gfdgfdg', 'gfh', 'ghfgh', '5465', 'hgfh', 'm', '2021-09-18 02:34:20', '2021-09-18 02:34:20', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo`
--

CREATE TABLE `reclamo` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(100) NOT NULL,
  `correo` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `calle_avenida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `entre_que_calles` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `numero_de_casa` int(11) NOT NULL,
  `referencias` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_del_reclamo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `map` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `otro_recurrente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_del_recurrente` int(11) NOT NULL,
  `tipo_de_calzada` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo_confirmado`
--

CREATE TABLE `reclamo_confirmado` (
  `id` int(11) NOT NULL,
  `id_reclamo` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(100) NOT NULL,
  `correo` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `calle_avenida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `entre_que_calles` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `numero_de_casa` int(11) NOT NULL,
  `referencias` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_del_reclamo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotos` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `map` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `otro_recurrente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_del_recurrente` int(11) NOT NULL,
  `tipo_de_calzada` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 'Administrador', '2021-09-01 05:45:05', '2021-09-01 05:45:05', 1, '1'),
(2, 'supervisor', '2021-09-03 21:06:19', '2021-09-03 20:06:19', 1, '1'),
(3, 'sssaa', '2021-09-18 02:25:03', '2021-09-18 01:25:03', 1, '0'),
(4, 'rosass', '2021-09-18 02:19:09', '2021-09-18 01:19:09', 1, '0'),
(5, 'fff', '2021-09-18 02:11:29', '2021-09-18 01:11:29', 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_reclamo`
--

CREATE TABLE `sistema_reclamo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_creador` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sistema_reclamo`
--

INSERT INTO `sistema_reclamo` (`id`, `nombre`, `nombre_creador`, `logo`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 'cosaalt RL', 'Armando Vallejos', '1631320605_15d46cb12435b71871af.jpg', '2021-09-11 00:36:45', '2021-09-10 23:36:45', 1, '1'),
(2, 'sasa', 'sasa', '1630466801_fb118a3aff9344b4f404.jpg', '2021-09-11 00:35:06', '2021-09-10 23:35:06', 1, '0'),
(3, 'hghfg', 'jhgjghj', '1630472049_c5d8dfa4691f8ca4cb15.jpg', '2021-09-11 00:35:16', '2021-09-10 23:35:16', 1, '0'),
(4, 'ajaaa', 'yjtjytjt', '1630472122_957c9db06ef82866f679.jpg', '2021-09-11 00:35:27', '2021-09-10 23:35:27', 1, '0'),
(5, 'pppsssss', 'bhbhh', '1630719568_8c6b4372c0ed684cac59.jpg', '2021-09-11 00:35:20', '2021-09-10 23:35:20', 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id`, `tipo`, `descripcion`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 'plomero', 'mant aguapotablea', '2021-09-01 09:42:22', '2021-09-01 09:42:22', 1, '1'),
(2, 'Albanil', 'mantenimiento de alcantarillado sanitario', '2021-09-18 02:43:54', '2021-09-18 02:43:54', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `nom_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_persona`, `nom_usuario`, `clave`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 'eric', '$2y$10$gOEsRs4njj//GKflYM1raOy30vSElFeYUsNSNgkghJOu47/yuepuu', '2021-09-12 10:06:27', '2021-09-12 10:06:27', 1, '1'),
(2, 2, 'herlan', '$2y$10$FpaQt/cX5s9jvdMoSRlwaOKxdBnRLEgVfbGdH7oNLoTeJXJ56jsce', '2021-09-03 21:24:45', '2021-09-03 20:24:45', 1, '1'),
(7, 1, 'addd', '$2y$10$cJbZjfXYkrj./UEaZ22R2.l2rMc/LJwPkXn2KV4QHnUUE0agZY0eG', '2021-09-10 22:40:56', '2021-09-10 22:40:56', 1, '1'),
(8, 1, 'vvv', '$2y$10$QqA/TW03qX/iSOzDZahGyuGZX6CKQTOeiLM/710J5Dn8oKla7yPDm', '2021-09-10 23:53:42', '2021-09-10 23:53:42', 1, '1'),
(9, 1, 'rosa', '$2y$10$10oRLL.TP9kznSKDdNogLOrMagZ5cedUE2I8ZWLFWMJczPW2oAwIa', '2021-09-12 23:10:46', '2021-09-12 23:10:46', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usurol`
--

CREATE TABLE `usurol` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fec_insercion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fec_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usurol`
--

INSERT INTO `usurol` (`id`, `id_usuario`, `id_rol`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES
(1, 1, 1, '2021-09-01 05:46:24', '2021-09-01 05:46:24', 1, '1'),
(2, 2, 2, '2021-09-03 03:20:35', '2021-09-03 03:20:35', 1, '1'),
(3, 7, 3, '2021-09-10 23:12:36', '2021-09-10 23:12:36', 1, '1'),
(4, 9, 4, '2021-09-12 23:54:44', '2021-09-12 23:54:44', 1, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_opcion` (`id_opcion`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sistema` (`id_sistema`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conf` (`id_conf`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_sistema` (`id_sistema`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `jefes_area`
--
ALTER TABLE `jefes_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sistema` (`id_sistema`);

--
-- Indices de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reclamo_confirmado`
--
ALTER TABLE `reclamo_confirmado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reclamo` (`id_reclamo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sistema_reclamo`
--
ALTER TABLE `sistema_reclamo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `usurol`
--
ALTER TABLE `usurol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jefes_area`
--
ALTER TABLE `jefes_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `opcion`
--
ALTER TABLE `opcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reclamo_confirmado`
--
ALTER TABLE `reclamo_confirmado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sistema_reclamo`
--
ALTER TABLE `sistema_reclamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usurol`
--
ALTER TABLE `usurol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `acceso_ibfk_2` FOREIGN KEY (`id_opcion`) REFERENCES `opcion` (`id`),
  ADD CONSTRAINT `acceso_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`id_sistema`) REFERENCES `sistema_reclamo` (`id`);

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_conf`) REFERENCES `reclamo_confirmado` (`id`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_empleado` (`id`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`id_sistema`) REFERENCES `sistema_reclamo` (`id`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `jefes_area`
--
ALTER TABLE `jefes_area`
  ADD CONSTRAINT `jefes_area_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`);

--
-- Filtros para la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_sistema`) REFERENCES `sistema_reclamo` (`id`);

--
-- Filtros para la tabla `reclamo_confirmado`
--
ALTER TABLE `reclamo_confirmado`
  ADD CONSTRAINT `reclamo_confirmado_ibfk_1` FOREIGN KEY (`id_reclamo`) REFERENCES `reclamo` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `usurol`
--
ALTER TABLE `usurol`
  ADD CONSTRAINT `usurol_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usurol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
