<!DOCTYPE html>
<html>
<head><title>Song Delete</title></head>

<body>
<h3>Song Deleted</h3>

<?php
$albumname = $_POST['albumname'];

$host = "localhost";
$user = "root";
$password = "";
$database = "hi-fi";

$link = mysqli_connect($host,$user,$password,$database);

if(!$link)
{
	die ("Could not connect to Database: ".mysqli_connect_error($link));
}
else
{
	$queryDelete = "delete from music where Album_Name = '$albumname' ";
	$resultDelete = mysqli_query($link,$queryDelete);
	
	if(!$resultDelete)
	{
		die("Query Problematic: ".mysqli_error($link));
	}
	else
	{
		echo "Record has been deleted from database.";
		echo "<br><br>";
		echo "Click <a href='music_view.php'> Here </a> to view music list";
	}
}

?>


</body>
</html>
