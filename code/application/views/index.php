<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Weather Forecast</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('form').submit(function() {

				// Get the value of the input and add to the url together with the api key
				var city = $('#city').val();
				var key = "c5a2e81db901a4351d0a9f44756603ab";
				var url = "http://api.openweathermap.org/data/2.5/weather?q="+ city +"&appid=" + key;
				
				console.log(url);
				$.get(url, function(res) {

					// console.log(res);
					// console.log(res.name + ", " + res.sys.country);
					// console.log("Temp: "+(res.main.temp-273.15).toFixed(2)+"°C");
					// console.log("Feels like: "+(res.main.feels_like-273.15).toFixed(2)+"°C");
					// console.log("Minimum Temp: "+(res.main.temp_min-273.15).toFixed(2)+"°C");
					// console.log("Maximum Temp: "+(res.main.temp_max-273.15).toFixed(2)+"°C");
					// console.log("Humidity: "+res.main.humidity);

					// Get the details from the api and put inside html
					var html_str = "";
					html_str += "<h4 class='desc text-center'>" + res.name + ", " + res.sys.country + "</h4>";
					html_str += "<p class='desc w-50 mx-auto'>Temp: "+(res.main.temp-273.15).toFixed(1)+"°C</p>";
					html_str += "<p class='w-50 desc mx-auto'>Feels like: "+(res.main.feels_like-273.15).toFixed(1)+"°C</p>";
					html_str += "<p class='w-50 desc mx-auto'>Minimum Temp: "+(res.main.temp_min-273.15).toFixed(1)+"°C</p>";
					html_str += "<p class='w-50 desc mx-auto'>Maximum Temp: "+(res.main.temp_max-273.15).toFixed(1)+"°C</p>";
					html_str += "<p class='w-50 desc mx-auto'>Humidity: "+res.main.humidity+"</p>";
					
					$('#weather').html(html_str);
				}, 'json');
				return false;
			});
		});
	</script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap');
		.co-bg{
			max-width: 50em;
			min-height: 30em;
			background: rgba( 255, 255, 255, 0.15 );
			box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
			backdrop-filter: blur( 1.5px );
			-webkit-backdrop-filter: blur( 1.5px );
			border-radius: 10px;
			border: 1px solid rgba( 255, 255, 255, 0.18 );
		}
		.desc{
			font-family: 'Fira Sans', sans-serif;
		}
	</style>
</head>
<body>
	<div class="container co-bg mt-4">
		<h1 class="display-6 text-center p-4">Weather Now</h1>
		<form class="row g-2 max-auto d-flex justify-content-center">
			<div class="col-auto">
				<label for="city" class="visually-hidden">City</label>
				<input type="search" class="form-control" name="city" id="city" placeholder="Enter a city">
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-outline-secondary mb-3">Search</button>
			</div>
		</form>
		<div id="weather" class="container border border-warning w-50 mt-3">
		</div>
	</div>
	<footer class="mx-auto mt-5 text-black-50 text-center">
    	<p>&copy; Copyright 2021 - Patrick Peralta </p>
  	</footer>
</body>
</html>