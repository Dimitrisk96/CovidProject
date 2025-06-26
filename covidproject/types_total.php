<?php


session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}

require_once('connect.php');


$sql = "SELECT poi.type as type, COUNT(*) as total FROM poi inner join checkins ON poi.id = checkins.poi_id GROUP BY poi.type ORDER BY COUNT(*) DESC";


$result = $conn->query($sql);




echo "<table border ='1'>";

echo "<tr>";

echo "<th>";

echo "Type";

echo "</th>";

echo "<th>";

echo "Total Checkins";

echo "</th>";

echo "</tr>";

while($row = $result->fetch_assoc())
	
	{
		echo "<tr>";
		
		echo "<td>";
		
		echo $row['type'];
		
		echo "</td>";
		
		echo "<td>";
		
		echo $row['total'];
		
		echo "</td>";
		
		echo "</tr>";

		
		
	}


echo "</table>";



?>