<?php


function distance($lat1, $lon1, $lat2, $lon2) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;

   return ($miles * 1609.344);

}




require_once('connect.php');

$day = date("l");

$hour = date('H');


$sql = "SELECT id,lat,lng FROM poi";


$current_lat = $_POST['current_lat'];

$current_lng = $_POST['current_lng'];




$result = $conn->query($sql);

//array apo ta points ta opoia tha epistrafoyn
$points = array();

while ($row = $result->fetch_assoc())
	
	{
		$poi_id = $row['id'];
		
		//vriskoume tin ektimisi tis episkepsimotitas gia tin trexousa ora
		$select_s = "SELECT val FROM populartimes WHERE poi_id = '$poi_id' AND day = '$day' AND hour = '$hour'";
		
		$result_s = $conn->query($select_s);
		
		$row_s = $result_s->fetch_assoc();
		
		$val_s = $row_s['val'];
		
		
		$select_s = "SELECT val FROM populartimes WHERE poi_id = '$poi_id' AND day = '$day' AND hour = '$hour'+1";
		
		$result_s = $conn->query($select_s);
		
		$row_s = $result_s->fetch_assoc();
		
		$val_s1 = $row_s['val'];
		
		
		$select_s = "SELECT val FROM populartimes WHERE poi_id = '$poi_id' AND day = '$day' AND hour = '$hour'+2";
		
		$result_s = $conn->query($select_s);
		
		$row_s = $result_s->fetch_assoc();
		
		$val_s2 = $row_s['val'];
		
		$date = new DateTime();
		
		$current = $date->getTimestamp();
		
		$current_date = date('Y-m-d H:i:s', $current);
		
		
        $current_day =date('l', strtotime($current_date));
		
		$current_hour = date('H', strtotime($current_date));
			
		$select_pop = "SELECT estimate, dt  FROM checkins WHERE poi_id = '$poi_id'";
		
		$result_pop = $conn->query($select_pop);
		
		$sum_pop = 0;
		
		$count_pop = 0;
		
		while($row_pop = $result_pop->fetch_assoc())
			
			{
				
				$checkin_date = date('Y-m-d H:i:s', $row_pop['dt']);
		
		
               $checkin_day =date('l', strtotime($checkin_date));
		
		       
			   $checkin_hour = date('H', strtotime($checkin_date));
			   
			   
			   if($checkin_day == $current_day && ($checkin_hour == $current_hour || $checkin_hour == $current_hour - 1 || $checkin_hour == $current_hour -2))
		
		                {
							
							$sum_pop = $sum_pop + intval($row_pop['estimate']);
							
							$count_pop = $count_pop + 1;
							
							
						}
			
			
			
		
		   
		    }
		
		
		$tmp = array();
		
	    array_push($tmp,$row['lat']);
		
		array_push($tmp, $row['lng']);
		
		array_push($tmp, $val_s);
		
	    array_push($tmp, $val_s1);

        
		array_push($tmp, $val_s2);
		
		array_push($tmp, floatval (distance($current_lat,$current_lng,$row['lat'],$row['lng'])));
		
		array_push($tmp, $poi_id);
		
		if($count_pop ==0)
			
			{
				$count_pop =0.0001;
			}
		
		array_push($tmp, ($sum_pop / $count_pop));
		


		array_push($points,$tmp);
		
	}

//ta simeia epistrefontai me json morfi gia na mporesoun na fortothoun panw sto xarti
echo json_encode($points);

?>
