/*reading Users sql file into database*/

TRUNCATE TABLE (tablename);
LOAD DATA LOCAL INFILE 'CustomCupcakesDBData-Users.csv'
INTO TABLE (tablename)
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
(customer_ID, mailingList, firstName, lastName, address, city, state, zipCode, email, password, telephoneNumber);
