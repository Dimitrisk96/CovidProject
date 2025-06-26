<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


<link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="show_map.js"></script>


</head>

<body>
<?php

session_start();

if($_SESSION["logged_user"]!="yes")
	
	{
		header("Location:u_signin.php");
		
	}
	


require_once('u_nav_bar.html');

?>

 <div id = "map" style = "width: 100%; height: 75%"></div>


</body>

</html>