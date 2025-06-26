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

header("Location:view_general_stats.php");

?>



</body>

</html>