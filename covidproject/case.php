<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


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

<br>
<form action ="check_case.php" method = "post">

Date Of Covid Diagnosis:
<input type = "date" name ="mydate">
<br><br>

<input type = "submit" value ="New Covid Case">


</form>



</body>

</html>