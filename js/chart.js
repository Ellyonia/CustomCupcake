
function TChart() {
    var request = new XMLHttpRequest();
    var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
    request.open("GET",path, true);
    request.send();

    request.onreadystatechange = function(e) {

    	if(request.readyState === 4) {

            
        	var jsonData = JSON.parse(request.responseText);
        	console.log(jsonData);
        	var data = jsonData.salesToppings;
            var ctx = document.getElementById("myChart").getContext("2d");

            //The options we are going to pass to the chart
            options1 = {
                barDatasetSpacing : 15,
                barValueSpacing: 10,
                barStrokeWidth: 15
            };

            // options2 = {

            // };

            //Create the chart
            new Chart(ctx).Bar(data, options1);
               
        }
    }
}

function FChart() {
    var request = new XMLHttpRequest();
    var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
    request.open("GET",path, true);
    request.send();

    request.onreadystatechange = function(e) {

        if(request.readyState === 4) {

            
            var jsonData = JSON.parse(request.responseText);
            console.log(jsonData);
            var data = jsonData.salesFlavor;
            var ctx = document.getElementById("myChart").getContext("2d");


            new Chart(ctx).Pie(data);

        }
    }

}

$(document).ready(function() {

    TChart();
    FChart();
});
