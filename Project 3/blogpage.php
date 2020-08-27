<?php
session_start();
include("blogconfig.php");


$_SESSION["username"] = $authorname;

$blog_query = "SELECT * FROM blogs ORDER BY entrydate DESC LIMIT 11";
$blog_display = mysqli_query($blogdb,$blog_query);
$blog_row = mysqli_fetch_array($blog_display);

// $braggrquery = "SELECT * FROM blogs WHERE author = '$authorname'";
// $braggrdisplay = mysqli_query($blogdb,$blog_query);
// $braggrrow = mysqli_fetch_array($blog_display);


// $topicquery = "SELECT * FROM blogs WHERE topic = '$blogtopic'";

?>

<html>
<head>
	<title>Blog Page</title>
	<link rel="stylesheet" href ="blogstyle.css" />
	<link rel="icon" href="images/Logo.png" type="image/png" sizes="16x16">
</head>

<body>

<header><a href="loginpage.php">MyBraggr</a></header>

	<div id="out">
		<a href="loginpage.php"><p>Let's Brag!</p></a>
	</div>


<div id="filter">
	<form method="post" align="center">
		<label>Filter by Braggr:</label>
		<select name="author">
			<option value="select">Select</option>
			<option value="flopoh">flopoh</option>
			<option value="flopoh">neilwalshe</option>
			<option value="flopoh">felipe</option>
			<option value="flopoh">sanjeev</option>
			<option value="flopoh">patty</option>
		</select>
	
		<label>Filter by Topic:</label>
		<select name="topic">
			<option value="select">Select</option>
			<option value="Business">Business</option>
			<option value="Food">Food</option>
			<option value="Fashion">Fashion</option>
			<option value="Lifestyle">Lifestyle</option>
			<option value="Movies">Movies</option>
			<option value="Music">Music</option>
			<option value="Technology">Technology</option>			
			<option value="Travels">Travels</option>			
			<option value="Other">Other</option>
		</select>
	</form>
</div>

<div>
<?php
	while($blog_row = mysqli_fetch_array($blog_display)){
		echo "<div class='art'>";
		$blogid = $blog_row['blogid'];
		echo "<h2><a href='blogdetailpage.php?blogid='".$blogid."'>".($blog_row['title'])."</a></h2>";	
		echo "<h3>by <a href='profilepage.php'>".($blog_row['author'])."</a></h3>";	
		echo "<p>".($blog_row['content'])."</p>";	
		echo "</div>";

		echo "<div class='line'></div>";
	}
?>
</div>




<footer>
	<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>

</body>
</html>