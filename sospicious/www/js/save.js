/*Takes the e_email_add and saves it in local storage evertime it's called
  The variable will be used in sendEmail.js */
function email_save(){
    var email_add = document.getElementById("e_email_add").value;
    localStorage.send_email = email_add;
}
