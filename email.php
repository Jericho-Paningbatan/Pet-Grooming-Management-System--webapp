<?php

session_start();
require 'vendor/autoload.php';
require 'database/connection.php';



$token = $_GET['token'];

// Check if the token exists in the database
$result = $collection->findOne(['verification_token' => $token]);

if ($result) {
    // Update the email_status to 'Verified'
    $updateResult = $collection->updateOne(
        ['_id' => $result['_id']],
        ['$set' => ['email_status' => 'Verified']]
    );

    if ($updateResult->getModifiedCount() === 1) {
        // Set a session variable with the user's _id from the database
        $_SESSION['user_id'] = $result['_id'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['phone'] = $result['phone'];
        $_SESSION['gender'] = $result['gender'];
        $_SESSION['address'] = $result['address'];
        $_SESSION['email_status'] = $result['email_status'];
        $_SESSION['account_status'] = $result['account_status'];
  
        // Redirect to home.php
        header('Location: home');
        exit;
    } else {
        echo "Error updating email status.";
    }
} else {
    echo "Invalid or expired verification link.";
}



?>