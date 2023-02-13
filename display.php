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

?>