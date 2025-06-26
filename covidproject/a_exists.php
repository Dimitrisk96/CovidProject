<?php


require_once('connect.php');

session_start();

$myusername = $_POST["username"];

$mypassword = $_POST["password"];


$sql_select = "SELECT username,password FROM admin WHERE username='$myusername' and password = '$mypassword'";

$users = $conn->query($sql_select);

if($users->num_rows ==1)
	
	{
		$_SESSION["logged_admin"] = "yes";
		
		header("Location: a_homepage.php");
		
	}
	

else
	
	{
		header("Location: a_signin.php");
		
	}




?>