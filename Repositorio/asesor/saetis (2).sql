-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2014 a las 17:06:31
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `saetis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRES_AD` varchar(45) NOT NULL,
  `APELLIDOS_AD` varchar(45) NOT NULL,
  PRIMARY KEY (`NOMBRE_U`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`NOMBRE_U`, `NOMBRES_AD`, `APELLIDOS_AD`) VALUES
('admin', 'admin', 'admin'),
('Admin1', 'Aert ', 'Sdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion`
--

CREATE TABLE IF NOT EXISTS `aplicacion` (
  `APLICACION_A` varchar(50) NOT NULL,
  PRIMARY KEY (`APLICACION_A`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE IF NOT EXISTS `asesor` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRES_A` varchar(50) NOT NULL,
  `APELLIDOS_A` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMBRE_U`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`NOMBRE_U`, `NOMBRES_A`, `APELLIDOS_A`) VALUES
('Boris', 'Boris', 'Calancha'),
('Leticia', 'Leticia', 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE IF NOT EXISTS `asignacion` (
  `ID_R` int(11) NOT NULL,
  `EMISOR_A` varchar(30) NOT NULL,
  `RECEPTOR_A` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `ID_R` int(11) NOT NULL,
  `CODIGO_SOCIO_A` int(11) NOT NULL,
  `ASISTENCIA_A` tinyint(1) NOT NULL,
  `LICENCIA_A` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_R`,`CODIGO_SOCIO_A`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `ID_C` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `ID_N` int(11) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `FECHA_C` datetime NOT NULL,
  `AUTOR_C` text NOT NULL,
  PRIMARY KEY (`ID_C`,`NOMBRE_U`,`ID_N`),
  KEY `fk_comentarios_noticias1_idx` (`ID_N`,`NOMBRE_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID_C`, `NOMBRE_U`, `ID_N`, `COMENTARIO`, `FECHA_C`, `AUTOR_C`) VALUES
(6, 'Boris', 3, 'asdsduus', '2014-11-11 11:21:46', 'Boris'),
(7, 'Boris', 3, 'salkxasckm', '2014-11-11 11:22:05', 'Boris'),
(8, 'Boris', 3, 'sdkhksa,sa', '2014-11-11 11:22:28', 'Boris'),
(9, 'Boris', 3, 'asdnklas', '2014-11-11 11:22:36', 'Boris'),
(10, 'Boris', 2, 'hjhnj', '2014-11-11 11:23:56', 'Boris'),
(11, 'Boris', 2, 'hjkk,', '2014-11-11 11:24:03', 'Boris'),
(12, 'Boris', 2, 'hjjjj', '2014-11-11 11:24:10', 'Boris'),
(13, 'Boris', 2, 'Cuando?', '2014-11-26 14:33:39', 'Boris'),
(14, 'Boris', 3, 'que es lo que significa??', '2014-11-26 14:34:37', 'Leticia'),
(15, 'Boris', 3, 'Asds', '2014-11-26 14:35:59', 'Bittle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criteriocalificacion`
--

CREATE TABLE IF NOT EXISTS `criteriocalificacion` (
  `ID_CRITERIO_C` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_CRITERIO_C` varchar(45) NOT NULL,
  `TIPO_CRITERIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CRITERIO_C`,`NOMBRE_U`),
  KEY `fk_criterioCalificacion_asesor1_idx` (`NOMBRE_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `criteriocalificacion`
--

INSERT INTO `criteriocalificacion` (`ID_CRITERIO_C`, `NOMBRE_U`, `NOMBRE_CRITERIO_C`, `TIPO_CRITERIO`) VALUES
(1, 'Boris', 'PUNTAJE', 4),
(2, 'Boris', 'A(50)B(30)', 1),
(3, 'Leticia', 'A(80)B(50)C(30)', 1),
(4, 'Leticia', 'Verdadero(80)Falso(20)', 2),
(5, 'Leticia', 'PUNTAJE', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio_evaluacion`
--

CREATE TABLE IF NOT EXISTS `criterio_evaluacion` (
  `ID_CRITERIO_E` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_CRITERIO_E` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_CRITERIO_E`,`NOMBRE_U`),
  KEY `fk_criterio_evaluacion_asesor1_idx` (`NOMBRE_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `criterio_evaluacion`
--

INSERT INTO `criterio_evaluacion` (`ID_CRITERIO_E`, `NOMBRE_U`, `NOMBRE_CRITERIO_E`) VALUES
(1, 'Leticia', 'uso de herramientas'),
(2, 'Leticia', 'Puntualidad en la presentacion'),
(3, 'Leticia', 'Presentacion de la documentacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

CREATE TABLE IF NOT EXISTS `descripcion` (
  `ID_R` int(11) NOT NULL,
  `DESCRIPCION_D` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`ID_R`, `DESCRIPCION_D`) VALUES
(78, 'jauuja*TODOS'),
(79, 'Prueba...*Bittle SRL'),
(80, 'CPTIS*Bittle SRL'),
(81, 'este es el orden de cambio*Bittle SRL'),
(83, 'ivan ivan*TODOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `ID_D` int(11) NOT NULL AUTO_INCREMENT,
  `ID_R` int(11) NOT NULL,
  `TAMANIO_D` int(11) NOT NULL,
  `RUTA_D` varchar(100) NOT NULL,
  `VISUALIZABLE_D` tinyint(1) NOT NULL,
  `DESCARGABLE_D` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_D`) USING BTREE,
  KEY `FK_REGISTRO_DOCUMENTO` (`ID_R`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`ID_D`, `ID_R`, `TAMANIO_D`, `RUTA_D`, `VISUALIZABLE_D`, `DESCARGABLE_D`) VALUES
(34, 78, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/20141101.pdf', 0, 0),
(35, 79, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/PETIS2014.pdf', 0, 0),
(36, 80, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/CPETIS2014.pdf', 0, 0),
(37, 81, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/20141101.pdf', 0, 0),
(38, 83, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/carta.docx', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `ID_R` int(11) NOT NULL,
  `ENTREGABLE_P` varchar(30) NOT NULL,
  `ENTREGADO_P` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_R`,`ENTREGABLE_P`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregable`
--

CREATE TABLE IF NOT EXISTS `entregable` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ENTREGABLE_E` char(30) NOT NULL,
  `DESCRIPCION_E` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMBRE_U`,`ENTREGABLE_E`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `ESTADO_E` varchar(50) NOT NULL,
  PRIMARY KEY (`ESTADO_E`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ESTADO_E`) VALUES
('Deshabilitado'),
('Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_realizacion`
--

CREATE TABLE IF NOT EXISTS `fecha_realizacion` (
  `ID_R` int(11) NOT NULL,
  `FECHA_FR` date NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ID_FORM` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_FORM` varchar(45) NOT NULL,
  `ESTADO_FORM` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_FORM`,`NOMBRE_U`),
  KEY `fk_formulario_asesor1_idx` (`NOMBRE_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_U`, `NOMBRE_FORM`, `ESTADO_FORM`) VALUES
(1, 'Leticia', 'formulario1', 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_crit_e`
--

CREATE TABLE IF NOT EXISTS `form_crit_e` (
  `ID_FORM_CRIT_E` int(11) NOT NULL AUTO_INCREMENT,
  `ID_FORM` int(11) NOT NULL,
  `ID_CRITERIO_E` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORM_CRIT_E`),
  KEY `fk_formulario_has_criterio_evaluacion_criterio_evaluacion1_idx` (`ID_CRITERIO_E`),
  KEY `fk_formulario_has_criterio_evaluacion_formulario1_idx` (`ID_FORM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `form_crit_e`
--

INSERT INTO `form_crit_e` (`ID_FORM_CRIT_E`, `ID_FORM`, `ID_CRITERIO_E`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `from_crit_c`
--

CREATE TABLE IF NOT EXISTS `from_crit_c` (
  `ID_FORM_CRIT_C` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CRITERIO_C` int(11) NOT NULL,
  `ID_FORM` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORM_CRIT_C`),
  KEY `fk_criterioCalificacion_has_formulario_formulario1_idx` (`ID_FORM`),
  KEY `fk_criterioCalificacion_has_formulario_criterioCalificacion_idx` (`ID_CRITERIO_C`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `from_crit_c`
--

INSERT INTO `from_crit_c` (`ID_FORM_CRIT_C`, `ID_CRITERIO_C`, `ID_FORM`) VALUES
(1, 3, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE IF NOT EXISTS `gestion` (
  `ID_G` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_G` varchar(45) NOT NULL,
  `FECHA_INICIO_G` date NOT NULL,
  `FECHA_FIN_G` date NOT NULL,
  PRIMARY KEY (`ID_G`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`ID_G`, `NOM_G`, `FECHA_INICIO_G`, `FECHA_FIN_G`) VALUES
(1, 'Semestre I/2014', '2014-03-10', '2014-06-20'),
(2, 'Semestre II/2014', '2014-08-18', '2014-12-05'),
(3, 'Semestre I/2015', '2015-04-01', '2015-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_empresa`
--

CREATE TABLE IF NOT EXISTS `grupo_empresa` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_CORTO_GE` char(50) NOT NULL,
  `NOMBRE_LARGO_GE` varchar(50) NOT NULL,
  `DIRECCION_GE` varchar(50) NOT NULL,
  `REPRESENTANTE_LEGAL_GE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`NOMBRE_U`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `grupo_empresa`
--

INSERT INTO `grupo_empresa` (`NOMBRE_U`, `NOMBRE_CORTO_GE`, `NOMBRE_LARGO_GE`, `DIRECCION_GE`, `REPRESENTANTE_LEGAL_GE`) VALUES
('Bittle', 'Bittle', 'Bittle SRL', 'Calle Canada Cochabamba', 'Alejandra Vargas Pinto'),
('bolivia', 'bolivia', 'bolivia soft', 'umss', 'Jhony Bravo'),
('Colective', 'Colective', 'Colective Virtual SRL', 'Av Peru', ''),
('HighBits', 'HighB', 'High Bits', 'Av. Ingavi', ''),
('Unisoft', 'Unisoft', 'Unisofttt', 'Av. Oquendo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE IF NOT EXISTS `indicador` (
  `ID_INDICADOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CRITERIO_C` int(11) NOT NULL,
  `NOMBRE_INDICADOR` varchar(45) NOT NULL,
  `PUNTAJE_INDICADOR` int(11) NOT NULL,
  PRIMARY KEY (`ID_INDICADOR`,`ID_CRITERIO_C`),
  KEY `fk_indicador_criterioCalificacion1_idx` (`ID_CRITERIO_C`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`ID_INDICADOR`, `ID_CRITERIO_C`, `NOMBRE_INDICADOR`, `PUNTAJE_INDICADOR`) VALUES
(1, 2, 'A', 50),
(2, 2, 'B', 30),
(3, 3, 'A', 80),
(4, 3, 'B', 50),
(5, 3, 'C', 30),
(6, 4, 'Verdadero', 80),
(7, 4, 'Falso', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `NOMBRE_UA` varchar(50) NOT NULL,
  `NOMBRE_UGE` varchar(50) NOT NULL,
  `ID_G` int(11) NOT NULL,
  `CODIGO_P` int(11) NOT NULL,
  PRIMARY KEY (`NOMBRE_UGE`,`NOMBRE_UA`,`ID_G`,`CODIGO_P`) USING BTREE,
  KEY `FK_ASESOR__INSCRIPCION` (`NOMBRE_UA`) USING BTREE,
  KEY `FK_GESTION__INSCRIPCION` (`ID_G`) USING BTREE,
  KEY `FK_PROYECTO__INSCRIPCION` (`CODIGO_P`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`NOMBRE_UA`, `NOMBRE_UGE`, `ID_G`, `CODIGO_P`) VALUES
('Boris', 'bolivia', 1, 1),
('Leticia', 'Bittle', 2, 1),
('Boris', 'Unisoft', 2, 1),
('Boris', 'HighBits', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `ID_R` int(11) NOT NULL,
  `ASUNTO_M` varchar(30) NOT NULL,
  `MENSAJE_M` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_menu` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ID_N` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `CALIF_N` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_N`,`NOMBRE_U`),
  KEY `fk_nota_grupo_empresa1_idx` (`NOMBRE_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ID_N`, `NOMBRE_U`, `CALIF_N`) VALUES
(1, 'Bittle', 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `ID_N` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `TITULO` text NOT NULL,
  `FECHA_N` datetime NOT NULL,
  `VIEWS` int(11) NOT NULL,
  `TEXTO` text NOT NULL,
  PRIMARY KEY (`ID_N`,`NOMBRE_U`),
  KEY `fk_noticias_usuario1_idx` (`NOMBRE_U`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID_N`, `NOMBRE_U`, `TITULO`, `FECHA_N`, `VIEWS`, `TEXTO`) VALUES
(2, 'Boris', 'prueba2', '2014-11-10 12:02:31', 20, 'examen'),
(3, 'Boris', 'duda1', '2014-11-11 11:20:06', 22, 'que s loque significa lo de la seccion 1.3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `ID_R` int(11) NOT NULL,
  `MONTO_P` decimal(10,0) NOT NULL,
  `PORCENTAJE_DEL_TOTAL_P` int(11) NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `ID_R` int(11) NOT NULL,
  `fecha_p` date NOT NULL,
  `hora_p` time NOT NULL,
  PRIMARY KEY (`ID_R`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`ID_R`, `fecha_p`, `hora_p`) VALUES
(78, '2014-11-08', '14:00:00'),
(79, '2014-12-12', '01:59:00'),
(80, '2014-11-09', '14:30:00'),
(81, '2014-11-13', '00:12:00'),
(83, '2014-11-10', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `ROL_R` varchar(50) NOT NULL,
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `fk_rol_has_menu_rol1_idx` (`ROL_R`),
  KEY `fk_permisos_menu1_idx` (`menu_id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE IF NOT EXISTS `planificacion` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ESTADO_E` varchar(50) NOT NULL,
  `FECHA_INICIO_P` date NOT NULL,
  `FECHA_FIN_P` date NOT NULL,
  PRIMARY KEY (`NOMBRE_U`) USING BTREE,
  KEY `FK_ESTADO__PLANIFICACION` (`ESTADO_E`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazo`
--

CREATE TABLE IF NOT EXISTS `plazo` (
  `ID_R` int(11) NOT NULL,
  `FECHA_INICIO_PL` date NOT NULL,
  `FECHA_FIN_PL` date NOT NULL,
  `HORA_INICIO_PL` time NOT NULL,
  `HORA_FIN_PL` time NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `plazo`
--

INSERT INTO `plazo` (`ID_R`, `FECHA_INICIO_PL`, `FECHA_FIN_PL`, `HORA_INICIO_PL`, `HORA_FIN_PL`) VALUES
(1, '2014-11-11', '2014-11-19', '12:00:00', '12:00:00'),
(2, '2014-11-12', '2014-11-20', '12:00:00', '12:00:00'),
(3, '2014-11-12', '2014-11-20', '12:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE IF NOT EXISTS `precio` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `PRECIO_P` decimal(10,0) NOT NULL,
  PRIMARY KEY (`NOMBRE_U`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `CODIGO_P` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_P` varchar(50) NOT NULL,
  `DESCRIPCION_P` varchar(200) NOT NULL,
  PRIMARY KEY (`CODIGO_P`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`CODIGO_P`, `NOMBRE_P`, `DESCRIPCION_P`) VALUES
(1, 'Saetis', 'Sistema de apoyo a la empresa TIS'),
(2, 'Saee', 'Ssss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE IF NOT EXISTS `puntaje` (
  `PUNTAJE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_FORM` int(11) NOT NULL,
  `PUNTAJE` int(11) NOT NULL,
  PRIMARY KEY (`PUNTAJE_ID`,`ID_FORM`),
  KEY `fk_puntaje_formulario1_idx` (`ID_FORM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`PUNTAJE_ID`, `ID_FORM`, `PUNTAJE`) VALUES
(1, 1, 50),
(2, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `ID_R` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `TIPO_T` varchar(50) NOT NULL,
  `ESTADO_E` varchar(50) NOT NULL,
  `NOMBRE_R` varchar(50) NOT NULL,
  `FECHA_R` date NOT NULL,
  `HORA_R` time NOT NULL,
  PRIMARY KEY (`ID_R`) USING BTREE,
  KEY `FK_ESTADO__REGISTRO` (`ESTADO_E`) USING BTREE,
  KEY `FK_TIPO__REGISTRO` (`TIPO_T`) USING BTREE,
  KEY `FK_USUARIO_REGISTRO` (`NOMBRE_U`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=85 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`ID_R`, `NOMBRE_U`, `TIPO_T`, `ESTADO_E`, `NOMBRE_R`, `FECHA_R`, `HORA_R`) VALUES
(1, 'Boris', 'documento requerido', 'Habilitado', 'PARTE A', '2014-11-11', '12:00:00'),
(2, 'Boris', 'documento requerido', 'Habilitado', 'PARTE B', '2014-11-19', '12:00:00'),
(3, 'Boris', 'documento requerido', 'Habilitado', 'OTRO', '2014-11-25', '12:00:00'),
(78, 'Leticia', 'publicaciones', 'Habilitado', 'prueba1', '2014-11-10', '15:15:25'),
(79, 'Leticia', 'publicaciones', 'Habilitado', 'PETIS', '2014-11-10', '15:15:27'),
(80, 'Leticia', 'publicaciones', 'Habilitado', 'CPTIS', '2014-11-10', '15:15:28'),
(81, 'Boris', 'publicaciones', 'Habilitado', 'Orden de cambio', '2014-11-10', '16:16:54'),
(83, 'Boris', 'publicaciones', 'Habilitado', 'ivan', '2014-11-29', '16:16:54'),
(84, 'Boris', 'publico', 'Habilitado', 'esto es una prueba', '2014-11-04', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `ID_R` int(11) NOT NULL,
  `ROL_RR` varchar(50) NOT NULL,
  `ACTIVIDAD_R` varchar(100) NOT NULL,
  `HECHO_R` tinyint(1) NOT NULL,
  `RESULTADO_R` varchar(200) NOT NULL,
  `CONCLUSION_R` varchar(200) NOT NULL,
  `OBSERVACION_R` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_R`,`ROL_RR`) USING BTREE,
  KEY `FK_ROL_REPORTE__REPORTE` (`ROL_RR`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_R` varchar(50) NOT NULL,
  PRIMARY KEY (`ROL_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ROL_R`) VALUES
('administrador'),
('asesor'),
('grupoEmpresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_aplicacion`
--

CREATE TABLE IF NOT EXISTS `rol_aplicacion` (
  `ROL_R` varchar(50) NOT NULL,
  `APLICACION_A` varchar(50) NOT NULL,
  PRIMARY KEY (`ROL_R`,`APLICACION_A`) USING BTREE,
  KEY `FK_APLICACION__ROL_APLICACION` (`APLICACION_A`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_reporte`
--

CREATE TABLE IF NOT EXISTS `rol_reporte` (
  `ROL_RR` varchar(50) NOT NULL,
  PRIMARY KEY (`ROL_RR`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `ID_S` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `FECHA_S` date NOT NULL,
  `HORA_S` time NOT NULL,
  `IP_S` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_S`) USING BTREE,
  KEY `FK_USUARIO_SESION` (`NOMBRE_U`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=256 ;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`ID_S`, `NOMBRE_U`, `FECHA_S`, `HORA_S`, `IP_S`) VALUES
(1, 'Leticia', '2014-11-10', '01:04:24', '::1'),
(2, 'Leticia', '2014-11-10', '01:04:28', '::1'),
(3, 'bolivia', '2014-11-10', '02:33:20', '::1'),
(4, 'bolivia', '2014-11-10', '02:33:28', '::1'),
(5, 'bolivia', '2014-11-10', '02:34:17', '::1'),
(6, 'bolivia', '2014-11-10', '02:34:30', '::1'),
(7, 'bolivia', '2014-11-10', '02:35:30', '::1'),
(8, 'bolivia', '2014-11-10', '02:35:44', '::1'),
(9, 'bolivia', '2014-11-10', '02:38:30', '::1'),
(10, 'bolivia', '2014-11-10', '02:39:33', '::1'),
(12, 'Leticia', '2014-11-10', '02:41:54', '::1'),
(13, 'Leticia', '2014-11-10', '02:41:59', '::1'),
(14, 'admin', '2014-11-10', '02:46:31', '::1'),
(15, 'admin', '2014-11-10', '02:59:49', '::1'),
(16, 'admin', '2014-11-10', '03:00:37', '::1'),
(17, 'Boris', '2014-11-10', '03:01:29', '::1'),
(18, 'Boris', '2014-11-10', '03:02:39', '::1'),
(19, 'Boris', '2014-11-10', '03:09:44', '::1'),
(20, 'Leticia', '2014-11-10', '03:15:56', '::1'),
(21, 'Leticia', '2014-11-10', '03:32:19', '::1'),
(22, 'Leticia', '2014-11-10', '03:45:22', '::1'),
(23, 'Leticia', '2014-11-10', '03:45:29', '::1'),
(24, 'Leticia', '2014-11-10', '03:48:17', '::1'),
(25, 'Leticia', '2014-11-10', '03:49:17', '::1'),
(26, 'Leticia', '2014-11-10', '03:49:30', '::1'),
(27, 'Leticia', '2014-11-10', '03:50:43', '::1'),
(28, 'Leticia', '2014-11-10', '03:51:22', '::1'),
(29, 'Leticia', '2014-11-10', '03:51:26', '::1'),
(30, 'Leticia', '2014-11-10', '03:51:29', '::1'),
(31, 'Leticia', '2014-11-10', '03:53:29', '::1'),
(32, 'Leticia', '2014-11-10', '03:53:41', '::1'),
(33, 'Leticia', '2014-11-10', '03:59:15', '::1'),
(34, 'Leticia', '2014-11-10', '04:02:12', '::1'),
(35, 'Leticia', '2014-11-10', '04:03:03', '::1'),
(36, 'Boris', '2014-11-10', '04:05:23', '::1'),
(37, 'Boris', '2014-11-10', '04:06:59', '::1'),
(38, 'Leticia', '2014-11-10', '04:10:38', '::1'),
(39, 'Leticia', '2014-11-10', '04:10:49', '::1'),
(40, 'Leticia', '2014-11-10', '04:10:54', '::1'),
(41, 'Leticia', '2014-11-10', '04:10:59', '::1'),
(42, 'Leticia', '2014-11-10', '04:11:05', '::1'),
(43, 'Leticia', '2014-11-10', '04:11:12', '::1'),
(44, 'Leticia', '2014-11-10', '04:11:17', '::1'),
(45, 'Leticia', '2014-11-10', '04:11:24', '::1'),
(46, 'Leticia', '2014-11-10', '04:11:31', '::1'),
(47, 'Leticia', '2014-11-10', '04:11:38', '::1'),
(48, 'Leticia', '2014-11-10', '04:11:46', '::1'),
(49, 'Leticia', '2014-11-10', '04:12:02', '::1'),
(50, 'Leticia', '2014-11-10', '04:12:13', '::1'),
(51, 'Boris', '2014-11-10', '04:52:42', '::1'),
(52, 'Boris', '2014-11-10', '04:52:57', '::1'),
(53, 'Boris', '2014-11-10', '04:54:58', '::1'),
(54, 'Boris', '2014-11-10', '05:02:16', '::1'),
(55, 'Boris', '2014-11-10', '05:14:54', '::1'),
(56, 'Boris', '2014-11-10', '05:18:04', '::1'),
(57, 'bolivia', '2014-11-11', '04:18:58', '::1'),
(58, 'bolivia', '2014-11-11', '04:19:01', '::1'),
(59, 'Boris', '2014-11-11', '04:19:27', '::1'),
(60, 'admin', '2014-11-11', '05:26:42', '::1'),
(61, 'admin', '2014-11-11', '05:32:08', '::1'),
(62, 'admin', '2014-11-11', '05:34:26', '::1'),
(63, 'admin', '2014-11-11', '05:35:49', '::1'),
(64, 'admin', '2014-11-11', '05:36:41', '::1'),
(65, 'admin', '2014-11-12', '03:58:38', '::1'),
(66, 'Leticia', '2014-11-12', '04:00:05', '::1'),
(67, 'Leticia', '2014-11-12', '04:00:23', '::1'),
(68, 'Leticia', '2014-11-12', '04:00:27', '::1'),
(69, 'Leticia', '2014-11-12', '04:00:31', '::1'),
(70, 'Leticia', '2014-11-12', '06:24:46', '::1'),
(71, 'Leticia', '2014-11-12', '06:25:00', '::1'),
(72, 'Boris', '2014-11-12', '09:32:57', '::1'),
(73, 'Boris', '2014-11-12', '09:34:02', '::1'),
(74, 'Boris', '2014-11-12', '09:34:49', '::1'),
(75, 'Boris', '2014-11-12', '09:35:10', '::1'),
(76, 'bolivia', '2014-11-12', '09:36:09', '::1'),
(77, 'bolivia', '2014-11-12', '09:36:59', '::1'),
(78, 'bolivia', '2014-11-12', '09:37:11', '::1'),
(79, 'bolivia', '2014-11-12', '09:37:43', '::1'),
(80, 'bolivia', '2014-11-12', '09:37:59', '::1'),
(81, 'bolivia', '2014-11-12', '09:38:00', '::1'),
(82, 'bolivia', '2014-11-12', '09:38:47', '::1'),
(83, 'Boris', '2014-11-12', '09:42:01', '::1'),
(84, 'Boris', '2014-11-12', '09:46:53', '::1'),
(85, 'Boris', '2014-11-12', '09:47:05', '::1'),
(86, 'Boris', '2014-11-12', '10:47:15', '::1'),
(87, 'admin', '2014-11-12', '10:49:21', '::1'),
(88, 'Leticia', '2014-11-12', '11:22:49', '::1'),
(89, 'Bittle', '2014-11-19', '10:02:13', '::1'),
(90, 'Bittle', '2014-11-19', '10:11:27', '::1'),
(91, 'Bittle', '2014-11-26', '01:50:42', '::1'),
(92, 'Bittle', '2014-11-26', '01:51:51', '::1'),
(93, 'Bittle', '2014-11-26', '01:52:02', '::1'),
(94, 'Bittle', '2014-11-26', '01:52:04', '::1'),
(95, 'Bittle', '2014-11-26', '01:52:06', '::1'),
(96, 'Bittle', '2014-11-26', '01:52:17', '::1'),
(97, 'Bittle', '2014-11-26', '01:56:37', '::1'),
(98, 'Bittle', '2014-11-26', '01:59:11', '::1'),
(99, 'Bittle', '2014-11-26', '02:16:56', '::1'),
(100, 'Bittle', '2014-11-26', '02:17:01', '::1'),
(101, 'Bittle', '2014-11-26', '02:17:11', '::1'),
(102, 'Bittle', '2014-11-26', '02:17:24', '::1'),
(103, 'Bittle', '2014-11-26', '02:17:29', '::1'),
(104, 'Bittle', '2014-11-26', '02:19:19', '::1'),
(105, 'Boris', '2014-11-26', '07:33:14', '::1'),
(106, 'Leticia', '2014-11-26', '07:34:13', '::1'),
(107, 'Bittle', '2014-11-26', '07:35:39', '::1'),
(108, 'Bittle', '2014-11-26', '07:36:29', '::1'),
(109, 'admin', '2014-11-26', '07:36:37', '::1'),
(110, 'admin', '2014-11-26', '07:37:12', '::1'),
(111, 'admin', '2014-11-26', '07:38:58', '::1'),
(112, 'admin', '2014-11-26', '07:49:15', '::1'),
(113, 'admin', '2014-11-26', '07:53:09', '::1'),
(114, 'admin', '2014-11-26', '07:54:58', '::1'),
(115, 'admin', '2014-11-26', '08:01:47', '::1'),
(116, 'admin', '2014-11-26', '08:07:22', '::1'),
(117, 'Leticia', '2014-11-26', '09:21:00', '::1'),
(118, 'Leticia', '2014-11-26', '09:21:12', '::1'),
(119, 'Leticia', '2014-11-26', '09:21:25', '::1'),
(120, 'Leticia', '2014-11-26', '09:21:32', '::1'),
(121, 'Leticia', '2014-11-26', '09:21:44', '::1'),
(122, 'Leticia', '2014-11-26', '09:24:10', '::1'),
(123, 'Leticia', '2014-11-26', '09:24:14', '::1'),
(124, 'Leticia', '2014-11-26', '09:24:15', '::1'),
(125, 'Leticia', '2014-11-26', '09:24:21', '::1'),
(126, 'Leticia', '2014-11-26', '09:24:24', '::1'),
(127, 'admin', '2014-11-26', '09:24:31', '::1'),
(128, 'admin', '2014-11-26', '09:24:36', '::1'),
(129, 'admin', '2014-11-26', '09:24:45', '::1'),
(130, 'Bittle', '2014-11-26', '09:27:13', '::1'),
(131, 'Bittle', '2014-11-26', '10:08:10', '::1'),
(132, 'Bittle', '2014-11-26', '10:09:00', '::1'),
(133, 'Bittle', '2014-11-26', '10:09:01', '::1'),
(134, 'Bittle', '2014-11-27', '01:47:39', '::1'),
(136, 'Bittle', '2014-11-28', '04:19:47', '::1'),
(137, 'Bittle', '2014-11-28', '04:21:31', '::1'),
(138, 'Leticia', '2014-11-28', '04:21:42', '::1'),
(139, 'Leticia', '2014-11-28', '04:21:55', '::1'),
(140, 'Leticia', '2014-11-28', '04:22:04', '::1'),
(141, 'Leticia', '2014-11-28', '04:22:10', '::1'),
(142, 'Leticia', '2014-11-28', '04:22:22', '::1'),
(143, 'Leticia', '2014-11-28', '04:23:14', '::1'),
(144, 'Leticia', '2014-11-28', '04:23:34', '::1'),
(145, 'Leticia', '2014-11-28', '04:23:45', '::1'),
(146, 'Leticia', '2014-11-28', '04:25:42', '::1'),
(147, 'Leticia', '2014-11-28', '04:25:44', '::1'),
(148, 'Leticia', '2014-11-28', '04:25:46', '::1'),
(149, 'Leticia', '2014-11-28', '04:25:51', '::1'),
(150, 'Leticia', '2014-11-28', '04:26:06', '::1'),
(151, 'Leticia', '2014-11-28', '04:27:24', '::1'),
(152, 'Leticia', '2014-11-28', '04:27:38', '::1'),
(153, 'Leticia', '2014-11-28', '04:31:42', '::1'),
(154, 'Leticia', '2014-11-28', '04:37:30', '::1'),
(155, 'Leticia', '2014-11-28', '04:37:32', '::1'),
(156, 'Leticia', '2014-11-28', '04:37:34', '::1'),
(157, 'Leticia', '2014-11-28', '04:37:35', '::1'),
(158, 'Leticia', '2014-11-28', '04:38:21', '::1'),
(159, 'Leticia', '2014-11-28', '04:38:25', '::1'),
(160, 'Leticia', '2014-11-28', '04:38:29', '::1'),
(161, 'Leticia', '2014-11-28', '04:38:34', '::1'),
(162, 'Leticia', '2014-11-28', '04:38:48', '::1'),
(163, 'Leticia', '2014-11-28', '04:38:49', '::1'),
(164, 'Leticia', '2014-11-28', '04:38:50', '::1'),
(165, 'Leticia', '2014-11-28', '04:38:51', '::1'),
(166, 'Leticia', '2014-11-28', '04:38:53', '::1'),
(167, 'Leticia', '2014-11-28', '04:39:20', '::1'),
(168, 'Leticia', '2014-11-28', '04:39:22', '::1'),
(169, 'Leticia', '2014-11-28', '04:39:24', '::1'),
(170, 'Bittle', '2014-11-29', '08:43:06', '::1'),
(171, 'Bittle', '2014-11-29', '08:45:47', '::1'),
(172, 'Bittle', '2014-11-29', '08:58:36', '::1'),
(173, 'Bittle', '2014-11-29', '09:05:37', '::1'),
(174, 'Bittle', '2014-11-29', '09:19:52', '::1'),
(175, 'Bittle', '2014-11-29', '09:20:34', '::1'),
(176, 'Bittle', '2014-11-29', '09:20:37', '::1'),
(177, 'Bittle', '2014-11-29', '09:21:39', '::1'),
(178, 'Bittle', '2014-11-29', '09:23:06', '::1'),
(179, 'Bittle', '2014-11-29', '09:23:37', '::1'),
(180, 'Bittle', '2014-11-29', '09:24:36', '::1'),
(181, 'Bittle', '2014-11-29', '09:29:30', '::1'),
(182, 'Bittle', '2014-11-29', '09:29:33', '::1'),
(183, 'Bittle', '2014-11-29', '09:29:56', '::1'),
(184, 'Bittle', '2014-11-29', '09:30:57', '::1'),
(185, 'Bittle', '2014-11-29', '09:36:27', '::1'),
(186, 'Bittle', '2014-11-29', '09:38:01', '::1'),
(187, 'Bittle', '2014-11-29', '10:02:21', '::1'),
(188, 'Bittle', '2014-11-29', '10:02:21', '::1'),
(189, 'Bittle', '2014-11-29', '10:06:21', '::1'),
(190, 'Bittle', '2014-11-29', '10:06:24', '::1'),
(191, 'Bittle', '2014-11-29', '10:07:26', '::1'),
(192, 'Bittle', '2014-11-29', '10:07:45', '::1'),
(193, 'Bittle', '2014-11-29', '10:07:49', '::1'),
(194, 'Bittle', '2014-11-29', '10:07:59', '::1'),
(204, 'Leticia', '2014-11-29', '10:26:44', '::1'),
(205, 'Leticia', '2014-11-29', '10:26:57', '::1'),
(206, 'Leticia', '2014-11-29', '10:28:34', '::1'),
(207, 'Leticia', '2014-11-29', '10:29:35', '::1'),
(208, 'Leticia', '2014-11-29', '10:33:53', '::1'),
(209, 'Leticia', '2014-11-29', '10:33:58', '::1'),
(210, 'Leticia', '2014-11-29', '10:34:09', '::1'),
(211, 'Leticia', '2014-11-29', '10:36:29', '::1'),
(212, 'Leticia', '2014-11-29', '10:36:46', '::1'),
(213, 'Leticia', '2014-11-29', '10:37:39', '::1'),
(214, 'Leticia', '2014-11-29', '10:38:49', '::1'),
(215, 'Leticia', '2014-11-29', '10:38:50', '::1'),
(216, 'Leticia', '2014-11-29', '10:38:54', '::1'),
(217, 'Leticia', '2014-11-29', '10:52:58', '::1'),
(218, 'Leticia', '2014-11-29', '10:54:21', '::1'),
(219, 'Leticia', '2014-11-29', '10:57:00', '::1'),
(220, 'Leticia', '2014-11-29', '10:59:41', '::1'),
(221, 'Leticia', '2014-11-29', '10:59:50', '::1'),
(222, 'Bittle', '2014-11-29', '11:16:09', '::1'),
(223, 'Bittle', '2014-11-29', '11:16:31', '::1'),
(224, 'Unisoft', '2014-11-29', '11:21:45', '::1'),
(225, 'Unisoft', '2014-11-29', '11:24:27', '::1'),
(226, 'Unisoft', '2014-11-29', '11:26:36', '::1'),
(227, 'Unisoft', '2014-11-29', '11:26:39', '::1'),
(228, 'Unisoft', '2014-11-29', '11:27:41', '::1'),
(229, 'Unisoft', '2014-11-29', '11:27:42', '::1'),
(230, 'Unisoft', '2014-11-29', '11:27:48', '::1'),
(231, 'Unisoft', '2014-11-29', '11:28:17', '::1'),
(232, 'Unisoft', '2014-11-29', '11:32:53', '::1'),
(233, 'Unisoft', '2014-11-29', '11:32:57', '::1'),
(234, 'admin', '2014-11-29', '11:33:03', '::1'),
(235, 'HighBits', '2014-11-29', '11:40:07', '::1'),
(236, 'HighBits', '2014-11-29', '11:40:10', '::1'),
(237, 'HighBits', '2014-11-29', '11:40:48', '::1'),
(238, 'HighBits', '2014-11-29', '11:40:58', '::1'),
(239, 'HighBits', '2015-02-01', '11:41:57', '::1'),
(240, 'HighBits', '2015-02-01', '11:42:11', '::1'),
(241, 'HighBits', '2015-05-01', '12:42:39', '::1'),
(242, 'admin', '2014-11-29', '04:46:41', '::1'),
(243, 'admin', '2014-11-29', '04:46:53', '::1'),
(244, 'Boris', '2014-11-29', '04:47:39', '::1'),
(245, 'Boris', '2014-11-29', '04:47:45', '::1'),
(248, 'Bittle', '2014-11-29', '04:49:28', '::1'),
(249, 'Bittle', '2014-11-29', '04:49:39', '::1'),
(250, 'Bittle', '2014-11-29', '04:50:20', '::1'),
(251, 'Boris', '2014-11-29', '04:52:39', '::1'),
(252, 'admin', '2014-11-29', '04:59:13', '::1'),
(253, 'admin', '2014-11-29', '05:02:34', '::1'),
(254, 'admin', '2014-11-29', '05:02:39', '::1'),
(255, 'admin', '2014-11-29', '05:02:42', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `CODIGO_S` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRES_S` varchar(50) NOT NULL,
  `APELLIDOS_S` varchar(50) NOT NULL,
  `LOGIN_S` varchar(45) NOT NULL,
  `PASSWORD_S` varchar(45) NOT NULL,
  PRIMARY KEY (`CODIGO_S`) USING BTREE,
  KEY `FK_GRUPO_EMPRESA__SOCIO` (`NOMBRE_U`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=819 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`CODIGO_S`, `NOMBRE_U`, `NOMBRES_S`, `APELLIDOS_S`, `LOGIN_S`, `PASSWORD_S`) VALUES
(21, 'Bittle', 'Ivan', 'Morales Camacho', 'Ivann', '*Ivan*123*'),
(22, 'Bittle', 'Jhonny', 'Crespo Coca', 'Jhonny', '*Jhonny*123*'),
(23, 'Bittle', 'Ana', 'Medrano Ocana', 'AnaMe', '*Anna*123*'),
(24, 'Bittle', 'Alejandra', 'Vargas Pinto', 'Alevap', '*AleVap*123*'),
(25, 'bolivia', 'Jhony', 'Bravo', 'jhony', 'Bravo*123'),
(26, 'bolivia', 'Ivan', 'Medrano', 'attivanm', 'Ivan*123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `TIPO_T` varchar(50) NOT NULL,
  PRIMARY KEY (`TIPO_T`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`TIPO_T`) VALUES
('documento requerido'),
('publicaciones'),
('publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ESTADO_E` varchar(50) NOT NULL,
  `PASSWORD_U` varchar(50) NOT NULL,
  `TELEFONO_U` varchar(8) NOT NULL,
  `CORREO_ELECTRONICO_U` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMBRE_U`) USING BTREE,
  KEY `FK_ESTADO__USUARIO` (`ESTADO_E`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2048;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NOMBRE_U`, `ESTADO_E`, `PASSWORD_U`, `TELEFONO_U`, `CORREO_ELECTRONICO_U`) VALUES
('admin', 'Habilitado', 'admin', '4545454', 'admin@admin.com'),
('Admin1', 'Habilitado', '*Asdf123*', '4443322', 'admin@qwer.com'),
('Bittle', 'Habilitado', '*Bittle*123*', '4445388', 'bittlesrl@gmail.com'),
('bolivia', 'Habilitado', '*Bolivia*123*', '4545454', 'attivanm@hotmail.com'),
('Boris', 'Habilitado', 'Boris*123', '4545454', 'ale-jan_dra@hotmail.com'),
('Colective', 'Habilitado', '*Colectivo*123*', '4563322', 'colective@virtual.com'),
('HighBits', 'Habilitado', '*High*123*', '4433166', 'alejandr_a_v@hotmail.com'),
('Leticia', 'Habilitado', '*Leticia+123*', '4443311', 'leticia@blanco.com'),
('Unisoft', 'Habilitado', '*Unisoft*123*', '4441234', 'alejandra.yvap@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ROL_R` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMBRE_U`,`ROL_R`) USING BTREE,
  KEY `FK_ROL__USUARIO_ROL` (`ROL_R`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`NOMBRE_U`, `ROL_R`) VALUES
('admin', 'administrador'),
('Admin1', 'administrador'),
('Boris', 'asesor'),
('Leticia', 'asesor'),
('Bittle', 'grupoEmpresa'),
('bolivia', 'grupoEmpresa'),
('Colective', 'grupoEmpresa'),
('HighBits', 'grupoEmpresa'),
('Unisoft', 'grupoEmpresa');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_usuario1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD CONSTRAINT `FK_USUARIO__ASESOR` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `FK_REGISTRO__ASIGNACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `FK_REGISTRO__ASISTENCIA` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_noticias1` FOREIGN KEY (`ID_N`, `NOMBRE_U`) REFERENCES `noticias` (`ID_N`, `NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `criteriocalificacion`
--
ALTER TABLE `criteriocalificacion`
  ADD CONSTRAINT `fk_criterioCalificacion_asesor1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `asesor` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `criterio_evaluacion`
--
ALTER TABLE `criterio_evaluacion`
  ADD CONSTRAINT `fk_criterio_evaluacion_asesor1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `asesor` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `FK_REGISTRO_DOCUMENTO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `FK_REGISTRO__PRESENTACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `FK_PLANIFICACION__ENTREGABLE` FOREIGN KEY (`NOMBRE_U`) REFERENCES `planificacion` (`NOMBRE_U`);

--
-- Filtros para la tabla `fecha_realizacion`
--
ALTER TABLE `fecha_realizacion`
  ADD CONSTRAINT `FK_REGISTRO__FECHA_REALIZACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `fk_formulario_asesor1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `asesor` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `form_crit_e`
--
ALTER TABLE `form_crit_e`
  ADD CONSTRAINT `fk_formulario_has_criterio_evaluacion_criterio_evaluacion1` FOREIGN KEY (`ID_CRITERIO_E`) REFERENCES `criterio_evaluacion` (`ID_CRITERIO_E`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_formulario_has_criterio_evaluacion_formulario1` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `from_crit_c`
--
ALTER TABLE `from_crit_c`
  ADD CONSTRAINT `fk_criterioCalificacion_has_formulario_criterioCalificacion1` FOREIGN KEY (`ID_CRITERIO_C`) REFERENCES `criteriocalificacion` (`ID_CRITERIO_C`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criterioCalificacion_has_formulario_formulario1` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo_empresa`
--
ALTER TABLE `grupo_empresa`
  ADD CONSTRAINT `FK_USUARIO__GRUPO_EMPRESA` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Filtros para la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `fk_indicador_criterioCalificacion1` FOREIGN KEY (`ID_CRITERIO_C`) REFERENCES `criteriocalificacion` (`ID_CRITERIO_C`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `FK_ASESOR__INSCRIPCION` FOREIGN KEY (`NOMBRE_UA`) REFERENCES `asesor` (`NOMBRE_U`),
  ADD CONSTRAINT `FK_GESTION__INSCRIPCION` FOREIGN KEY (`ID_G`) REFERENCES `gestion` (`ID_G`),
  ADD CONSTRAINT `FK_GRUPO_EMPRESA__INSCRIPCION` FOREIGN KEY (`NOMBRE_UGE`) REFERENCES `grupo_empresa` (`NOMBRE_U`),
  ADD CONSTRAINT `FK_PROYECTO__INSCRIPCION` FOREIGN KEY (`CODIGO_P`) REFERENCES `proyecto` (`CODIGO_P`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `FK_REGISTRO__MENSAJE` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_grupo_empresa1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_usuario1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_REGISTRO__PAGO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `fk_periodo_registro1` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permisos_menu1` FOREIGN KEY (`menu_id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_menu` FOREIGN KEY (`ROL_R`) REFERENCES `rol` (`ROL_R`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `FK_ESTADO__PLANIFICACION` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`),
  ADD CONSTRAINT `FK_GRUPO_EMPRESA__PLANIFICACION` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`);

--
-- Filtros para la tabla `plazo`
--
ALTER TABLE `plazo`
  ADD CONSTRAINT `FK_REGISTRO__PLAZO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `FK_PLANIFICACION__PRECIO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `planificacion` (`NOMBRE_U`);

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `fk_puntaje_formulario1` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `FK_ESTADO__REGISTRO` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`),
  ADD CONSTRAINT `FK_TIPO__REGISTRO` FOREIGN KEY (`TIPO_T`) REFERENCES `tipo` (`TIPO_T`),
  ADD CONSTRAINT `FK_USUARIO_REGISTRO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `FK_REGISTRO__REPORTE` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`),
  ADD CONSTRAINT `FK_ROL_REPORTE__REPORTE` FOREIGN KEY (`ROL_RR`) REFERENCES `rol_reporte` (`ROL_RR`);

--
-- Filtros para la tabla `rol_aplicacion`
--
ALTER TABLE `rol_aplicacion`
  ADD CONSTRAINT `FK_APLICACION__ROL_APLICACION` FOREIGN KEY (`APLICACION_A`) REFERENCES `aplicacion` (`APLICACION_A`),
  ADD CONSTRAINT `FK_ROL__ROL_APLICACION` FOREIGN KEY (`ROL_R`) REFERENCES `rol` (`ROL_R`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `FK_USUARIO_SESION` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `FK_GRUPO_EMPRESA__SOCIO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ESTADO__USUARIO` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `FK_ROL__USUARIO_ROL` FOREIGN KEY (`ROL_R`) REFERENCES `rol` (`ROL_R`),
  ADD CONSTRAINT `FK_USUARIO__USUARIO_ROL` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
