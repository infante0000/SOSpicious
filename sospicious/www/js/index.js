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
// var login = document.getElementById("LOGIN");
// var register = document.getElementById("REGISTER");

// function changetoRegister(){
//     login.style.display = "none";
//     register.style.display = "block";
// }

// function changetoLogin(){
//     register.style.display = "none";
//     login.style.display = "block";
// }

