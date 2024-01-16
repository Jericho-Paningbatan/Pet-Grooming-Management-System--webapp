<?php

require 'vendor/autoload.php';

use MongoDB\Client;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = 'email'; // Change this to your actual field name

    // Retrieve values from the form
    $userEmail = $_POST['email'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validate passwords
    if ($newPassword !== $confirmPassword) {
        echo 'Passwords do not match. Please try again.';
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Connect to MongoDB
    $mongoUri = "mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/";
    $client = new Client($mongoUri);

    // Select the database and collection
    $database = $client->pet_grooming_system;
    $collection = $database->client_account;

    // Update the document with the new hashed password
    $updateResult = $collection->updateOne(
        [$userId => $userEmail],
        ['$set' => ['password' => $hashedPassword]]
    );

    if ($updateResult->getModifiedCount() > 0) {
        echo 'Password updated successfully.';
    } else {
        echo 'Failed to update password.';
    }
} else {
    // Invalid request
    echo 'Invalid request.';
}
?>
