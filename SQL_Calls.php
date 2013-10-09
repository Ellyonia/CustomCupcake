<?
// Return the amount sold of the various Cupcake Toppings (All toppings returned)
$sql = "SELECT purchase_Amount FROM CupcakeTopping";


// Return a single topping's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeTopping WHERE topping_Name = ' '";


// Return the amount sold of the various Cupcake Flavors (All flavors returned)
$sql = "SELECT purchase_Amount FROM CupcakeFlavor";


// Return a single flavor's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeFlavor WHERE flavor_Name = ' '";


// Return the amount sold of the various Cupcake Fillings (All fillingss returned)
$sql = "SELECT purchase_Amount FROM CupcakeFilling";


// Return a single fillings's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeFilling WHERE filling_Name = ' '";


// Return the amount sold of the various Cupcake Icing (All icing returned)
$sql = "SELECT purchase_Amount FROM CupcakeIcing";


// Return a single Icing's amount sold.
$sql = "SELECT purchase_Amount FROM CupcakeIcing WHERE icing_Name = ' '";

?>