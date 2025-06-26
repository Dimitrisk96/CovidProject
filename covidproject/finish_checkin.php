<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


</head>


<?php

session_start();

$myuser = $_SESSION['username'];

$date = new DateTime();
$timest = $date->getTimestamp();

$poi_id = $_POST["poi_id"];

$popularity = $_POST["popularity"];


require_once('connect.php');

$sql = "INSERT INTO checkins VALUES ('$myuser','$poi_id','$timest', '$popularity')";

if($conn->query($sql)===TRUE)
	
	{

echo "Success!!!";

	}
	
	
	else
		
		{
			
			
		}

?>


</html>