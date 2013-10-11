SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `CustomCupcakes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `CustomCupcakes` ;

-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeIcing`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeIcing` (
  `cupcakeIcing_ID` INT NOT NULL ,
  `icing_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  `pic_ID` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`cupcakeIcing_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeFlavor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeFlavor` (
  `cupcakeFlavor_ID` INT NOT NULL ,
  `flavor_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  `pic_ID` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`cupcakeFlavor_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeFilling`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeFilling` (
  `cupcakeFilling_ID` INT NOT NULL ,
  `filling_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  `rgb_ID` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`cupcakeFilling_ID`) )
ENGINE = InnoDB;


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
-- Table `CustomCupcakes`.`Orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Orders` (
  `order_ID` INT NOT NULL ,
  `customer_ID` INT NOT NULL ,
  PRIMARY KEY (`order_ID`) ,
  INDEX `customersF2_ID` (`customer_ID` ASC) ,
  CONSTRAINT `customersF2_ID`
    FOREIGN KEY (`customer_ID` )
    REFERENCES `CustomCupcakes`.`Customers` (`customer_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`Cupcakes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Cupcakes` (
  `cupcake_ID` INT NOT NULL ,
  `cupcakeFlavor_ID` INT NOT NULL ,
  `cupcakeIcing_ID` INT NOT NULL ,
  `cupcakeFilling_ID` INT NOT NULL DEFAULT 0 ,
  `cupcakeQuantity` INT NOT NULL DEFAULT 1 ,
  `order_ID` INT NULL ,
  PRIMARY KEY (`cupcake_ID`) ,
  INDEX `icingF_ID` (`cupcakeIcing_ID` ASC) ,
  INDEX `flavorF_ID` (`cupcakeFlavor_ID` ASC) ,
  INDEX `fillingF_ID` (`cupcakeFilling_ID` ASC) ,
  INDEX `orderF_ID` (`order_ID` ASC) ,
  CONSTRAINT `icingF_ID`
    FOREIGN KEY (`cupcakeIcing_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeIcing` (`cupcakeIcing_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `flavorF_ID`
    FOREIGN KEY (`cupcakeFlavor_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeFlavor` (`cupcakeFlavor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fillingF_ID`
    FOREIGN KEY (`cupcakeFilling_ID` )
    REFERENCES `CustomCupcakes`.`CupcakeFilling` (`cupcakeFilling_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `orderF_ID`
    FOREIGN KEY (`order_ID` )
    REFERENCES `CustomCupcakes`.`Orders` (`order_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '\n';


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`Favorites`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Favorites` (
  `favorite_ID` INT NOT NULL ,
  `customer_ID` INT NOT NULL ,
  `cupcake_ID` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`favorite_ID`) ,
  INDEX `customerF_ID` (`customer_ID` ASC) ,
  INDEX `cupcakesF_ID` (`cupcake_ID` ASC) ,
  CONSTRAINT `customerF_ID`
    FOREIGN KEY (`customer_ID` )
    REFERENCES `CustomCupcakes`.`Customers` (`customer_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cupcakesF_ID`
    FOREIGN KEY (`cupcake_ID` )
    REFERENCES `CustomCupcakes`.`Cupcakes` (`cupcake_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'A listing of a Customers Favorite Cupcakes and their compone' /* comment truncated */;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`Toppings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`Toppings` (
  `topping_ID` INT NOT NULL ,
  `topping_Name` VARCHAR(20) NOT NULL ,
  `purchase_Amount` INT NOT NULL ,
  PRIMARY KEY (`topping_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CustomCupcakes`.`CupcakeToppings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CustomCupcakes`.`CupcakeToppings` (
  `cupcake_ID` INT NOT NULL ,
  `topping_ID` INT NOT NULL ,
  `Rn_ID` INT NOT NULL ,
  PRIMARY KEY (`Rn_ID`) ,
  INDEX `cupcakeF_ID` (`cupcake_ID` ASC) ,
  INDEX `toppingF_ID` (`topping_ID` ASC) ,
  CONSTRAINT `cupcakeF_ID`
    FOREIGN KEY (`cupcake_ID` )
    REFERENCES `CustomCupcakes`.`Cupcakes` (`cupcake_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `toppingF_ID`
    FOREIGN KEY (`topping_ID` )
    REFERENCES `CustomCupcakes`.`Toppings` (`topping_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
