<?php
session_start();
require "connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$property_id=$_GET['car_id'];

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

$rent=$property['rent'];

$sql5="select * from booking_details where user_id='$user_id' and car_id='$property_id'";
$result5=mysqli_query($conn,$sql5);
$details5=mysqli_fetch_assoc($result5);
$start_date=$details5['start_date'];
$end_date=$details5['end_date'];
$days=$details5['days'];

$total_rent=$rent*$days;

$agency_id=$property['agency_id'];
$sql6="select * from agency where id='$agency_id'";
$result6=mysqli_query($conn,$sql6);
$details6=mysqli_fetch_assoc($result6);

if (isset($_POST['submit'])){
    $query="update booking_details set paidornot= 'Not Paid',total_rent='$total_rent' where user_id='$user_id' and car_id='$property_id'";
    $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        if($result){
            header("location:payment.php?car_id=$property_id");
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <?php
    include "head_links.php";
    ?>
    <link href="css/cardetail.css" rel="stylesheet"/>
    <style>
        tr,th,td{
          border: 2px solid black;
          text-align: center;
          padding:5px;
      }
      th{
          width: 50%;
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
            <h2>Payment Details</h2><br>
        </center>
    </div>
    <div class="row">
        <center>
        <table border="5" style="width: 50%; margin-left: 50px">
            <tr>
                <th>Final Price</th>
                <td><?php echo $rent." "."*"." ".$days." "  ?> Days</td>
            </tr>
            <tr>
            <th>Total</th>
            <td><?php echo $total_rent ?></td>
            </tr>
    </table><br>
        <form method="POST"> 
            <input type="submit" name="submit" value="Book">
        </form>
        </center>
    </div>
    <br><br><br>
    <?php
    include "footer.php"
    ?>
</body></html>