<?php

session_start();
require '../vendor/autoload.php';

require '../database/connection.php';
$collection = $database->client_account;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $existingEmail = $collection->findOne(['email' => $email]);

    if ($existingEmail) {
        $emailStatus = $existingEmail['email_status'];
        if ($emailStatus === 'Not Verified') {
            echo "exists_not_verified";
        } else {
            echo "exists_verified";
        }
    } else {
        // Email does not exist in the database
        echo "not_found";
    }
} else {
    echo "Error: Invalid request.";
}
?>
