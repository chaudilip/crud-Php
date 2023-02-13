<?php
include 'conn.php';
if(isset($_POST['btnupdate'])){
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $pswd = $_POST['pswd'];
    $age = $_POST['age'];
    $query = "update users set uname = '$uname' , pswd= '$pswd' , age ='$age' where id ='$id'";
    $result = mysqli_query($con, $query);
    if($result){
        header("location:display.php");
    } else {
        echo "Error";}
}
?>