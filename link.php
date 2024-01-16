<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['f-email']) && isset($_POST['submitfpass'])) {
    // Check if the user has reached the maximum allowed requests
    $user_email = $_POST['f-email'];
    
    if (isMaxRequestsReached($user_email)) {
        $response = [
            'status' => 'error',
            'message' => 'You have reached the maximum number of password reset requests. Please try again after 24 hours.'
        ];
        echo json_encode($response);
        exit;
    }

    // Check if the time elapsed since the last request is less than 10 minutes
    if (isRecentRequest($user_email)) {
        $response = [
            'status' => 'error',
            'message' => 'Please wait for 10 minutes before making another password reset request.'
        ];
        echo json_encode($response);
        exit;
    }

    // Generate a unique token
    $token = uniqid();

    // Generate an expiration timestamp (10 minutes from now)
    $expiration_time = time() + 600; // 10 minutes expiration time

    // Build the reset link with token and expiration time
    $reset_link = "https://bleachmehowtodoggie.com/password-reset?email=$user_email&token=$token&expires=$expiration_time";
    
    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.zoho.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noreply-reset@bleachmehowtodoggie.com'; 
        $mail->Password   = 'kF592TKPzv9G'; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('noreply-reset@bleachmehowtodoggie.com', 'Bleach Me How to Doggie');
        $mail->addAddress($user_email);
        $mail->addEmbeddedImage(dirname(__FILE__) . '/img/logo.png', 'logo');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body    = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Password Reset</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                }
        
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #ffffff;
                    border: 1px solid #e0e0e0;
                    border-radius: 10px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
        
                .header {
                    background: linear-gradient(90deg, #fd79a8, #6c5ce7);
                    padding: 20px;
                    text-align: center;
                }
        
                .content {
                    padding: 20px;
                }
        
                .logo {
                    text-align: center;
                }
        
                .logo img {
                    height: auto;
                }
                .button {
                    border: 1px solid blue;
                    color: #ffffff;
                    text-align: center;
                    padding: 15px 30px;
                    text-decoration: none;
                    display: inline-block;
                    border-radius: 30px;
                    font-weight: bold;
                    letter-spacing: 1px;
                    transition: background-color 0.2s;
                }
        
                .button:hover {
                    background-color: #b2bec3;
                }
        
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                <div class="logo">
            <img src="cid:logo" alt="Logo">
        </div>
                    
                </div>
                <h2>Account Password Reset</h2>
                <div class="content">
                    <p>We have received a request to reset the password associated with your Bleach Me How to Doggie Pet Grooming Cafe account. To initiate the password reset process, please follow the instructions below:</p>
                    <p>Click on the following link to reset your password: </p><br>
                    <a class="button" href=" '. $reset_link .'">Reset Password</a><br><br>
                    <p>Please note that this password reset link is valid for 5 minutes only. After this period, you will need to request another password reset. Note that you can request only four times, and you need to wait 24 hours to send another request.</p>
                    <p>If you did not initiate this password reset request, please ignore this email. Your account security is important to us, and no changes will be made without your confirmation.</p>
                    <p>If you continue to experience issues or did not request a password reset, please contact our support team at <span>support@bleachmehowtodoggie.com</span> for further assistance.</p>
                    <p>Thank you for choosing Bleach Me How to Doggie Pet Grooming Cafe.</p><br><br>
                    <p><strong>Best regards,</strong></p><br>
                    <p><strong>Bleach Me How to Doggie Support Team</strong></p>
                </div>
            </div>
        </body>
        </html>' ;

        // Check for errors during sending
        if (!$mail->send()) {
            throw new Exception($mail->ErrorInfo);
        }

        // Store the token, expiration time, and timestamp of the request in MongoDB
        storeTokenInMongoDB($user_email, $token, $expiration_time);

        // Return a JSON response upon success
        $response = [
            'status' => 'success',
            'message' => 'Password reset email sent successfully',
            'redirect' => 'https://bleachmehowtodoggie.com/' // Add the redirect URL
        ];
        echo json_encode($response);
        exit;
    } catch (Exception $e) {
        // Return a JSON response for failure
        $response = [
            'status' => 'error',
            'message' => "Message could not be sent. Mailer Error: {$e->getMessage()}"
        ];
        echo json_encode($response);
        exit;
    }
} else {
    // Return a JSON response for invalid request method
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method'
    ];
    echo json_encode($response);
}

function storeTokenInMongoDB($user_email, $token, $expiration_time) {
    // MongoDB connection string
    $mongoUri = "mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/";

    // Connect to MongoDB
    $client = new Client($mongoUri);

    // Select the database and collection
    $database = $client->pet_grooming_system;
    $collection = $database->tokens;

    // Create a document to insert
    $document = [
        'user_email' => $user_email,
        'token' => $token,
        'expiration_time' => $expiration_time,
        'request_time' => time(), // Timestamp of the request
        'used' => false, // Mark the token as unused initially
    ];

    // Insert the document into the collection
    $collection->insertOne($document);
}

function isRecentRequest($user_email) {
    // MongoDB connection string
    $mongoUri = "mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/";

    // Connect to MongoDB
    $client = new Client($mongoUri);

    // Select the database and collection
    $database = $client->pet_grooming_system;
    $collection = $database->tokens;

    // Get the timestamp of the most recent request for the user
    $result = $collection->findOne(
        ['user_email' => $user_email],
        ['sort' => ['request_time' => -1]]
    );

    // Check if a request has been made in the last 10 minutes
    return $result && $result['request_time'] > (time() - 600);
}

function isMaxRequestsReached($user_email) {
    // MongoDB connection string
    $mongoUri = "mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/";

    // Connect to MongoDB
    $client = new Client($mongoUri);

    // Select the database and collection
    $database = $client->pet_grooming_system;
    $collection = $database->tokens;

    // Count the number of password reset requests for the user in the last 24 hours
    $result = $collection->countDocuments([
        'user_email' => $user_email,
        'expiration_time' => ['$gt' => time() - 86400], // 24 hours
        'used' => false
    ]);

    // Debugging statements
    error_log("User email: $user_email, Request count: $result");

    // Check if the maximum requests are reached
    if ($result >= 4) {
        // Check if the last request was more than 24 hours ago
        $lastRequest = $collection->findOne(
            ['user_email' => $user_email],
            ['sort' => ['request_time' => -1]]
        );

        if ($lastRequest && $lastRequest['request_time'] < (time() - 86400)) {
            // Reset the request count if the last request was more than 24 hours ago
            return false;
        }

        // Return true if the maximum requests are reached within 24 hours
        return true;
    }

    // Return false if the maximum requests are not reached
    return false;
}
?>
