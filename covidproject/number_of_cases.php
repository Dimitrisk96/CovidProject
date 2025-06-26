<?php


session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}

require_once('connect.php');


$sql = "SELECT COUNT(*) as number_cases FROM diagnosis";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$number_cases = $row['number_cases'];


echo "<br><br><table border ='1'> <tr> <th> Number of Covid Cases </th></tr><tr><td>";


echo $number_cases;


echo "</td></tr></table>";

?>