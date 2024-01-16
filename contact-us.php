<?php 
session_start();
include 'favicon/favicon.php';
require 'session/session.php';

checkLogin($collection);


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Bleach Me How To Doggie</title>
    
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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/contact.css?v=1.2">
    <link rel="stylesheet" href="css/book.css?v=1.0">
    
</head>
  <body>



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
          <a class="nav-link" href="services-offered">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us" style=" color: #dfdc51; font-weight:800;">Contact</a>
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
  <li><a class="dropdown-item" href="account.php"><ion-icon name="person-circle"></ion-icon> My Account</a></li>
    <li><a class="dropdown-item" href="booking-history.php"><ion-icon name="calendar-number"></ion-icon> Booking History</a></li>
    <li><a class="dropdown-item" href="#"><ion-icon name="settings"></ion-icon> Settings</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="session/logout.php"><ion-icon name="log-out"></ion-icon> Logout</a></li>
  </ul>
</div>

      
    </div>
  </div>
</nav>

    
    <section class="services-sec">
    <div class="modal-container success-modal" id="successModal">
  <div class="modal-content">
    <div class="checkmark-container">
      <i class="fas fa-check-circle"></i>
    </div>
    <p class="message">Message successfully sent! Thank you for reaching us.</p>
  </div>
</div>


        <div class="contact-us">

            <div class="title-con">

                <h1>Get in Touch</h1>

            </div>

            <div class="box-con">
                <div class="contact form">
                    <h3>Send a Message</h3>
                    <form id="messform" action="message.php" method="POST">

                        <div class="form-box">
                            <div class="row50">

                                <div class="inputbox">
                                    <span>First Name*</span>
                                    <input type="text" value="<?php echo $_SESSION['firstname']; ?>" readonly name="first_name" id="first_name">

                                </div>

                                <div class="inputbox">
                                    <span>Last Name*</span>
                                    <input type="text" value="<?php echo $_SESSION['lastname']; ?>" readonly name="last_name" id="last_name">
                                    
                                </div>


                            </div>


                            <div class="row50">

                                <div class="inputbox">
                                    <span>Email*</span>
                                    <input type="email" value="<?php echo $_SESSION['email']; ?>" readonly name="email" id="email">

                                </div>

                                <div class="inputbox">
                                    <span>Mobile Number*</span>
                                    <input type="text" value="<?php echo $_SESSION['phone']; ?>" readonly name="mobile_number" id="mobile_number">
                                    
                                </div>


                            </div>


                            
                            <div class="row100">

                                <div class="inputbox">
                                    <span>Message</span>
                                    <textarea name="message" id="message" placeholder="Write your message here..." required></textarea>
                                </div>

                            </div>

                            <div class="row100">

                                <div class="inputbox">
                                   <input type="submit" value="Send" name="submit" id="submitBtn">
                                </div>

                            </div>

                        </div>    
                        
                    </form>
                </div>

                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class="infobox">
                        <div>
                            <span><ion-icon name="location-outline"></ion-icon></span>
                            <p>22 J. Molina St, Marikina, 1807 Metro Manila PH</p>
                        </div>

                        <div>
                            <span><ion-icon name="mail-outline"></ion-icon></span>
                            <a href="mailto: bleachmehawtodoggie@gmail.com"> bleachmehawtodoggie@gmail.com</a>
                        </div>

                        <div>
                            <span><ion-icon name="call-outline"></ion-icon></span>
                            <a href="(+63) 945-566-6148">(+63) 945-566-6148</a>
                        </div>

                        <ul class="sci">

                            <li><a href=""><ion-icon name="logo-facebook"></ion-icon></a></li>
                            <li><a href=""><ion-icon name="logo-instagram"></ion-icon></a></li>
                            <li><a href=""><ion-icon name="logo-twitter"></ion-icon></a></li>

                        </ul>

                    </div>
                 </div>

                 <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.123481955705!2d121.10085057395547!3d14.648931175893829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b92071585fc9%3A0xf2647a9ca17ba818!2sBleach%20me%20how%20to%20doggie!5e0!3m2!1sen!2sph!4v1690622533189!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                 </div>

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
                     
<div class="preloader">
      <div>
        <img src="img/724.gif" alt="">
    </div>
    <div class="type-div">
        <h6 class="typing-texts" style="font-weight:900;font-family: 'PT Sans Narrow', sans-serif; font-size: 40px; color:#2c2c54"></h6>
    </div>
  </div>
    
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/contact.js"></script>
</body>
</html>