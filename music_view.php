<?php 

function slug($z){
	$z = nl2br($z);
	$z = str_replace("'", "'", $z);
	return $z;
}

session_start();

if(isset($_SESSION["UserID"])){
    ?>

<script src="music_script.js"></script>

<html>


<head><script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="MBD/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="MBD/css/mdb.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css" type="text/css">

<title> Hi-Fi - Music Record </title>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large secondcolor"	 onclick="w3_close()">Close &times;</button>
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
  <button id="openNav" class="w3-button maincolor w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <center>
  <h1>Hi-Fi</h1>
  </div>
  </div>
  <br>
  <center>
	<h1>Music Record</h1><br>
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
	if($_SESSION["UserType"] == "Normal"){
	$Query = "Select * from music where Song_Status='Approved'";
	}
	else{
		$Query = "Select * from music";
	}
	
	$resultGet = mysqli_query($link,$Query);
	
	$row = mysqli_num_rows($resultGet);
	
	if($row > 0){
	if(!$resultGet)
	{
		die("Unable to get query: ". mysqli_error($link));
	}
	else
	{
		?>
		<center>
		<table class="table">
		<thead class="black white-text">
		<tr>
			<th scope="col">Album Image</th>
			<th scope="col">Song Name</th>
			<th scope="col">Album Name</th>
			<th scope="col">Artist Name</th>
		</tr>
		</thead>
		<tbody>
		<?php	
			while($baris = mysqli_fetch_array($resultGet,MYSQLI_BOTH)){
				?>
				<form action="music_viewDetails.php" method="POST">
				<tr>
				<td  scope="row"><button type="submit" class="hover hilang" name="songID" value="<?php echo $baris['Song_ID']; ?>";>
				<div class="view overlay">
  <img src="images\<?php echo $baris['Album_Image']; ?>" width="150px" class="img-fluid " alt="smaple image">
  <div class="mask flex-center rgba-white-strong">
      <p class="green-text"><b>View Song</b></p>
  </div>
			</button></form></td>
					<td><?php echo $baris['Song_Name']; ?></td>
					<td><?php echo $baris['Album_Name']; ?></td>
					<td><?php echo $baris['Artist_Name']; ?></td>
						
				</tr>
				
	
<?php
} ?>
</tbody>
				</table>
<br>

<p class="disclaimer"> You can click on any Album Image to view more detailed information about the music </p>
<?php
}
	}
	else
{
	echo "Record is empty or no songs are approved yet.";
}
}

?>
</center>


<?php 
}
else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}

?>
<script type="text/javascript" src="MBD/js/jquery.min.js"></script>
<script type="text/javascript" src="MBD/js/popper.min.js"></script>
<script type="text/javascript" src="MBD/js/bootstrap.min.js"></script>
<script type="text/javascript" src="MBD/js/mdb.min.js"></script>
</body>

</html>
