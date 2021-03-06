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
<style>
	tr{
  background-color:rgba(70, 65, 89,0.4);
}

tr:hover{
  transition: .5s ease;
  background-color:rgba(51, 47, 65, 0.4);
}
	</style>
<title> Hi-Fi - Music Record </title></head>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large secondcolor" onclick="w3_close()">Close &times;</button>
<a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
<a href="user_profile.php" class="w3-bar-item w3-button"> My Profile </a>
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
  <a href="user_profile.php" class="w3-bar-item w3-button"> My Profile </a>
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
  <br><br>
<center>
	<h1>Music Delete</h1><br>
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
	$UserID = $_SESSION['UserID'];
	$queryGet = "select * from music where UserID = '$UserID'";
	$resultGet = mysqli_query($link,$queryGet);
	
	$row = mysqli_num_rows($resultGet);
	
	if($row > 0){
	if(!$resultGet)
	{
		die ("Invalid Query: ".mysqli_error($link));
	}
	else
	{
		?>
		<center>
		<table class="table table-hover">
		<thead class="black white-text">
		<tr>
			<th scope="col">Album Image</th>
			<th scope="col">Song Name</th>
			<th scope="col">Album Name</th>
			<th scope="col">Artist Name</th>
		</tr>
		</thead>
	<tbody>
		<form action="music_Delete.php" name="DeleteForm" method="POST" onSubmit="return confirm('Are you sure?')">
		
		
		<?php
		while($baris = mysqli_fetch_array($resultGet,MYSQLI_BOTH))
		{
			?>
			<tr>
			<th scope="row">
			<button type="submit" name="songID" class="hilang"value="<?php echo $baris['Song_ID']; ?>";></td>
			<div class="view overlay">
  <img src="images\<?php echo $baris['Album_Image']; ?>" width="150px" class="img-fluid " alt="smaple image">
  <div class="mask flex-center rgba-white-strong">
      <p class="red-text"><b>Delete Song</b></p>
  </div>
			</button>
			</th>
				
				<td><?php echo $baris['Song_Name'];?></td>
				<td><?php echo $baris['Album_Name'];?></td>
				<td><?php echo $baris['Artist_Name'];?></td>
			</tr>
<?php
		}
		}
?>
		</table>
		<br>
		</form>
		<h8> Click on any Album Image to delete song </h8><br><br>
		<a onclick='goBack()' class='cancel'> Back </a>
<?php
	}
else
{
	echo "No record found. You can only delete your own records";
	echo "<br><br><a onclick='goBack()' class='cancel'> Back </a>";
}
	}
?>
</center>
</body>
</html>
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