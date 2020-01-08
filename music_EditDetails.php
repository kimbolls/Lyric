<!DOCTYPE html>
<head>
<html><title>Song Update</title></head>

<body>
<center>
<h1> Song Edit Details</h1>

<?php

$songname = $_POST['songname'];


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
	$queryGet = "select * from music where Song_Name = '$songname' ";
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
		<table>
		<tr>
			<th>Song Name: </th>
			<td><?php echo $baris['Song_Name']; ?></th>
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
			<th>Song Genre: </th>
			<th><input type="text" name="songgenre" value=" <?php echo $baris['Song_Genre']; ?>" required></th>
		</tr>
		</table>		
			<?php
		}
			?>
			
			<input type="hidden" name="songname" value="<?php echo $songname ?>">
			<input type="Submit" value="Update new details">
			</form>
			</center>
			<?php
	}
	
}
	?>

</body>
</html>