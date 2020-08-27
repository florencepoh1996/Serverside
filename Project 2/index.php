<?php
session_start();
include("connect.php");


$movieid = $movie_row['id'];
$movieid = $_SESSION["movietoupdate"];


//Display only 10 movies- Limit 10 only shows 9 poster so set 11
$movie_query = "SELECT id,movie_name,poster FROM movies ORDER BY ratings DESC LIMIT 11"; 
$movie_display = mysqli_query($moviesdb,$movie_query);
$movie_row = mysqli_fetch_array($movie_display);



?>



<html lang="en">
<head>
	<title>10 Fav Movies</title>
	<link rel="icon" href="Images/Movie_icon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href ="stylemovie.css" />

</head>

<body id="cover">

	<h1>MY TOP 10 FAVOURITE FILMS!</h1>

	<div id="add">
		<a href="uploadmovie.php"><img src="Images/add_movie.png" alt="Add Movie"></a>
	</div>

	<div id="poster">

	<?php

// Using PHP to display the film posters and film names from database
	while($movie_row = mysqli_fetch_array($movie_display)){

		echo "<div class='displayposters'>";
		echo "<a href = 'moviesdetailpage.php?id=".($movie_row['id'])."'><img src='Images/".($movie_row['poster'])."' alt='Movie Poster'  width = '200px' height = '300px' ></a>";
		echo "<br>";
		echo "<a href ='moviesdetailpage.php?id=".($movie_row['id'])."'>".($movie_row['movie_name'])."</a>";
		echo "</div>";

	}

	?>
	</div>



	<footer>
		<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
	</footer>

</body>

</html>