<!-- <!DOCTYPE html>
<html lang="en">
	<head>
		<title>Analytics</title>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet"  href="css/style.css" type="text/css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src='js/chart.js'></script>
			<script src="js/Chart.js-master/Chart.js"></script>

	</head>
	<body>
		<canvas id="myChart" width="700" height="400"></canvas>
		<header>stuff</header>
	</body>
</html> -->

<!DOCTYPE html>
<html>
    <head>
        <title>Chart JS Demo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/Chart.js-master/Chart.min.js"></script>
        <script>
        function createChart()
        {
            //Get the context of the canvas element we want to select
            var ctx = document.getElementById("myChart").getContext("2d");
 
            //Create the data object to pass to the chart
            var data = {
                labels : ["January","February","March","April","May","June","July"],
                datasets : [
                            {
                                fillColor : "rgba(220,220,220,0.5)",
                                strokeColor : "rgba(220,220,220,1)",
                                data : [65,59,90,81,56,55,40]
                            },
                            {
                                fillColor : "rgba(151,187,205,0.5)",
                                strokeColor : "rgba(151,187,205,1)",
                                data : [28,48,40,19,96,27,100]
                            }
                           ]
                      };
 
            //The options we are going to pass to the chart
            options = {
                barDatasetSpacing : 15,
                barValueSpacing: 10
            };
 
            //Create the chart
            new Chart(ctx).Bar(data, options);
        }
        </script>
    </head>
    <body onload="createChart();">
        <canvas id="myChart" width="700" height="400"></canvas>
    </body>
</html>