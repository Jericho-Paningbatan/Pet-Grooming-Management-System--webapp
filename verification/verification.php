<?php

session_start();
include '../favicon/favicon.php';
require '../vendor/autoload.php';
require '../database/connection.php';

// Check if the user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Redirect the user to the login page if not logged in or if account status is "Not Active"
function checkLogin($collection) // Pass $collection as a parameter
{
    if (!isLoggedIn()) {
        header('Location: https://bleachmehowtodoggie.com/');
        exit;
    }

    // Find the user based on the stored user_id
    $user = $collection->findOne(['_id' => $_SESSION['user_id']]);

    if ($user !== null) {
        // Check if the account is active
        if ($user['account_status'] === 'Not Active') {
            // Account is not active, log the user out and redirect to login page
            session_unset();
            session_destroy();
            header('Location: index.php?message=inactive');
            exit;
        }
    } else {
        // User with the stored user_id not found, log the user out and redirect to login page
        session_unset();
        session_destroy();
        header('Location: index.php?message=notfound');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Email Verification</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }
    .content {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .message {
      margin-bottom: 20px;
    }
    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4caf50;
      color: #ffffff;
      text-decoration: none;
      border-radius: 4px;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      margin-top: 20px;
      color: #888888;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="../img/email.png" alt="Avatar">
    </div>
    <div class="content">
      <h1 class="title">Verify Your Email</h1>
      <p class="message">Thank you for Signing up to Bleach me how to doggie Pet Grooming Cafe! Please verify your email address to activate your account.</p>
      
    </div>
    <div class="footer">
      &copy; 2023 Bleach Me How to Doggie Pet Grooming Cafe. All rights reserved.
    </div>
  </div>
</body>
</html>
