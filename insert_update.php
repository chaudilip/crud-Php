<!-- auth.php -->

<!-- <?php
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
?>  -->


<!-- conn.php -->

<!-- <?php
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
?> -->


<!-- delete.php -->

<!-- <?php
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

?> -->


<!-- display.php -->

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
    <form method="post" action="display.php">
        sort by:
        <select name="category" id="">
            <option value="age">age</option>
            <option value="name">name</option>

        </select>
        <button name="sort" value="sort" type="submit">Sort</button>

    </form>


</body>
</html>

<!-- 
<?php
session_start();
if(isset($_SESSION['uname'])){
    include 'conn.php';
    $query = "select * from users";
    if (isset($_POST['sort'])) {
        if ($_POST['category'] == 'name') {
            $query = "select * from users order by uname ";

        }  elseif ($_POST['category'] == 'age') {
            $query = "select * from users order by age ";
        }
        else{
            $query = "select * from users";
        }
    }

    $res = mysqli_query($con, $query);
    if(mysqli_num_rows($res) >  1){
        echo "<table border=1 style='width:100px; align- center;'> 
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>";

        while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            <tr>
        <?php
        }
        echo "</table>";
    }
    else{
        echo "Error";
    }

}else{
    header("Location : login.php");
    exit();
}

?> -->


<!-- home.php -->

<!-- <?php
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
?> -->


<!-- insert.php -->

<!-- <?php
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
 -->


 <!-- login.php -->

 <!-- <!DOCTYPE html>
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
</html> -->

<!-- logout.php -->

<!-- <?php
session_start();
session_unset();
session_destroy();
header("Location:login.php");
?> -->


<!-- signup.php -->

<!-- <!DOCTYPE html>
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
</html> -->


<!-- update_data.php -->


<!-- <?php
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
?> -->


<!-- update.php -->

<!-- 
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
?> -->



<!-- card-Bootstrap -->

<!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->


<!-- navbar-bootstrap -->
<!-- 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->


<!-- progress -->

<!-- <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div> -->



<!-- alert -->

<!-- $(document).ready(function(){
        $('#btn').click(function(){
            alert('HEllo there !!!');
        })  
    }) -->



<!-- alertsum -->
<!-- 
$(document).ready(function(){
        $('#btn').click(function(){
            var a = parseInt($('#n1').val());
            var b = parseInt($('#n2').val());
            var sum = a + b;
            alert(sum);
        })
    }) -->

<!-- hideshow-javascript -->

<!-- $(document).ready(function(){
            $("#hide").click(function(){
              $("p").hide();
            });
            $("#show").click(function(){
              $("p").show();
            });
          }); -->

<!-- toggle -->

<!-- $(document).ready(function(){
            $("#hide").click(function(){
              $("p").toggle();
            });
          }); -->

<!-- append  -->
<!-- $(document).ready(function(){
            $("#btn1").click(function(){
                $("p").append("<b>  Awesome 💙 You Added some text! </b>")
            })
        }) -->


date picker
<!-- 
<!DOCTYPE html>
<html>
	
<head>
	<title>
		Document
	</title>
	
	<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
		rel='stylesheet'>
	
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
	</script>
	
	<script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
	</script>
</head>

<body>
	Date: <input type="text" id="my_date_picker">
    <h1 id="h"></h1>

	<script>
		$(document).ready(function() {
		
			$(function() {
				$( "#my_date_picker" ).datepicker();
			});
		})
        $(function() {
            $("#my_date_picker").datepicker();
            $("#my_date_picker").on("change",function(){
                var selected = $(this).val();
                $('#h').text($(this).val())
            });
        }); -->

<!-- mouse enter leave -->
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
		rel='stylesheet'>
	
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
	</script>
	
	<script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
	</script>
    <style>
        .adder{
            color: #eb4037;
        }
    </style>
    <title>Document</title>

</head>
<body>
    <p>
        When compared with C++, Java codes are 
        generally more maintainable because Java 
        does not allow many things which may 
        lead bad/inefficient programming if used
        incorrectly. For example, non-primitives 
        are always references in Java. So we 
        cannot pass large objects(like we can do 
        in C++) to functions, we always pass
        references in Java. One more example, 
        since there are no pointers, bad memory 
        access is also not possible.
    </p>
  
    <p>
        Python is a high-level, general-purpose 
        and a very popular programming language.
        Python programming language (latest 
        Python 3) is being used in web development,
        Machine Learning applications, along with 
        all cutting edge technology in Software 
        Industry. Python Programming Language is 
        very well suited for Beginners, also for 
        experienced programmers with other 
        programming languages like C++ and Java.
    </p>
<script>
    $(document).ready(function(){
        $('p').mouseenter(function(){
        $('p').addClass('adder');
    })
        $('p').mouseleave(function(){
            $('p').removeClass('adder');
        })
    })

</script>
</body>
</html>


 -->

<!-- keypress -->
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href=
    'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
            rel='stylesheet'>
        
        <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
        </script>
        
        <script src=
    "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
        </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text">

<p>Keypresses: <span>0</span></p>

    <script>
        i = 0;
        $(document).ready(function(){
          $("input").keypress(function(){
            $("span").text(i += 1);
          });
        });
    </script>
</body>
</html>


 -->

<!-- data table search -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
        }
          
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
          
        h1 {
            color: green;
        }
    </style>
</head>
<body>
    <center>
        <h1>Search Table</h1>
        <h3>
          perform a real time search and filter 
          on a HTML table
        </h3>
        <b>Search the table for Course, Fees or Type: 
          <input id="gfg" type="text" 
                 placeholder="Search here">
        </b>
        <br>
        <br>
        <table>
            <tr>
                <th>Course</th>
                <th>Duration</th>
                <th>Type</th>
            </tr>
            <tbody id="d">
                <tr>
                    <td>C++ STL</td>
                    <td>1499</td>
                    <td>Online Classes
                    </td>
                </tr>
                <tr>
                    <td>DSA Foundation</td>
                    <td>7999</td>
                    <td>Regular Classes</td>
                </tr>
                <tr>
                    <td>Python</td>
                    <td>10799</td>
                    <td>Weekend Classes</td>
                </tr>
                <tr>
                    <td>Asp.net</td>
                    <td>9999</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>Jquery</td>
                    <td>8765</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>Bootstrap</td>
                    <td>9087</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>OOPS</td>
                    <td>9909</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>css</td>
                    <td>120</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>Html</td>
                    <td>45</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>Vue.js</td>
                    <td>4500</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>Js</td>
                    <td>2409</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>three.js</td>
                    <td>3022</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>C#</td>
                    <td>924</td>
                    <td>Online Classes</td>
                </tr>
                <tr>
                    <td>Java</td>
                    <td>99</td>
                    <td>Online Classes</td>
                </tr>
            </tbody>
        </table>
  
        
  </center>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/jquery/jquery-3.6.1.min.js"></script>
  <script>
    $(document).ready(function() {
        $("#gfg").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#d tr").filter(function() {
                $(this).toggle($(this).text()
                .toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>


 -->


<!-- add row table javascript -->
<!-- <!doctype html>
<html lang="en">

<head>
    <title>Title</title> -->
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">

        <button class="btn btn-primary mb-5 w-100" id="newrow">New Row</button>

        <table class="table">
        </table>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>

        let btnsumit = document.getElementById('newrow');
        btnsumit.addEventListener('click', function () {
            var table = document.querySelector("table");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = "New Row";
            cell2.innerHTML = "New Row";
        });


    </script>
</body>

</html>
 -->

<!-- remove item from dropdown-->

<!-- <html lang="en">

<head>
    <title>Title</title> -->
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">

        <div class="form-group">
            <label for="colors">Select Color</label>
            <select class="form-control" name="colors" id="colors">
                <option value="Red">Red</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Green">Green</option>
                <option value="Teal">Teal</option>
                <option value="Blue">Blue</option>
                <option value="Gold">Gold</option>
                <option value="Silver">Silver</option>
                <option value="Yellow">Yellow</option>
                <option value="Violet">Violet</option>
            </select>
        </div>

        <button class="btn btn-primary mb-5 w-100" id="btnsumit">Remove</button>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>

        let btnsumit = document.getElementById('btnsumit');
        btnsumit.addEventListener('click', function () {
            let selectval = document.getElementById('colors');

            selectval.remove(selectval.selectedIndex);

        });
    </script>
</body>

</html> -->



<!-- length of dropdown and selected values -->

<!-- <!doctype html> -->
<!-- <html lang="en">

<head>
    <title>Title</title> -->
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">

        <div class="form-group">
            <label for="colors">Select Color</label>
            <select class="form-control" name="colors" id="colors">
                <option value="Red">Red</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Green">Green</option>
                <option value="Teal">Teal</option>
                <option value="Blue">Blue</option>
                <option value="Gold">Gold</option>
                <option value="Silver">Silver</option>
                <option value="Yellow">Yellow</option>
                <option value="Violet">Violet</option>
            </select>
        </div>

        <button class="btn btn-primary mb-5 w-100" id="btnsumit">Submit</button>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>

        let btnsumit = document.getElementById('btnsumit');
        btnsumit.addEventListener('click', function () {
            var x = document.getElementById("colors")
            var txt1 = "No. of items in dropdown is : ";
            var i;
            l = document.getElementById("colors").length;
            txt1 = txt1 + l;
            for (i = 0; i < x.length; i++) {
                txt1 = txt1 + "\n" + x.options[i].text;
            }
            alert(txt1);

        });


    </script>
</body>

</html>
 -->

<!-- calculate sphere -->

<!-- <!doctype html>
<html lang="en">

<head>
    <title>Title</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">

        <p>Input radius value and get the volume of a sphere.</p>

        <div class="form-group">
            <label for="radius">Radius</label>
            <input type="text" name="" id="radius" class="form-control" placeholder="Enter Radius">
        </div>
        <div class="form-group">
            <label for="Valume">Volume</label>
            <input type="text" name="" id="volume" class="form-control" placeholder="Enter Volumn">
        </div>

        <button class="btn btn-primary mb-5 w-100" id="btnsumit">Submit</button>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        let btnsumit = document.getElementById('btnsumit');
        btnsumit.addEventListener('click', function () {
            var volume;
            var radius = document.getElementById('radius').value;
            radius = Math.abs(radius);
            volume = (4 / 3) * Math.PI * Math.pow(radius, 3);
            volume = volume.toFixed(4);
            document.getElementById('volume').value = volume;
        });
    </script>
</body>

</html>

 -->


 <!-- change color of words and bold -->

 <!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
  </head>
  <body>
    <p>Write a JavaScript program to highlight the bold words of the following paragraph, on mouse over a certain link.</p>
    <p>
      <a href="#" onMouseOver="highlight()" onMouseOut="returnNormal()">On mouse over here bold words of the following paragraph will be highlighted</a>
    </p> 
    <p>
      <strong>We</strong> have just started <strong>this</strong> section for the users (<strong>beginner</strong> to intermediate) who <strong>want</strong> to work with <strong>various</strong> JavaScript <strong>problems</strong> and write scripts online to <strong>test</strong> their JavaScript <strong>skill</strong>.
   </p>
   <script>
    function highlight() {
        var els = document.getElementsByTagName("strong");
        for (var i = 0; i < els.length; i++) {
          els[i].style.color = "green";
        }
      }
      
      function returnNormal() {
        var els = document.getElementsByTagName("strong");
        for (var i = 0; i < els.length; i++) {
          els[i].style.color = "black";
        }
      }
   </script>
  </body>
</html>


 -->

<!-- validation -->

<!-- Index.html -->
<!-- <!doctype html>
<html lang="en">

<head>
    <title>JQuery Validation Using JQuery Validation Plugin</title>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->


    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <style>
        .error{
            margin-top: .5rem;
            color: red;
            font-weight: bold;
        }
    </style>

</head>
<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="shadow rounded w-100 p-4">
            <form method="post" id="signupform">
                <h2 class="text-center">Sign Up</h2>
                <div class="form-outline my-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control mt-0" name="name" id="name" placeholder="Enter Your Name">
                </div>
                <div class="form-outline my-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-0" name="email" id="email" placeholder="Enter Your Email">
                </div>
                <div class="form-outline my-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control mt-0" name="mobile" id="mobile" placeholder="Enter Your Mobile">
                </div>
                <div>
                    <div>Gender</div>
                    <div class="form-check mt-3">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input mt-0" name="gender" id="male" value="male" >
                            Male
                        </label>
                        <label class="form-check-label ml-4">
                            <input type="radio" class="form-check-input mt-0" name="gender" id="female" value="female" >
                            Female
                        </label>
                    </div>
                    <label for="gender" class="error"></label>
                </div>
                <div class="form-outline my-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control mt-0" name="password" id="password" placeholder="Enter Your Password">
                </div>
                <div class="form-outline my-3">
                    <label for="repassword">Re - Password</label>
                    <input type="password" class="form-control mt-0" name="repassword" id="repassword" placeholder="Enter Your Re - Password">
                </div>
                <div class="form-outline">
                    <input type="submit" value="Submit" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
App.js
jQuery('#signupform').validate({
    rules:{
        'name':{
            'required':true,
            'minlength':5,
        },
        'email':{
            'required':true,
            'email':email
        },
        'mobile':{
            'required':true,
            'digits':true,
            'minlength':10,
            'maxlength':10,
        },
        'gender':{
            'required':true
        },
        'password':{
            'required':true,
            'minlength':8,
        },
        'repassword':{
            'required':true,
            'minlength':8,
            'equalTo':'#password'
        },
    },
    messages:{
        'name':{
            'required':'Please Enter Your Name',
            'minlength':'Please Enter The Minimum 5 Characture Name'
        },
        'email':{
            'required':'Please Enter Your Email Address',
            'email':'Please Enter The Proper Email Address'
        },
        'mobile':{
            'required':'Please Enter Your Mobile Number',
            'digits':'Please Enter Only Numbers',
            'minlength':'Please Enter Your Current Mobile Number',
            'maxlength':'Please Enter Your Current Mobile Number',
        },
        'gender':{
            'required':'Please Select The Gender'
        },
        'password':{
            'required':'Please Enter Your Password',
            'minlength':'Please Enter The Minimum 8 Character Password'
        },
        'repassword':{
            'required':'Please Enter Your Re-Password',
            'minlength':'Please Enter The Minimum 8 Character Password',
            'equalTo':'Sorry! Your Password Is Not Match'
        }
    },
    submitHandler:function (form) {
        form.submit();
    }
});
 -->

 