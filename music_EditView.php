<!DOCTYPE html>
<html>
<head><title> Update Song </title></head>

<body>
<center>
<h3> Song Update View </h3>

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
			<th>Album Name</th>
			<th>Song Name</th>
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
			<td><?php echo $baris['Song Name']; ?></td>
			<td><?php echo $baris['Album Name']; ?></td>
			<td><?php echo $baris['Artist Name']; ?></td>
			<td><?php echo $baris['Featuring Artist Name']; ?></td>
			<td><?php echo $baris['Song Genre']; ?></td>
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