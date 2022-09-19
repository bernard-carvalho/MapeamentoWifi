-- MySQL Workbench Forward Engineering


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Monitoramento
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Monitoramento
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Monitoramento` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `Monitoramento` ;

-- -----------------------------------------------------
-- Table `Monitoramento`.`AP`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Monitoramento`.`AP` (
  `ap_id` INT NOT NULL AUTO_INCREMENT,
  `ap_nome` VARCHAR(45) NOT NULL,
  `ap_ip` VARCHAR(45) NOT NULL,
  `ap_mac` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ap_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 72
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `Monitoramento`.`MAC_STA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Monitoramento`.`MAC_STA` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mac_sta` VARCHAR(17) NULL DEFAULT NULL,
  `mac_ap` VARCHAR(17) NULL DEFAULT NULL,
  `ip_sta` VARCHAR(15) NULL DEFAULT NULL,
  `date` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 686118
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
