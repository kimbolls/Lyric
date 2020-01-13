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


<head><script src="music_script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> Hi-Fi - Music Record </title>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
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

$host = "localhost";
$user = "root";
$pass = "";
$database = "hi-fi";

$link = mysqli_connect($host,$user,$pass,$database);

if(!$link)
{
	die ("Unable to connect: " . mysqli_connect_error($link));
}
else
{
	$Query = "Select * from music";
	
	$resultGet = mysqli_query($link,$Query);
	
	if(!$resultGet)
	{
		die("Unable to get query: ". mysqli_error($link));
	}
	else
	{
		?>
		<center>
		<table border = "2" >
		<tr>
			<th>Album Image</th>
			<th>Song Name</th>
			<th>Album Name</th>
			<th>Artist Name</th>
			
		</tr>
		
		<?php	
			while($baris = mysqli_fetch_array($resultGet,MYSQLI_BOTH)){
				?>
			<center>	<form action="music_viewDetails.php" method="POST">
				<tr>
				<td><button type="submit" name="songID" value="<?php echo $baris['Song_ID']; ?>";>
			<img src="images\<?php echo $baris['Album_Image']; ?>" width="150px" />
			</button></form></td>
					<td><?php echo $baris['Song_Name']; ?></td>
					<td><?php echo $baris['Album_Name']; ?></td>
					<td><?php echo $baris['Artist_Name']; ?></td>
						
				</tr>
	
<?php
}
}
}

?>
</table>
<br>

<h8> You can click on any Album Image to view more detailed information about the music </h2>
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
