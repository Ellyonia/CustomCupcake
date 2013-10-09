SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `CustomCupcakes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `CustomCupcakes` ;

-- -----------------------------------------------------
-- Table `CustomCupcakes`.`Customers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Customers` (
  `customer_ID` INT NOT NULL ,
  `firstName` VARCHAR(20) NOT NULL ,
  `lastName` VARCHAR(20) NOT NULL ,
  `address` VARCHAR(30) NOT NULL ,
  `telephoneNumber` INT NOT NULL ,
  `email` VARCHAR(30) NOT NULL ,
  `password` VARCHAR(15) NOT NULL ,
  `city` VARCHAR(15) NOT NULL ,
  `state` VARCHAR(15) NOT NULL ,
  `zipCode` INT NOT NULL ,
  `mailingList` TINYINT(1) NOT NULL DEFAULT FALSE ,
  PRIMARY KEY (`customer_ID`) )
ENGINE = InnoDB
COMMENT = 'This table is for storing the information on the frequent cu' /* comment truncated */;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeFlavor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeFlavor` (
  `cupcakeFlavor_ID` INT NOT NULL ,
  `flavor_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  PRIMARY KEY (`cupcakeFlavor_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeIcing`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeIcing` (
  `cupcakeIcing_ID` INT NOT NULL ,
  `icing_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  PRIMARY KEY (`cupcakeIcing_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeTopping`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeTopping` (
  `cupcakeTopping_ID` INT NOT NULL ,
  `topping_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  PRIMARY KEY (`cupcakeTopping_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeFilling`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeFilling` (
  `cupcakeFilling_ID` INT NOT NULL ,
  `filling_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  PRIMARY KEY (`cupcakeFilling_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`Orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Orders` (
  `order_ID` INT NOT NULL ,
  `customer_ID` INT NOT NULL ,
  `cupcakeFlavor_ID` INT NOT NULL ,
  `cupcakeIcing_ID` INT NOT NULL ,
  `cupcakeTopping_ID` INT NOT NULL DEFAULT 0 ,
  `cupcakeFilling_ID` INT NOT NULL DEFAULT 0 ,
  `cupcakeQuantity` INT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`order_ID`) ,
  INDEX `customer_ID` (`customer_ID` ASC) ,
  INDEX `cupcakeFlavor_ID` (`cupcakeFlavor_ID` ASC) ,
  INDEX `cupcakeIcing_ID` (`cupcakeIcing_ID` ASC) ,
  INDEX `cupcakeTopping_ID` (`cupcakeTopping_ID` ASC) ,
  INDEX `cupcakeFilling_ID` (`cupcakeFilling_ID` ASC) ,
  CONSTRAINT `customer_ID`
    FOREIGN KEY (`customer_ID` )
    REFERENCES `CustomCupcakes`.`Customers` (`customer_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeFlavor_ID`
    FOREIGN KEY (`cupcakeFlavor_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeFlavor` (`cupcakeFlavor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeIcing_ID`
    FOREIGN KEY (`cupcakeIcing_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeIcing` (`cupcakeIcing_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeTopping_ID`
    FOREIGN KEY (`cupcakeTopping_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeTopping` (`cupcakeTopping_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeFilling_ID`
    FOREIGN KEY (`cupcakeFilling_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeFilling` (`cupcakeFilling_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'This table is for holding the current orders that Custom Cup' /* comment truncated */;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`Favorites`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Favorites` (
  `favorite_ID` INT NOT NULL ,
  `cupcakeFlavor_ID` INT NOT NULL ,
  `cupcakeIcing_ID` INT NOT NULL ,
  `cupcakeTopping_ID` INT NOT NULL ,
  `cupcakeFilling_ID` INT NOT NULL ,
  `customer_ID` INT NOT NULL ,
  PRIMARY KEY (`favorite_ID`) ,
  INDEX `customer_ID` (`customer_ID` ASC) ,
  INDEX `cupcakeFlavor_ID` (`cupcakeFlavor_ID` ASC) ,
  INDEX `cupcakeIcing_ID` (`cupcakeIcing_ID` ASC) ,
  INDEX `cupcakeTopping_ID` (`cupcakeTopping_ID` ASC) ,
  INDEX `cupcakeFilling_ID` (`cupcakeFilling_ID` ASC) ,
  CONSTRAINT `customerF_ID`
    FOREIGN KEY (`customer_ID` )
    REFERENCES `CustomCupcakes`.`Customers` (`customer_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeFlavorF_ID`
    FOREIGN KEY (`cupcakeFlavor_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeFlavor` (`cupcakeFlavor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeIcingF_ID`
    FOREIGN KEY (`cupcakeIcing_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeIcing` (`cupcakeIcing_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeToppingF_ID`
    FOREIGN KEY (`cupcakeTopping_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeTopping` (`cupcakeTopping_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakeFillingF_ID`
    FOREIGN KEY (`cupcakeFilling_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeFilling` (`cupcakeFilling_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'A listing of a Customers Favorite Cupcakes and their compone' /* comment truncated */;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
