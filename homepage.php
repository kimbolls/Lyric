<?php 

session_start();

if(isset($_SESSION["UserID"])){
    ?>

<html>
<head>
<script src="music_script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title> Hi-Fi - Music Registration </title>
<body>
<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
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
<center>
<h1> WELCOME, Hi <?php echo $_SESSION["UserID"];?> </h1>

<form name="Search" action="music_searchview.php" method="POST">
Search:	<input type="text" name="search" required>
<input type="submit" value="Go">
</form>
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
    </div>
</div>

