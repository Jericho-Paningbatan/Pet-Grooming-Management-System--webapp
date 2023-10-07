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
  sentenceIndex = (sentenceIndex + 1) % sentences.length; 
  typeEffect(); 
}

typeEffect();


 // Add event listener to hide loader and show content when page is fully loaded
 window.addEventListener("load", function () {
  var loader = document.querySelector(".loader-wrapper");
  var body = document.querySelector("body");
  loader.style.display = "none";
  body.style.display = "block";
});




$(document).ready(function() {
  $(".navbar-toggler").on("click", function() {
    $(this).toggleClass("active");
  });
});




// Function to check if an element is in the viewport
function isInViewport(element) {
  var rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}







// JavaScript
const textElements = document.querySelectorAll('.text-animation');

function animateText() {
  textElements.forEach((element) => {
    const elementOffset = element.offsetTop;
    const scrollPosition = window.pageYOffset + window.innerHeight;

    if (scrollPosition > elementOffset) {
      element.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', animateText);







$(document).ready(function() {
  // Animation for the booking form
  $(".booking-form-wrapper").animate({ opacity: 1, marginTop: "0" }, 800);

  // Animation for the opening hours section
  $(".opening-hours-wrapper").delay(400).animate({ opacity: 1, marginTop: "0" }, 800);
});


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
  showScrollToTopButton();
};

function showScrollToTopButton() {
  var scrollToTopBtn = document.getElementById("scrollToTopBtn");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document with animation
function scrollToTop() {
  // Determine the starting position
  var startingY = window.pageYOffset;
  // Define the duration of the scroll animation
  var duration = 1000; // 1 second
  // Calculate the easing pattern
  var easing = function(t) {
    return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
  };
  // Define the target position
  var targetY = 0;
  // Calculate the distance to scroll
  var diff = targetY - startingY;
  // Start the animation
  var startTime;

  function scrollAnimation(currentTime) {
    if (!startTime) {
      startTime = currentTime;
    }
    // Calculate the elapsed time
    var timeElapsed = currentTime - startTime;
    // Calculate the next position using the easing function
    var nextPosition = easing(timeElapsed / duration) * diff + startingY;
    // Scroll to the next position
    window.scrollTo(0, nextPosition);
    // Check if the animation is finished
    if (timeElapsed < duration) {
      requestAnimationFrame(scrollAnimation);
    }
  }

  requestAnimationFrame(scrollAnimation);
}





 // Smooth scrolling function
 function smoothScroll(target) {
  const element = document.querySelector(target);
  window.scrollTo({
    top: element.offsetTop,
    behavior: 'smooth'
  });
}





 




