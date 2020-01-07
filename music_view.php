<!DOCTYPE html>
<html>
<center>
<head><title>Display</title></head>
<body>

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
			<table border="1">
		<tr>
			<th> Album: </th>
			<th> Song: </th>
			<th> Artist:  </th>
			<th> Feat Artist: </th>
			<th> Genre: </th>
		</tr>
		
		<?php	
			while($baris = mysqli_fetch_array($resultGet,MYSQLI_BOTH)){
				?>
				
				<tr>
					<td><?php echo $baris['Album Name']; ?></td>
					<td><?php echo $baris['Song Name']; ?></td>
					<td><?php echo $baris['Artist Name']; ?></td>
					<td><?php echo $baris['Featuring Artist Name']; ?></td>
					<td><?php echo $baris['Song Genre']; ?></td>
				</tr>
	
<?php
}
}
}

?>
</table>
<br>

Click <a href="music_insert.html"> HERE </a> to insert more musics 
</center>
</html>