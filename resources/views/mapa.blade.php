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
      var markers = [];
      var marker;
      var contentString;
      var infowindow;
      var markerImage = 'img/cadeirante.png'; 

			 <?php foreach ($locals as $local): ?>
			 		 contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h4 id="firstHeading" class="firstHeading">Acessibilidades do local</h4>'+
            '<div id="bodyContent">'+
            '<h5>{{$local->acessibilidade}}</h5>'+
            '</div>'+
            '</div>';

        infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

			
      marker = new google.maps.Marker	({
				position: { lat: {{$local->latitude}}, lng:{{$local->longitude}} },
				map:map,
				icon:markerImage
			});

      google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
      return function() {
        infowindow.setContent(content);
        infowindow.open(map,marker);
       };
       })(marker,contentString,infowindow));  
      

       		

			<?php endforeach ?> 
		}

	</script>
	
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUMml4hTUsG8muGTaxiQyRCYAplooyEJw&callback=initMap">
	 	
	 </script>
<!-- how to make a marker in google maps with ajax in laravel -->

@endsection


