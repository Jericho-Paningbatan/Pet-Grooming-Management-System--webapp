const currentMonthDisplay = document.getElementById("currentMonth");
const prevbtn = document.getElementById("prevbtn");
const nextbtn = document.getElementById("nextbtn");

let currentDate = new Date(); // Set currentDate to the current date.
currentDate.setDate(1);

function renderCalendar() {
  calendarDates.innerHTML = "";
  const year = currentDate.getFullYear();
  const month = currentDate.getMonth();
  const today = new Date();
  today.setHours(0, 0, 0, 0);

  currentMonthDisplay.textContent = new Date(year, month).toLocaleDateString("en-US", {
    month: "long",
    year: "numeric"
  });

  const firstDayIndex = new Date(year, month, 1).getDay();
  const prevMonthDays = new Date(year, month, 0).getDate();

  for (let i = firstDayIndex - 1; i >= 0; i--) {
    const date = prevMonthDays - i;
    const isDisabled = true;
    createCalendarDate(date, month - 1, year, isDisabled, true);
  }

  const daysInMonth = new Date(year, month + 1, 0).getDate();
  for (let i = 1; i <= daysInMonth; i++) {
    const date = new Date(year, month, i);
    const isDisabled = date < today;
    createCalendarDate(i, month, year, isDisabled, false);
  }

  const totalCells = 42; // Total number of cells required for 6 rows (6 rows x 7 columns).
  const lastDayIndex = new Date(year, month, daysInMonth).getDay();
  const remainingCells = (totalCells - (firstDayIndex + daysInMonth + (lastDayIndex === 0 ? 0 : 7 - lastDayIndex)));
  const nextMonthDays = remainingCells <= 0 ? 0 : remainingCells;

  for (let i = 1; i <= nextMonthDays; i++) {
    createCalendarDate(i, month + 1, year, true, true);
  }
}

function createCalendarDate(date, month, year, isOutOfMonth) {
  const dateElement = document.createElement("div");
  dateElement.classList.add("date");

  const currentDate = new Date(); // Get the current date.
  currentDate.setHours(0, 0, 0, 0); // Set time to midnight for accurate comparison.

  const selectedDate = new Date(year, month, date);
  selectedDate.setHours(0, 0, 0, 0); // Set time to midnight for accurate comparison.

  if (isOutOfMonth || selectedDate <= currentDate) { // Disable if out of month or past date.
    dateElement.classList.add("disabled");
    dateElement.textContent = date;
  } else {
    dateElement.addEventListener("click", () => showBookingModal(date, month + 1, year));
    dateElement.textContent = date;
  }

  calendarDates.appendChild(dateElement);
}



function bookDate(date, month, year) {
  alert(`You clicked on ${month}/${date}/${year}. Implement your booking logic here.`);
}

prevbtn.addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
});

nextbtn.addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar();
});

renderCalendar();







const modal = document.getElementById("myModal");
const closeModalBtn = document.getElementsByClassName("close")[0];
const bookingDateElement = document.getElementById("bookingDate");
const selectedDateInput = document.getElementById("selectedDate");
const bookingTypeSelect = document.getElementById("bookingType");

function showBookingModal(date, month, year) {
  const formattedDate = `${getMonthName(month)} ${date}, ${year}`;
  selectedDateInput.value = formattedDate;
  modal.style.display = "block";
}

// Helper function to get the month name from the month index
function getMonthName(monthIndex) {
  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  return monthNames[monthIndex - 1]; // Subtract 1 from the monthIndex to get the correct month name
}
// Event listener to close the modal when the close button is clicked
closeModalBtn.addEventListener("click", () => {
  modal.style.display = "none";
});


// Event listener to close the modal when the user clicks outside the modal
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});
// Event listener to show the modal when a date is clicked
function bookDate(date, month, year) {
  showBookingModal(date, month, year);
}






function showPetDetailsSection() {
  // Hide the Check Available Section
  const checkAvailableSection = document.querySelector(".checkavailableSection");
  checkAvailableSection.style.display = "none";

  // Show the Pet Details Section
  const petDetailsSection = document.getElementById("petDetailsSection");
  petDetailsSection.style.display = "block";

  // Show the "Previous" and "Book" buttons, hide the "Next" button
  prevBtn.style.display = "inline-block";
  bookBtn.style.display = "inline-block";
  nextBtn.style.display = "none";
}

// Function to show the Check Available Section and hide the Pet Details Section
function showCheckAvailableSection() {
  // Show the Check Available Section
  const checkAvailableSection = document.querySelector(".checkavailableSection");
  checkAvailableSection.style.display = "block";

  // Hide the Pet Details Section
  const petDetailsSection = document.getElementById("petDetailsSection");
  petDetailsSection.style.display = "none";

  // Hide the "Previous" and "Book" buttons, show the "Next" button
  prevBtn.style.display = "none";
  bookBtn.style.display = "none";
  nextBtn.style.display = "inline-block";
}

// Event listener for the "Next" button
const nextBtn = document.getElementById("nextBtn");
nextBtn.addEventListener("click", showPetDetailsSection);

// Event listener for the "Previous" button
const prevBtn = document.getElementById("prevBtn");
prevBtn.addEventListener("click", showCheckAvailableSection);





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




$(document).ready(function() {
  $(".navbar-toggler").on("click", function() {
    $(this).toggleClass("active");
  });
});






document.addEventListener('DOMContentLoaded', function() {
  // Function to check availability
  function checkAvailability(selectedDate, bookingtime, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'book-validate.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = xhr.responseText;
        callback(response);
      }
    };
    var data = 'selectedDate=' + encodeURIComponent(selectedDate) + '&bookingtime=' + encodeURIComponent(bookingtime);
    xhr.send(data);
  }

  // Event listener to check availability when the time slot selection changes
  var bookingTimeSelect = document.getElementById('bookingtime');
  bookingTimeSelect.addEventListener('change', function() {
    var selectedDate = document.getElementById('selectedDate').value;
    var bookingtime = this.value;
    checkAvailability(selectedDate, bookingtime, function(response) {
      var message = document.getElementById('message');
      var icon = document.getElementById('icon');
      var nextButton = document.getElementById('nextBtn');

      if (response.trim() === 'booked') {
        message.innerHTML = 'This time slot is already booked.';
        message.style.color = 'red';
        icon.className = 'fa fa-times';
        nextButton.disabled = true;
      } else if (response.trim() === 'available') {
        message.innerHTML = 'This time slot is available.';
        message.style.color = 'green';
        icon.className = 'fa fa-check';
        nextButton.disabled = false;
      } else {
        message.innerHTML = 'Error: ' + response;
        message.style.color = 'black';
        icon.className = '';
        nextButton.disabled = true;
      }
    });
  });




  function closeFormModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
  }




  function resetForm() {
    document.getElementById('selectedDate').value = '';
    document.getElementById('bookingtime').value = '';
    document.getElementById('petName').value = '';
    document.getElementById('petBreed').value = '';
    document.getElementById('petAge').value = '';
    document.getElementById('petGender').value = '';
    document.getElementById('petServices').value = '';
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

 // Event listener for the "Book" button click
var bookBtn = document.getElementById('bookBtn');
bookBtn.addEventListener('click', function(event) {
  event.preventDefault(); // Prevent the default form submission

  var selectedDate = document.getElementById('selectedDate').value;
  var bookingtime = document.getElementById('bookingtime').value;
  var petName = document.getElementById('petName').value;
  var petBreed = document.getElementById('petBreed').value;
  var petAge = document.getElementById('petAge').value;
  var petGender = document.getElementById('petGender').value;
  var petServices = document.getElementById('petServices').value;

  // Make an AJAX request to save the booking data
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'booking.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      // Handle the response from the server (display success/failure message, etc.)
      if (response.trim() === 'Booking successful! Data saved to MongoDB.') {
        showSuccessModal();
        resetForm(); // Reset the form fields
        closeFormModal(); // Close the form modal
      } else {
        console.log(response); // Handle other responses or errors if needed
      }
    }
  };
  var data = 'selectedDate=' + encodeURIComponent(selectedDate) + '&bookingtime=' + encodeURIComponent(bookingtime) + '&petName=' + encodeURIComponent(petName) + '&petBreed=' + encodeURIComponent(petBreed) + '&petAge=' + encodeURIComponent(petAge) + '&petGender=' + encodeURIComponent(petGender) + '&petServices=' + encodeURIComponent(petServices) + '&bookBtn=1';
  xhr.send(data);
});
});




