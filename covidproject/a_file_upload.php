<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


</head>

<body>

<?php
session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}
require_once('a_nav_bar.html');


?>

<br>
<br>
<br>

<form  action = "insert_data.php" method="post" enctype="multipart/form-data">

Please Select Json File to Upload:

<input type = "file" name = "updload_data" >

<br><br>

<input type = "submit" value = "Upload JSON file">


</form>




</body>


</html>