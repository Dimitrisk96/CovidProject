<html>


<?php

session_start();



if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}
require_once('a_nav_bar.html');


require_once('connect.php');


$answer = $_POST["delete"];

if($answer=="yes")
	
	{

$del_poi = "DELETE FROM poi";

$del_pop ="DELETE FROM populartimes";

$res_poi = $conn->query($del_poi);

$res_pop = $conn->query($del_pop);


if($res_poi===TRUE and $res_pop===TRUE)
	
	{
echo "<br><br>All data were deleted";

	}
	
	}
	
	else
		
	
	{
		echo "<br><br>Data NOT deleted";
		
	}

?>




</html>