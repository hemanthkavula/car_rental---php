<?php
session_start();
require "connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$agency_id = $_GET["agency_id"];

$sql_1 = "SELECT * FROM agency WHERE id = '$agency_id'";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo  "Something went wrong!";
    return;
    
}
$details4=mysqli_fetch_assoc($result_1);
$sql_1 = "SELECT *, p.id AS car_id, p.name AS car_name, c.name AS city_name, p.agency_id as agency_id
            FROM rentcars p
            INNER JOIN cities c ON p.city_id = c.id 
            WHERE p.agency_id = $agency_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$property = mysqli_fetch_assoc($result_1);
$city_name=$property['city_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $details4['agency_name'] ?></title>
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
        <li class="breadcrumb-item" ><a class="home" href="city.php?city=<?= $property['name']; ?>"><?= $property['city_name']; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $details4['agency_name']; ?></li>
    </ol>
  </nav><br/><br/><br/><br/>
  <div class="row">
      <div class="col-lg-3">

      </div>
      <center>
      <div class="col-lg-6">
        <form method="POST">
        <select name="sort" class="sort">
            <option value="no">--- Select Option --- </option>
            <option value="low-high" <?php if(isset($_POST['sort']) && $_POST['sort']=="low-high"){ echo "selected";} ?> >Lowest Rent First</option>
            <option value="high-low" <?php if(isset($_POST['sort']) && $_POST['sort']=="high-low"){ echo "selected";} ?> >Highest Rent First</option>
        </select>
        <button type="submit" class="but">Filter</button>
        </form>
      </div>
  </div></center><br><br><br>
  <?php 
  $sort_option="";
  if(isset($_POST['sort'])){
      if($_POST['sort'] == "low-high"){
          $sort_option="order by rent asc";
      }
      elseif($_POST['sort']== "high-low"){
        $sort_option="order by rent desc";
      }
      elseif($_POST['sort']== "no"){
        $sort_option="";
      }
    }
    $sql_2="select * from rentcars where agency_id=$agency_id $sort_option";
    $result_2 = mysqli_query($conn, $sql_2);
    if (!$result_2) {
        echo "Something went wrong!";
        return;
  }
  $properties = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
  ?>
  <?php
        foreach ($properties as $property) {
            $property_images = glob("img/cars/" . $property['id'] . "/*");
 
        $property_id=$property['id'];
        $seating=$property['seating'];
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
        <h5 class="card-title"><?= $property['name'] ?></h5>
        <p class="card-text"><?= $property['model'] ?></p>
        <div class=" row">
        <div class="col-sm-6 amount">
        ₹ <?= number_format($property['rent']) ?>/-<p class="month"> per Day</p>
        </div> 
  </div>
  <div class="row">
      <div class="col-sm-9">
          <p>Seating Capacity : <?= number_format($property['seating']) ?> </p>
      </div>
  </div>
  <div class="row">
  <div class="col-sm-6 button1">
              <a href="car_detail.php?car_id=<?= $property['id'] ?>">
          <button type="button" class="btn btn-primary btn1">View</button>
        </a>
      </div>
  </div><br>
  </div>
      </div>
    </div>
  </div>
    <?php
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
include "footer.php"
?>
</body>
</html>