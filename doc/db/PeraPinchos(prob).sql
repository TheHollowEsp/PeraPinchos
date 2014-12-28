-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-12-2014 a las 14:03:28
-- Versión del servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

DROP DATABASE IF EXISTS PeraPinchos;
CREATE DATABASE PeraPinchos;
USE PeraPinchos;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `PeraPinchos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Concurso`
--

CREATE TABLE IF NOT EXISTS `Concurso` (
  `NombreC` varchar(50) NOT NULL,
  `FechaIni` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `BasesCon` varchar(1000) NOT NULL,
  `Patrocinadores` varchar(45) DEFAULT NULL,
  `Premios` varchar(500) DEFAULT NULL,
  `Organizador_DniOrg` varchar(50) NOT NULL,
  PRIMARY KEY (`NombreC`),
  KEY `fk_Concurso_Organizador_idx` (`Organizador_DniOrg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Concurso`
--

INSERT INTO `Concurso` (`NombreC`, `FechaIni`, `FechaFin`, `BasesCon`, `Patrocinadores`, `Premios`, `Organizador_DniOrg`) VALUES
('Pera Pinchos 24/11', '2014-11-24 00:00:00', '2014-11-30 00:00:00', 'Todos los pinchos admitidos', 'Muchos', 'Sueldo mensual', '33344455X'),
('Vaya pincho', '2014-12-23 00:00:00', '2015-01-15 00:00:00', 'No vais a entrar', 'Sin patrocinadores', 'Un tortazo', '99999999C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Concurso_has_Jurado`
--

CREATE TABLE IF NOT EXISTS `Concurso_has_Jurado` (
  `Concurso_NombreC` varchar(50) NOT NULL,
  `Jurado_DniJur` varchar(9) NOT NULL,
  PRIMARY KEY (`Concurso_NombreC`,`Jurado_DniJur`),
  KEY `fk_Concurso_has_Jurado_Jurado1_idx` (`Jurado_DniJur`),
  KEY `fk_Concurso_has_Jurado_Concurso1_idx` (`Concurso_NombreC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Concurso_has_Jurado`
--

INSERT INTO `Concurso_has_Jurado` (`Concurso_NombreC`, `Jurado_DniJur`) VALUES
('Pera Pinchos 24/11', '33344455L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Establecimiento`
--

CREATE TABLE IF NOT EXISTS `Establecimiento` (
  `Cif` varchar(9) NOT NULL,
  `NombreEst` varchar(50) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Horario` varchar(45) NOT NULL,
  `Fotos` blob,
  `Web` varchar(150) DEFAULT NULL,
  `PasswordE` varchar(150) NOT NULL,
  PRIMARY KEY (`Cif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Establecimiento`
--

INSERT INTO `Establecimiento` (`Cif`, `NombreEst`, `Direccion`, `Horario`, `Fotos`, `Web`, `PasswordE`) VALUES
('12345678A', 'A casa do Manolo', 'Al lado de Perico', '10 a 20', NULL, 'bizarro.com', '321321'),
('12345678B', 'A casa do Perico', 'localhost', '10 a 22', NULL, 'humor.es', '123123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Establecimiento_has_Concurso`
--

CREATE TABLE IF NOT EXISTS `Establecimiento_has_Concurso` (
  `Cif` varchar(50) NOT NULL,
  `Concurso_NombreC` varchar(50) NOT NULL,
  PRIMARY KEY (`Cif`,`Concurso_NombreC`),
  KEY `fk_Establecimiento_has_Concurso_Concurso1_idx` (`Concurso_NombreC`),
  KEY `fk_Establecimiento_has_Concurso_Establecimiento1_idx` (`Cif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Establecimiento_has_Concurso`
--

INSERT INTO `Establecimiento_has_Concurso` (`Cif`, `Concurso_NombreC`) VALUES
('12345678A', 'Pera Pinchos 24/11'),
('12345678B', 'Pera Pinchos 24/11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gastromapa`
--

CREATE TABLE IF NOT EXISTS `Gastromapa` (
  `NombreGas` varchar(50) NOT NULL,
  `MapaUrl` varchar(120) NOT NULL,
  `Concurso_NombreC` varchar(50) NOT NULL,
  PRIMARY KEY (`NombreGas`),
  KEY `fk_Gastromapa_Concurso1_idx` (`Concurso_NombreC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Gastromapa`
--

INSERT INTO `Gastromapa` (`NombreGas`, `MapaUrl`, `Concurso_NombreC`) VALUES
('Pera Pinchos 24/11 Map', 'bizarro.com', 'Pera Pinchos 24/11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Jurado`
--

CREATE TABLE IF NOT EXISTS `Jurado` (
  `DniJur` varchar(9) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `PasswordJ` varchar(50) NOT NULL,
  `Juradocol` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`DniJur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Jurado`
--

INSERT INTO `Jurado` (`DniJur`, `Nombre`, `PasswordJ`, `Juradocol`) VALUES
('11122233A', 'Merche Rguez', '22222', 'SI'),
('33344455L', 'Juan de Troya', '123123', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Organizador`
--

CREATE TABLE IF NOT EXISTS `Organizador` (
  `DniOrg` varchar(9) NOT NULL,
  `NombreOrg` varchar(45) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `PasswordO` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`DniOrg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Organizador`
--

INSERT INTO `Organizador` (`DniOrg`, `NombreOrg`, `Telefono`, `Email`, `PasswordO`) VALUES
('33344455X', 'Perico de los Palotes', 666666666, 'vaya@cosa.com', '111'),
('99999999C', 'Armando Casitas', 888999444, 'festival@humor.es', '999');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pincho`
--

CREATE TABLE IF NOT EXISTS `Pincho` (
  `NombrePincho` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Ingredientes` varchar(200) NOT NULL,
  `Fotos` blob,
  `Informacion` varchar(300) NOT NULL,
  `Validado` tinyint(1) NOT NULL,
  `Cif` varchar(9) NOT NULL,
  `NombreC` varchar(50) NOT NULL,
  PRIMARY KEY (`NombrePincho`),
  KEY `fk_Pincho_Establecimiento1_idx` (`Cif`),
  KEY `fk_Pincho_Concurso1` (`NombreC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Pincho`
--

INSERT INTO `Pincho` (`NombrePincho`, `Descripcion`, `Precio`, `Ingredientes`, `Fotos`, `Informacion`, `Validado`, `Cif`, `NombreC`) VALUES
('Babel Tower Split', 'La torre de Babel ha vuelto', 12, 'Platos y cubiertos', NULL, 'No apto para maniaticos', 1, '12345678B', 'Pera Pinchos 24/11'),
('Mojo Picon', 'La torre de Babel ha vuelto', 12, 'Platos y cubiertos', NULL, 'No apto para maniaticos', 1, '12345678B', 'Vaya pincho'),
('Pinchazo final', 'El mejor de los pinchos', 666, 'Demasiados', NULL, 'Solo lo mejor', 1, '12345678A', 'Pera Pinchos 24/11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pincho_has_Jurado`
--

CREATE TABLE IF NOT EXISTS `Pincho_has_Jurado` (
  `Pincho_NombrePincho` varchar(50) NOT NULL,
  `Jurado_DniJur` varchar(9) NOT NULL,
  `VotoPro` int(5) DEFAULT NULL,
  PRIMARY KEY (`Pincho_NombrePincho`,`Jurado_DniJur`),
  KEY `fk_Pincho_has_Jurado_Jurado1_idx` (`Jurado_DniJur`),
  KEY `fk_Pincho_has_Jurado_Pincho1_idx` (`Pincho_NombrePincho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Pincho_has_Jurado`
--

INSERT INTO `Pincho_has_Jurado` (`Pincho_NombrePincho`, `Jurado_DniJur`, `VotoPro`) VALUES
('Babel Tower Split', '11122233A', NULL),
('Babel Tower Split', '33344455L', NULL),
('Pinchazo final', '11122233A', NULL),
('Pinchazo final', '33344455L', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Concurso`
--
ALTER TABLE `Concurso`
  ADD CONSTRAINT `fk_Concurso_Organizador` FOREIGN KEY (`Organizador_DniOrg`) REFERENCES `Organizador` (`DniOrg`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Concurso_has_Jurado`
--
ALTER TABLE `Concurso_has_Jurado`
  ADD CONSTRAINT `fk_Concurso_has_Jurado_Concurso1` FOREIGN KEY (`Concurso_NombreC`) REFERENCES `Concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concurso_has_Jurado_Jurado1` FOREIGN KEY (`Jurado_DniJur`) REFERENCES `Jurado` (`DniJur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Establecimiento_has_Concurso`
--
ALTER TABLE `Establecimiento_has_Concurso`
  ADD CONSTRAINT `fk_Establecimiento_has_Concurso_Establecimiento1` FOREIGN KEY (`Cif`) REFERENCES `Establecimiento` (`Cif`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Establecimiento_has_Concurso_Concurso1` FOREIGN KEY (`Concurso_NombreC`) REFERENCES `Concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Gastromapa`
--
ALTER TABLE `Gastromapa`
  ADD CONSTRAINT `fk_Gastromapa_Concurso1` FOREIGN KEY (`Concurso_NombreC`) REFERENCES `Concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Pincho`
--
ALTER TABLE `Pincho`
  ADD CONSTRAINT `fk_Pincho_Establecimiento1` FOREIGN KEY (`Cif`) REFERENCES `Establecimiento` (`Cif`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pincho_Concurso1` FOREIGN KEY (`NombreC`) REFERENCES `Concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Pincho_has_Jurado`
--
ALTER TABLE `Pincho_has_Jurado`
  ADD CONSTRAINT `fk_Pincho_has_Jurado_Pincho1` FOREIGN KEY (`Pincho_NombrePincho`) REFERENCES `Pincho` (`NombrePincho`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pincho_has_Jurado_Jurado1` FOREIGN KEY (`Jurado_DniJur`) REFERENCES `Jurado` (`DniJur`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
