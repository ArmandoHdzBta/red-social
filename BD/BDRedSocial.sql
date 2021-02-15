-- MySQL Script generated by MySQL Workbench
-- Mon Feb  8 16:34:34 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema red_social
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema red_social
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `red_social` DEFAULT CHARACTER SET utf8 ;
USE `red_social` ;

-- -----------------------------------------------------
-- Table `red_social`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido_paterno` VARCHAR(45) NOT NULL,
  `apellido_materno` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `contrasennia` VARCHAR(255) NOT NULL,
  `foto_perfil` VARCHAR(45) NULL DEFAULT `default.jpg`,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `red_social`.`lista_amigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`lista_amigos` (
  `idamigos` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `id_amigo` INT NOT NULL,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`idamigos`),
  INDEX `fk_usuario_lista_amigos_idx` (`id_usuario` ASC) ,
  INDEX `fk_usuario_lista_amigos_from_idx` (`id_amigo` ASC) ,
  CONSTRAINT `fk_usuario_lista_amigos_by`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `red_social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_lista_amigos_from`
    FOREIGN KEY (`id_amigo`)
    REFERENCES `red_social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `red_social`.`mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`mensajes` (
  `idmensajes` INT NOT NULL AUTO_INCREMENT,
  `mensaje` VARCHAR(45) NOT NULL,
  `imagen` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmensajes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `red_social`.`usuario_post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`usuario_post` (
  `idusuario_post` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `texto` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL DEFAULT `default.png`,
  PRIMARY KEY (`idusuario_post`),
  INDEX `fk_usuario_usuario_post_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_usuario_usuario_post`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `red_social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `red_social`.`reaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`reaction` (
  `idreaction` INT NOT NULL AUTO_INCREMENT,
  `like` TINYINT NOT NULL,
  PRIMARY KEY (`idreaction`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `red_social`.`usuario_post_reaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`usuario_post_reaction` (
  `idusuario_post_reaction` INT NOT NULL AUTO_INCREMENT,
  `id_usuario_post` INT NOT NULL,
  `id_reaction` INT NOT NULL,
  PRIMARY KEY (`idusuario_post_reaction`),
  INDEX `kf_usuario_post_reaction_idx` (`id_usuario_post` ASC) ,
  INDEX `fk_usuario_post_reaction_reaction_idx` (`id_reaction` ASC) ,
  CONSTRAINT `fk_usuario_post_reaction`
    FOREIGN KEY (`id_usuario_post`)
    REFERENCES `red_social`.`usuario_post` (`idusuario_post`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_post_reaction_reaction`
    FOREIGN KEY (`id_reaction`)
    REFERENCES `red_social`.`reaction` (`idreaction`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `red_social`.`conversacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `red_social`.`conversacion` (
  `idconversacion` INT NOT NULL,
  `id_mensaje` INT NOT NULL,
  `id_usuario_by` INT NOT NULL,
  `id_usuario_from` INT NOT NULL,
  PRIMARY KEY (`idconversacion`),
  INDEX `fk_conversacion_mensaje_idx` (`id_mensaje` ASC) ,
  INDEX `fk_conversacion_usuario_by_idx` (`id_usuario_by` ASC) ,
  INDEX `fk_conversacion_usuario_from_idx` (`id_usuario_from` ASC) ,
  CONSTRAINT `fk_conversacion_mensaje`
    FOREIGN KEY (`id_mensaje`)
    REFERENCES `red_social`.`mensajes` (`idmensajes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversacion_usuario_by`
    FOREIGN KEY (`id_usuario_by`)
    REFERENCES `red_social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversacion_usuario_from`
    FOREIGN KEY (`id_usuario_from`)
    REFERENCES `red_social`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
