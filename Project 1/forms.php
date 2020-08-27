<?php
	
	include("config.php");
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$firstName = mysqli_real_escape_string($db,$_POST['first_name']);
		$lastName = mysqli_real_escape_string($db,$_POST['last_name']);
		$age 	  = mysqli_real_escape_string($db,$_POST['age']);
		$favMovie = mysqli_real_escape_string($db,$_POST['fav_movie']);
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		$updateQuery = "INSERT INTO users(first_name,last_name,age, fav_movie,username,password) VALUES ('$firstName','$lastName',$age,'$favMovie','$username','$password')";
		$updateResult = mysqli_query($db,$updateQuery);
	}	
	

?>

<html>

<head>
	<title>Forms Page</title>
	<link rel="stylesheet" href ="styledrop.css" />
</head>

	<body>

		<div align = "center" id = "dropdown">
		
			<form method = "post">		
				
				<label>First Name:</label>
				<input type = "text" name = "first_name" placeholder="First Name..."/>

				<br>

				<label>Last Name:</label>
				<input type = "text" name = "last_name" placeholder="Last Name..."/>

				<br>

				<label>Age:</label>
				<input type = "text" name = "age" placeholder="How old are you?..."/>

				<br>

				<label>Favourite Movie:</label>
				<input type = "text" name = "fav_movie" placeholder="Favourite Movie..."/>

				<br>

				<label>Username:</label>
				<input type = "text" name = "username" placeholder="Username..."/>

				<br>

				<label>Password:</label>
				<input type = "password" name = "password" placeholder="Password..." />

				<br>

				<input type="submit" value=" Submit " id = "submit"/>

			</form>
		
		</div>
	
	</body>

</html>