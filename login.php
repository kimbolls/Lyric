<?php

$userID = $_POST['UserID'];
$userPwd = $_POST['UserPwd'];

$host = "localhost";
$username = "root";
$password = "";
$dbname = "hi-fi";

$link = mysqli_connect($host,$username,$password,$dbname);

if(!$link)
{
    die("Database tak connected le : " .mysqli_connect_error($link));
}
else
{
    $querycheck = "select * from USER where UserID = '$userID' ";
    $resultcheck = mysqli_query($link,$querycheck);

    if(mysqli_num_rows($resultcheck)==0){
        echo "<center>User ID does not exists";
        echo "<br><a href='loginmenu.html'> Login again </a></center>";
    }
    else
    {
        $row = mysqli_fetch_array($resultcheck,MYSQLI_BOTH);

        if($row["UserPwd"]==$userPwd){
            session_start();
            $_SESSION["UserID"] = $userID;
            $_SESSION["UserType"]=$row["UserType"];

            header("Location:homepage.php");
        }
        else{
            echo "<p style='color:red;'>Wrong Password!!! </p>";
            echo  "<br>Click <a href='loginmenu.html'> here </a> to LOGIN again. ";
        }
    }
}
    mysqli_close($link);
?>