<?php
session_start();
include("connect.php");

$_SESSION["movietoupdate"] = $movieid;


if($_SERVER["REQUEST_METHOD"] == "POST"){

	$movie_title = mysqli_real_escape_string($moviesdb,$_POST['movie_title']);
	$movie_genre = mysqli_real_escape_string($moviesdb,$_POST['movie_genre']);
	$movie_release = mysqli_real_escape_string($moviesdb,$_POST['release_year']);
	$movie_directors = mysqli_real_escape_string($moviesdb,$_POST['movie_directors']);
	$movie_casts = mysqli_real_escape_string($moviesdb,$_POST['movie_casts']);
	$movie_ratings = mysqli_real_escape_string($moviesdb,$_POST['movie_ratings']);
	$movie_summary = mysqli_real_escape_string($moviesdb,$_POST['movie_summary']);
	$movie_gross = mysqli_real_escape_string($moviesdb,$_POST['movie_gross']);
	
//Creates a new row of data into table from the form below
	$update_movie = "INSERT INTO movies (movie_name,genre,release_year,directors,main_cast,ratings,synopsis,box_office,poster) VALUES ('$movie_title','$movie_genre',$movie_release,'$movie_directors','$movie_casts','$movie_ratings' ,'$movie_summary','$movie_gross', 'default.jpg')";

	//echo $update_movie;
	$insert_movie = mysqli_query($moviesdb,$update_movie);
}

?>



<html>
<head>
	<title>New Movie</title>
	<link rel="icon" href="Images/Movie_icon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href ="stylemovie.css" />
</head>

<body id="cover">

	<div id="previous">
	<a href="index.php"><img src="Images/back_icon.png" alt="Previous Page"></a>
</div>

<div id="heading">
	<h1>Add New Favourite</h1>
</div>

	<div id="newform">
			<form method="post" align = "center">
				
				<div class="input">
					<label>Movie:</label>
					<input type="text" name="movie_title" placeholder="Movie Name..." />
				</div>
					
				<div class="input">	
					<label>Genre:</label>
					<input type="text" name="movie_genre" placeholder="Movie Genre..." />
				</div>
						
				<div class="input">
					<label>Directors:</label>
					<input type="text" name="movie_directors" placeholder="Director(s) Name..." />				
				</div>

				<div class="input">
					<label>Year:</label>
					<input type="text" name="release_year" placeholder="Year released..." />
				</div>

				<div class="input">
					<label>Main Cast(s):</label>
					<input type="text" name="movie_casts" placeholder="Main cast(s)..." />
				</div>

				<div class="input">	
					<label>Ratings:</label>
					<input type="text" name="movie_ratings" placeholder="Movie Ratings..." />
				</div>

				<div class="input">	
					<label>Box Office:</label>
					<input type="text" name="movie_gross" placeholder="Movie Box Office..." />
				</div>

				<div class="input">	
					<label>Summary:</label>
					<input type ="text" name="movie_summary" placeholder="What is the movie about..."  />
					<br>
					<label>Select a movie poster to upload..</label>
					<br>
				</div>

			<div id="button">
				<input type="submit" value="Add New Movie" />
			</div>

			</form>

			<div id="toupload">
				<form action="imageupload.php" method="post" enctype="multipart/form-data" align= "center">

					<input type="file" name="fileToUpload" id="fileToUpload" />
					<br>
					<input type="submit" name="submit" value="Upload Poster" />
					
				</form>
			</div>
</div>

<footer>
		<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>

</body>
</html>