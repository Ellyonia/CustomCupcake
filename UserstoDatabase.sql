
LOAD DATA LOCAL INFILE 'CustomCupcakesDBData-Users.csv'
INTO TABLE (Customers)
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(customer_ID, mailingList, firstName, lastName, address, city, state, zipCode, email, password, telephoneNumber);
