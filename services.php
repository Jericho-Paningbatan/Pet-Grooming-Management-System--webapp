<?php 
session_start();
include 'favicon/favicon.php';
require 'vendor/autoload.php';
require 'database/connection.php';

require 'session/session.php';

checkLogin($collection);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Bleach Me How To Doggie</title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ysabeau+Office:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
@import url('https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Tektur&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Ysabeau+SC&display=swap');
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
        body {
            font-family: 'Ysabeau Office', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #dfe6e9;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        section {
            padding: 2em;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            overflow: hidden; /* Add this to contain floated elements */
        }
        /* Navbar */


.navbar {
  font-family: 'PT Sans Narrow', sans-serif;
  position: fixed;
  top: 28px; 
 
  left: 0;
  width: 100%;
  background-color: #f7efef;
  z-index: 999;
}


.navbar-nav {
  display: flex;
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.nav-item {
  margin-right: 10px;
  font-family: 'PT Sans Narrow', sans-serif;
}

.nav-link {
  font-size: 16px;
  color: #fff;
  font-weight: 700;
  position: relative;
  transition: color 0.3s ease;
  font-family: 'PT Sans Narrow', sans-serif;
}

.nav-link::after {
  content: "";
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 100%;
  height: 2px;
  background-color: transparent;
  transition: background-color 0.3s ease;
}


.nav-link:hover,
.nav-link:focus {
  color: #dfdc51;
}

.nav-link:hover::after,
.nav-link:focus::after {
  background-color: #dfdc51;
  color: #dfdc51;
}

.active .nav-link,
.nav-link.active {
  color: #dfdc51;
  
}

.active .nav-link::after,
.nav-link.active::after {
  background-color: #dfdc51;
  color: #dfdc51;
}
.nav-link:focus{

 color:#dfdc51 ; 

}




.navbar-toggler {
  color: #0fc4d1; /* Set a color that contrasts with the background */
  font-size: 10px; /* Adjust the size as needed */
  
}




.navbar.transparent {
  background-color: transparent;
}

.navbar.gradient-bg {
  background-color: #218c74 ;
}
.navbar-brand image {
  font-weight: bold;
  color: #1bc7aa;
  width: 40px;
  height: 10px;
}

.navbar-nav .nav-link {
  font-size: 16px;
  margin-right: 10px; /* Add spacing between nav links */
  color: #fff;
  font-weight:500 ;
}
.nav-link:hover{
  color: #dfdc51;

}


.nav-label {
  font-weight: bold;
  color: #666;
  margin-right: 10px;
}



/* top bar */

.top-bar {
  position: fixed;
  top: -5;
  left: 0;
  width: 100%;
  background-color:#22a6b3;
  z-index: 1;
}

.social-media-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.social-media-item {
  display: inline-block;
  margin-right: 10px;
 max-width: 100%;
 
}

.social-media-item a {
  text-decoration: none;
  color: whitesmoke;
}


.call-us {
  text-align: right;
}

.call-us-label {
  font-weight: bold;
  color: #0f0801;
  margin-right: 5px;
  font-size: 13px;
}

.call-us-number {
  font-weight: bold;
  font-size: 14px;
  color: #c8eb68;
}


        .services {
            background-color: #f4f4f4;
        }

        .services, .about, .contact {
            margin-bottom: 2em;
        }

        h2 {
            color: #333;
            font-weight:bold;
            margin-bottom:15px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        .about p {
            color: #555;
        }

        .services .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .services .col {
            flex: 0 1 calc(50% - 20px);
            margin-bottom: 20px;
        }

        .services img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .services .info {
            text-align: left;
        }
        
/* pre loader */

.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.preloader img {
  width: 85px;
}

.type-div{

  margin-top: 30px;
  text-align: center;
  font-size: 50px;
  

}


.typing-text {
  margin-top: 30px;
  text-align: center;
}

        
.footer-distributed {
  background-color:#252546;
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: bold 16px sans-serif;
  padding: 50px 50px 60px 50px;
  margin-top: 80px;
}

.footer-distributed .footer-left, .footer-distributed .footer-center, .footer-distributed .footer-right {
  display: inline-block;
  vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left {
  width: 30%;
}


/* Footer links */

.footer-distributed .footer-links {
  color: #ffffff;
  margin: 20px 0 12px;
}

.footer-distributed .footer-links a {
  display: inline-block;
  line-height: 1.8;
  text-decoration: none;
  color: inherit;
}

.footer-distributed .footer-company-name {
  color: #8f9296;
  font-size: 14px;
  font-weight: normal;
  margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center {
  width: 35%;
}

.footer-distributed .footer-center i {
  background-color:#c44569;
  color: #ffffff;
  font-size: 25px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  text-align: center;
  line-height: 42px;
  margin: 10px 15px;
  vertical-align: middle;
}
.footer-distributed .footer-center i.fa-map-marker{

  font-size: 17px;
  line-height: 38px;
}
.footer-distributed .footer-center i.fa-phone{

  font-size: 17px;
  line-height: 38px;
}
.footer-distributed .footer-center i.fa-envelope {
  font-size: 17px;
  line-height: 38px;
}

.footer-distributed .footer-center p {
  display: inline-block;
  color: #ffffff;
  vertical-align: middle;
  margin: 0;
}

.footer-distributed .footer-center p span {
  display: block;
  font-weight: normal;
  font-size: 14px;
  line-height: 2;
}

.footer-distributed .footer-center p a {
  color: #e0ac1c;
  text-decoration: none;
  ;
}

/* Footer Right */

.footer-distributed .footer-right {
  width: 30%;
}

.footer-distributed .footer-company-about {
  line-height: 20px;
  color: #92999f;
  font-size: 13px;
  font-weight: normal;
  margin: 0;
}

.footer-distributed .footer-company-about span {
  display: block;
  color: #ffffff;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 20px;
}

.footer-distributed .footer-icons {
  margin-top: 25px;
}

.footer-distributed .footer-icons a {
  display: inline-block;
  width: 35px;
  height: 35px;
  cursor: pointer;
  background-color: #33383b;
  border-radius: 2px;
  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;
  margin-right: 3px;
  margin-bottom: 5px;
  padding-top: 2px;
}

.footer-distributed .footer-icons a:hover {
  background-color: #ea3fbf;
}

.footer-links a:hover {
  color: #ea3fd3;
}
@media (max-width: 880px) {
  .footer-distributed .footer-left, .footer-distributed .footer-center, .footer-distributed .footer-right {
      display: block;
      width: 100%;
      margin-bottom: 40px;
      text-align: center;
  }
  .footer-distributed .footer-center i {
      margin-left: 0;
  }
}
@media (max-height:800px) {
  footer {
      position: static;
  }
  header {
      padding-top: 40px;
  }
}


        @media only screen and (max-width: 600px) {
            section {
                padding: 1em;
            }

            .services .row {
                flex-direction: column;
            }

            .services .col {
                flex: 1 0 auto;
                margin-bottom: 10px;
            }
        }
    </style>

</head>
<body>


<div class="loader-wrapper">
      <div class="loader" id="load"></div>
    </div>
    
    <div class="preloader">
      <div>
        <img src="img/724.gif" alt="">
    </div>
    <div class="type-div">
        <h6 class="typing-texts" style="font-weight:900;font-family: 'PT Sans Narrow', sans-serif; font-size: 40px; color:#2c2c54"></h6>
    </div>
  </div>

  <!-- Top Bar -->
<div class="top-bar">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <ul class="social-media-list">
          <li class="social-media-item"><a href="https://www.facebook.com/bleachmehowtodoggie?mibextid=ZbWKwL"><i class="fi fi-brands-facebook " id="brands"></i></a></li>
          <li class="social-media-item"><a href="https://www.instagram.com/bleachmehowtodoggie/?igshid=Y2IzZGU1MTFhOQ%3D%3D&fbclid=IwAR2NCZQlVy2X7qS8hBuMGWtd5_ZaE1UPCpJaP4niJXIIbVyX-1XnAov_yWw"><i class="fi fi-brands-instagram " id="brands"></i></a></li>
          <li class="social-media-item"><a href="#"><i class="fi fi-brands-twitter " id="brands"></i></a></li>
        </ul>
      </div>
      <div class="col-md-6">
        <div class="call-us">
          <i class="fi fi-sr-phone-call">
          <span class="call-us-label">Call Us Now:</span>
          <span class="call-us-number">(+63) 945-566-6148</span>
        </i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg"  style="background-image: url(img/wave.gif); background-size: cover; background-repeat: no-repeat;">
  <div class="container">
    <a class="navbar-brand" href="home"><img src="img/logo.png?v=<?php echo time(); ?>" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link homes" href="home" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create-bookings">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services-offered" style=" color: #dfdc51; font-weight:800;">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us">About Us</a>
        </li>
       
      </ul>
      
      <div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
          style="background-color: transparent; border: none; outline: none; color:#55efc4; font-family: 'Ysabeau Office', sans-serif;"
          onfocus="this.style.outline = 'none'; this.style.border = 'none'; this.style.boxShadow = 'none';">
    <img src="img/profile.png" alt="Profile" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 5px;">
    <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
  </button>
  <ul class="dropdown-menu" style=" font-family: 'Ysabeau Office', sans-serif;">
  <li><a class="dropdown-item" href="account"><ion-icon name="person-circle"></ion-icon> My Account</a></li>
    <li><a class="dropdown-item" href="booking-history"><ion-icon name="calendar-number"></ion-icon> Booking History</a></li>
    <li><a class="dropdown-item" href="#"><ion-icon name="settings"></ion-icon> Settings</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="session/logout.php"><ion-icon name="log-out"></ion-icon> Logout</a></li>
  </ul>
</div>

      
    </div>
  </div>
</nav>

 
<header>
        <h1>Pet Grooming Cafe</h1>
     
    </header>


    <section class="services">
        <h2>Our Services</h2>
        <div class="row">
            <div class="col">
                <img src="img/a.jpg" alt="Grooming Image 1">
            </div>
            <div class="col info">
                <p>We offer a variety of services to keep your pets happy and healthy. Our experienced groomers provide top-notch care to make your pets look and feel their best.</p>
            </div>
        </div>

        <div class="row">
            <div class="col info">
                <p>Our full grooming packages include bathing, brushing, nail clipping, and ear cleaning. We ensure a cozy and comfortable experience for your furry friends.</p>
            </div>
            <div class="col">
                <img src="img/b.jpg" alt="Grooming Image 2">
            </div>
        </div>

        <div class="row">
            <!-- Add more rows as needed -->
            <div class="col">
                <img src="img/c.jpg" alt="Grooming Image 3">
            </div>
            <div class="col info">
                <p>Our skilled groomers are dedicated to providing personalized care for each pet. Your pets will receive individual attention in a calm and stress-free environment.</p>
            </div>
        </div>

        <div class="row">
            <div class="col info">
                <p>Whether it's a simple bath or a complete grooming session, our team ensures the highest level of hygiene and care for your beloved pets.</p>
            </div>
            <div class="col">
                <img src="img/d.jpg" alt="Grooming Image 4">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <img src="img/e.jpg" alt="Grooming Image 5">
            </div>
            <div class="col info">
                <p>We use premium products and gentle techniques to ensure your pets not only look good but also enjoy the grooming process. Your pet's comfort is our priority.</p>
            </div>
        </div>

        <div class="row">
            <div class="col info">
                <p>Our expert groomers are trained to handle pets of all sizes and breeds. We tailor our services to meet the unique needs and preferences of each pet and owner.</p>
            </div>
            <div class="col">
                <img src="img/f.jpg" alt="Grooming Image 6">
            </div>
        </div>

    </section>

    <footer class="footer-distributed">

<div class="footer-left">
    <img src="img/logo.png" alt="">

    <p class="footer-links">
    <a href="home">Home</a>
        |
        <a href="privacy-policy">Privacy Policy</a>
        |
        <a href="terms-and-condition">Terms and Conditions</a>
    </p>

    <p class="footer-company-name">Copyright © 2023 <strong>Bleach Me How to Doggie Pet Grooming Cafe</strong> All rights reserved</p>
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>22 J. Molina St, Marikina, 1807 Metro Manila</span>
            PHILIPPINES</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>(+63) 945-566-6148</p>
    </div>
    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:bleachmehawtodoggie@gmail.com">bleachmehawtodoggie@gmail.com</a></p>
    </div>
</div>
<div class="footer-right">
<p class="footer-company-about">
        <span>About the company</span>
       Paws & Perks: A pet grooming cafe where pets are pampered, and owners unwind with refreshments, fostering joyful moments together.
    </p>
    <div class="footer-icons">
    <a href="https://www.facebook.com/bleachmehowtodoggie?mibextid=ZbWKwL"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="https://www.instagram.com/bleachmehowtodoggie/?igshid=Y2IzZGU1MTFhOQ%3D%3D&fbclid=IwAR2NCZQlVy2X7qS8hBuMGWtd5_ZaE1UPCpJaP4niJXIIbVyX-1XnAov_yWw"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
    </div>
</div>
</footer>


</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
  <script src="js/script.js"></script>
</html>
