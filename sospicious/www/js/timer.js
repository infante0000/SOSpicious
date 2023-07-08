const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 10;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

var pinContainer = document.querySelector(".cancel_pincode-form");
var pinLabel = document.querySelector(".cancel_label");
var pinSent = document.querySelector(".cancel_sent");
var Container = document.querySelector(".cancel_container");
var home = document.querySelector(".home_container");

document.getElementById("cancel_timer").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

// startTimer();



function onTimesUp() {
  clearInterval(timerInterval);
    pinContainer.style.display = "none";
    pinLabel.style.display = "none";
    pinSent.style.display = "block";
    // sendMail("testname",["rhonakaye05@gmail.com"]);
    // location.reload();
    // Container.style.display = "none";
    // home.style.display = "grid";
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

//   return `${minutes}:${seconds}`;
  return `${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}




//var pinContainer = document.getElementsByClassName("pin-code")[0];
// var pinContainer = document.querySelector(".cancel_pincode-form");
// console.log('There is ' + pinContainer.length + ' Pin Container on the page.');

// pinContainer.addEventListener('keyup', function (event) {
//     var target = event.srcElement;
    
//     var maxLength = parseInt(target.attributes["maxlength"].value, 10);
//     var myLength = target.value.length;

//     if (myLength >= maxLength) {
//         var next = target;
//         while (next = next.nextElementSibling) {
//             if (next == null) break;
//             if (next.tagName.toLowerCase() == "input") {
//                 next.focus();
//                 break;
//             }
//         }
//     }

//     if (myLength === 0) {
//         var next = target;
//         while (next = next.previousElementSibling) {
//             if (next == null) break;
//             if (next.tagName.toLowerCase() == "input") {
//                 next.focus();
//                 break;
//             }
//         }
//     }
// }, false);

// pinContainer.addEventListener('keydown', function (event) {
//     var target = event.srcElement;
//     target.value = "";
// }, false);

var pinContainer = document.querySelector(".cancel_pincode-form");
var homeButton = document.getElementById("homeButton");

pinContainer.addEventListener('keyup', function (event) {
  var target = event.srcElement;
  
  var maxLength = parseInt(target.attributes["maxlength"].value, 10);
  var myLength = target.value.length;

  if (myLength >= maxLength) {
    var next = target;
    while (next = next.nextElementSibling) {
      if (next == null) break;
      if (next.tagName.toLowerCase() == "input") {
        next.focus();
        break;
      }
    }
  }

  if (myLength === 0) {
    var next = target;
    while (next = next.previousElementSibling) {
      if (next == null) break;
      if (next.tagName.toLowerCase() == "input") {
        next.focus();
        break;
      }
    }
  }

  // Check if the entered code matches the desired code
  var enteredCode = Array.from(pinContainer.getElementsByTagName("input"))
    .map(input => input.value)
    .join("");

  var desiredCode = "1234"; // Replace with your desired 4-digit code

  if (enteredCode === desiredCode) {
    homeButton.style.display = "block";
  } else {
    homeButton.style.display = "none";
  }
}, false);

pinContainer.addEventListener('keydown', function (event) {
  var target = event.srcElement;
  target.value = "";
}, false);


var homeButton = document.getElementById("homeButton");

homeButton.addEventListener("click", function() {
  location.reload();
});

// function showButton() {
//     var button = document.getElementById("homeButton");
//     button.style.display = "block";
// }

// function hideButton() {
//     var button = document.getElementById("homeButton");
//     button.style.display = "none";
// }




// function sendMail(username,emailAddresses) {
//   // runPHPCode();
//   // Iterate through the email addresses
//   emailAddresses.forEach(function (email) {
//     // Prepare the email parameters
//     var params = {
//       from_name: username,
//       to_email: email,
//       link: 'tstlink'
//     };

//     // Send the email using EmailJS
//     emailjs.send('service_y8tbrns', 'template_sid438m', params)
//       .then(function(response) {
//         console.log('Email sent successfully to: ' + email);
//       })
//       .catch(function(error) {
//         console.error('Error sending email to: ' + email, error);
//       });
//   });
// }


// function runPHPCode() {
//   var xhr = new XMLHttpRequest();

//   // Prepare the request
//   xhr.open('POST', '../php/sendMail.php', true);

//   // Set the response type
//   xhr.responseType = 'text';

//   // Handle the response
//   xhr.onload = function() {
//     if (xhr.status === 200) {
//       var response = xhr.responseText;
//       // Handle the response data here
//       console.log(response);
//     } else {
//       // Handle any errors
//       console.error('Error: ' + xhr.status);
//     }
//   };

//   // Send the request
//   xhr.send();
// }