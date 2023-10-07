<?php
session_start();
require 'vendor/autoload.php';

require 'database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emails']) && isset($_POST['passwords'])) {
    $email = $_POST['emails'];
    $password = $_POST['passwords'];

    // Find the user based on the provided email
    $user = $collection->findOne(['email' => $email]);

    if ($user !== null) {
        // Check if the account is active
        if ($user['account_status'] === 'Not Active') {
            echo "Account is not active. Please contact support for assistance.";
            exit;
        }

        // Check if the email is verified
        if ($user['email_status'] === 'Not Verified') {
            echo "Email not verified. Please verify your email to log in.";
            exit;
        }

        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Password is correct, log in the user and store data in session
            $_SESSION['user_id'] = $user['_id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['address'] = $user['address'];
            $_SESSION['email_status'] = $user['email_status'];
            $_SESSION['account_status'] = $user['account_status'];

            echo "success";
            exit;
        } else {
            echo "Incorrect password.";
            exit;
        }
    } else {
        echo "User with the provided email not found.";
        exit;
    }
} else {
    echo "Error: Form submission failed or method not valid.";
    exit;
}
?>
