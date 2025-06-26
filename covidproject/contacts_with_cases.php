<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$( document ).ready(function() {
    
	$.ajax({
                url:'exist_cases.php',

                type:'post',
                
                success:function(response){
                   

                    $("#contacts").html(response);
				   

                }
            });

});

</script>




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


<h3> My Contacts </h3>


<div id = "contacts"> </div>

</body>

</html>