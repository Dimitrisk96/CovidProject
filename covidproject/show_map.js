
$(document).ready(function(){
	

		 
		 if (navigator.geolocation) 
	
	{
		navigator.geolocation.getCurrentPosition(init_map);

	} 
	
	else 
	
	{
       alert("Geolocation is not enabled");
	}

			function init_map(current) 
			
			{
				var current_lat = current.coords.latitude;
				
				var current_lng = current.coords.longitude;
				
				
				var mapOptions = {
				center: [current_lat, current_lng],
				zoom: 10
         }
		 
		 	 
         var map = new L.map('map', mapOptions);
         
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         map.addLayer(layer);
		 
		 //prosthiki marker me sintetagmenes tin trexousa topothesia tou xristi
		 
		 var marker = L.marker([current_lat, current_lng]).addTo(map);
		 
		 marker.bindPopup("<b>You are here!</b>").openPopup();


				
				
  
            }
         
});

