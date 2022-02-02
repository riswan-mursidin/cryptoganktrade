// username validate

function cekValidation(str){
    var notif = document.getElementById("valid_username");
    var username = document.getElementById("username");
    if(str != ""){
        var length = str.length;
        if(length > 10){
            username.setCustomValidity("Max 10 charakter");
        }else{
            username.setCustomValidity("");
        }
        var charSisa = 10 - length;
        if(charSisa < 0){
            charSisa = 0;
        }
        var text = "*sisa " +charSisa+" Karakter";
        notif.innerHTML = text;
    }else{
        notif.innerHTML = "";
    }
}

$("#username").on({
    keydown: function(e) {
        if (e.which === 32)
            return false;
    },
    keyup: function(){
        this.value = this.value.toLowerCase();
    }, 
    change: function() {
        this.value = this.value.replace(/\s/g, "");
    }
});

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