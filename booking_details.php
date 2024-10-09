<?php
session_start();
require "connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
if(!$user_id){
    echo header("location:login_customer.html");
}

$property_id = $_GET["car_id"];

$sql_1 = "SELECT *, p.id AS car_id, p.name AS car_name, c.name AS city_name, p.agency_id as agency_id
            FROM rentcars p
            INNER JOIN cities c ON p.city_id = c.id 
            WHERE p.id = $property_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$property = mysqli_fetch_assoc($result_1);
if (!$property) {
    echo "Something went wrong!";
    return;
}
$sql1="select * from rentcars where id=$property_id";
$result1 = mysqli_query($conn, $sql1);
if (!$result1) {
    echo "Something went wrong!";
    return;
}
$property1 = mysqli_fetch_assoc($result1);
if (!$property1) {
    echo "Something went wrong!";
    return;
}
$car_id=$property1['id'];
$rent=$property1['rent'];

$agency_id=$property['agency_id'];
$sql6="select * from agency where id='$agency_id'";
$result6=mysqli_query($conn,$sql6);
$details6=mysqli_fetch_assoc($result6);

$user_id=$user_id;
$city_id=$property['city_id'];

   // connection 
   if($conn){
   }
   else{
       die("error on the connection". mysqli_error());
   }
   if(!empty($_POST['start_date']) && !empty($_POST['end_date'])){  
        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
        $days=round(abs(strtotime($end_date)-strtotime($start_date))/86400);
        $days=$days+1;
        $query="insert into booking_details(user_id,city_id,agency_id,car_id,start_date,end_date,days) values('$user_id', '$city_id', '$agency_id','$car_id', '$start_date', '$end_date','$days')";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        if($result){
            header("location:booking.php?car_id=$car_id");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <?php
    include "head_links.php";
    ?>
    <link href="css/cardetail.css" rel="stylesheet"/>
    <style>
        body{
            overflow-x: hidden;
        }
        .form1{
            width: 300px;
        }
        .form2{
            width: 400px;
        }
        .det{
            display: flex;
        }
        </style>
</head>
<body>
<?php
    include "header.php";
    ?>
    <div class="row">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center">
              <li class="breadcrumb-item"><a class="home" href="index.php">Home</a></li>
              <li class="breadcrumb-item" ><a class="home" href="city.php?city=<?= $property['city_name']; ?>"><?= $property['city_name']; ?></a></li>
              <li class="breadcrumb-item" ><a class="home" href="agency.php?agency_id=<?= $details6['id']; ?>"><?= $details6['agency_name']; ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= $property['car_name']; ?></li>
            </ol>
          </nav>
    </div><br>
    <div class="row">
        <center>
            <h2>Booking Details</h2><br>
        </center>
    </div>
        <form method="POST">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-2">
                    <center>
                    <h6>Enter the Start Date : </h6>
                    <input type="date" name="start_date" id="start_date">
                    </center>
                </div>
                <div class="col-2">
                    <h6>Enter the End Date : </h6>
                    <input type="date" name="end_date" id="end_date"><br><br><br>
                </div>
                <div class="col-4"></div>
            </div>
            <center>
            <input type="submit" value="Book now">
            </center>
        </form>
        </div>
    </div>
    <br><br><br>
    <?php
    include "footer.php"
    ?>
</body>
</html>