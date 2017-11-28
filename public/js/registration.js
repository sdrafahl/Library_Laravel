
function validate() {
    var user = document.getElementById('username').value;
    var pass1 = document.getElementById('password').value;
    var pass2 = document.getElementById('password2').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phoneNumber').value;
    var isLibrarian = document.getElementById('checkBox').checked;

    if(isLibrarian) {
        isLibrarian = 1;
    } else {
        isLibrarian = 0;
    }
    if(alphanumeric(user) && pass1.length != 0 && pass1 == pass2 && isValidEmail(email) && isValidPhone(phone)) {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/createUser',
            type: 'GET',
            contentType: 'application/json',
            dataType: 'text',
            data: JSON.stringify ({
                username: user,
                password: pass1,
                password2: pass2,
                emailAddress: email,
                phoneNumber: phone,
                librarian: isLibrarian,
            }),
            success: function() {
                console.log("success");
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    }
}

function alphanumeric(inputtxt)
{
    var letterNumber = /^[0-9a-zA-Z]+$/;
    if(inputtxt.match(letterNumber)) {
        return true;
    }
    return false;
}

function isValidEmail(email) {
    var state = 0
    for(var x = 0;x<email.length;x++) {

        var ch = email.charAt(x);
        if(ch != '@' && state == 0) {
            state = 1;
        }

        if(ch == '@' && state == 2) {
            return false;
        }

        if(ch == '@' && state == 1) {
            state = 2;
        }
    }

    if(state == 2) {
        return true;
    }

    return false;
}

function isValidPhone(phone) {

    if(phone.length != 10 && phone.length != 12){
        return false;
    }
    for(var x=0;x<phone.length;x++) {
        var ch = phone.charAt(x);
        if(ch != '0' && ch != '1' && ch != '2' && ch != '3' && ch != '4' &&
         ch != '5' && ch != '6' && ch != '7' && ch != '8' && ch != '9' && ch != '-') {
             return false;
        }
    }
    return true;
}
