<?php 
session_start();

include 'favicon/favicon.php';
require 'session/session.php';

checkLogin($collection);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appoinment - Bleach Me How to Doggie</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  
  <link rel="stylesheet" href="css/book.css">

</head>


<body>

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
<nav class="navbar navbar-expand-lg"  style="background-image: url(img/wave.gif); background-size: cover; background-repeat: no-repeat; box-shadow:  4px 6px -2px rgba(0, 0, 0, 0.9);">
  <div class="container" >
    <a class="navbar-brand" href="home"><img src="img/logo.png?v=<?php echo time(); ?>" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create-bookings" style=" color: #dfdc51; font-weight:800;">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services-offered">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us" >Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us">About Us</a>
        </li>
       
      </ul>
      
      <div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
          style="background-color: transparent; border: none; outline: none; color:#55efc4;"
          onfocus="this.style.outline = 'none'; this.style.border = 'none'; this.style.boxShadow = 'none';">
    <img src="img/profile.png" alt="Profile" style="width: 32px; height: 32px; border-radius: 50%; margin-right: 5px;">
    <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
  </button>
  <ul class="dropdown-menu">
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
<div class="title-head">
    <h1>Book Pet Grooming Appoinment</h1>
  </div>
  
<section class="bookings">

 

  <div class="calendar-container" style="background:url('img/cats.png');">
    <div class="header">
      <button id="prevbtn" style="height:40px; width:40px; color:black"><ion-icon name="chevron-back-circle-outline" style="font-size:20px;"></ion-icon></button>
      <div class="month" id="currentMonth"></div>
      <button id="nextbtn" style="height:40px; width:40px; color:black;"><ion-icon name="chevron-forward-circle-outline" style="font-size:20px;"></ion-icon></button>
    </div>
    <div class="days-of-week">
      <div class="day">Sun</div>
      <div class="day">Mon</div>
      <div class="day">Tue</div>
      <div class="day">Wed</div>
      <div class="day">Thu</div>
      <div class="day">Fri</div>
      <div class="day">Sat</div>
    </div>
    <div class="dates-container">
      <div class="dates" id="calendarDates"></div>
    </div>
  </div>

 
  
  </section>
  <hr class="line"> 
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



  <!-- success modal -->


  <div class="modal-container success-modal" id="successModal">
  <div class="modal-content">
    <div class="checkmark-container">
      <i class="fas fa-check-circle"></i>
    </div>
    <p class="message">Booking successful! Thank you.</p>
  </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Booking Details</h2>



    <form id="bookingForm" method="POST" action="booking.php">
      <div class="form-container">
        <div class="checkavailableSection">

        <div class="form-row booking-time-row" >

                <div class="form-group">
                  <label for="selectedDate">Appointment Date:</label>
                  <input type="text" id="selectedDate" name="selectedDate" readonly>
                

                </div>

                <div class="form-group">
                  <label for="bookingtime">Service Time:</label>
                  <select id="bookingtime" name="bookingtime">
                  <option value="" disabled selected style="display:none;">-Select Time-</option>
                              <option value="10:00 am - 10:30 am">10:00 am - 10:30 am</option>
                              <option value="10:30 am - 11:00 am">10:30 am - 11:00 am</option>
                              <option value="11:00 am - 11:30 am">11:00 am - 11:30 am</option>
                              <option value="11:30 am - 12:00 pm">11:30 am - 12:00 pm</option>
                              <option value="12:00 pm - 12:30 pm">12:00 pm - 12:30 pm</option>
                              <option value="12:30 pm - 1:00 pm">12:30 pm - 1:00 pm</option>
                              <option value="1:00 pm - 1:30 pm">1:00 pm - 1:30 pm</option>
                              <option value="1:30 pm - 2:00 pm">1:30 pm - 2:00 pm</option>
                              <option value="2:00 pm - 2:30 pm">2:00 pm - 2:30 pm</option>
                              <option value="2:30 pm - 3:00 pm">2:30 pm - 3:00 pm</option>
                              <option value="3:00 pm - 3:30 pm">3:00 pm - 3:30 pm</option>
                              <option value="3:30 pm - 4:00 pm">3:30 pm - 4:00 pm</option>
                              <option value="4:00 pm - 4:30 pm">4:00 pm - 4:30 pm</option>
                              <option value="4:30 pm - 5:00 pm">4:30 pm - 5:00 pm</option>
                              <option value="5:00 pm - 5:30 pm">5:00 pm - 5:30 pm</option>
                  </select>
                </div>
                <div class="message-container">
                <i id="icon" class=""></i>
                  <span id="message"></span>

                </div>
            </div>



        </div>
      
        <!-- Pet Details Section -->
<div id="petDetailsSection" style="display: none;">
  <div class="form-row">
    <div class="form-group">
      <label for="petName">Pet's Name:</label>
      <input type="text" id="petName" required>
    </div>
    <div class="form-group">
      <label for="petBreed">Breed:</label>
      <input type="text" id="petBreed" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="petAge">Pet's Age:</label>
      <input type="text" id="petAge" required>
    </div>
    <div class="form-group">
      <label for="petGender">Pet's Gender:</label>
      <select id="petGender" required>
      <option value="" disabled selected style="display:none;">-Select Gender-</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
      </select>

    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="petServices">Service Type:</label>
      <select id="petServices" required>
       <option value="" disabled selected style="display:none;">-Choose Services-</option>
                      <option value="Grooming Package1">Grooming Package1</option>
                      <option value="Grooming Package2">Grooming Package2</option>
                      <option value="Grooming Package3">Grooming Package3</option>
                      <option value="Cat Grooming">Cat Grooming</option>
                      <option value="Nail Clip">Nail Clip</option>
                      <option value="Ear Cleaning">Ear Cleaning</option>
                      <option value="Face Trim">Face Trim</option>
                      <option value="Paw Shave">Paw Shave</option>
                      <option value="Teeth Brushing">Teeth Brushing</option>
                      <option value="Dematting">Dematting</option>
                      <option value="Bath and Blowdry">Bath and Blowdry</option>
      </select>
    </div>
  </div>
</div>
        <!-- End of Pet Details Section -->
      </div>

      <!-- Button container for the bottom -->
      <div class="button-container">
        <button type="submit" id="nextBtn" disabled >Next</button>
        <button type="button" id="prevBtn" style="display: none;">Previous</button>
        <button type="button" id="bookBtn" style="display: none;">Book</button>
      </div>
    </form>
  </div>
</div>




<!-- footer -->
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
  <script src="js/booking.js"></script>
</body>
</html>
