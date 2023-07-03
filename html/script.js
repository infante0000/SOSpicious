
function outwin(id){
    var element = document.getElementById(id);
    if(element.style.display == 'block'){
        element.style.display = 'none';
    }  
}

function enterwin(id){
    var element = document.getElementById(id);
    if(element.style.display == 'none'){
        element.style.display = 'block';
    } else {
        element.style.display = 'block';
    }
}