<?php
    include 'conn.php';
    session_start();
    if (isset($_POST['login'])) 
    {
        $uname = $_POST["uname"];
        $pswd = $_POST["pswd"];

        $query = "SELECT * FROM `users` WHERE uname='$uname' AND pswd='$pswd'";
        $result = mysqli_query($con, $query);
        $checkquery = mysqli_num_rows($result);
        if($checkquery == 1){
            $_SESSION['uname'] = $uname;
            header("Location: home.php");
        }
        else{
            echo "<script> alert('Sorry! Your Username and Password is incorrect')</script>";
            header("Location: login.php?error=Please, check your username and password.");
        }
        
    }
?>