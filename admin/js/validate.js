var password = document.getElementById("pass")
var confirm_password = document.getElementById("passconf");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Password Konfirmasi Berbeda");
    }else{
        confirm_password.setCustomValidity('');
    }
}

// password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;