<?php
    include("conn.php");
    $uname = $_POST['uname'];
    $pswd = $_POST['pswd'];
    $age = $_POST['age'];
if(isset($_FILES['uploadFile'])){
        
    $tempFileName = $_FILES["uploadFile"]["tmp_name"];
    $fileName = $_FILES["uploadFile"]["name"];
    $path = "C:/xampp/www/php/crud/upload/";
    $dest = $path.$fileName;
    if(move_uploaded_file($tempFileName,$dest)){
        echo "success";
    }
    else{
        echo "error";
    }
}
else{
    echo "Please select File";
}
    $query = "INSERT INTO `users` ( `uname`, `pswd`, `age`,`path`) VALUES ('$uname','$pswd','$age','$dest')";
    if (mysqli_query($con, $query)) {
        echo "Registered Successfully";
        header("Location:login.php");
    } else {
        echo "Error:";
        }
    ?>

