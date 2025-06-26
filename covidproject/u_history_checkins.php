<?php

session_start();

require_once('connect.php');


$myusername = $_SESSION['username'];

$sql = "SELECT poi.name as name, checkins.dt as dt FROM poi INNER JOIN checkins ON poi.id = checkins.poi_id WHERE username = '$myusername'";

$result = $conn->query($sql);

echo "<br><br> Checkins:<br><br>";

echo "<table border ='1'>";

echo "<tr>";

echo "<th>";

echo "Point Name";

echo "</th>";

echo "<th>";

echo "Date";

echo "</th>";

echo "</tr>";

while($row = $result->fetch_assoc())
	
	{
		
		echo "<tr>";
		
		echo "<td>";
		
		echo $row['name'];
		
		echo "</td>";
		
		echo "<td>";
		
		$ch_date = date('Y-m-d H:i:s', $row['dt']);

		
		echo $ch_date;
		
		echo "</td>";
		
		echo "</tr>";
		
		
	}

echo "</table>";


?>