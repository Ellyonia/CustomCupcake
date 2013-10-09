<?
/*

	THESE QUERIES ARE FOR RETURNING ALL ELEMENTS IN THE TABLES.

*/
// Return the amount sold of the various Cupcake Toppings (All toppings returned)
$sql = "SELECT purchase_Amount, topping_Name FROM CupcakeTopping";


// Return the amount sold of the various Cupcake Flavors (All flavors returned)
$sql = "SELECT purchase_Amount, flavor_Name FROM CupcakeFlavor";


// Return the amount sold of the various Cupcake Fillings (All fillingss returned)
$sql = "SELECT purchase_Amount, filling_Name FROM CupcakeFilling";


// Return the amount sold of the various Cupcake Icing (All icing returned)
$sql = "SELECT purchase_Amount, icing_Name FROM CupcakeIcing";

/*

	THESE QUERIES ARE FOR RETURNING A SINGLE ELEMENT FROM THE TABLES.

*/
// Return a single topping's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeTopping WHERE topping_Name = " . $_____;


// Return a single flavor's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeFlavor WHERE flavor_Name = " . $_____;


// Return a single fillings's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeFilling WHERE filling_Name = " . $_____;


// Return a single Icing's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeIcing WHERE icing_Name = " . $_____;

/*

	THESE QUERIES ARE FOR UPDATING THE CURRENT PURCHASE AMOUNT FOR EACH PART.

*/
// Updating the purchase amount of a flavor in the Topping Table.
$sql = "UPDATE CupcakeTopping SET purchase_Amount = " . ($____ + 1) . "WHERE topping_name = " . $_____ .;


// Updating the purchase amount of a flavor in the Flavor Table.
$sql = "UPDATE CupcakeFlavor SET purchase_Amount = " . ($____ + 1) . "WHERE flavor_name = " . $_____ .;


// Updating the purchase amount of a filing in the Filling table.
$sql = "UPDATE CupcakeFilling SET purchase_Amount = " . ($____ + 1) . "WHERE filling_name = " . $_____ .;


// Updating the purchase amount of an icing in the Icing table.
$sql = "UPDATE CupcakeIcing SET purchase_Amount = " . ($____ + 1) . "WHERE icing_name = " . $_____ .;


/*

	THIS QUERY IS FOR INSERTING A USERS FAVORITE INTO THE FAVORITES TABLE.

*/
// Flavor, Icing, Topping, Filling, Customer_ID
$sql = "INSERT INTO FAVORITES VALUES" . $_______ . "," . $_______ . "," . $_______ . "," . $_______ . "," . $_______;


/*

	THIS QUERY IS FOR INSERTING A USERS ORDER INTO THE ORDER TABLE.

*/
// Customer_ID, Flavor, Icing, Topping, Filling, Quantity
$sql = "INSERT INTO ORDERS VALUES" . $_______ . "," . $_______ . "," . $_______ . "," . $_______ . "," . $_______ . "," . $______;


/*

	THIS QUERY IS FOR SELECTING A USERS ORDER FROM THE ORDER TABLE.

*/
// Select a single Customers Orders.
$sql = "SELECT * FROM ORDERS WHERE customer_ID = " . $________;

/*

	THIS QUERY IS FOR SELECTING A USERS FAVORITES FROM THE FAVORITES TABLE.

*/
// Select a single Customers Favorite Cupcakes.
$sql = "SELECT * FROM FAVORITES WHERE customer_ID = " . $_________;


?>