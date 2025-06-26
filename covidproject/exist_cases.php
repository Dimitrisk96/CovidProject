<?php

session_start();

require_once('connect.php');


$myuser = $_SESSION['username'];

$sql = "SELECT poi_id, dt FROM checkins WHERE username ='$myuser'";


$date = new DateTime();

$now = $date->getTimestamp();

$current_date = date('Y-m-d H:i:s', $now);

$current_date_str = strtotime($current_date);

$result = $conn->query($sql);


echo "<table border = '2'>";

 while ($row = $result->fetch_assoc())
	 
	 {
		 $checkin = $row['dt'];
		 
		 $poi_id = $row['poi_id'];
		 
		 $checkin_date = date('Y-m-d H:i:s', $checkin);
		 
		 $checkin_date_str = strtotime($checkin_date);

		 $datediff = $current_date_str - $checkin_date_str;

         $dif = round($datediff / (60 * 60 * 24));
		 
		 
		 if($dif<=7)
			 
		 
		 
		 {
			 //prepei na vro poioi exoun paei sto idio simeio 
			 
			 $same_place  = "SELECT username, dt FROM checkins WHERE  username <> '$myuser' and poi_id = '$poi_id'";
			 
			 $result_same_place = $conn->query($same_place);
			 
			 
			 while($row_s = $result_same_place->fetch_assoc())
				 
				 {
					 $contact_date = date('Y-m-d H:i:s', $row_s['dt']);
		 
					$contact_date_str = strtotime($contact_date);
					
					 $datediff = abs($contact_date_str - $checkin_date_str);

					$dif_h = round($datediff / (60 * 60 ));
					
					$contact_username = $row_s['username'];
					
					
					
					//an itan me diafora 2 oron sto idio simeio tha prepei na vro an einai krousma 
					if($dif_h<=2)
						
					
					{
						
						$sql_last = "SELECT dt FROM diagnosis WHERE username ='$contact_username' ORDER BY dt DESC LIMIT 0,1";
						
						$result_last = $conn->query($sql_last);
						
						$row_last = $result_last->fetch_assoc();
						
						$possible_date = $row_last['dt'];
		 
					    $possible_date_str = strtotime($possible_date);
						
						$datediff = abs($current_date_str - $possible_date_str);
						
						
					    $dif_last = round($datediff / (60 * 60 * 24 ));
						
						
						
						if($dif_last<=7)
							
						
						{
							echo "<tr>";
							
							echo "<td>";
							
							echo $poi_id;
							
							echo "</td>";
							
							echo "<td>";
							
							echo $checkin_date;
							
							echo "</td>";
							
							echo "</tr>";
							
							
							
						}
						
						
						
						
						
						
					}
					 
					 
					 
					 
				 }
			 
			 
			 
			 
		 }
		 
		 
	 }


 echo "</table>";

?>