<html>
<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "hi-fi";

$albumname = $_POST['albumname'];
$songname = $_POST['songname'];
$artistname = $_POST['artistname'];
$featartistname = $_POST['featartistname'];
$songgenre = $_POST['songgenre'];

if(isset($featartistname))
{
	$featartistname = "-";
}

$link = mysqli_connect($host,$username,$password,$database);

if(!$link)
{
	die("Woi database tak konekted la sial " .mysqli_connect_error($link));
}
else
{
	$query = "INSERT into music  VALUES('$albumname','$songname','$artistname','$featartistname','$songgenre')";
	$query_result = mysqli_query($link,$query);
	
	if(!$query_result)
	{
		die("Query salah nigga :/ " .mysqli_error($link));
	}
	else{
	
	

?>
<center>
<table border="border">
<tr>
	<th>Album Name</th>
	<th><?php echo $albumname ?></th>
</tr>
<tr>
	<th>Song Name </th>
	<th><?php echo $songname ?></th>
</tr>
<tr>
	<th>Artist Name </th>
	<th><?php echo $artistname ?></th>
</tr>
<tr>
	<th>Featuring Artist Name </th>
	<th><?php echo $featartistname ?></th>
</tr>
<tr>
	<th>Song Genre </th>
	<th><?php echo $songgenre ?></th>
</tr>
</table><br><br>
<?php 
echo "Your Music has been successfully uploaded!";
	}
}
?>
<br>
Click <a href="music_view.php"> HERE </a> to view your Musics 
</center>
</html>
