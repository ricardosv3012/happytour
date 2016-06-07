-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema omicron
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema omicron
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `omicron` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `omicron` ;

-- -----------------------------------------------------
-- Table `omicron`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`users` ;

CREATE TABLE IF NOT EXISTS `omicron`.`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT,
  `firtname` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `numberphone` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `enable` VARCHAR(1) NULL DEFAULT 'S',
  PRIMARY KEY (`idusers`),
  UNIQUE INDEX `idusers_UNIQUE` (`idusers` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `omicron`.`page`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`page` ;

CREATE TABLE IF NOT EXISTS `omicron`.`page` (
  `idpage` INT NOT NULL AUTO_INCREMENT,
  `title_es` VARCHAR(1000) NULL,
  `title_en` VARCHAR(1000) NULL,
  `title_ru` VARCHAR(1000) NULL,
  `content_es` VARCHAR(1000) NULL,
  `content_en` VARCHAR(1000) NULL,
  `content_ru` VARCHAR(1000) NULL,
  PRIMARY KEY (`idpage`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `omicron`.`type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`type` ;

CREATE TABLE IF NOT EXISTS `omicron`.`type` (
  `idtype` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `filephp` VARCHAR(45) NULL,
  PRIMARY KEY (`idtype`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `omicron`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`category` ;

CREATE TABLE IF NOT EXISTS `omicron`.`category` (
  `idcategory` INT NOT NULL AUTO_INCREMENT,
  `parent_id` INT NULL,
  `idtype` INT NULL,
  `idpage` INT NULL,
  `section` VARCHAR(45) NULL,
  `name_es` VARCHAR(45) NULL,
  `name_en` VARCHAR(45) NULL,
  `name_ru` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategory`),
  INDEX `fk_category_type_idx` (`idtype` ASC),
  INDEX `fk_category_page1_idx` (`idpage` ASC),
  INDEX `fk_category_category1_idx` (`parent_id` ASC),
  CONSTRAINT `fk_category_type`
    FOREIGN KEY (`idtype`)
    REFERENCES `omicron`.`type` (`idtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_page`
    FOREIGN KEY (`idpage`)
    REFERENCES `omicron`.`page` (`idpage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_category`
    FOREIGN KEY (`parent_id`)
    REFERENCES `omicron`.`category` (`idcategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `omicron`.`process`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`process` ;

CREATE TABLE IF NOT EXISTS `omicron`.`process` (
  `idprocess` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(1000) NULL,
  `subname` VARCHAR(1000) NULL,
  `section` VARCHAR(45) NULL DEFAULT 'CONTENT',
  PRIMARY KEY (`idprocess`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `omicron`.`services`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`services` ;

CREATE TABLE IF NOT EXISTS `omicron`.`services` (
  `idservices` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idprocess` INT UNSIGNED NOT NULL,
  `section` VARCHAR(45) NULL DEFAULT 'CONTENT',
  `title` VARCHAR(1000) NULL,
  `content` VARCHAR(1000) NULL,
  `footer` VARCHAR(1000) NULL,
  `icon` VARCHAR(45) NULL,
  `href` VARCHAR(45) NULL,
  `enabled` VARCHAR(1) NULL DEFAULT 'S',
  PRIMARY KEY (`idservices`),
  INDEX `fk_services_process1_idx` (`idprocess` ASC),
  CONSTRAINT `fk_services_process1`
    FOREIGN KEY (`idprocess`)
    REFERENCES `omicron`.`process` (`idprocess`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `omicron`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `omicron`.`news` ;

CREATE TABLE IF NOT EXISTS `omicron`.`news` (
  `idnews` INT NOT NULL AUTO_INCREMENT,
  `idprocess` INT UNSIGNED NOT NULL,
  `section` VARCHAR(45) NULL DEFAULT 'CONTENT',
  `title` VARCHAR(1000) NULL,
  `content` VARCHAR(1000) NULL,
  `footer` VARCHAR(1000) NULL,
  `icon` VARCHAR(45) NULL,
  `href` VARCHAR(45) NULL,
  `enabled` VARCHAR(1) NULL DEFAULT 'S',
  PRIMARY KEY (`idnews`),
  INDEX `fk_news_process1_idx` (`idprocess` ASC),
  CONSTRAINT `fk_news_process1`
    FOREIGN KEY (`idprocess`)
    REFERENCES `omicron`.`process` (`idprocess`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
