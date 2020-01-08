<?php 

session_start();

if(isset($_SESSION["UserID"])){
    ?>
<html>
<head><title> Update Song </title></head>

<body>
<head>
<script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> Hi-Fi - Music Registration </title>
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
<h1> WELCOME, Hi <?php echo $_SESSION["UserID"];?> </h1>
</center>
  </div>
</div>
<center>
<h3> Song Update View </h3>
<script src="music_script.js"></script>
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
		</tr>
<form action="music_EditDetails.php" name="UpdateForm" method="POST">

<?php 
	
	while($baris = mysqli_fetch_array($resultGet, MYSQLI_BOTH)) 
	{
		?>
		
		<tr>
			<td><input type="radio" name="songname" value="<?php echo $baris['Song_Name'];?>" required></td>
			<td><?php echo $baris['Song_Name']; ?></td>
			<td><?php echo $baris['Album_Name']; ?></td>
			<td><?php echo $baris['Artist_Name']; ?></td>
			<td><?php echo $baris['Featuring_Artist_Name']; ?></td>
			<td><?php echo $baris['Song_Genre']; ?></td>
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
}
else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}


 ?>

</center>
</body>
</html>