$(document).ready( function() {
	var mCurrentIndex = 0;
var request = new XMLHttpRequest();
var mImages = new Array();
var json;
var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/menu.json';

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
				var listitem = document.createElement("li");
				var img = document.createElement("img");
				img.setAttribute("src", "artwork/" + jsonData.menu.cakes[i].img_url);
				img.setAttribute("value", jsonData.menu.cakes[i].flavor);
				//document.body.appendChild(img); //adds the image to the document
				listitem.appendChild(img);
				myCake.append(listitem);
			
		}


		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);

		var myCake = $("#filling div ul");

		for (var i = 0, len = jsonData.menu.fillings.length; i < len; i++){
				var listitem = document.createElement("li");
				var container = document.createElement("div");
				var par = document.createElement("p");
				var circle = document.createElement("div");
				par.innerHTML = jsonData.menu.fillings[i].flavor;
				circle.setAttribute("class", "circle");
				circle.setAttribute("value", jsonData.menu.fillings[i].flavor);
				var myId = "c";
				myId = myId + jsonData.menu.fillings[i].flavor;
				myId = myId.replace(/\s+/g,"");
				circle.setAttribute("id", myId);
				container.appendChild(circle);
				container.appendChild(par);
				listitem.appendChild(container);
				myCake.append(listitem);
				$('#' + myId).css('background-color', jsonData.menu.fillings[i].rgb);
				//document.getElementById(myId).style.bgcolor=jsonData.menu.fillings[i].rgb;
				
			
		}



		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);
		var myCake = $("#icing div ul");
		for (var i = 0, len = jsonData.menu.frosting.length; i < len; i++){
				var listitem = document.createElement("li");
				var img = document.createElement("img");
				img.setAttribute("src", "artwork/" + jsonData.menu.frosting[i].img_url);
				img.setAttribute("value", jsonData.menu.frosting[i].flavor);
				//document.body.appendChild(img); //adds the image to the document
				listitem.appendChild(img);
				myCake.append(listitem);
			
		}

		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);
		var toppings = $("#topping div ul");
		for (var i = 0, len = jsonData.menu.Toppings.length; i < len; i++){
				var listitem = document.createElement("li");
				var divitem = document.createElement("div");
				var pitem = document.createElement("p");
				var top = jsonData.menu.Toppings[i]
				var checkbox = document.createElement("input");
				checkbox.type = "checkbox";
				checkbox.value = top;
				checkbox.text = top;
				pitem.innerHTML = top;
				listitem.appendChild(divitem);
				divitem.appendChild(checkbox);
				divitem.appendChild(pitem);
				toppings.append(listitem);
			
		}
	}

}

});


function onMouseDown(e){

    var img = e.target;

    e.target.lastX = e.clientX;
    e.target.lastY = e.clientY;


    if(img.complete)
    {
    	$('.selected').removeClass('selected');
    		
    	img.className = "selected";
    	changeImage(img);

    }
    else
    {
    	return 0;
    }
}

window.addEventListener('load', function() {
	console.log('window loaded');
}, false);


var li = $('li');
$( "li.flavor" ).find( allListElements );

for(var i = 0, len = flavors.length; i < len; i++){

	flavors[i].addEventListener('mousedown', onMouseDown, false);
}