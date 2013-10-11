function init() {

	var request = new XMLHttpRequest();
	var mImages = new Array();
	var mCurrentIndex = 0;


	var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/menu.json';

	var json;

	var json = {"flavor" : "Banana",
		"frosting" : "chocolate_frosting",
		"filling" : "Blueberry",
		"toppings" : 
		{
			"1" : "Sprinkles", "2" : "Craisins"
		}};

		function addFavorite() {
			var url = "../CustomCupcake/addUserFavorite.php";
			var pass = "jsonArr=" + JSON.stringify(json);
		    request.open("POST", url, true);
		    //if(request.readyState === 4)
				request.send(pass);
		}


	//$(document).ready( function() {

		request.open("GET",path, true);
		request.send();



		$('#reset').click(addFavorite());

		request.onreadystatechange = function(e){
			if(request.readyState === 4)
			{
				var jsonData = JSON.parse(request.responseText);
				console.log(jsonData);

				var myCake = $("#flavor div ul");

				for (var i = 0, len = jsonData.menu.cakes.length; i < len; i++){
						var listitem = document.createElement("li");
						var div = document.createElement("div");
						var flavorflav = document.createElement("a");
						var img = document.createElement("img");
						img.setAttribute("src", "artwork/" + jsonData.menu.cakes[i].img_url);
						img.setAttribute("value", jsonData.menu.cakes[i].flavor);
						listitem.setAttribute("value", jsonData.menu.cakes[i].flavor);
						flavorflav.innerHTML = jsonData.menu.cakes[i].flavor;
						//document.body.appendChild(img); //adds the image to the document
						div.appendChild(img);
						div.appendChild(flavorflav);
						$(div).addClass("member");
						listitem.onclick = function(){
							$("#flavor .selected").removeClass("selected");
							$(this).addClass("selected");
						};

						listitem.appendChild(div);
						myCake.append(listitem);
					
				}


				var jsonData = JSON.parse(request.responseText);
				console.log(jsonData);

				var myCake = $("#filling div ul");

				for (var i = 0, len = jsonData.menu.fillings.length; i < len; i++){
						var listitem = document.createElement("li");
						var div = document.createElement("div");
						var par = document.createElement("p");
						var circle = document.createElement("div");
						par.innerHTML = jsonData.menu.fillings[i].flavor;
						circle.setAttribute("class", "circle");
						circle.setAttribute("value", jsonData.menu.fillings[i].flavor);
						listitem.setAttribute("value", jsonData.menu.fillings[i].flavor);
						var myId = "c";
						myId = myId + jsonData.menu.fillings[i].flavor;
						myId = myId.replace(/\s+/g,"");
						circle.setAttribute("id", myId);
						div.appendChild(circle);
						div.appendChild(par);
						$(div).addClass("member");
						listitem.appendChild(div);
						listitem.onclick = function(){
							$("#filling .selected").removeClass("selected");
							$(this).addClass("selected");
						};
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
						var aitem = document.createElement("a");
						img.setAttribute("src", "artwork/" + jsonData.menu.frosting[i].img_url);
						img.setAttribute("value", jsonData.menu.frosting[i].flavor);
						listitem.setAttribute("value", jsonData.menu.frosting[i].flavor);
						aitem.innerHTML = jsonData.menu.frosting[i].flavor;
						//document.body.appendChild(img); //adds the image to the document
						listitem.appendChild(img);
						listitem.appendChild(aitem);
						listitem.onclick = function(){
							$("#icing .selected").removeClass("selected");
							$(this).addClass("selected");
							console.log("blajb");
						}
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

			$('#test li').on("click", function() {
			    $('#test li').css("background-color", "red");
			});

	//});



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

	function addSelected(e){
		$(this).addClass('selected');
	};

	window.addEventListener('load', function(e) {
		console.log('window loaded');
	}, false);

	
}