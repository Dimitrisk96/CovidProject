<?php

session_start();

require_once('connect.php');


$myusername = $_SESSION['username'];

$sql = "SELECT dt from diagnosis WHERE username = '$myusername'";

$result = $conn->query($sql);

echo "<br><br> Cases Declared:<br><br>";

echo "<table border ='1'>";

echo "<tr>";

echo "<th>";

echo "Date Declared";

echo "</th>";

echo "</tr>";

while($row = $result->fetch_assoc())
	
	{
		
		echo "<tr>";
		
		echo "<td>";
		
		echo $row['dt'];
		
		echo "</td>";
		
		echo "</tr>";
		
		
	}

echo "</table>";


?>