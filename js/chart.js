

// // //Get context with jQuery - using jQuery's .get() method.
// // var ctx = $("#myChart").get(0).getContext("2d");
// // //This will get the first returned node in the jQuery collection.
// // var myNewChart = new Chart(ctx);

// // new Chart(ctx).PolarArea(data,options);

var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
request.open("GET",path, true);
request.send();

request.onreadystatechange = function(e) {



	if(request.readyState === 4) {
// 		//Get the context of the canvas element we want to select
// 		var ctx = document.getElementById("myChart").getContext("2d");
// 		var myNewChart = new Chart(ctx).PolarArea(data);
// 		//Get context with jQuery - using jQuery's .get() method.
// var ctx = $("#myChart").get(0).getContext("2d");
// //This will get the first returned node in the jQuery collection.
// var myNewChart = new Chart(ctx);
// new Chart(ctx).PolarArea(data,options);
var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);
		var data = jsonData.sales.cakes;
//Get the context of the canvas element we want to select
            var ctx = document.getElementById("myChart").getContext("2d");
 
            //Create the data object to pass to the chart

            
            // var data = {
            //     labels : ["January","February","March","April","May","June","July"],
            //     datasets : [
            //                 {
            //                     fillColor : "rgba(220,220,220,0.5)",
            //                     strokeColor : "rgba(220,220,220,1)",
            //                     data : [65,59,90,81,56,55,40]
            //                 },
            //                 {
            //                     fillColor : "rgba(151,187,205,0.5)",
            //                     strokeColor : "rgba(151,187,205,1)",
            //                     data : [28,48,40,19,96,27,100]
            //                 }
            //                ]
            //           };
 
            //The options we are going to pass to the chart
            options = {
                barDatasetSpacing : 15,
                barValueSpacing: 10
            };
 
            //Create the chart
            new Chart(ctx).Bar(data, options);
        }

	}
// 		new Chart(ctx).PolarArea(data,{
// 	//Boolean - Whether we should show a stroke on each segment
// 	segmentShowStroke : true,
	
// 	//String - The colour of each segment stroke
// 	segmentStrokeColor : "#fff",
	
// 	//Number - The width of each segment stroke
// 	segmentStrokeWidth : 2,
	
// 	//Boolean - Whether we should animate the chart	
// 	animation : true,
	
// 	//Number - Amount of animation steps
// 	animationSteps : 100,
	
// 	//String - Animation easing effect
// 	animationEasing : "easeOutBounce",
	
// 	//Boolean - Whether we animate the rotation of the Pie
// 	animateRotate : true,

// 	//Boolean - Whether we animate scaling the Pie from the centre
// 	animateScale : false,
	
// 	//Function - Will fire on animation completion.
// 	onAnimationComplete : null
// });
// 	}

// }

// $(document).ready(function() {
// 	// body...


// // function createChart()
//         {
//             //Get the context of the canvas element we want to select
//             var ctx = document.getElementById("myChart").getContext("2d");
 
//             //Create the data object to pass to the chart

//             var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/sales.json';
//             var data = {
//                 labels : ["January","February","March","April","May","June","July"],
//                 datasets : [
//                             {
//                                 fillColor : "rgba(220,220,220,0.5)",
//                                 strokeColor : "rgba(220,220,220,1)",
//                                 data : [65,59,90,81,56,55,40]
//                             },
//                             {
//                                 fillColor : "rgba(151,187,205,0.5)",
//                                 strokeColor : "rgba(151,187,205,1)",
//                                 data : [28,48,40,19,96,27,100]
//                             }
//                            ]
//                       };
 
//             //The options we are going to pass to the chart
//             options = {
//                 barDatasetSpacing : 15,
//                 barValueSpacing: 10
//             };
 
//             //Create the chart
//             new Chart(ctx).Bar(data, options);
//         }
// });