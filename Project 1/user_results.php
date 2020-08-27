<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','s2866137');
define('DB_PASSWORD','allinder');
define('DB_DATABASE','s2866137');

$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($connection->connect_error){
	echo "Try again idiot!";
} else {
	echo "Congratulations idiot!";

	$query = "SELECT * FROM users3";
	$result = mysqli_query($connection,$query);

	echo "<table>";
		while ($row_users = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".($row_users['first_name'])."</td>";
			echo "<td>".($row_users['last_name'])."</td>";
			echo "<td>".($row_users['skills'])."</td>";
			echo "<td>".($row_users['address'])."</td>";
			echo "<td>".($row_users['city'])."</td>";
			echo "<td>".($row_users['birth_year'])."</td>";
			echo "</tr>";
		}
	echo "</table>";
}

?>