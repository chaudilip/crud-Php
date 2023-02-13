<?php
session_start();
if(isset($_SESSION['uname'])){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <h1>Hello <?php echo $_SESSION['uname'];?>

    This is Home Page</h1>
    <a href="logout.php" class="btn btn-primary" class="logout">Log out</a>
</body>
</html>

<?php
}
else{
    header("Location:login.php");
    exit();
}
?>