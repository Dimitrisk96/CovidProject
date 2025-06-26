<?php

session_start();

if($_SESSION["logged_user"]!="yes")
	
	{
		header("Location:u_signin.php");
		
	}
	


require_once('u_nav_bar.html');

require_once('connect.php');


$old_username = $_SESSION["username"];

$edit_username = $_POST['username'];

$edit_password = $_POST['password'];


$sql = "UPDATE user SET username = '$edit_username', password = '$edit_password' WHERE username = '$old_username'";

if($conn->query($sql)===TRUE)
	
	{
		
		$_SESSION['username'] = $edit_username;
		
		$sql ="UPDATE diagnosis SET username = '$edit_username' WHERE username = '$old_username'";
		
		$conn->query($sql);
		
		echo "<br><br>Update of Profile was done!!!!";
		
			
		
	}
	
	else
		
	
	{
		echo "<br><br>Error in updating profile. User already exists!";
		
		
	}


?>