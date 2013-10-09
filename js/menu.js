$(document).ready( function() {
	var mCurrentIndex = 0;
var request = new XMLHttpRequest();
var mImages = new Array();
var json;
var path = '/~rtanner/3345/a6/data/menu.json';

/*added*/
request.open("GET",path, true);
request.send();

request.onreadystatechange = function(e){
	if(request.readyState === 4)
	{
		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);

		var myCake = $("#flavor div ul");

		for (var i = 0, len = jsonData.menu.cakes.length; i < len; i++){
				var img = document.createElement("img");
				img.setAttribute("src", "artwork/" + jsonData.menu.cakes[i].img_url);
				img.setAttribute("value", jsonData.menu.cakes[i].flavor);
				//document.body.appendChild(img); //adds the image to the document
				myCake.append('<li>');
				myCake.append(img);
				myCake.append('</li>');
			
		}
		// var img = document.createElement("img");
		// img.setAttribute("src", jsonData.menu.cakes[0].img_url);
		// document.body.appendChild(img);


		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);

		var myCake = $("#filling div ul");

		for (var i = 0, len = jsonData.menu.fillings.length; i < len; i++){
				var img = document.createElement("img");
				//img.setAttribute("src", "artwork/" + jsonData.menu.fillings[i].img_url);
				img.setAttribute("value", jsonData.menu.cakes[i].flavor);
				//document.body.appendChild(img); //adds the image to the document
				myCake.append('<li>');
				myCake.append(img);
				myCake.append('</li>');
			
		}



		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);
		var myCake = $("#icing div ul");
		for (var i = 0, len = jsonData.menu.frosting.length; i < len; i++){
				var img = document.createElement("img");
				img.setAttribute("src", "artwork/" + jsonData.menu.frosting[i].img_url);
				img.setAttribute("value", jsonData.menu.frosting[i].flavor);
				//document.body.appendChild(img); //adds the image to the document
				myCake.append('<li>');
				myCake.append(img);
				myCake.append('</li>');
			
		}

		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);
		var toppings = $("#topping div ul");
		for (var i = 0, len = jsonData.menu.Toppings.length; i < len; i++){
				var top = jsonData.menu.Toppings[i]
				console.log(jsonData.menu.Toppings[i]);
				var checkbox = document.createElement("input");
				checkbox.type = "checkbox";
				checkbox.value = top;
				checkbox.text = top;
				toppings.append('<li>');
				toppings.append('<div>');
				toppings.append(checkbox);
				
				toppings.append(top);
				toppings.append('</div>');
				toppings.append('</li>');
			
		}
	}

}

});

window.addEventListener('load', function() {
	console.log('window loaded');
}, false);