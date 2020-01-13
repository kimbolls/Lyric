<?php 

session_start();

if(isset($_SESSION["UserID"])){
    ?>
    <head>
<script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> My Profile </title>
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
  <a href="user_profile.php" class="w3-bar-item w3-button"> My Profile </a>
  <a href="music_insert.php" class="w3-bar-item w3-button"> Register New Music </a>
  <a href="music_view.php" class="w3-bar-item w3-button"> View Music </a>
  <a href="music_EditView.php" class="w3-bar-item w3-button"> Edit Music </a> 
  <a href="music_DeleteView.php" class="w3-bar-item w3-button"> Delete Music </a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout </a><br>
</div>


    <?php 
    }
   

$userID = $_SESSION["UserID"];
$usertype = $_SESSION['UserType'];
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
	$queryGet = "select * from user where UserID = '$userID' ";
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
<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
<center>
<h1>My Profile  </h1>
</center>
  </div>
</div>
<br><br>
<center>
<table>

<img src="images\<?php echo $baris['User_Image']; ?>">
<h1><?php echo $userID; ?></h1>
<p><?php echo $usertype; ?> User</p>
<?php
}
    $queryGet = "select * from music where UserID = '$userID'";
	$resultGet = mysqli_query($link,$queryGet);
	
	if(!$resultGet)
	{
		die ("Invalid Query - get Music list: ".mysqli_error($link));
	}
	else
	{

        while($baris = mysqli_fetch_assoc($resultGet))
        {
            $resultGet = mysqli_query($link,$queryGet);
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
		<table border = "2" >
		<tr>
			<th>Album Image</th>
			<th>Song Name</th>
			<th>Album Name</th>
			<th>Artist Name</th>
			
		</tr>
		
		<?php	
			while($baris = mysqli_fetch_array($resultGet,MYSQLI_BOTH)){
				?>
			<center>	<form action="music_viewDetails.php" method="POST">
				<tr>
				<td><button type="submit" class="hover" name="songID" value="<?php echo $baris['Song_ID']; ?>";>
			<img src="images\<?php echo $baris['Album_Image']; ?>" width="150px" />
			</button></form></td>
					<td><?php echo $baris['Song_Name']; ?></td>
					<td><?php echo $baris['Album_Name']; ?></td>
					<td><?php echo $baris['Artist_Name']; ?></td>
						
				</tr>
            
	
<?php
            }    
        }
        ?> 
        </table> <?php
    }
    else
echo "You have no music uploaded";
        }
    }
}
}

}
else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}
?>