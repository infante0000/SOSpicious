
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
