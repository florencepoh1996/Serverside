<?php
	include("config.php");

	
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$myUsername = mysqli_real_escape_string($db,$_POST['username']);
		$myPassword = mysqli_real_escape_string($db,$_POST['password']);

		echo $myUsername;
		echo "<br>";
		echo $myPassword;
		echo "<br>";
		
		$query = "SELECT * FROM users WHERE username = '$myUsername' AND password = '$myPassword'";
		
		$result = mysqli_query($db,$query);
		
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		echo $row['fav_movie'];
		
	}	
	
?>


<html>

<head>
	<title>Login Page</title>
	<link rel="stylesheet" href ="style.css" />
</head>

	<body>

		<div align = "center">
		
			<form method = "post">		
				
				<label>Username:</label>
				<input type = "text" name = "username" placeholder="Username..."/>

				<br>

				<label>Password:</label>
				<input type = "password" name = "password" placeholder="Password..." />

				<br>

				<input type="submit" value=" Submit "/>

			</form>
		
		</div>
	
	</body>

</html>