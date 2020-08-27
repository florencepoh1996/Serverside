<?php
session_start();
include("blogconfig.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

		$username = mysqli_real_escape_string($blogdb,$_POST['username']);
		$password = mysqli_real_escape_string($blogdb,$_POST['password']);

		$blogquery = "SELECT * FROM userblog WHERE uname = '$username' AND pword = '$password'";

		$blogresult = mysqli_query($blogdb,$blogquery);

		$blogrow = mysqli_fetch_array($blogresult);
		
		if($blogrow['pword'] == $password){
			$_SESSION['username'] = $username;
			header("Location: adminpage.php");
		} else if(empty($username)|| empty($password)) {
			echo "Your username or password is incorrect. Try again";
		}

		
	}


?>


<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href ="blogstyle.css" />
	<link rel="icon" href="images/Logo.png" type="image/png" sizes="16x16">
</head>

<body>

<div align = "center" id="login">
		

<h1>MyBraggr</h1>

			<form method = "post">		
				
				<label>Username:</label>
				<input type = "text" name = "username" placeholder="Username..."/>

				<br>

				<label>Password:</label>
				<input type = "password" name = "password" placeholder="Password..." />

				<br>
				<br>

				<div id="button">
					<input type="submit" value=" Login " />
				</div>
			</form>
		
		</div>
</body>
</html>