-- phpMyAdmin SQL Dump
-- version 4.3.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2015 at 06:06 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perapinchos`
--

-- --------------------------------------------------------

--
-- Table structure for table `concurso`
--

CREATE TABLE `concurso` (
  `NombreC` varchar(50) NOT NULL,
  `FechaIni` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `BasesCon` varchar(1000) NOT NULL,
  `Patrocinadores` varchar(45) DEFAULT NULL,
  `Premios` varchar(500) DEFAULT NULL,
  `Organizador_DniOrg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concurso`
--

INSERT INTO `concurso` (`NombreC`, `FechaIni`, `FechaFin`, `BasesCon`, `Patrocinadores`, `Premios`, `Organizador_DniOrg`) VALUES
('Pera Pinchos 24/11', '2014-11-24 00:00:00', '2014-11-30 00:00:00', 'Todos los pinchos admitidos', 'Muchos', 'Sueldo mensual', '33344455X'),
('Vaya pincho', '2014-12-23 00:00:00', '2015-01-15 00:00:00', 'No vais a entrar', 'Sin patrocinadores', 'Un tortazo', '99999999C');

-- --------------------------------------------------------

--
-- Table structure for table `concurso_has_jurado`
--

CREATE TABLE `concurso_has_jurado` (
  `Concurso_NombreC` varchar(50) NOT NULL,
  `Jurado_DniJur` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concurso_has_jurado`
--

INSERT INTO `concurso_has_jurado` (`Concurso_NombreC`, `Jurado_DniJur`) VALUES
('Pera Pinchos 24/11', '33344455L');

-- --------------------------------------------------------

--
-- Table structure for table `establecimiento`
--

CREATE TABLE `establecimiento` (
  `Cif` varchar(9) NOT NULL,
  `NombreEst` varchar(50) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Horario` varchar(45) NOT NULL,
  `Fotos` blob,
  `Web` varchar(150) DEFAULT NULL,
  `PasswordE` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `establecimiento`
--

INSERT INTO `establecimiento` (`Cif`, `NombreEst`, `Direccion`, `Horario`, `Fotos`, `Web`, `PasswordE`) VALUES
('12345678A', 'A casa do Manolo', 'Al lado de Perico', '10 a 20', NULL, 'bizarro.com', '321321'),
('12345678B', 'A casa do Perico', 'localhost', '10 a 22', NULL, 'humor.es', '123123'),
('55555555R', 'O Raposo', 'Lonxe', '12 - 24', NULL, 'Iso que e', '111');

-- --------------------------------------------------------

--
-- Table structure for table `establecimiento_has_concurso`
--

CREATE TABLE `establecimiento_has_concurso` (
  `Cif` varchar(50) NOT NULL,
  `Concurso_NombreC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `establecimiento_has_concurso`
--

INSERT INTO `establecimiento_has_concurso` (`Cif`, `Concurso_NombreC`) VALUES
('12345678A', 'Pera Pinchos 24/11'),
('12345678B', 'Pera Pinchos 24/11');

-- --------------------------------------------------------

--
-- Table structure for table `gastromapa`
--

CREATE TABLE `gastromapa` (
  `NombreGas` varchar(50) NOT NULL,
  `MapaUrl` varchar(120) NOT NULL,
  `Concurso_NombreC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gastromapa`
--

INSERT INTO `gastromapa` (`NombreGas`, `MapaUrl`, `Concurso_NombreC`) VALUES
('Pera Pinchos 24/11 Map', 'bizarro.com', 'Pera Pinchos 24/11');

-- --------------------------------------------------------

--
-- Table structure for table `jurado`
--

CREATE TABLE `jurado` (
  `DniJur` varchar(9) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `PasswordJ` varchar(50) NOT NULL,
  `Juradocol` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurado`
--

INSERT INTO `jurado` (`DniJur`, `Nombre`, `PasswordJ`, `Juradocol`) VALUES
('11122233A', 'Merche Rguez', '22222', 1),
('33344455L', 'Juan de Troya', '123123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizador`
--

CREATE TABLE `organizador` (
  `DniOrg` varchar(9) NOT NULL,
  `NombreOrg` varchar(45) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `PasswordO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizador`
--

INSERT INTO `organizador` (`DniOrg`, `NombreOrg`, `Telefono`, `Email`, `PasswordO`) VALUES
('33344455X', 'Perico de los Palotes', 666666666, 'vaya@cosa.com', '111'),
('99999999C', 'Armando Casitas', 888999444, 'festival@humor.es', '999');

-- --------------------------------------------------------

--
-- Table structure for table `pincho`
--

CREATE TABLE `pincho` (
  `NombrePincho` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Ingredientes` varchar(200) NOT NULL,
  `Fotos` varchar(60) DEFAULT NULL,
  `Informacion` varchar(300) NOT NULL,
  `Validado` tinyint(1) NOT NULL,
  `Cif` varchar(9) NOT NULL,
  `NombreC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pincho`
--

INSERT INTO `pincho` (`NombrePincho`, `Descripcion`, `Precio`, `Ingredientes`, `Fotos`, `Informacion`, `Validado`, `Cif`, `NombreC`) VALUES
('Babel Tower Split', 'La torre de Babel ha vuelto', 12, 'Platos y cubiertos', './res/raw/imagen1.jpg', 'No apto para maniaticos', 1, '12345678B', 'Pera Pinchos 24/11'),
('Choricillos a la sidra', 'Con extra de sidra El Gaiteiro', 22, 'Muchos', './res/raw/imagen4.jpg', 'Especial de la casa', 1, '12345678B', 'Vaya pincho'),
('Mojo Picon', 'Sin rémoras', 12, 'Un percal de cuidado', './res/raw/imagen2.jpg', 'No apto para maniaticos', 1, '12345678A', 'Vaya pincho'),
('Pinchazo final', 'El mejor de los pinchos', 666, 'Demasiados', './res/raw/imagen3.jpg', 'Solo lo mejor', 1, '12345678A', 'Pera Pinchos 24/11');

-- --------------------------------------------------------

--
-- Table structure for table `pincho_has_jurado`
--

CREATE TABLE `pincho_has_jurado` (
  `Pincho_NombrePincho` varchar(50) NOT NULL,
  `Jurado_DniJur` varchar(9) NOT NULL,
  `VotoPro` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pincho_has_jurado`
--

INSERT INTO `pincho_has_jurado` (`Pincho_NombrePincho`, `Jurado_DniJur`, `VotoPro`) VALUES
('Babel Tower Split', '11122233A', NULL),
('Babel Tower Split', '33344455L', NULL),
('Pinchazo final', '11122233A', NULL),
('Pinchazo final', '33344455L', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`NombreC`), ADD KEY `fk_Concurso_Organizador_idx` (`Organizador_DniOrg`);

--
-- Indexes for table `concurso_has_jurado`
--
ALTER TABLE `concurso_has_jurado`
  ADD PRIMARY KEY (`Concurso_NombreC`,`Jurado_DniJur`), ADD KEY `fk_Concurso_has_Jurado_Jurado1_idx` (`Jurado_DniJur`), ADD KEY `fk_Concurso_has_Jurado_Concurso1_idx` (`Concurso_NombreC`);

--
-- Indexes for table `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`Cif`);

--
-- Indexes for table `establecimiento_has_concurso`
--
ALTER TABLE `establecimiento_has_concurso`
  ADD PRIMARY KEY (`Cif`,`Concurso_NombreC`), ADD KEY `fk_Establecimiento_has_Concurso_Concurso1_idx` (`Concurso_NombreC`), ADD KEY `fk_Establecimiento_has_Concurso_Establecimiento1_idx` (`Cif`);

--
-- Indexes for table `gastromapa`
--
ALTER TABLE `gastromapa`
  ADD PRIMARY KEY (`NombreGas`), ADD KEY `fk_Gastromapa_Concurso1_idx` (`Concurso_NombreC`);

--
-- Indexes for table `jurado`
--
ALTER TABLE `jurado`
  ADD PRIMARY KEY (`DniJur`);

--
-- Indexes for table `organizador`
--
ALTER TABLE `organizador`
  ADD PRIMARY KEY (`DniOrg`);

--
-- Indexes for table `pincho`
--
ALTER TABLE `pincho`
  ADD PRIMARY KEY (`NombrePincho`), ADD KEY `fk_Pincho_Establecimiento1_idx` (`Cif`), ADD KEY `fk_Pincho_Concurso1` (`NombreC`);

--
-- Indexes for table `pincho_has_jurado`
--
ALTER TABLE `pincho_has_jurado`
  ADD PRIMARY KEY (`Pincho_NombrePincho`,`Jurado_DniJur`), ADD KEY `fk_Pincho_has_Jurado_Jurado1_idx` (`Jurado_DniJur`), ADD KEY `fk_Pincho_has_Jurado_Pincho1_idx` (`Pincho_NombrePincho`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concurso`
--
ALTER TABLE `concurso`
ADD CONSTRAINT `fk_Concurso_Organizador` FOREIGN KEY (`Organizador_DniOrg`) REFERENCES `organizador` (`DniOrg`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `concurso_has_jurado`
--
ALTER TABLE `concurso_has_jurado`
ADD CONSTRAINT `fk_Concurso_has_Jurado_Concurso1` FOREIGN KEY (`Concurso_NombreC`) REFERENCES `concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Concurso_has_Jurado_Jurado1` FOREIGN KEY (`Jurado_DniJur`) REFERENCES `jurado` (`DniJur`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `establecimiento_has_concurso`
--
ALTER TABLE `establecimiento_has_concurso`
ADD CONSTRAINT `fk_Establecimiento_has_Concurso_Establecimiento1` FOREIGN KEY (`Cif`) REFERENCES `establecimiento` (`Cif`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Establecimiento_has_Concurso_Concurso1` FOREIGN KEY (`Concurso_NombreC`) REFERENCES `concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gastromapa`
--
ALTER TABLE `gastromapa`
ADD CONSTRAINT `fk_Gastromapa_Concurso1` FOREIGN KEY (`Concurso_NombreC`) REFERENCES `concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pincho`
--
ALTER TABLE `pincho`
ADD CONSTRAINT `fk_Pincho_Establecimiento1` FOREIGN KEY (`Cif`) REFERENCES `establecimiento` (`Cif`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Pincho_Concurso1` FOREIGN KEY (`NombreC`) REFERENCES `concurso` (`NombreC`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pincho_has_jurado`
--
ALTER TABLE `pincho_has_jurado`
ADD CONSTRAINT `fk_Pincho_has_Jurado_Pincho1` FOREIGN KEY (`Pincho_NombrePincho`) REFERENCES `pincho` (`NombrePincho`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Pincho_has_Jurado_Jurado1` FOREIGN KEY (`Jurado_DniJur`) REFERENCES `jurado` (`DniJur`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
