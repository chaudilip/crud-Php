<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'php_crud';

$con = mysqli_connect($host, $username, $password, $database);
if(!$con){
    die("Error connection to database");
}
else{
    echo ("Database connected succesfully");
}
?>