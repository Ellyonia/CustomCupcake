<?php

include 'database.php';

/**
Takes in customerID, returns JSON of their favorite designs.

JSON Format:
 elements 1,2,3...n return favorite_IDs
 flavor's key = {favorite_ID}.flavor
 icing's key = {favorite_ID}.icing
 topping's key = {favorite_ID}.topping
 filling's key = {favorite_ID}.filling

 @param int $customerID ID of the customer
 @return JSONArray the customer's favorites
*/
function getUserFavorites($customerID)
{
	$arr = getFavoriteFromDB($customerID);
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
	
}


function getSalesInformation()
{
	
}

?>
