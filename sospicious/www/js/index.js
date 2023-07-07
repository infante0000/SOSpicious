
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



/******Change to LOGIN SECTION/REGISTER SECTION********** */

var home = document.getq("HOME");
var cancel = document.getElementById("CANCEL");


function changetoCancel(){
    cancel.style.display = "grid";
    home.style.display = "none";
    // startTimer();
}
