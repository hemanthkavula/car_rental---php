<?php
require "fpdf184/fpdf.php";
require "connect.php";
session_start();


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$property_id=$_GET['car_id'];
$sql2="select * from booking_details where user_id='$user_id' and car_id='$property_id'";
$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    echo "Something went wrong!";
    return;
}
$details = mysqli_fetch_assoc($result2);
if (!$details) {
    echo "Something went wrong!";
    return;
}
$city_id=$details['city_id'];
$agency_id=$details['agency_id'];
$car_id=$details['car_id'];
$start_date=$details['start_date'];
$end_date=$details['end_date'];
$days=$details['days'];
$total_rent=$details['total_rent'];
$paidornot=$details['paidornot'];

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
$sql2="select * from agency where id='$agency_id'";
$result2=mysqli_query($conn,$sql2);
$property2=mysqli_fetch_assoc($result2);

$sql3="select * from users where id='$user_id'";
$result3=mysqli_query($conn,$sql3);
$property3=mysqli_fetch_assoc($result3);

$sql4="select * from rentcars where id='$car_id'";
$result4=mysqli_query($conn,$sql4);
$property4=mysqli_fetch_assoc($result4);
$rent=$property4['rent'];

$date= date("Y/m/d");



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Image('img/logo.png',70,5,70,20);
$pdf->Line(10,30,200,30);
$pdf->SetY(35);
$pdf->Cell(0,10,"Booking Details :",0,1);
$pdf->Cell(70,10,'Booking ID :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$details['booking_id'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(55,10,'Status :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$details['paidornot'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(88,10,'Date of Booking :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$date,0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(88,10,'Start Date :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$start_date,0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(88,10,'End Date :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$end_date,0,1,false);
$pdf->SetFont('Arial','',20);
$pdf->Line(10,100,200,100);
$pdf->SetY(105);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,"Agency Details :",0,1);
$pdf->Cell(70,10,'Agency Name :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$property2['agency_name'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(55,10,'Address :',0,0,'R',false);
$pdf->SetFont('Arial','',18);
$pdf->MultiCell(0,10,$property2['address'],0,1,false);
$pdf->Line(10,165,200,165);
$pdf->SetY(170);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,"Customer Details :",0,1);
$pdf->Cell(50,10,'Name :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(70,10,$property3['full_name'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(60,10,'Address :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->MultiCell(0,10,$property3['address'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(51,10,'Email :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->MultiCell(0,10,$property3['email'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(82,10,'Phone Number :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->MultiCell(0,10,$property3['phone'],0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Line(10,230,200,230);
$pdf->SetY(235);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,"Payment Details :",0,1);
$pdf->Cell(70,10,'Original Rent :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$rent,0,1,false);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(70,10,'Days :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$days,0,1,false);
$pdf->Line(25,265,135,265);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(70,10,'Total :',0,0,'R',false);
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,$rent*$days,0,1,false);
$pdf->Line(25,275,135,275);
$pdf->Output()

?>