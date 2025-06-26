<?php


require_once('connect.php');

session_start();

$myusername = $_POST["username"];

$mypassword = $_POST["password"];


$sql_select = "SELECT username,password FROM user WHERE username='$myusername' and password = '$mypassword'";

$users = $conn->query($sql_select);

if($users->num_rows ==1)
	
	{
		$row = $users->fetch_assoc();
		
		$db_username = $row['username'];
		
		$_SESSION["logged_user"]="yes";
		
		$_SESSION["username"] = $db_username;
		
		header("Location: u_homepage.php");
		
	}
	

else
	
	{
		header("Location: u_signin.php");
		
	}




?>