<?php


function getFavoritesFromDB($customerID)
{

	$con = mysql_connect("localhost", "phpuser", "weLoveCupcakes666");
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
	$con = mysql_connect("localhost", "phpuser", "weLoveCupcakes666");

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
	$con = mysql_connect("localhost", "phpuser", "weLoveCupcakes666");

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
	$con = mysql_connect("localhost", "phpuser", "weLoveCupcakes666");

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


?>





