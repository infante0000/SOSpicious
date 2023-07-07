function sendMail() {
    var params = {
      /*Takes the values of fname and email in a form */
      /*Basically: variable: get the value of the element whose ID is ("contact_name") */
      name: document.getElementById("contact_name1").value,
      email: document.getElementById("e_email_add").value
    };
    
    /*Actually, it's my stuff from EmailJS, use it as you please for testing */
    const serviceID = "service_d956qto";
    const templateID = "template_vynxezm";
    

      /*EmailJS does the work for us na*/
      emailjs.send(serviceID, templateID, params)
      .then(res=>{
          document.getElementById("name").value = "";
          document.getElementById("email").value = "";

          /*Will display if message was sent with no problems*/
          console.log(res);
          alert("Your message sent successfully!");
  
      })
      .catch(err=>console.log(err));
  
  }