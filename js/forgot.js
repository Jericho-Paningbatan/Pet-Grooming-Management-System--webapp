//   forgot password


var femailInput = document.getElementById("f-email");
var femailErrorSpan = document.getElementById("fpass-errors");
var btnfsub = document.getElementById("submitfpass");

femailExists = false;


function checkfEmailExists(email) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "exists_email") {
                    femailErrorSpan.textContent = "";
                    femailExists = true;
                    enablefSubmitButton();
                } else {
                    femailErrorSpan.textContent = "Email not associated with any account.";
                    femailExists = false;
                    disablefSubmitButton();
                }
            } else {
                console.error("Error occurred while checking email existence.");
            }
        }
    };
    

    xhr.open("POST", "forgot.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var formData = "email=" + encodeURIComponent(email);
    xhr.send(formData);
}

femailInput.addEventListener("input", function () {
    var email = femailInput.value.trim();
    if (email !== "") {
        checkfEmailExists(email);

    } else {
        femailErrorSpan.textContent = "";
        femailExists = false; // Reset the flag when email is cleared
    }
});

function disablefSubmitButton() {
    btnfsub.disabled = true;
}

function enablefSubmitButton() {
    btnfsub.disabled = false;
}


document.addEventListener("DOMContentLoaded", function () {
    var requestCount = 0; // Track the number of password reset requests

    document.getElementById("fpass-form").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the span element for displaying messages
        var messageSpan = document.getElementById("message");

        // Check if the user has reached the maximum allowed requests
        if (requestCount >= 4) {
            // Display the message in the span
            messageSpan.innerText = "You have reached the maximum number of password reset requests. Please try again after 24 hours.";
            return;
        }

        // Get the email from the form
        var email = document.getElementById("f-email").value;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open("POST", "link.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Define the data to be sent with the request
        var data = "f-email=" + encodeURIComponent(email) + "&submitfpass=true";

        // Define the callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) { // Check if the request is complete
                if (xhr.status == 200) { // Check if the request was successful
                    // Parse the JSON response
                    var response = JSON.parse(xhr.responseText);

                    // Handle the response from the server
                    console.log(response);

                    if (response.status === 'success') {
                        // Increment the request count
                        requestCount++;
                        // Clear the error message
                        messageSpan.innerText = "";

                        // Redirect to the specified URL upon success
                        window.location.href = response.redirect;
                    } else {
                        // Handle other scenarios (e.g., display an error message)
                        console.error(response.message);
                        // Set the content of the span with the error message
                        messageSpan.innerText = response.message;
                    }

                } else {
                    // Handle errors
                    console.error("Error:", xhr.statusText);
                    // Set the content of the span with a generic error message
                    messageSpan.innerText = "An error occurred. Please try again.";
                }
            }
        };

        // Send the request with the data
        xhr.send(data);
    });
});

