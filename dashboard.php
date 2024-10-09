<?php
session_start();
require "connect.php";

if (!isset($_SESSION["email"])) {
    header("location: index.php");
    die();
}
$email = $_SESSION['email'];

$sql1="select * from users where email ='$email'";
$result1 = mysqli_query($conn,$sql1);
$user = mysqli_fetch_assoc($result1);
$id=$user['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <?php
    include "head_links.php";
    ?>
    <link href="css/carlist.css" rel="stylesheet" />
    <style>
        @media (max-width: 768px) {
            .profile-img-container {
                text-align: center;
                padding-bottom: 32px;
            }
            .profile{
                text-align: center;
            }
}

.profile-img {
    color: #7d7d7d;
    font-size: 75px;
    text-align: center;
    border: 1px solid #e4e4e4;
    border-radius: 50%;
    height: 100px;
    width: 100px;
    line-height: 100px;
}

.edit-profile {
    font-size: 20px;
    cursor: pointer;
}
.gen_pdf{
    text-decoration: none;
    border: 2px solid black;
    background-color: white;
    color: black;
}
        </style>
</head>

<body>
    <?php
    include "header.php";
    ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="home" href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav><br/><br/><br/><br/>
  <div class="row">
  <center><h1 class="offset-1">My Profile</h1><br></center>
      <div class="col-md-5">

      </div>
      <div class="col-md-7">
  <div class="row content">
            <div class="col-md-3 profile-img-container align-items-center">
                <i class="fas fa-user profile-img"></i>
            </div>
            <div class="col-md-9 d-inline">
                <div class="row no-gutters justify-content-between align-items-end">
                    <div class="profile">
                        <b><div class="name"><?= $user['full_name'] ?></div></b>
                        <div class="email"><?= $user['email'] ?></div>
                        <div class="phone"><?= $user['phone'] ?></div>
                        <div class="address"><?= $user['address'] ?></div>
                    <div class="edit">
                    <b><div class="edit-profile"><a href="editprofile.php" class="text-decoration-none">Edit Profile</a></div></b>
                    <b><div class="edit-profile"><a href="userchangepassword1.php" class="text-decoration-none">Change Password</a></div></b>
                    </div>
                    </div>
                </div>
            </div>
      </div>
        </div>
    </div>
    <br><br>

<div class="my-interested-properties">
            <div class="page-container">
                <center><h1>Booked Cars</h1></center><br><br>


<?php
$sql5="select * from booking_details where user_id='$id' and paidornot='Paid'"; 
$result5=mysqli_query($conn,$sql5);
$details5=array();
while($row = mysqli_fetch_assoc($result5)){
    $details5[]=$row;
}
foreach($details5 as $det){
    $car_id=$det['car_id'];
    $sql4="select * from rentcars where id='$car_id'";
    $result4=mysqli_query($conn,$sql4);
    $properties=array();
while($row = mysqli_fetch_assoc($result4)){
    $properties[]=$row;
}
if(mysqli_num_rows($result4)>0){
                foreach ($properties as $property1) {
            $property_images = glob("img/cars/" . $property1['id'] . "/*");
        ?>
  <div class="card mb-3 card property-id-<?= $property['id'] ?>" style="max-width: 850px;">
    <div class="row g-0">
      <div class="col-md-4 image">
      <img class="img-fluid rounded-start img1" src="<?= $property_images[0] ?>"/>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="col content">
            <div class="col">
                        </div>
        </div>
        <div class="col-1">
                        </div>
                    </div><br>
        <h5 class="card-title"><?= $property1['name'] ?></h5>
        <p class="card-text"><?= $property1['model'] ?></p>
        <div class=" row">
        <div class="col-sm-6 amount">
        ₹ <?= number_format($property1['rent']) ?>/-<p class="month"> per Day</p>
        </div> 
  </div>
  <div class="row">
      <div class="col-sm-9">
          <p>Seating Capacity : <?= number_format($property1['seating']) ?> </p>
      </div>
  </div>
  <div class="col-sm-6 button1">
              <a href="car_detail.php?car_id=<?= $car_id ?>">
          <button type="button" class="btn btn-primary btn1">View</button>
                        </a>
  </div><br>
          <div class="row"> 
              <div class="col-sm-6 button1">
              <a href="gen_pdf.php?car_id=<?= $car_id ?>"><button type="button" class="btn btn-secondary"> Generate Receipt</button></a><br><br>
              </div>
              <div class="col-sm-6 button1">
                  <form method="POST"><br>
              <input type="submit" class="btn btn-danger btn1" value="Delete" name="delete">
                  </form>
          <?php
          if(isset($_POST['delete'])){
            $sql6="Delete from booking_details where user_id='$id' and car_id='$car_id'";
            $result6=mysqli_query($conn,$sql6);
          }
          ?>
              </div>
      </div>
  </div>
      </div>
    </div>
  </div>
    <?php
        }
    }
    if (count($properties) == 0) {
        ?>
            <div class="no-property-container">
                <p>No rental cars to list</p>
            </div>
        <?php
    }
        ?>
  </div>
  <br><br><br>
  <?php
}
include "footer.php";
?>