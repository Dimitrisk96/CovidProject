<html>

<body>

<?php

session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}
require_once('a_nav_bar.html');

require_once('connect.php');

//kratao to onoma tou arxeiou



$allowed = array('json');

$file = $_FILES['updload_data']['name'];

$mod_date= date("Y-m-d H:i:s.", filemtime($file));

echo $mod_date;


$ext = pathinfo($file, PATHINFO_EXTENSION);

if (!in_array($ext, $allowed)) {
    echo '<br><br>Error in format of file. Only json files accepted';
	
	echo "<br>";
	
	echo "<a href = 'a_file_upload.php'>  Go Back to Upload JSON File again! </a>";
}

else
	
	{

$string = file_get_contents($file);

$points = json_decode($string, true);


for($i=0;$i<count($points);$i++)
	
	{
		
		$point_id = $points[$i]['id'];
		
		$point_name = $points[$i]['name'];
		
		$point_name = mysqli_real_escape_string($conn,$point_name);

		
		$point_addr=$points[$i]['address'];
		
		$point_type = $points[$i]['types'][0];
		
		$point_lat = floatval($points[$i]['coordinates']['lat']);
		
		$point_lng= floatval($points[$i]['coordinates']['lng']);
		
		
		$point_in_db ="SELECT id,last_dt FROM poi WHERE id = '$point_id'";
		
		$result_in_db = $conn->query($point_in_db);
		
         if($result_in_db ->num_rows >0 )


         {
            $row_in_db = $result_in_db->fetch_assoc();
			
			$last_dt = $row_in_db['last_dt'];
			
				if ($mod_date >$last_dt)
			
			{
				$delete_poi = "DELETE FROM poi WHERE id = '$point_id'";
				
				$delete_pop_data = "DELETE FROM populartimes WHERE poi_id ='$point_id'";
				
				$conn->query($delete_poi);
				
				$conn->query($delete_pop_data);
				
				
			}
			
			else
				
				{
					
					die("The data tou try to upload are old");
					
					
				}

		 }			 
		
	
		
		
		
		
		$new_point = "INSERT INTO poi VALUES('$point_id','$point_name','$point_addr','$point_type', '$point_lat','$point_lng','$mod_date')";
		
		if($conn->query($new_point)===TRUE)
			
			{
				//echo "New point inserted<br>";
				
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
	
	echo "<br><br>";
 
     
	 echo count($points)." points were uploaded";
	 
	 echo "<br><br>";
	 
	 echo count($points)*7*24 . " popularity data were uploaded";


	}



?>

</body>

</html>