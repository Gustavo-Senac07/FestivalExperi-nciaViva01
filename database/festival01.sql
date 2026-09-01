-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema festival01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema festival01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `festival01` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `festival01` ;

-- -----------------------------------------------------
-- Table `festival01`.`atividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival01`.`atividades` (
  `id_atividades` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(300) NOT NULL,
  `data_horario` DATE NOT NULL,
  `vagas` INT NOT NULL,
  `status` ENUM("ativo", "inativo") NOT NULL DEFAULT 'ativo',
  PRIMARY KEY (`id_atividades`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `festival01`.`participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival01`.`participante` (
  `id_participante` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(70) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `status` ENUM("ativo", "inativo") NOT NULL DEFAULT 'ativo',
  PRIMARY KEY (`id_participante`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `festival01`.`inscricao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festival01`.`inscricao` (
  `id_inscricao` INT NOT NULL AUTO_INCREMENT,
  `status` ENUM("confirmada", "cancelada") NOT NULL DEFAULT 'confirmada',
  `participante_id_participante` INT NOT NULL,
  `atividades_id_atividades` INT NOT NULL,
  PRIMARY KEY (`id_inscricao`),
  INDEX `fk_inscricao_participante_idx` (`participante_id_participante` ASC) VISIBLE,
  INDEX `fk_inscricao_atividades1_idx` (`atividades_id_atividades` ASC) VISIBLE,
  CONSTRAINT `fk_inscricao_participante`
    FOREIGN KEY (`participante_id_participante`)
    REFERENCES `festival01`.`participante` (`id_participante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_atividades1`
    FOREIGN KEY (`atividades_id_atividades`)
    REFERENCES `festival01`.`atividades` (`id_atividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
