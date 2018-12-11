<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mapa</title>
</head> -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		#map{
			height:600px;
			width:80%;
			margin-left:10%;
		}

		h1{
			text-align: center;
		}
	</style>
@extends('layouts.app')

@section('content')
<br><br><br>
		
	<h1>Mapa de Igarassu</h1>
	
	<div id="map"></div>
	
	<script>
		function initMap(){
			var options={
				zoom:14,
				center:{lat:-7.8292,lng:-34.9016}
			}

			var map=new google.maps.Map(document.getElementById('map'), options);
			
			var marker = new google.maps.Marker	({
				position:{lat:-8.0586, lng:-34.9498},
				map:map,
				icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
			});

		}

	</script>
	
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUMml4hTUsG8muGTaxiQyRCYAplooyEJw&callback=initMap">
	 	
	 </script>
<!-- how to make a marker in google maps with ajax in laravel -->


@endsection
</html>
