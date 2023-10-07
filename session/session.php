<?php
require 'vendor/autoload.php';
require 'database/connection.php';

// Check if the user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Redirect the user to the login page if not logged in or if account status is "Not Active"
function checkLogin($collection) // Pass $collection as a parameter
{
    if (!isLoggedIn()) {
        header('Location: index.php');
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