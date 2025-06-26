<html>

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

<form action = "delete_data.php" method = "post">

Are you sure that you want to delete?

<input type = "radio" name = "delete" value = "yes"> Yes

<input type = "radio" name = "delete" value = "no"> No

<br>
<br>

<input type = "submit" value = "Select">



</form>




</body>


</html>