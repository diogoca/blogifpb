SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `blogifpb` DEFAULT CHARACTER SET utf8 ;
USE `blogifpb` ;

-- -----------------------------------------------------
-- Table `blogifpb`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogifpb`.`categoria` (
  `id_categoria` INT NOT NULL ,
  `nome` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`id_categoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogifpb`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogifpb`.`usuario` (
  `id_usuario` INT NOT NULL ,
  `email` VARCHAR(60) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogifpb`.`post`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogifpb`.`post` (
  `id_post` INT NOT NULL ,
  `id_categoria` INT NOT NULL ,
  `id_usuario` INT NOT NULL ,
  `titulo` VARCHAR(60) NOT NULL ,
  `texto` LONGTEXT NOT NULL ,
  `data` DATETIME NOT NULL ,
  `tags` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_post`, `id_categoria`, `id_usuario`) ,
  INDEX `fk_post_categoria` (`id_categoria` ASC) ,
  INDEX `fk_post_usuario` (`id_usuario` ASC) ,
  CONSTRAINT `fk_post_categoria`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `blogifpb`.`categoria` (`id_categoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_usuario`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `blogifpb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blogifpb`.`comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `blogifpb`.`comentario` (
  `id_comentario` INT NOT NULL ,
  `id_post` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `email` VARCHAR(60) NULL ,
  `site` VARCHAR(60) NULL ,
  `texto` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_comentario`, `id_post`) ,
  INDEX `fk_comentario_post1` (`id_post` ASC) ,
  CONSTRAINT `fk_comentario_post1`
    FOREIGN KEY (`id_post` )
    REFERENCES `blogifpb`.`post` (`id_post` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
