<?php
include 'conn.php';
session_start();
if($_SESSION['uname'] != ''){
    $id = $_GET['id'];
    if($id == ""){
        header("location:display.php");
    }
    else{
        $query = "DELETE FROM `users` WHERE `users`.`id` = '$id';";
        $result = mysqli_query($con, $query);
        $checkquery = mysqli_num_rows($result);
        if($checkquery == 1){
            header("Location:display.php");
        }
        else{
            header("location:display.php");
        }
    }
}
else{
    header("Location:display.php");
}

?>