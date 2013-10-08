



$(document).ready( function() {
	var mCurrentIndex = 0;
var request = new XMLHttpRequest();
var mImages = new Array();
var json;
var path = '../data/menu.json';

/*added*/
request.open("GET",path, true);
request.send();

request.onreadystatechange = function(e){
	if(request.readyState === 4)
	{
		var jsonData = JSON.parse(request.responseText);
		console.log(jsonData);

		for (var i = 0, len = jsonData.menu.length; i < len; i++){
			for(var j =0, len2 = jsonData.menu[i].length; j < len2; j++){
				var img = document.createElement("img");
				img.setAttribute("src", jsonData.menu[i][j].imgPath);
				document.body.appendChild(img); //adds the image to the document
			}
		}
	}

}
	
});

window.addEventListener('load', function() {
	console.log('window loaded');
}, false);