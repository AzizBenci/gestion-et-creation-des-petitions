/* var checked_radio = document.querySelector('input[name = "radio"]:checked');

document.getElementById("formtest").onsubmit=function() {
document.write("test");
        // Get a reference to the element we want to update
        el = document.getElementById("result");
        message;

    // Check 
    if (checked_radio != null) {
        message = "Let's get started then!";
    } else {
        message = "You're under 18? Be careful out there....";
    }
    // Update the content of the element with the message
    el.innerHTML = message;
}  */
function CheckForBlank (){
    el = document.getElementById('result');
  if(!document.getElementById('participer').checked && !document.getElementById('opposer').checked )
  {
    message = "Vous devez choisir une option !";
    el.innerHTML = message;
    return false;
  }
  
}