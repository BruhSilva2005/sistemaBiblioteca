-- MySQL Script generated by MySQL Workbench
-- Thu Aug 24 15:24:59 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `biblioteca` ;

-- -----------------------------------------------------
-- Table `biblioteca`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`alunos` (
  `id_aluno` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `celular` VARCHAR(20) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  PRIMARY KEY (`id_aluno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`livros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`livros` (
  `id_livro` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `autor` VARCHAR(100) NOT NULL,
  `numero_pagina` INT NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `ano_publicacao` INT NOT NULL,
  `isbn` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_livro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`alunos_has_livros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`emprestimos` (
  `id_aluno` INT UNSIGNED NOT NULL,
  `id_livro` INT UNSIGNED NOT NULL,
  `data_emprestimo` DATETIME NOT NULL,
  `data_devolucao` DATE NOT NULL,
  PRIMARY KEY (`id_aluno`, `id_livro`),
  INDEX `fk_alunos_has_livros_livros1_idx` (`id_livro` ASC) VISIBLE,
  INDEX `fk_alunos_has_livros_alunos_idx` (`id_aluno` ASC) VISIBLE,
  CONSTRAINT `fk_alunos_has_livros_alunos`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `biblioteca`.`alunos` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alunos_has_livros_livros1`
    FOREIGN KEY (`id_livro`)
    REFERENCES `biblioteca`.`livros` (`id_livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`usuarios` (
  `id_usuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` BIGINT(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `prefil` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
