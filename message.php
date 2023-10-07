<?php
session_start();
require 'vendor/autoload.php';

// Initialize the response data
$responseData = array();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $mobileNumber = $_POST["mobile_number"];
    $message = $_POST["message"];

    // Combine first name and last name to create the name field
    $name = $firstName . " " . $lastName;

    // Validate the data (you can add further validation as needed)

    // Set up MongoDB connection
    $mongoClient = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");

    // Select the database and collection
    $database = $mongoClient->pet_grooming_system;
    $collection = $database->messages;

    // Get the user ID from the session (assuming you have set it earlier)
    $userId = $_SESSION['user_id'];

    // Create a new document with the current date and time
    $document = [
        "user_id" => $userId, // Add the user ID to the document
        "name" => $name, // Add the combined name to the document
        "email" => $email,
        "mobile_number" => $mobileNumber,
        "message" => $message,
        "date_time" => date('Y-m-d g:i a'), // Automatic date and time in format "2023-08-01 1:45 pm"
    ];

    // Insert the document into the collection
    $insertResult = $collection->insertOne($document);

    // Check if the insertion was successful
    if ($insertResult->getInsertedCount() > 0) {
        // Form submission was successful
        $responseData["status"] = "success";
        $responseData["message"] = "Message successfully submitted!";
    } else {
        // Form submission failed
        $responseData["status"] = "error";
        $responseData["message"] = "Failed to submit the message.";
    }
} else {
    // Form not submitted
    $responseData["status"] = "error";
    $responseData["message"] = "Bad Request: Form not submitted!";
}

// Respond with JSON data
header('Content-Type: application/json');
echo json_encode($responseData);
?>
