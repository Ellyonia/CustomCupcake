<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Order</title>
		<meta charset="UTF-8">
		<link rel="stylesheet"  href="css/style.css" type="text/css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			

	</head>
	<body>
		<form id = 'order'>
			<fieldset>
				<legend>Order</legend>
				<div>
					<ul>

					</ul>
				</div>
				<div class = "submitOrder">
					<input type="submit" value="Order" id="submitOrder" /> 
				</div>
			</fieldset>
		</form>
		<form id = 'fav'>
			<fieldset>
				<legend>Favorites</legend>
				<div>
					<ul></ul>
				</div>
			</fieldset>
		</form>
		<form id = 'flavor'>
				<a>Cupcake Flavor</a>
				<div class='CFlavor'>
					<ul>
					</ul>
				</div>
		</form>
		<form id = 'filling'>
				<a>Filling</a>
				<div class="CFilling">
					<ul>
					</ul>
				</div>
		</form>
		<form id = 'icing'>
				<a>Icing</a>
				<div class='CIcing'>
					<ul>
					</ul>
				</div>
		</form>
		<form id = 'topping'>
				<a>Toppings</a>
				<div class='CTopping'>
					<ul>
					</ul>
				</div>
				<div class="toppingClear">
					<input type="button" value="Clear All Toppings" id="toppingClear" /> 
				</div>
		</form>
		
		<div class="reset">
				<input type="submit" value="Reset Cupcake" id="reset" action = "" method = "post" name="reset"/> 
		</div>
		<form class="update">	
			<input type="number" value="1" id="amount" /> 
			<input type="submit" value="Update Order" id="update" /> 
		</form>
			<input type="submit" value="Add To Favorites" id="addtoFav" />

	</body>
	<script type="text/javascript" src='js/menu.js'></script>
</html>