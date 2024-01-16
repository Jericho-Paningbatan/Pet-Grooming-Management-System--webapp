<?php
session_start();
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");

$database = $mongoClient->pet_grooming_system;
$collection = $database->client_account;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Check if the email exists in the database
        $existingEmail = $collection->findOne(['email' => $email]);

        if ($existingEmail) {
            echo json_encode(['status' => 'exists_email']);
            exit;
        }
    }
    echo json_encode(['status' => 'available']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
