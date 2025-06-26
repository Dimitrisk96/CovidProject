<?php


session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}

require_once('connect.php');



$sql = "SELECT diagnosis.dt as diagdt, checkins.dt as chdt, poi.type as type FROM checkins INNER JOIN diagnosis ON checkins.username  = diagnosis.username INNER JOIN poi ON checkins.poi_id = poi.id";

$sql2 = "SELECT  DISTINCT type FROM poi";

$types = array();

$result2 = $conn->query($sql2);


while($row2 = $result2->fetch_assoc())
	
	{
		array_push($types, $row2['type']);
		
		
		
	}


$total_array = array();


for($i=0;$i<count($types);$i++)
	

	{
		
		array_push($total_array,0);
		
	}


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
				for($j=0;$j<count($types);$j++)
					
					{
						if ($row['type'] == $types[$j])
							
							{
								$total_array[$j] = $total_array[$j] + 1;
								
							}
						
						
						
					}
				 
				
			}
		
		
		
		
	}


echo "<table>";

echo "<tr>";

echo "<th>";

echo "Type";

echo "</th>";

echo "<th>";

echo "Total CheckIns From People with Covid";

echo "</th>";

echo "</tr>";


for($i=0;$i<count($total_array);$i++)
	
	{
		echo "<tr>";
		
		echo "<td>";
		
		echo $types[$i];
		
		echo "</td>";
		
		echo "<td>";
		
		echo $total_array[$i];
		
		echo "</td>";
		
		echo "</tr>";
		
	}


  

echo "</table>";

?>