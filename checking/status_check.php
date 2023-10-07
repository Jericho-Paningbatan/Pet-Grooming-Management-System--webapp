<?php
session_start();
require '../vendor/autoload.php';
require '../database/connection.php';

$collection = $database->client_account;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Check if the email exists in the database
        $existingEmail = $collection->findOne(['email' => $email]);

        if ($existingEmail) {
            echo "exists_email";
            exit;
        }
    }

    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];

        // Check if the phone number exists in the database
        $existingPhone = $collection->findOne(['phone' => $phone]);

        if ($existingPhone) {
            echo "exists_phone";
            exit;
        }
    }

    // If the script reaches here, both email and phone are available
    echo "available";
} else {
    echo "Error: Invalid request.";
}
?>
