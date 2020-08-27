<?php
	include("config.php");


	$query = "SELECT first_name,last_name FROM users";
		
	$result = mysqli_query($db,$query);

	echo "<form method='post'>";
	echo "<select name='userSelected' onchange='this.form.submit()'>";
	echo "<option value='Select a name'>Select a name</option>";

		while ($row_users = mysqli_fetch_array($result)) {

			$fname = $row_users['first_name'];
			$lname = $row_users['last_name'];
		
		
			echo "<option value=' " . $fname . " '>" . $fname . " " . $lname . "</option>";
				
		}
	
	echo "</select>";
	echo "</form>";
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		echo "A post request was made....";
		echo "<br>";
		
		$userSelected = mysqli_real_escape_string($db,$_POST['userSelected']);
		
		echo "This was the user selected...." . $userSelected;
		echo "<br>";
		
		$user_query = "SELECT * FROM users WHERE first_name = '$userSelected'";
		
		$user_result = mysqli_query($db,$user_query);

		echo "<p>Table Results</p>";

			echo "<table>";
				while ($row_users = mysqli_fetch_array($user_result)) {
					
					echo "<tr>";
						echo "<td>".($row_users['first_name'])."</td>";
						echo "<td>".($row_users['last_name'])."</td>";
						echo "<td>".($row_users['age'])."</td>";
						echo "<td>".($row_users['fav_movie'])."</td>";
					echo "</tr>";
				}

			echo "</table>";
	}


?>
