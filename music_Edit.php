<!DOCTYPE html>
<html>
<head><title>Song Update</title></head>

<body>
<h3>Song Edit Details</h3>

<?php

$albumname = $_POST['albumname'];
$songname = $_POST['songname'];
$artistname = $_POST['artistname'];
$featartistname = $_POST['featartistname'];
$songgenre = $_POST['songgenre'];

$host = "localhost";
$user = "root";
$password = "";
$database = "hi-fi";

$link = mysqli_connect($host,$user,$password,$database);

if(!$link)
{
	die ("Could not connect to database".mysqli_connect_error($link));
}
else
{
	$queryUpdate = "UPDATE MUSIC SET Song_Name = '".$songname."', Artist_Name = '".$artistname."', Featuring_Artist_Name = '".$featartistname."', Song_Genre =  '".$songgenre."' WHERE Album_Name = '".$albumname."' "; 
	
	$resultUpdate = mysqli_query($link, $queryUpdate);
	
	if(!$resultUpdate)
	{
		die ("Query problematic: ". mysqli_error($link)); 
	}
	else
	{
		echo "Record has been updated into database";
		echo "<br><br>";
		echo "Click <a href='music_view.php'> here </a> to view Music list";
	}
}
?>



</body>
</html>