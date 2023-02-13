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
    <form action="insert.php" method="POST" enctype="multipart/form-data">
    <label for="username">Username</label>
    <input type="text" name="uname">
    <label for="">passwrod</label>
    <input type="password" name="pswd">
    <label for="">age</label>
    <input type="text" name="age">
    <label for="">Select image to upload</label>
    <input type="file" name="uploadFile" id="uploadFile"></input>
    <button type="submit" class="btn btn-primary" name="signup">Submit</button>
    </form>
</body>
</html>