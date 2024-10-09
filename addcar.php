<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
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
    <i class="fa-solid fa-car signup"></i>
        <h1 class="signup1">Add Car</h1>
        <form method="POST">
            <select name="city_id" id="city_id">
                <option>1.Bangalore</option>
                <option>2.Delhi</option>
                <option>3.Mumbai</option>
                <option>4.Hyderabad</option>
                <option>5.Chennai</option>
            </select><br><br>
            <input type="text" placeholder="Vehicle Name" name="name" id="name" required><br/><br/>
            <input type="text" placeholder="Vehicle Model" name="model" id="model" required><br/><br/>
            <input type="text" placeholder="Vehicle Number" name="number" id="number" required><br/><br/>
            <input type="text" placeholder="Seating Capacity" name="seating" id="seating" required><br/><br/>
            <input type="text" placeholder="Rent" name="rent" id="rent" required><br/><br/>
            <textarea rows="5" placeholder="Description" name="description" id="description" required></textarea><br><br>
            <input type="submit" value="Submit" class="register"><br/><br/>
        </form>
        </div>
        </center>
    </div>
</body>
</html>
<?php
   session_start();
   require "connect.php";
   $agency_id=$_GET['agency_id']; 
   if($conn){
   }
   else{
       die("error on the connection". mysqli_error());
   }
   if(!empty($_POST['city_id']) && !empty($_POST['name']) && !empty($_POST['model']) && !empty($_POST['number']) && !empty($_POST['seating']) && !empty($_POST['rent']) && !empty($_POST['description'])){ 
    $city_id=$_POST['city_id'];   
    $name=$_POST['name'];
    $model=$_POST['model'];
    $number=$_POST['number'];
    $seating=$_POST['seating'];
    $rent=$_POST['rent'];
    $description=$_POST['description'];
    $query="insert into rentcars(city_id,agency_id,name,model,number,seating,rent,description) values('$city_id', '$agency_id', '$name' , '$model', '$number', '$seating', '$rent', '$description')";
    $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if($result){
        echo header("location:agency1.php");
    }
}
?>