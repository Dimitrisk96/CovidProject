<html>

<head>

  <link rel="stylesheet" href="mystyle.css">


</head>

<body>

<form action = "signup.php" method = "post">

Username:

<input type = "text" name ="username" required>

<br>
<br>
Password:
<input type = "password" name = "password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

<br>
<br>
Confirm Password:
<input type = "password" name = "confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

<br>
<br>

Email:
<input type = "email" name ="email" required>

<br>
<br>

<input type = "submit" value = "Sign Up">


</form>

<br>

<a href="index.php">Go Back to HomePage</a>

</body>

</html>