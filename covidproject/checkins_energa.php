<?php


session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}

require_once('connect.php');



$sql = "SELECT diagnosis.dt as diagdt, checkins.dt as chdt FROM checkins INNER JOIN diagnosis ON checkins.username  = diagnosis.username";


$result = $conn->query($sql);

$total = 0;

while($row = $result->fetch_assoc())
	
	{
		$checkin_date = date('Y-m-d', $row['chdt']);
		
		$diagnosis_date = $row['diagdt'];

		$checkin_date_str = strtotime($checkin_date);

        $diagnosis_date_str = strtotime($diagnosis_date);
		
		$diafora = $checkin_date_str - $diagnosis_date_str;

        $dif = round($diafora / (60 * 60 * 24));

	    
		if($dif >= - 7 && $dif <=14)
			
			{
				
				$total = $total + 1;
				
			}
		
		
		
		
	}

   echo "<br>";
   
   
   echo "<table border ='1'>";
   
   echo "<tr>";
   
   echo "<th>";
   
   echo "Visits from Covid Visitors";
   
   echo "</th>";
   
   echo "</tr>";
   
   echo "<td>";
   
   echo $total;
   
   echo "</td>";
   
   echo "</table>";



?>