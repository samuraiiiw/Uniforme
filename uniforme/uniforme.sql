-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2023 at 09:15 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema uniforme
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema uniforme
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `uniforme` DEFAULT CHARACTER SET utf8 ;
USE `uniforme` ;

-- -----------------------------------------------------
-- Table `uniforme`.`pol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`pol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`vrsta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`vrsta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`artikal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`artikal` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sifra` INT(11) NOT NULL,
  `naziv` VARCHAR(150) NOT NULL,
  `cena` INT(11) NOT NULL,
  `vrsta_id` INT(11) NOT NULL,
  `pol_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_artikal_vrsta1_idx` (`vrsta_id` ASC) ,
  INDEX `fk_artikal_pol1_idx` (`pol_id` ASC) ,
  CONSTRAINT `fk_artikal_pol1`
    FOREIGN KEY (`pol_id`)
    REFERENCES `uniforme`.`pol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artikal_vrsta1`
    FOREIGN KEY (`vrsta_id`)
    REFERENCES `uniforme`.`vrsta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`kupac`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`kupac` (
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `email` VARCHAR(70) NOT NULL,
  `telefon` VARCHAR(45) NOT NULL,
  `grad` VARCHAR(45) NOT NULL,
  `postanski broj` INT(11) NOT NULL,
  `ulica` VARCHAR(255) NOT NULL,
  `broj` VARCHAR(15) NOT NULL,
  `sprat` INT(11) NULL DEFAULT NULL,
  `broj_stana` INT(11) NULL DEFAULT NULL,
  `interfon` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`kupovina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`kupovina` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `artikal_id` INT(11) NOT NULL,
  `kupac_email` VARCHAR(70) NOT NULL,
  `datum` DATE NOT NULL,
  `kolicina` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_artikal_has_kupac_kupac1_idx` (`kupac_email` ASC) ,
  INDEX `fk_artikal_has_kupac_artikal_idx` (`artikal_id` ASC) ,
  CONSTRAINT `fk_artikal_has_kupac_artikal`
    FOREIGN KEY (`artikal_id`)
    REFERENCES `uniforme`.`artikal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artikal_has_kupac_kupac1`
    FOREIGN KEY (`kupac_email`)
    REFERENCES `uniforme`.`kupac` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`slika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`slika` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `put` VARCHAR(255) NOT NULL,
  `artikal_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `artikal_id`),
  INDEX `fk_slika_artikal1_idx` (`artikal_id` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`velicine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`velicine` (
  `size` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`size`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `uniforme`.`dostupne_velicine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniforme`.`dostupne_velicine` (
  `artikal_id` INT(11) NOT NULL,
  `velicine_id` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`artikal_id`, `velicine_id`),
  INDEX `fk_artikal_has_velicine_velicine1_idx` (`velicine_id` ASC) ,
  INDEX `fk_artikal_has_velicine_artikal1_idx` (`artikal_id` ASC) ,
  CONSTRAINT `fk_artikal_has_velicine_artikal1`
    FOREIGN KEY (`artikal_id`)
    REFERENCES `uniforme`.`artikal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artikal_has_velicine_velicine1`
    FOREIGN KEY (`velicine_id`)
    REFERENCES `uniforme`.`velicine` (`size`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
