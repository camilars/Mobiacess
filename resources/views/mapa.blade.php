
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" content="width=device-width,initial-scale=1.0">
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
		};

	</script>
	
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDR5Op0VITqbeE5KBDuatLCXRgt2Vqk510&callback=initMap"></script>


</body>
@endsection
</html>
