$(document).ready(function(){
	
	
	var greenmarker = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});

var orangemarker = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});

var redmarker = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});
	
	
	
	

		 
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
				zoom: 15
				
				
         }
		 
		 document.getElementById('upd_map').style.display = 'none';
		 
		 var map = new L.map('map', mapOptions);
         
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         map.addLayer(layer);
		 
		 //prosthiki marker me sintetagmenes tin trexousa topothesia tou xristi
		 
		 var marker = L.marker([current_lat, current_lng]).addTo(map);
		 
		 marker.bindPopup("<b>You are here!</b>").openPopup();

		 
		 	 

             
			 
			 $.ajax({
                url:'get_points.php',
			
				type:'post',
				
			 data: {current_lat: current_lat, current_lng: current_lng},


                
                success:function(response){
					
					
					//convert to json array se javascript
					 var points = JSON.parse(response);
					 

					 
                     //kanw loop sta points ta opoia exoun epistrafei
                    for(var i=0;i<points.length;i++)

					{

                       //lat
                       var x = points[i][0];
					   
					   //lng
					   var y = points[i][1];
					   
					   //episkepsimotita tin trexousa ora
					   var val = points[i][2];
					   
					   console.log(val);
					   
					   //episkepsimotita gia tin epomeni ora
					   var val1 = points[i][3];

					   //episkepsimotita gia tin methepomeni ora
					   var val2 = points[i][4];
					   
					   var apostasi = points[i][5];
					   
					   var id = points[i][6];
					   
					   var avg_estimate = points[i][7];


					   
					   //ftiaxnw ton marker me tis antistoixes sintetagmenes
					   
						if(val<=32)

					  {
						  
						if(apostasi> 3500)
							
							{

                        var marker = L.marker([x, y], {icon: greenmarker}).addTo(map);
						
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>" + "Average Estimate:" +avg_estimate);
                         
							}
							
							
							else
								
							
							{
								
								var link = "<a href='check_in.php?id="+id+ "'>Check IN</a>";
								
								 var marker = L.marker([x, y], {icon: greenmarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+link  + "<br>"+ "Average Estimate:" +avg_estimate);
                         
								
								
							}

                        

                      }
                       
					   
						else if(val >33 &&  val <=65)
						  
						  {
							  if(apostasi> 3500)
							
							{

                        var marker = L.marker([x, y], {icon: orangemarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+ "Average Estimate:" +avg_estimate);
                         
							}
							
							
							else
								
							
							{
								
								var link = "<a href='check_in.php?id="+id+ "'>Check IN</a>";
								
								 var marker = L.marker([x, y], {icon: orangemarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+link+ "<br>"+ "Average Estimate:" +avg_estimate);
                         
								
								
							}
							  
						  }
						  
						else
							  
							  {
								  if(apostasi> 3500)
							
							{

                        var marker = L.marker([x, y], {icon: redmarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2+ "<br>"+ "Average Estimate:" +avg_estimate);
                         
							}
							
							
							else
								
							
							{
								
								var link = "<a href='check_in.php?id="+id+ "'>Check IN</a>";
								
								 var marker = L.marker([x, y], {icon: redmarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+link + "<br>"+ "Average Estimate:" +avg_estimate);
                         
								
								
							}
								  
							  }
					   
                      					  
					   
					 


					}						
					 

                }
            });

           
				
				
  
            }
			
			

///////////////////////////////////////////////////

$("#search").click(function(){
	
	
	document.getElementById('map').style.display = 'none';
	
	document.getElementById('upd_map').style.display = 'block';

	
        
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
				zoom: 15
				
				
         }
		 		 
		 var map = new L.map('upd_map', mapOptions);
         
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         map.addLayer(layer);
		 
		 //prosthiki marker me sintetagmenes tin trexousa topothesia tou xristi
		 
		 var marker = L.marker([current_lat, current_lng]).addTo(map);
		 
		 marker.bindPopup("<b>You are here!</b>").openPopup();

		 
		 	 

             
			 
			 $.ajax({
                url:'get_points_with_type.php',
				
				data: {poi_type:$( "#poi_type" ).val(), current_lat: current_lat, current_lng: current_lng},
			
               type:'post',

                
                success:function(response){
					
					console.log(response);
					//convert to json array se javascript
					 var points = JSON.parse(response);
					 

					 
                 ////////////
				 
				    for(var i=0;i<points.length;i++)

					{

                       //lat
                       var x = points[i][0];
					   
					   //lng
					   var y = points[i][1];
					   
					   //episkepsimotita tin trexousa ora
					   var val = points[i][2];
					   
					   console.log(val);
					   
					   //episkepsimotita gia tin epomeni ora
					   var val1 = points[i][3];

					   //episkepsimotita gia tin methepomeni ora
					   var val2 = points[i][4];
					   
					   var apostasi = points[i][5];
					   
					   var id = points[i][6];
					   
					   var avg_estimate = points[i][7];


					   
					   //ftiaxnw ton marker me tis antistoixes sintetagmenes
					   
						if(val<=32)

					  {
						  
						if(apostasi> 3500)
							
							{

                        var marker = L.marker([x, y], {icon: greenmarker}).addTo(map);
						
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>" + "Average Estimate:" +avg_estimate);
                         
							}
							
							
							else
								
							
							{
								
								var link = "<a href='check_in.php?id="+id+ "'>Check IN</a>";
								
								 var marker = L.marker([x, y], {icon: greenmarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+link  + "<br>"+ "Average Estimate:" +avg_estimate);
                         
								
								
							}

                        

                      }
                       
					   
						else if(val >33 &&  val <=65)
						  
						  {
							  if(apostasi> 3500)
							
							{

                        var marker = L.marker([x, y], {icon: orangemarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+ "Average Estimate:" +avg_estimate);
                         
							}
							
							
							else
								
							
							{
								
								var link = "<a href='check_in.php?id="+id+ "'>Check IN</a>";
								
								 var marker = L.marker([x, y], {icon: orangemarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+link+ "<br>"+ "Average Estimate:" +avg_estimate);
                         
								
								
							}
							  
						  }
						  
						else
							  
							  {
								  if(apostasi> 3500)
							
							{

                        var marker = L.marker([x, y], {icon: redmarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2+ "<br>"+ "Average Estimate:" +avg_estimate);
                         
							}
							
							
							else
								
							
							{
								
								var link = "<a href='check_in.php?id="+id+ "'>Check IN</a>";
								
								 var marker = L.marker([x, y], {icon: redmarker}).addTo(map);
					  
					  marker.bindPopup("Estimated visits now:"+val+"<br>"+ "Estimated visits in 1 hour:"+val1+ "<br>"+"Estimated visits in 2 hours:"+val2 + "<br>"+link + "<br>"+ "Average Estimate:" +avg_estimate);
                         
								
								
							}
								  
							  }
					   
                      					  
					   
					 


					}	
				

				 
					 

                }
            });

           
				
				
  
            }
        
    });	






			
			
         
});

