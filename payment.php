<?php
session_start();
require "connect.php";

function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		} 
		
$change =  passFunc(8, '1234567890');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$property_id=$_GET['car_id'];
if (isset($_POST['submit'])){
    $query="update booking_details set paidornot= 'Paid', booking_id='$change' where user_id='$user_id' and car_id='$property_id'";
    $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        if($result){
            header("location:gen_pdf.php?car_id=$property_id");
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="css/all.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fontawesome.min.css" rel="stylesheet" />
    <style>
        .inlineimage {
            max-width: 470px;
            margin-right: 8px;
            margin-left: 10px
        }

        .images {
            display: inline-block;
            max-width: 98%;
            height: auto;
            width: 22%;
            margin: 1%;
            left: 20px;
            text-align: center
        }
        .pay{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container pay">
        <div class="row">
            <div class="col-xs-12 col-md-5 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                            <h3 class="text-center">Payment Details</h3>
                            <img src="img/card.jpeg">
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>CARD NUMBER</label>
                                        <div class="input-group"> <input type="tel" class="form-control" placeholder="Valid Card Number" required /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group"> <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label> <input type="tel" class="form-control" placeholder="MM / YY" required/> </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group"> <label>CV CODE</label> <input type="tel" class="form-control" placeholder="CVC" required/> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>CARD OWNER</label> <input type="text" class="form-control" placeholder="Card Owner Name" required/> </div>
                                </div>
                            </div>
                    </div>
                    </div><br>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12"><input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Confirm Payment"></div>
                    </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>