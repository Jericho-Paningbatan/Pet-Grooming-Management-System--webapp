<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email']) && isset($_GET['token']) && isset($_GET['expires'])) {
    $user_email = $_GET['email'];
    $token = $_GET['token'];
    $expiration_time = $_GET['expires'];

    // Validate the token and expiration time
    if (validateResetLink($user_email, $token, $expiration_time)) {
        // Show the password reset form or perform the password reset logic here
       
    } else {
        // Invalid link. Redirect to invalid.php
        header('Location: error-expired-link');
        exit;
    }
} else {
    // Invalid request. Redirect to invalid.php
    header('Location: error-expired-link');
    exit;
}

function validateResetLink($user_email, $token, $expiration_time) {
    // MongoDB connection string
    $mongoUri = "mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/";

    // Connect to MongoDB
    $client = new Client($mongoUri);

    // Select the database and collection
    $database = $client->pet_grooming_system;
    $collection = $database->tokens;

    // Find the document with the specified email and token
    $result = $collection->findOne([
        'user_email' => $user_email,
        'token' => $token,
        'used' => false, // Ensure the token is not marked as used
    ]);

    // Check if the document exists and the expiration time has not passed
    if ($result && $result['expiration_time'] >= time()) {
        // Mark the token as used to prevent further use
        $collection->updateOne(
            ['_id' => $result['_id']],
            ['$set' => ['used' => true]]
        );
        return true;
    }

    return false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(90deg, #fd79a8, #6c5ce7);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 30px;
            width: 350px;
            text-align: left;
            color: #fff;
        }

        .reset-container img {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .reset-container h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #00b894;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 12px;
            margin-bottom: 12px;
            color: #555;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .error-message {
            color: #d9534f;
            font-size: 14px;
            margin-top: 8px;
            display: none;
        }

        .form-group button {
            background-color: #00b894;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            pointer-events: none;
        }

        .form-group button:hover {
            background-color: #e84393;
        }

        .form-group button.enabled {
            pointer-events: auto;
        }

        .password-strength {
            margin-top: 10px;
            font-size: 13px;
        }

        .strength-low,
        .strength-medium,
        .strength-high {
            display: none;
        }

        .strength-low {
            color: red;
        }

        .strength-medium {
            color: orange;
        }

        .strength-high {
            color: green;
        }

        .modal-overlay,
.modal {
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value for darkness */
    z-index: 9998;
}

.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    z-index: 9999;
}

.checkmark {
    color: #00b894;
    font-size: 50px;
    text-align: center;
}

.modal.show,
.modal-overlay.show {
    display: block;
    opacity: 1;
}

    </style>
</head>

<body>
    <div class="reset-container">
        <img src="img/logo.png" alt="Logo">
        <h2>Password Reset</h2>
        <form id="reset-form" name="reset-form"  method="POST">
            <div class="form-group">
            <input type="hidden" name="email" value="<?php echo $user_email; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required>
                <div class="password-strength" id="password-strength">
                    <span class="strength-low">Password Strength: Low</span>
                    <span class="strength-medium">Password Strength: Medium</span>
                    <span class="strength-high">Password Strength: High</span>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <span id="match-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <button type="submit" id="change-password" class="enabled">Change</button>
            </div>
        </form>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="successModal">
        <div class="checkmark">✓</div>
        <p>Password changed successfully!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    
    $(document).ready(function () {
    var passwordStrength = $("#password-strength");
    var strengthLow = $(".strength-low");
    var strengthMedium = $(".strength-medium");
    var strengthHigh = $(".strength-high");

    $("#new-password, #confirm-password").on("input", function () {
        validatePassword();
    });

    $("#change-password").click(function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        validatePassword();

        // Check if the button is enabled
        if ($("#change-password").hasClass("enabled")) {
            // Make Ajax request
            var xhr = new XMLHttpRequest();
            var formData = new FormData(document.getElementById('reset-form'));

            xhr.open('POST', 'process-reset.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Password update successful
                        document.getElementById('match-error').innerText = '';
                        showSuccessModal();
                    } else {
                        // Password update failed
                        document.getElementById('match-error').innerText = xhr.responseText;
                    }
                }
            };
            xhr.send(formData);
        }
    });

    function validatePassword() {
        var newPassword = $("#new-password").val();
        var confirmPassword = $("#confirm-password").val();

        strengthLow.hide();
        strengthMedium.hide();
        strengthHigh.hide();

        if (newPassword.length > 0) {
            passwordStrength.show();
        } else {
            passwordStrength.hide();
            $(".error-message").hide().text("");
            enableButton(false);
            return;
        }

        var strength = calculatePasswordStrength(newPassword);

        if (strength === "low") {
            strengthLow.show();
            enableButton(false);
        } else if (strength === "medium") {
            strengthMedium.show();
            enableButton(false);
        } else if (strength === "high") {
            strengthHigh.show();
            enableButton(true);
        }

        if (newPassword !== confirmPassword) {
            $("#match-error").text("Passwords do not match. Please try again.").show();
            enableButton(false);
        } else {
            $("#match-error").hide().text("");
        }
    }

    function enableButton(enabled) {
        if (enabled) {
            $("#change-password").addClass("enabled");
        } else {
            $("#change-password").removeClass("enabled");
        }
    }

    function calculatePasswordStrength(password) {
        // Implement your password strength logic here
        // Check for the presence of numbers, symbols, uppercase and lowercase letters, and length
        var hasNumber = /[0-9]/.test(password);
        var hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        var hasUpperCase = /[A-Z]/.test(password);
        var hasLowerCase = /[a-z]/.test(password);

        if (password.length >= 8 && hasNumber && hasSymbol && hasUpperCase && hasLowerCase) {
            return "high";
        } else if (password.length >= 8) {
            return "medium";
        } else {
            return "low";
        }
    }

    function showSuccessModal() {
        document.getElementById('successModal').classList.add('show');
        document.getElementById('modalOverlay').classList.add('show');

        // Wait for 3 seconds and then redirect
        setTimeout(function () {
            window.location.href = 'https://bleachmehowtodoggie.com';
        }, 3000);
        
    
    }


});






    </script>
</body>

</html>
