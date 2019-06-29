-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema redSchool
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema redSchool
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redSchool` DEFAULT CHARACTER SET utf8 ;
USE `redSchool` ;

-- -----------------------------------------------------
-- Table `Escuela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escuela` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `typeMedia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `typeMedia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Media` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `src` TEXT NOT NULL,
  `typeMedia_id` INT NOT NULL,
  `Escuela_id` INT NOT NULL,
  PRIMARY KEY (`id`, `typeMedia_id`, `Escuela_id`),
  INDEX `fk_Media_typeMedia_idx` (`typeMedia_id` ASC) VISIBLE,
  INDEX `fk_Media_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Media_typeMedia`
    FOREIGN KEY (`typeMedia_id`)
    REFERENCES `typeMedia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Media_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `Escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PuntosFuertes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PuntosFuertes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `src` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Escuela_has_PuntosFuertes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escuela_has_PuntosFuertes` (
  `Escuela_id` INT NOT NULL,
  `PuntosFuertes_id` INT NOT NULL,
  PRIMARY KEY (`Escuela_id`, `PuntosFuertes_id`),
  INDEX `fk_Escuela_has_PuntosFuertes_PuntosFuertes1_idx` (`PuntosFuertes_id` ASC) VISIBLE,
  INDEX `fk_Escuela_has_PuntosFuertes_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Escuela_has_PuntosFuertes_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `Escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Escuela_has_PuntosFuertes_PuntosFuertes1`
    FOREIGN KEY (`PuntosFuertes_id`)
    REFERENCES `PuntosFuertes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ModoEducacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ModoEducacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Nivel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `ModoEducacion_id` INT NOT NULL,
  PRIMARY KEY (`id`, `ModoEducacion_id`),
  INDEX `fk_Nivel_ModoEducacion1_idx` (`ModoEducacion_id` ASC) VISIBLE,
  CONSTRAINT `fk_Nivel_ModoEducacion1`
    FOREIGN KEY (`ModoEducacion_id`)
    REFERENCES `ModoEducacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Escuela_has_Nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escuela_has_Nivel` (
  `Escuela_id` INT NOT NULL,
  `Nivel_id` INT NOT NULL,
  `Nivel_ModoEducacion_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  INDEX `fk_Escuela_has_Nivel_Nivel1_idx` (`Nivel_id` ASC, `Nivel_ModoEducacion_id` ASC) VISIBLE,
  INDEX `fk_Escuela_has_Nivel_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Escuela_has_Nivel_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `Escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Escuela_has_Nivel_Nivel1`
    FOREIGN KEY (`Nivel_id` , `Nivel_ModoEducacion_id`)
    REFERENCES `Nivel` (`id` , `ModoEducacion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cuota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cuota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `Precio` DECIMAL NULL,
  `Escuela_has_Nivel_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Escuela_has_Nivel_id`),
  INDEX `fk_Cuota_Escuela_has_Nivel1_idx` (`Escuela_has_Nivel_id` ASC) VISIBLE,
  CONSTRAINT `fk_Cuota_Escuela_has_Nivel1`
    FOREIGN KEY (`Escuela_has_Nivel_id`)
    REFERENCES `Escuela_has_Nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Taller`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Taller_has_Escuela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Taller_has_Escuela` (
  `Taller_id` INT NOT NULL,
  `Escuela_id` INT NOT NULL,
  PRIMARY KEY (`Taller_id`, `Escuela_id`),
  INDEX `fk_Taller_has_Escuela_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  INDEX `fk_Taller_has_Escuela_Taller1_idx` (`Taller_id` ASC) VISIBLE,
  CONSTRAINT `fk_Taller_has_Escuela_Taller1`
    FOREIGN KEY (`Taller_id`)
    REFERENCES `Taller` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Taller_has_Escuela_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `Escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Reconocimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Reconocimientos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` TEXT NOT NULL,
  `Escuela_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Escuela_id`),
  INDEX `fk_Reconocimientos_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Reconocimientos_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `Escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Instalaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Instalaciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `src` TEXT NULL,
  `Escuela_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Escuela_id`),
  INDEX `fk_Instalaciones_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Instalaciones_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `Escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tipoContacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipoContacto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Contacto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valor` TEXT NOT NULL,
  `tipoContacto_id` INT NOT NULL,
  `Escuela_has_Nivel_id` INT NOT NULL,
  PRIMARY KEY (`id`, `tipoContacto_id`, `Escuela_has_Nivel_id`),
  INDEX `fk_Contacto_tipoContacto1_idx` (`tipoContacto_id` ASC) VISIBLE,
  INDEX `fk_Contacto_Escuela_has_Nivel1_idx` (`Escuela_has_Nivel_id` ASC) VISIBLE,
  CONSTRAINT `fk_Contacto_tipoContacto1`
    FOREIGN KEY (`tipoContacto_id`)
    REFERENCES `tipoContacto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contacto_Escuela_has_Nivel1`
    FOREIGN KEY (`Escuela_has_Nivel_id`)
    REFERENCES `Escuela_has_Nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
