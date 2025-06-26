<?php

$string = file_get_contents('starting_pois.json');

$points = json_decode($string, true);

require_once('connect.php');

for($i=0;$i<count($points);$i++)
	
	{
		
		$point_id = $points[$i]['id'];
		
		$point_name = $points[$i]['name'];
		
		$point_name = mysqli_real_escape_string($conn,$point_name);

		
		$point_addr=$points[$i]['address'];
		
		$point_type = $points[$i]['types'][0];
		
		$point_lat = floatval($points[$i]['coordinates']['lat']);
		
		$point_lng= floatval($points[$i]['coordinates']['lng']);
		
		$new_point = "INSERT INTO poi VALUES('$point_id','$point_name','$point_addr','$point_type', '$point_lat','$point_lng')";
		
		if($conn->query($new_point)===TRUE)
			
			{
				echo "New point inserted<br>";
				
			}
		
		
           		
		//ena array 7 thesewn
		$populartimes = $points[$i]['populartimes'];
		
		//ena loop gia tis imeres 
		
		for($day = 0;$day <7;$day++)
			
			{
				$imera = $populartimes[$day]['name'];
								
				
				for($hour = 0;$hour <24; $hour++)
					
					{
						
					$dimofilia = $populartimes[$day]['data'][$hour];
					
					
					$pop_ins = "INSERT INTO populartimes VALUES ('$point_id','$imera','$hour','$dimofilia')";


					if($conn->query($pop_ins)===TRUE)
						
						{
							
						}
						
					}

				
				
			}
		
		
	}




?>