<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Order</title>
		<meta charset="UTF-8">
		<link rel="stylesheet"  href="css/style.css" type="text/css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src='js/menu.js'></script>

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
			<fieldset>
				<legend>Cupcake Flavor</legend>
				<div>
					<ul>
					</ul>
				</div>
			</fieldset>
		</form>
		<form id = 'filling'>
			<fieldset>
				<legend>Filling</legend>
				<div class="test">
					<ul>
					</ul>
				</div>
			</fieldset>
		</form>
		<form id = 'icing'>
			<fieldset>
				<legend>Icing</legend>
				<div>
					<ul>
					</ul>
				</div>
			</fieldset>
		</form>
		<form id = 'topping'>
			<fieldset>
				<legend>Toppings</legend>
				<div>
					<ul>
					</ul>
				</div>
				<div class="toppingClear">
					<input type="submit" value="Clear All Toppings" id="toppingClear" /> 
				</div>
			</fieldset>
		</form>
		
		<div class="reset">
				<input type="submit" value="Reset Cupcake" id="reset" /> 
		</div>
		<form class="update">	
			<input type="number" value="1" id="amount" /> 
			<input type="submit" value="Update Order" id="update" /> 
		</form>
	</body>
</html>