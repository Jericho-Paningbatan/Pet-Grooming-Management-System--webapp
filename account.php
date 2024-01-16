<?php 
session_start();
include 'favicon/favicon.php';
require 'session/session.php';
checkLogin($collection);
require 'vendor/autoload.php';

// Establish a connection to your MongoDB server
$client = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");

// Select the MongoDB database and collection
$database = $client->pet_grooming_system;
$collection = $database->client_account;

// Initialize a variable to track the update result
$updateResult = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Define the filter to find the document to update (you may need to use a unique identifier)
    $filter = ['email' => $_SESSION['email']];

    // Define the update operation
    $update = [
        '$set' => [
            'firstname' => $firstName,
            'lastname' => $lastName,
            'phone' => $phone,
            'gender' => $gender,
            'address' => $address,
        ],
    ];

    // Update the document in the collection
    $updateResult = $collection->updateOne($filter, $update);

    // If the update was successful, update the session variables
    if ($updateResult && $updateResult->getModifiedCount() > 0) {
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['phone'] = $phone;
        $_SESSION['gender'] = $gender;
        $_SESSION['address'] = $address;

		session_regenerate_id();

    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Settings - Bleach me how to doggie pet gromming cafe</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-**********" crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="css/account.css">
</head>
<body>

<section class="py-5 my-5">
	<div class="container">
		<h1 class="mb-5" style="font-size: 30px;">
			<a href="home" class="text-dark" style="text-decoration: none;">
				<i class="fa fa-arrow-left mr-2"></i>
			</a>
			Account Settings
		</h1>
		<div class="bg-white shadow rounded-lg d-block d-sm-flex">
			<div class="profile-tab-nav border-right">
				<div class="p-4">
					<div class="img-circle text-center mb-3">
						<img src="img/profile.png" alt="Image" class="shadow">
					</div>
					<button class="btn btn-warning change-profile-btn" style="width: 60%;">Change</button>
					<h4 class="text-center">
					<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
						
					</h4>
				</div>
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
						<i class="fa fa-home text-center mr-1"></i> 
						Account
					</a>
					<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
						<i class="fa fa-key text-center mr-1"></i> 
						Password
					</a>
				</div>
			</div>
			<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
				<!-- Account Tab -->
				<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
					<h3 class="mb-4">Account Settings</h3>
					<!-- Form fields for account settings -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<form action="" method="POST">
							  	<label>First Name</label>
							  	<input type="text" name="firstname" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Last Name</label>
							  	<input type="text" name="lastname" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Email</label>
								  
							  	<input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" readonly>
								  <span class="badge text-bg-primary"><i class="fa fa-check-circle" style="color:green;"></i><?php echo $_SESSION['email_status']; ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Phone number</label>
							  	<input type="text" name="phone" class="form-control" value="<?php echo $_SESSION['phone']; ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Gender</label>
							  	<input type="text" name="gender" class="form-control" value="<?php echo $_SESSION['gender']; ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Address</label>
							  	<input type="text" name="address" class="form-control" value="<?php echo $_SESSION['address']; ?>" required>
							</div>
						</div>
					</div>
					<div>
						<button type="submit" class="btn btn-success">Update</button>
						</form>
							<?php
								// Check if the update was successful and output JavaScript to refresh the page
								if ($updateResult && $updateResult->getModifiedCount() > 0) {
									echo '<script>location.reload();</script>';}
							?>
						<button class="btn btn-light">Cancel</button>
					</div>
				</div>
				<!-- Password Tab -->
				<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
					<h3 class="mb-4">Password Settings</h3>
					<!-- Form fields for password settings -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Old password</label>
							  	<input type="password" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  	<label>New password</label>
							  	<input type="password" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  	<label>Confirm new password</label>
							  	<input type="password" class="form-control" required>
							</div>
						</div>
					</div>
					<div>
						<button class="btn btn-success">Update</button>
						<button class="btn btn-light">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
