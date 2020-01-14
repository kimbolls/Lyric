<html>
	
<?php 

function slug($z){
	$z = str_replace("'", "''", $z);
    return $z;
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
$songstatus = "Pending";
$userID = $_SESSION['UserID'];
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
$albumimage = basename($_FILES['albumimage']["name"]);
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES['albumimage']["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["albumimage"]["tmp_name"], $target_file)) {
      
    } else {
		echo "Sorry, there was an error uploading your image . Error value: ".$_FILES["albumimage"]["error"];
		$uploadOk = 0;
    }
    
    $songplayer= basename($_FILES["songplayer"]["name"]);
    $target_dir = "musics/";
    $target_file = $target_dir . basename($_FILES['songplayer']["name"]);
    $uploadOk = 1;
    $songFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  
     
        if (move_uploaded_file($_FILES["songplayer"]["tmp_name"], $target_file)) {
        } else {
        echo "Sorry, there was an error uploading your music. Error value: ".$_FILES["songplayer"]["error"];
        $uploadOk = 0;
        }
    
}

	$query = "INSERT into `music` VALUES(NULL,'$songname','$albumname','$artistname','$featartistname','$songgenre','$albumimage','$songlyric','$songplayer','$songstatus','$userID')";
	$query_result = mysqli_query($link,$query);
	
	if(!$query_result || $uploadOk == 0)
	{
		die("Your query or file uploaded is incorrect " .mysqli_error($link));
	}
	else{
	
	

?>
<head>
<script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> Music Insert </title>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
  <a href="user_profile.php" class="w3-bar-item w3-button"> My Profile</a>
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

  </div>
</div><br><br><center>
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

