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
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> Hi-Fi - Music Record </title>
</head>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
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
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
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

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <h1>Music Details</h1>
  </div>
  </div>
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
	die ("Could not connenct to database".mysqli_connect_error($link));
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

        while($baris = mysqli_fetch_assoc($resultGet))
        {
            ?>


  <br><img class="card-img-top" src="images\<?php echo $baris['Album_Image']; ?>" alt="Album Image Here">
  <p class="card-text"><audio controls>
  <source src="musics/<?php echo $baris['Song_Player']; ?>" type="audio/mp3"></p>

<table border="1">
<tr>
<th colspan="2"><h3 class="card-title" ><b><?php echo $baris['Song_Name']; ?></b></h5> </th>

</tr>
<tr>
  <td class="card-text">Artist : </td>
  <th><p class="card-text"><?php echo $baris['Artist_Name']; ?></p></th>
</tr>
<tr>
  <td class="card-text">Album Name : </td>
  <th><p class="card-text"><?php echo $baris['Album_Name']; ?></p></th>
</tr>
<tr>
  <td class="card-text">Featuring Artist : </td>
  <th><p class="card-text"><?php echo $baris['Featuring_Artist_Name']; ?></p></th>
</tr>
<tr>
  <td class="card-text">Song Genre : </td>
  <th><p class="card-text"><?php echo $baris['Song_Genre']; ?></p></th>
</tr>

<tr>
  <td class="card-text">Song Status : </td>
  <th><p class="card-text"><?php if($baris['Song_Status']=="Pending"){echo "<font color='red'>";}else{echo "<font color='green'>";}
   echo $baris['Song_Status']; ?></p></th>
</tr>
<tr>
  <td class="card-text">Uploaded by : </td>
  <th><p class="card-text"><?php echo $baris['UserID']; ?></p></th>
</tr>
</table>

    
  <p class="card-text">Song Lyrics :</p>
  
  <p class="card-text"><?php echo slug($baris['Song_Lyric']); ?></p>
        


<br>
<a href="music_view.php"> Click here to go back </a>
  

<?php
        }
    }
  }
}
  else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
  }
  ?>
  </body>
  </html>