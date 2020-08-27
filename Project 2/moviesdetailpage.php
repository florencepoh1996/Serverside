<?php
session_start();
include("connect.php");


$movieid = $_GET['id'];

//to store movieid that will be used to call movie by id in different pages
$_SESSION["movietoupdate"] = $movieid;

$movie_query = "SELECT * FROM movies WHERE id = $movieid";
$movie_result = mysqli_query($moviesdb,$movie_query);
$movie_row = mysqli_fetch_array($movie_result);

$movie_title = $movie_row['movie_name'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

//to store data entered by user in the form to the database
	$movie_title = mysqli_real_escape_string($moviesdb,$_POST['movie_title']);
	$movie_genre = mysqli_real_escape_string($moviesdb,$_POST['movie_genre']);
	$movie_directors = mysqli_real_escape_string($moviesdb,$_POST['movie_directors']);
	$movie_release = mysqli_real_escape_string($moviesdb,$_POST['release_year']);
	$movie_casts = mysqli_real_escape_string($moviesdb,$_POST['movie_casts']);
	$movie_ratings = mysqli_real_escape_string($moviesdb,$_POST['movie_ratings']);
	$movie_gross = mysqli_real_escape_string($moviesdb,$_POST['movie_gross']);
	$movie_summary = mysqli_real_escape_string($moviesdb,$_POST['movie_summary']);

//update entries from form below
	$update_movie = "UPDATE movies SET movie_name = '$movie_title', genre = '$movie_genre', directors = '$movie_directors', release_year = '$movie_release', main_cast = '$movie_casts', ratings = '$movie_ratings', box_office = '$movie_gross', synopsis = '$movie_summary' WHERE id = '$movieid' ";

//To update table after a form has been submitted
	$updateresult_movie = mysqli_query($moviesdb,$update_movie);
	$movie_query = "SELECT * FROM movies WHERE id = $movieid";
	$movie_result = mysqli_query($moviesdb,$movie_query);
	$movie_row = mysqli_fetch_array($movie_result);
		
	}	

?>

<html >
<head>
	<!-- Title of page is called from database -->
	<title><?php echo $movie_title;  ?></title>
	<link rel="icon" href="Images/Movie_icon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href ="stylemovie.css" />
</head>

<body id="cover">

<!-- A delete icon for user to delete movie from database -->
<div id="add">
		<a href="deletemovie.php"><img src="Images/delete_icon.png" alt="Delete Movie"></a>
	</div>

<!-- A 'previous' page icon for user to return to previous page/main page -->
<div id="previous">
	<a href="index.php"><img src="Images/back_icon.png" alt="Previous Page"></a>
</div>

<div id="heading">
	<h1>You have selected <?php echo $movie_title;  ?></h1>
</div>

<div id="inline">

	<div id="movieposter">
	<?php 
		echo "<img src='Images/".($movie_row['poster'])."' alt='Movie poster' ' width = '200px' height = '300px'></a>";
	 ?>
	</div>

<!-- Display Form -->
	<div id="form">
			<form method="post">
				
				<div class="input">
					<label>Movie:</label>
					<input type="text" name="movie_title" value ="<?php echo $movie_row['movie_name'];  ?>"/>
				</div>
					
				<div class="input">	
					<label>Genre:</label>
					<input type="text" name="movie_genre" value ="<?php echo $movie_row['genre'];  ?>"/>
				</div>
						
				<div class="input">
					<label>Directors:</label>
					<input type="text" name="movie_directors" value ="<?php echo $movie_row['directors'];  ?>"/>
				</div>

				<div class="input">
					<label>Year:</label>
					<input type="text" name="release_year" value ="<?php echo $movie_row['release_year'];  ?>"/>
				</div>

				<div class="input">
					<label>Main Cast(s):</label>
					<input type="text" name="movie_casts" value ="<?php echo $movie_row['main_cast'];  ?>" />
				</div>

				<div class="input">	
					<label>Ratings:</label>
					<input type="text" name="movie_ratings" value ="<?php echo $movie_row['ratings'];  ?>"/>
				</div>

				<div class="input">	
					<label>Box Office:</label>
					<input type="text" name="movie_gross" value ="<?php echo $movie_row['box_office'];  ?>"/>
				</div>

				<div class="input">	
					<label>Summary:</label>
					<!-- <p><?php echo $movie_row['synopsis'];  ?>"</p> -->
					<input type="text" name="movie_summary" value ="<?php echo $movie_row['synopsis'];  ?>" wrap ="hard" rows = "4">
				</div>


<!-- For user to edit information on current page-->
				<div id="button">
					<input type="submit" value="Edit" />
				</div>

			</form>

<!-- For user to change or upload poster image.. -->
			<form action="imageupload.php" method="post" enctype="multipart/form-data">

					<input type="file" name="fileToUpload" id="fileToUpload" />
					<br>
					<input type="submit" name="Change Poster">
			</form>

	</div>

</div>

<footer>
		<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>
	
</body>
</html> 