<?php 
session_start();

if(isset($_SESSION["UserID"])){
    ?>



<html>
<head>
<script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css" type="text/css">
<title> Hi-Fi - HomePage </title>

<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large secondcolor" onclick="w3_close()">Close &times;</button>
<a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
<a href="user_profile.php" class="w3-bar-item w3-button"> My Profile</a>
  <a href="music_view.php" class="w3-bar-item w3-button"> View Music </a>
  <a href="music_EditView.php" class="w3-bar-item w3-button"> Edit Music </a> 
<a href="logout.php" class="w3-bar-item w3-button">Logout </a><br>
    </div>
	<div id="main">

	<div class="maincolor">
  <button id="openNav" class="w3-button maincolor w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
	<center>
	<h1> Welcome to Hi-Fi, <?php echo $_SESSION["UserID"];?> </h1>

<form name="Search" action="music_searchview.php" method="POST">
Search:	<input type="text" name="search" required>
<input type="submit" value="Go">
</form>
 </div>
 </div>
 
  <div class="homemenu"  style="height:80vh;"><center> <a href="music_view.php"> <input style="margin-top:235px;"  type="submit" value="View Songs"> </a> </center></div>
   <div class="homemenu"  style="height:80vh;"> <center><a href="music_EditView.php"> <input style="; margin-top:235px;" type="submit" value="Edit Songs"> </a></center> </div>

	
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
<div id="main">

<div class="maincolor">
  <button id="openNav" class="w3-button maincolor w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
<center>
<h1> Welcome to Hi-Fi, <?php echo $_SESSION["UserID"];?> </h1>

<form name="Search" action="music_searchview.php" method="POST">
Search:	<input type="text" name="search" required>
<input type="submit" value="Go">
</form>
 </div>
 </div>
 
  <div class="homemenu"  style="height:80vh;">
  <center>
<h1>Your Music Archive</h1>
<h3> Hi-Fi provides you with storing all your great musics </h3>
   <a href="music_insert.php"> <input style="margin-right:10px; margin-top:100px;"  
   type="submit" value="Upload Your Song"> </a> </center></div>
   <div class="homemenu"  style="height:80vh;">
   <center> <a href="music_view.php">  <input style="margin-top:100px;" 
   type="submit" value="View Your Song"> </a></center> </div>

 
	
    <?php 
    }
    ?>

</center>
</body>
</html>

<?php 
}
else{
    echo "<center>No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a></center>";
}

?>
   


