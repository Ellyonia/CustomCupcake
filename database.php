<?php

function getFavoritesFromDB($customerID)
{

	$con = mysql_connect("localhost", "DBandGUI", "narwhal");
	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes",$con) or die("Unable to select database: " . mysql_error());

	$query = "SELECT * FROM Favorites WHERE customer_ID='" . $customerID . "';";

	$result = mysql_query($query);

	$resultArr = array();

	while($row = mysql_fetch_array($result))
	{
		$resultArr[$row['favorite_ID']] = array(
			"flavor" => $row['cupcakeFlavor_ID'],
			"icing" => $row['cupcakeIcing_ID'],
			"topping" => $row['cupcakeTopping_ID'],
			"filling" => $row['cupcakeFilling_ID']
		);
	}

	mysql_close($con);

	return $resultArr;
}

function addFavoriteToDB($arrToAdd, $customerID)
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT favorite_ID FROM favorite ORDER BY favorite_ID DESC";

	$resultForFavoriteID = mysql_query($query);

	$rowForFavoriteID = mysql_fetch_array($resultForFavoriteID);

	$newFaveID = $rowForFavoriteID['favorite_ID'] + 1;

	$query = "INSERT INTO Favorites VALUES ('" . $newFaveID .
	"','" . $arrToAdd['flavor'] .
	"','" . $arrToAdd['icing'] .
	"','" . $arrToAdd['topping'] .
	"','" . $arrToAdd['filling'] . "');";

	mysql_query($query);

	mysql_close($con);
}

function getFlavorsSalesFromDB()
{
	$con = mysql_connect("localhost", "DBandGUI", "narwhal");

	if(!$con) { die('Could not connect: ' . mysql_error()); }

	mysql_select_db("CustomCupcakes", $con) or die('Could not select db: ' . mysql_error());

	$query = "SELECT flavor_Name,purchase_Amount FROM CupcakeFlavor;";

	$result = mysql_query($query);

	$finalArr = array();

	while($row = mysql_fetch_array($result))
	{
		$finalArr[$row['flavor_Name']] => $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

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
		$finalArr[$row['icing_Name']] => $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

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
		$finalArr[$row['topping_Name']] => $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

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
		$finalArr[$row['filling_Name']] => $row['purchase_Amount'];
	}

	mysql_close($con);

	return $finalArr;
}

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
		$resultArr['order_ID'] => array("cupcakeFlavor_ID" => $row['cupcakeFlavor_ID'],
			"cupcakeIcing_ID" => $row['cupcakeIcing_ID'],
			"cupcakeTopping_ID" => $row['cupcakeTopping_ID'],
			"cupcakeFilling_ID" => $row['cupcakeFilling_ID'],
			"cupcakeQuantity" => $row['cupcakeQuantity']);
	}

	mysql_close($con);
	return $resultArr;
}

?>





