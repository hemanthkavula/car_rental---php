<?php
session_start();
require "connect.php";

$id=$_SESSION['id'];
$car_id=$_GET['car_id'];
$sql="select * from rentcars where id = '$car_id'";
$result = mysqli_query($conn, $sql);
$details = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){  
    $name=$details['name'];
    $model=$details['model'];
    $number=$details['number'];
    $seating=$details['seating'];
    $rent=$details['rent'];
    $description=$details['description'];
    $query="update rentcars set name='$name',model='$model',number='$number',seating='$seating',rent='$rent',description='$description' where id='$car_id'";
    $result1=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if($result1){
        echo header("location:agency1.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link href="css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/15d438045a.js" crossorigin="anonymous"></script>
    <style>
        body{
            margin-top: 0px;
        }
        select{
            font-size: 20px;
            border: 2px solid black;
            border-radius: 5px;
        }
        input{
    font-size: 20px;
    border: 2px solid black;
    border-radius: 5px;
}
textarea{
    font-size: 20px;
    border: 2px solid black;
    border-radius: 5px;
}
.img1{
            margin-top: 150px;
            width: 700px;
            height: 200px;
        }
@media (min-width:768px){
    .form{
        margin-top: 30px;
    }
    .img1{
        margin-top: 200px;
    }
}
    </style>
</head>
<body>
    <div class="row row1">
        <div class="col-6 img">
        <img src="img/logo.png" class="img1">
    </div>
    <center>
    <div class="col-6 form">
    <i class="fa-solid fa-pen-to-square signup"></i>
        <h1 class="signup1">Edit Car</h1>
        <form method="POST">
            <input type="text" placeholder="Property Name" name="name" id="name" value="<?php echo $details['name']; ?>" required><br/><br/>
            <input type="text" placeholder="Property Model" name="model" id="model" value="<?php echo $details['model']; ?>" required><br/><br/>
            <input type="text" placeholder="Property Number" name="name" id="number" value="<?php echo $details['number']; ?>" required><br/><br/>
            <input type="text" placeholder="Seating Capacity" name="seating" id="seating" value="<?php echo $details['seating']; ?>" required><br/><br/>
            <input type="text" placeholder="Rent" name="rent" id="rent" value="<?php echo $details['rent']; ?>" required><br/><br/>
            <textarea rows="5" placeholder="Description" name="description" id="description" required><?php echo $details['description']; ?></textarea><br><br>
            <input type="submit" name="submit" value="Submit" class="register"><br/><br/>
        </form>
        </div>
        </center> 
    </div>
</body>
</html>