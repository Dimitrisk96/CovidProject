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
	

header("Location:show_map.php");

?>



</body>

</html>