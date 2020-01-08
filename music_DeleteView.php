<!DOCTYPE html>
<html>
<head>
<title>Song Registration</title>
</head>


<body>
<h3>Music Delete view</h3>

<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "hi-fi";

$link = mysqli_connect($host,$user,$password,$database);

if(!$link)
{
	die ("Could not connect to database: ".mysqli_connect_error($link));
}
else
{
	$queryGet = "select * from music";
	$resultGet = mysqli_query($link,$queryGet);
	
	if(!$resultGet)
	{
		die ("Invalid Query: ".mysqli_error($link));
	}
	else
	{
		?>
		<table border="2">
		<tr>
			<th>Choose</th>
			<th>Album Name</th>
			<th>Song Name</th>
			<th>Artist Name</th>
			<th>Feat Artist Name</th>
			<th>Song Genre</th>
		</tr>
		<form action="music_DeleteDetails.php" name="DeleteForm" method="POST" onSubmit="return confirm('Are you sure?')">
		
		
		<?php
		while($baris = mysqli_fetch_array($resultGet,MYSQLI_BOTH))
		{
			?>
			<tr>
				<td><input type="radio" name="albumname" value="<?php echo $baris['Album_Name'];?>" required ></td>
				<td><?php echo $baris['Album_Name'];?></td>
				<td><?php echo $baris['Song_Name'];?></td>
				<td><?php echo $baris['Artist_Name'];?></td>
				<td><?php echo $baris['Featuring_Artist_Name'];?></td>
				<td><?php echo $baris['Song_Genre'];?></td>
			</tr>
			
<?php
		}
?>
		</table>
		<br>
		<input type="submit" value="Delete chosen Song">
		</form>
<?php
	}
}
?>

</body>
</html>