
/******LOADING SPLASHCREEN********** */
var preloader = document.getElementById("loading");
      function myFunction(){
        preloader.style.display = 'none';
      }

const showPassword = document.querySelector("#showPassword");
const passwordField = document.querySelector("#password");

showPassword.addEventListener("click", function(){
    this.classList.toggle("fa-eye");
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
});


/******Change to LOGIN SECTION/REGISTER SECTION********** */
// var login = document.getElementById("HOME");
// var register = document.getElementById("CANCEL");

// function changetoRegister(){
//     login.style.display = "none";
//     register.style.display = "block";
// }

// function changetoLogin(){
//     register.style.display = "none";
//     login.style.display = "block";
// }

/******HOME - EMAIL SENDING********** */
// function sendMail(){
//   var params = {
//     name: "Testname",
//     email: "test email",
//   }


// const serviceID = "service_y8tbrns";
// const templateID = "template_sid438m";

// emailjs
// .send(serviceID,templateID, params)
// .then(
//   res =>{
//     console.log(res);
//     alert("Email sent!");
//   })
// .catch(err => console.log(err));
// }


function sendMail(username,emailAddresses) {
  // runPHPCode();
  // Iterate through the email addresses
  emailAddresses.forEach(function (email) {
    // Prepare the email parameters
    var params = {
      from_name: username,
      to_email: email,
      link: 'tstlink'
    };

    // Send the email using EmailJS
    emailjs.send('service_y8tbrns', 'template_sid438m', params)
      .then(function(response) {
        console.log('Email sent successfully to: ' + email);
      })
      .catch(function(error) {
        console.error('Error sending email to: ' + email, error);
      });
  });
}


function runPHPCode() {
  var xhr = new XMLHttpRequest();

  // Prepare the request
  xhr.open('POST', '../php/sendMail.php', true);

  // Set the response type
  xhr.responseType = 'text';

  // Handle the response
  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = xhr.responseText;
      // Handle the response data here
      console.log(response);
    } else {
      // Handle any errors
      console.error('Error: ' + xhr.status);
    }
  };

  // Send the request
  xhr.send();
}

/******Change to LOGIN SECTION/REGISTER SECTION********** */

var home = document.getq("HOME");
var cancel = document.getElementById("CANCEL");


function changetoCancel(){
    cancel.style.display = "grid";
    home.style.display = "none";
    // startTimer();
}
