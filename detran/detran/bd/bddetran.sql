-- MySQL Script generated by MySQL Workbench
-- 11/08/19 14:39:47
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bddetran
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bddetran` ;

-- -----------------------------------------------------
-- Schema bddetran
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bddetran` DEFAULT CHARACTER SET utf8 ;
USE `bddetran` ;

-- -----------------------------------------------------
-- Table `bddetran`.`Pessoas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bddetran`.`Pessoas` ;

CREATE TABLE IF NOT EXISTS `bddetran`.`Pessoas` (
  `cpf` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(300) NOT NULL,
  `endereco` VARCHAR(300) NOT NULL,
  `datadeNascimento` DATE NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `numCNH` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`cpf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddetran`.`Carros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bddetran`.`Carros` ;

CREATE TABLE IF NOT EXISTS `bddetran`.`Carros` (
  `renavam` VARCHAR(12) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `placa` VARCHAR(10) NOT NULL,
  `chassi` VARCHAR(20) NOT NULL,
  `anoFabricacao` VARCHAR(4) NOT NULL,
  `anoModelo` VARCHAR(4) NOT NULL,
  PRIMARY KEY (`renavam`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bddetran`.`Pessoas_Carros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bddetran`.`Pessoas_Carros` ;

CREATE TABLE IF NOT EXISTS `bddetran`.`Pessoas_Carros` (
  `fkcpf` VARCHAR(45) NOT NULL,
  `fkrenavam` VARCHAR(12) NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  PRIMARY KEY (`fkcpf`, `fkrenavam`, `hora`, `data`),
  INDEX `fk_Pessoas_carros1_Carros1_idx` (`fkrenavam` ASC),
  CONSTRAINT `fk_Pessoas_carros1_Pessoas`
    FOREIGN KEY (`fkcpf`)
    REFERENCES `bddetran`.`Pessoas` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pessoas_carros1_Carros1`
    FOREIGN KEY (`fkrenavam`)
    REFERENCES `bddetran`.`Carros` (`renavam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
