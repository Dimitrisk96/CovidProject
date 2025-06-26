<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$( document ).ready(function() {
    
	$.ajax({
                url:'u_history_case.php',

                type:'post',
                
                success:function(response){
                   
				   console.log(response);

                    $("#user_cases").html(response);
				   

                }
            });
			
	$.ajax({
                url:'u_history_checkins.php',

                type:'post',
                
                success:function(response){
                   
				   console.log(response);

                    $("#user_checkins").html(response);
				   

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

<table>

<tr>

<td>
<div id = "user_cases"> </div>


</td>

<td>

<form action = "u_edit_info.php" method = "post">


New Username: <input type = "text" name = "username" required>

<br><br>

New Password: <input type = "password" name ="password" required>

<br><br>

<input type = "submit" value = "Change Info">

</form>

</td>

</tr>

<tr>

<td colspan ='2'>

<div id = "user_checkins"> </div>


</td>
</tr>

</table>
</body>

</html>