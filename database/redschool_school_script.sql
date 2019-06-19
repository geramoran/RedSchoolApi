-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema redschool
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `redschool` ;

-- -----------------------------------------------------
-- Schema redschool
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redschool` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `redschool`.`escuela`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`escuela` ;

CREATE TABLE IF NOT EXISTS `redschool`.`escuela` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `premium1` TINYINT(1) NULL,
  `premium2` TINYINT(1) NULL,
  `premium3` TINYINT(1) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `mydb`.`tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tags` ;

CREATE TABLE IF NOT EXISTS `mydb`.`tags` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tag` VARCHAR(45) NULL,
  `escuela_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `escuela_id`),
  INDEX `fk_tags_escuela1_idx` (`escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_tags_escuela1`
    FOREIGN KEY (`escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `redschool` ;

-- -----------------------------------------------------
-- Table `redschool`.`subNivelAtributos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`subNivelAtributos` ;

CREATE TABLE IF NOT EXISTS `redschool`.`subNivelAtributos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `clave` VARCHAR(150) NOT NULL,
  `valor` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`subnivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`subnivel` ;

CREATE TABLE IF NOT EXISTS `redschool`.`subnivel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `subNivelAtributos_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `subNivelAtributos_id`),
  INDEX `fk_subnivel_subNivelAtributos1_idx` (`subNivelAtributos_id` ASC) VISIBLE,
  CONSTRAINT `fk_subnivel_subNivelAtributos1`
    FOREIGN KEY (`subNivelAtributos_id`)
    REFERENCES `redschool`.`subNivelAtributos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`nivelAtributos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`nivelAtributos` ;

CREATE TABLE IF NOT EXISTS `redschool`.`nivelAtributos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `clave` VARCHAR(150) NOT NULL,
  `valor` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`nivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`nivel` ;

CREATE TABLE IF NOT EXISTS `redschool`.`nivel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `subnivel_id` INT(11) NOT NULL,
  `nivelAtributos_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `subnivel_id`, `nivelAtributos_id`),
  INDEX `fk_nivel_subnivel1_idx` (`subnivel_id` ASC) VISIBLE,
  INDEX `fk_nivel_nivelAtributos1_idx` (`nivelAtributos_id` ASC) VISIBLE,
  CONSTRAINT `fk_nivel_subnivel1`
    FOREIGN KEY (`subnivel_id`)
    REFERENCES `redschool`.`subnivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nivel_nivelAtributos1`
    FOREIGN KEY (`nivelAtributos_id`)
    REFERENCES `redschool`.`nivelAtributos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`escuela_has_nivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`escuela_has_nivel` ;

CREATE TABLE IF NOT EXISTS `redschool`.`escuela_has_nivel` (
  `Escuela_id` INT(11) NOT NULL,
  `Nivel_id` INT(11) NOT NULL,
  `Nivel_ModoEducacion_id` INT(11) NOT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  INDEX `fk_Escuela_has_Nivel_Nivel1_idx` (`Nivel_id` ASC, `Nivel_ModoEducacion_id` ASC) VISIBLE,
  INDEX `fk_Escuela_has_Nivel_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Escuela_has_Nivel_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`),
  CONSTRAINT `fk_Escuela_has_Nivel_Nivel1`
    FOREIGN KEY (`Nivel_id`)
    REFERENCES `redschool`.`nivel` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`tipocontacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`tipocontacto` ;

CREATE TABLE IF NOT EXISTS `redschool`.`tipocontacto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`contacto` ;

CREATE TABLE IF NOT EXISTS `redschool`.`contacto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` TEXT NOT NULL,
  `tipoContacto_id` INT(11) NOT NULL,
  `Escuela_has_Nivel_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `tipoContacto_id`, `Escuela_has_Nivel_id`),
  INDEX `fk_Contacto_tipoContacto1_idx` (`tipoContacto_id` ASC) VISIBLE,
  INDEX `fk_Contacto_Escuela_has_Nivel1_idx` (`Escuela_has_Nivel_id` ASC) VISIBLE,
  CONSTRAINT `fk_Contacto_Escuela_has_Nivel1`
    FOREIGN KEY (`Escuela_has_Nivel_id`)
    REFERENCES `redschool`.`escuela_has_nivel` (`id`),
  CONSTRAINT `fk_Contacto_tipoContacto1`
    FOREIGN KEY (`tipoContacto_id`)
    REFERENCES `redschool`.`tipocontacto` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`cuota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`cuota` ;

CREATE TABLE IF NOT EXISTS `redschool`.`cuota` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `Precio` DECIMAL(10,0) NULL DEFAULT NULL,
  `Escuela_has_Nivel_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `Escuela_has_Nivel_id`),
  INDEX `fk_Cuota_Escuela_has_Nivel1_idx` (`Escuela_has_Nivel_id` ASC) VISIBLE,
  CONSTRAINT `fk_Cuota_Escuela_has_Nivel1`
    FOREIGN KEY (`Escuela_has_Nivel_id`)
    REFERENCES `redschool`.`escuela_has_nivel` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`puntosfuertes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`puntosfuertes` ;

CREATE TABLE IF NOT EXISTS `redschool`.`puntosfuertes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `src` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`escuela_has_puntosfuertes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`escuela_has_puntosfuertes` ;

CREATE TABLE IF NOT EXISTS `redschool`.`escuela_has_puntosfuertes` (
  `Escuela_id` INT(11) NOT NULL,
  `PuntosFuertes_id` INT(11) NOT NULL,
  PRIMARY KEY (`Escuela_id`, `PuntosFuertes_id`),
  INDEX `fk_Escuela_has_PuntosFuertes_PuntosFuertes1_idx` (`PuntosFuertes_id` ASC) VISIBLE,
  INDEX `fk_Escuela_has_PuntosFuertes_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Escuela_has_PuntosFuertes_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`),
  CONSTRAINT `fk_Escuela_has_PuntosFuertes_PuntosFuertes1`
    FOREIGN KEY (`PuntosFuertes_id`)
    REFERENCES `redschool`.`puntosfuertes` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`instalaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`instalaciones` ;

CREATE TABLE IF NOT EXISTS `redschool`.`instalaciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `src` TEXT NULL DEFAULT NULL,
  `Escuela_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `Escuela_id`),
  INDEX `fk_Instalaciones_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Instalaciones_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`typemedia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`typemedia` ;

CREATE TABLE IF NOT EXISTS `redschool`.`typemedia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`media`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`media` ;

CREATE TABLE IF NOT EXISTS `redschool`.`media` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `src` TEXT NOT NULL,
  `typeMedia_id` INT(11) NOT NULL,
  `Escuela_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `typeMedia_id`, `Escuela_id`),
  INDEX `fk_Media_typeMedia_idx` (`typeMedia_id` ASC) VISIBLE,
  INDEX `fk_Media_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Media_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`),
  CONSTRAINT `fk_Media_typeMedia`
    FOREIGN KEY (`typeMedia_id`)
    REFERENCES `redschool`.`typemedia` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`migrations` ;

CREATE TABLE IF NOT EXISTS `redschool`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `redschool`.`reconocimientos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`reconocimientos` ;

CREATE TABLE IF NOT EXISTS `redschool`.`reconocimientos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` TEXT NOT NULL,
  `Escuela_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `Escuela_id`),
  INDEX `fk_Reconocimientos_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  CONSTRAINT `fk_Reconocimientos_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`taller`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`taller` ;

CREATE TABLE IF NOT EXISTS `redschool`.`taller` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `redschool`.`taller_has_escuela`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redschool`.`taller_has_escuela` ;

CREATE TABLE IF NOT EXISTS `redschool`.`taller_has_escuela` (
  `Taller_id` INT(11) NOT NULL,
  `Escuela_id` INT(11) NOT NULL,
  PRIMARY KEY (`Escuela_id`),
  INDEX `fk_Taller_has_Escuela_Escuela1_idx` (`Escuela_id` ASC) VISIBLE,
  INDEX `fk_Taller_has_Escuela_Taller1_idx` (`Taller_id` ASC) VISIBLE,
  CONSTRAINT `fk_Taller_has_Escuela_Escuela1`
    FOREIGN KEY (`Escuela_id`)
    REFERENCES `redschool`.`escuela` (`id`),
  CONSTRAINT `fk_Taller_has_Escuela_Taller1`
    FOREIGN KEY (`Taller_id`)
    REFERENCES `redschool`.`taller` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
