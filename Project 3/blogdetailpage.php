<?php
session_start();
include("blogconfig.php");

$blogid=$_GET['blogid'];
$_SESSION["username"] = $authorname;


$singlequery = "SELECT * FROM blogs where blogid = '$blogid'";
$resultquery = mysqli_query($blogdb,$singlequery);
while($singlerow = mysqli_fetch_array($resultquery)){
	$title = $singlerow['title'];

}



?>

<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href ="blogstyle.css" />
	<link rel="icon" href="images/Logo.png" type="image/png" sizes="16x16">
</head>

<body>

	<header><a href="blogpage.php">MyBraggr</a></header>

	<div id="out">
		<a href="loginpage.php"><p>Log Out</p></a>
	</div>

<?php

	echo "<div id='article'>";
		echo "<h2>".$title."</h2>";
		echo "<h3>".($singlerow['author'])."</h3>";
		echo "<br>";
		echo "<h3>".($singlerow['topic'])."</h3>";
		echo "<p>".($singlerow['content'])."</p>";
	echo "</div>";

?>


<footer>
	<p>&copy;Florence Poh 2866137/MSC Applied Digital Media</p>
</footer>

</body>
</html>
