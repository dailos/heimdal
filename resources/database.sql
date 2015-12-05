SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `heimdal` ;
CREATE SCHEMA IF NOT EXISTS `heimdal` DEFAULT CHARACTER SET utf8 ;
USE `heimdal` ;

-- -----------------------------------------------------
-- Table `heimdal`.`device`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heimdal`.`device` ;

CREATE  TABLE IF NOT EXISTS `heimdal`.`device` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `location` VARCHAR(45) NULL DEFAULT NULL ,
  `lastactivity` TIMESTAMP NULL DEFAULT NULL ,
  `enabled` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `heimdal`.`iface`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heimdal`.`iface` ;

CREATE  TABLE IF NOT EXISTS `heimdal`.`iface` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `location` VARCHAR(45) NULL DEFAULT NULL ,
  `lastactivity` TIMESTAMP NULL DEFAULT NULL ,
  `enabled` TINYINT(1) NULL DEFAULT NULL ,
  `device_id` INT(11) NOT NULL ,
  `onthreshold` DOUBLE NOT NULL ,
  `alarmthreshold` INT(11) NOT NULL ,
  `tag0` VARCHAR(45) NULL DEFAULT NULL ,
  `tag1` VARCHAR(45) NULL DEFAULT NULL ,
  `tag2` VARCHAR(45) NULL DEFAULT NULL ,
  `tag3` VARCHAR(45) NULL DEFAULT NULL ,
  `tag4` VARCHAR(45) NULL DEFAULT NULL ,
  `tag5` VARCHAR(45) NULL DEFAULT NULL ,
  `tag6` VARCHAR(45) NULL DEFAULT NULL ,
  `tag7` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_interfaces_1` (`device_id` ASC) ,
  CONSTRAINT `fk_interfaces_1`
    FOREIGN KEY (`device_id` )
    REFERENCES `heimdal`.`device` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COMMENT = 'utf8_general_ci';


-- -----------------------------------------------------
-- Table `heimdal`.`log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heimdal`.`log` ;

CREATE  TABLE IF NOT EXISTS `heimdal`.`log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `iface_id` INT(11) NOT NULL ,
  `timestamp` TIMESTAMP NULL DEFAULT NULL ,
  `value0` DOUBLE NULL DEFAULT NULL ,
  `value1` DOUBLE NULL DEFAULT NULL ,
  `value2` DOUBLE NULL DEFAULT NULL ,
  `value3` DOUBLE NULL DEFAULT NULL ,
  `value4` DOUBLE NULL DEFAULT NULL ,
  `value5` DOUBLE NULL DEFAULT NULL ,
  `value6` DOUBLE NULL DEFAULT NULL ,
  `value7` DOUBLE NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_logs_1` (`iface_id` ASC) ,
  CONSTRAINT `fk_logs_1`
    FOREIGN KEY (`iface_id` )
    REFERENCES `heimdal`.`iface` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `heimdal`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heimdal`.`user` ;

CREATE  TABLE IF NOT EXISTS `heimdal`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL ,
  `enabled` TINYINT(1) NULL DEFAULT NULL ,
  `admin` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `heimdal`.`device_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heimdal`.`device_user` ;

CREATE  TABLE IF NOT EXISTS `heimdal`.`device_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `device_id` INT(11) NOT NULL ,
  `user_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_device_user_user1` (`user_id` ASC) ,
  INDEX `fk_device_user_device1` (`device_id` ASC) ,
  CONSTRAINT `fk_device_user_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `heimdal`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_device_user_device1`
    FOREIGN KEY (`device_id` )
    REFERENCES `heimdal`.`device` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
