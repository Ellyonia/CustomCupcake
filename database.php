<?php

/**
This function takes a customer ID and returns a 2 dimensional array of all his favorites and all the elements belonging to those favorites.
Connects to the CustomCupcakes database and queries the favorites table.  It then builds the arrays off the results found.

@param int $customerID The ID number for the customer
@return Array An array containing every favorite, and the contained elements for each favorite.
*/
function getFavoritesFromDB($customerID)
{

	$con = mysql_connect("localhost", "DBandGUI", "narwhal");
	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes",$con) or die("Unable to select database: " . mysql_error());

	$query = "SELECT favorite_ID,cupcakeFlavor_ID,cupcakeIcing_ID,cupcakeFilling_ID,topping_ID FROM Favorites NATURAL JOIN Cupcakes NATURAL JOIN CupcakeToppings WHERE customer_ID='" . $customerID . "';";

	$result = mysql_query($query);

	$resultArr = array();

	// Iterates over the results and builds the 2-D array for the results
	while($row = mysql_fetch_array($result))
	{
		$resultArr[$row['favorite_ID']] = array(
			"flavor" => $row['cupcakeFlavor_ID'],
			"icing" => $row['cupcakeIcing_ID'],
			"topping" => $row['topping_ID'],
			"filling" => $row['cupcakeFilling_ID']
		);
	}

	mysql_close($con);

	return $resultArr;
}

/**
Takes in a favorite for the user and stores it in the table.
This function receives both the customer's ID and his favorite to be added.  This favorite is then inserted into the Favorites table

@param Array $arrToAdd An array containing the information of the favorite to be added
@param int $customerID The ID number for the customer that has the favorite to be added.
*/
function addFavoriteToDB($arrToAdd, $customerID)
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	// This query retrieves the current highest favorite_ID in the table, and then increments it by 1
	$query = "SELECT favorite_ID FROM Favorites ORDER BY favorite_ID DESC";

	$resultForFavoriteID = mysql_query($query);

	$rowForFavoriteID = mysql_fetch_array($resultForFavoriteID);

	$newFaveID = $rowForFavoriteID['favorite_ID'] + 1;
	
	$query = "SELECT cupcake_ID FROM Cupcakes ORDER BY Cupcakes DESC";
	
	$newCupcakeID = mysql_fetch_array(mysql_query($query))['cupcake_ID'] + 1;

	//This query actually adds in the new favorite
	$query = "INSERT INTO Cupcakes VALUES ('" . $newCupcakeID .
	"','" . $arrToAdd['flavor'] .
	"','" . $arrToAdd['icing'] .
	"','" . $arrToAdd['filling'] .
	"',NULL,'" . $customerID . "');";

	mysql_query($query);
	
	$query = "SELECT Rn_ID FROM CupcakeToppings ORDER BY Rn_ID DESC";
	
	$newRnID = mysql_fetch_array(mysql_query($query))['Rn_ID'] + 1;
	
	$increment = 1;
	
	while($currentToppingID = $arrToAdd['topping'][$increment])
	{
		$query = "INSERT INTO CupcakeToppings VALUES ('" .$newCupcakeID .
		"','" . $currentToppingID .
		"','" . $newRnID . "');";
		mysql_query($query);
		$increment = $increment + 1;
		$newRnID = $newRnID + 1;
	}
	mysql_close($con);
}

/**
This function gets the sales info of flavors from the database.
This information is stored in an array that links the flavor's name and the amount purchased.

@return Array An array containing the flavor's name linked to the amount purchased.
*/
function getFlavorsSalesFromDB()
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT flavor_Name,purchase_Amount FROM CupcakeFlavor;";

	$result = mysql_query($query);

	$finalArr = array();

	// This loop iterates over the results from the query and builds it into an array that will be returned later
	while($row = mysql_fetch_array($result))
	{
		$finalArr[$row['flavor_Name']] = $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

/**
This function gets the sales info of icing from the database.
This information is stored in an array that links the icing's name and the amount purchased.

@return Array An array containing the icing's name linked to the amount purchased.
*/
function getIcingsSalesFromDB()
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT icing_Name,purchase_Amount FROM CupcakeIcing;";

	$result = mysql_query($query);

	$finalArr = array();

	while($row = mysql_fetch_array($result))
	{
		$finalArr[$row['icing_Name']] = $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

/**
This function gets the sales info of toppings from the database.
This information is stored in an array that links the toppings's name and the amount purchased.

@return Array An array containing the topping's name linked to the amount purchased.
*/
function getToppingsSalesFromDB()
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT topping_Name,purchase_Amount FROM CupcakeTopping;";

	$result = mysql_query($query);

	$finalArr = array();

	while($row = mysql_fetch_array($result))
	{
		$finalArr[$row['topping_Name']] = $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

/**
This function gets the sales info of fillings from the database.
This information is stored in an array that links the filling's name and the amount purchased.

@return Array An array containing the filling's name linked to the amount purchased.
*/
function getFillingsSalesFromDB()
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT filling_Name,purchase_Amount FROM CupcakeFilling;";

	$result = mysql_query($query);

	$finalArr = array();

	while($row = mysql_fetch_array($result))
	{
		$finalArr[$row['filling_Name']] = $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

/**
This function takes in an array of values that is not only updated into the Orders, but also the four attribute tables as well



*/
function updateSaleToDB($arrOfInfo)
{
	$customerID = $arrOfInfo['customerID'];
	$flavor = $arrOfInfo['cupcakeFlavor_ID'];
	$icing = $arrOfInfo['cupcakeIcing_ID'];
	$topping = $arrOfInfo['cupcakeTopping_ID'];
	$filling = $arrOfInfo['cupcakeFilling_ID'];
	$quantity = $arrOfInfo['cupcakeQuantity'];

	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT order_ID FROM Orders ORDER BY order_ID DESC";

	$result = mysql_query($query);

	$newSalesID = mysql_fetch_array($result)['order_ID'] + 1;

	$query = "INSERT INTO Orders VALUES ('" .
		$newSalesID . "','" .
		$customerID . "','" .
		$flavor . "','" .
		$icing . "','" .
		$topping . "','" .
		$filling . "','" .
		$quantity . "');";

	mysql_query($query);

	$query = "UPDATE CupcakeFlavor SET purchase_Amount=purchase_Amount+" . $quantity .
		" WHERE  cupcakeFlavor_ID=" . $flavor . ";";

	mysql_query($query);

		$query = "UPDATE CupcakeIcing SET purchase_Amount=purchase_Amount+" . $quantity .
		" WHERE  cupcakeIcing_ID=" . $icing . ";";

	mysql_query($query);
	$query = "UPDATE CupcakeTopping SET purchase_Amount=purchase_Amount+" . $quantity .
		" WHERE  cupcakeTopping_ID=" . $topping . ";";

	mysql_query($query);
	$query = "UPDATE CupcakeFilling SET purchase_Amount=purchase_Amount+" . $quantity .
		" WHERE  cupcakeFilling_ID=" . $filling . ";";

	mysql_query($query);

	mysql_close($con);
}

function getCustomerOrdersFromDB($customerID)
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT order_ID,cupcakeFlavor_ID,cupcakeIcing_ID,cupcakeTopping_ID,cupcakeFilling_ID,cupcakeQuantity" .
		" FROM Orders WHERE customer_ID=" . $customerID . ";";

	$result = mysql_query($query);

	$resultArr = array();

	while($row = mysql_fetch_array($result))
	{
		$resultArr['order_ID'] = array("cupcakeFlavor_ID" => $row['cupcakeFlavor_ID'],
			"cupcakeIcing_ID" => $row['cupcakeIcing_ID'],
			"cupcakeTopping_ID" => $row['cupcakeTopping_ID'],
			"cupcakeFilling_ID" => $row['cupcakeFilling_ID'],
			"cupcakeQuantity" => $row['cupcakeQuantity']);
	}

	mysql_close($con);
	return $resultArr;
}

?>





