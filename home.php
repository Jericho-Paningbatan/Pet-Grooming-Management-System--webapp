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
  <title>Home - Bleach Me How to Doggie: Pet Grooming Cafe</title>

  
  
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
 
  <link rel="stylesheet" href="css/stylev2.css?v=2.3">
  <link rel="stylesheet" href="css/gallery.css">
  
  
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


    <button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top" style="@media screen and (max-device-width: 320px) and (orientation: portrait){display: none;}">
      <i class="fa fa-arrow-up"></i>
    </button>
    
<section id="home">
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
          <a class="nav-link homes" href="home" style=" color: #dfdc51; font-weight:800;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create-bookings">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services-offered">Services</a>
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


<!-- Carousel -->
<div class="carousel-container">
  <div class="carousel-background"></div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/bleach me how to doggie.png" class="d-block w-100" alt="..." height="600px" width="900px">
      <div class="slogan-head">
        <div class="title-slog">
        <h2 id="typing-effect" style="font-size: 40px;"></h2>
        </div>
        <div class="smallogan">
          <p>We provide top-quality grooming services for your beloved pets</p>
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
<div class="container  mt-5"  id="con-threee" style="font-family: 'Tektur', cursive;background-color: white;">
  <div class="row">
    <div class="col-lg-4">
      <img src="img/paw.png" alt="Shipping" class="icon-img">
      <h3 style="color: goldenrod;">Paw Service</h3>
      
      <p style="font-family: 'PT Sans Narrow', sans-serif;">Our dedicated team provides expert grooming, nail trimming, and paw care, ensuring your pet's paws are in top-notch condition. With a gentle touch and premium products, we prioritize your pet's comfort and well-being. Treat your beloved friend to the finest Paw Service available and witness their joy as they strut with confidence.</p>
    </div>
    <div class="col-lg-4">
      <img src="img/tea.png" alt="Payment" class="icon-img">
      <h3 style="color: goldenrod;">Cafe</h3>
      
      <p style="font-family: 'PT Sans Narrow', sans-serif;">We proudly serve a range of tantalizing beverages, including rich and aromatic coffees, refreshing milk teas, and an array of delicious food options to satisfy your cravings. Join us for a sensory journey of flavors and treat yourself to an unforgettable dining experience. </p>
    </div>
    <div class="col-lg-4">
      <img src="img/money.png" alt="Delivery" class="icon-img">
      <h3 style="color: goldenrod;">Payment</h3>
      
      <p style="font-family: 'PT Sans Narrow', sans-serif;">Where we provide unparalleled pet grooming services in a serene atmosphere. Please note that our preferred method of payment is cash, ensuring a swift and seamless transaction. Experience the epitome of professional pet care, where your furry companion's well-being is our top priority.</p>
    </div>
  </div>
</div>
</section>

<div class="container-fluid">
  <header class="header">
    <h1>Our Gallery</h1>
   
  </header>
  </div>
<!-- gallery -->
<section class="gallery">

    <div class="row">
      <div class="column">
        <img src="img/one.jpg" alt="Image 1">
        <div class="date">Posted: July 21, 2023 - 12:30 PM</div>
      </div>
      <div class="column">
        <img src="img/two.jpg" alt="Image 2">
        <div class="date">Posted: July 20, 2023 - 10:15 AM</div>
      </div>
      <div class="column">
        <img src="img/three.jpg" alt="Image 3">
        <div class="date">Posted: July 19, 2023 - 3:45 PM</div>
      </div>
      <div class="column">
        <img src="img/four.jpg" alt="Image 4">
        <div class="date">Posted: July 18, 2023 - 9:00 AM</div>
      </div>
    </div>

    <div class="row">
      <div class="column">
        <img src="img/five.jpg" alt="Image 1">
        <div class="date">Posted: July 21, 2023 - 12:30 PM</div>
      </div>
      <div class="column">
        <img src="img/image1.jpg" alt="Image 2">
        <div class="date">Posted: July 20, 2023 - 10:15 AM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 3">
        <div class="date">Posted: July 19, 2023 - 3:45 PM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 4">
        <div class="date">Posted: July 18, 2023 - 9:00 AM</div>
      </div>
    </div>
    <div class="row">
      <div class="column">
        <img src="img/1.jpg" alt="Image 1">
        <div class="date">Posted: July 21, 2023 - 12:30 PM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 2">
        <div class="date">Posted: July 20, 2023 - 10:15 AM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 3">
        <div class="date">Posted: July 19, 2023 - 3:45 PM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 4">
        <div class="date">Posted: July 18, 2023 - 9:00 AM</div>
      </div>
    </div>
    <div class="row">
      <div class="column">
        <img src="img/1.jpg" alt="Image 1">
        <div class="date">Posted: July 21, 2023 - 12:30 PM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 2">
        <div class="date">Posted: July 20, 2023 - 10:15 AM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 3">
        <div class="date">Posted: July 19, 2023 - 3:45 PM</div>
      </div>
      <div class="column">
        <img src="img/1.jpg" alt="Image 4">
        <div class="date">Posted: July 18, 2023 - 9:00 AM</div>
      </div>
    </div>

    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

</section>
<hr class="line"> 

<!-- services -->

  <section class="services-sec">

        <div class="wrapper-services">

            <h1>Our Services</h1>
            <p>Alacarte Services</p>

            <div class="content-box">

                <div class="card" >
                    <img src="img/ear-cleaning.png" alt="">
                   
                    <h3>Nail Trimming</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

                <div class="card" >
                    <img src="img/ear-cleaning.png" alt="">
                    <h3>Ear Cleaning</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

                <div class="card" >
                    <img src="img/ear-cleaning.png" alt="">
                    <h3>Face Trimming</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

                <div class="card" >
                    <img src="img/ear-cleaning.png" alt="">
                    <h3>Demmating</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

                <div class="card" >
                    <img src="img/ear-cleaning.png" alt="">
                    <h3>Paw Shave</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

                <div class="card">
                    <img src="img/ear-cleaning.png" alt="">
                    <h3>Teet Brushing</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

                <div class="card">
                    <img src="img/ear-cleaning.png" alt="">
                    <h3>Bath and Blowdry</h3>
                    <p>Maecenas et leo ut neque lacinia interdum. Ut non molestie tortor. 
                    Aliquam dignissim scelerisque orci, nec condimentum massa luctus molestie.</p>
                    <div class="price">
                        <a href="">Price: ₱100</a>
                    </div>
                </div>

            </div>
        </div>

    </section>


 
  <hr class="line"> 





<!-- About Us -->

<section class="about-us-sec">
        <div class="about-us">
            <h1>about us</h1>
            <div class="wrapper">
                <div class="content">
                    <h3> Welcome to Bleach Me How To Doggie Pet Grooming Cafe,
        Paws Lovers. </h3>
                    <p> Now a date with your pets were made cool, relaxing, and enjoyable. We bring you Bleach Me How To Doggie. The very first Pet Grooming Cafe right in the heart of Marikina City. Enjoy our cozy and instagrammable place for your picture perfect moments. Definitely, it really feels like home as our trained staff and baristas welcome you with their warm smiles and excellent customer service.
                         <p>You can truly enjoy our signature drinks as we only serve quality ingredients and freshly brewed coffee. Your pets deserve the very best. Let them experience the luxury of our grooving done by our professional group. Bleach Me How To Doggie don try the rest, you deserve the best.</p>
                    <div class="button">
                        <a href="">read more</a>
                    </div>
                    <div class="social">
                        <a href=""><i class="fa fa-facebook-f"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="image-section">
                    <img src="img/logoshop.png" alt="">
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



</body>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
  <script src="js/script.js"></script>


</html>