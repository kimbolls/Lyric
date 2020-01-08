<!DOCTYPE html>
<head>
<html><title>Song Update</title></head>

<body>
<center>
<h1> Song Edit Details</h1>

<?php

$albumname = $_POST['albumname'];


$host = "localhost";
$user = "root";
$password = "";
$database = "hi-fi";

$link = mysqli_connect($host,$user,$password,$database);

if(!$link)
{
	die ("Could not connenct to database".mysqli_connect_error($link));
}
else
{
	$queryGet = "select * from music where Album_Name = '$albumname' ";
	$resultGet = mysqli_query($link,$queryGet);
	
	if(!$resultGet)
	{
		die ("Invalid Query - get Music list: ".mysqli_error($link));
	}
	else
	{
 ?>
		<form action="music_Edit.php" name="UpdateMusic" method="POST">
		
		
		<?php
		
		while($baris = mysqli_fetch_assoc($resultGet))
		{
			
			?>
			
			<br><br>Album Name: <?php $selectedalbumname = $baris['Album_Name']; ?>
			<?php echo $baris['Album_Name'];?>
			
			<br><br>Song Name: <input type="text" name="songname" value="<?php echo $baris['Song_Name']; ?>" required>
			<br><br>Artist Name: <input type="text" name="artistname" value=" <?php echo $baris['Artist_Name']; ?>" required>
			<br><br>Feat Artist Name: <input type="text" name="featartistname" value=" <?php echo $baris['Featuring_Artist_Name']; ?>" required>
			<br><br>Song Genre: <input type="text" name="songgenre" value=" <?php echo $baris['Song_Genre']; ?>" required>
			<?php
		}
			?>
			<br><br>
			<input type="hidden" name="albumname" value="<?php echo $albumname ?>">
			<input type="Submit" value="Update new details">
			</form>
			</center>
			<?php
	}
	
}
	?>

</body>
</html>