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

INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP_AUDITORIO-01', '10.10.61.1', 'F0:9F:C2:6E:95:1C');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP_AUDITORIO-02', '10.10.61.2', 'F0:9F:C2:6E:FC:FC');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP_AUDITORIO-EXTERIOR', '10.10.61.10', 'F0:9F:C2:6E:10:24');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP_GINASIO-02', '10.10.61.11', 'F0:9F:C2:6E:19:7C');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('BIB_INFERIOR', '10.10.61.7', 'F0:9F:C2:6E:FD:14');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('BIB_SUP_ESQUERDA', '10.10.61.9', 'F0:9F:C2:6E:92:10');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('MINI-05', '10.10.61.3', 'F0:9F:C2:6E:19:10');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('MINI-07', '10.10.61.6', 'F0:9F:C2:6E:95:A0');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('MINI-09', '10.10.61.5', 'F0:9F:C2:6E:10:20');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('MINI-11', '10.10.61.4', 'F0:9F:C2:6E:12:A4');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BIBLIO-SUP01', '10.10.60.2', '60:31:97:73:B9:E3');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC06-02', '10.10.60.3', '60:31:97:73:B4:93');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC04-02', '10.10.60.4', 'BC:CF:4F:73:6C:91');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC09-02-E', '10.10.60.5', '60:31:97:73:B9:8B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC9A-03-E', '10.10.60.6', '60:31:97:73:B5:E7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14S-03', '10.10.60.7', '60:31:97:73:BB:97');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15S-03', '10.10.60.8', '60:31:97:73:BB:1F');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC01-02-I', '10.10.60.9', '60:31:97:73:B9:F7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC06-01', '10.10.60.9', '60:31:97:73:B5:27');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC07A-01-E', '10.10.60.11', '60:31:97:73:B4:8F');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC05-01-E', '10.10.60.12', '60:31:97:73:B8:C7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC05-02-E', '10.10.60.13', '60:31:97:73:B9:6B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC02-02-I', '10.10.60.14', '60:31:97:73:B9:47');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC17S-01', '10.10.60.15', '60:31:97:73:BB:CB');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC02-03-I', '10.10.60.16', '60:31:97:73:B9:5B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC9-02-I', '10.10.60.17', '60:31:97:73:BB:0B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC02-01-I', '10.10.60.18', '60:31:97:73:BB:9B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC7A-03-I', '10.10.60.19', '60:31:97:73:BB:53');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC09-04', '10.10.60.20', '60:31:97:73:BB:A3');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC04-03', '10.10.60.22', '60:31:97:73:BB:27');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14I-02', '10.10.60.23', '60:31:97:73:B8:8F');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC01-03-I', '10.10.60.24', '60:31:97:73:B3:97');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLOC14S-01', '10.10.60.25', '60:31:97:73:B5:43');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC07-01', '10.10.60.26', '60:31:97:73:B9:C7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC13-02-I', '10.10.60.27', '60:31:97:73:BB:5F');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC11-03', '10.10.60.28', '60:31:97:73:BA:D3');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-GALPAO', '10.10.60.29', '60:31:97:73:BB:B7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC01-01-I', '10.10.60.30', '60:31:97:73:BB:63');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15S-02', '10.10.60.31', '60:31:97:73:BA:5B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC07-02-I', '10.10.60.32', '60:31:97:73:B3:43');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC17S-03', '10.10.60.33', '60:31:97:73:BB:A7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC16S-03', '10.10.60.34', '60:31:97:73:B3:C7');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC09-02', '10.10.60.35', 'BC:CF:4F:73:6A:CD');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC17S-04', '10.10.60.42', '60:31:97:73:BA:0F');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15S-01', '10.10.60.43', '60:31:97:73:BA:EF');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC16S-01', '10.10.60.44', '60:31:97:73:BB:1B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC09-01-I', '10.10.60.47', '60:31:97:73:B4:7B');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC08-02', '10.10.60.48', 'BC:CF:4F:73:69:BD');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP_BLC08-03', '10.10.60.49', 'BC:CF:4F:73:6D:55');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC08-01', '10.10.60.50', 'BC:CF:4F:73:6C:6D');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC16S-04', '10.10.60.51', 'BC:CF:4F:73:69:B1');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14S-04', '10.10.60.52', 'BC:CF:4F:73:6C:81');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC16S-02', '10.10.60.53', 'BC:CF:4F:73:6B:6D');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC17S-02', '10.10.60.54', 'BC:CF:4F:73:6B:BD');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC17I-02', '10.10.60.55', 'BC:CF:4F:73:6C:F9');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC17I-01', '10.10.60.56', 'BC:CF:4F:73:6B:3D');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14I-03', '10.10.60.57', 'BC:CF:4F:73:6E:ED');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14I-04', '10.10.60.58', 'BC:CF:4F:73:6E:E5');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14S-02', '10.10.60.59', 'BC:CF:4F:73:69:C1');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15S-04', '10.10.60.60', 'BC:CF:4F:73:6C:29');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC14I-01', '10.10.60.61', 'BC:CF:4F:73:6B:E1');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15I-04', '10.10.60.62', 'BC:CF:4F:73:6D:CD');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15I-03', '10.10.60.63', 'BC:CF:4F:73:6A:39');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15I-02', '10.10.60.64', 'BC:CF:4F:73:6C:15');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC15I-01', '10.10.60.65', 'BC:CF:4F:73:6B:09');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC04-01', '10.10.60.66', 'BC:CF:4F:73:6D:A1');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC05A-01', '10.10.60.68', 'BC:CF:4F:73:6C:11');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC05A-02', '10.10.60.69', 'BC:CF:4F:73:69:ED');
INSERT INTO `Monitoramento`.`AP` (`ap_nome`, `ap_ip`, `ap_mac`) VALUES ('AP-BLC05A-03', '10.10.60.70', 'BC:CF:4F:73:6C:45');

