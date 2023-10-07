<?php
session_start();
require 'vendor/autoload.php';

require 'database/connection.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitRegistration'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    // Check for duplicate email and phone number
    $existingEmail = $collection->findOne(['email' => $email]);
    $existingPhone = $collection->findOne(['phone' => $phone]);

    if ($existingEmail || $existingPhone) {
        if ($existingEmail) {
            echo "exists_email";
        } elseif ($existingPhone) {
            echo "exists_phone";
        }
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Generate the next auto-increment ID
        $count = $collection->countDocuments([]) + 1;
        $id = $count;

        // Create a document to insert into the collection
        $document = [
            '_id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'password' => $hashedPassword, // Store the hashed password
            'address' => $address,
            'email_status' => 'Not Verified',
            'account_status' => 'Active'
        ];

        // Insert the document into the collection
        $insertResult = $collection->insertOne($document);

        if ($insertResult->getInsertedCount() === 1) {
            // Redirect to verification.php
            header('Location: verification/verification.php');
            exit;
        } else {
            echo "error";
        }
    }

    // Prevent any further output from the PHP script
    exit;
} else {
    echo "Error: Form submission failed or method not valid.";
}
?>
