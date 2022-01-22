function checkPassword(){
    document.getElementById("submit").disabled = fasle;


    if(document.getElementById('password').value ==
        document.getElementById('confirm_password').value){
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Passwords match';
            formSubmit;
          } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Passwords must match';
        }

        
}


// make a function to check if password is strong