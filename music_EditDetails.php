<!DOCTYPE html>
<head><title>Song Update</title></head>

<body>
<h3> Song Edit Details</h3>

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
	$queryGet = "select * from music where Album Name = '".$albumname."' ";
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
	
	while($baris = mysqli_fetch_array($resultGet, MYSQLI_BOTH))
	{
		?>
		<br><br>Album Name: <?php $selectedalbumname = $baris['Album Name'];
		echo $baris['Album Name']; ?>
		
		<br><br>Song Name: <input type="text" name="songname" value="<?php echo $baris['Song Name']; ?>" required>
		<br><br>Artist Name: <input type="text" name="artistname" value=" <?php echo $baris['Artist Name']; ?>" required>
		<br><br>Feat Artist Name: <input type="text" name="featartistname" value=" <?php echo $baris['Featuring Artist Name']; ?>" required>
		<br><br>Song Genre: <input type="text" name="songgenre" value=" <?php echo $baris['Song Genre']; ?>" required>
		<?php
	}
		?>
		<br><br>
		<input type="hidden" name="albumname" value="<?php echo $selectedalbumname; ?>">
		<input type="Submit" value="Update new details">
		</form>
	</php
	}
}
	?>

</body>
</html>