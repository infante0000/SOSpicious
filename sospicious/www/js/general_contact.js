
/*This code hides the modal when the botton is clicked */
function outwin(id){
    var element = document.getElementById(id);
    if(element.style.display == 'block'){
        element.style.display = 'none';
    }  
}

/*This code displays the modal when the button is clicked */
function enterwin(id){
    var element = document.getElementById(id);
    if(element.style.display == 'none'){
        element.style.display = 'block';
    } else {
        element.style.display = 'block';
    }
}

/*Function for getting ids and displaying their value
  NEEDS OPTIMIZATION! UNSTABLE IF USED ACROSS MANY CONTAINERS
  Suggestion:
    Passing an id (specifically the fname, lname, and relation), adding a +1 
    or a separate tracker to the end to serve as a new increment. 
        Example: onclick= "displayname(e_fname.id+containernumber, e_lname.id+containernumber, e_relation.id+containernumber)"
            This way, we can reduce uncessary codes in JS and have it a bit cleaner than what it currently is. For a demo of what
            it could also look like, please refer to contacts.html, on line 39
*/
function displayname(){
    const fname = document.getElementById('e_fname');
    const lname = document.getElementById('e_lname');
    const rel = document.getElementById("e_relation");
    const contact_name = document.getElementById('contact_name1');
   
    contact_name.innerHTML = e_fname.value +" "+ e_lname.value;
}