<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Analytics</title>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet"  href="css/style.css" type="text/css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src='js/chart.js'></script>
            <script src='js/Chart.js-master/legend.js'></script>
			<script src="js/Chart.js-master/Chart.js"></script>

	</head>
	<body>
        <div id="charts">
            <header>Popular Flavors</header>
		    <canvas id="flavorChart" width="700" height="400"></canvas>
            <div id ="pieLegend"></div>
            <header>Popular Fillings</header>
            <canvas id="fillingChart" width="700" height="400"></canvas>
            <div id ="pieLegend"></div>
            <header>Popular Icings</header>
            <canvas id="icingChart" width="700" height="400"></canvas>
            <div id ="pieLegend"></div>
            <header>Popular Toppings</header>
            <canvas id="toppingChart" width="700" height="400"></canvas>
            <div id ="pieLegend"></div>
        </div>
	</body>
</html>