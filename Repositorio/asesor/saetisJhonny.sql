-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2014 a las 04:27:04
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
('Admin2', 'Victor ', 'Mejia');

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
('Americo', 'Americo', 'Fiorilo'),
('Boris', 'Boris', 'Calancha'),
('Douglas1', 'Douglas', 'Suarez'),
('JHonny1', 'Jhonny', 'Crespo'),
('JHonny2', 'Jhonny', 'Crespo'),
('Jorge1', 'Jorge', 'Orellana'),
('Jorge2', 'Jorge', 'Orellana'),
('Leticia', 'Leticia', 'Blanco'),
('Leticia2', 'Leticia', 'Blanco'),
('Marcelo1', 'Marcelo', 'Bastos'),
('Marcelo223', 'Marcelo', 'Perez Navia');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID_C`, `NOMBRE_U`, `ID_N`, `COMENTARIO`, `FECHA_C`, `AUTOR_C`) VALUES
(1, 'Leticia', 4, 'hola', '2014-11-30 13:21:09', 'Bittle'),
(2, 'Leticia', 4, 'hola2', '2014-11-30 13:21:15', 'Bittle'),
(3, 'Leticia', 4, 'hola 3', '2014-11-30 13:21:22', 'Bittle');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `criteriocalificacion`
--

INSERT INTO `criteriocalificacion` (`ID_CRITERIO_C`, `NOMBRE_U`, `NOMBRE_CRITERIO_C`, `TIPO_CRITERIO`) VALUES
(1, 'Boris', 'PUNTAJE', 4),
(2, 'Boris', 'A(50)B(30)', 1),
(3, 'Leticia', 'A(80)B(50)C(30)', 1),
(4, 'Leticia', 'Verdadero(80)Falso(20)', 2),
(5, 'Leticia', 'PUNTAJE', 4),
(6, 'Americo', 'PUNTAJE', 4),
(7, 'Americo', 'A(80)B(50)C(30)', 1),
(8, 'Americo', 'Verdadero(80)Falso(20)', 2),
(9, 'Americo', 'Si(100)No(0)', 3),
(12, 'Boris', 'A(100)B(60)C(30)D(0)', 1),
(22, 'Leticia2', 'PUNTAJE', 4),
(23, 'Leticia2', 'A(100)B(80)C(60)D(30)E(0)', 1),
(24, 'Leticia2', 'Verdadero(100)Falso(0)', 2),
(25, 'Leticia2', 'A(100)B(60)C(30)', 1),
(28, 'Leticia', 'Verdadero(100)Falso(50)', 2),
(31, 'Marcelo1', 'PUNTAJE', 4),
(34, 'Leticia', 'Si(100)No(0)', 3),
(35, 'Leticia', 'Si(100)No(20)', 3),
(36, 'Leticia', 'Si(60)No(30)', 3),
(37, 'Leticia', 'A(100)B(60)C(0)', 1),
(38, 'Leticia', 'Si(90)No(0)', 3),
(39, 'Jorge1', 'PUNTAJE', 4),
(40, 'Jorge2', 'PUNTAJE', 4),
(41, 'Marcelo223', 'PUNTAJE', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `criterio_evaluacion`
--

INSERT INTO `criterio_evaluacion` (`ID_CRITERIO_E`, `NOMBRE_U`, `NOMBRE_CRITERIO_E`) VALUES
(1, 'Leticia', 'uso de herramientas'),
(2, 'Leticia', 'Puntualidad en la presentacion'),
(3, 'Leticia', 'Presentacion de la documentacion'),
(4, 'Leticia', 'seguimiento de la metodologia'),
(5, 'Boris', 'uso de herramientas'),
(6, 'Boris', 'seguimiento de la metodologia'),
(7, 'Boris', 'presentacion de la documentacion\r\n'),
(8, 'Americo', 'uso de frameworks'),
(9, 'Americo', 'tiempo de desarrollo'),
(10, 'Americo', 'Portabilidad del sistema'),
(11, 'Boris', 'dpresentacion de diagramas'),
(12, 'Leticia', 'defensa del proyecto'),
(13, 'Leticia2', 'uso de herramientas'),
(14, 'Leticia2', 'presentacion de la documentacion'),
(15, 'Leticia2', 'seguimiento de la metodologia'),
(16, 'Leticia2', 'Tiempo de desarrollo');

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
(83, 'Esta e suna prueba*Bittle SRL'),
(84, 'se publico el documento correspondiente a la prueba 2*TODOS'),
(100, 'ya puede subir la parte H del documento'),
(101, 'ya puede subir la parte Z'),
(117, 'esta es la parte A'),
(119, 'esta es la parte M'),
(120, 'esta es la parte N'),
(121, 'esta es la parte X'),
(127, 'esta es la parte W');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`ID_D`, `ID_R`, `TAMANIO_D`, `RUTA_D`, `VISUALIZABLE_D`, `DESCARGABLE_D`) VALUES
(34, 78, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/20141101.pdf', 0, 0),
(35, 79, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/PETIS2014.pdf', 0, 0),
(36, 80, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/CPETIS2014.pdf', 0, 0),
(37, 81, 1024, 'http://localhost:8080/ProyectoSprint3/Repositorio/asesor/20141101.pdf', 0, 0),
(38, 83, 1024, 'http://localhost/ProyectoSprint3/Repositorio/asesor/ContratoBittle.pdf', 0, 0),
(39, 84, 1024, 'http://localhost/ProyectoSprint3/Repositorio/asesor/Protocolos-validacion-H22.docx', 0, 0),
(40, 118, 179134, '/Repositorio/Bittle/Protocolos-validacion-H22.docx', 1, 1);

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
('en proceso'),
('Habilitado'),
('planificacion registrada'),
('registrar costo total proyecto'),
('registrar entregables'),
('registrar plan pagos'),
('registrar planificacion');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_FORM`, `NOMBRE_U`, `NOMBRE_FORM`, `ESTADO_FORM`) VALUES
(1, 'Leticia', 'formulario1', 'Deshabilitado'),
(2, 'Boris', 'formulario1', 'Habilitado'),
(3, 'Americo', 'formulario1', 'Habilitado'),
(4, 'Americo', 'formulario5', 'Deshabilitado'),
(5, 'Americo', 'formulario7', 'Deshabilitado'),
(6, 'Americo', 'formulario3', 'Deshabilitado'),
(7, 'Boris', 'formulario2', 'Deshabilitado'),
(8, 'Leticia2', 'formulario1', 'Habilitado'),
(10, 'Leticia', 'formulario2', 'Deshabilitado'),
(11, 'Leticia', 'formulario3', 'Habilitado');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `form_crit_e`
--

INSERT INTO `form_crit_e` (`ID_FORM_CRIT_E`, `ID_FORM`, `ID_CRITERIO_E`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 5),
(4, 2, 6),
(6, 3, 8),
(7, 3, 9),
(8, 3, 10),
(9, 4, 8),
(10, 4, 9),
(11, 5, 8),
(12, 5, 9),
(13, 6, 8),
(14, 6, 9),
(15, 6, 10),
(16, 7, 5),
(17, 7, 6),
(18, 8, 13),
(19, 8, 14),
(20, 8, 15),
(21, 8, 16),
(27, 10, 1),
(28, 10, 2),
(29, 10, 3),
(30, 10, 4),
(31, 11, 1),
(32, 11, 2),
(33, 11, 3),
(34, 11, 4),
(35, 11, 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `from_crit_c`
--

INSERT INTO `from_crit_c` (`ID_FORM_CRIT_C`, `ID_CRITERIO_C`, `ID_FORM`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 1, 2),
(4, 2, 2),
(5, 6, 3),
(6, 7, 3),
(7, 6, 3),
(8, 6, 4),
(9, 6, 4),
(10, 6, 5),
(11, 7, 5),
(12, 6, 6),
(13, 8, 6),
(14, 9, 6),
(15, 1, 7),
(16, 2, 7),
(17, 22, 8),
(18, 23, 8),
(19, 25, 8),
(20, 22, 8),
(26, 3, 10),
(27, 28, 10),
(28, 37, 10),
(29, 5, 10),
(30, 3, 11),
(31, 4, 11),
(32, 5, 11),
(33, 5, 11),
(34, 3, 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`ID_G`, `NOM_G`, `FECHA_INICIO_G`, `FECHA_FIN_G`) VALUES
(1, 'Semestre I/2014', '2014-03-10', '2014-06-20'),
(2, 'Semestre II/2014', '2014-08-18', '2014-12-05');

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
('Bittle', 'Bittle', 'Bittle SRL', 'calle #21', 'Alejandra Vargas');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

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
(7, 4, 'Falso', 20),
(8, 7, 'A', 80),
(9, 7, 'B', 50),
(10, 7, 'C', 30),
(11, 8, 'Verdadero', 80),
(12, 8, 'Falso', 20),
(13, 9, 'Si', 100),
(14, 9, 'No', 0),
(18, 12, 'A', 100),
(19, 12, 'B', 60),
(20, 12, 'C', 30),
(21, 12, 'D', 0),
(22, 23, 'A', 100),
(23, 23, 'B', 80),
(24, 23, 'C', 60),
(25, 23, 'D', 30),
(26, 23, 'E', 0),
(27, 24, 'Verdadero', 100),
(28, 24, 'Falso', 0),
(29, 25, 'A', 100),
(30, 25, 'B', 60),
(31, 25, 'C', 30),
(34, 28, 'Verdadero', 100),
(35, 28, 'Falso', 50),
(36, 34, 'Si', 100),
(37, 34, 'No', 0),
(38, 35, 'Si', 100),
(39, 35, 'No', 20),
(40, 36, 'Si', 60),
(41, 36, 'No', 30),
(42, 37, 'A', 100),
(43, 37, 'B', 60),
(44, 37, 'C', 0),
(45, 38, 'Si', 90),
(46, 38, 'No', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `NOMBRE_UA` varchar(50) NOT NULL,
  `NOMBRE_UGE` varchar(50) NOT NULL,
  `ESTADO_INSCRIPCION` varchar(25) NOT NULL,
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

INSERT INTO `inscripcion` (`NOMBRE_UA`, `NOMBRE_UGE`, `ESTADO_INSCRIPCION`, `ID_G`, `CODIGO_P`) VALUES
('Leticia', 'Bittle', 'Deshabilitado', 2, 1);

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
  `ID_FORM` int(50) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `CALIF_N` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_N`,`NOMBRE_U`),
  KEY `fk_nota_grupo_empresa1_idx` (`NOMBRE_U`),
  KEY `fk_nota_formulario_idx` (`ID_FORM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ID_N`, `ID_FORM`, `NOMBRE_U`, `CALIF_N`) VALUES
(1, 11, 'Bittle', 68);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID_N`, `NOMBRE_U`, `TITULO`, `FECHA_N`, `VIEWS`, `TEXTO`) VALUES
(4, 'Leticia', 'Prueba de foto', '2014-11-11 04:36:22', 10, 'probando el foro'),
(5, 'Bittle', 'prueba de foro', '2014-11-30 13:21:46', 0, 'esta es ua prueba\\r\\n');

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
(83, '2014-11-11', '12:12:00'),
(84, '2014-11-12', '12:23:00');

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
(98, '2014-11-30', '2014-12-30', '09:00:00', '08:00:00'),
(99, '2014-11-30', '2014-12-30', '15:00:00', '15:00:00'),
(100, '2014-11-29', '2014-12-31', '18:00:00', '21:00:00'),
(101, '2014-11-12', '2014-11-15', '12:00:00', '15:00:00'),
(117, '2014-11-01', '2014-11-30', '10:00:00', '23:00:00'),
(119, '2014-11-01', '2014-11-30', '12:00:00', '23:59:00'),
(120, '2014-11-01', '2014-11-30', '12:00:00', '23:59:00'),
(121, '2014-11-01', '2014-11-30', '12:00:00', '23:59:00'),
(127, '2014-11-01', '2014-11-30', '12:00:00', '23:59:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`CODIGO_P`, `NOMBRE_P`, `DESCRIPCION_P`) VALUES
(1, 'Saetis', 'Sistema de apoyo a la empresa TIS');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`PUNTAJE_ID`, `ID_FORM`, `PUNTAJE`) VALUES
(1, 1, 50),
(2, 1, 50),
(3, 2, 30),
(4, 2, 30),
(5, 3, 40),
(6, 3, 30),
(7, 3, 30),
(8, 4, 50),
(9, 4, 50),
(10, 5, 50),
(11, 5, 50),
(12, 6, 50),
(13, 6, 30),
(14, 6, 20),
(15, 7, 30),
(16, 7, 40),
(17, 8, 30),
(18, 8, 30),
(19, 8, 20),
(20, 8, 20),
(26, 10, 30),
(27, 10, 20),
(28, 10, 30),
(29, 10, 20),
(30, 11, 20),
(31, 11, 20),
(32, 11, 20),
(33, 11, 20),
(34, 11, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje_ge`
--

CREATE TABLE IF NOT EXISTS `puntaje_ge` (
  `ID_PGE` int(50) NOT NULL AUTO_INCREMENT,
  `ID_N` int(50) NOT NULL,
  `NUM_CE` int(50) NOT NULL,
  `CALIFICACION` int(50) NOT NULL,
  PRIMARY KEY (`ID_PGE`),
  KEY `fk_ PUNTAJE_GE_nota_idx` (`ID_N`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `puntaje_ge`
--

INSERT INTO `puntaje_ge` (`ID_PGE`, `ID_N`, `NUM_CE`, `CALIFICACION`) VALUES
(1, 1, 0, 80),
(2, 1, 1, 80),
(3, 1, 2, 50),
(4, 1, 3, 50),
(5, 1, 4, 80);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=128 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`ID_R`, `NOMBRE_U`, `TIPO_T`, `ESTADO_E`, `NOMBRE_R`, `FECHA_R`, `HORA_R`) VALUES
(78, 'Leticia', 'publicaciones', 'Habilitado', 'prueba1', '2014-11-10', '15:15:25'),
(79, 'Leticia', 'publicaciones', 'Habilitado', 'PETIS', '2014-11-10', '15:15:27'),
(80, 'Leticia', 'publicaciones', 'Habilitado', 'CPTIS', '2014-11-10', '15:15:28'),
(81, 'Boris', 'publicaciones', 'Habilitado', 'Orden de cambio', '2014-11-10', '16:16:54'),
(83, 'Leticia', 'publicaciones', 'Habilitado', 'Prueba', '2014-11-11', '09:09:30'),
(84, 'Leticia', 'publicaciones', 'Habilitado', 'Publicacion PRueba2', '2014-11-12', '17:17:24'),
(98, 'Boris', 'documento requerido', 'Habilitado', 'Parte A', '2014-11-13', '22:30:39'),
(99, 'Boris', 'documento requerido', 'Habilitado', 'Parte F', '2014-11-13', '22:39:28'),
(100, 'Leticia', 'documento requerido', 'Habilitado', 'Parte H', '2014-11-16', '12:14:36'),
(101, 'Leticia', 'documento requerido', 'Habilitado', 'PARTE Z', '2014-11-16', '12:34:48'),
(117, 'Leticia', 'documento requerido', 'Habilitado', 'parte A', '2014-11-30', '17:01:10'),
(118, 'Bittle', 'documento subido', 'habilitado', 'Protocolos-validacion-H22.docx', '2014-11-30', '17:17:10'),
(119, 'Leticia', 'documento requerido', 'Habilitado', 'PARTE M', '2014-11-30', '17:51:58'),
(120, 'Leticia', 'documento requerido', 'Habilitado', 'PARTE N', '2014-11-30', '17:52:53'),
(121, 'Leticia', 'documento requerido', 'Habilitado', 'PARTE X', '2014-11-30', '17:53:38'),
(127, 'Leticia', 'documento requerido', 'Habilitado', 'Parte W', '2014-11-30', '18:25:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1184 ;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`ID_S`, `NOMBRE_U`, `FECHA_S`, `HORA_S`, `IP_S`) VALUES
(1, 'Leticia', '2014-11-10', '01:04:24', '::1'),
(2, 'Leticia', '2014-11-10', '01:04:28', '::1'),
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
(57, 'Boris', '2014-11-10', '10:23:25', '::1'),
(60, 'Boris', '2014-11-10', '10:24:58', '::1'),
(61, 'Boris', '2014-11-10', '10:25:29', '::1'),
(62, 'Boris', '2014-11-10', '10:30:08', '::1'),
(63, 'Boris', '2014-11-10', '10:30:20', '::1'),
(64, 'Boris', '2014-11-10', '10:32:10', '::1'),
(65, 'Boris', '2014-11-10', '10:32:45', '::1'),
(66, 'Boris', '2014-11-10', '10:34:34', '::1'),
(67, 'Boris', '2014-11-10', '10:34:39', '::1'),
(68, 'Boris', '2014-11-10', '10:34:41', '::1'),
(70, 'Boris', '2014-11-10', '10:35:26', '::1'),
(71, 'Boris', '2014-11-10', '10:36:23', '::1'),
(72, 'Boris', '2014-11-10', '10:36:34', '::1'),
(73, 'Boris', '2014-11-10', '10:36:44', '::1'),
(74, 'Boris', '2014-11-10', '10:46:20', '::1'),
(75, 'Boris', '2014-11-10', '10:47:37', '::1'),
(76, 'Boris', '2014-11-10', '10:47:46', '::1'),
(77, 'Boris', '2014-11-10', '10:49:01', '::1'),
(78, 'Boris', '2014-11-10', '10:52:51', '::1'),
(79, 'Boris', '2014-11-10', '10:55:58', '::1'),
(80, 'Boris', '2014-11-10', '11:01:50', '::1'),
(81, 'Boris', '2014-11-10', '11:03:04', '::1'),
(82, 'Boris', '2014-11-10', '11:06:19', '::1'),
(83, 'Boris', '2014-11-10', '11:06:55', '::1'),
(84, 'Boris', '2014-11-10', '11:06:56', '::1'),
(85, 'Boris', '2014-11-10', '11:07:03', '::1'),
(86, 'Boris', '2014-11-10', '11:13:24', '::1'),
(87, 'Boris', '2014-11-10', '11:14:52', '::1'),
(88, 'Boris', '2014-11-10', '11:33:14', '::1'),
(89, 'Boris', '2014-11-10', '11:33:17', '::1'),
(90, 'Boris', '2014-11-10', '11:33:27', '::1'),
(91, 'Boris', '2014-11-10', '11:33:34', '::1'),
(92, 'Boris', '2014-11-10', '11:33:41', '::1'),
(93, 'Boris', '2014-11-10', '11:33:50', '::1'),
(94, 'Boris', '2014-11-10', '11:33:55', '::1'),
(95, 'Boris', '2014-11-10', '11:35:52', '::1'),
(96, 'Boris', '2014-11-10', '11:35:59', '::1'),
(97, 'Boris', '2014-11-10', '11:36:08', '::1'),
(98, 'Boris', '2014-11-10', '11:36:11', '::1'),
(99, 'Boris', '2014-11-10', '11:36:27', '::1'),
(100, 'Boris', '2014-11-10', '11:36:34', '::1'),
(101, 'Boris', '2014-11-10', '11:36:43', '::1'),
(102, 'Boris', '2014-11-10', '11:37:19', '::1'),
(103, 'Boris', '2014-11-10', '11:41:38', '::1'),
(104, 'Boris', '2014-11-10', '11:41:47', '::1'),
(105, 'Boris', '2014-11-10', '11:43:10', '::1'),
(106, 'Boris', '2014-11-10', '11:43:21', '::1'),
(107, 'Boris', '2014-11-10', '11:43:26', '::1'),
(108, 'Boris', '2014-11-10', '11:44:22', '::1'),
(109, 'Boris', '2014-11-10', '11:47:11', '::1'),
(110, 'Americo', '2014-11-10', '11:48:50', '::1'),
(111, 'Americo', '2014-11-10', '11:49:10', '::1'),
(112, 'Americo', '2014-11-10', '11:49:21', '::1'),
(113, 'Americo', '2014-11-10', '11:49:27', '::1'),
(114, 'Americo', '2014-11-10', '11:49:41', '::1'),
(115, 'Americo', '2014-11-10', '11:49:45', '::1'),
(116, 'Americo', '2014-11-10', '11:50:34', '::1'),
(117, 'Americo', '2014-11-10', '11:51:17', '::1'),
(118, 'Americo', '2014-11-10', '11:51:38', '::1'),
(119, 'Americo', '2014-11-10', '11:53:07', '::1'),
(120, 'Americo', '2014-11-10', '11:53:52', '::1'),
(121, 'Americo', '2014-11-10', '11:55:10', '::1'),
(122, 'Americo', '2014-11-10', '11:56:41', '::1'),
(123, 'Americo', '2014-11-10', '11:57:09', '::1'),
(124, 'Americo', '2014-11-10', '11:58:09', '::1'),
(125, 'Americo', '2014-11-10', '11:58:36', '::1'),
(126, 'Americo', '2014-11-10', '11:58:59', '::1'),
(127, 'Americo', '2014-11-10', '11:59:24', '::1'),
(128, 'Americo', '2014-11-10', '11:59:52', '::1'),
(129, 'Americo', '2014-11-11', '12:00:43', '::1'),
(130, 'Americo', '2014-11-11', '12:02:04', '::1'),
(131, 'Americo', '2014-11-11', '12:02:12', '::1'),
(132, 'Americo', '2014-11-11', '12:02:44', '::1'),
(133, 'Americo', '2014-11-11', '12:03:34', '::1'),
(134, 'Americo', '2014-11-11', '12:03:47', '::1'),
(135, 'Americo', '2014-11-11', '12:09:41', '::1'),
(136, 'Americo', '2014-11-11', '12:10:21', '::1'),
(137, 'Americo', '2014-11-11', '12:10:22', '::1'),
(138, 'Americo', '2014-11-11', '12:10:29', '::1'),
(139, 'Americo', '2014-11-11', '12:11:11', '::1'),
(140, 'Americo', '2014-11-11', '12:12:23', '::1'),
(141, 'Americo', '2014-11-11', '12:12:36', '::1'),
(142, 'Americo', '2014-11-11', '12:12:52', '::1'),
(143, 'Americo', '2014-11-11', '12:13:44', '::1'),
(144, 'Americo', '2014-11-11', '12:13:53', '::1'),
(145, 'Americo', '2014-11-11', '12:14:00', '::1'),
(146, 'Americo', '2014-11-11', '12:14:56', '::1'),
(147, 'Americo', '2014-11-11', '12:17:11', '::1'),
(148, 'Americo', '2014-11-11', '12:19:40', '::1'),
(149, 'Americo', '2014-11-11', '12:20:53', '::1'),
(150, 'Americo', '2014-11-11', '12:22:55', '::1'),
(151, 'Americo', '2014-11-11', '01:06:39', '::1'),
(152, 'Americo', '2014-11-11', '01:06:43', '::1'),
(153, 'Americo', '2014-11-11', '01:07:38', '::1'),
(154, 'Americo', '2014-11-11', '01:07:59', '::1'),
(155, 'Americo', '2014-11-11', '01:09:00', '::1'),
(156, 'Americo', '2014-11-11', '01:10:54', '::1'),
(157, 'Americo', '2014-11-11', '01:11:42', '::1'),
(158, 'Americo', '2014-11-11', '01:12:26', '::1'),
(159, 'Americo', '2014-11-11', '01:21:49', '::1'),
(160, 'Americo', '2014-11-11', '01:21:54', '::1'),
(161, 'Americo', '2014-11-11', '01:22:21', '::1'),
(162, 'Americo', '2014-11-11', '01:24:34', '::1'),
(163, 'Americo', '2014-11-11', '01:27:50', '::1'),
(164, 'Americo', '2014-11-11', '01:31:35', '::1'),
(165, 'Americo', '2014-11-11', '01:31:59', '::1'),
(166, 'Americo', '2014-11-11', '01:32:04', '::1'),
(167, 'Americo', '2014-11-11', '01:40:16', '::1'),
(168, 'Americo', '2014-11-11', '01:42:29', '::1'),
(169, 'Americo', '2014-11-11', '01:43:35', '::1'),
(170, 'Americo', '2014-11-11', '01:44:30', '::1'),
(171, 'Americo', '2014-11-11', '01:45:32', '::1'),
(172, 'Americo', '2014-11-11', '01:46:07', '::1'),
(173, 'Americo', '2014-11-11', '01:46:27', '::1'),
(174, 'Americo', '2014-11-11', '01:47:14', '::1'),
(175, 'Americo', '2014-11-11', '01:47:39', '::1'),
(176, 'Americo', '2014-11-11', '01:48:47', '::1'),
(177, 'Americo', '2014-11-11', '01:50:59', '::1'),
(178, 'Americo', '2014-11-11', '01:53:10', '::1'),
(179, 'Americo', '2014-11-11', '02:00:14', '::1'),
(180, 'Americo', '2014-11-11', '02:00:35', '::1'),
(181, 'Americo', '2014-11-11', '02:04:18', '::1'),
(182, 'Americo', '2014-11-11', '02:05:15', '::1'),
(183, 'Americo', '2014-11-11', '02:06:08', '::1'),
(184, 'Americo', '2014-11-11', '02:07:48', '::1'),
(185, 'Americo', '2014-11-11', '02:08:22', '::1'),
(186, 'Americo', '2014-11-11', '02:11:07', '::1'),
(187, 'Americo', '2014-11-11', '02:12:25', '::1'),
(188, 'Americo', '2014-11-11', '02:12:39', '::1'),
(189, 'Americo', '2014-11-11', '02:13:54', '::1'),
(190, 'Americo', '2014-11-11', '02:16:01', '::1'),
(191, 'Americo', '2014-11-11', '02:16:35', '::1'),
(192, 'Americo', '2014-11-11', '02:17:08', '::1'),
(193, 'Americo', '2014-11-11', '02:17:29', '::1'),
(194, 'Americo', '2014-11-11', '02:17:49', '::1'),
(195, 'Americo', '2014-11-11', '02:18:16', '::1'),
(196, 'Americo', '2014-11-11', '02:18:38', '::1'),
(197, 'Americo', '2014-11-11', '02:19:00', '::1'),
(198, 'Americo', '2014-11-11', '02:19:23', '::1'),
(199, 'Americo', '2014-11-11', '02:21:36', '::1'),
(200, 'Americo', '2014-11-11', '02:21:48', '::1'),
(201, 'Americo', '2014-11-11', '02:22:36', '::1'),
(202, 'Americo', '2014-11-11', '02:23:05', '::1'),
(203, 'Americo', '2014-11-11', '02:23:25', '::1'),
(204, 'Americo', '2014-11-11', '02:24:03', '::1'),
(205, 'Americo', '2014-11-11', '02:24:14', '::1'),
(206, 'Americo', '2014-11-11', '02:24:37', '::1'),
(207, 'Americo', '2014-11-11', '02:24:55', '::1'),
(208, 'Americo', '2014-11-11', '02:25:30', '::1'),
(209, 'Americo', '2014-11-11', '02:25:35', '::1'),
(210, 'Americo', '2014-11-11', '02:26:14', '::1'),
(211, 'Americo', '2014-11-11', '02:27:53', '::1'),
(212, 'Americo', '2014-11-11', '02:28:11', '::1'),
(213, 'Americo', '2014-11-11', '02:29:39', '::1'),
(214, 'Americo', '2014-11-11', '02:30:55', '::1'),
(215, 'Americo', '2014-11-11', '02:31:15', '::1'),
(216, 'Americo', '2014-11-11', '02:31:16', '::1'),
(217, 'Americo', '2014-11-11', '02:32:01', '::1'),
(218, 'Americo', '2014-11-11', '02:32:15', '::1'),
(219, 'Americo', '2014-11-11', '02:36:29', '::1'),
(220, 'Americo', '2014-11-11', '02:39:56', '::1'),
(221, 'Americo', '2014-11-11', '02:40:05', '::1'),
(222, 'Americo', '2014-11-11', '02:42:11', '::1'),
(223, 'Americo', '2014-11-11', '02:42:24', '::1'),
(224, 'Americo', '2014-11-11', '02:46:23', '::1'),
(225, 'Americo', '2014-11-11', '02:50:34', '::1'),
(226, 'Americo', '2014-11-11', '02:51:08', '::1'),
(227, 'Americo', '2014-11-11', '02:51:31', '::1'),
(228, 'Americo', '2014-11-11', '02:52:38', '::1'),
(229, 'Americo', '2014-11-11', '02:55:28', '::1'),
(230, 'Americo', '2014-11-11', '02:56:40', '::1'),
(231, 'Americo', '2014-11-11', '02:57:04', '::1'),
(232, 'Americo', '2014-11-11', '02:57:24', '::1'),
(233, 'Americo', '2014-11-11', '02:58:27', '::1'),
(234, 'Americo', '2014-11-11', '02:58:34', '::1'),
(235, 'Americo', '2014-11-11', '02:58:41', '::1'),
(236, 'Americo', '2014-11-11', '02:59:15', '::1'),
(237, 'Americo', '2014-11-11', '03:01:51', '::1'),
(238, 'Americo', '2014-11-11', '03:02:18', '::1'),
(239, 'Americo', '2014-11-11', '03:11:53', '::1'),
(240, 'Americo', '2014-11-11', '03:11:58', '::1'),
(241, 'Leticia', '2014-11-11', '03:13:15', '::1'),
(242, 'Leticia', '2014-11-11', '03:13:19', '::1'),
(243, 'Leticia', '2014-11-11', '03:14:32', '::1'),
(244, 'Leticia', '2014-11-11', '03:16:22', '::1'),
(245, 'Leticia', '2014-11-11', '03:16:53', '::1'),
(246, 'Leticia', '2014-11-11', '03:17:07', '::1'),
(247, 'Leticia', '2014-11-11', '03:17:20', '::1'),
(248, 'Leticia', '2014-11-11', '03:17:32', '::1'),
(249, 'Leticia', '2014-11-11', '03:17:44', '::1'),
(250, 'Leticia', '2014-11-11', '03:17:51', '::1'),
(251, 'Leticia', '2014-11-11', '03:18:38', '::1'),
(252, 'Leticia', '2014-11-11', '03:20:43', '::1'),
(253, 'Leticia', '2014-11-11', '03:20:53', '::1'),
(254, 'Leticia', '2014-11-11', '03:21:09', '::1'),
(255, 'Leticia', '2014-11-11', '03:21:12', '::1'),
(256, 'Leticia', '2014-11-11', '03:21:27', '::1'),
(257, 'Leticia', '2014-11-11', '03:21:35', '::1'),
(258, 'Leticia', '2014-11-11', '03:21:57', '::1'),
(259, 'Leticia', '2014-11-11', '03:23:17', '::1'),
(260, 'Leticia', '2014-11-11', '03:23:27', '::1'),
(261, 'Leticia', '2014-11-11', '03:23:36', '::1'),
(262, 'Leticia', '2014-11-11', '03:24:12', '::1'),
(263, 'Leticia', '2014-11-11', '03:24:26', '::1'),
(264, 'Leticia', '2014-11-11', '03:25:26', '::1'),
(265, 'Leticia', '2014-11-11', '04:42:53', '::1'),
(266, 'Leticia', '2014-11-11', '04:45:09', '::1'),
(267, 'Leticia', '2014-11-11', '04:48:56', '::1'),
(268, 'Leticia', '2014-11-11', '04:48:57', '::1'),
(269, 'Leticia', '2014-11-11', '04:49:17', '::1'),
(270, 'Leticia', '2014-11-11', '04:49:33', '::1'),
(271, 'Leticia', '2014-11-11', '04:49:35', '::1'),
(272, 'Leticia', '2014-11-11', '04:51:43', '::1'),
(273, 'Leticia', '2014-11-11', '04:51:46', '::1'),
(274, 'Boris', '2014-11-11', '04:52:47', '::1'),
(275, 'Boris', '2014-11-11', '04:52:51', '::1'),
(276, 'Boris', '2014-11-11', '04:53:01', '::1'),
(277, 'Boris', '2014-11-11', '04:53:20', '::1'),
(278, 'Boris', '2014-11-11', '04:54:10', '::1'),
(279, 'Boris', '2014-11-11', '04:54:17', '::1'),
(280, 'Boris', '2014-11-11', '04:54:25', '::1'),
(281, 'Boris', '2014-11-11', '04:58:07', '::1'),
(282, 'Boris', '2014-11-11', '04:58:13', '::1'),
(283, 'Boris', '2014-11-11', '04:58:22', '::1'),
(284, 'Boris', '2014-11-11', '05:02:22', '::1'),
(285, 'Boris', '2014-11-11', '05:04:08', '::1'),
(286, 'Boris', '2014-11-11', '05:04:45', '::1'),
(287, 'Boris', '2014-11-11', '05:04:53', '::1'),
(288, 'Boris', '2014-11-11', '05:05:01', '::1'),
(289, 'Boris', '2014-11-11', '05:05:50', '::1'),
(290, 'Boris', '2014-11-11', '05:05:53', '::1'),
(291, 'Boris', '2014-11-11', '05:07:56', '::1'),
(292, 'Boris', '2014-11-11', '05:09:36', '::1'),
(293, 'Boris', '2014-11-11', '05:10:47', '::1'),
(294, 'Boris', '2014-11-11', '05:11:19', '::1'),
(295, 'Boris', '2014-11-11', '05:15:04', '::1'),
(296, 'Boris', '2014-11-11', '05:18:03', '::1'),
(297, 'Boris', '2014-11-11', '05:18:19', '::1'),
(298, 'Boris', '2014-11-11', '05:18:19', '::1'),
(299, 'Boris', '2014-11-11', '05:19:33', '::1'),
(300, 'Boris', '2014-11-11', '05:20:03', '::1'),
(301, 'Boris', '2014-11-11', '05:20:16', '::1'),
(302, 'Boris', '2014-11-11', '05:24:45', '::1'),
(303, 'Boris', '2014-11-11', '05:25:09', '::1'),
(304, 'Americo', '2014-11-11', '08:28:24', '::1'),
(305, 'Americo', '2014-11-11', '08:29:28', '::1'),
(306, 'Americo', '2014-11-11', '08:31:14', '::1'),
(307, 'Americo', '2014-11-11', '08:31:19', '::1'),
(308, 'Americo', '2014-11-11', '08:32:01', '::1'),
(309, 'Americo', '2014-11-11', '08:32:04', '::1'),
(310, 'Americo', '2014-11-11', '08:32:34', '::1'),
(311, 'Americo', '2014-11-11', '08:32:39', '::1'),
(312, 'Americo', '2014-11-11', '08:34:01', '::1'),
(313, 'Americo', '2014-11-11', '08:34:56', '::1'),
(314, 'Americo', '2014-11-11', '08:35:25', '::1'),
(315, 'Boris', '2014-11-11', '08:36:47', '::1'),
(316, 'Boris', '2014-11-11', '08:36:51', '::1'),
(317, 'Boris', '2014-11-11', '08:41:21', '::1'),
(318, 'Boris', '2014-11-11', '08:41:33', '::1'),
(319, 'Boris', '2014-11-11', '08:43:01', '::1'),
(320, 'Boris', '2014-11-11', '08:43:35', '::1'),
(321, 'Boris', '2014-11-11', '08:57:03', '::1'),
(322, 'Boris', '2014-11-11', '08:57:10', '::1'),
(323, 'Boris', '2014-11-11', '08:57:22', '::1'),
(324, 'Boris', '2014-11-11', '08:57:37', '::1'),
(325, 'Boris', '2014-11-11', '08:57:40', '::1'),
(326, 'Boris', '2014-11-11', '08:57:51', '::1'),
(327, 'Boris', '2014-11-11', '08:57:57', '::1'),
(328, 'Boris', '2014-11-11', '08:58:03', '::1'),
(329, 'Boris', '2014-11-11', '08:58:48', '::1'),
(330, 'Boris', '2014-11-11', '09:08:21', '::1'),
(331, 'Americo', '2014-11-11', '09:27:33', '::1'),
(332, 'Americo', '2014-11-11', '09:28:58', '::1'),
(333, 'Leticia', '2014-11-11', '09:29:15', '::1'),
(334, 'Leticia', '2014-11-11', '09:34:48', '::1'),
(335, 'Leticia', '2014-11-11', '09:35:02', '::1'),
(336, 'Leticia', '2014-11-11', '09:35:16', '::1'),
(337, 'Leticia', '2014-11-11', '09:35:55', '::1'),
(338, 'Leticia', '2014-11-11', '09:38:19', '::1'),
(339, 'Leticia', '2014-11-11', '09:38:37', '::1'),
(340, 'Leticia', '2014-11-11', '09:38:52', '::1'),
(341, 'Leticia', '2014-11-11', '09:39:24', '::1'),
(343, 'Boris', '2014-11-11', '04:06:29', '::1'),
(344, 'Boris', '2014-11-11', '04:06:34', '::1'),
(345, 'Boris', '2014-11-11', '04:07:28', '::1'),
(346, 'Boris', '2014-11-11', '04:07:40', '::1'),
(347, 'Boris', '2014-11-11', '04:08:02', '::1'),
(348, 'Boris', '2014-11-11', '04:08:54', '::1'),
(349, 'Americo', '2014-11-11', '04:09:33', '::1'),
(350, 'Americo', '2014-11-11', '04:09:38', '::1'),
(351, 'Americo', '2014-11-11', '04:10:12', '::1'),
(352, 'Boris', '2014-11-11', '04:10:25', '::1'),
(353, 'Boris', '2014-11-11', '04:10:29', '::1'),
(354, 'Boris', '2014-11-11', '06:40:05', '::1'),
(355, 'Boris', '2014-11-12', '01:29:13', '::1'),
(356, 'Boris', '2014-11-12', '01:29:17', '::1'),
(357, 'Boris', '2014-11-12', '01:47:05', '::1'),
(358, 'Boris', '2014-11-12', '01:47:24', '::1'),
(359, 'Boris', '2014-11-12', '01:47:40', '::1'),
(360, 'Leticia2', '2014-11-12', '01:48:56', '::1'),
(361, 'Leticia2', '2014-11-12', '01:49:04', '::1'),
(362, 'Leticia2', '2014-11-12', '01:49:11', '::1'),
(363, 'Leticia2', '2014-11-12', '01:49:21', '::1'),
(364, 'Leticia2', '2014-11-12', '01:49:29', '::1'),
(365, 'Leticia2', '2014-11-12', '01:50:10', '::1'),
(366, 'Leticia2', '2014-11-12', '01:50:14', '::1'),
(367, 'Leticia2', '2014-11-12', '01:51:21', '::1'),
(368, 'Leticia2', '2014-11-12', '01:52:56', '::1'),
(369, 'Leticia', '2014-11-12', '01:55:44', '::1'),
(370, 'Leticia', '2014-11-12', '01:55:51', '::1'),
(371, 'Leticia', '2014-11-12', '01:56:00', '::1'),
(372, 'Leticia', '2014-11-12', '01:57:55', '::1'),
(373, 'Leticia', '2014-11-12', '01:58:09', '::1'),
(374, 'Leticia', '2014-11-12', '02:01:08', '::1'),
(375, 'Leticia', '2014-11-12', '02:35:54', '::1'),
(376, 'Leticia', '2014-11-12', '02:35:59', '::1'),
(377, 'Leticia', '2014-11-12', '03:19:38', '::1'),
(378, 'Leticia', '2014-11-12', '03:19:42', '::1'),
(379, 'Leticia', '2014-11-12', '03:20:31', '::1'),
(380, 'Leticia', '2014-11-12', '04:13:02', '::1'),
(381, 'Leticia', '2014-11-12', '04:13:34', '::1'),
(382, 'Leticia', '2014-11-12', '04:17:00', '::1'),
(383, 'Leticia', '2014-11-12', '04:18:59', '::1'),
(384, 'Leticia', '2014-11-12', '04:19:52', '::1'),
(385, 'Leticia', '2014-11-12', '04:19:57', '::1'),
(386, 'Leticia', '2014-11-12', '04:20:03', '::1'),
(387, 'Leticia', '2014-11-12', '04:20:11', '::1'),
(388, 'Leticia', '2014-11-12', '04:20:17', '::1'),
(389, 'Leticia', '2014-11-12', '04:20:34', '::1'),
(390, 'Leticia', '2014-11-12', '04:21:46', '::1'),
(391, 'Leticia', '2014-11-12', '04:21:51', '::1'),
(392, 'Leticia', '2014-11-12', '04:21:57', '::1'),
(393, 'Leticia', '2014-11-12', '04:22:03', '::1'),
(394, 'Leticia', '2014-11-12', '04:22:13', '::1'),
(395, 'Leticia', '2014-11-12', '04:22:41', '::1'),
(396, 'Leticia', '2014-11-12', '04:22:45', '::1'),
(397, 'Leticia', '2014-11-12', '04:22:49', '::1'),
(398, 'Leticia', '2014-11-12', '04:22:54', '::1'),
(399, 'Leticia', '2014-11-12', '04:22:58', '::1'),
(400, 'Leticia', '2014-11-12', '04:23:15', '::1'),
(401, 'Leticia', '2014-11-12', '04:23:35', '::1'),
(402, 'Leticia', '2014-11-12', '04:24:39', '::1'),
(403, 'Leticia', '2014-11-12', '04:24:52', '::1'),
(404, 'Leticia', '2014-11-12', '04:24:53', '::1'),
(405, 'Leticia', '2014-11-12', '04:31:05', '::1'),
(406, 'Leticia', '2014-11-12', '04:31:12', '::1'),
(407, 'Leticia', '2014-11-12', '04:32:50', '::1'),
(408, 'Leticia', '2014-11-12', '04:33:26', '::1'),
(409, 'Leticia', '2014-11-12', '04:36:08', '::1'),
(410, 'Leticia', '2014-11-12', '04:37:31', '::1'),
(411, 'Leticia', '2014-11-12', '05:14:09', '::1'),
(412, 'Leticia', '2014-11-12', '05:14:27', '::1'),
(413, 'Leticia', '2014-11-12', '05:14:43', '::1'),
(414, 'Leticia', '2014-11-12', '05:15:03', '::1'),
(415, 'Leticia', '2014-11-12', '05:15:42', '::1'),
(416, 'Leticia', '2014-11-12', '05:17:06', '::1'),
(417, 'Leticia', '2014-11-12', '05:19:55', '::1'),
(418, 'Leticia', '2014-11-12', '05:21:05', '::1'),
(419, 'Leticia', '2014-11-12', '05:28:30', '::1'),
(420, 'Leticia', '2014-11-12', '05:33:05', '::1'),
(421, 'Leticia', '2014-11-12', '05:34:45', '::1'),
(422, 'Leticia', '2014-11-12', '05:35:04', '::1'),
(423, 'Leticia', '2014-11-12', '05:36:02', '::1'),
(424, 'Leticia', '2014-11-12', '05:36:40', '::1'),
(425, 'Leticia', '2014-11-12', '05:38:06', '::1'),
(426, 'Leticia', '2014-11-12', '05:38:11', '::1'),
(427, 'Leticia', '2014-11-12', '05:38:23', '::1'),
(428, 'Leticia', '2014-11-12', '05:38:57', '::1'),
(429, 'Leticia', '2014-11-12', '05:39:17', '::1'),
(430, 'Boris', '2014-11-12', '05:17:39', '::1'),
(431, 'Boris', '2014-11-12', '05:18:17', '::1'),
(434, 'Leticia', '2014-11-12', '05:22:38', '::1'),
(435, 'Leticia', '2014-11-12', '05:29:10', '::1'),
(455, 'Leticia', '2014-11-12', '09:10:54', '::1'),
(456, 'Leticia', '2014-11-12', '09:11:56', '::1'),
(460, 'Leticia', '2014-11-12', '09:15:48', '::1'),
(461, 'Leticia', '2014-11-12', '09:25:10', '::1'),
(462, 'Boris', '2014-11-12', '09:25:19', '::1'),
(463, 'Boris', '2014-11-12', '09:31:41', '::1'),
(470, 'Boris', '2014-11-13', '12:11:14', '::1'),
(471, 'admin', '2014-11-13', '12:34:00', '::1'),
(472, 'admin', '2014-11-13', '12:34:59', '::1'),
(473, 'admin', '2014-11-13', '12:46:10', '::1'),
(474, 'Boris', '2014-11-13', '12:57:17', '::1'),
(475, 'Boris', '2014-11-13', '12:57:34', '::1'),
(476, 'Boris', '2014-11-13', '12:58:03', '::1'),
(477, 'Boris', '2014-11-13', '12:59:02', '::1'),
(478, 'Leticia', '2014-11-13', '12:59:38', '::1'),
(479, 'Leticia', '2014-11-13', '12:59:44', '::1'),
(480, 'Leticia', '2014-11-13', '01:00:01', '::1'),
(481, 'Leticia', '2014-11-13', '01:00:18', '::1'),
(482, 'Leticia', '2014-11-13', '01:00:22', '::1'),
(483, 'Leticia', '2014-11-13', '01:00:24', '::1'),
(484, 'Leticia', '2014-11-13', '01:00:38', '::1'),
(485, 'Leticia', '2014-11-13', '01:00:55', '::1'),
(486, 'Leticia', '2014-11-13', '01:00:56', '::1'),
(487, 'Leticia', '2014-11-13', '01:00:59', '::1'),
(488, 'Leticia', '2014-11-13', '01:01:29', '::1'),
(489, 'Leticia', '2014-11-13', '01:02:18', '::1'),
(490, 'Leticia', '2014-11-13', '01:02:58', '::1'),
(491, 'Leticia', '2014-11-13', '01:05:08', '::1'),
(492, 'Leticia', '2014-11-13', '01:05:18', '::1'),
(493, 'Leticia', '2014-11-13', '01:06:47', '::1'),
(494, 'Leticia', '2014-11-13', '01:07:31', '::1'),
(495, 'Leticia', '2014-11-13', '01:07:44', '::1'),
(496, 'Leticia', '2014-11-13', '01:08:45', '::1'),
(497, 'Leticia', '2014-11-13', '01:09:50', '::1'),
(498, 'Leticia', '2014-11-13', '03:05:29', '::1'),
(499, 'Leticia', '2014-11-13', '03:05:35', '::1'),
(500, 'Leticia', '2014-11-13', '03:06:25', '::1'),
(501, 'Leticia', '2014-11-13', '03:06:58', '::1'),
(502, 'Leticia', '2014-11-13', '03:07:42', '::1'),
(503, 'Leticia', '2014-11-13', '03:08:08', '::1'),
(504, 'Leticia', '2014-11-13', '03:09:43', '::1'),
(505, 'Leticia', '2014-11-13', '03:09:49', '::1'),
(506, 'Leticia', '2014-11-13', '03:10:00', '::1'),
(507, 'Leticia', '2014-11-13', '03:10:10', '::1'),
(508, 'Leticia', '2014-11-13', '03:13:49', '::1'),
(509, 'Leticia', '2014-11-13', '03:15:12', '::1'),
(510, 'Leticia', '2014-11-13', '03:16:11', '::1'),
(511, 'Leticia', '2014-11-13', '03:16:24', '::1'),
(512, 'Leticia', '2014-11-13', '03:17:13', '::1'),
(513, 'Leticia', '2014-11-13', '03:17:20', '::1'),
(514, 'Leticia', '2014-11-13', '03:17:25', '::1'),
(515, 'Leticia', '2014-11-13', '03:22:28', '::1'),
(516, 'Leticia', '2014-11-13', '03:22:39', '::1'),
(517, 'Leticia', '2014-11-13', '03:23:55', '::1'),
(518, 'Leticia', '2014-11-13', '03:25:14', '::1'),
(519, 'Leticia', '2014-11-13', '03:26:03', '::1'),
(520, 'Leticia', '2014-11-13', '03:26:18', '::1'),
(521, 'Leticia', '2014-11-13', '03:27:24', '::1'),
(522, 'Leticia', '2014-11-13', '03:28:38', '::1'),
(523, 'Leticia', '2014-11-13', '03:32:56', '::1'),
(524, 'Leticia', '2014-11-13', '03:33:22', '::1'),
(525, 'Leticia', '2014-11-13', '03:34:42', '::1'),
(526, 'Leticia', '2014-11-13', '03:35:33', '::1'),
(527, 'Leticia', '2014-11-13', '03:35:42', '::1'),
(528, 'Leticia', '2014-11-13', '03:38:03', '::1'),
(529, 'Leticia', '2014-11-13', '03:38:08', '::1'),
(530, 'Leticia', '2014-11-13', '03:39:18', '::1'),
(531, 'Leticia', '2014-11-13', '03:39:24', '::1'),
(532, 'Leticia', '2014-11-13', '03:42:27', '::1'),
(533, 'Leticia', '2014-11-13', '03:42:34', '::1'),
(534, 'Leticia', '2014-11-13', '03:42:55', '::1'),
(535, 'Leticia', '2014-11-13', '03:43:27', '::1'),
(536, 'Leticia', '2014-11-13', '03:43:32', '::1'),
(537, 'Leticia', '2014-11-13', '03:44:50', '::1'),
(538, 'Leticia', '2014-11-13', '03:45:32', '::1'),
(539, 'Leticia', '2014-11-13', '03:45:43', '::1'),
(540, 'Boris', '2014-11-13', '04:58:46', '::1'),
(541, 'Boris', '2014-11-13', '04:58:52', '::1'),
(542, 'admin', '2014-11-13', '02:38:30', '::1'),
(543, 'admin', '2014-11-13', '02:47:49', '::1'),
(544, 'Leticia', '2014-11-13', '03:06:21', '::1'),
(545, 'Leticia', '2014-11-13', '03:06:26', '::1'),
(546, 'Boris', '2014-11-13', '08:45:54', '::1'),
(547, 'Boris', '2014-11-13', '08:47:03', '::1'),
(548, 'Boris', '2014-11-13', '08:59:29', '::1'),
(549, 'Boris', '2014-11-13', '08:59:48', '::1'),
(550, 'Boris', '2014-11-13', '09:00:37', '::1'),
(551, 'Boris', '2014-11-13', '09:12:41', '::1'),
(552, 'Boris', '2014-11-13', '09:14:18', '::1'),
(553, 'Boris', '2014-11-13', '09:18:54', '::1'),
(554, 'Boris', '2014-11-13', '09:20:24', '::1'),
(555, 'Boris', '2014-11-13', '09:24:30', '::1'),
(556, 'Boris', '2014-11-13', '09:30:08', '::1'),
(557, 'Boris', '2014-11-13', '09:30:34', '::1'),
(558, 'Boris', '2014-11-13', '09:38:57', '::1'),
(559, 'Boris', '2014-11-13', '09:48:57', '::1'),
(560, 'Boris', '2014-11-13', '09:50:40', '::1'),
(561, 'Boris', '2014-11-13', '09:51:35', '::1'),
(562, 'Boris', '2014-11-13', '09:52:06', '::1'),
(563, 'Boris', '2014-11-13', '09:53:54', '::1'),
(564, 'Boris', '2014-11-13', '09:55:39', '::1'),
(565, 'Boris', '2014-11-13', '10:11:27', '::1'),
(566, 'Boris', '2014-11-13', '10:23:37', '::1'),
(567, 'Boris', '2014-11-13', '10:36:34', '::1'),
(568, 'Boris', '2014-11-13', '10:36:53', '::1'),
(569, 'Boris', '2014-11-13', '10:36:56', '::1'),
(570, 'Boris', '2014-11-13', '10:44:49', '::1'),
(571, 'Boris', '2014-11-13', '10:44:51', '::1'),
(572, 'Boris', '2014-11-13', '10:44:52', '::1'),
(573, 'Boris', '2014-11-13', '10:44:54', '::1'),
(574, 'Boris', '2014-11-13', '10:47:45', '::1'),
(575, 'Boris', '2014-11-13', '10:47:46', '::1'),
(576, 'Boris', '2014-11-13', '10:47:54', '::1'),
(577, 'Boris', '2014-11-13', '10:47:56', '::1'),
(578, 'Boris', '2014-11-13', '10:48:03', '::1'),
(579, 'Boris', '2014-11-13', '10:48:05', '::1'),
(580, 'Boris', '2014-11-13', '10:49:27', '::1'),
(581, 'Boris', '2014-11-13', '10:59:56', '::1'),
(582, 'Boris', '2014-11-13', '11:04:42', '::1'),
(583, 'Boris', '2014-11-13', '11:05:27', '::1'),
(584, 'Boris', '2014-11-13', '11:05:54', '::1'),
(585, 'Boris', '2014-11-13', '11:06:15', '::1'),
(586, 'Boris', '2014-11-13', '11:08:23', '::1'),
(587, 'Boris', '2014-11-13', '11:08:46', '::1'),
(588, 'Boris', '2014-11-13', '11:09:36', '::1'),
(589, 'Boris', '2014-11-13', '11:10:54', '::1'),
(590, 'Boris', '2014-11-13', '11:12:51', '::1'),
(591, 'Boris', '2014-11-13', '11:13:36', '::1'),
(592, 'Boris', '2014-11-13', '11:14:46', '::1'),
(593, 'Boris', '2014-11-13', '11:14:49', '::1'),
(594, 'Boris', '2014-11-13', '11:14:55', '::1'),
(595, 'Boris', '2014-11-13', '11:15:00', '::1'),
(596, 'Boris', '2014-11-13', '11:15:58', '::1'),
(597, 'Boris', '2014-11-13', '11:16:03', '::1'),
(598, 'Boris', '2014-11-13', '11:16:06', '::1'),
(599, 'Boris', '2014-11-13', '11:16:37', '::1'),
(600, 'Boris', '2014-11-13', '11:16:41', '::1'),
(601, 'Boris', '2014-11-13', '11:18:11', '::1'),
(602, 'Boris', '2014-11-13', '11:19:15', '::1'),
(603, 'Boris', '2014-11-13', '11:19:16', '::1'),
(604, 'Boris', '2014-11-13', '11:19:52', '::1'),
(605, 'Boris', '2014-11-13', '11:22:58', '::1'),
(606, 'Boris', '2014-11-13', '11:25:32', '::1'),
(607, 'Boris', '2014-11-13', '11:41:31', '::1'),
(608, 'Boris', '2014-11-13', '11:43:06', '::1'),
(609, 'Boris', '2014-11-13', '11:43:17', '::1'),
(610, 'Boris', '2014-11-13', '11:43:36', '::1'),
(611, 'Boris', '2014-11-13', '11:43:40', '::1'),
(612, 'Boris', '2014-11-13', '11:43:59', '::1'),
(613, 'Boris', '2014-11-13', '11:44:03', '::1'),
(614, 'Boris', '2014-11-13', '11:44:36', '::1'),
(615, 'Boris', '2014-11-13', '11:44:40', '::1'),
(616, 'Boris', '2014-11-13', '11:44:44', '::1'),
(617, 'Boris', '2014-11-13', '11:45:00', '::1'),
(618, 'Boris', '2014-11-13', '11:45:00', '::1'),
(619, 'Boris', '2014-11-13', '11:45:01', '::1'),
(620, 'Boris', '2014-11-13', '11:45:01', '::1'),
(621, 'Boris', '2014-11-13', '11:45:02', '::1'),
(622, 'Boris', '2014-11-13', '11:45:04', '::1'),
(623, 'Boris', '2014-11-13', '11:45:09', '::1'),
(624, 'Boris', '2014-11-13', '11:45:12', '::1'),
(625, 'Boris', '2014-11-13', '11:45:16', '::1'),
(626, 'Boris', '2014-11-13', '11:45:22', '::1'),
(627, 'Boris', '2014-11-13', '11:45:25', '::1'),
(628, 'Boris', '2014-11-13', '11:45:29', '::1'),
(629, 'Boris', '2014-11-13', '11:45:32', '::1'),
(630, 'Boris', '2014-11-13', '11:45:50', '::1'),
(633, 'Boris', '2014-11-14', '03:29:57', '::1'),
(634, 'Boris', '2014-11-14', '03:30:01', '::1'),
(635, 'Boris', '2014-11-14', '03:30:42', '::1'),
(636, 'Boris', '2014-11-14', '03:39:06', '::1'),
(637, 'Boris', '2014-11-14', '03:39:31', '::1'),
(638, 'Boris', '2014-11-14', '03:40:06', '::1'),
(639, 'Boris', '2014-11-14', '03:43:32', '::1'),
(640, 'Boris', '2014-11-14', '03:44:03', '::1'),
(642, 'Boris', '2014-11-14', '03:58:39', '::1'),
(643, 'Boris', '2014-11-14', '03:58:45', '::1'),
(644, 'Leticia', '2014-11-14', '01:34:23', '::1'),
(645, 'Leticia', '2014-11-14', '01:36:19', '::1'),
(646, 'Leticia', '2014-11-14', '01:58:01', '::1'),
(647, 'Leticia', '2014-11-14', '01:58:59', '::1'),
(648, 'Leticia', '2014-11-14', '02:00:49', '::1'),
(649, 'Leticia', '2014-11-14', '02:00:58', '::1'),
(650, 'Leticia', '2014-11-14', '03:13:21', '::1'),
(651, 'Leticia', '2014-11-14', '03:13:30', '::1'),
(652, 'Leticia', '2014-11-14', '03:16:35', '::1'),
(653, 'Leticia', '2014-11-14', '03:16:59', '::1'),
(658, 'Leticia', '2014-11-14', '03:19:03', '::1'),
(659, 'Leticia', '2014-11-14', '03:19:10', '::1'),
(660, 'Leticia', '2014-11-14', '04:14:33', '::1'),
(661, 'Leticia', '2014-11-14', '04:18:25', '::1'),
(662, 'Boris', '2014-11-15', '01:42:46', '::1'),
(663, 'Boris', '2014-11-15', '01:43:28', '::1'),
(664, 'Boris', '2014-11-15', '01:43:54', '::1'),
(665, 'Boris', '2014-11-15', '01:44:16', '::1'),
(670, 'Boris', '2014-11-15', '01:51:35', '::1'),
(674, 'Leticia', '2014-11-15', '03:34:37', '::1'),
(675, 'Leticia', '2014-11-15', '03:46:32', '::1'),
(676, 'Leticia', '2014-11-15', '03:54:55', '::1'),
(677, 'Leticia', '2014-11-15', '07:51:35', '::1'),
(678, 'Leticia', '2014-11-15', '07:52:36', '::1'),
(679, 'Leticia', '2014-11-16', '04:44:38', '::1'),
(680, 'Leticia', '2014-11-16', '04:46:14', '::1'),
(681, 'admin', '2014-11-16', '04:46:21', '::1'),
(682, 'admin', '2014-11-16', '04:51:28', '::1'),
(683, 'admin', '2014-11-16', '04:51:42', '::1'),
(684, 'admin', '2014-11-16', '04:52:53', '::1'),
(685, 'admin', '2014-11-16', '04:54:40', '::1'),
(686, 'admin', '2014-11-16', '04:55:05', '::1'),
(687, 'admin', '2014-11-16', '04:56:19', '::1'),
(688, 'admin', '2014-11-16', '04:56:40', '::1'),
(689, 'admin', '2014-11-16', '04:57:55', '::1'),
(690, 'admin', '2014-11-16', '04:58:13', '::1'),
(691, 'admin', '2014-11-16', '04:59:42', '::1'),
(692, 'admin', '2014-11-16', '05:00:22', '::1'),
(693, 'admin', '2014-11-16', '05:03:17', '::1'),
(694, 'admin', '2014-11-16', '05:04:11', '::1'),
(695, 'admin', '2014-11-16', '05:05:15', '::1'),
(696, 'admin', '2014-11-16', '05:07:10', '::1'),
(697, 'admin', '2014-11-16', '05:07:35', '::1'),
(698, 'admin', '2014-11-16', '05:07:56', '::1'),
(699, 'admin', '2014-11-16', '05:10:18', '::1'),
(700, 'admin', '2014-11-16', '05:10:35', '::1'),
(701, 'admin', '2014-11-16', '05:10:48', '::1'),
(702, 'admin', '2014-11-16', '05:13:04', '::1'),
(703, 'admin', '2014-11-16', '05:13:06', '::1'),
(704, 'admin', '2014-11-16', '05:14:46', '::1'),
(705, 'admin', '2014-11-16', '05:15:25', '::1'),
(706, 'admin', '2014-11-16', '05:15:26', '::1'),
(707, 'admin', '2014-11-16', '05:15:27', '::1'),
(708, 'admin', '2014-11-16', '05:16:10', '::1'),
(709, 'admin', '2014-11-16', '05:16:11', '::1'),
(710, 'admin', '2014-11-16', '05:16:29', '::1'),
(711, 'admin', '2014-11-16', '05:16:34', '::1'),
(712, 'admin', '2014-11-16', '05:16:45', '::1'),
(713, 'admin', '2014-11-16', '05:19:09', '::1'),
(714, 'admin', '2014-11-16', '05:21:52', '::1'),
(715, 'admin', '2014-11-16', '05:22:00', '::1'),
(716, 'admin', '2014-11-16', '05:22:08', '::1'),
(717, 'admin', '2014-11-16', '05:22:14', '::1'),
(718, 'admin', '2014-11-16', '05:22:51', '::1'),
(719, 'admin', '2014-11-16', '05:23:19', '::1'),
(720, 'admin', '2014-11-16', '05:25:05', '::1'),
(721, 'admin', '2014-11-16', '05:26:25', '::1'),
(722, 'admin', '2014-11-16', '05:26:36', '::1'),
(723, 'admin', '2014-11-16', '05:26:39', '::1'),
(724, 'admin', '2014-11-16', '05:27:08', '::1'),
(725, 'admin', '2014-11-16', '05:27:16', '::1'),
(726, 'admin', '2014-11-16', '05:27:56', '::1'),
(727, 'admin', '2014-11-16', '05:28:20', '::1'),
(728, 'admin', '2014-11-16', '05:28:28', '::1'),
(729, 'admin', '2014-11-16', '05:29:16', '::1'),
(730, 'admin', '2014-11-16', '05:29:44', '::1'),
(731, 'admin', '2014-11-16', '05:29:55', '::1'),
(732, 'admin', '2014-11-16', '05:36:38', '::1'),
(733, 'admin', '2014-11-16', '05:37:03', '::1'),
(734, 'Leticia', '2014-11-16', '05:37:22', '::1'),
(735, 'Leticia', '2014-11-16', '05:38:04', '::1'),
(736, 'Leticia', '2014-11-16', '05:39:26', '::1'),
(737, 'Leticia', '2014-11-16', '05:40:14', '::1'),
(738, 'Leticia', '2014-11-16', '05:41:31', '::1'),
(739, 'Leticia', '2014-11-16', '05:45:40', '::1'),
(740, 'Leticia', '2014-11-16', '05:49:08', '::1'),
(741, 'Leticia', '2014-11-16', '05:49:24', '::1'),
(742, 'Leticia', '2014-11-16', '05:51:42', '::1'),
(743, 'Leticia', '2014-11-16', '05:54:54', '::1'),
(744, 'Leticia', '2014-11-16', '05:55:03', '::1'),
(745, 'Leticia', '2014-11-16', '05:59:07', '::1'),
(746, 'Leticia', '2014-11-16', '06:08:22', '::1'),
(747, 'Leticia', '2014-11-16', '06:08:53', '::1'),
(748, 'Leticia', '2014-11-16', '06:09:13', '::1'),
(749, 'Leticia', '2014-11-16', '06:09:26', '::1'),
(750, 'Leticia', '2014-11-16', '04:38:10', '::1'),
(751, 'Leticia', '2014-11-16', '04:38:14', '::1'),
(752, 'Leticia', '2014-11-16', '04:40:14', '::1'),
(753, 'Leticia', '2014-11-16', '04:40:43', '::1'),
(754, 'Leticia', '2014-11-16', '04:42:03', '::1'),
(755, 'Leticia', '2014-11-16', '05:09:58', '::1'),
(756, 'Leticia', '2014-11-16', '05:14:33', '::1'),
(757, 'Leticia', '2014-11-16', '05:14:38', '::1'),
(758, 'Leticia', '2014-11-16', '05:28:32', '::1'),
(759, 'Leticia', '2014-11-16', '05:28:43', '::1'),
(760, 'Leticia', '2014-11-16', '05:32:41', '::1'),
(761, 'Leticia', '2014-11-16', '05:34:21', '::1'),
(762, 'Leticia', '2014-11-16', '05:34:51', '::1'),
(763, 'Leticia', '2014-11-16', '05:35:08', '::1'),
(764, 'Leticia', '2014-11-16', '05:35:13', '::1'),
(765, 'Leticia', '2014-11-18', '02:13:10', '::1'),
(766, 'Leticia', '2014-11-18', '02:13:19', '::1'),
(767, 'Leticia', '2014-11-19', '07:59:44', '::1'),
(768, 'Leticia', '2014-11-20', '08:33:37', '::1'),
(769, 'Leticia', '2014-11-20', '08:33:44', '::1'),
(770, 'Leticia', '2014-11-20', '08:33:54', '::1'),
(771, 'Leticia', '2014-11-25', '12:11:53', '::1'),
(772, 'Leticia', '2014-11-25', '12:12:55', '::1'),
(773, 'Leticia', '2014-11-25', '12:15:35', '::1'),
(774, 'Leticia', '2014-11-25', '12:16:19', '::1'),
(775, 'Leticia', '2014-11-25', '12:16:37', '::1'),
(777, 'Leticia', '2014-11-25', '12:40:30', '::1'),
(778, 'Leticia', '2014-11-25', '12:41:07', '::1'),
(779, 'Leticia', '2014-11-25', '12:43:44', '::1'),
(780, 'Leticia', '2014-11-25', '12:43:58', '::1'),
(781, 'Leticia', '2014-11-25', '05:45:24', '::1'),
(782, 'Leticia', '2014-11-25', '05:45:39', '::1'),
(783, 'admin', '2014-11-25', '05:46:04', '::1'),
(784, 'Leticia', '2014-11-25', '05:49:29', '::1'),
(785, 'Leticia', '2014-11-25', '05:49:41', '::1'),
(786, 'Leticia', '2014-11-25', '05:55:31', '::1'),
(787, 'Leticia', '2014-11-25', '05:56:19', '::1'),
(788, 'Leticia', '2014-11-25', '05:56:58', '::1'),
(789, 'Leticia', '2014-11-25', '05:58:27', '::1'),
(790, 'Leticia', '2014-11-25', '06:01:14', '::1'),
(791, 'Leticia', '2014-11-25', '06:01:31', '::1'),
(792, 'Leticia', '2014-11-25', '06:01:33', '::1'),
(793, 'Leticia', '2014-11-25', '06:01:34', '::1'),
(794, 'Leticia', '2014-11-25', '06:01:36', '::1'),
(795, 'Leticia', '2014-11-25', '06:01:39', '::1'),
(796, 'Leticia', '2014-11-25', '06:03:14', '::1'),
(797, 'Leticia', '2014-11-25', '06:03:37', '::1'),
(798, 'Leticia', '2014-11-25', '06:10:09', '::1'),
(799, 'Leticia', '2014-11-25', '06:10:55', '::1'),
(800, 'Leticia', '2014-11-25', '06:11:23', '::1'),
(801, 'Leticia', '2014-11-25', '06:11:24', '::1'),
(802, 'Leticia', '2014-11-25', '06:11:57', '::1'),
(803, 'Leticia', '2014-11-25', '06:12:14', '::1'),
(804, 'Leticia', '2014-11-25', '06:14:02', '::1'),
(805, 'Leticia', '2014-11-25', '06:43:41', '::1'),
(806, 'Leticia', '2014-11-25', '09:56:29', '::1'),
(807, 'Leticia', '2014-11-25', '10:52:19', '::1'),
(808, 'Leticia', '2014-11-25', '11:00:56', '::1'),
(809, 'Leticia', '2014-11-25', '11:01:21', '::1'),
(810, 'Leticia', '2014-11-25', '11:03:03', '::1'),
(811, 'Leticia', '2014-11-25', '11:03:53', '::1'),
(812, 'Leticia', '2014-11-25', '11:04:24', '::1'),
(813, 'Leticia', '2014-11-25', '11:10:58', '::1'),
(814, 'Leticia', '2014-11-25', '11:12:10', '::1'),
(815, 'Leticia', '2014-11-25', '11:24:26', '::1'),
(816, 'Leticia', '2014-11-25', '11:24:50', '::1'),
(817, 'Leticia', '2014-11-25', '11:28:46', '::1'),
(818, 'Leticia', '2014-11-25', '11:34:02', '::1'),
(819, 'Leticia', '2014-11-25', '11:34:03', '::1'),
(820, 'Leticia', '2014-11-25', '11:44:25', '::1'),
(821, 'Leticia', '2014-11-25', '11:44:35', '::1'),
(822, 'Leticia', '2014-11-25', '11:45:03', '::1'),
(823, 'Leticia', '2014-11-25', '11:45:06', '::1'),
(824, 'Leticia', '2014-11-25', '11:45:18', '::1'),
(825, 'Leticia', '2014-11-25', '11:45:49', '::1'),
(826, 'Leticia', '2014-11-25', '11:46:28', '::1'),
(827, 'Leticia', '2014-11-25', '11:47:45', '::1'),
(828, 'Leticia', '2014-11-25', '11:48:11', '::1'),
(829, 'Leticia', '2014-11-25', '11:48:34', '::1'),
(830, 'Leticia', '2014-11-25', '11:49:07', '::1'),
(831, 'Leticia', '2014-11-25', '11:52:57', '::1'),
(832, 'Leticia', '2014-11-25', '11:53:12', '::1'),
(833, 'Leticia', '2014-11-25', '11:53:55', '::1'),
(834, 'Leticia', '2014-11-25', '11:54:14', '::1'),
(835, 'Leticia', '2014-11-25', '11:54:40', '::1'),
(836, 'Leticia', '2014-11-25', '11:54:59', '::1'),
(837, 'Leticia', '2014-11-25', '11:55:12', '::1'),
(838, 'Leticia', '2014-11-25', '11:57:17', '::1'),
(839, 'Leticia', '2014-11-25', '11:57:31', '::1'),
(840, 'Leticia', '2014-11-25', '11:57:53', '::1'),
(841, 'Leticia', '2014-11-25', '11:58:31', '::1'),
(842, 'Leticia', '2014-11-26', '12:00:24', '::1'),
(843, 'Leticia', '2014-11-26', '12:00:25', '::1'),
(844, 'Leticia', '2014-11-26', '12:00:29', '::1'),
(845, 'Leticia', '2014-11-26', '12:00:49', '::1'),
(846, 'Leticia', '2014-11-28', '04:40:55', '::1'),
(847, 'Leticia', '2014-11-28', '04:40:56', '::1'),
(848, 'Leticia', '2014-11-28', '04:42:14', '::1'),
(849, 'Leticia', '2014-11-28', '04:42:17', '::1'),
(850, 'Leticia', '2014-11-28', '04:42:19', '::1'),
(851, 'Leticia', '2014-11-28', '04:42:36', '::1'),
(852, 'Leticia', '2014-11-28', '04:43:46', '::1'),
(853, 'Leticia', '2014-11-28', '04:44:07', '::1'),
(854, 'Leticia', '2014-11-28', '04:44:14', '::1'),
(855, 'Leticia', '2014-11-28', '04:44:57', '::1'),
(856, 'Leticia', '2014-11-28', '04:48:49', '::1'),
(857, 'Leticia', '2014-11-28', '04:49:05', '::1'),
(858, 'Leticia', '2014-11-28', '04:49:50', '::1'),
(859, 'Leticia', '2014-11-28', '04:50:29', '::1'),
(860, 'Leticia', '2014-11-28', '04:50:43', '::1'),
(861, 'Leticia', '2014-11-28', '04:50:59', '::1'),
(862, 'Leticia', '2014-11-28', '04:52:17', '::1'),
(863, 'Leticia', '2014-11-28', '04:53:12', '::1'),
(864, 'Leticia', '2014-11-28', '04:55:06', '::1'),
(865, 'Leticia', '2014-11-28', '04:55:55', '::1'),
(866, 'Leticia', '2014-11-28', '04:56:23', '::1'),
(867, 'Leticia', '2014-11-28', '04:58:49', '::1'),
(868, 'Leticia', '2014-11-28', '04:59:13', '::1'),
(869, 'Leticia', '2014-11-28', '04:59:15', '::1'),
(870, 'Leticia', '2014-11-28', '04:59:16', '::1'),
(871, 'Leticia', '2014-11-28', '04:59:19', '::1'),
(872, 'Leticia', '2014-11-28', '05:02:58', '::1'),
(873, 'Leticia', '2014-11-28', '05:14:42', '::1'),
(874, 'Leticia', '2014-11-28', '05:18:51', '::1'),
(875, 'Leticia', '2014-11-28', '05:19:33', '::1'),
(876, 'Leticia', '2014-11-28', '05:22:04', '::1'),
(877, 'Leticia', '2014-11-28', '05:22:17', '::1'),
(878, 'Leticia', '2014-11-28', '05:22:38', '::1'),
(879, 'Leticia', '2014-11-28', '05:22:39', '::1'),
(880, 'Leticia', '2014-11-28', '05:22:41', '::1'),
(881, 'Leticia', '2014-11-28', '05:30:11', '::1'),
(882, 'Leticia', '2014-11-28', '05:30:12', '::1'),
(883, 'Leticia', '2014-11-28', '05:30:14', '::1'),
(884, 'Leticia', '2014-11-28', '05:30:57', '::1'),
(885, 'Leticia', '2014-11-28', '05:33:30', '::1'),
(886, 'Leticia', '2014-11-28', '05:33:40', '::1'),
(887, 'Leticia', '2014-11-28', '05:33:57', '::1'),
(888, 'Leticia', '2014-11-28', '05:34:01', '::1'),
(889, 'Leticia', '2014-11-28', '05:34:02', '::1'),
(890, 'Leticia', '2014-11-28', '05:34:04', '::1'),
(891, 'Leticia', '2014-11-28', '05:37:57', '::1'),
(892, 'Leticia', '2014-11-28', '05:37:58', '::1'),
(893, 'Leticia', '2014-11-28', '05:37:59', '::1'),
(894, 'Leticia', '2014-11-28', '05:38:21', '::1'),
(895, 'Leticia', '2014-11-28', '05:38:24', '::1'),
(896, 'Leticia', '2014-11-28', '05:38:29', '::1'),
(897, 'Leticia', '2014-11-29', '02:12:59', '::1'),
(898, 'Leticia', '2014-11-29', '02:13:17', '::1'),
(899, 'Leticia', '2014-11-29', '02:16:13', '::1'),
(900, 'Leticia', '2014-11-29', '02:16:31', '::1'),
(901, 'Leticia', '2014-11-29', '02:16:32', '::1'),
(902, 'Leticia', '2014-11-29', '02:16:52', '::1'),
(903, 'Leticia', '2014-11-29', '02:17:21', '::1'),
(904, 'Leticia', '2014-11-29', '02:19:02', '::1'),
(905, 'Leticia', '2014-11-29', '02:20:40', '::1'),
(906, 'Leticia', '2014-11-29', '03:05:15', '::1'),
(907, 'Leticia', '2014-11-29', '03:08:13', '::1'),
(908, 'Leticia', '2014-11-29', '03:08:52', '::1'),
(909, 'Leticia', '2014-11-29', '03:09:16', '::1'),
(910, 'Leticia', '2014-11-29', '03:10:43', '::1'),
(911, 'Leticia', '2014-11-29', '03:10:54', '::1'),
(912, 'Leticia', '2014-11-29', '03:11:06', '::1'),
(913, 'Leticia', '2014-11-29', '03:11:14', '::1'),
(914, 'Leticia', '2014-11-29', '03:11:56', '::1'),
(915, 'Leticia', '2014-11-29', '03:12:32', '::1'),
(916, 'Leticia', '2014-11-29', '03:12:35', '::1'),
(917, 'Leticia', '2014-11-29', '03:13:06', '::1'),
(918, 'Leticia', '2014-11-29', '03:13:09', '::1'),
(919, 'Leticia', '2014-11-29', '03:14:03', '::1'),
(920, 'Leticia', '2014-11-29', '03:14:32', '::1'),
(921, 'Leticia', '2014-11-29', '03:17:08', '::1'),
(922, 'Leticia', '2014-11-29', '03:18:54', '::1'),
(923, 'Leticia', '2014-11-29', '03:19:47', '::1'),
(924, 'Leticia', '2014-11-29', '03:19:51', '::1'),
(925, 'Leticia', '2014-11-29', '03:19:53', '::1'),
(926, 'Leticia', '2014-11-29', '03:19:54', '::1'),
(927, 'Leticia', '2014-11-29', '03:19:56', '::1'),
(928, 'Leticia', '2014-11-29', '03:19:58', '::1'),
(929, 'Leticia', '2014-11-29', '03:20:00', '::1'),
(930, 'Leticia', '2014-11-29', '03:20:03', '::1'),
(931, 'Leticia', '2014-11-29', '03:24:03', '::1'),
(932, 'Leticia', '2014-11-29', '03:24:12', '::1'),
(933, 'Leticia', '2014-11-29', '03:24:17', '::1'),
(934, 'Leticia', '2014-11-29', '03:24:19', '::1'),
(935, 'Leticia', '2014-11-29', '03:24:21', '::1'),
(936, 'Leticia', '2014-11-29', '03:24:26', '::1'),
(937, 'Leticia', '2014-11-29', '03:24:27', '::1'),
(938, 'Leticia', '2014-11-29', '03:24:35', '::1'),
(939, 'Leticia', '2014-11-29', '03:26:43', '::1'),
(940, 'Leticia', '2014-11-29', '03:26:45', '::1'),
(941, 'Leticia', '2014-11-29', '03:29:30', '::1'),
(942, 'Leticia', '2014-11-29', '03:44:35', '::1'),
(943, 'Leticia', '2014-11-29', '03:45:57', '::1'),
(944, 'Leticia', '2014-11-29', '03:48:43', '::1'),
(945, 'Leticia', '2014-11-29', '03:49:47', '::1'),
(946, 'Leticia', '2014-11-29', '03:56:56', '::1'),
(947, 'Leticia', '2014-11-29', '04:02:42', '::1'),
(948, 'Leticia', '2014-11-29', '04:05:42', '::1'),
(949, 'Leticia', '2014-11-29', '04:08:32', '::1'),
(950, 'Leticia', '2014-11-29', '04:13:12', '::1'),
(951, 'Leticia', '2014-11-29', '04:14:03', '::1'),
(952, 'Leticia', '2014-11-29', '04:14:11', '::1'),
(953, 'Leticia', '2014-11-29', '04:14:37', '::1'),
(954, 'Leticia', '2014-11-29', '04:16:17', '::1'),
(955, 'Leticia', '2014-11-29', '04:21:19', '::1'),
(956, 'Leticia', '2014-11-29', '04:23:14', '::1'),
(957, 'Leticia', '2014-11-29', '04:23:22', '::1'),
(958, 'Leticia', '2014-11-29', '04:25:58', '::1'),
(959, 'Leticia', '2014-11-29', '04:26:01', '::1'),
(960, 'Leticia', '2014-11-29', '04:26:16', '::1'),
(961, 'Leticia', '2014-11-29', '04:26:17', '::1'),
(962, 'Leticia', '2014-11-29', '04:26:49', '::1'),
(963, 'Leticia', '2014-11-29', '04:27:00', '::1'),
(964, 'Leticia', '2014-11-29', '04:27:05', '::1'),
(965, 'Leticia', '2014-11-29', '04:27:05', '::1'),
(966, 'Leticia', '2014-11-29', '04:27:08', '::1'),
(967, 'Leticia', '2014-11-29', '04:27:45', '::1'),
(968, 'Leticia', '2014-11-29', '04:28:25', '::1'),
(969, 'Leticia', '2014-11-29', '04:28:29', '::1'),
(970, 'Leticia', '2014-11-29', '04:49:34', '::1'),
(971, 'Leticia', '2014-11-29', '04:49:50', '::1'),
(972, 'Leticia', '2014-11-29', '04:50:20', '::1'),
(973, 'Leticia', '2014-11-29', '04:52:02', '::1'),
(974, 'Leticia', '2014-11-29', '04:54:08', '::1'),
(975, 'Leticia', '2014-11-29', '04:54:43', '::1'),
(976, 'Leticia', '2014-11-29', '04:54:44', '::1'),
(977, 'Leticia', '2014-11-29', '04:54:46', '::1'),
(978, 'Leticia', '2014-11-29', '04:55:00', '::1'),
(979, 'Leticia', '2014-11-29', '04:55:04', '::1'),
(980, 'admin', '2014-11-29', '04:56:40', '::1'),
(983, 'Leticia', '2014-11-29', '05:15:14', '::1'),
(984, 'Leticia', '2014-11-29', '05:16:10', '::1'),
(990, 'Leticia', '2014-11-29', '01:31:21', '::1'),
(991, 'Leticia', '2014-11-29', '01:34:28', '::1'),
(992, 'Leticia', '2014-11-29', '01:34:58', '::1'),
(993, 'Leticia', '2014-11-29', '01:37:58', '::1'),
(994, 'Leticia', '2014-11-29', '01:38:13', '::1'),
(995, 'Leticia', '2014-11-29', '01:38:16', '::1'),
(996, 'Leticia', '2014-11-29', '01:38:19', '::1'),
(997, 'Leticia', '2014-11-29', '01:38:21', '::1'),
(998, 'Leticia', '2014-11-29', '01:38:24', '::1'),
(999, 'Leticia', '2014-11-29', '01:38:27', '::1'),
(1000, 'Leticia', '2014-11-29', '01:38:29', '::1'),
(1001, 'Leticia', '2014-11-29', '01:38:31', '::1'),
(1002, 'Leticia', '2014-11-29', '01:50:27', '::1'),
(1003, 'Leticia', '2014-11-29', '01:50:49', '::1'),
(1004, 'admin', '2014-11-29', '01:50:56', '::1'),
(1005, 'admin', '2014-11-29', '02:14:05', '::1'),
(1006, 'admin', '2014-11-29', '04:34:01', '::1'),
(1007, 'Leticia', '2014-11-29', '04:46:10', '::1'),
(1008, 'Leticia', '2014-11-29', '04:46:14', '::1'),
(1009, 'Leticia', '2014-11-29', '04:46:51', '::1'),
(1010, 'Leticia', '2014-11-29', '04:47:05', '::1'),
(1011, 'Leticia', '2014-11-29', '04:47:07', '::1'),
(1012, 'Leticia', '2014-11-29', '04:47:08', '::1'),
(1013, 'Leticia', '2014-11-29', '04:47:37', '::1'),
(1014, 'Leticia', '2014-11-29', '04:48:12', '::1'),
(1015, 'Leticia', '2014-11-29', '04:48:25', '::1'),
(1016, 'Leticia', '2014-11-29', '04:48:27', '::1'),
(1017, 'Leticia', '2014-11-29', '04:48:29', '::1'),
(1018, 'Leticia', '2014-11-29', '04:48:31', '::1'),
(1019, 'Leticia', '2014-11-29', '04:48:36', '::1'),
(1020, 'Leticia', '2014-11-29', '04:48:38', '::1'),
(1021, 'Leticia', '2014-11-29', '04:48:49', '::1'),
(1022, 'Leticia', '2014-11-29', '04:49:07', '::1'),
(1023, 'Leticia', '2014-11-29', '04:50:16', '::1'),
(1024, 'Leticia', '2014-11-29', '04:50:17', '::1'),
(1025, 'Leticia', '2014-11-29', '04:50:18', '::1'),
(1026, 'Leticia', '2014-11-29', '04:50:41', '::1'),
(1027, 'admin', '2014-11-29', '04:50:49', '::1'),
(1028, 'Leticia', '2014-11-29', '05:01:35', '::1'),
(1029, 'Leticia', '2014-11-29', '05:01:40', '::1'),
(1030, 'Bittle', '2014-11-29', '05:32:59', '::1'),
(1031, 'Bittle', '2014-11-29', '05:41:54', '::1'),
(1032, 'Bittle', '2014-11-29', '06:51:46', '::1'),
(1033, 'Bittle', '2014-11-29', '06:51:55', '::1'),
(1034, 'Leticia', '2014-11-29', '10:00:30', '::1'),
(1035, 'Leticia', '2014-11-29', '10:11:26', '::1'),
(1036, 'Leticia', '2014-11-29', '10:12:09', '::1'),
(1037, 'Leticia', '2014-11-29', '10:12:11', '::1'),
(1038, 'Leticia', '2014-11-29', '10:12:14', '::1'),
(1039, 'Leticia', '2014-11-29', '10:12:23', '::1'),
(1040, 'Leticia', '2014-11-29', '10:16:37', '::1'),
(1041, 'Leticia', '2014-11-29', '10:16:39', '::1'),
(1042, 'admin', '2014-11-29', '10:18:21', '::1'),
(1043, 'admin', '2014-11-30', '03:33:19', '::1'),
(1044, 'admin', '2014-11-30', '03:34:51', '::1'),
(1045, 'admin', '2014-11-30', '03:37:09', '::1'),
(1046, 'Leticia', '2014-11-30', '05:40:10', '::1'),
(1047, 'Leticia', '2014-11-30', '05:41:02', '::1'),
(1048, 'Leticia', '2014-11-30', '05:41:04', '::1'),
(1049, 'Leticia', '2014-11-30', '05:41:42', '::1'),
(1050, 'Leticia', '2014-11-30', '05:41:44', '::1'),
(1051, 'Leticia', '2014-11-30', '05:42:16', '::1'),
(1052, 'Leticia', '2014-11-30', '05:42:53', '::1'),
(1053, 'Leticia', '2014-11-30', '05:42:55', '::1'),
(1054, 'Leticia', '2014-11-30', '05:42:58', '::1'),
(1055, 'Leticia', '2014-11-30', '05:43:21', '::1'),
(1056, 'Leticia', '2014-11-30', '05:43:39', '::1'),
(1057, 'Leticia', '2014-11-30', '05:44:10', '::1'),
(1058, 'Leticia', '2014-11-30', '05:44:32', '::1'),
(1059, 'Leticia', '2014-11-30', '05:47:33', '::1'),
(1060, 'Leticia', '2014-11-30', '05:47:56', '::1'),
(1061, 'Leticia', '2014-11-30', '05:48:00', '::1'),
(1062, 'Leticia', '2014-11-30', '05:48:17', '::1'),
(1063, 'Leticia', '2014-11-30', '05:48:24', '::1'),
(1064, 'Leticia', '2014-11-30', '05:48:34', '::1'),
(1065, 'Leticia', '2014-11-30', '05:48:41', '::1'),
(1066, 'Leticia', '2014-11-30', '05:48:53', '::1'),
(1067, 'Leticia', '2014-11-30', '05:48:58', '::1'),
(1068, 'Leticia', '2014-11-30', '05:49:08', '::1'),
(1069, 'Leticia', '2014-11-30', '05:49:35', '::1'),
(1070, 'Leticia', '2014-11-30', '05:49:50', '::1'),
(1071, 'Leticia', '2014-11-30', '05:49:58', '::1'),
(1072, 'Leticia', '2014-11-30', '05:50:15', '::1'),
(1073, 'Leticia', '2014-11-30', '05:50:21', '::1'),
(1074, 'Leticia', '2014-11-30', '05:50:22', '::1'),
(1075, 'Leticia', '2014-11-30', '05:50:26', '::1'),
(1076, 'Leticia', '2014-11-30', '05:50:30', '::1'),
(1077, 'Leticia', '2014-11-30', '05:50:32', '::1'),
(1078, 'Leticia', '2014-11-30', '05:50:33', '::1'),
(1079, 'Leticia', '2014-11-30', '05:50:35', '::1'),
(1080, 'Leticia', '2014-11-30', '05:50:40', '::1'),
(1081, 'Leticia', '2014-11-30', '05:51:04', '::1'),
(1082, 'Leticia', '2014-11-30', '05:51:07', '::1'),
(1083, 'Leticia', '2014-11-30', '05:51:10', '::1'),
(1084, 'Leticia', '2014-11-30', '05:51:14', '::1'),
(1085, 'Leticia', '2014-11-30', '05:51:18', '::1'),
(1086, 'Leticia', '2014-11-30', '05:51:21', '::1'),
(1087, 'Leticia', '2014-11-30', '05:51:28', '::1'),
(1088, 'Leticia', '2014-11-30', '05:51:31', '::1'),
(1089, 'Leticia', '2014-11-30', '05:51:33', '::1'),
(1090, 'Leticia', '2014-11-30', '05:51:36', '::1'),
(1091, 'Leticia', '2014-11-30', '05:51:45', '::1'),
(1092, 'admin', '2014-11-30', '05:56:17', '::1'),
(1093, 'Bittle', '2014-11-30', '05:57:55', '::1'),
(1094, 'Bittle', '2014-11-30', '06:13:03', '::1'),
(1095, 'Bittle', '2014-11-30', '08:48:24', '::1'),
(1096, 'Bittle', '2014-11-30', '08:55:38', '::1');
INSERT INTO `sesion` (`ID_S`, `NOMBRE_U`, `FECHA_S`, `HORA_S`, `IP_S`) VALUES
(1097, 'Bittle', '2014-11-30', '08:55:55', '::1'),
(1098, 'Bittle', '2014-11-30', '08:59:25', '::1'),
(1099, 'Bittle', '2014-11-30', '09:05:43', '::1'),
(1100, 'Bittle', '2014-11-30', '09:05:44', '::1'),
(1101, 'Bittle', '2014-11-30', '09:11:48', '::1'),
(1102, 'Bittle', '2014-11-30', '09:11:58', '::1'),
(1103, 'Leticia', '2014-11-30', '09:12:13', '::1'),
(1104, 'Bittle', '2014-11-30', '09:12:57', '::1'),
(1105, 'Bittle', '2014-11-30', '09:27:08', '::1'),
(1106, 'admin', '2014-11-30', '09:27:14', '::1'),
(1107, 'Leticia', '2014-11-30', '09:39:54', '::1'),
(1108, 'Leticia', '2014-11-30', '09:40:18', '::1'),
(1109, 'Leticia', '2014-11-30', '09:41:57', '::1'),
(1110, 'Leticia', '2014-11-30', '09:42:05', '::1'),
(1111, 'Leticia', '2014-11-30', '09:42:20', '::1'),
(1112, 'Leticia', '2014-11-30', '09:42:28', '::1'),
(1113, 'Leticia', '2014-11-30', '09:44:43', '::1'),
(1114, 'Leticia', '2014-11-30', '09:44:46', '::1'),
(1115, 'Leticia', '2014-11-30', '09:46:10', '::1'),
(1116, 'Leticia', '2014-11-30', '09:46:18', '::1'),
(1117, 'Leticia', '2014-11-30', '09:46:30', '::1'),
(1118, 'Leticia', '2014-11-30', '09:55:30', '::1'),
(1119, 'Leticia', '2014-11-30', '09:55:34', '::1'),
(1120, 'Leticia', '2014-11-30', '09:57:53', '::1'),
(1121, 'Leticia', '2014-11-30', '09:57:56', '::1'),
(1122, 'Leticia', '2014-11-30', '10:00:04', '::1'),
(1123, 'Leticia', '2014-11-30', '10:00:43', '::1'),
(1124, 'Leticia', '2014-11-30', '10:01:11', '::1'),
(1125, 'Leticia', '2014-11-30', '10:03:51', '::1'),
(1126, 'Leticia', '2014-11-30', '10:03:54', '::1'),
(1127, 'Leticia', '2014-11-30', '10:03:59', '::1'),
(1128, 'Leticia', '2014-11-30', '10:08:26', '::1'),
(1129, 'Leticia', '2014-11-30', '10:08:45', '::1'),
(1130, 'Bittle', '2014-11-30', '10:10:31', '::1'),
(1131, 'Leticia', '2014-11-30', '10:48:32', '::1'),
(1132, 'Leticia', '2014-11-30', '10:48:38', '::1'),
(1133, 'Leticia', '2014-11-30', '10:49:15', '::1'),
(1134, 'Leticia', '2014-11-30', '10:49:24', '::1'),
(1135, 'Leticia', '2014-11-30', '10:50:43', '::1'),
(1136, 'Leticia', '2014-11-30', '10:51:06', '::1'),
(1137, 'Leticia', '2014-11-30', '10:52:02', '::1'),
(1138, 'Leticia', '2014-11-30', '10:52:31', '::1'),
(1139, 'Leticia', '2014-11-30', '10:52:54', '::1'),
(1140, 'Leticia', '2014-11-30', '10:53:20', '::1'),
(1141, 'Leticia', '2014-11-30', '10:53:41', '::1'),
(1142, 'Leticia', '2014-11-30', '10:54:54', '::1'),
(1143, 'Leticia', '2014-11-30', '10:54:58', '::1'),
(1144, 'Leticia', '2014-11-30', '10:55:00', '::1'),
(1145, 'Leticia', '2014-11-30', '10:55:01', '::1'),
(1146, 'Leticia', '2014-11-30', '10:55:06', '::1'),
(1147, 'Leticia', '2014-11-30', '10:55:08', '::1'),
(1148, 'admin', '2014-11-30', '10:56:29', '::1'),
(1153, 'Bittle', '2014-11-30', '11:01:28', '::1'),
(1154, 'Bittle', '2014-11-30', '11:01:57', '::1'),
(1155, 'Bittle', '2014-11-30', '11:03:04', '::1'),
(1156, 'admin', '2014-11-30', '11:03:29', '::1'),
(1157, 'Leticia', '2014-11-30', '11:08:00', '::1'),
(1158, 'Leticia', '2014-11-30', '11:08:03', '::1'),
(1159, 'admin', '2014-11-30', '11:09:40', '::1'),
(1162, 'admin', '2014-11-30', '11:13:45', '::1'),
(1163, 'Leticia', '2014-11-30', '11:16:18', '::1'),
(1164, 'Leticia', '2014-11-30', '11:16:21', '::1'),
(1165, 'Leticia', '2014-11-30', '11:16:24', '::1'),
(1166, 'Leticia', '2014-11-30', '11:16:27', '::1'),
(1167, 'Leticia', '2014-11-30', '11:16:29', '::1'),
(1168, 'Leticia', '2014-11-30', '11:16:34', '::1'),
(1169, 'Leticia', '2014-11-30', '11:16:36', '::1'),
(1170, 'Leticia', '2014-11-30', '11:16:46', '::1'),
(1171, 'Leticia', '2014-11-30', '11:24:40', '::1'),
(1172, 'Leticia', '2014-11-30', '11:24:44', '::1'),
(1173, 'Leticia', '2014-11-30', '11:25:17', '::1'),
(1174, 'Leticia', '2014-11-30', '11:25:20', '::1'),
(1175, 'Leticia', '2014-11-30', '11:25:22', '::1'),
(1176, 'Leticia', '2014-11-30', '11:25:25', '::1'),
(1177, 'Leticia', '2014-11-30', '11:25:27', '::1'),
(1178, 'Leticia', '2014-11-30', '11:33:33', '::1'),
(1179, 'Leticia', '2014-11-30', '11:33:38', '::1'),
(1180, 'Leticia', '2014-12-01', '02:25:00', '::1'),
(1181, 'Leticia', '2014-12-01', '02:25:12', '::1'),
(1182, 'Leticia', '2014-12-01', '02:25:31', '::1'),
(1183, 'Leticia', '2014-12-01', '02:25:40', '::1');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=819 AUTO_INCREMENT=1 ;

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
('actividad planificacion'),
('criterio evaluacion'),
('documento requerido'),
('documento subido'),
('notificacion de conformidad'),
('Orden de Cambio'),
('pago planificacionpublicaciones'),
('publicaciones');

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
('Admin2', 'Habilitado', 'Admin2*123', '4986578', 'victor@yahoo.com'),
('Alberto1', 'Deshabilitado', 'Alberto*123', '4987845', 'Alberto@gmail.com'),
('Alberto11', 'Deshabilitado', 'Alberto*123', '4651232', 'Alberto@yahoo.com'),
('Alberto13', 'Deshabilitado', 'Alberto*123', '4651232', 'Alberto@yahoo.com'),
('Alberto2', 'Deshabilitado', 'Alberto*123', '4987845', 'Alberto@gmail.com'),
('Alberto5', 'Deshabilitado', 'Alberto*123', '4653212', 'alberto@outlook.com'),
('Alberto8', 'Deshabilitado', 'Alberto*123', '4216598', 'Alberto@yahoo.com'),
('Americo', 'Habilitado', 'Americo*123', '4443568', 'americo@gmail.com'),
('AmericoX', 'Deshabilitado', 'Americo*123', '4659878', 'americo@outlook.com'),
('Bittle', 'Habilitado', 'Bittle*123', '4323435', 'bittle@gmail.com'),
('Boris', 'Habilitado', 'Boris*123', '4545454', 'ale-jan_dra@hotmail.com'),
('Boris3', 'Deshabilitado', 'Boris*123', '4126598', 'Boris3@outlook.com'),
('Boris4', 'Deshabilitado', 'Boris*123', '4321569', 'boris@gmail.com'),
('Douglas1', 'Deshabilitado', 'Douglas*123', '4125689', 'Douglas@gmail.com'),
('JHonny1', 'Deshabilitado', 'Jhonny*123', '4651232', 'jhonny@gmail.com'),
('JHonny2', 'Deshabilitado', 'Jhonny*123', '4651232', 'jhonny@gmail.com'),
('Jorge1', 'Deshabilitado', 'Jorge*123', '4123578', 'jorge@gmail.com'),
('Jorge2', 'Deshabilitado', 'Jorge*123', '4126578', 'jorge2@gmail.com'),
('Leticia', 'Habilitado', '*Leticia+123*', '4443311', 'leticia@blanco.com'),
('Leticia2', 'Habilitado', 'Leticia*123', '4325698', 'leticia@gmail.com'),
('Marcelo1', 'Deshabilitado', 'Marcelo*123', '4321569', 'marcelo@outlook.com'),
('Marcelo223', 'Deshabilitado', 'MArcelo*123', '4786512', 'marcelo@gmail.com');

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
('Admin2', 'administrador'),
('Alberto1', 'asesor'),
('Americo', 'asesor'),
('Boris', 'asesor'),
('Douglas1', 'asesor'),
('JHonny1', 'asesor'),
('JHonny2', 'asesor'),
('Jorge1', 'asesor'),
('Jorge2', 'asesor'),
('Leticia', 'asesor'),
('Leticia2', 'asesor'),
('Marcelo1', 'asesor'),
('Marcelo223', 'asesor'),
('Bittle', 'grupoEmpresa');

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
  ADD CONSTRAINT `fk_nota_formulario` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Filtros para la tabla `puntaje_ge`
--
ALTER TABLE `puntaje_ge`
  ADD CONSTRAINT `fk_PUNTAJE_GE_nota` FOREIGN KEY (`ID_N`) REFERENCES `nota` (`ID_N`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
