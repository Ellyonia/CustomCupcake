$(document).ready( function() {
	var mCurrentIndex = 0;
var request = new XMLHttpRequest();
var mImages = new Array();
var json;
var path = '/~rcstewart/3345/test/customcupcakes/data/menu.json';

/*added*/
request.open("GET",path, true);
request.send();

request.onreadystatechange = function(e){
	if(request.readyState === 4)
	{
		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);

		var myCake = $("#flavor div");

		for (var i = 0, len = jsonData.menu.cakes.length; i < len; i++){
				var img = document.createElement("img");
				img.setAttribute("src", "artwork/" + jsonData.menu.cakes[i].img_url);
				//document.body.appendChild(img); //adds the image to the document
				myCake.append(img);
			
		}
		// var img = document.createElement("img");
		// img.setAttribute("src", jsonData.menu.cakes[0].img_url);
		// document.body.appendChild(img);
	}

}

});

window.addEventListener('load', function() {
	console.log('window loaded');
}, false);