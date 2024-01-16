
// preloader

window.addEventListener('load', function() {
    setTimeout(function() {
        var preloader = document.querySelector('.preloader');
        if (preloader && preloader.style.display !== 'none') {
            preloader.style.display = 'none';
        }
    }, 2000);
});

document.addEventListener('DOMContentLoaded', function () {
    const text = "Bleach Me How to Doggie";
    let index = 0;

    const typingEffect = setInterval(() => {
        const typingTexts = document.querySelector('.typing-texts');
        if (typingTexts) {
            typingTexts.textContent = text.slice(0, index);
            index++;
            if (index > text.length) {
                clearInterval(typingEffect);
            }
        }
    }, 70);
});


  

// typing effects for carousel
const targetElement = document.getElementById('typing-effect');
const cursorElement = document.createElement('span');
cursorElement.classList.add('typing-cursor');
cursorElement.innerHTML = '&#x2588;'; 
targetElement.appendChild(cursorElement);

const sentences = [
  "Your Pet's Home Away from Home",
  "Your pet's ultimate grooming getaway",
  "Pamper your furry friend at our grooming cafe"
];
let sentenceIndex = 0;
let charIndex = 0;

function typeEffect() {
  const currentSentence = sentences[sentenceIndex];
  targetElement.textContent = currentSentence.substring(0, charIndex);
  charIndex++;

  if (charIndex <= currentSentence.length) {
    targetElement.appendChild(cursorElement);
    setTimeout(typeEffect, 100); 
  } else {
    setTimeout(resetEffect, 1000); 
  }
}

function resetEffect() {
  targetElement.textContent = '';
  charIndex = 0;
  sentenceIndex = (sentenceIndex + 1) % sentences.length; // Loop through the sentences
  typeEffect(); // Start typing the next sentence
}

typeEffect();

var passwordInput = document.getElementById("password");
var passwordError = document.getElementById("password-error");
var confirmPasswordInput = document.getElementById("confirm-password");
var confirmPasswordError = document.getElementById("confirm-password-error");
var submitButton = document.getElementById("submitRegistration");

var emailExists = false;
var phoneExists = false;
var passwordMatch = false;
var passwordLength = false;

function validatePasswords() {
    if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordError.textContent = "Passwords do not match.";
        passwordMatch = false;
    } else {
        confirmPasswordError.textContent = "";
        passwordMatch = true;
    }
    validateForm();
}

function passCharValidate() {
    if (passwordInput.value.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters";
        passwordLength = false;
    } else {
        passwordError.textContent = "";
        passwordLength = true;
    }
    validateForm();
}

passwordInput.addEventListener("input", passCharValidate);
confirmPasswordInput.addEventListener("input", validatePasswords);

function disableSubmitButton() {
    submitButton.disabled = true;
}

function enableSubmitButton() {
    submitButton.disabled = false;
}




     // Function to clear the registration form
     function clearForm() {
      document.getElementById("registrationForm").reset();
  }

  // Call the clearForm() function on page load
  window.addEventListener('load', clearForm);


  

  var myCheckbox = document.getElementById("flexCheckDefault");
  var submitBtn = document.getElementById("submitRegistration");
  var emailInput = document.getElementById("email");
  var emailErrorSpan = document.getElementById("email-error");
  var phoneInput = document.getElementById("phone");
  var phoneErrorSpan = document.getElementById("phone-error");
  var passwordErrorSpan = document.getElementById("confirm-password-error");
  
  var emailExists = false;
  var phoneExists = false;
  
  myCheckbox.addEventListener("change", function () {
    if (myCheckbox.checked) {
      // Check if there are any errors (email, phone, password mismatch)
      var emailError = emailErrorSpan.textContent;
      var phoneError = phoneErrorSpan.textContent;
      var passwordError = passwordErrorSpan.textContent;
  
      if (!emailError && !phoneError && !passwordError) {
        submitBtn.disabled = false;
      }
    } else {
      submitBtn.disabled = true;
    }
  });
  
  submitBtn.addEventListener("click", function (event) {
    if (!myCheckbox.checked) {
      event.preventDefault(); // Prevent form submission
      submitBtn.blur(); // Remove focus from the button to hide the tooltip
      submitBtn.setAttribute("title", "Please check the checkbox first");
      submitBtn.focus(); // Set focus back to the button to show the updated tooltip
    }
  });
  
  emailInput.addEventListener("input", function () {
      var email = emailInput.value.trim();
      if (email !== "") {
          checkEmailExists(email);
      } else {
          emailErrorSpan.textContent = "";
          emailExists = false; // Reset the flag when email is cleared
          validateForm();
      }
  });
  
  phoneInput.addEventListener("input", function () {
      var phone = phoneInput.value.trim();
      if (phone !== "") {
          checkPhoneExists(phone);
      } else {
          phoneErrorSpan.textContent = "";
          phoneExists = false; // Reset the flag when phone is cleared
          validateForm();
      }
  });
  
  function checkEmailExists(email) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  var response = xhr.responseText;
                  if (response === "exists_email") {
                      emailErrorSpan.textContent = "Email already exists.";
                      emailExists = true;
                  } else {
                      emailErrorSpan.textContent = "";
                      emailExists = false;
                  }
                  validateForm();
              } else {
                  console.error("Error occurred while checking email existence.");
              }
          }
      };
  
      xhr.open("POST", "checking/status_check.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      var formData = "email=" + encodeURIComponent(email);
      xhr.send(formData);
  }
  
  function checkPhoneExists(phone) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  var response = xhr.responseText;
                  if (response === "exists_phone") {
                      phoneErrorSpan.textContent = "Phone number already exists.";
                      phoneExists = true;
                  } else {
                      phoneErrorSpan.textContent = "";
                      phoneExists = false;
                  }
                  validateForm();
              } else {
                  console.error("Error occurred while checking phone existence.");
              }
          }
      };
  
      xhr.open("POST", "checking/status_check.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      var formData = "phone=" + encodeURIComponent(phone);
      xhr.send(formData);
  }
  
  function validateForm() {
    if (emailExists || phoneExists || !myCheckbox.checked || !passwordMatch || !passwordLength) {
        disableSubmitButton();
    } else {
        enableSubmitButton();
    }
}
  
  function disableSubmitButton() {
      submitBtn.disabled = true;
  }
  
  function enableSubmitButton() {
      submitBtn.disabled = false;
  }
  
  
// login-status-check

var emailsInput = document.getElementById("emails");
var loginErrorsSpan = document.getElementById("login-errors");
var submitButton = document.getElementById("submit");

emailsInput.addEventListener("input", function () {
    var email = emailsInput.value.trim();
    if (email !== "") {
        checkEmailStatus(email);
    } else {
        loginErrorsSpan.textContent = "";
    }
});

function checkEmailStatus(email) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "exists_not_verified") {
                    loginErrorsSpan.textContent = "Email not Verified. Please verify it first!";
                    loginErrorsSpan.style.color = "red"; // Set the font color to red for not verified
                    // Disable the submit button if the email is not verified
                    submitButton.disabled = true;
                } else if (response === "exists_verified") {
                    loginErrorsSpan.textContent = "Email Verified.";
                    loginErrorsSpan.style.color = "green"; // Set the font color to green for verified
                    // Enable the submit button if the email is verified
                    submitButton.disabled = false;
                } else if (response === "not_found") {
                    loginErrorsSpan.textContent = "Email does not exist.";
                    loginErrorsSpan.style.color = "red"; // Set the font color to red for not found
                    // Disable the submit button if the email does not exist
                    submitButton.disabled = true;
                } else {
                    loginErrorsSpan.textContent = "";
                    loginErrorsSpan.style.color = "black"; // Set the font color to black when no errors
                    // Enable the submit button if no errors
                    submitButton.disabled = false;
                }
            } else {
                // Redirect to Error404.php for internal errors
                window.location.href = "errors/404.php";
            }
        }
    };

    xhr.open("POST", "checking/login-status-check.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var formData = "email=" + encodeURIComponent(email);
    xhr.send(formData);
}

// login validate
document.getElementById('login-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the form data
    const formData = new FormData(event.target);

    // Make an AJAX request to the PHP script
    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Handle the response from the PHP script
        if (data === 'success') {
            // Login successful, redirect to a new page or do other actions
            window.location.href = 'home';
        } else {
            // Display the error message in the login-errors span
            document.getElementById('login-errors').innerText = data;
            document.getElementById('login-errors').style.color = 'maroon';
        }
    })
    .catch(error => {
        // Handle any errors that occurred during the AJAX request
        console.error('Error:', error);
        document.getElementById('login-errors').innerText = 'An error occurred during login.';
    });
});




var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));

function openModal() {
  // Hide the login modal before showing the example modal
  loginModal.hide();

  // Show the example modal after the login modal is hidden
  exampleModal.show();
}

function openModal2() {
    // Hide the login modal before showing the example modal
    loginModal.show();
  
    // Show the example modal after the login modal is hidden
    exampleModal.hide();
  }




