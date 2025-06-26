<?php


session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}

require_once('connect.php');


$sql = "SELECT COUNT(*) as number_checkins FROM checkins";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$number_checkins = $row['number_checkins'];


echo "<br><br><table border ='1'> <tr> <th> Number of Checkins </th></tr><tr><td>";


echo $number_checkins;


echo "</td></tr></table>";

?>