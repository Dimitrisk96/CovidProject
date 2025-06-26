<html>


<?php

session_start();

if($_SESSION["logged_admin"]!="yes")
	
	{
		header("Location:a_signin.php");
		
	}
	


require_once('a_nav_bar.html');

?>

<head>

  <link rel="stylesheet" href="mystyle.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script src = "general_info.js"> </script>


</head>

<body>

<table>

<tr>

<td>
<div id  = "div2"> </div>
</td>

<td>
<div id = "div1"> </div>
</td>

<td>
<div id = "div3"> </div>
</td>

</tr>

<tr>

<td colspan = '3'>
<div id = "div4"> </div>
</td>

</tr>

<tr>

<td colspan = '3'>
<div id = "div5"> </div>
</td>

</tr>

</table>

</body>

</html>