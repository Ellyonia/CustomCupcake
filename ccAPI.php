<?php

include 'database.php';

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
 topping => {topping value}
 filling => {filling value}
 customerID => {customerID value}

@param JSONArray The favorite's settings to be stored
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

?>
