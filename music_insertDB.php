<html>
	
<?php 

function slug($z){
	$z = str_replace("'", "''", $z);
    return trim($z, "'");
}

session_start();

if(isset($_SESSION["UserID"])){
   
$host = "localhost";
$username = "root";
$password = "";
$database = "hi-fi";

$albumname = $_POST['albumname'];
$songname = $_POST['songname'];
$artistname = $_POST['artistname'];
$featartistname = $_POST['featartistname'];
$songgenre = $_POST['songgenre'];
$songlyric = $_POST['songlyric'];
$songlyric = slug($songlyric);

if(isset($featartistname))
{
	$featartistname = "-";
}

$link = mysqli_connect($host,$username,$password,$database);

if(!$link)
{
	die("Woi database tak connected la sia " .mysqli_connect_error($link));
}
else
{
	$query = "INSERT into `music` VALUES('$songname','$albumname','$artistname','$featartistname','$songgenre','$songlyric')";
	$query_result = mysqli_query($link,$query);
	
	if(!$query_result)
	{
		die("Query salah nigga :/ " .mysqli_error($link));
	}
	else{
	
	

?>
<head>
<script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> CHANGE TITLE ACCORDINGLY </title>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
  <a href="music_insert.php" class="w3-bar-item w3-button"> Register New Music </a>
  <a href="music_view.php" class="w3-bar-item w3-button"> View Music </a>
  <a href="music_EditView.php" class="w3-bar-item w3-button"> Edit Music </a> 
  <a href="music_DeleteView.php" class="w3-bar-item w3-button"> Delete Music </a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout </a><br>
</div>
<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
<center>
<h1> YOUR MUSIC  </h1>
</center>
  </div>
</div><br><br>
<center>
<table border="border">
<tr>
	<th>Song Name </th>
	<th><?php echo $songname ?></th>
</tr>
<tr>
	<th>Album Name</th>
	<th><?php echo $albumname ?></th>
	
</tr>
<tr>
	<th>Artist Name </th>
	<th><?php echo $artistname ?></th>
</tr>
<tr>
	<th>Featuring Artist Name </th>
	<th><?php echo $featartistname ?></th>
</tr>
<tr>
	<th>Song Genre </th>
	<th><?php echo $songgenre ?></th>
</tr>
<tr>
	<th>Song Lyric </th>
	<th><?php echo $songlyric; ?></th>
</tr>
</table><br><br>
<?php 
echo "Your Music has been successfully uploaded!";
	}
}
?>
<br>
Click <a href="music_view.php"> HERE </a> to view your Musics 
</center>
</html>
<?php
}
else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}
?>
