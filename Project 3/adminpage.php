<?php
include("blogconfig.php");
session_start();

$authorname = $_SESSION["username"];
// $_SESSION["updateblog"] = $blogid;

$blog_query = "SELECT title,summary FROM blogs WHERE author = '$authorname' ORDER BY entrydate DESC LIMIT 10";
$blog_display = mysqli_query($blogdb,$blog_query);


if($_SERVER["REQUEST_METHOD"] == "POST"){

	$blogtitle = mysqli_real_escape_string($blogdb,$_POST['title']);
	$blogtopic = mysqli_real_escape_string($blogdb,$_POST['topic']);
	$blogcontent = mysqli_real_escape_string($blogdb,$_POST['content']);
	$blogsummary = mysqli_real_escape_string($blogdb,$_POST['summary']);	


	$insertblog = "INSERT INTO blogs (author, title,topic,content,summary) VALUES ('$authorname','$blogtitle','$blogtopic','$blogcontent','$blogsummary')";


	$update_blog = mysqli_query($blogdb,$insertblog);
	//echo $update_blog;
}

?>


<html>
<head>
	<title>Welcome <?php echo $authorname; ?></title>
	<link rel="stylesheet" href ="blogstyle.css" />
	<link rel="icon" href="images/Logo.png" type="image/png" sizes="16x16">
</head>

<body>

	<header>MyBraggr</header>

	<div id="out">
		<a href="loginpage.php"><p>Log Out</p></a>
	</div>
	<div id="see">
		<a href="blogpage.php"><p>See who's Bragging!</p></a>
	</div>

	<div id="settings">
		<a href="profilepage.php"><img src="images/settings.png" alt="Settings"></a>
	</div>

	<div id="empty">
		<p></p>
	</div>


	<form method="post" align = "center" id="blog">

		<label id="top">Title:</label>
		<input type="text" name="title" placeholder="Title of your blog...">
		<br><br>

		<label>Topic:</label>
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
		<br><br>

		<label>Say what...</label>
		<input type="text" name="content">
		<br><br>

		<label>Summary:</label>
		<input type="text" name="summary" placeholder="Summarise your brag...">
		<br><br>

		<input type="submit" value=" Brag It! " id="bragit">

	</form>


	<article>
		<h3>Previous Brags</h3>


		<div id="entries">
			<?php
				while($blog_row = mysqli_fetch_array($blog_display)){
					echo "<div class='brag'>";
					echo "<h1>".($blog_row['title'])."</h1>";
					echo "<br>";
					echo "<p>".($blog_row['summary'])."</p>";
					echo "</div>";
				}

			?>

		</div>
	</article>


<footer>
	<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>
	
</body>
</html>