<?php 

session_start();
require 'vendor/autoload.php';

require 'database/connection.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Redirect the user to home.php if logged in
    header('Location: home.php');
    exit;
}


?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Bleach me how to Doggie Pet Grooming Cafe</title>

     
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
         

          <link rel="stylesheet" href="css/styles.css">

</head>
<body >

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
<nav class="navbar navbar-expand-lg" style="background-image: url(img/wave.gif); background-size: cover; background-repeat: no-repeat;">
  <div class="container">
    <a class="navbar-brand" href="home.php"><img src="img/logo.png?v=<?php echo time(); ?>" alt="Logo"></a>
    <div class="btns-nav">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal" style="border-radius: 8px;">
  Sign In
</button>
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Sign Up
</button>
    </div>
   
  </div>
</nav>

  
<!-- Modal Login-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#83055d; color:white;">
        <h1 class="modal-title fs-5" id="loginModalLabel">Welcome Back!!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="POST" action="login.php" id="login-form">
          <div class="form-heading">
            <h3>SIGN IN</h3>
          </div>
          <div class="form-group">
    <label for="emails">
      <i class="fa fa-envelope"></i> Email:
    </label>
    <input type="email" id="emails" name="emails" placeholder="Email" required>
    <span id="login-errors" class="error-message"></span>
  </div>
  <div class="form-group">
    <label for="passwords">
      <i class="fa fa-lock"></i> Password:
    </label>
    <input type="password" id="passwords" name="passwords" placeholder="Password" required>
  </div>
           <div class="form-group-bot"> 
           <!--<div class="form-check" style="margin-bottom: 15px;">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Show Password?
              </label>
            </div> -->
            <div class="form-group">
              <a href="#" class="link-a">Forgot Password</a>
            </div>
          </div>
          <div class="form-group-btn">
            <button type="submit" name="submitLogin" id="submitLogin">Login</button>
          </div>
          <div class="divider">
            <p>--OR--</p>
          </div>
          <div class="form-group-btn">
            <button class="createbtn" type="button" name="createbtn" id="createbtn">Create Account</button>
          </div>
          <div class="form-group-down">
            Don't have an account? <a href="#" class="link-a"> Register</a>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Register -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#83055d;color:white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Join Our Pet Care</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="registrationForm" class="form" method="POST" action="register.php">
    <div class="form-heading">
        <h3>REGISTER NOW</h3>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="firstname">
                    <i class="fa fa-user"></i> Firstname:
                </label>
                <input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
            </div>
            <div class="col">
                <label for="lastname">
                    <i class="fa fa-user"></i> Lastname:
                </label>
                <input type="text" id="lastname" name="lastname" placeholder="Lastname" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">
            <i class="fa fa-envelope"></i> Email:
        </label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <span id="email-error" class="error-message">
        
        </span>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="phone">
                    <i class="fa fa-phone"></i> Phone Number:
                </label>
                <input type="number" id="phone" name="phone" placeholder="Phone Number" required>
                <span id="phone-error" class="error-message">
                

                </span>
            </div>
            <div class="col">
                <label for="gender">
                    <i class="fa fa-venus-mars"></i> Gender:
                </label>
                <div class="input-group">
                    <select class="form-select form-select-sm" id="gender" name="gender" required>
                        <option value="" disabled selected style="display:none;">-Choose Gender-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="password">
                    <i class="fa fa-lock"></i> Password:
                </label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="col">
                <label for="confirm-password">
                    <i class="fa fa-lock"></i> Confirm Password:
                </label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                <span id="confirm-password-error" class="error-message"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="address">
            <i class="fa fa-map-marker"></i> Address:
        </label>
        <input type="text" id="address" name="address" placeholder="Address" required>
    </div>
    <div class="form-check" style="margin-bottom: 15px;">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="cursor: pointer;" required>
  <label class="form-check-label" for="flexCheckDefault">
    I Agree and Read the <a href="#"> Terms and Conditions</a> of Bleach me How to Doggie Pet Grooming Cafe.
  </label>
</div>
    <div class="form-group-btn">
    <button type="submit" name="submitRegistration" id="submitRegistration" title="Please check the checkbox first">Create</button>
    </div>
    <div class="form-group-down">
        Do you have an account? <a href="#" class="link-a"> Sign in</a>
    </div>
</form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>




<!-- Carousel -->
<div class="carousel-container">
  <div class="carousel-background"></div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/bleach me how to doggie.png" class="d-block w-100" alt="..." height="600px" width="900px">
      <div class="slogan-head">
        <div class="title-slog">
        <h2 id="typing-effect"></h2>
        </div>
        <div class="smallogan">
          <p class="p-c" style="font-weight: 100;">We provide top-quality grooming services for your beloved pets</p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>



<div class="container-fluid" id="container-fluid">
  <div class="row align-items-center">
    <!-- Column 1: Faster Service -->
    <div class="col-md-4 text-center" id="assurance1">
      <div class="assurance-content">
        <img src="img/accept.png" alt="Faster Service">
        <h3>Faster Service for Happy Pets</h3>
      </div>
    </div>

    <!-- Column 2: Reliable Grooming -->
    <div class="col-md-4 text-center" id="assurance2">
      <div class="assurance-content">
        <img src="img/accept.png" alt="Reliable Grooming">
        <h3>Trustworthy and Reliable Grooming</h3>
      </div>
    </div>

    <!-- Column 3: Additional Assurance -->
    <div class="col-md-4 text-center" id="assurance3">
      <div class="assurance-content">
        <img src="img/accept.png" alt="Additional Assurance">
        <h3>Extra Care for Your Beloved Pets</h3>
      </div>
    </div>
  </div>
</div>




<!-- Container after carousel -->
<div class="container mt-5" id="con-threee" style="font-family: 'Tektur', cursive;">
  <div class="row">
    <div class="col-lg-4">
      <img src="img/paw.png" alt="Shipping" class="icon-img">
      <h3>Paw Service</h3>
      
      <p style="font-family: 'PT Sans Narrow', sans-serif;">Our dedicated team provides expert grooming, nail trimming, and paw care, ensuring your pet's paws are in top-notch condition. With a gentle touch and premium products, we prioritize your pet's comfort and well-being. Treat your beloved friend to the finest Paw Service available and witness their joy as they strut with confidence.</p>
    </div>
    <div class="col-lg-4">
      <img src="img/tea.png" alt="Payment" class="icon-img">
      <h3>Cafe</h3>
      
      <p style="font-family: 'PT Sans Narrow', sans-serif;">We proudly serve a range of tantalizing beverages, including rich and aromatic coffees, refreshing milk teas, and an array of delicious food options to satisfy your cravings. Join us for a sensory journey of flavors and treat yourself to an unforgettable dining experience. </p>
    </div>
    <div class="col-lg-4">
      <img src="img/money.png" alt="Delivery" class="icon-img">
      <h3>Payment</h3>
      
      <p style="font-family: 'PT Sans Narrow', sans-serif;">Where we provide unparalleled pet grooming services in a serene atmosphere. Please note that our preferred method of payment is cash, ensuring a swift and seamless transaction. Experience the epitome of professional pet care, where your furry companion's well-being is our top priority.</p>
    </div>
  </div>
</div>
</section>


<!-- footer -->


<footer class="footer-distributed">

<div class="footer-left">
    <img src="img/logo.png" alt="">

    <p class="footer-links">
    <a href="#">Home</a>
        |
        <a href="#">Privacy Policy</a>
        |
        <a href="#">Terms and Conditions</a>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

       
        <script src="js/index.js"></script>
       


</body>
</html>
