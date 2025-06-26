<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


</head>


<?php


session_start();

$poi_id = $_GET['id'];



?>

<form action  = "finish_checkin.php" method = "post">

Popularity: 

<input type = "number" min="1" max = "100" name ="popularity">

<input type = "text" name = "poi_id" value = <?php echo $poi_id?> hidden>

<input type = "submit" value ="Finish Check In">

</form>



</html>