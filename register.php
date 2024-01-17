<?php
session_start();
require 'vendor/autoload.php';
require 'database/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitRegistration'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Generate a verification token
    $verificationToken = bin2hex(random_bytes(16)); // More secure token generation

   // Find the highest existing _id
$highestId = $collection->find([], ['sort' => ['_id' => -1], 'limit' => 1])->toArray();

$nextId = 1;
if (!empty($highestId)) {
    $nextId = $highestId[0]['_id'] + 1;
}

// Create a document with the custom _id
$document = [
    '_id' => $nextId,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'email' => $email,
    'phone' => $phone,
    'gender' => $gender,
    'password' => $hashedPassword,
    'verification_token' => $verificationToken,
    'address' => $address,
    'email_status' => 'Not Verified',
    'account_status' => 'Active',
];

// Insert the document into the collection
$insertResult = $collection->insertOne($document);


    if ($insertResult->getInsertedCount() === 1) {
        // Send the verification email using PHPMailer
       

     $mail = new PHPMailer(true);

    // SMTP configuration for Zoho Mail
    $mail->isSMTP();
    $mail->Host = ''; 
    $mail->SMTPAuth = true;
    $mail->Username = 'verification@bleachmehowtodoggie.com'; 
    $mail->Password = ''; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    // Sender and recipient
    $mail->setFrom('verification@bleachmehowtodoggie.com', 'Bleach Me How to Doggie');
    $mail->addAddress($email, $firstname);

    // Email subject
    $mail->Subject = 'Email Verification';
    $mail->addEmbeddedImage(dirname(__FILE__) . '/img/logo.png', 'logo');
    // Email body with HTML content
    $mail->isHTML(true);
    $mail->Body = '
        <!DOCTYPE html>
        <html>
        
        <head>
            <style>
                /* Add your CSS styles here */
                body {
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
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
        
                .logo {
                    text-align: center;
                }
        
                .logo img {
                    height: auto;
                }
        
                .content {
                    padding: 20px;
                    text-align: left;
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
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
        
                .message {
                    font-size: 12px;
                    margin-top: 20px;
                }
                .header {
                    background: linear-gradient(90deg, #fd79a8, #6c5ce7);
                    padding: 20px;
                    color: #fff;
                    text-align: center;
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
              
                <div class="content">
                    <p style="font-size: 24px; font-weight: bold;">Verify your Email</p>
                    <p style="font-size: 13px;"><strong>Dear '.$firstname.',</strong></p>
                    <p class="message">
                    Thank you for registering with Bleach Me How to Doggie Pet Grooming Cafe. To ensure that your account is secure and to provide you with the best experience, we need to verify your email address.

                    Please click on the following link to verify your email:</p><br>
                    
                    <a class="button" href="https://bleachmehowtodoggie.com/email.php?token='.$verificationToken.'">Verify Email</a><br>
                    
                    
                    <p class="message">
                    By verifying your email, youll gain full access to all the features and benefits our platform has to offer. Rest assured that your information is safe with us, and we will only use it to enhance your experience.
                    
                    If you did not sign up for Bleach Me How to Doggie Pet Grooming Cafe account, please disregard this email or contact our support team at <span>support@bleachmehowtodoggie.com</span> for further assistance. Its possible that someone entered your email address by mistake.
                    
                    Thank you for choosing Bleach Me How to Doggie Pet Grooming Cafe. We look forward to serving you.<br><br>
                    
                    <strong>Best regards,<br><br>
                    
                    Bleach Me How to Doggie Support Team </strong>
                    </p>
                   
                </div>
            </div>
        </body>
        
        </html>
        
        ';
        
        if ($mail->send()) {
            // Email sent successfully
            header('Location: verification');
            exit;
        } else {
            echo "Email sending failed.";
        }
        

        if ($mail->send()) {
            // Redirect to a success page or display a success message
            header('Location: verification');
            exit;
        } else {
            echo "Email sending failed.";
        }
    } else {
        echo "Error: Registration failed.";
    }
}
?>

