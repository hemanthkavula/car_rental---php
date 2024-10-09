<?php 
session_start();
require "connect.php";
if (!isset($_SESSION["phone"])) {
    echo header('location:login_agency.html');
}
$id=$_SESSION['id'];

$sql1="select * from agency where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$details1 = mysqli_fetch_assoc($result1);

$sql2="select * from rentcars where agency_id = '$id'";
$result2 = mysqli_query($conn, $sql2);
$details3 = array();
while($row = mysqli_fetch_assoc($result2)){
    $details3[]=$row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency</title>
    <?php include "head_links.php"?>
    <style>
        body{
            overflow-x: hidden;
        }
        .body1{
            margin-left: 15px;
            margin-right: 15px;
        }
      th,tr,td{
          border: 2px solid black;
          text-align: center;
      }
      .header {
    background-color: white;
    font-size: 13px;
}

.header .navbar .nav-item i {
    margin-right: 8px;
}

.header .nav-vl {
    border-left: 2px solid #d6d6d678;
    height: 24px;
    margin: auto 16px;
    display: block;
}
.bold{
    color: black;
}
.overlay-content{
    display: flex;
}

.header .nav-name {
    font-weight: bold;
    margin: auto 16px;
    margin: 8px 0px;
    color: blue;
}
@media (min-width:768px) {
            .bar{
                display: none;
            }
            .overlay .closebtn {
                display: none;
            }
            .nav-vl{
                display: none;
            }
        }
@media (min-width:0px) and (max-width:768px){
    body {
  font-family: 'Lato', sans-serif;
}
.navbar-toggler{
    height: 40px;
}

.overlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
  display: block;
}
.overlay-content b{
    display: block;
}
.overlay-content .nav-vl{
    display: none;
}

.overlay-content a i,.overlay-content .nav-name{
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: inline;
  transition: 0.3s;
}
.overlay-content a b{
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: inline;
    transition: 0.3s;
}

.overlay .visible:hover,.overlay .visible:focus {
  color: white;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
  color: #818181;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .visible{font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
}
@media (min-width:0px){
}
        #loading {
            display: none;
            background-color: #666666;
            background-image: url("../img/progress_spinner.gif");
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.4;
            position: fixed;
            top: 0px;
            right: 0px;
            width: 100%;
            height: 100%;
            z-index: 10000000;
    }
    .img1{
        width: 200px;
        height: 100px;
    }
    
@media(max-width:576px) {
    .img1{
        width: 150px;
        height: 50px;
    }
}
</style>
</head>
<body>
<div class="header sticky-top row" >
<nav class="navbar navbar-expand-md navbar-light">
    <div class="col-6">
        <a class="navbar-brand" href="agency1.php">
            <img class="img1" src="img/logo.png"/>
        </a>
    </div>
        <div class="overlay col-6 " id="myNav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div class="justify-content-end overlay-content">
                <?php
                if (isset($_SESSION["phone"])) {
                ?>
                    <div class='nav-name align-self-center visible'>
                       <b> Hi, <?php echo $details1['agency_name'] ?>!!!</b>
                    </div>
                    <a class="nav-link" href="addcar.php?agency_id=<?=$id?>">
                        <i class="fa-solid fa-plus visible"></i><b class="bold visible"> Add Car</b>
                        </a>
                    <div class="nav-vl"></div>
                        <a class="nav-link" href="caredit1.php?agency_id=<?=$id?>">
                        <i class="fa-solid fa-pen-to-square visible"></i><b class="bold visible"> Edit Car</b>
                        </a>
                        <div class="nav-vl"></div>
                        <a class="nav-link" href="agencychangepassword.php?agency_id=<?=$id?>">
                        <i class="fa-solid fa-lock visible"></i><b class="bold visible"> Change Password</b>
                        </a>
                        <div class="nav-vl"></div>
                        <a class="nav-link" href="agencylogout.php?agency_id=<?=$id?>">
                        <i class="fas fa-sign-out-alt visible"></i><b class="bold visible"> Logout</b>
                        </a>
                <?php
                }
                ?>
        </div>
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()"><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button></span>
</nav>
</div>
<div id="loading">
</div>

        <div class="body1">
        <div class="row">
            <center>
                <h2>Car Details</h2><br><br>
            </center>
        </div>
        <?php if(mysqli_num_rows($result2)>0){
            ?>
            <center>
<div class="row">
    <table border="5">
        <tr>
            <th> Car ID </th>  
            <th> Car Name </th>
            <th> Car Model </th>
            <th> Car Number </th>
            <th> Seating </th>
            <th> Rent </th>
            <th> Description </th>
            <th> Edit </th>
        </tr>
        <?php
            foreach($details3 as $details){ 
                $car_id=$details['id'];
            ?>
            <tr>
                <td><?php echo $car_id;?></td>
                <td><?php echo $details['name'];?></td>
                <td><?php echo $details['model'];?></td>
                <td><?php echo $details['number'];?></td>
                <td><?php echo $details['seating'];?></td>
                <td><?php echo $details['rent'];?></td>
                <td><?php echo $details['description'];?></td>
                <td><a href="caredit.php?car_id=<?= $car_id ?>">Edit</a></td>
            </tr>
            <?php
            }
        }
        else{
            echo "<center><h4>No Details Found</h4></center>";
        }
        ?>
    </table>
</div>
</div><br/><br/> 
    </center>
<script>
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }
    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
    </script>
</body>
</html>