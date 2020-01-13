<?php 

session_start();
function slug($z){
	$z = str_replace("'", "''", $z);
    return $z;
}

if(isset($_SESSION["UserID"])){
    ?>

<script src="music_script.js"></script>

<html>

<head><script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> Hi-Fi - Music Record </title>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
<a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
<a href="user_profile.php" class="w3-bar-item w3-button"> My Profile</a>
  <a href="music_view.php" class="w3-bar-item w3-button"> View Music </a>
  <a href="music_EditView.php" class="w3-bar-item w3-button"> Edit Music </a> 
<a href="logout.php" class="w3-bar-item w3-button">Logout </a><br>
    </div>
<?php 
    }
    else{
        ?>
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


    <?php 
    }
    ?>
<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <h1>Music Record</h1>
  </div>
  </div>
  <br><br>
<center>
<?php

$songID = $_POST['songID'];
$songname = $_POST['songname'];
$albumname = $_POST['albumname'];
$artistname = $_POST['artistname'];
$featartistname = $_POST['featartistname'];
$songgenre = $_POST['songgenre'];
$songlyric = $_POST['songlyric'];
$songstatus = $_POST['songstatus'];
$albumimage = $_POST['albumimage'];
$songlyric = slug($songlyric);

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
	$queryUpdate = "UPDATE MUSIC SET Song_Name = '".$songname."', Album_Name = '".$albumname."', Artist_Name = '".$artistname."', Featuring_Artist_Name = '".$featartistname."', Song_Genre =  '".$songgenre."', Album_Image = '".$albumimage."', Song_Lyric = '".$songlyric."', Song_Status = '".$songstatus."' WHERE Song_ID = '".$songID."'  "; 
	
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


</center>
</body>
</html>
<?php 
}

else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}

?>