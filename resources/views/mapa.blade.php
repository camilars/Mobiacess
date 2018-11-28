
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" content="width=device-width,initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mapa</title>
	<style>
		#map{
			height:500px;
			width:50%;
			margin-left:25%;
		}

		h1{
			text-align: center;
		}
	</style>
</head>
@extends('layouts.app')

@section('content')
<body>
		
	<h1>Mapa de igarassu</h1>	
	
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
	
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUMml4hTUsG8muGTaxiQyRCYAplooyEJw&callback=initMap"></script>


</body>
@endsection
</html>
