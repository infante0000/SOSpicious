//declaring html elements

// const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#profile_pic');
const file = document.querySelector('#edit_profilepic');
const uploadBtn = document.querySelector('#profile_uploadPic');
var profileFName = document.getElementById("profile_firstname");
var profileLName = document.getElementById("profile_lastname");
var health_Weight = document.getElementById("user_weight");
var health_Height = document.getElementById("user_height");
var health_blood = document.getElementById("user_blood");
var profileUN = document.getElementById("profile_username");

// profileFName.innerHTML = "Vinci&nbsp;";
// profileLName.innerHTML = "Malizon"+'&nbsp;';
/*health_Weight.innerHTML = '67'+'&nbsp;kg';
health_Height.innerHTML = '172'+'&nbsp;cm';
health_blood.innerHTML = 'A+';*/
//if user hover on img div 

// imgDiv.addEventListener('mouseenter', function(){
//     uploadBtn.style.display = "block";
// });

// //if we hover out from img div

// imgDiv.addEventListener('mouseleave', function(){
//     uploadBtn.style.display = "none";
// });

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

/** PROFILE NAVIGATION TABS */
//PROFILE - LOGOUT

function toggleClass(elementId, className, action) {
    let element = document.getElementById(elementId);
    element.classList[action](className);
}
  
function openLogoutModal() {
    toggleClass("logout_popup", "open-logoutModal", "add");
    toggleClass("profile_contents", "bg-blurred", "add");
}
  
function closeLogoutModal() {
    toggleClass("logout_popup", "open-logoutModal", "remove");
    toggleClass("profile_contents", "bg-blurred", "remove");
}
  
/**PROFILE HEALTH */
function editHRecord(){
    $('#health_edit').click(function(){
        //var buttonId = $(this).attr('id');
        $('#modal-container').removeAttr('class').addClass('two');
        $('body').addClass('modal-active');
      })
      
      /*$('#modal-container').click(function(){
        $(this).addClass('out');
        $('body').removeClass('modal-active');
      });*/
}