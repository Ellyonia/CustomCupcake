
function tChart() {
    var request = new XMLHttpRequest();
    var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
    request.open("GET",path, true);

    request.onreadystatechange = function(e) {

    	if(request.readyState === 4) {

            
        	var jsonData = JSON.parse(request.responseText);
        	console.log(jsonData);
        	var data = jsonData.salesToppings;
            var ctx = document.getElementById("toppingChart").getContext("2d");

            //The options we are going to pass to the chart
            options = {
                barDatasetSpacing : 15,
                barValueSpacing: 10,
                barStrokeWidth: 15
            };

            // options2 = {

            // };

            //Create the chart
            new Chart(ctx).Bar(data, options);
               
        }
    }
    request.send();
}

function flavChart() {
    var request = new XMLHttpRequest();
    var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
    request.open("GET",path, true);

    request.onreadystatechange = function(e) {

        if(request.readyState === 4) {
     
            var jsonData = JSON.parse(request.responseText);
            console.log(jsonData);
            var data = jsonData.salesFlavor;
            var ctx = document.getElementById("flavorChart").getContext("2d");

            options = {
                animation : false
            };

            new Chart(ctx).Pie(data, options);

        }
    }
    request.send();
}

function fillChart() {
    var request = new XMLHttpRequest();
    var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
    request.open("GET",path, true);

    request.onreadystatechange = function(e) {

        if(request.readyState === 4) {
     
            var jsonData = JSON.parse(request.responseText);
            console.log(jsonData);
            var data = jsonData.salesFilling;
            var ctx = document.getElementById("fillingChart").getContext("2d");

            new Chart(ctx).Pie(data);

        }
    }
    request.send();
}

function iChart() {
    var request = new XMLHttpRequest();
    var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
    request.open("GET",path, true);

    request.onreadystatechange = function(e) {

        if(request.readyState === 4) {
     
            var jsonData = JSON.parse(request.responseText);
            console.log(jsonData);
            var data = jsonData.salesIcing;
            var ctx = document.getElementById("icingChart").getContext("2d");

            
            new Chart(ctx).Pie(data, options);

        }
    }
    request.send();
}

$(document).ready(function() {
    tChart();
    iChart();
    fillChart();
    flavChart();
});
