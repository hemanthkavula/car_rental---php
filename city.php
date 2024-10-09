<?php
session_start();
require "connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$city_name = $_GET["city"];

$sql_1 = "SELECT * FROM cities WHERE name = '$city_name'";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo  "Something went wrong!";
    return;
    
}
$city_names = mysqli_fetch_assoc($result_1);
if (!$city_names) {
    echo "Sorry! We do not have any rental cars listed in this city.";
    return;
}
$city_id = $city_names['id'];

$sql_1 = "SELECT *,p.id as agency_id,c.id as city_id
            FROM agency p
            INNER JOIN cities c ON p.city_id = c.id 
            WHERE c.id = $city_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$property = array();
while($row=mysqli_fetch_assoc($result_1)){
    $details5[]=$row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $city_name ?></title>
    <?php
    include "head_links.php";
    ?>
    <link href="css/carlist.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <style>
        select{
            width: 400px;
            height: 30px;
        }
        .card-title{
            text-transform: capitalize;
        }
        .colname{
            text-transform: uppercase;
        }
        .but{
            display: inline;
            padding-left: 5px;
            padding-right: 5px;
        }
        @media (max-width:576px){
            select{
                width: 300px;
                height: 20px;
            }
            .but{
                height: 30px;
                display: inline;
                padding-left: 5px;
                padding-right: 5px;
        }
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
      <li class="breadcrumb-item active colname" aria-current="page">
      <?php echo $city_name; ?>
      </li>
    </ol>
  </nav><br/><br/><br/><br/>
  <div class="row">
    <?php
    foreach($details5 as $details5){
      $property_images = glob("img/cars/" . $details5['agency_id'] . "/*");
    ?>

  <div class="card mb-3 card property-id-<?= $details5['id'] ?>" style="max-width: 850px;">
    <div class="row g-0">
      <div class="col-md-4 image">
      <img class="img-fluid rounded-start img1" src="<?= $properties_images[0] ?>" />
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
        <h5 class="card-title"><?= $details5['agency_name'] ?></h5>
        <p class="card-text"><?= $details5['address'] ?></p>
        <div class=" row">
        <p>Email : <?= $details5['email'] ?> </p>
        <p>Phone : <?= $details5['phone'] ?> </p>
        </div> 
  </div>
  <div class="row">
  <div class="col-sm-9 button1">
              <a href="agency.php?agency_id=<?= $details5['agency_id'] ?>">
          <button type="button" class="btn btn-primary btn1">View</button>
        </a>
      </div>
  </div><br><br>
  </div>
      </div>
    </div>
  </div>
    <?php
    }
    if (count($details5) == 0) {
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
include "footer.php"
?>
</body>
</html>