<?
	session_start();
	if (!$_SESSION['cID'])
	{
		header("Location: index.php");
	}
	$sql = "SELECT * from Cupcakes WHERE customer_ID = '$_SESSION[cID]'"

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Order</title>
		<meta charset="UTF-8">
		<link rel="stylesheet"  href="css/style.css" type="text/css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			

	</head>
	<body>
		<form id = "orders">
			<div id = 'order'>
					<a>Order</a>
					<div class="orderForm">
						<ul class = "orderList">

						</ul>
					</div>
					<div class = "submitOrder">
						<input type="submit" value="Order" id="submitOrder" /> 
					</div>
			</div>
			<div id = 'fav'>	
					<a>Favorites</a>
					<div>
						<ul></ul>
					</div>	
			</div>
			<div id = 'flavor'>
					<a>Cupcake Flavor</a>
					<div class='CFlavor'>
						<ul>
						</ul>
					</div>
			</div>
			<div id = 'filling'>
					<a>Filling</a>
					<div class="CFilling">
						<ul>
						</ul>
					</div>
			</div>
			<div id = 'icing'>
					<a>Icing</a>
					<div class='CIcing'>
						<ul>
						</ul>
					</div>
			</div>
			<div id = 'topping'>
					<a>Toppings</a>
					<div class='CTopping'>
						<ul>
						</ul>
					</div>
					<div class="toppingClear">
						<input type="button" value="Clear All Toppings" id="toppingClear" /> 
					</div>
			</div>
			
			<div class="reset">
					<input type="button" value="Reset Cupcake" id="reset" action = "" method = "post" name="reset"/> 
			</div>
			<div class="update">	
				<input type="number" value="1" id="amount" /> 
				<input type="button" value="Update Order" id="update" /> 
			</div>
				<input type="button" value="Add To Favorites" id="addtoFav" />
		</form>
	</body>
	<script type="text/javascript" src='js/menu.js'></script>
</html>