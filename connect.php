<?php

$db_hostname="localhost";
$db_username="root";
$db_password=""; 
$db_name="car_rental";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
// connection 
if($conn){
}
else{
    die("error on the connection". mysqli_error());
}
?>
