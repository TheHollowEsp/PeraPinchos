-- MySQL Script generated by MySQL Workbench
-- 12/04/14 15:29:34
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema PeraPinchos
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `PeraPinchos` ;

-- -----------------------------------------------------
-- Schema PeraPinchos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PeraPinchos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `PeraPinchos` ;

-- -----------------------------------------------------
-- Table `PeraPinchos`.`Organizador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Organizador` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Organizador` (
  `DniOrg` VARCHAR(9) NOT NULL,
  `NombreOrg` VARCHAR(45) NOT NULL,
  `Telefono` INT(9) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `PasswordO` VARCHAR(30) NULL,
  PRIMARY KEY (`DniOrg`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Establecimiento` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Establecimiento` (
  `NombreEst` VARCHAR(50) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Horario` VARCHAR(45) NOT NULL,
  `Fotos` BLOB(512) NULL,
  `Web` VARCHAR(150) NULL,
  `PasswordE` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`NombreEst`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Concurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Concurso` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Concurso` (
  `NombreC` VARCHAR(50) NOT NULL,
  `FechaIni` DATETIME NOT NULL,
  `FechaFin` DATETIME NOT NULL,
  `BasesCon` VARCHAR(1000) NOT NULL,
  `Patrocinadores` VARCHAR(45) NULL,
  `Premios` VARCHAR(500) NULL,
  `Organizador_DniOrg` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`NombreC`),
  INDEX `fk_Concurso_Organizador_idx` (`Organizador_DniOrg` ASC),
  CONSTRAINT `fk_Concurso_Organizador`
    FOREIGN KEY (`Organizador_DniOrg`)
    REFERENCES `PeraPinchos`.`Organizador` (`DniOrg`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Pincho` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Pincho` (
  `NombrePincho` VARCHAR(50) NOT NULL,
  `Descripcion` VARCHAR(500) NOT NULL,
  `Precio` INT NOT NULL,
  `Ingredientes` VARCHAR(200) NOT NULL,
  `Fotos` BLOB(512) NULL,
  `Informacion` VARCHAR(300) NOT NULL,
  `Validado` TINYINT(1) NOT NULL,
  `Establecimiento_NombreEst` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`NombrePincho`),
  INDEX `fk_Pincho_Establecimiento1_idx` (`Establecimiento_NombreEst` ASC),
  CONSTRAINT `fk_Pincho_Establecimiento1`
    FOREIGN KEY (`Establecimiento_NombreEst`)
    REFERENCES `PeraPinchos`.`Establecimiento` (`NombreEst`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Gastromapa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Gastromapa` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Gastromapa` (
  `NombreGas` VARCHAR(50) NOT NULL,
  `MapaUrl` VARCHAR(120) NOT NULL,
  `Concurso_NombreC` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`NombreGas`),
  INDEX `fk_Gastromapa_Concurso1_idx` (`Concurso_NombreC` ASC),
  CONSTRAINT `fk_Gastromapa_Concurso1`
    FOREIGN KEY (`Concurso_NombreC`)
    REFERENCES `PeraPinchos`.`Concurso` (`NombreC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Jurado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Jurado` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Jurado` (
  `DniJur` VARCHAR(9) NOT NULL,
  `Nombre` VARCHAR(50) NOT NULL,
  `PasswordJ` VARCHAR(50) NOT NULL,
  `Juradocol` VARCHAR(45) NULL DEFAULT 'NO',
  PRIMARY KEY (`DniJur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Concurso_has_Jurado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Concurso_has_Jurado` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Concurso_has_Jurado` (
  `Concurso_NombreC` VARCHAR(50) NOT NULL,
  `Jurado_DniJur` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`Concurso_NombreC`, `Jurado_DniJur`),
  INDEX `fk_Concurso_has_Jurado_Jurado1_idx` (`Jurado_DniJur` ASC),
  INDEX `fk_Concurso_has_Jurado_Concurso1_idx` (`Concurso_NombreC` ASC),
  CONSTRAINT `fk_Concurso_has_Jurado_Concurso1`
    FOREIGN KEY (`Concurso_NombreC`)
    REFERENCES `PeraPinchos`.`Concurso` (`NombreC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Concurso_has_Jurado_Jurado1`
    FOREIGN KEY (`Jurado_DniJur`)
    REFERENCES `PeraPinchos`.`Jurado` (`DniJur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Pincho_has_Jurado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Pincho_has_Jurado` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Pincho_has_Jurado` (
  `Pincho_NombrePincho` VARCHAR(50) NOT NULL,
  `Jurado_DniJur` VARCHAR(9) NOT NULL,
  `VotoPro` INT(2) NULL,
  PRIMARY KEY (`Pincho_NombrePincho`, `Jurado_DniJur`),
  INDEX `fk_Pincho_has_Jurado_Jurado1_idx` (`Jurado_DniJur` ASC),
  INDEX `fk_Pincho_has_Jurado_Pincho1_idx` (`Pincho_NombrePincho` ASC),
  CONSTRAINT `fk_Pincho_has_Jurado_Pincho1`
    FOREIGN KEY (`Pincho_NombrePincho`)
    REFERENCES `PeraPinchos`.`Pincho` (`NombrePincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pincho_has_Jurado_Jurado1`
    FOREIGN KEY (`Jurado_DniJur`)
    REFERENCES `PeraPinchos`.`Jurado` (`DniJur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PeraPinchos`.`Establecimiento_has_Concurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PeraPinchos`.`Establecimiento_has_Concurso` ;

CREATE TABLE IF NOT EXISTS `PeraPinchos`.`Establecimiento_has_Concurso` (
  `Establecimiento_NombreEst` VARCHAR(50) NOT NULL,
  `Concurso_NombreC` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Establecimiento_NombreEst`, `Concurso_NombreC`),
  INDEX `fk_Establecimiento_has_Concurso_Concurso1_idx` (`Concurso_NombreC` ASC),
  INDEX `fk_Establecimiento_has_Concurso_Establecimiento1_idx` (`Establecimiento_NombreEst` ASC),
  CONSTRAINT `fk_Establecimiento_has_Concurso_Establecimiento1`
    FOREIGN KEY (`Establecimiento_NombreEst`)
    REFERENCES `PeraPinchos`.`Establecimiento` (`NombreEst`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Establecimiento_has_Concurso_Concurso1`
    FOREIGN KEY (`Concurso_NombreC`)
    REFERENCES `PeraPinchos`.`Concurso` (`NombreC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- INSERTS
-- -----------------------------------------------------

/* Organizador */
INSERT INTO `PeraPinchos`.`Organizador` (`DniOrg`, `NombreOrg`, `Telefono`, `Email`) VALUES ('33344455X', 'Perico de los Palotes', '666666666', 'riopedre2001@gmail.com');
/* Concurso */
INSERT INTO `PeraPinchos`.`Concurso` (`NombreC`, `FechaIni`, `FechaFin`, `BasesCon`, `Patrocinadores`, `Premios`, `Organizador_DniOrg`) VALUES ('Pera Pinchos 24/11', '2014-11-24 00:00:00', '2014-11-30 00:00:00', 'Todos los pinchos admitidos.', 'Muchos.', 'Sueldo mensual.', '33344455X');

/* Establecimientos */
INSERT INTO `PeraPinchos`.`Establecimiento` (`NombreEst`, `Direccion`, `Horaio`, `PasswordE`, `Fotos`, `Web`) VALUES ('A casa do Perico', 'localhost', '10 a 22', '123123', NULL, 'hollow.es');
INSERT INTO `PeraPinchos`.`Establecimiento` (`NombreEst`, `Direccion`, `Horaio`, `PasswordE`, `Fotos`, `Web`) VALUES ('A casa do Manolo', 'Al lado de Perico', '10 a 20', '321321', NULL, 'rotting.no-ip.biz');

/* Pinchos */
INSERT INTO `PeraPinchos`.`Pincho` (`NombrePincho`, `Descripcion`, `Precio`, `Ingredientes`, `Informacion`, `Validado`, `Establecimiento_NombreEst`) VALUES ('Babel Tower Split', 'La torre de Babel ha vuelto', '12', 'Platos y cubiertos', 'No apto para maniaticos', '0', 'A casa do Perico');

/* Jurado */
INSERT INTO `PeraPinchos`.`Jurado` (`DniJur`, `Nombre`, `PasswordJ`, `Juradocol`) VALUES ('33344455L', 'Juan de Troya','123123', NULL);
/* Mapa */
INSERT INTO `PeraPinchos`.`Gastromapa` (`NombreGas`, `MapaUrl`, `Concurso_NombreC`) VALUES ('Pera Pinchos 24/11 Map', 'http://hollow.es', 'Pera Pinchos 24/11');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
