window.onload = function() {

}

function validate() {
    var user = document.getElementsByName('username').value;
    var pass1 = document.getElementsByName('password').value;
    var pass2 = document.getElementsByName('password2').value;
    var email = document.getElementsByName('email').value;
    var phone = document.getElementsByName('phoneNumber').value;
    var isLibrarian = document.getElementsByName('checkBox').checked;

    if(isLibrarian) {
        isLibrarian = 1;
    } else {
        isLibrarian = 0;
    }

    if(alphanumeric(user) && pass1.length != 0 && pass1 == pass2 && isValidEmail(email) && isValidPhone(phone)) {
        $.ajax({
            url: 'createUser/',
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify ({
                username: user,
                password: pass1,
                password2: pass2,
                emailAddress: email,
                phoneNumber: phone,
                librarian: isLibrarian,
            }),
            success: function() {

            },
            error: function(xhr, status, error) {
                console.log("error");
            },
        });
    }
}

function alphanumeric(var inputtxt)
{
    var letterNumber = /^[0-9a-zA-Z]+$/;
    if((inputtxt.value.match(letterNumber))
    {
        return true;
    }
    return false;
}

function isValidEmail(var email) {
    var state = 0
    for(var x = 0;x<email.length;x++) {
        var ch = email.charAt(x);
        if(ch != '@' && state == 0) {
            state = 1
        }

        if(ch == '@' && state == 1) {
            return false;
        }
    }

    if(state == 1) {
        return true;
    }

    return false;
}

function isValidPhone(var phone) {

    if(ch.length != 10 || ch.length != 12){
        return false;
    }
    for(var x=0;x<phone.length;x++) {
        var ch = phone.charAt(x);
        if(ch != '0' || ch != '1' || ch != '2' || ch != '3' || ch != '4' ||
         ch != '5' || ch != '6' || ch != '7' || ch != '8' || ch != '9' || ch != '-') {
             return false;
        }
    }
    return true;
}
