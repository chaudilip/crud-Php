<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="auth.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
           <p class="error"> <?php echo $_GET['error']; ?></p> 
  <?php  }?>
    username:
    <input type="text" name="uname" >
    password
    <input type="text" name="pswd">
    <button class="btn btn-primary" type="submit" name="login">Login</button>
    </form>
</body>
</html>