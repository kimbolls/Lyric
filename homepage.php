<?php 

session_start();

if(isset($_SESSION["UserID"])){
    ?>

<html>
<head>
<title> Hi-Fi - Music Registration </title>
<body>
<center>
<br>
<h1> WELCOME, Hi <?php echo $_SESSION["UserID"];?> </h1>
<p> Choose Your menu : </p>

<?php 
    if($_SESSION["UserType"]=="Admin"){
        ?>
        <a href ="music_insert.html"> Register New Music </a> <br><br>
}
<?php 
    }
    else{
        ?>
    <a href="music_insert.html"> Register New Music </a> <br><br>
    <a href="music_EditView.php"> Edit Music </a> <br><br>
    <a href="music_DeleteView.php"> Delete Music </a><br><br>
    <?php 
    }
    ?>
    <a href="logout.php">Logout </a><br>
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

