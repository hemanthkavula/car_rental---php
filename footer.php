<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<style>
  .footer-dark {
  padding:50px 0;
  color:#f0f9ff;
  background-color:#282d32;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}
.mail{
  text-decoration: none;
  color: white;
  text-align:center;
}
</style>
</head>

<body>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="city.php?city=bangalore">Car Rental in Bangalore</a></li>
                            <li><a href="city.php?city=delgi">Car Rental in Delhi</a></li>
                            <li><a href="city.php?city=mumbai">Car Rental in Mumbai</a></li>
                            <li><a href="city.php?city=hyderabad">Car Rental in Hyderabad</a></li>
                            <li><a href="city.php?city=chennai">Car Rental in Chennai</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="register_customer.php">Signup</a></li>
                            <li><a href="login_customer.html">Login</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Car Rental</h3>
                        <p>Car Rental is a web based application which will help to book an available car.</p>
                    </div>
                    <div class="col item social"><a href="https://www.facebook.com" target="_blank"><i class="icon ion-social-facebook"></i></a><a href="https://www.twitter.com" target="_blank"><i class="icon ion-social-twitter"></i></a><a href="https://www.instagram.com" target="_blank"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <br>
                <center>
                <p><a class="mail" href="mailto:carrental@gmail.com">If u have any queries Send an email to carrental@gmail.com</a></p>
                </center>
                <p class="copyright">Car Rental © 2023</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>