<?php
session_start();
include("connect.php");


$movieid= $_SESSION["movietoupdate"];

//To delete a movie from database/table
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$movie_delete = "DELETE FROM movies WHERE id = $movieid";

	$movie_query = mysqli_query($moviesdb,$movie_delete);
	
//Once deleted, will bring user back to landing page to view other 10 posters
	header('Location: index.php');
}



?>

<html >
<head>
	<title>Delete Movie</title>
	<link rel="icon" href="Images/Movie_icon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href ="stylemovie.css" />
</head>

<body id="cover">
	<div id= "heading">
		<h1>Are you sure you want to delete this awesome movie?</h1>
	</div>

	<div id="previous">
		<a href="index.php"><img src="Images/back_icon.png" alt="Previous Page"></a>
	</div>

	<form method="post" align = "center">
		<input type="submit" value="Delete this awesome movie" id="deleteBtn" />
	</form>


<footer>
		<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>
	
</body>
</html>