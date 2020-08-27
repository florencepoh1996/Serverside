<?php
	session_start();
	include("config.php");


	$query = "SELECT id,first_name,last_name FROM users";
	$result = mysqli_query($db,$query);

	echo "<form method='post'>";
	echo "<select name='userSelected' onchange='this.form.submit()'>";
	echo "<option value='Select a name'>Select a name</option>";
	
	$userID = -1;
	
	while ($row_users = mysqli_fetch_array($result)) {

		$userID = $row_users['id'];
		$name = $row_users['first_name'];
		$lastname = $row_users['last_name'];
		
		echo "<option value='" . $userID . "'>" . $name . " " . $lastname . "</option>";
				
	}
	
	echo "</select>";
	echo "</form>";
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
				
		echo "Switching page....";
		
		$userSelected = mysqli_real_escape_string($db,$_POST['userSelected']);
			
		$_SESSION["userSelected"] = $userSelected;
		
		header('Location: forms2.php');
	}
	
	

?>