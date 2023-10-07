


  // preloader
window.addEventListener('load', function() {
    setTimeout(function() {
      document.querySelector('.preloader').style.display = 'none';
    }, 2000);
  
    const text = "Bleach Me How to Doggie";
    let index = 0;
    const typingEffect = setInterval(() => {
      document.querySelector('.typing-texts').textContent = text.slice(0, index);
      index++;
      if (index > text.length) {
        clearInterval(typingEffect);
      }
    }, 70);
  });
  
  
  


  function resetForm() {
    // Reset the form fields
    document.getElementById('messform').reset();
  }
  
  
// Function to show the success modal
function showSuccessModal() {
    var successModal = document.getElementById('successModal');
    successModal.style.display = 'block'; // Show the modal
  
    setTimeout(function() {
      successModal.style.display = 'none'; // Hide the modal after a few seconds
      location.reload(); // Reload the page to reset the form
    }, 2000); // Adjust the timeout duration as needed (optional)
  }
  
   document.getElementById('messform').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form submission
        var form = event.target;
        var formData = new FormData(form);

        // Send the form data using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log("Response:", xhr.responseText); // Debugging line
                    var responseData = JSON.parse(xhr.responseText);
                    console.log("Parsed Response Data:", responseData); // Debugging line
        
                    if (responseData.status === "success") {
                        showSuccessModal();
                        resetForm();
                    } else {
                        // Handle the error here
                        alert(responseData.message);
                    }
                } else {
                    // The request failed, handle the error here
                    alert('Error: ' + xhr.statusText);
                }
            }
        };
        xhr.send(formData);
        
    });
  
  
  
$(document).ready(function() {
  $(".navbar-toggler").on("click", function() {
    $(this).toggleClass("active");
  });
});

  




