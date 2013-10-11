/*reading ToppingsBridge csv file into table*/

LOAD DATA LOCAL INFILE 'CustomCupcakesDBData-ToppingsBridge.csv'
INTO TABLE CupcakeToppings
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(Rn_ID, cupcake_ID, topping_ID);


