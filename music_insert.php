<?php 

session_start();

if(isset($_SESSION["UserID"])){
    ?>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css" type="text/css">
<style>
	tr:nth-child(odd){
  background-color:rgba(70, 65, 89,0.4);
	}
  tr:nth-child(even){
  background-color:rgba(70, 65, 89,0);

}
</style>	
<title> Hi-Fi - Music Registration </title>

<body>
	<script src="music_script.js">
	</script>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large secondcolor" onclick="w3_close()">Close &times;</button>
  <a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
  <a href="user_profile.php" class="w3-bar-item w3-button"> My Profile</a>
  <a href="music_insert.php" class="w3-bar-item w3-button"> Register New Music </a>
  <a href="music_view.php" class="w3-bar-item w3-button"> View Music </a>
  <a href="music_EditView.php" class="w3-bar-item w3-button"> Edit Music </a> 
  <a href="music_DeleteView.php" class="w3-bar-item w3-button"> Delete Music </a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout </a><br>
</div>

<div id="main">

<div class="maincolor">
  <button id="openNav" class="w3-button maincolor w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
<center>
<h1>Hi-Fi</h1>



	</div>
</div>
<div class="w3-container">
<center>
<h1>Insert New Music</h1>
	<br><br>
		

<form action="music_insertDB.php" method="POST" name="musicinput" enctype="multipart/form-data">

<table>
<tr>
	<th>Song Name </th>
	<th><input type="text" name="songname" required></th>
</tr>
<tr>
	<th>Album Name</th>
	<th><input type="text" name="albumname" required> </th>
	
</tr>
<tr>
	<th>Artist Name </th>
	<th><input type="text" name="artistname" required></th>
</tr>
<tr>
	<th>Featuring Artist Name </th>
	<th><input type="text" name="featartistname"></th>
</tr>
<tr>
	<th>Song Genre </th>
	<th><input type="text" name="songgenre" required></th>
</tr>
<tr>
	<th>Song Lyric </th>
	<th><textarea name="songlyric" placeholder="Break lines using enter" required></textarea></th>
</tr>
 <tr>
	<th>Album Image</th>
	<th><input type="file" name="albumimage" accept="image/*" required></th>
</tr>

<tr>
	<th>Music Audio </th>
	<th><input type="file" name="songplayer" accept=".mp3" required></th>
</tr>

</table>
<br><br>	
<a onclick="goBack()" class="cancel"> Back </a>
<input type="submit" value="Submit">
</form>
</center>

</div>
</div>
<?php 
}
else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}
?>
</body>
</html>