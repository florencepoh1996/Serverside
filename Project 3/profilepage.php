<?php
	session_start();
	include("config.php");
	$authorname = $_SESSION["username"];
			

?>

<html>
<head>
	<title><?php echo $authorname; ?> Page</title>
	<link rel="stylesheet" href ="blogstyle.css" />
	<link rel="icon" href="images/Logo.png" type="image/png" sizes="16x16">
</head>

<body>

	<header>MyBraggr</header>

	<div id="out">
		<a href="loginpage.php"><p>Log Out</p></a>
	</div>


	<div id="profilepic">
		<img src="images/mypicture.jpg" alt="Me">
	</div>

	<div id="details">
		<form method="post">
			<label>First Name:</label>
			<input type="text" name="fname">
			<br>

			<label>Last Name:</label>
			<input type="text" name="lname">
			<br>

			<label>Braggr Name:</label>
			<input type="text" name="author">
			<br>

			<label>Number of Entries:</label>
			<input type="text" name="entries">
			<br><br>

			<input type="submit" value="Save Changes">

			<div id="upload">
				<input type="submit" value="Upload Image">
			</div>

		</form>
	</div>

<footer>
	<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>

</body>
</html>