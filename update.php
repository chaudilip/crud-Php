<?php
    include'conn.php';
    session_start();
if ($_SESSION['uname'] != "") {
    $id = $_GET['id'];
    if ($id == "") {
        header("Location:display.php");
    } else {
        $id = $_GET['id'];
        $query = "SELECT * FROM users where id  = '$id'";
        $result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        body {
            background-color: rgba(4, 155, 200, 0.2);
        }
    </style>
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<section class="vh-200 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class=".col-12 .col-md-8 .col-lg-6 .col-xl-5">

                    <div class="card bg-dark text-white " style="border-radius: 1rem;">

                        <div class="card-body p-5 text-center">

                            <div class="mb-md-1 mt-md-4 pb-5">
                                <?php if ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <form method="POST" action="update_data.php">
                                        <p class="text-white-50 mb-5">Please enter your Username and password And Age</p>
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" name="uname" id="uname" value="<?php echo $data['uname']; ?>" class="form-control form-control-lg" placeholder="username" />
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" name="pswd" id="pswd" value="<?php echo $data['pswd']; ?>" class="form-control form-control-lg" placeholder="username" />
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" name="age" id="age" value="<?php echo $data['age']; ?>" class="form-control form-control-lg" placeholder="Age" />
                                        </div>
                                        

                                        <div>
                                            <button type="submit" name="btnupdate" id="" class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </form>
                                <?php
        }
                                ?>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
</body>
</html>

<?php
    }
}
else{
    header("location:home.php");
    }
?>