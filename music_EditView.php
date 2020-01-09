<?php 

function slug($z){
	$z = nl2br($z);
	$z = str_replace("'", "'", $z);
	return $z;
}

session_start();

if(isset($_SESSION["UserID"])){
    ?>

<script src="music_script.js"></script>

<html>
<style>	
.container {
  position: relative;
  width: 100%;
  height:50%;
}

.image {
	
margin-right:auto;
margin-left:auto;
position:relative;
  opacity: 1;
  display: block;
  width: 30%;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
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
<a href="music_insert.php" class="w3-bar-item w3-button"> Register New Music </a>
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

<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "hi-fi";

$link = mysqli_connect($host, $username, $password, $database);

if(!$link)
{
	die ("Could not connect: " .mysqli_connect_error(!$link));
}
else
{
	$queryGet = "select * from music";
	$resultGet = mysqli_query($link,$queryGet);
	
	if(!$resultGet)
	{
		die ("Invalid Quety - get Music list: ".mysqli_error($link));
	}
	else
	{
		?>
		
		<table border = "2">
		<tr>
			<th>Choose</th>
			<th>Song Name</th>
			<th>Album Name</th>
			<th>Artist Name</th>
			<th>Featuring Artist Name</th>
			<th>Song Genre</th>
			<th>Song Lyric</th>
		</tr>
<form action="music_EditDetails.php" name="UpdateForm" method="POST">

<?php 
	
	while($baris = mysqli_fetch_array($resultGet, MYSQLI_BOTH)) 
	{
		?>
		
		<tr>
			<th><input type="radio" name="songname" value="<?php echo $baris['Song_Name'];?>" required>
			<div class="container">
  <img src="images\<?php echo $baris['Album_Image']; ?>"  class="image" >
  <div class="middle">
    <div class="text"><?php echo $baris['Song_Name']; ?></div>
  </div>
</div>
	</td>
			<td><?php echo $baris['Song_Name']; ?></td>
			<td><?php echo $baris['Album_Name']; ?></td>
			<td><?php echo $baris['Artist_Name']; ?></td>
			<td><?php echo $baris['Featuring_Artist_Name']; ?></td>
			<td><?php echo $baris['Song_Genre']; ?></td>
			<td><?php echo slug($baris['Song_Lyric']); ?></td>
		</tr>
<?php 
	}
 ?>
	</table>
	<br>
	<input type="Submit" value="Update chosen album">
	</form>
<?php  

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