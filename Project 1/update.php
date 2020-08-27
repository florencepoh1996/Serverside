<?php
	session_start();
	include("config.php");
	//include("pagechange.php");
	
	$userID = $_SESSION['userSelected'];
	
	echo "You chose user: " . $userID;
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {		
		
		
		$firstName = mysqli_real_escape_string($db,$_POST['first_name']);
		$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
		$age = mysqli_real_escape_string($db,$_POST['age']);
		$favourite_movie = mysqli_real_escape_string($db,$_POST['fav_movie']);
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$image_name = mysqli_real_escape_string($db,$_POST['image_name']);
		
		
		$update_query = "UPDATE users SET first_name = '$firstName', last_name = '$last_name', age = $age, fav_movie = '$fav_movie', username = '$username', image_name = '$image_name' WHERE id = $userID";
		
		echo $update_query;
		
		$update_result = mysqli_query($db,$update_query);
			
	}	
	
	
	$user_query = "SELECT * FROM users WHERE id = '$userID'";
			
	$user_result = mysqli_query($db,$user_query);
	
	echo "<h2>Updating a User:</h2>";
	echo "<form method = 'post'>";
	
	//$userID = -1;
	
		while ($row_users = mysqli_fetch_array($user_result)) {
			
			//$userID = $row_users['id'];
			
			echo "<label>First Name:</label>";
			echo "<input type = 'text' value = '". $row_users['first_name'] ."' name = 'first_name' placeholder='First Name...'/>";

			echo "<br>";

			echo "<label>Last Name:</label>";
			echo "<input type = 'text' value = '". $row_users['last_name'] ."' name = 'last_name' placeholder='Last name...'/>";

			echo "<br>";

			echo "<label>Age:</label>";
			echo "<input type = 'text' value = '". $row_users['age'] ."' name = 'age' placeholder='Age...' />";

			echo "<br>";	

			echo "<label>Favourite Movie:</label>";
			echo "<input type = 'text' value = '". $row_users['fav_movie'] ."' name = 'fav_movie' placeholder='Favourite Movie...' />";

			echo "<br>";

			echo "<label>Favourite Pet:</label>";
			echo "<input type = 'text' value = '".$row_users['image_name']."' name = 'image_name' placeholder = 'My favourite pet...'  />";

			echo "<br>";

			echo "<label>Username:</label>";
			echo "<input type = 'text' value = '". $row_users['username'] ."' name = 'username' placeholder='Username...' />";


			echo "<br>";

			echo "<label>Password:</label>";
			echo "<input type = 'password' name = 'password' placeholder='Password...' />";

			echo "<br>";

			echo "<label>My pet looks like this:</label>";

			echo "<br>";
			
			echo "<img width = '500' height = '500' src = 'images/".$row_users['image_name']."'  >";
			
			echo "<br>";	
		}
		
	echo "<br>";
	echo "<input type='submit' value=' UPDATE USER '/>";
	echo "</form>";
			
			
		
?>