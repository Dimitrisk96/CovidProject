<?php


require_once('connect.php');

$myusername = $_POST["username"];

$mypassword = $_POST["password"];

$myconfirm = $_POST["confirm_password"];

$myemail = $_POST["email"];

if ($mypassword == $myconfirm)
	
	{
		
		$sql_ins = "INSERT INTO user VALUES ('$myusername','$mypassword','$myemail')";
		
		if($conn->query($sql_ins)===TRUE)
			
			{
				echo "Success.Go to <a href = 'u_signin.php'>Sign In Page</a>";
					
				
			}
			
		else
			
			{
				echo "Fail in registration.Go to <a href = 'registration.php'>Registration Page</a>";
				
			}
		
		
		
		
	}
	
else
	
	{
		echo "Passwords not equal. Please <a href ='registration.php'>try again! </a>";
		
		
	}






?>

