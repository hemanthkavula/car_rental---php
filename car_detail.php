<?php
session_start();
require "connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$car_id = $_GET ["car_id"];

$sql="select * from users where id='$user_id'";

$sql_1 = "SELECT *, p.id AS car_id, p.name AS car_name, c.name AS city_name, p.agency_id as agency_id
            FROM rentcars p
            INNER JOIN cities c ON p.city_id = c.id 
            WHERE p.id = $car_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$property = mysqli_fetch_assoc($result_1);

if (!$property) {
    echo "Something went wrong!!";
    return;
}
$sql1="select * from rentcars where id=$car_id";
$result1 = mysqli_query($conn, $sql1);
if (!$result1) {
    echo "Something went wrong!!!";
    return;
}
$property1 = mysqli_fetch_assoc($result1);
if (!$property1) {
    echo "Something went wrong!!!!";
    return;
}
$car_id=$property1['id'];
$seating=$property1['seating'];
$city_id=$property1['city_id'];
$agency_id=$property1['agency_id'];


$sql_2 = "SELECT * FROM testimonials WHERE agency_id = $agency_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!.";
    return;
}
$testimonials = mysqli_fetch_all($result_2, MYSQLI_ASSOC);


$agency_id=$property['agency_id'];
$sql6="select * from agency where id='$agency_id'";
$result6=mysqli_query($conn,$sql6);
$details6=mysqli_fetch_assoc($result6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $property['car_name']; ?> </title>
    <?php
    include "head_links.php";
    ?>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/cardetail.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <style>
        .details-name{
            text-transform: capitalize;
        }
        .rating{
    border: 2px solid green;
    border-radius: 50%;
    width: 150px;
    height: 150px;
    background-color: green;
    color:white;
    padding-top: 30px;
    padding-left: 30px;
}
.rating1{
    padding-left: 15px;
}
.stars{
    color: rgb(75, 221, 221);
}
.star1{
    color: white;
}
.review{
    background-color: rgb(248, 239, 239);
}
.heart{
    color: orangered;
    font-size: 25px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    padding-right: 3px;
}
.round{
    border-radius: 50%;
}
.content{
    margin-left: 0px;
}
body{
    margin-left: 0px;
}
.breadcrumb{
    padding-left: 5px;
}
.body{
    margin-left: 10px;
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
    </div>
    <?php
        $property_images = glob("img/cars/" . $property['car_id'] . "/*");
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $property_images[0] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $property_images[1] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $property_images[2] ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><br><br>
    <div class="body">
    <div class="row content">
    <div class="col-3">
        
        </div>
      <div class="col-md-4 stars-all">
  </div>
  <div class="col-md-2">
  </div>
</div>
<div class="row">
  <div class="col-7">

  </div>
</div><br>
<div class="row">
  <div class="col-3">

  </div>
  <div class="col-md-6">
    <h5 class="details-name"><?= $details6['agency_name'] ?></h5>
  </div>
</div>
<div class="row">
  <div class="col-3">

  </div>
  <div class="col-md-6">
    <h6 class="details-address"><?= $details6['address'] ?></h6>
  </div>
</div>
<div class="row">
  <div class="col-3">

  </div>
  <div class="col-md-9">
  <p class="details-name"><?= $property['car_name'] ?>(<?= $property1['model'] ?>)</p>
  </div>
</div>
<div class="row">
  <div class="col-3">

  </div>
  <div class="col-md-6">
    <h4 class="amount">₹ <?= number_format($property['rent']) ?>/- Per Day</h4>
  </div>
</div><br/>
<div class="row">
<div class="col-3">

</div>
<div class="col-md-5">
      <h4>Seating Capacity : <?= number_format($property['seating']) ?></h4>
  </div>
  <div class="col-md-4">
  </div>
</div>
<br>
  <div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-5">
  </div>
  <div class="col-2">
    <a href="booking_details.php?car_id=<?=$property1['id']?>" class="justify-content-end">
      <button type="button" class="btn btn-primary btn1">Book </button>
    </a>
  </div>
</div><br>
<div class="row amenities">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-md-6">
            <h2>Contact Information : </h2>
            <h4 class="offset-1">Phone Number : <?= $details6['phone'] ?></h3>
            <h4 class="offset-1">Email : <?= $details6['email'] ?></h3><br><br>
        </div>
    <div class="row">
  <div class="col-3">

  </div>
  <div class="col-md-6">
    <div class="page-container">
  </div>
  <div class="row">
    <h2>About the Car</h2>
        <p><?= $property['description'] ?></p>
  </div>
<div class="row">
  <div class="property-testimonials page-container">
        <h1>What Owner say</h1><br><br>
        <?php
        foreach ($testimonials as $testimonial) {
            $agency_id=$testimonial['agency_id'];
            $sql_5="select * from agency where id=$agency_id";
            $result_5=mysqli_query($conn,$sql_5);
            $owners=mysqli_fetch_assoc($result_5);
            $name=$testimonial['user_name'];
        ?>
        <center>
            <div class="testimonial-block ">
                <div class="testimonial-image-container">
                    <img class="testimonial-img round" src="img/man.png" width="100px" height="100px">
                </div>
                <div class="testimonial-text">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p><?= $testimonial['content'] ?></p>
                </div>
                <div class="testimonial-name"><h3 style="text-transform: capitalize;">- <?= $name ?></h3></div>
            </div>
        </center>
        <?php
        }
        ?>
    </div>
</div><br><br>
</div>
</div>
    </div>
<?php
include "footer.php"
?>
</body>
</html>