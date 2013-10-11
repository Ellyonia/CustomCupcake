<?php

include 'database.php';

function ccAPI()
{
	session_start();
}


/**
Takes in customerID, returns JSON of their favorite designs.

JSON Format:
 [favoriteID1=>[flavor,icing,topping,filling],favoriteID2=>[flavor,icing,topping,filling],...]

 @param int $customerID ID of the customer
 @return JSONArray the customer's favorites
*/
function getUserFavorites($customerID)
{
	$arr = getFavoritesFromDB($customerID);
	$jsonarr = json_encode($arr);
	return $jsonarr;
}

/**
Takes in a JSON containing the favorite details, and updates the database.

JSON Format:
 flavor => {flavor value}
 icing => {icing value}
 topping=>[1=>{toppingID1},2=>{toppingID2},3=>{toppingID3},...n=>{toppingIDn}]
 filling => {filling value}
 customerID => {customerID value}

@param JSONArray $favoriteAsJSON The favorite's settings to be stored
*/
function addUserFavorite($favoriteAsJSON)
{
	$arr = json_decode($favoriteAsJSON);
	$customerID = $arr['customerID'];
	$arrToSubmit = array_pop($arr);
	addFavoriteToDB($arrToSubmit, $customerID);
}

/**
Gets the sales information from the DB for flavors,icings,toppings,fillings

JSON Format:
 [flavors=>[name=>amountSold,name2=>amountSold,...],icings=>[...],toppings=>[...],fillings=>[...]]

@return JSONArray Contains the sales results for the items sold.
*/
function getSalesInformation()
{
	$arr = array(
		"flavors" => getFlavorsSalesFromDB(),
		"icings" => getIcingsSalesFromDB(),
		"toppings" => getToppingsSalesFromDB(),
		"fillings" => getFillingsSalesFromDB()
	);
	$jsonarr = json_encode($arr);
	return $jsonarr;
}

/**
This function takes in a JSON containing the sales information of the cupcakes being sold, and ships it off to the DB to be inserted.

JSON Format:
[customerID=>{val},cupcakeFlavor_ID=>{val},cupcakeIcing_ID=>{val},cupcakeTopping_ID=>{val},cupcakeFilling_ID=>{val},cupcakeQuantity=>{val}]

@param JSONArray $informationAsJSON The order details
*/
function addSaleInformation($informationAsJSON)
{
	$arr = json_decode($informationAsJSON);
	updateSaleToDB($arr);
}

/**
This function takes in a customerID value and returns all the orders associated with that customer as a JSON array.

JSON Format:
[{orderID1}=>[cupcakeFlavor_ID=>{val},cupcakeIcing_ID=>{val},cupcakeTopping_ID=>{val},cupcakeFilling_ID=>{val},cupcakeQuantity=>{val}],{orderID2}=>[...],...]

@param JSONArray $customerID The customer's ID
@return JSONArray The JSONArray containing all of the customer's orders
*/
function getCustomerOrders($customerID)
{
	$arr = getCustomerOrdersFromDB($customerID);
	$jsonarr = json_encode($arr);
	return $jsonarr;
}

/*
This function takes in a username, and will return the internal customer ID associated with that username.

@param string $username The username for the user to be looked up
@return int The ID number of the username
**/
function getCustomerID($username)
{
	$result = getCustomerIDFromDB($username);
	return $result;
}

?>
