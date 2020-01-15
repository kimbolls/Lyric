<?php 



session_start();
function slug($z){
	$z = nl2br($z);
	$z = str_replace("'", "'", $z);
	return $z;
}
if(isset($_SESSION["UserID"])){
    ?>

<script src="music_script.js"></script>

<html>

<head><script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="style.css">
<title> Hi-Fi - Music Record </title>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large secondcolor" onclick="w3_close()">Close &times;</button>
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
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large secondcolor"
  onclick="w3_close()">Close &times;</button>
  <a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
  <a href="user_profile.php" class="w3-bar-item w3-button"> My Profile</a>
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

<div class="maincolor">
  <button id="openNav" class="w3-button w3-xlarge maincolor" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <h1>Music Record</h1>
  </div>
  </div>
  <br><br>
<center>
<?php

$songID = $_POST['songID'];

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
	$queryGet = "select * from music where Song_ID = '$songID' ";
	$resultGet = mysqli_query($link,$queryGet);
	
	if(!$resultGet)
	{
		die ("Invalid Query - get Music list: ".mysqli_error($link));
	}
	else
	{
 ?>
		
		
		
		<?php
		
		while($baris = mysqli_fetch_assoc($resultGet))
		{
			if($_SESSION["UserType"] == "Normal"){
				
			?>
			<form action="music_Edit.php" name="UpdateMusic" method="POST" enctype="multipart/form-data">
			<table>
		<tr>
			<th>Song Name: </th>
			<th><input type="text" name="songname" value="<?php echo $baris['Song_Name']; ?>"></th>
		</tr>
		
		<tr>
			<th>Album Name:</th>
			<th> <input type="text" name="albumname" value="<?php echo $baris['Album_Name']; ?>" required></th>
		</tr>
		<tr>
			<th>Artist Name: </th>
			<th><input type="text" name="artistname" value=" <?php echo $baris['Artist_Name']; ?>" required></th>
		</tr>
		<tr>
			<th>Feat Artist Name:</th>
			<th><input type="text" name="featartistname" value=" <?php echo $baris['Featuring_Artist_Name']; ?>" required></th>
		</tr>
		<tr>
			<th>Song Genre: </th>
			<th><input type="text" name="songgenre" value=" <?php echo $baris['Song_Genre']; ?>" required></th>
		</tr>
		
		<tr>
			<th>Album Image :</th>
			<th><input type="file" name="albumimage" accept="image/*" value="<?php echo $baris['Album_Image']; ?>"required	></th>
		</tr>
		<tr>
			<th>Song File :</th>
			<th><input type="file" name="songplayer" accept=".mp3" value="<?php echo $baris['Song_Player']; ?>"required	></th>
		</tr>
		</table>
	
			Song Lyric: 
			<textarea type="text" name="songlyric" required><?php echo $baris['Song_Lyric']; ?></textarea>
	
				
			<input type="hidden" name="songID" value="<?php echo $baris['Song_ID']; ?>">
			<input type="hidden" name="songstatus" value="<?php echo $baris['Song_Status']; ?>">
			<br>
			<a href="music_EditView.php" class="button"> Cancel </a>
			<input type="Submit" value="Update new details">
			</form>
			</center>
			<?php
			}
			else {
			?>
			<form action="music_EditAdmin.php" name="UpdateMusicAdmin" method="POST">
			<table border="border">
		<tr>
			<th>Album Image: </th>
			<td><?php echo $baris['Album_Image']; ?>"</td>
		</tr>
		<tr>
			<th>Song Name: </th>
			<td><center><?php echo $baris['Song_Name']; ?></center></th>
		</tr>
		
		<tr>
			<th>Album Name:</th>
			<td><center><?php echo $baris['Album_Name']; ?></center></th>
		</tr>
		<tr>
			<th>Artist Name: </th>
			<td><center><?php echo $baris['Artist_Name']; ?></center></th>
		</tr>
		<tr>
			<th>Feat Artist Name:</th>
			<td><center><?php echo $baris['Featuring_Artist_Name']; ?></center></th>
		</tr>
		<tr>
			<th>Song Genre: </th>
			<td><center><?php echo $baris['Song_Genre']; ?></center></th>
		</tr>
		</table>
			<br><br><b><h8>Song Lyric: </h8></b><br><br>
			<center><?php echo slug($baris['Song_Lyric']); ?></center>
		
			<br>
			<center>
				Song Status: 	
				
				<select name="songstatus">
					<option value="Approved" <?php if($baris['Song_Status'] == "Approved") echo "selected"; ?>>Approve</option>
					<option value="Pending" <?php if($baris['Song_Status'] == "Pending") echo "selected"; ?>>Pending</option>
				</select><br><br>
				</center>
				
				
			
			
			<input type="hidden" name="songID" value="<?php echo $baris['Song_ID']; ?>">
			<input type="hidden" name="songname" value="<?php echo $baris['Song_Name']; ?>">
			<input type="hidden" name="albumname" value="<?php echo $baris['Album_Name']; ?>">
			<input type="hidden" name="artistname" value="<?php echo $baris['Artist_Name']; ?>">
			<input type="hidden" name="featartistname" value="<?php echo $baris['Featuring_Artist_Name']; ?>">
			<input type="hidden" name="songgenre" value="<?php echo $baris['Song_Genre']; ?>">
			<input type="hidden" name="songlyric" value="<?php echo $baris['Song_Lyric']; ?>">
			<input type="hidden" name="albumimage" value="<?php echo $baris['Album_Image']; ?>">
			<br><a href="music_EditView.php" class="button"> Cancel </a>
			<input type="Submit" value="Update new details">
			</form>
			</center>
			<?php
	}
	
}
}
}
	?>

</body>
</html>
<?php 
}
else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}

?>