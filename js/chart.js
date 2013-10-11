

// //Get context with jQuery - using jQuery's .get() method.
// var ctx = $("#myChart").get(0).getContext("2d");
// //This will get the first returned node in the jQuery collection.
// var myNewChart = new Chart(ctx);

// new Chart(ctx).PolarArea(data,options);

var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
request.open("GET",path, true);
request.send();

request.onreadystatechange = function(e) {



	if(request.readyState === 4) {
		//Get the context of the canvas element we want to select
		var ctx = document.getElementById("myChart").getContext("2d");
		var myNewChart = new Chart(ctx).PolarArea(data);
		//Get context with jQuery - using jQuery's .get() method.
var ctx = $("#myChart").get(0).getContext("2d");
//This will get the first returned node in the jQuery collection.
var myNewChart = new Chart(ctx);
new Chart(ctx).PolarArea(data,options);
		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);
		var data = jsonData.menu.sales;
		new Chart(ctx).PolarArea(data,{
	//Boolean - Whether we should show a stroke on each segment
	segmentShowStroke : true,
	
	//String - The colour of each segment stroke
	segmentStrokeColor : "#fff",
	
	//Number - The width of each segment stroke
	segmentStrokeWidth : 2,
	
	//Boolean - Whether we should animate the chart	
	animation : true,
	
	//Number - Amount of animation steps
	animationSteps : 100,
	
	//String - Animation easing effect
	animationEasing : "easeOutBounce",
	
	//Boolean - Whether we animate the rotation of the Pie
	animateRotate : true,

	//Boolean - Whether we animate scaling the Pie from the centre
	animateScale : false,
	
	//Function - Will fire on animation completion.
	onAnimationComplete : null
});
	}

}

