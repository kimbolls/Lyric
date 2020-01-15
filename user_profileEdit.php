

<?php 
session_start();
function slug($z){
	$z = nl2br($z);
	$z = str_replace("'", "'", $z);
	return $z;
}
$userID = $_SESSION["UserID"] ;

if(isset($_SESSION["UserID"])){
?>
<head>
<script src="music_script.js"></script>
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
    
	tr:nth-child(odd){
		background-color:rgba(70, 65, 89,0.4);
	}
	tr:nth-child(even){
  background-color:rgba(70, 65, 89,0);
}
	td,th{
		padding:5px;
	}
	tr:hover{
  transition: .5s ease;
  background-color:rgba(51, 47, 65, 0.4);
}
    </style>
<title> My Profile </title>
<body>

<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left secondcolor" style="display:none" id="mySidebar">
<button class="w3-bar-item w3-button  w3-large" onclick="w3_close()">Close &times;</button>
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
  <button class="w3-bar-item w3-button w3-large "
  onclick="w3_close()">Close &times;</button>
  <a href="homepage.php" class="w3-bar-item w3-button"> Home </a>
  <a href="user_profile.php" class="w3-bar-item w3-button"> My Profile </a>
  <a href="music_insert.php" class="w3-bar-item w3-button"> Register New Music </a>
  <a href="music_view.php" class="w3-bar-item w3-button"> View Music </a>
  <a href="music_EditView.php" class="w3-bar-item w3-button"> Edit Music </a> 
  <a href="music_DeleteView.php" class="w3-bar-item w3-button"> Delete Music </a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout </a><br>
</div>
   <?php } ?>
<div id="main">

<div class="maincolor">
  <button id="openNav" class="w3-button w3-xlarge maincolor" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <h1>Edit User Profile</h1>
  </div>
  </div>
  <br><br>

    <?php 
    
   


$usertype = $_SESSION['UserType'];
$host = "localhost";
$username = "root";
$password = "";
$database = "hi-fi";
$link = mysqli_connect($host, $username, $password, $database);

if(!$link)
{
	die ("Could not connect: " .mysqli_connect_error($link));
}
else
{	
	$UserID = $_SESSION['UserID'];
	$queryGet = "select * from user where UserID = '$userID'";
	
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
<center>
            <form action="user_profileEditDetails.php" method="post" enctype="multipart/form-data">
                <table>
                <tr>
                    <th>User ID</th>
                    <td><?php echo $baris['UserID']; ?></td>
                </tr>
                <tr>
                    <th>User Type </th>
                    <td><?php echo $baris['UserType']; ?></td>
        </tr>
        <tr>
            <th>Upload Image </th>
        <td><input type="file" name="userimage" required accept="image/*" required value="<?php echo $baris['User_Image']; ?>"></td>          
        </tr>
        <tr>    
            <th>My Bio </th>
            <td><textarea rows="4" cols="50" maxlength="100" placeholder="Your bio Here! (keep it under 100 characters, or it will look ugly)" name="userbio" required><?php echo $baris['User_Bio']; ?></textarea></td>
        </tr>
        <input type="hidden" name="UserID" value="<?php echo $baris['UserID']; ?>">
        </table>
        <a onclick="goBack()" class="cancel"> Cancel </a>
        <input type="Submit" value="Update new details">
        </form>
        </center>
<?php
    }
}
}
}else{
    echo "No session exists or session has expired. Please log in again. <br>";
    echo "<a href=loginmenu.html> Login </a>";
}
?>

