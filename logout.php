<center>
<?php
session_start();

if(isset($_SESSION["UserID"]))
{
    session_unset();
    session_destroy();

echo "<br><p style='color:red;'>You have successfully logged out. </p>";
echo "<br>Click <a href='loginmenu.html'> here </a> to LOGIN again.";

}

else {

echo "No session exists or session is expired. Please log in again";
echo "<br>Click <a href='loginmenu.html'> here </a> to LOGIN again.";
}
?>
</center>