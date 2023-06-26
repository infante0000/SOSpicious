//declaring html elements

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#profile_pic');
const file = document.querySelector('#profile_picfile');
const uploadBtn = document.querySelector('#profile_uploadPic');
var profileFName = document.getElementById("profile_firstname");
var profileLName = document.getElementById("profile_lastname");

profile_firstname.innerHTML = " Vinci";
profile_lastname.innerHTML = " Malizon";
//if user hover on img div 

imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

//if we hover out from img div

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});

//when user clicked to upload a photo

file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});

/** PROFILE NAVIGVATION TABS */
//PROFILE - LOGOUT
let logoutModal = document.getElementById("logout_popup");
let appContent = document.getElementById("profile_contents");

function openLogoutModal() {
    logoutModal.classList.add("open-logoutModal");
    appContent.classList.add("bg-blurred");
}
function closeLogoutModal() {
    logoutModal.classList.remove("open-logoutModal");
    appContent.classList.remove("bg-blurred");
}