<?php

include 'database.php';

ini_set('display_errors','On');
error_reporting(E_ALL);

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
function getUserFavorites()
{
	$arr = getFavoritesFromDB($_SESSION['ID']);
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
*/
function addUserFavorite()
{
	$arr = json_decode($_POST['jsonArr']);
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
*/
function addSaleInformation()
{
	$arr = json_decode($_POST['jsonArr']);
	updateSaleToDB($arr);
}

?>
