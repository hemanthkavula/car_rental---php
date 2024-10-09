<?php
session_start();
   require "connect.php";
   if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['full_name']) && !empty($_POST['phone']) && !empty($_POST['address'])){  
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $full_name=$_POST['full_name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $sql="select * from users where email='$email'";
        $result1=mysqli_query($conn,$sql) or die(mysqli_error());
        if($password==$cpassword){
            if(mysqli_num_rows($result1)>0){
                echo "<center><h2>You have Already Registered Please Login!!</h2></center>";
            }
            else{
            $query="insert into users(email,password,full_name,phone,address) values('$email', '$password', '$full_name', '$phone', '$address')";
            $result=mysqli_query($conn,$query) or die(mysqli_error());
            if($result){
                echo header("location:signup1.html");
            }
        }
    }
    else{
        echo "<center><h2>Password and Confirm Password Must be Same!!</h2></center>";
    }
}
    if(isset($_POST['submit'])){
        $_SESSION["email"]=$email;
        $_SESSION["full_name"]=$full_name;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet"/>
</head>
<body>
    <div class="row row1">
        <div class="col-3 img">
        <img src="img/logo.png" class="img1">
    </div>
    <center>
    <div class="col-6 form">
        <i class="fas fa-users signup"></i>
        <h1 class="signup1">SIGNUP</h1>
        <form method="POST">
            <input type="text" placeholder="Full name" name="full_name" id="full_ name" required><br/><br/>
            <input type="email" placeholder="Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br/><br/>
            <input type="text" placeholder="Mobile Number" name="phone" id="phone" maxlength="10" required><br/><br>
            <input type="password" placeholder="Password" name="password" id="password" minlength="6" required><br/><br/>
            <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" minlength="6" required><br/><br/>
            <textarea placeholder="Address" name="address" id="address"></textarea><br/><br/>
            <input type="submit" name="submit" value="Register" class="register"><br/><br/>
            <strong class="login">If already Registered <a href="login_customer.html">Login</a></strong><br/><br/>
        </form>
        </div>
        </center>
    </div>
</body>
</html>