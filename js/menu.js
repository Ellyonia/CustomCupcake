
var request = new XMLHttpRequest();

		var json = {"flavor" : "Banana",
					"frosting" : "chocolate_frosting",
					"filling" : "Blueberry",
					"toppings" : 
					{
						"1" : "Sprinkles", "2" : "Craisins"
					}};




	$(document).ready( function() {

		var request = new XMLHttpRequest();
		var mImages = new Array();
		var mCurrentIndex = 0;

	
		var path = 'http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/data/menu.json';

		request.open("GET",path, true);
		request.send();

			// var favs = document.getElementById("fav");

			// //getUserID()

		 //    makeFavList(favs, 'getFavorites.php');

		 //   // var uID = 



		 //     function makeFavList(input ,url) {
		 //        favs.innerHTML = "";
		        
		 //        var request = new XMLHttpRequest();
		 //        var mImages = new Array();
		 //        var json;
		 //        var ID;
		 //        var curr = 0;

		 //        request.open("GET", url, true);
		 //        request.send();

		 //        request.onreadystatechange = function(e) {

		 //            if(request.readyState === 4){
		 //                var jData = JSON.parse(request.responseText);
		                
		                
		 //                ID = jData.favorites;
		                
		 //                var numFavs = ID.length;
		                

		 //                for (var i = 0, len = numFavs; i < len; i++){
			//                 var newLi = document.createElement("li");
			//                 var val = document.createElement("img");


			//                 val.setAttribute("src", "artwork/" + ID[i].Img_url);
			//                 val.setAttribute("id", "fav"+i);
			//                 val.setAttribute("name", ID[i].FavoriteID);
			//                 var p = document.createElement('alt'),
			                

			//                 var text = document.createTextNode(ID[i].Name);
			//                 p.appendChild(text);
			//                 newLi.appendChild(val);
			//                 newLi.appendChild(p);
			//                 newLi.addEventListener("click", select, false);
			                
			//                 input.appendChild(newLi);
		 //                }
		 //            }
		 //        }

		 //    }


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

	});



	function addSelected(e){
		$(this).addClass('selected');
	};

	window.addEventListener('load', function(e) {
		console.log('window loaded');
	}, false);
/*
	$('#reset').click(function() {

			console.log("HI");
			
			var url = "http://ec2-54-200-98-78.us-west-2.compute.amazonaws.com/CustomCupcake/addUserFavorite.php";
			var pass = "jsonArr=" + JSON.stringify(json);
			console.log(pass);
			//alert("FUCK THIS SHIT");
			//request.onreadystatechange = function(){
				console.log("FUCK");
				
			
				console.log("NO MORE");
		    	request.open("POST", url, false);
				request.send(pass);
				request.onreadystatechange = function(){
					
				if(request.readyState === 4){
					
					var string = request.responseText;
					alert("FUCK THIS SHIT");
					//alert(request.responseText);
					console.log(string);


			}
			else{
				alert(request.status);
			}
		}
		});
*/

	$('#reset').click(function() {

			console.log("HI");
			
			var url = "addUserFavorite.php";
			var pass = "jsonArr=" + JSON.stringify(json);
			//console.log(pass);

			request.onreadystatechange = function(e){
				
			if(request.readyState === 4)
			{
		  	myAjax = new Ajax.Request(url, {
        	method: 'post',
        	pass: "jsonArr=" + JSON.stringify(json);,
        	contentType: 'application/x-www-form-urlencoded',
        	onComplete: function(e){
            if (200 == e.status) {
                result = e.responseText;
                console.log(result);
            }
        }
    });
			}
		}
		});