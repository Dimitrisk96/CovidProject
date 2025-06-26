<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


</head>


<?php

session_start();

if($_SESSION["logged_user"]!="yes")
	
	{
		header("Location:u_signin.php");
		
	}
	


require_once('u_nav_bar.html');

require_once('connect.php');

$mydate  = $_POST["mydate"];

//protos elegxos : na elegksoume an exei kanei eisagwgi mellontikis imerominias

$today = date("Y-m-d");


$mydate_int = strtotime($mydate);

$today_int = strtotime($today);

$diafora = ($mydate_int - $today_int)/(60*60*24);

if ($diafora > 0 )
	
	{
		
		echo "Error!!! You have selected date after current!!! ";
		
		
	}
	
elseif($diafora < - 14)

	{
	
		echo "Error!!! 14 days before current!!!!";
	
	
    }

//edo prepei na elegksoume ean exei idi dilosei oti einai krousma	
else
	

	{
		$myusername = $_SESSION['username'];
		
		$sql ="SELECT dt FROM diagnosis WHERE username = '$myusername'";
		
		$result = $conn->query($sql);
		
		//an den exei ferei apotelesmata tha prepei na ginei eisagwgi
		if($result->num_rows ==0)
			
			{
				$insert = "INSERT INTO diagnosis VALUES ('$myusername', '$mydate')";
				
				$conn->query($insert);
				
				echo "New Covid Case was inserted!!!";
				
			}
			
			
		else
			
		
		{
			$row = $result->fetch_assoc();
			
			$dt = $row['dt'];
			
			$dt_int = strtotime($dt);
			
			$diafora = ($mydate_int - $dt_int)/(60*60*24);
			
			
			if($diafora <= 0)
				
				{
					echo "Newer date in db exists!!";
					
				}
				
			elseif ($diafora > 0 and $diafora <=14)
			
			
			{
				echo "You are already a case";
				
			}
				
				else
					
					{
						$update = "UPDATE diagnosis SET dt = '$mydate' WHERE username = '$myusername'";
						
						$conn->query($update);
						
						echo "Dated updated!!!";
						
						
					}
			
			
			
			
		}
		
		
		
		
	}

	
	






?>



</html>