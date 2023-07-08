function myFunction() {
    
    var com2loc = document.getElementById('commute2_input_loc');
    var com2time = document.getElementById('commute2_time');
    var com2transpo = document.getElementById('commute2_transpo');
    const success = document.getElementById('success');
    const danger = document.getElementById('danger');

    if(com2loc.value === '' || com2time.value === '' || com2transpo.value === ''){
        danger.style.display = 'block';
    }
    else{
        // setTimeout(() => {
        //     Name.value = '';
        //     email.value = '';
        //     msg.value = '';
        // }, 2000);

        // success.style.display = 'block';
        alert("Hi");
    }

   

    setTimeout(() => {
        danger.style.display = 'none';
        success.style.display = 'none';
    }, 2000);
}

// function message(){
//     var com2loc = document.getElementById('commute2_input_loc');
//     var com2time = document.getElementById('commute2_time');
//     var com2transpo = document.getElementById('commute2_transpo');
//     var msg = document.getElementById('msg');
//     const success = document.getElementById('success');
//     const danger = document.getElementById('danger');

//     if(com2loc.value === '' || com2time.value === '' || com2transpo.value === ''){
//         danger.style.display = 'block';
//     }
//     else{
//         setTimeout(() => {
//             Name.value = '';
//             email.value = '';
//             msg.value = '';
//         }, 2000);

//         success.style.display = 'block';
//     }


//     setTimeout(() => {
//         danger.style.display = 'none';
//         success.style.display = 'none';
//     }, 4000);

// }

